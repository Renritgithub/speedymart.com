<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Acount</title>
</head>
<body>
  <h3 class="text-danger mb-4 text-center">Delete Account</h3>
  <form action="" method="post" class="mt-5">
  <div class="form-outline w-50 m-auto py-5">
    <input type="submit" class="form-control w-50 m-auto" name="delete" value="delete">
  </div>
  <div class="form-outline w-50 m-auto py-5">
    <input type="submit" class="form-control w-50 m-auto" name="do_delete" value="Don't delete account">
  </div>
  </form>
  

  <?php
  $username_session=$_SESSION['username'];
  if(isset($_POST['delete'])){
    $delete_query="delete from `user_table` where username='$username_session'";
    $result=mysqli_query($con,$delete_query);
    if($result){
        session_destroy();
        echo "<script>alert('Account Deleted successfully')</script>";
        echo "<script>window.open('../index.php','_self')</script>";
    }
  }
  if(isset($_POST['do_delete'])){
    echo "<script>window.open('profile.php','_self')</script>";
  }
  ?>
  
</body>
</html>