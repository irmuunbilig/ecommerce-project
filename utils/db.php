<?php
require_once 'rb.php';

$host = 'localhost';
$dbname = 'aiym';
$username = 'root';
$password = '';

// Enable error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

try {
    R::setup('mysql:host=' . $host . ';dbname=' . $dbname, $username, $password);
    if (!R::testConnection()) {
        throw new Exception('Database connection failed');
    }
} catch (Exception $e) {
    die('Error: ' . $e->getMessage());
}
?>
