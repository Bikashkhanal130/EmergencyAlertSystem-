<?php
$servername = "localhost"; // Your database server's hostname 
$username = "root";  // Your database username
$password = ""; // Your database password
$dbname = "neighbour"; // The name of your database

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
