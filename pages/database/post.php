<?php
    function getPost($id) {
        global $db;

        // Fetch post from database
        $stmt_post = $db->prepare('SELECT * FROM post WHERE id = ?');
        $stmt_post->execute([$id]);

        $post = $stmt_post->fetch();
        if($post == null) return null;

        return $post;
    }

    function deletePost($id) {
        global $db;

        // Delte post from given id
        $stmt = $db->prepare('DELETE FROM post WHERE id = ?');
        return $stmt->execute([$id]);
    }

    function updatePost($id) {
        global $db;

        $description = $_POST['description'];

        // Update post form given id
        $stmt = $db->prepare('UPDATE post SET description = ? WHERE id = ?');
        return $stmt->execute([$description, $id]);
    }

?>