<!DOCTYPE html>
<html lang="en-US">

<head>
    <title>Petgram</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/initial_page.css" rel="stylesheet">
    <link href="css/modal.css" rel="stylesheet">
    <script src="js/modal.js"></script>
    <script src="js/upload.js"></script>
    <link rel="icon" href="images/icon.jpg">
</head>

<body>
    <header>
        <h1>Petgram</h1>
        <h2>The best pet social media for adoption!</h2>
    </header>

    <form action="/register_action.php" method="POST">
        <div class="container">
            <h1>Register</h1>
            <p>Please fill in this form to create an account.</p>
            <hr>

            <label for="name"><b>Name</b></label>
            <input id="initial-input" type="text" placeholder="Enter Name" name="name" id="name" required>

            <label for="email"><b>Email</b></label>
            <input id="initial-input" type="email" placeholder="Enter Email" name="email" id="email" required>

            <label for="password"><b>Password</b></label>
            <input id="initial-input" type="password" placeholder="Enter Password" name="password" id="password" required>

            <label for="repeat"><b>Repeat Password</b></label>
            <input id="initial-input" type="password" placeholder="Repeat Password" name="repeat" id="repeat" required>

            <label for="image"><b>Upload a Profile Picture</b></label> <br>
            <input id="initial-input" type="file" name="image" onchange="selectImage(event)" > <br>
            <div id="uploadedImage"> </div> <br>
            <hr>
            <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>

            <button type="submit" class="registerbtn">Register</button>
        </div>

        <div class="container signin">
            <p>Already have an account? <a type="button" href="#" id="" onclick="document.getElementById('login-modal').style.display='block'">Sign in</a>.</p>
        </div>
    </form>
    <footer>
        <p>&copy; Petgram 2020</p>
    </footer>

    <?php
    include_once('modal/login.php');
    ?>
</body>

</html>