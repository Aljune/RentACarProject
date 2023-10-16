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
  $cardeletedata = mysqli_query($conn, " DELETE FROM tbl_rental_car WHERE id=$id");
}


?>

<style type="text/css">

  th{
    font-size:13px;
  }

</style>
<?php include './admin-layout/header.php'?>

<div class="container-fluid ">
  <div class="row" style="height: 100vh; background-color: #F2F2F2">
    <?php include './admin-layout/nav-menu.php'?>
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Car List Rent</h1>

      </div>

        <div style="margin-bottom:2%;">
          <input type="text" name="search"  placeholder="search"   id="myInput" onkeyup="myFunction()" class="form-control ml-3" style="width:22%;">
        </div>

      <div class="table-responsive">
        <table class="table table-dark table-striped">
          <thead>
            <tr>
              <th scope="col" style="display:none;">ID</th>
              <th scope="col">Date Rent</th>
              <th scope="col">Name</th>
              <th scope="col">Model</th>
              <th scope="col">sender</th>
              <th scope="col">references No</th>
              <th scope="col">STATUS</th>
              <th scope="col">ACTIONS</th>
            </tr>
          </thead>
          <tbody>

           <?php    $selectreservaion = mysqli_query($conn, "SELECT *,tbl_rental_car.id as id_rent FROM `tbl_rental_car` INNER JOIN cars on cars.id=tbl_rental_car.car_id");
           while ($reservationtItem = mysqli_fetch_assoc($selectreservaion)){ ?>
             <tr class="content">
              
               <td style="display:none;"><?php echo $reservationtItem['id_rent'] ?></td>
               <td><?php echo $reservationtItem['id'] ?></td>
               <td class="title"><?php echo $reservationtItem['name'] ?></td>
               <td class="title"><?php echo $reservationtItem['model'] ?></td>
               <td><?php echo $reservationtItem['rent_sender'] ?></td>
               <td><?php echo $reservationtItem['rent_ref'] ?></td>
               <td>
                pending
              </td>
              <td>
                <button type='button' class='btn btn-primary btn-sm btn-flat'  data-id="<?php echo $reservationtItem['car_id'] ?>" id="viewprofile"> VIEW </button>
                <button type='button' class='btn btn-success btn-sm btn-flat' id="btnupdate">update payment </button>

              </td>
            </tr>
          <?php }?>
        </tbody>

      </table>
    </div>
  </main>
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




<div class="modal show " id="viewproject" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content" style="border-radius:10px;">
      <div class="modal-header " style="border:0;">
      </div>
      <div class="modal-body" style="height:auto;overflow:auto;">

       <p style="text-align:center;font-size:17px;font-family:bold;">RENT INFORMATION</p>
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
<?php include './admin-layout/footer.php'?>

</body>
</html>
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="js/sb-admin-2.min.js"></script>

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

