<?php
include("includes/db.php");

if(!isset($_SESSION['admin_email'])){

echo "<script>window.open('login.php','_self')</script>";

}

else {





if(isset($_GET['view_details'])){

$v_id = $_GET['view_details'];


$get_p = "select * from v_pro where p_id='$v_id'";

$run_edit = mysqli_query($con,$get_p);

$row_edit = mysqli_fetch_array($run_edit);

$p_id = $row_edit['p_id'];

$p_title = $row_edit['p_title'];

$p_cat = $row_edit['p_cat'];

$vendor_id = $row_edit['vendor_id'];
$cat = $row_edit['cat'];
$manu = $row_edit['manufacturer'];


$p_desc = $row_edit['p_desc'];
$p_img1 = $row_edit['p_img1'];

$p_img2 = $row_edit['p_img2'];

$p_img3 = $row_edit['p_img3'];

$new_p_image1 = $row_edit['p_img1'];

$new_p_image2 = $row_edit['p_img2'];

$new_p_image3 = $row_edit['p_img3'];

$p_price = $row_edit['p_price'];

$p_desc = $row_edit['p_desc'];

$seo_desc = $row_edit['seo_desc'];
$p_keywords = $row_edit['p_keywords'];

$psp_price = $row_edit['psp_price'];


$p_url = $row_edit['p_url'];

$p_features = $row_edit['p_features'];

$p_video = $row_edit['p_video'];


$p_type = $row_edit['p_type'];



$status = $row_edit['status'];



}
?>

<!DOCTYPE html>
<html>

<head>

<title> <?php echo $p_title; ?> </title>

<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" >
<meta name="description" >
<meta name="keywords" content="<?php echo $pro_keywords; ?>" >


<link rel="stylesheet" href="styles/custom_style.css">

</head>

<body>


	<div id="content" ><!-- content Starts -->
		<div class="container" ><!-- container Starts -->
			

			<div class="row">
				<div class="col-md-12"><!-- col-md-12 Starts -->
					<div class="row" id="productMain"><!-- row Starts -->
						<div class="col-sm-6"><!-- col-sm-6 Starts -->
							<div id="mainImage"><!-- mainImage Starts -->
								<div id="myCarousel" class="carousel slide" data-ride="carousel">
									<ol class="carousel-indicators"><!-- carousel-indicators Starts -->
										<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
										<?php if(!empty($p_img2)){ ?>
										<li data-target="#myCarousel" data-slide-to="1"></li>
										<?php } ?>
										<?php if(!empty($p_img3)){ ?>
										<li data-target="#myCarousel" data-slide-to="2"></li>
										<?php } ?>
									</ol><!-- carousel-indicators Ends -->

									<div class="carousel-inner"><!-- carousel-inner Starts -->
										<div class="item active">
											<center>
												<img src="../vendor/product_images/<?php echo $p_img1; ?>" class="img-responsive">
											</center>
										</div>
										<?php if(!empty($p_img2)){ ?>
										<div class="item">
											<center>
												<img src="../vendor/product_images/<?php echo $p_img2; ?>" class="img-responsive">
											</center>
										</div>
										<?php } ?>
										<?php if(!empty($p_img3)){ ?>
										<div class="item">
											<center>
												<img src="../vendor/product_images/<?php echo $p_img3; ?>" class="img-responsive">
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

							
						</div><!-- col-sm-6 Ends -->

						<div class="col-sm-6" ><!-- col-sm-6 Starts -->
						
						<div class="row" id="thumbs" ><!-- thumb row Starts -->
								<div class="col-xs-4 col-sm-3" ><!-- col-xs-4 Starts -->
									<a href="#" class="thumb" >
										<img src="../vendor/product_images/<?php echo $p_img1; ?>" class="img-responsive" >
									</a>
								</div><!-- col-xs-4 Ends -->
								<?php if(!empty($p_img2)){ ?>
							
								<div class="col-xs-4 col-sm-3"><!-- col-xs-4 Starts -->
									<a href="#" class="thumb" >
										<img src="../vendor/product_images/<?php echo $p_img2; ?>" class="img-responsive" >
									</a>
								</div><!-- col-xs-4 Ends -->

								<?php } ?>
								<?php if(!empty($p_img3)){ ?>

								<div class="col-xs-4 col-sm-3"><!-- col-xs-4 Starts -->
									<a href="#" class="thumb" >
										<img src="../vendor/product_images/<?php echo $p_img3; ?>" class="img-responsive" >
									</a>
								</div><!-- col-xs-4 Ends -->
								<?php } ?>
							</div><!-- thumb row Ends -->

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
								<?php echo $p_desc; ?>
							</div><!-- description tab-pane fade in active Ends -->

							<div id="features" class="tab-pane fade in" style="margin-top:7px;" ><!-- features tab-pane fade in  Starts -->
								<?php echo $p_features; ?>
							</div><!-- features tab-pane fade in  Ends -->

							<div id="video" class="tab-pane fade in" style="margin-top:7px;" ><!-- video tab-pane fade in Starts -->
								<?php echo $p_video; ?>
							</div><!-- video tab-pane fade in  Ends -->
						</div><!-- tab-content Ends -->
					</div><!-- box Ends -->

							<div class="box"><!-- box Starts -->
								<h1> <?php echo $p_title; ?> </h1>
								
						
							

							

							

							<?php

							if($status == "product"){

							

							echo "

							<p class='price'>

								<span>Price :</span>  <del> <i class='fa fa-inr'></i>$p_price </del><br>

								<span>sale Price :</span> <i class='fa fa-inr'></i>$psp_price

							</p>

							";

							}
							

							?>
								<input type="submit" name="submit" value="Insert Product" class="btn btn-primary form-control" >
							</form><!-- form-horizontal Ends -->
							
							
									
									
							</div><!-- box Ends -->

							
						</div><!-- col-sm-6 Ends -->
					</div><!-- row Ends -->
					
																		
<?php

echo $p_cat;


if(isset($_POST['submit'])){
	
	
	echo $p_cat;

$prot_title =  $_POST['product_title'];


$vendor_session=$_SESSION['vendor_email'];

$get_customer="select * from vendors where vendor_email='$vendor_session'";

$run_customer= mysqli_query($con,$get_customer);


$row_customer=mysqli_fetch_array($run_customer);



$vendor_id=$row_customer['vendor_id'];









$product_cat =  $_POST['product_cat'];

$cat =$_POST['cat'];

$manu =$_POST['manufacturer'];

$product_price =  $_POST['product_price'];

$product_desc =  $_POST['product_desc'];

$seo_desc =  $_POST['product_seo_description'];

$product_keywords = $_POST['product_keywords'];

$psp_price =  $_POST['psp_price'];


$product_url =  $_POST['product_url'];

$product_features =  $_POST['product_features'];

$product_video =  $_POST['product_video'];



$product_type =  $_POST['product_type'];




$product_img1 = $_FILES['product_img1']['name'];
$product_img2 = $_FILES['product_img2']['name'];
$product_img3 = $_FILES['product_img3']['name'];

$temp_name1 = $_FILES['product_img1']['tmp_name'];
$temp_name2 = $_FILES['product_img2']['tmp_name'];
$temp_name3 = $_FILES['product_img3']['tmp_name'];

$allowed = array('jpeg','jpg','gif','png');

$product_img1_extension = pathinfo($product_img1, PATHINFO_EXTENSION);

$product_img2_extension = pathinfo($product_img2, PATHINFO_EXTENSION);

$product_img3_extension = pathinfo($product_img3, PATHINFO_EXTENSION);

if(!in_array($product_img1_extension,$allowed)){

echo "<script> alert('Your Product Image 1 File Extension Is Not Supported.'); </script>";

$product_img1 = "";

}else{

move_uploaded_file($temp_name1,"product_images/$product_img1");
	
}

if(!empty($product_img2)){
	
if(!in_array($product_img2_extension,$allowed)){

echo "<script> alert('Your Product Image 2 File Extension Is Not Supported.'); </script>";

$product_img2 = "";

}else{

move_uploaded_file($temp_name2,"product_images/$product_img2");
	
}
	
}

if(!empty($product_img3)){
	
if(!in_array($product_img3_extension,$allowed)){

echo "<script> alert('Your Product Image 3 File Extension Is Not Supported.'); </script>";

$product_img3 = "";

}else{

move_uploaded_file($temp_name3,"product_images/$product_img3");
	
}
	
}
$status = "product";

$insert_product = "insert into products (vendor_id,p_cat_id,cat_id,manufacturer_id,date,product_title,product_seo_desc,product_url,product_img1,product_img2,product_img3,product_price,product_psp_price,product_desc,product_features,product_video,product_keywords,product_type,status) values ('$vendor_id','$p_cat','$cat','$manu',NOW(),'$p_title','$seo_desc','$p_url','$p_img1','$p_img2','$p_img3','$p_price','$psp_price','$p_desc','$p_features','$p_video','$p_keywords','$p_type','$status')";


$run_vendor=mysqli_query($con,$insert_product);

if($run_vendor){
	
	echo" <script> alert('product updated')</script>";
	
	
	
}

else{echo" <script> alert('product  not update')</script>";}

}

}

?>
				
					
					

					
					

</body>
</html>
