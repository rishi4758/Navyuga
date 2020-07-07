<?php
   session_start();
   
   include("includes/db.php");
   
   include("functions/functions.php");
   
   ?>
<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>E-commerce Store</title>
      <link rel="stylesheet" href="styles/custom_style.css">
   </head>
   <body>
      <?php include("includes/header.php"); ?>
      <div id="content" >
         	<!-- content Starts -->
         	<div class="container" >
            <!-- container Starts -->
            <div class="row">
	            <div class="col-md-12" >
	               <!--- col-md-12 Starts -->
	               <ul class="breadcrumb" >
	                  <!-- breadcrumb Starts -->
	                  <li>
	                     <a href="index.php">Home</a>
	                  </li>
	                  <li>Cart</li>
	               </ul>
	               <!-- breadcrumb Ends -->
	               <nav class="checkout-breadcrumbs">
	                  <a href="cart.php" class="active"> Shopping Cart </a>
	                  <i class="fa fa-chevron-right"></i>
	                  <a href="checkout.php"> Checkout Details </a>
	                  <i class="fa fa-chevron-right"></i>
	                  <a href="#"> Order Complete </a>
	               </nav>
	            </div>
	          </div>
            <!--- row Ends -->

            <div class="row">
	            <div class="col-md-9" id="cart" >
	               <!-- col-md-9 Starts -->
	               <div class="box" >
	                  <!-- box Starts -->
	                  <form action="cart.php" method="post" enctype="multipart-form-data" >
	                     <!-- form Starts -->
	                     <h1> Shopping Cart </h1>
	                     <?php
	                        $ip_add = getRealUserIp();
	                        
	                        $select_cart = "select * from cart where ip_add='$ip_add'";
	                        
	                        $run_cart = mysqli_query($con,$select_cart);
	                        
	                        $count = mysqli_num_rows($run_cart);
	                        
	                        ?>
	                     <p class="text-muted" > You currently have <?php echo items(); ?> item(s) in your cart. </p>
	                     <div class="table-responsive" >
				            <!---cart-mobile-Ends -->
	                        <!-- table-responsive Starts -->
	                        <table class="table hidden-xs">
	                           <!-- table Starts -->
	                           <thead>
	                              <!-- thead Starts -->
	                              <tr>
	                                 <th colspan="2" >Product</th>
	                                 <th>Quantity</th>
	                                 <th>Unit Price</th>
	                                 <th>Size</th>
	                                 <th colspan="1">Delete</th>
	                                 <th colspan="2"> Sub Total </th>
	                              </tr>
	                           </thead>
	                           <!-- thead Ends -->
	                           <tbody id="cart-products-tbody">
	                              <!-- tbody Starts -->
	                              <?php
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
	                                 
	                                 $total += $sub_total;
	                                 
	                                 ?>
	                              <tr>
	                                 <!-- tr Starts -->
	                                 <td>
	                                    <img src="vendor/product_images/<?php echo $product_img1; ?>" >
	                                 </td>
	                                 <td>
	                                    <a href="#" > <?php echo $product_title; ?> </a>
	                                 </td>
	                                 <td>
	                                    <input type="text" name="quantity" value="<?php echo $_SESSION['pro_qty']; ?>" data-product_id="<?php echo $pro_id; ?>" class="quantity form-control">
	                                 </td>
	                                 <td>
	                                    <i class='fa fa-inr'></i><?php echo $only_price; ?>.00
	                                 </td>
	                                 <td>
	                                    <?php echo $pro_size; ?>
	                                 </td>
	                                 <td>
	                                    <input type="checkbox" name="remove[]" value="<?php echo $pro_id; ?>">
	                                 </td>
	                                 <td>
	                                    <i class='fa fa-inr'></i><?php echo $sub_total; ?>.00
	                                 </td>
	                              </tr>
	                              <!-- tr Ends -->
								  
								  
	                           </tbody>
	                           <!-- tbody Ends -->
							   
							   
								  <!---cart-mobile-start-->
				            <div class="mobile_cart visible-xs">
				            	<div class="itm_row">
					            	<div class="itm_img">
					            		<span>
					            			<img src="vendor/product_images/<?php echo $product_img1; ?>" >
					            		</span>
					            	</div>
					            	<div class="itm_description">
					            		<div class="itm_title">
					            			 <a href="#" > <?php echo $product_title; ?> </a>
					            		</div>
					            		<div class="itm_price">
					            			<span class="price"><i class='fa fa-inr'></i><?php echo $only_price; ?>.00</span>
					            			<div class="qty_wrap">
											
											
											 <input type="text"placeholder="quantity" name="quantity" value="<?php echo $_SESSION['pro_qty']; ?>" data-product_id="<?php echo $pro_id; ?>" class="quantity form-control">
												 	</div>
											</div>
					            		</div>
					            		<div class="del_item">
					            			<input type="checkbox" name="remove[]" value="<?php echo $pro_id; ?>"><span class="text-bold" style="font-size:20px;">delete</span>
					            		</div>
					            	</div>
					            </div>
				            </div> <!---cart-mobile-Ends -->
							
	                              <?php } } ?>
	                           <tfoot>
	                              <!-- tfoot Starts -->
	                              <tr>
	                                 <th colspan="5"> Total </th>
	                                 <th colspan="2"> <span class="subtotal-cart-price"><i class='fa fa-inr'></i><?php echo $total; ?></span>.00 </th>
	                              </tr>
	                           </tfoot>
	                           <!-- tfoot Ends -->
	                        </table>
	                        <!-- table Ends -->
							
	                     	
							
	                        <div class="form-inline pull-right coupen_Wrap">
	                           <!-- form-inline pull-right Starts -->
	                           <div class="form-group">
	                              <!-- form-group Starts -->
	                              <label>Coupon Code : </label>
	                              <input type="text" name="code" class="form-control">
	                           </div>
	                           <!-- form-group Ends -->
	                           <input class="btn btn-primary" type="submit" name="apply_coupon" value="Apply Coupon Code" >
	                        </div>
	                        <!-- form-inline pull-right Ends -->
	                     </div>
	                     <!-- table-responsive Ends -->
	                     <div class="box-footer">
	                        <!-- box-footer Starts -->
	                        <div class="pull-left">
	                           <!-- pull-left Starts -->
	                           <a href="index.php" class="btn btn-default">
	                           <i class="fa fa-chevron-left"></i> Continue Shopping
	                           </a>
	                        </div>
	                        <!-- pull-left Ends -->
	                        <div class="pull-right">
	                           <!-- pull-right Starts -->
	                           <button class="btn btn-default" type="submit" name="update" value="Update Cart">
	                           <i class="fa fa-refresh"></i> Update Cart
	                           </button>
	                           <a href="checkout.php" class="btn btn-primary">
	                           Proceed to checkout <i class="fa fa-chevron-right"></i>
	                           </a>
	                        </div>
	                        <!-- pull-right Ends -->
	                     </div>
	                     <!-- box-footer Ends -->
	                  </form>
	                  <!-- form Ends -->
	               </div>
	               <!-- box Ends -->
	               <?php
	                  if(isset($_POST['apply_coupon'])){
	                  
	                  $code = $_POST['code'];
	                  
	                  if($code == ""){
	                  
	                  
	                  }
	                  else{
	                  
	                  $get_coupons = "select * from coupons where coupon_code='$code'";
	                  
	                  $run_coupons = mysqli_query($con,$get_coupons);
	                  
	                  $check_coupons = mysqli_num_rows($run_coupons);
	                  
	                  if($check_coupons == 1){
	                  
	                  $row_coupons = mysqli_fetch_array($run_coupons);
	                  
	                  $coupon_pro = $row_coupons['product_id'];
	                  
	                  $coupon_price = $row_coupons['coupon_price'];
	                  
	                  $coupon_limit = $row_coupons['coupon_limit'];
	                  
	                  $coupon_used = $row_coupons['coupon_used'];
	                  
	                  
	                  if($coupon_limit == $coupon_used){
	                  
	                  echo "<script>alert('Your Coupon Code Has Been Expired')</script>";
	                  
	                  }
	                  else{
	                  
	                  $get_cart = "select * from cart where p_id='$coupon_pro' AND ip_add='$ip_add'";
	                  
	                  $run_cart = mysqli_query($con,$get_cart);
	                  
	                  $check_cart = mysqli_num_rows($run_cart);
	                  
	                  
	                  if($check_cart == 1){
	                  
	                  $add_used = "update coupons set coupon_used=coupon_used+1 where coupon_code='$code'";
	                  
	                  $run_used = mysqli_query($con,$add_used);
	                  
	                  $update_cart = "update cart set p_price='$coupon_price' where p_id='$coupon_pro' AND ip_add='$ip_add'";
	                  
	                  $run_update = mysqli_query($con,$update_cart);
	                  
	                  echo "<script>alert('Your Coupon Code Has Been Applied')</script>";
	                  
	                  echo "<script>window.open('cart.php','_self')</script>";
	                  
	                  }
	                  else{
	                  
	                  echo "<script>alert('Product Does Not Exist In Cart')</script>";
	                  
	                  }
	                  
	                  }
	                  
	                  }
	                  else{
	                  
	                  echo "<script> alert('Your Coupon Code Is Not Valid') </script>";
	                  
	                  }
	                  
	                  }
	                  
	                  
	                  }
	                  
	                  
	                  ?>
	               <?php
	                  function update_cart(){
	                  
	                  global $con;
	                  
	                  if(isset($_POST['update'])){
	                  
	                  foreach($_POST['remove'] as $remove_id){
	                  
	                  
	                  $delete_product = "delete from cart where p_id='$remove_id'";
	                  
	                  $run_delete = mysqli_query($con,$delete_product);
	                  
	                  if($run_delete){
	                  echo "<script>window.open('cart.php','_self')</script>";
	                  }
	                  
	                  
	                  
	                  }
	                  
	                  
	                  
	                  
	                  }
	                  
	                  
	                  
	                  }
	                  
	                  echo @$up_cart = update_cart();
	                  
	                  ?>
	                
	            </div>
	            <!-- col-md-9 Ends -->
	            <div class="col-md-3">
	               <!-- col-md-3 Starts -->
	               	<div class="box" id="order-summary">
	                  <!-- box Starts -->
	                  <div class="box-header">
	                     <!-- box-header Starts -->
	                     <h3>Order Summary</h3>
	                  </div>
	                  <!-- box-header Ends -->
	                  <p class="text-muted">
	                     Shipping and additional costs are calculated based on the values you have entered.
	                  </p>
	                  <div class="table-responsive">
	                     <!-- table-responsive Starts -->
	                     <table class="table">
	                        <!-- table Starts -->
	                        <tbody id="cart-summary-tbody">
	                           <!-- tbody Starts -->
	                           <tr>
	                              <td> Order Subtotal </td>
	                               <th>
								  <p> <i class='fa fa-inr'></i><?php echo $total; ?>.00 </th>
	                           </tr>
	                           <?php if(count($physical_products) > 0){ ?>
	                           <tr>
	                              
	                           </tr>
	                           <?php 
	                              $total_cart_price = $total ;
	                              
	                              } 
	                              
	                              ?>
	                           <tr>
	                              <td>Tax</td>
	                              <th><i class='fa fa-inr'></i>0.00</th>
	                           </tr>
	                           <tr class="total">
	                              <td>Total</td>
	                              <?php if(count($physical_products) > 0){ ?>
	                              <th class="total-cart-price"><i class='fa fa-inr'></i><?php echo $total_cart_price; ?>.00</th>
	                              <?php }else{ ?>
	                              <th class="total-cart-price"><i class='fa fa-inr'></i><?php echo $total; ?>.00</th>
	                              <?php } ?>
	                           </tr>
	                        </tbody>
	                        <!-- tbody Ends -->
	                     </table>
	                     <!-- table Ends -->
	                  </div>
	                  <!-- table-responsive Ends -->
	               </div>
	               <!-- box Ends -->
	            </div>
	            <!-- col-md-3 Ends -->
            </div>
            <!--- row Ends -->

            

            <div id="same-height-row" class="also_likewrap">
	            <div class="row">      
	                  <!-- row same-height-row Starts -->
	                  <div class="col-sm-12">
	                     <!-- col-md-3 col-sm-6 Starts -->
	                     <div class="box same-height">
	                        <!-- box same-height headline Starts -->
	                        <h3 class="text-center"> You may also like these Products </h3>
	                     </div>
	                     <!-- box same-height headline Ends -->
	                  </div>
	                  <!-- col-md-3 col-sm-6 Ends -->
	                 <?php
							$get_products = "select * from products order by rand() LIMIT 0,3";

							$run_products = mysqli_query($con,$get_products); 

							while($row_products = mysqli_fetch_array($run_products)) {

							$pro_id = $row_products['product_id'];

							$pro_title = $row_products['product_title'];

							$pro_price = $row_products['product_price'];

							$pro_img1 = $row_products['product_img1'];

							

							$manufacturer_id = $row_products['manufacturer_id'];

							$get_manufacturer = "select * from manufacturers where manufacturer_id='$manufacturer_id'";

							$run_manufacturer = mysqli_query($db,$get_manufacturer);

							$row_manufacturer = mysqli_fetch_array($run_manufacturer);

							$manufacturer_name = $row_manufacturer['manufacturer_title'];

							$pro_psp_price = $row_products['product_psp_price'];

							$pro_url = $row_products['product_url'];


							

							$product_price = "<del> <i class='fa fa-inr'></i>$pro_price </del>";

							$product_psp_price = "| <i class='fa fa-inr'></i>$pro_psp_price";

							



							echo "

							<div class='col-md-3 col-xs-6 alsolike_product'>
								<div class='product' >
									<a href='$pro_url' class='item_img'>
										<img src='admin_area/product_images/$pro_img1' class='img-responsive' >
									</a>

									<div class='text' >
										<center>
											<p class='btn btn-primary'> $manufacturer_name </p>
										</center>
										<hr>
										<h3><a href='$pro_url' >$pro_title</a></h3>
										<div class='rating_wrap'>
											<p class='price' > $product_price $product_psp_price </p>
											<div class='ratings'>
												<i class='fa fa-star'></i>
												<i class='fa fa-star'></i>
												<i class='fa fa-star'></i>
												<i class='fa fa-star'></i>
												<i class='fa fa-star'></i>
											</div>
										</div>
										<p class='buttons' >
											<a href='$pro_url' class='btn btn-default' >View details</a>
											<a href='$pro_url' class='btn btn-primary'>
												<i class='fa fa-shopping-cart'></i> Add to cart
											</a>
										</p>
									</div>
									
								</div>
							</div>

							";


							}


							?>

						

	          	</div>
	          </div>
	          <!-- row same-height-row Ends -->
         	</div>
         <!-- container Ends -->
      </div>
      <!-- content Ends -->
      <?php
         include("includes/footer.php");
         
         ?>
      <script>
         $(document).ready(function(data){
         
         $(document).on('keyup', '.quantity', function(){
         
         var id = $(this).data("product_id");
         
         var quantity = $(this).val();
         
       
         
         
         if(quantity  != ''){
         
         $.ajax({
         
         url:"change.php",
         
         method:"POST",
         
         data:{id:id, quantity:quantity},
         
         success:function(data){
         	
         $(".subtotal-cart-price").html(data);
         
         $("#cart-products-tbody").load("cart_products_tbody.php");
         
         $("#cart-summary-tbody").load("cart_summary_tbody.php");
         
         }
         
         });
         
         }
         
         });
         
         <?php if(count($physical_products) > 0){ ?>
         
         $(document).on("change", function(){
         	
        
         var total = Number(<?php echo $total; ?>);
         
         var total_cart_price = total;
         
         $(".total-cart-price").html("$" + total_cart_price + ".00");
         	
         });
         
         <?php } ?>
         
         });
         
      </script>
   </body>
</html>