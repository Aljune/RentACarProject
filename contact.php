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
        <div class="container ">
            <div class="border-bottom mb-5 d-inline-flex border-3 border-secondary">
                <h6 class="text-uppercase">Contact Infor</h6>
            </div>
            <div class="row row-cols-2">
                <div class="col-4 ">
                    <ul class="list-group list-group-flush mb-5  ">
                        <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent border-bottom px-0">
                            <div class="">
                                <p class="m-0">Monday - Friday</p>
                            </div>
                            <div class="">
                                <p class="m-0">09 AM - 19 PM</p>
                            </div>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent border-bottom px-0">
                            <div class="">
                                <p class="m-0">Saturday</p>
                            </div>
                            <div class="">
                                <p class="m-0">Closed</p>
                            </div>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent border-bottom px-0">
                            <div class="">
                                <p class="m-0">Sunday</p>
                            </div>
                            <div class="">
                                <p class="m-0">Closed</p>
                            </div>
                        </li>
                    </ul>

                    <div class="row row-cols-2 g-3 px-0">
                        <div class="col-2">
                            icon
                        </div>
                        <div class="col-10">
                            <span class="fs-6 text">+45 677 8993000 223</span>
                        </div>

                        <div class="col-2">
                            icon
                        </div>
                        <div class="col-10">
                            <span class="fs-6 text">office@template.com</span>
                        </div>

                        <div class="col-2">
                            icon
                        </div>
                        <div class="col-10">
                            <span class="fs-6 text text-break">Main Str. no 45-46, b3, 56832, Los Angeles, CA</span>
                        </div>
                    </div>

                </div>
                <div class="col-8">
                    <form action="">
                        <div class="row row-cols-1 g-3 py-3">
                            <div class="col">
                                <input type="text" class="form-control rounded-0" placeholder="Your Name" aria-label="Your name">
                            </div>
                            <div class="col">
                                <input type="number" class="form-control rounded-0" placeholder="Your Phone" aria-label="Your phone">
                            </div>
                            <div class="col">
                                <input type="email" class="form-control rounded-0" placeholder="Your Email" aria-label="Your email">
                            </div>
                            <div class="col">
                                <textarea name="" id="" cols="30" rows="10" class="form-control rounded-0" placeholder="Your Message" aria-label="Your message"></textarea>
                            </div>
                            <div class="col">
                                <button type="button" class="btn btn-primary py-3 px-4 rounded-0"> SEND MESSAGE</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div id="map" class="mb-4" style="margin-top: 65px;">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d245.33637080357153!2d123.89262946600296!3d10.311287503155935!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33a9994e95dd4459%3A0x272838304f983997!2sMedalle%20Building!5e0!3m2!1sfil!2sph!4v1675316641206!5m2!1sfil!2sph" width="100%" height="500" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
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