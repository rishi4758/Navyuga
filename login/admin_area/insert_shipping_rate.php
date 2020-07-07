<?php

session_start();

include("includes/db.php");

if(!isset($_SESSION['admin_email'])){

echo "<script>window.open('login.php','_self')</script>";

}

else {




?>

<?php


$type_id = mysqli_real_escape_string($con, $_POST['type_id']);

$shipping_weight = mysqli_real_escape_string($con, $_POST['shipping_weight']);

$shipping_cost = mysqli_real_escape_string($con, $_POST['shipping_cost']);

if(isset($_POST['zone_id'])){

$zone_id = $_POST['zone_id'];

$insert_shipping_rate = "insert into shipping (shipping_type,shipping_zone,shipping_weight,shipping_cost) values ('$type_id','$zone_id','$shipping_weight','$shipping_cost')";

$run_insert_shipping_rate = mysqli_query($con, $insert_shipping_rate);
	
}elseif(isset($_POST['country_id'])){
	
$country_id = $_POST['country_id'];

$insert_shipping_rate = "insert into shipping (shipping_type,shipping_country,shipping_weight,shipping_cost) values ('$type_id','$country_id','$shipping_weight','$shipping_cost')";

$run_insert_shipping_rate = mysqli_query($con, $insert_shipping_rate);
	
}

?>

<?php } ?>