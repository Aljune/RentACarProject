<!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <title>Contact Page</title>
        <style>
            .mb-100 {
                margin-bottom: 100px;
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

            /* .sticky + .content {
                padding-top: 102px;
            } */
            .real_estate_properties .item_image {
                border: 1px solid maroon;
            }
            .real_estate_properties .item_image {
                height: 320px;
                overflow: hidden;
            }
            .real_estate_properties .item_image img {
                /* object-position: 50% 50%; */
                object-fit: cover;
                transition-duration: 500ms;
            }
            .real_estate_properties .item_image .box_title {
                bottom: -1px;
                width: 100%;
                background-color: #4a1f1f8f;
                text-align: center;
                padding: 17px 5px;
            }
            .real_estate_properties .item_image .box_title span {
                color: white;
                text-transform: uppercase;
                letter-spacing: 3px;
            }
            .real_estate_properties .item_image:hover img{
                height: 500px;
                transition-duration: 500ms;
                
            }
            .real_estate_properties .item_image:hover {
                border: 4px solid maroon;
                cursor: pointer;
            }

        </style>
    </head>

    <body>
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
        <div class="container-fluid px-5 my-5">
            <div class="container">
                <div class="border-bottom mb-5 d-inline-flex border-3 border-secondary">
                    <h6 class="text-uppercase">REAL ESTATE PROPERTIES</h6>
                </div>
            </div>
            
            <div class="row row-cols-4 g-0 real_estate_properties">
                <div class="col">
                    <a href="#" class="">
                        <div class="item_image position-relative">
                            <img src="./image/houseandlot.jpeg" height="320" width="100%" alt="" class="">
                            <div class="box_title position-absolute">
                                <span>House And Lot</span>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col">
                    <a href="#" class="">
                        <div class="item_image position-relative">
                            <img src="./image/lot_only.jpeg" height="320" width="100%"  alt="" class="">
                            <div class="box_title position-absolute">
                                <span>Lot Only</span>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col">
                    <div class="item_image position-relative" >
                        <img src="./image/condominium.jpeg" height="320" width="100%"  alt="" class="">
                        <div class="box_title position-absolute">
                            <span>Condominium</span>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="item_image position-relative">
                        <img src="./image/commercial_place.jpeg" height="320" width="100%"  alt="" class="">
                        <div class="box_title position-absolute">
                            <span>Commercial Place</span>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>

        <?php include "footer.php" ?>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script>
            window.onscroll = function() {
                myFunction()
            };

            var header = document.getElementById("myHeader");
            var sticky = header.offsetTop;

            function myFunction() {
                if (window.pageYOffset > sticky) {
                    header.classList.add("sticky");
                } else {
                    header.classList.remove("sticky");
                }
            }
        </script>
    </body>

    </html>