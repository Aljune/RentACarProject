
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
               Car List
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

         <div class="d-flex mb-3">
           <a href="user_car_post.php"> <button class="btn border border-secondary border-2 px-4"> ADD CAR</button></a>
      </div>
      <div class="table-responsive">
        <table class="table table-dark table-striped">
          <thead>
            <tr>
              <th scope="col">Name</th>
              <th scope="col">Model</th>
              <th scope="col">Branch</th>
              <th scope="col">Type</th>
              <th scope="col">Passenger seat</th>
              <th scope="col">Price</th>
                 <th scope="col">Status</th>
   
            </tr>
          </thead>
          <tbody>
          <?php
           $id=$_COOKIE['logid'];
                $selectposts = mysqli_query($conn, "SELECT * FROM cars where  client_id='$id'");

                while ($postItem = mysqli_fetch_assoc($selectposts)) { ?>
                    <tr>
                 
                  <td><?php echo $postItem['name'] ?></td>
                  <td><?php echo $postItem['model'] ?></td>
                  <td><?php echo $postItem['branch'] ?></td>
                  <td><?php echo $postItem['type'] ?></td>
                   <td><?php echo $postItem['passenger_seat'] ?></td>
                     <td><?php echo $postItem['price'] ?></td>
                        <td><?php echo $postItem['status'] ?></td>
           
                  <td>
                    <a href="user_edit_carpost.php?edit=<?php echo $postItem['id'] ?>"><button type='button' class='btn btn-primary'> edit </button></a>
                    <a href="user_delete_post.php?id=<?php echo $postItem['id'] ?>"> <button type='button' class='btn btn-danger'> delete </button></a>
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
</div>





  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="js/sb-admin-2.min.js"></script>


</body>
</html>


