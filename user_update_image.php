<?php
// Check if the form was submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Check if file was uploaded without errors
    if(isset($_FILES["FileInput"]) && $_FILES["FileInput"]["error"] == 0){
        $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
        $filename = $_FILES["FileInput"]["name"];
        $filetype = $_FILES["FileInput"]["type"];
        $filesize = $_FILES["FileInput"]["size"];

        // Validate file extension
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if(!array_key_exists($ext, $allowed)) die("Error: Please select a valid file format.");

        // Validate file size - 10MB maximum
        $maxsize = 10 * 1024 * 1024;
        if($filesize > $maxsize) die("Error: File size is larger than the allowed limit.");

        // Validate type of the file
        if(in_array($filetype, $allowed)){
            // Check whether file exists before uploading it
            if(file_exists("uploads/" . $filename)){
                echo $filename . " is already exists.";
            } else{

                if(move_uploaded_file($_FILES["FileInput"]["tmp_name"], "img/" . $filename)){
                 include"config.php";
                 $id=$_COOKIE['logid'];
                 $querys="UPDATE tbl_user SET profile_image='$filename' where  id='$id' ";
                 mysqli_query($conn,$querys);

                 header("location:user_dashboard.php");

             }else{

               echo "File is not uploaded";
           }

       } 
   } else{
    echo "Error: There was a problem uploading your file. Please try again."; 
}
} else{
    echo "Error: " . $_FILES["FileInput"]["error"];
}
}
?>