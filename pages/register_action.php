<?php
    include_once('database/connection.php');
    include_once('database/user.php');

    // Add a user using the arguments submited
    if(addUser())
        header('Location: index.php'); // Redirect to index page if succesful
    else
        header('Location: register.php'); // Redirect to form page if unsuccesful


?>

