<?php
    function search($input) {

        global $db;

        try {
            $search_sql = "SELECT petID FROM (SELECT petID,pet.name as name,breed.name as breed from individualpet,pet,breed where pet.id=individualpet.petID and breed.id=individualpet.breedID UNION select petID, pet.name as name, breed.name as breed from petgroupbreed, pet, breed where petgroupbreed.petID=pet.id and petgroupbreed.breedID = breed.id) where name=(?) or breed=(?) COLLATE NOCASE" ;
                
            $search_stmt = $db->prepare($search_sql);
            
            $search_exec = $search_stmt->execute([$input, $input]);
            
            if (!$search_exec) throw new Exception();

            $results = $search_stmt->fetchAll();
            if(count($results) == 0)
            {
                echo '<h2 id="noResults"> NO PETS FOUND </h2>';
            }
            else
            {
                foreach($results as $a)
                {
                    // nao sei imprimir isto direito
                    foreach($a as $petID)
                    {
                        $pet = getPet($petID);
                        echo '<a  href="pet_profile.php?id=' . $pet['id'] .'"><div class="petResult"> <h3>'.$pet['id'] . '   ' .$pet['name'] . '</h3></div></a>';
                    }
                }
            }
            
            
            return $results;

        } catch (\Throwable $th) {
            echo "deu merda";
            return null;
        }
        
    }
?>