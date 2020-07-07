<?php
  include('includes/db.php');
if(!isset($_SESSION['vendor_email'])){

echo "<script>window.open('vendor_login.php','_self')</script>";

}

else {

?>
<!DOCTYPE html>

<html>

<head>

<title> Insert Products </title>


<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'#product_desc,#product_features' });</script>

</head>

<body>

<div class="row"><!-- row Starts -->

<div class="col-lg-12"><!-- col-lg-12 Starts -->

<ol class="breadcrumb"><!-- breadcrumb Starts -->

<li class="active">

<i class="fa fa-dashboard"> </i> Dashboard / Insert Products

</li>

</ol><!-- breadcrumb Ends -->

</div><!-- col-lg-12 Ends -->

</div><!-- row Ends -->


<div class="row"><!-- 2 row Starts --> 

<div class="col-lg-12"><!-- col-lg-12 Starts -->

<div class="panel panel-default"><!-- panel panel-default Starts -->

<div class="panel-heading"><!-- panel-heading Starts -->

<h3 class="panel-title">

<i class="fa fa-money fa-fw"></i> Insert Products

</h3>

</div><!-- panel-heading Ends -->

<div class="panel-body"><!-- panel-body Starts -->

<form method="post" enctype="multipart/form-data"><!-- form-horizontal Starts -->

<div class="row"><!-- row Starts -->

<div class="col-md-9"><!-- col-md-9 Starts -->

<div class="form-group" ><!-- form-group Starts -->

<label class="control-label" > Product Title </label>

<input type="text" name="product_title" class="form-control" required >



</div><!-- form-group Ends -->

<div class="form-group" ><!-- form-group Starts -->

<label class="control-label" > Product Seo Description </label>

<textarea name="product_seo_description" class="form-control" maxlength="230" placeholder="Most search engines use a maximum of 230 chars for the description." ></textarea>

</div><!-- form-group Ends -->

<div class="form-group" ><!-- form-group Starts -->

<label class="control-label" > Product Url </label>

<input type="text" name="product_url" class="form-control" required >

<br>

<p style="font-size:15px; font-weight:bold;">

Product Url Example : navy-blue-t-shirt

</p>



</div><!-- form-group Ends -->

<div class="form-group" ><!-- form-group Starts -->

<label class="control-label" > Product Tabs </label>

<ul class="nav nav-tabs"><!-- nav nav-tabs Starts -->

<li class="active">

<a data-toggle="tab" href="#description"> Product Description </a>

</li>

<li>

<a data-toggle="tab" href="#features"> Product Features </a>

</li>

<li>

<a data-toggle="tab" href="#video"> Sounds And Videos </a>

</li>

</ul><!-- nav nav-tabs Ends -->

<div class="tab-content"><!-- tab-content Starts -->

<div id="description" class="tab-pane fade in active"><!-- description tab-pane fade in active Starts -->

<br>

<textarea name="product_desc" class="form-control" rows="15" id="product_desc">


</textarea>

</div><!-- description tab-pane fade in active Ends -->


<div id="features" class="tab-pane fade in"><!-- features tab-pane fade in Starts -->

<br>

<textarea name="product_features" class="form-control" rows="15" id="product_features">


</textarea>

</div><!-- features tab-pane fade in Ends -->


<div id="video" class="tab-pane fade in"><!-- video tab-pane fade in Starts -->

<br>

<textarea name="product_video" class="form-control" rows="15">


</textarea>

</div><!-- video tab-pane fade in Ends -->


</div><!-- tab-content Ends -->

</div><!-- form-group Ends -->

<div class="form-group" ><!-- form-group Starts -->

<label class="control-label" > Product Price </label>



<input type="text" name="product_price" class="form-control" required >

</div><!-- form-group Ends -->

<div class="form-group" ><!-- form-group Starts -->

<label class="control-label" > Product Sale Price </label>

<input type="text" name="psp_price" class="form-control">

</div><!-- form-group Ends -->

</div><!-- col-md-9 Ends -->

<div class="col-md-3"><!-- col-md-3 Starts -->


<div class="form-group" ><!-- form-group Starts -->

<label class="control-label" > Select A Product Type </label>

<select class="form-control" name="product_type"><!-- select manufacturer Starts -->

<option value="physical_product"> (Physical Product) Simple Product </option>

<option value="digital_product"> (Digital Product) Downloadable Product  </option>

</select><!-- select manufacturer Ends -->

</div><!-- form-group Ends -->

<div class="form-group" ><!-- form-group Starts -->

<label class="control-label" > Select A Manufacturer </label>

<select class="form-control" name="manufacturer"><!-- select manufacturer Starts -->

<option> Select A Manufacturer </option>

<?php

$get_manufacturer = "select * from manufacturers";
$run_manufacturer = mysqli_query($con,$get_manufacturer);
while($row_manufacturer= mysqli_fetch_array($run_manufacturer)){
$manufacturer_id = $row_manufacturer['manufacturer_id'];
$manufacturer_title = $row_manufacturer['manufacturer_title'];

echo "<option value='$manufacturer_id'>
$manufacturer_title
</option>";

}

?>

</select><!-- select manufacturer Ends -->

</div><!-- form-group Ends -->


<div class="form-group" ><!-- form-group Starts -->

<label class="control-label" > Product Category </label>

<select name="product_cat" class="form-control" >

<option> Select  a Product Category </option>


<?php

$get_p_cats = "select * from product_categories";

$run_p_cats = mysqli_query($con,$get_p_cats);

while ($row_p_cats=mysqli_fetch_array($run_p_cats)) {

$p_cat_id = $row_p_cats['p_cat_id'];

$p_cat_title = $row_p_cats['p_cat_title'];

echo "<option value='$p_cat_id' >$p_cat_title</option>";

}


?>


</select>

</div><!-- form-group Ends -->

<div class="form-group" ><!-- form-group Starts -->

<label class="control-label" > Category </label>

<select name="cat" class="form-control" >

<option> Select a Category </option>

<?php

$get_cat = "select * from categories ";

$run_cat = mysqli_query($con,$get_cat);

while ($row_cat=mysqli_fetch_array($run_cat)) {

$cat_id = $row_cat['cat_id'];

$cat_title = $row_cat['cat_title'];

echo "<option value='$cat_id'>$cat_title</option>";

}

?>


</select>

</div><!-- form-group Ends -->

<div class="form-group" ><!-- form-group Starts -->

<label class="control-label" > Product Image 1 </label>

<input type="file" name="product_img1" class="form-control" required >

</div><!-- form-group Ends -->

<div class="form-group" ><!-- form-group Starts -->

<label class="control-label" > Product Image 2 </label>


<input type="file" name="product_img2" class="form-control">

</div><!-- form-group Ends -->

<div class="form-group" ><!-- form-group Starts -->

<label class="control-label" > Product Image 3 </label>

<input type="file" name="product_img3" class="form-control">

</div><!-- form-group Ends -->



<div class="form-group" ><!-- form-group Starts -->

<label class="control-label" > Product Keywords </label>

<input type="text" name="product_keywords" class="form-control">

</div><!-- form-group Ends -->



</div><!-- col-md-3 Ends -->


</div><!-- row Ends -->

<div class="form-group" ><!-- form-group Starts -->

<label class="control-label" ></label>

<input type="submit" name="submit" value="Insert Product" class="btn btn-primary form-control" >

</div><!-- form-group Ends -->

</form><!-- form-horizontal Ends -->

</div><!-- panel-body Ends -->

</div><!-- panel panel-default Ends -->

</div><!-- col-lg-12 Ends -->

</div><!-- 2 row Ends --> 

<?php
$email=$_SESSION['vendor_email'];


$get_vendor= "select * from vendors where vendor_email='$email'";


$run_vendor=mysqli_query($con,$get_vendor);


$row_vendor=mysqli_fetch_array($run_vendor);


$vendor_id=$row_vendor['vendor_id'];
echo "$vendor_id";
?>



</body>

</html>
<?php











if(isset($_POST['submit'])){

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

$insert_vendor  =  "insert into  v_pro  (p_title,vendor_id,p_cat,cat,manufacturer,date,p_price,p_desc,seo_desc,p_keywords,psp_price,p_url,p_features,p_video,p_type,p_img1,p_img2,p_img3,status) values('$prot_title','$vendor_id','$product_cat','$cat','$manu',NOW(),'$product_price','$product_desc','$seo_desc','$product_keywords','$psp_price ','
$product_url ','$product_features','$product_video','$product_type','$product_img1','$product_img2','$product_img3','$status')";


$run_vendor=mysqli_query($con,$insert_vendor);

if($run_vendor){
	
	echo" <script> alert('product updated')</script>";
	
	
	
}

else{echo" <script> alert('product  not update')</script>";}

}

}




















  ?>