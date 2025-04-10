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

    $select_pquery = "SELECT * FROM `products` WHERE category_id=? LIMIT 5";
    $stmt_query = $con->prepare($select_pquery);
    $stmt_query->bind_param("i", $category_id);
    $stmt_query->execute();
    $result = $stmt_query->get_result();
    echo "<div class='accordion-item' onmouseover='scrollToView(this)'>
            <div class='accordion-header'>$category_title</div>
            <ul class='accordion-content'>";
    if($result->num_rows>0){
        while ($row = $result->fetch_assoc()) {
            $product_title = htmlspecialchars($row['product_title'], ENT_QUOTES, 'UTF-8'); // Sanitize output
            echo "<li onclick='history.pushState(null, null, \"" . urlencode($product_title) . "\")'><a href='shop.php?cat=" . urlencode($product_title) ."'>" . htmlspecialchars($product_title) . "</a></li>";
        }

    }else{
        echo "<li> no such categories</li>";
    }
    
    $stmt_query->close();
    echo "</ul>
        </div>";
}

// Close the first statement after the loop
$stmt->close();
?>
