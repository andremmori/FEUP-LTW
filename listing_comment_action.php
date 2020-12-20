<?php
    include_once('database/connection.php');
    include_once('database/listingcomment.php');
    include_once('database/pet.php');

    $id = $_GET['id'];
    $pet = getPet($id);
    $text = $_POST['text'];

    if(addListingComment($text, $pet['id']))
        header('Location: listing.php?id='.$pet['id']);
    else
        header('Location: index.php');
?>