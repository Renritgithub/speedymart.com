<?php
// Include database connection
include("../includes/connect.php");
include("../functions/common_function.php");

// Get the raw POST data
$data = json_decode(file_get_contents("php://input"), true);

// Retrieve the product ID, quantity, and user ID from the request
$productId = $data['productId'];
$quantity = $data['quantity'];
$userId = $data['userId'];

// Check if the data is valid
if (!empty($productId)) {
    // Prepare the query to check if the product is already in the user's cart
    $query = "SELECT * FROM cart_details WHERE  product_id = ? AND user_id=?";
    $stmt = $con->prepare($query);
    $stmt->bind_param("ii", $productId, $userId ); // Bind userId and productId to query
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if the product is already in the cart
    if ($result->num_rows > 0) {
        // Update the quantity if the product is already in the cart
        $updateQuery = "UPDATE cart_details SET quantity = quantity + ? WHERE product_id = ? AND user_id=?";
        $updateStmt = $con->prepare($updateQuery);
        $updateStmt->bind_param("iii", $quantity, $productId, $userId ); // Bind values to query
        $updateStmt->execute();
        $updateStmt->close();
    } else {
        $ip_address=getIPAddress();
        // Insert the new item into the cart if it's not already there
        $insertQuery = "INSERT INTO cart_details ( product_id,user_id, ip_address, quantity) VALUES (?, ?, ?,?)";
        $insertStmt = $con->prepare($insertQuery);
        $insertStmt->bind_param("iisi", $productId,$userId ,$ip_address, $quantity); // Bind values to query
        $insertStmt->execute();
        $insertStmt->close();
    }

    // Return a success response
    echo json_encode(['success' => true]);
} else {
    // Return an error if the data is invalid
    echo json_encode(['success' => false, 'message' => 'Invalid data']);
}

// Close the database connection
$con->close();
?>
