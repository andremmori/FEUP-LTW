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
    <<?php include_once('hotbar.php') ?>
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
          <div class="comment">
            <img src="images/pfp.png" alt="" width="65" height="65">
              <div id="username">
                <p>Johnny</p>
              </div>
              <div id="text">
                <p>omg omg omg!!!</p>
              </div>
          </div>
          <div class="comment">
            <img src="images/pfp.png" alt="" width="65" height="65">
              <div id="username">
                <p>Zé</p>
              </div>
              <div id="text">
                <p>w0w</p>
              </div>
          </div>
          <form id="postComment" action="" method="post"> <!-- action="post_comment.php"-->
            <input id="commentText" type="text" name="comment" required>
            <input type="submit" value="Comment">
          </form>
        </div>
      </article>
    </section>

    <footer>
      <p>&copy; Petgram 2020</p>
    </footer>
  </body>
</html>
