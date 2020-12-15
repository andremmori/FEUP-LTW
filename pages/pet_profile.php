<?php
include_once('database/connection.php');
include_once('database/favourite.php');
include_once('database/pet.php');

// Get current pet's id and info from db
$id = $_GET['id'];
$pet = getPet($id);
if ($pet == null) header('Location: index.php');

?>
<!DOCTYPE html>
<html lang="en-US">

<head>
    <title>Petgram</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/home.css" rel="stylesheet">
    <link rel="icon" href="images/icon.jpg">
    <script src="js/pet_profile.js" defer></script>
</head>

<body>
    <?php include_once('hotbar.php') ?>
    <?php include_once('sidebar.php') ?>
    <section id="profile">
        <div id="top">
            <?php
                if(isPetOwner($pet['id'])){
                    echo $pet['id'];
                    echo '<a href="add_post.php?id='.$pet['id'].'"><img id="postpic" src="images/addPicture.png" alt="" width="35" height="35"></a>';
                    echo '<a href="edit_pet_profile.php?id='.$pet['id'].'"><img id="edit" src="images/edit.png" alt="" width="35" height="35"></a>';
                }
            ?>
            <?php
            if (!isPetOwner($pet['id']))
                if (isFavourite($_SESSION['user']['id'], $pet['id']))
                    echo '<img id ="fav" src="images/favourited.png" alt="" width="35" height="35" onclick="unfavouritePet(' . $_SESSION['user']['id'] . ',' . $pet['id'] . ')">';
                else
                    echo '<img id ="fav" src="images/unfavourited.png" alt="" width="35" height="35" onclick="favouritePet(' . $_SESSION['user']['id'] . ',' . $pet['id'] . ')">';

            ?>
            <img id="petpic" src="images/profileImages/squared/<?php echo $pet['profilePic'] ?>.jpg" alt="" width="65" height="65">
            <h1 id="name"><?php echo $pet['name'] ?></h1>
            <p id="followers">Followers 30</p>
            <p id="following">Following 35</p>
            <p id="bio"><?php echo $pet['bio'] ?></p>
        </div>
        <div id="listing">
            <a href="listing.php?id=<?php echo $_GET['id']; ?>">
                <p id="warning">Este pet está para adoção, clique aqui para ver mais informaçao.</p>
            </a>
        </div>
        <div id="gallery">
            <?php
                $posts = getPetPosts($pet['id']);
                $numPosts = count($posts);
                $i = 0;
                while($i < $numPosts)
                {
                    $j = 0;
                    echo '<div class="row">';
                    while($j < 3 && $i < $numPosts)
                    {
                        echo '<a href="post.php?id='.$posts[$i]['id'].'"><img src="images/petImages/squared/'.$posts[$i]['photo'].'.jpg" alt="" width="65" height="65"></a>';
                        $j++;
                        $i++;
                    }
                    echo '</div>';
                }
            ?>
        </div>
    </section>
    <footer>
        <p>&copy; Petgram 2020</p>
    </footer>
</body>

</html>