<?php
session_start(); // Start the session

// Unset all session variables
$_SESSION = [];

// Destroy the session
session_destroy();

// Delete the authentication cookie if it exists
if (isset($_COOKIE['userToken'])) {
    setcookie("userToken", "", time() - 3600, "/"); // Expire the cookie
}
$location="../index_pages/index.php";
// Redirect to login page (or homepage)
header("Location: user_loginnew.php?redirect=$location");
exit();
?>
