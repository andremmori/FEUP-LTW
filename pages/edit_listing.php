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

    <form action="update_listing_action.php?id=<?php echo $pet['id'] ?>" method="post">
        <div id="edit_listing">
            <div id="auxDiv">
                <input id="descriptionText" type="description" name="description" value="<?php echo $pet['description'] ?>" required>     
                <p>List of requirements to adopt this pet:</p>
                <input id="requirementsText" type="description" name="requirements" value="<?php echo $pet['requirements']?>" required>          
            </div>     
            <button id="updateInfo" type="submit">Update Info</button>
      </div>
    </form>

    <footer>
        <p>&copy; Petgram 2020</p>
    </footer>
</body>

</html>