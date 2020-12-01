<?php
    function getAllUsers() {
        global $db;
        $stmt = $db->prepare('SELECT * FROM user');
        $stmt->execute();
        return $stmt->fetchAll();
    }

    // Add User to the database
    function addUser(){
        global $db;
        $name = $_POST['name'];
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $repeat = $_POST['repeat'];

        if($name == null || $email == null || $password == null || $repeat == null || $password != $repeat) return false;

        try {
            // Init transaction
            $db->beginTransaction();

            // Insert Account
            $account_sql = "INSERT INTO account (name) VALUES (?)";
            $first_stmt = $db->prepare($account_sql);
            $first_exec = $first_stmt->execute([$name]);

            if(!$first_exec) throw new Exception();
            // Get Account id after insert
            $account_id = $db->lastInsertId();

            // Insert User
            $user_sql = "INSERT INTO user (id, email, passwordhash) VALUES (?, ?, ?)";
            $second_stmt = $db->prepare($user_sql);

            // Hash the password
            $passwordhash = hash('sha256', $password);
            $second_exec = $second_stmt->execute([$account_id, $email, $passwordhash]);

            if(!$second_exec) throw new Exception();

            $db->commit();
        } catch (Exception $e) {
            $db->rollback();
            return false;
        }
        // Start session with new user
        $_SESSION['id'] = $account_id;
        $_SESSION['name'] = $name;
        $_SESSION['email'] = $email;
        return true;
    }

?>