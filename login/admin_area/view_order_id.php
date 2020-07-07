<?php

if(!isset($_SESSION['admin_email'])){

echo "<script>window.open('login.php','_self')</script>";

}

else {

if(isset($_GET["view_order_id"])){
	
$order_id = $_GET["view_order_id"];

$select_order = "select * from orders where order_id='$order_id'";

$run_order = mysqli_query($con,$select_order);

$row_order = mysqli_fetch_array($run_order);

$customer_id = $row_order["customer_id"];

$invoice_no = $row_order["invoice_no"];

$shipping_type = $row_order["shipping_type"];

$shipping_cost = $row_order["shipping_cost"];

$payment_method = $row_order["payment_method"];

$order_date = $row_order["order_date"];

$order_total = $row_order["order_total"];

$order_status = $row_order["order_status"];

$get_customer = "select * from customers where customer_id='$customer_id'";

$run_customer = mysqli_query($con, $get_customer);

$row_customer = mysqli_fetch_array($run_customer);

$customer_email = $row_customer['customer_email'];

$customer_name = $row_customer['customer_name'];

$customer_contact = $row_customer['customer_contact'];

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


<div class="row"><!-- 1 row Starts -->

<div class="col-lg-12"><!-- col-lg-12 Starts -->

<ol class="breadcrumb"><!-- breadcrumb Starts  --->

<li class="active lead" style="margin-bottom:0px;">

You Are Viewing Complete Details Of This Order <mark>#<?php echo $invoice_no; ?></mark> was placed on <mark><?php echo $order_date; ?></mark> And Has Currently 

<mark>

<?php 

if($order_status == "pending"){

echo ucwords($order_status . " Payment");
	
}else{

echo ucwords($order_status);	
	
}

?>

</mark>

.

</li>

</ol><!-- breadcrumb Ends  --->

</div><!-- col-lg-12 Ends -->

</div><!-- 1 row Ends -->

<div class="row"><!-- 2 row Starts -->

<div class="col-md-8"><!-- col-md-8 Starts -->

<div class="panel panel-default"><!-- panel panel-default Starts -->

<div class="panel-heading"><!-- panel-heading Starts -->

<h3 class="panel-title"><!-- panel-title Starts -->

<i class="fa fa-money fa-fw"></i> Order #<?php echo $invoice_no; ?> Details

</h3><!-- panel-title Ends -->

</div><!-- panel-heading Ends -->

<div class="panel-body" id="order-summary"><!-- panel-body Starts -->

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

$product_type = $row_product["product_type"];

if($product_type == "physical_product"){
	
array_push($physical_products,$product_id);
	
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

<tr>

<th class="text-muted"> Payment Method: </th>

<th> <?php echo ucwords($payment_method); ?>  </th>

</tr>


<tr class="total">

<td> Total: </td>

<td>$<?php echo $order_total; ?></td>

</tr>

</tbody>

</table><!-- table Ends -->

<h3> Customer Details </h3>

<table class="table"><!-- table Starts -->

<tbody>

<tr>

<th class="text-muted"> Name: </th>

<th> <?php echo $customer_name; ?> </th>

</tr>

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

<?php if($is_shipping_address_same == "yes"){ ?>

<div class="col-sm-12"><!-- col-sm-12 Starts -->

<div class="alert alert-info">

<strong>Info!</strong> Please Note That Billing And Shipping Details Are The Same.

</div>

</div><!-- col-sm-12 Ends -->

<?php } ?>

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

</div><!-- panel-body Ends -->

</div><!-- panel panel-default Ends -->

</div><!-- col-md-8 Ends -->

<div class="col-md-4"><!-- col-md-4 Starts -->

<div class="panel panel-default"><!-- panel panel-default Starts -->

<div class="panel-heading"><!-- panel-heading Starts -->

<h3 class="panel-title"><!-- panel-title Starts -->

<i class="fa fa-money fa-fw"></i> Order Actions

</h3><!-- panel-title Ends -->

</div><!-- panel-heading Ends -->

<div class="panel-body"><!-- panel-body Starts -->

<h4 class="text-success">

Current Order Status : 

<?php 

if($order_status == "pending"){

echo ucwords($order_status . " Payment");
	
}else{

echo ucwords($order_status);	
	
}

?>

</h4>

<form method="post"><!-- form Starts -->

<div class="form-group"><!-- form-group Starts -->

<label> Change Order Status </label>

<select name="order_status" class="form-control" required>

<option value="pending"> Pending Payment </option>

<option value="processing"> Processing </option>

<option value="on hold"> On Hold </option>

<option value="cancelled"> Cancelled </option>

<option value="refunded"> Refunded </option>

<option value="completed"> Completed </option>

</select>

</div><!-- form-group Ends -->

<div class="form-group"><!-- form-group Starts -->

<input type="submit" name="update_order_status" value="Update Status" class="btn btn-success form-control" >

</div><!-- form-group Ends -->

</form><!-- form Ends -->

<?php

if(isset($_POST["update_order_status"])){
	
$order_status = $_POST["order_status"];

$update_order_status = "update orders set order_status='$order_status' where order_id='$order_id'";

$run_update_order_status = mysqli_query($con,$update_order_status);

if($run_update_order_status){

echo "

<script>

alert('Your Order Status Has Been Updated Successfully.');

window.open('index.php?view_order_id=$order_id','_self');

</script>

";	
	
}
	
}

?>

</div><!-- panel-body Ends -->

</div><!-- panel panel-default Ends -->

</div><!-- col-md-4 Ends -->

</div><!-- 2 row Ends -->




<?php } ?>