<?php

session_start();

include("includes/db.php");

if(!isset($_SESSION['admin_email'])){

echo "<script>window.open('login.php','_self')</script>";

}

else {




?>

<?php


$i = 0;

$zones_ids = $_POST['zones_ids'];

foreach($zones_ids as $zone_id){
	
$i++;

$update_zone_order = "update zones set zone_order='$i' where zone_id='$zone_id'";	

$run_update_zone_order = mysqli_query($con, $update_zone_order);
	
}




?>


<?php } ?>