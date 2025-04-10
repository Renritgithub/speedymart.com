<?php
// Include database connection (Make sure to include your database connection file)
include('../includes/connect.php');
header("Content-Type: application/json");
$data = json_decode(file_get_contents("php://input"), true);

// Get data from the request (POST or GET)
$cart_id = isset($data['itemId']) ? $data['itemId'] : null;  // Cart item ID
$user_id = isset($data['userId']) ? $data['userId'] : null;  // User ID (this can come from session or frontend)

// Check if the necessary parameters are provided
if (!$cart_id || !$user_id) {
    echo json_encode(['error' => 'Missing required parameters']);
    exit;
}

// Prepare the SQL query to delete the cart item
$stmt = $con->prepare('DELETE FROM cart_details WHERE cart_id = ? AND user_id = ?');
$stmt->bind_param('ii', $cart_id, $user_id);

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
    // Error occurred during delete
    echo json_encode(['error' => 'Failed to delete cart item']);
}

$stmt->close();
$con->close();
?>
