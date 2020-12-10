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

// Check if user is the owner
if ($_SESSION['user']['id'] != $pet['ownerID']) header('Location: index.php');
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
    <section id="edit_post">
        <article class="post">
            <div id="title">
                <img id="pet_profile_pic" src="images/puppy2.jpeg" alt="" width="65" height="65">
                <p><?php echo $pet['name'] ?></p>
                <img id="edit" src="images/three_dots.png" alt="" width="35" height="35">
            </div>
            <img src="images/post/<?php echo $post['photo'] ?>" alt="">
            <div id="description">
                <p><?php echo $pet['name'] ?></p>
                <form id="updateDescription" action="update_post_action.php?id=<?php echo $id ?>" method="post">
                    <input id="commentText" type="description" name="description" value="<?php echo $post['description'] ?>" required>
                    <button type="submit">Update</button> <br>
                </form>
                <p><?php echo $post['date'] ?></p>
            </div>
            <a href="delete_post_action.php?id=<?php echo $id ?>"><button id="deleteButton" type="button">Delete Post</button></a>
        </article>
    </section>

    <footer>
        <p>&copy; Petgram 2020</p>
    </footer>
</body>

</html>