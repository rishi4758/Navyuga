<?php

session_start();

include("includes/db.php");

include("functions/functions.php");

?>

<?php

$total = 0;

$total_weight = 0;

$physical_products = array();

$ip_add = getRealUserIp();

$select_cart = "select * from cart where ip_add='$ip_add'";

$run_cart = mysqli_query($con,$select_cart);

$count = mysqli_num_rows($run_cart);

while($row_cart = mysqli_fetch_array($run_cart)){

$pro_id = $row_cart['p_id'];

$pro_size = $row_cart['size'];

$pro_qty = $row_cart['qty'];

$only_price = $row_cart['p_price'];

$get_products = "select * from products where product_id='$pro_id'";

$run_products = mysqli_query($con,$get_products);

while($row_products = mysqli_fetch_array($run_products)){

$product_title = $row_products['product_title'];

$product_img1 = $row_products['product_img1'];

$product_type = $row_products['product_type'];






if($product_type == "physical_product" ){

array_push($physical_products, $pro_id);
	
	
}

$sub_total = $only_price*$pro_qty;

$_SESSION['pro_qty'] = $pro_qty;

$total += $sub_total;

}

}

?>


<tr>

<td> Order total </td>

<th> $<?php echo $total; ?>.00 </th>

</tr>


<script>

$(document).ready(function(){
	
	
<?php if(count($physical_products) > 0){ ?>

$(document).on("change", function(){
	


var total = Number(<?php echo $total; ?>);

var total_cart_price = total;

$(".total-cart-price").html("$" + total_cart_price + ".00");
	
});

<?php } ?>
	
});

</script>
