    <?php
    // require '../config.php';
    session_start();
    require '../db_config.php';

    if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit;

    }

    $currentPage = "car";
    $currentTitle = "CAR";
        
        $id = $_SESSION['user_id'];

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
        
    if (isset($_POST["add_car"])) {
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
                // echo "<script> alert(' The file " . htmlspecialchars(basename($arrTempVal)) . " has been uploaded.')";
                // echo "<script> alert(' The file " . htmlspecialchars(basename($arrTempVal)) . " has been uploaded.')";
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
                $created_at = date('Y-m-d H:i:s');
                $image = basename($arrVal);

                $duplicate = mysqli_query($conn, "SELECT * FROM cars WHERE name = '$name' ");
 
                if ($name) {
                    $query = "INSERT INTO cars VALUES ( '','$clientID','$name' ,'$branch','$model', '$year', '$passenger_seat', '$type_transmission', '$type', '$price', '$description','$permanentLocation','$created_at', '$image', 1)";
                    if (mysqli_query($conn, $query)) {
                    // echo "<script> alert('New record created successfully'); </script>";
                    header("Location: /rent-a-car/car.php");
                    exit;
                    } else {
                    echo "Error: " . $query . "<br>" . mysqli_error($conn);
                    }
                }
                } else {
                echo "<script> alert('Sorry, there was an error uploading your file.'); </script>";
                }
            }
        }

    }

   
    ?>
    <?php include '../admin-layout/header-2.php'?>

    <div class="container-fluid ">
        <div class="row" style="height: 100%; background-color: #F2F2F2">
        <?php include '../admin-layout/nave-menu-2.php'?>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Create New Car</h1>
           
            </div>

            <div class="d-flex mb-3">
               <a href="/rent-a-car/car.php"><button class="btn border border-secondary border-2 px-4"> BACK </button></a>  
            </div>
            <div class="">
                <form action="add.php" method="post" enctype="multipart/form-data">
                    <h2 class="h3 mb-3  fw-bold"></h2>
                    <div class="text-center">
                       <?php if($row['role'] === 'admin'):?>
                        <div class="form-floating mb-3">
                            <input type="text" name="client_id" class="form-control" id="floatingInput" placeholder="CLIENT ID">
                            <label for="floatingInput">CLIENT ID</label>
                        </div>
                        <?php elseif($row['role'] === 'client'):?>
                            <input type="text" name="client_id" class="form-control d-none" id="floatingInput" value="<?php echo $row['id']; ?>">
                        <?php endif;?>
                        <div class="form-floating mb-3">
                            <input type="text" name="name" class="form-control" id="floatingInput" placeholder="NAME">
                            <label for="floatingInput">NAME</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" name="branch" class="form-control" id="floatingPassword" placeholder="BRANCH">
                            <label for="floatingPassword">BRANCH</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" name="model" class="form-control" id="floatingPassword" placeholder="MODEL">
                            <label for="floatingPassword">MODEL</label>
                        </div>
                        

                        <div class="form-floating mb-3">    
                            <input type="text" name="year" class="form-control" id="floatingPassword" placeholder="YEAR"/>
                            <label for="floatingPassword">YEAR</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="number" name="passenger_seat" class="form-control" id="floatingPassword" placeholder="PASSENGER SET">
                            <label for="floatingPassword">PASSENGER SEATS</label>
                        </div>
                        
                        <div class="form-floating mb-3">
                            <select class="form-select" name="type_transmission" id="type" aria-label="Select type one">
                                <option selected>SELECT TYPE OF TRANSMISSION </option>
                                <option value="auto">AUTO</option>
                                <option value="manual">MANUAL</option>
                               
                            </select>
                            <label for="floatingSelect">SELECT TYPE OF TRANSMISSION</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="number" name="price" class="form-control" id="floatingPassword" placeholder="PASSENGER SET">
                            <label for="floatingPassword">PRICE</label>
                        </div>


                        <div class="form-floating mb-3">
                            <select class="form-select" name="type" id="type" aria-label="Select type two">
                                <option selected>SELECT TYPE OF CAR</option>
                                <option value="economy">ECONOMY</option>
                                <option value="compact">COMPACT</option>
                                <option value="midsize">MIDSIZE</option>
                                <option value="full-Size">FULL-SIZE</option>
                                <option value="luxury">LUXURY</option>
                               
                                <option value="convertible">CONVERTIBLE</option>
                                <option value="suv">SUV(SPORT UTILITY VEHICLE)</option>
                               
                                <option value="minivan">MINIVAN</option>
                                <option value="passenger Van">PASSENGER VAN</option>
                                <option value="pickup Truck">PICJUP TRUCK</option>
                                
                            </select>
                            <label for="floatingSelect">SELECT TYPE OF CAR</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" name="permanent_location" class="form-control" id="floatingPassword" placeholder="PERMANENT LOCATION"/>
                            <label for="floatingPassword">PERMANENT LOCATION</label>
                        </div>

                        <div class="form-floating mb-3">
                            <textarea name="description" class="form-control" id="floatingDescription" placeholder="DESCRIPTION"  style="height: 200px"></textarea>
                            <label for="floatingPassword">DESCRIPTION</label>
                        </div>


                        <div class="mb-3">
                            <input  class="form-control form-control-lg" name="fileToUpload" id="imageInput"  type="file">
                        </div>
                        <img src="" alt="Preview" class="d-none" id="imagePreview" style="max-width: 300px; max-height: 300px;margin-top:5px">
                        
                    </div>
                    <div class="d-flex ">
                        <div class="w-100 p-2">
                            <button class=" btn btn-lg btn-primary" name="add_car"  type="submit">SUBMIT</button>
                            <button class=" btn btn-lg btn-pitch-pink text-white" type="cancel_car">CANCEL</button>
                        </div>
                    </div>
                </form>
            </div>
        </main>
        </div>
    </div>
<!-- JavaScript code to select and modify element using $() in jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> 
<!-- Include jQuery library -->
<!-- JavaScript code to display image preview -->
<script>
  document.getElementById('imageInput').addEventListener('change', function(e) {
  var file = e.target.files[0];
  var imagePreview = document.getElementById('imagePreview');
  var reader = new FileReader();

  reader.onload = function(event) {
    imagePreview.src = event.target.result;
  }

  reader.readAsDataURL(file);

    if(file){
        $('#imagePreview').removeClass('d-none');
        $('#imagePreview').addClass('d-block');
    } else {
        $('#imagePreview').removeClass('d-block');
        $('#imagePreview').addClass('d-none');
    }
});
</script>
        
<?php include '../admin-layout/footer.php'?>
