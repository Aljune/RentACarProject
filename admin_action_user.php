
<?php 
include 'config.php';

echo $id=$_POST['idget'];
echo $status=$_POST['getradio'];
$query="update  tbl_user  set user_status='$status' where id='$id'  ";
mysqli_query($conn,$query);

  echo "<script> alert('Update status  successfully'); </script>"; 
  header("Location:admin_user_account.php");






?>

