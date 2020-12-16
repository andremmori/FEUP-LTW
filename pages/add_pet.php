<?php 
  
  include_once('database/connection.php');
  $id = $_SESSION['user']['id'];
?>

<!DOCTYPE html>
<html lang="en-US">
  <head>
    <title>Add Pet</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/home.css" rel="stylesheet">
    <link rel="icon" href="images/icon.jpg">
    <script src="js/add_pet.js" defer></script>
    <script src="js/upload.js" defer></script>
  </head>
  <body>
    <?php include_once('hotbar.php') ?>
    <?php include_once('sidebar.php') ?>
    <section id="addPet">
      <div id="auxDiv">
          <h2>Create a profile for your pet!<h2>
          <h4>You can create a profile for a single pet or create a profile for a group of pets</h4>
          <form id="addPetForm" action="add_pet_action.php" method="post" enctype="multipart/form-data">
            <input type="radio" name="individual_group" value="individual">Individual
            <input type="radio" name="individual_group" value="group">Group <br>
            <input id="input" type="file" name="image" onchange="selectImage(event)" > <br>
            <div id="uploadedImage"> </div> <br>
            <label>Pet profile name: <input form="addPetForm" type="text" name="name" required></label> 
            <input type="hidden" name="userID" value="<?php echo $id?>">          
          </form>
          <div id="newFields"> </div>
      </div>
    </section>
    <footer>
      <p>&copy; Petgram 2020</p>
    </footer>
  </body>
</html>