




<?php

session_start();


include('includes/db.php');




?>


<!DOCTYPE HTML>

</html>


<head><title>
admin LOgin</title>

<link href="css/bootstrap.min.css" rel="stylesheet">

<link href="css/login.css "rel="stylesheet">

</head>


<body>
<div class="container"><!--container starts-->


<form class="form-login" action="" method="post"><!--form login starts-->

<h2 class="form-login-heading">admin login</h2>


<input type="text" class="form-control" name="admin_email" placeholder="Email Address" required>





<input type="password" class="form-control" name="admin_pass" placeholder="Password" required>



<button class="btn btn-lg btn-primary btn-block" type="submit" name="admin_login">
Login</button>
</form>


</div><!--container endss-->









</body>


</html>


<?php

if(isset($_POST['admin_login']))
{
	
	
	$admin_email=mysqli_real_escape_string($con,$_POST['admin_email']);
	
	$admin_pass=mysqli_real_escape_string($con,$_POST['admin_pass']);
	
	
	
	$get_admin="select * from admins where admin_email='$admin_email' AND admin_pass='$admin_pass'";
	
	
	$run_admin=mysqli_query($con,$get_admin);
	
	$count=mysqli_num_rows($run_admin);
	
	
	if($count==1){
		
		$_SESSION['admin_email']=$admin_email;
		
		echo"
		
		<script>alert('you are logged in into admin panel')</script>";
		
		
		
	echo"<script>window.open('index.php?dashboard','_self')</script>";}

else{
	
	
	echo"<script>alert('Email or password is wrong')</script>";
	
}}

?>