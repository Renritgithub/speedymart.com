<?php
// Start session
session_start();

// ** Database Configuration **
define('DB_HOST', 'localhost');  // Database host
define('DB_USER', 'root');       // Database user
define('DB_PASSWORD', 'password'); // Database password
define('DB_NAME', 'ecommerce_db'); // Database name

// ** Site Configuration **
define('BASE_URL', 'http://myecommerce.com/');  // Base URL of the website
define('SITE_NAME', 'My E-Commerce');           // Name of the website

// ** Payment Gateway Configuration **
define('PAYPAL_API_CLIENT_ID', 'your-paypal-client-id');
define('PAYPAL_API_SECRET', 'your-paypal-api-secret');
define('STRIPE_API_KEY', 'your-stripe-api-key');

// ** File Paths and Directories **
define('UPLOAD_PATH', '/var/www/html/ecommerce/uploads/'); // Directory for product image uploads
define('PRODUCT_IMAGES_URL', BASE_URL . 'uploads/products/'); // URL for accessing uploaded images

// ** Security Settings **
define('ENCRYPTION_KEY', 'some-random-encryption-key'); // Key for encrypting sensitive data
define('SESSION_TIMEOUT', 3600); // Session timeout in seconds (1 hour)
define('MAX_LOGIN_ATTEMPTS', 5); // Max failed login attempts before lockout

// ** SMTP Email Configuration **
define('SMTP_HOST', 'smtp.mailtrap.io');
define('SMTP_USER', 'smtp-user');
define('SMTP_PASSWORD', 'smtp-password');
define('SMTP_PORT', 2525);

// ** Error Reporting Configuration **
define('ENVIRONMENT', 'development');  // Change to 'production' in live environment
if (ENVIRONMENT === 'development') {
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
} else {
    ini_set('display_errors', 0);
    error_reporting(0);
}

// ** API Endpoints for Third-Party Integrations **
define('SHIPPING_API_URL', 'https://shippingapi.com/calculate');
define('TAX_API_URL', 'https://taxapi.com/rate');

// ** Autoload Function for Classes (if using OOP) **
spl_autoload_register(function ($class_name) {
    include 'classes/' . $class_name . '.php';
});

// ** Utility Functions (Optional) **
function dbConnect() {
    $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }
    return $mysqli;
}

?>
