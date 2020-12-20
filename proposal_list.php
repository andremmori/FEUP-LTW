<?php
include_once('database/connection.php');
include_once('database/pet.php');
include_once('database/proposal.php');

// Get current pet's id and info from db
$id = $_GET['id'];
$pet = getPet($id);
if ($pet == null) header('Location: index.php');

$proposals = getPendingProposals($id);
//print_r($proposals);
if ($proposals == [-1]) echo 'ohno<br>';//header('Location: index.php');

?>


<!DOCTYPE html>
<html lang="en-US">
  <head>
    <title>Proposal List</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/home.css" rel="stylesheet">
    <link rel="icon" href="images/icon.jpg">
    <script src="js/proposal_list.js" defer></script>
  </head>
  <body>
    <?php include_once('hotbar.php') ?>
    <?php include_once('sidebar.php') ?>
    <section id="proposal_list">
      <div id="top">
        <h1>Adoption proposals for: <?php echo $pet['name'] ?></h1>
      </div>
      <div id="list">
        
        <?php     
          if(count($proposals) == 0)
            echo 'No proposals yet';
          else
            foreach($proposals as $proposal)
            {
              $user = fetchUser($proposal['userID']);
              $account = getAccount($user['id']);
              echo 
              '<div class="proposal">
                <div id="content">
                  <img src="images/profileImages/squared/'.$account['profilePic'].'.jpg" alt="" width="55" height="55">
                  <p id="username">'.$account['name'].'</p>
                  <p id="proposalMessage">'.$proposal['text'].'</p>
                  <p id="proposalDate">'.$proposal['date'].'</p>
                </div>
                <div id="confirmDeny">
                  <img class="confirm" src="images/confirm.png" alt="" width="30" height="30">
                  <img class="deny" src="images/deny.png" alt="" width="30" height="30">
                  <input type="hidden" name="petID" value="'.$id.'">
                  <input type="hidden" name="userID" value="'.$user['id'].'">
                  <input type="hidden" name="proposalID" value="'.$proposal['id'].'">
                </div>
              </div>';
            }           
        ?>
        
      <!--  
        <div class="proposal">
          <div id="content">
            <img src="images/pfp.png" alt="" width="55" height="55">
            <p id="username">Average pet fan</p>
            <p id="proposalMessage"> Deixa-me adotar o cão por favor por favor por favor por favor por favor por favor por favor por favor por favor por favor por favor por favor por favor por favor por favor por favor por favor por favor por favor por favor por favor por favor por favor por favor por favor por favor por favor  </p>
            <p id="proposalDate">31-08-2000</p>
          </div>
          <div id="confirmDeny">
            <img id="confirm" src="images/confirm.png" alt="" width="30" height="30">
            <img class="deny" src="images/deny.png" alt="" width="30" height="30">
          </div>
        </div>

        <div class="proposal">
          <div id="content">
            <img src="images/pfp.png" alt="" width="55" height="55">
            <p id="username">Average pet fan</p>
            <p id="proposalMessage">Este cao é muito fixe deixa me ficar com le pfv eu tenho casa juro </p>
          </div>
          <div id="confirmDeny">
            <img id="confirm" src="images/confirm.png" alt="" width="30" height="30">
            <img class="deny" src="images/deny.png" alt="" width="30" height="30">
          </div>
        </div>

        <div class="proposal">
          <div id="content">
            <img src="images/pfp.png" alt="" width="55" height="55">
            <p id="username">Average pet fan</p>
            <p id="proposalMessage">Im hungly plis gib dög</p>
          </div>
          <div id="confirmDeny">
            <img id="confirm" src="images/confirm.png" alt="" width="30" height="30">
            <img class="deny" src="images/deny.png" alt="" width="30" height="30">
          </div>
        </div>
          
          -->
      </div>
    </section>
    <footer>
      <p>&copy; Petgram 2020</p>
    </footer>
  </body>
</html>
