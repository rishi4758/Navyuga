

<div class="row" ><!-- 1 row Starts -->

<div class="col-lg-12" ><!-- col-lg-12 Starts -->

<ol class="breadcrumb" ><!-- breadcrumb Starts -->

<li class="active" >

<i class="fa fa-dashboard" ></i> Dashboard / View Users

</li>

</ol><!-- breadcrumb Ends -->


</div><!-- col-lg-12 Ends -->

</div><!-- 1 row Ends -->


<div class="row" ><!-- 2 row Starts -->

<div class="col-lg-12" ><!-- col-lg-12 Starts -->

<div class="panel panel-default" ><!-- panel panel-default Starts -->

<div class="panel-heading" ><!-- panel-heading Starts -->

<h3 class="panel-title" ><!-- panel-title Starts -->

<i class="fa fa-money fa-fw" ></i> View Users

</h3><!-- panel-title Ends -->


</div><!-- panel-heading Ends -->

<div class="panel-body" ><!-- panel-body Starts -->

<div class="table-responsive" ><!-- table-responsive Starts -->

<table class="table table-bordered table-hover table-striped" ><!-- table table-bordered table-hover table-striped Starts -->

<thead><!-- thead Starts -->

<tr>

<th>Vendor Name:</th>

<th>Vendor Email:</th>

<th>User Image:</th>



<th>Delete Vendor:</th>



<th>Vendor Products:</th>

</tr>

</thead><!-- thead Ends -->

<tbody><!-- tbody Starts -->

<?php

$get_admin = "select * from vendors";

$run_admin = mysqli_query($con,$get_admin);

while($row_admin = mysqli_fetch_array($run_admin)){

$admin_id = $row_admin['vendor_id'];

$admin_name = $row_admin['vendor_name'];

$admin_email = $row_admin['vendor_email'];

$admin_image = $row_admin['vendor_image'];






?>

<tr>

<td><?php echo $admin_name; ?></td>

<td><?php echo $admin_email; ?></td>

<td><img src="admin_images/<?php echo $admin_image; ?>" width="60" height="60" ></td>


<td>

<a href="index.php?vendor_delete=<?php echo $admin_id; ?>" >

<i class="fa fa-trash-o" ></i> Delete

</a>

</td>



<td>

<a href="index.php?vendor_pro=<?php echo $admin_id; ?>" >

<i class="fa fa-trash-o" ></i> Vendor Products

</a>

</td>

</tr>


<?php } ?>

</tbody><!-- tbody Ends -->



</table><!-- table table-bordered table-hover table-striped Ends -->

</div><!-- table-responsive Ends -->


</div><!-- panel-body Ends -->


</div><!-- panel panel-default Ends -->


</div><!-- col-lg-12 Ends -->



</div><!-- 2 row Ends -->





