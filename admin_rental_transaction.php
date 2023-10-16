

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

 //$userID = $_SESSION['user_id'];

?>


<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Rental Car</title>
  <!-- Custom fonts for this template-->

  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <link rel="stylesheet" href="plugins/fullcalendar/main.css">
  <script src="plugins/fullcalendar/main.js"></script>
  <!-- Bootstrap core JavaScript-->

  <!-- Custom fonts for this template-->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.10.2/css/all.css">
  <!-- Custom styles for this template-->
  


</head>

<style type="text/css">



  .fc-event-time{
    display:none;

  }

  p{
    color:black;
  }

  .tr {
    color:black;
  }

  .fc-event-title{
    text-align:center;
    background-color:blue;
    text-transform:uppercase;
    color:white;
    font-family: Nunito,-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";
  }
  .fc-daygrid-event-dot{
    display:none;

  }


</style>

<body id="page-top" style="overflow-x:visible;background-color:whitesmoke;">
  <!-- Page Wrapper -->
  <div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav sidebar sidebar-dark accordion bg-primary" id="accordionSidebar">

      <!-- Divider -->

      <hr class="sidebar-divider my-0">
  <li class="nav-item active" >
        <div><img  src="./image/logo/loge-rent-a-car.png" alt="" width="100" height="100" style="margin-left:28%;"></div> 
            <p style="font-size:20px;color:black;text-align:center;margin-bottom:0px;color:white; font-family:'Courier New', monospace;text-transform: capitalize;">RENT A CAR
        </p>
        <p style="font-size:20px;color:black;text-align:center;margin-bottom:0px;color:white; font-family:'Courier New', monospace;text-transform: capitalize;">ADMIN
        </p>
      </li>

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
               Rental Car  transaction
             </div>
           </div>
           <div class="form-group" style="
           margin-bottom: 0px;
           margin-top: 20px;
           margin-left: 20px;
           ">

         </div>



         <div class="card-body">
           <input type="text" name="search"  placeholder="search"   id="mysearch"  class="form-control mb-3" style="width:22%;">

           <table class="table table-dark table-striped">
            <thead>
              <tr>
               <th scope="col" style="font-size:13px;display:none;">Id</th>
               <th scope="col" style="font-size:13px;">Customer Name</th>
               <th scope="col" style="font-size:13px;">Model</th>
               <th scope="col" style="font-size:13px;">Branch</th>
               <th scope="col" style="font-size:13px;">Price</th>
               <th scope="col" style="font-size:13px;">Sender name</th>
               <th scope="col" style="font-size:13px;">Refrence #</th>
               <th scope="col" style="font-size:13px;">Status</th>
               <th scope="col" style="font-size:13px;">Action</th>


             </tr>
           </thead>
           <tbody>
            <?php
            include 'config.php';

            $selectreservaion = mysqli_query($conn, "SELECT *,CONCAT(first_name,' ',last_name)  as  name,tbl_rental_car.id as  carid,tbl_rental_car.status as rentstatus FROM `cars` INNER JOIN tbl_rental_car on  tbl_rental_car.car_id=cars.id");

            while ($reservationtItem = mysqli_fetch_assoc($selectreservaion)) { ?>
             <tr class="mycontent">
              <td style="display:none;"><?php echo $reservationtItem['carid'] ?></td>
              <td class="mytitle"><?php echo $reservationtItem['name'] ?></td>
              <td class="mytitle"><?php echo $reservationtItem['model'] ?></td>
              <td><?php echo $reservationtItem['branch'] ?> </td>
              <td> <?php echo $reservationtItem['total_rate'] ?> </td>
              <td><?php echo $reservationtItem['rent_sender'] ?></td>
              <td><?php echo $reservationtItem['rent_ref'] ?></td>
              <td><?php echo $reservationtItem['rentstatus'] ?></td>
              <td>
                <button type='button' class='btn btn-primary btn-sm btn-flat'  id="views">View</button>
                <?php  if($reservationtItem['rentstatus']=='CONFIRMED'){?>
                                  <button type='button' class='btn btn-primary btn-sm btn-flat'  id="car_return">Car return Proof</button>
<?php
              

                }
                ?>

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


<div class="modal" id="return_picture" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabevl" aria-hidden="true" style="overflow:auto;">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content" style="border-radius:10px;">
      <div class="modal-header " style="border:0;">
      </div>
      <div class="modal-body" style="height:auto;overflow:auto;">

       <p style="text-align:center;font-size:17px;font-family:bold;color:black;">RENT INFORMATION</p>

  <div id="getimage">
         
       </div>



</div>
<div class="modal-footer">
  <button class="btn  btn-flat btn-danger" id="closereturn">CLOSE</button>
</div>
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
       <div class="col-md-12">
        <div class="row">
         <div class="col-md-4">

           <div class="form-group">
            <p style="text-align:center;">Owner Name</p>
            <input type="" name="" id="carowner" class="form-control">
          </div>
        </div>

        <div class="col-md-4">
         <div class="form-group">
          <p style="text-align:center;">Model</p>
          <input type="" name=""  id="model"class="form-control">
        </div>
      </div>

      <div class="col-md-4">
       <div class="form-group">
        <p style="text-align:center;">Branch</p>
        <input type="" name=""  id="branch"class="form-control">
      </div>
    </div>


    <div class="col-md-4">

     <div class="form-group">
      <p style="text-align:center;">Year</p>
      <input type="" name="" id="year" class="form-control">
    </div>
  </div>

  <div class="col-md-4">
   <div class="form-group">
    <p style="text-align:center;">Passenger Seat</p>
    <input type="" name=""  id="passenger"class="form-control">
  </div>
</div>

<div class="col-md-4">
 <div class="form-group">
  <p style="text-align:center;">Type of Transmission</p>
  <input type="" name=""  id="transmission"class="form-control">
</div>
</div>

<div class="col-md-4">
 <div class="form-group">
  <p style="text-align:center;">Type</p>
  <input type="" name=""  id="type"class="form-control">
</div>
</div>

<p>------------------------------------------------Customer Information----------------------------------------------</p>


<div class="col-md-4">
 <div class="form-group">
  <p style="text-align:center;">Sender</p>
  <input type="" name="" id="sender" class="form-control">
</div>
</div>


<div class="col-md-4">
 <div class="form-group">
  <p style="text-align:center;">Payment Refrence No</p>
  <input type="" name="" id="ref" class="form-control">
</div>
</div>

<div class="col-md-4">
 <div class="form-group">
  <p style="text-align:center;">Date Send</p>
  <input type="" name="" id="datesend" class="form-control">
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
  <input type="text" name="" id="pickuptime" class="form-control">
</div>
</div>

<div class="col-md-4">
 <div class="form-group">
  <p style="text-align:center;">Drop Location</p>
  <input type="" name="" id="droplocation" class="form-control">
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
<div class="modal-footer">
  <button class="btn  btn-flat btn-danger" id="close">CLOSE</button>
</div>
</div>
</div>
</div>




<div class="modal show " id="return_picture" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="overflow:auto;">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content" style="border-radius:10px;">
      <div class="modal-header " style="border:0;">
      </div>
      <div class="modal-body" style="height:auto;overflow:auto;">

       <p style="text-align:center;font-size:17px;font-family:bold;color:black;">RENT INFORMATION</p>

  <div id="getimage">
         
       </div>



</div>
<div class="modal-footer">
  <button class="btn  btn-flat btn-danger" id="close">CLOSE</button>
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



    $('body').on("click",'#btnupdate',function(){
     $('form')[0].reset();
     var tr = $(this).closest("tr").find('td');
     $('#idget').val(tr.eq(0).text());
     $('#view').show();

   });


    $('body').on("click",'#views',function(){
     var tr = $(this).closest("tr").find('td');
     $('#viewproject').show();
          var tr = $(this).closest("tr").find('td');
     var pay_id= tr.eq(0).text();
     $.ajax({type: 'POST',url:'admin_rental_viewdb.php',data: {pay_id:pay_id},dataType: 'json',
      success:function(response){
           $('#carowner').val(response.carowner);
        $('#names').val(response.name);
        $('#model').val(response.model);
        $('#branch').val(response.branch);
        $('#year').val(response.year);
        $('#passenger').val(response.passenger_seat);
        $('#transmission').val(response.type_transmission);
        $('#type').val(response.type);
        $('#sender').val(response.sender);
        $('#ref').val(response.rent_ref);
        $('#datesend').val(response.rent_send_date);
        $('#pickuplocation').val(response.sender);
        $('#pickupdate').val(response.pickup_date);
        $('#pickuptime').val(response.picktime);
        $('#droplocation').val(response.drop_location);
        $('#drop_date').val(response.drop_date);
        $('#drop_time').val(response.drop_time);
        $('#price').val(response.price);

      }
    });



   });



    $('body').on("click",'#car_return',function(){
     var tr = $(this).closest("tr").find('td');
     $('#return_picture').show();
          var tr = $(this).closest("tr").find('td');
     var pay_id= tr.eq(0).text();
     $.ajax({type: 'POST',url:'admin_return_car.php',data: {pay_id:pay_id},dataType: 'json',
      success:function(response){
                 $('#getimage').html('<img src="img/'+response.image+'"  style="width:100%;height:300px;margin-bottom:3%;margin-top:3%;"/>');
    

      }
    });



   });

  $("body").on("click",'#closereturn',function(){
      $('#return_picture').hide();
    });



    $('body').on("click",'#close',function(){
     $('#viewproject').hide();
   });



    $("body").on("click",'#closemodal',function(){
      $('#view').hide();
    });

    $("body").on("click",'#closerent',function(){
      $('.show').hide();
    });

    $('#mysearch').keyup(function(){
  // Search text
  var text = $(this).val();
  // Hide all content class element
  $('.mycontent').hide();

  // Search 
  $('.mycontent .mytitle:contains("'+text+'")').closest('.mycontent').show();


});


  });

</script>