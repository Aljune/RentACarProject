<?php
session_start();
require '../db_config.php';
if(!isset($_SESSION['user_id'])){
  if (isset($_GET['email']) && isset($_GET['code'])) {
    // Collect email and verification code from URL
    $email = $_GET['email'];
    $verification_code = $_GET['code'];
    $query = mysqli_query($conn,"UPDATE tbl_user SET verification_code = '$verification_code' WHERE email = '$email'");
    if($query){
      $message = "Email address verified successfully. You can now login to your account. ";
    }else{
      $message =  "Invalid verification link.";
    }
  } 
}

elseif(isset($_SESSION['user_id'])){
  header("Location: /rent-a-car/dashboard.php");
exit;

}
?>
<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./css/custom-style.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
        <title>Registration </title>
    </head>
    <body class="body-login">
        
        <main class="form-signin ">
            
            <div class="d-flex justify-content-center flex-wrap align-content-center" style="height: 100vh;"> 
              <div class="w-100 text-center">
                          <img class="mb-4" src="../image/logo/loge-rent-a-car.png" alt="" width="175" height="175">
                </div>    
              <h4 class="alert alert-primary" role="alert"><?php echo $message?> <a href="/rent-a-car/login.php" target="_blank" rel="noopener noreferrer"> Sign In </a> </h4>
            </div>
            
        </main>
    
    </body>
    </html>