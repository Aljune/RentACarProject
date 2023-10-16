    <?php 
    // require 'config.php';
    // if(!empty($_SESSION["id"])){
    //     header("Location:dasboard.php");
    // }
    ini_set('session.use_trans_sid', false);
    ini_set('session.use_cookies', true);
    ini_set('session.use_only_cookies', true);
    $https = false;
    if(isset($_SERVER['HTTPS']) and $_SERVER['HTTPS'] != 'off') $https = true;
    $dirname = rtrim(dirname($_SERVER['PHP_SELF']), '/').'/';
    session_name('some_name');
    session_set_cookie_params(0, $dirname, $_SERVER['HTTP_HOST'], $https, true);

    session_start();
    require_once('db_config.php');

    $error_message = "";

    if(isset($_SESSION['user_id'])) {
        header("Location:user_dashboard.php");
        exit;
    }

    if(isset($_POST["submit"])) {

        $email = trim($_POST["email"]);
        
        $password = trim($_POST["password"]);

        // echo $email, $password;


        // Validate the input
        if(empty($email) || empty($password)) {
            $error_message = "All fields are required";
        } else {
            // Check if the username exists
             // assuming you have a separate file for database configuration

            $query = "SELECT * FROM tbl_user WHERE email = '$email' and  user_status='active' ";

            $result = mysqli_query($conn, $query);

            if(mysqli_num_rows($result) == 0) {
                $error_message = "Incorrect username or password or no verification thru email";
            } else {
                // Verify the password
                $user = mysqli_fetch_assoc($result);
                
                $hashed_password = $user['password'];
                  
                // echo $hashed_password;
                if(password_verify($password, $hashed_password)) {
                 if($user['role']=='customer'){

                    echo  $id=$user['id'];
                    $_SESSION['user_id']=$id;
                    setcookie("logid",$id,time()+6000);
                    header("location:user_dashboard.php");
                }elseif ($user['role']=='admin') {
                    echo  $id=$user['id'];
                        $_SESSION['user_id']=$id;
                    setcookie("logid",$id,time()+6000);
                    header("location:admin_dashboard.php");
                }else{


                }
            } 
            else {
                $error_message = "Incorrect username or password";
            }
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
    <title>Login</title>
</head>
<body class="body-login">

    <main class="form-signin">
        <form method="post">
            <h2 class="h3 mb-3  fw-bold">Please sign in</h2>
            <div class="text-center">
                <img class="mb-4" src="./image/logo/loge-rent-a-car.png" alt="" width="175" height="175">
                <div class="w-100">
                    <?php if($error_message):?>
                        <p class="alert alert-info" role="alert">
                            <?php echo $error_message ?>
                        </p>
                    <?php endif?>

                </div>
                <div class="form-floating">
                    <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                    <label for="floatingInput">Email address</label>
                </div>
                <div class="form-floating">
                    <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
                    <label for="floatingPassword">Password</label>
                </div>

                    <!-- <div class="checkbox mb-3">
                        <label>
                            <input type="checkbox" value="remember-me"> Remember me
                        </label>
                    </div> -->
                    
                    <div class="d-flex">
                        <div class="col-md-4 p-2">
                            <button class="w-100 btn btn-lg btn-primary" name="submit"  type="submit">Sign in</button>
                        </div>
                        <div class="col-md-4 p-2">
                            <a href="/rent-a-car/registration.php">
                                <button class="w-100 btn btn-lg btn-pitch-pink text-white" type="button">Sign Up</button>
                            </a>
                        </div>
                        <div class="col-md-4 p-2">
                            <a href="/rent-a-car/forget-password.php">
                                <button class="w-100 btn btn-lg bg-green text-white" type="button">Forget Passsword</button>
                            </a>
                        </div>
                        
                    </div>
                    <p class="mt-5 mb-3 text-muted">&copy; 2023–2024</p>
                </div>
            </form>
        </main>

    </body>
    </html>