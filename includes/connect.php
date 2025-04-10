<?php

$db_server="localhost";
$db_user="root";
$db_name="eccom";
$db_pass="";
$con=mysqli_connect($db_server,$db_user,$db_pass,$db_name);
if(!$con){
    echo "connectiion successfully";
    }
    

?>