<?php
include('../functions/common_function.php');
include('../includes/connect.php');
@session_start();
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
    <style>
        body{
            overflow-x:hidden;
        }
    </style>
</head>
<body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.x.x/js/all.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
<div class="container-fluid my-3">
    <h2 class="text-center"> user Login</h2>
    <div class="row d-flex justify-content-center align-item-center ">
        <div class="col-xl-6 col-lg-12">
            <form action="" method="post" enctype="multipart/form-data" class="p-auto">
                <div class="form-outline my-3">
                    <label for="user_name" class="form-label" >Username</label>
                    <input type="text" id="user_name" class="form-control" placeholder="Enter your username" autocomplete="off" required="required" name="user_username">
                </div>
                <!-- user password -->
                
                <div class="form-outline">
                    <label for="user_password" class="form-label" >Password</label>
                    <input type="text" id="user_password" class="form-control" placeholder="Enter your password" autocomplete="off" required="required" name="user_userpwd">
                </div>
                <div >
                    <input type="submit" value="login" class="bg-info py-3 px-3 border-0 my-2 h-auto" name="user_login">
                    <p class="small fw-bold pt-1 mt-2">Don't have an account  ?<a href="user_registration.php" class="text-danger text-decoration-none">Register</a></p>
                </div>
                
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>

<?php

if(isset($_POST['user_login'])){
    $user_name=$_POST['user_username'];
    $user_pwd=$_POST['user_userpwd'];
    $select_query="select * from `user_table` where username='$user_name'";
    $result=mysqli_query($con, $select_query);
    $user_ip=getIPAddress();
    $row_count=mysqli_num_rows($result);
    //cart items
    $select_cart="select * from `cart_details` where ip_address='$user_ip'";
    $result_cart=mysqli_query($con, $select_cart);
    $row_count_cart=mysqli_num_rows($result_cart);
    if($row_count>0){
        $row=mysqli_fetch_assoc($result);
        $user_password=$row['user_password'];
       
    
        if(password_verify($user_pwd,$row['user_password'])){
           /*  echo "<script>alert('login succesful')</script>";
            echo "<script>window.open('checkout.php','_self')</script>"; */
            if($row_count==1 and $row_count_cart==0){
                $_SESSION['username']=$user_name;
                echo "<script>alert('login succesful')</script>";
                echo "<script>window.open('profile.php','_self')</script>";
            }
            else{
                $_SESSION['username']=$user_name;
                echo "<script>alert('login succesful')</script>";
                echo "<script>window.open('payment.php','_self')</script>";
            }
        }else{
            echo "<script>alert('invalid credentials')</script>";
        }
    }
    else{
        echo "<script>alert('No such user')</script>";
    }
    

}

?>