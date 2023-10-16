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

$currentPage = "car";
$currentTitle = "CAR";

$id = $_SESSION['user_id'];
$status = 1;
$result = mysqli_query($conn, "SELECT * FROM tbl_user WHERE id = $id");
$row = mysqli_fetch_assoc($result);

if($row['role'] === 'admin'){

}elseif($row['role'] === 'client'){

}else{

}

if (isset($_GET['delete'])) {

  $id = $_GET['delete'];
  $update = true;
  echo "<script> alert('Deleted successfully'); </script>";
  $cardeletedata = mysqli_query($conn, " DELETE FROM cars WHERE id=$id");
}
  
  ?>
  <?php include './admin-layout/header.php'?>
  <div class="container-fluid ">
    <div class="row" style="height: 100vh; background-color: #F2F2F2">
      <?php include './admin-layout/nav-menu.php'?>

      <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="h2">Car</h1>
        </div>

        <div class="d-flex mb-3">
           <a href="/rent-a-car/car/add.php"> <button class="btn border border-secondary border-2 px-4"> ADD CAR</button></a>
        </div>
        <div class="">
        <table class="table table-dark table-striped">
            <thead>
                <tr>
                <!-- <th scope="col">RESERVATION ID</th> -->
                <th scope="col">NAME</th>
                <th scope="col">BRANCH</th>
                <th scope="col">MODEL</th>
                <th scope="col">STATUS</th>
                <th scope="col">IMAGED</th>
                <th scope="col">ACTION</th>
                </tr>
            </thead>
            <tbody>
              
                <?php if($row['role'] === 'admin'):?>
                  <?php
                    
                    $selectcars = mysqli_query($conn, "SELECT * FROM cars ORDER BY created_at DESC");
                    while ($carItem = mysqli_fetch_assoc($selectcars)) {
                      $description = $carItem['description'];
                  ?>
                  <tr>
                    <!-- <td><?php echo $carItem['id'] ?></td> -->
                    <td><?php echo $carItem['name'] ?></td>
                    <td><?php echo $carItem['branch'] ?></td>
                    <td><?php echo $carItem['model'] ?></td>
                    <td>
                      <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" <?php if($carItem['status'] === '1'): ?> checked <?php else:?>  <?php endif?>>
                          
                      </div>
                    </td>
                    <td>
                        <img src="./img/uploads/<?php echo $carItem['image'] ?>" alt="<?php echo $carItem['name'] ?>" width="50" height="50">
                    </td>
                    <!-- <td><?php echo  date("F j Y ", strtotime($carItem['created_at'])) ?> </td> -->
                    <td>
                    
                      <a href="/rent-a-car/car/car-edit.php?edit=<?php echo $carItem['id'] ?>"><button type='button' class='btn btn-primary'> edit </button></a>
                      <a href="/rent-a-car/car.php?delete=<?php echo $carItem['id'] ?>"> <button type='button' class='btn btn-danger'> delete </button></a>
                    </td>

                  </tr>
                  <?php
                    
                  }
                  ?>
                <?php elseif($row['role'] === 'client'):?>
                  <?php
                    
                    $selectcars = mysqli_query($conn, "SELECT * FROM cars WHERE status = '$status' AND  client_id = '$id' ORDER BY created_at DESC");
                    while ($carItem = mysqli_fetch_assoc($selectcars)) {
                      $description = $carItem['description'];
                  ?>
                  <tr>
                    <!-- <td><?php echo $carItem['id'] ?></td> -->
                    <td><?php echo $carItem['name'] ?></td>
                    <td><?php echo $carItem['branch'] ?></td>
                    <td><?php echo $carItem['model'] ?></td>
                    <td>
                      <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked>
                      </div>
                    </td>
                    <td>
                        <img src="./img/uploads/<?php echo $carItem['image'] ?>" alt="<?php echo $carItem['name'] ?>" width="50" height="50">
                    </td>
                    <!-- <td><?php echo  date("F j Y ", strtotime($carItem['created_at'])) ?> </td> -->
                    <td>
                    
                      <a href="/rent-a-car/car/car-edit.php?edit=<?php echo $carItem['id'] ?>"><button type='button' class='btn btn-primary'> edit </button></a>
                      <a href="/rent-a-car/car.php?delete=<?php echo $carItem['id'] ?>"> <button type='button' class='btn btn-danger'> delete </button></a>
                    </td>

                  </tr>
                  <?php
                    
                  }
                  ?>
                <?php endif;?>

                
            </tbody>
        </table>
        </div>
      </main>
    </div>
  </div>


  <?php include './admin-layout/footer.php'?>

  </body>
  </html>