<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>edit products</title>
    <style>
        .product_image{
            width:10%;
            height:auto;
            object-fit: contain;
        }
       
        
    </style>
</head>
<body>
    <?php


if (isset($_GET['edit_product'])) {
    // Retrieve the product ID and validate it as an integer
    $edit_id = intval($_GET['edit_product']);

    // Prepared statement to fetch product data
    $get_data = "SELECT * FROM `products` WHERE product_id = ?";
    $stmt = $con->prepare($get_data);
    $stmt->bind_param("i", $edit_id);
    $stmt->execute();
    $result_data = $stmt->get_result();
    $row_data = $result_data->fetch_assoc();

    // Check if product exists
    if ($row_data) {
        $product_title = $row_data['product_title'];
        $product_description = $row_data['product_description'];
        $category_id = $row_data['category_id'];
        $brand_id = $row_data['brand_id'];
        $product_keyword = $row_data['product_keyword'];
        $product_image1 = $row_data['product_image1'];
        $product_image2 = $row_data['product_image2'];
        $product_image3 = $row_data['product_image3'];
        $product_image4 = $row_data['product_image4'];
        $old_price = $row_data['old_price'];
        $new_price = $row_data['new_price'];

        // Fetching category title using prepared statement
        $select_category = "SELECT category_title FROM `categories` WHERE category_id = ?";
        $stmt_category = $con->prepare($select_category);
        $stmt_category->bind_param("i", $category_id);
        $stmt_category->execute();
        $result_category = $stmt_category->get_result();
        $row_category = $result_category->fetch_assoc();
        $category_title = $row_category ? $row_category['category_title'] : "Unknown Category";

        // Fetching brand title using prepared statement
        $select_brand = "SELECT brand_title FROM `brand` WHERE brand_id = ?";
        $stmt_brand = $con->prepare($select_brand);
        $stmt_brand->bind_param("i", $brand_id);
        $stmt_brand->execute();
        $result_brand = $stmt_brand->get_result();
        $row_brand = $result_brand->fetch_assoc();
        $brand_title = $row_brand ? $row_brand['brand_title'] : "Unknown Brand";

        // Close the prepared statements
        $stmt->close();
        $stmt_category->close();
        $stmt_brand->close();
    } else {
        echo "Product not found.";
    }
}
?>

    <div class="container mt-3">
        <h1 class="text-center">Edit Product</h1>
        <form action="" method="post" enctype="multipart/form-data" id="edit_form">
            <div class="form-outline w-50 m-auto mb-4">
                <label for="product_title" class="form-label">Product Title</label>
                <input type="text" id="product_title" class="form-control" required="required" name="product_title" value="<?php echo $product_title; ?>">
            </div>
            <div class="form-outline w-50 m-auto mb-4">
                <label for="product_description" class="form-label">Product Description</label>
                <input type="text" id="product_dsc" class="form-control" required="required" name="product_description" value="<?php echo $product_description; ?>">
            </div>
            <div class="form-outline w-50 m-auto mb-4">
                <label for="product_keyword" class="form-label">Product keyword</label>
                <input type="text" id="product_dsc" class="form-control" required="required" name="product_keyword" value="<?php echo $product_keyword; ?>">
            </div>
            <div class="form-outline w-50 m-auto mb-4">
                <label for="product_keyword" class="form-label">Product categories</label>
                <select name="product_category" id="" class="form-select">
                    <option value="<?php echo $category_id; ?>"><?php echo $category_title; ?></option>

                    <?php
                             $select_category_all="select * from `categories`";
                             $result_category_all=mysqli_query($con,$select_category_all);
                            while($row_category_all=mysqli_fetch_assoc($result_category_all)) {
                                $category_title_all=$row_category_all['category_title'];
                                $category_id_all=$row_category_all['category_id'];
                                echo " <option value='$category_id_all'> $category_title_all</option>";
                            }
                             
                   ?>
                   
                    <!-- <option value="">3</option>
                    <option value="">4</option>
                    <option value="">5</option> -->
                </select>
            </div>
            <div class="form-outline w-50 m-auto mb-4">
            <label for="product_keyword" class="form-label">Product brands</label>
                <select name="product_brand" id="" class="form-select">
                <option value="<?php echo $brand_id; ?>"><?php echo $brand_title; ?></option>
                <?php
                 $select_brand_all="select * from `brand`";
                             $result_brand_all=mysqli_query($con,$select_brand_all);
                            while($row_brand_all=mysqli_fetch_assoc($result_brand_all)) {
                                $brand_title_all=$row_brand_all['brand_title'];
                                $brand_id_all=$row_brand_all['brand_id'];
                                echo " <option value='$brand_id_all'> $brand_title_all</option>";
                            }
                ?>
                  <!--   <option value="">2</option>
                    <option value="">3</option>
                    <option value="">4</option>
                    <option value="">5</option> -->
                </select>
            </div>
            <div class="form-outline w-50 m-auto mb-4">
                <label for="product_image1" class="form-label">Product Image1</label>
                <div class="d-flex">
                <input type="file" id="product_image1" class="form-control w-90 m-auto" required="required" name="product_image1"><img src="./product_images/<?php echo $product_image1; ?>" alt="" class="product_image">
                </div>
                
            </div>

            <div class="form-outline w-50 m-auto mb-4">
                <label for="product_image2" class="form-label">Product Image2</label>
            <div class="d-flex">
                <input type="file" id="product_image2" class="form-control w-90 m-auto" required="required" name="product_image2"><img src="./product_images/<?php echo $product_image2; ?>" alt="" class="product_image">
            </div>
            </div>
            <div class="form-outline w-50 m-auto mb-4">
                <label for="product_image3" class="form-label">Product Image3</label>
                <div class="d-flex">
                <input type="file" id="product_image3" class="form-control w-90 m-auto" required="required" name="product_image3"><img src="./product_images/<?php echo $product_image3; ?>" alt="" class="product_image">
                </div>
            </div>
            <div class="form-outline w-50 m-auto mb-4">
                <label for="product_image4" class="form-label">Product Imag4</label>
                <div class="d-flex">
                <input type="file" id="product_image4" class="form-control w-90 m-auto" required="required" name="product_image4"><img src="./product_images/<?php echo $product_image4; ?>" alt="" class="product_image">
                </div>
            </div>

            <div class="form-outline w-50 m-auto mb-4">
                <label for="product_price" class="form-label">old price</label>
                <input type="text" id="product_dsc" class="form-control" required="required" name="old_price" value="<?php echo $old_price; ?>">
            </div>
            <div class="form-outline w-50 m-auto mb-4">
                <label for="product_price" class="form-label">new price</label>
                <input type="text" id="product_dsc" class="form-control" required="required" name="new_price" value="<?php echo $new_price; ?>">
            </div>
            
            <div class="text-center">
            <div class="text-center">
    <input type="submit" class="btn btn-info px-3 mb-3" name="edit_product" value="Update Product" onclick="editProduct(<?php echo $edit_id;?>); return false;">
</div>

                
            </div>
             


            
        </form>
    </div>
<!-- Editing products -->

<script>
function editProduct(edit) {
    const form = document.getElementById("edit_form");
    const formData = new FormData(form);
    formData.append('edit_id', edit); // Append edit_id

    const xhr = new XMLHttpRequest();
    xhr.open("POST", "edit_pro.php", true);
    xhr.onload = function() {
        if (xhr.status === 200) {
            if (xhr.responseText.trim() === "success") {
                alert("Product updated successfully");
            } else {
                alert("Error: " + xhr.responseText);
            }
        } else {
            alert("Error in AJAX request");
        }
    };
    xhr.send(formData);
}

</script>
</body>
</html>