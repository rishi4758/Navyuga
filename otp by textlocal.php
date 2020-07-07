
<?php

session_start();

include("includes/db.php");


$numbers=$_SESSION['user_mobile'];

?>


<!DOCTYPE html>


<html>

<head>

<title>E commerce Store </title>

<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<link href="http://fonts.googleapis.com/css?family=Roboto:400,500,700,300,100" rel="stylesheet" >

<link href="styles/bootstrap.min.css" rel="stylesheet">

<link href="styles/design.css" rel="stylesheet">

<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">

</head>

<body>






<div class="container modify">
<br>
<br>
<br>
<br>
<div class="row">
<div class="col-md-3"></div>

<div class="col-md-6 modify2">

<h1  class="text-center">OTP Confirmation</h1>

</div>
</div>
<br>
<br>
<br>
<div class="row">
<div class="col-md-2"></div>

<div class="col-md-8 modify3">
<br>
<form class="form-horizontal" method="post" enctype="multipart/form-data">




<div class="form-group">
<label>Enter Name:</label>
<br>
<input type="text"  name="jugad1" class="form-control" required >

</div>


<div class="form-group">
<label>Mobile:</label>
<br>
<input type="text"  name="mobile" class="form-control" required >

</div>



<div class="form-group">
<label>Enter OTP:</label>
<br>
<input type="text"  name="jugad" class="form-control" required >

</div>



<div class="form-group">
<input type="submit" value="confirm"   name="submit" class="form-control btn btn-success">
</div>
</form>








</div>
</div>




</div>







<script src="js/jquery.min.js"> </script>

<script src="js/bootstrap.min.js"></script>


</body>
</html>

<?php  

if(isset($_POST['submit']))
{
$v=$_POST['jugad'];
$otp=$_GET['otp'];

$v1=$_POST['jugad1'];

if (password_verify($v, $otp)) {
    echo "<script>alert('you are logged in succesfully ')</script>";
                      




$get="insert into verify(user_name,user_mobile,user_otp) values('$v1','$numbers','$v')";

$run=mysqli_query($con,$get);

$row=mysqli_fetch_array($run);















					  } else {
     echo "<script>alert('you have enter wrong otp')</script>";
}


}








?>
