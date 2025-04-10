<?php
// Establish connection to your database
include "../includes/connect.php";
$searchQuery = isset($_GET['search']) ? mysqli_real_escape_string($conn, $_GET['search']) : '';

// Prepare arrays for suggestions and products
$suggestions = [];
$products = [];

// Search for suggestions (auto-complete feature)
if (!empty($searchQuery)) {
    // Prepare and execute the query for suggestions
    $suggestionQuery = "SELECT product_title FROM products WHERE product_title LIKE ? LIMIT 5";
    $stmt = $conn->prepare($suggestionQuery);
    $searchTerm = "%" . $searchQuery . "%"; // Add wildcards for LIKE query
    $stmt->bind_param('s', $searchTerm); // Bind parameter for prepared statement
    $stmt->execute();
    $result = $stmt->get_result();

    while ($row = $result->fetch_assoc()) {
        $suggestions[] = $row['product_title'];
    }

    // Prepare and execute the query for fetching products
    $productQuery = "SELECT product_id, product_title, new_price, product_image1 FROM products WHERE product_title LIKE ? LIMIT 10";
    $stmt = $conn->prepare($productQuery);
    $stmt->bind_param('s', $searchTerm); // Bind parameter for prepared statement
    $stmt->execute();
    $result = $stmt->get_result();

    while ($row = $result->fetch_assoc()) {
        $products[] = [
            'product_id' => $row['product_id'],
            'product_title' => $row['product_title'],
            'new_price' => $row['new_price'],
            'product_image1' => $row['product_image1']
        ];
    }
} else {
    // If no search query is provided, fetch some default products (optional)
    $productQuery = "SELECT product_id, product_title, new_price, product_image1 FROM products LIMIT 10";
    $stmt = $conn->prepare($productQuery);
    $stmt->execute();
    $result = $stmt->get_result();

    while ($row = $result->fetch_assoc()) {
        $products[] = [
            'product_id' => $row['product_id'],
            'product_title' => $row['product_title'],
            'new_price' => $row['new_price'],
            'product_image1' => $row['product_image1']
        ];
    }
}

// Close connection
$stmt->close();
$conn->close();

// Return the data as JSON
echo json_encode([
    'suggestions' => $suggestions,
    'products' => $products
]);
?>
