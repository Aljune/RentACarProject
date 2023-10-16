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
    $currentTitle = "CAR";
    $check_session = 'wla';
}elseif(isset($_SESSION['user_id'])){

    $userID = $_SESSION["user_id"];

    $result = mysqli_query($conn, "SELECT * FROM tbl_user WHERE id = $userID");
    $row = mysqli_fetch_assoc($result);

    $num_days = 1;

    if (isset($_GET['id'])) {

        $carID = $_GET['id'];
        
        $selectedCar = mysqli_query($conn, "SELECT * FROM cars WHERE id=$carID");
        $selectedInfoCar = mysqli_fetch_assoc($selectedCar);
    
        $daily_rate = $selectedInfoCar['price'];
        $total_rate = $daily_rate * $num_days;
             $fee=$selectedInfoCar['reservation_fee'];
        $currentTitle = $selectedInfoCar['name'];
    }   
}
?>


<?php include './frontend/header.php'?>

<div class="container ">
    <div class="row">
        <div class=" col-md-8">
            <div class="card my-3 " style="margin-top:10%;">
                <div class="card-header bg-blue">
                    <h5 class="text-white">RESERVATION  FORM </h5>
                </div>
                <form method="post" action="reservation_send.php">
                    <div class="card-body">
                            <input name="selected_carID" type="text" class="d-none" value="<?php echo $carID?>">
                           <div class="row rows-col-2 mb-3"> 
                                <div class="form-floating col-md-6 ">
                                    <input type="text" name="first_name" class="form-control" id="floatingInput" placeholder="First Name" >
                                    <label style="left: 12px;" for="floatingInput">FIRST NAME</label>
                                </div>
                                <div class="form-floating col-md-6">
                                    <input type="text" name="last_name" class="form-control" id="floatingPassword" placeholder="LAST NAME" >
                                    <label style="left: 12px;" for="floatingPassword">LAST NAME</label>
                                </div>
                            </div>
                            <div class="row rows-col-3 mb-3"> 
                                <div class="form-floating col-md-4 ">
                                    <input type="text" name="pickup_location" class="form-control" id="floatingInput" placeholder="PICKUP LOCATION" >
                                    <label style="left: 12px;" for="floatingInput">PICKUP LOCATION</label>
                                </div>
                                <div class="form-floating col-md-4 ">
                                    <input type="date" name="pickup_date" class="form-control" id="floatingPassword" placeholder="PICKUP DATE" >
                                    <label style="left: 12px;" for="floatingPassword">PICKUP DATE</label>
                                </div>
                                <div class="form-floating col-md-4 ">
                                    <input type="time" name="pickup_time" class="form-control" id="floatingPassword" placeholder="PICKUP TIME" >
                                    <label style="left: 12px;" for="floatingPassword">PICKUP TIME</label>
                                </div>
                            </div>
                            <div class="row rows-col-2 mb-3"> 
                                <div class="form-floating col-md-6 ">
                                    <input type="email" name="email" class="form-control" id="floatingInput" placeholder="EMAIL" >
                                    <label style="left: 12px;" for="floatingInput" >EMAIL</label>
                                </div>
                                <div class="form-floating col-md-6">
                                    <input type="text" name="phone_number" class="form-control" id="floatingPassword" placeholder="PHONE NUMBER">
                                    <label style="left: 12px;" for="floatingPassword">PHONE NUMBER</label>
                                </div>
                            </div>
                    </div>
 
                    <div class="p-3">
                        <button class="btn bg-blue text-white" type="submit">
                            SUBMIT
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <div class=" col-md-4">
            <div class="card my-3">
                <div class="card-header bg-blue">
                    <h5 class="text-white">BOOKING</h5>
                </div>
                <div class="card-body">
                    <div class="text-center d-flex justify-content-center align-items-center">
                        <h4>Reservation Fee: </h4> <h2> P<?php echo $fee; ?></h2>
                    </div>  
                    <hr/>
                    <div class="d-flex  ">
                        <div class="col-md-6 text-start">
                            <h6>Daily Rate </h5>
                        </div>
                        <div class="col-md-6 text-end">
                            <p><?php echo $selectedInfoCar['price']?></p>
                       
                        </div>
                    </div>
                    <div>
                        <img src="./img/uploads/<?php echo $selectedInfoCar['image'] ?>" class="" alt="" height="100%" width="100%">
                    </div>
                  
                </div>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript code to select and modify element using $() in jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>

   // get the radio buttons by their name



    // // get the male radio button element by its ID
    // var gcashRadioButton = document.getElementById("gcash_account");

    // // check if the male radio button is checked
    // if (gcashRadioButton.checked) {
    // // if it is checked, get its value
    // var selectedPaymentType = gcashRadioButton.value;
    //     alert(selectedPaymentType);
    // // console.log("Selected gender is " + selectedGender);
    // }
    
</script>

<?php include './frontend/footer.php'?>