<?php
session_start();

// Function to validate CSRF token
function validateCsrfToken($token) {
    return isset($_SESSION['csrf_token']) && hash_equals($_SESSION['csrf_token'], $token);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the CSRF token from the form submission
    $csrf_token = $_POST['csrf_token'];
    
    // Validate the CSRF token
    if (!validateCsrfToken($csrf_token)) {
        die("CSRF token validation failed. Possible CSRF attack.");
    }
    
    // Process the form if validation passes
    echo "Form submission successful!";
}
?>
