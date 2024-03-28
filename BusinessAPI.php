<?php
// Your WhatsApp API credentials
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

// Send the message via HTTP POST request
$ch = curl_init('https://api.whatsapp.com/send');
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);

// Handle the response
if ($response === false) {
    echo 'Error sending message.';
} else {
    echo 'Message sent successfully.';
}
?>
