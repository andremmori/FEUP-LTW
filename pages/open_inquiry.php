<?php
    include_once('database/connection.php');
    include_once('database/inquiry.php');
    include_once('database/pet.php');

    $id = $_GET['id'];

    
    if($inquiryID = checkInquiry($id)) header('Location: inquiry.php?id='.$inquiryID);
    else {
        $inquiryID = addInquiry($id);
        header('Location: inquiry.php?id='.$inquiryID);
    }
?>