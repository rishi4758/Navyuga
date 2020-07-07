<?php

if(!isset($_SESSION['admin_email'])){

echo "<script>window.open('login.php','_self')</script>";

}

else {

?>
<!DOCTYPE html>

<html>

<head>

<title> Insert Bundle </title>


<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'#product_desc,#product_features' });</script>

</head>

<body>

<div class="row"><!-- row Starts -->

<div class="col-lg-12"><!-- col-lg-12 Starts -->

<ol class="breadcrumb"><!-- breadcrumb Starts -->

<li class="active">

<i class="fa fa-dashboard"> </i> Dashboard / Insert Bundle

</li>

</ol><!-- breadcrumb Ends -->

</div><!-- col-lg-12 Ends -->

</div><!-- row Ends -->


<div class="row"><!-- 2 row Starts --> 

<div class="col-lg-12"><!-- col-lg-12 Starts -->

<div class="panel panel-default"><!-- panel panel-default Starts -->

<div class="panel-heading"><!-- panel-heading Starts -->

<h3 class="panel-title">

<i class="fa fa-money fa-fw"></i> Insert Bundle

</h3>

</div><!-- panel-heading Ends -->

<div class="panel-body"><!-- panel-body Starts -->

<form method="post" enctype="multipart/form-data"><!-- form-horizontal Starts -->

<div class="row"><!-- row Starts -->

<div class="col-md-9"><!-- col-md-9 Starts -->

<div class="form-group" ><!-- form-group Starts -->

<label class="control-label" > Bundle Title </label>

<input type="text" name="product_title" class="form-control" required >

</div><!-- form-group Ends -->

<div class="form-group" ><!-- form-group Starts -->

<label class="control-label" > Bundle Seo Description </label>

<textarea name="product_seo_description" class="form-control" maxlength="230" placeholder="Most search engines use a maximum of 230 chars for the description." ></textarea>

</div><!-- form-group Ends -->

<div class="form-group" ><!-- form-group Starts -->

<label class=" control-label" > Bundle Url </label>

<input type="text" name="product_url" class="form-control" required >

<br>

<p style="font-size:15px; font-weight:bold;">

Bundle Url Example : navy-blue-t-shirt

</p>

</div><!-- form-group Ends -->

<div class="form-group" ><!-- form-group Starts -->

<label class="control-label" > Bundle Tabs </label>


<ul class="nav nav-tabs"><!-- nav nav-tabs Starts -->

<li class="active">

<a data-toggle="tab" href="#description"> Bundle Description </a>

</li>

<li>

<a data-toggle="tab" href="#features"> Bundle Features </a>

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

<label class="control-label" > Bundle Weight <small> (kg) </small> </label>

<input type="text" name="product_weight" class="form-control" >

</div><!-- form-group Ends -->

<div class="form-group" ><!-- form-group Starts -->

<label class="control-label" > Bundle Price </label>


<input type="text" name="product_price" class="form-control" required >


</div><!-- form-group Ends -->

<div class="form-group" ><!-- form-group Starts -->

<label class="control-label" > Bundle Sale Price </label>


<input type="text" name="psp_price" class="form-control">


</div><!-- form-group Ends -->

</div><!-- col-md-9 Ends -->

<div class="col-md-3"><!-- Starts -->

<div class="form-group" ><!-- form-group Starts -->

<label class="control-label" > Select A Bundle Type </label>

<select class="form-control" name="product_type"><!-- select manufacturer Starts -->

<option value="physical_product"> (Physical Products Bundle) Simple Bundle </option>

<option value="digital_product"> (Digital Products Bundle) Downloadable Bundle  </option>

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

<label class="control-label" > Bundle Image 1 </label>

<input type="file" name="product_img1" class="form-control" required >

</div><!-- form-group Ends -->

<div class="form-group" ><!-- form-group Starts -->

<label class="control-label" > Bundle Image 2 </label>

<input type="file" name="product_img2" class="form-control" required >

</div><!-- form-group Ends -->

<div class="form-group" ><!-- form-group Starts -->

<label class="control-label" > Bundle Image 3 </label>

<input type="file" name="product_img3" class="form-control" required >

</div><!-- form-group Ends -->


<div class="form-group" ><!-- form-group Starts -->

<label class="control-label" > Bundle Keywords </label>

<input type="text" name="product_keywords" class="form-control" >

</div><!-- form-group Ends -->

<div class="form-group" ><!-- form-group Starts -->

<label class="control-label" > Bundle Label </label>

<input type="text" name="product_label" class="form-control">

</div><!-- form-group Ends -->

</div><!-- Ends -->

</div><!-- row Ends -->

<div class="form-group" ><!-- form-group Starts -->

<label class="control-label" ></label>

<input type="submit" name="submit" value="Insert Bundle" class="btn btn-primary form-control" >

</div><!-- form-group Ends -->

</form><!-- form-horizontal Ends -->

</div><!-- panel-body Ends -->

</div><!-- panel panel-default Ends -->

</div><!-- col-lg-12 Ends -->

</div><!-- 2 row Ends --> 




</body>

</html>

<?php

if(isset($_POST['submit'])){

$product_title = $_POST['product_title'];
$product_cat = $_POST['product_cat'];
$cat = $_POST['cat'];
$manufacturer_id = $_POST['manufacturer'];
$product_price = $_POST['product_price'];
$product_desc = $_POST['product_desc'];
$product_keywords = $_POST['product_keywords'];

$psp_price = $_POST['psp_price'];

$product_label = $_POST['product_label'];

$product_url = $_POST['product_url'];

$product_features = $_POST['product_features'];

$product_video = $_POST['product_video'];

$product_seo_description = $_POST['product_seo_description'];

$product_type = $_POST['product_type'];

$product_weight = $_POST['product_weight'];

$status = "bundle";

$product_img1 = $_FILES['product_img1']['name'];
$product_img2 = $_FILES['product_img2']['name'];
$product_img3 = $_FILES['product_img3']['name'];

$temp_name1 = $_FILES['product_img1']['tmp_name'];
$temp_name2 = $_FILES['product_img2']['tmp_name'];
$temp_name3 = $_FILES['product_img3']['tmp_name'];

move_uploaded_file($temp_name1,"product_images/$product_img1");
move_uploaded_file($temp_name2,"product_images/$product_img2");
move_uploaded_file($temp_name3,"product_images/$product_img3");

$insert_product = "insert into products (p_cat_id,cat_id,manufacturer_id,date,product_title,product_seo_desc	,product_url,product_img1,product_img2,product_img3,product_price,product_psp_price,product_desc,product_features,product_video,product_keywords,product_label,product_type,product_weight,status) values ('$product_cat','$cat','$manufacturer_id',NOW(),'$product_title','$product_seo_description','$product_url','$product_img1','$product_img2','$product_img3','$product_price','$psp_price','$product_desc','$product_features','$product_video','$product_keywords','$product_label','$product_type','$product_weight','$status')";

$run_product = mysqli_query($con,$insert_product);

if($run_product){

echo "<script>alert('Bundle has been inserted successfully')</script>";

echo "<script>window.open('index.php?view_bundles','_self')</script>";

}

}

?>

<?php } ?>
