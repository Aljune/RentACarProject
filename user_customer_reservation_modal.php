<?php

include 'config.php';
$pay_id = $_POST['pay_id'];
$output = array('list'=>'');



$sql= "SELECT *,tbl_reservation.id as id_rent FROM `tbl_reservation` INNER JOIN cars on cars.id=tbl_reservation.car_id  where tbl_reservation.id='$pay_id'";
$stmt=mysqli_query($conn,$sql);


foreach($stmt as $row){
    $output['image'] = $row['image'];
        $output['images'] = $row['ren_picture'];
  $output['names'] = $row['name'];
  $output['branch'] = $row['branch'];
  $output['model'] = $row['model'];
  $output['branch'] = $row['branch'];
  $output['pickuplocation'] = $row['pickup_location'];
  $output['pickupdate'] = $row['pickup_date'];
  $output['pickuptime'] = $row['pickup_time'];
  $output['price'] = $row['price'];
  $output['rent_sender'] = $row['rent_sender'];
  $output['rent_ref'] = $row['rent_ref'];
  $output['rent_send_date'] = $row['rent_send_date'];
  $output['reservation_fee'] = $row['reservation_fee'];

  
}


echo json_encode($output);

?>