<?php
    include_once('database/connection.php');
    include_once('database/post.php');

    $id = $_GET['id'];
    $post = getPost($id);
    deletePost($post['id']);
    header('Location: index.php');

?>
