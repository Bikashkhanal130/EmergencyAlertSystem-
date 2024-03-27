<?php
// 1. Get data from the request
$data = json_decode(file_get_contents('php://input'), true);

// 2. Connect to your database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "neighbour";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
} catch(PDOException $e) {
  echo "Error: " . $e->getMessage(); 
  exit(); // Stop execution if there's a database connection error
}

// 3. Retrieve registered users from your database
$stmt = $conn->prepare("SELECT name, email, phone_number FROM registered_users"); 
$stmt->execute();
$registeredUsers = $stmt->fetchAll(PDO::FETCH_ASSOC); 

// 4. Implement sending the alert 
$message = $data['message']; // Customize how you retrieve the message from $data

foreach ($registeredUsers as $user) {
    if (isset($user['email'])) {
        // Send email (Replace with your email sending logic)
        sendEmail($user['email'], "Emergency Alert", $message); 
    }

    if (isset($user['phone_number'])) {
        // Send SMS (Replace with your SMS sending logic)
        sendSMS($user['phone_number'], $message); 
    }
}

// 5. Send a response back to the JavaScript
echo json_encode(['status' => 'success']); 
?>
