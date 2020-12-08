<?php
include_once('database/connection.php');
include_once('database/post.php');

$id = $_GET['id'];
deletePost($id);
header('Location: index.php');

?>
