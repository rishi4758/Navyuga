<?php

@session_start();

if(!isset($_SESSION["customer_email"])){

echo "<script>window.open('../checkout.php','_self');</script>";	

}

?>

<?php


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

//Shipping Details Starts

$shipping_first_name = $row_customers_addresses['shipping_first_name'];

$shipping_last_name = $row_customers_addresses['shipping_last_name'];

$shipping_country = $row_customers_addresses['shipping_country'];

$shipping_address_1 = $row_customers_addresses['shipping_address_1'];

$shipping_address_2 = $row_customers_addresses['shipping_address_2'];

$shipping_state = $row_customers_addresses['shipping_state'];

$shipping_city = $row_customers_addresses['shipping_city'];

$shipping_postcode = $row_customers_addresses['shipping_postcode'];


?>

<h2> Billing Address </h2>

<form method="post"><!-- billing adress form Starts -->

<div class="row"><!-- row Starts -->

<div class="col-sm-6"><!-- col-sm-6 Starts -->

<div class="form-group"><!-- form-group Starts -->

<label> First Name: </label>

<input type="text" name="billing_first_name" class="form-control" value="<?php echo $billing_first_name; ?>" required>

</div><!-- form-group Ends -->

</div><!-- col-sm-6 Ends -->

<div class="col-sm-6"><!-- col-sm-6 Starts -->

<div class="form-group"><!-- form-group Starts -->

<label> Last Name: </label>

<input type="text" name="billing_last_name" class="form-control" value="<?php echo $billing_last_name; ?>" required>

</div><!-- form-group Ends -->

</div><!-- col-sm-6 Ends -->

</div><!-- row Ends -->

<div class="form-group"><!-- form-group Starts -->

<label> Country: </label>

<select name="billing_country" class="form-control" required>

<option value=""> Select A Country </option>

<?php

$get_countries = "select * from countries";

$run_countries = mysqli_query($con,$get_countries);

while($row_country = mysqli_fetch_array($run_countries)){

$country_id = $row_country['country_id'];

$country_name = $row_country['country_name'];

?>

<option value="<?php echo $country_id; ?>" 

<?php

if($billing_country == $country_id){ echo "selected"; }

?>

>

<?php echo $country_name; ?>

</option>

<?php
	
}

?>

</select>

</div><!-- form-group Ends -->


<div class="form-group"><!-- form-group Starts -->

<label> Address 1: </label>

<input type="text" name="billing_address_1" class="form-control" value="<?php echo $billing_address_1; ?>" required>

</div><!-- form-group Ends -->


<div class="form-group"><!-- form-group Starts -->

<label> Address 2 (optional): </label>

<input type="text" name="billing_address_2" class="form-control" value="<?php echo $billing_address_2; ?>">

</div><!-- form-group Ends -->

<div class="row"><!-- row Starts -->

<div class="col-sm-6"><!-- col-sm-6 Starts -->

<div class="form-group"><!-- form-group Starts -->

<label> State / County: </label>

<input type="text" name="billing_state" class="form-control" value="<?php echo $billing_state; ?>" required>

</div><!-- form-group Ends -->

</div><!-- col-sm-6 Ends -->

<div class="col-sm-6"><!-- col-sm-6 Starts -->

<div class="form-group"><!-- form-group Starts -->

<label> City / Town: </label>

<input type="text" name="billing_city" class="form-control" value="<?php echo $billing_city; ?>" required>

</div><!-- form-group Ends -->

</div><!-- col-sm-6 Ends -->

</div><!-- row Ends -->

<div class="form-group"><!-- form-group Starts -->

<label> Postcode / Zip : </label>

<input type="text" name="billing_postcode" class="form-control" value="<?php echo $billing_postcode; ?>" required>

</div><!-- form-group Ends -->

<div class="form-group"><!-- form-group Starts -->

<input type="submit" name="update_billing_address" value="Update Billing Address" class="btn btn-primary form-control" >

</div><!-- form-group Ends -->

</form><!-- billing adress form Ends -->


<h2> Shipping Address </h2>

<form method="post"><!-- shipping adress form Starts -->

<div class="row"><!-- row Starts -->

<div class="col-sm-6"><!-- col-sm-6 Starts -->

<div class="form-group"><!-- form-group Starts -->

<label> First Name: </label>

<input type="text" name="shipping_first_name" class="form-control" value="<?php echo $shipping_first_name; ?>" required>

</div><!-- form-group Ends -->

</div><!-- col-sm-6 Ends -->

<div class="col-sm-6"><!-- col-sm-6 Starts -->

<div class="form-group"><!-- form-group Starts -->

<label> Last Name: </label>

<input type="text" name="shipping_last_name" class="form-control" value="<?php echo $shipping_last_name; ?>" required>

</div><!-- form-group Ends -->

</div><!-- col-sm-6 Ends -->

</div><!-- row Ends -->

<div class="form-group"><!-- form-group Starts -->

<label> Country: </label>

<select name="shipping_country" class="form-control" required>

<option value=""> Select A Country </option>

<?php

$get_countries = "select * from countries";

$run_countries = mysqli_query($con,$get_countries);

while($row_country = mysqli_fetch_array($run_countries)){

$country_id = $row_country['country_id'];

$country_name = $row_country['country_name'];

?>

<option value="<?php echo $country_id; ?>" 

<?php

if($shipping_country == $country_id){ echo "selected"; }

?>

>

<?php echo $country_name; ?>

</option>

<?php
	
}

?>

</select>

</div><!-- form-group Ends -->


<div class="form-group"><!-- form-group Starts -->

<label> Address 1: </label>

<input type="text" name="shipping_address_1" class="form-control" value="<?php echo $shipping_address_1; ?>" required>

</div><!-- form-group Ends -->


<div class="form-group"><!-- form-group Starts -->

<label> Address 2 (optional): </label>

<input type="text" name="shipping_address_2" class="form-control" value="<?php echo $shipping_address_2; ?>">

</div><!-- form-group Ends -->

<div class="row"><!-- row Starts -->

<div class="col-sm-6"><!-- col-sm-6 Starts -->

<div class="form-group"><!-- form-group Starts -->

<label> State / County: </label>

<input type="text" name="shipping_state" class="form-control" value="<?php echo $shipping_state; ?>" required>

</div><!-- form-group Ends -->

</div><!-- col-sm-6 Ends -->

<div class="col-sm-6"><!-- col-sm-6 Starts -->

<div class="form-group"><!-- form-group Starts -->

<label> City / Town: </label>

<input type="text" name="shipping_city" class="form-control" value="<?php echo $shipping_city; ?>" required>

</div><!-- form-group Ends -->

</div><!-- col-sm-6 Ends -->

</div><!-- row Ends -->

<div class="form-group"><!-- form-group Starts -->

<label> Postcode / Zip : </label>

<input type="text" name="shipping_postcode" class="form-control" value="<?php echo $shipping_postcode; ?>" required>

</div><!-- form-group Ends -->

<div class="form-group"><!-- form-group Starts -->

<input type="submit" name="update_shipping_address" value="Update Shipping Address" class="btn btn-primary form-control" >

</div><!-- form-group Ends -->

</form><!-- shipping adress form Ends -->

<?php

if(isset($_POST["update_billing_address"])){
	
$billing_first_name = mysqli_real_escape_string($con, $_POST["billing_first_name"]);

$billing_last_name = mysqli_real_escape_string($con, $_POST["billing_last_name"]);

$billing_country = mysqli_real_escape_string($con, $_POST["billing_country"]);

$billing_address_1 = mysqli_real_escape_string($con, $_POST["billing_address_1"]);

$billing_address_2 = mysqli_real_escape_string($con, $_POST["billing_address_2"]);

$billing_state = mysqli_real_escape_string($con, $_POST["billing_state"]);

$billing_city = mysqli_real_escape_string($con, $_POST["billing_city"]);

$billing_postcode = mysqli_real_escape_string($con, $_POST["billing_postcode"]);

$update_billing_address = "update customers_addresses set billing_first_name='$billing_first_name',billing_last_name='$billing_last_name',billing_country='$billing_country',billing_address_1='$billing_address_1',billing_address_2='$billing_address_2',billing_state='$billing_state',billing_city='$billing_city',billing_postcode='$billing_postcode' where customer_id='$customer_id'";

$run_update_billing_address = mysqli_query($con, $update_billing_address);

if($run_update_billing_address){
	
echo "

<script>

alert('Your Account Billing Address Has Been Updated.');

window.open('my_account.php?my_addresses','_self');

</script>

";
	
}

}

if(isset($_POST['update_shipping_address'])){
	
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

if($run_update_shipping_address){
	
echo "

<script>

alert('Your Account Shipping Address Has Been Updated.');

window.open('my_account.php?my_addresses','_self');

</script>

";
	
}
	
}

?>
