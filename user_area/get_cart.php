<?php
include('../includes/connect.php');
header("Content-Type: application/json");
$data = json_decode(file_get_contents("php://input"), true);

// Retrieve the product ID, quantity, and user ID from the request
$user_id = isset($_GET['userId']) ? intval($_GET['userId']) : null;

// Prepare the statement to fetch cart details for the user
$stmt = $con->prepare('SELECT * FROM `cart_details` WHERE user_id = ?');
$stmt->bind_param('i', $user_id);

if ($stmt->execute()) {
    $cartPage = [];
    $result = $stmt->get_result();
    
    // Loop through all cart items for this user
    while ($row = $result->fetch_assoc()) {
        $product_id = $row['product_id'];
        $quantity = $row['quantity'];
        
        // Fetch product details for each item in the cart
        $stm = $con->prepare('SELECT product_description, new_price, product_image1 FROM products WHERE product_id = ?');
        $stm->bind_param('i', $product_id);
        $stm->execute();
        
        // Get the product details
        $productResult = $stm->get_result();
        $product = $productResult->fetch_assoc();

        if ($product) {
            // Calculate total price for the quantity
            $total_price = $quantity * $product['new_price'];
            
            // Add the cart item data to the cart array
            $cartPage[] = [
                "cart_id" => $row['cart_id'],
                "product_description" => $product['product_description'],
                "productImage" => $product['product_image1'],
                "price" => $total_price,
                "quantity"=>$quantity
            ];
        }
        $stm->close();
    }
    
    // Output the cart data as JSON
    echo json_encode(["cart" => $cartPage]);
} else {
    echo json_encode(["error" => "Something went wrong."]);
}

// Close the statements and database connection
$stmt->close();
$con->close();
?>
