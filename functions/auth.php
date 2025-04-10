<?php
// Start the session
session_start();

// Include the database connection file
require_once 'functions/db_connection.php';

// Check if the user is logged in
function checkLoggedIn() {
    if (!isset($_SESSION['user_id'])) {
        // If the user is not logged in, redirect to the login page
        header("Location: /user_area/login.php");
        exit();
    }
}

// Check if the admin is logged in
function checkAdminLoggedIn() {
    if (!isset($_SESSION['admin_id'])) {
        // If the admin is not logged in, redirect to the admin login page
        header("Location: /admin_area/login.php");
        exit();
    }
}

// Function to log in a user (called after validating user credentials)
function loginUser($user_id, $role = 'user') {
    // Set session variables based on the user's role
    if ($role == 'admin') {
        $_SESSION['admin_id'] = $user_id;
        $_SESSION['role'] = 'admin';
        header("Location: /admin_area/dashboard.php");
    } else {
        $_SESSION['user_id'] = $user_id;
        $_SESSION['role'] = 'user';
        header("Location: /index_pages/index.php");
    }
    exit();
}

// Function to log out the user/admin
function logout() {
    // Unset all session variables
    session_unset();
    
    // Destroy the session
    session_destroy();
    
    // Redirect to the homepage
    header("Location: /index_pages/index.php");
    exit();
}

// Check if the user is an admin
function isAdmin() {
    return isset($_SESSION['role']) && $_SESSION['role'] === 'admin';
}

// Check if the user is logged in (not an admin)
function isUser() {
    return isset($_SESSION['role']) && $_SESSION['role'] === 'user';
}

// Prevent access if user is logged in but does not have admin privileges
function checkAdminAccess() {
    if (!isAdmin()) {
        // If the user is not an admin, redirect to the homepage or an error page
        header("Location: /index_pages/index.php");
        exit();
    }
}

?>
