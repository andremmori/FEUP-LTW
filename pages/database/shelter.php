<?php
    function addShelter() {
        global $db;
        $userId = $_POST['userId'];
        $name = $_POST['name'];
        $address = $_POST['address'];

        if($userId == null || $name == null || $address == null) return false;


        try {
            // Init transaction
            $db->beginTransaction();
            // Insert Account
            $account_sql = "INSERT INTO account (name) VALUES (?)";
            $first_stmt = $db->prepare($account_sql);
            $first_exec = $first_stmt->execute([$name]);

            if (!$first_exec) throw new Exception();
            // Get Account id after insert
            $account_id = $db->lastInsertId();

            // Insert Shelter
            $shelter_sql = "INSERT INTO shelter (id, location) VALUES (?, ?)";
            $second_stmt = $db->prepare($shelter_sql);
            $second_exec = $second_stmt->execute([$account_id, $address]);

            if (!$second_exec) throw new Exception();
            // Get shelter id after insert
            $shelter_id = $db->lastInsertId();

            // Add user as collaborator
            $collaborator_sql = "INSERT INTO collaborator (userID, shelterID, admin) VALUES (?, ?, ?)";
            $third_stmt = $db->prepare($collaborator_sql);
            $third_exec = $third_stmt->execute([$userId, $shelter_id, true]); // User that creates shelter is admin

            if (!$third_exec) throw new Exception();


            $db->commit();
        } catch (\Throwable $th) {
            $db->rollback();
            return false;
        }
        return true;
    }
?>