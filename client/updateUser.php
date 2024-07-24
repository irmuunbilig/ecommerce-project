<?php 
session_start();

// Check if user is in the system
if (!isset($_SESSION['user'])) { 
    header("Location: /aiym/auth/login.php");
    die();
}

// Connect to database
require_once('../utils/db.php');

// Get current user
$user = R::findOne('users', 'id = ?', [$_SESSION['user']['id']]);

// Redirect if user was not found
if (!$user) {
    header('Location: /aiym/auth/logout.php');
    die();
}

// Update user details
$user->name     = $_POST['name'];
$user->surname  = $_POST['surname'];
$user->phone    = $_POST['phone'];
$user->email    = $_POST['email'];
$user->address  = $_POST['address'];

// Save user
R::store($user);

// Redirect back
header('Location: /aiym/client/index.php');
die();
?>
