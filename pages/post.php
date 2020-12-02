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
    <section id="post">
      <article class="post">
        <div id="title">
          <img src="images/puppy2.jpeg" alt="" width="65" height="65">
          <p>Doggy</p>
        </div>
        <img src="images/img1.jpg" alt="">
        <div id="description">
          <p>Title</p>
          <p>asdasdasd</p>
          <a href=""><img src="images/like.png" alt="" width="35" height="35"></a>
          <p>15 Likes</p>
          <a href=""><img src="images/comment.png" alt="" width="35" height="35"></a>
          <p>2 Comments</p>
          <p>30/11/2020</p>
        </div>
        <div id="comments">
            <div id="user">
            <img src="images/pfp.png" alt="" width="65" height="65">
              <div id="username">
                <p>Johnny</p>
              </div>
              <div id="text">
                <p>omg omg omg!!!</p>
              </div>
            </div>
            <div id="user">
            <img src="images/pfp.png" alt="" width="65" height="65">
              <div id="username">
                <p>Zé</p>
              </div>
              <div id="text">
                <p>w0w</p>
              </div>
            </div>
        </div>
      </article>
    </section>

    <footer>
      <p>&copy; Petgram 2020</p>
    </footer>
  </body>
</html>
