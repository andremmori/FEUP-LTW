<?php
    function search($input) {

        global $db;
        $breeds = [];
        $pets = [];

        try {

            // Search for breeds
            $breed_sql = "SELECT FROM breed WHERE (?) = $input";
            $breed_stmt = $db->prepare($breed_sql);
            $breed_exec = $breed_stmt->execute([$name]);

            if (!$breed_exec) throw new Exception();
            
            $breeds = $breed_stmt->fetchAll();

            echo "breeds: ";
            foreach($breeds as $breed)
            {
                echo $breed;
            }
            // Search for pets
            $pet_sql = "SELECT FROM pet WHERE (?) = $input";
            $pet_stmt = $db->prepare($pet_sql);
            $pet_exec = $pet_stmt->execute([$name]);

            if (!$pet_exec) throw new Exception();

            $pets = $pet_stmt->fetchAll();

            echo "pets: ";
            foreach($pets as $pet)
            {
                echo $pet;
            }

        } catch (\Throwable $th) {
            return [];
        }
        return [$breeds, $pets];
    }
?>