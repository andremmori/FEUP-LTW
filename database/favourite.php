<?php
    function addToFavourites($account_id, $pet_id)
    {
        global $db;

        $stmt = $db->prepare('INSERT INTO favourite (accountID, petID) VALUES (?, ?)');
        $stmt->execute([$account_id, $pet_id]);
        return getNumber($pet_id);
    }

    function removeFromFavourites($account_id, $pet_id)
    {
        global $db;

        $stmt = $db->prepare('DELETE FROM favourite WHERE accountID = ? AND petID = ?');
        $stmt->execute([$account_id, $pet_id]);
        return getNumber($pet_id);
    }

    function isFavourite($account_id, $pet_id) {
        global $db;

        $stmt = $db->prepare('SELECT * FROM favourite WHERE accountID = ? AND petID = ?');
        $stmt->execute([$account_id, $pet_id]);

        return $stmt->fetch() != NULL;
    }

    function getNumber($pet_id){
        global $db;

        $stmt = $db->prepare('SELECT * FROM favourite WHERE petID = ?');
        $stmt->execute([$pet_id]);
        $number = count($stmt->fetchAll());

        return $number;
    }

    ?>