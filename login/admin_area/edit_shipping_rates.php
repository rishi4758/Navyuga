<?php


if(!isset($_SESSION['admin_email'])){

echo "<script>window.open('login.php','_self')</script>";

}

else {

if(isset($_GET['edit_shipping_rates'])){
	
$type_id = $_GET['edit_shipping_rates'];

$select_shipping_type = "select * from shipping_types where type_id='$type_id'";

$run_shipping_type = mysqli_query($con, $select_shipping_type);

$row_shipping_type = mysqli_fetch_array($run_shipping_type);

$type_name = $row_shipping_type['type_name'];

if(isset($_GET['zone_id'])){
	
$zone_id = $_GET['zone_id'];

$get_zone = "select * from zones where zone_id='$zone_id'";

$run_zone = mysqli_query($con, $get_zone);

$row_zone = mysqli_fetch_array($run_zone);

$zone_name = $row_zone['zone_name'];
	
}elseif(isset($_GET['country_id'])){

$country_id = $_GET['country_id'];

$get_country = "select * from countries where country_id='$country_id'";

$run_country = mysqli_query($con, $get_country);

$row_country = mysqli_fetch_array($run_country);

$country_name = $row_country['country_name'];
	
}
	
}


?>


<div class="row"><!-- 1 row Starts -->

<div class="col-lg-12"><!-- col-lg-12 Starts -->

<ol class="breadcrumb"><!-- breadcrumb Starts -->

<li class="active">

<i class="fa fa-dashboard"></i> Dashboard / Edit Shipping Rates

</li>

</ol><!-- breadcrumb Ends -->

</div><!-- col-lg-12 Ends -->


</div><!-- 1 row Ends -->

<div class="row"><!-- 2 row Starts -->

<div class="col-lg-12"><!-- col-lg-12 Starts -->

<div class="panel panel-default"><!-- panel panel-default Starts -->

<div class="panel-heading"><!-- panel-heading Starts -->

<h3 class="panel-title">

<i class="fa fa-money fa-fw"></i> Edit Shipping Rates

</h3>

</div><!-- panel-heading Ends -->

<div class="panel-body"><!-- panel-body Starts -->

<h4>

<strong> Edit Shipping Rates For: </strong>

<?php

if(isset($_GET['zone_id'])){

echo $zone_name;
	
}elseif(isset($_GET['country_id'])){
	
echo $country_name;
	
}

?>

: <?php echo $type_name; ?>

</h4>

<h3> Insert Shipping Rate </h3>

<form method="post"><!-- form Starts -->

<div class="row"><!-- row Starts -->

<div class="col-sm-4"><!-- col-sm-4 Starts -->

<div class="form-group"><!-- form-group Starts -->

<label> Weight Up To:  </label>

<input type="text" name="shipping_weight" class="form-control" required>

</div><!-- form-group Ends -->

</div><!-- col-sm-4 Ends -->

<div class="col-sm-4"><!-- col-sm-4 Starts -->

<div class="form-group"><!-- form-group Starts -->

<label> Cost:  </label>

<input type="text" name="shipping_cost" class="form-control" required>

</div><!-- form-group Ends -->

</div><!-- col-sm-4 Ends -->

</div><!-- row Ends -->

<div class="form-group"><!-- form-group Starts -->

<input type="submit" name="submit" value="Insert Shipping Rate" class="btn btn-primary" >

</div><!-- form-group Ends -->

</form><!-- form Ends -->

<table class="table table-hover table-bordered table-striped"><!-- table table-hover table-bordered table-striped Starts -->

<thead>

<tr>

<th> Weight From: </th>

<th> Weight To: </th>

<th> Cost: </th>

<th> Delete: </th>

</tr>

</thead>

<tbody>

<?php

$i = 0;

$shipping_weights = array();

function get_previous_key($key, $array = array()){
	
$array_keys = array_keys($array);

$found_index = array_search($key, $array_keys);

return $array_keys[$found_index-1];
	
}

if(isset($_GET['zone_id'])){

$get_shipping_rates = "select * from shipping where shipping_type='$type_id' and shipping_zone='$zone_id' order by shipping_weight";
	
}elseif(isset($_GET['country_id'])){
	
$get_shipping_rates = "select * from shipping where shipping_type='$type_id' and shipping_country='$country_id' order by shipping_weight";
	
}

$run_shipping_rates = mysqli_query($con, $get_shipping_rates);

while($row_shipping_rates = mysqli_fetch_array($run_shipping_rates)){
	
$i++;

$shipping_id = $row_shipping_rates['shipping_id'];

$shipping_weight = $row_shipping_rates['shipping_weight'];

$shipping_cost = $row_shipping_rates['shipping_cost'];

$shipping_weights[$shipping_id] = $shipping_weight;

if($i == 1){

$shipping_weight_from = "0.00";	

}else{
	
$prevois_shipping_id = get_previous_key($shipping_id, $shipping_weights); 

$shipping_weight_from = $shipping_weights[$prevois_shipping_id] + 0.01;
	
}

?>

<tr id="tr_<?php echo $shipping_id; ?>">

<td> <?php echo $shipping_weight_from; ?> <small>Kg</small> </td>

<td> <?php echo $shipping_weight; ?> <small>Kg</small> </td>

<td> $<?php echo $shipping_cost; ?> </td>

<td>

<a href="#" id="delete_shipping_rate_<?php echo $shipping_id; ?>">

<i class="fa fa-trash-o"></i> Delete

</a>

</td>

<script>

$(document).ready(function(){
	
$("#delete_shipping_rate_<?php echo $shipping_id; ?>").click(function(event){
	
event.preventDefault();

$.ajax({

method: "POST",

url: "delete_shipping_rate.php",

data: {shipping_id: <?php echo $shipping_id; ?>, type_id: <?php echo $type_id; ?>},

success:function(){
	
$("#tr_<?php echo $shipping_id; ?>").remove();
	
}
	

	
});
	
});
	
	
	
});

</script>

</tr>

<?php } ?>

</tbody>

</table><!-- table table-hover table-bordered table-striped Ends -->


</div><!-- panel-body Ends -->

</div><!-- panel panel-default Ends -->

</div><!-- col-lg-12 Ends -->

</div><!-- 2 row Ends -->

<script>

$(document).ready(function(){
	
$("form").submit(function(event){
	
event.preventDefault();

$.ajax({
	
method: "POST",

url: "insert_shipping_rate.php",

<?php if(isset($_GET['zone_id'])){ ?>

data: $("form").serialize() + "&type_id=<?php echo $type_id; ?>&zone_id=<?php echo $zone_id; ?>",

<?php }elseif(isset($_GET['country_id'])){ ?>

data: $("form").serialize() + "&type_id=<?php echo $type_id; ?>&country_id=<?php echo $country_id; ?>",

<?php } ?>

success:function(){
	
$("form").find("input[type=text]").val("");

$.ajax({
	
method: "POST",

url: "load_shipping_rates.php",

<?php if(isset($_GET["zone_id"])){ ?>

data: {type_id: <?php echo $type_id; ?>, zone_id: <?php echo $zone_id; ?>},

<?php }elseif(isset($_GET["country_id"])){ ?>

data: {type_id: <?php echo $type_id; ?>, country_id: <?php echo $country_id; ?>},

<?php } ?>

success:function(data){

$("table tbody").html(data);	

}
	
});
	
}
	
	
});
	
});
	
});


</script>

<?php } ?>