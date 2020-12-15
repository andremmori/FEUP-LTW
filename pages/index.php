<?php
include_once('database/connection.php');
include_once('database/pet.php');
include_once('database/post.php');

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
    <section id="feed">
        <?php
            $posts = getFavouritePetsPost($_SESSION['user']['id']);
            if(count($posts) == 0)
                echo 'No favourites yet';
            else
                foreach($posts as $post)
                    echo makeFeedPost($post);
        ?>
    </section>
    <footer>
        <p>&copy; Petgram 2020</p>
    </footer>
</body>

</html>