<?php
    include_once('database/connection.php');
    include_once('database/upload_image.php');

    $id = $_POST['petID'];
    $description = $_POST['description'];
    $file = $_FILES['image']['tmp_name'];

    if($file != "")
    {
        if(upload($id, $file, $description))
            header('Location: pet_profile.php?id='.$id);
        else
            header('Location: add_post.php?id='.$id);
    }
    else
        header('Location: add_post.php?id='.$id);

?>