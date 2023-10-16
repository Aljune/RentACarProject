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

    $currentTitle = "RESERVATION FORM CONFIRMATION";
    
}elseif(isset($_SESSION['user_id'])){

    $currentTitle = "RESERVATION FORM CONFIRMATION";

$userID = $_SESSION["user_id"];

$result = mysqli_query($conn, "SELECT * FROM tbl_user WHERE id = $userID");
$row = mysqli_fetch_assoc($result);

$selected_carID = $_POST['selected_carID'];

$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$pickup_location = $_POST['pickup_location'];
$pickup_date = $_POST['pickup_date'];
$pickup_time = $_POST['pickup_time'];
$email = $_POST['email'];
$phone_number = $_POST['phone_number'];


// Get the number of days between the two dates

$selectedCar = mysqli_query($conn, "SELECT * FROM cars WHERE id=$selected_carID");

$selectedInfoCar = mysqli_fetch_assoc($selectedCar);

$daily_rate = $selectedInfoCar['price'];
if(isset($_POST["submit"])) {
    // Validate the user input
    $selected_carID = $_POST['selected_carID'];
$client_id = $selectedInfoCar['client_id'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$pickup_location = $_POST['pickup_location'];
$pickup_date = $_POST['pickup_date'];
$pickup_time = $_POST['pickup_time'];
$email = $_POST['email'];
$phone_number = $_POST['phone_number'];
$date= $Date=date('M d Y');


    $query = "INSERT INTO `tbl_reservation`(`user_id`, `car_id`, `client_id`, `first_name`, `last_name`, `email`, `pickup_location`, `pickup_date`, `pickup_time`, `phone_number`, `reservation_fee`, `status`, `rent_date_add`) VALUES ('$userID','$selected_carID','$client_id','$first_name','$last_name','$email','$pickup_location','$pickup_date','$pickup_time','$phone_number','1000','pending','$date')";

    if(mysqli_query($conn, $query)) {

        $update=" update cars  set  status='NOT AVAILABLE'   where  id='$selected_carID'";
mysqli_query($conn,$update);
        // Redirect the user to the login page
        $error_message = "Successfully Saved";
        echo "<script> alert('New record created successfully'); </script>";
        
        header("Location: /rent-a-car/home.php");
        exit;
        
    } else {
        echo "<script> alert('New record is cannot be saved'); </script>";
        $error_message = "Failed to register user";
    }
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
                                    <p class="ms-3"><?php echo $selectedInfoCar['price'] ?></p>
                                </div>
                                  <div class="d-flex">
                                    <label class="fw-bolder me-3" for="">Rerservation Fee</label>: 
                                    <p class="ms-3"><?php echo $selectedInfoCar['reservation_fee'] ?></p>
                                </div>
                                
                           


                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card my-3">
                <div class="card-header bg-blue">
                    <h5 class="text-white">RENT FORM </h5>
                </div>
                <form method="post" action="">
                    <div class="card-body">
                    <input name="selected_carID" type="text" class="d-none" value="<?php echo $selected_carID?>">
                        <div class="row rows-col-2 mb-3"> 
                            <div class="form-floating col-md-6 ">
                                <input type="text" name="first_name" class="form-control" id="floatingInput" value="<?php echo $first_name ?>" placeholder="First Name" >
                                <label style="left: 12px;" for="floatingInput">FIRST NAME</label>
                            </div>
                            <div class="form-floating col-md-6">
                                <input type="text" name="last_name" class="form-control" id="floatingPassword" value="<?php echo $last_name ?>" placeholder="LAST NAME" >
                                <label style="left: 12px;" for="floatingPassword">LAST NAME</label>
                            </div>
                        </div>

                        <div class="row rows-col-3 mb-3"> 
                            <div class="form-floating col-md-4 ">
                                <input type="text" name="pickup_location" class="form-control" id="floatingInput" value="<?php echo $pickup_location ?>" placeholder="PICKUP LOCATION" >
                                <label style="left: 12px;" for="floatingInput">PICKUP LOCATION</label>
                            </div>
                            <div class="form-floating col-md-4 ">
                                <input type="date" name="pickup_date" class="form-control" id="floatingPassword" value="<?php echo $pickup_date ?>"  placeholder="PICKUP DATE" >
                                <label style="left: 12px;" for="floatingPassword">PICKUP DATE</label>
                            </div>
                            <div class="form-floating col-md-4 ">
                                <input type="time" name="pickup_time" class="form-control" id="floatingPassword" value="<?php echo $pickup_time ?>"  placeholder="PICKUP TIME" >
                                <label style="left: 12px;" for="floatingPassword">PICKUP TIME</label>
                            </div>
                        </div>

          

                        <div class="row rows-col-2 mb-3"> 
                            <div class="form-floating col-md-6 ">
                                <input type="email" name="email" class="form-control" id="floatingInput" placeholder="EMAIL" value="<?php echo $email ?>" >
                                <label style="left: 12px;" for="floatingInput" >EMAIL</label>
                            </div>
                            <div class="form-floating col-md-6">
                                <input type="text" name="phone_number" class="form-control" id="floatingPassword" value="<?php echo $phone_number ?>" placeholder="PHONE NUMBER">
                                <label style="left: 12px;" for="floatingPassword">PHONE NUMBER</label>
                            </div>
                        </div>

                        <button type="submit" class="btn bg-blue" name="submit" >SUBMIT</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

<?php include './frontend/footer.php'?>