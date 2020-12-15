<?php
    include_once('database/connection.php');
    include_once('database/inquiry.php');
    include_once('database/message.php');

    $id = $_POST['inquiryID'];

    if(sendMessage())
        header('Location: inquiry.php?id='.$id);
    else
        header('Location: index.php');
?>