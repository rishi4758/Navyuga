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

<div class="row"><!-- 1 row Starts -->

<div class="col-lg-12"><!-- col-lg-12 Starts -->

<ol class="breadcrumb"><!-- breadcrumb Starts  --->

<li class="active">

<i class="fa fa-dashboard"></i> Dashboard / View Orders

</li>

</ol><!-- breadcrumb Ends  --->

</div><!-- col-lg-12 Ends -->

</div><!-- 1 row Ends -->


<div class="row"><!-- 2 row Starts -->

<div class="col-lg-12"><!-- col-lg-12 Starts -->

<div class="panel panel-default"><!-- panel panel-default Starts -->

<div class="panel-heading"><!-- panel-heading Starts -->

<h3 class="panel-title"><!-- panel-title Starts -->

<i class="fa fa-money fa-fw"></i> View Orders

</h3><!-- panel-title Ends -->

</div><!-- panel-heading Ends -->

<div class="panel-body"><!-- panel-body Starts -->

<div class="table-responsive"><!-- table-responsive Starts -->

<table class="table table-bordered table-hover table-striped"><!-- table table-bordered table-hover table-striped Starts -->

<thead><!-- thead Starts -->

<tr>

<th>Order No:</th>

<th>Ship To:</th>

<th>Customer Email:</th>

<th>Invoice No:</th>

<th>Order Date:</th>

<th>Total Amount:</th>

<th>Order Status:</th>

<th>Actions:</th>


</tr>

</thead><!-- thead Ends -->


<tbody><!-- tbody Starts -->

<?php

$i = 0;

$select_orders = "select * from orders order by 1 desc";

$run_orders = mysqli_query($con,$select_orders);

while($row_orders = mysqli_fetch_array($run_orders)){
	
$i++;

$order_id = $row_orders["order_id"];

$customer_id = $row_orders["customer_id"];

$invoice_no = $row_orders["invoice_no"];





$order_date = $row_orders["order_date"];

$order_total = $row_orders["order_total"];

$order_status = $row_orders["order_status"];

$get_customer = "select * from customers where customer_id='$customer_id'";

$run_customer = mysqli_query($con, $get_customer);

$row_customer = mysqli_fetch_array($run_customer);

$customer_email = $row_customer['customer_email'];

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

$select_hide_admin_orders = "select * from hide_admin_orders where admin_id='$admin_id' and order_id='$order_id'";

$run_select_hide_admin_orders = mysqli_query($con,$select_hide_admin_orders);

$count_hide_admin_orders = mysqli_num_rows($run_select_hide_admin_orders);

if($count_hide_admin_orders == 0){

?>

<tr>

<td><?php echo $i; ?></td>

<td>

<strong>



<?php echo $billing_first_name . " " . $billing_last_name; ?>,

<?php echo $billing_city; ?>,

<?php echo $billing_state; ?>,

<?php echo $billing_postcode; ?>,

<?php 

$select_country = "select * from countries where country_id='$billing_country'";

$run_country = mysqli_query($con,$select_country);

$row_country = mysqli_fetch_array($run_country);

echo $country_name = $row_country["country_name"];



?>

<?php 

$select_country = "select * from countries where country_id='$billing_country'";

$run_country = mysqli_query($con,$select_country);

$row_country = mysqli_fetch_array($run_country);

echo $country_name = $row_country["country_name"];



?>

</strong>

<br> 


</td>

<td><?php echo $customer_email; ?></td>

<td bgcolor="yellow">#<?php echo $invoice_no; ?></td>

<td><?php echo $order_date; ?></td>

<td><?php echo $order_total; ?></td>
<td>

<?php 

if($order_status == "pending"){

echo ucwords($order_status . " Payment");
	
}else{

echo ucwords($order_status);	
	
}

?>

</td>

<td>

<div class="dropdown"><!-- dropdown Starts -->

<button class="btn btn-success dropdown-toggle" data-toggle="dropdown">

<span class="caret"></span>

</button>

<ul class="dropdown-menu dropdown-menu-right">

<li>

<a href="index.php?view_order_id=<?php echo $order_id; ?>" target="_blank">

<i class="fa fa-pencil"></i> View / Edit

</a>

</li>

<li>

<a href="index.php?order_delete=<?php echo $order_id; ?>" class="bg-danger">

<i class="fa fa-trash-o"></i> Delete

</a>

</li>

</ul>

</div><!-- dropdown Ends -->

</td>

</tr>

<?php 

}

}

?>

</tbody><!-- tbody Ends -->

</table><!-- table table-bordered table-hover table-striped Ends -->

</div><!-- table-responsive Ends -->

</div><!-- panel-body Ends -->

</div><!-- panel panel-default Ends -->

</div><!-- col-lg-12 Ends -->

</div><!-- 2 row Ends -->


<?php } ?>