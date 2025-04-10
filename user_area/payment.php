<?php
include('../functions/common_function.php');
include('../includes/connect.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>payment page</title>
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

<!-- php code  -->
 <?php

 $user_ip=getIPAddress();
 $get_user="select * from `user_table` where user_ip='$user_ip'";
 $result=mysqli_query($con,$get_user);
 $run_query=mysqli_fetch_array($result);
 $user_id=$run_query['user_id'];

 ?>

<div class="container">
    <div class="tex-center text-info"><h1>Payment options</h1></div>
    <div class="row d-flex justify-content-center align-items-center">
        <div class="col-md-6">
        <a href="https://www.paypal.com" target="_blank"><img src="../img/Gpay.jpeg"  alt="" class="my-3"></a>
        </div>
        <div class="col-md-6 text-center">
        <a href="order.php?user_id=<?php echo $user_id; ?>" class="text-decoration-none">
            <h2 class="text-info">Pay offline</h2>
        </a>
        </div>
       
       

    </div>
</div>
    
</body>
</html>