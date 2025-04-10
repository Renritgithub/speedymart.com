<?php
session_start(); // Start the session
include('../includes/connect.php');

header('Content-Type: application/json');
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $data = json_decode(file_get_contents("php://input"), true);
    if (isset($data["order_id"]) && isset($data["status"])) {
        $order_id = $data["order_id"];
        $status = $data["status"];

        // Fetch the user who placed the order
        $stmt = $con->prepare("SELECT user_id FROM user_orders WHERE order_id = ?");
        $stmt->bind_param("i", $order_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $order = $result->fetch_assoc();

        if ($order) {
            $user_id = $order["user_id"]; // Get the user ID associated with the order

            // ✅ Check if the logged-in user is the owner of the order
            if (isset($_SESSION["user_id"]) && $_SESSION["user_id"] == $user_id) {
                
                // Set a cookie with the user ID (this cookie will be sent to the user's device)
                $cookie_name = "delivery_status_$order_id";
                $cookie_value = $status; // Store the delivery status or other data
                $expire_time = time() + (86400 * 30); // Cookie will expire in 30 days

                // Setting the cookie for the logged-in user
                setcookie($cookie_name, $cookie_value, $expire_time, "/", "", false, true); // HttpOnly

                // Return success message
                echo json_encode(["status" => "success", "message" => "Order updated, cookie set for user ID: $user_id"]);
            } else {
                echo json_encode(["status" => "error", "message" => "Unauthorized action"]);
            }
        } else {
            echo json_encode(["status" => "error", "message" => "Order not found"]);
        }
    } else {
        echo json_encode(["status" => "error", "message" => "Invalid request"]);
    }
}
?>
