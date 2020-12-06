<?php include_once('database/connection.php')?>
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
    <section id="inquiry">
      <div id=top>
        <h1>Conversa com: Dono desnaturado</h1>
      </div>
      <div id="chat">
        <div class="message_user">
          <p id="message">quanto é o bro?</p>
        </div>
        <div class="message_owner">
          <img src="images/pfp.png" alt="" width="65" height="65">
          <div id="messageBox">
            <p id="message">como assim bro é de graça como assim bro é de graça como assim bro é de graça como assim bro é de graça como assim bro é de graça</p>
          </div>
        </div>
        <div class="message_user">
          <p id="message">ah sbem orienta aí ent ah sbem orienta aí ent ah sbem orienta aí ent ah sbem orienta aí ent</p>
        </div>
      </div>
      <form id="sendMessage" action="" method="post"> <!-- action="send_message.php"-->
        <input id="messageText" type="text" name="message" required>
        <input type="submit" value="Send">
      </form>
    </section>
    <footer>
      <p>&copy; Petgram 2020</p>
    </footer>
  </body>
</html>
