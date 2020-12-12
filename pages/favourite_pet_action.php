<?php
include_once('database/connection.php');
include_once('database/favourite.php');

addToFavourites($_GET['account_id'], $_GET['pet_id']);