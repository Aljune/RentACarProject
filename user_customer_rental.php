
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
               Customer Rental car List
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
              <th style="font-size:12px;">Picture</th>
              <th scope="col" style="font-size:12px;display:none;">Rental ID</th>
              <th scope="col" style="font-size:12px;">Customer Name</th>
              <th scope="col" style="font-size:12px;">Model</th>
              <th scope="col" style="font-size:12px;">Branch</th>
              <th scope="col" style="font-size:12px;">Sender</th>
              <th scope="col" style="font-size:12px;">Refrence No</th>
              <th scope="col" style="font-size:12px;">Amount</th>
              <th scope="col" style="font-size:12px;">Status</th>
             <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php

            error_reporting(0);

$id=$_COOKIE['logid'];
            $selectreservaion = mysqli_query($conn, "select *,CONCAT(first_name,'',last_name) as name,tbl_rental_car.id as idget, 
            tbl_rental_car.status as car_status from tbl_rental_car INNER JOIN cars on cars.id=tbl_rental_car.car_id  where tbl_rental_car.client_id='$id'");

            while ($reservationtItem = mysqli_fetch_assoc($selectreservaion)) { ?>
             <tr>

              
                 <td><img src="img/<?php echo $reservationtItem['image'] ?>" style="width:100%;height:50px;text-align:center;"></td>
               <td style="display:none;"><?php echo $reservationtItem['idget'] ?>
               </td>
               <td><?php echo $reservationtItem['name'] ?></td>
               <td><?php echo $reservationtItem['model'] ?></td>
               <td><?php echo $reservationtItem['branch'] ?> </td>
               <td> <?php echo $reservationtItem['rent_sender'] ?> </td>
               <td><?php echo $reservationtItem['rent_ref'] ?>  </td>
               <td><?php echo $reservationtItem['total_rate'] ?>  </td>
               <td> <?php echo $reservationtItem['car_status'] ?> </td>
               <td>
                 <button type='button' class='btn btn-primary btn-sm btn-flat' data-id="<?php echo $reservationtItem['idget'] ?>" id="viewprofile">View</button>
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
      <form action="user_update_action.php" method="POST" >
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



<div class="modal show " id="viewproject" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="overflow:auto;">
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
            <p style="text-align:center;">Name</p>
            <input type="" name="" id="names" class="form-control">
          </div>
        </div>

        <div class="col-md-4">
         <div class="form-group">
          <p style="text-align:center;">Brand</p>
          <input type="" name=""  id="brand"class="form-control">
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
  <p style="text-align:center;">Drop Location</p>
  <input type="" name="" id="drop_location" class="form-control">
</div>
</div>

<div class="col-md-4">
 <div class="form-group">
  <p style="text-align:center;">Drop Date</p>
  <input type="" name=""  id="drop_date" class="form-control">
</div>
</div>


<div class="col-md-4">
 <div class="form-group">
  <p style="text-align:center;">Drop Time</p>
  <input type="" name=""  id="drop_time" class="form-control">
</div>
</div>

<div class="col-md-4">
 <div class="form-group">
  <p style="text-align:center;">Price</p>
  <input type="" name="" id="price" class="form-control">
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
  <p style="text-align:center;">Payment</p>
  <input type="" name=""  id="rent_payment" class="form-control">
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
  


    $("body").on("click",'#closemodal',function(){
      $('#view').hide();
    });

    $("body").on("click",'#closerent',function(){
      $('.show').hide();
    });



$('body').on("click",'#btnupdate',function(){
   $('form')[0].reset();
      var tr = $(this).closest("tr").find('td');
      $('#idget').val(tr.eq(1).text());
    $('#view').show();

})

       $('#myInput').keyup(function(){
  // Search text
  var text = $(this).val();
  // Hide all content class element
  $('.content').hide();

  // Search 
  $('.content .title:contains("'+text+'")').closest('.content').show();


});



    $("body").on("click",'#viewprofile',function(e){
      e.preventDefault();
      $('.show').show();
      var pay_id = $(this).data('id');


      $.ajax({
        type: 'POST',
        url: 'user_rental_customerview.php',
        data: {pay_id:pay_id},
        dataType: 'json',
        success:function(response){
               $('#getimage').html('<img src="img/'+response.image+'"  style="width:100%;height:300px;margin-bottom:3%;margin-top:3%;"/>');
              $('#getimages').html('<img src="img/'+response.images+'"  style="width:100%;height:300px;margin-bottom:3%;margin-top:3%;"/>');
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


  });

</script>
