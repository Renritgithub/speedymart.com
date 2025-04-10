<?php
session_start();
include('../includes/connect.php'); // Include your database connection
require '../functions/common_function.php';
// Constants for max attempts and wait time
define('MAX_ATTEMPTS', 5);
define('WAIT_TIME', 33733); // seconds

header('Content-Type: application/json'); // JSON response

// Decode JSON data from the AJAX request
$data = json_decode(file_get_contents('php://input'), true);

// Get the CSRF token from the form submission
$submitted_token = $data['csrf_token'];

if (!isset($_SESSION['csrf_token']) ||!hash_equals($_SESSION['csrf_token'], $submitted_token)) {
    die(json_encode(["success" => false, "message" => "CSRF token validation failed. Possible CSRF attack."]));
    

}

    // Regenerate CSRF token after validation to prevent reuse
regenerateCsrfToken();
$email = htmlspecialchars($data['email'], ENT_QUOTES, 'UTF-8');
$password = htmlspecialchars($data['password'], ENT_QUOTES, 'UTF-8');
$user_ip = getIPAddress();

// Fetch the user ID based on the provided email
$stmt_id = $con->prepare("SELECT user_id FROM user_table WHERE user_email = ?");
$stmt_id->bind_param("s", $email);
$stmt_id->execute();
$id = $stmt_id->get_result();
if ($row_id = $id->fetch_assoc()) {
    $user_id = $row_id['user_id'];

    $stm = $con->prepare("SELECT attempt_count, last_attempt, is_locked FROM login_attempt WHERE user_id = ?");
    $stm->bind_param("s", $user_id);
    $stm->execute();
    $stm->store_result();

    $attempt_count = 0;
    $is_locked = 0;
    $wait_time = 0;

    if ($stm->num_rows > 0) {
        $stm->bind_result($attempt_count, $last_attempt, $is_locked);
        $stm->fetch();

        // Check if the user is locked
// Calculate time difference since last attempt
// Assuming $last_attempt is in the format 'Y-m-d H:i:s.u'
// Assuming $last_attempt is in the format 'Y-m-d H:i:s.u'
$last_attempt_timestamp = DateTime::createFromFormat('Y-m-d H:i:s.u', $last_attempt);

// Check if the conversion was successful
if ($last_attempt_timestamp === false) {
    die(json_encode(["success" => false, "message" => "Invalid last attempt time."]));
}

// Calculate the time difference
$time_diff = time() - $last_attempt_timestamp->getTimestamp();
$wait=WAIT_TIME;

// Check if the user is locked out
/* if ($is_locked) {
    die(json_encode(["success" => false, "message" => "Please, you are locked.$time_diff and $wait "]));
    
} */

// Check if the user has exceeded the maximum attempts
if ($attempt_count >= MAX_ATTEMPTS) {
    // If the wait time has not elapsed, inform the user of the remaining wait time
    if ($time_diff < WAIT_TIME) {
        $wait_time = WAIT_TIME - $time_diff; 
        echo json_encode([
            "success" => false,
            "message" => "Please wait $wait_time seconds before trying again.",
            "wait_time" => $wait_time
        ]);
    } else {
        // If the wait time has passed, reset the attempt count and locked status
        $attempt_count = 0; // Reset the attempt count
        $is_locked = 0; // Set is_locked to false

        // Update the database to reset locked status, if necessary
        // You can include a query here to reset the user status
    }
}

// Proceed with the login attempt logic...


// Proceed with the login attempt logic...


// Now check if the user is locked after handling wait time

// Continue with login attempt logic...

    }

    // Verify password
    $stmt = $con->prepare("SELECT user_pwd FROM user_table WHERE user_email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->bind_result($hashed_password);

    if ($stmt->fetch() && password_verify($password, $hashed_password)) {
        // Successful login
        $stmt->close(); // Close the previous statement
        $stm = $con->prepare("DELETE FROM login_attempt WHERE user_id = ?");
        $stm->bind_param("s", $user_id);
        $stm->execute();
        $stm->close(); // Close this statement after execution
        // Generate a session ID
        session_regenerate_id(true);

        // Store user data in the session
        $_SESSION['loggedin'] = true;
        $_SESSION['user_id'] = $user_id;
        setcookie('userToken', session_id(), [
            'expires' => time() + 3600, // 1 hour
            'path' => '/',
            'secure' => true,          // Ensure it's sent only over HTTPS
            'httponly' => true,        // Prevent JavaScript access
            'samesite' => 'Strict',    // Prevent CSRF
        ]);
        
        echo json_encode([
            "success" => true,
            "message" => "Login successful!"
        ]);
        
    } else {
        // Invalid credentials
        
        
        // Close the previous statement before preparing a new one
        
            $attempt_count++;
            $stmt->close(); 

        $is_locked = $attempt_count >= MAX_ATTEMPTS ? 1 : 0;
        $max_attempts = MAX_ATTEMPTS; 
        $stmt_attempt = $con->prepare("INSERT INTO login_attempt (user_id, last_attempt, attempt_count, is_locked, ip_address) 
                                    VALUES (?, NOW(), ?, ?, ?) 
                                    ON DUPLICATE KEY UPDATE last_attempt = NOW(), attempt_count = ?,  is_locked = IF(attempt_count >= ?, 1, 0), ip_address = ?");
    
    // Bind parameters: 
    // "ssiisiis" because we have:
    // - 1 string for user_id
    // - 1 integer for attempt_count
    // - 1 integer for is_locked
    // - 1 string for ip_address
    // - 1 integer for attempt_count again
    // - 1 integer for MAX_ATTEMPTS
    // - 1 string for ip_address again
    $stmt_attempt->bind_param("iiisiis", $user_id, $attempt_count, $is_locked, $user_ip, $attempt_count,$is_locked, $user_ip);
    
        $stmt_attempt->execute();
        $stmt_attempt->close(); // Close this statement after execution
    
        echo json_encode([
            "success" => false,
            "message" => "Invalid credentials. Attempt $attempt_count of " . MAX_ATTEMPTS . ".",
            "remaining_attempts" => MAX_ATTEMPTS - $attempt_count
        ]);
    }
    
    // Ensure to close the main statement and the connection
   
    

}
$stmt_id->close(); // Make sure this is defined properly earlier in the code
$con->close(); // Close the connection
  


?>
