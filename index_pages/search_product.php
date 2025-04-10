<!DOCTYPE html>
<html lang="en">
  <?php
  include('includes/connect.php');
  include('functions/common_function.php');
  session_start();
  ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ecommerce</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<nav class="navbar navbar-expand-lg bg-info">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><img src="image/logo/logo.png" alt="logo"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="display_all.php">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./users_area/user_registration.php">Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php cart_item();?></sup></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Total price: <?php total_cart_price()?></a>
        </li>
        
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
        <input type="submit"  value="search" class="btn btn_outline-success" name="search_data_product">
        <!-- <button class="btn btn-outline-success" type="submit">Search</button> -->
      </form>
    </div>
  </div>
</nav>
<?php
add_cart();
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
  <ul class="navbar-nav me-auto">
  <?php
if(!isset($_SESSION['username'])){
  echo " <li class='nav-item'><a href='#' class='nav-link'>Welcome guest</a></li>";
}

else{
   echo " <li class='nav-item'><a href='#' class='nav-link'>Welcome ".$_SESSION['username']."</a></li>";
  
   

}
if(!isset($_SESSION['username'])){
  echo "<li class='nav-item'>
      <a href='./users_area/user_login.php' class='nav-link'>login</a>
    </li>";
}

else{
   echo " <li class='nav-item'>
      <a href='./users_area/user_logout.php' class='nav-link'>logout</a>
    </li>";}

 ?>
  </ul>
</nav>
<div class="bg-light">
  <h3 class="text-center">Hidden store</h3>
  <h3 class="text-center">Communication is at the heart of eccomerce</h3> 

</div>
  <div class="row">
    <div class="col-md-10">
      <div class="row">
        <?php
        search_product();
        get_unique_product();
        get_unique_brands();
        ?>
        <!-- fetch data from the database -->
        
          <!-- $select_query="select * from `products` order by rand() limit 0,9";
          $result_query=mysqli_query($con,$select_query);
          while($row=mysqli_fetch_assoc($result_query)){
            $product_title=$row['product_title'];
            $product_description=$row['product_description'];
            $product_price=$row['product_price'];
            $product_image1=$row['product_image1'];
            $category_id=$row['category_id'];
            $brand_id=$row['brand_id'];
            echo "<div class='col-md-4 mb-3'>
                    <div class='card' style='width: 18rem;'>
                       <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='...'>
                          <div class='card-body'>
                              <h5 class='card-title'>$product_title</h5>
                                 <p class='card-text'>$product_description</p>
                                  <a href='#' class='btn btn-primary bg-info'>Go add to cart</a>
                                  <a href='#' class='btn btn-primary bg-secondary'>view</a>
                           </div>
                    </div>
                  </div>";
            
          }
          --> 
        
      </div>
    </div>

    <div class="col-md-2 bg-secondary p-0">
    
    <ul class="navbar-nav me-auto text-center">
      <li class="nav-item bg-info">
        <a href="#" class="nav-link text-light"><h3>Delivery Brands</h3></a>
      </li>
      
        <?php
       getbrands();
        ?>
        <!-- <li class="nav-item bg">
        <a href="#" class="nav-link text-light">brand1</a>
      </li>
      <li class="nav-item bg">
        <a href="#" class="nav-link text-light">brand2</a>
      </li>
      <li class="nav-item bg">
        <a href="#" class="nav-link text-light">brand3</a>
      </li>
      <li class="nav-item bg">
        <a href="#" class="nav-link text-light">brand4</a>
      </li>
      <li class="nav-item bg">
        <a href="#" class="nav-link text-light">bran5</a>
      </li>
      <li class="nav-item bg">
        <a href="#" class="nav-link text-light">brand5</a>
      </li> -->
    </ul>
    <ul class="navbar-nav me-auto text-center">
      <li class="nav-item bg-info">
        <a href="#" class="nav-link text-light"><h3>catergories</h3></a>
      </li>
      <?php
      getcategory();
      ?>
      <!-- <li class="nav-item bg">
        <a href="#" class="nav-link text-light">category1</a>
      </li>
      <li class="nav-item bg">
        <a href="#" class="nav-link text-light">category2</a>
      </li>
      <li class="nav-item bg">
        <a href="#" class="nav-link text-light">category3</a>
      </li>
      <li class="nav-item bg">
        <a href="#" class="nav-link text-light">category4</a>
      </li>
      <li class="nav-item bg">
        <a href="#" class="nav-link text-light">category5</a>
      </li>
      <li class="nav-item bg">
        <a href="#" class="nav-link text-light">category6</a>
      </li> -->
    </ul>
  </div>
</div>
  </div>
<!-- last child -->

<!-- include footer -->
 <?php

 include('./includes/footer.php');
 ?>
</body>
</html>