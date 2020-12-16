<?php include_once('database/connection.php') ?>
<!DOCTYPE html>
<html lang="en-US">
  <head>
    <title>Search</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/home.css" rel="stylesheet">
    <link rel="icon" href="images/icon.jpg">
    <script src="js/search.js" defer></script>
  </head>
  <body>
    <?php include_once('hotbar.php') ?>
    <?php include_once('sidebar.php') ?>
    <section id="search">
      <div id="header">
        <h1>Find pets by entering their name or breed!</h1>
      </div>
      <div id="searchBar">
        <img src="images/search.png" alt="search_action.php" width="30" height="30" >
        <input id="input" type="text" name="input" onchange="receiveData(this.value)" required>
      </div>
      <div id="searchResults">
      </div>
    </section>
    <footer>
      <p>&copy; Petgram 2020</p>
    </footer>
  </body>
</html>
