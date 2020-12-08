<?php

// Connect to DB and start the session
$db = new PDO('sqlite:database/Petgram.db');
session_start();

// Get current file name (which includes this file)
$file_name = basename($_SERVER['PHP_SELF']);

// Check if user has a session. If not, redirect to main_page
if ($_SESSION['user'] == null && ($file_name != 'register_action.php' && $file_name != 'login_action.php')) {
    header('Location: main_page.php');
}

