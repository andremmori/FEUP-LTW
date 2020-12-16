<?php 
include_once('database/connection.php');
include_once('database/pet.php');
include_once('database/account.php');
include_once('database/inquiry.php');

// Get current inquiry's id and info from db
$id = $_GET['id'];
$inquiry = getInquiry($id);
if ($inquiry == null) header('Location: index.php');


//Get comments from pet
$messages = getInquiryMessages($id);


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
    <section id="inquiry">
      <div id=top>
        <h1>Inquiry about <?php echo $messages[0]['name'] ?></h1>
      </div>
      <div id="chat">
                <?php foreach ($messages as $message) echo getInquiryMessage($message); ?>
                <form id="sendMessage" action="send_message.php" method="post">
                  <input type="hidden" name="inquiryID" value="<?php echo $id?>">
                  <input type="hidden" name="petOwner" value="<?php echo $messages[0]['petOwner'] ?>">
                  <input id="messageText" type="text" name="message" required>
                  <input type="hidden" name="date" value=<?php echo date('d/m/Y');?>>
                  <button type="submit">Send</button>
                </form>
      </div>
    </section>
    <footer>
      <p>&copy; Petgram 2020</p>
    </footer>
  </body>
</html>
