<?php
include_once('database/connection.php');
include_once('database/pet.php');

$id = $_GET['id'];
$pet = getPet($id);
if(removeListing($pet['id']))
    header('Location: pet_profile.php?id='. $pet['id']);
else
    header('Location: edit_pet_profile.php?id='.$pet['id']);
?>