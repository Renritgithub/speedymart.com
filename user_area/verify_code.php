<?php
session_start();
header('Content-Type: application/json');
include('../includes/connect.php');

// Decode JSON input
$data = json_decode(file_get_contents("php://input"), true);

$code = $data['code'];
$storedUser = $_SESSION['temp_user'] ?? null;

// Function to get IP address
function getIpAddress() {
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        return $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        return $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        return $_SERVER['REMOTE_ADDR'];
    }
}

if ($storedUser && $storedUser['verification_code'] == $code) {
    $email = $storedUser['email'] ?? null;

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Insert user data into the database
        $user_ip = getIpAddress();
        $stm_email=$con->prepare("select * from user_table where user_email=?");
        $stm_email->bind_param('s',$storedUser['email']);
        $stm_email->execute();
        $email=$stm_email->get_result();
        if($result->num_rows > 0){
            echo json_encode(['success'=> false, 'message'=>"The user already exist"]);
        }
        else{
            // Prepare SQL statement
        $stmt = $con->prepare("INSERT INTO `user_table` (first_name, last_name, user_name, user_email, role, phone, user_pwd, ip_address) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        
        // Bind parameters with correct types
        $stmt->bind_param("sssssiss", $storedUser['f_name'], $storedUser['l_name'], $storedUser['username'], $storedUser['email'], $storedUser['role'], $storedUser['phone'],  $storedUser['password'], $user_ip);

        // Execute the statement and check for success
        if ($stmt->execute()) {
            // Clear temporary session data and return success
            unset($_SESSION['temp_user']);
            echo json_encode(['success' => true, 'message' => 'Registration successful.']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Failed to register user.']);
        }

        // Close the statement and connection
        $stmt->close();
      

        }
      $stm_email->close();
      $con->close();
        
    } else {
        echo json_encode(['success' => false, 'message' => 'Please enter a correct email address.']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid verification code.']);
}
?>
