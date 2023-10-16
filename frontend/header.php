<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="./frontend/css/style.css">


    <link rel="stylesheet" href="../css/font-awesome.min.css">
    <link rel="stylesheet" href="https://owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/assets/owl.carousel.min.css" />
    <link rel="stylesheet" href="https://owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/assets/owl.theme.default.min.css" />
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    <script src="https://owlcarousel2.github.io/OwlCarousel2/assets/vendors/jquery.min.js"></script>
    <script src="https://owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/owl.carousel.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">

    <title>Home Page</title>

    
</head>
<body>
    
    <header class="header-area">
        <div class="top-container d-flex justify-content-between align-items-center py-2 px-5">
            <div class="left-side">
            </div>
            <div class="right-side">
            <?php if($userID):?>
                <!-- <a href="/rent-a-car/my-account.php" class="text-decoration-none  text-white">My Account</a> -->
                <?php if($row['profile_image'] === null):?>
                    <a class="" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="./image/default/user/profile.png" class="border border-white rounded-circle bg-white me-2 " alt="" height="25" width="25"> 
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="./user_dashboard.php">My Account</a></li>
                        <li><a class="dropdown-item" href="./logout.php">Sign Out</a></li>
                    </ul>
                <?php else:?>
                       <a class="" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="./img/uploads/user/<?php echo $row['profile_image']?>" class="border border-white rounded-circle bg-white me-2 " alt="" height="25" width="25">
                        </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="user_dashboard.php">My Account</a></li>
                                <li><a class="dropdown-item" href="./logout.php">Sign Out</a></li>
                                
                            </ul> 
                <?php endif;?>
            <?php else:?>
                <a class="" href="#" id="" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <a href="/rent-a-car/login.php" class="text-decoration-none  text-white">Login</a>
            <?php endif;?>
                
            </div>
        </div>
        <!-- <div class="header" id="myHeader">
            <h2>Rent A Car</h2>
           
        </div> -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <a class="navbar-brand" href="#">Rent A Car</a>
                <div class="collapse navbar-collapse justify-content-end" id="navbarTogglerDemo03">
                <?php include './frontend/nav.php'?>
                <form class="d-flex m-0">
                    <input class="form-control " type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
                </div>
            </div>  
        </nav>
       
    </header>
    
    <?php if($currentPage === 'home'):?>
        <?php echo $currentPage;?>
    <?php else:?>
        <?php include './header-banner.php'?>
    <?php endif;?>
        
   
    <main>
        