<?php

  function upload($id, $file)
  {
    global $db;
    try {
      // Init transaction
      $db->beginTransaction();
      
      // Insert image data into database
      $stmt = $db->prepare("INSERT INTO PetImage VALUES(NULL, $id)");

      // Get image ID
      $image_id = $db->lastInsertId();

      // Generate filenames for original, small and medium files
      $originalFileName = "images/originals/".$image_id.".jpg";
      $smallFileName = "images/thumbs_small/".$image_id.".jpg";
      //$mediumFileName = "images/thumbs_medium/$image_id.jpg";

      // Move the uploaded file to its final destination
      move_uploaded_file($file, $originalFileName);

      // Crete an image representation of the original image
      $original = imagecreatefromjpeg($originalFileName);

      $width = imagesx($original);     // width of the original image
      $height = imagesy($original);    // height of the original image
      $square = min($width, $height);  // size length of the maximum square

      // Create and save a small square thumbnail
      $small = imagecreatetruecolor(65, 65);
      imagecopyresized($small, $original, 0, 0, ($width>$square)?($width-$square)/2:0, ($height>$square)?($height-$square)/2:0, 60, 60, $square, $square);
      imagejpeg($small, $smallFileName);

      /*
      // Calculate width and height of medium sized image (max width: 400)
      $mediumwidth = $width;
      $mediumheight = $height;
      if ($mediumwidth > 400) {
        $mediumwidth = 400;
        $mediumheight = $mediumheight * ( $mediumwidth / $width );
      }

      // Create and save a medium image
      $medium = imagecreatetruecolor($mediumwidth, $mediumheight);
      imagecopyresized($medium, $original, 0, 0, 0, 0, $mediumwidth, $mediumheight, $width, $height);
      imagejpeg($medium, $mediumFileName);*/

      $db->commit();

      return true;
    } catch (\Throwable $th) {
        $db->rollback();
    
        return false;
    }
  }
  
?>

