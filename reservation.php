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

$check_session = 'naa';




if(!isset($_SESSION['user_id'])){
   
    $currentTitle = "CAR";
    $check_session = 'wla';

    $userID = "";

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
                header("Location: list-cars.php");
                exit;
            } else {
                $error_message = "Invalid username or password";
            }
    
        }
        else {
            $error_message = "Invalid username or password";
        }
    
    }

    // $pickup_location = $_POST["pickup_location"];
    // $pickup_date = $_POST["pickup_date"];
    // $pickup_date_formatted = date('F d Y', strtotime($pickup_date));

    // $pickup_time = $_POST["pickup_time"];

    // $drop_location = $_POST["drop_location"];
    // $drop_date = $_POST["drop_date"];
    // $drop_date_formatted = date('F d Y', strtotime($drop_date));
    // $drop_time = $_POST["drop_time"];


    // echo  $pickup_location;
    // echo  $drop_location ;
    
    // echo "User is not logged in aaa";

}elseif(isset($_SESSION['user_id'])){
    
    $currentTitle = "CAR";

    $check_session = 'naa';

    $userID = $_SESSION["user_id"];
    $result = mysqli_query($conn, "SELECT * FROM tbl_user WHERE id = $userID");
    $row = mysqli_fetch_assoc($result);


}

// $pickup_location = $_POST["pickup_location"];
// $pickup_date = $_POST["pickup_date"];
// $pickup_date_formatted = date('F d Y', strtotime($pickup_date));

// $pickup_time = $_POST["pickup_time"];

// $drop_location = $_POST["drop_location"];
// $drop_date = $_POST["drop_date"];
// $drop_date_formatted = date('F d Y', strtotime($drop_date));
// $drop_time = $_POST["drop_time"];



?>


<?php include './frontend/header.php'?>
    
    <div class="container ">
       
        <div class="row">
            <div class=" col-md-12">
            <?php
                // $selectcars = mysqli_query($conn, "SELECT * FROM cars  WHERE permanent_location LIKE '%{$pickup_location}%' AND status= 1");
                $selectcars = mysqli_query($conn, "SELECT * FROM cars  WHERE status='AVAILABLE' ");
                while ($carItem = mysqli_fetch_assoc($selectcars)) {
            ?>
            
                <div class="card my-3">
                    <div class="d-flex">
                        <div class="w-50 m-3">
                        
                            <div>
                                <img src="./img/uploads/<?php echo $carItem['image'] ?>" class="" alt="" height="100%" width="100%">
                            </div>
                            <div class="my-3">
                                TYPE TRANSMISSION :
                                <p class="fw-bold text-uppercase">
                                <?php echo $carItem['type_transmission'] ?>
                                </p>

                                PASSENGER SEATS :
                                <p class="fw-bold"><?php echo $carItem['passenger_seat'] ?></p>
                                 
                            </div>
                        </div> 
                        <div class="w-50 m-3">
                            <div class="mb-3">
                                <h3 class="card-title text-uppercase fw-bolder">
                                    <?php echo $carItem['type'] ?>
                                </h3>
                                <label for="car" class=""> <?php echo $carItem['name'] ?> </label><br/>
                            </div>
                            <div class="mb-3">
                                <h4><strong>PAY ONLINE</strong></h4>
                                <h1 class="text-blue"><strong><?php echo $carItem['price'] ?></strong></h1>

                            </div>
                            <div class="w-100">
                                <?php if($check_session === 'wla'):?>
                                    <button class="btn bg-orange text-white w-100" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        SELECT THIS VEHICLE
                                    </button>
                                <?php else:?>
                                    <a href="reservation_form.php?id=<?php echo $carItem['id'] ?>">
                                        <button class="btn bg-orange text-white w-100">
                                            SELECT THIS VEHICLE 
                                        </button>
                                    </a>
                                <?php endif?>
                            </div>
                        </div>
                        
                    </div>
                    
                    <!-- <div class="card-body">
                    
                    <img src="./img/uploads/<?php echo $carItem['image'] ?>" class="mt-3" alt="" height="200" width="300">
                    </div> -->
                </div>
            <?php
                }
            ?>
            </div>
            
        </div>
    </div>
    <?php include './login-modal.php'?>

<?php include './frontend/footer.php'?>