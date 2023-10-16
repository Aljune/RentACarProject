


<?php



error_reporting(0);

$currentPage = "dashboard";
$currentTitle = "DASHBOARD";
ini_set('session.use_trans_sid', false);
ini_set('session.use_cookies', true);
ini_set('session.use_only_cookies', true);
$https = false;
if(isset($_SERVER['HTTPS']) and $_SERVER['HTTPS'] != 'off') $https = true;
$dirname = rtrim(dirname($_SERVER['PHP_SELF']), '/').'/';
session_name('some_name');
session_set_cookie_params(0, $dirname, $_SERVER['HTTP_HOST'], $https, true);


session_start();

 $userID = $_SESSION['user_id'];

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Car Rental System</title>
  <!-- Custom fonts for this template-->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.10.2/css/all.css">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body id="page-top" style="overflow-x:visible;background-color:whitesmoke;">
  <!-- Page Wrapper -->
  <div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav sidebar sidebar-dark accordion bg-primary" id="accordionSidebar">

      <!-- Divider -->
      <hr class="sidebar-divider my-0">
      <!-- Nav Item - Dashboard -->
      <?php include'admin_link.php';?>

      <!-- Divider -->
  
      <!-- Heading -->


      <!-- Nav  Menu -->
      <li class="nav-item">
        <?php include'admin_nav.php';?>
      </li>
    </ul>
    <!-- End of Sidebar -->



    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column"style="overflow-x:visible;">

      <!-- Main Content -->
      <div id="content">

        <!-- Begin Page Content -->


        <div class="container-fluid" >
          <div class="card text-white  mb-3" style="width:100%;">
            <div class="card-header bg-primary">
              <div style="text-align:center;font-size:30px;">
               Reservation Car
             </div>
           </div>
           <div class="form-group" style="
           margin-bottom: 0px;
           margin-top: 20px;
           margin-left: 20px;
           ">

         </div>


         <div class="card-body">
          <div class="row">

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

$id=$_COOKIE['logid'];
            $selectreservaion = mysqli_query($conn, "SELECT * FROM `tbl_reservations`  where user='$id'");

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
                 <a href="/rent-a-car/reservation/reservation-edit.php?edit=<?php echo $reservationtItem['id'] ?>"><button type='button' class='btn btn-success btn-sm btn-flat'> edit </button>
                  <button type='button' class='btn btn-primary btn-sm btn-flat' id="btnupdate">Update Payment</button></a>
               </td>
             </tr>
             <?php
           }
           ?>

         </tbody>

     </table>
     </div>
   </div>



 </div>
</div>
</div>
</div>


<!--viewing   form-->
<div class="modal"  id="view" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"  style="overflow:auto;">
  <div class="modal-dialog ">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Payment update</h5>
      </div>
      <form action="user_reservation_payment.php" method="POST" enctype="multipart/form-data">
        <div class="modal-body">
         <p>Upload  Picture</p>
         <input type="text" name="idget" id="idget" class="form-control"  style="display:none;"> 
         <div class="form-group m-2">
           <input type="file" name="fileToUpload" id="fileToUpload" class="form-control" required > 
         </div>
         <div class="form-group m-2">
           <input type="text" name="sender" id="sender" class="form-control" placeholder="Sender" required>
         </div>
         <div class="m-2">
           <input type="text" name="reference" id="reference" class="form-control" placeholder="Reference number" required>
         </div>
         <p style="color:black;">Payment Channel</p>
         <div class="form-group">
           <div style="width:100%;height:auto;border:1px solid blue;">

             <div style="width:100%;height:30px;background-color:blue;border:1px solid orange;">
               <p style="color:white;padding:5px;padding-bottom:10px;">GCASH</p>
             </div>
             <div style="background-color:blue;margin-left:2%;margin-right:2%;margin-top:2%;width:30%;">
              <p  style="color:white;font-size:15px;text-align:center;">ACCOUNT NAME</p>
            </div>
            <p style="color:black;margin:2%;position:relative;bottom:13px;">CLIENT</p>

            <div style="background-color:blue;margin-left:2%;margin-right:2%;margin-top:2%;width:30%;">
              <p  style="color:white;font-size:15px;text-align:center;">ACCOUNT NUMBER</p>
            </div>
            <p style="color:black;margin:2%;position:relative;bottom:13px;">0991123131</p>
          </div>
        </div>
        <div class="modal-footer">
         <button type="button" class="btn btn-secondary" id="closemodal">Close</button>
         <input type="submit"  name="submit" value="SEND" class="btn btn-primary">
       </div>
     </div>
   </form> 



 </div>
</div>
</div>






  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="js/sb-admin-2.min.js"></script>


</body>
</html>


<script type="text/javascript">
  $(document).ready(function(){
    $("body").on("click",'#btnupdate',function(){
      $('#view').show();

      $('form')[0].reset();
      var tr = $(this).closest("tr").find('td');
      $('#idget').val(tr.eq(0).text());
    

    });


    $("body").on("click",'#viewprofile',function(e){
      e.preventDefault();
      $('.show').show();
      var pay_id = $(this).data('id');

      $.ajax({
        type: 'POST',
        url: 'rental_view_information.php',
        data: {pay_id:pay_id},
        dataType: 'json',
        success:function(response){
          $('#names').val(response.names);
          $('#brand').val(response.brands);
          $('#pickuplocation').val(response.pickuplocation);
          $('#pickupdate').val(response.pickupdate);
          $('#pickuptime').val(response.pickuptime);
          $('#drop_location').val(response.drop_location);
          $('#price').val(response.price);
          $('#drop_date').val(response.drop_date);
          $('#drop_time').val(response.drop_time);
          $('#rents_sender').val(response.rent_sender);
          $('#rent_ref').val(response.rent_ref);
        $('#rent_send_date').val(response.rent_send_date);
        $('#rent_payment').val(response.rent_payment);








        }
      });



    });


    $("body").on("click",'#closemodal',function(){
      $('#view').hide();
    });

    $("body").on("click",'#closerent',function(){
      $('.show').hide();
    });


       $('#myInput').keyup(function(){
  // Search text
  var text = $(this).val();
  // Hide all content class element
  $('.content').hide();

  // Search 
  $('.content .title:contains("'+text+'")').closest('.content').show();


});

  });

</script>
