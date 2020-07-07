<?php


if(!isset($_SESSION['admin_email'])){

echo "<script>window.open('login.php','_self')</script>";

}

else {




?>

<?php

if(isset($_GET["delete_download"])){

$download_id = $_GET["delete_download"];

$delete_download = "delete from downloads where download_id='$download_id'";

$run_delete_download = mysqli_query($con,$delete_download);

if($run_delete_download){
	
echo "

<script>

alert('Your Download Has Been Deleted Successfully.');

window.open('index.php?view_downloads','_self');

</script>

";
	
}


}

?>


<?php } ?>