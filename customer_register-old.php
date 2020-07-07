<?php

session_start();

include("includes/db.php");

include("functions/functions.php");

if(isset($_SESSION['customer_email'])){

echo "<script> window.open('index.php','_self'); </script>";	

}

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

<!--header-Starts-->
  <header>
    <!-- top Starts -->
    <div id="top">
      <div class="container-fluid"><!-- container Starts -->
        <div class="offer">
          <a href="#" class="welcome_msg">
            <?php 
            if (!isset($_SESSION['customer_email'])) {
              # code...

              echo "Welcome to Computerfever !!";
            }
              
            else
            {

            echo "Welcome : " .$_SESSION['customer_email'] ."";

            }
            ?>
          </a>
          <!-- <a href="#">
            Shopping Cart Total Price: <?php total_price(); ?>, Total Items  <?php items(); ?>
          </a> -->
        </div><!--offer Ends -->

        <div class="login_rightwrap">
          <ul class="menu list-inline"><!-- menu Starts -->
            <li>
              <?php
              if (!isset($_SESSION['customer_email'])) {
                # code...

                echo "<a href='checkout.php' ><i class='fa fa-user'></i></a>";
              }else{

                echo "<a href='customer/my_account.php?my_orders'><i class='fa fa-user'></i></a>";
                }
              ?>
            </li>

            <li>  
              <a href="cart.php">
                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
              </a>
            </li>

            <li class="login_link"> <!--login/logout page-->
              <?php 
              if (!isset($_SESSION['customer_email'])) {

                echo "<a href='checkout.php'> Login </a>";


                # code...
              }else

              {

              echo "<a href='logout.php'> Logout </a>";

              }

              ?>
            </li> <!--login/logout page end-->
            <li class="register_link">
              <a href="customer_register.php">Register</a>
            </li>
          </ul><!-- menu Ends -->
        </div><!--login_rightwrap-Ends -->
      </div><!-- container Ends -->
    </div>
    <!-- top Ends -->

    <div class="nav_wrap_main" id="navbar"><!-- navbar navbar-default Starts -->
      <div class="container-fluid" ><!-- container Starts -->
        <div class="mobile_toggle">
          <span class="one"></span>
          <span class="two"></span>
          <span class="three"></span>
        </div>
        <div class="navbar-header"><!-- navbar-header Starts -->
          <a class="home" href="index.php" ><!--- navbar navbar-brand home Starts -->
            <img src="images/logo.png" alt="computerfever" class="hidden-xs">
            <img src="images/logo-small.png" alt="computerfever" class="visible-xs">
          </a><!--- navbar navbar-brand home Ends -->
        </div><!-- navbar-header Ends -->
        
        <div class="shop_categorydesktop">
          <div class="dropdown">
            <button class="btn dropdown-toggle" type="button" id="category_dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
              <span class="fa fa-bars"></span>
              Shop By Category
            </button>
            <ul class="dropdown-menu" aria-labelledby="category_dropdown">
              <li><a href="#">Men</a></li>
              <li><a href="#">Women</a></li>
              <li><a href="#">Accesories</a></li>
              <li><a href="#">Electronics</a></li>
            </ul>
          </div>
        </div>      
        <!-- collapse clearfix Starts -->
        <div class="clearfix" id="search">
          <form class="navbar-form" method="get" action="results.php"><!-- navbar-form Starts -->
            <div class="input-group"><!-- input-group Starts -->
              <input class="form-control" type="text" placeholder="search for a Product, Brand or Category" name="user_query" required>
              <span class="input-group-btn"> <!-- input-group-btn Starts -->
                <button type="submit" value="Search" name="search" class="btn">
                  <i class="fa fa-search"></i>
                </button>
              </span> <!--input-group-btn end-->
            </div><!-- input-group Ends -->
          </form><!-- navbar-form Ends -->
        </div>
        <!-- collapse clearfix Ends --> 
        <div class="nav_wrap" id="navigation" ><!-- navbar-collapse collapse Starts -->
          <ul class="list-inline">
            <li>  
              <a href="cart.php">
                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
              </a>
            </li>
            <li>
              <?php
              if (!isset($_SESSION['customer_email'])) {
                # code...
                echo "<a href='checkout.php' ><i class='fa fa-user'></i></a>";
              }else{
                echo "<a href='customer/my_account.php?my_orders'><i class='fa fa-user'></i></a>";
                }
              ?>
            </li>
          </ul>

          <!-- btn btn-primary navbar-btn right Starts -->
          <!-- <a class="btn btn-primary navbar-btn right" href="cart.php">
            <i class="fa fa-shopping-cart"></i>
            <span> <?php items(); ?> items in cart </span>
          </a> -->
          <!-- btn btn-primary navbar-btn right Ends -->

          <!-- navbar-collapse collapse right Starts -->
          <!-- <div class="navbar-collapse collapse right">
            <button class="btn navbar-btn btn-primary" type="button" data-toggle="collapse" data-target="#search">
              <span class="sr-only">Toggle Search</span>
              <i class="fa fa-search"></i>
            </button>
          </div> -->
          <!-- navbar-collapse collapse right Ends -->
        </div><!-- navbar-collapse collapse Ends -->
        <div class="Shopcategory_mobile">
          <div class="user_section">
            <span class="user_pic">
              <img src="images/user_pic.png" alt="user">
            </span>
            <span class="user_name">
              John Deo
            </span>
          </div>
          <ul class="cat_listmobile">
            <li class="parent_nav">
              <a href="index.php">Appliances</a>
              <span></span>
              <ul>
                <li>
                  <a href="#">subnav1</a>
                </li>
                <li><a href="#">subnav2</a></li>
                <li><a href="#">subnav3</a></li>
                <li><a href="#">subnav4</a></li>
              </ul>
            </li>
            <li class="parent_nav">
              <a href="#">Men's Fashion</a>
              <span></span>
              <ul>
                <li><a href="#">subnav1</a></li>
                <li><a href="#">subnav2</a></li>
                <li><a href="#">subnav3</a></li>
                <li><a href="#">subnav4</a></li>
              </ul>
            </li>
            <li class="parent_nav">
              <a href="#">Women's Fashion</a>
              <span></span>
              <ul>
                <li><a href="#">subnav1</a></li>
                <li><a href="#">subnav2</a></li>
                <li><a href="#">subnav3</a></li>
                <li><a href="#">subnav4</a></li>
              </ul>
            </li>
            <li class="parent_nav">  
              <a href="#">Home & Kitchen</a>
              <span></span>
              <ul>
                <li><a href="#">subnav1</a></li>
                <li><a href="#">subnav2</a></li>
                <li><a href="#">subnav3</a></li>
                <li><a href="#">subnav4</a></li>
              </ul>
            </li>
            <li class="parent_nav">
              <a href="#">Mobile and Tablets</a>
              <span></span>
              <ul>
                <li><a href="#">subnav1</a></li>
                <li><a href="#">subnav2</a></li>
                <li><a href="#">subnav3</a></li>
                <li><a href="#">subnav4</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div><!-- container Ends -->
    </div><!-- navbar navbar-default Ends -->
  </header>
  <!--header-End-->


<div id="content" ><!-- content Starts -->
<div class="container" ><!-- container Starts -->
  <div class="row">
    <div class="col-md-12" ><!--- col-md-12 Starts -->
      <ul class="breadcrumb" ><!-- breadcrumb Starts -->
        <li>
          <a href="index.php">Home</a>
        </li>
        <li>Register</li>
      </ul><!-- breadcrumb Ends -->
    </div><!--- col-md-12 Ends -->
  </div>

<div class="row">
<div class="col-md-12" ><!-- col-md-12 Starts -->

<div class="box" ><!-- box Starts -->

<div class="box-header" ><!-- box-header Starts -->

<center><!-- center Starts -->

<h2> Register A New Account </h2>



</center><!-- center Ends -->

</div><!-- box-header Ends -->

<form action="customer_register.php" method="post" enctype="multipart/form-data" ><!-- form Starts -->

<div class="form-group" ><!-- form-group Starts -->

<label>Customer Name</label>

<input type="text" class="form-control" name="c_name" required>

</div><!-- form-group Ends -->

<div class="form-group"><!-- form-group Starts -->

<label> Customer Email</label>

<input type="email" class="form-control" name="c_email" required>

</div><!-- form-group Ends -->

<div class="form-group"><!-- form-group Starts -->

<label> Customer Password </label>

<div class="input-group"><!-- input-group Starts -->

<span class="input-group-addon"><!-- input-group-addon Starts -->

<i class="fa fa-check tick1"> </i>

<i class="fa fa-times cross1"> </i>

</span><!-- input-group-addon Ends -->

<input type="password" class="form-control" id="pass" name="c_pass" required>

<span class="input-group-addon"><!-- input-group-addon Starts -->

<div id="meter_wrapper"><!-- meter_wrapper Starts -->

<span id="pass_type"> </span>

<div id="meter"> </div>

</div><!-- meter_wrapper Ends -->

</span><!-- input-group-addon Ends -->

</div><!-- input-group Ends -->

</div><!-- form-group Ends -->


<div class="form-group"><!-- form-group Starts -->

<label> Confirm Password </label>

<div class="input-group"><!-- input-group Starts -->

<span class="input-group-addon"><!-- input-group-addon Starts -->

<i class="fa fa-check tick2"> </i>

<i class="fa fa-times cross2"> </i>

</span><!-- input-group-addon Ends -->

<input type="password" class="form-control confirm" id="con_pass" required>

</div><!-- input-group Ends -->

</div><!-- form-group Ends -->


<div class="form-group"><!-- form-group Starts -->

<label> Customer Country </label>

<input type="text" class="form-control" name="c_country" required>

</div><!-- form-group Ends -->

<div class="form-group"><!-- form-group Starts -->

<label> Customer City </label>

<input type="text" class="form-control" name="c_city" required>

</div><!-- form-group Ends -->

<div class="form-group"><!-- form-group Starts -->

<label> Customer Contact </label>

<input type="text" class="form-control" name="c_contact" required>

</div><!-- form-group Ends -->

<div class="form-group"><!-- form-group Starts -->

<label> Customer Address </label>

<input type="text" class="form-control" name="c_address" required>

</div><!-- form-group Ends -->

<div class="form-group"><!-- form-group Starts -->

<label> Customer Image </label>

<input type="file" class="form-control" name="c_image" required>

</div><!-- form-group Ends -->


<div class="form-group"><!-- form-group Starts -->

<center>

<label> Captcha Verification </label>

<div class="g-recaptcha" data-sitekey="6Lc-WxYUAAAAAFUhTFfBEzLGmEgRXHHdsD4ECvIC"></div>

</center>

</div><!-- form-group Ends -->


<div class="text-center"><!-- text-center Starts -->

<button type="submit" name="register" class="btn btn-primary">

<i class="fa fa-user-md"></i> Register

</button>

</div><!-- text-center Ends -->

</form><!-- form Ends -->

</div><!-- box Ends -->

</div><!-- col-md-12 Ends -->
</div>


</div><!-- container Ends -->
</div><!-- content Ends -->



<?php

include("includes/footer.php");

?>


<script>

$(document).ready(function(){

$('.tick1').hide();
$('.cross1').hide();

$('.tick2').hide();
$('.cross2').hide();


$('.confirm').focusout(function(){

var password = $('#pass').val();

var confirmPassword = $('#con_pass').val();

if(password == confirmPassword){

$('.tick1').show();
$('.cross1').hide();

$('.tick2').show();
$('.cross2').hide();



}
else{

$('.tick1').hide();
$('.cross1').show();

$('.tick2').hide();
$('.cross2').show();


}


});


});

</script>

<script>

$(document).ready(function(){

$("#pass").keyup(function(){

check_pass();

});

});

function check_pass() {
 var val=document.getElementById("pass").value;
 var meter=document.getElementById("meter");
 var no=0;
 if(val!="")
 {
// If the password length is less than or equal to 6
if(val.length<=6)no=1;

 // If the password length is greater than 6 and contain any lowercase alphabet or any number or any special character
  if(val.length>6 && (val.match(/[a-z]/) || val.match(/\d+/) || val.match(/.[!,@,#,$,%,^,&,*,?,_,~,-,(,)]/)))no=2;

  // If the password length is greater than 6 and contain alphabet,number,special character respectively
  if(val.length>6 && ((val.match(/[a-z]/) && val.match(/\d+/)) || (val.match(/\d+/) && val.match(/.[!,@,#,$,%,^,&,*,?,_,~,-,(,)]/)) || (val.match(/[a-z]/) && val.match(/.[!,@,#,$,%,^,&,*,?,_,~,-,(,)]/))))no=3;

  // If the password length is greater than 6 and must contain alphabets,numbers and special characters
  if(val.length>6 && val.match(/[a-z]/) && val.match(/\d+/) && val.match(/.[!,@,#,$,%,^,&,*,?,_,~,-,(,)]/))no=4;

  if(no==1)
  {
   $("#meter").animate({width:'50px'},300);
   meter.style.backgroundColor="red";
   document.getElementById("pass_type").innerHTML="Very Weak";
  }

  if(no==2)
  {
   $("#meter").animate({width:'100px'},300);
   meter.style.backgroundColor="#F5BCA9";
   document.getElementById("pass_type").innerHTML="Weak";
  }

  if(no==3)
  {
   $("#meter").animate({width:'150px'},300);
   meter.style.backgroundColor="#FF8000";
   document.getElementById("pass_type").innerHTML="Good";
  }

  if(no==4)
  {
   $("#meter").animate({width:'200px'},300);
   meter.style.backgroundColor="#00FF40";
   document.getElementById("pass_type").innerHTML="Strong";
  }
 }

 else
 {
  meter.style.backgroundColor="";
  document.getElementById("pass_type").innerHTML="";
 }
}

</script>

</body>

</html>

<?php

if(isset($_POST['register'])){

$secret = "6Lc-WxYUAAAAAN5j2OdDsryWwGfREg5eeuZFpKMv";

$response = $_POST['g-recaptcha-response'];

$remoteip = $_SERVER['REMOTE_ADDR'];

$url = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$response&remoteip=$remoteip");

$result = json_decode($url, TRUE);

if($result['success'] == 1){

$c_name = mysqli_real_escape_string($con, $_POST['c_name']);

$c_email = mysqli_real_escape_string($con, $_POST['c_email']);

$c_pass = mysqli_real_escape_string($con, $_POST['c_pass']);

$encrypted_password = password_hash($c_pass, PASSWORD_DEFAULT);

$c_country = mysqli_real_escape_string($con, $_POST['c_country']);

$c_city = mysqli_real_escape_string($con, $_POST['c_city']);

$c_contact = mysqli_real_escape_string($con, $_POST['c_contact']);

$c_address = mysqli_real_escape_string($con, $_POST['c_address']);

$c_image = $_FILES['c_image']['name'];

$c_image_tmp = $_FILES['c_image']['tmp_name'];

$c_ip = getRealUserIp(); 

if(!filter_var($c_email, FILTER_VALIDATE_EMAIL)){

echo "<script> alert('Your Email is not a valid email address.'); </script>";

exit();
	
}

$allowed = array('jpeg','jpg','gif','png');

$file_extension = pathinfo($c_image, PATHINFO_EXTENSION);

if(!in_array($file_extension,$allowed)){

echo "<script> alert('Your Image Format,Extension Is Not Supported.'); </script>";	

exit();
	
}else{
	
move_uploaded_file($c_image_tmp,"customer/customer_images/$c_image");
	
}

$get_email = "select * from customers where customer_email='$c_email'";

$run_email = mysqli_query($con,$get_email);

$check_email = mysqli_num_rows($run_email);

if($check_email == 1){

echo "<script>alert('This email is already registered, try another one')</script>";

exit();

}

$customer_confirm_code = mt_rand();

$subject = "Email Confirmation Message";

$from = "sad.ahmed22224@gmail.com";

$message = "

<h2>
Email Confirmation By Computerfever.com $c_name
</h2>

<a href='localhost/ecom_store/customer/my_account.php?$customer_confirm_code'>

Click Here To Confirm Email

</a>

";

$headers = "From: $from \r\n";

$headers .= "Content-type: text/html\r\n";

mail($c_email,$subject,$message,$headers);

$insert_customer = "insert into customers (customer_name,customer_email,customer_pass,customer_country,customer_city,customer_contact,customer_address,customer_image,customer_ip,customer_confirm_code) values ('$c_name','$c_email','$encrypted_password','$c_country','$c_city','$c_contact','$c_address','$c_image','$c_ip','$customer_confirm_code')";


$run_customer = mysqli_query($con,$insert_customer);

$last_insert_customer_id = mysqli_insert_id($con);

$insert_customers_addresses = "insert into customers_addresses (customer_id) values ('$last_insert_customer_id')";

$run_customers_addresses = mysqli_query($con, $insert_customers_addresses);

$sel_cart = "select * from cart where ip_add='$c_ip'";

$run_cart = mysqli_query($con,$sel_cart);

$check_cart = mysqli_num_rows($run_cart);

if($check_cart>0){

$_SESSION['customer_email']=$c_email;

echo "<script>alert('You have been Registered Successfully')</script>";

echo "<script>window.open('checkout.php','_self')</script>";

}else{

$_SESSION['customer_email']=$c_email;

echo "<script>alert('You have been Registered Successfully')</script>";

echo "<script>window.open('index.php','_self')</script>";


}


}
else{

echo "<script>alert('Please Select Captcha, Try Again')</script>";

}


}

?>