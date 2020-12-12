<?php
include_once('database/connection.php');

include_once('database/account.php');
include_once('database/pet.php');
include_once('database/post.php');
include_once('database/postcomment.php');

// Get current post's id and info from db
$post_id = $_GET['id'];
$post = getPost($post_id);
if ($post == null) header('Location: index.php');

// Get pet from post
$pet = getPet($post['petID']);
if ($pet == null) header('Location: index.php');

//Get comments from post
$comments = getPostComments($post_id);
$likes = getPostLikes($post_id);
// if ($comments == null) header('Location: index.php');
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
    <section id="post">
        <article class="post">
            <div id="title">
                <a href="pet_profile.php"><img id="pet_profile_pic" src="images/puppy2.jpeg" alt="" width="65" height="65"></a>
                <a href="pet_profile.php">
                    <p><?php echo $pet['name'] ?></p>
                </a>
                <?php
                // Display option to edit only if its the owner
                if (isPetOwner($pet['id'], $_SESSION['user']['id']))
                    echo '<a href="edit_post.php?id=' . $post_id . '"> <img id="edit" src="images/three_dots.png" alt="" width="35" height="35"></a>';
                ?>
            </div>
            <img src="images/post/<?php echo $post['photo'] ?>" alt="">
            <div id="description">
                <a href="pet_profile.php">
                    <p><?php echo $pet['name'] ?></p>
                </a>
                <p><?php echo $post['description'] ?></p>
                <a href=""><img src="images/like.png" alt="" width="35" height="35"></a>
                <p><?php echo count($likes) ?> Likes</p>
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