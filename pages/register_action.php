<?php
    include_once('database/connection.php');
    include_once('database/user.php');
    include_once('database/upload_profilepic.php');

// Add a user using the arguments submited
    if(addUser())
        header('Location: index.php'); // Redirect to index page if succesful
    else
        header('Location: main_page.php'); // Redirect to form page if unsuccesful


?>

