<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/font-awesome.min.css">
    <link rel="stylesheet" href="https://owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/assets/owl.carousel.min.css" />
    <link rel="stylesheet" href="https://owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/assets/owl.theme.default.min.css" />
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    <script src="https://owlcarousel2.github.io/OwlCarousel2/assets/vendors/jquery.min.js"></script>
    <script src="https://owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/owl.carousel.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">

    <title>Single Page</title>

    <style>
        /* Header */
        .mb-100 {
            margin-bottom: 100px;
        }

        .mb-70 {
            margin-bottom: 70px;
        }

        .mb-50 {
            margin-bottom: 50px;
        }

        .mt-50 {
            margin-top: 50px;
        }

        .header-area {
            position: absolute;
            z-index: 10000;
            width: 100%;
            height: auto;
            -webkit-transition-duration: 500ms;
            transition-duration: 500ms;

        }

        .header-text-title-page {
            font-size: 60px;
            margin-bottom: 0;
            background-color: #000000;
            padding: 5px 20px 7px;
            line-height: 1;
            color: #ffffff;
            display: inline-block;
            text-transform: uppercase;
        }

        .top-container {
            background-color: #000000;
            padding: 30px;
            text-align: center;
            color: #fff;
        }

        .header {
            padding: 10px 16px;
            background-color: rgba(0, 0, 0, 0.4);
            color: #f1f1f1;
            z-index: 999;
            transition-duration: 500ms;
        }

        .content {
            padding: 16px;
        }

        .sticky {
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 9999;
            height: 90px;
            box-shadow: 0 10px 10px 0 rgb(0 0 0 / 20%);
            background-color: #4a1f1f;
            transition-duration: 500ms;
        }

        /* Footer */
        .footer-area {
            position: relative;
            z-index: 1;
            overflow-x: hidden;
        }

        .section-padding-100-0 {
            padding: 100px 0 0;
        }

        .bg-img {
            background-position: center center;
            background-size: cover;
            background-repeat: no-repeat;
        }

        .gradient-background-overlay:before {
            content: "";
            position: absolute;
            height: 100%;
            width: 100%;
            z-index: -1;
            top: 0;
            left: 0;
            background: rgba(0, 0, 0, 0.9);
            background: -webkit-linear-gradient(top, black 0%, rgba(0, 0, 0, 0.9) 90%, rgba(0, 0, 0, 0) 100%);
            background: linear-gradient(to bottom, black 0%, rgba(0, 0, 0, 0.9) 90%, rgba(0, 0, 0, 0) 100%);
        }

        .footer-widget-area .widget-title {
            margin-bottom: 90px;
            color: #ffff;
        }

        .footer-widget-area .widget-title h6 {
            font-size: 16px;
            color: #ffffff;
            margin-bottom: 0;
            text-transform: uppercase;
            border-bottom: 2px solid;
            border-color: #a33624;
            line-height: 1.8;
            display: inline-block;
        }

        .footer-widget-area p {
            color: #7d7d7d;
            margin-bottom: 0;
            font-weight: 400;
        }

        .footer-area .copywrite-text {
            width: 100%;
            height: 60px;
            background-color: #111113;
            padding: 0 15px;
        }

        /* Single Page */
        .single-content-page .post-content {
            position: relative;
            z-index: 1;
            padding: 50px 0;
        }

        .single-content-page .post-content .post-date span {
            font-size: 14px;
            color: #4a1f1f;
            margin-bottom: 10px;
            display: block;
        }

        .single-content-page .post-content .headline {
            font-size: 30px;
            margin-bottom: 10px;
            color: #323232;
            display: block;
            text-decoration: none;
        }

        .single-content-page .post-content .post-meta {
            position: relative;
            margin-bottom: 30px;
        }

        .single-content-page .post-content .post-meta p a {
            font-size: 12px;
            color: #aaa8a8;
            display: inline-block;
            text-decoration: none;
        }

        .single-content-page .post-content p {
            margin-bottom: 50px;
            color: #7d7d7d;
            font-size: 14px;
            line-height: 2;
            font-weight: 600;
        }
    </style>

</head>

<body>
    <main>

        <header class="header-area">
            <div class="top-container d-flex justify-content-between align-items-center py-2 px-5">
                <div class="left-side">
                    <span>contact@sample.com</span>
                </div>
                <div class="right-side">
                    <span>+09232123</span>
                </div>
            </div>
            <div class="header" id="myHeader">
                <h2>My Header</h2>
            </div>
        </header>
        <section class="mb-5">
            <?php include 'header-banner.php' ?>
        </section>
        <section class="single-content-page">
            <div class="container">
                <div class="row">
                    <div class="col-12 p-2 border border-danger">
                        <div class="blog-post-thumbnail">
                            <img src="./image/hero1.jpg.webp" alt="" class="img-fluid">
                        </div>
                    </div>
                    <div class="col-8 p-2 border border-danger">
                        <div class="post-content">
                            <div class="post-date">
                                <span>March 09, 2018</span>
                            </div>
                            <h5 class="headline">How to get the best deal for your house</h5>
                            <div class="post-meta">
                                <p>
                                    By <a href="#">Admin</a> in <a href="#">Uncateggorized</a> <a href="#">2 Comments</a>
                                </p>
                            </div>
                            <p>
                                Etiam nec odio vestibulum est mattis effic iturut magna. Pellentesque sit amet tellus blandit. Etiam nec odiomattis effic iturut magna. Pellentesque sit am et tellus blandit. Etiam nec odio vestibul. Etiam nec odio vestibulum est mat tis effic iturut magna. Curabitur rhoncus auctor eleifend. Fusce venenatis diam urna, eu pharetra arcu varius ac. Etiam cursus turpis lectus, id iaculis risus tempor id. Phasellus fringilla nisl sed sem scelerisque, eget aliquam magna vehicula.
                            </p>

                            <a href="#" class="btn south-btn">Read More</a>
                        </div>
                    </div>
                    <div class="col-4 p-2 border border-danger">
                        2
                    </div>
                    <div class="col-12">
                        <h1>My First Google Map</h1>

                        <div id="googleMap" style="width:100%;height:400px;"></div>


                    </div>
                </div>
            </div>
        </section>
        <div class="sns-wrapper">
            <a href="">
                <div class="media-circle-border rounded-circle border border-white p-2 w-100% m-2">
                    <span style="font-size: 1em; color: white;">
                        <i class="fa-brands fa-facebook-f"></i>
                    </span>
                </div>
            </a>
            <a href="">
                <div class="media-circle-border rounded-circle border border-white p-2 w-100% m-2">
                    <span style="font-size: 1em; color: white;">
                        <i class="fa-brands fa-youtube"></i>
                    </span>
                </div>
            </a>
        </div>
    </main>
    <?php include "footer.php" ?>
    <script>
        function myMap() {
            const locationVal = {
                lat: 10.2514623,
                lng: 123.9494804
            };
            // var mapProp= {
            //   center:new google.maps.LatLng(51.508742,-0.120850),
            //   zoom:5,
            // };
            const map = new google.maps.Map(document.getElementById("googleMap"), {
                zoom: 16,
                center: locationVal,
            });

            // The marker, positioned at Uluru
            const marker = new google.maps.Marker({
                position: locationVal,
                map: map,
            });

            // var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);
        }
        window.myMap = myMap;
    </script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAwuyLRa1uKNtbgx6xAJVmWy-zADgegA2s&callback=myMap"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>

</html>