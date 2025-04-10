<?php
include('../includes/connect.php');


if (!empty($_POST['product_title'])) {
   

    // Sanitize input fields to prevent XSS attacks
    $product_title = htmlspecialchars($_POST['product_title']);
    $description = htmlspecialchars($_POST['product_description']);
    $product_keyword = htmlspecialchars($_POST['product_key']);
    $product_category = (int)$_POST['product_category']; // Ensure this is an integer
    $product_brand = (int)$_POST['product_brand']; // Ensure this is an integer
    $old_price = htmlspecialchars($_POST['old_price']);
    $new_price = htmlspecialchars($_POST['new_price']);
    $product_status = 'true'; // Assuming active product
    // Handle checkbox array
    $selected_categories = isset($_POST['categories']) ? $_POST['categories'] : [];
    $hot_release = in_array('hot_release', $selected_categories) ? 1 : 0;
    $deals = in_array('deals', $selected_categories) ? 1 : 0;
    $top_selling = in_array('top_selling', $selected_categories) ? 1 : 0;
    $trending = in_array('trending', $selected_categories) ? 1 : 0;

    // Accessing images
    $images = [];
    for ($i = 1; $i <= 4; $i++) {
        $images[] = [
            'name' => $_FILES["product_image$i"]['name'],
            'tmp' => $_FILES["product_image$i"]['tmp_name'],
            'error' => $_FILES["product_image$i"]['error'],
            'size' => $_FILES["product_image$i"]['size']
        ];
    }

    // Allowed image file extensions
    $allowed_extensions = ['jpg', 'jpeg', 'png', 'gif'];
    $max_file_size = 5 * 1024 * 1024; // 5MB

    // Check if fields are empty
    if (empty($product_title) || empty($description) || empty($product_keyword) || empty($product_category) || empty($product_brand) || empty($old_price) || empty($new_price)) {
        echo "<script>alert('Please fill all the available fields.')</script>";
        exit();
    }

    // Check each image for valid extension and size
    foreach ($images as $image) {
        $file_ext = strtolower(pathinfo($image['name'], PATHINFO_EXTENSION));

        // Validate file extension
        if (!in_array($file_ext, $allowed_extensions)) {
            echo "<script>alert('Invalid file extension for file: {$image['name']}');</script>";
            exit();
        }

        // Validate file size
        if ($image['size'] > $max_file_size) {
            echo "<script>alert('File size of {$image['name']} should not exceed 5MB.');</script>";
            exit();
        }

        // Check if the file uploaded successfully
        if ($image['error'] !== UPLOAD_ERR_OK) {
            echo "<script>alert('Error uploading file: {$image['name']}');</script>";
            exit();
        }
    }

    // Move and rename uploaded files (to avoid name conflicts)
    $new_image_names = [];
    foreach ($images as $image) {
        $new_image_name = uniqid() . "_" . basename($image['name']);
        move_uploaded_file($image['tmp'], "product_images/$new_image_name");
        $new_image_names[] = $new_image_name;
    }
    $video_name = $_FILES['product_video']['name'];
    $video_tmp = $_FILES['product_video']['tmp_name'];
    $video_size = $_FILES['product_video']['size'];
    $video_ext = pathinfo($video_name, PATHINFO_EXTENSION);
    $allowed_exts = ['mp4', 'avi', 'mov', 'wmv'];

    // Check file type
    if (!in_array($video_ext, $allowed_exts)) {
        die("Invalid file type. Only MP4, AVI, MOV, and WMV are allowed.");
    }

    // Check file size (Max: 100MB)
    if ($video_size > 100 * 1024 * 1024) {
        die("File size too large. Max 100MB allowed.");
    }

    // Create uploads folder if not exists
    $upload_dir = "product_videos/";
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0777, true);
    }

    // Move file to uploads directory
    $video_path = $upload_dir ."video"."_". $video_name;
    move_uploaded_file($video_tmp, $video_path);
//product_specification======================================================

   $specifications_text = $_POST['specifications_text']; // Text pasted by user

// Directory to save JSON files
$specifications_dir = 'specifications_json/';

// Parse the text into an array of specifications
$specifications = [];
$lines = explode("\n", $specifications_text); // Split into lines

foreach ($lines as $line) {
    // Using a simple format: "Name: Value" or "Name | Value"
    if (preg_match('/^(.*?)\s*[:|]\s*(.*?)$/', trim($line), $matches)) {
        $specifications[] = ['name' => $matches[1], 'value' => $matches[2]];
    }
}

// Generate a unique file name for the JSON file
$json_file_name = 'product_' . $product_title.'_specifications.json';
$json_file_path = $specifications_dir . $json_file_name;

// Write the JSON data to the file
file_put_contents($json_file_path, json_encode($specifications, JSON_PRETTY_PRINT));
    // Using prepared statements to prevent SQL injection
    $stmt = $con->prepare("INSERT INTO `products` (`product_title`, `product_description`, `product_keyword`, `category_id`, `brand_id`, `product_image1`, `product_image2`, `product_image3`, `product_image4`, `product_video`, `specification_json`,  `old_price`, `new_price`, `date`, `status`, `is_hot_release`, `is_deal`, `is_top_selling`, `is_trending`) 
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?,?, ?,?, ?, NOW(), ?, ?, ?, ?, ?)");
    
    // Corrected the bind_param to match the parameters
    $stmt->bind_param("sssiissssssddsiiii", 
        $product_title, 
        $description, 
        $product_keyword, 
        $product_category, 
        $product_brand, 
        $new_image_names[0], 
        $new_image_names[1], 
        $new_image_names[2], 
        $new_image_names[3], 
        $video_path,
        $json_file_path,
        $old_price, 
        $new_price, 
        $product_status,
        $hot_release,
        $deals,
        $top_selling,
        $trending


    );

    // Execute the query and check for success
    if ($stmt->execute()) {
        echo "<script>alert('success')</script>";
    } else {
        echo "something went wrong: " . $stmt->error; // Improved error handling
    }

    // Close the statement
    $stmt->close();
}
?>
