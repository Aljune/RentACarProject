

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
        <p style="text-align:center;"><i class="fas fa-user-circle" style="font-size:30px;color:white;"></i></p> 
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
             car post view
             </div>
           </div>
           <div class="form-group" style="
           margin-bottom: 0px;
           margin-top: 20px;
           margin-left: 20px;
           ">

         </div>



         <div class="card-body">
          <div style="display:flex;">
            <div class="form-group">
                    <a href="admin_post_car.php"> <button class="btn-sm btn-flat btn border border-secondary border-2 px-4 form-control ml-3"> ADD CAR</button></a>
            </div>
             
   <input type="text" name="search"  placeholder="search"   id="mysearch"  class="form-control mb-3 " style="width:22%;margin-left:30px;">

          </div>
  
           <table class="table table-dark table-striped">
            <thead>
              <tr>
               <th scope="col" style="font-size:13px;display:none;">Id</th>
               <th scope="col" style="font-size:13px;">Name</th>
               <th scope="col" style="font-size:13px;">Model</th>
               <th scope="col" style="font-size:13px;">Branch</th>
               <th scope="col" style="font-size:13px;">Price</th>
               <th scope="col" style="font-size:13px;">Date Post</th>
                 <th scope="col" style="font-size:13px;">Role</th>
               <th scope="col" style="font-size:13px;">Status</th>
               <th scope="col" style="font-size:13px;">Action</th>


             </tr>
           </thead>
           <tbody>
            <?php
            include 'config.php';

            $selectreservaion = mysqli_query($conn, "SELECT *,CONCAT(first_name,' ',last_name)  as  name FROM `cars` INNER JOIN tbl_user on  tbl_user.id=cars.client_id   ");

            while ($reservationtItem = mysqli_fetch_assoc($selectreservaion)) { ?>
             <tr class="mycontent">
              <td style="display:none;"><?php echo $reservationtItem['client_id'] ?></td>
              <td class="mytitle"><?php echo $reservationtItem['name'] ?></td>
              <td class="mytitle"><?php echo $reservationtItem['model'] ?></td>
              <td><?php echo $reservationtItem['branch'] ?> </td>
              <td> <?php echo $reservationtItem['price'] ?> </td>
              <td><?php echo $reservationtItem['date_post'] ?></td>
              <td><?php echo $reservationtItem['role'] ?></td>
              <td><?php echo $reservationtItem['status'] ?></td>
              <td>


                <button type='button' class='btn btn-primary btn-sm btn-flat' id="btnupdate">view</button>
                <button type='button' class='btn btn-primary btn-sm btn-flat' id="btnupdate">Update</button>

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
        <h5 class="modal-title">UPDATE</h5>
      </div>
      <form action="admin_action_user.php" method="POST" >
        <div class="modal-body">
          <input type="text" name="idget"  id="idget" style="display:none;">
          <input type="radio" name="getradio"  value="DEACTIVE"><label  class="ml-1">DEACTIVE</label>
          <input type="radio" name="getradio"  value="ACTIVE" style="margin-left:1%;" ><label class="ml-1">ACTIVE</label>
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