<?php
// Error reporting for debugging (can be disabled in production)
error_reporting(E_ALL);
ini_set('display_errors', 1);

include('../includes/connect.php');

// Ensure request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Check if brand_title exists in the POST request
    if (isset($_POST['brand_title']) && !empty(trim($_POST['brand_title']))) {
        function sanitizeInput($data) {
            return htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
        }
        // Trim and sanitize the input
        $brand_title =sanitizeInput(trim($_POST['brand_title'])) ;

        // Check if the brand already exists
        $select_stmt = $con->prepare("SELECT * FROM `brand` WHERE brand_title = ?");
        $select_stmt->bind_param("s", $brand_title);
        $select_stmt->execute();
        $result_select = $select_stmt->get_result();
        $number = $result_select->num_rows;

        if ($number > 0) {
            // Return a JSON response if the brand exists
            echo json_encode(['status' => 'error', 'message' => 'The brand is already present in the database']);
        } else {
            // Insert the new brand using prepared statement
            $insert_stmt = $con->prepare("INSERT INTO `brand` (brand_title) VALUES (?)");
            $insert_stmt->bind_param("s", $brand_title);

            // Execute the statement and handle success/failure
            if ($insert_stmt->execute()) {
                echo json_encode(['status' => 'success', 'message' => 'Brand inserted successfully']);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Something went wrong, please try again']);
            }

            // Close the insert statement
            $insert_stmt->close();
        }

        // Close the select statement
        $select_stmt->close();
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Brand title cannot be empty']);
    }

    exit; // Ensure the script stops here
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
    exit;
}
?>