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
      $stmt = $db->prepare("INSERT INTO Pet (ownerID, profilePic, name, bio, description, requirements) VALUES((?), (?), (?), '[blank]', '[blank]', '[blank]')");
      $exec = $stmt->execute([$userID, $profilePic, $fields[1]]);

      if (!$exec) throw new Exception();

      echo 'pet added', '<br>';

      if($individual_group == "individual")
      {
        // $fields = [$file, $nameElement, $speciesElement, $breedElement, $sizeElement, $colourElement];
        // INSERT INTO individualpet (petID, breedID, size, colour)

        $breedId = insertSpeciesAndBreed($fields[2], $fields[3]);
              
        print_r([$petID, $breedId, $fields[4], $fields[5]]);

        // INDIVIDUAL PET ===========================================================

        $stmt = $db->prepare("INSERT INTO individualpet (petID, breedID, size, colour) VALUES ((?), (?), (?), (?))");
        $exec = $stmt->execute([$petID, $breedId, $fields[4], $fields[5]]);

        if (!$exec) throw new Exception();       
      }
      else //group
      {
        // $fields = [$file, $nameElement, $ammountElement, $speciesGroupElement, $breedGroupElement, $quantityGroupElement];
        // INSERT INTO petgroupbreed (petID, breedID, quantity)
        // INSERT INTO grouppet (petID, number)
        
        $species = explode(',', $fields[3]);
        $breeds = explode(',', $fields[4]);
        $quantities = explode(',', $fields[5]);

        if(count($species) != count($breeds) || count($breeds) != count($quantities))
          throw new Exception();

        $sum = 0;
        foreach($quantities as $num)
        {
          if($num <= 0)
            throw new Exception();
          $sum += $num;
        }
        
        if($sum != $fields[2])
          throw new Exception();

        for($i = 0; $i < count($species); $i++)
        {
          $breedId = insertSpeciesAndBreed($species[$i], $breeds[$i]);

          $stmt = $db->prepare("INSERT INTO petgroupbreed (petID, breedID, quantity) VALUES ((?), (?), (?))");

          $exec = $stmt->execute([$petID, $breedId, $quantities[$i]]);

          if (!$exec) throw new Exception();   
        }

        $stmt = $db->prepare("INSERT INTO grouppet (petID, number) VALUES ((?), (?))");
        $exec = $stmt->execute([$petID, $fields[2]]);

        if (!$exec) throw new Exception();   

      }

      $db->commit();
      
      return $petID;

    } catch (\Throwable $th) {
        $db->rollback();
    
        return -1;
    }
  }

  function insertSpeciesAndBreed($speciesName, $breedName)
  {

    global $db; 

    try{

      // SPECIES ===========================================================

      $stmt = $db->prepare("SELECT id from Species where name=(?) COLLATE NOCASE");
      $exec = $stmt->execute([$speciesName]);

      if (!$exec) throw new Exception();

      $speciesID = $stmt->fetch();

      echo 'species fetch: ';
      print_r($speciesID);
      echo '*<br>';
      if($speciesID == "") // new species added
      {
        $stmt = $db->prepare("INSERT INTO Species VALUES(NULL, UPPER((?)) )");
        $exec = $stmt->execute([$speciesName]);

        if (!$exec) throw new Exception();

        $speciesID = $db->lastInsertId();
      }
      else
        $speciesID = $speciesID[0];

      echo $speciesID, '<br>';

      // BREED ===========================================================

      $stmt = $db->prepare("SELECT id from Breed where name=(?) COLLATE NOCASE");
      $exec = $stmt->execute([$breedName]);

      if (!$exec) throw new Exception();

      $breedId = $stmt->fetch();

      echo 'breed fetch: ';
      print_r($breedId);
      echo '*<br>';

      if($breedId == "") // new breed added
      {
        $stmt = $db->prepare("INSERT INTO Breed VALUES(NULL, (?), UPPER((?)) )");
        $exec = $stmt->execute([$speciesID, $breedName]);

        if (!$exec) throw new Exception();

        $breedId = $db->lastInsertId();
      }
      else
        $breedId = $breedId[0];

      echo $breedId, '<br>';

      return $breedId;

    } catch (\Throwable $th) {
      $db->rollback();
  
      return -1;
    }
  }
  
?>

