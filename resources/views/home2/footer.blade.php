<footer style="margin-top: 0">
    <div class="pre-header" style="background: rgba(0, 0, 0, 1) url({{asset('assets')}}/images/footer-bg-v2.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-sm-8 col-7"style="display: flex; align-items: center;">
                    <ul class="info">
                        <li><a href="#"><i class="fa fa-envelope"></i>{{$settingDataFromLayout->email}}</a></li>
                        <li><a href="#"><i class="fa fa-phone"></i>{{$settingDataFromLayout->phone}}</a></li>
                    </ul>
                </div>
                <div class="col-lg-4 col-sm-4 col-5">
                    <ul class="social-media">
                        <li><a href="{{$settingDataFromLayout->facebook_url}}" target="_blank"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="{{$settingDataFromLayout->twitter_url}}" target="_blank"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="{{$settingDataFromLayout->youtube_url}}" target="_blank"><i class="fa fa-youtube"></i></a></li>
                        <li><a href="{{$settingDataFromLayout->linkedin_url}}" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

</footer>

<!-- Scripts -->
@yield('script')

<script>
    // Tüm .product-box öğelerini hedef al
    document.querySelectorAll('.product-box').forEach(box => {
        const video = box.querySelector('.backvideo');
        const backgroundContainer = box.querySelector('.background-box');
        box.addEventListener('mouseenter', () => {
            video.play();
            backgroundContainer.style.background = "linear-gradient(180deg, rgba(0,0,0,0.19793855042016806) 0%, rgba(0,0,0,0.0970982142857143) 49%, rgba(0,0,0,0.20354079131652658) 100%)"
        });
        box.addEventListener('mouseleave', () => {
            video.pause();
            backgroundContainer.style.background = "linear-gradient(180deg, rgba(0,0,0,0.3996192226890757) 0%, rgba(0,0,0,0.20073967086834732) 49%, rgba(0,0,0,0.40242034313725494) 100%)"

        });
    });
</script>

<script
    src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<!-- Swiper S2-->
<script>
    var swiper = new Swiper(".swiper_2", {
        slidesPerView: 1,
        spaceBetween: 30,
        loop: true,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
    });
</script>

<!-- Swiper S3 -->
<script>
    var swiper = new Swiper(".swiper_3", {
        slidesPerView: 7,
        spaceBetween: 5,
        loop: true, // Döngü modunu etkinleştirir
        loopFillGroupWithBlank: true, // Boş alanları doldur
        autoplay: {
            delay: 1000,
            disableOnInteraction: false,
        },
        pagination: {
            el: ".swiper-pagination",
            clickable: true,

        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },


    });
</script>

<!-- Initialize Swiper -->
<script type="module">
    import Swiper from 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.mjs'

    document.addEventListener("DOMContentLoaded", function () {
        // Swiper Başlat
        var mySwiper = new Swiper(".mainSlider", {
            autoplay: {
                delay: 5000000000,
                disableOnInteraction: false,
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
        });


        document.querySelectorAll('.partner').forEach(partner => {
            partner.addEventListener('click', function () {
                const slideIndex = this.getAttribute('data-slide-index');
                mySwiper[mySwiper.length - 1].slideTo(slideIndex, 1000);
            });
        });

    });

</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
<!--
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
-->


