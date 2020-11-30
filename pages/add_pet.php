<!DOCTYPE html>
<html lang="en-US">
  <head>
    <title>Petgram</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/home.css" rel="stylesheet">
    <link rel="icon" href="images/icon.jpg">
    <script src="script.js" defer></script>
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
    <section id="addPet">
      <div id="auxDiv">
          <h2>Create a profile for your pet!<h2>
          <h4>You can create a profile for a single pet or create a profile for a group of pets</h4>
          <form id="addPetForm" action="" method="get">
            <input type="radio" name="individual_group" value="individual">Individual
            <input type="radio" name="individual_group" value="group">Group <br>
            <div id="newFields">
            </div>
          <form>
        </div>
      </div>          
    </section>
    <footer>
      <p>&copy; Petgram 2020</p>
    </footer>
  </body>
</html>