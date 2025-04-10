<?php
include('../includes/connect.php');

// Check if the delete request is made via POST
if (isset($_POST['delete_brand'])) {
    $brand_id = $_POST['delete_brand'];

    // Prepare the delete query to prevent SQL injection
    $delete_stmt = $con->prepare("DELETE FROM `brand` WHERE brand_id = ?");
    $delete_stmt->bind_param("i", $brand_id);

    // Execute the query and check if the deletion was successful
    if ($delete_stmt->execute()) {
        echo json_encode(array('status' => 'success', 'message' => 'Brand deleted successfully.'));
    } else {
        echo json_encode(array('status' => 'error', 'message' => 'Failed to delete brand.'));
    }

    // Close the prepared statement
    $delete_stmt->close();
} else {
    // Handle invalid requests
    echo json_encode(array('status' => 'error', 'message' => 'Invalid request.'));
}
?>
