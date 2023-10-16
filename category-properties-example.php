<!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <title>Contact Page</title>
        <style>
            .clr-maroon {
                color: #4a1f1f;
            }
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

            .section-padding-100-50 {
            padding: 100px 50px;
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
            .category-item-card .item-image {
                height: 400px;
                overflow: hidden;
            }
            .category-item-card .item-image img{
                object-fit: cover;
                object-position: 50% 50%;
                transition-duration: 500ms;
            }
            .category-item-card .item-image:hover img{
                height: 500px;
                transition-duration: 500ms;
                cursor: pointer;
            }
            .category-item-card .card .card-body {
                background-color: #d9d7d7d9 ;
            }
            .category-item-card .card .card-body h5 {
                color: #4a1f1f;
            }
            .category-item-card .card .card-body p
            {
                margin-bottom: 30px;
                color: #4c4c4c;
                font-size: 14px;
                line-height: 2;
                font-weight: 400;
            }
            .box-category-text {
                background-color: #d3d2d2;
                padding: 15px;
            }
            .box-category-text p {
                font-weight: 300;
                word-break: break-word;
                line-height: 2;
                /* font-size: 15px; */
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
        <div class="container py-5">
            <div class="box-category-text">
                <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. </p>
            </div>
        </div>
        <div class="container">
        <div class="label-category">
                <h2 class="clr-maroon">DYNAMIC LIVE-WORK-PLAY ADDRESSES</h2>
            </div>
        </div>
       
        <hr/>
        <div class="container section-padding-100-0">
            <div class="border-bottom mb-5 d-inline-flex border-3 border-secondary">
                <h6 class="text-uppercase">Condominium</h6>
            </div>
            <div class="row row-cols-2 g-4 category-item-card mb-5">
                <div class="col-4">
                    <div class="card">
                        <div class="item-image">
                            <img src="./image/hero1.jpg.webp" class="card-img-top" alt="..." height="400" width="100%">
                        </div> 
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build</p>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card">
                        <div class="item-image">
                            <img src="./image/hero1.jpg.webp" class="card-img-top" alt="..." height="400" width="100%">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build</p>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card">
                        <div class="item-image">
                            <img src="./image/hero1.jpg.webp" class="card-img-top" alt="..." height="400" width="100%">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build</p>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card">
                        <div class="item-image">
                            <img src="./image/hero1.jpg.webp" class="card-img-top" alt="..." height="400" width="100%">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build</p>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card">
                        <div class="item-image">
                            <img src="./image/hero1.jpg.webp" class="card-img-top" alt="..." height="400" width="100%">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build</p>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card">
                        <div class="item-image">
                            <img src="./image/hero1.jpg.webp" class="card-img-top" alt="..." height="400" width="100%">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build</p>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card">
                        <div class="item-image">
                            <img src="./image/hero1.jpg.webp" class="card-img-top" alt="..." height="400" width="100%">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build</p>
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