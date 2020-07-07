<?php


if(!isset($_SESSION['admin_email'])){

echo "<script>window.open('login.php','_self')</script>";

}

else {




?>

<?php

if(isset($_GET["edit_download"])){

$download_id = $_GET["edit_download"];

$select_download = "select * from downloads where download_id='$download_id'";

$run_download = mysqli_query($con,$select_download);

$row_download = mysqli_fetch_array($run_download);

$edit_product_id = $row_download["product_id"];

$edit_download_title = $row_download["download_title"];

$edit_download_file = $row_download["download_file"];
	
	
}

?>

<div class="row"><!-- 1 row Starts -->

<div class="col-lg-12"><!-- col-lg-12 Starts -->

<ol class="breadcrumb"><!-- breadcrumb Starts -->

<li class="active">

<i class="fa fa-dashboard"></i> Dashboard / Edit Download

</li>

</ol><!-- breadcrumb Ends -->

</div><!-- col-lg-12 Ends -->

</div><!-- 1 row Ends -->


<div class="row"><!-- 2 row Starts -->

<div class="col-lg-12"><!-- col-lg-12 Starts -->

<div class="panel panel-default"><!-- panel panel-default Starts -->

<div class="panel-heading"><!-- panel-heading Starts -->

<h3 class="panel-title"><!-- panel-title Starts -->

<i  class="fa fa-money fa-fw"></i> Edit Download

</h3><!-- panel-title Ends -->

</div><!-- panel-heading Ends -->

<div class="panel-body"><!-- panel-body Starts -->

<form class="form-horizontal" method="post" enctype="multipart/form-data"><!-- form-horizontal Starts -->

<div class="form-group"><!-- form-group Starts -->

<label class="col-md-3 control-label"> Download Title </label>

<div class="col-md-6">

<input type="text" name="download_title" class="form-control" value="<?php echo $edit_download_title; ?>" required>

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

if($product_id == $edit_product_id){

echo "<option value='$product_id' selected>$product_title</option>";
	
}else{

echo "<option value='$product_id'>$product_title</option>";

}
	
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

if($product_id == $edit_product_id){

echo "<option value='$product_id' selected>$product_title</option>";
	
}else{

echo "<option value='$product_id'>$product_title</option>";

}
	
}

?>

</optgroup>

</select>

</div>

</div><!-- form-group Ends -->

<div class="form-group"><!-- form-group Starts -->

<label class="col-md-3 control-label"> Download File </label>

<div class="col-md-6">

<input type="file" name="download_file" class="form-control">

<br> <strong><?php echo $edit_download_file; ?></strong>

</div>

</div><!-- form-group Ends -->

<div class="form-group"><!-- form-group Starts -->

<label class="col-md-3 control-label"> </label>

<div class="col-md-6">

<input type="submit" name="update" class="form-control btn btn-success" value="Update Download" required>

</div>

</div><!-- form-group Ends -->

</form><!-- form-horizontal Ends -->

</div><!-- panel-body Ends -->

</div><!-- panel panel-default Ends -->

</div><!-- col-lg-12 Ends -->

</div><!-- 2 row Ends -->

<?php

if(isset($_POST["update"])){
	
$download_title = mysqli_real_escape_string($con,$_POST["download_title"]);

$product_id = mysqli_real_escape_string($con,$_POST["product_id"]);

$download_file = $_FILES["download_file"]["name"];

$download_file_tmp = $_FILES["download_file"]["tmp_name"];

if(empty($download_file)){

$download_file = $edit_download_file;
	
}else{

move_uploaded_file($download_file_tmp, "downloads_uploads/$download_file");

}

$update_download = "update downloads set product_id='$product_id',download_title='$download_title',download_file='$download_file' where download_id='$download_id'";

$run_update_download = mysqli_query($con,$update_download);

if($run_update_download){

echo "

<script>

alert('Your Download Has Been Updated Successfully.');

window.open('index.php?view_downloads','_self');

</script>

";
	
}

}


?>

<?php } ?>