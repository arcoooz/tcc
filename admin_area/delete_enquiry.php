<?php


if(!isset($_SESSION['admin_email'])){

echo "<script>window.open('login.php','_self')</script>";

}

else {

?>

<?php

if(isset($_GET['delete_enquiry'])){

$delete_id = $_GET['delete_enquiry'];

$delete_enquiry = "delete from enquiry_types where enquiry_id='$delete_id'";

$run_delete = mysqli_query($con,$delete_enquiry);

if($run_delete){

echo "<script>alert('Um tipo de consulta foi excluído')</script>";

echo "<script>window.open('index.php?view_enquiry','_self')</script>";

}

}


?>



<?php } ?>