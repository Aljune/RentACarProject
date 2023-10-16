</main>
<div class="sns-wrapper">
            <a href="">
                <div class="media-circle-border rounded-circle border border-white p-2 w-100% m-2">
                        <span  style="font-size: 1em; color: white;">
                            <i class="fa-brands fa-facebook-f"></i>
                        </span>
                </div>
            </a>
            <a href="">
                <div class="media-circle-border rounded-circle border border-white p-2 w-100% m-2">
                    <span  style="font-size: 1em; color: white;">
                        <i class="fa-brands fa-youtube"></i>
                    </span>
                </div>
            </a>
        </div>
    </main>
    <footer class="footer-area section-padding-100-0 bg-img gradient-background-overlay" style="background-image:url('./image/cta.jpg.webp')">
    <div class="main-footer-area">
        <div class="container">
            <div class="row row-cols-3">
                <div class="col">
                    <div class="footer-widget-area mb-100">
                        <div class="widget-title">
                            <h6>About Us</h6>
                        </div>
                        <img src="./image/car/1.jpeg" alt="" class="img-fluid img-thumbnail">
                        <div class="footer-logo my-4 d-flex justify-content-start align-items-center  ">
                            <span  class="pe-3" style="font-size: 1.5em; color: white;">
                                <i class="fa-sharp fa-solid fa-map-location"></i>
                            </span>
                            <p class="text-white">Cordova Cebu </p>
                        </div>
                        <p class="text-white">
                            We are a customer-focused car rental company, dedicated to providing reliable and affordable car rental services to our clients. Our commitment to exceptional customer service, combined with our extensive fleet of vehicles, makes us the preferred choice for car rentals.
                        </p>
                    </div>
                </div>
                <div class="col">
                    <div class="footer-widget-area">
                        <div class="widget-title">
                            <h6>Hours</h6>
                        </div>
                        <ul class="list-group list-group-flush mb-5  ">
                            <li class="list-group-item text-white d-flex justify-content-between align-items-center bg-transparent border-bottom px-0">
                                <div class="text-white">
                                    <p class="text-white">Monday - Friday</p>
                                </div>
                                <div class="text-white">
                                    <p class="text-white">09 AM - 19 PM</p>
                                </div>
                            </li>
                            <li class="list-group-item  text-white d-flex justify-content-between align-items-center bg-transparent border-bottom px-0">
                                <div class="text-white">
                                    <p class="text-white">Saturday</p>
                                </div>
                                <div class="text-white">
                                    <p class="text-white">Closed</p>
                                </div>
                            </li>
                            <li class="list-group-item text-white d-flex justify-content-between align-items-center bg-transparent border-bottom px-0">
                                <div class="text-white">
                                    <p class="text-white">Sunday</p>
                                </div>
                                <div class="text-white">
                                    <p class="text-white">Closed</p>
                                </div>
                            </li>
                        </ul>

                        <div class="row row-cols-2 g-3 px-0">
                            <div class="col-2">
                                <i class="fa-solid fa-phone text-white"></i>
                            </div>
                            <div class="col-10">
                                <span class="fs-6 text text-white">+45 677 8993000 223</span>
                            </div>

                            <div class="col-2">
                                <i class="fa-solid fa-envelope text-white"></i>
                            </div>
                            <div class="col-10">
                                <span class="fs-6 text text-white">office@template.com</span>
                            </div>

                            <div class="col-2">
                                <i class="fa-solid fa-location-dot text-white"></i>
                            </div>
                            <div class="col-10">
                                <span class="fs-6 text text-break text-white">Main Str. no 45-46, b3, 56832, Los Angeles, CA</span>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col">
                    <div class="footer-widget-area mb-100 ">
                        <div class="widget-title">
                            <h6>Useful LInks</h6>
                        </div>
                        <ul class="list-group list-group-flush bg-transparent">
                            <li class="list-group-item bg-transparent">
                                <a href="/rent-a-car/home.php" class="text-decoration-none text-white">HOME</a>
                            </li>
                            <li class="list-group-item bg-transparent">
                                <a href="/rent-a-car/about.php" class="text-decoration-none text-white">ABOUT</a>
                            </li>
                            <li class="list-group-item bg-transparent">
                                <a href="/rent-a-car/list-cars.php" class="text-decoration-none text-white">CAR</a>
                            </li>
                        </ul>

                    </div>
                </div>
                <div class="col">
                    <!-- <div class="footer-widget-area mb-100">
                        <div class="widget-title">
                            <h6>News Update</h6>
                        </div>

                    </div> -->
                    
                </div>
            </div>
        </div>
    </div>

    <div class="copywrite-text d-flex align-items-center justify-content-center">
        <p class="text-white">
            Copyright c 2023 All rights reserved | This template is made with love by Rent A Car
        </p>
    </div>
    </footer>

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
    <script>
            $(document).ready(function() {
                var owl = $('.owl-carousel');
                owl.owlCarousel({
                    items: 1,
                    loop: true,
                    margin: 10,
                    autoplay: true,
                    autoplayTimeout: 5000,
                    autoplayHoverPause: true,
                    nav: true,
                });
                $('.play').on('click', function() {
                    owl.trigger('play.owl.autoplay', [1000])
                })
                $('.stop').on('click', function() {
                    owl.trigger('stop.owl.autoplay')
                })
            });
        </script>
    <script>
    
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>
    
    </body> 
</html>