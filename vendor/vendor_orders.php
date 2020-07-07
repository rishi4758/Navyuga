
<?php

include('includes/db.php');


if(!isset($_SESSION['vendor_email'])){

echo "<script>window.open('vendor_login.php','_self')</script>";

}



else {
	






$vendor_email=$_SESSION['vendor_email'];
	
	$get_vendor="select * from vendors where vendor_email='$vendor_email'";

	$run_vendor=mysqli_query($con,$get_vendor);
	
	$row_vendor=mysqli_fetch_array($run_vendor);
	
	$vendor_id=$row_vendor['vendor_id'];		
	



$get_orders="select * from orders where vendor_id='$vendor_id'";

$run_orders=mysqli_query($con,$get_orders);
$c=0;
while($row_orders=mysqli_fetch_array($run_orders))
{
	$c++;
}





}?>


<div class="row"><!--row 2 staqrts-->
<div class="col-lg-3 col-md-6"><!--col-lg-3 col-md-6 starts-->


<div class="panel panel-red"><!--panel panel-red starts-->

<div class="panel-heading"><!--panel-heading starts-->




<div class="row"><!--row starts-->


<div class="col-xs-3"><!--col xs 3 st5arts-->

<i class="fa fa-support fa-5x">  </i>


</div><!--col xs 3 endss-->

<div class="col-xs-9 text-right"><!--col xs 9 start-->
<div class="huge"><?php  echo $c;?></div>


<div>Orders</div>

</div><!--col xs 9 endt-->


</div><!--row endss-->

</div><!--panel-heading ENDSs-->



<a href="index.php?view_orders">
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
