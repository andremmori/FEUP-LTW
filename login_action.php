<?php
include_once('database/connection.php');
include_once('database/user.php');

if (login())
    header('Location: index.php'); // On success return to home page
else
    header('Location: main_page.php'); // On error go back to login form

?>