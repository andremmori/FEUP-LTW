<head>
    <link href="css/main_page.css" rel="stylesheet">
</head>
<div id="hotBar">
    <h1>Petgram</h1>
    <a href="/"><img src="images/home.png" alt="" width="50" height="50"></a>
    <a href="register.php"><img src="images/profile.png" alt="" width="50" height="50"></a>
    <a href=""><img src="images/search.png" alt="" width="50" height="50"></a>
    <a href=""><img src="images/settings.png" alt="" width="50" height="50"></a>
    <a href=""><img src="images/logout.png" alt="" width="50" height="50"></a>
    <button id="login-btn" onclick="document.getElementById('login-modal').style.display='block'">Login</button>
    <!-- <button id="signup">SignUp</button> -->
    <span><?php echo $_SESSION['id']?></span>
</div>
<?php
    include_once('modal/login.php');
?>
<script>
    // Get the modal
    var modal = document.getElementById('login-modal');

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>