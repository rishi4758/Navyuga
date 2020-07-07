
<!-- footer Starts -->
<footer id="footer">
	<div class="container"><!-- container Starts -->
		<div class="row" ><!-- row Starts -->
			<div class="col-md-3 col-sm-6 col-xs-6 foter_col"><!-- col-md-3 col-sm-6 Starts -->
				<h4 class="foter_title">Pages</h4>
				<ul><!-- ul Starts -->
					<li><a href="../cart.php">Shopping Cart</a></li>
					
					<li><a href="../shop.php">Shop</a></li>
					<li>
					<?php
					if(!isset($_SESSION['customer_email'])){
					echo "<a href='../checkout.php' >My Account</a>";
					}
					else{
					echo "<a href='my_account.php?my_orders'>My Account</a>";
					}
					?>
					</li>
				</ul><!-- ul Ends -->
				
			</div><!-- col-md-3 col-sm-6 Ends -->

			<div class="col-md-3 col-sm-6 col-xs-6 foter_col"><!-- col-md-3 col-sm-6 Starts -->
				<h4 class="foter_title">Top Products Categories </h4>
				<ul><!-- ul Starts -->

					<?php

					$get_p_cats = "select * from product_categories";

					$run_p_cats = mysqli_query($con,$get_p_cats);

					while($row_p_cats = mysqli_fetch_array($run_p_cats)){

					$p_cat_id = $row_p_cats['p_cat_id'];

					$p_cat_title = $row_p_cats['p_cat_title'];

					echo "<li> <a href='../shop.php?p_cat=$p_cat_id'> $p_cat_title </a> </li>";

					}

					?>
				</ul><!-- ul Ends -->
			</div><!-- col-md-3 col-sm-6 Ends -->

			<div class="col-md-3 col-sm-6 col-xs-6 hidden-xs foter_col"><!-- col-md-3 col-sm-6 Starts -->
				<h4 class="foter_title">Where to find us</h4>
				<address>
					<strong>RRAJ SOFT</strong>
					<br>Green Park
					<br>Phagwara
					<br>rahul.rr58@gmail.com
					<br>Rahul Raj
				</address>
				
			</div><!-- col-md-3 col-sm-6 Ends -->

			<div class="col-md-3 col-sm-6 col-xs-12 foter_col"><!-- col-md-3 col-sm-6 Starts -->
				<h4 class="foter_title">Get the news</h4>
				<p class="">
					The peacock  is our national bird   
				</p>

				<form action="https://feedburner.google.com/fb/a/mailverify" method="post" target="popupwindow" onsubmit="window.open('https://feedburner.google.com/fb/a/mailverify?uri=computerfever', 'popupwindow', 'scrollbars=yes,width=550,height=520');return true"><!-- form Starts -->
					<div class=""><!-- input-group Starts -->
						<input type="text" class="form-control" name="email" placeholder="Enter your email">
						<input type="hidden" value="computerfever" name="uri"/>
						<input type="hidden" name="loc" value="en_US"/>
					</div><!-- input-group Ends -->
					<div class="input-group-btn"><!-- input-group-btn Starts -->
						<input type="submit" value="subscribe" class="btn btn-default">
					</div><!-- input-group-btn Ends -->
				</form><!-- form Ends -->

				<!-- <h4 class="foter_title">Stay in touch </h4> -->
				<div class="social"><!-- social Starts --->
					<ul class="list-inline">
						<li><a href="https://www.facebook.com"><i class="fa fa-facebook"></i></a></li>
						<li><a href="https://www.twitter.com"><i class="fa fa-twitter"></i></a></li>
						<li><a href="https://www.youtube.com"><i class="fa fa-youtube"></i></a></li>
						<li><a href="https://www.instagram.com"><i class="fa fa-instagram"></i></a></li>
						<li><a href="https://www.linkedin.com"><i class="fa fa-linkedin"></i></a></li>
						<li><a href="https://www.gmail.com"><i class="fa fa-envelope"></i></a></li>
					</ul>
				</div><!-- social Ends --->
			</div><!-- col-md-3 col-sm-6 Ends -->
		</div><!-- row Ends -->
	</div><!-- container Ends -->
</footer>
<!-- footer Ends -->

<!-- copyright Starts -->
<div id="copyright">
	<div class="container"><!-- container Starts -->
		<div class="pull-left"><!-- col-md-6 Starts -->
			Copyright &copy; 2018 NAVYUGA, All Rights Reserved.
		</div><!-- col-md-6 Ends -->
		<div class="pull-right">
			<ul class="list-inline">
				<li><a href="#">Terms and conditions</a></li>|
				<li><a href="../privacy.php">Privacy policy</a></li>
			</ul>
		</div><!-- col-md-6 Ends -->
	</div><!-- container Ends -->
</div>
<!-- copyright Ends -->

<div class="menu_backdrop"></div>

<script src="js/jquery.min.js"> </script>
<script src="js/bootstrap.min.js"></script>
<script src="js/custom_script.js"></script>





