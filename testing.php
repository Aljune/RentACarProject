  <?php


  error_reporting(0);
  $target_dir = "img/";
  $target_file = $target_dir . basename($_FILES["fileToUploads"]["name"]);
  $image=basename($_FILES["fileToUploads"]["name"]);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));



  if (move_uploaded_file($_FILES["fileToUploads"]["tmp_name"], $target_file)) {

    if($image==''){
      include 'config.php';

      $id=$_GET['edit'];
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
      $images=$_POST['image'];
      $query = "UPDATE cars SET  name = '$name', branch = '$branch', model = '$model', year = '$year', passenger_seat = '$passenger_seat', type_transmission = '$type_transmission', price = '$price', type = '$type', description = '$description', permanent_location = '$permanentLocation', created_at = '$created_at ',image = '$images'  WHERE id = '$id'";

      $mysqli=mysqli_query($conn,$query);
      echo '<script>alert("car detail update success")</script>';
      echo '<script>window.location="user_post_car.php"</script>';
    }else{
      include 'config.php';

      $id=$_GET['edit'];
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

      $queryss = "UPDATE cars SET  name = '$name', branch = '$branch', model = '$model', year = '$year', passenger_seat = '$passenger_seat', type_transmission = '$type_transmission', price = '$price', type = '$type', description = '$description', permanent_location = '$permanentLocation',image = '$image'  WHERE id = '$id'";


      $mysqli=mysqli_query($conn,$queryss);
      echo '<script>alert("car detail update success")</script>';
      echo '<script>window.location="user_post_car.php"</script>';
                //echo '<script>window.location="admin_update_3d.php"</script>';
    }

  } 
  else 
  {
    include 'config.php';
    $id=$_GET['edit'];
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
    $images=$_POST['image'];
    $query = "UPDATE cars SET  name = '$name', branch = '$branch', model = '$model', year = '$year', passenger_seat = '$passenger_seat', type_transmission = '$type_transmission', price = '$price', type = '$type', description = '$description', permanent_location = '$permanentLocation',image = '$images'  WHERE id='$id'";

    mysqli_query($conn,$query);
    echo '<script>alert("car detail update success")</script>';
    echo '<script>window.location="user_post_car.php"</script>';
       //echo '<script>window.location="user_car_post-car.php"</script>';

  }


  ?>


