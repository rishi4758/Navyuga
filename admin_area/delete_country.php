<?php


if(!isset($_SESSION['admin_email'])){

echo "<script>window.open('login.php','_self')</script>";

}

else {




?>

<?php

if(isset($_GET['delete_country'])){

$delete_id = $_GET['delete_country'];

$delete_country = "delete from countries where country_id='$delete_id'";

$run_delete_country = mysqli_query($con, $delete_country);

if($run_delete_country){
	
echo "

<script>

alert('Your Country Has Been Deleted Successfully.');

window.open('index.php?view_countries','_self');

</script>

";
	
}
	
	
}

?>


<?php } ?>