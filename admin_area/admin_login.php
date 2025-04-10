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
                        <label for="userpwd" class="form-label">userpassword</label>
                        <input type="text" class="form-control" id="userpwd" name="userpwd" placeholder="Enter your password" required="required">
                    </div>
                  
                    <div>
                        <input type="submit" class="bg-info py-2 px-3 border-0" name="admin_login" value="Login">
                        <p class="small">Don't you have an account? <a href="admin_registration.php" class="text-decoration-none tect-info">Register</a></p>
                        
                    </div>
                    
                </form>
            </div>
        </div>
    </div>

    <?php

if(isset($_POST['admin_login'])){
    $admin_name=$_POST['username'];
    $user_pwd=$_POST['userpwd'];
    $select_query="select * from `admin_table` where admin_name='$admin_name'";
    $result=mysqli_query($con, $select_query);
    $row_count=mysqli_num_rows($result);
    if($row_count>0){
        $row=mysqli_fetch_assoc($result);
        $user_password=$row['admin_password'];
       
    
        if(password_verify($user_pwd,$row['admin_password'])){

                $_SESSION['admin_name']=$admin_name;
                echo "<script>alert('login succesful')</script>";
                echo "<script>window.open('index.php','_self')</script>";
            }
    else{
            echo "<script>alert('invalid credentials')</script>";
        }
    }
    else{
        echo "<script>alert('No such user')</script>";
    }
}



?>

    
</body>
</html>