<?php

session_start();

include("includes/db.php");

include("functions/functions.php");

if(!isset($_SESSION["customer_email"])){

echo "<script> window.open('checkout.php','_self'); </script>";
	
}



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

<div class="col-md-12" ><!--- col-md-12 Starts -->

<ul class="breadcrumb" ><!-- breadcrumb Starts -->

<li>
<a href="index.php">Home</a>
</li>

<li> Order Completed </li>

</ul><!-- breadcrumb Ends -->

<nav class="checkout-breadcrumbs text-center">

<a href="cart.php"> Shopping Cart </a>

<i class="fa fa-chevron-right"></i>

<a href="checkout.php"> Checkout Details </a>

<i class="fa fa-chevron-right"></i>

<a href="#" class="active"> Order Complete </a>

</nav>

</div><!--- col-md-12 Ends -->

<div class="col-md-8"><!-- col-md-8 Starts -->

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

}

?>

<div class="box" id="order-summary"><!-- box order-summary Starts -->

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

<th><span class="fa fa-inr"><?php echo $sub_total; ?></span> </th>

</tr>


<?php } ?>

<tr>

<th class="text-muted"> Subtotal: </th>

<th> <span class="fa fa-inr"><?php echo $items_subtotal; ?></span>  </th>

</tr>

<tr class="total">

<td> Total: </td>

<td><span class="fa fa-inr"><?php echo $order_total; ?></span></td>

</tr>

</tbody>

</table><!-- table Ends -->

<h3> Customer Details </h3>

<table class="table"><!-- table Starts -->

<tbody>

<tr>

<th class="text-muted"> Email: </th>

<th> <?php echo $customer_email; ?> </th>

</tr>

<tr>

<th class="text-muted"> Phone: </th>

<th> <?php echo $customer_contact; ?> </th>

</tr>

</tbody>

</table><!-- table Ends -->

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


</div><!-- row Ends -->

</div><!-- box order-summary Ends -->

</div><!-- col-md-8 Ends -->

<div class="col-md-4"><!-- col-md-4 Starts -->

<div class="box"><!-- box Starts -->

<h4 class="text-success"> Thank you. Your order has been received. </h4>

<ul class="order-received-list"><!-- ul order-received-list Starts -->

<li> Invoice/Order Number: <strong>#<?php echo $invoice_no; ?></strong> </li>

<li> Date: <strong><?php echo $order_date; ?></strong> </li>



<li> Total: <strong><span class="fa fa-inr"><?php echo $order_total; ?></span></strong> </li>

<li> 

<strong>

<a class="text-muted" href="customer/my_account.php?my_orders"> Click Here For Go To My Account </a>

</strong> 

</li>

</ul><!-- ul order-received-list Ends -->

</div><!-- box Ends -->

</div><!-- col-md-4 Ends -->

</div><!-- container Ends -->
</div><!-- content Ends -->



<?php

include("includes/footer.php");

?>



<script src="js/bootstrap.min.js"></script>

</body>
</html>