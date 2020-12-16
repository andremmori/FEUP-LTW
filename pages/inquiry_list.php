<?php 
include_once('database/connection.php');
include_once('database/pet.php');
include_once('database/inquirylist.php');
include_once('database/inquiry.php');

// Get current pet's id and info from db
$id = $_GET['id'];
$pet = getPet($id);
if ($pet == null) header('Location: index.php');

$inquiries = getInquiryList($id);

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
        <?php foreach ($inquiries as $inquiry) echo getInquiryInfo($inquiry); ?>
      </div>
    </section>
    <footer>
      <p>&copy; Petgram 2020</p>
    </footer>
  </body>
</html>
