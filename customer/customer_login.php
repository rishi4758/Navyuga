<div class="box login_wrap"><!--box starts-->
	




<div class="box-header"><!--box starts-->
	
<center>
	

	<h1>Login</h1>

<p class="lead"> already our customer</p>




</center>



<p class="text-muted">you are very  lucky to have your acccount in our application </p>


</div><!--box end-->
<form  action="checkout.php" method="post"><!--form start-->

<div class="form-group">
	
<div class="form-group">
	<label>Email</label>
	<input type="text" class="form-control" name="c_email" required>
</div>
	
<div class="form-group">
	<label>Password</label>
	<input type="password" class="form-control" name="c_pass" required>

	<h4 align="center">
		<a href="forgot_pass.php"> Forgot Password </a>
	</h4>

</div>

<div class="text-center"> <!--text-center start -->
	<button name="login" value="Login" class="btn btn-primary" >
	<i class="fa fa-sign-in"></i> Log in 
</button>


</div>  <!--text-center end -->


</form>	<!--form ends-->



<center><!--center stares-->
	
<a href="customer_register.php">
	
	<h3>New?Register here</h3>
</a>

</center><!--center endss-->

</div><!--box endss-->

<?php
if(isset($_POST['login']))
{

$customer_email=$_POST['c_email'];


$customer_pass=$_POST['c_pass'];



$select_customer="select * from customers where customer_email='$customer_email'AND customer_pass='$customer_pass'";
$run_customer = mysqli_query($con,$select_customer);


$get_ip= getRealUserIp();
$check_customer= mysqli_num_rows($run_customer);


$select_cart="select * from cart where ip_add='$get_ip'";

$run_cart=mysqli_query($con,$select_cart);


$check_cart= mysqli_num_rows($run_cart);

if($check_customer==0){

echo "<script>alert('your password or email is wrong')</script> ";
exit();

}



if($check_customer==1 AND $check_cart==0){

$_SESSION['customer_email']=$customer_email;

echo " <script> alert('you are logged in')</script";
echo "<script>window.open('customer/my_acccount.php?my_orders','_self')</script>";

}

else{
$_SESSION['customer_email']=$customer_email;

echo " <script> alert('you are  absolutely logged in')</script>";



echo "<script>window.open('checkout.php?my_orders','_self')</script>";



}

}
?>