<?php include_once('database/connection.php');?>
<!DOCTYPE html>
<html lang="en">

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
            <img id="edit" src="images/edit.png" alt="" width="35" height="35">
            <img id="petpic" src="images/shelter_profile.jpeg" alt="" width="65" height="65">
            <h1 id="name">Good Boy Shelter</h1>
            <p id="followers">Followers 151</p>
            <p id="following">Following 4</p>
            <p id="bio">Sou um shelter muito bonito com varios animais fofinhos hihihi</p>
        </div>
        <div id="listing">
            <p>Estes são nossos good boys para adoção.</p>
        </div>
        <div id="gallery">
            <div class="row">
                <img src="images/puppy.jpg" alt="" width="65" height="65">
                <img src="images/puppy2.jpeg" alt="" width="65" height="65">
                <img src="images/puppy3.jpeg" alt="" width="65" height="65">
            </div>
            <div class="row">
                <img src="images/puppy4.jpeg" alt="" width="65" height="65">
            </div>
        </div>
    </section>
    <footer>
        <p>&copy; Petgram 2020</p>
    </footer>
</body>

</html>