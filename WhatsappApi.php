
<?php
// Include necessary files and configurations
include "config.php"; // Include your database configuration or any other required files

// Handle form submission or trigger point
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Process form data
    // Example: Retrieve user input, validate data, etc.

    // Send WhatsApp alert
    $api_key = '337388009333170';
    $api_secret = '0b6afd7d6d141122d0b3ae5025234577';
    $phone_number = '9840089419';
    $message = 'Fire Accident in Kathmandu';


    // Construct the request payload
    $data = [
        'apiKey' => $api_key,
        'apiSecret' => $api_secret,
        'phoneNumber' => $phone_number,
        'message' => $message
    ];

    // Send the message via HTTP POST request (use appropriate API endpoint)
    // Example: Use cURL or a library like Guzzle to send the request

    // Handle response (display success or error message)
}
?>
