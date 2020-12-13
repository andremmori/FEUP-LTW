<?php
    include_once('database/connection.php');
    include_once('database/upload.php');

    $id = $_POST['petID'];
    $description = $_POST['description'];
    $file = $_FILES['image']['tmp_name'];

    if(upload($id, $file, $description))
        header('Location: index.php?'); // Redirect to shelter page if succesful
    else
        header('Location: add_post.php?id='.$id); // Redirect to shelter page if succesful

?>