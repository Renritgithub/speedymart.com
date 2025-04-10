<?php
// Start session
session_start();

// Function to generate a CSRF token
function generateCsrfToken() {
    // Check if token exists; if not, generate a new one
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}

// Example usage:
$csrf_token = generateCsrfToken();
?>

<!-- Add CSRF token to form -->
<form method="POST" action="process_form.php">
    <input type="hidden" name="csrf_token" value="<?php echo $csrf_token; ?>">
    <!-- Other form fields -->
    <input type="submit" value="Submit">
</form>
