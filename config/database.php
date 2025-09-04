<?php
// Database configuration
$host = 'localhost';        // Database host - update if needed
$dbname = 'portfolio_db';   // Database name - update with your database name
$username = 'root';         // Database username - update with your username
$password = '';             // Database password - update with your password

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>