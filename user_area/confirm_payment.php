<?php
  include('../functions/common_function.php');
  include('../includes/connect.php');
  session_start();
  if(isset($_GET['orderid'])){
    $order_id=$_GET['orderid'];
    $select_data="select * from `user_orders` where order_id=$order_id";
    $result=mysqli_query($con,$select_data);
    $row_data=mysqli_fetch_assoc($result);
    $invoice_number=$row_data['invoice_number'];
    $amount_due=$row_data['amount_due'];


    if(isset($_POST['confirm_payment'])){
        $invoice_number=$_POST['invoice_number'];
        $amount=$_POST['amount'];
        $payment_mode=$_POST['payment_mode'];
        $insert_query="insert into `users_payment` (order_id,invoice_number,amount,payment_mode,date) values ($order_id,$invoice_number,$amount,'$payment_mode',NOW())";
        $insert_result=mysqli_query($con,$insert_query);
        if($insert_result){
            echo "<h3 class='text-center text-light'>Successfully completed the payment</h3>";
            echo "<script>window.open('profile.php','_self')</script>";
        }
        $update_orders="update `user_orders` set order_status='complete' where order_id=$order_id";
        $result=mysqli_query($con,$update_orders);
    }


  }
  ?>
  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <!-- Latest version from CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  </head>
  <body class="bg-secondary">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.x.x/js/all.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<h2 class="text-center text-light">Confirm Orders</h2>
<div class="container my-5">
    <form action="" method="post">
        <div class="form-outline my-4 text-center w-50 m-auto">
            <input type="text" class="form-control w-50 m-auto" name="invoice_number" value="<?php echo $invoice_number;?>">

        </div>
        <div class="form-outline my-4 text-center w-50 m-auto">
            <label for="amount" class="text-light">Amount</label>
            <input type="text" class="form-control w-50 m-auto" name="amount" value="<?php echo $amount_due;?>">

        </div>
        <div class="form-outline my-4 text-center w-50 m-auto">
            <select name="payment_mode" id="">
                <option value="Select Payment Mode" class="w-50 m-auto">Select Payment Mode</option>
                <option value="UPI">UPI</option>
                <option value="Netbanking">Netbanking</option>
                <option value="Mpesa">Mpesa</option>
                <option value="Paypal">Paypal</option>
                <option value="payment Delivery">payment Delivery</option>
            </select>
        </div>
        <div class="form-outline my-4 text-center w-50 m-auto">
            <input type="submit" class="bg-info py-3 px-3 border-0" value="Confirm" name="confirm_payment">

        </div>
    </form>
</div>

    
  </body >
  </html>
