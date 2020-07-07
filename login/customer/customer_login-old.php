<?php

if(!defined("customer_login")){
	
echo "<script> window.open('../checkout.php','_self'); </script>";	
	
}

?>

<div class="box login_wrap" ><!-- box Starts -->

<div class="box-header" ><!-- box-header Starts -->

<center>

<h1>Login</h1>







</div><!-- box-header Ends -->

<form action="checkout.php" method="post" ><!--form Starts -->

<div class="form-group" ><!-- form-group Starts -->

<label>Email</label>

<input type="text" class="form-control" name="c_email" required >

</div><!-- form-group Ends -->

<div class="form-group" ><!-- form-group Starts -->

<label>Password</label>

<input type="password" class="form-control" name="c_pass" required >

<h4 align="center">

<a href="forgot_pass.php"> Forgot Password </a>

</h4>

</div><!-- form-group Ends -->

<div class="text-center" ><!-- text-center Starts -->

<button name="login" value="Login" class="btn btn-primary" >

<i class="fa fa-sign-in" ></i> Log in


</button>

</div><!-- text-center Ends -->


</form><!--form Ends -->

<center><!-- center Starts -->

<a href="customer_register.php" >

<h3>New ? Register Here</h3>

</a>


</center><!-- center Ends -->


</div><!-- box Ends -->

<?php

if(isset($_POST['login'])){

$customer_email = mysqli_real_escape_string($con, $_POST['c_email']);

$customer_pass = mysqli_real_escape_string($con, $_POST['c_pass']);

$select_customer = "select * from customers where customer_email='$customer_email'";

$run_customer = mysqli_query($con,$select_customer);

$check_customer = mysqli_num_rows($run_customer);

$row_customer = mysqli_fetch_array($run_customer);

$hash_password = $row_customer['customer_pass'];

$decrypt_password = password_verify($customer_pass, $hash_password);

if($decrypt_password == 0){
	
echo "<script>alert('your password or email is wrong')</script>";

exit();
	
}

$get_ip = getRealUserIp();

$select_cart = "select * from cart where ip_add='$get_ip'";

$run_cart = mysqli_query($con,$select_cart);

$check_cart = mysqli_num_rows($run_cart);

if($check_customer==1 AND $check_cart==0){

$_SESSION['customer_email']=$customer_email;

echo "<script>alert('You are Logged In')</script>";

echo "<script>window.open('index.php','_self')</script>";

}
else {

$_SESSION['customer_email']=$customer_email;

echo "<script>alert('You are Logged In')</script>";

echo "<script>window.open('index.php','_self')</script>";

} 


}

?>