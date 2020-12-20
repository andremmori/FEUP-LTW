<?php
    include_once('database/connection.php');
    include_once('database/pet.php');
    include_once('database/search.php');

    $input = $_GET['input'];

    search($input)
?>