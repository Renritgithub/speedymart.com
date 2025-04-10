<?php
include('../includes/connect.php');

header('Content-Type: application/json');

if (isset($_GET['order_Id'])) {
    $order_Id = $_GET['order_Id'];

    // Secure the input to prevent SQL Injection
    $order_Id = mysqli_real_escape_string($con, $order_Id);

    // Fetch user address based on the order ID
    $query = "SELECT user_table.user_id, user_addresses.full_name, user_addresses.phone_number, user_addresses.email, 
                     user_addresses.address_line1, user_addresses.district, shipping_rates.region_name, user_addresses.postal_code
              FROM user_orders
              JOIN user_table ON user_orders.user_id = user_table.user_id
              JOIN user_addresses ON user_orders.address_id = user_addresses.address_id
              JOIN shipping_rates ON user_addresses.region_id = shipping_rates.region_id
              WHERE user_orders.order_id = '$order_Id'";

    $result = mysqli_query($con, $query);

    if ($result) {
        $userData = [];

        while ($row = mysqli_fetch_assoc($result)) {
            $userData[] = $row;
        }

        // Check if data was found before echoing JSON
        if (!empty($userData)) {
            echo json_encode(["success" => true, "data" => $userData]);
        } else {
            echo json_encode(["error" => "No data found"]);
        }
    } else {
        echo json_encode(["error" => "Database query failed"]);
    }
} else {
    echo json_encode(["error" => "Invalid request"]);
}

mysqli_close($con);
?>
