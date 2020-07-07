<?php

session_start();

include("includes/db.php");

include("functions/functions.php");

?>
<!DOCTYPE html>

<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>E-commerce Store</title>
	<link rel="stylesheet" href="styles/custom_style.css">
</head>

<body>

	<?php include("includes/header.php"); ?>

<div id="content" ><!-- content Starts -->
<div class="container" ><!-- container Starts -->

<div class="col-md-12" ><!--- col-md-12 Starts -->

<ul class="breadcrumb" ><!-- breadcrumb Starts -->

<li>
<a href="index.php">Home</a>
</li>

<li>About Us</li>

</ul><!-- breadcrumb Ends -->



</div><!--- col-md-12 Ends -->




<div class="col-md-12" ><!-- col-md-12 Starts -->

<div class="box" ><!-- box Starts -->

<?php

$get_about_us = "select * from about_us";

$run_about_us = mysqli_query($con,$get_about_us);

$row_about_us = mysqli_fetch_array($run_about_us);

$about_heading = $row_about_us['about_heading'];

$about_short_desc = $row_about_us['about_short_desc'];

$about_desc = $row_about_us['about_desc'];

?>

<h1> <?php echo $about_heading; ?> </h1>

<p class="lead"> <?php echo $about_short_desc; ?> </p>

<p> <?php echo $about_desc; ?> </p>

</div><!-- box Ends -->

</div><!-- col-md-12 Ends -->



</div><!-- container Ends -->
</div><!-- content Ends -->



<?php

include("includes/footer.php");

?>


</body>
</html>