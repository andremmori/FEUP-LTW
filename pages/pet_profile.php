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
    <aside id="sideBar">
      <div id="user">
        <img src="images/pfp.png" alt="" width="65" height="65">
        <div id="username">
          <p>Average pet fan</p>
          <p>petfan123</p>
        </div>
      </div>
      <p>Pets:</p>
      <ul>
        <li>Animal 1</li>
        <li>Animal 2</li>
        <li>Animal 3</li>
      </ul>
      <img src="images/petAdd.png" alt="" width="35" height="35">
    </aside>
    <section id="profile">
      <div id="top">
        <img id ="edit" src="images/edit.png" alt="" width="35" height="35">
        <img id ="petpic" src="images/puppy.jpg" alt="" width="65" height="65">
        <h1 id="name">Bobi</h1>
        <p id="followers">Followers 30</p>
        <p id="following">Following 35</p>
        <p id="bio">Eu sou um bobi muito fixe woof woof woof woof woof woof woof woof woof woof woof woof woof woof woof woof</p>
      </div>

      <div id="listing">
        <a href="listing.php"><p id="warning">Este pet está para adoção, clique aqui para ver mais informaçao.</p> </a>
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
