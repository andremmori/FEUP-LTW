<?php
    include_once('database/connection.php');
    include_once('database/pet.php');

    $id = $_GET['id'];
    $pet = getPet($id);
    echo $pet['id'];
    deletePet($pet['id']);
    //header('Location: index.php');
?>