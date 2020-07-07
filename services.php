<?php

session_start();

include("includes/db.php");

include("functions/functions.php");

?>
<!DOCTYPE html>

<html>

<head>

<title>E commerce Store </title>

<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" >

<link href="http://fonts.googleapis.com/css?family=Roboto:400,500,700,300,100" rel="stylesheet" >

<link href="styles/bootstrap.min.css" rel="stylesheet">

<link href="styles/style.css" rel="stylesheet">

<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">

</head>

<body>
<?php include("includes/header.php"); ?>

<div id="content" ><!-- content Starts -->

<div class="container-fluid" ><!-- container Starts -->

<div class="col-md-12" ><!--- col-md-12 Starts -->

<ul class="breadcrumb" ><!-- breadcrumb Starts -->

<li>
<a href="index.php">Home</a>
</li>

<li>Services</li>

</ul><!-- breadcrumb Ends -->



</div><!--- col-md-12 Ends -->




<div class="col-md-12" ><!-- col-md-12 Starts -->

<div class="services row"><!-- services row Starts -->

<?php

$get_services = "select * from services";

$run_services = mysqli_query($con,$get_services);

while($row_services = mysqli_fetch_array($run_services)){

$service_id = $row_services['service_id'];

$service_title = $row_services['service_title'];

$service_image = $row_services['service_image'];

$service_desc = $row_services['service_desc'];

$service_button = $row_services['service_button'];

$service_url = $row_services['service_url'];

?>

<div class="col-md-4 col-sm-6 box"><!-- col-md-4 col-sm-6 box Starts -->

<img src="admin_area/services_images/<?php echo $service_image; ?>" class="img-responsive">

<h2 align="center"> <?php echo $service_title; ?> </h2>

<p>
<?php echo $service_desc; ?>
</p>

<center>

<a href="<?php echo $service_url; ?>" class="btn btn-primary">

<?php echo $service_button; ?>

</a>

</center>

</div><!-- col-md-4 col-sm-6 box Ends -->

<?php } ?>

</div><!-- services row Ends -->

</div><!-- col-md-12 Ends -->



</div><!-- container Ends -->
</div><!-- content Ends -->



<?php

include("includes/footer.php");

?>

<script src="js/jquery.min.js"> </script>

<script src="js/bootstrap.min.js"></script>

</body>
</html>