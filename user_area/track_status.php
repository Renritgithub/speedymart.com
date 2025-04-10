<?php
// Database connection
header('Content-Type: application/json');
require '../functions/common_function.php';

// Get order ID from request
$order_id = isset($_GET['order_id']) ? intval($_GET['order_id']) : 0;

if ($order_id > 0) {
    // Query to fetch order status
    $sql = "SELECT status FROM orders WHERE order_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $order_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo json_encode(["status" => $row['status']]);
    } else {
        echo json_encode(["error" => "Order not found"]);
    }

    $stmt->close();
} else {
    echo json_encode(["error" => "Invalid order ID"]);
}

$conn->close();
?>
