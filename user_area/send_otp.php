<?php
session_start();
header('Content-Type: application/json');
require '../functions/common_function.php';

$data = json_decode(file_get_contents("php://input"), true);
$f_name = $data['f_name'];
$l_name = $data['l_name'];
$username = $data['user_name'];
$email = $data['email'];
$role=$data['role'];
$phone = $data['phone'];
$password = password_hash($data['password'], PASSWORD_DEFAULT); // Hash the password

// Generate a random verification code
$verificationCode = sendMockOtp($phone); // Assuming you want a 6-digit code

// Store user details and code in session temporarily
$_SESSION['temp_user'] = [
    'f_name' => $f_name,
    'l_name' => $l_name,
    'username' => $username,
    'phone' => $phone,
    'email' => $email,
    'role' => $role,
    'password' => $password,
    'verification_code' => $verificationCode['otp']
    
];



$isCodeSent = false; // Initialize the variable

try {
    // Send the verification code using Twilio
   
    // Check if the verification was successfully initiated
    if (!empty($phone )) {
        echo json_encode(['success' => true, 'message' => $verificationCode['message'] .$verificationCode['otp']]);
    }
    else{
        echo json_encode(['success'=> true, 'message'=> 'Please enter your number']);
    }

} catch (Exception $e) {
    // Handle exception if sending fails
    echo json_encode(['success' => false, 'message' => 'Error: ' . $e->getMessage()]);
    exit;
}

?>
