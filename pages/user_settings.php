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
    <div id="hotBar">
        <h1>Petgram</h1>
        <a href="/"><img src="images/home.png" alt="" width="50" height="50"></a>
        <a href="register.php"><img src="images/profile.png" alt="" width="50" height="50"></a>
        <a href=""><img src="images/search.png" alt="" width="50" height="50"></a>
        <a href=""><img src="images/settings.png" alt="" width="50" height="50"></a>
        <a href=""><img src="images/logout.png" alt="" width="50" height="50"></a>
    </div>

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
        <div>
            <aside id="sideBar">
                <div id="user">
                    <img src="images/pfp.png" alt="" width="65" height="65">
                    <div id="username">
                        <p>Average pet fan</p>
                        <p>petfan123</p>
                    </div>
                </div>
                <p>Pets:</p>
                <ul>
                    <li>Animal 1</li>
                    <li>Animal 2</li>
                    <li>Animal 3</li>
                </ul>
                <img src="images/petAdd.png" alt="" width="35" height="35">
            </aside>
        </div>
    </div>


</body>

</html>