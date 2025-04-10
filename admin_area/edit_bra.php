<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include('../includes/connect.php'); // Include your DB connection file
 session_start();// Start session for CSRF token

// CSRF token generation
if (!isset($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

// Check if the request is via POST and has the 'brand_title' and 'edit_id' keys
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['brand_title'], $_POST['edit_id'])) {
    $cat_title = trim($_POST['brand_title']);
    $edit_id = intval($_POST['edit_id']); // Ensure it's an integer for security

    // Validate CSRF token
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        echo json_encode(['status' => 'error', 'message' => 'Invalid CSRF token']);
        exit();
    }

    // Check if the brand title is not empty
    if (!empty($cat_title) && $edit_id > 0) {
        // Secure update query with prepared statements
        $stmt = $con->prepare("UPDATE `brand` SET brand_title = ? WHERE brand_id = ?");
        $stmt->bind_param("si", $cat_title, $edit_id);

        if ($stmt->execute()) {
            echo json_encode(['status' => 'success', 'message' => 'brand successfully updated.']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Something went wrong during updating.']);
        }

        $stmt->close();
    } else {
        echo json_encode(['status' => 'error', 'message' => 'brand title cannot be empty.']);
    }

    $con->close();
    exit();
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request.']);
    exit();
}
?>
