<div class="box login_wrap"> <!--box start-->
	
<div class="box-header"> <!--box-header start-->

	
<center>
	

<h1>Login</h1>

<p class="lead"> Already our Customer! </p>


<p class="text-muted">

Lorem ipsum dolor sit amet consectetur, adipisicing elit. Expedita laborum qui libero perspiciatis, itaque accusantium ut. Praesentium, perspiciatis unde quod autem nemo totam quaerat distinctio ut delectus consequuntur fugiat123

</p>


</center>



</div> <!--box-header end-->

<form action="checkout.php" method="post" > <!--form start -->
	
<div class="form-group"> <!--form-group start -->

<label>Email</label>


<input type="text" class="form-control" name="c_email" required>	

</div> <!--form-group end -->



<div class="form-group"> <!--form-group start -->

<label>Password</label>


<input type="password" class="form-control" name="c_pass" required>	

<h4 align="center">

<a href="forgot_pass.php"> Forgot Password </a>

</h4>

</div> <!--form-group end -->



<div class="text-center"> <!--text-center start -->

	<button name="login" value="Login" class="btn btn-primary" >
	<i class="fa fa-sign-in"></i> Log in 
</button>



</div>  <!--text-center end -->


</form> <!--form end -->


<center>
	
<a href="customer_register.php">

	<h3> New ? Register Here </h3>

</center>


</div><!--box end-->


<?php

if (isset($_POST['login'])){
	# code...

	$customer_email= $_POST['c_email'];


	$customer_pass= $_POST['c_pass'];


	$select_customer= "select * from customer where customer_email='$customer_email' AND customer_pass='$customer_pass'";


	$run_customer= mysqli_query($con,$select_customer);

	$get_ip= getRealUserIp();

	$check_customer= mysqli_num_rows($run_customer);

	$select_cart= "select *from cart where ip_add='$get_ip'";

	$run_cart= mysqli_query($con,$select_cart);

	$check_cart= mysqli_num_rows($run_cart);

	if ($check_customer==0) {


		echo "<script>alert('password or email is wrong!')</script>";

		exit();

	}

	if ($check_customer==1 AND $check_cart==0) {

		# code...
		$_SESSION['customer_email']=$customer_email;

		echo "<script>alert('You are logged In')</script>";

		echo "<script>window.open('customer/my_account.php?my_orders','_self')</script>";
	}else

	{
		$_SESSION['customer_email']=$customer_email;

		echo "<script>alert('You are logged In')</script>";

		echo "<script>window.open('checkout.php','_self')</script>";

	}
	


	






}






?>
