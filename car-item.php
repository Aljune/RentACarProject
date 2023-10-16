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

$error_message = "";
$check_session = 'naa';

if(!isset($_SESSION['user_id'])){

    $currentPage = "car";
    $currentTitle = "CAR";
    $userID = "";
    $check_session = 'wla';

    
    if (isset($_GET['view'])) {
        $carID = $_GET['view'];
        
        $selectedCar = mysqli_query($conn, "SELECT * FROM cars WHERE id=$carID");
        $selectedInfoCar = mysqli_fetch_assoc($selectedCar);
    
    }

    if(isset($_POST['submit'])){
        $email = trim($_POST["email"]);
        $password = trim($_POST["password"]);
        
        $result = mysqli_query($conn, "SELECT * FROM tbl_user WHERE email = '$email'  OR email = '$email'  LIMIT 1");
        // Check if the query returned a row
        if(mysqli_num_rows($result) == 1) {
            $user = mysqli_fetch_assoc($result);
            // Verify the password
    
            if(password_verify($password, $user['password'])) {
                // Set the user's session and redirect to the dashboard
                echo "<script> alert('Successfully'); </script>";
                $userId = $user['id'];
                $_SESSION['user_id'] = $userId;
    
                $query = "UPDATE tbl_rental_car SET user_id = '$userId'  WHERE email = '$email'";
    
                if(mysqli_query($conn, $query)) {
                    // Redirect the user to the login page
                    
                    $resData = mysqli_query($conn, "SELECT * FROM tbl_rental_car WHERE user_id=$userId  ORDER BY ID DESC LIMIT 1 ");
    
                    $row = mysqli_fetch_assoc($resData);
                    
                } else {
                    $error_message = "Failed to register user";
                }
                header("Location: car-item.php?view=" . $carID);

                exit;
            } else {
                $error_message = "Invalid username or password";
            }
    
        }
        else {
            $error_message = "Invalid username or password";
        }
    
    }

}elseif(isset($_SESSION['user_id'])){
    $check_session = 'naa';

    $currentPage = "car";

    $currentTitle = "CAR";
    
    $userID = $_SESSION["user_id"];
    $result = mysqli_query($conn, "SELECT * FROM tbl_user WHERE id = $userID");
    $row = mysqli_fetch_assoc($result);

    if (isset($_GET['view'])) {
        $carID = $_GET['view'];
        
        $selectedCar = mysqli_query($conn, "SELECT * FROM cars WHERE id=$carID");
        $selectedInfoCar = mysqli_fetch_assoc($selectedCar);
    
    }
    
}

?>

<?php include './frontend/header.php'?>
<div class="container ">
    <div class="row">
        <div class=" col-md-12">
        <div class="card my-3">
                <div class="card-header bg-blue">
                    <h5 class="text-white">CAR DETAILS </h5>
                </div>
                <div class="card-body p-3">
                    <div class="row rows-col-2 mb-3"> 
                        <div class="col ">
                            <div class="p-3">
                                 <img src="./img/uploads/<?php echo $selectedInfoCar['image'] ?>" class="" alt="" height="100%" width="100%">
                            </div>
                        </div>
                        <div class="col border">
                     
                            <div class="p-3">
                            <input name="selected_carID" type="text" class="d-none" value="<?php echo $carID?>">
                                <div class="d-flex">
                                    <label class="fw-bolder me-3" for="">NAME</label>: 
                                    <p class="ms-3"><?php echo $selectedInfoCar['name'] ?></p>
                                </div>
                                <div class="d-flex">
                                    <label class="fw-bolder me-3" for="">BRANCH</label>: 
                                    <p class="ms-3"><?php echo $selectedInfoCar['branch'] ?></p>
                                </div>
                                <div class="d-flex">
                                    <label class="fw-bolder me-3" for="">MODEL</label>: 
                                    <p class="ms-3"><?php echo $selectedInfoCar['model'] ?></p>
                                </div>
                                <div class="d-flex">
                                    <label class="fw-bolder me-3" for="">YEAR</label>: 
                                    <p class="ms-3"><?php echo $selectedInfoCar['year'] ?></p>
                                </div>
                                <div class="d-flex">
                                    <label class="fw-bolder me-3" for="">PASSENGER SEAT</label>: 
                                    <p class="ms-3"><?php echo $selectedInfoCar['passenger_seat'] ?></p>
                                </div>
                                <div class="d-flex">
                                    <label class="fw-bolder me-3" for="">TYPE TRANMISSION</label>: 
                                    <p class="ms-3"><?php echo $selectedInfoCar['type_transmission'] ?></p>
                                </div>
                                <div class="d-flex">
                                    <label class="fw-bolder me-3" for="">TYPE</label>: 
                                    <p class="ms-3"><?php echo $selectedInfoCar['type'] ?></p>
                                </div>
                                <div class="d-flex">
                                    <label class="fw-bolder me-3" for="">DESCRIPTION</label>: 
                                    <p class="ms-3"><?php echo $selectedInfoCar['description'] ?></p>
                                </div>
                                <div class="d-flex">
                                    <label class="fw-bolder me-3" for="">DAILY PRICE RATE</label>: 
                                   P <p class="ms-3"><?php echo $selectedInfoCar['price'] ?></p>
                                </div>
                               
                            </div>
                            <div class="w-100">
                                <?php if($check_session === 'wla'):?>
                                    <button class="btn bg-orange text-white w-100" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        SELECT THIS VEHICLE
                                    </button>
                                <?php else:?>
                                    <a href="car-select.php?id=<?php echo $selectedInfoCar['id'] ?>">
                                        <button class="btn bg-orange text-white w-100">
                                            SELECT THIS VEHICLE
                                        </button>
                                    </a>
                                <?php endif?>
                            </div>
                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include './login-modal.php'?>

<?php include './frontend/footer.php'?>