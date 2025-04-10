<?php
include "../includes/connect.php"; // Ensure this file connects to your database

if (isset($_POST['product_id'])) {
    $product_id = intval($_POST['product_id']);

    $stmt = $con->prepare("SELECT r.rating, r.review_text, r.review_date, r.image_path, u.first_name 
                            FROM product_review r
                            JOIN user_table u ON r.user_id = u.user_id
                            WHERE r.product_id = ? ORDER BY r.review_date DESC");
    $stmt->bind_param("i", $product_id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    $reviews = [];
    while ($row = $result->fetch_assoc()) {
        $reviews[] = $row;
    }
    
    echo json_encode($reviews);
}
?>
