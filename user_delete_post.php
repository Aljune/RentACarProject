<?php 


include 'config.php';

$id=$_GET['id'];
$query="DELETE FROM `cars` WHERE id='$id'";
mysqli_query($conn,$query);
header("Location:user_post_car.php");







?>