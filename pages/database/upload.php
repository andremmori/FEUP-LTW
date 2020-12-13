<?php

  function upload($petID, $file, $description)
  {
    global $db;
    try {
      // Init transaction
      $db->beginTransaction();
      
      // Insert image data into database
      $stmt = $db->prepare("INSERT INTO PetImage VALUES(NULL, (?))");

      $exec = $stmt->execute([$petID]);
            
      if (!$exec) throw new Exception();

      // Get image ID
      $image_id = $db->lastInsertId();

      // Generate filenames for original, small and medium files
      $originalFileName = "images/pet/originals/".$image_id.".jpg";
      $squareFileName = "images/pet/squared/".$image_id.".jpg";

      // Move the uploaded file to its final destination
      move_uploaded_file($file, $originalFileName);

      // Crete an image representation of the original image
      $original = imagecreatefromjpeg($originalFileName);

      $width = imagesx($original);     // width of the original image
      $height = imagesy($original);    // height of the original image
      $square = min($width, $height);  // size length of the maximum square

      // Create and save a small square thumbnail
      $squaredImage = imagecreatetruecolor(65, 65);
      imagecopyresized($squaredImage, $original, 0, 0, ($width>$square)?($width-$square)/2:0, ($height>$square)?($height-$square)/2:0, 65, 65, $square, $square);
      imagejpeg($squaredImage, $squareFileName); 

      // Make post

      $stmt = $db->prepare("INSERT INTO Post VALUES(NULL, (?), (?), (?), date('now'))");

      $exec = $stmt->execute([$petID, $image_id, $description]);
            
      if (!$exec) throw new Exception();

      $db->commit();
      
      return true;
    } catch (\Throwable $th) {
        $db->rollback();
    
        return false;
    }
  }
  
?>

