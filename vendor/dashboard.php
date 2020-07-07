










<div class="row"><!--row starts-->

<div class="col-sm-12"><!--col lg starts-->



<h1 class="page-header">Dashboard</h1>

<ol class="breadcrumb"><!--breadcrumb startss-->
<li>
<i class="fa fa-dashboard"></i>dashboard</li>


</ol><!--breadcrumb ends-->


</div><!--col lg endss-->

</div><!--row 1endss-->


<div class="row"><!--row 2 staqrts-->
<div class="col-lg-3 col-md-6"><!--col-lg-3 col-md-6 starts-->


<div class="panel panel-primary"><!--panel panel-primary starts-->

<div class="panel-heading"><!--panel-heading starts-->




<div class="row"><!--row starts-->


<div class="col-xs-3"><!--col xs 3 st5arts-->

<i class="fa fa-tasks fa-5x">  </i>


</div><!--col xs 3 endss-->

<div class="col-xs-9 text-right"><!--col xs 9 start-->
<div class="huge"><?php   echo $count_products ;?></div>


<div>Products</div>

</div><!--col xs 9 endt-->


</div><!--row endss-->

</div><!--panel-heading ENDSs-->



<a href="index1.php?view_products">
<div class="panel-footer"><!--panel foooter starts-->


<span class="pull-left">View Details</span>

<span class="pull-right"><i class="fa fa-arrow-circle-right"></i>
</span>

<div class="clearfix"></div>




</div><!--panel foooter endss-->

</a>


</div><!--panel panel-primary endss-->

</div><!--col-lg-3 col-md-6 endss-->




<div class="row"><!--row 2 staqrts-->
<div class="col-lg-3 col-md-6"><!--col-lg-3 col-md-6 starts-->


<div class="panel panel-green"><!--panel panel-green starts-->

<div class="panel-heading"><!--panel-heading starts-->




<div class="row"><!--row starts-->


<div class="col-xs-3"><!--col xs 3 st5arts-->

<i class="fa fa-comments fa-5x">  </i>


</div><!--col xs 3 endss-->

<div class="col-xs-9 text-right"><!--col xs 9 start-->
<div class="huge"><?php echo $count_customers;?></div>


<div>Customers</div>

</div><!--col xs 9 endt-->


</div><!--row endss-->

</div><!--panel-heading ENDSs-->



<a href="index1.php?view_customers">
<div class="panel-footer"><!--panel foooter starts-->


<span class="pull-left">View Details</span>

<span class="pull-right"><i class="fa fa-arrow-circle-right"></i>
</span>

<div class="clearfix"></div>




</div><!--panel foooter endss-->

</a>


</div><!--panel panel-green endss-->

</div><!--col-lg-3 col-md-6 endss-->





<div class="col-lg-3 col-md-6"><!--col-lg-3 col-md-6 starts-->


<div class="panel panel-yellow"><!--panel panel-primary starts-->

<div class="panel-heading"><!--panel-heading starts-->




<div class="row"><!--row starts-->


<div class="col-xs-3"><!--col xs 3 st5arts-->

<i class="fa fa-shopping-cart fa-5x">  </i>


</div><!--col xs 3 endss-->

<div class="col-xs-9 text-right"><!--col xs 9 start-->
<div class="huge"><?php   echo $count_p_categories ;?></div>


<div>Products Categories</div>

</div><!--col xs 9 endt-->


</div><!--row endss-->

</div><!--panel-heading ENDSs-->



<a href="index1.php?view_p_cats">
<div class="panel-footer"><!--panel foooter starts-->


<span class="pull-left">View Details</span>

<span class="pull-right"><i class="fa fa-arrow-circle-right"></i>
</span>

<div class="clearfix"></div>




</div><!--panel foooter endss-->

</a>


</div><!--panel panel-yelklow endss-->

</div><!--col-lg-3 col-md-6 endss-->




<div class="row"><!--row 2 staqrts-->
<div class="col-lg-3 col-md-6"><!--col-lg-3 col-md-6 starts-->


<div class="panel panel-red"><!--panel panel-red starts-->

<div class="panel-heading"><!--panel-heading starts-->




<div class="row"><!--row starts-->


<div class="col-xs-3"><!--col xs 3 st5arts-->

<i class="fa fa-support fa-5x">  </i>


</div><!--col xs 3 endss-->

<div class="col-xs-9 text-right"><!--col xs 9 start-->
<div class="huge"><?php  echo $count_pending_orders;?></div>


<div>Orders</div>

</div><!--col xs 9 endt-->


</div><!--row endss-->

</div><!--panel-heading ENDSs-->



<a href="index1.php?view_orders">
<div class="panel-footer"><!--panel foooter starts-->


<span class="pull-left">View Details</span>

<span class="pull-right"><i class="fa fa-arrow-circle-right"></i>
</span>

<div class="clearfix"></div>



</div><!--panel foooter endss-->

</a>


</div><!--panel panel-red endss-->

</div><!--col-lg-3 col-md-6 endss-->
</div><!--2 row endws-->



<div class="row"><!--row starts-->

<div class="col-lg-8"><!--col lg starts-->

<div class="panel panel-primary"><!--panel panel primary  starts-->

<div class="panel-heading"><!--panel jheading starts-->


<h3 class="panel-title"><!--panel title starts-->

<i class=" fa fa-money fa-fw"></i>New Orders


</h3><!--panel title endss-->


</div><!--panel jheading endss-->

<div class="panel-body"><!--pNEL -BODY STRARTS-->
<div class="table-responsive"><!--table-responsive starts-->


<table class="table table-bordered table-hover table-striped">


<thead>

<tr>
<th>Order NO:</th>
<th>Customer Email:</th>

<th>invoice no:</th>

<th>Product Id:</th>

<th>Product qty:</th>

<th>Product Size:</th>

<th>status:</th>
</tr>
</thead>


<tbody><!--tbody starts-->
	<?php 

	$i=0;
	$get_order= "select * from pending_orders order by 1 DESC LIMIT 0,5";

	$run_order= mysqli_query($con,$get_order);

	while($row_order= mysqli_fetch_array($run_order)) {
		
		$order_id= $row_order['order_id'];

		$c_id= $row_order['customer_id'];

		$invoice_no= $row_order['invoice_no'];

		$product_id= $row_order['product_id'];

		$qty= $row_order['qty'];

		$size= $row_order['size'];

		$order_status= $row_order['order_status'];

		$i++;



	?>

	<tr>
		<td><?php echo $i ; ?></td>

		<td>

		<?php

		$get_customer= "select * from customers where customer_id='$c_id'";

		$run_customer= mysqli_query($con,$get_customer);

		$row_customer= mysqli_fetch_array($run_customer);

		$customer_email= $row_customer['customer_email'];

		 echo $customer_email;
		 
		?>
	  </td>

		

		<td><?php echo $invoice_no ; ?></</td>

		<td><?php echo $product_id ; ?></</td>

		<td><?php echo $qty ; ?></</td>

		<td><?php echo $size ; ?></</td>

		<td>
		<?php
		if($order_status=='pending'){
			echo $order_status='pending';
		}
		else{
			echo $order_status='completed';
			
		}
			
	
		?>
		
		
		</td>

	</tr>
	
 


<?php } ?>

</tbody><!--tbody endss-->
</table>

</div><!--table-responsive endss-->

<div class="text-right"><!--text -right starts-->

<a href="index.php?view_orders">View all orders<i class="fa fa-arrow-circle-right "></i></a>

</div><!--text -right endsd-->
</div><!--pNEL -BODY endsS-->



</div><!--panel panel primary  endss-->



</div><!--col lg endss-->



<div class="col-md-4"><!--col md 4 starts-->
<div class="panel"><!--panell starts-->

<div class="panel-body"><!--panel body starts-->


<div class="thumb-info mb-md"><!--thumb-info mb-md starts-->
<img src="vendor_images/<?php echo $admin_image; ?>" class="rounded img-reponsive">


<div class="thumb-info-title"><!--thumb-info-title strts-->

<span class="thumb-info-inner"><?php echo $admin_name; ?></span>


</div><!--thumb-info-title endsds-->
</div><!--thumb-info mb-md starts-->

<div class="mb-md">
<!--mb md strats-->
<div class="widget-content-expand"><!--widget-content-expand starts-->


<i class=" fa fa-user"></i><span>Email:</span><?php echo $admin_email; ?><br>




<i class="fa fa-user"></i><span>Contact:</span><?php echo $admin_contact; ?><br>



</div><!--widget-content-expand ends-->
<hr class="dotted short">
<h5 class="text-muted">About</h5>

<p><?php echo $admin_about; ?></p>
</div><!--mb md endss-->


</div><!--panel body endsts-->



</div><!--panell endsts-->


</div><!--col md 4 ends-->



</div><!--row endss-->














