<?php
    include_once('database/connection.php');
    include_once('database/upload_profilepic.php');

    $i_g = $_POST['individual_group'];
    if($i_g == 'individual')
    {

    }
    else if($i_g == 'group')
    {

    }
    else
        echo "ERROR";

    /*
    if($file != "")
    {
        if(upload($id, $file, $description))
            header('Location: pet_profile.php?id='.$id);
        else
            header('Location: add_post.php?id='.$id);
    }
    else
        header('Location: add_post.php?id='.$id);*/

?>