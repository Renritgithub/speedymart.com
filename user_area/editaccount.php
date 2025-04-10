<?php
if(isset($_GET['edit_account'])){
    $user_session_name=$_SESSION['username'];
    $select_query="select * from `user_table` where username='$user_session_name'";
    $result_query=mysqli_query($con,$select_query);
   while($row_fetch=mysqli_fetch_assoc($result_query)){
    $user_id=$row_fetch['user_id'];
    $user_name=$row_fetch['username'];
    $user_email=$row_fetch['user_email'];
    $user_password=$row_fetch['user_password'];
    $user_address=$row_fetch['user_address'];
    $user_contact=$row_fetch['user_mobile'];
   
   }
   if(isset($_POST['user_update'])){
    $update_id=$user_id;
    $user_name=$_POST['user_name'];
    $user_email=$_POST['user_email'];
    $user_address=$_POST['user_address'];
    $user_contact=$_POST['user_contact'];
    $user_image=$_FILES['user_image']['name'];
    $user_image_temp=$_FILES['user_image']['tmp_name'];
    move_uploaded_file($user_image_temp,"./user_images/$user_image");

    $update_data="update `user_table` set username='$user_name', user_email='$user_email',user_image='$user_image', user_address='$user_address', user_mobile='$user_contact' where user_id=$update_id";
    $result_data=mysqli_query($con,$update_data);
    if($result_data){
        echo "<script>alert('The data is updated')</script>";
        echo "<script>window.open('user_logout.php','_self')</script>";
    }
   }
   
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Account</title>
    <style>
        .editimage{
      width: 100px;;
      height:100px;
      object-fit: contain;
    }
    </style>
</head>
<body>
    <h3 class="text-center text-success mb-4">Edit Account</h3>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-outline mb-4 text-center ">
            <input type="text" class="form-control w-50 m-auto mb-6" name="user_name" value="<?php echo $user_name;?>">
        </div>
        <div class="form-outline mb-4 text-center">
            <input type="email" class="form-control w-50 m-auto mb-4" name="user_email" value="<?php echo $user_email;?>">
        </div>
        <div class="form-outline mb-4 text-center d-flex w-50 m-auto">
            <input type="file" class="form-control m-auto" name="user_image" >
            <img src="./user_images/<?php echo $users_image;?>" class='editimage' alt="">
        </div>
        <div class="form-outline mb-4 text-center">
            <input type="text" class="form-control w-50 m-auto mb-4" name="user_address"  value="<?php echo $user_address;?>">
        </div>
        <div class="form-outline mb-4 text-center">
            <input type="text" class="form-control w-50 m-auto mb-4" name="user_contact" value="<?php echo $user_contact;?>" >
        </div>
        <div class="form-outline mb-4 text-center">
            <input type="submit" class="bg-info py-2 px-3 border-0" name="user_update" value="Update">
        </div>
        
    </form>
    
</body>
</html>