<?php
include_once('database/connection.php');
include_once('database/post.php');

$id = $_GET['id'];

if(updatePost($id))
    header('Location: post.php?id='.$id);
else
    header('Location: edit_post.php?id='.$id);
?>
