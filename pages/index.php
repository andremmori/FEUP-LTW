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
    <section id="feed">
      <article class="post">
        <div id="top">
          <img src="images/puppy.jpg" alt="" width="65" height="65">
          <h1>Bobi</h1>
        </div>
        <img src="images/img1.jpg" alt="">
        <div id="bottom">
          <p>Bobi</p>
          <p>Hoje fui nadar! #afogeui-me #glugluglu</p>
          <p>15/11/2020</p>
        </div>
      </article>
      <article class="post">
        <div id="top">
          <img src="images/puppy.jpg" alt="" width="65" height="65">
          <h1>Bobi</h1>
        </div>
        <img src="images/img1.jpg" alt="">
        <div id="bottom">
          <p>Bobi</p>
          <p>Hoje fui nadar! #afogeui-me #glugluglu</p>
          <p>15/11/2020</p>
        </div>
      </article>
      <article class="post">
        <div id="top">
          <img src="images/puppy.jpg" alt="" width="65" height="65">
          <h1>Bobi</h1>
        </div>
        <img src="images/img1.jpg" alt="">
        <div id="bottom">
          <p>Bobi</p>
          <p>Hoje fui nadar! #afogeui-me #glugluglu</p>
          <p>15/11/2020</p>
        </div>
      </article>

    </section>
    <footer>
      <p>&copy; Petgram 2020</p>
    </footer>
  </body>
</html>
