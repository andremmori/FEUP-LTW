<?php
include_once('database/connection.php');
include_once('database/pet.php');

// Get current pet's id and info from db
$id = $_GET['id'];
$pet = getPet($id);
if ($pet == null) header('Location: index.php');

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
        <h1>Adoption proposals to: <?php echo $pet['name'] ?></h1>
      </div>
      <div id="list">
        <div class="proposal">
          <div id="content">
            <img src="images/pfp.png" alt="" width="55" height="55">
            <p id="username">Average pet fan</p>
            <p id="proposalMessage"> Deixa-me adotar o cão por favor por favor por favor por favor por favor por favor por favor por favor por favor por favor por favor por favor por favor por favor por favor por favor por favor por favor por favor por favor por favor por favor por favor por favor por favor por favor por favor  </p>
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

      </div>
    </section>
    <footer>
      <p>&copy; Petgram 2020</p>
    </footer>
  </body>
</html>
