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
require '../db_config.php';

if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit;
}

$currentPage = "user";
$currentTitle = "USER";


$id = $_SESSION["user_id"];
$error_message = "";

$result = mysqli_query($conn, "SELECT * FROM tbl_user WHERE id = $id");
$row = mysqli_fetch_assoc($result);

if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $update = true;
    $userData = mysqli_query($conn, "SELECT * FROM tbl_user WHERE id=$id");
    $rowUser = mysqli_fetch_assoc($userData);
}
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Validate the user input
    $first_name = trim($_POST['first_name']);
    $last_name = trim($_POST['last_name']);
    $email = trim($_POST['email']);
    $role = trim($_POST['role']);
    
    // Validate the input
    if( empty($first_name) ||  empty($last_name) ||  empty($email) ||  empty($role)) {
        $error_message = "All fields are required";
    }
     else {


       
        $query = "UPDATE tbl_user SET first_name = '$first_name', last_name = '$last_name', email = '$email', role = '$role'  WHERE id = '$id'";

        if(mysqli_query($conn, $query)) {
            // Redirect the user to the login page
            $error_message = "Successfully Saved";

            header("Location: /rent-a-car/user.php");
            exit;
            
        } else {
            $error_message = "Failed to register user";
        }

    }
}

?>
<?php include '../admin-layout/header-2.php'?>
<div class="container-fluid ">
        <div class="row" style="height: 100%; background-color: #F2F2F2">
        <?php include '../admin-layout/nave-menu-2.php'?>
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">USER INFORMATION</h1>
      </div>     
      <div class="row ">
        <div class="col-md-8">
            <form action="" method="post" >
            <div class="form-floating mb-3">
                <input type="text" name="first_name" class="form-control" id="floatingInput" placeholder="NAME" value="<?php echo $rowUser['first_name']?>">
                <label for="floatingInput">FIRST NAME</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" name="last_name" class="form-control" id="floatingInput" placeholder="NAME" value="<?php echo $rowUser['last_name']?>">
                <label for="floatingInput">LAST NAME</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" name="username" class="form-control" id="floatingInput" placeholder="NAME" value="<?php echo $rowUser['username']?>">
                <label for="floatingInput">USERNAME</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" name="email" class="form-control" id="floatingInput" placeholder="NAME" value="<?php echo $rowUser['email']?>">
                <label for="floatingInput">EMAIL</label>
            </div>
            
            <div class="form-floating mb-3">
                <select class="form-select" name="role" id="role" aria-label="Select type role">
                    <option selected>SELECT TYPE ROLE </option>
                    <option value="admin" <?php if ($rowUser['role'] == 'admin') echo "selected"; ?>>ADMIN</option>
                    <option value="agent" <?php if ($rowUser['role'] == 'agent') echo "selected"; ?>>AGENT</option>
                    <option value="client" <?php if ($rowUser['role'] == 'client') echo "selected"; ?>>CLIENT</option>
                </select>
                <label for="floatingSelect">SELECT TYPE ROLE</label>
            </div>
            <div class="d-flex ">
                <div class="w-100 p-2">
                    <button class=" btn btn-lg btn-primary" name="update_user"  type="submit">UPDATE</button>
                    <button class=" btn btn-lg btn-pitch-pink text-white" type="cancel_user">CANCEL</button>
                </div>
            </div>
            </form>
        </div>
        <div class="col-md-4 ">
            <div class="card ">
                <div class="card-body">
                SIDEBAR HERE CONTENT
                </div>
                
            </div>
        </div>
      </div>
    </main>
    </div>
</div>
<?php include '../admin-layout/footer.php'?>