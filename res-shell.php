<?php

// Database configuration
$host = '127.0.0.1'; // Change this to your host
$port = '3306'; // Change this to your port
$database = 'forge'; // Change this to your database name
$username = 'forge'; // Change this to your username
$password = ''; // Change this to your password

try {
    // Connect to MySQL database with password
    $pdo = new PDO("mysql:host=$host;port=$port;dbname=$database", $username, $password);
    
    // Set PDO to throw exceptions on errors
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Query to get list of tables
    $tablesQuery = $pdo->query("SHOW TABLES");
    
    // Fetch all tables
    $tables = $tablesQuery->fetchAll(PDO::FETCH_COLUMN);
    
    // Display tables
    echo "Tables in the database:\n";
    foreach ($tables as $table) {
        echo $table . "\n";
    }
} catch (PDOException $e) {
    // If connection or query fails, display error
    echo "Connection failed: " . $e->getMessage();
}
?>
