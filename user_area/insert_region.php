<?php
include('../includes/connect.php');
$sql="INSERT INTO `shipping_rates` ( region_name, base_rate, weight_surcharge, additional_charge) VALUES
('Dar es salaam', 15, 0, 0
),
('Mwanza', 15, 15000,5000 ),
('Mbeya', 15, 15000, 5000),
('Dodoma', 15, 10000, 5000),
('Arusha', 15, 10000, 5000);
";
$result= mysqli_query($con,$sql);
if($result){
    echo "success";
}
?>