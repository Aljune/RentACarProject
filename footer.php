<footer class="footer-area section-padding-100-0 bg-img gradient-background-overlay" style="background-image:url('./image/cta.jpg.webp')">
    <div class="main-footer-area">
        <div class="container">
            <div class="row row-cols-4">
                <div class="col">
                    <div class="footer-widget-area mb-100">
                        <div class="widget-title">
                            <h6>About Us</h6>
                        </div>
                        <img src="./image/hero1.jpg.webp" alt="" class="img-fluid img-thumbnail">
                        <div class="footer-logo my-4 d-flex justify-content-start align-items-center  ">
                            <span  class="pe-3" style="font-size: 1.5em; color: white;">
                                <i class="fa-sharp fa-solid fa-map-location"></i>
                            </span>
                            <p>LOte lsadad </p>
                        </div>
                        <p>
                            Integer nec bibendum lacus. Suspen disse dictum enim sit amet libero males uada feugiat. Praesent malesuada.
                        </p>
                    </div>
                </div>
                <div class="col">
                    <div class="footer-widget-area">
                        <div class="widget-title">
                            <h6>Hours</h6>
                        </div>
                        <ul class="list-group list-group-flush mb-5  ">
                            <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent border-bottom px-0">
                                <div class="">
                                    <p>Monday - Friday</p>
                                </div>
                                <div class="">
                                    <p>09 AM - 19 PM</p>
                                </div>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent border-bottom px-0">
                                <div class="">
                                    <p>Saturday</p>
                                </div>
                                <div class="">
                                    <p>Closed</p>
                                </div>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent border-bottom px-0">
                                <div class="">
                                    <p>Sunday</p>
                                </div>
                                <div class="">
                                    <p>Closed</p>
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
                </div>
                <div class="col">
                    <div class="footer-widget-area mb-100">
                        <div class="widget-title">
                            <h6>Useful LInks</h6>
                        </div>

                    </div>
                </div>
                <div class="col">
                    <div class="footer-widget-area mb-100">
                        <div class="widget-title">
                            <h6>News Update</h6>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="copywrite-text d-flex align-items-center justify-content-center">
        <p>
            Copyright c 2023 All rights reserved | This template is made with love by Rent A Car
        </p>
    </div>
</footer>
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
    console.log(" Web Designer And Developer: Aljune Degamo");
    console.log(" Content Creator: Merry Dresa Juarez");
</script>