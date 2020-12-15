<?php
    function getPet($id) {
        global $db;

        // Fetch pet from database
        $stmt = $db->prepare('SELECT * FROM pet WHERE id = ?');
        $stmt->execute([$id]);

        $pet = $stmt->fetch();

        return $pet;
    }

    function deletePet($id) {
        global $db;


        // Delete pet with given id
        $stmt = $db->prepare('DELETE FROM pet WHERE id = ?');
        return $stmt->execute([$id]);
    }

    function updatePet($id) {
        global $db;

        $name = $_POST['name'];
        $bio = $_POST['bio'];
        if($name == null || $bio == null) return false;

        // Update pet with given id
        $stmt = $db->prepare('UPDATE pet SET name = ?, bio = ? WHERE id = ?');
        return $stmt->execute([$name, $bio, $id]);
    }

    function isPetOwner($pet_id, $user_id) {
        global $db;
        $stmt = $db->prepare('SELECT * FROM pet WHERE id = ? AND ownerID = ?');
        $stmt->execute([$pet_id, $user_id]);
        $pet = $stmt->fetch();

        return $pet;
    }

    function getPetPosts($pet_id)
    {
        global $db;
        $stmt = $db->prepare('SELECT id, photo FROM post WHERE petId = ?');
        $stmt->execute([$pet_id]);
        $posts = $stmt->fetchAll();

        return $posts;
    }
?>