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
    <section id="edit_pet_profile">
      <div id="top">
        <img id ="petpic" src="images/puppy.jpg" alt="" width="65" height="65">
        <img id ="changepic" src="images/pen.png" alt="" width="35" height="35">
        
        <input id="nameText" form="updateInfo" type="description" name="bio" value="<?php echo $pet['name'] ?>" required>
        <p id="followers">Followers 30</p>
        <p id="following">Following 35</p>
        <input id="bioText" form="updateInfo" type="description" name="bio" value="<?php echo $pet['bio'] ?>" required>   
      </div>
      <div id="listing">
        <p id="warning">Este pet está para adoção, clique aqui para ver mais informaçao.</p>
      </div>

      <a href="index.php"><button id="removeListing" type="button">Remove Listing</button></a> <br>
      <form id="updateInfoForm" action="" method="post"> 
        <a href="index.php"><button id="updateInfo" type="button">Update Info</button></a>
      </form>
      <a href="index.php"><button id="deletePet" type="button">Delete Pet</button></a>
    </section>  
    <footer>
      <p>&copy; Petgram 2020</p>
    </footer>
  </body>
</html>
