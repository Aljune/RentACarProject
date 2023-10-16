<?php
session_start();
require '../db_config.php';

if(!isset($_SESSION['user_id'])){
header("Location: login.php");
exit;

}

$currentPage = "post";
$currentTitle = "POST";
$user_id = $_SESSION["user_id"];

$result = mysqli_query($conn, "SELECT * FROM tbl_user WHERE id = $user_id");
$row = mysqli_fetch_assoc($result);
// $selecruser = mysqli_query($conn, "SELECT count('first_name') FROM tbl_user");
// $totaluser = mysqli_fetch_array($selecruser);

if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $update = true;
    $postData = mysqli_query($conn, "SELECT * FROM tbl_post WHERE id=$id");
    $postItem = mysqli_fetch_assoc($postData);
    // var_dump($reservaionItem);
    // $title = $n['title'];
    //     $slug = $n['slug'];
    // $description = $n['description'];
    
}

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Validate the user input
    $title = trim($_POST['title']);
    $slug = trim($_POST['slug']);
    $description = trim($_POST['description']);
    $status = trim($_POST['status']);
    
    // Validate the input
    if( empty($title) ||  empty($slug) ||  empty($description)) {
        $error_message = "All fields are required";
    }
        else {
        
        $query = "UPDATE tbl_post SET user_id = '$user_id', title = '$title', slug = '$slug', description = '$description', status = '$status'  WHERE id = '$id'";

        if(mysqli_query($conn, $query)) {
            // Redirect the user to the login page
            $error_message = "Successfully Saved";

            header("Location: /rent-a-car/post.php");
            exit;
            
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
        <div class="d-flex mb-3">
            <a href="/rent-a-car/car.php"><button class="btn border border-secondary border-2 px-4"> BACK </button></a>  
        </div>
        <div class="">
            <form action="" method="post" >
                <h2 class="h3 mb-3  fw-bold"></h2>
                <div class="text-center">
                    <div class="form-floating mb-3">
                        <input type="text" name="title" value="<?php echo $postItem['title']?>" class="form-control" id="floatingInput" placeholder="TITLE">
                        <label for="floatingInput">TITLE</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" name="slug" value="<?php echo $postItem['slug']?>" class="form-control" id="floatingPassword" placeholder="SLUG">
                        <label for="floatingPassword">SLUG</label>
                    </div>

                    <div class="form-floating mb-3">
                        <textarea type="text" name="description" class="form-control" id="floatingPassword" placeholder="DESCRIPTION" style="height: 100px"><?php echo $postItem['description']?></textarea>
                        <label for="floatingPassword">DESCRIPTION</label>
                    </div>


                    <div class="form-floating mb-3">
                        <select class="form-select" name="status" id="type" aria-label="Select type one">
                            <option selected>SELECT STATTUS </option>
                            <option value="0" <?php if ($postItem['status'] == 0) echo "selected"; ?>>INACTIVED</option>
                            <option value="1" <?php if ($postItem['status'] == 1) echo "selected"; ?>>ACTIVED</option>
                        </select>
                        <label for="floatingSelect">SELECT STATUS</label>
                    </div>

                 </div>
                <div class="d-flex ">
                    <div class="w-100 p-2">
                        <button class=" btn btn-lg btn-primary" name="update_post"  type="submit">UPDATE</button>
                        <button class=" btn btn-lg btn-pitch-pink text-white" type="cancel_post">CANCEL</button>
                    </div>
                </div>
            </form>
        </div>
    </main>
    </div>
</div>
<?php include '../admin-layout/footer.php'?>

