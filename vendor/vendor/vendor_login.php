




<?php



include('includes/db.php');




?>


<!DOCTYPE HTML>

</html>


<head><title>
Vendor Login</title>

<link href="css/bootstrap.min.css" rel="stylesheet">

<link href="css/login.css "rel="stylesheet">

</head>


<body>
<div class="container"><!--container starts-->


<form class="form-login" action="" method="post"><!--form login starts-->

<h2 class="form-login-heading">Vendor Login</h2>


<input type="text" class="form-control" name="vendor_email" placeholder="Email Address" required>





<input type="password" class="form-control" name="vendor_pass" placeholder="Password" required>



<button class="btn btn-lg btn-primary btn-block" type="submit" name="vendor_login">
Login</button>
</form>


</div><!--container endss-->









</body>


</html>


<?php

if(isset($_POST['vendor_login']))
{
	
	
	$admin_email=mysqli_real_escape_string($con,$_POST['vendor_email']);
	
	$admin_pass=mysqli_real_escape_string($con,$_POST['vendor_pass']);
	
	
	
	$get_admin="select * from vendors where vendor_email='$vendor_email' AND vendor_pass='$vendor_pass'";
	
	
	$run_admin=mysqli_query($con,$get_admin);
	
	$count=mysqli_num_rows($run_admin);
	
	
	if($count==1){
		
		$_SESSION['vendor_email']=$vendor_email;
		
		echo"
		
		<script>alert('you are logged in into vendor panel')</script>";
		
		
		
	echo"<script>window.open('index.php?dashboard','_self')</script>";}

else{
	
	
	echo"<script>alert('Email or password is wrong')</script>";
	
}}

?>