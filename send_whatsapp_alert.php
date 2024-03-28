<?php
// Your API credentials
$api_key = '337388009333170';
$api_secret = '0b6afd7d6d141122d0b3ae5025234577';


// Recipient's phone number and message
$phone_number = '9840089419';
$message = 'Fire Accident in Kathmandu';

// Construct the request payload
$data = [
    'apiKey' => $api_key,
    'apiSecret' => $api_secret,
    'phoneNumber' => $phone_number,
    'message' => $message
];

// Convert data to JSON
$json_data = json_encode($data);

// WhatsApp API endpoint URL
$url = 'EAAEy2kRyobIBO1S2M9MoL4TrzwNZCsTyYoIJap1ZA0o1sr0mLaKEysAsQGZCcZAEiySvtfQEmvmZBGnjxQ1ebuI2UJIkwDDkPTuoHgbpW3FHwUZBGoCP7oc7DhlbxIzGtHQJ7ZAqZBkavmY6ZCh1Bccoa74wukwqpGDWrzspeTiofkA3tZCXBDToqTDvxAZCtlkye915oa2e5M5d5AvZBh2oj9WK3SpaFfzsSVXPUhYZD';

// Initialize cURL session
$ch = curl_init();

// Set cURL options
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Content-Type: application/json',
    'Content-Length: ' . strlen($json_data)
]);

// Execute cURL request
$response = curl_exec($ch);

// Check for errors
if ($response === false) {
    $error_message = curl_error($ch);
    // Handle error
} else {
    // Process response (success or error)
}

// Close cURL session
curl_close($ch);

// Handle response accordingly
?>
