<?php
	session_start();
	include("includes/db.php");
	include("functions/functions.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>E-commerce Store</title>
	<link rel="stylesheet" href="styles/custom_style.css">
</head>

<body>
	<?php include("includes/header.php"); ?>
	<!--slider-section-start -->
	<section>
		<div id="slider"> 
			<div id="myCarousel"  class="carousel slide" data-ride="carousel" > <!-- carousel slide start -->
				<!-- carosel indicators start-->
				<!-- <ol class="carousel-indicators"> 
					<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
					<li data-target="#myCarousel" data-slide-to="1" ></li>
					<li data-target="#myCarousel" data-slide-to="2" ></li>
					<li data-target="#myCarousel" data-slide-to="3" ></li>
				</ol> -->

				<div class="carousel-inner"> <!-- carousel inner start-->
					<?php

					$get_slides= "select *from slider LIMIT 0,1";

					$run_slides= mysqli_query($con,$get_slides);

					while ($row_slides=mysqli_fetch_array($run_slides)) {

						# code...

						$slide_name= $row_slides['slide_name'];

						$slide_image= $row_slides['slide_image'];

						echo "

					<div class='item active'>

					<img src='admin_area/slides_images/$slide_image'>

					</div>

						";
					}

					?>
					<?php

					$get_slides= "select *from slider LIMIT 1,4 ";

					$run_slides= mysqli_query($con,$get_slides);

					while ($row_slides=mysqli_fetch_array($run_slides)) {
						# code...

						$slide_name= $row_slides['slide_name'];


						$slide_image= $row_slides['slide_image'];

					echo "

					<div class='item'>

					<img src='admin_area/slides_images/$slide_image' >

					</div>

					";

					}

					?>
				</div> <!-- carousel inner end-->
				<!-- Controls -->
			  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
			    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
			  </a>
			  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
			    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
			  </a>
			</div> <!-- carousel slide end -->
		</div>
	</section>
	<!--slider-section-End -->

	<!-- advantages Starts -->
	<div id="advantages" class="advantage_wrap">
		<div class="container"><!-- container Starts -->
			<div class="same-height-row row"><!-- same-height-row Starts -->
				<?php

					$get_boxes = "select * from boxes_section";

					$run_boxes = mysqli_query($con,$get_boxes);

					while($run_boxes_section=mysqli_fetch_array($run_boxes)){

					$box_id = $run_boxes_section['box_id'];

					$box_title = $run_boxes_section['box_title'];

					$box_desc = $run_boxes_section['box_desc'];
				?>

				<div class="col-sm-4 hidden-xs"><!-- col-sm-4 Starts -->
					<div class="box same-height"><!-- box same-height Starts -->
						<div class="icon">
							<img src="images/icon_user.png" alt="love customer">
						</div>
						<div class="box_content">
							<h3><a href="#"> <?php echo $box_title; ?> </a></h3>
							<p>
							<?php echo $box_desc; ?>
							</p>
						</div>
					</div><!-- box same-height Ends -->
				</div><!-- col-sm-4 Ends -->
				<?php } ?>
			</div><!-- same-height-row Ends -->
		</div><!-- container Ends -->
	</div>
	<!-- advantages Ends -->

	<!-- hot Starts -->
	<div id="hot">
		<div class="container"><!-- container Starts -->
			<div class="text-center">
				<h2 class="main_hed">Trendy <span>Clothing</span></h2>
				<p>Lorem ipsum dolor sit amet, consec adipiscing elit.</p>
			</div>
		</div><!-- container Ends -->
	</div>
	<!-- hot Ends -->
	
	
	
<?php
	
	
		
		
	
	global $db;
	if(isset($_GET['p_cat'])){
		$p_cat_id=$_GET['p_cat'];
		
		$get_p_cat = " select * from product_categories where p_cat_id='$p_cat_id' ";
	
$run_p_cat = mysqli_query($db,$get_p_cat);

$row_p_cat= mysqli_fetch_array($run_p_cat);

$p_cat_title=$row_p_cat['p_cat_title'];



$get_products= "select * from products where p_cat_id='$p_cat_id'";


 $run_products= mysqli_query($db,$get_products);


$count= mysqli_num_rows($run_products);

if($count==0){
	
	echo "
	
	<div class='box'>
	<h1> No Product Found In This Category</h1>
	
	</div>
	";

}
else{
	
	
echo"

<div class='box'>

<h1>$p_cat_title</h1>

</div>

";	
	
}?>
	
	<!-- product_lists Starts -->
	<section class="product_lists">
		<div id="content" class="container-fluid">	
				<div class="row flex-wrap"><!-- row Starts -->

<?php
while($row_products= mysqli_fetch_array($run_products)){
	
	
	
	$pro_id=$row_products['product_id'];
$pro_url=$row_products['product_url'];

$pro_title = $row_products['product_title'];




$pro_img1 = $row_products['product_img1'];

$product_price=$row_products['product_price'];

$product_psp_price=$row_products['product_psp_price'];




echo "

<div class='col-md-4 col-sm-6 single' >

<div class='product' >

<a href='$pro_url' class='item_img'>

<img src='admin_area/product_images/$pro_img1' class='img-responsive' >

</a>

<div class='text' >


<hr>

<h3><a href='$pro_url' >$pro_title</a></h3>

<div class='rating_wrap'>
	<p class='price' ><i class='fa fa-inr'> $product_price</i> </p>
	<div class='ratings'>
		<i class='fa fa-star'></i>
		<i class='fa fa-star'></i>
		<i class='fa fa-star'></i>
		<i class='fa fa-star'></i>
		<i class='fa fa-star'></i>
	</div>
</div>

<p class='buttons' >

<a href='$pro_url' class='btn btn-default' >View details</a>

<a href='$pro_url' class='btn btn-primary'>

<i class='fa fa-shopping-cart'></i> Add to cart

</a>


</p>






</div>



</div>

</div>


";

}?>

	</div><!-- row Ends -->
			</div>		
	</section>
	<!-- product_lists end1 -->

	
	<?php

	}	
	else{	
		
		
		?>
		

		
	<!-- product_lists Starts -->
	<section class="product_lists">
		<div id="content" class="container-fluid">	
				<div class="row flex-wrap"><!-- row Starts -->
				<?php
				getPro();
				?>
				</div><!-- row Ends -->
			</div>		
	</section>
	<!-- product_lists end1 -->

	<!--Offer-section-start-->
	<section class="ofer_wrap">
		<div class="container">
			<div>
				<a href="#"><img src="images/ofer_baner.png" alt="offers"></a>
			</div>
		</div>
	</section>
	<!--Offer-section end1-->
	<?php   }  ?>
	<!--footer-start-->
	<?php
		include("includes/footer.php");
	?>
	<!-- footer-Ends -->

</body>
</html>