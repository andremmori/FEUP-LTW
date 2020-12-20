<?php
    include_once('database/connection.php');
    include_once('database/inquiry.php');
    include_once('database/pet.php');

    $id = $_GET['id'];
    $pet = getPet($id);


    
    if($inquiryID = checkInquiry($pet['id'])) header('Location: inquiry.php?id='.$inquiryID);
    else {
        $inquiryID = addInquiry($pet['id']);
        header('Location: inquiry.php?id='.$inquiryID);
    }
?>