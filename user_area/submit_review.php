<?php
session_start();
// Database conection
include('../includes/connect.php');

header('Content-Type: application/json');

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Check if the user is logged in
    if (!isset($_SESSION['user_id'])) {
        echo json_encode(["success" => false, "message" => "User not logged in."]);
        exit;
    }

    $user_id = $_SESSION['user_id']; // Get the logged-in user's ID
    // Validate input fields
    $rating = isset($_POST['rating']) ? intval($_POST['rating']) : 0;
    $reviewText = isset($_POST['review-text']) ? $con->real_escape_string($_POST['review-text']) : '';
    $product_id = isset($_POST['product_id']) ? $con->real_escape_string($_POST['product_id']) : '';
    
    if ($rating < 1 || $rating > 5 || empty($reviewText)) {
        echo json_encode(["success" => false, "message" => "Invalid input."]);
        exit;
    }

    // Handle file upload
    $fileUploaded = false;
$filePath = null;

if (isset($_FILES["product-image"]["name"]) && $_FILES["product-image"]["error"] === 0) {
    // Define the directory where the file will be uploaded
    $uploadDir = "../admin_area/product_images/";

    // Check if the directory exists, and if not, create it
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);  // 0777 gives full permissions; modify as needed
    }

    // Generate a unique filename to avoid overwriting
    $fileName = uniqid() . "-" . basename($_FILES["product-image"]["name"]);
    
    // Define the target file path
    $targetFilePath = $uploadDir . $fileName;

    // Check if the file is a valid upload (e.g., image validation)
    // You can add validation for the file type, size, etc., here if needed

    // Move the uploaded file to the desired directory
    if (move_uploaded_file($_FILES["product-image"]["tmp_name"], $targetFilePath)) {
        // If the file upload is successful
        $fileUploaded = true;
        $filePath = $targetFilePath;
    } else {
        // If the file upload fails
        echo json_encode(["success" => false, "message" => "Failed to upload the image."]);
        exit;
    }
} else {
    // Handle the case where no file was uploaded or there was an error
    echo json_encode(["success" => false, "message" => "No file uploaded or there was an error."]);
    exit;
}

// After this point, you can use $fileUploaded and $filePath as needed in your code.


    // Insert review into the database
    $stmt = $con->prepare("INSERT INTO product_review (product_id, user_id, rating, review_text, review_date, image_path) VALUES (?, ?, ?, ?, NOW(), ?)");
    $stmt->bind_param("iiiss", $product_id, $user_id, $rating, $reviewText, $filePath);


    if ($stmt->execute()) {
        echo json_encode(["success" => true, "message" => "Review submitted successfully!"]);
    } else {
        echo json_encode(["success" => false, "message" => "Failed to submit the review."]);
    }

    $stmt->close();
    $con->close();
} else {
    echo json_encode(["success" => false, "message" => "Invalid request method."]);
}
?>
