


<?php


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
               Profile
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

            <?php
            include'config.php';
            $id=$_COOKIE['logid'];
            $query ="select  *,concat(first_name,' ',last_name) as name from  tbl_user where id='$id' ";
            $fetch=mysqli_query($conn,$query);   
            $row=mysqli_fetch_array($fetch);
            $ids=$_COOKIE['logid'];


            ?>
            <div class="col-md-6">
              <div class="card rounded shadow">
                <img src="img/<?php echo $row['profile_image'];?>" class="card-img-top" alt="..." height="200px;">
                <div class="card-body">
                  <h5 class="card-title" style="color:black;">PERSONAL  INFORMATION</h5>
                  <p class="card-text" style="color:black;">NAME: <span class="text-muted"><?php echo $row['name']; ?></span></p>
                  <p class="card-text" style="color:black;">EMAIL: <span class="text-muted"><?php echo $row['email']; ?></span></p>
         
                </div>
                <hr>
                <div class="card-body">
                  <div class="mx-auto" style="text-align:center;margin-top:0;padding-top:0;"><button type="button" class="btn btn-link btn-success" style="color:white;">ACTIVE</button></div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="row">
  

             <div class="col-md-12 mt-3">
              <div class="card rounded shadow">
                <div class="card-body">
                 <h5 class="card-title" style="color:black;">Change Account</h5>
                 <p class="card-text" style="color:black;">USERNAME: <span class="text-muted"><?php echo $row['username']; ?></span> <a href="#"   id="btnchange" >Update</a></p>
                 <p class="card-text" style="color:black;">PASSWORD: <span class="text-muted">***********</span></p>

               </div>
               <hr>
               <div class="mx-auto mb-3" style="text-align:center;margin-top:0;padding-top:0;">
                <button   id="open" class="btn btn-link btn-success " style="color:white;">CHANGE PROFILE</button>
              </div>
             </div>
           </div>
         </div>
       </div>


     </div>
   </div>



 </div>
</div>
</div>
</div>





         <?php
            include'config.php';
            $id=$_COOKIE['logid'];
            $querys ="select  * from  tbl_user where id='$id' ";
            $fetchs=mysqli_query($conn,$querys);   
            $rows=mysqli_fetch_array($fetchs);
        
            ?>

<!--viewing   form-->
<div class="modal"  id="viewprofile" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"  style="overflow:auto;">
  <div class="modal-dialog ">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Change Account</h5>
      </div>
      <div class="modal-body">
        <form action="updateuseraccount.php" method="post">
        <div class="form-group">
          <p>User Name</p>
          <input type="text" name="user" id="user"  value="<?php echo$rows['username'] ?>" class="form-control" >
        </div>
        <div class="form-group">
          <button type="button" class="btn btn-success btnclose">Close</button>
          <input type="submit" name="">
        </div>
</form>
      </div>
    </div>
  </div>
</div>
<!--register end-->


<div class="modal" id="updateimage" tabindex="-1"  aria-labelledby="exampleModalLabel" aria-hidden="true" >
  <div class="modal-dialog  " >
    <div class="modal-content" style="border-radius:10px;">
      <div class="modal-header " style="border:0;">
        <button type="button" class="close  closeexpense"  data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>

        </button>
      </div>

      <div class="text-modal">
        <p class="mr-3" style="font-size:20px;color:black;padding-left:1px;text-align:center;top:0;">UPDATE PROFILE</p>
      </div>
      <div class="modal-body" style="height:300px;overflow:auto;">
        <form action="admin_upload.php" method="post" enctype="multipart/form-data">
          <p>Upload image</p>
          <div class="form-group">
            <input type="file" name="FileInput" id="FileInput" class="form-control" required>
          </div>

          <div class="form-group">

            <input type="submit"  class="form-control btn btn-success" name="submit">
          </form>
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

    $("body").on("click",'#open',function(){
      $('#updateimage').show();
    });

     $("body").on("click",'.closeexpense',function(){
      $('#updateimage').hide();
    });

    $("body").on("click",'#btnchange',function(){
      $('#viewprofile').show();
    });



  });

</script>