<?php


if(!isset($_SESSION['admin_email'])){

echo "<script>window.open('login.php','_self')</script>";

}

else {




?>

<div class="row"><!-- 1 row Starts -->

<div class="col-lg-12"><!-- col-lg-12 Starts -->

<ol class="breadcrumb"><!-- breadcrumb Starts -->

<li class="active">

<i class="fa fa-dashboard"></i> Dashboard / Insert Download

</li>

</ol><!-- breadcrumb Ends -->

</div><!-- col-lg-12 Ends -->

</div><!-- 1 row Ends -->


<div class="row"><!-- 2 row Starts -->

<div class="col-lg-12"><!-- col-lg-12 Starts -->

<div class="panel panel-default"><!-- panel panel-default Starts -->

<div class="panel-heading"><!-- panel-heading Starts -->

<h3 class="panel-title"><!-- panel-title Starts -->

<i  class="fa fa-money fa-fw"></i> Insert Download

</h3><!-- panel-title Ends -->

</div><!-- panel-heading Ends -->

<div class="panel-body"><!-- panel-body Starts -->

<form class="form-horizontal" method="post" enctype="multipart/form-data"><!-- form-horizontal Starts -->

<div class="form-group"><!-- form-group Starts -->

<label class="col-md-3 control-label"> Download Title </label>

<div class="col-md-6">

<input type="text" name="download_title" class="form-control" required>

</div>

</div><!-- form-group Ends -->

<div class="form-group"><!-- form-group Starts -->

<label class="col-md-3 control-label"> Select A Product/Bundle </label>

<div class="col-md-6">

<select name="product_id" class="form-control" required>

<optgroup label="Select Product">

<?php

$select_products = "select * from products where product_type='digital_product' and status='product'";

$run_products = mysqli_query($con,$select_products);

while($row_products = mysqli_fetch_array($run_products)){

$product_id = $row_products["product_id"];

$product_title = $row_products["product_title"];

echo "<option value='$product_id'>$product_title</option>";
	
}

?>

</optgroup>

<optgroup label="Select Bundle">

<?php

$select_bundles = "select * from products where product_type='digital_product' and status='bundle'";

$run_bundles = mysqli_query($con,$select_bundles);

while($row_bundles = mysqli_fetch_array($run_bundles)){

$product_id = $row_bundles["product_id"];

$product_title = $row_bundles["product_title"];

echo "<option value='$product_id'>$product_title</option>";
	
}

?>

</optgroup>

</select>

</div>

</div><!-- form-group Ends -->

<div class="form-group"><!-- form-group Starts -->

<label class="col-md-3 control-label"> Download File </label>

<div class="col-md-6">

<input type="file" name="download_file" class="form-control" required>

</div>

</div><!-- form-group Ends -->

<div class="form-group"><!-- form-group Starts -->

<label class="col-md-3 control-label"> </label>

<div class="col-md-6">

<input type="submit" name="submit" class="form-control btn btn-success" value="Insert Download" required>

</div>

</div><!-- form-group Ends -->

</form><!-- form-horizontal Ends -->

</div><!-- panel-body Ends -->

</div><!-- panel panel-default Ends -->

</div><!-- col-lg-12 Ends -->

</div><!-- 2 row Ends -->

<?php

if(isset($_POST["submit"])){
	
$download_title = mysqli_real_escape_string($con,$_POST["download_title"]);

$product_id = mysqli_real_escape_string($con,$_POST["product_id"]);

$download_file = $_FILES["download_file"]["name"];

$download_file_tmp = $_FILES["download_file"]["tmp_name"];

move_uploaded_file($download_file_tmp, "downloads_uploads/$download_file");

$insert_download = "insert into downloads (product_id,download_title,download_file) values ('$product_id','$download_title','$download_file')";

$run_insert_download = mysqli_query($con,$insert_download);

if($run_insert_download){

echo "

<script>

alert('New Download Has Been Inserted Successfully.');

window.open('index.php?view_downloads','_self');

</script>

";
	
}
	
}


?>

<?php } ?>