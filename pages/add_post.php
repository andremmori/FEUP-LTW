
<?php
  global $db;

  include_once('database/connection.php');

  $id = $_GET['id'];
  $stmt = $db->prepare("SELECT * FROM Image where petID=$id ORDER BY id DESC");
  if($stmt != false)
  {
    $stmt->execute();
  
    $image = $stmt->fetch();
  }
?>

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
    <section id="add_post">
      <div id="auxDiv">
        <h2>Post a picture of your pet!<h2>
        <h4>Upload a picture from and add a description (optional)</h4>
        <form id="imageForm" action="upload_action.php" method="post" enctype="multipart/form-data">
          <input type="hidden" name="petId" value="<?php echo $id ?>">
          <input type="file" name="image">
          <input type="submit" value="Upload">
        </form>
        <div id="uploadedImage">
          <img src="<?php echo "images/thumbs_small/?=" . $image['id'] . ".jpg" ?>">
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
<!-- " echo "images/thumbs_small/" . $image['id'] . ".jpg" "  --> 