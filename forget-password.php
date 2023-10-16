<?php 
// require 'config.php';
session_start();
require 'db_config.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './PHPMailer/src/Exception.php';
require './PHPMailer/src/PHPMailer.php';
require './PHPMailer/src/SMTP.php';

$error_message = "";


if(!isset($_SESSION['user_id'])){

    if($_SERVER['REQUEST_METHOD'] == 'POST') {

        // Validate the user input
        $username = trim($_POST['username']);
        $email = trim($_POST['email']);
    
        $subject = "Change New Password";
        $message = "Please click the following link to create new password address: http://localhost/rent-a-car/new-password.php?email=$email&username=$username";
    
        
        // Validate the input
        if(empty($username) || empty($email)) {
            $error_message = "All fields are required";
        }
        else {
    
            $sql = "SELECT COUNT(*) as count FROM tbl_user WHERE email = '$email'";
            $result = mysqli_query($conn, $sql);
    
            if ($result) {
                $row = mysqli_fetch_assoc($result);
                if ($row['count'] > 0) {
                  // Email already exists
                //   $error_message = "This email is already registered.";
                //   echo "This email is already registered.";
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
                            $phpmailer->setFrom($email,$username);   
                            $phpmailer->addAddress('jeanloceldegamo31@gmail.com'); 
                            $phpmailer->Subject = ("$username ($subject)");
                            $phpmailer->Body = $message;
                            $phpmailer->send();
                            $error_message = "Message has been sent";
                     
                            
                        } catch (Exception $e) {
                            $error_message = "Message could not be sent. Mailer Error: {$phpmailer->ErrorInfo}";
                           
                        }
                }
              } else {
                // Error executing query
                echo "Error: " . mysqli_error($conn);
              }
          
    
        }
    }
    
}elseif(isset($_SESSION['user_id'])){
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
            <div class="d-flex justify-content-center flex-wrap align-content-center" > 
                <form action="" method="post">
                    <div class="w-100 text-center">
                        <img class="mb-4" src="./image/logo/loge-rent-a-car.png" alt="" width="175" height="175">
                    </div>
                    
                    <div class="w-100">
                        <h5>FORGET PASSWORD!</h5>
                        <p>PLEASE FILL OUT THE FORM FOR RECOVERY PASWORD</p>
                    </div>
                    <div class="w-100">
                        <p><?php echo $error_message ?></>
                    </div>
                    <div class="form-floating mb-3  w-100">
                        <input type="text" name="username" value="" class="form-control" id="floatingInput" placeholder="USERNAME">
                        <label for="floatingInput">USERNAME</label>
                    </div>
                    <div class="form-floating mb-3 w-100">
                        <input type="text" name="email" value="" class="form-control" id="floatingInput" placeholder="email">
                        <label for="floatingInput">EMAIL</label>
                    </div>
                    <button class="btn bg-blue" type="submit">
                        Submit
                    </button>

                </form>
            </div>
        </main>
    </body>
    </html>