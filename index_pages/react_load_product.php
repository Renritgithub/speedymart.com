<?php
include("../includes/connect.php");

header("Content-Type: application/json");

$select_query = "SELECT * FROM `products` ORDER BY RAND() LIMIT 10";
$stmt = $con->prepare($select_query);

if ($stmt->execute()) {
    $result_query = $stmt->get_result();
    $products = [];

    while ($row = $result_query->fetch_assoc()) {
        $brand_id = $row['brand_id'];

        // Fetch the brand title
        $select_brand = "SELECT brand_title FROM `brand` WHERE brand_id = ?";
        $stmt_brand = $con->prepare($select_brand);
        $stmt_brand->bind_param("i", $brand_id);
        $stmt_brand->execute();
        $brand_result = $stmt_brand->get_result();
        $brand_row = $brand_result->fetch_assoc();
        $brand_title = $brand_row['brand_title'];

        // Calculate the discount percentage
        $old_price = $row['old_price'];
        $new_price = $row['new_price'];
        $percent = ($old_price > 0) ? round((($old_price - $new_price) / $old_price) * 100) : 0;

        $products[] = [
            "product_id" => $row['product_id'],
            "product_title" => $row['product_title'],
            "product_description" => $row['product_description'],
            "new_price" => $new_price,
            "old_price" => $old_price,
            "product_image1" => $row['product_image1'],
            "product_image2" => $row['product_image2'],
            "brand_title" => $brand_title,
            "discount_percent" => $percent,
        ];
    }

    echo json_encode(["products" => $products]);
} else {
    echo json_encode(["error" => "Something went wrong."]);
}
?>
