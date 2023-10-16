<?php

ini_set('session.use_trans_sid', false);
ini_set('session.use_cookies', true);
ini_set('session.use_only_cookies', true);
$https = false;
if(isset($_SERVER['HTTPS']) and $_SERVER['HTTPS'] != 'off') $https = true;
$dirname = rtrim(dirname($_SERVER['PHP_SELF']), '/').'/';
session_name('some_name');
session_set_cookie_params(0, $dirname, $_SERVER['HTTP_HOST'], $https, true);


session_start();
require 'db_config.php';
if(!isset($_SESSION['user_id'])){
  header("Location: login.php");
  exit;
}

$currentPage = "reservation";
$currentTitle = "RESERVATON";

$id = $_SESSION["user_id"];
$result = mysqli_query($conn, "SELECT * FROM tbl_user WHERE id = $id");
$row = mysqli_fetch_assoc($result);


if (isset($_GET['delete'])) {

  $id = $_GET['delete'];
  $update = true;
  echo "<script> alert('Deleted successfully'); </script>";
  $cardeletedata = mysqli_query($conn, " DELETE FROM tbl_reservation WHERE id=$id");
}


?>
<?php include './admin-layout/header.php'?>

<div class="container-fluid ">
  <div class="row" style="height: 100vh; background-color: #F2F2F2">
    <?php include './admin-layout/nav-menu.php'?>
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Car List Rent</h1>

      </div>
      <div class="table-responsive">
        <table class="table table-dark table-striped">
          <thead>
            <tr>
              <th scope="col" style="font-size:13px;">Reservation ID</th>
              <th scope="col" style="font-size:13px;">Name</th>
              <th scope="col" style="font-size:13px;">Reservation Fee</th>
              <th scope="col" style="font-size:13px;">Date Reserved</th>
              <th scope="col" style="font-size:13px;">Sender Name</th>
              <th scope="col" style="font-size:13px;">Reference No</th>
              <th scope="col" style="font-size:13px;">Status</th>
              <th scope="col" style="font-size:13px;">Action</th>

            </tr>
          </thead>
          <tbody>
            <?php

            $selectreservaion = mysqli_query($conn, "SELECT * FROM `tbl_reservations` ORDER BY rent_id");

            while ($reservationtItem = mysqli_fetch_assoc($selectreservaion)) { ?>
             <tr>

               <td><?php echo $reservationtItem['rent_id'] ?></td>
               <td><?php echo $reservationtItem['re_first_name'] ?></td>
               <td><?php echo $reservationtItem['reservation_fee'] ?></td>
               <td><?php echo $reservationtItem['date_send'] ?> </td>
               <td> <?php echo $reservationtItem['re_sender'] ?> </td>
               <td><?php echo $reservationtItem['re_ref'] ?>  </td>
               <td> <?php echo $reservationtItem['status'] ?> </td>
               <td>
                 <a href="/rent-a-car/reservation/reservation-edit.php?edit=<?php echo $reservationtItem['id'] ?>"><button type='button' class='btn btn-primary btn-sm btn-flat'> edit </button></a>
                 <a href="/rent-a-car/reservation.php?delete=<?php echo $reservationtItem['id'] ?>"> <button type='button' class='btn btn-danger btn-sm btn-flat'>Update Payment</button></a>
               </td>
             </tr>
             <?php
           }
           ?>

         </tbody>
       </tbody>
     </table>
   </div>
 </main>
</div>
</div>

<?php include './admin-layout/footer.php'?>

</body>
</html>