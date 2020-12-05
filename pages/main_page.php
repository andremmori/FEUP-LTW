<?php
include_once('database/connection.php');
?>
<!DOCTYPE html>
<html lang="en-US">

<head>
    <title>Petgram</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/home.css" rel="stylesheet">
    <link rel="icon" href="images/icon.jpg">
</head>

<body>
    <?php include_once('header.php') ?>
    <header>
        <h1>Petgram</h1>
        <h2>The best pet social media for adoption!</h2>
    </header>
    <div id="login">
        <form action="login_action.php" method="post">
            <label>Email: <input type="email" name="email" required></label> <br>
            <label>Password: <input type="password" name="password" required></label> <br>
            <input type="submit" value="Login">
        </form>
        <a href="home.php"><button>Skip to Home Screen</button></a>
    </div>
    <div id="register">
        <p>Don't have an account? Register now!</p>
        <a href="register.php"><button>Register</button></a>
    </div>
    <footer>
        <p>&copy; Petgram 2020</p>
    </footer>
</body>

</html>