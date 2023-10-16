<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tbl_rent_a_car_system";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

?>

<div class="container h-100 my-5">
    <div class="row">
        <div class="col-12">
            <div class="section-heading wow fadeInUp">
                <h2>We have one of the newest fleets</h2>
                <p>These are some of our most popular vehicle, view our diverse fleet below.</p>
            </div>
        </div>
    </div>

    
    <div class="owl-carousel owl-carousel-newest-car-items-slider owl-theme owl-loaded">
    <?php
        $selectcars = mysqli_query($conn, "SELECT * FROM cars WHERE status = 'AVAILABLE' ORDER BY created_at DESC");
        while ($carItem = mysqli_fetch_assoc($selectcars)) {
    ?>
    <div class="card shadow p-3 mb-5 bg-body rounded " data-aos="fade-up" data-aos-offset="200" data-aos-delay="50" data-aos-duration="1000" data-aos-easing="ease-in-out" data-aos-mirror="true" data-aos-once="false" style="height: 450px;">
            <div class="card-body d-flex flex-column justify-content-center">
                <h5 class="card-title text-center text-uppercase fw-bolder">
                    <?php echo $carItem['type'] ?>
                </h5>
                <label for="car" class="text-center"> <?php echo $carItem['name'] ?> </label>
            
                <img src="./img/uploads/<?php echo $carItem['image'] ?>" class="mt-3" alt="" height="250" width="150">
                <!-- <div class="card-text">
                    Some quick example text to build on the card title and make up the bulk of the card's content.
                </div> -->
                <div class="d-flex my-3">
                    <div class="w-50 pe-2">
                        <a href="/rent-a-car/car-item.php?view=<?php echo $carItem['id'] ?>">
                            <button class="btn btn-warning w-100">
                                Check Availabilty
                            </button>
                        </a>
                    </div>
                    <div class="w-50 ps-2">
                        <a href="/rent-a-car/list-cars.php">
                            <button class="btn btn-primary w-100">
                                View All Vehicles
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    <?php
        }
    ?>
        <!-- <div class="card shadow p-3 mb-5 bg-body rounded " data-aos="fade-up" data-aos-offset="200" data-aos-delay="50" data-aos-duration="1000" data-aos-easing="ease-in-out" data-aos-mirror="true" data-aos-once="false" style="height: 250px;">
            <div class="card-body d-flex flex-column justify-content-center">
                <h5 class="card-title text-center">
                    Card Title
                </h5>
                <hr />
                <div class="card-text">
                    Some quick example text to build on the card title and make up the bulk of the card's content.
                </div>
            </div>
        </div>
        <div class="card shadow p-3 mb-5 bg-body rounded" data-aos="fade-up" data-aos-offset="200" data-aos-delay="60" data-aos-duration="1000" data-aos-easing="ease-in-out" data-aos-mirror="true" data-aos-once="false" style="height: 250px;">
            <div class="card-body d-flex flex-column justify-content-center">
                <h5 class="card-title text-center">
                    Card Title
                </h5>
                <hr />
                <div class="card-text">
                    Some quick example text to build on the card title and make up the bulk of the card's content.
                </div>
            </div>
        </div>

        <div class="card shadow p-3 mb-5 bg-body rounded" data-aos="fade-up" data-aos-offset="200" data-aos-delay="70" data-aos-duration="1000" data-aos-easing="ease-in-out" data-aos-mirror="true" data-aos-once="false" style="height: 250px;">
            <div class="card-body d-flex flex-column justify-content-center">
                <h5 class="card-title text-center">
                    Card Title
                </h5>
                <hr />
                <div class="card-text">
                    Some quick example text to build on the card title and make up the bulk of the card's content.
                </div>
            </div>
        </div>

        <div class="card shadow p-3 mb-5 bg-body rounded" data-aos="fade-up" data-aos-offset="200" data-aos-delay="80" data-aos-duration="1000" data-aos-easing="ease-in-out" data-aos-mirror="true" data-aos-once="false"  style="height: 250px;">
            <div class="card-body d-flex flex-column justify-content-center">
                <h5 class="card-title text-center">
                    Card Title
                </h5>
                <hr />
                <div class="card-text">
                    Some quick example text to build on the card title and make up the bulk of the card's content.
                </div>
            </div>
        </div>

        <div class="card shadow p-3 mb-5 bg-body rounded" data-aos="fade-up" data-aos-offset="200" data-aos-delay="50" data-aos-duration="1000" data-aos-easing="ease-in-out" data-aos-mirror="true" data-aos-once="false"  style="height: 250px;">
            <div class="card-body d-flex flex-column justify-content-center">
                <h5 class="card-title text-center">
                    Card Title
                </h5>
                <hr />
                <div class="card-text">
                    Some quick example text to build on the card title and make up the bulk of the card's content.
                </div>
            </div>
        </div>

        <div class="card shadow p-3 mb-5 bg-body rounded" data-aos="fade-up" data-aos-offset="200" data-aos-delay="50" data-aos-duration="1000" data-aos-easing="ease-in-out" data-aos-mirror="true" data-aos-once="false"  style="height: 250px;">
            <div class="card-body d-flex flex-column justify-content-center">
                <h5 class="card-title text-center">
                    Card Title
                </h5>
                <hr />
                <div class="card-text">
                    Some quick example text to build on the card title and make up the bulk of the card's content.
                </div>
            </div>
        </div> -->
    </div>
    
</div>

<script>
$(document).ready(function() {
    var owl = $('.owl-carousel-newest-car-items-slider');
    owl.owlCarousel({
        items: 3,
        loop: false,
        margin: 10,
        autoplay: true,
        autoplayTimeout: 5000,
        autoplayHoverPause: true,
        nav: false,
    });
    $('.play').on('click', function() {
        owl.trigger('play.owl.autoplay', [1000])
    })
    $('.stop').on('click', function() {
        owl.trigger('stop.owl.autoplay')
    })
});
</script>