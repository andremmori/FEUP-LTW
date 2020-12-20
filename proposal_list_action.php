<?php
    include_once('database/connection.php');
    include_once('database/proposal_list.php');
    include_once('database/pet.php');
    include_once('database/account.php');

    $petID = $_GET['petID'];
    $userID = $_GET['userID'];
    $proposalID = $_GET['proposalID'];
    $option = $_GET['option'];

    if($petID == null || $userID == null || $option == null || $proposalID == null) return false;

    echo $petID, '<br>';
    echo $userID, '<br>';
    echo $proposalID, '<br>';
    echo $option, '<br>';

    if($option == 'confirm')
    {
        $result = confirmProposal($petID, $userID, $proposalID);
        if($result)
            header('Location: index.php');
        else
            header('Location: proposal_list.php?id='.$petID);
    }       
    else
    {
        denyProposal($proposalID);
        header('Location: proposal_list.php?id='.$petID);
    }
        

    
?>