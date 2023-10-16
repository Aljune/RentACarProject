<?php 

include 'config.php';


$id=$_GET['id'];
$idb=$_COOKIE['logid'];


 $generate = substr(md5(uniqid(mt_rand(), true)),0,8);
$sql="insert  into tbl_user_friend (user_id_a,user_id_b,generat_code)values('$id','$idb','$generate')";
mysqli_query($conn,$sql);


?>