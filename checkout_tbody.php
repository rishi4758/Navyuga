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

$select_customers_addresses = "select * from customers_addresses where customer_id='$customer_id'";

$run_customers_addresses = mysqli_query($con, $select_customers_addresses);

$row_customers_addresses = mysqli_fetch_array($run_customers_addresses);

$billing_country = $row_customers_addresses['billing_country'];

$billing_postcode = $row_customers_addresses['billing_postcode'];

$shipping_country = $row_customers_addresses['shipping_country'];

$shipping_postcode = $row_customers_addresses['shipping_postcode'];

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
	
?>



<?php

$total = 0;

$total_weight = 0;

$select_cart = "select * from cart where ip_add='$ip_add'";

$run_cart = mysqli_query($con,$select_cart);

while($row_cart = mysqli_fetch_array($run_cart)){

$product_id = $row_cart['p_id'];

$product_price = $row_cart['p_price'];

$product_qty = $row_cart['qty'];

$product_size = $row_cart['size'];

$get_product = "select * from products where product_id='$product_id'";

$run_product = mysqli_query($con,$get_product);

$row_product = mysqli_fetch_array($run_product);

$product_title = $row_product['product_title'];

$product_weight = $row_product['product_weight'];

$sub_total = $product_price * $product_qty;

$total += $sub_total;

$sub_total_weight = $product_weight * $product_qty;

$total_weight += $sub_total_weight;

?>

<tr>

<td>

<a href="#" class="bold"> <?php echo $product_title; ?> </a>

<i class="fa fa-times" title="Product Qty"></i> <?php echo $product_qty; ?> 

<?php if($product_size != "None"){ ?>

<i class="fa fa-plus" title="Product Size"></i> <?php echo $product_size; ?> 

<?php } ?>

</td>

<th>$<?php echo $sub_total; ?> </th>

</tr>

<?php } ?>

<tr>

<td class="text-muted bold"> Order Subtotal </td>

<th> $<?php echo $total; ?>.00 </th>

</tr>

<?php if(count($physical_products) > 0){  ?>

<tr>

<th colspan="2">

<P class="shipping-header text-muted">

<I class="fa fa-truck"></i> Shipping:

</P>

<ul class="list-unstyled"><!-- shipping ul list-unstyled Starts -->

<?php

$shipping_zone_id = "";

if(@$_SESSION["is_shipping_address_same"] == "yes"){

if(empty($billing_country) and empty($billing_postcode)){

echo "

<li>

<p>

There are no shipping types available. Please double check your address, or contact us if you need any help.

</p>

</li>

";
	
}

$select_zones = "select * from zones order by zone_order DESC";	

$run_zones = mysqli_query($con, $select_zones);

while($row_zones = mysqli_fetch_array($run_zones)){

$zone_id = $row_zones['zone_id'];

$select_zones_locations = "select DISTINCT zone_id from zones_locations where zone_id='$zone_id' and (location_code='$billing_country' and location_type='country')";

$run_zones_locations = mysqli_query($con, $select_zones_locations);

$count_zones_locations = mysqli_num_rows($run_zones_locations);

if($count_zones_locations != "0"){
	
$row_zones_locations = mysqli_fetch_array($run_zones_locations);

$zone_id = $row_zones_locations["zone_id"];

$select_zone_shipping = "select * from shipping where shipping_zone='$zone_id'";

$run_zone_shipping = mysqli_query($con, $select_zone_shipping);

$count_zone_shipping = mysqli_num_rows($run_zone_shipping);

if($count_zone_shipping != "0"){
	
$select_zone_postcodes = "select * from zones_locations where zone_id='$zone_id' and location_type='postcode'";

$run_zone_postcodes = mysqli_query($con, $select_zone_postcodes);

$count_zone_postcodes = mysqli_num_rows($run_zone_postcodes);

if($count_zone_postcodes != "0"){

while($row_zones_postcodes = mysqli_fetch_array($run_zone_postcodes)){
	
$location_code = $row_zones_postcodes["location_code"];

if($location_code == $billing_postcode){

$shipping_zone_id = $zone_id;
	
}
	
}
	
}else{

$shipping_zone_id = $zone_id;
	
}

	
}
	
}
	

}
	
}elseif(@$_SESSION["is_shipping_address_same"] == "no"){

if(empty($shipping_country) and empty($shipping_postcode)){

echo "

<li>

<p>

There are no shipping types available. Please double check your address, or contact us if you need any help.

</p>

</li>

";
	
}

$select_zones = "select * from zones order by zone_order DESC";	

$run_zones = mysqli_query($con, $select_zones);

while($row_zones = mysqli_fetch_array($run_zones)){

$zone_id = $row_zones['zone_id'];

$select_zones_locations = "select DISTINCT zone_id from zones_locations where zone_id='$zone_id' and (location_code='$shipping_country' and location_type='country')";

$run_zones_locations = mysqli_query($con, $select_zones_locations);

$count_zones_locations = mysqli_num_rows($run_zones_locations);

if($count_zones_locations != "0"){
	
$row_zones_locations = mysqli_fetch_array($run_zones_locations);

$zone_id = $row_zones_locations["zone_id"];

$select_zone_shipping = "select * from shipping where shipping_zone='$zone_id'";

$run_zone_shipping = mysqli_query($con, $select_zone_shipping);

$count_zone_shipping = mysqli_num_rows($run_zone_shipping);

if($count_zone_shipping != "0"){
	
$select_zone_postcodes = "select * from zones_locations where zone_id='$zone_id' and location_type='postcode'";

$run_zone_postcodes = mysqli_query($con, $select_zone_postcodes);

$count_zone_postcodes = mysqli_num_rows($run_zone_postcodes);

if($count_zone_postcodes != "0"){

while($row_zones_postcodes = mysqli_fetch_array($run_zone_postcodes)){
	
$location_code = $row_zones_postcodes["location_code"];

if($location_code == $shipping_postcode){

$shipping_zone_id = $zone_id;
	
}
	
}
	
}else{

$shipping_zone_id = $zone_id;
	
}

	
}
	
}
	

}
	
	
}else{


	if(empty($billing_country) and empty($billing_postcode)){

echo "

<li>

<p>

There are no shipping types available. Please double check your address, or contact us if you need any help.

</p>

</li>

";
	
}

$select_zones = "select * from zones order by zone_order DESC";	

$run_zones = mysqli_query($con, $select_zones);

while($row_zones = mysqli_fetch_array($run_zones)){

$zone_id = $row_zones['zone_id'];

$select_zones_locations = "select DISTINCT zone_id from zones_locations where zone_id='$zone_id' and (location_code='$billing_country' and location_type='country')";

$run_zones_locations = mysqli_query($con, $select_zones_locations);

$count_zones_locations = mysqli_num_rows($run_zones_locations);

if($count_zones_locations != "0"){
	
$row_zones_locations = mysqli_fetch_array($run_zones_locations);

$zone_id = $row_zones_locations["zone_id"];

$select_zone_shipping = "select * from shipping where shipping_zone='$zone_id'";

$run_zone_shipping = mysqli_query($con, $select_zone_shipping);

$count_zone_shipping = mysqli_num_rows($run_zone_shipping);

if($count_zone_shipping != "0"){
	
$select_zone_postcodes = "select * from zones_locations where zone_id='$zone_id' and location_type='postcode'";

$run_zone_postcodes = mysqli_query($con, $select_zone_postcodes);

$count_zone_postcodes = mysqli_num_rows($run_zone_postcodes);

if($count_zone_postcodes != "0"){

while($row_zones_postcodes = mysqli_fetch_array($run_zone_postcodes)){
	
$location_code = $row_zones_postcodes["location_code"];

if($location_code == $billing_postcode){

$shipping_zone_id = $zone_id;
	
}
	
}
	
}else{

$shipping_zone_id = $zone_id;
	
}

	
}
	
}
	

}
	
}


if(!empty($shipping_zone_id)){

$select_shipping_types = "
select *,if(
$total_weight > (
select max(shipping_weight) from shipping
where shipping_type=type_id AND shipping_zone='$shipping_zone_id'
),
(
select shipping_cost from shipping 
where shipping_type=type_id AND shipping_zone='$shipping_zone_id' order by shipping_weight DESC LIMIT 0,1
),
(
select shipping_cost from shipping where shipping_type=type_id
AND shipping_zone='$shipping_zone_id' AND shipping_weight >= '$total_weight' order by shipping_weight ASC LIMIT 0,1
)

) AS shipping_cost from shipping_types where type_local='yes' order by type_order ASC
";

$run_shipping_types = mysqli_query($con, $select_shipping_types);

$i = 0;

while($row_shipping_types = mysqli_fetch_array($run_shipping_types)){

$i++;	

$type_id = $row_shipping_types['type_id'];

$type_name = $row_shipping_types['type_name'];

$type_default = $row_shipping_types['type_default'];

$shipping_cost = $row_shipping_types['shipping_cost'];

if(!empty($shipping_cost)){

?>

<li>

<input type="radio" name="shipping_type" value="<?php echo $type_id; ?>" class="shipping_type" data-shipping_cost="<?php echo $shipping_cost; ?>" 

<?php

if(@$_SESSION["shipping_type"] == $type_id){

$_SESSION["shipping_type"] = $type_id;

$_SESSION["shipping_cost"] = $shipping_cost;

echo "checked";
	
}elseif($i == 1){

echo "checked";	
	
}

?>

>

<?php echo $type_name; ?>: <span class="text-muted"> $<?php echo $shipping_cost; ?> </span>

</li>

<?php
	
}
	
}
	
}else{

if(!empty($billing_country) or !empty($shipping_country)){

if(@$_SESSION["is_shipping_address_same"] == "yes"){

$select_country_shipping = "select * from shipping where shipping_country='$billing_country'";
	
}elseif(@$_SESSION["is_shipping_address_same"] == "no"){

$select_country_shipping = "select * from shipping where shipping_country='$shipping_country'";	
	
}else{

$select_country_shipping = "select * from shipping where shipping_country='$billing_country'";	
	
}

$run_country_shipping = mysqli_query($con, $select_country_shipping);

$count_country_shipping = mysqli_num_rows($run_country_shipping);

if($count_country_shipping == "0"){

echo "

<li>

<p>

There are no shipping types matched/available for your address, or contact us if you need any help.

</p>

</li>

";
	
}else{
	
if(@$_SESSION["is_shipping_address_same"] == "yes"){

$select_shipping_types = "
select *,if(
$total_weight > (
select max(shipping_weight) from shipping
where shipping_type=type_id AND shipping_country='$billing_country'
),
(
select shipping_cost from shipping 
where shipping_type=type_id AND shipping_country='$billing_country' order by shipping_weight DESC LIMIT 0,1
),
(
select shipping_cost from shipping where shipping_type=type_id
AND shipping_country='$billing_country' AND shipping_weight >= '$total_weight' order by shipping_weight ASC LIMIT 0,1
)

) AS shipping_cost from shipping_types where type_local='no' order by type_order ASC
";
	
}elseif(@$_SESSION["is_shipping_address_same"] == "no"){

$select_shipping_types = "
select *,if(
$total_weight > (
select max(shipping_weight) from shipping
where shipping_type=type_id AND shipping_country='$shipping_country'
),
(
select shipping_cost from shipping 
where shipping_type=type_id AND shipping_country='$shipping_country' order by shipping_weight DESC LIMIT 0,1
),
(
select shipping_cost from shipping where shipping_type=type_id
AND shipping_country='$shipping_country' AND shipping_weight >= '$total_weight' order by shipping_weight ASC LIMIT 0,1
)

) AS shipping_cost from shipping_types where type_local='no' order by type_order ASC
";
	
}else{

$select_shipping_types = "
select *,if(
$total_weight > (
select max(shipping_weight) from shipping
where shipping_type=type_id AND shipping_country='$billing_country'
),
(
select shipping_cost from shipping 
where shipping_type=type_id AND shipping_country='$billing_country' order by shipping_weight DESC LIMIT 0,1
),
(
select shipping_cost from shipping where shipping_type=type_id
AND shipping_country='$billing_country' AND shipping_weight >= '$total_weight' order by shipping_weight ASC LIMIT 0,1
)

) AS shipping_cost from shipping_types where type_local='no' order by type_order ASC
";	
	
}

$run_shipping_types = mysqli_query($con, $select_shipping_types);

$i = 0;

while($row_shipping_types = mysqli_fetch_array($run_shipping_types)){

$i++;	

$type_id = $row_shipping_types['type_id'];

$type_name = $row_shipping_types['type_name'];

$type_default = $row_shipping_types['type_default'];

$shipping_cost = $row_shipping_types['shipping_cost'];

if(!empty($shipping_cost)){

?>

<li>

<input type="radio" name="shipping_type" value="<?php echo $type_id; ?>" class="shipping_type" data-shipping_cost="<?php echo $shipping_cost; ?>" 

<?php

if(@$_SESSION["shipping_type"] == $type_id){

$_SESSION["shipping_type"] = $type_id;

$_SESSION["shipping_cost"] = $shipping_cost;

echo "checked";
	
}elseif($i == 1){

echo "checked";	
	
}

?>

>

<?php echo $type_name; ?>: <span class="text-muted"> $<?php echo $shipping_cost; ?> </span>

</li>

<?php
	
}
	
}
	
}


	
}
	
}

$total_cart_price = $total + @$_SESSION["shipping_cost"];

?>

</ul><!-- shipping ul list-unstyled Ends -->

</th>

</tr>

<?php } ?>

<tr>

<td class="text-muted bold">Tax</td>

<th>$0.00</th>

</tr>

<tr class="total">

<td>Total</td>

<?php if(count($physical_products) > 0){ ?>

<th class="total-cart-price">$<?php echo $total_cart_price; ?>.00</th>

<?php }else{ ?>

<th class="total-cart-price">$<?php echo $total; ?>.00</th>

<?php } ?>

</tr>

<tr>

<th colspan="2">

<input id="offline-radio" type="radio" name="payment_method" value="pay_offline"

<?php if(@$_SESSION["payment_method"] == "pay_offline"){ echo "checked"; } ?>>

<label for="offline-radio"> Pay Offline </label>

<p id="offline-desc" class="text-muted">

Your order will not be shipped until the funds have cleared in our account.

</P>

</th>

</tr>

<tr>

<th colspan="2">

<input id="stripe-radio" type="radio" name="payment_method" value="stripe"

<?php if(@$_SESSION["payment_method"] == "stripe"){ echo "checked"; } ?>>

<label for="stripe-radio"> Credit Card (Stripe) </label>

<p id="offline-desc" class="text-muted">

Pay with your credit card via Stripe.

</P>

</th>

</tr>

<tr>

<th colspan="2">

<input id="paypal-radio" type="radio" name="payment_method" value="paypal" 

<?php if(@$_SESSION["payment_method"] == "paypal"){ echo "checked"; } ?>>

<label for="paypal-radio"> Paypal </label>

<p id="paypal-desc" class="text-muted">

Pay via PayPal you can pay with your credit card if you don’t have a PayPal account.

</P>

</th>

</tr>

<tr>

<td id="payment-method-forms-td" colspan="2"><!-- payment-method-forms-td Starts -->

<form id="offline-form" action="order.php" method="post"><!-- offline-form Starts -->

<?php if(count($physical_products) > 0){ ?>

<input type="hidden" name="amount" value="<?php echo $total_cart_price; ?>" >

<?php }else{ ?>

<input type="hidden" name="amount" value="<?php echo $total; ?>" >

<?php } ?>

<input type="submit" value="Place Order" id="offline-submit" class="btn btn-success btn-lg" style="border-radius:0px;">

</form><!-- offline-form Ends -->

<?php

include("stripe_config.php");

if(count($physical_products) > 0){
	
$stripe_total_amount = $total_cart_price * 100;
	
}else{
	
$stripe_total_amount = $total * 100;
	
}	

?>

<form id="stripe-form" action="stripe_charge.php" method="post"><!-- stripe-form Starts -->

<?php if(count($physical_products) > 0){ ?>

<input type="hidden" name="total_amount" value="<?php echo $total_cart_price; ?>" >

<?php }else{ ?>

<input type="hidden" name="total_amount" value="<?php echo $total; ?>" >

<?php } ?>

<input type="hidden" name="stripe_total_amount" value="<?php echo $stripe_total_amount; ?>" >

<input

type="submit"

id="stripe-submit"

class="btn btn-success btn-lg"

value="Procced With Stripe"

style="border-radius:0px;"

data-name="computerfever.com"

data-description="Pay With Credit Card"

data-image="images/stripe-logo.png"

data-key="<?php echo $stripe["publishable_key"]; ?>"

data-amount="<?php echo $stripe_total_amount; ?>"

data-currency="usd"

data-email="<?php echo $customer_email; ?>"

>

</form><!-- stripe-form Ends -->

<form id="paypal-form" action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post"><!-- paypal-form Starts -->

<input type="hidden" name="business" value="admin-bussioness@computerfever.com" >

<input type="hidden" name="cmd" value="_cart" >

<input type="hidden" name="upload" value="1" >

<input type="hidden" name="currency_code" value="USD" >

<?php if(count($physical_products) > 0){ ?>

<input type="hidden" name="return" value="http://localhost/ecom_store/paypal_order.php?c_id=<?php echo $customer_id; ?>&amount=<?php echo $total_cart_price; ?>" >

<?php }else{ ?>

<input type="hidden" name="return" value="http://localhost/ecom_store/paypal_order.php?c_id=<?php echo $customer_id; ?>&amount=<?php echo $total; ?>" >

<?php } ?>

<input type="hidden" name="cancel_return" value="http://localhost/ecom_store/checkout.php" >

<?php

$i = 0;

$select_cart = "select * from cart where ip_add='$ip_add'";

$run_cart = mysqli_query($con,$select_cart);

while($row_cart = mysqli_fetch_array($run_cart)){

$product_id = $row_cart['p_id'];

$product_qty = $row_cart['qty'];

$product_price = $row_cart['p_price'];

$get_product = "select * from products where product_id='$product_id'";

$run_product = mysqli_query($con,$get_product);

$row_product = mysqli_fetch_array($run_product);

$product_title = $row_product["product_title"];

$i++;

?>

<input type="hidden" name="item_name_<?php echo $i; ?>" value="<?php echo $product_title; ?>">

<input type="hidden" name="item_nubmer_<?php echo $i; ?>" value="<?php echo $i; ?>">

<input type="hidden" name="amount_<?php echo $i; ?>" value="<?php echo $product_price; ?>">

<input type="hidden" name="quantity_<?php echo $i; ?>" value="<?php echo $product_qty; ?>">

<?php } ?>

<input type="hidden" name="shipping_1" value="<?php echo @$_SESSION["shipping_cost"]; ?>" >

<input type="hidden" name="first_name" value="<?php echo $billing_first_name; ?>" >

<input type="hidden" name="last_name" value="<?php echo $billing_last_name; ?>" >

<input type="hidden" name="address1" value="<?php echo $billing_address_1; ?>" >

<input type="hidden" name="address2" value="<?php echo $billing_address_2; ?>" >

<input type="hidden" name="city" value="<?php echo $billing_city; ?>" >

<input type="hidden" name="state" value="<?php echo $billing_state; ?>" >

<input type="hidden" name="zip" value="<?php echo $billing_postcode; ?>" >

<input type="hidden" name="email" value="<?php echo $customer_email; ?>" >

<input type="submit" id="paypal-submit" name="submit" value="Procced With PayPal" class="btn btn-success btn-lg" style="border-radius:0px;" >

</form><!-- paypal-form Ends -->

</td><!-- payment-method-forms-td Ends -->

</tr>

<script>

$(document).ready(function(){
	
<?php if(@$_SESSION["payment_method"] == "paypal"){ ?>
	
$("#offline-desc").hide();

$("#offline-form").hide();

$("#stripe-desc").hide();

$("#stripe-form").hide();

$("#paypal-desc").show();

$("#paypal-form").show();

<?php }elseif(@$_SESSION["payment_method"] == "pay_offline"){ ?>

$("#offline-desc").show();

$("#offline-form").show();

$("#stripe-desc").hide();

$("#stripe-form").hide();

$("#paypal-desc").hide();

$("#paypal-form").hide();

<?php }elseif(@$_SESSION["payment_method"] == "stripe"){ ?>

$("#offline-desc").hide();

$("#offline-form").hide();

$("#stripe-desc").show();

$("#stripe-form").show();

$("#paypal-desc").hide();

$("#paypal-form").hide();

<?php } ?>

$("#offline-radio").click(function(){
	
$("#offline-desc").show();

$("#offline-form").show();

$("#stripe-desc").hide();

$("#stripe-form").hide();

$("#paypal-desc").hide();

$("#paypal-form").hide();
	
});


$("#stripe-radio").click(function(){
	
$("#offline-desc").hide();

$("#offline-form").hide();

$("#stripe-desc").show();

$("#stripe-form").show();

$("#paypal-desc").hide();

$("#paypal-form").hide();
	
});


$("#paypal-radio").click(function(){
	
$("#offline-desc").hide();

$("#offline-form").hide();

$("#stripe-desc").hide();

$("#stripe-form").hide();

$("#paypal-desc").show();

$("#paypal-form").show();
	
});

$("#offline-submit").click(function(event){
	
event.preventDefault();	

$("#shipping-billing-details-form").submit(function(event){

event.preventDefault();

var confirm_action = confirm("Do You Really Want To Order Cart Products By Pay Offline Method.");

if(confirm_action == true){

$("#offline-submit").click();
	
}
	
});

$("#shipping-details-form-submit-button").click();
	
});

$("#stripe-submit").click(function(event){
	
event.preventDefault();	

$("#shipping-billing-details-form").submit(function(event){

event.preventDefault();

var confirm_action = confirm("Do You Really Want To Order Cart Products By Credit Card (stripe) Method.");

if(confirm_action == true){

var $button = $("#stripe-submit"),
                    $form = $button.parents('form');
                var opts = $.extend({}, $button.data(), {
                    token: function(result) {
                        $form.append($('<input>').attr({ type: 'hidden', name: 'stripeToken', value: result.id })).submit();
                    }
                });
                StripeCheckout.open(opts);
	
}
	
});

$("#shipping-details-form-submit-button").click();
	
});

$("#paypal-submit").click(function(event){
	
event.preventDefault();	

$("#shipping-billing-details-form").submit(function(event){

event.preventDefault();

var confirm_action = confirm("Do You Really Want To Order Cart Products By PayPal Method.");

if(confirm_action == true){

$("#paypal-submit").click();
	
}
	
});

$("#shipping-details-form-submit-button").click();
	
});
	
});

</script>

<?php } ?>