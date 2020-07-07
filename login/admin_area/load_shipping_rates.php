<?php

session_start();

include("includes/db.php");

if(!isset($_SESSION['admin_email'])){

echo "<script>window.open('login.php','_self')</script>";

}

else {




?>



<?php

$type_id = $_POST['type_id'];

$i = 0;

$shipping_weights = array();

function get_previous_key($key, $array = array()){
	
$array_keys = array_keys($array);

$found_index = array_search($key, $array_keys);

return $array_keys[$found_index-1];
	
}

if(isset($_POST['zone_id'])){
	
$zone_id = $_POST['zone_id'];

$get_shipping_rates = "select * from shipping where shipping_type='$type_id' and shipping_zone='$zone_id' order by shipping_weight";
	
}elseif(isset($_POST['country_id'])){
	
$country_id = $_POST['country_id'];
	
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







<?php } ?>