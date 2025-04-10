<?php
session_start();

// Set timeout period in seconds
$timeout_duration = 1800;  // 30 minutes

if (isset($_SESSION['LAST_ACTIVITY']) && 
    (time() - $_SESSION['LAST_ACTIVITY']) > $timeout_duration) {
    // Last request was more than 30 minutes ago, destroy the session
    session_unset();
    session_destroy();
    header("Location: /login.php");
}
$_SESSION['LAST_ACTIVITY'] = time();  // Update last activity time
?>
