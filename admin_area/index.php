<?php
  include('../includes/connect.php');
  include('../functions/common_function.php');
  session_start();
  

  
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="assets/css/style.css"/>
    <style>
        .admin_image{
    width:100px;
    object-fit:contain;
    margin-right: 40px;
    
}

body{
    overflow-x:hidden;
}
  .product_img{
    width:10%;
    object-fit:contain;
  }
  .userpic{
    width:10%;
    object-fit:contain;
  }




    </style>
</head>
<body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<!-- navbar -->
 <div class="container-fluid p-0 m-0">
    <nav class="navbar navbar-expand-lg navbar-light bg-info ">
        <div class="container-fluid">
            <img src="../image/logo/logo.png" alt="">
            <nav class="navbar navbarexpand">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <?php
                         if(isset($_SESSION['admin_name'])){
    
                            echo "<a href='' class='nav-link'>welcome ".$_SESSION['admin_name']."</a>";
                         }else{
                        
                            echo "<a href='' class='nav-link'>welcome guest</a>";
                
                         }
                        ?>
                        
                    </li>
                </ul>
            </nav>
        </div>
    </nav>
    <div class="bg-light">
        <h3 class="text-center p-2">
            Manage details
        </h3>
    </div>
    <div class="row">
        <div class="col-md-12 bg-secondary p-1 d-flex align-items-center ">
            <div class="p-3">
                <a href="#">
                    <img src="../image/food/chocolateburger.jpg" alt="" class="admin_image">
                </a>
                <?php
                         if(isset($_SESSION['admin_name'])){
                           
                              echo "<p class='text-light text-center'>".$_SESSION['admin_name']."</p>";
                         }else{
                            echo "<p class='text-light text-center'>Admin name</p>";
                         }
                ?>
            </div>
            <div class="button text-center">
                <button class="my-3"><a href="insert_products.php" class="nav-link text-light bg-info my-1">insert products</a></button>
                <button><a href="index.php?view_product" class="nav-link text-dark bg-info my-1">View products</a></button>
                <button><a href="index.php?insert_category" class="nav-link text-light bg-info my-1">Insert_Categories</a></button>
                <button><a href="index.php?view_category" class="nav-link text-light bg-info my-1">View categories</a></button>
                <button><a href="index.php?insert_brand" class="nav-link text-light bg-info my-1">Insert Brands</a></button>
                <button><a href="index.php?view_brand" class="nav-link text-light bg-info my-1">View Brands</a></button>
                <button><a href="index.php?list_orders" class="nav-link text-light bg-info my-1">All Orders</a></button>
                <button><a href="index.php?list_payment" class="nav-link text-light bg-info my-1">All Payments</a></button>
                <button><a href="index.php?list_users" class="nav-link text-light bg-info my-1">list users</a></button>
                <?php
                if(isset($_SESSION['admin_name'])){
                    echo " <button><a href='admin_logout.php' class='nav-link text-light bg-info my-1'>Logout</a></button>";
            
                }else{
                    echo " <button><a href='admin_login.php' class='nav-link text-light bg-info my-1'>Login</a></button>";
                }
                ?>
                
        </div>
    </div>
 </div>
 <!-- fourth child -->
  <div class="container">
    <?php
   if(isset($_GET['insert_category'])){
    include('insert_categories.php');
   }
   if(isset($_GET['insert_brand'])){
    include('insert_brands.php');
   }
   if(isset($_GET['view_product'])){
    include('view_product.php');
   }
   if(isset($_GET['edit_product'])){
    include('edit_product.php');
   }
   if(isset($_GET['delete_product'])){
    include('delete_product.php');
   }
   if(isset($_GET['view_category'])){
    include('view_categories.php');
   }
   if(isset($_GET['view_brand'])){
    include('view_brands.php');
   }
   if(isset($_GET['edit_category'])){
    include('edit_category.php');
   }
   if(isset($_GET['edit_brand'])){
    include('edit_brands.php');
   }
   if(isset($_GET['delete_category'])){
    include('delete_category.php');
   }
   if(isset($_GET['delete_brand'])){
    include('delete_brand.php');
   }
   if(isset($_GET['list_orders'])){
    include('list_orders.php');
   }
   if(isset($_GET['list_payment'])){
    include('list_payment.php');
   }
   if(isset($_GET['list_users'])){
    include('list_users.php');
   }
   if(isset($_GET['product_attribute'])){
    include('product_attribute.php');
   }
   if(isset($_GET['product_track'])){
    include('admin_track.php');
   }
   ?>
  </div>
 <!-- third child -->
 <?php

include('../includes/footer.php');
?>

    
</body>
</html>