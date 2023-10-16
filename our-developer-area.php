<div class="container h-100">
    <div class="row">
        <div class="col-12">
            <div class="section-heading wow fadeInUp">
                <h2>Our Developers</h2>
                <p>Suspendisse dictum enim sit amet libero malesuada feugiat.</p>
            </div>
        </div>
    </div>
    <div class="owl-carousel owl-carousel-image-developer-slider owl-theme owl-loaded">
        <div class="developer-image-item">
            <div class=" d-flex flex-column align-items-center align-content-center">
                <div class="col-12 text-center my-3">
                    <span>Logo Here</span>
                </div>
                <div class="col-12 text-center my-3">
                    <span>Logo Here</span>
                </div>
            </div>
        </div>
        <div class="developer-image-item">
            <div class=" d-flex flex-column align-items-center align-content-center">
                <div class="col-12 text-center my-3">
                    <span>Logo Here</span>
                </div>
                <div class="col-12 text-center my-3">
                    <span>Logo Here</span>
                </div>
            </div>
        </div>
        <div class="developer-image-item">
            <div class=" d-flex flex-column align-items-center align-content-center">
                <div class="col-12 text-center my-3">
                    <span>Logo Here</span>
                </div>
                <div class="col-12 text-center my-3">
                    <span>Logo Here</span>
                </div>
            </div>
        </div>
        <div class="developer-image-item">
            <div class=" d-flex flex-column align-items-center align-content-center">
                <div class="col-12 text-center my-3">
                    <span>Logo Here</span>
                </div>
                <div class="col-12 text-center my-3">
                    <span>Logo Here</span>
                </div>
            </div>
        </div>
        <div class="developer-image-item">
            <div class=" d-flex flex-column align-items-center align-content-center">
                <div class="col-12 text-center my-3">
                    <span>Logo Here</span>
                </div>
                <div class="col-12 text-center my-3">
                    <span>Logo Here</span>
                </div>
            </div>
        </div>
        <div class="developer-image-item">
            <div class=" d-flex flex-column align-items-center align-content-center">
                <div class="col-12 text-center my-3">
                    <span>Logo Here</span>
                </div>
                <div class="col-12 text-center my-3">
                    <span>Logo Here</span>
                </div>
            </div>
        </div>
        <div class="developer-image-item">
            <div class=" d-flex flex-column align-items-center align-content-center">
                <div class="col-12 text-center my-3">
                    <span>Logo Here</span>
                </div>
                <div class="col-12 text-center my-3">
                    <span>Logo Here</span>
                </div>
            </div>
        </div>
        <div class="developer-image-item">
            <div class=" d-flex flex-column align-items-center align-content-center">
                <div class="col-12 text-center my-3">
                    <span>Logo Here ww</span>
                </div>
                <div class="col-12 text-center my-3">
                    <span>Logo Here</span>
                </div>
            </div>
        </div>

    </div>
</div>

<script>
$(document).ready(function() {
    var owl = $('.owl-carousel-image-developer-slider');
    owl.owlCarousel({
        items: 4,
        loop: true,
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