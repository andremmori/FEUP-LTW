
<?php
  include_once('database/connection.php');

  $petID = $_GET['id'];
?>

<!DOCTYPE html>
<html lang="en-US">
  <head>
    <title>Add Pet</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/home.css" rel="stylesheet">
    <link rel="icon" href="images/icon.jpg">
    <script src="js/upload.js" defer></script>
  </head>
  <body>
    <?php include_once('hotbar.php') ?>
    <?php include_once('sidebar.php') ?>
    <section id="add_post">
      <div id="auxDiv">
        <h2>Post a picture of your pet!<h2>
        <h4>Upload a picture from and add a description (optional)</h4>
        <form id="addPostForm" action="upload_image_action.php" method="post" enctype="multipart/form-data">
          <input id="input" type="file" name="image" onchange="selectImage(event)" required>
          <!--<input id="submit" type="submit" value="Upload" onclick="<//?php echo "selectImage(".$petID.")" ?>" required>-->
        </form>
        <div id="uploadedImage"> </div>
        <div id="descriptionDiv">
          <input form="addPostForm" id="description" type="description" name="description" placeholder="Enter a description for your post.">
          <input form="addPostForm" type="hidden" name="petID" value="<?php echo $petID ?>">
          <input form="addPostForm" type="submit" value="Post"/>
        </div>          
      </div>
    </section>
    <footer>
      <p>&copy; Petgram 2020</p>
    </footer>
  </body>
</html>
<!-- " echo "images/thumbs_small/" . $image['id'] . ".jpg" "  --> 