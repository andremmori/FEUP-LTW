<?php include_once('database/connection.php') ?>
<!DOCTYPE html>
<html lang="en-US">

<head>
    <title>Petgram</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/home.css" rel="stylesheet">
    <link href="css/form.css" rel="stylesheet">
    <link rel="icon" href="images/icon.jpg">
</head>


<body>
    <?php include_once('hotbar.php') ?>

    <section id="addShelter">
        <div id="auxDiv">
            <h2>Create a page for your shelter!<h2>
            <form id="addShelterForm" action="add_shelter_action.php" method="POST">
                <input type="hidden" name="userId" value="<?php echo $_SESSION['id'] ?>">
                <br>
                <br>
                <label class="addShelterLabel" for="name"> Shelter Name: </label>
                <input name="name" type="text" required>
                <br>
                <br>
                <label class="addShelterLabel" for="address"> Shelter Address:</label>
                <input name="address" type="text" required>
                <br>
                <br>
                <button type="submit">Submit</button>
            </form>
        </div>
    </section>
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
    </div>
    <footer>
        <p>&copy; Petgram 2020</p>
    </footer>
</body>

</html>