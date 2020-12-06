<?php
    function getPet($id) {
        global $db;

        // Fetch pet from database
        $stmt = $db->prepare('SELECT * FROM pet WHERE id = ?');
        $stmt->execute([$id]);

        $pet = $stmt->fetch();

        return $pet;
    }
?>