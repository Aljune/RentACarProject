<?php 
include 'config.php';

$id=$_COOKIE['logid'];
$channel=$_POST['paymentchannel'];
$name=$_POST['account_name'];
$account_number=$_POST['account_number'];

$query="INSERT INTO `tbl_payment_setting`(`tenant_id`, `payment_channel`, `account_name`, `account_number`) VALUES ('$id','$channel','$name','$account_number')";
mysqli_query($conn,$query);
header("Location:user_payment_method.php");







?>