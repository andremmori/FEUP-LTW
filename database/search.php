<?php
    function search($input) {

        global $db;

        try {
            $view = "SELECT petID,pet.name as name,breed.name as breed,species.name as species from individualpet,pet,breed,species where pet.id=individualpet.petID and breed.id=individualpet.breedID and species.id=breed.speciesID UNION select petID, pet.name as name, breed.name as breed, species.name as species from petgroupbreed, pet, breed, species where petgroupbreed.petID=pet.id and petgroupbreed.breedID = breed.id and breed.speciesID=species.id";

            $search_sql = "SELECT petID FROM ($view) where name=(?) COLLATE NOCASE or breed=(?) COLLATE NOCASE or species=(?) COLLATE NOCASE" ;
                
            $search_stmt = $db->prepare($search_sql);
            
            $search_exec = $search_stmt->execute([$input, $input, $input]);
            
            if (!$search_exec) throw new Exception();

            $results = $search_stmt->fetchAll();
            if(count($results) == 0)
            {
                echo '<h2 id="noResults"> NO PETS FOUND </h2>';
            }
            else
            {
                foreach($results as $petID)
                {
                    $pet = getPet($petID[0]);
                    echo 
                    '<a  href="pet_profile.php?id=' . $pet['id'] .'">
                        <div class="petResult"> 
                            <img src="images/profileImages/squared/'.$pet['profilePic'].'.jpg" alt="" width="65" height="65">
                            <h1>'. $pet['name'] .'</h1>
                        </div>
                    </a>';
                }
            }
            
        } catch (\Throwable $th) {
            echo "exception thrown";
        }
        
    }
?>