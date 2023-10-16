<?php



$servername = "localhost";
$user_name = "root";
$password_db = "";
$dbname = "tbl_rent_a_car_system";
// Create connection
$conn = mysqli_connect($servername, $user_name, $password_db, $dbname);
// Check connection
if(mysqli_connect_errno()) {
    echo "Failed to connect to database: " . mysqli_connect_error();
    exit;
}