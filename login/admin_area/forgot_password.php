<?php

session_start();

include("includes/db.php");

?>
<!DOCTYPE HTML>
<html>

<head>

<title>Admin Forgot Password </title>

<link rel="stylesheet" href="css/bootstrap.min.css" >

<link rel="stylesheet" href="css/login.css" >

<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css" >

</head>

<body>

<div class="container" ><!-- container Starts -->

<div class="alert alert-info">

<strong> Info </strong> Please enter your email address. You will receive a link to create a new password via email.

</div>

<form class="form-login" action="" method="post" ><!-- form-login Starts -->

<h2 class="form-login-heading" > Forgot Password </h2>

<input type="text" class="form-control" name="admin_email" placeholder="Email Address" required >

<button class="btn btn-lg btn-primary btn-block" type="submit" name="forgot_password" >

Submit

</button>

<h4 class="forgot-password">

<a href="login.php">

<i class="fa fa-arrow-left"></i> Back To Login Page

</a>

</h4>

</form><!-- form-login Ends -->

</div><!-- container Ends -->



</body>

</html>

<?php

if(isset($_POST['forgot_password'])){

$admin_email = mysqli_real_escape_string($con, $_POST['admin_email']);

$select_admin = "select * from admins where admin_email='$admin_email'";

$run_admin = mysqli_query($con, $select_admin);

$count_admin = mysqli_num_rows($run_admin);

if($count_admin == 0){

echo "

<script>

alert('Sorry, We Do Not Have Your Email Address In Admins Record.');

</script>

";
	
}else{

$row_admin = mysqli_fetch_array($run_admin);

$admin_name = $row_admin["admin_name"];

$hashed_admin_pass = $row_admin["admin_pass"];

$message = "

<img src='http://localhost/Ecom_store/images/email-logo.png' width='100'>

<h3> Someone has requested a password reset for the following admin account: </h3>

<h3> Site Url: www.computerfever.com </h3>

<h3> Email Address: $admin_email </h3>

<h3> Name: $admin_name </h3>

<h3> If this was a mistake, just ignore this email and nothing will happen. </h3>

<h3>

<a href='http://localhost/Ecom_store/admin_area/change_password.php?change_password=$hashed_admin_pass'>

To Reset/Change Your Password, Click Here

</a>

</h3>

";

$from = "sad.ahmed22224@gmail.com"; 

$subject = "!Important Computerfever Your Admin Password Reset";

$headers = "From: $from\r\n";

$headers .= "Content-type: text/html\r\n";

mail($admin_email,$subject,$message,$headers);

echo "

<script>

alert('Your Password Reset/Change Link Has Been Sent To Your Email,Please Check Your Inbox.');

window.open('login.php','_self');

</script>

";
	
}


}

?>