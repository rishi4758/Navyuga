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


<nav class="navbar navbar-inverse navbar-fixed-top" ><!-- navbar navbar-inverse navbar-fixed-top Starts -->

<div class="navbar-header" ><!-- navbar-header Starts -->

<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse" ><!-- navbar-ex1-collapse Starts -->


<span class="sr-only" >Toggle Navigation</span>

<span class="icon-bar" ></span>

<span class="icon-bar" ></span>

<span class="icon-bar" ></span>


</button><!-- navbar-ex1-collapse Ends -->

<a class="navbar-brand" href="index.php?dashboard" >Vendor Panel</a>


</div><!-- navbar-header Ends -->

<ul class="nav navbar-right top-nav" ><!-- nav navbar-right top-nav Starts -->

<li class="dropdown" ><!-- dropdown Starts -->

<a href="#" class="dropdown-toggle" data-toggle="dropdown" ><!-- dropdown-toggle Starts -->

<i class="fa fa-user" ></i>

<?php echo $admin_name; ?> <b class="caret" ></b>


</a><!-- dropdown-toggle Ends -->

<ul class="dropdown-menu" ><!-- dropdown-menu Starts -->

<li><!-- li Starts -->

<a href="index.php?user_profile=<?php echo $vendor_id; ?>" >

<i class="fa fa-fw fa-user" ></i> Profile


</a>

</li><!-- li Ends -->






<li class="divider"></li>

<li><!-- li Starts -->

<a href="vendor_logout.php">

<i class="fa fa-fw fa-power-off"> </i> Log Out

</a>

</li><!-- li Ends -->

</ul><!-- dropdown-menu Ends -->




</li><!-- dropdown Ends -->


</ul><!-- nav navbar-right top-nav Ends -->

<div class="collapse navbar-collapse navbar-ex1-collapse"><!-- collapse navbar-collapse navbar-ex1-collapse Starts -->

<ul class="nav navbar-nav side-nav"><!-- nav navbar-nav side-nav Starts -->

<li><!-- li Starts -->

<a href="index.php?dashboard">

<i class="fa fa-fw fa-dashboard"></i> Dashboard

</a>

</li><!-- li Ends -->





<li><!-- Bundles Li Starts --->

<a href="index.php?insert_product"  data-target="#bundles">

<i class="fa fa-fw fa-edit"></i>Insert Products


</a>


</li><!-- Bundles Li Ends --->

<li><!-- relations li Starts -->

<a href="index.php?view_products"  data-target="#relations"><!-- anchor Starts -->

 <i class="fa fa-fw fa-edit"></i>View Products



</a><!-- anchor Ends -->


</li><!-- relations li Ends -->




<li><!-- li Starts -->

<a href="index.php?your_orders" data-target="#users">

<i class="fa fa-fw fa-gear"></i> Your Orders




</a>
</li>



<li><!-- li Starts -->

<a href="index.php?user_profile" data-target="#users">

<i class="fa fa-fw fa-gear"></i> Edit Profile




</a>
</li>


<li><!-- li Starts -->

<a href="vendor_logout.php">

<i class="fa fa-fw fa-power-off"></i> Log Out

</a>

</li><!-- li Ends -->

</ul><!-- nav navbar-nav side-nav Ends -->

</div><!-- collapse navbar-collapse navbar-ex1-collapse Ends -->

</nav><!-- navbar navbar-inverse navbar-fixed-top Ends -->

