<?php
    include_once('database/connection.php');
    include_once('database/user.php');

    $id = $_SESSION['user']['id'];
    if( updateUser($id))
        header('Location: index.php');
    else
        header('Location: user_settings.php');
?>