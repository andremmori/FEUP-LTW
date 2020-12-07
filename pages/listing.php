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
        <h1 id="name"><p><?php echo $pet['name'] ?></p></h1>
        <p id="followers">Followers 30</p>
        <p id="following">Following 35</p>
        <p id="bio"><?php echo $pet['bio'] ?></p>      
      </div>
      <div id="listing">
      <p><?php echo $pet['description'] ?></p>
        <p>List of requirements to adopt this pet:</p>
        <ul>
          <li><?php echo $pet['requirements']?></li>
        </ul>
        <div id="comments">
          <div class="comment">
            <img src="images/pfp.png" alt="" width="65" height="65">
              <div id="username">
                <p>Johnny</p>
              </div>
              <div id="text">
                <p>omd quem me dera adota-lo é tao fofo!!!</p>
              </div>
          </div>
          <div class="comment">
            <img src="images/pfp.png" alt="" width="65" height="65">
              <div id="username">
                <p>Zé</p>
              </div>
              <div id="text">
                <p>sou alergico a caes :(</p>
              </div>
          </div>
          <form id="postComment" action="" method="post"> <!-- action="post_comment.php"-->
            <input id="commentText" type="text" name="comment" required>
            <input type="submit" value="Comment">
          </form>
        </div>

        <div id="inquiry">
          <a href="inquiry.php?id=<?php echo $_GET['id'];?>"><p>Message the owner about the adoption.</p></a>
        </div>

        <div id="proposal">
          <a href="proposal.php?id=<?php echo $_GET['id'];?>"><p>Make an addoption proposal to the owner.</p></a>
        </div>
      </div>
      <div id="gallery">
        <div class="row">
          <img src="images/puppy.jpg" alt="" width="65" height="65">
          <img src="images/puppy.jpg" alt="" width="65" height="65">
          <img src="images/puppy.jpg" alt="" width="65" height="65">
        </div>
        <div class="row">
          <img src="images/puppy.jpg" alt="" width="65" height="65">
          <img src="images/puppy.jpg" alt="" width="65" height="65">
          <img src="images/puppy.jpg" alt="" width="65" height="65">
        </div>
        <div class="row">
          <img src="images/puppy.jpg" alt="" width="65" height="65">
          <img src="images/puppy.jpg" alt="" width="65" height="65">
          <img src="images/puppy.jpg" alt="" width="65" height="65">
        </div>
        <div class="row">
          <img src="images/puppy.jpg" alt="" width="65" height="65">
        </div>
      </div>
    </section>
    <footer>
      <p>&copy; Petgram 2020</p>
    </footer>
  </body>
</html>
