<?php
include("../includes/connect.php");
header('Content-Type: application/json');

// Check if product_id is provided
if (isset($_GET['product_id'])) {
    $product_id = intval($_GET['product_id']); // Sanitize input

    // Prepare SQL query with the correct joins
    $query = "
        SELECT 
            p.product_title, c.category_title 
        FROM 
            products p  
        LEFT JOIN 
            categories c 
        ON 
            c.category_id = p.category_id
        WHERE 
            p.product_id = ?
    ";

    // Prepare the statement
    if ($stmt = $con->prepare($query)) {
        // Bind the parameter (product_id)
        $stmt->bind_param("i", $product_id); // "i" is for integer type

        // Execute the query
        $stmt->execute();

        // Get the result
        $result = $stmt->get_result();

        // Initialize the breadcrumb array
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $breadcrumb = [
                'category' => $row['category_title'],
                'product_title' => $row['product_title']
            ];
            echo json_encode(['status' => 'success', 'breadcrumb' => $breadcrumb]);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Product not found']);
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Database connection problem']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Product ID not provided']);
}
?>
