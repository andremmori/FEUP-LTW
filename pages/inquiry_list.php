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
    <title>Petgram</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/home.css" rel="stylesheet">
    <link rel="icon" href="images/icon.jpg">
  </head>
  <body>
    <?php include_once('hotbar.php') ?>
    <?php include_once('sidebar.php') ?>
    <section id="inquiry_list">
      <div id="top">
        <h1>List of conversations about: <?php echo $pet['name'] ?></h1>
      </div>
      <div id="list">
        <a href="inquiry.php?id=1"><div class="conversation">
          <img src="images/pfp.png" alt="" width="55" height="55">
          <p id="username">Average pet fan</p>
          <p id="lastMessage">Ultima mensUltima mensageUltima mensagem enviada m enviada Ultima mensagem enviada agem enviada </p>
        </div></a>
        <a href="inquiry.php?id=1"><div class="conversation">
          <img src="images/pfp.png" alt="" width="55" height="55">
          <p id="username">Average pet fan</p>
          <p id="lastMessage">Ultima mensUltima mensageUltima mensagem enviada m enviada Ultima mensagem enviada agem enviada </p>
        </div></a>
        <a href="inquiry.php?id=1"><div class="conversation">
          <img src="images/pfp.png" alt="" width="55" height="55">
          <p id="username">Average pet fan</p>
          <p id="lastMessage">Ultima mensUltima mensageUltima mensagem enviada m enviada Ultima mensagem enviada agem enviada </p>
        </div></a>
      </div>
    </section>
    <footer>
      <p>&copy; Petgram 2020</p>
    </footer>
  </body>
</html>
