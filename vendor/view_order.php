<?php


if(!isset($_SESSION['vendor_email'])){

echo "<script>window.open('vendor_login.php','_self')</script>";

}

else {

$admin_email = $_SESSION['vendor_email'];

$select_admin = "select * from vendors where vendor_email='$admin_email'";

$run_admin = mysqli_query($con,$select_admin);

$row_admin = mysqli_fetch_array($run_admin);

$admin_id = $row_admin["vendor_id"];


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


<th>Invoice No:</th>

<th>Order Date:</th>

<th>Total Amount:</th>

<th>Order Status:</th>




</tr>

</thead><!-- thead Ends -->


<tbody><!-- tbody Starts -->

<?php

$i = 0;

$select_orders = "select * from orders where vendor_id='$admin_id'";

$run_orders = mysqli_query($con,$select_orders);

while($row_orders = mysqli_fetch_array($run_orders)){
	
$i++;

$order_id = $row_orders["order_id"];

$customer_id = $row_orders["customer_id"];

$invoice_no = $row_orders["invoice_no"];

$shipping_type = $row_orders["shipping_type"];

$payment_method = $row_orders["payment_method"];

$order_date = $row_orders["order_date"];

$order_total = $row_orders["order_total"];

$order_status = $row_orders["order_status"];


<tr>

<td><?php echo $i; ?></td>

<td><?php echo $invoice_no ;?></td>

<td><?php echo $order_date ;?></td>


<td><?php echo $order_status ;?></td>



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