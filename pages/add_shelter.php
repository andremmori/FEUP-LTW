<?php include_once('database/connection.php') ?>
<!DOCTYPE html>
<html lang="en-US">

<head>
    <title>Add Shelter</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/home.css" rel="stylesheet">
    <link href="css/form.css" rel="stylesheet">
    <link rel="icon" href="images/icon.jpg">
</head>


<body>
    <?php include_once('hotbar.php') ?>
    <?php include_once('sidebar.php') ?>

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
    </div>
    <footer>
        <p>&copy; Petgram 2020</p>
    </footer>
</body>

</html>