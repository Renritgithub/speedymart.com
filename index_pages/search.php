<?php
include '../includes/connect.php';
require 'predis/autoload.php';
Predis\Autoloader::register();
$redis = new Predis\Client(); // Use Predis
// $redis = new Redis(); // Uncomment if using PHP's built-in Redis extension
// $redis->connect('127.0.0.1', 6379);
if (!empty($_POST['searchTerm'])) {
    $shop_search= $_POST['searchTerm'];
    $cache_key = "search:" . md5($shop_search); // Create a unique cache key

    // Check if results exist in Redis
    if ($redis->exists($cache_key)) {
        // Fetch results from Redis cache
        $cached_results = json_decode($redis->get($cache_key), true);
        if (!empty($cached_results)) {
            echo "<ul class='history-list'>";
            foreach ($cached_results as $row) {
                echo "<li onclick='history.pushState(null, null, \"" . urlencode($row['product_title']) . "\")'><a href='shop.php?keyword=" . urlencode($row['product_title']) . "'>" . htmlspecialchars($row['product_title']) . "</a></li>";
            }
            echo "</ul>";
            exit; // Stop execution as we already returned cached results
        }
    }
    $search_data_value = '%' . $_POST['searchTerm'] . '%'; // Add wildcards for partial matching
    
    // Prepare the SQL query
    $search_query = "SELECT 
    p.product_title, 
    p.product_description, 
    p.new_price, 
    p.product_image1, 
    c.category_title, 
    b.brand_title 
FROM products AS p 
JOIN categories AS c ON c.category_id = p.category_id 
JOIN brand AS b ON b.brand_id = p.brand_id 
WHERE p.product_keyword LIKE ? OR p.product_title LIKE ?";

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
        echo "<ul class='history-list'>"; // Begin list for found products
        while ($row = mysqli_fetch_assoc($result_query)) {
            $product_title = htmlspecialchars($row['product_title']);
            $product_description = htmlspecialchars($row['product_description']);
            $product_price = htmlspecialchars($row['new_price']);
            $product_image1 = htmlspecialchars($row['product_image1']);
            $product_category=htmlspecialchars($row['category_title']);
            $product_brand=htmlspecialchars($row['brand_title']);

            echo "<li onclick='history.pushState(null, null, \"" . urlencode($product_title) . "\")'><a href='shop.php?keyword=".urlencode( $product_title)."'>" . htmlspecialchars($product_title) . "</a></li>";



// Display product title
            // Optionally display more fields as needed
        }
        echo "</ul>"; // End list
    }
    
    // Close the statement
    mysqli_stmt_close($stmt);
}
?>
