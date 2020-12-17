<?php
function getAllUsers()
{
    global $db;
    $stmt = $db->prepare('SELECT * FROM user');
    $stmt->execute();
    return $stmt->fetchAll();
}

function fetchUser($id)
{
    global $db;
    $stmt = $db->prepare('SELECT * FROM account JOIN user ON account.id = user.id WHERE user.id = ?');
    $stmt->execute([$id]);

    return $stmt->fetch();
}

// Retrieve user from the database
function login()
{
    global $db;

    // Validate input
    $email = InputValidator::email($_POST['email']);
    $password = InputValidator::password($_POST['password']);

    if (is_null($email) || is_null($password)) {
        $_SESSION['errors']['login'] = 'Invalid email/password combination';
        return false;
    }
    // Get account/user with email specified by the user
    $user_sql = "SELECT * FROM account JOIN user WHERE user.email = ? AND user.id = account.id";
    $stmt = $db->prepare($user_sql);
    $exec = $stmt->execute([$email]);

    if (!$exec) return false;

    // Fetch the user and compare the stored hashed password with the one sent by the user
    $user = $stmt->fetch();
    $passwordhash = hash('sha256', $password);

    if ($user == null || $passwordhash != $user['passwordhash']) return false;

    // set the session to the current user
    $_SESSION['user'] = fetchUser($user['id']);
    $_SESSION['errors'] = array("error" => "invalid date");
    return true;
}

// Add User to the database
function addUser()
{
    global $db;
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $repeat = $_POST['repeat'];
    $file = $_FILES['image']['tmp_name'];
    echo '*', $file, '*<br>';

    if ($name == null || $email == null || $password == null || $repeat == null || $password != $repeat) return false;
    try {
        // Init transaction
        $db->beginTransaction();

        $profilePic = upload_profilePic($file);

        echo $profilePic, '<br>';

        if ($profilePic == -1)
            throw new Exception();

        // Insert Account
        $account_sql = "INSERT INTO account (profilePic, name) VALUES (?, ?)";
        $first_stmt = $db->prepare($account_sql);
        $first_exec = $first_stmt->execute([$profilePic, $name]);

        if (!$first_exec) throw new Exception();
        // Get Account id after insert
        $account_id = $db->lastInsertId();

        // Insert User
        $user_sql = "INSERT INTO user (id, email, passwordhash) VALUES (?, ?, ?)";
        $second_stmt = $db->prepare($user_sql);

        // Hash the password
        $passwordhash = hash('sha256', $password);
        $second_exec = $second_stmt->execute([$account_id, $email, $passwordhash]);

        if (!$second_exec) throw new Exception();

        $db->commit();
    } catch (Exception $e) {
        $db->rollback();
        return false;
    }
    // Start session with new user
    $_SESSION['user'] = fetchUser($account_id);
    return true;
}

function updateUser($id)
{
    global $db;

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password']; // Will come as null if not filled by user

    if ($name == null || $email == null) return false;


    try {
        $db->beginTransaction();

        // Update name (account)
        $account_sql = "UPDATE account SET name = ? WHERE id = ?";
        $first_stmt = $db->prepare($account_sql);
        $first_exec = $first_stmt->execute([$name, $id]);

        if (!$first_exec) throw new Exception();


        if ($password == null) {
            $user_sql = "UPDATE user SET email = ? WHERE id = ?";
            $second_stmt = $db->prepare($user_sql);
            $second_stmt->execute([$email, $id]);
        } else {
            $user_sql = "UPDATE user SET email = ?, passwordhash = ? WHERE id = ?";
            $second_stmt = $db->prepare($user_sql);
            $passwordhash = hash('sha256', $password);
            $second_stmt->execute([$email, $passwordhash, $id]);
        }

        if (!$second_stmt) throw new Exception();

        $db->commit();
    } catch (Exception $e) {
        $db->rollback();
        return false;
    }
    return true;
}

function getUserPets()
{
    global $db;

    $user_id = $_SESSION['user']['id'];

    $stmt = $db->prepare('SELECT * FROM pet WHERE ownerID = ?');
    $stmt->execute([$user_id]);

    return $stmt->fetchAll();
}

function shelterCollaborator()
{
    global $db;

    $user_id = $_SESSION['user']['id'];

    $stmt = $db->prepare('SELECT * FROM collaborator INNER JOIN shelter ON shelter.id = collaborator.shelterID INNER JOIN account ON account.id = shelter.id WHERE collaborator.userID = ?');
    $stmt->execute([$user_id]);

    return $stmt->fetchAll();
}
