
<?php


if(!isset($_SESSION['vendor_email'])){

echo "<script>window.open('vendor_login.php','_self')</script>";

}

else {

$admin_email = $_SESSION['vendor_email'];

$select_admin = "select * from vendors where vendor_email='$admin_email'";

$run_admin = mysqli_query($con,$select_admin);

$row_admin = mysqli_fetch_array($run_admin);

$admin_id = $row_admin["vendor_id"];


$admin_name = $row_admin['vendor_name'];

$admin_email = $row_admin['vendor_email'];

$admin_pass = $row_admin['vendor_pass'];

$admin_image = $row_admin['vendor_image'];

$new_admin_image = $row_admin['vendor_image'];


$admin_contact = $row_admin['vendor_contact'];

$admin_about = $row_admin['vendor_about'];


}
?>


<div class="row" ><!-- 1  row Starts -->

<div class="col-lg-12" ><!-- col-lg-12 Starts -->

<ol class="breadcrumb" ><!-- breadcrumb Starts -->

<li class="active" >

<i class="fa fa-dashboard" ></i> Dashboard / Edit Profile

</li>



</ol><!-- breadcrumb Ends -->

</div><!-- col-lg-12 Ends -->

</div><!-- 1  row Ends -->

<div class="row" ><!-- 2 row Starts -->

<div class="col-lg-12" ><!-- col-lg-12 Starts -->

<div class="panel panel-default" ><!-- panel panel-default Starts -->

<div class="panel-heading" ><!-- panel-heading Starts -->

<h3 class="panel-title" >

<i class="fa fa-money fa-fw" ></i> Edit Profile

</h3>


</div><!-- panel-heading Ends -->


<div class="panel-body"><!-- panel-body Starts -->

<form class="form-horizontal" method="post" enctype="multipart/form-data"><!-- form-horizontal Starts -->

<div class="form-group"><!-- form-group Starts -->

<label class="col-md-3 control-label">User Name: </label>

<div class="col-md-6"><!-- col-md-6 Starts -->

<input type="text" name="admin_name" class="form-control" required value="<?php echo $admin_name; ?>">

</div><!-- col-md-6 Ends -->

</div><!-- form-group Ends -->


<div class="form-group"><!-- form-group Starts -->

<label class="col-md-3 control-label">User Email: </label>

<div class="col-md-6"><!-- col-md-6 Starts -->

<input type="text" name="admin_email" class="form-control" required value="<?php echo $admin_email; ?>">

</div><!-- col-md-6 Ends -->

</div><!-- form-group Ends -->


<div class="form-group"><!-- form-group Starts -->

<label class="col-md-3 control-label">User Contact: </label>

<div class="col-md-6"><!-- col-md-6 Starts -->

<input type="text" name="admin_contact" class="form-control" required value="<?php echo $admin_contact; ?>">

</div><!-- col-md-6 Ends -->

</div><!-- form-group Ends -->


<div class="form-group"><!-- form-group Starts -->

<label class="col-md-3 control-label">User About: </label>

<div class="col-md-6"><!-- col-md-6 Starts -->

<textarea name="admin_about" class="form-control" rows="3"> <?php echo $admin_about; ?> </textarea>

</div><!-- col-md-6 Ends -->

</div><!-- form-group Ends -->

<div class="form-group"><!-- form-group Starts -->

<label class="col-md-3 control-label">User Image: </label>

<div class="col-md-6"><!-- col-md-6 Starts -->

<input type="file" name="admin_image" class="form-control" >
<br>
<img src="vendor_images/<?php echo $admin_image; ?>" width="70" height="70" >

</div><!-- col-md-6 Ends -->

</div><!-- form-group Ends -->

<hr>

<h3>

Change Account Password <span class="text-muted h6"> If You Do Not Want To Change Password Leave These Fields Empty. </span>

</h3>

<div class="form-group"><!-- form-group Starts -->

<label class="col-md-3 control-label"> Change Password: </label>

<div class="col-md-6"><!-- col-md-6 Starts -->

<input type="text" name="admin_pass" class="form-control">

</div><!-- col-md-6 Ends -->

</div><!-- form-group Ends -->

<div class="form-group"><!-- form-group Starts -->

<label class="col-md-3 control-label"> Confirm Change Password: </label>

<div class="col-md-6"><!-- col-md-6 Starts -->

<input type="text" name="confirm_admin_pass" class="form-control">

</div><!-- col-md-6 Ends -->

</div><!-- form-group Ends -->

<div class="form-group"><!-- form-group Starts -->

<label class="col-md-3 control-label"></label>

<div class="col-md-6"><!-- col-md-6 Starts -->

<input type="submit" name="update" value="Update User" class="btn btn-primary form-control">

</div><!-- col-md-6 Ends -->

</div><!-- form-group Ends -->


</form><!-- form-horizontal Ends -->

</div><!-- panel-body Ends -->

</div><!-- panel panel-default Ends -->

</div><!-- col-lg-12 Ends -->


</div><!-- 2 row Ends -->

<?php

if(isset($_POST['update'])){

$admin_name = $_POST['admin_name'];

$admin_email = $_POST['admin_email'];


$admin_contact = $_POST['admin_contact'];

$admin_about = $_POST['admin_about'];


$admin_image = $_FILES['admin_image']['name'];

$temp_admin_image = $_FILES['admin_image']['tmp_name'];

move_uploaded_file($temp_admin_image,"admin_images/$admin_image");

if(empty($admin_image)){

$admin_image = $new_admin_image;

}

$admin_pass = $_POST['admin_pass'];

$confirm_admin_pass = $_POST['confirm_admin_pass'];

if(!empty($admin_pass) or !empty($confirm_admin_pass)){

if($admin_pass !== $confirm_admin_pass){

echo "<script> alert('Your Password Does Not Match, Please Try Again.'); </script>";	
	
}else{



$update_admin_pass = "update vendors set admin_pass='$encrypted_password' where admin_id='$admin_id'";

$run_update_admin_pass = mysqli_query($con, $update_admin_pass);
	
}

	
}

$update_admin = "update vendors set vendor_name='$admin_name',vendor_email='$admin_email',vendor_image='$admin_image',vendor_contact='$admin_contact',vendor_about='$admin_about' where vendor_id='$admin_id'";

$run_admin = mysqli_query($con,$update_admin);

if($run_admin){

echo "<script>alert('User Has Been Updated successfully and login again')</script>";

echo "<script>window.open('vendor_login.php','_self')</script>";

session_destroy();

}

}


?>



