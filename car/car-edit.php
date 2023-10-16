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
require '../db_config.php';

if(!isset($_SESSION['user_id'])){
header("Location: login.php");
exit;
}

$currentPage = "car";
$currentTitle = "CAR";

$id = $_SESSION["user_id"];

$result = mysqli_query($conn, "SELECT * FROM tbl_user WHERE id = $id");
$row = mysqli_fetch_assoc($result);
$selecruser = mysqli_query($conn, "SELECT count('first_name') FROM tbl_user");
$totaluser = mysqli_fetch_array($selecruser);
// $selectpost = mysqli_query($conn, "SELECT count('title') FROM tbl_post");
// $totalpost = mysqli_fetch_array($selectpost);

// if(isset($_POST["add_car"])){
//     $name = $_POST["name"];
//     $branch = $_POST["branch"];
//     $model = $_POST["model"];
//     $year = $_POST["year"];
//     $type = $_POST["type"];
//     $description = $_POST["description"];

//     $duplicate = mysqli_query($conn, "SELECT * FROM tbl_post WHERE title = '$title'  OR slug = '$slug'");

//     if(mysqli_num_rows($duplicate) > 0){
//         echo "<script> alert('Title and slug has already taken'); </script>";
//     }
//     else {
//         if($title){
//             $query = "INSERT INTO tbl_post VALUES ( 2,'$title','$slug','$description')";
//             if(mysqli_query($conn, $query)) {
//                 echo "New record created successfully";
//             } else {
//                 echo "Error: " . $query . "<br>" . mysqli_error($conn);
//             }
//         }
        
//     }

// }
    
// if (isset($_POST["add_car"])) {
//     if ($_FILES["fileToUpload"] && $_FILES["fileToUpload"]["error"] == 0) {

//         $target_dir = "../img/uploads/";
//         $arr = $_FILES['fileToUpload']['name'];
//         $arrVal = str_replace(' ', '_', $arr);

//         $arrTemp = $_FILES["fileToUpload"]["tmp_name"];
//         $arrTempVal = str_replace(' ', '_', $arrTemp);

//         $target_file = $target_dir . basename($arrVal);
//         $uploadOk = 1;
//         $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

//         // Check if $uploadOk is set to 0 by an error
//         if ($uploadOk == 0) {
//             echo "<script> alert('Sorry, your file was not uploaded.'); </script>";
//             // if everything is ok, try to upload file
//         } else {

//             if (move_uploaded_file($arrTempVal, $target_file)) {
//             echo "<script> alert(' The file " . htmlspecialchars(basename($arrTempVal)) . " has been uploaded.')";
//             // echo "<script> alert(' The file " . htmlspecialchars(basename($arrTempVal)) . " has been uploaded.')";
//             $name = $_POST["name"];
//             $branch = $_POST["branch"];
//             $model = $_POST["model"];
//             $year = $_POST["year"];
//             $type = $_POST["type"];
//             $description = $_POST["description"];
//             $created_at = date('Y-m-d H:i:s');
//             $image = basename($arrVal);

//             $duplicate = mysqli_query($conn, "SELECT * FROM cars WHERE name = '$name' ");

//             if ($name) {
//                 $query = "INSERT INTO cars VALUES ( '','$name','$branch','$model', '$year' , '$type', '$description', '$created_at', '$image', 1)";
//                 if (mysqli_query($conn, $query)) {
//                 echo "<script> alert('New record created successfully'); </script>";
//                 } else {
//                 echo "Error: " . $query . "<br>" . mysqli_error($conn);
//                 }
//             }
//             } else {
//             echo "<script> alert('Sorry, there was an error uploading your file.'); </script>";
//             }
//         }
//     }

// }
if (isset($_GET['edit'])) {
    $carID = $_GET['edit'];
    $update = true;
    $carData = mysqli_query($conn, "SELECT * FROM cars WHERE id=$carID");
    $carItem = mysqli_fetch_assoc($carData);
}
if (isset($_POST["update_car"])) {
    if ($_FILES["fileToUpload"] && $_FILES["fileToUpload"]["error"] == 0) {

        $target_dir = "../img/uploads/";
        $arr = $_FILES['fileToUpload']['name'];
        $arrVal = str_replace(' ', '_', $arr);

        $arrTemp = $_FILES["fileToUpload"]["tmp_name"];
        $arrTempVal = str_replace(' ', '_', $arrTemp);

        $target_file = $target_dir . basename($arrVal);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "<script> alert('Sorry, your file was not uploaded.'); </script>";
            // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($arrTempVal, $target_file)) {
                echo "<script> alert(' The file " . htmlspecialchars(basename($arrTempVal)) . " has been uploaded.')";

                $clientID = $_POST["client_id"];
                $name = $_POST["name"];
                $branch = $_POST["branch"];
                $model = $_POST["model"];
                $year = $_POST["year"];
                $passenger_seat = $_POST["passenger_seat"];
                $type_transmission = $_POST["type_transmission"];
                $price = $_POST["price"];
                $type = $_POST["type"];
                $description = $_POST["description"];
                $permanentLocation = $_POST["permanent_location"];
                $user_id = $carItem['user_id'];
                $created_at = $carItem['created_at'];
                $image = basename($arrVal);
                $status =$_POST['status'];

                $query = "UPDATE cars SET user_id = $user_id , client_id = '$clientID', name = '$name', branch = '$branch', model = '$model', year = '$year', passenger_seat = '$passenger_seat', type_transmission = '$type_transmission', price = '$price', type = '$type', description = '$description', permanent_location = '$permanentLocation', created_at = '$created_at ', image = '$image', status = '$status'  WHERE id = '$carID'";

                if(mysqli_query($conn, $query)) {
                    // Redirect the user to the login page
                    $error_message = "Successfully Saved";

                    header("Location: /rent-a-car/car.php");
                    exit;
                    
                } else {
                    $error_message = "Failed to register user";
                }
            }
            else {
                echo "<script> alert('Sorry, there was an error uploading your file.'); </script>";
            }
        }

    }else {
        $clientID = $_POST["client_id"];
        $name = $_POST["name"];
        $branch = $_POST["branch"];
        $model = $_POST["model"];
        $year = $_POST["year"];
        $passenger_seat = $_POST["passenger_seat"];
        $type_transmission = $_POST["type_transmission"];
        $price = $_POST["price"];
        $type = $_POST["type"];
        $description = $_POST["description"];
        $permanentLocation = $_POST["permanent_location"];
        $user_id = $carItem['user_id'];
        $created_at = $carItem['created_at'];
        $image =$carItem['image'];
        $status =$_POST['status'];

        $query = "UPDATE cars SET  client_id = '$clientID', name = '$name', branch = '$branch', model = '$model', year = '$year', passenger_seat = '$passenger_seat', type_transmission = '$type_transmission', price = '$price', type = '$type', description = '$description', permanent_location = '$permanentLocation', created_at = '$created_at ', image = '$image', status = '$status'  WHERE id = '$carID'";

        if(mysqli_query($conn, $query)) {
            // Redirect the user to the login page
            $error_message = "Successfully Saved";

            header("Location: /rent-a-car/car.php");
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
            <a href="/rent-a-car/car.php"><button class="btn border border-secondary border-2 px-4"> BACK </button></a>  
        </div>
        <div class="">
            <form action="" method="post" enctype="multipart/form-data">
                <h2 class="h3 mb-3  fw-bold"></h2>
                <div class="text-center">
                    
                    <?php if($row['role'] === 'admin'):?>
                        <div class="form-floating mb-3">
                            <input type="text" name="client_id" value="<?php echo $carItem['client_id']?>" class="form-control" id="floatingInput" placeholder="CLIENT ID">
                            <label for="floatingInput">CLIENT ID</label>
                        </div>
                    <?php elseif($row['role'] === 'client'):?>
                        <input type="text" name="client_id" class="form-control d-none" id="floatingInput" value="<?php echo $row['id']; ?>">
                    <?php endif;?>
                    <div class="form-floating mb-3">
                        <input type="text" name="name" value="<?php echo $carItem['name']?>" class="form-control" id="floatingInput" placeholder="NAME">
                        <label for="floatingInput">NAME</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" name="branch" value="<?php echo $carItem['branch']?>" class="form-control" id="floatingPassword" placeholder="BRANCH">
                        <label for="floatingPassword">BRANCH</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" name="model" value="<?php echo $carItem['model']?>" class="form-control" id="floatingPassword" placeholder="MODEL">
                        <label for="floatingPassword">MODEL</label>
                    </div>
                    

                    <div class="form-floating mb-3">    
                        <input type="text" name="year" value="<?php echo $carItem['year']?>" class="form-control" id="floatingPassword" placeholder="YEAR"/>
                        <label for="floatingPassword">YEAR</label>
                    </div>

                        <div class="form-floating mb-3">
                            <input type="number" name="passenger_seat" value="<?php echo $carItem['passenger_seat']?>" class="form-control" id="floatingPassword" placeholder="PASSENGER SET">
                            <label for="floatingPassword">PASSENGER SEATS</label>
                        </div>
                        
                        <div class="form-floating mb-3">
                            <select class="form-select" name="type_transmission" id="type" aria-label="Select type one">
                                <option selected>SELECT TYPE OF TRANSMISSION  </option>
                                <option value="auto" <?php if ($carItem['type_transmission'] == "auto") echo "selected"; ?>>AUTO</option>
                                <option value="manual" <?php if ($carItem['type_transmission'] == "manual") echo "selected"; ?>>MANUAL</option>
                               
                            </select>
                            <label for="floatingSelect">SELECT TYPE OF TRANSMISSION </label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="number" name="price" value="<?php echo $carItem['price']?>" class="form-control" id="floatingPassword" placeholder="PASSENGER SET">
                            <label for="floatingPassword">PRICE</label>
                        </div>

                    <div class="form-floating mb-3">
                        <select class="form-select" name="type" id="type" aria-label="Select type">
                            <option selected>SELECT TYPE OF CAR</option>
                            <option value="economy" <?php if ($carItem['type'] == "economy") echo "selected"; ?>>ECONOMY</option>
                            <option value="compact" <?php if ($carItem['type'] == "compact") echo "selected"; ?>>COMPACT</option>
                            <option value="midsize" <?php if ($carItem['type'] == "midsize") echo "selected"; ?>>MIDSIZE</option>
                            <option value="full-size" <?php if ($carItem['type'] == "full-size") echo "selected"; ?>>FULL-SIZE</option>
                            <option value="luxury" <?php if ($carItem['type'] == "luxury") echo "selected"; ?>>LUXURY</option>
                            
                            <option value="convertible" <?php if ($carItem['type'] == "convertible") echo "selected"; ?>>CONVERTIBLE</option>
                            <option value="suv" <?php if ($carItem['type'] == "suv") echo "selected"; ?>>SUV(SPORT UTILITY VEHICLE)</option>
                            <option value="crossover" <?php if ($carItem['type'] == "crossover") echo "selected"; ?>>CROSSOVER</option>
                            <option value="minivan" <?php if ($carItem['type'] == "minivan") echo "selected"; ?>>MINIVAN</option>
                            <option value="passenger-van" <?php if ($carItem['type'] == "option1") echo "selected"; ?>>PASSENGER VAN</option>
                            <option value="pickup-truck" <?php if ($carItem['type'] == "passenger-van") echo "selected"; ?>>PICKUP TRUCK</option>
                            

                            
                        </select>
                        <label for="floatingSelect">SELECT TYPE OF CAR</label>
                    </div>
                    <div class="form-floating mb-3">
                            <input type="text" name="permanent_location" class="form-control" id="floatingPassword" 
                            value="<?php echo $carItem['permanent_location']?>"placeholder="PERMANENT LOCATION"/>
                            <label for="floatingPassword">PERMANENT LOCATION</label>
                    </div>

                    <div class="form-floating mb-3">
                        <textarea name="description" class="form-control" id="floatingDescription" placeholder="DESCRIPTION"  style="height: 200px"> <?php echo $carItem['description']?></textarea>
                        <label for="floatingPassword">DESCRIPTION</label>
                    </div>

                    <div class="form-floating mb-3">
                        <select class="form-select" name="status" id="status" aria-label="Select status">
                            <option selected>SELECT STATUS OF CAR  </option>
                            <option value="0" <?php if ($carItem['status'] == "0") echo "selected"; ?>>NOT AVAILABLE</option>
                            <option value="1" <?php if ($carItem['status'] == "1") echo "selected"; ?>>AVAILABLE</option>
                            
                        </select>
                        <label for="floatingSelect">SELECT STATUS OF CAR </label>
                    </div>

                    <div class="mb-3">
                        <input  class="form-control form-control-lg" name="fileToUpload" value="<?php echo $carItem['image'] ?>" id="fileToUpload"  type="file">
                    </div>
                    
                    <?php if($carItem['image']) : ?>
                        <img src="../img/uploads/<?php echo $carItem['image'] ?>" alt="<?php echo $carItem['name'] ?>" style="max-width: 300px; max-height: 300px;margin-top:5px">
                    <?php else:?>
                        <img src="" alt="Preview" class="d-none" id="imagePreview" style="max-width: 300px; max-height: 300px;margin-top:5px">
                    <?php endif?>
                    
                </div>
                <div class="d-flex ">
                    <div class="w-100 p-2">
                        <button class=" btn btn-lg btn-primary" name="update_car"  type="submit">SUBMIT</button>
                        <button class=" btn btn-lg btn-pitch-pink text-white" type="cancel_car">CANCEL</button>
                    </div>
                </div>
            </form>
        </div>
    </main>
    </div>
</div>
<?php include '../admin-layout/footer.php'?>

