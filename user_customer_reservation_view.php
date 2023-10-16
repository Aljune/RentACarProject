
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
      <?php include'user_link.php';?>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->


      <!-- Nav  Menu -->
      <li class="nav-item">
        <?php include'user_navbar.php';?>
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
                <th scope="col" style="font-size:12px;">Picture</th>
                <th scope="col" style="font-size:12px;display:none;">Reservation ID</th>
                <th scope="col" style="font-size:12px;">Customer Name</th>
                <th style="font-size:12px;">Model</th>
                <th style="font-size:12px;">Branch</th>
                <th scope="col" style="font-size:12px;">Reservation Fee</th>
                <th scope="col" style="font-size:12px;">Date Reserved</th>
                <th scope="col" style="font-size:12px;">Sender Name</th>
                <th scope="col" style="font-size:12px;">Reference No</th>
                <th scope="col" style="font-size:12px;">Status</th>
                <th scope="col" style="font-size:12px;">Action</th>

              </tr>
            </thead>
            <tbody>
              <?php

              $id=$_COOKIE['logid'];
              $selectreservaion = mysqli_query($conn, "SELECT *,tbl_reservation.id as idrev,concat(first_name,' ',last_name) as name,tbl_reservation.status as resstatus  FROM `tbl_reservation`  INNER  JOIN cars on cars.id=tbl_reservation.car_id where tbl_reservation.client_id='$id'");

              while ($reservationtItem = mysqli_fetch_assoc($selectreservaion)) { ?>
               <tr>

                 <td><img src="img/<?php echo $reservationtItem['image'] ?>" style="width:100%;height:50px;"></td>
                 <td style="display:none;"><?php echo $reservationtItem['idrev'] ?></td>
                 <td><?php echo $reservationtItem['name'] ?></td>
                 <td><?php echo $reservationtItem['model'] ?></td>
                 <td><?php echo $reservationtItem['branch'] ?></td>
                 <td><?php echo $reservationtItem['reservation_fee'] ?></td>
                 <td><?php echo $reservationtItem['rent_send_date'] ?> </td>
                 <td> <?php echo $reservationtItem['rent_sender'] ?> </td>
                 <td><?php echo $reservationtItem['rent_ref'] ?>  </td>
                 <td> <?php echo $reservationtItem['resstatus'] ?> </td>
                 <td>
                   <button type='button' class='btn btn-primary btn-sm btn-flat'  data-id='<?php echo $reservationtItem['idrev'] ?>' id="viewprofile">View </button>
                   <button type='button' class='btn btn-primary btn-sm btn-flat' id="btnupdate">Update</button>
                 </td>
               </tr>
               <?php
             }
             ?>

           </tbody>
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
        <h5 class="modal-title">UPDATE</h5>
      </div>
      <form action="user_update_reservation_status.php" method="POST" >
        <div class="modal-body">
          <input type="text" name="idget"  id="idget" style="display:none;">
          <input type="radio" name="getradio"  value="CONFIRMED"><label  class="ml-1">CONFIRMED</label>
          <input type="radio" name="getradio"  value="REJECTED" style="margin-left:1%;" ><label class="ml-1">REJECTED</label>
          <input type="radio" name="getradio"  value="SCAMMER" style="margin-left:1%;"><label class="ml-1">SCAMMER</label>
          <div class="modal-footer">
           <button type="button" class="btn btn-secondary" id="closemodal">Close</button>
           <input type="submit"  name="submit" value="UPDATE" class="btn btn-primary">
         </div>
       </div>
     </form> 



   </div>
 </div>
</div>



<div class="modal show " id="viewproject" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="overflow:auto">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content" style="border-radius:10px;">
      <div class="modal-header " style="border:0;">
      </div>
      <div class="modal-body" style="height:auto;overflow:auto;">

       <p style="text-align:center;font-size:17px;font-family:bold;color:black;">RENT INFORMATION</p>

       <div id="getimage">

       </div>

       <div class="col-md-12">
        <div class="row">
         <div class="col-md-4">

           <div class="form-group">
            <p style="text-align:center;">Owner</p>
            <input type="" name="" id="names" class="form-control">
          </div>
        </div>

        <div class="col-md-4">
         <div class="form-group">
          <p style="text-align:center;">model</p>
          <input type="" name=""  id="model"class="form-control">
        </div>
      </div>

      <div class="col-md-4">
       <div class="form-group">
        <p style="text-align:center;">branch</p>
        <input type="" name=""  id="branch"class="form-control">
      </div>
    </div>

    <div class="col-md-4">
     <div class="form-group">
      <p style="text-align:center;">Pick Location</p>
      <input type="" name="" id="pickuplocation" class="form-control">
    </div>
  </div>


  <div class="col-md-4">
   <div class="form-group">
    <p style="text-align:center;">Pick-up Date</p>
    <input type="" name="" id="pickupdate" class="form-control">
  </div>
</div>


<div class="col-md-4">
 <div class="form-group">
  <p style="text-align:center;">Pick-up Time</p>
  <input type="" name="" id="pickuptime" class="form-control">
</div>
</div>

<div class="col-md-4">
 <div class="form-group">
  <p style="text-align:center;">Rerservation Fee</p>
  <input type="" name="" id="reservation_fee" class="form-control">
</div>
</div>

</div>
</div>


<p style="text-align:center;margin-top:1%;font-family:bold;font-size:17px;">PAYMENT INFORMATION</p>
<div class="col-md-12">

  <div id="getimages">

  </div>

  <div class="row">
   <div class="col-md-4">

     <div class="form-group">
      <p style="text-align:center;">Sender Name</p>
      <input type="" name=""  id="rents_sender" class="form-control">
    </div>
  </div>

  <div class="col-md-4">
   <div class="form-group">
    <p style="text-align:center;">Refrence</p>
    <input type="" name="" id="rent_ref" class="form-control">
  </div>
</div>

<div class="col-md-4">
 <div class="form-group">
  <p style="text-align:center;">Date send</p>
  <input type="" name="" id="rent_send_date" class="form-control">
</div>
</div>


<div class="col-md-4">
 <div class="form-group">
  <p style="text-align:center;">Rerservation Fee</p>
  <input type="" name="" id="reservation_fee" class="form-control">
</div>
</div>



</div>
</div>
<div class="modal-footer">
 <button class="btn btn-sm btn-flat btn-danger" id="closerent">Close</button>
</div>


</div>

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
      $('#idget').val(tr.eq(1).text());


    });



    $("body").on("click",'#viewprofile',function(e){
      e.preventDefault();
      $('.show').show();
      var pay_id = $(this).data('id');

      $.ajax({
        type: 'POST',
        url: 'user_customer_reservation_modal.php',
        data: {pay_id:pay_id},
        dataType: 'json',
        success:function(response){
          $('#getimage').html('<img src="img/'+response.image+'"  style="width:100%;height:300px;margin-bottom:3%;margin-top:3%;"/>');
                    $('#getimages').html('<img src="img/'+response.image+'"  style="width:100%;height:300px;margin-bottom:3%;margin-top:3%;"/>');
          $('#names').val(response.names);
          $('#branch').val(response.branch);
          $('#model').val(response.model);
          $('#pickuplocation').val(response.pickuplocation);
          $('#pickupdate').val(response.pickupdate);
          $('#pickuptime').val(response.pickuptime);
          $('#reservation_fee').val(response.reservation_fee);
          $('#rents_sender').val(response.rent_sender);
          $('#rent_ref').val(response.rent_ref);
          $('#rent_send_date').val(response.rent_send_date);







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
