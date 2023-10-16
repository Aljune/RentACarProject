
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

$error_message = "";

if(!isset($_SESSION['user_id'])){

    $currentPage = "home";
    $currentTitle = "HOME";
    $userID = "";

}elseif(isset($_SESSION['user_id'])){
    $currentPage = "home";

    $currentTitle = "HOME";
    
    $userID = $_SESSION["user_id"];
    $result = mysqli_query($conn, "SELECT * FROM tbl_user WHERE id = $userID");
    $row = mysqli_fetch_assoc($result);
    
}

?>
<?php include './frontend/header.php'?>

        <section class="header-slider-area">
            <?php include "./main-header-slide.php" ?>
        </section>
        <section class="latest-car-items">
            <?php include "./latest-car-items.php" ?>
        </section>
        <!-- <section class="featured-properties-area section-padding-100-50">
            <?php include "./featured-properties.php" ?>
        </section> -->
        <section class="our-services-area section-padding-100-50"  style="background-color: #cfa9a966;">
            <?php include "./our-services-area.php" ?>
        </section>
        <!-- <section class="call-to-action-area bg-fixed bg-overlay-black" style="background-image: url('./image/reach-now.jpeg')">
            <?php include "./call-to-action-area.php" ?>
        </section>
        <section class="our-developer-area section-padding-100-50">
            <?php include "./our-developer-area.php" ?>       
        </section> -->
        
<?php include './frontend/footer.php'?>