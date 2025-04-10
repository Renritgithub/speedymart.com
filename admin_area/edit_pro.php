<?php
include('../includes/connect.php');

if (!empty($_POST['edit_id'])) {
    // Sanitize input fields to prevent XSS attacks
    $product_title = htmlspecialchars($_POST['product_title']);
    $description = htmlspecialchars($_POST['product_description']);
    $product_keyword = htmlspecialchars($_POST['product_keyword']);
    $product_category = htmlspecialchars($_POST['product_category']);
    $product_brand = htmlspecialchars($_POST['product_brand']);
    $old_price = htmlspecialchars($_POST['old_price']);
    $new_price = htmlspecialchars($_POST['new_price']);
    $product_status = 'true'; // Assuming active product
    $edit_id = intval($_POST['edit_id']); // Fetch edit_id

    // Accessing images
    $product_image1 = $_FILES['product_image1']['name'];
    $product_image2 = $_FILES['product_image2']['name'];
    $product_image3 = $_FILES['product_image3']['name'];
    $product_image4 = $_FILES['product_image4']['name'];

    // Accessing image tmp name
    $temp_image1 = $_FILES['product_image1']['tmp_name'];
    $temp_image2 = $_FILES['product_image2']['tmp_name'];
    $temp_image3 = $_FILES['product_image3']['tmp_name'];
    $temp_image4 = $_FILES['product_image4']['tmp_name'];

    // Allowed image file extensions
    $allowed_extensions = ['jpg', 'jpeg', 'png', 'gif'];
    
    // Check the image extensions and sizes
    $max_file_size = 5 * 1024 * 1024; // 5MB
    $images = [
        ['file' => $product_image1, 'tmp' => $temp_image1],
        ['file' => $product_image2, 'tmp' => $temp_image2],
        ['file' => $product_image3, 'tmp' => $temp_image3],
        ['file' => $product_image4, 'tmp' => $temp_image4],
    ];

    // Check if fields are empty
    if (empty($product_title) || empty($description) || empty($product_keyword) || empty($product_category) || empty($product_brand) || empty($old_price) || empty($new_price)) {
        echo "<script>alert('Please fill all the available fields.')</script>";
        exit();
    }

    // Check each image for valid extension and size
    foreach ($images as $image) {
        $file_ext = strtolower(pathinfo($image['file'], PATHINFO_EXTENSION));

        // Validate file extension
        if ($image['file'] && !in_array($file_ext, $allowed_extensions)) {
            echo "<script>alert('Only JPG, JPEG, PNG, and GIF files are allowed.')</script>";
            exit();
        }

        // Validate file size
        if ($image['file'] && $_FILES['product_image1']['size'] > $max_file_size) {
            echo "<script>alert('File size should not exceed 5MB.')</script>";
            exit();
        }
    }

    // Move and rename uploaded files (to avoid name conflicts)
    if ($product_image1) {
        $new_image_name1 = uniqid() . "_" . $product_image1;
        move_uploaded_file($temp_image1, "product_images/$new_image_name1");
    } else {
        $new_image_name1 = null; // Handle existing image logic here if needed
    }

    // Repeat for other images
    if ($product_image2) {
        $new_image_name2 = uniqid() . "_" . $product_image2;
        move_uploaded_file($temp_image2, "product_images/$new_image_name2");
    } else {
        $new_image_name2 = null; // Handle existing image logic here if needed
    }

    if ($product_image3) {
        $new_image_name3 = uniqid() . "_" . $product_image3;
        move_uploaded_file($temp_image3, "product_images/$new_image_name3");
    } else {
        $new_image_name3 = null; // Handle existing image logic here if needed
    }

    if ($product_image4) {
        $new_image_name4 = uniqid() . "_" . $product_image4;
        move_uploaded_file($temp_image4, "product_images/$new_image_name4");
    } else {
        $new_image_name4 = null; // Handle existing image logic here if needed
    }

    // Using prepared statements to prevent SQL injection
    $stmt = $con->prepare("UPDATE `products` SET `product_title` = ?, `product_description` = ?, `product_keyword` = ?, `category_id` = ?, `brand_id` = ?, `product_image1` = ?, `product_image2` = ?, `product_image3` = ?, `product_image4` = ?, `old_price` = ?, `new_price` = ?, `status` = ? WHERE `product_id` = ?");
    $stmt->bind_param("sssiissssiisi", 
        $product_title, 
        $description, 
        $product_keyword, 
        $product_category, 
        $product_brand, 
        $new_image_name1, 
        $new_image_name2, 
        $new_image_name3, 
        $new_image_name4, 
        $old_price, 
        $new_price, 
        $product_status,
        $edit_id // Bind the edit_id
    );

    // Execute the query and check for success
    if ($stmt->execute()) {
        echo "success";
    } else {
        echo "Error: " . $stmt->error; // Provide detailed error message
    }

    // Close the statement
    $stmt->close();
} else {
    echo "No product ID provided.";
}
?>
