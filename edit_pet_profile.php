<?php
include_once('database/connection.php');
include_once('database/pet.php');
include_once('database/favourite.php');

// Get current pet's id and info from db
$id = $_GET['id'];
$pet = getPet($id);
if ($pet == null || !isPetOwner($pet['id'])) header('Location: index.php');

?>
<!DOCTYPE html>
<html lang="en-US">

<head>
    <title>Edit Pet Profile</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/home.css" rel="stylesheet">
    <link rel="icon" href="images/icon.jpg">
</head>

<body>
    <?php include_once('hotbar.php') ?>
    <?php include_once('sidebar.php') ?>

    <form action="update_pet_action.php?id=<?php echo $pet['id'] ?>" method="post">
        <section id="edit_pet_profile">
            <div id="top">
                <img id="petpic" src="images/profileImages/squared/<?php echo $pet['profilePic'] ?>.jpg" alt="" width="65" height="65">
                <img id="changepic" src="images/pen.png" alt="" width="35" height="35">
                <input id="nameText" type="description" name="name" value="<?php echo $pet['name'] ?>" required>
                <p id="followers"><?php echo getNumber($pet['id']) ?> Followers</p>
                <input id="bioText" type="description" name="bio" value="<?php echo $pet['bio'] ?>" required>
            </div>

            <?php
                if(isset($pet['description']) && isset($pet['requirements'])){
                    echo '<a href="remove_listing_action.php?id='.$pet['id'].'"><button id="removeListing" type="button">Remove Listing</button></a> <br>';
                }
                else {
                    echo '<a href="add_listing_action.php?id='.$pet['id'].'"><button id="addListing" type="button">Add Listing</button></a> <br>';
                }
            ?>

            <!-- <form id="updateInfoForm" action="" method="post"> -->
            <button id="updateInfo" type="submit">Update Info</button>
            <!-- </form> -->
            <a href="delete_pet_action.php?id=<?php echo $pet['id'] ?>"><button id="deletePet" type="button">Delete Pet</button></a>
        </section>
    </form>

    <footer>
        <p>&copy; Petgram 2020</p>
    </footer>
</body>

</html>