<?php
    session_start();
    require '../db_config.php';

    if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit;

    }
    $currentPage = "reservation";
    $currentTitle = "RESERVATON";

    $id = $_SESSION["user_id"];

    $result = mysqli_query($conn, "SELECT * FROM tbl_user WHERE id = $id");
    $row = mysqli_fetch_assoc($result);
    // $selecruser = mysqli_query($conn, "SELECT count('first_name') FROM tbl_user");
    // $totaluser = mysqli_fetch_array($selecruser);
    


    if (isset($_GET['edit'])) {
        $id = $_GET['edit'];
        $update = true;

        
        $reservationData = mysqli_query($conn, "SELECT * FROM tbl_rental_car WHERE id=$id");
        $reservaionItem = mysqli_fetch_assoc($reservationData);

        $userReservationID = $reservaionItem['user_id'];
        $clientID = $reservaionItem['client_id'];
        $carID =$reservaionItem['car_id'];

        $selectedCar = mysqli_query($conn, "SELECT * FROM cars WHERE id=$carID");
        $selectedCarItem = mysqli_fetch_assoc($selectedCar);
        
    }

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Validate the user input
        $first_name = trim($_POST['first_name']);
        $last_name = trim($_POST['last_name']);
        $email = trim($_POST['email']);
        $pickup_location = trim($_POST['pickup_location']);
        $pickup_date = trim($_POST['pickup_date']);
        $pickup_time = trim($_POST['pickup_time']);
        $drop_location = trim($_POST['drop_location']);
        $drop_date = trim($_POST['drop_date']);
        $drop_time = trim($_POST['drop_time']);
        $phone_number = trim($_POST['phone_number']);
        $payment_type = $reservaionItem['payment_type'];
        $account_name = $reservaionItem['account_name'];
        $account_number = $reservaionItem['account_number'];
        $total_rate = $reservaionItem['total_rate'];
        $status = trim($_POST['status']);
        // Validate the input
        if( empty($first_name) ||  empty($last_name) ||  empty($email) || empty($pickup_location) || empty($pickup_date) || empty($pickup_time) || empty($drop_location) || empty($drop_date) || empty($drop_time) || empty($phone_number)) {
            $error_message = "All fields are required";
        }
            else {
            
            $query = "UPDATE tbl_rental_car SET user_id = '$userReservationID', car_id = '$carID', client_id = '$clientID',  first_name = '$first_name', last_name = '$last_name', email = '$email', pickup_location = '$pickup_location', pickup_date = '$pickup_date', pickup_time = '$pickup_time', drop_location = '$drop_location', drop_date = '$drop_date', drop_time = '$drop_time', phone_number = '$phone_number', status = '$status'  WHERE id = '$id'";

            if(mysqli_query($conn, $query)) {
                // Redirect the user to the login page
                $error_message = "Successfully Saved";
                
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
        <div class="d-flex mb-3 mt-3">
            <a href="/rent-a-car/dashboarduser.php"><button class="btn border border-secondary border-2 px-4"> BACK </button></a>  
        </div>
        <div class="">
            <form action="" method="post" >

                <h2 class="h3 mb-3  fw-bold">INFORMATION DETAILS</h2>
                <hr/>
                <div class="text-left">
                    <div class="form-floating mb-3">
                        <input type="text" name="first_name" value="<?php echo $reservaionItem['first_name']?>" class="form-control" id="floatingInput" placeholder="NAME">
                        <label for="floatingInput">FIRST NAME</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" name="last_name" value="<?php echo $reservaionItem['last_name']?>" class="form-control" id="floatingPassword" placeholder="BRANCH">
                        <label for="floatingPassword">LAST NAME</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" name="email" value="<?php echo $reservaionItem['email']?>" class="form-control" id="floatingPassword" placeholder="MODEL">
                        <label for="floatingPassword">EMAIL</label>
                    </div>
                    

                    <div class="form-floating mb-3">    
                        <input type="text" name="pickup_location" value="<?php echo $reservaionItem['pickup_location']?>" class="form-control" id="floatingPassword" placeholder="YEAR"/>
                        <label for="floatingPassword">Pickup Location</label>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-floating mb-3 ">
                                <input type="date" name="pickup_date" value="<?php echo $reservaionItem['pickup_date']?>" class="form-control" id="floatingPassword" placeholder="PASSENGER SET">
                                <label for="floatingPassword">Pickup Date</label>
                            </div>  
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating mb-3 ">
                                <input type="time" name="pickup_time" value="<?php echo $reservaionItem['pickup_time']?>" class="form-control" id="floatingPassword" placeholder="PASSENGER SET">
                                <label for="floatingPassword">Pickup Time</label>
                            </div>
                        </div>
                    </div>
                
                    <div class="form-floating mb-3">    
                        <input type="text" name="drop_location" value="<?php echo $reservaionItem['drop_location']?>" class="form-control" id="floatingPassword" placeholder="YEAR"/>
                        <label for="floatingPassword">Drop Location</label>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-floating mb-3 ">
                                <input type="date" name="drop_date" value="<?php echo $reservaionItem['drop_date']?>" class="form-control" id="floatingPassword" placeholder="PASSENGER SET">
                                <label for="floatingPassword">Drop Date</label>
                            </div>  
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating mb-3 ">
                                <input type="time" name="drop_time" value="<?php echo $reservaionItem['drop_time']?>" class="form-control" id="floatingPassword" placeholder="PASSENGER SET">
                                <label for="floatingPassword">Drop Time</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" name="phone_number" value="<?php echo $reservaionItem['phone_number']?>" class="form-control" id="floatingPassword" placeholder="PASSENGER SET">
                        <label for="floatingPassword">Phone Number</label>
                    </div>

                    <div class="form-floating mb-3">
                        <select class="form-select" name="status" id="type" aria-label="Select type one">
                            <option selected disabled>SELECT STATUS </option>
                            <option value="0" <?php if ($reservaionItem['status'] == 0) echo "selected"; ?>>PENDING</option>
                            <option value="1" <?php if ($reservaionItem['status'] == 1) echo "selected"; ?>>RESERVED</option>
                            <option value="2" <?php if ($reservaionItem['status'] == 2) echo "selected"; ?>>CANCELED</option>
                            <option value="3" <?php if ($reservaionItem['status'] == 3) echo "selected"; ?>>PRINTED</option>
                            <option value="4" <?php if ($reservaionItem['status'] == 4) echo "selected"; ?>>PAID</option>
                            <option value="5" <?php if ($reservaionItem['status'] == 5) echo "selected"; ?>>CLOSED</option>
                            
                        </select>
                        <label for="floatingSelect">SELECT STATUS</label>
                    </div>
                    <h2 class="h3 mb-3  fw-bold">CAR ITEM DETAILS</h2>
                    <hr/>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-floating mb-3 ">
                                <input type="text" name="name" value="<?php echo $selectedCarItem['name']?>" disabled class="form-control" id="floatingPassword" placeholder="PASSENGER SET">
                                <label for="floatingPassword">Name</label>
                            </div>  
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating mb-3 ">
                                <input type="text" name="branch" value="<?php echo $selectedCarItem['branch']?>" disabled class="form-control" id="floatingPassword" placeholder="PASSENGER SET">
                                <label for="floatingPassword">BRANCH</label>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-floating mb-3 ">
                                <input type="text" name="model" value="<?php echo $selectedCarItem['model']?>" disabled class="form-control" id="floatingPassword" placeholder="PASSENGER SET">
                                <label for="floatingPassword">MODEL</label>
                            </div>  
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating mb-3 ">
                                <input type="text" name="year" value="<?php echo $selectedCarItem['year']?>" disabled class="form-control" id="floatingPassword" placeholder="PASSENGER SET">
                                <label for="floatingPassword">YEAR</label>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-floating mb-3 ">
                                <input type="number" name="passenger-set" value="<?php echo $selectedCarItem['passenger_seat']?>" class="form-control" disabled  id="floatingPassword" placeholder="PASSENGER SET">
                                <label for="floatingPassword">PASSENGER SET NUMBERS</label>
                            </div>  
                        </div>
                        <div class="col-md-4">
                            <div class="form-floating mb-3 ">
                                <input type="text" name="type-1" value="<?php echo $selectedCarItem['type_transmission']?>" class="form-control" id="floatingPassword" disabled placeholder="PASSENGER SET">
                                <label for="floatingPassword">TYPE TRANSMISSION </label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-floating mb-3 ">
                                <input type="text" name="type"  disabled value="<?php echo $selectedCarItem['type']?>" class="form-control" disabled  id="floatingPassword" placeholder="PASSENGER SET">
                                <label for="floatingPassword">TYPE OF CAR</label>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-floating mb-3 ">
                                <input type="text" name="price" value="<?php echo $selectedCarItem['price']?>" class="form-control" id="floatingPassword" disabled placeholder="PASSENGER SET">
                                <label for="floatingPassword">PRICE</label>
                            </div>  
                        </div>
                        
                    </div>

                    <h2 class="h3 mb-3  fw-bold">PAYMENT METHOD</h2>
                    <hr/>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-floating mb-3 ">
                                <input type="text" name="payment_type" value="<?php echo $reservaionItem['payment_type']?>" class="form-control" disabled  id="floatingPassword" placeholder="PYAYMENT TYPE">
                                <label for="floatingPassword">PYAYMENT TYPE</label>
                            </div>  
                        </div>
                        <div class="col-md-4">
                            <div class="form-floating mb-3 ">
                                <input type="text" name="account_name" value="<?php echo $reservaionItem['account_name']?>" class="form-control" disabled id="floatingPassword" placeholder="ACCOUNT NAME">
                                <label for="floatingPassword">ACCOUNT NAME</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-floating mb-3 ">
                                <input type="text" name="account_number" value="<?php echo $reservaionItem['account_number']?>"  class="form-control" disabled id="floatingPassword" placeholder="PASSENGER SET">
                                <label for="floatingPassword">ACCOUNT NUMBER</label>
                            </div>
                        </div>
                    </div>
                    <h2 class="h3 mb-3  fw-bold">TOTAL RATE</h2>
                    <hr/>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-floating mb-3 ">
                                <input type="number" name="total_rate" value="<?php echo $reservaionItem['total_rate']?>" class="form-control" id="floatingPassword" disabled placeholder="PASSENGER SET">
                                <label for="floatingPassword">TOTAL DAILY RATE</label>
                            </div>  
                        </div>
                        
                    </div>

                
                 </div>
                <div class="d-flex ">
                <?php if($row['role'] === 'admin'):?>
                    <div class="w-100 p-2">
                        <button class=" btn btn-lg btn-primary" name="add_car"  type="submit">SUBMIT</button>
                        <button class=" btn btn-lg btn-pitch-pink text-white" type="cancel_car">CANCEL</button>
                    </div>
                <?php elseif($row['role'] === 'agent'):?>
                    <div class="w-100 p-2">
                        <button class=" btn btn-lg btn-primary" name="add_car"  type="submit">SUBMIT</button>
                        <button class=" btn btn-lg btn-pitch-pink text-white" type="cancel_car">CANCEL</button>
                    </div>
                
                <?php endif;?>
                </div>
            </form>
        </div>
    </main>
    </div>
</div>
<?php include '../admin-layout/footer.php'?>

