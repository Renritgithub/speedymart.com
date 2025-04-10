<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate user inputs
    $name = sanitizeInput($_POST['name']);
    $email = filter_var(sanitizeInput($_POST['email']), FILTER_VALIDATE_EMAIL);
    
    // Check if validation passed
    if ($email) {
        // Process form
    } else {
        echo "Invalid email address.";
    }
}
?>
