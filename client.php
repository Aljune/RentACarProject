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

$currentPage = "client";
$currentTitle = "CLIENT";

$id = $_SESSION["user_id"];
$result = mysqli_query($conn, "SELECT * FROM tbl_user WHERE id = $id");
$row = mysqli_fetch_assoc($result);

?>

<?php include './admin-layout/header.php'?>

  <div class="container-fluid ">
    <div class="row" style="height: 100vh; background-color: #F2F2F2">

    <?php include './admin-layout/nav-menu.php'?>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Cleints</h1>
      </div>

      <div class="d-flex mb-3">
           <a href="/rent-a-car/client/add.php"> <button class="btn border border-secondary border-2 px-4"> ADD Client</button></a>
      </div>

      <h2>List Client</h2>
      <div class="table-responsive">
        <table class="table table-dark table-striped">
          <thead>
            <tr>
              <th scope="col">USER ID</th>
              <th scope="col">Name</th>
              <th scope="col">Email</th>
              <th scope="col">Role</th>
              <th scope="col">Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php
           
           $selectListUser = mysqli_query($conn, "SELECT * FROM tbl_user WHERE ROLE = 'client' ORDER BY id");

           while ($userItem = mysqli_fetch_assoc($selectListUser)) { ?>
               <tr>
            
             <td><?php echo $userItem['id'] ?></td>
             <td><?php echo $userItem['first_name'] ?>, <?php echo $userItem['last_name'] ?></td>
             <td><?php echo $userItem['email'] ?></td>
             <td>
               <?php if($userItem['role'] == 'admin'):?>
                <span>ADMIN</span>
               <?php elseif($userItem['role'] == 'agent'):?>
                <span>AGENT</span>
               <?php elseif($userItem['role'] == 'client'):?>
                <span>CLIENT</span>
              <?php endif;?>
            </td>
             <td>
               <a href="/rent-a-car/client/client-edit.php?edit=<?php echo $userItem['id'] ?>"><button type='button' class='btn btn-primary'> EDIT </button></a>
               <a href="/rent-a-car/user.php?delete=<?php echo $userItem['id'] ?>"> <button type='button' class='btn btn-danger'> DELETE </button></a>
             </td>
           </tr>
           <?php
           }
           ?>
          </tbody>
        </table>
      </div>
    </main>
  </div>
</div>

<?php include './admin-layout/footer.php'?>

</body>
</html>