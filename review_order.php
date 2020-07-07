<?php

if(!defined("review_order")){
	
echo "<script> window.open('checkout.php','_self'); </script>";	
	
}

?>

<div class="row"><!-- row Starts -->

<?php

$ip_add = getRealUserIp();

$select_cart = "select * from cart where ip_add='$ip_add'";

$run_cart = mysqli_query($con,$select_cart);

$count = mysqli_num_rows($run_cart);

if($count == 0){

?>

<div class="col-md-12"><!-- col-md-12 Starts -->

<div class="box text-center"><!-- box text-center Starts -->

<p class="lead"> Checkout Is Not Available. Your Cart Is Currently Empty. </p>

<a href="shop.php" class="btn btn-primary btn-lg"> Return To Shop </a>

</div><!-- box text-center Ends -->

</div><!-- col-md-12 Ends -->

<?php }else{ ?>

<div class="col-sm-12">
	<p class="lead"> Please Feel Free To Check Your Billing Details And Shipping Details. </p>
</div>
<div class="col-md-8 my_acc_wrap"><!-- col-md-8 Starts -->

<div class="box"><!-- box Starts -->



<form class="form-horizontal" method="post" enctype="multipart/form-data"><!--form-horizontal strts-->

<h2> Billing Details </h2>

<div class="row"><!-- row Starts -->

<div class="col-sm-6"><!-- col-sm-6 Starts -->



<div class="form-group" ><!-- form-group Starts -->

<label> First Name: </label>

<input type="text" name="billing_first_name" class="form-control" required>

</div><!-- form-group Ends -->

</div><!-- col-sm-6 Ends -->

<div class="col-sm-6"><!-- col-sm-6 Starts -->

<div class="form-group"><!-- form-group Starts -->

<label> Last Name: </label>

<input type="text" name="billing_last_name" class="form-control" required>

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

{ echo "selected"; }

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

<input type="text" name="billing_address_1" class="form-control" required>

</div><!-- form-group Ends -->


<div class="form-group"><!-- form-group Starts -->

<label> Address 2 (optional): </label>

<input type="text" name="billing_address_2"  class="form-control" >

</div><!-- form-group Ends -->

<div class="row"><!-- row Starts -->

<div class="col-sm-6"><!-- col-sm-6 Starts -->

<div class="form-group"><!-- form-group Starts -->

<label> State / County: </label>

<input type="text" name="billing_state" class="form-control" required>

</div><!-- form-group Ends -->

</div><!-- col-sm-6 Ends -->

<div class="col-sm-6"><!-- col-sm-6 Starts -->

<div class="form-group"><!-- form-group Starts -->

<label> City / Town: </label>

<input type="text" name="billing_city" class="form-control" required>

</div><!-- form-group Ends -->

</div><!-- col-sm-6 Ends -->

</div><!-- row Ends -->

<div class="form-group"><!-- form-group Starts -->

<label> Postcode / Zip : </label>

<input type="text" name="billing_postcode" class="form-control"  required>

</div><!-- form-group Ends -->


<div class="form-group"><!-- form-group Starts -->


<input type="hidden" name="amount" class="form-control" value="<?php echo $total; ?>" >



<input type="submit" value="Place Order"  name="order" id="order_id"  class="btn btn-primary" style="border-radius:0px;">


</div><!-- form-group Ends -->

</form>



 <?php
 
 
 
 
 


 

 
	                        $ip_add = getRealUserIp();
	                        
	                        $select_cart = "select * from cart where ip_add='$ip_add'";
	                        
	                        $run_cart = mysqli_query($con,$select_cart);
	                        
	                        $count = mysqli_num_rows($run_cart);
	                        
	                      
	                                 $total = 0;
	                              
	                                 
	                                 $physical_products = array();
	                                 
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
	                                 
	                                 
	                               
	                                 $sub_total = $only_price*$pro_qty;
	                                 
	                                 $_SESSION['pro_qty'] = $pro_qty;
	                                 
	                                 $total += $sub_total;}}
	                                 
	                                 ?>

<!-- shipping-billing-details-form Ends -->

</div><!-- box Ends -->

</div><!-- col-md-8 Starts -->

<div class="col-md-4"><!-- col-md-4 Starts -->

<div class="box" id="order-summary"><!-- box Starts -->

<div class="box-header"><!-- box-header Starts -->

<h3> Order Summary </h3>

</div><!-- box-header Ends -->

<table class="table"><!-- table Starts -->

<thead>

<tr>

<th class="text-muted lead"> Product: </th>

<th class="text-muted lead"> Total: </th>

</tr>

</thead>

<tbody id="checkout-tbody-reload"><!-- tbody Starts -->

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



$sub_total = $product_price * $product_qty;

$total += $sub_total;


?>

<tr>

<td>

<a href="#" class="bold"> <?php echo $product_title; ?> </a>

<i class="fa fa-times" title="Product Qty"></i> <?php echo $product_qty; ?> 

<?php if($product_size != "None"){ ?>

<i class="fa fa-plus" title="Product Size"></i> <?php echo $product_size; ?> 

<?php } ?>

</td>

<th><span class=" fa fa-inr"><?php echo $sub_total; ?></span> </th>

</tr>

<?php } ?>

<tr>

<td class="text-muted bold"> Order Subtotal </td>

<th> <span class=" fa fa-inr"><?php echo $total; ?>.00 </span></th>

</tr>

</tbody><!-- tbody Ends -->

</table><!-- table Ends -->

</div><!-- box Ends -->

</div><!-- col-md-4 Starts -->


<tr>
<!--##########################  method starts#################################-->









<?php } ?>

</div><!-- row Ends -->
