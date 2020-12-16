<?php 
include_once('database/connection.php');
include_once('database/pet.php');
include_once('database/account.php');
include_once('database/listingcomment.php');

// Get current pet's id and info from db
$id = $_GET['id'];
$pet = getPet($id);
if ($pet == null) header('Location: index.php');


//Get comments from pet
$comments = getListingComments($id);
//if ($comments == null) header('Location: index.php');

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
                <?php foreach ($comments as $comment) echo getListingComment($comment); ?>
                <form id="postComment" action="" method="post">
                    <!-- action="post_comment.php"-->
                    <input id="commentText" type="text" name="comment" required>
                    <input type="submit" value="Comment">
                </form>
        </div>

        <div id="inquiry">
            <?php 
                if(isPetOwner($pet['id'])) echo '<a href="inquiry_list.php?id='.$pet['id'].'"><p>Check inquiries about this pet</p></a>';
                else echo '<a href="inquiry.php?id='.$pet['id'].'"<p>Message the owner about the adoption.</p></a>';
            ?>
        </div>

        <div id="proposal">
        <?php 
                if(isPetOwner($pet['id'])) echo '<a href="proposal_list.php?id='.$pet['id'].'"><p>Check proposals to adopt this pet</p></a>';
                else echo '<a href="proposal.php?id='.$pet['id'].'"<p>Make an addoption proposal to the owner.</p></a>';
            ?>
          
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
