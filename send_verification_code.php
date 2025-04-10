<?php
session_start();
header('Content-Type: application/json');
require '../vendor/autoload.php'; // Correct the require statement

// Include the Twilio library
use Twilio\Rest\Client;

$data = json_decode(file_get_contents("php://input"), true);

$username = $data['username'];
$phone = $data['phone'];
$email = $data['email'];
$password = password_hash($data['password'], PASSWORD_DEFAULT); // Hash the password

// Generate a random verification code
$verificationCode = rand(100000, 999999); // Assuming you want a 6-digit code

// Store user details and code in session temporarily
$_SESSION['temp_user'] = [
    'username' => $username,
    'phone' => $phone,
    'email' => $email,
    'password' => $password,
    'verification_code' => $verificationCode
];

$sid = "Your Account SID"; // replace with your Twilio Account SID
$token = "Your Auth Token"; // replace with your Twilio Auth Token
$serviceSid = "Your Verify Service SID"; // replace with your Twilio Verify Service SID

$client = new Client($sid, $token);

$isCodeSent = false; // Initialize the variable

try {
    // Send the verification code using Twilio
    $verification = $client->verify->v2->services($serviceSid)
                        ->verifications
                        ->create($phone, "sms");

    // Check if the verification was successfully initiated
    if ($verification->status === "pending") {
        $isCodeSent = true;

        // Now, send the actual verification code in the SMS message
        $client->messages->create($phone, [
            'from' => 'Your Twilio Phone Number', // Replace with your Twilio phone number
            'body' => 'Your verification code is: ' . $verificationCode // Send the generated code
        ]);
    }

} catch (Exception $e) {
    // Handle exception if sending fails
    echo json_encode(['success' => false, 'message' => 'Error: ' . $e->getMessage()]);
    exit;
}

if ($isCodeSent) {
    echo json_encode(['success' => true, 'message' => 'Verification code sent to ' . $phone]);
} else {
    echo json_encode(['success' => false, 'message' => 'Failed to send verification code']);
}
?>
