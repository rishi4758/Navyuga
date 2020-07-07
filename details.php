<?php

session_start();

include("includes/db.php");                       

include("functions/functions.php");                

?>

<?php


$product_id = $_GET['pro_id'];

$get_product = "select * from products where product_id='$product_id'";

$run_product = mysqli_query($con,$get_product);

$check_product = mysqli_num_rows($run_product);

if($check_product != 0){
$row_product = mysqli_fetch_array($run_product);

$p_cat_id = $row_product['p_cat_id'];

$pro_id = $row_product['product_id'];

$pro_title = $row_product['product_title'];

$pro_price = $row_product['product_price'];

$pro_desc = $row_product['product_desc'];

$pro_img1 = $row_product['product_img1'];

$pro_img2 = $row_product['product_img2'];

$pro_img3 = $row_product['product_img3']; 



$pro_psp_price = $row_product['product_psp_price'];

$pro_features = $row_product['product_features'];

$pro_video = $row_product['product_video'];

$pro_seo_desc = $row_product['product_seo_desc'];

$pro_keywords = $row_product['product_keywords'];





$status = $row_product['status'];

$pro_url = $row_product['product_url'];


$get_p_cat = "select * from product_categories where p_cat_id='$p_cat_id'";

$run_p_cat = mysqli_query($con,$get_p_cat);

$row_p_cat = mysqli_fetch_array($run_p_cat);

$p_cat_title = $row_p_cat['p_cat_title'];




?>

<!DOCTYPE html>
<html>

<head>

<title> <?php echo $pro_title; ?> </title>

<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" >
<meta name="description" content="<?php echo $pro_seo_desc; ?>" >
<meta name="keywords" content="<?php echo $pro_keywords; ?>" >


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
						<li><a href="shop.php">Shop</a></li>
						<li>
							<a href="shop.php?p_cat=<?php echo $p_cat_id; ?>"> <?php echo $p_cat_title; ?> </a>
						</li>
						<li> <?php echo $pro_title; ?> </li>
					</ul><!-- breadcrumb Ends -->
				</div><!--- col-md-12 Ends -->
			</div>

			<div class="row">
				<div class="col-md-12"><!-- col-md-12 Starts -->
					<div class="row" id="productMain"><!-- row Starts -->
						<div class="col-sm-6"><!-- col-sm-6 Starts -->
							<div id="mainImage"><!-- mainImage Starts -->
								<div id="myCarousel" class="carousel slide" data-ride="carousel">
									<ol class="carousel-indicators"><!-- carousel-indicators Starts -->
										<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
										<?php if(!empty($pro_img2)){ ?>
										<li data-target="#myCarousel" data-slide-to="1"></li>
										<?php } ?>
										<?php if(!empty($pro_img3)){ ?>
										<li data-target="#myCarousel" data-slide-to="2"></li>
										<?php } ?>
									</ol><!-- carousel-indicators Ends -->

									<div class="carousel-inner"><!-- carousel-inner Starts -->
										<div class="item active">
											<center>
												<img src="vendor/product_images/<?php echo $pro_img1; ?>" class="img-responsive">
											</center>
										</div>
										<?php if(!empty($pro_img2)){ ?>
										<div class="item">
											<center>
												<img src="vendor/product_images/<?php echo $pro_img2; ?>" class="img-responsive">
											</center>
										</div>
										<?php } ?>
										<?php if(!empty($pro_img3)){ ?>
										<div class="item">
											<center>
												<img src="vendor/product_images/<?php echo $pro_img3; ?>" class="img-responsive">
											</center>
										</div>
										<?php } ?>
									</div><!-- carousel-inner Ends -->

									<a href="#myCarousel" class="left carousel-control" data-slide="prev"><!-- left carousel-control Starts -->
										<span class="glyphicon glyphicon-chevron-left"> </span>
										<span class="sr-only"> Previous </span>
									</a><!-- left carousel-control Ends -->

									<a class="right carousel-control" href="#myCarousel" data-slide="next"><!-- right carousel-control Starts -->
										<span class="glyphicon glyphicon-chevron-right"> </span>
										<span class="sr-only"> Next </span>
									</a><!-- right carousel-control Ends -->
								</div>
							</div><!-- mainImage Ends -->

							<div class="row" id="thumbs" ><!-- thumb row Starts -->
								<div class="col-xs-4 col-sm-3" ><!-- col-xs-4 Starts -->
									<a href="#" class="thumb" >
										<img src="vendor/product_images/<?php echo $pro_img1; ?>" class="img-responsive" >
									</a>
								</div><!-- col-xs-4 Ends -->
								<?php if(!empty($pro_img2)){ ?>
							
								<div class="col-xs-4 col-sm-3"><!-- col-xs-4 Starts -->
									<a href="#" class="thumb" >
										<img src="vendor/product_images/<?php echo $pro_img2; ?>" class="img-responsive" >
									</a>
								</div><!-- col-xs-4 Ends -->

								<?php } ?>
								<?php if(!empty($pro_img3)){ ?>

								<div class="col-xs-4 col-sm-3"><!-- col-xs-4 Starts -->
									<a href="#" class="thumb" >
										<img src="vendor/product_images/<?php echo $pro_img3; ?>" class="img-responsive" >
									</a>
								</div><!-- col-xs-4 Ends -->
								<?php } ?>
							</div><!-- thumb row Ends -->

							
						</div><!-- col-sm-6 Ends -->

						<div class="col-sm-6" ><!-- col-sm-6 Starts -->
							<div class="box"><!-- box Starts -->
								<h1> <?php echo $pro_title; ?> </h1>
								<?php 
							if(isset($_POST['add_cart'])){

							$ip_add = getRealUserIp();

							$p_id = $pro_id;

							$product_qty = $_POST['product_qty'];

							$product_size = $_POST['product_size'];


							$check_product = "select * from cart where ip_add='$ip_add' AND p_id='$p_id'";

							$run_check = mysqli_query($con,$check_product);

							if(mysqli_num_rows($run_check)>0){

							echo "<script>alert('This Product is already added in cart')</script>";

							echo "<script>window.open('cart.php','_self')</script>";

							}
							else {

							$get_price = "select * from products where product_id='$p_id'";

							$run_price = mysqli_query($con,$get_price);

							$row_price = mysqli_fetch_array($run_price);

							$pro_price = $row_price['product_price'];

							$pro_psp_price = $row_price['product_psp_price'];

							$pro_label = $row_price['product_label'];

							if($pro_label == "Sale" or $pro_label == "Gift"){

							$product_price = $pro_psp_price;

							}
							else{

							$product_price = $pro_price;

							}

							$query = "insert into cart (p_id,ip_add,qty,p_price,size) values ('$p_id','$ip_add','$product_qty','$product_price','$product_size')";

							$run_query = mysqli_query($db,$query);

							echo "<script>window.open('cart.php','_self')</script>";

							}

							}


							?>

							<form action="" method="post" class="" ><!-- form-horizontal Starts -->

							

							<div class="form-group"><!-- form-group Starts -->
								<div class="row">
									<label class="col-md-5 control-label" >Product Quantity :</label>
									<div class="col-md-7" ><!-- col-md-7 Starts -->
										<select name="product_qty" class="form-control" required>
											<option value="">Select quantity</option>
											<option>1</option>
											<option>2</option>
											<option>3</option>
											<option>4</option>
											<option>5</option>
										</select>
									</div><!-- col-md-7 Ends -->
								</div>
							</div><!-- form-group Ends -->

						

							<div class="form-group" ><!-- form-group Starts -->
								<div class="row">
									<label class="col-md-5 control-label" >Product Size</label>
									<div class="col-md-7" ><!-- col-md-7 Starts -->
										<select name="product_size" class="form-control" required>
											<option value="">Select a Size</option>
											<option>Small</option>
											<option>Medium</option>
											<option>Large</option>
											<option>Extra Large</option>
										</select>
									</div><!-- col-md-7 Ends -->
								</div>
							</div><!-- form-group Ends -->
<p class='price'>

								<span>Price :</span>  <del> <i class='fa fa-inr'></i><?php echo"$pro_price ";?></del><br>

								<span>sale Price :</span> <i class='fa fa-inr'></i><?php echo"$pro_psp_price";?>

							</p>

							<center><!-- center Starts -->

								<?php

								$get_icons = "select * from icons where icon_product='$pro_id'";

								$run_icons = mysqli_query($con,$get_icons);

								while($row_icons = mysqli_fetch_array($run_icons)){

								$icon_image = $row_icons['icon_image'];

								echo "<img src='admin_area/icon_images/$icon_image' width='45' height='45' > &nbsp;&nbsp;&nbsp; ";
								}
								?>
							</center><!-- center Ends -->

															<p class="buttons" ><!-- text-center buttons Starts -->
									<button class="btn btn-primary" type="submit" name="add_cart">
										<i class="fa fa-shopping-cart" ></i> Add to Cart
									</button>
									<button class="btn btn-primary" type="submit" name="add_wishlist">
										<i class="fa fa-heart" ></i> Add to Wishlist
									</button>
									<?php

									if(isset($_POST['add_wishlist'])){

									if(!isset($_SESSION['customer_email'])){

									echo "<script>alert('You Must Login To Add Product In Wishlist')</script>";

									echo "<script>window.open('checkout.php','_self')</script>";

									}
									else{

									$customer_session = $_SESSION['customer_email'];

									$get_customer = "select * from customers where customer_email='$customer_session'";

									$run_customer = mysqli_query($con,$get_customer);

									$row_customer = mysqli_fetch_array($run_customer);

									$customer_id = $row_customer['customer_id']; 

									$select_wishlist = "select * from wishlist where customer_id='$customer_id' AND product_id='$pro_id'";

									$run_wishlist = mysqli_query($con,$select_wishlist);

									$check_wishlist = mysqli_num_rows($run_wishlist);

									if($check_wishlist == 1){

									echo "<script>alert('This Product Has Been already Added In Wishlist')</script>";

									echo "<script>window.open('$pro_url','_self')</script>";

									}
									else{

									$insert_wishlist = "insert into wishlist (customer_id,product_id) values ('$customer_id','$pro_id')";

									$run_wishlist = mysqli_query($con,$insert_wishlist);

									if($run_wishlist){

									echo "<script> alert('Product Has Inserted Into Wishlist') </script>";

									echo "<script>window.open('customer/my_account.php?my_wishlist','_self')</script>";

									}

									}

									}

									}

									?>
								</p><!-- text-center buttons Ends -->
							</form><!-- form-horizontal Ends -->
							</div><!-- box Ends -->

							
						</div><!-- col-sm-6 Ends -->
					</div><!-- row Ends -->

					<div class="box" id="details"><!-- box Starts -->
						<a class="btn btn-primary tab" style="" href="#description" data-toggle="tab"><!-- btn btn-primary tab Starts -->
							<?php
							if($status == "product"){
							echo "Product Description";
							}
							else{
							echo "Bundle Description";
							}
							?>
						</a><!-- btn btn-primary tab Ends -->
						<a class="btn btn-primary tab" style="" href="#features" data-toggle="tab"><!-- btn btn-primary tab Starts -->
							Features
						</a><!-- btn btn-primary tab Ends -->
						<a class="btn btn-primary tab" style="" href="#video" data-toggle="tab"><!-- btn btn-primary tab Starts -->
							Sounds and Videos
						</a><!-- btn btn-primary tab Ends -->

						<hr style="margin-top:0px;">

						<div class="tab-content"><!-- tab-content Starts -->
							<div id="description" class="tab-pane fade in active" style="margin-top:7px;" ><!-- description tab-pane fade in active Starts -->
								<?php echo $pro_desc; ?>
							</div><!-- description tab-pane fade in active Ends -->

							<div id="features" class="tab-pane fade in" style="margin-top:7px;" ><!-- features tab-pane fade in  Starts -->
								<?php echo $pro_features; ?>
							</div><!-- features tab-pane fade in  Ends -->

							<div id="video" class="tab-pane fade in" style="margin-top:7px;" ><!-- video tab-pane fade in Starts -->
								<?php echo $pro_video; ?>
							</div><!-- video tab-pane fade in  Ends -->
						</div><!-- tab-content Ends -->
					</div><!-- box Ends -->

					<div id="same-height-row" class="also_likewrap"><!-- row same-height-row Starts -->
						<div class="row">
							<?php
							if($status == "product"){
							?>
							<div class="col-sm-12"><!-- col-md-3 col-sm-6 Starts -->
								<div class="box same-height"><!-- box same-height headline Starts -->
									<h3 class="text-center"> You may also like these Products</h3>
								</div><!-- box same-height headline Ends -->
							</div><!-- col-md-3 col-sm-6 Ends -->

							<?php

							$get_products = "select * from products order by rand() LIMIT 0,3";

							$run_products = mysqli_query($con,$get_products); 

							while($row_products = mysqli_fetch_array($run_products)) {

							$pro_id = $row_products['product_id'];

							$pro_title = $row_products['product_title'];

							$pro_price = $row_products['product_price'];

							$pro_img1 = $row_products['product_img1'];

							

							$manufacturer_id = $row_products['manufacturer_id'];

							$get_manufacturer = "select * from manufacturers where manufacturer_id='$manufacturer_id'";

							$run_manufacturer = mysqli_query($db,$get_manufacturer);

							$row_manufacturer = mysqli_fetch_array($run_manufacturer);

							$manufacturer_name = $row_manufacturer['manufacturer_title'];

							$pro_psp_price = $row_products['product_psp_price'];

							$pro_url = $row_products['product_url'];


							

							$product_price = "<del> <i class='fa fa-inr'></i>$pro_price </del>";

							$product_psp_price = "| <i class='fa fa-inr'></i>$pro_psp_price";

							



							echo "

							<div class='col-md-3 col-xs-6 alsolike_product'>
								<div class='product' >
									<a href='$pro_id' class='item_img'>
										<img src='admin_area/product_images/$pro_img1' class='img-responsive' >
									</a>

									<div class='text' >
										<center>
											<p class='btn btn-primary'> $manufacturer_name </p>
										</center>
										<hr>
										<h3><a href='$pro_id' >$pro_title</a></h3>
										<div class='rating_wrap'>
											<p class='price' > $product_price $product_psp_price </p>
											<div class='ratings'>
												<i class='fa fa-star'></i>
												<i class='fa fa-star'></i>
												<i class='fa fa-star'></i>
												<i class='fa fa-star'></i>
												<i class='fa fa-star'></i>
											</div>
										</div>
										<p class='buttons' >
											<a href='$pro_id' class='btn btn-default' >View details</a>
											<a href='$pro_id' class='btn btn-primary'>
												<i class='fa fa-shopping-cart'></i> Add to cart
											</a>
										</p>
									</div>
									
								</div>
							</div>

							";


							}


							?>

							<?php }?>
							
						</div>
					</div><!-- row same-height-row Ends -->
				</div><!-- col-md-12 Ends -->
			</div>
		</div><!-- container Ends -->
	</div><!-- content Ends -->

	<?php
		include("includes/footer.php");
	?>


</body>
</html>

<?php } ?>
