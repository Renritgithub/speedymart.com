<?php
session_start();
include("connect.php");

header('Content-Type: application/json');

$data = json_decode(file_get_contents('php://input'), true);
$order_id = $data['order_id'] ?? null;
$confirm_paid = $data['confirm_paid'] ?? false;

if (!$order_id || !$confirm_paid) {
    echo json_encode(['status' => 'error', 'message' => 'Order ID and payment confirmation are required']);
    exit;
}

$query = "UPDATE orders SET payment_status = 1 WHERE order_id = ?";
$stmt = $con->prepare($query);
$stmt->bind_param("i", $order_id);

if ($stmt->execute()) {
    echo json_encode(['status' => 'success', 'message' => 'Payment confirmed and order updated']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Failed to update payment status']);
}
?>
