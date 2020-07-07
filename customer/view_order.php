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

?>
<!DOCTYPE html>
<html>

<head>
<title>E commerce Store </title>

<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" >

<link href="http://fonts.googleapis.com/css?family=Roboto:400,500,700,300,100" rel="stylesheet" >

<link href="styles/bootstrap.min.css" rel="stylesheet">

<link href="styles/style.css" rel="stylesheet">

<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">

</head>

<body>
<?php include("../includes/header.php"); ?>
<div id="content" ><!-- content Starts -->
<div class="container-fluid" ><!-- container-fluid Starts -->

<div class="col-md-12" ><!--- col-md-12 Starts -->

<ul class="breadcrumb" ><!-- breadcrumb Starts -->

<li>
<a href="index.php">Home</a>
</li>

<li>My Account</li>

</ul><!-- breadcrumb Ends -->



</div><!--- col-md-12 Ends -->

<div class="col-md-12"><!-- col-md-12 Starts -->

<?php

$c_email = $_SESSION['customer_email'];

$get_customer = "select * from customers where customer_email='$c_email'";

$run_customer = mysqli_query($con,$get_customer);

$row_customer = mysqli_fetch_array($run_customer);

$customer_confirm_code = $row_customer['customer_confirm_code'];

$c_name = $row_customer['customer_name'];

if(!empty($customer_confirm_code)){

?>

<div class="alert alert-danger"><!-- alert alert-danger Starts -->

<strong> Warning! </strong> Please Confirm Your Email and if you have not received your confirmation email

<a href="my_account.php?send_email" class="alert-link"> 

Send Email Again

</a>

</div><!-- alert alert-danger Ends -->

<?php } ?>

</div><!-- col-md-12 Ends -->

<div class="col-md-3"><!-- col-md-3 Starts -->

<?php include("includes/sidebar.php"); ?>

</div><!-- col-md-3 Ends -->

<div class="col-md-9" ><!--- col-md-9 Starts -->

<div class="box" id="order-summary"><!-- box Starts -->

<?php

if(isset($_GET["order_id"])){

$customer_email = $_SESSION['customer_email'];

$get_customer = "select * from customers where customer_email='$customer_email'";

$run_customer = mysqli_query($con, $get_customer);

$row_customer = mysqli_fetch_array($run_customer);

$customer_id = $row_customer['customer_id'];
	
$customer_contact = $row_customer['customer_contact'];	

$order_id = $_GET["order_id"];

$select_order = "select * from orders where order_id='$order_id' and customer_id='$customer_id'";

$run_order = mysqli_query($con,$select_order);

$row_order = mysqli_fetch_array($run_order);

$invoice_no = $row_order["invoice_no"];

$shipping_type = $row_order["shipping_type"];

$shipping_cost = $row_order["shipping_cost"];

$payment_method = $row_order["payment_method"];

$order_date = $row_order["order_date"];

$order_total = $row_order["order_total"];

$order_status = $row_order["order_status"];

$select_order_addresses = "select * from orders_addresses where order_id='$order_id'";

$run_order_addresses = mysqli_query($con, $select_order_addresses);

$row_order_addresses = mysqli_fetch_array($run_order_addresses);

$billing_first_name = $row_order_addresses["billing_first_name"];

$billing_last_name = $row_order_addresses["billing_last_name"];

$billing_country = $row_order_addresses["billing_country"];

$billing_address_1 = $row_order_addresses["billing_address_1"];

$billing_address_2 = $row_order_addresses["billing_address_2"];

$billing_state = $row_order_addresses["billing_state"];

$billing_city = $row_order_addresses["billing_city"];

$billing_postcode = $row_order_addresses["billing_postcode"];

$is_shipping_address_same = $row_order_addresses["is_shipping_address_same"];

// Shopping Details Starts

$shipping_first_name = $row_order_addresses["shipping_first_name"];

$shipping_last_name = $row_order_addresses["shipping_last_name"];

$shipping_country = $row_order_addresses["shipping_country"];

$shipping_address_1 = $row_order_addresses["shipping_address_1"];

$shipping_address_2 = $row_order_addresses["shipping_address_2"];

$shipping_state = $row_order_addresses["shipping_state"];

$shipping_city = $row_order_addresses["shipping_city"];

$shipping_postcode = $row_order_addresses["shipping_postcode"];

}

?>

<p class="lead">

You Are Viewing Complete Details Of This Order <mark>#<?php echo $invoice_no; ?></mark> was placed on <mark><?php echo $order_date; ?></mark> And Has Currently 

<?php 

if($order_status == "pending"){

echo ucwords($order_status . " Payment");
	
}else{

echo ucwords($order_status);	
	
}

?>

.

</p>

<h3> Order Details </h3>

<table class="table"><!-- table Starts -->

<thead>

<tr>

<th class="text-muted lead"> Product: </th>

<th class="text-muted lead"> Total: </th>

</tr>

</thead>

<tbody>

<?php

$items_subtotal = 0;

$physical_products = array();

$digital_products = array();

$select_order_items = "select * from orders_items where order_id='$order_id'";

$run_order_items = mysqli_query($con,$select_order_items);

while($row_order_items = mysqli_fetch_array($run_order_items)){
	
$product_id = $row_order_items["product_id"];

$product_qty = $row_order_items["qty"];

$product_price = $row_order_items["price"];

$product_size = $row_order_items["size"];

$sub_total = $product_price * $product_qty;

$select_product = "select * from products where product_id='$product_id'";

$run_product = mysqli_query($con,$select_product);

$row_product = mysqli_fetch_array($run_product);

$product_title = $row_product["product_title"];

$product_type = $row_product["product_type"];

if($product_type == "physical_product"){
	
array_push($physical_products,$product_id);
	
}elseif($product_type == "digital_product"){
	
array_push($digital_products,$product_id);
	
}

$items_subtotal += $sub_total;

?>

<tr>

<td>

<a href="#" class="bold"> <?php echo $product_title; ?> </a>

<i class="fa fa-times" title="Product Qty"></i> <?php echo $product_qty; ?> 

<?php if($product_size != "None"){ ?>

<i class="fa fa-plus" title="Product Size"></i> <?php echo $product_size; ?> 

<?php } ?>

</td>

<th>$<?php echo $sub_total; ?> </th>

</tr>


<?php } ?>

<tr>

<th class="text-muted"> Subtotal: </th>

<th> $<?php echo $items_subtotal; ?>  </th>

</tr>

<?php if(count($physical_products) > 0){ ?>

<tr>

<th class="text-muted"> Shipping: </th>

<th>

<span class="text-muted">

<i class="fa fa-truck"></i> <?php echo $shipping_type; ?>:

</span>

$<?php echo $shipping_cost; ?>

</th>

</tr>

<?php } ?>

<tr class="total">

<td> Total: </td>

<td>$<?php echo $order_total; ?></td>

</tr>

</tbody>

</table><!-- table Ends -->

<?php if(count($digital_products) > 0){ ?>

<h3> Order Downloads  </h3>

<table class="table"><!-- table Starts -->

<thead>

<tr>

<th class="text-muted lead"> Product: </th>

<th class="text-muted lead"> Download: </th>

</tr>

</thead>

<tbody>

<?php if($order_status != "processing" and $order_status != "completed"){ ?>

<tr>

<td colspan="2">

If Your Order Status Be Processing/Completed You Will Be Able To Access Order Downloads.

</td>

</tr>

<?php }else{ ?>

<?php

foreach($digital_products as $product_id){
	
$get_product = "select * from products where product_id='$product_id'";

$run_product = mysqli_query($con,$get_product);

$row_product = mysqli_fetch_array($run_product);

$product_title = $row_product["product_title"];

$select_downloads = "select * from downloads where product_id='$product_id'";

$run_downloads = mysqli_query($con,$select_downloads);

while($row_downloads = mysqli_fetch_array($run_downloads)){
	
$download_id = $row_downloads["download_id"];

$download_title = $row_downloads["download_title"];

?>

<tr>

<th><?php echo $product_title; ?></th>

<td>

<a href="download.php?order_id=<?php echo $order_id; ?>&download_id=<?php echo $download_id; ?>">

<?php echo $download_title; ?>

</a>

</td>

</td>

<?php

}

}

?>

<?php } ?>

</tbody>

</table><!-- table Ends -->

<?php } ?>

<div class="row"><!-- row Starts -->

<div class="col-sm-6"><!-- col-sm-6 Starts -->

<h4> Billing Details </h4>

<address class="text-muted" style="font-size:15px;">

<?php echo $billing_first_name . " " . $billing_last_name; ?><br>

<?php echo $billing_address_1; ?><br>

<?php echo $billing_address_2; ?><br>

<?php echo $billing_city; ?><br>

<?php echo $billing_state; ?><br>

<?php echo $billing_postcode; ?><br>

<?php 

$select_country = "select * from countries where country_id='$billing_country'";

$run_country = mysqli_query($con,$select_country);

$row_country = mysqli_fetch_array($run_country);

echo $country_name = $row_country["country_name"];



?><br>

</address>

</div><!-- col-sm-6 Ends -->

<?php if($is_shipping_address_same == "no"){ ?>

<div class="col-sm-6"><!-- col-sm-6 Starts -->

<h4> Shipping Details </h4>

<address class="text-muted" style="font-size:15px;">

<?php echo $shipping_first_name . " " . $shipping_last_name; ?><br>

<?php echo $shipping_address_1; ?><br>

<?php echo $shipping_address_2; ?><br>

<?php echo $shipping_city; ?><br>

<?php echo $shipping_state; ?><br>

<?php echo $shipping_postcode; ?><br>

<?php 

$select_country = "select * from countries where country_id='$shipping_country'";

$run_country = mysqli_query($con,$select_country);

$row_country = mysqli_fetch_array($run_country);

echo $country_name = $row_country["country_name"];



?><br>

</address>

</div><!-- col-sm-6 Ends -->

<?php } ?>

</div><!-- row Ends -->

</div><!-- box Ends -->


</div><!--- col-md-9 Ends -->

</div><!-- container-fluid Ends -->
</div><!-- content Ends -->



<?php

include("includes/footer.php");

?>

<script src="js/jquery.min.js"> </script>

<script src="js/bootstrap.min.js"></script>

</body>
</html>
<?php?>