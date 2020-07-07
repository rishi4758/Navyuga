<?php

session_start();

include("includes/db.php");

include("functions/functions.php");

if(isset($_SESSION['customer_email'])){

echo "<script> window.open('checkout.php','_self'); </script>";	

}

?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>E-commerce Store</title>
  <link rel="stylesheet" href="styles/custom_style.css">
</head>

<body>

	<?php include("includes/header.php"); ?>
<div id="content" ><!-- content Starts -->
<div class="container" ><!-- container Starts -->
	<div class="row">
		<div class="col-md-12" ><!--- col-md-12 Starts -->
			<ul class="breadcrumb" ><!-- breadcrumb Starts -->
				<li>
					<a href="index.php">Home</a>
				</li>

				<li>Register</li>
			</ul><!-- breadcrumb Ends -->
		</div><!--- col-md-12 Ends -->
	</div>

	<div class="row">
		<div class="col-md-12" ><!-- col-md-12 Starts -->
			<div class="box"><!-- box Starts -->

			<div class="box-header"><!-- box-header Starts -->

			<center>

				<h2> Please enter your email address. You will receive a link to create a new password via email. </h2>

			</center>

			</div><!-- box-header Ends -->

			<div align="center"><!-- center div Starts -->

			<form action="" method="post"><!-- form Starts -->

			<input type="text" class="form-control" name="c_email" placeholder="Enter Your Email">

			<br>

			<input type="submit" name="forgot_pass" class="btn btn-primary" value="Submit">

			</form><!-- form Ends -->

			</div><!-- center div Ends -->

			</div><!-- box Ends -->
		</div><!-- col-md-12 Ends -->
	</div>

</div><!-- container Ends -->
</div><!-- content Ends -->



<?php

include("includes/footer.php");

?>

<div class="menu_backdrop"></div>

<script src="js/jquery.min.js"> </script>
<script src="js/bootstrap.min.js"></script>
<script src="js/custom_script.js"></script>

</body>
</html>

<?php

if(isset($_POST['forgot_pass'])){

$c_email = $_POST['c_email'];

$sel_c = "select * from customers where customer_email='$c_email'";

$run_c = mysqli_query($con,$sel_c);

$count_c = mysqli_num_rows($run_c);

$row_c = mysqli_fetch_array($run_c);

$c_name = $row_c['customer_name'];

$c_pass = $row_c['customer_pass'];

if($count_c == 0){

echo "<script> alert('Sorry, We do not have your email') </script>";

exit();

}
else{

$message = "

<img src='http://localhost/Ecom_store/images/email-logo.png' width='100'>

<h3> Someone has requested a password reset for the following account: </h3>

<h3> Site Url: www.computerfever.com </h3>

<h3> Email Address: $c_email </h3>

<h3> Name: $c_name </h3>

<h3> If this was a mistake, just ignore this email and nothing will happen. </h3>

<h3>

<a href='http://localhost/Ecom_store/change_password.php?change_password=$c_pass'>

To Reset/Change Your Password, Click Here

</a>

</h3>

";

$from = "sad.ahmed22224@gmail.com"; 

$subject = "!Important Computerfever Your Password Reset";

$headers = "From: $from\r\n";

$headers .= "Content-type: text/html\r\n";

mail($c_email,$subject,$message,$headers);

echo "<script> alert('Your Password Reset/Change Link Has Been Sent To Your Email,Please Check Your Inbox.') </script>";

echo "<script>window.open('checkout.php','_self')</script>";

}

}

?>

