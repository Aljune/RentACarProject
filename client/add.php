<?php
    session_start();
    require '../db_config.php';

    if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit;
    }

    $currentPage = "client";
    $currentTitle = "CLIENT";

    $id = $_SESSION["user_id"];

    $result = mysqli_query($conn, "SELECT * FROM tbl_user WHERE id = $id");
    $row = mysqli_fetch_assoc($result);

    if(isset($_POST["add_client"])) {
        $first_name = trim($_POST['first_name']);
        $last_name = trim($_POST['last_name']);
        $username = trim($_POST['user_name']);
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);
       

        // Validate the input
        if( empty($first_name) ||  empty($last_name) ||  empty($username) || empty($email) || empty($password)) {
            $error_message = "All fields are required";
        }
         else {
            // Attempt to register the user
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            $query = "INSERT INTO tbl_user (first_name, last_name, username, email, password, role, profile_image) VALUES ('$first_name', '$last_name', '$username', '$email', '$hashed_password', 'client', null)";

            if(mysqli_query($conn, $query)) {
                // Redirect the user to the login page
                header("Location: client.php");
                exit;
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
                <a href="/rent-a-car/client.php"><button class="btn border border-secondary border-2 px-4"> BACK </button></a> 
                 
            </div>
            <div class="d-flex mb-3 mt-3">
                <h2 class="h3 mb-3  fw-bold">Sign up for client</h2>
            </div>
            <div class="row ">
                <div class="col-md-8">
                    <div class="">
                        <form action="" method="post" >
                           
                            <div class="d-flex w-100 mb-3"> 
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
                                <input type="text" name="user_name" class="form-control" id="floatingPassword" placeholder="USERNAME">
                                <label for="floatingPassword">USERNAME</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="email" name="email" class="form-control" id="floatingPassword" placeholder="EMAIL">
                                <label for="floatingPassword">EMAIL</label>
                            </div>
                            <div class="form-floating w-100 mb-3">
                                <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="PASSWORD">
                                <label for="floatingPassword">PASSWORD</label>
                            </div>
                            <div class="d-flex">
                                <div class="w-50 p-2">
                                    <button class="w-100 btn btn-lg btn-primary" name="add_client"  type="submit">SUBMIT</button>
                                </div>
                                <div class="w-50 p-2">
                                    <button class="w-100 btn btn-lg btn-pitch-pink text-white" type="submit">CANCEL</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-4 ">
                    <div class="card ">
                        <div class="card-body">
                        SIDEBAR HERE CONTENT
                        </div>
                        
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>
<?php include '../admin-layout/footer.php'?>