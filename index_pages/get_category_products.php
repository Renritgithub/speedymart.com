<?php
include("../includes/connect.php");

if (isset($_GET['category_id'])) {
    $category_id = intval($_GET['category_id']); // Convert to integer for safety

    // Secure SQL query to fetch products
    $select_query = "SELECT * FROM `products` WHERE category_id = ? ORDER BY RAND()";

    // Prepare the statement
    $stmt = $con->prepare($select_query);
    $stmt->bind_param("i", $category_id); // Bind the category_id parameter

    // Execute the prepared statement
    if ($stmt->execute()) {
        $result_query = $stmt->get_result();
        $products = [];

        // Loop through the results securely
        while ($row = $result_query->fetch_assoc()) {
            $product_id = $row['product_id'];
            $product_title = $row['product_title'];
            $product_description = $row['product_description'];
            $new_price = $row['new_price'];
            $old_price = $row['old_price'];
            $product_image1 = $row['product_image1'];
            $product_image2 = $row['product_image2'];
            $brand_id = $row['brand_id'];

            // Fetch the brand title based on brand_id
            $select_brand = "SELECT brand_title FROM `brand` WHERE brand_id = ?";
            $stmt_brand = $con->prepare($select_brand);
            $stmt_brand->bind_param("i", $brand_id);
            $stmt_brand->execute();
            $brand_result = $stmt_brand->get_result();
            $brand_row = $brand_result->fetch_assoc();
            $brand_title = $brand_row['brand_title'] ?? "Unknown Brand";
             
            $select_category = "SELECT category_title FROM `categories` WHERE category_id = ?";
            $stmt_category = $con->prepare($select_category);
            $stmt_category->bind_param("i", $category_id);
            $stmt_category->execute();
            $category_result = $stmt_category->get_result();
            $category_row = $category_result->fetch_assoc();
            $category_title = $category_row['category_title'] ?? "Unknown category";
            // Check if product images exist
            $image1_url = (!empty($product_image1) && file_exists("../admin_area/product_images/$product_image1")) 
                          ? "../admin_area/product_images/$product_image1" 
                          : "default-image.jpg";
            $image2_url = (!empty($product_image2) && file_exists("../admin_area/product_images/$product_image2")) 
                          ? "../admin_area/product_images/$product_image2" 
                          : "default-image.jpg";

            // Trim product description to max 30 characters
            $short_description = (strlen($product_description) > 33) 
                                 ? substr($product_description, 0, 30) . '...' 
                                 : $product_description;

            // Add the product to the response array
            $products[] = [
                "product_id" => $product_id,
                "title" => $product_title,
                "description" => $short_description,
                "new_price" => $new_price,
                "old_price" => $old_price,
                "brand" => $brand_title,
                "image1" => $image1_url,
                "image2" => $image2_url,
                "category"=>$category_title
            ];
        }

        // Send the JSON response
        header("Content-Type: application/json");
        echo json_encode(["status" => "success", "products" => $products]);
    } else {
        // Send an error response
        header("Content-Type: application/json");
        echo json_encode(["status" => "error", "message" => "Failed to fetch products."]);
    }
} else {
    // Send an error response if category_id is missing
    header("Content-Type: application/json");
    echo json_encode(["status" => "error", "message" => "Invalid category ID."]);
}
?>
