<h3 class="text-center text-success">All payment</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-info">

    <?php
    $get_payment="select * from `users_payment`";
    $result=mysqli_query($con,$get_payment);
    $num_row=mysqli_num_rows($result);
    if($num_row>0){
        echo "<tr>
            <th>SI no</th>
            <th>Due amount</th>
            <th>Invoice number</th>
            <th>payment mode</th>
            <th> date</th>
            <th>delete</th>
        </tr>
    </thead>";
        $number=0;
        while($row_data=mysqli_fetch_assoc($result)){
            $order_id=$row_data['order_id'];
            $payment_id=$row_data['payment_id'];
            $amount_due=$row_data['amount'];
            $invoice_number=$row_data['invoice_number'];
            $payment_mode=$row_data['payment_mode'];
            $date=$row_data['date'];
            $number++;
            echo "
            <tbody class='bg-secondary'>
        <td>$number</td>
        <td>$amount_due</td>
        <td>$invoice_number</td>
        <td> $payment_mode</td>
        <td>$date</td>
        <td><a href='' class='text-danger'><i class='fa-solid fa-trash'></i></td>
    </tbody>";
        }


    }
    else{
        echo "<h2 class='text-danger text-center' >No payment present</h2>";
    }
    ?>
       <!--  <tr>
            <th>SI no</th>
            <th>Due amount</th>
            <th>Invoice number</th>
            <th>Total products</th>
            <th>Order date</th>
            <th>status</th>
            <th>delete</th>
        </tr>
    </thead> -->
    
</table>