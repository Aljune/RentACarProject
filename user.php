<?php
session_start();
require 'db_config.php';

if(!isset($_SESSION['user_id'])){
header("Location: login.php");
exit;

}

$currentPage = "user";
$currentTitle = "USER";

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
        <h1 class="h2">Users</h1>
      </div>

      <h2>List User</h2>
      <div class="table-responsive">
        <table class="table table-dark table-striped">
          <thead>
            <tr>
              <!-- <th scope="col">#</th> -->
              <th scope="col">Name</th>
              <th scope="col">Email</th>
              <th scope="col">Role</th>
              <th scope="col">Actions</th>
   
            </tr>
          </thead>
          <tbody>
            <?php
           
           $selectListUser = mysqli_query($conn, "SELECT * FROM tbl_user WHERE ROLE = 'agent' ORDER BY id");

           while ($userItem = mysqli_fetch_assoc($selectListUser)) { ?>
               <tr>
            
             <!-- <td><?php echo $userItem['id'] ?></td> -->
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
               <a href="/rent-a-car/user/user-edit.php?edit=<?php echo $userItem['id'] ?>"><button type='button' class='btn btn-primary'> EDIT </button></a>
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