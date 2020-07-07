<?php

session_start();

include("includes/db.php");

include("functions/functions.php");

define("customer_login", TRUE);

define("review_order", TRUE);


?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>E-commerce Store</title>
	<link rel="stylesheet" href="styles/custom_style.css">
</head>

<body>
<?php include("includes/header.php"); ?>
<div id="content" ><!-- content Starts -->
	<div class="container" ><!-- container Starts -->
		<div class="row">
			<div class="col-md-12" ><!--- col-md-12 Starts -->
				<?php if(!isset($_SESSION["customer_email"])){ ?>
				<ul class="breadcrumb" ><!-- breadcrumb Starts -->
					<li>
						<a href="index.php">Home</a>
					</li>
					<li> Login Details </li>
				</ul><!-- breadcrumb Ends -->

				<?php }else{ ?>

				<ul class="breadcrumb" ><!-- breadcrumb Starts -->
					<li>
						<a href="index.php">Home</a>
					</li>
					<li> Checkout Details </li>
				</ul><!-- breadcrumb Ends -->

				<nav class="checkout-breadcrumbs text-center">
					<a href="cart.php"> Shopping Cart </a>
						<i class="fa fa-chevron-right"></i>
					<a href="checkout.php" class="active" > Checkout Details </a>
						<i class="fa fa-chevron-right"></i>
					<a href="#"> Order Complete </a>
				</nav>
				<?php } ?>
			</div><!--- col-md-12 Ends -->
		</div>
		<div class="row">
			<div class="col-md-12" ><!-- col-md-12 Starts -->
				<?php
					if(!isset($_SESSION['customer_email'])){
					include("customer/customer_login-old.php");
					}
					
					else{
					include("review_order.php");
					}
					
				?>
				
				
<?php
if(isset($_POST['order'])){
	
	
	
	
 
$billing_first_name= $_POST['billing_first_name'];


$billing_last_name=$_POST['billing_last_name'];


$billing_country=$_POST['billing_country'];

$billing_address_1=$_POST['billing_address_1'];

$billing_address_2=$_POST['billing_address_2'];


$billing_state=$_POST['billing_state'];


$billing_city=$_POST['billing_city'];

$billing_postcode=$_POST['billing_postcode'];

$customer_email = $_SESSION['customer_email'];

$get_customers="select * from  customers where customer_email='$customer_email'";
$run_customers=mysqli_query($con,$get_customers);
$row_customers=mysqli_fetch_array($run_customers);
$customer_id=$row_customers['customer_id'];



$ip_add = getRealUserIp();

$physical_products = array();

$select_cart = "select * from cart where ip_add='$ip_add'";

$run_cart = mysqli_query($con,$select_cart);

while($row_cart = mysqli_fetch_array($run_cart)){

$product_id = $row_cart['p_id'];

$get_product = "select * from products where product_id='$product_id'";

$run_product = mysqli_query($con,$get_product);

$row_product = mysqli_fetch_array($run_product);

$product_type = $row_product['product_type'];

$vendor_id=$row_product['vendor_id'];

echo"vendor_id";

	
}
	


date_default_timezone_set("Asia/Karachi");



$amount=$total;


$status = "pending";

$invoice_no = mt_rand();


$insert_order = "insert into orders (vendor_id,customer_id,invoice_no,order_date,order_total,order_status) values ('$vendor_id','$customer_id','$invoice_no',NOW(),'$amount','$status')";
	


$run_order = mysqli_query($con, $insert_order);

$insert_order_id = mysqli_insert_id($con);


if($run_order)
{
	
	
	
$get_orders="insert into orders_addresses(order_id,billing_first_name,billing_last_name,billing_country,billing_address_1,billing_address_2,billing_state,billing_city,billing_postcode) values(
'$insert_order_id','$billing_first_name','$billing_last_name','$billing_country','$billing_address_1','$billing_address_2','$billing_state','$billing_city','$billing_postcode')";



$run_order1 = mysqli_query($con, $get_orders);

if($run_order1){

$select_cart = "select * from cart where ip_add='$ip_add'";

$run_cart = mysqli_query($con,$select_cart);

while($row_cart = mysqli_fetch_array($run_cart)){

$product_id = $row_cart['p_id'];

$product_price = $row_cart['p_price'];

$product_qty = $row_cart['qty'];

$product_size = $row_cart['size'];

$insert_order_item = "insert into orders_items (order_id,product_id,price,qty,size) values ('$insert_order_id','$product_id','$product_price','$product_qty','$product_size')";

$run_order_item = mysqli_query($con, $insert_order_item);

}

$delete_cart = "delete from cart where ip_add='$ip_add'";

$run_cart_delete = mysqli_query($con, $delete_cart);

if($run_cart_delete){

echo "

<script>

alert('Your Order Has Been Submitted Successfully, Thanks.');

window.open('order_received.php?order_id=$insert_order_id','_self');

</script>

";
	
}
	
}
	
}

	
}


?>
			</div><!-- col-md-12 Ends -->
		</div>
</div><!-- container Ends -->
</div><!-- content Ends -->



<?php
	include("includes/footer.php");
?>


</body>
</html>