<?php
include_once('database/connection.php');
include_once('database/listing.php');
include_once('database/pet.php');

$id = $_GET['id'];
$pet = getPet($id);
$description = $_POST['description'];
$requirements = $_POST['requirements'];

if(updateListing($description, $requirements, $pet['id']))
    header('Location: listing.php?id='. $pet['id']);
else
    header('Location: edit_listing.php?id='.$pet['id']);
?>