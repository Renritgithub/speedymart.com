<?php
// Include the database connection file
include("../includes/connect.php");
header('Content-Type: application/json');

// Check if product_id is provided
if (isset($_GET['product_id'])) {
    $product_id = intval($_GET['product_id']); // Sanitize input

    // Prepare SQL query with the correct joins
    $query = "
        SELECT 
            p.product_id AS product_id, 
            p.product_title AS product_title, 
            p.new_price AS product_price,
            p.old_price AS old_price,
            p.brand_id AS brand_id,
            p.product_image1 AS image1,
            p.product_image2 AS image2,
            p.product_image3 AS image3,
            p.product_image4 AS image4, 
            p.product_video AS video,
            p.specification_json AS specs,
            p.product_description AS product_description, 
            pa.name AS attribute_name, 
            pav.value AS attribute_value, 
            pv.stock AS stock, 
            pv.price_adjustment AS price_adjustment
        FROM 
            products p  
        LEFT JOIN 
            product_variations pv 
        ON 
            p.product_id = pv.product_id
        LEFT JOIN 
            product_attribute_values pav 
        ON 
            pv.attribute_value_id = pav.attribute_value_id
        LEFT JOIN 
            product_attributes pa 
        ON 
            pav.attribute_id = pa.attribute_id
        WHERE 
            p.product_id = ?
    ";

    // Prepare the statement
    if ($stmt = $con->prepare($query)) {
        // Bind the parameter (product_id)
        $stmt->bind_param("i", $product_id); // "i" is for integer type

        // Execute the query
        $stmt->execute();

        // Get the result
        $result = $stmt->get_result();

        // Initialize arrays for the product details and attributes
        $product_details = [];
        $attributes = [];
        $images=[];
        $quantity=1;

        // Fetch the data
        while ($row = $result->fetch_assoc()) {
            $product_specification = $row['specs'];
            $brand_id= $row['brand_id'];
            // Capture product details (only once)
            $stm=$con->prepare('select brand_title from `brand` where brand_id=?');
            $stm->bind_param("i", $brand_id);
            $stm->execute();
            $res=$stm->get_result();
            if($res->num_rows>0){
                $roow=$res->fetch_assoc();
                $brand_title=$roow['brand_title'];
            }else{
                $brand_title=" ";
            }
            $stm->close();
            if (empty($product_details) && empty($images)) {
                $product_details = [
                    'product_id' => $row['product_id'],
                    'product_title' => $row['product_title'],
                    'product_price' => $row['product_price'],
                    'product_description' => $row['product_description'],
                    'brand_title' => $brand_title,
                    'old_price'=>$row['old_price'],
                    'product_image' => $row['image1'],
                    'quantity'=>$quantity,
                    'product_video'=>$row['video']
                ];

                $images=[
                    'image1' =>$row['image1'],
                    'image2' => $row['image2'],
                    'image3' => $row['image3'],
                    'image4' => $row['image4']
                ];
                
            } 

            // Collect attributes and their values
            if (!isset($attributes[$row['attribute_name']])) {
                $attributes[$row['attribute_name']] = [];
            }
            if (!in_array($row['attribute_value'], $attributes[$row['attribute_name']])) {
                $attributes[$row['attribute_name']][] = $row['attribute_value'];
            }
 
           $percent= (($product_details['product_price']-$product_details['old_price'])/$product_details['old_price'])*100;
            $data="
            <div class='details__group'>
        <img src='../admin_area/product_images/".htmlspecialchars($product_details['product_image'])."' alt='' class='details__img'>
    
    <div class='video-container' id='videoContainer'>
    <video class='hover-video' id='hoverVideo' loop autoplay controls>
    
    " . (!empty($product_details['product_video']) ? "<source src='../admin_area/". htmlspecialchars($product_details['product_video']) . "' type='video/mp4'>" : "<source src='../admin_area/product_images/video/inst (1).mp4' type='video/mp4'>") . "
    Your browser does not support the video tag.
    </video>
    </div>
    <div class='fullscreen-cancel' id='fullscreenCancel'>✖</div>
        <div class='details__small-images grid'>";
        if(isset($images)){
            foreach($images as $image){
                $data.="<img src='../admin_area/product_images/$image' alt='' class='details__small-img'>";
            }
        }
        $data.="</div>
    </div>
    <div class='details__group'>
        <h3 class='details__title'>".htmlspecialchars($product_details['product_title'])."</h3>
        <p class='details__brand'>Brands: <span>".htmlspecialchars($product_details['product_title'])."</span>
    
        </p>
        <div class='details__price flex'>
            <span class='new__price' id='product-price' data-product-price=".htmlspecialchars($product_details['product_price']).">".htmlspecialchars($product_details['product_price'])."Tsh</span>";
            $percent>0 ?" <span class='old__price'>".htmlspecialchars($product_details['old_price'])."Tsh</span>
           
            <span class='save__price'>".htmlspecialchars($percent)."off</span>": "";
           
            $data.="
        </div>
        <p class='short__description'>This products is so good i can't wait for you to buy this good is the best product i have ever seen in this world my friedn please buy the product my friend is so good enough to be bought at this cheap price</p>
        <ul class='product__list'>
            <li class='list__item flex'>
                <i class='fa-solid fa-crown'></i>I year Al Jazeera Brand Warranty
            </li>
            <li class='list__item flex'>
                <i class='fa-solid fa-credit-card'></i>Cash on delivery available
            </li>
            <li class='list__item flex'>
                <i class='fa-solid fa-arrows-rotate'></i> 30 Days Return Policy
            </li>
        </ul>
        <div class='details__color flex'>
            <span class='details__color-title'>Color</span>
            <ul class='color__list'>";
            //loop through the color
            if(isset($attributes['color'])){
                foreach($attributes['color'] as $color){
                    $colorStyle = strtolower($color);
                  $data.="<li class='color__link' data-value='$color' style='background-color:$colorStyle; border:2px solid black;'></li>";
                }
            }

    $data.="
            </ul>
        </div>
        <div class='details__size flex'>
            <span class='details__size-title'>Size</span>
            <ul class='size__list'>";
            if(isset($attributes['size'])){
                foreach($attributes['size'] as $size){
                    $data.=" <li class='size__link' data-value='$size' >".htmlspecialchars($size)."</li>";
                }
              
            }
    $data.="
            </ul>
        </div>
        <!-- selected options -->
         <div class='selected_options'>
         <p>Selected Color: <span id='selected-color'>None</span></p>
         <p>Selected Size: <span id='selected-size'>None</span></p>
         </div>
        
      <div class='details__action'>
        <div class='quantity_detail'>
        <button onclick='this.nextElementSibling.stepDown()' aria-label='Decrease Quantity'><i class='fa-solid fa-circle-minus'></i></button>
    <input type='number' id='value_input' class='value' style='width:50px; text-align:center; padding-right:0px;' value='1' min='1' max='100' step='1'>
    <button onclick='this.previousElementSibling.stepUp()' aria-label='Increase Quantity'><i class='fa-solid fa-circle-plus'></i></button>
    
        </div>
        <button class='btn btn--sm' id='buy' >Buy Now</button>
        <a href='#' class='details__action-btn'>
            <a href='#' class='action__btn' aria-label='Add To Cart'><i class='fa-regular fa-heart'></i></a>
        </a>
      </div>
      <ul class='details__meta'>
        <li class='meta__list flex'><span>SKU:</span>FMWERT</li>
        <li class='meta__list flex'><span>Tags:</span>Cloth, women, Dress</li>
        <li class='meta__list flex'><span>Availability</span>8 Items In Stock</li>
      </ul>
    </div>";
    
        }
        $response = [
            'data' => $data,
            'product_specification' => $product_specification
        ];   
echo json_encode($response);
    } else {
        echo "No such product";
    }
} else {
    echo "something went wrong";
}
?>
