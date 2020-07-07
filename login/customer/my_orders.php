
<center><!-- center Starts -->

<h1>My Orders</h1>

<p class="lead"> Your orders on one place.</p>

<p class="text-muted" >

If you have any questions, please feel free to <a href="../contact.php" > contact us,</a> our customer service center is working for you 24/7.


</p>


</center><!-- center Ends -->

<hr>

<div class="table-responsive" ><!-- table-responsive Starts -->

<table class="table table-bordered table-hover" ><!-- table table-bordered table-hover Starts -->

<thead><!-- thead Starts -->

<tr>

<th> Order No: </th>

<th> Invoice No: </th>

<th> Order Date: </th>

<th> Order Status: </th>

<th> Order Total: </th>

<th> Actions: </th>

</tr>

</thead><!-- thead Ends -->

<tbody><!--- tbody Starts --->

<?php

$customer_email = $_SESSION['customer_email'];

$get_customer = "select * from customers where customer_email='$customer_email'";

$run_customer = mysqli_query($con, $get_customer);

$row_customer = mysqli_fetch_array($run_customer);

$customer_id = $row_customer['customer_id'];

$select_orders = "select * from orders where customer_id='$customer_id' order by 1 desc";

$run_orders = mysqli_query($con,$select_orders);

$i = 0;

while($row_orders = mysqli_fetch_array($run_orders)){
	
$i++;

$order_id = $row_orders["order_id"];

$invoice_no = $row_orders["invoice_no"];

$order_total = $row_orders["order_total"];

$order_date = $row_orders["order_date"];

$order_status = $row_orders["order_status"];

?>

<tr>

<th> <?php echo $i; ?> </th>

<td> #<?php echo $invoice_no; ?> </td>

<td> <?php echo $order_date; ?> </td>

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

<strong><i class='fa fa-inr'></i><?php echo $order_total; ?></strong>

for

<?php

$total_items = 0;

$select_order_items = "select * from orders_items where order_id='$order_id'";

$run_order_items = mysqli_query($con,$select_order_items);

while($row_order_items = mysqli_fetch_array($run_order_items)){
	
$qty = $row_order_items["qty"];

$total_items += $qty;
	
}

if($total_items == 1){

echo $total_items . " item";
	
}else{

echo $total_items . " items";	
	
}

?>

</td>

<td>

<div class="dropdown"><!-- dropdown Starts -->

<button class="btn btn-success dropdown-toggle" data-toggle="dropdown">

<span class="caret"></span>



paid</button>

<ul class="dropdown-menu dropdown-menu-right">

<?php if($order_status == "pending"){ ?>

<li>

<a href="confirm.php?order_id=<?php echo $order_id; ?>" target="blank" class="bg-danger">
not Paid
</a>

</li>

<?php } ?>

<li>

<a href="view_order.php?order_id=<?php echo $order_id; ?>" target="blank"> View </a>

</li>

</ul>

</div><!-- dropdown Ends -->


</td>

</tr>

<?php } ?>

</tbody><!--- tbody Ends --->


</table><!-- table table-bordered table-hover Ends -->

</div><!-- table-responsive Ends -->



