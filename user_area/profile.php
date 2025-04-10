<?php
  include('../functions/common_function.php');
  include('../includes/connect.php');
  session_start();
  ?>


<!DOCTYPE html>
<html lang="en">
  
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>welcome <?php echo $_SESSION['username'];?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <!-- Latest version from CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
    
    body{
        overflow-x: hidden;
        
    }

    .profileimage{
      width:90%;
      height:100%;
      margin:auto;
    }
</style>

</head>
<body>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.x.x/js/all.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<nav class="navbar navbar-expand-lg bg-info">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><img src="../image/logo/logo.png" alt="logo"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../display_all.php">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="profile.php">My account</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../cart.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php cart_item();?></sup></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Total price: <?php total_cart_price()?></a>
        </li>
        
      </ul>
      <form class="d-flex" role="search" action="../search_product.php" method="GET">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
        <input type="submit"  value="Search" class="btn btn_outline-success" name="search_data_product">
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
 <!-- fourth child -->
  <div class="row ">
    <div class="col-md-2 text-center bg-secondary " >

    
        <ul class="navbar-nav " style="height:100vh;">
            <li class="nav-item bg-info w-100%" style="width:100%">
            <a class="nav-link text-light"  href="#">Your profile</a>
            </li>

            <?php
            $username=$_SESSION['username'];
            $user_image="select * from `user_table` where username='$username'";
            $result_image=mysqli_query($con,$user_image);
            $row_image=mysqli_fetch_array($result_image);
            $users_image=$row_image['user_image'];
            echo "<li class='nav-item'>
                <img src='./user_images/$users_image' alt='' class='profileimage'>
            </li>";
            ?>
            
            <li class="nav-item">
            <a class="nav-link text-light"  href="profile.php">Pending orders</a>
            </li>
            <li class="nav-item">
            <a class="nav-link text-light"  href="profile.php?edit_account">Edit Account</a>
            </li>
            <li class="nav-item">
            <a class="nav-link text-light"  href="profile.php?my_orders">My orders</a>
            </li>
            <li class="nav-item">
            <a class="nav-link text-light"  href="profile.php?delete_acount">Delete account</a>
            </li>
            <li class="nav-item">
            <a class="nav-link text-light"  href="logout.php">Logout</a>
            </li>
        </ul>
        

    </div>
    <div class="col-md-10">
    <?php
    if(!isset($_GET['edit_account']) & !isset($_GET['my_orders']) & !isset($_GET['delete_acount'])){
      get_user_order_details();
    } 
    
    if(isset($_GET['edit_account'])){
      include('editaccount.php');
    }
    if(isset($_GET['my_orders'])){
      include('user_orders.php');
    }
    if(isset($_GET['delete_acount'])){
      include('delete_account.php');
    }
    ?>
    </div>
  </div>
 <?php

 include('../includes/footer.php');
 ?>
</body>
</html>