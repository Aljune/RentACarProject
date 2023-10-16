<?php 


include 'config.php';

$id=$_GET['id'];
$query="DELETE FROM tbl_payment_setting  WHERE pay_id='$id'";
mysqli_query($conn,$query);

header("Location:user_payment_method.php");







?>