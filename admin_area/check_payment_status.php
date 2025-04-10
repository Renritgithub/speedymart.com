<?php
session_start();
include("connect.php");

header('Content-Type: application/json');

$data = json_decode(file_get_contents('php://input'), true);
$order_id = $data['order_id'] ?? null;

if (!$order_id) {
    echo json_encode(['status' => 'error', 'message' => 'Order ID is required']);
    exit;
}

$query = "SELECT payment_status FROM orders WHERE order_id = ?";
$stmt = $con->prepare($query);
$stmt->bind_param("i", $order_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $order = $result->fetch_assoc();

    if ($order['payment_status'] == 0) {
        // If the payment is pending
        echo json_encode(['status' => 'order_pending']);
    } else {
        // If the payment is confirmed
        echo json_encode(['status' => 'paid']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Order not found']);
}
?>
