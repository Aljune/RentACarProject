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
$_SESSION = [''];
session_unset();
session_destroy();


setcookie("logid",'',time()+6000);
header("Location:index.php");



?>