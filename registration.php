<?php 
 require 'config.php';
error_reporting(0);
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './PHPMailer/src/Exception.php';
require './PHPMailer/src/PHPMailer.php';
require './PHPMailer/src/SMTP.php';

$error_message = "";

if($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Validate the user input
    $first_name = trim($_POST['first_name']);
    $last_name = trim($_POST['last_name']);
    $username = trim($_POST['user_name']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $confirm_password = trim($_POST['confirm_password']);

     // Generate verification code
     $verification_code = md5(uniqid(rand(), true));

    $subject = "Confirm your email address";
    $message = "Please click the following link to confirm your email address: http://localhost/rent-a-car/register/verify.php?email=$email&code=$verification_code";

    
    // Validate the input
    if( empty($first_name) ||  empty($last_name) ||  empty($username) || empty($email) || empty($password) || empty($confirm_password)) {
        $error_message = "All fields are required";
    }
    // Check if the passwords match
    elseif ($password != $confirm_password) {
        $error_message = "Passwords do not match";
    } else {

        require_once('db_config.php');

        $sql = "SELECT COUNT(*) as count FROM tbl_user WHERE email = '$email'";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            $row = mysqli_fetch_assoc($result);
            if ($row['count'] > 0) {
              // Email already exists
              $error_message = "This email is already registered.";
            //   echo "This email is already registered.";
            } else {
                // Email does not exist
                //   echo "This email is available.";
                // Attempt to register the user
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    
        
                $query = "INSERT INTO tbl_user (first_name, last_name, username, email, password, address, phone_number , role, profile_image, verification_code,user_status) VALUES ('$first_name', '$last_name', '$username', '$email', '$hashed_password', null , null , 'customer', null, null,'ACTIVE')";
                if(mysqli_query($conn, $query)) {
                    // Redirect the user to the login page
                    // header("Location: login.php");
                    // exit;
                    

                    $phpmailer = new PHPMailer(true); 
                    try{
                        $phpmailer->isSMTP();
                        $phpmailer->Host = 'smtp.gmail.com';
                        $phpmailer->SMTPAuth = true;
                        $phpmailer->Port = 465;
                        $phpmailer->Username = 'jeanloceldegamo31@gmail.com';
                        $phpmailer->Password = 'preytuwvtfuzystz';
                        $phpmailer->SMTPSecure = 'ssl';
                        $phpmailer->isHTML(true); 
                        $phpmailer->setFrom($email,$first_name);   
                        $phpmailer->addAddress('jeanloceldegamo31@gmail.com'); 
                        $phpmailer->Subject = ("$email ($subject)");
                        $phpmailer->Body = $message;
                        $phpmailer->send();
                        $error_message = "Message has been sent";
                 
                        
                    } catch (Exception $e) {
                        ////$error_message = "Message could not be sent. Mailer Error: {$phpmailer->ErrorInfo}";
                       
                    }
                    
        
                } else {
                   /// $error_message = "Failed to register user";
                }
            
            }
          } else {
            // Error executing query
            echo "Error: " . mysqli_error($conn);
          }
      

    }
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
            <form method="post">
                <h2 class="h3 mb-3  fw-bold">Sign up for a free account</h2>
                <div class="text-center">
                    <img class="mb-4" src="./image/logo/loge-rent-a-car.png" alt="" width="175" height="175">
                    <div class="d-flex w-100 text-center ">
                        <p class="text-center">
                            <?php echo $error_message ?>
                        </p>
                    </div>
                    <div class="d-flex w-100"> 
                        
                        <div class="form-floating w-50 me-2">
                            <input type="text" name="first_name" class="form-control" id="floatingInput" placeholder="First Name">
                            <label for="floatingInput">FIRST NAME</label>
                        </div>
                        <div class="form-floating w-50 ms-2">
                            <input type="text" name="last_name" class="form-control" id="floatingPassword" placeholder="LAST NAME">
                            <label for="floatingPassword">LAST NAME</label>
                        </div>
                    </div>
                        <div class="form-floating mb-3">
                            <input type="text" name="user_name" class="form-control" id="floatingPassword" placeholder="USER NAME">
                            <label for="floatingPassword">USER NAME</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="email" name="email" class="form-control" id="floatingPassword" placeholder="EMAIL">
                            <label for="floatingPassword">EMAIL</label>
                        </div>
                        <div class="form-floating w-100 mb-3">
                            <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="PASSWORD">
                            <label for="floatingPassword">PASSWORD</label>
                        </div>
                        <div class="form-floating w-100 mb-3">
                            <input type="password" name="confirm_password" class="form-control" id="floatingPassword" placeholder="PASSWORD">
                            <label for="floatingPassword">CONFIRM PASSWORD</label>
                        </div>
                    <!-- <div class="checkbox mb-3">
                        <label>
                            <input type="checkbox" value="remember-me"> Remember me
                        </label>
                    </div> -->
                    
                    <div class="d-flex">
                        <div class="w-50 p-2">
                            <button class="w-100 btn btn-lg btn-primary" name="submit"  type="submit">Sign up</button>
                        </div>
                        <div class="w-50 p-2">
                            <a href="/rent-a-car/login.php">
                            <button class="w-100 btn btn-lg btn-pitch-pink text-white" type="button">Sign in</button>
                            </a>
                            
                        </div>
                    </div>
                
                </div>
            </form>
        </main>
    
    </body>
    </html>