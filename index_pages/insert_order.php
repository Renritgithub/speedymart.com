<?php
session_start();
include("../includes/connect.php");
header('Content-Type: application/json');

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $data = json_decode(file_get_contents('php://input'), true);
    
        $product_id = $data['product_id'];
        $color = $data['color'];
        $size = $data['size'];
        $quantity = $data['quantity'];
        $user_id = $_SESSION['user_id'] ?? null;
        $amount_due = $data['amountdue'];
        $price_per_unit = $data['price_per_unit']; // Add this field if not already present
        $invoice_number = "SPM-" . date("Y") . "-" . str_pad(rand(1000, 9999), 4, "0", STR_PAD_LEFT);
        $order_date = date("Y-m-d H:i:s");
        $order_status = "pending";
        
        if (!isset($_SESSION['user_id']) && !isset($_COOKIE['userToken'])) {
            $current_page=" ../eccom/index_pages/details.php?product_id=$product_id"; // Current page URL
            echo json_encode(['status' => 'redirect', 'url' => '../user_area/user_loginnew.php?redirect=' . $current_page]);
            exit();

        }
        else{
            
        
        // Validate required inputs
        if (empty($product_id) || empty($color) || empty($size) || empty($quantity) || empty($user_id)) {
            echo json_encode(['status' => 'error', 'message' => 'Invalid inputs']);
            exit;
        }
    
        // Check if the user has a shipping address
        $address_query = "SELECT * FROM user_addresses WHERE user_id = ?";
        $address_stmt = $con->prepare($address_query);
        $address_stmt->bind_param('i', $user_id);
        $address_stmt->execute();
        $address_result = $address_stmt->get_result();
    
        if ($address_result->num_rows === 0) {
            // No address found, redirect to the shipping page
            echo json_encode(['status' => 'redirect', 'url' => '../user_area/account.php']);
            exit;
        }
    
        // Get the user's shipping address
        $user_address = $address_result->fetch_assoc();
        $address_id = $user_address['address_id']; // Adjust column name as per your table
    
        // Insert into the user_orders table
        $order_query = "INSERT INTO user_orders (user_id, amount_due, invoice_number, total_products, order_status, order_date) 
                        VALUES (?, ?, ?, ?, ?, ?)";
        $order_stmt = $con->prepare($order_query);
        $order_stmt->bind_param('iisiss', $user_id, $amount_due, $invoice_number, $quantity, $order_status, $order_date);
    
        if ($order_stmt->execute()) {
            $last_order_id = $con->insert_id; // Get the last inserted order_id
    
            // Insert into orders_pending
            $pending_query = "INSERT INTO orders_pending (user_id, invoice_number, product_id, quantity, order_status, color, size, order_date) 
                              VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
            $pending_stmt = $con->prepare($pending_query);
            $pending_stmt->bind_param('isiissss', $user_id, $invoice_number, $product_id, $quantity, $order_status, $color, $size, $order_date);
    
            if ($pending_stmt->execute()) {
                // Insert into order_items
                $order_items_query = "INSERT INTO order_items (order_id, product_id, quantity, price_per_unit) 
                                      VALUES (?, ?, ?, ?)";
                $order_items_stmt = $con->prepare($order_items_query);
                $order_items_stmt->bind_param('iiid', $last_order_id, $product_id, $quantity, $price_per_unit);
    
                if ($order_items_stmt->execute()) {
                    //select status id
                    $shipping_status = "Processing"; // Initial shipping status
    
    // Prepare the query
    $shipping_status_query = "SELECT status_id FROM `status_types` WHERE status_name = ?";
    $status_stm = $con->prepare($shipping_status_query);
    $status_stm->bind_param('s', $shipping_status);
    $status_stm->execute();
    $result_status = $status_stm->get_result();
    
    // Check if a result was returned
    if ($result_status && $row = $result_status->fetch_assoc()) {
        $status_id = $row['status_id'];
                    // Insert into the shipping table
                    $shipping_query = "INSERT INTO shipping (order_id, shipping_date, status, address_id) 
                                       VALUES (?, ?, ?, ?)";
                    $shipping_date = date("Y-m-d H:i:s"); // Current date/time for shipping date
                    $shipping_stmt = $con->prepare($shipping_query);
                    $shipping_stmt->bind_param('isss', $last_order_id, $shipping_date, $status_id, $address_id);
    
                    if ($shipping_stmt->execute()) {
                     // Use insert_id to get the last inserted shipping_id
                         $ship_id = $con->insert_id;  
                        $update_status_ship="INSERT INTO shipping_status_history(shipping_id, status_id, updated_at) VALUES (?, ?, ?)";
                        $status_update_stm=$con->prepare( $update_status_ship);
                        $status_update_stm->bind_param('iis',$ship_id,$status_id,$shipping_date);
                         $status_update_stm->execute();
    
                        echo json_encode(['status' => 'success', 'message' => 'Order and shipping details added successfully']);
                    } else {
                        echo json_encode(['status' => 'error', 'message' => 'Failed to insert into shipping table']);
                    }}
                } else {
                    echo json_encode(['status' => 'error', 'message' => 'Failed to insert into order_items']);
                }
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Failed to insert into orders_pending']);
            }
        }
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Failed to place order']);
}


?>
