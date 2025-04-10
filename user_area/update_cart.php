<?php
// Include database connection (Make sure to include your database connection file)
include('../includes/connect.php');
header("Content-Type: application/json");
$data = json_decode(file_get_contents("php://input"), true);

// Get data from the request
$cart_id = isset($data['itemId']) ? $data['itemId'] : null;  // Cart item ID
$user_id = isset($data['userId']) ? $data['userId'] : null;  // User ID
$quantity = isset($data['quantity']) ? $data['quantity'] : null;  // Quantity to update

// Check if the necessary parameters are provided
if (!$cart_id || !$user_id || !$quantity) {
    echo json_encode(['error' => 'Missing required parameters']);
    exit;
}

// Validate quantity (optional)
if (!is_numeric($quantity) || $quantity < 1) {
    echo json_encode(['error' => 'Invalid quantity']);
    exit;
}

// Prepare the SQL query to update the cart item
$stmt = $con->prepare('UPDATE cart_details SET quantity = ? WHERE cart_id = ? AND user_id = ?');
$stmt->bind_param('iii', $quantity, $cart_id, $user_id);

// Execute the query
if ($stmt->execute()) {
    // Fetch updated cart for this user
    $stmt = $con->prepare('SELECT * FROM cart_details WHERE user_id = ?');
    $stmt->bind_param('i', $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    $cart = [];
    while ($row = $result->fetch_assoc()) {
        $cart[] = $row;  // Collect cart items
    }

    // Return updated cart data as JSON
    echo json_encode(['cart' => $cart]);

} else {
    // Error occurred during update
    echo json_encode(['error' => 'Failed to update cart']);
}

$stmt->close();
$con->close();
?>
