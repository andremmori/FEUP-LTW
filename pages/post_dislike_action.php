<?php
include_once('database/connection.php');
include_once('database/post.php');

dislikePost($_GET['account_id'], $_GET['post_id']);
echo count(getPostLikes($_GET['post_id']));

