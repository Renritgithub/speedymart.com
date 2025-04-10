<?php
include("../includes/connect.php");

// Secure SQL query to fetch products in random order
$select_query = "SELECT * FROM `products` WHERE is_top_selling = ? ORDER BY RAND() LIMIT 5";
$stmt = $con->prepare($select_query);
$top_value = 1; // Or 0, depending on your requirement
$stmt->bind_param("i", $top_value); // "i" for integer type
if ($stmt->execute()) {
    // Fetch the result
    $result_query = $stmt->get_result();
    
    // Loop through the results securely
    while ($row = $result_query->fetch_assoc()) {
        $product_id = $row['product_id'];
        $product_title = $row['product_title'];
        $product_description = $row['product_description'];
        $new_price = $row['new_price'];
        $old_price = $row['old_price'];
        $product_image1 = $row['product_image1'];
        $category_id = $row['category_id'];
        $brand_id = $row['brand_id'];

        // Fetch the brand title based on brand_id
        $select_brand = "SELECT brand_title FROM `brand` WHERE brand_id = ?";
        $stmt_brand = $con->prepare($select_brand);
        $stmt_brand->bind_param("i", $brand_id);
        $stmt_brand->execute();
        $brand_result = $stmt_brand->get_result();
        $brand_row = $brand_result->fetch_assoc();
        $brand_title = $brand_row['brand_title'];

        // Calculate the discount percentage
        $percent = (($old_price - $new_price) / $old_price) * 100;
        $percent = round($percent); // Round the percentage

        // Check if product images exist and are valid (optional: check for specific file extensions)
        $valid_extensions = ['jpg', 'jpeg', 'png', 'gif']; // Valid extensions
        $image1_valid = false;
        $image2_valid = false;

        // Check if image 1 exists and has a valid extension
        if (!empty($product_image1) && file_exists("../admin_area/product_images/$product_image1")) {
            $image1_extension = pathinfo($product_image1, PATHINFO_EXTENSION);
            if (in_array(strtolower($image1_extension), $valid_extensions)) {
                $image1_valid = true;
            }
        }

        // Trim product description to max 30 characters (for title)
        $title = (strlen($product_description) > 33) ? substr($product_description, 0, 30) . '...' : $product_description;

            echo "<div class='showcase__item'>
    <a href='details.html' class='showcase__img-box'>";
            // Display first image if valid, otherwise a placeholder image
            if ($image1_valid) {
                echo "<img src='../admin_area/product_images/$product_image1' alt='' class='showcase__img'/>";
            } else {
                echo "<img src='default-image.jpg' alt='Default Image' class='product__img hover'>";
            }

           

            echo "  
    </a>
    <div class='showcase__content'>
        <a href='details.html'>
            <h4 class='showcase__title'>Floral Print Casual Cotton Dress</h4>
        </a>
        <div class='showcase__price'>
            <span class='new__price'>40Tsh</span>
            <span class='old__price'>50Tsh</span>
        </div>
    </div>
</div>";
        } 
} else {
    echo "Something went wrong.";
}
?>
