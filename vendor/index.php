
<?php
session_start();
include('includes/db.php');


if(!isset($_SESSION['vendor_email'])){

echo "<script>window.open('vendor_login.php','_self')</script>";

}

else {




?>


<?php

$get_admin = "select * from vendors ";

$run_admin = mysqli_query($con,$get_admin);

$row_admin = mysqli_fetch_array($run_admin);

$admin_id = $row_admin['vendor_id'];

$admin_name = $row_admin['vendor_name'];

$admin_email = $row_admin['vendor_email'];

$admin_image = $row_admin['vendor_image'];


$admin_contact = $row_admin['vendor_contact'];

$admin_about = $row_admin['vendor_about'];




$get_products = "select * from products";
$run_products = mysqli_query($con,$get_products);
$count_products = mysqli_num_rows($run_products);

$get_customers = "select * from customers";
$run_customers = mysqli_query($con,$get_customers);
$count_customers = mysqli_num_rows($run_customers);

$get_p_categories = "select * from product_categories";
$run_p_categories = mysqli_query($con,$get_p_categories);
$count_p_categories = mysqli_num_rows($run_p_categories);


$get_pending_orders = "select * from orders where order_status='pending'";
$run_pending_orders = mysqli_query($con,$get_pending_orders);
$count_pending_orders = mysqli_num_rows($run_pending_orders);


?>


<!DOCTYPE html>
<html>

<head>

<title>Vendor Panel</title>

<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" >

<link href="css/bootstrap.min.css" rel="stylesheet">

<link href="css/style.css" rel="stylesheet">

<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" >

<script src="js/jquery.min.js"></script>

<script src="js/jquery-ui.min.js"></script>

</head>

<body>

<div id="wrapper"><!-- wrapper Starts -->

<?php include("includes/sidebar.php");  ?>

<div id="page-wrapper"><!-- page-wrapper Starts -->

<div class="container-fluid"><!-- container-fluid Starts -->

<?php

if(isset($_GET['dashboard'])){

include("dashboard.php");

}

if(isset($_GET['insert_product'])){

include("insert_product1.php");

}

if(isset($_GET['view_products'])){

include("view_products.php");

}

if(isset($_GET['delete_product'])){

include("delete_product.php");

}

if(isset($_GET['edit_product'])){

include("edit_product.php");

}


if(isset($_GET['your_orders'])){

include("vendor_orders.php");

}


if(isset($_GET['view_orders'])){

include("view_orders.php");

}

if(isset($_GET['user_delete'])){

include("user_delete.php");

}



if(isset($_GET['user_profile'])){

include("vendor_profile.php");

}


if(isset($_GET['delete_product'])){

include("delete_product.php");

}



?>

</div><!-- container-fluid Ends -->

</div><!-- page-wrapper Ends -->

</div><!-- wrapper Ends -->

<script src="js/bootstrap.min.js"></script>


</body>


</html>

<?php  }?>