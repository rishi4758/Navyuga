<?php

session_start();

if(!isset($_SESSION['customer_email'])){

echo "<script>window.open('../checkout.php','_self')</script>";


}else {

include("includes/db.php");

include("functions/functions.php");

if(!isset($_GET["order_id"])){

echo "<script> window.open('my_account.php?my_orders','_self'); </script>";
	
}

if(!isset($_GET["download_id"])){

echo "<script> window.open('my_account.php?my_orders','_self'); </script>";
	
}

$customer_email = $_SESSION['customer_email'];

$get_customer = "select * from customers where customer_email='$customer_email'";

$run_customer = mysqli_query($con, $get_customer);

$row_customer = mysqli_fetch_array($run_customer);

$customer_id = $row_customer['customer_id'];

$order_id = $_GET["order_id"];

$download_id = $_GET["download_id"];

$select_order = "select * from orders where customer_id='$customer_id' and order_id='$order_id'";

$run_order = mysqli_query($con,$select_order);

$count_order = mysqli_num_rows($run_order);

if($count_order != 0){

$row_order = mysqli_fetch_array($run_order);

$order_status = $row_order["order_status"];

if($order_status == "processing" or $order_status == "completed"){
	
$select_download = "select * from downloads where download_id='$download_id'";

$run_download = mysqli_query($con,$select_download);

$row_download = mysqli_fetch_array($run_download);

$download_file = "../admin_area/downloads_uploads/" . $row_download["download_file"];

if(file_exists($download_file)){
	
    header('Content-Description: File Transfer');
	
    header('Content-Type: application/octet-stream');
	
    header('Content-Disposition: attachment; filename="'.basename($download_file).'"');
	
    header('Cache-Control: must-revalidate');
	
    header('Pragma: public');
	
    header('Content-Length: ' . filesize($download_file));
	
    readfile($download_file);
	
    exit;
	
}
	
}
	
	
}



}

?>