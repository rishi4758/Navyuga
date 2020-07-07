

	 	  
	<style>
p.detail {color:black;font-weight:bold;font-family:algerian;font-size:35px; }
span.name {color:white; font-weight:bold;font-family:algerian;font-size:35px;}

</style>

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

							echo "Welcome to navyuga !!";
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

								echo "<a href='../checkout.php' ><i class='fa fa-user'></i></a>";
							}else{

								echo "<a href='my_account.php?my_orders'><i class='fa fa-user'></i></a>";
								}
							?>
						</li>

						<li>  
							<a href="../cart.php">
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
							<a href="../index.php">Register</a>
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
					<a class="home" href="../index.php" ><!--- navbar navbar-brand home Starts -->
						<img src="../images/logo4.png" alt="navyuga" class="hidden-xs">
						
<p class="detail visible-xs">NAV<span class="name visible-xs">YUGA</span> </p>
					</a><!--- navbar navbar-brand home Ends -->
				</div><!-- navbar-header Ends -->
				
				
				
	
	
	
	
	
	
	<div class='shop_categorydesktop'>
					<div class='dropdown'>
					  <button class='btn dropdown-toggle' type='button' id="category_dropdown"  data-toggle="dropdown" aria-haspopup='true' aria-expanded='true'>
					    <span class='fa fa-bars'></span>
					    Shop By Category
					  </button>
					  <ul class="dropdown-menu"aria-labelledby="category_dropdown">
					  
					  <?php
				
				$get_cat = "select * from product_categories";

$run_cat = mysqli_query($db,$get_cat);

while($row_cat=mysqli_fetch_array($run_cat))
{
$p_cat_id=$row_cat['p_cat_id'];

$p_cat_title=$row_cat['p_cat_title'];	?>

 <li><a href="shop.php?p_cat=p_cat_id"><?php echo" $p_cat_title ";?></a></li>


<?php } ?>					
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
							<a href="../cart.php">
								<i class="fa fa-shopping-cart" aria-hidden="true"></i>
							</a>
						</li>
						<li>
							<?php
							if (!isset($_SESSION['customer_email'])) {
								# code...
								echo "<a href='checkout.php' ><i class='fa fa-user'></i></a>";
							}else{
								echo "<a href='my_account.php?my_orders'><i class='fa fa-user'></i></a>";
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
					<?php if(!isset($_SESSION['customer_email'])){
  
echo"
<div class='Shopcategory_mobile'>
					<div class='user_section'>
						<span class='user_pic'>
							<a href='../checkout.php'><img src='images/user_pic.png' alt='user'></a>
						</span>
						<a  href='../checkout.php'><span class='user_name'>
							Offline
						</span></a>
					</div>";

  }else { 
  
  $q=$_SESSION['customer_email'];
 $get="select * from customers where customer_email='$q'";
  
  $run_get=mysqli_query($con,$get);
  
  $row_get=mysqli_fetch_array($run_get);
   $name=$row_get['customer_name'];
  $customer_image=$row_get['customer_image'];
  ?>	
  <div class="user_section">
						<span class="user_pic">
					<?php echo " 
<a href='my_account.php'><img src='customer_images/$customer_image' class='img-responsive'></a>
		";?>
						</span>
						<a href="my_account.php"><span class="user_name">
						<?php	echo" '$name'";?>
						</span></a>
					</div>
    <?php  } ?>
				
<ul class="cat_listmobile">
						<li class="parent_nav">
							  
					  <?php
			$get_cat = "select * from product_categories";

$run_cat = mysqli_query($db,$get_cat);

while($row_cat=mysqli_fetch_array($run_cat))
{
$p_cat_id=$row_cat['p_cat_id'];

$p_cat_title=$row_cat['p_cat_title'];	

 echo"
 <li><a href='../index.php?p_cat=$p_cat_id '>$p_cat_title</li>";


} ?>			



<center><li><a href="my_account.php" class="btn btn-success">my_account</a></li></center>

	<li class="login_link"> <!--login/logout page-->
							<?php 
							if (!isset($_SESSION['customer_email'])) {

								echo "<a href='../checkout.php' class='btn btn-primary  btn btn-block'> Login </a>";


								# code...
							}else

							{

							echo "<a href='logout.php' class='btn btn-primary btn btn-block'> Logout </a>";

							}

							?>
						</li> <!--login/logout page end-->

					</ul>
				</div>
				
				
			</div><!-- container Ends -->
		</div><!-- navbar navbar-default Ends -->
	</header>
	<!--header-End-->


