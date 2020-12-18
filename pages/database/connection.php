<?php
require_once('database/input.php');
// Connect to DB and start the session
$db = new PDO('sqlite:database/Petgram.db');
session_start();

// Get current file name (which includes this file)
$file_name = basename($_SERVER['PHP_SELF']);

// Check if user has a session. If not, redirect to main_page
if (!isset($_SESSION['user']) && ($file_name != 'register_action.php' && $file_name != 'login_action.php' && $file_name != 'main_page.php')) {
    header('Location: main_page.php');
}

if(isset($_SESSION['errors']))
    $errors = $_SESSION['errors'];

unset($_SESSION['errors']);
