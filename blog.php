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

    <script src="https://owlcarousel2.github.io/OwlCarousel2/assets/vendors/jquery.min.js"></script>
    <script src="https://owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/owl.carousel.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">

    <title>Blog Page</title>
    <style>
        .mb-100 {
            margin-bottom: 100px;
        }
        .mb-70{
            margin-bottom: 70px;
        }
        .mb-50 {
            margin-bottom: 50px;
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

        /* Blog Post  Start*/
        .single-blog-area {
            position: relative;
            z-index: 1;
        }

        .single-blog-area .blog-post-thumbnail {
            position: relative;
            z-index: 1;
        }

        .single-blog-area .post-content .post-meta {
            position: relative;
            margin-bottom: 30px;
        }

        .single-blog-area .post-content {
            position: relative;
            z-index: 1;
            padding: 50px 0;
        }

        .single-blog-area .post-content .post-date span {
            font-size: 14px;
            color: #4a1f1f;
            margin-bottom: 10px;
            display: block;
        }

        .single-blog-area .post-content .headline {
            font-size: 30px;
            color: #323232;
            display: block;
            text-decoration: none;
        }

        .post-content .post-meta p {
            color: #aaa8a8;
            font-size: 12px;
        }

        .single-blog-area .post-content .post-meta p a {
            font-size: 12px;
            color: #aaa8a8;
            display: inline-block;
            text-decoration: none;
        }

        .single-blog-area .post-content p {
            margin-bottom: 50px;
            color: #7d7d7d;
            font-size: 14px;
            line-height: 2;
            font-weight: 600;
        }

        .south-btn {
            position: relative;
            z-index: 1;
            min-width: 170px;
            height: 50px;
            color: #ffffff;
            font-size: 14px;
            font-weight: 600;
            background-color: #4a1f1f;
            border-radius: 0;
            line-height: 50px;
            padding: 0 30px;
            text-transform: uppercase;
        }

        /* Blog Post  End*/

        .search-widget-area form {
            position: relative;
            z-index: 1;
        }

        .search-widget-area input[type=search] {
            width: 100%;
            height: 43px;
            border: 1px solid #e1dddd;
            font-size: 12px;
            font-style: italic;
            padding: 0 30px;
        }

        .search-widget-area button[type=submit] {
            width: 50px;
            height: 43px;
            background-color: transparent;
            border: none;
            font-size: 14px;
            color: #7e7e7e;
            position: absolute;
            top: 0;
            right: 0;
            cursor: pointer;
        }


        .single-featured-property {
            position: relative;
            z-index: 1;
            -webkit-transition-duration: 500ms;
            transition-duration: 500ms;
            overflow: hidden;
        }

        .single-featured-property .property-thumb {
            position: relative;
            z-index: 1;
        }

        .single-featured-property .property-thumb .tag span {
            height: 35px;
            padding: 0 20px;
            background-color: #947054;
            color: #ffffff;
            text-transform: uppercase;
            font-size: 12px;
            font-weight: 600;
            display: inline-block;
            line-height: 35px;
            position: absolute;
            top: 20px;
            left: 20px;
            z-index: 10;
            -webkit-transition-duration: 500ms;
            transition-duration: 500ms;
        }

        .single-featured-property .property-thumb .list-price p {
            background-color: #ffffff;
            padding: 10px 20px;
            color: #947054;
            font-size: 24px;
            font-weight: 600;
            display: inline-block;
            position: absolute;
            bottom: 20px;
            left: 20px;
            z-index: 10;
            margin-bottom: 0;
            line-height: 1;
            -webkit-transition-duration: 500ms;
            transition-duration: 500ms;
        }

        .single-featured-property .property-content {
            padding: 30px;
            border: 1px solid #e1dddd;
        }

        .single-featured-property .property-content h5 {
            font-size: 18px;
        }

        .single-featured-property .property-content .location {
            color: #947054;
            margin-bottom: 25px;
            font-size: 14px;
            font-weight: 600;
        }

        .single-featured-property .property-content .location img {
            margin-right: 10px;
            display: inline-block !important;
            width: auto !important;
        }

        .single-featured-property .property-content p {
            margin-bottom: 30px;
            color: #7d7d7d;
            font-size: 14px;
            line-height: 2;
            font-weight: 600;
        }

        .blog-sidebar-area .featured-properties-slides .owl-prev,
        .blog-sidebar-area .featured-properties-slides .owl-next {
            width: 38px;
            height: 38px;
            position: absolute;
            top: 50%;
            line-height: 40px;
            text-align: center;
            -webkit-transition-duration: 500ms;
            transition-duration: 500ms;
            left: -19px;
            opacity: 0;
            visibility: hidden;
            margin-top: -19px;

        }

        .blog-sidebar-area .featured-properties-slides:hover .owl-prev,
        .blog-sidebar-area .featured-properties-slides:hover .owl-next {
            visibility: visible;
            z-index: 55;
            background-color: #947054;
            /* display: block; */
            opacity: 10 !important;
            -webkit-transition-duration: 500ms;
            transition-duration: 500ms;
            background-color: #947054;
            font-size: 13px;
            box-shadow: 0 0 5px rgb(255 255 255 / 15%);
            color: #ffffff;
        }

        .blog-sidebar-area .featured-properties-slides .owl-next {
            left: auto;
            right: -19px;
        }

        .blog-sidebar-area .featured-properties-slides .owl-dots {
            display: none !important;
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
            <h6 class="text-uppercase">Blog Page</h6>
        </div>
        <div class="row row-cols-2">
            <div class="col-8">

                <div class="single-blog-area mb-50">
                    <div class="blog-post-thumbnail">
                        <img src="./image/hero1.jpg.webp" alt="" class="img-fluid">
                    </div>
                    <div class="post-content">
                        <div class="post-date">
                            <span>March 09, 2018</span>
                        </div>
                        <a href="#" class="headline">How to get the best deal for your house</a>
                        <div class="post-meta">
                            <p>
                                By <a href="#">Admin</a> in <a href="#">Uncateggorized</a> <a href="#">2 Comments</a>
                            </p>
                        </div>
                        <p>
                            Etiam nec odio vestibulum est mattis effic iturut magna. Pellentesque sit amet tellus blandit. Etiam nec odiomattis effic iturut magna. Pellentesque sit am et tellus blandit. Etiam nec odio vestibul. Etiam nec odio vestibulum est mat tis effic iturut magna. Curabitur rhoncus auctor eleifend.
                        </p>

                        <a href="#" class="btn south-btn">Read More</a>
                    </div>
                </div>

                <div class="single-blog-area mb-50">
                    <div class="blog-post-thumbnail">
                        <img src="./image/hero1.jpg.webp" alt="" class="img-fluid">
                    </div>
                    <div class="post-content">
                        <div class="post-date">
                            <span>March 09, 2018</span>
                        </div>
                        <a href="#" class="headline">How to get the best deal for your house</a>
                        <div class="post-meta">
                            <p>
                                By <a href="#">Admin</a> in <a href="#">Uncateggorized</a> <a href="#">2 Comments</a>
                            </p>
                        </div>
                        <p>
                            Etiam nec odio vestibulum est mattis effic iturut magna. Pellentesque sit amet tellus blandit. Etiam nec odiomattis effic iturut magna. Pellentesque sit am et tellus blandit. Etiam nec odio vestibul. Etiam nec odio vestibulum est mat tis effic iturut magna. Curabitur rhoncus auctor eleifend.
                        </p>

                        <a href="#" class="btn south-btn">Read More</a>
                    </div>
                </div>


                <div class="single-blog-area mb-50">
                    <div class="blog-post-thumbnail">
                        <img src="./image/hero1.jpg.webp" alt="" class="img-fluid">
                    </div>
                    <div class="post-content">
                        <div class="post-date">
                            <span>March 09, 2018</span>
                        </div>
                        <a href="#" class="headline">How to get the best deal for your house</a>
                        <div class="post-meta">
                            <p>
                                By <a href="#">Admin</a> in <a href="#">Uncateggorized</a> <a href="#">2 Comments</a>
                            </p>
                        </div>
                        <p>
                            Etiam nec odio vestibulum est mattis effic iturut magna. Pellentesque sit amet tellus blandit. Etiam nec odiomattis effic iturut magna. Pellentesque sit am et tellus blandit. Etiam nec odio vestibul. Etiam nec odio vestibulum est mat tis effic iturut magna. Curabitur rhoncus auctor eleifend.
                        </p>

                        <a href="#" class="btn south-btn">Read More</a>
                    </div>
                </div>
            </div>
            <!-- End col-md-8 -->
            <div class="col-4">
                <div class="blog-sidebar-area">
                    <div class="search-widget-area mb-70">
                        <form action="">
                            <input type="search" name="search" id="search" placeholder="Search">
                            <button type="submit">
                                <!-- <i class="fa fa-search"></i> -->
                                <span  class="" style="font-size: 1em; color: gray;">
                                    <i class="fa-sharp fa-solid fa-magnifying-glass"></i>
                                </span>
                            </button>
                        </form>
                    </div>

                    <div class="featured-properties-slides owl-carousel owl-theme owl-loaded">
                        <div class="single-featured-property">
                            <div class="property-thumb">
                                <img src="./image/hero1.jpg.webp" alt="">
                                <div class="tag">
                                    <span>For Sale</span>
                                </div>
                                <div class="list-price">
                                    <p>$123 s22</p>
                                </div>
                            </div>
                            <div class="property-content">
                                <h5>Town House in Los Angeles</h5>
                                <p class="location">
                                    <img src="./image/location.png.webp" alt="">
                                    Upper Road 3411, no.34 CA
                                </p>
                                <p>Integer nec bibendum lacus. Suspendisse dictum enim sit amet libero malesuada.</p>
                            </div>
                        </div>
                        <div class="single-featured-property">
                            <div class="property-thumb">
                                <img src="./image/hero1.jpg.webp" alt="">
                                <div class="tag">
                                    <span>For Sale</span>
                                </div>
                                <div class="list-price">
                                    <p>$123 s22</p>
                                </div>
                            </div>
                            <div class="property-content">
                                <h5>Town House in Los Angeles</h5>
                                <p class="location">
                                    <img src="./image/location.png.webp" alt="">
                                    Upper Road 3411, no.34 CA
                                </p>
                                <p>Integer nec bibendum lacus. Suspendisse dictum enim sit amet libero malesuada.</p>
                            </div>
                        </div>
                        <div class="single-featured-property">
                            <div class="property-thumb">
                                <img src="./image/hero1.jpg.webp" alt="">
                                <div class="tag">
                                    <span>For Sale</span>
                                </div>
                                <div class="list-price">
                                    <p>$123 s22</p>
                                </div>
                            </div>
                            <div class="property-content">
                                <h5>Town House in Los Angeles</h5>
                                <p class="location">
                                    <img src="./image/location.png.webp" alt="">
                                    Upper Road 3411, no.34 CA
                                </p>
                                <p>Integer nec bibendum lacus. Suspendisse dictum enim sit amet libero malesuada.</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>


    <?php include "footer.php" ?>
    
</body>

</html>