<?php
    include_once('database/connection.php');
    include_once('database/proposal.php');

    $id = $_POST['petId'];

    if(makeProposal())
        header('Location: listing.php?id='.$id);
    else
        header('Location: index.php');
?>