<?php include_once('database/connection.php')?>
<!DOCTYPE html>
<html lang="en-US">
  <head>
    <title>Petgram</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/home.css" rel="stylesheet">
    <link rel="icon" href="images/icon.jpg">
  </head>
  <body>
    <div id="hotBar">
      <h1>Petgram</h1>
      <a href=""><img src="images/home.png" alt="" width="50" height="50"></a>
      <a href="register.php"><img src="images/profile.png" alt="" width="50" height="50"></a>
      <a href=""><img src="images/search.png" alt="" width="50" height="50"></a>
      <a href=""><img src="images/settings.png" alt="" width="50" height="50"></a>
      <a href=""><img src="images/logout.png" alt="" width="50" height="50"></a>
    </div>
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
    <section id="proposal">
      <div id="div1">
          <h2>Make a proposal to adopt this pet!<h2>
           <form id="makeProposal" action="" method="post"> <!-- action="make_proposal.php"-->
                <input type="hidden" name="userId" value="<?php echo $_SESSION['id'] ?>">
               <!-- 
                <input type="hidden" name="petID" value="">
                <input type="hidden" name="accountID" value="">             -->
                <input type="hidden" name="date" value=date('now')> 
                <input type="hidden" name="status" value='PENDING'> 

            </form>
            <textarea form=makeProposal name="text" type="text" rows="15" cols="100" placeholder="Write something here" required></textarea>
            <br>
            <button type="submit">Submit</button>
      </div>
    </section>
    <footer>
      <p>&copy; Petgram 2020</p>
    </footer>
  </body>
</html>
