<?php



if(!isset($_SESSION['vendor_email'])){

echo "<script>window.open('vendor_login.php','_self')</script>";

}

else {

?>

<?php

if(isset($_GET['delete_product'])){

$delete_id = $_GET['delete_product'];

$delete_pro = "delete from v_pro where p_id='$delete_id'";

$run_delete = mysqli_query($con,$delete_pro);

if($run_delete){

echo "<script>alert('One Product Has been deleted')</script>";

echo "<script>window.open('index.php?view_products','_self')</script>";

}

}

?>

<?php } ?>