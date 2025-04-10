<?php
session_start();
include("connect.php");

header('Content-Type: application/json');

$data = json_decode(file_get_contents('php://input'), true);
$order_id = $data['order_id'] ?? null;
$status = $data['status'] ?? null;

if (!$order_id || !$status) {
    echo json_encode(['status' => 'error', 'message' => 'Order ID and status are required']);
    exit;
}

$query = "UPDATE orders SET delivery_status = ? WHERE order_id = ?";
$stmt = $con->prepare($query);
$stmt->bind_param("si", $status, $order_id);

if ($stmt->execute()) {
    echo json_encode(['status' => 'success', 'message' => 'Order status updated']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Failed to update order status']);
}
?>
