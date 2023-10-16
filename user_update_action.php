
<?php 
include 'config.php';

echo $id=$_POST['idget'];
echo $status=$_POST['getradio'];
$query="update  tbl_rental_car  set status='$status' where id='$id'  ";
mysqli_query($conn,$query);

 echo "<script> alert('Update status  successfully'); </script>"; 
 header("Location:user_customer_rental.php");






?>

