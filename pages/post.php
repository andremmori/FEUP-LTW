<?php
include_once('database/connection.php');

include_once('database/account.php');
include_once('database/pet.php');
include_once('database/post.php');
include_once('database/postcomment.php');

// Get current post's id and info from db
$id = $_GET['id'];
$post = getPost($id);
if ($post == null) header('Location: index.php');

// Get pet from post
$pet = getPet($post['petID']);
if ($pet == null) header('Location: index.php');

//Get comments from post
$comments = getPostComments($id);
if ($comments == null) header('Location: index.php');
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
                <p><?php echo $pet['name'] ?></p>
            </div>
            <img src="images/post/<?php echo $post['photo']?>" alt="">
            <div id="description">
                <p><?php echo $pet['name'] ?></p>
                <p><?php echo $post['description'] ?></p>
                <a href=""><img src="images/like.png" alt="" width="35" height="35"></a>
                <p><?php echo $post['likes'] ?> Likes</p>
                <a href=""><img src="images/comment.png" alt="" width="35" height="35"></a>
                <p><?php echo count($comments) ?> Comments</p>
                <p><?php echo $post['date'] ?></p>
            </div>
            <div id="comments">
                <?php foreach ($comments as $comment) echo getPostComment($comment); ?>
                <form id="postComment" action="" method="post">
                    <!-- action="post_comment.php"-->
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