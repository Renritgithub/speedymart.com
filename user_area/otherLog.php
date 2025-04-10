<?php
// Start the session
session_start();

// Include database connection and authentication functions
require_once '../functions/db_connection.php';
require_once '../functions/auth.php';

// Simulating user credential validation (replace this with real validation logic)
$username = $_POST['username'];
$password = $_POST['password'];

// Query the database for user details
$query = "SELECT id, password, role FROM users WHERE username = ?";
$stmt = $db->prepare($query);
$stmt->bind_param('s', $username);
$stmt->execute();
$stmt->store_result();

// Check if a user with that username exists
if ($stmt->num_rows == 1) {
    $stmt->bind_result($user_id, $hashed_password, $role);
    $stmt->fetch();
    
    // Verify the password (assuming passwords are hashed with password_hash())
    if (password_verify($password, $hashed_password)) {
        // Login successful, regenerate the session ID to prevent session fixation
        session_regenerate_id(true);  // Regenerates the session ID and deletes the old one
        
        // Store user info in the session
        if ($role == 'admin') {
            $_SESSION['admin_id'] = $user_id;
            $_SESSION['role'] = 'admin';
            header("Location: /admin_area/dashboard.php");
        } else {
            $_SESSION['user_id'] = $user_id;
            $_SESSION['role'] = 'user';
            header("Location: /user_area/user_profile.php");
        }
        exit();
    } else {
        // Invalid password
        echo "Invalid login credentials!";
    }
} else {
    // User not found
    echo "Invalid login credentials!";
}

// Close the statement and connection
$stmt->close();
$db->close();
?>
