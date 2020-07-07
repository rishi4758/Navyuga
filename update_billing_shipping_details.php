<?php


session_start();

include("includes/db.php");

include("functions/functions.php");

if(isset($_SESSION["customer_email"])){

$customer_email = $_SESSION['customer_email'];

$get_customer = "select * from customers where customer_email='$customer_email'";

$run_customer = mysqli_query($con, $get_customer);

$row_customer = mysqli_fetch_array($run_customer);

$customer_id = $row_customer['customer_id'];

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

$billing_first_name = mysqli_real_escape_string($con, $_POST["billing_first_name"]);

$billing_last_name = mysqli_real_escape_string($con, $_POST["billing_last_name"]);

$billing_country = mysqli_real_escape_string($con, $_POST["billing_country"]);

$billing_address_1 = mysqli_real_escape_string($con, $_POST["billing_address_1"]);

$billing_address_2 = mysqli_real_escape_string($con, $_POST["billing_address_2"]);

$billing_state = mysqli_real_escape_string($con, $_POST["billing_state"]);

$billing_city = mysqli_real_escape_string($con, $_POST["billing_city"]);

$billing_postcode = mysqli_real_escape_string($con, $_POST["billing_postcode"]);

$is_shipping_address_same = mysqli_real_escape_string($con, $_POST["is_shipping_address_same"]);

$update_billing_address = "update customers_addresses set billing_first_name='$billing_first_name',billing_last_name='$billing_last_name',billing_country='$billing_country',billing_address_1='$billing_address_1',billing_address_2='$billing_address_2',billing_state='$billing_state',billing_city='$billing_city',billing_postcode='$billing_postcode' where customer_id='$customer_id'";


$run_update_billing_address = mysqli_query($con, $update_billing_address);

$shipping_type = $_POST["shipping_type"];

$payment_method = $_POST["payment_method"];

$_SESSION["is_shipping_address_same"] = $is_shipping_address_same;

$_SESSION["shipping_type"] = $shipping_type;

$_SESSION["payment_method"] = $payment_method;

if(count($physical_products) > 0){








if($is_shipping_address_same == "no"){

// Shipping Details Starts

$shipping_first_name = mysqli_real_escape_string($con, $_POST["shipping_first_name"]);

$shipping_last_name = mysqli_real_escape_string($con, $_POST["shipping_last_name"]);

$shipping_country = mysqli_real_escape_string($con, $_POST["shipping_country"]);

$shipping_address_1 = mysqli_real_escape_string($con, $_POST["shipping_address_1"]);

$shipping_address_2 = mysqli_real_escape_string($con, $_POST["shipping_address_2"]);

$shipping_state = mysqli_real_escape_string($con, $_POST["shipping_state"]);

$shipping_city = mysqli_real_escape_string($con, $_POST["shipping_city"]);

$shipping_postcode = mysqli_real_escape_string($con, $_POST["shipping_postcode"]);

$update_shipping_address = "update customers_addresses set shipping_first_name='$shipping_first_name',shipping_last_name='$shipping_last_name',shipping_country='$shipping_country',shipping_address_1='$shipping_address_1',shipping_address_2='$shipping_address_2',shipping_state='$shipping_state',shipping_city='$shipping_city',shipping_postcode='$shipping_postcode' where customer_id='$customer_id'";

$run_update_shipping_address = mysqli_query($con, $update_shipping_address);


	
}
	
}

}

?>