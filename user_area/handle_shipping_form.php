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

    // Collect and sanitize input
    $fullName = htmlspecialchars(trim($_POST['fullName']));
    $email = htmlspecialchars(trim($_POST['email']));
    $phone = htmlspecialchars(trim($_POST['phone']));
    $address = htmlspecialchars(trim($_POST['address']));
    $region = htmlspecialchars(trim($_POST['region']));
    $district = htmlspecialchars(trim($_POST['district']));
    $postal_code = htmlspecialchars(trim($_POST['zip']));
    $country = htmlspecialchars(trim($_POST['country']));

    // Validate required fields
    if (empty($fullName) || empty($email) || empty($phone) || empty($address) || empty($region) || empty($district) || empty($postal_code) || empty($country)) {
        echo json_encode(["success" => false, "message" => "All fields are required."]);
        exit;
    }

    // Retrieve region_id from the shipping_rate table
    $stmt = $con->prepare("SELECT region_id FROM shipping_rates WHERE region_name = ?");
    $stmt->bind_param("s", $region);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows === 0) {
        echo json_encode(["success" => false, "message" => "Invalid region."]);
        exit;
    }
    $row = $result->fetch_assoc();
    $region_id = $row['region_id'];
    $stmt->close();

    // Check if the user already has addresses
    $stmt = $con->prepare("SELECT * FROM user_addresses WHERE user_id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    // If the user has existing addresses, set the current default to 0
    if ($result->num_rows > 0) {
        $is_default = 0;
        $update_stmt = $con->prepare("UPDATE user_addresses SET is_default = ? WHERE user_id = ?");
        $update_stmt->bind_param("ii", $is_default, $user_id);
        $update_stmt->execute();
        $update_stmt->close();
    }
    $stmt->close();

    // Insert new address
    $is_default = 1; // New address will be the default
    $insert_stmt = $con->prepare("INSERT INTO user_addresses 
        (user_id, full_name, phone_number, email, address_line1, region_id, district, postal_code, country, is_default, created_at) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW())");
    $insert_stmt->bind_param("issssissis", $user_id, $fullName, $phone, $email, $address, $region_id, $district, $postal_code, $country, $is_default);

    if ($insert_stmt->execute()) {
        echo json_encode(["success" => true, "message" => "Shipping address saved successfully."]);
    } else {
        echo json_encode(["success" => false, "message" => "Error saving data: " . $con->error]);
    }

    $insert_stmt->close();
} else {
    echo json_encode(["success" => false, "message" => "Invalid Request"]);
}

// Close conection
$con->close();
?>
