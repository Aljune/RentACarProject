
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
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.10.2/css/all.css">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>


<style type="text/css">


  p{
    color:black;
  }

</style>
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
               Rental Car
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

<input type="text" name="search"  placeholder="search"   id="mysearchs"  class="form-control mb-3" style="width:22%;">
  
            <div class="table-responsive">
              <table class="table table-dark table-striped">
                <thead>
                  <tr>
                    <th scope="col" style="display:none;">ID</th>
             
                    <th scope="col" style="font-size:13px;">Name</th>
                    <th scope="col" style="font-size:13px;">Model</th>
                    <th scope="col" style="font-size:13px;">Sender</th>
                    <th scope="col" style="font-size:13px;">References No</th>
                    <th scope="col" style="font-size:13px;">Satus</th>
                    <th scope="col" style="font-size:13px;">Action</th>
                  </tr>
                </thead>

                              <?php  
                 $id=$_COOKIE['logid'];

                 $selectreservaion = mysqli_query($conn, "SELECT *,tbl_rental_car.id as id_rent,tbl_rental_car.status as rentalstatus FROM `tbl_rental_car` INNER JOIN cars on cars.id=tbl_rental_car.car_id  where tbl_rental_car.user_id='$id' ");
                 while ($reservationtItem = mysqli_fetch_assoc($selectreservaion)){ ?>
                <tbody>
                   <tr class="contents">

                     <td style="display:none;"><?php echo $reservationtItem['id_rent'] ?></td>
             
                     <td class="titles"><?php echo $reservationtItem['name'] ?></td>
                     <td class="titles"><?php echo $reservationtItem['model'] ?></td>
                     <td><?php echo $reservationtItem['rent_sender'] ?></td>
                     <td><?php echo $reservationtItem['rent_ref'] ?></td>
                     <td><?php echo $reservationtItem['rentalstatus'] ?></td>
                     <td style="display:none;"><?php echo $reservationtItem['client_id'] ?></td>


                     <?php
                     if($reservationtItem['rentalstatus']=='pending'){
                      ?>
                      <td>
                        <button type='button' class='btn btn-primary btn-sm btn-flat'  data-id="<?php echo $reservationtItem['car_id'] ?>" id="viewprofile"> VIEW </button>
                        <button type='button' class='btn btn-primary btn-sm btn-flat' id="btnupdate">UPDATE PAYMENT </button>

                      </td>

                      <?php
                    }elseif ($reservationtItem['rentalstatus']=='Sending Payment') {
                      ?>

                      <td>


                        <button type='button' class='btn btn-primary btn-sm btn-flat'  data-id="<?php echo $reservationtItem['car_id'] ?>" id="viewprofile"> VIEW </button>

                      </td>

                      <?php
                    }elseif ($reservationtItem['rentalstatus']=='REJECTED') {
                      ?>
                      <td>
                        <button type='button' class='btn btn-primary btn-sm btn-flat'  data-id="<?php echo $reservationtItem['car_id'] ?>" id="viewprofile"> VIEW </button>
                        <button type='button' class='btn btn-primary btn-sm btn-flat' id="btnupdate">UPDATE PAYMENT</button>

                      </td>
                      <?php 
                    }elseif ($reservationtItem['rentalstatus']=='CONFIRMED') {
                      ?>
                      <td>


                        <button type='button' class='btn btn-primary btn-sm btn-flat'  data-id="<?php echo $reservationtItem['car_id'] ?>" id="viewprofile"> VIEW </button>
                          <button type='button' class='btn btn-primary btn-sm btn-flat' id="return_btn" >Send Proof</button>

                      </td>
                      <?php
                    }else{
                      ?>

                    <?php }?>



                  </tr>
                <?php }?>
              </tbody>

            </table>
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
      <form action="update_payment_rental.php" method="POST" enctype="multipart/form-data">
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





<!--viewing   form-->
<div class="modal"  id="proof_return" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"  style="overflow:auto;">
  <div class="modal-dialog ">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"></h5>
      </div>
      <form action="user_retrurn_car.php" method="POST" enctype="multipart/form-data">
        <div class="modal-body">
         <p>UPLOAD PICTURE PROOF OF  RETURN CAR</p>
         <input type="text" name="idgets" id="idgets" class="form-control"  style="display:none;" > 
         <div class="form-group m-2">
           <input type="file" name="fileToUpload" id="fileToUpload" class="form-control" required > 
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

 <script src=
"https://code.jquery.com/jquery-3.5.1.min.js"
integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
         crossorigin= "anonymous"></script><script src=
"https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.js"></script>
</body>
</html>





<script type="text/javascript">
  $(document).ready(function(){

    $("body").on("click",'#btnupdate',function(){
      $('#view').show();

      var tr = $(this).closest("tr").find('td');
     var  get=tr.eq(6).text();
   $.cookie("chat_id",get);
   var test=tr.eq(0).text();
     
     $.cookie("send_id",test);

   window.location.assign("user_rental_cars.php");
     

    });


        $("body").on("click",'#return_btn',function(){
      $('#proof_return').show();

      $('form')[0].reset();
      var tr = $(this).closest("tr").find('td');
      var test=$('#idgets').val(tr.eq(0).text());
     
   $.cookie("send_id",test);


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
         $.removeCookie("chat_id", "");
      
    });

    $("body").on("click",'#closerent',function(){
      $('.show').hide();

    });


    $('#mysearchs').keyup(function(){
  // Search text
  var text = $(this).val();
  // Hide all content class element
  $('.contents').hide();

  // Search 
  $('.contents .titles:contains("'+text+'")').closest('.contents').show();


});

  });

</script>



