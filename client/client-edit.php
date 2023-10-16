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
$currentPage = "client";
$currentTitle = "CLIENT";

$userID = $_SESSION["user_id"];

$result = mysqli_query($conn, "SELECT * FROM tbl_user WHERE id = $userID");

$row = mysqli_fetch_assoc($result);

if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $update = true;
    $clientData = mysqli_query($conn, "SELECT * FROM tbl_user WHERE id=$id");
    $rowClient = mysqli_fetch_assoc($clientData);
}
?>

<?php include '../admin-layout/header-2.php'?>
<div class="container-fluid ">
    <div class="row" style="height: 100vh; background-color: #F2F2F2">
    <?php include '../admin-layout/nave-menu-2.php'?>
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">CLIENT INFORMATION</h1>
            </div>
            <div class="d-flex mb-3">
               <a href="/rent-a-car/client.php"><button class="btn border border-secondary border-2 px-4"> BACK </button></a>  
            </div>
            <div class="row ">
                <div class="col-md-8">
                    <form action="" method="post" >
                        <div class="form-floating mb-3">
                            <input type="text" name="first_name" class="form-control" id="floatingInput" placeholder="NAME" value="<?php echo $rowClient['first_name']?>">
                            <label for="floatingInput">FIRST NAME</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" name="last_name" class="form-control" id="floatingInput" placeholder="NAME" value="<?php echo $rowClient['last_name']?>">
                            <label for="floatingInput">LAST NAME</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" name="username" class="form-control" id="floatingInput" placeholder="NAME" value="<?php echo $rowClient['username']?>">
                            <label for="floatingInput">USERNAME</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" name="email" class="form-control" id="floatingInput" placeholder="NAME" value="<?php echo $rowClient['email']?>">
                            <label for="floatingInput">EMAIL</label>
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