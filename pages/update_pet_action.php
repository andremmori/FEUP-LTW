<?php
include_once('database/connection.php');
include_once('database/pet.php');

$id = $_GET['id'];
if(updatePet($id))
    header('Location: pet_profile.php?id='. $id);
else
    header('Location: edit_pet_profile.php?id='.$id);
?>