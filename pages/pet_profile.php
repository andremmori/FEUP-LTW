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
    <section id="profile">
      <div id="top">
        <img id ="edit" src="images/edit.png" alt="" width="35" height="35">
        <img id ="petpic" src="images/puppy.jpg" alt="" width="65" height="65">
        <h1 id="name"><a href="pet_profile.php"><p><?php echo $pet['name'] ?></p></a></h1>
        <p id="followers">Followers 30</p>
        <p id="following">Following 35</p>
        <p id="bio"><a href="pet_profile.php"><?php echo $pet['bio'] ?></a></p>      </div>
      <div id="listing">
        <a href="listing.php?id=<?php echo $_GET['id'];?>"><p id="warning">Este pet está para adoção, clique aqui para ver mais informaçao.</p> </a>
      </div>
      <div id="gallery">
        <div class="row">
          <a href="post.php?id=1"><img src="images/puppy.jpg" alt="" width="65" height="65"></a>
          <a href="post.php?id=1"><img src="images/puppy.jpg" alt="" width="65" height="65"></a>
          <a href="post.php?id=1"><img src="images/puppy.jpg" alt="" width="65" height="65"></a>
        </div>
        <div class="row">
          <a href="post.php?id=1"><img src="images/puppy.jpg" alt="" width="65" height="65"></a>
          <a href="post.php?id=1"><img src="images/puppy.jpg" alt="" width="65" height="65"></a>
          <a href="post.php?id=1"><img src="images/puppy.jpg" alt="" width="65" height="65"></a>
        </div>
        <div class="row">
          <a href="post.php?id=1"><img src="images/puppy.jpg" alt="" width="65" height="65"></a>
          <a href="post.php?id=1"><img src="images/puppy.jpg" alt="" width="65" height="65"></a>
          <a href="post.php?id=1"><img src="images/puppy.jpg" alt="" width="65" height="65"></a>
        </div>
        <div class="row">
          <a href="post.php?id=1"><img src="images/puppy.jpg" alt="" width="65" height="65"></a>
        </div>
      </div>
    </section>
    <footer>
      <p>&copy; Petgram 2020</p>
    </footer>
  </body>
</html>
