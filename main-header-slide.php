<!-- <div class="position-absolute  reservation-form-box">
    <div class="reservation-form ">
        <div class="card p-2 h-100">
            <div class="card-header text-center ">
                <h5 class="fw-bolder">Make a Reservation!</h5>
            </div>
            <form action="list-cars.php" method="post">
                <div class="card-body">
                    <?php echo $error_message;?>
                   
                    <div class="row mb-3" >

                        <div class="col-4">
                            <label for="">Pickup Location: </label>
                            <input type="text" name="pickup_location" class="w-100 me-1" placeholder="Pickup Location">
                        </div>
                        <div class="col-4">
                            <label for="">Pickup Date: </label>
                            <input type="date" name="pickup_date" class="w-100 mx-1" >
                        </div>
                        <div class="col-4">
                            <label for="">Pickup Time: </label>
                            <input type="time" name="pickup_time" class="w-100 me-1" >
                        </div>
                    </div>
                    <div class="row mb-3" >
                        <div class="col-4">
                            <label for="">Drop Location: </label>
                            <input type="text" name="drop_location" class="w-100 me-1" placeholder="Drop Location">
                        </div>
                        <div class="col-4">
                            <label for="">Drop Date: </label>
                            <input type="date" name="drop_date" class="w-100 mx-1" >
                        </div>
                        <div class="col-4">
                            <label for="">Drop Time: </label>
                            <input type="time" name="drop_time" class="w-100 me-1" >
                        </div>
                    </div>
                    
                </div>
                <div class="card-footer text-center ">
                    <button class="btn btn-primary" type="submit">Submit</button>
                </div>
            </form>

        </div>
    </div>
</div> -->
<div class="header-slides-main owl-carousel  owl-carousel-main-header owl-theme owl-loaded">
    
    <div class="single-header-slide bg-img" style="background-image: url(./image/bg-rentcar.png);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="hero-slides-content">
                        <h2 data-aos="fade-up" style="text-align: center;"  data-aos-offset="200" data-aos-delay="50" data-aos-duration="1000" data-aos-easing="ease-in-out" data-aos-mirror="true" data-aos-once="false" style="text-center" >
                            Find your perfect rental car today!
                        </h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- <div class="single-header-slide bg-img" style="background-image: url(./image/reach-now.jpeg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="hero-slides-content">
                        <h2 data-aos="fade-up"  data-aos-offset="200" data-aos-delay="50" data-aos-duration="1000" data-aos-easing="ease-in-out" data-aos-mirror="true" data-aos-once="true" >
                            Find your dream car
                        </h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="single-header-slide bg-img" style="background-image: url(./image/condominium.jpeg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="hero-slides-content">
                        <h2 data-aos="fade-up"  data-aos-anchor=".other-element">
                            Find your dream car
                        </h2>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
</div>

<script>
$(document).ready(function() {
    var owl = $('.owl-carousel-main-header');
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