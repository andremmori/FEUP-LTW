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

?>