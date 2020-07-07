<?php

session_start();

session_destroy();

echo "<script>window.open('vendor_login.php','_self')</script>";

?>