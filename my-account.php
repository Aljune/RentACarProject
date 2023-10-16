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

if(!isset($_SESSION['user_id'])){
header("Location: login.php");
exit;

}

$currentPage = "my-account";
$currentTitle = "MY ACCOUNT";

$id = $_SESSION["user_id"];
$result = mysqli_query($conn, "SELECT * FROM tbl_user WHERE id = $id");
$row = mysqli_fetch_assoc($result);

if (isset($_POST["update_account"])) {

  if ($_FILES["fileToUpload"] && $_FILES["fileToUpload"]["error"] == 0) {

    $target_dir = "./img/uploads/user/";
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
    }
    else {
      if (move_uploaded_file($arrTempVal, $target_file)){
        echo "<script> alert(' The file " . htmlspecialchars(basename($arrTempVal)) . " has been uploaded.')";
        $first_name = $_POST["first_name"];
        $last_name = $_POST["last_name"];
        $username = $_POST["username"];
        $email = $_POST["email"];
        $address = $_POST["address"];
        $phone_number = $_POST["phone_number"];
        $role = $_POST["role"];
        $image = basename($arrVal);
        $pass = $row['password'];

        $query = "UPDATE tbl_user SET first_name = '$first_name', last_name = '$last_name', email = '$email', password = '$pass', address = '$address', phone_number = '$phone_number' , role = '$role', profile_image = '$image' WHERE id = '$id'";

        if (mysqli_query($conn, $query)) {
          echo "<script> alert('New record created successfully'); </script>";
          header("Location: my-account.php");
          exit;
          } else {
          echo "Error: " . $query . "<br>" . mysqli_error($conn);
          }

      }
    }

  } else {
        $first_name = $_POST["first_name"];
        $last_name = $_POST["last_name"];
        $username = $_POST["username"];
        $email = $_POST["email"];
        $address = $_POST["address"];
        $phone_number = $_POST["phone_number"];
        $role = $_POST["role"];
        $image = $row['profile_image'];
        $pass = $row['password'];

        $query = "UPDATE tbl_user SET first_name = '$first_name', last_name = '$last_name', email = '$email', password = '$pass', address = '$address', phone_number = '$phone_number' , role = '$role', profile_image = '$image' WHERE id = '$id'";

        if (mysqli_query($conn, $query)) {
        echo "<script> alert('New record created successfully'); </script>";
        header("Location: my-account.php");
        exit;
        } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
        }
  }

}

?>

<?php include './admin-layout/header.php'?>

  <div class="container-fluid ">
    <div class="row" style="height: 100vh; background-color: #F2F2F2">

    <?php include './admin-layout/nav-menu.php'?>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">INFORMATION</h1>
       
      </div>     
      <div class="row ">
        <div class="col-md-8">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-floating mb-3">
                <input type="text" name="first_name" class="form-control" id="floatingInput" placeholder="NAME" value="<?php echo $row['first_name']?>">
                <label for="floatingInput">FIRST NAME</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" name="last_name" class="form-control" id="floatingInput" placeholder="NAME" value="<?php echo $row['last_name']?>">
                <label for="floatingInput">LAST NAME</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" name="username" class="form-control" id="floatingInput" placeholder="NAME" value="<?php echo $row['username']?>">
                <label for="floatingInput">USERNAME</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" name="email" class="form-control" id="floatingInput" placeholder="NAME" value="<?php echo $row['email']?>">
                <label for="floatingInput">EMAIL</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" name="address" class="form-control" id="floatingInput" placeholder="NAME" value="<?php echo $row['address']?>">
                <label for="floatingInput">ADDRESS</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" name="phone_number" class="form-control" id="floatingInput" placeholder="NAME" value="<?php echo $row['phone_number']?>">
                <label for="floatingInput">PHONE NUMBER</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" name="role" class="form-control" id="floatingInput" placeholder="NAME" value="<?php echo $row['role']?>" >
                <label for="floatingInput">ROLE</label>
            </div>

            <div class="mb-3">
              <input  class="form-control form-control-lg" name="fileToUpload" id="imageInput"  type="file">
            </div>
            <!-- <img src="" alt="Preview" class="d-none" id="imagePreview" style="max-width: 300px; max-height: 300px;margin-top:5px"> -->

            <?php if($row['profile_image'] === null) : ?>
              <img src="./image/default/user/profile.png" alt="Preview" class="d-none" id="imagePreview" style="max-width: 300px; max-height: 300px;margin-top:5px">
          <?php else:?>
              <img src="./img/uploads/user/<?php echo $row['profile_image'] ?>" alt="" style="max-width: 300px; max-height: 300px;margin-top:5px">
          <?php endif?>
            <div class="d-flex ">
                <div class="w-100 p-2">
                    <button class=" btn btn-lg btn-primary" name="update_account"  type="submit">UPDATE</button>
                    <button class=" btn btn-lg btn-pitch-pink text-white" type="cancel_user">CANCEL</button>
                </div>
            </div>
            </form>
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

<?php include './admin-layout/footer.php'?>

</body>
</html>