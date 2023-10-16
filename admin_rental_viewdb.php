<?php
 error_reporting(0);

include 'config.php';


$pay_id = $_POST['pay_id'];

$output = array('list'=>'');

$query ="SELECT *,CONCAT(tbl_rental_car.first_name,' ',tbl_rental_car.last_name)  as  name,tbl_rental_car.id as  carid,tbl_rental_car.status as rentstatus,CONCAT(tbl_user.first_name,' ',tbl_user.last_name) as carowner  FROM `cars` INNER JOIN tbl_rental_car on  tbl_rental_car.car_id=cars.id  INNER JOIN tbl_user on tbl_user.id=cars.client_id  where  tbl_rental_car.id='$pay_id'";
$stmt=mysqli_query($conn,$query);
$fetch=mysqli_fetch_assoc($stmt);
foreach($stmt as $row){
		$output['carowner'] = $row['carowner'];
	$output['names'] = $row['name'];
	$output['model']=$row['model'];
	$output['branch']=$row['branch'];
	$output['year'] = $row['year'];
	$output['passenger_seat']=$row['passenger_seat'];
	$output['type_transmission']=$row['type_transmission'];
	$output['type'] = $row['type'];
	$output['price']=$row['price'];
	$output['client']=$row['client'];
	$output['pickup_location'] = $row['pickup_location'];
	$output['pickup_date']=$row['pickup_date'];
	$output['picktime']=$row['pickup_time'];
	$output['drop_location'] = $row['drop_location'];
	$output['drop_date']=$row['drop_date'];
	$output['drop_time']=$row['drop_time'];
	$output['sender'] = $row['rent_sender'];
	$output['rent_ref']=$row['rent_ref'];
	$output['rent_send_date']=$row['rent_send_date'];
}



echo json_encode($output);

?>