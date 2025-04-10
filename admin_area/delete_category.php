<?php
include('../includes/connect.php');

// Check if an AJAX request was made
if (isset($_POST['delete_category'])) {
    $delete_id = $_POST['delete_category'];  // The ID sent via AJAX

    // Prepare the SQL delete statement with a placeholder
    $delete_stmt = $con->prepare("DELETE FROM `categories` WHERE category_id = ?");
    $delete_stmt->bind_param("i", $delete_id);  // Bind the category ID as an integer

    // Execute the query and check if successful
    if ($delete_stmt->execute()) {
        // Return a JSON response if the category was deleted successfully
        echo json_encode(array('status' => 'success', 'message' => 'Category deleted successfully.'));
    } else {
        // Return a JSON response if there was an error
        echo json_encode(array('status' => 'error', 'message' => 'Failed to delete category.'));
    }

    // Close the statement
    $delete_stmt->close();
} else {
    // Return an error response if no category ID is received
    echo json_encode(array('status' => 'error', 'message' => 'Invalid request.'));
}
?>
