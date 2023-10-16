<!doctype html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cycle2 Carousel</title>
    <link rel=stylesheet href="http://fonts.googleapis.com/css?family=Acme">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.js"></script>
    <script src="https://malsup.github.io/jquery.cycle2.js"></script>
    <style>
        .slideshow {
            margin: auto
        }

        .sem_carousel_container {
            width: 440px;
            float: left;
        }

        .carousel_container {
            position: relative;
        }

        .carousel_item {
            width: 300px;
            height: 350px;
            /* float: left; */
            margin: 10px;
            background: #fff;
            -webkit-box-shadow: 0px 0px 5px 1px rgba(50, 50, 50, 0.2);
            -moz-box-shadow: 0px 0px 5px 1px rgba(50, 50, 50, 0.2);
            box-shadow: 0px 0px 5px 1px rgba(50, 50, 50, 0.2);
            -webkit-border-radius: 5px;
            -moz-border-radius: 5px;
            border-radius: 5px;
            word-wrap: break-word;
            overflow: hidden;
            white-space: normal;
        }

        .cycle-pager {
            position: static;
            margin-top: 5px
        }
        .box-slideshow{
            z-index: 1;
        }
        .box-button-pre-next {
            width: 100%;
            position: absolute;
            top: 0;
            display: flex;
            flex-wrap: wrap;
            align-content: center;
            justify-content: space-between;
            height: 100%;
            z-index: 0;
            padding: 0 110px;

        }
        .box-button-pre-next a{
            text-decoration: none;
             font-size: 24px;
             color: #000;
        }

        div.vertical {
            width: 100px
        }
    </style>
</head>

<body>

    <div id="main">

        <script src="https://malsup.github.io/jquery.cycle2.carousel.js"></script>

        <div class="carousel_container">
            <div class="slideshow box-slideshow" data-cycle-fx="carousel" data-cycle-slides="> div" data-cycle-timeout="2000" data-cycle-carousel-visible="5" data-cycle-next="#next" data-cycle-prev="#prev">
                <div class="carousel_item card p-3">
                    <img src="http://malsup.github.io/images/beach1.jpg" width="100%" height="240px">
                    <div class="card-body px-0">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <p class="m-0"> <strong>Title</strong> </p>
                                <small>subtitle</small>
                            </div>
                            <div>
                                <a href="http://" class="text-primary text-decoration-none"><small class="m-0"> <strong> view details </strong> </small></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel_item card p-3">
                    <img src="http://malsup.github.io/images/beach2.jpg" width="100%" height="240px">
                    <div class="card-body px-0">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <p class="m-0"> <strong>Title</strong> </p>
                                <small>subtitle</small>
                            </div>
                            <div>
                                <a href="http://" class="text-primary text-decoration-none"><small class="m-0"> <strong> view details </strong> </small></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="carousel_item card p-3">
                    <img src="http://malsup.github.io/images/beach3.jpg" width="100%" height="240px">
                    <div class="card-body px-0">
                        <div class="d-flex justify-content-between align-items-center">
                             <div>
                                <p class="m-0"> <strong>Title</strong> </p>
                                <small>subtitle</small>
                            </div>
                            <div>
                                <a href="http://" class="text-primary text-decoration-none"><small class="m-0"> <strong> view details </strong> </small></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="carousel_item card p-3">
                    <img src="http://malsup.github.io/images/beach4.jpg" width="100%" height="240px">
                    <div class="card-body px-0">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <p class="m-0"> <strong>Title</strong> </p>
                                <small>subtitle</small>
                            </div>
                            <div>
                                <a href="http://" class="text-primary text-decoration-none"><small class="m-0"> <strong> view details </strong> </small></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="carousel_item card p-3">
                    <img src="http://malsup.github.io/images/beach5.jpg" width="100%" height="240px">
                    <div class="card-body px-0">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <p class="m-0"> <strong>Title</strong> </p>
                                <small>subtitle</small>
                            </div>
                            <div>
                                <a href="http://" class="text-primary text-decoration-none"><small class="m-0"> <strong> view details </strong> </small></a>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="carousel_item card p-3">
                    <img src="http://malsup.github.io/images/beach6.jpg" width="100%" height="240px">
                    <div class="card-body px-0">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <p class="m-0"> <strong>Title</strong> </p>
                                <small>subtitle</small>
                            </div>
                            <div>
                                <a href="http://" class="text-primary text-decoration-none"><small class="m-0"> <strong> view details </strong> </small></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="carousel_item card p-3">
                    <img src="http://malsup.github.io/images/beach7.jpg" width="100%" height="240px">
                    <div class="card-body px-0">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <p class="m-0"> <strong>Title</strong> </p>                                <small>subtitle</small>
                            </div>
                            <div>
                                <a href="http://" class="text-primary text-decoration-none"><small class="m-0"> <strong> view details </strong> </small></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="carousel_item card p-3">
                    <img src="http://malsup.github.io/images/beach8.jpg" width="100%" height="240px">
                    <div class="card-body px-0">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <p class="m-0"> <strong>Title</strong> </p>
                                <small>subtitle</small>
                            </div>
                            <div>
                                <a href="http://" class="text-primary text-decoration-none"><small class="m-0"> <strong> view details </strong> </small></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="center box-button-pre-next"> <a href="#" id="prev">&lt; </a>
                <a href="#" id="next"> &gt; </a>

            </div>
        </div>
        <script>
            $.fn.cycle.defaults.autoSelector = '.slideshow';
        </script>
        <div class="h-full lg:my-0 my-8">
            <div class="d-flex d-flex-col border border-danger">
                <div class="m-8">
                    <div class="d-flex d-flex-col justify-center items-center w-full lg:h-[600px] h-full lg:mx-0 bg-gradient-to-r from-sky-600 via-blue-600 to-teal-700 background-animate lg:p-0 p-4">
                        <div class="d-flex md:d-flex-row d-flex-col justify-between items-center xxl:min-w-[1345px] xl:min-w-[1260px] max-w-full relative">
                            <div class="d-flex d-flex-col justify-center items-start">
                                11
                            </div>
                            <div class="d-flex d-flex-col items-center w-[600px] h-[500px] top-0 right-0">
                                dd
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="h-100">
            div
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>