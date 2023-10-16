
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Rental Car</title>
  <!-- Custom fonts for this template-->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.10.2/css/all.css">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body id="page-top" style="overflow-x:visible;background-color:whitesmoke;">
  <!-- Page Wrapper -->
  <div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav sidebar sidebar-dark accordion bg-primary" id="accordionSidebar">

      <!-- Divider -->
      <hr class="sidebar-divider my-0">
      <!-- Nav Item - Dashboard -->
      <?php include'user_link.php';?>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->


      <!-- Nav  Menu -->
      <li class="nav-item">
        <?php include'user_navbar.php';?>
      </li>
    </ul>
    <!-- End of Sidebar -->


    <?php  
    error_reporting(0);  
    if (isset($_POST["add_car"])) {
        if ($_FILES["fileToUpload"] && $_FILES["fileToUpload"]["error"] == 0) {

            $target_dir = "img/";
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
                
                      $reserved = $_POST["reserved"];
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
                    $id =$_COOKIE['logid'];
                $image = basename($arrVal);
include 'config.php';
                $duplicate = mysqli_query($conn, "SELECT * FROM cars WHERE name = '$name' ");
 
                if ($name) {
                    $query = "INSERT INTO cars (client_id,name,branch,model,year,passenger_seat,type_transmission,type,price,description,permanent_location,created_at,image,status,reservation_fee) VALUES ('$id','$name' ,'$branch','$model', '$year', '$passenger_seat', '$type_transmission', '$type', '$price', '$description','$permanentLocation','$created_at', '$image','AVAILABLE','$reserved')";
                    if (mysqli_query($conn, $query)) {
                    // echo "<script> alert('New record created successfully'); </script>";
                    header("Location:user_post_car.php");
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


    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column"style="overflow-x:visible;">

      <!-- Main Content -->
      <div id="content">

        <!-- Begin Page Content -->


        <div class="container-fluid" >
          <div class="card text-white  mb-3" style="width:100%;">
            <div class="card-header bg-primary">
              <div style="text-align:center;font-size:30px;">
               ADD CAR
             </div>
           </div>
           <div class="form-group" style="
           margin-bottom: 0px;
           margin-top: 20px;
           margin-left: 20px;
           ">

         </div>


         <div class="card-body">
       
         <div class="d-flex mb-3">
           <a href="user_post_car.php"> <button class="btn border border-secondary border-2 px-4">BACK</button></a>
      </div>
    


           <form action="" method="post" enctype="multipart/form-data">
                    <h2 class="h3 mb-3  fw-bold"></h2>
                    <div class="text-center">
                   
               
                        <div class="form-floati">
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
                        
                        <div class="form-floating mb-3 form-group">
                            <select class="form-select form-control" name="type_transmission" id="type" aria-label="Select type one">
                                <option selected>SELECT TYPE OF TRANSMISSION </option>
                                <option value="auto">AUTO</option>
                                <option value="manual">MANUAL</option>
                               
                            </select>
                            <label for="floatingSelect">SELECT TYPE OF TRANSMISSION</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="number" name="price" class="form-control" id="floatingPassword" placeholder="Price">
                            <label for="floatingPassword">PRICE</label>
                        </div>

                            <div class="form-floating mb-3">
                            <input type="number" name="reserved" class="form-control" id="floatingPassword" placeholder="Reservation Fee">
                            <label for="floatingPassword">RESERVATION FEE</label>
                        </div>



                        <div class="form-floating mb-3 form-group">
                            <select class="form-select form-control" name="type" id="type" aria-label="Select type two">
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
   </div>



 </div>
</div>
</div>
</div>





  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="js/sb-admin-2.min.js"></script>


</body>
</html>


<!-- JavaScript code to select and modify element using $() in jQuery -->

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
   

