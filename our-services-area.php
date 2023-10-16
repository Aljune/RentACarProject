<div class="container h-100">
    <div class="row">
        <div class="col-12">
            <div class="section-heading wow fadeInUp">
                <h2>Our Latest News</h2>
            </div>
        </div>
    </div>
    <div class="owl-carousel owl-carousel-our-services-slider owl-theme owl-loaded">
        <?php
           
           $selectposts = mysqli_query($conn, "SELECT * FROM tbl_post  WHERE status = 1 ORDER BY id");

           while ($postItem = mysqli_fetch_assoc($selectposts)) { ?>
            <div class="card shadow p-3 mb-5 bg-body rounded " data-aos="fade-up" data-aos-offset="200" data-aos-delay="50" data-aos-duration="1000" data-aos-easing="ease-in-out" data-aos-mirror="true" data-aos-once="false" style="height: 250px;">
                <div class="card-body d-flex flex-column justify-content-center">
                    <h5 class="card-title text-center">
                        <?php echo $postItem['title'] ?>
                    </h5>
                    <hr />
                    <div class="card-text">
                        <?php echo $postItem['description'] ?>
                    </div>
                </div>
            </div>
           <?php
            }
            ?>


    </div>
    
</div>

<script>
$(document).ready(function() {
    var owl = $('.owl-carousel-our-services-slider');
    owl.owlCarousel({
        items: 4,
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