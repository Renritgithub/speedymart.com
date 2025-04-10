<?php
include '../includes/connect.php';
error_reporting(E_ALL); // Report all types of errors
ini_set('display_errors', '1'); // Display errors on the screen

if (!empty($_POST['searchTerm'])) {
    $search_data_value = '%' . $_POST['searchTerm'] . '%'; // Add wildcards for partial matching
    
    // Prepare the SQL query
    $search_query = "SELECT * FROM `products` WHERE product_keyword LIKE ? OR product_title LIKE ?";
    $stmt = mysqli_prepare($con, $search_query);
    
    // Bind parameters (ss for two strings)
    mysqli_stmt_bind_param($stmt, "ss", $search_data_value, $search_data_value);
    
    // Execute the query
    mysqli_stmt_execute($stmt);
    
    // Get the result
    $result_query = mysqli_stmt_get_result($stmt);
    $num_rows = mysqli_num_rows($result_query);
    
    // Check if products were found
    if ($num_rows == 0) {
        echo "<h4>No result, Please try again</h4>";
    } else {
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
    
            // Check if image 2 exists and has a valid extension
            if (!empty($product_image2) && file_exists("../admin_area/product_images/$product_image2")) {
                $image2_extension = pathinfo($product_image2, PATHINFO_EXTENSION);
                if (in_array(strtolower($image2_extension), $valid_extensions)) {
                    $image2_valid = true;
                }
            }
    
            // Trim product description to max 30 characters (for title)
            $title = (strlen($product_description) > 33) ? substr($product_description, 0, 30) . '...' : $product_description;
    
            // Display product based on whether it's discounted or not
            if ($percent != 0) {
                echo "<div class='product__item'>
                        <div class='product__banner'>
                            <a href='details.html' class='product__images'>";
    
                // Display first image if valid, otherwise a placeholder image
                if ($image1_valid) {
                    echo "<img src='../admin_area/product_images/$product_image1' alt='$product_title' class='product__img hover'>";
                } else {
                    echo "<img src='default-image.jpg' alt='Default Image' class='product__img hover'>";
                }
    
                // Display second image if valid
                if ($image2_valid) {
                    echo "<img src='../admin_area/product_images/$product_image2' alt='$product_title' class='product__img default'>";
                } else {
                    echo "<img src='default-image.jpg' alt='Default Image' class='product__img default'>";
                }
    
                echo "   </a>
                            <div class='product__actions'>
                                <a href='#' class='action__btn' aria-label='Quick View'><i class='fa-regular fa-eye'></i></a>
                                <a href='#' class='action__btn' aria-label='Add To Wishlist'><i class='fa-regular fa-heart'></i></a>
                                <a href='#' class='action__btn' aria-label='Compare'><i class='fa-solid fa-shuffle'></i></a>
                            </div>
                            <div class='product__badge light-pink'>-{$percent}%</div>
                        </div>
                        <div class='product__content'>
                            <h3 class='product__title'>$title</h3>
                            <div class='product__rating'>
                                <i class='fa-solid fa-star'></i>
                                <i class='fa-solid fa-star'></i>
                                <i class='fa-solid fa-star'></i>
                                <i class='fa-solid fa-star'></i>
                                <i class='fa-solid fa-star'></i>
                            </div>
                            <div class='product__price flex'>
                                <span class='new__price'>$new_price Tsh</span>
                                <span class='old__price'>$old_price Tsh</span>
                            </div>
                            <a href='#' class='action__btn cart__btn' aria-label='Add To Cart'>
                                <i class='fa-solid fa-cart-shopping'></i>
                            </a>
                        </div>
                    </div>";
            } else {
                echo "<div class='product__item'>
                        <div class='product__banner'>
                            <a href='details.html' class='product__images'>";
    
                // Display first image if valid, otherwise a placeholder image
                if ($image1_valid) {
                    echo "<img src='../admin_area/product_images/$product_image1' alt='$product_title' class='product__img hover'>";
                } else {
                    echo "<img src='default-image.jpg' alt='Default Image' class='product__img hover'>";
                }
    
                // Display second image if valid
                if ($image2_valid) {
                    echo "<img src='../admin_area/product_images/$product_image2' alt='$product_title' class='product__img default'>";
                } else {
                    echo "<img src='default-image.jpg' alt='Default Image' class='product__img default'>";
                }
    
                echo "      </a>
                            <div class='product__actions'>
                                <a href='#' class='action__btn' aria-label='Quick View'><i class='fa-regular fa-eye'></i></a>
                                <a href='#' class='action__btn' aria-label='Add To Wishlist'><i class='fa-regular fa-heart'></i></a>
                                <a href='#' class='action__btn' aria-label='Compare'><i class='fa-solid fa-shuffle'></i></a>
                            </div>
                            <div class='product__badge light-pink'>$brand_title</div>
                        </div>
                        <div class='product__content'>
                            <h3 class='product__title'>$title</h3>
                            <div class='product__rating'>
                                <i class='fa-solid fa-star'></i>
                                <i class='fa-solid fa-star'></i>
                                <i class='fa-solid fa-star'></i>
                                <i class='fa-solid fa-star'></i>
                                <i class='fa-solid fa-star'></i>
                            </div>
                            <div class='product__price flex'>
                                <span class='new__price'>$new_price Tsh</span>
                            </div>
                            <a href='#' class='action__btn cart__btn' aria-label='Add To Cart'>
                                <i class='fa-solid fa-cart-shopping'></i>
                            </a>
                        </div>
                    </div>";
            }
        }}}
?>
