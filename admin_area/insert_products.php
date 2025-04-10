<?php include('../includes/connect.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Product - Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
</head>
<body class="bg-light">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<div class="container mt-3 w-50 m-auto">
    <h1 class="text-center">Insert Products</h1>
    <form action="" method="post" id="product_form" enctype="multipart/form-data" id="product_form">
        <div class="form-outline mb-4">
            <label for="product_title" class="form-label">Product Title</label>
            <input type="text" name="product_title" id="product_title" class="form-control" placeholder="Enter product title" autocomplete="off" required="required">
        </div>
        <div class="form-outline mb-4">
            <label for="product_description" class="form-label">Product Description</label>
            <input type="text" name="product_description" id="product_description" class="form-control" placeholder="Enter product description" autocomplete="off" required="required">
        </div>
        <div class="form-outline mb-4">
            <label for="product_key" class="form-label">Product Key</label>
            <input type="text" name="product_key" id="product_key" class="form-control" placeholder="Enter product key" autocomplete="off" required="required">
        </div>
        <div class="form-outline mb-4">
            <select name="product_category" class="form-select" required>
                <option value="">Select a category</option>
                <?php
                $select_query = "SELECT * FROM `categories`";
                $result_query = mysqli_query($con, $select_query);
                while ($row = mysqli_fetch_assoc($result_query)) {
                    echo "<option value='{$row["category_id"]}'>{$row["category_title"]}</option>";
                }
                ?>
            </select>
        </div>
        <div class="form-outline mb-4">
            <select name="product_brand" class="form-select" required>
                <option value="">Select a brand</option>
                <?php
                $select_query = "SELECT * FROM `brand`";
                $result_query = mysqli_query($con, $select_query);
                while ($row = mysqli_fetch_assoc($result_query)) {
                    echo "<option value='{$row["brand_id"]}'>{$row["brand_title"]}</option>";
                }
                ?>
            </select>
        </div>
        <div class="form-outline mb-4">
            <label for="product_image1" class="form-label">Product Image 1</label>
            <input type="file" name="product_image1" id="product_image1" class="form-control" required="required">
        </div>
        <div class="form-outline mb-4">
            <label for="product_image2" class="form-label">Product Image 2</label>
            <input type="file" name="product_image2" id="product_image2" class="form-control" required="required">
        </div>
        <div class="form-outline mb-4">
            <label for="product_image3" class="form-label">Product Image 3</label>
            <input type="file" name="product_image3" id="product_image3" class="form-control" required="required">
        </div>
        <div class="form-outline mb-4">
            <label for="product_image4" class="form-label">Product Image 4</label>
            <input type="file" name="product_image4" id="product_image4" class="form-control" required="required">
        </div>
        <div class="form-outline mb-4">
            <label for="product_video" class="form-label">Product Video</label>
            <input type="file" name="product_video" id="product_video" class="form-control" accept="video/*" required="required">
        </div>
        <div class="form-outline mb-4">
            <label for="old_price" class="form-label">Old Price</label>
            <input type="text" name="old_price" id="old_price" class="form-control" placeholder="Enter old price" autocomplete="off" required="required">
        </div>
        <div class="form-outline mb-4">
            <label for="new_price" class="form-label">New Price</label>
            <input type="text" name="new_price" id="new_price" class="form-control" placeholder="Enter new price" autocomplete="off" required="required">
        </div>
        <div class="form-outline mb-4">
            <label for="product specification" class="form-label">Product Specification</label>
            <textarea name="specifications_text" id="Product_specification" class="form-control" placeholder="Enter new price" autocomplete="off" required="required" rows="4"></textarea>
        </div>
        <div class="form-outline mb-4">
        <label><input type="checkbox" name="categories[]" value="hot_release"> Hot Release</label>
        <label><input type="checkbox" name="categories[]" value="deals"> Deals</label>
        <label><input type="checkbox" name="categories[]" value="top_selling"> Top Selling</label>
        <label><input type="checkbox" name="categories[]" value="trending"> Trending</label>
    </div>

        <div class="text-center">
            <button type="submit" id='insert_btn' name="insert_product" class="btn btn-primary">Insert Product</button>
        </div>
    </form>
</div>

<script>
    const form =document.getElementById('product_form');
    const continueBtn=document.getElementById('insert_btn');
    // AJAX to handle form submission
    form.onsubmit = (e) => {
    e.preventDefault(); //preventing form from submitting;
}
    continueBtn.onclick = () => {
        //lets start ajax
        let xhr =new XMLHttpRequest(); //creating XML object
        xhr.open('POST', "insert_product.php",true);
        xhr.onload = () =>{
           if(xhr.readyState===XMLHttpRequest.DONE){
            if(xhr.status===200){
                let data = xhr.response;
                if(data.trim()=='success'){
                      console.log('hello');
                }else{
                     console.log("heo");
                }
            }
           }
        }
        //we have to send the form data through ajax to php
        let formData=new FormData(form); //creatiing a new formData object
        xhr.send(formData);
    };
</script>
</body>
</html>
