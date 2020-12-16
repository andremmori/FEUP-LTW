<?php

  include_once('database/upload_profilepic.php');

  function addPet($userID, $individual_group, $fields)
  {
    global $db;
    try {
      echo 'begginning', '<br>';
      // Init transaction
      $db->beginTransaction();

      $stmt = $db->prepare("SELECT max(id) from Pet");
      $exec = $stmt->execute();

      if (!$exec) throw new Exception();

      $petID = $stmt->fetch()[0];

      $petID++;

      echo $petID, '<br>';

      $profilePic = upload_profilePic($fields[0]);

      echo $profilePic, '<br>';

      if($profilePic == -1)
        throw new Exception();

      // Insert image data into database
      $stmt = $db->prepare("INSERT INTO Pet (ownerID, profilePic, name, bio, description, requirements) VALUES((?), (?), (?), \"\", \"\", \"\")");
      $exec = $stmt->execute([$userID, $profilePic, $fields[1]]);

      if (!$exec) throw new Exception();

      echo 'pet added', '<br>';

      if($individual_group == "individual")
      {
        // $fields = [$file, $nameElement, $speciesElement, $breedElement, $sizeElement, $colourElement];
        // INSERT INTO individualpet (petID, breedID, size, colour)

        // SPECIES ===========================================================

        $stmt = $db->prepare("SELECT id from Species where name=(?) COLLATE NOCASE");
        $exec = $stmt->execute([$fields[2]]);

        if (!$exec) throw new Exception();

        $speciesID = $stmt->fetch();

        echo 'species fetch: ';
        print_r($speciesID);
        echo '*<br>';
        if($speciesID == "") // new species added
        {
          $stmt = $db->prepare("INSERT INTO Species VALUES(NULL, UPPER((?)) )");
          $exec = $stmt->execute([$fields[2]]);

          if (!$exec) throw new Exception();

          $speciesID = $db->lastInsertId();
        }
        else
          $speciesID = $speciesID[0];

        echo $speciesID, '<br>';

        // BREED ===========================================================

        $stmt = $db->prepare("SELECT id from Breed where name=(?) COLLATE NOCASE");
        $exec = $stmt->execute([$fields[3]]);

        if (!$exec) throw new Exception();

        $breedId = $stmt->fetch();

        echo 'breed fetch: ';
        print_r($breedId);
        echo '*<br>';

        if($breedId == "") // new breed added
        {
          $stmt = $db->prepare("INSERT INTO Breed VALUES(NULL, (?), UPPER((?)) )");
          $exec = $stmt->execute([$speciesID, $fields[2]]);

          if (!$exec) throw new Exception();

          $breedId = $db->lastInsertId();
        }
        else
          $breedId = $breedId[0];

        echo $breedId, '<br>';

        print_r([$petID, $breedId, $fields[4], $fields[5]]);

        // INDIVIDUAL PET ===========================================================

        $stmt = $db->prepare("INSERT INTO individualpet (petID, breedID, size, colour) VALUES ((?), (?), (?), (?))");
        $exec = $stmt->execute([$petID, $breedId, $fields[4], $fields[5]]);

        if (!$exec) throw new Exception();       
      }
      else //group
      {
        // $fields = [$file, $nameElement, $ammountElement, $breedGroupElement, $quantityGroupElement];
        // INSERT INTO petgroupbreed (petID, breedID, quantity)
        // INSERT INTO grouppet (petID, number) 

      }

      $db->commit();
      
      return $petID;

    } catch (\Throwable $th) {
        $db->rollback();
    
        return -1;
    }
  }
  
?>

