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
    <div id="hotBar">
      <h1>Petgram</h1>
      <a href=""><img src="images/home.png" alt="" width="50" height="50"></a>
      <a href="register.php"><img src="images/profile.png" alt="" width="50" height="50"></a>
      <a href=""><img src="images/search.png" alt="" width="50" height="50"></a>
      <a href=""><img src="images/settings.png" alt="" width="50" height="50"></a>
      <a href=""><img src="images/logout.png" alt="" width="50" height="50"></a>
    </div>
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
        <p>Este cão ta todo lixado por favor alguem o adote</p>
        <p>Lista de requirements para o bicho:</p>
        <ul>
          <li>Tomem conta dele so pff</li>
          <li>Dêem-lhe comida e teto i guess</li>
          <li>Ah e carinho</li>
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
          <a href="inquiry.php"><p>Message the owner about the adoption.</p></a>
        </div>

        <div id="proposal">
          <a href="proposal.php"><p>Make an addoption proposal to the owner.</p></a>
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
