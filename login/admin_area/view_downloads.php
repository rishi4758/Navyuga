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

<i class="fa fa-dashboard"></i> Dashboard / View Downloads

</li>

</ol><!-- breadcrumb Ends -->

</div><!-- col-lg-12 Ends -->

</div><!-- 1 row Ends -->


<div class="row"><!-- 2 row Starts -->

<div class="col-lg-12"><!-- col-lg-12 Starts -->

<div class="panel panel-default"><!-- panel panel-default Starts -->

<div class="panel-heading"><!-- panel-heading Starts -->

<h3 class="panel-title"><!-- panel-title Starts -->

<i  class="fa fa-money fa-fw"></i> View Downloads

</h3><!-- panel-title Ends -->

</div><!-- panel-heading Ends -->

<div class="panel-body"><!-- panel-body Starts -->

<div class="table-responsive"><!-- table-responsive Starts -->

<table class="table table-bordered table-hover table-striped"><!-- table table-bordered table-hover table-striped Starts -->

<thead>

<tr>

<th> Download No: </th>

<th> Download Title: </th>

<th> Product Title: </th>

<th> Download File: </th>

<th> Actions: </th>

</tr>

</thead>

<tbody>

<?php

$i = 0;

$select_downloads = "select * from downloads order by 1 desc";

$run_downloads = mysqli_query($con,$select_downloads);

while($row_downloads = mysqli_fetch_array($run_downloads)){
	
$download_id = $row_downloads["download_id"];

$product_id = $row_downloads["product_id"];

$download_title = $row_downloads["download_title"];

$download_file = $row_downloads["download_file"];

$select_product = "select * from products where product_id='$product_id'";

$run_product = mysqli_query($con,$select_product);

$row_product = mysqli_fetch_array($run_product);

$product_title = $row_product["product_title"];

$i++;

?>

<tr>

<td> <?php echo $i; ?> </td>

<td> <?php echo $download_title; ?> </td>

<td bgcolor="#ebebeb"> <?php echo $product_title; ?> </td>

<td> <?php echo $download_file; ?> </td>

<td>

<div class="dropdown"><!-- dropdown Starts -->

<button class="btn btn-success dropdown-toggle" data-toggle="dropdown">

<span class="caret"></span>

</button>

<ul class="dropdown-menu dropdown-menu-right">

<li>

<a href="index.php?edit_download=<?php echo $download_id; ?>">

<i class="fa fa-pencil"></i> Edit

</a>

</li>

<li>

<a href="index.php?delete_download=<?php echo $download_id; ?>">

<i class="fa fa-trash-o"></i> Delete

</a>

</li>

</ul>

</div><!-- dropdown Ends -->

</td>

</tr>

<?php } ?>

</tbody>

</table><!-- table table-bordered table-hover table-striped Ends -->

</div><!-- table-responsive Ends -->

</div><!-- panel-body Ends -->

</div><!-- panel panel-default Ends -->

</div><!-- col-lg-12 Ends -->

</div><!-- 2 row Ends -->


<?php } ?>
