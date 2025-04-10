<?php
// Sanitize user input before displaying it on the page
function sanitizeInput($data) {
    return htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
}

// Example usage:
$user_input = "<script>alert('XSS')</script>";
$safe_input = sanitizeInput($user_input);

echo $safe_input;  // Outputs: &lt;script&gt;alert(&#039;XSS&#039;)&lt;/script&gt;
?>
