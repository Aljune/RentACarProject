<?php
 error_reporting(0);

include 'config.php';


$pay_id = $_POST['pay_id'];

$output = array('list'=>'');

$query ="SELECT *   FROM `tbl_rental_car`   where  id='$pay_id'";
$stmt=mysqli_query($conn,$query);
$fetch=mysqli_fetch_assoc($stmt);
foreach($stmt as $row){
	$output['image'] = $row['image_return'];
	

}



echo json_encode($output);

?>