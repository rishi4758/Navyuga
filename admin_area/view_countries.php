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

<i class="fa fa-dashboard"></i> Dashboard / View Countries

</li>

</ol><!-- breadcrumb Ends -->

</div><!-- col-lg-12 Ends -->


</div><!-- 1 row Ends -->

<div class="row"><!-- 2 row Starts -->

<div class="col-lg-12"><!-- col-lg-12 Starts -->

<div class="panel panel-default"><!-- panel panel-default Starts -->

<div class="panel-heading"><!-- panel-heading Starts -->

<h3 class="panel-title">

<i class="fa fa-money fa-fw"></i> View Countries

</h3>

</div><!-- panel-heading Ends -->

<div class="panel-body"><!-- panel-body Starts -->

<div class="table-responsive"><!-- table-responsive Starts -->


<table class="table table-hover table-bordered table-striped"><!-- table table-hover table-bordered table-striped Starts -->

<thead>

<tr>

<th> Contry No: </th>
<th> Contry Name: </th>
<th> Actions: </th>

</tr>

</thead>

<tbody>

<?php

$per_page = 15;

if(!empty($_GET['view_countries'])){

$page = $_GET['view_countries'];
	
}else{

$page = 1;	
	
}


// Page will start from 0 and Multiple by Per Page
$start_from = ($page-1) * $per_page;



//Selecting the data from table but with limit
$select_countries = "select * from countries order by 1 desc LIMIT $start_from,$per_page";

$run_countries = mysqli_query($con,$select_countries);

$i = 0;

while($row_countries = mysqli_fetch_array($run_countries)){
	
$country_id = $row_countries['country_id'];

$country_name = $row_countries['country_name'];

$i++;

?>

<tr>

<td> <?php echo $i; ?> </td>

<td> <?php echo $country_name; ?> </td>

<td> 

<div class="dropdown"><!-- dropdown Starts -->

<button class="btn btn-success dropdown-toggle" data-toggle="dropdown">

<span class="caret"></span>

</button>

<ul class="dropdown-menu dropdown-menu-right"><!-- dropdown-menu dropdown-menu-right Starts -->

<li>

<a href="index.php?edit_country=<?php echo $country_id; ?>">

<i class="fa fa-pencil"></i> Edit

</a>

</li>

<li>

<a href="index.php?delete_country=<?php echo $country_id; ?>">

<i class="fa fa-trash-o"></i> Delete

</a>

</li>

</ul><!-- dropdown-menu dropdown-menu-right Ends -->

</div><!-- dropdown Ends -->

</td>

</tr>

<?php } ?>

</tbody>

</table><!-- table table-hover table-bordered table-striped Ends -->

</div><!-- table-responsive Ends -->

<center><!-- center Starts -->

<ul class="pagination"><!-- pagination Starts -->

<?php


//Now select all from table

$select_countries = "select * from countries order by 1 DESC";

$run_countries = mysqli_query($con, $select_countries);

// Count the total records

$count_countries = mysqli_num_rows($run_countries);

//Using ceil function to divide the total records on per page

$total_pages = ceil($count_countries / $per_page);

//Going to first page

echo "

<li class='page-item'>

<a href='index.php?view_countries=1' class='page-link'>

First Page

</a>

</li>

";

for($i = max(1, $page - 3); $i <= min($page + 3, $total_pages); $i++){
	
if($i == $page){

$active = "active";
	
}else{

$active = "";	
	
}

echo "

<li class='page-item $active'>

<a href='index.php?view_countries=$i' class='page-link'>

$i

</a>

</li>

";	
	
}

// Going to last page

echo "

<li class='page-item'>

<a href='index.php?view_countries=$total_pages' class='page-link'>

Last Page

</a>

</li>

";

?>

</ul><!-- pagination Ends -->

</center><!-- center Ends -->

</div><!-- panel-body Ends -->

</div><!-- panel panel-default Ends -->

</div><!-- col-lg-12 Ends -->

</div><!-- 2 row Ends -->



<?php } ?>