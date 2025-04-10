<?php
include("../includes/connect.php");

// Secure SQL query to fetch products in random order
$select_query = "SELECT * FROM `products` ORDER BY RAND()";
$stmt = $con->prepare($select_query);
if ($stmt->execute()) {
    // Fetch the result
    $result_query = $stmt->get_result();
    echo " <h3 class='section__title'>Popular <span>Categories</span>
               </h3>
    <div class='swiper mySwiper categories__container'>
    <div class='swiper-wrapper'>";
    
    // Loop through the results securely
    while ($row = $result_query->fetch_assoc()) {
        $product_title = $row['product_title'];
        $product_image1 = $row['product_image1'];
        $category_id = $row['category_id'];

        // Check if product images exist and are valid (optional: check for specific file extensions)
        
            echo "<div class='swiper-slide'>
                       <a href='shop.html' class='category__item swiper-slide'>
                           <img src='../admin_area/product_images/$product_image1' alt='' class='category__img'>
                            <h3 class='category_title'>$product_title</h3>
                        </a>
                 </div>";
        
} 
echo " </div>
    <div class='swiper-button-next'><i class='fa-solid fa-arrow-right'></i></div>
    <div class='swiper-button-prev' ><i class='fa-solid fa-arrow-left'></i></div>
</div>";
}
else {
    echo "Something went wrong.";
}
?>

        <!-- Category Item 1 -->
   



        
       
  