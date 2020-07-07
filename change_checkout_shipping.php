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

$billing_first_name = $row_customers_addresses['billing_first_name'];

$billing_last_name = $row_customers_addresses['billing_last_name'];

$billing_country = $row_customers_addresses['billing_country'];

$billing_address_1 = $row_customers_addresses['billing_address_1'];

$billing_address_2 = $row_customers_addresses['billing_address_2'];

$billing_state = $row_customers_addresses['billing_state'];

$billing_city = $row_customers_addresses['billing_city'];

$billing_postcode = $row_customers_addresses['billing_postcode'];


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

$total = $_POST["total"];

$shipping_type = $_POST["shipping_type"];

$shipping_cost = $_POST["shipping_cost"];

$payment_method = $_POST["payment_method"];

$_SESSION["shipping_type"] = $shipping_type;

$_SESSION["shipping_cost"] = $shipping_cost;

$total_cart_price = $total + $shipping_cost;

?>

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

<script>

$(document).ready(function(){
	
<?php if($payment_method == "paypal"){ ?>
	
$("#offline-desc").hide();

$("#offline-form").hide();

$("#stripe-desc").hide();

$("#stripe-form").hide();

$("#paypal-desc").show();

$("#paypal-form").show();

<?php }elseif($payment_method == "pay_offline"){ ?>

$("#offline-desc").show();

$("#offline-form").show();

$("#stripe-desc").hide();

$("#stripe-form").hide();

$("#paypal-desc").hide();

$("#paypal-form").hide();

<?php }elseif($payment_method == "stripe"){ ?>

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