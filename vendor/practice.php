<?php

if(!isset($_SESSION['vendor_email'])){

echo "<script>window.open('vendor_login.php','_self')</script>";

}

else {

?>



<?php $vendor_session=$_SESSION['vendor_email'];

$get_customer="select * from vendors where vendor_email='$vendor_session'";

$run_customer= mysqli_query($con,$get_customer);


$row_customer=mysqli_fetch_array($run_customer);



$vendor_id=$row_customer['vendor_id'];


echo" $vendor_id ";

}

?>
