<?php
    include_once('database/connection.php');
    include_once('database/upload.php');

    $id = $_POST['petId'];
    $file = $_FILES['image']['tmp_name'];
    if($id != null)
    {
        if(upload($id, $file))
            header('Location: add_post.php?id='.$id); // Redirect to shelter page if succesful
        else
            header('Location: index.php'); // Redirect to shelter page if succesful
    }     
    else
        header('Location: index.php'); // Redirect to shelter page if succesful
    
?>