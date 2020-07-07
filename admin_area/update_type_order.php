
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

$types_ids = $_POST['types_ids'];

$type_local = $_POST['type_local'];

foreach($types_ids as $type_id){
	
$i++;

$update_type_order = "update shipping_types set type_order='$i' where type_id='$type_id' and type_local='$type_local'";

$run_update_type_order = mysqli_query($con, $update_type_order);
	
}



?>

<?php } ?>