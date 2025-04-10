<?php
session_start();
// Database connection
include('../includes/connect.php');

header('Content-Type: application/json');

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    echo json_encode(["success" => false, "message" => "User not logged in."]);
    exit;
}

$user_id = $_SESSION['user_id']; // Get the logged-in user's ID

// Fetch order details from user_orders and order_pending
$get_order_details = "
  SELECT 
    uo.order_id, 
    uo.amount_due, 
    uo.invoice_number, 
    uo.total_products, 
    uo.order_date, 
    uo.order_status, 
    oi.product_id, 
    ss.status_name,
    ua.address_line1,
    ua.district,
    ua.postal_code,
    ua.country,
    sr.region_name,
    sr.base_rate,
    sr.weight_surcharge

FROM 
    user_orders uo
LEFT JOIN 
    orders_pending op ON uo.order_id = op.order_id
LEFT JOIN 
    order_items oi ON uo.order_id = oi.order_id  
LEFT JOIN 
    shipping s ON uo.order_id = s.order_id
LEFT JOIN
   user_addresses ua ON s.address_id = ua.address_id
LEFT JOIN
   shipping_rates sr ON ua.region_id= sr.region_id
LEFT JOIN 
    (
        SELECT sh1.* 
        FROM shipping_status_history sh1
        INNER JOIN (
            SELECT shipping_id, MAX(updated_at) AS latest_update 
            FROM shipping_status_history 
            GROUP BY shipping_id
        ) sh2 
        ON sh1.shipping_id = sh2.shipping_id AND sh1.updated_at = sh2.latest_update
    ) sh ON s.shipping_id = sh.shipping_id
LEFT JOIN 
    status_types ss ON sh.status_id = ss.status_id
WHERE 
    uo.user_id = ?
";

$stmt = $con->prepare($get_order_details);

if ($stmt) {
    // Bind the parameter (i for integer)
    $stmt->bind_param('i', $user_id);

    // Execute the query
    $stmt->execute();

    // Get the result
    $result_data = $stmt->get_result();

    // Initialize an array to store the orders data
    $orders_data = array();

    // Fetch order data
    while ($row_data = $result_data->fetch_assoc()) {
        $order_id = $row_data['order_id'];
        $amount_due = $row_data['amount_due'];
        $invoice_number = $row_data['invoice_number'];
        $total_products = $row_data['total_products'];
        $order_date = $row_data['order_date'];
        $order_status = $row_data['order_status'] === 'pending' ? 'Incomplete' : 'Complete';
        $product_id = $row_data['product_id'] ?? null;  // Handle case where there may be no pending product_id
        $status_ship_name=$row_data['status_name'];
        $address_street=$row_data['address_line1'];
        $district=$row_data['district'];
        $region=$row_data['region_name'];
        $postal_code=$row_data['postal_code'];
        $shipping_charge=$row_data['weight_surcharge'];
        $base_rate=$row_data['base_rate'];


        // If product_id exists, fetch product details
        $product_details = null;
        if ($product_id) {
            $get_product_details = "
                SELECT product_image1, product_description, product_title 
                FROM products 
                WHERE product_id = ?
            ";
            $product_stmt = $con->prepare($get_product_details);

            if ($product_stmt) {
                // Bind the parameter (i for integer)
                $product_stmt->bind_param('i', $product_id);

                // Execute the query
                $product_stmt->execute();

                // Get the result
                $product_result = $product_stmt->get_result();

                if ($product_result->num_rows > 0) {
                    // Fetch the product data
                    $product_data = $product_result->fetch_assoc();
                    $product_details = array(
                        'product_id' => $product_id,
                        'product_description' => $product_data['product_description'],
                        'product_image' => $product_data['product_image1'],
                        'product_title' => $product_data['product_title']
                    );
                }

                // Close the product statement
                $product_stmt->close();
            } else {
                echo json_encode(["success" => false, "message" => "Failed to prepare product statement: " . $con->error]);
                exit();
            }
        }

        // Organize the order data
        $order_details = array(
            'order_id' => $order_id,
            'amount_due' => $amount_due,
            'invoice_number' => $invoice_number,
            'total_products' => $total_products,
            'order_date' => $order_date,
            'order_status' => $order_status,
            'shipping_status' => $status_ship_name,
            'address_street'=> $address_street,
            'district' => $district,
            'region' => $region,
            'postal_code' => $postal_code,
            'shipping_charge' => $shipping_charge,
            'base_rate' => $base_rate,
            'product_details' => $product_details // Include product details if available
        );

        // Add this order's details to the orders data array
        $orders_data[] = $order_details;
    }

    // Encode the data into JSON format and return the response
    echo json_encode(["success" => true, "orders" => $orders_data]);
    exit();

    // Close the statement
    $stmt->close();
} else {
    // Handle error if the statement could not be prepared
    echo json_encode(["success" => false, "message" => "Failed to prepare order details statement: " . $con->error]);
}
?>
3