<div id="login-modal" class="modal">
    <form class="modal-content animate" action="/login_action.php" method="post">
        <div class="imgcontainer">
            <span onclick="document.getElementById('login-modal').style.display='none'" class="close" title="Close Modal">&times;</span>
            <!-- <img src="img_avatar2.png" alt="Avatar" class="avatar"> -->
            <h1>Petgram</h1>
        </div>
        <br>
        <div id="container">
                <label for="email"><b>Email</b></label>
                <input id="modal-input" type="text" placeholder="Enter Email" name="email" required>
                <br>
                <br>
                <label for="password"><b>Password</b></label>
                <input id="modal-input" type="password" placeholder="Enter Password" name="password" required>
                <br>
                <br>
                <button id="btn" type="submit">Login</button>
        </div>

        <div id="container" style="background-color:#f1f1f1">
            <button type="button" onclick="document.getElementById('login-modal').style.display='none'" class="cancelbtn">Cancel</button>
        </div>
    </form>
</div>