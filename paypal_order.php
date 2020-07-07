<?php

session_start();

include("includes/db.php");

include("functions/functions.php");

?>

<?php

if(isset($_SESSION["customer_email"])){

$customer_id = $_GET["c_id"];

$amount = $_GET["amount"];

$ip_add = getRealUserIp();

$physical_products = array();

$select_cart = "select * from cart where ip_add='$ip_add'";

$run_cart = mysqli_query($con,$select_cart);

while($row_cart = mysqli_fetch_array($run_cart)){

$product_id = $row_cart['p_id'];

$get_product = "select * from products where product_id='$product_id'";

$run_product = mysqli_query($con,$get_product);

$row_product = mysqli_fetch_array($run_product);

$product_type = $row_product['product_type'];

if($product_type == "physical_product"){
	
array_push($physical_products, $product_id);
	
}
	
}

if(count($physical_products) > 0){
	
$shipping_type = $_SESSION["shipping_type"];

$shipping_cost = $_SESSION["shipping_cost"];

$is_shipping_address_same = $_SESSION["is_shipping_address_same"];

$select_shipping_type = "select * from shipping_types where type_id='$shipping_type'";

$run_shipping_type = mysqli_query($con,$select_shipping_type);

$row_shipping_type = mysqli_fetch_array($run_shipping_type);

$shipping_type_name = $row_shipping_type["type_name"];
	
}

$select_customers_addresses = "select * from customers_addresses where customer_id='$customer_id'";

$run_customers_addresses = mysqli_query($con, $select_customers_addresses);

$row_customers_addresses = mysqli_fetch_array($run_customers_addresses);

$billing_first_name = $row_customers_addresses['billing_first_name'];

$billing_last_name = $row_customers_addresses['billing_last_name'];

$billing_country = $row_customers_addresses['billing_country'];

$billing_address_1 = $row_customers_addresses['billing_address_1'];

$billing_address_2 = $row_customers_addresses['billing_address_2'];

$billing_state = $row_customers_addresses['billing_state'];

$billing_city = $row_customers_addresses['billing_city'];

$billing_postcode = $row_customers_addresses['billing_postcode'];

//Shipping Details Starts

$shipping_first_name = $row_customers_addresses['shipping_first_name'];

$shipping_last_name = $row_customers_addresses['shipping_last_name'];

$shipping_country = $row_customers_addresses['shipping_country'];

$shipping_address_1 = $row_customers_addresses['shipping_address_1'];

$shipping_address_2 = $row_customers_addresses['shipping_address_2'];

$shipping_state = $row_customers_addresses['shipping_state'];

$shipping_city = $row_customers_addresses['shipping_city'];

$shipping_postcode = $row_customers_addresses['shipping_postcode'];

date_default_timezone_set("Asia/Karachi");

$order_date = date("F d, Y h:i");

$payment_method = "paypal";

$status = "processing";

$invoice_no = mt_rand();

if(count($physical_products) > 0){

$insert_order = "insert into orders (customer_id,invoice_no,shipping_type,shipping_cost,payment_method,order_date,order_total,order_status) values ('$customer_id','$invoice_no','$shipping_type_name','$shipping_cost','$payment_method','$order_date','$amount','$status')";
	
}else{
	
$insert_order = "insert into orders (customer_id,invoice_no,shipping_type,shipping_cost,payment_method,order_date,order_total,order_status) values ('$customer_id','$invoice_no','','0','$payment_method','$order_date','$amount','$status')";
	
}

$run_order = mysqli_query($con, $insert_order);

$insert_order_id = mysqli_insert_id($con);

if($run_order){
	
if(count($physical_products) > 0){

if($is_shipping_address_same == "yes"){

$insert_order_addresses = "insert into orders_addresses (order_id,billing_first_name,billing_last_name,billing_country,billing_address_1,billing_address_2,billing_state,billing_city,billing_postcode,is_shipping_address_same) values ('$insert_order_id','$billing_first_name','$billing_last_name','$billing_country','$billing_address_1','$billing_address_2','$billing_state','$billing_city','$billing_postcode','yes')";
	
}elseif($is_shipping_address_same == "no"){

$insert_order_addresses = "insert into orders_addresses (order_id,billing_first_name,billing_last_name,billing_country,billing_address_1,billing_address_2,billing_state,billing_city,billing_postcode,is_shipping_address_same,shipping_first_name,shipping_last_name,shipping_country,shipping_address_1,shipping_address_2,shipping_state,shipping_city,shipping_postcode) values ('$insert_order_id','$billing_first_name','$billing_last_name','$billing_country','$billing_address_1','$billing_address_2','$billing_state','$billing_city','$billing_postcode','no','$shipping_first_name','$shipping_last_name','$shipping_country','$shipping_address_1','$shipping_address_2','$shipping_state','$shipping_city','$shipping_postcode')";
	
}
	
}else{
	
$insert_order_addresses = "insert into orders_addresses (order_id,billing_first_name,billing_last_name,billing_country,billing_address_1,billing_address_2,billing_state,billing_city,billing_postcode,is_shipping_address_same) values ('$insert_order_id','$billing_first_name','$billing_last_name','$billing_country','$billing_address_1','$billing_address_2','$billing_state','$billing_city','$billing_postcode','none')";	
	
}

$run_insert_order_addresses = mysqli_query($con, $insert_order_addresses);

if($run_insert_order_addresses){

$select_cart = "select * from cart where ip_add='$ip_add'";

$run_cart = mysqli_query($con,$select_cart);

while($row_cart = mysqli_fetch_array($run_cart)){

$product_id = $row_cart['p_id'];

$product_price = $row_cart['p_price'];

$product_qty = $row_cart['qty'];

$product_size = $row_cart['size'];

$insert_order_item = "insert into orders_items (order_id,product_id,price,qty,size) values ('$insert_order_id','$product_id','$product_price','$product_qty','$product_size')";

$run_order_item = mysqli_query($con, $insert_order_item);

}

$delete_cart = "delete from cart where ip_add='$ip_add'";

$run_cart_delete = mysqli_query($con, $delete_cart);

if($run_cart_delete){

echo "

<script>

alert('Your Order Has Been Submitted Successfully, Thanks.');

window.open('order_received.php?order_id=$insert_order_id','_self');

</script>

";
	
}
	
}
	
}

	
}

?>