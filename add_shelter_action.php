<?php
    include_once('database/connection.php');
    include_once('database/shelter.php');

    if(addShelter())
        header('Location: shelter_page.php'); // Redirect to shelter page if succesful
    else
        header('Location: add_shelter.php'); // Redirect to form page if unsuccesful
?>