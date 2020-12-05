<?php
    include_once('database/connection.php');
    include_once('database/proposal.php');

    if(makeProposal())
        header('Location: listing.php'); // Redirect to listing page if succesful
    else
        header('Location: proposalPage.php'); // Redirect to proposal page if unsuccesful
?>