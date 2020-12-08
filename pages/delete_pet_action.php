<?php
    include_once('database/connection.php');
    include_once('database/pet.php');

    $id = $_GET['id'];
    deletePet($id);
    header('Location: index.php');
?>