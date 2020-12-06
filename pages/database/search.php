<?php
    function search() {
        global $db;
        $input = $_GET['input'];

        if($input == null) return false;

        try {

            // Search for breeds
            $breed_sql = "SELECT FROM breed WHERE (?) = $input";
            $breed_stmt = $db->prepare($breed_sql);
            $breed_stmt->execute([$name]);

            if (!$breed_exec) throw new Exception();
            
            $breeds = $breed_stmt->fetchAll();

            echo "<p>List of breeds: </p> <br>";
            foreach($breeds as $breed)
            {
                echo "<p>$breed</p> <br>";
            }
            
            // Search for pets
            $pet_sql = "SELECT FROM pet WHERE (?) = $input";
            $pet_stmt = $db->prepare($pet_sql);
            $pet_stmt->execute([$name]);

            if (!$pet_exec) throw new Exception();


            $pets = $pet_stmt->fetchAll();

            echo "<p>List of pets: </p> <br>";
            foreach($pets as $pet)
            {
                echo "<p>$pet</p> <br>";
            }

        } catch (\Throwable $th) {
            return false;
        }
        return true;
    }
?>