<?php
    $input = $_GET['input'];
    include_once('database/connection.php');
    include_once('database/search.php');
    search($input)
?>