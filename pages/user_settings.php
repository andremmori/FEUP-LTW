<?php include_once('database/connection.php') ?>
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
            <div>
                <h3>Name: <?php echo $_SESSION['name'] ?></h3>
                <h3>Email: <?php echo $_SESSION['email'] ?></h3>
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