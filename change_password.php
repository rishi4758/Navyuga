<?php

session_start();

include("includes/db.php");

include("functions/functions.php");

if(isset($_SESSION['customer_email'])){

echo "<script> window.open('checkout.php','_self'); </script>";	

}

if(!isset($_GET['change_password'])){

echo "<script> window.open('checkout.php','_self'); </script>";		
	
}else{
	
$hash_password = mysqli_real_escape_string($con, $_GET['change_password']);

$select_customer = "select * from customers where customer_pass='$hash_password'";

$run_customer = mysqli_query($con,$select_customer);

$row_customer = mysqli_fetch_array($run_customer);

$customer_name = $row_customer["customer_name"];

$count_customer = mysqli_num_rows($run_customer);

if($count_customer == 0){

echo "<script> window.open('checkout.php','_self'); </script>";	
	
}
	
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

	<!--header-Starts-->
	<header>
		<!-- top Starts -->
		<div id="top">
			<div class="container-fluid"><!-- container Starts -->
				<div class="offer">
					<a href="#" class="welcome_msg">
						<?php 
						if (!isset($_SESSION['customer_email'])) {
							# code...

							echo "Welcome to Computerfever !!";
						}
							
						else
						{

						echo "Welcome : " .$_SESSION['customer_email'] ."";

						}
						?>
					</a>
					<!-- <a href="#">
						Shopping Cart Total Price: <?php total_price(); ?>, Total Items  <?php items(); ?>
					</a> -->
				</div><!--offer Ends -->

				<div class="login_rightwrap">
					<ul class="menu list-inline"><!-- menu Starts -->
						<li>
							<?php
							if (!isset($_SESSION['customer_email'])) {
								# code...

								echo "<a href='checkout.php' ><i class='fa fa-user'></i></a>";
							}else{

								echo "<a href='customer/my_account.php?my_orders'><i class='fa fa-user'></i></a>";
								}
							?>
						</li>

						<li>  
							<a href="cart.php">
								<i class="fa fa-shopping-cart" aria-hidden="true"></i>
							</a>
						</li>

						<li class="login_link"> <!--login/logout page-->
							<?php 
							if (!isset($_SESSION['customer_email'])) {

								echo "<a href='checkout.php'> Login </a>";


								# code...
							}else

							{

							echo "<a href='logout.php'> Logout </a>";

							}

							?>
						</li> <!--login/logout page end-->
						<li class="register_link">
							<a href="customer_register.php">Register</a>
						</li>
					</ul><!-- menu Ends -->
				</div><!--login_rightwrap-Ends -->
			</div><!-- container Ends -->
		</div>
		<!-- top Ends -->

		<div class="nav_wrap_main" id="navbar"><!-- navbar navbar-default Starts -->
			<div class="container-fluid" ><!-- container Starts -->
				<div class="mobile_toggle">
					<span class="one"></span>
					<span class="two"></span>
					<span class="three"></span>
				</div>
				<div class="navbar-header"><!-- navbar-header Starts -->
					<a class="home" href="index.php" ><!--- navbar navbar-brand home Starts -->
						<img src="images/logo.png" alt="computerfever" class="hidden-xs">
						<img src="images/logo-small.png" alt="computerfever" class="visible-xs">
					</a><!--- navbar navbar-brand home Ends -->
				</div><!-- navbar-header Ends -->
				
				<div class="shop_categorydesktop">
					<div class="dropdown">
					  <button class="btn dropdown-toggle" type="button" id="category_dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
					    <span class="fa fa-bars"></span>
					    Shop By Category
					  </button>
					  <ul class="dropdown-menu" aria-labelledby="category_dropdown">
					    <li><a href="#">Men</a></li>
					    <li><a href="#">Women</a></li>
					    <li><a href="#">Accesories</a></li>
					    <li><a href="#">Electronics</a></li>
					  </ul>
					</div>
				</div>			
				<!-- collapse clearfix Starts -->
				<div class="clearfix" id="search">
					<form class="navbar-form" method="get" action="results.php"><!-- navbar-form Starts -->
						<div class="input-group"><!-- input-group Starts -->
							<input class="form-control" type="text" placeholder="search for a Product, Brand or Category" name="user_query" required>
							<span class="input-group-btn"> <!-- input-group-btn Starts -->
								<button type="submit" value="Search" name="search" class="btn">
									<i class="fa fa-search"></i>
								</button>
							</span> <!--input-group-btn end-->
						</div><!-- input-group Ends -->
					</form><!-- navbar-form Ends -->
				</div>
				<!-- collapse clearfix Ends --> 
				<div class="nav_wrap" id="navigation" ><!-- navbar-collapse collapse Starts -->
					<ul class="list-inline">
						<li>  
							<a href="cart.php">
								<i class="fa fa-shopping-cart" aria-hidden="true"></i>
							</a>
						</li>
						<li>
							<?php
							if (!isset($_SESSION['customer_email'])) {
								# code...
								echo "<a href='checkout.php' ><i class='fa fa-user'></i></a>";
							}else{
								echo "<a href='customer/my_account.php?my_orders'><i class='fa fa-user'></i></a>";
								}
							?>
						</li>
					</ul>

					<!-- btn btn-primary navbar-btn right Starts -->
					<!-- <a class="btn btn-primary navbar-btn right" href="cart.php">
						<i class="fa fa-shopping-cart"></i>
						<span> <?php items(); ?> items in cart </span>
					</a> -->
					<!-- btn btn-primary navbar-btn right Ends -->

					<!-- navbar-collapse collapse right Starts -->
					<!-- <div class="navbar-collapse collapse right">
						<button class="btn navbar-btn btn-primary" type="button" data-toggle="collapse" data-target="#search">
							<span class="sr-only">Toggle Search</span>
							<i class="fa fa-search"></i>
						</button>
					</div> -->
					<!-- navbar-collapse collapse right Ends -->
				</div><!-- navbar-collapse collapse Ends -->
				<div class="Shopcategory_mobile">
					<div class="user_section">
						<span class="user_pic">
							<img src="images/user_pic.png" alt="user">
						</span>
						<span class="user_name">
							John Deo
						</span>
					</div>
					<ul class="cat_listmobile">
						<li class="parent_nav">
							<a href="index.php">Appliances</a>
							<span></span>
							<ul>
								<li>
									<a href="#">subnav1</a>
								</li>
								<li><a href="#">subnav2</a></li>
								<li><a href="#">subnav3</a></li>
								<li><a href="#">subnav4</a></li>
							</ul>
						</li>
						<li class="parent_nav">
							<a href="#">Men's Fashion</a>
							<span></span>
							<ul>
								<li><a href="#">subnav1</a></li>
								<li><a href="#">subnav2</a></li>
								<li><a href="#">subnav3</a></li>
								<li><a href="#">subnav4</a></li>
							</ul>
						</li>
						<li class="parent_nav">
							<a href="#">Women's Fashion</a>
							<span></span>
							<ul>
								<li><a href="#">subnav1</a></li>
								<li><a href="#">subnav2</a></li>
								<li><a href="#">subnav3</a></li>
								<li><a href="#">subnav4</a></li>
							</ul>
						</li>
						<li class="parent_nav">  
							<a href="#">Home & Kitchen</a>
							<span></span>
							<ul>
								<li><a href="#">subnav1</a></li>
								<li><a href="#">subnav2</a></li>
								<li><a href="#">subnav3</a></li>
								<li><a href="#">subnav4</a></li>
							</ul>
						</li>
						<li class="parent_nav">
							<a href="#">Mobile and Tablets</a>
							<span></span>
							<ul>
								<li><a href="#">subnav1</a></li>
								<li><a href="#">subnav2</a></li>
								<li><a href="#">subnav3</a></li>
								<li><a href="#">subnav4</a></li>
							</ul>
						</li>
					</ul>
				</div>
			</div><!-- container Ends -->
		</div><!-- navbar navbar-default Ends -->
	</header>
	<!--header-End-->


<div id="content" ><!-- content Starts -->
<div class="container" ><!-- container Starts -->

<div class="col-md-12" ><!--- col-md-12 Starts -->

<ul class="breadcrumb" ><!-- breadcrumb Starts -->

<li>
<a href="index.php">Home</a>
</li>

<li> Reset/Change Password </li>

</ul><!-- breadcrumb Ends -->



</div><!--- col-md-12 Ends -->


<div class="col-md-12" ><!-- col-md-12 Starts -->

<div class="box"><!-- box Starts -->

<div class="box-header"><!-- box-header Starts -->

<center>

<h3> Dear <?php echo $customer_name; ?>, Reset/Change Password </h3>

</center>

</div><!-- box-header Ends -->

<div align="center"><!-- center div Starts -->

<form action="" method="post"><!-- form Starts -->

<div class="form-group"><!-- form-group Starts -->

<input type="password" class="form-control" name="customer_pass" placeholder="New Password" required>

</div><!-- form-group Ends -->

<div class="form-group"><!-- form-group Starts -->

<input type="password" class="form-control" name="confirm_customer_pass" placeholder="Confirm New Password" required>

</div><!-- form-group Ends -->

<div class="form-group"><!-- form-group Starts -->

<input type="submit" class="btn btn-primary" name="reset_password" value="Reset Password" >

</div><!-- form-group Ends -->

</form><!-- form Ends -->

</div><!-- center div Ends -->

</div><!-- box Ends -->

</div><!-- col-md-12 Ends -->


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

if(isset($_POST['reset_password'])){

$hash_password = mysqli_real_escape_string($con, $_GET['change_password']);

$customer_pass = mysqli_real_escape_string($con, $_POST['customer_pass']);

$confirm_customer_pass = mysqli_real_escape_string($con, $_POST['confirm_customer_pass']);

if($customer_pass != $confirm_customer_pass){

echo "<script> alert('Your New Password Does Not Match, Please Try Again.'); </script>";
	
}else{

$encrypted_password = password_hash($confirm_customer_pass, PASSWORD_DEFAULT);

$update_customer_password = "update customers set customer_pass='$encrypted_password' where customer_pass='$hash_password'";

$run_update_customer_password = mysqli_query($con, $update_customer_password);

if($run_update_customer_password){

echo "

<script>

alert('Your Password Has Been Successfully Changed.');

window.open('checkout.php','_self');

</script>

";
	
}
	
}

}

?>

