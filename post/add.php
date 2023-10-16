<?php
    // require '../config.php';
   
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
    
    $currentPage = "post";
    $currentTitle = "POST";

        $id = $_SESSION['user_id'];
        $error_message = " ";

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
        
        if(isset($_POST["add_post"])) {
            // Validate the user input
            $title = trim($_POST['title']);
            $slug = trim($_POST['slug']);
            $description = trim($_POST['description']);
            // Validate the input
            if( empty($title) ||  empty($slug) || empty($description) ) {
                $error_message = "All fields are required";
            }
             else {
               
                $query = "INSERT INTO tbl_post (user_id, title, slug, description, status ) VALUES ('$id', '$title', '$slug', '$description', 1)";
    
                if(mysqli_query($conn, $query)) {
                    // Redirect the user to the login page
                    $error_message = "Successfully Saved";
                    
                } else {
                    $error_message = "Failed to register user";
                }
    
            }
        }

   
    ?>
    <?php include '../admin-layout/header-2.php'?>

    <div class="container-fluid ">
        <div class="row" style="height: 100vh; background-color: #F2F2F2">
        <?php include '../admin-layout/nave-menu-2.php'?>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Create New Car</h1>
            
            </div>

            
            <div class="d-flex mb-3">
               <a href="/rent-a-car/post.php"><button class="btn border border-secondary border-2 px-4"> BACK </button></a>  
            </div>
            <div class="">

                <?php echo $error_message?>

                <form action="" method="post" >
                    <h2 class="h3 mb-3  fw-bold"></h2>
                    <div class="text-center">
                        <div class="form-floating mb-3">
                            <input type="text" name="title" class="form-control" id="floatingInput" placeholder="TITLE">
                            <label for="floatingInput">TITLE</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" name="slug" class="form-control" id="floatingPassword" placeholder="SLUG">
                            <label for="floatingPassword">SLUG</label>
                        </div>

                        <div class="form-floating mb-3">
                            <textarea type="text" name="description" class="form-control" id="floatingPassword" placeholder="DESCRIPTION" style="height: 100px"></textarea>
                            <label for="floatingPassword">DESCRIPTION</label>
                        </div>
                    </div>
                    <div class="d-flex ">
                        <div class="w-100 p-2">
                            <button class=" btn btn-lg btn-primary" name="add_post"  type="submit">SUBMIT</button>
                            <button class=" btn btn-lg btn-pitch-pink text-white" type="cancel_post">CANCEL</button>
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