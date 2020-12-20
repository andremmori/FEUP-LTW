<?php

  function upload($petID, $file, $description)
  {
    global $db;
    // echo $file;
    try {
      // Init transaction

      $db->beginTransaction();
      // Insert image data into database
      $stmt = $db->prepare("SELECT max(photo) from post");

      $exec = $stmt->execute();

      if (!$exec) throw new Exception();

      $image_id = $stmt->fetch()[0];


      $image_id++;

      // Generate filenames for original, small and medium files
      $originalFileName = "images/petImages/originals/".$image_id.".jpg";
      $squareFileName = "images/petImages/squared/".$image_id.".jpg";

      // Move the uploaded file to its final destination
      move_uploaded_file($file, $originalFileName);

      $original = imagecreatefromjpeg($originalFileName);
      if(!$original)
      {
        $original = imagecreatefrompng($originalFileName);
        if(!$original)
          throw new Exception();
      }

      // Crete an image representation of the original image


      $width = imagesx($original);     // width of the original image
      $height = imagesy($original);    // height of the original image
      $square = min($width, $height);  // size length of the maximum square

      // Create and save a small square thumbnail
      $squaredImage = imagecreatetruecolor(400, 400);
      imagecopyresized($squaredImage, $original, 0, 0, ($width>$square)?($width-$square)/2:0, ($height>$square)?($height-$square)/2:0, 400, 400, $square, $square);
      imagejpeg($squaredImage, $squareFileName);

      // Make post

      $stmt = $db->prepare("INSERT INTO Post VALUES(NULL, (?), (?), (?), date('now'))");

      $exec = $stmt->execute([$petID, $description, $image_id]);

      if (!$exec) throw new Exception();

      $db->commit();

      return true;
    } catch (\Throwable $th) {
        $db->rollback();

        return false;
    }
    return true;
  }
