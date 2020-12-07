<?php
include_once('database/connection.php');

include_once('database/search.php');

// Get current post's id and info from db
$input = $_GET['input'];
if($input != "") 
{
  $contents = search($input);
  foreach($contents as $content)
  {
    echo $content;
  }
}
/*
$post = getPost($id);
if ($post == null) header('Location: index.php');

// Get pet from post
$pet = getPet($post['petID']);
if ($pet == null) header('Location: index.php');

//Get comments from post
$comments = getPostComments($id);
if ($comments == null) header('Location: index.php');*/
?>

<!DOCTYPE html>
<html lang="en-US">
  <head>
    <title>Petgram</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/home.css" rel="stylesheet">
    <link rel="icon" href="images/icon.jpg">
    <script src="search.js" defer></script>
  </head>
  <body>
    <?php include_once('hotbar.php') ?>
    <?php include_once('sidebar.php') ?>
    <section id="search">
      <div id="searchBar">
        <form id="searchBarForm" method="get">
          <img src="images/search.png" alt="search_action.php" width="30" height="30">
          <input id="input" type="text" name="input" required>
        </form>
      </div>
      <div id="searchResults">
      </div>
    </section>
    <footer>
      <p>&copy; Petgram 2020</p>
    </footer>
  </body>
</html>
