<?php
session_start();

// Function to validate CSRF token
function validateCsrfToken($token) {
    return isset($_SESSION['csrf_token']) && hash_equals($_SESSION['csrf_token'], $token);
}

// Function to regenerate a new CSRF token after validation
function regenerateCsrfToken() {
    // Create a new CSRF token and store it in the session
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

// Check if the form was submitted via POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the CSRF token from the form submission
    $submitted_token = $_POST['csrf_token'];
    
    // Validate the CSRF token
    if (!validateCsrfToken($submitted_token)) {
        die("CSRF token validation failed. Possible CSRF attack.");
    }
    
    // Process the form (e.g., save data, etc.)
    $name = htmlspecialchars($_POST['name'], ENT_QUOTES, 'UTF-8');
    echo "Form submitted successfully! Name: " . $name;

    // Regenerate CSRF token after validation to prevent reuse
    regenerateCsrfToken();
}
?>
