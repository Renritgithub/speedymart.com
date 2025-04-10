<?php
include "../includes/connect.php";

$select_query = "SELECT * FROM `brand`";
$stmt = $con->prepare($select_query);

// Execute the prepared statement
$stmt->execute();
// Get the result
$result_sql = $stmt->get_result();

// Fetch data securely
while ($row_data = $result_sql->fetch_assoc()) {
    $brand_title = htmlspecialchars($row_data['brand_title'], ENT_QUOTES, 'UTF-8'); // Sanitize output
    $brand_id = intval($row_data['brand_id']); // Ensure brand_id is an integer

    echo "<li><a class='dropdown-item' href='shop.php?rasndb=$brand_title' >$brand_title</a></li>";

}

// Close the first statement after the loop
$stmt->close();
?>
