<?php

include_once('database/connection.php');
include_once('database/account.php');
include_once('database/postcomment.php');

echo addPostComment($_GET['text'], $_GET['post_id']);