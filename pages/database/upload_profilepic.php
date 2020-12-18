<?php

  function upload_profilePic($file)
  {
    global $db;
    try {
      // Init transaction


      // Insert image data into database
      $stmt = $db->prepare("INSERT INTO ProfileImage VALUES(NULL)");
      $exec = $stmt->execute();

      if (!$exec) throw new Exception();

      $image_id = $db->lastInsertId();

      // Generate filenames for original, small and medium files
      $originalFileName = "images/profileImages/originals/".$image_id.".jpg";
      $squareFileName = "images/profileImages/squared/".$image_id.".jpg";

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

      return $image_id;
    } catch (\Throwable $th) {

        return -1;
    }
  }
