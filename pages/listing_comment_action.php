<?php
    include_once('database/connection.php');
    include_once('database/listingcomment.php');

    $id = $_GET['id'];
    $text = $_POST['text'];

    if(addListingComment($text, $id))
        header('Location: listing.php?id='.$id);
    else
        header('Location: index.php');
?>