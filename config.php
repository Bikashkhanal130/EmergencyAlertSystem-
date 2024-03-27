<?php
$servername = "localhost"; // Your database server's hostname 
$username = "root";  // Your database username
$password = ""; // Your database password
$dbname = "neighbour"; // The name of your database

try {
    // Create a new PDO instance
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    
    // Set PDO to throw exceptions on errors
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    echo "Connected successfully"; // Optional: Display a success message if the connection is successful
} catch(PDOException $e) {
    // Handle connection errors
    echo "Connection failed: " . $e->getMessage();
    exit(); // Exit script if connection fails
}
?>
