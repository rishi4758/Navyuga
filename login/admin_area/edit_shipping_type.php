<?php


if(!isset($_SESSION['admin_email'])){

echo "<script>window.open('login.php','_self')</script>";

}

else {

if(isset($_GET['edit_shipping_type'])){

$edit_type_id = $_GET['edit_shipping_type'];

$get_shipping_type = "select * from shipping_types where type_id='$edit_type_id'";

$run_shipping_type = mysqli_query($con, $get_shipping_type);

$row_shipping_type = mysqli_fetch_array($run_shipping_type);

$type_name = $row_shipping_type['type_name'];

$type_default = $row_shipping_type['type_default'];

$type_local = $row_shipping_type['type_local'];
	
	
}

?>


<div class="row"><!-- 1 row Starts -->

<div class="col-lg-12"><!-- col-lg-12 Starts -->

<ol class="breadcrumb"><!-- breadcrumb Starts -->

<li class="active">

<i class="fa fa-dashboard"></i> Dashboard / Edit Shipping Type

</li>

</ol><!-- breadcrumb Ends -->

</div><!-- col-lg-12 Ends -->


</div><!-- 1 row Ends -->

<div class="row"><!-- 2 row Starts -->

<div class="col-lg-12"><!-- col-lg-12 Starts -->

<div class="panel panel-default"><!-- panel panel-default Starts -->

<div class="panel-heading"><!-- panel-heading Starts -->

<h3 class="panel-title">

<i class="fa fa-money fa-fw"></i> Edit Shipping Type

</h3>

</div><!-- panel-heading Ends -->

<div class="panel-body"><!-- panel-body Starts -->

<form class="form-horizontal" method="post"><!-- form-horizontal Starts -->

<div class="form-group"><!-- form-group Starts -->

<label class="col-md-3 control-label"> Type Name </label>

<div class="col-md-7">

<input type="text" name="type_name" class="form-control" value="<?php echo $type_name; ?>" required>

</div>

</div><!-- form-group Ends -->

<div class="form-group"><!-- form-group Starts -->

<label class="col-md-3 control-label"> Type Default </label>

<div class="col-md-7">

<label>

<input type="radio" name="type_default" value="yes" required 

<?php if($type_default == "yes"){ echo "checked"; } ?>

> Yes

</label>

<label>

<input type="radio" name="type_default" value="no" required

<?php if($type_default == "no"){ echo "checked"; } ?>

> No

</label>

</div>

</div><!-- form-group Ends -->

<div class="form-group"><!-- form-group Starts -->

<label class="col-md-3 control-label"> </label>

<div class="col-md-7">

<input type="submit" name="update" value="Update Shipping Type" class="form-control btn btn-success">

</div>

</div><!-- form-group Ends -->

</form><!-- form-horizontal Ends -->

</div><!-- panel-body Ends -->

</div><!-- panel panel-default Ends -->


</div><!-- col-lg-12 Ends -->

</div><!-- 2 row Ends -->

<?php

if(isset($_POST['update'])){
	
$type_name = mysqli_real_escape_string($con, $_POST['type_name']);

$type_default = mysqli_real_escape_string($con, $_POST['type_default']);

if($type_default == "yes"){
	
$update_type_deafult = "update shipping_types set type_default='no' where type_local='$type_local'";

$run_update_type_deafult = mysqli_query($con, $update_type_deafult);
	
}

$update_shipping_type = "update shipping_types set type_name='$type_name',type_default='$type_default' where type_id='$edit_type_id'";

$run_update_shipping_type = mysqli_query($con, $update_shipping_type);

if($run_update_shipping_type){
	
echo "

<script>

alert('Your Shipping Type Has Been Updated Successfully.');

window.open('index.php?view_shipping_types', '_self');

</script>

";
	
}
	
}


?>


<?php } ?>