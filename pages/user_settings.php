<?php
include_once('database/connection.php');

// Get user's session
$user = $_SESSION['user'];

if ($user == null)
    header('Location: main_page.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Settings</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/home.css" rel="stylesheet">
    <link rel="icon" href="images/icon.jpg">
</head>

<body>
    <?php include_once('hotbar.php') ?>
    <?php include_once('sidebar.php') ?>
    <div id="settings">
        <div id="main">
            <div id="header">
                <div>
                    <h1>User Settings</h1>
                </div>
                <div>
                    <a href=""><img src="images/edit.png" width="35" height="35" alt=""></a>
                </div>
            </div>
            <br>
            <div id="form">
                <form action="update_user_action.php" method="post">
                    <h3>Name: <input type="text" name="name" value="<?php echo $user['name'] ?>"></h3>
                    <h3>Email: <input type="text" name="email" value="<?php echo $user['email'] ?>"></h3>
                    <h3>Password: <input type="password" name="password" placeholder="Enter new password" value=""></h3>
                    <button id="btn" type="submit">Update</button>
                </form>
            </div>
            <br><br>
            <div>
                <h3>Create a shelter:</h3>
                <a href="add_shelter.php"><img src="images/addShelter.png" alt="Add Shelter" width="35" height="35"></a>
            </div>
        </div>
    </div>


</body>

</html>