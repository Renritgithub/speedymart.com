<?php
include "../includes/connect.php";

$select_query = "SELECT * FROM `categories`";
$stmt = $con->prepare($select_query);

// Execute the prepared statement
$stmt->execute();
// Get the result
$result_sql = $stmt->get_result();

// Fetch data securely
while ($row_data = $result_sql->fetch_assoc()) {
    $category_title = htmlspecialchars($row_data['category_title'], ENT_QUOTES, 'UTF-8'); // Sanitize output
    $category_id = intval($row_data['category_id']); // Ensure category_id is an integer

    echo "<button class='category' onclick='get_products($category_id)'>$category_title</button>";

}

// Close the first statement after the loop
$stmt->close();
?>
