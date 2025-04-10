<?php

session_start();
include "functions/common_function.php";
header('Content-Type: application/json');
$data = json_decode(file_get_contents("php://input"), true);

$code = $data['code'];
$phone = $data['phone'];
$storedUser = $_SESSION['temp_user'] ?? null;

if ($storedUser && $storedUser['phone'] === $phone && $storedUser['verification_code'] == $code) {
    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'your_database_name');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    if (filter_var($email, FILTER_VALIDATE_EMAIL)){
        // Insert user data into the database
        $user_ip=getIpAddress();
    $stmt = $conn->prepare("INSERT INTO users (username, phone, email, password) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("ssss", $storedUser['username'], $storedUser['phone'], $storedUser['email'], $storedUser['password'], $user_ip);

    if ($stmt->execute()) {
        // Clear temporary session data and return success
        unset($_SESSION['temp_user']);
        echo json_encode(['success' => true, 'message' => 'Registration successful.']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to register user.']);
    }


    }else{
        echo json_encode(['success' => false, 'message' => 'Please enter a correct email address.']);
    }
    
    $stmt->close();
    $conn->close();
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid verification code.']);
}
?>
<?php

session_start();
include "functions/common_function.php";
header('Content-Type: application/json');
$data = json_decode(file_get_contents("php://input"), true);

$code = $data['code'];
$phone = $data['phone'];
$storedUser = $_SESSION['temp_user'] ?? null;

if ($storedUser && $storedUser['phone'] === $phone && $storedUser['verification_code'] == $code) {
    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'your_database_name');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    if (filter_var($email, FILTER_VALIDATE_EMAIL)){
        // Insert user data into the database
        $user_ip=getIpAddress();
    $stmt = $conn->prepare("INSERT INTO users (username, phone, email, password) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("ssss", $storedUser['username'], $storedUser['phone'], $storedUser['email'], $storedUser['password'], $user_ip);

    if ($stmt->execute()) {
        // Clear temporary session data and return success
        unset($_SESSION['temp_user']);
        echo json_encode(['success' => true, 'message' => 'Registration successful.']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to register user.']);
    }


    }else{
        echo json_encode(['success' => false, 'message' => 'Please enter a correct email address.']);
    }
    
    $stmt->close();
    $conn->close();
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid verification code.']);
}
?>
