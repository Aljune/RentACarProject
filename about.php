<?php

session_start();

require 'db_config.php';


if(!isset($_SESSION['user_id'])){
    $currentTitle = "ABOUT US";

    $userID = "";
    
}elseif(isset($_SESSION['user_id'])){
    
    $currentTitle = "ABOUT US";

    $userID = $_SESSION["user_id"];

    $result = mysqli_query($conn, "SELECT * FROM tbl_user WHERE id = $userID");
    $row = mysqli_fetch_assoc($result);

    
}
?>
<?php include './frontend/header.php'?>

<div class="container ">
    <div class="row">
        <div class=" col-md-12 red my-5">
            <h2 class="text-center fw-bold">Welcome to our Rent a Car company!</h2>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-6">
            <div>
                <img src="./image/car/1.jpeg" alt="" class="img-fluid">
            </div>
        </div>
        <div class="col-md-6" style="display: flex;align-items: center;justify-content: flex-end;">
            <div class="">
                <p>
                    We are a customer-focused car rental company, dedicated to providing reliable and affordable car rental services to our clients. Our commitment to exceptional customer service, combined with our extensive fleet of vehicles, makes us the preferred choice for car rentals.
                </p>
                
            </div>
        </div>
        
    </div>
    <div class="row mb-3">
        <div class="col-md-6" style="display: flex;align-items: center;justify-content: flex-end;"> 
            <div class="">
                <p>
                    At our Rent a Car company, we understand the importance of having a reliable vehicle for all your transportation needs. That is why we offer a wide range of cars to suit your individual needs, whether you are traveling for business or pleasure. From compact cars to luxury vehicles, we have a car to fit every budget.
                </p>
                
            </div>
        </div>
        <div class="col-md-6">
            <div>
                <img src="./image/car/6.jpeg" alt="" class="img-fluid">
            </div>
        </div>
        
    </div>
    <div class="row mb-3">
        <div class="col-md-6">
            <div>
                <img src="./image/car/2.jpeg" alt="" class="img-fluid">
            </div>
        </div>
        <div class="col-md-6" style="display: flex;align-items: center;justify-content: flex-end;">
            <div class="">
                <p>
                    Our experienced team of professionals is committed to ensuring that you have a hassle-free rental experience. We strive to make the rental process as simple and straightforward as possible, so you can focus on enjoying your trip. Our team is available 24/7 to answer any questions you may have and assist you with any issues that may arise during your rental.
                </p>
               
            </div>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-6" style="display: flex;align-items: center;justify-content: flex-end;">
            <div class="">
                <p>
                    At our Rent a Car company, we believe in transparency and honesty in all our dealings. That is why we offer upfront pricing with no hidden fees. We also have flexible rental terms to fit your schedule, whether you need a car for a day or a month.
                </p>
                
            </div>
        </div>
        <div class="col-md-6">
            <div>
                <img src="./image/car/3.jpg" alt="" class="img-fluid">
            </div>
        </div>
        
    </div>
    <div class="row mb-5">
        <div class="col-md-6">
            <div>
                <img src="./image/car/4.jpeg" alt="" class="img-fluid">
            </div>
        </div>
        <div class="col-md-6" style="display: flex;align-items: center;justify-content: flex-end;">
            <div class="">
            <p>
                We take pride in our commitment to safety and reliability. All our vehicles undergo regular maintenance and safety checks to ensure that they are in top condition. We also offer additional safety features such as GPS navigation and child safety seats upon request.
                </p>
                <p>
                Thank you for considering our Rent a Car company for your transportation needs. We look forward to providing you with a memorable rental experience.
                </p>
            </div>
        </div>
    </div>
</div>
<?php include './frontend/footer.php'?>