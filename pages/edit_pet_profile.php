<?php
include_once('database/connection.php');
include_once('database/pet.php');

// Get current pet's id and info from db
$id = $_GET['id'];
$pet = getPet($id);
if ($pet == null) header('Location: index.php');

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
                <p id="followers">Followers 30</p>
                <p id="following">Following 35</p>
                <input id="bioText" type="description" name="bio" value="<?php echo $pet['bio'] ?>" required>
            </div>
            <div id="listing">
                <p id="warning">Este pet está para adoção, clique aqui para ver mais informaçao.</p>
            </div>

            <a href="index.php"><button id="removeListing" type="button">Remove Listing</button></a> <br>
            <!-- <form id="updateInfoForm" action="" method="post"> -->
            <button id="updateInfo" type="submit">Update Info</button>
            <!-- </form> -->
            <a href="delete_pet_action.php?id=<?php echo $id ?>"><button id="deletePet" type="button">Delete Pet</button></a>
        </section>
    </form>

    <footer>
        <p>&copy; Petgram 2020</p>
    </footer>
</body>

</html>