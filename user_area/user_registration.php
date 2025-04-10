<?php
include('../functions/common_function.php');
include('../includes/connect.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <!-- Latest version from CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.x.x/js/all.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
<div class="container-fluid my-3">
    <h2 class="text-center">New user Registration</h2>
    <div class="row d-flex justify-content-center align-item-center ">
        <div class="col-xl-6 col-lg-12">
            <form action="" method="post" enctype="multipart/form-data" class="p-auto">
                <div class="form-outline my-3">
                    <label for="user_name" class="form-label" >Username</label>
                    <input type="text" id="user_name" class="form-control" placeholder="Enter your username" autocomplete="off" required="required" name="user_username">
                </div>
                <!-- user email -->
                <div class="form-outline my-3">
                    <label for="Email" class="form-label" >Email</label>
                    <input type="text" id="Email" class="form-control" placeholder="Enter your email" autocomplete="off" required="required" name="user_email">
                </div>
                <!-- user image field -->
                <div class="form-outline my-3">
                    <label for="user_image" class="form-label" >profile Image</label>
                    <input type="file" id="user_image" class="form-control" placeholder="Enter your image"required="required" name="user_userimage">
                </div>
                <div class="form-outline">
                    <label for="user_password" class="form-label" >Password</label>
                    <input type="text" id="user_password" class="form-control" placeholder="Enter your password" autocomplete="off" required="required" name="user_userpwd">
                </div>
                <div class="form-outline">
                    <label for="conf_user_password" class="form-label" > Confirm Password</label>
                    <input type="text" id="conf_password" class="form-control" placeholder="Confirm your password" autocomplete="off" required="required" name="conf_userpwd">
                <div class="form-outline my-3">
                    <label for="user_address" class="form-label" >User address</label>
                    <input type="text" id="user_address" class="form-control" placeholder="Enter your address" autocomplete="off" required="required" name="user_address">
                    
                </div>
                <div class="form-outline my-3">
                    <label for="user_contact" class="form-label" >Contact</label>
                    <input type="text" id="user_contact" class="form-control" placeholder="Enter your contact" autocomplete="off" required=" required" name="user_contact">
                    
                </div>
                <div >
                    <input type="submit" value="Register" class="bg-info py-3 px-3 border-0 my-2" name="user_register">
                    <p class="small fw-bold pt-1 mt-2">Already have an account  ?<a href="user_login.php" class="text-danger text-decoration-none">Login</a></p>
                </div>
                
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>


<!-- php code -->
 <?php

 if(isset($_POST['user_register'])){
    $user_username=$_POST['user_username'];
    $user_email=$_POST['user_email'];
    $user_userpwd=$_POST['user_userpwd'];
    $hash_password=password_hash($user_userpwd,PASSWORD_DEFAULT);
    $user_confpwd=$_POST['conf_userpwd'];
    $user_address=$_POST['user_address'];
    $user_contact=$_POST['user_contact'];
    $user_userimage=$_FILES['user_userimage']['name'];
    $user_userimage_tmp=$_FILES['user_userimage']['tmp_name'];
    $user_ip=getIpAddress();
     

    //select query

    $select_query="select * from `user_table` where user_email='$user_email'";
    $result=mysqli_query($con,$select_query);
    $row_count=mysqli_num_rows($result);
    if($row_count>0){
        echo "<script>alert('The username already exist')</script>";
    }
    
    elseif($user_userpwd!=$user_confpwd){
        echo "<script>alert('The password do not match')</script>";
    }

    
    else{
        //insert_query
    $insert_query="insert into `user_table` (username,user_email, user_password, user_image, User_ip, user_address, user_mobile) values('$user_username','$user_email','$hash_password','$user_userimage','$user_ip','$user_address','$user_contact')";
    $sql_execute=mysqli_query($con,$insert_query);
    move_uploaded_file($user_userimage_tmp,"./user_images/$user_userimage");
    if($sql_execute){
        echo "<script>alert('The data is inserted successfully')</script>";
    };
    };
   /*  select cart items */

    $select_cart_items="select * from `cart_details` where ip_address='$user_ip'";
    $result_cart=mysqli_query($con,$select_cart_items);
    $rows_count=mysqli_num_rows($result_cart);
    if($rows_count>0){
        $_SESSION['username']=$user_username;
        echo "<script>alert('You have items in your cart')</script>";
        echo "<script>window.open('checkout.php','_self')</script>";
    }else{
        echo "<script>window.open('../index.php','_self')</script>";
    }
}

    
 
 ?>