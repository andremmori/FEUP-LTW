<?php
include_once('database/connection.php');
include_once('database/favourite.php');

echo addToFavourites($_GET['account_id'], $_GET['pet_id']);