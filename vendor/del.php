<?php






$vendor_email=$_SESSION['vendor_email'];
	
	$get_vendor="select * from vendors where vendor_email='$vendor_email'";

	$run_vendor=mysqli_query($con,$get_vendor);
	
	$row_vendor=mysqli_fetch_array($run_vendor);
	
	$vendor_id=$row_vendor['vendor_id'];		
	
echo " $vendor_id" ;


$get_orders="select * from orders where vendor_id='$vendor_id'";

$run_orders=mysqli_query($con,$get_orders);
$c=0;
while($row_orders=mysqli_fetch_array($run_orders))
{
	$c++;
}

echo "$c";



?>