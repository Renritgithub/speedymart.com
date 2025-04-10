<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include('../includes/connect.php');

// Check if an AJAX request was made and `cat_title` exists
if (isset($_POST['cat_title'])) {
    $category_title = trim($_POST['cat_title']); // Trim whitespace

    // Ensure category title is not empty
    if (!empty($category_title)) {
        // Check if the category already exists
        $select_stmt = $con->prepare("SELECT * FROM `categories` WHERE category_title = ?");
        $select_stmt->bind_param("s", $category_title);
        $select_stmt->execute();
        $result_select = $select_stmt->get_result();
        $number = $result_select->num_rows;

        if ($number > 0) {
            // Return a JSON response if the category exists
            echo json_encode(array('status' => 'error', 'message' => 'This category is already in the database.'));
        } else {
            // Insert the new category using prepared statement
            $insert_stmt = $con->prepare("INSERT INTO `categories` (category_title) VALUES (?)");
            $insert_stmt->bind_param("s", $category_title);

            // Execute the statement and return the appropriate JSON response
            if ($insert_stmt->execute()) {
                echo json_encode(array('status' => 'success', 'message' => 'Category inserted successfully.'));
            } else {
                echo json_encode(array('status' => 'error', 'message' => 'Failed to insert category.'));
            }

            // Close the insert statement
            $insert_stmt->close();
        }

        // Close the select statement
        $select_stmt->close();
    } else {
        echo json_encode(array('status' => 'error', 'message' => 'Category title cannot be empty.'));
    }

    exit; // Ensure the script stops here
}
