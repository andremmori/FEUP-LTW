<?php
include_once('database/connection.php');
include_once('database/post.php');

$id = $_GET['id'];
$post = getPost($id);

if(updatePost($post['id']))
    header('Location: post.php?id='.$post['id']);
else
    header('Location: edit_post.php?id='.$post['id']);
?>
