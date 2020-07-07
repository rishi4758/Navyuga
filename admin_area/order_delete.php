<?php



if(!isset($_SESSION['admin_email'])){

echo "<script>window.open('login.php','_self')</script>";

}

else {
	
$admin_email = $_SESSION['admin_email'];

$select_admin = "select * from admins where admin_email='$admin_email'";

$run_admin = mysqli_query($con,$select_admin);

$row_admin = mysqli_fetch_array($run_admin);

$admin_id = $row_admin["admin_id"];

?>

<?php

if(isset($_GET['order_delete'])){

$delete_id = $_GET['order_delete'];

$hide_admin_order = "insert into hide_admin_orders (admin_id,order_id) values ('$admin_id','$delete_id')";

$run_hide_admin_order = mysqli_query($con,$hide_admin_order);

if($run_hide_admin_order){

echo "<script>alert('Order Has Been Deleted Successfully.')</script>";

echo "<script>window.open('index.php?view_orders','_self')</script>";


}


}



?>



<?php }  ?>