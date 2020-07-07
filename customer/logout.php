<?php

@session_start();

if(!isset($_SESSION["customer_email"])){

echo "<script>window.open('../checkout.php','_self');</script>";	

}

?>

<?php

session_start();

session_destroy();

echo "<script>window.open('../index.php','_self')</script>";


?>