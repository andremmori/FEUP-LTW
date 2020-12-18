<?php
include_once('database/connection.php');
include_once('database/listing.php');

$id = $_GET['id'];
$description = $_POST['description'];
$requirements = $_POST['requirements'];

if(updateListing($description, $requirements, $id))
    header('Location: listing.php?id='. $id);
else
    header('Location: edit_listing.php?id='.$id);
?>