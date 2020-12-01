<?php include_once('database/connection.php')?>
<!DOCTYPE html>
<html lang="en-US">
  <head>
    <title>Petgram</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/register.css" rel="stylesheet">
    <link rel="icon" href="images/icon.jpg">
  </head>
  <body>
    <header>
      <h1>Petgram</h1>
      <h2>The best pet social media for adoption!</h2>
    </header>
    <div id="register">
        <form action="register_action.php" method="POST">
            <label>First and Last Name: <input type="text" name="name" required></label> <br>
            <label>E-mail: <input type="email" name="email" required></label> <br>
            <label>Username: <input type="text" name="username"> required</label> <br>
            <label>Password: <input type="password" name="password" required></label> <br>
            <label>Confirm Password: <input type="password" name="repeat" required></label> <br>
            <input type="submit" value="Register">
          </form>
        </div>
    <div id="login">
        <p>Already have an account? Log in!</p>
        <a href="main_page.php"><button>Login</button></a>
    </div>
    <footer>
      <p>&copy; Petgram 2020</p>
    </footer>
  </body>
</html>