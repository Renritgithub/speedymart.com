<?php
include("../includes/connect.php");

$select_query = "SELECT * FROM `products` ORDER BY RAND()";
$stmt = $con->prepare($select_query);

if ($stmt->execute()) {
    $result_query = $stmt->get_result();
    $product_count = 0; // Initialize a counter

    while ($row = $result_query->fetch_assoc()) {
        $product_id = $row['product_id'];
        $product_title = $row['product_title'];
        $product_description = $row['product_description'];
        $new_price = $row['new_price'];
        $old_price = $row['old_price'];
        $product_image1 = $row['product_image1'];
        $product_image2 = $row['product_image2'];
        $category_id = $row['category_id'];
        $brand_id = $row['brand_id'];

        // Fetch brand title based on brand_id
        $select_brand = "SELECT brand_title FROM `brand` WHERE brand_id = ?";
        $stmt_brand = $con->prepare($select_brand);
        $stmt_brand->bind_param("i", $brand_id);
        $stmt_brand->execute();
        $brand_result = $stmt_brand->get_result();
        $brand_row = $brand_result->fetch_assoc();
        $brand_title = $brand_row['brand_title'];

        $percent = round((($old_price - $new_price) / $old_price) * 100);
        $title = (strlen($product_description) > 33) ? substr($product_description, 0, 30) . '...' : $product_description;

        // Output each product as a slide
        echo "<div class='product__item swiper-slide'>";
        echo "<div class='product__banner'>";
        echo "<a href='details.html' class='product__images'>";
        echo "<img src='../admin_area/product_images/" . ($product_image1 ?: 'default-image.jpg') . "' alt='$product_title' class='product__img hover'>";
        echo "<img src='../admin_area/product_images/" . ($product_image2 ?: 'default-image.jpg') . "' alt='$product_title' class='product__img default'>";
        echo "</a>";
        echo "<div class='product__badge light-pink'>" . ($percent != 0 ? "-{$percent}%" : $brand_title) . "</div>";
        echo "</div>";
        echo "<div class='product__content'>";
        echo "<h3 class='product__title'>$title</h3>";
        echo "<div class='product__price flex'>";
        echo "<span class='new__price'>$new_price Tsh</span>";
        if ($percent != 0) echo "<span class='old__price'>$old_price Tsh</span>";
        echo "</div></div></div>";
        
        $product_count++;
    }

    // Send a message if no products were found
    if ($product_count == 0) {
        echo "<p>No products available.</p>";
    }
} else {
    echo "<p>Something went wrong.</p>";
}

?>
