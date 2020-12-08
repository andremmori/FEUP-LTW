<!DOCTYPE html>
<html lang="en-US">
  <head>
    <title>Add Pet</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/home.css" rel="stylesheet">
    <link rel="icon" href="images/icon.jpg">
  </head>
  <body>
    <?php include_once('hotbar.php') ?>
    <?php include_once('sidebar.php') ?>
    <section id="make_post">
      <div id="auxDiv">
        <form id="imageForm" action="database/upload.php" method="post" enctype="multipart/form-data">
          <input type="file" name="image">
          <input type="submit" value="Upload">
        </form>
        <div id="uploadedImage">
        </div>
        <form id="descriptionForm" action="" method="post">
          <input id="description" type="description" name="description" placeholder="Enter a description for your post.">
          <button type="submit">Publish</button>
        </form>
      </div>
    </section>
    <footer>
      <p>&copy; Petgram 2020</p>
    </footer>
  </body>
</html>