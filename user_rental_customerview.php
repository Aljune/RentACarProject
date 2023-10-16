<?php

include 'config.php';
$pay_id = $_POST['pay_id'];
$output = array('list'=>'');



$sql= "SELECT *,tbl_rental_car.id as id_rent FROM `tbl_rental_car` INNER JOIN cars on cars.id=tbl_rental_car.car_id where tbl_rental_car.id='$pay_id'";
$stmt=mysqli_query($conn,$sql);


foreach($stmt as $row){
		$output['images'] = $row['ren_picture'];
	$output['image'] = $row['image'];
	$output['names'] = $row['name'];
	$output['names'] = $row['name'];
	$output['names'] = $row['name'];
	$output['brands'] = $row['branch'];
	$output['pickuplocation'] = $row['pickup_location'];
	$output['pickupdate'] = $row['pickup_date'];
	$output['pickuptime'] = $row['pickup_time'];
	$output['drop_location'] = $row['drop_location'];
	$output['price'] = $row['price'];
	$output['drop_time'] = $row['drop_time'];
	$output['drop_date'] = $row['drop_date'];
	$output['rent_sender'] = $row['rent_sender'];
	$output['rent_ref'] = $row['rent_ref'];
	$output['rent_send_date'] = $row['rent_send_date'];
	$output['rent_payment'] = $row['total_rate'];

	
}


echo json_encode($output);

?>