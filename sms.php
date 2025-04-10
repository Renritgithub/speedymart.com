<?php
// Include the Twilio PHP SDK
require_once 'vendor/autoload.php';
use Twilio\Rest\Client;

// Twilio credentials
$account_sid = 'your_account_sid';  // Replace with your Twilio Account SID
$auth_token = 'your_auth_token';    // Replace with your Twilio Auth Token
$twilio_phone_number = 'your_twilio_phone_number';  // Your Twilio Phone Number

// Function to generate a random verification code
function generateVerificationCode() {
    return rand(100000, 999999);  // Generate a 6-digit random number
}

// Send verification code
function sendVerificationCode($userPhoneNumber) {
    global $account_sid, $auth_token, $twilio_phone_number;

    // Create a Twilio client
    $client = new Client($account_sid, $auth_token);

    // Generate the verification code
    $verificationCode = generateVerificationCode();
    
    // Send the verification code via SMS
    $client->messages->create(
        $userPhoneNumber,
        [
            'from' => $twilio_phone_number,
            'body' => "Your verification code is: $verificationCode"
        ]
    );

    return $verificationCode;  // Return the generated code
}

// Example usage: Sending verification code to a user
$userPhoneNumber = '+1234567890';  // Replace with the user's phone number
$verificationCode = sendVerificationCode($userPhoneNumber);

// Store the verification code in the database for later validation
$mysqli = new mysqli("localhost", "db_user", "db_password", "your_database");
$stmt = $mysqli->prepare("UPDATE users SET verification_code=? WHERE phone_number=?");
$stmt->bind_param("ss", $verificationCode, $userPhoneNumber);
$stmt->execute();

echo "Verification code sent!";
?>
