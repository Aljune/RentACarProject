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

$currentPage = "post";
$currentTitle = "POST";

$id = $_SESSION["user_id"];
$status = 1;

$result = mysqli_query($conn, "SELECT * FROM tbl_user WHERE id = $id");
$row = mysqli_fetch_assoc($result);

if (isset($_GET['delete'])) {

  $id = $_GET['delete'];
  $update = true;
  echo "<script> alert('Deleted successfully'); </script>";
  $cardeletedata = mysqli_query($conn, " DELETE FROM tbl_post WHERE id=$id");

}


    // if(isset($_POST["submit"])){
    //     $title = $_POST["title"];
    //     $slug = $_POST["slug"];
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

  //   if (isset($_GET['edit'])) {
  //     $id = $_GET['edit'];
  //     $update = true;
  //     $postdata = mysqli_query($conn, "SELECT * FROM tbl_post WHERE id=$id");

  //     $n = mysqli_fetch_assoc($postdata);
          
  //     $title = $n['title'];
  //         $slug = $n['slug'];
  //     $description = $n['description'];
        
	//  }


?>
<?php include './admin-layout/header.php'?>

  <div class="container-fluid ">
    <div class="row" style="height: 100vh; background-color: #F2F2F2">
      <?php include './admin-layout/nav-menu.php'?>
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">POSTS</h1>
        
      </div>

      <!-- <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas> -->
      <div class="d-flex mb-3">
           <a href="/rent-a-car/post/add.php"> <button class="btn border border-secondary border-2 px-4"> ADD CAR</button></a>
      </div>
      <div class="table-responsive">
        <table class="table table-dark table-striped">
          <thead>
            <tr>
              <th scope="col">Title</th>
              <th scope="col">Slug</th>
              <th scope="col">Description</th>
              <th scope="col">Status</th>
              <th scope="col">Action</th>
   
            </tr>
          </thead>
          <tbody>
          <?php
           
                $selectposts = mysqli_query($conn, "SELECT * FROM tbl_post  WHERE  user_id = '$id' ORDER BY id");

                while ($postItem = mysqli_fetch_assoc($selectposts)) { ?>
                    <tr>
                 
                  <td><?php echo $postItem['title'] ?></td>
                  <td><?php echo $postItem['slug'] ?></td>
                  <td><?php echo $postItem['description'] ?></td>
                  <td>
                    <div class="form-check form-switch">
                      <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" <?php if($postItem['status'] === '1'): ?> checked <?php else:?>  <?php endif?>>
                    </div>
                  </td>
                  <td>
                    <a href="/rent-a-car/post/post-edit.php?edit=<?php echo $postItem['id'] ?>"><button type='button' class='btn btn-primary'> edit </button></a>
                    <a href="/rent-a-car/post.php?delete=<?php echo $postItem['id'] ?>"> <button type='button' class='btn btn-danger'> delete </button></a>
                  </td>

                </tr>
                <?php
                }
                ?>
          </tbody>
        </table>
        </div>

        
    </main>
  </div>
</div>

<?php include './admin-layout/footer.php'?>

</body>
</html>