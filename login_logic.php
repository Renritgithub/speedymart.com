<?php
session_start();
$mysqli = new mysqli("localhost", "user", "password", "database");

define('MAX_ATTEMPTS', 3);  // Maximum number of attempts allowed
define('LOCKOUT_TIME', 300);  // Lockout period in seconds (e.g., 300 = 5 minutes)

function getIpAddress() {
    // Get the user's IP address
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        return $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        return $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        return $_SERVER['REMOTE_ADDR'];
    }
}

function checkLoginAttempts($username, $mysqli) {
    $ip_address = getIpAddress();
    $stmt = $mysqli->prepare("SELECT COUNT(*) as attempt_count, MIN(attempt_time) as first_attempt
                              FROM login_attempts
                              WHERE (username = ? OR ip_address = ?) AND attempt_time > (NOW() - INTERVAL ? SECOND)");
    $stmt->bind_param("ssi", $username, $ip_address, LOCKOUT_TIME);
    $stmt->execute();
    $result = $stmt->get_result()->fetch_assoc();
    return $result;
}

function logFailedAttempt($username, $mysqli) {
    $ip_address = getIpAddress();
    $stmt = $mysqli->prepare("INSERT INTO login_attempts (username, ip_address) VALUES (?, ?)");
    $stmt->bind_param("ss", $username, $ip_address);
    $stmt->execute();
}

// Example login logic
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check number of login attempts
    $attempts = checkLoginAttempts($username, $mysqli);
               
    if ($attempts['attempt_count'] >= MAX_ATTEMPTS) {
        // User has exceeded max login attempts within the lockout time
        $remaining_time = LOCKOUT_TIME - (time() - strtotime($attempts['first_attempt']));
        echo "You have exceeded the maximum number of login attempts. Please try again in " . ceil($remaining_time / 60) . " minutes.";
    } else {
        // Process login (replace with your login validation logic)
        $stmt = $mysqli->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $user = $stmt->get_result()->fetch_assoc();

        if ($user && password_verify($password, $user['password'])) {
            // Successful login, clear failed attempts
            $_SESSION['username'] = $username;
            $mysqli->query("DELETE FROM login_attempts WHERE username = '$username'");
            echo "Login successful!";
        } else {
            // Failed login, log the attempt
            logFailedAttempt($username, $mysqli);
            echo "Invalid username or password.";
        }
    }
}
?>
