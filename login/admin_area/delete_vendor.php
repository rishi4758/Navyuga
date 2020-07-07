<?php



if(!isset($_SESSION['vendor_email'])){

echo "<script>window.open('vendor_login.php','_self')</script>";

}

else {

?>

<?php

if(isset($_GET['vendor_delete'])){

$delete_id = $_GET['vendor_delete'];

$delete_pro = "delete from vendors where vendor_id='$delete_id'";

$run_delete = mysqli_query($con,$delete_pro);

if($run_delete){

echo "<script>alert('One vendor Has been deleted')</script>";

echo "<script>window.open('index.php?view_vendor','_self')</script>";

}

}

?>

<?php } ?>