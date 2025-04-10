<?php
include('../functions/common_function.php');
include('../includes/connect.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" /><style>
        body{
            overflow: hidden;
        }
    </style>
</head>
<body>
    <div class="container-fluid m-3">
        <h2 class="text-center mb-5">Admin registration</h2>
        <div class="row d-flex justify-content-center">
            <div class="col-lg-6 col-xl-5">
                <img src="../img/register1.jpeg" alt="Admin registraion" class="img-fluid">
            </div>
            <div class="col-lg-6 col-xl-5">
                <form action="" method="post">
                    <div class="form-outline mb-4">
                        <label for="username" class="form-label">username</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="Enter your username" required="required">
                    </div>
                    <div class="form-outline mb-4">
                        <label for="useremail" class="form-label">user email</label>
                        <input type="text" class="form-control" id="useremail" name="useremail" placeholder="Enter your email" required="required">
                    </div>
                    <div class="form-outline mb-4">
                        <label for="userpwd" class="form-label">userpassword</label>
                        <input type="text" class="form-control" id="userpwd" name="userpwd" placeholder="Enter your password" required="required">
                    </div>
                    <div class="form-outline mb-4">
                        <label for="confirm" class="form-label">Confirm password</label>
                        <input type="text" class="form-control" id="confpwd" name="confpwd" placeholder="confirm your password" required="required">
                    </div>
                    <div>
                        <input type="submit" class="bg-info py-2 px-3 border-0" name="admin_reg" value="Register">
                        <p class="small">Don't you have an account? <a href="admin_login.php" class="text-decoration-none tect-info">Login</a></p>
                        
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
    <?php

 if(isset($_POST['admin_reg'])){
    $username=$_POST['username'];
    $useremail=$_POST['useremail'];
    $userpwd=$_POST['userpwd'];
    $hash_password=password_hash($userpwd,PASSWORD_DEFAULT);
    $confpwd=$_POST['confpwd'];

     

    //select query

    $select_query="select * from `admin_table` where admin_name='$username'";
    $result=mysqli_query($con,$select_query);
    $row_count=mysqli_num_rows($result);
    if($row_count>0){
        echo "<script>alert('The adminname already exist')</script>";
    }
    
    elseif($userpwd!=$confpwd){
        echo "<script>alert('The password do not match')</script>";
    }

    
    else{
        //insert_query
    $insert_query="insert into `admin_table` (admin_name,admin_email, admin_password) values('$username','$useremail','$hash_password')";
    $sql_execute=mysqli_query($con,$insert_query);
    if($sql_execute){
        echo "<script>alert('The data is inserted successfully')</script>";
    };
    };


    
}

    
 
 ?>
    
</body>
</html>