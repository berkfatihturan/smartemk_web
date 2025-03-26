@extends('layouts.homeLayout')

@section('style')

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <script
        src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script
        src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <script
        src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <style>

        .our_partners{
            width: 100vw;
            height: 92vh;
        }

        .our_partners .mainSlider{
            height: 100% !important;
        }

        .our_partners .swiper-slide{
            display: flex;
            align-items: center;
            justify-content: center
        }

        .swiper-slide-container{
            width: 85%;
            height: 80%;
            display: inline-block;

        }

        .slider-box{
            height: 90%;
            width: 100%;
            border-radius: 15px;
            padding: 50px 0 100px 50px;
        }

        .btn-more_white{
            border-radius: 5px;
            padding: 5px;
            width: fit-content;
            padding: 5px 10px;
            cursor: pointer;
        }

        .btn-itohdenki{
            background-color: #FFD700;
            color: black;
        }

        .slider-bottom{
            position: absolute;
            width: 100%;
            bottom: 115px;
            z-index: 99;

        }
        .partner-list{

            margin-left: max(30px,10%);
            display: flex;

        }

        .partner-list .partner{
            background-color: #791921;
            width: 70px;
            height: 70px;
            border-radius: 5px;
            margin-right: 15px;
            padding: 5px;
            cursor: pointer;
        }

        .partner:hover{
            opacity: .8;
        }

        .partner-list .partner span{
            width: 100%;
            height: 100%;
            display: inline-block;
            background-size: contain !important;
        }

        .reveres_seciton{
            padding-block: 50px;
            width: 100vw;

            position: relative;
            display: flex;
            flex-direction: column;
            gap: 50px;
            overflow: hidden;
        }

        .reveres_text{
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 10px;
            min-width: 500px;
            width: 60%;
            text-align: center;
        }

        .reveres_text h4{
            font-size: 38px;
            font-weight: 900;

        }

        .reveres_text p{
            font-size: 18px;
            color: #737373;
        }

        .reveres_text a{
            border: 5px solid #7e1b21;
            border-radius: 30px;
            padding: 5px 10px;
            color: #7e1b21;
        }

        .reveres_logos{
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
        }

        .reveres_logos .logo{
            background-size: contain !important;
            display:inline-block;
            width: 200px;
            height: 200px;
            border-radius: 10px;
            box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
        }

        .text-container{
            width: 100%;
            display: flex;
            justify-content: center
        }

        .background-box{
            position: absolute;
            width: 40vw;
            height: 60vh;
            background-color: #7e1b21;
            z-index: -99;
        }

        .mainSlider_bottom{
            position: relative;
            bottom: 150px;
            z-index: 99;
        }

        .mainSlider_bottom .box{
            height: 400px;
            box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;
        }

        .mainSlider_bottom .box_left{
            background-color: #fc000c;
            color: white;
            padding: 30px;
            position: relative;

        }

        .mainSlider_bottom .box_left h3{
            font-weight: 900;
            font-size: 32px;
            line-height: 36px;
            text-align: left;
        }

        .mainSlider_bottom .box_left p{
            font-size: 18px;
            line-height: 24px;
            text-align: left;
            margin-block: 30px;
            z-index: 99;

        }

        .mainSlider_bottom .box_left svg{
            position: absolute;
            right: 10px;
            width: 130px;
            bottom: 10px;
            opacity: .3;
            fill: #525558;
        }

        .mainSlider_bottom .box_right{
            background-color: white;
        }

        .btn_white_cornered{
            background: white;
            padding: 12px 40px;
            color: black;
            box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;
        }
        .header-slider_title{
            font-size: 27px;
            margin-bottom: 10px;
        }

        .header-slider_text{
            font-size: 18px;
        }

        .partner_slider_content{
            height: 90%; width:55%; display:flex; flex-direction: column; justify-content: flex-end;
        }

        .sliderWithText_title{

        }

        .sliderWithText_title h4{
            font-size: 32px;
        }

        .sliderWithText_title span{
            font-size: 22px;
        }

        @media only screen and (max-width: 600px) {

            .header-slider_text{
                display: none;
            }

            .partner_slider_content{
                width: 92%;
            }

            .reveres_logos{
                padding: 10px;
            }

            .reveres_text{
                min-width: 0px;
                width: 99%;
            }

            .reveres_text h4{
                font-size: 28px;
            }

            .reveres_logos .logo{
                width: 30vw;
                height: 30vw;
            }


        }


    </style>
@endsection

@section('content')


    <!-- main-banner START -->
    @include('home.components.mainBanner')
    <!-- main-banner END -->

    <!-- ABOUTUS START -->
    @include('home.components.about')
    <!-- ABOUTUS END -->

    <!-- Services START -->
    @include('home.components.services')
    <!-- Services END -->

    <!-- quote START -->

    <!-- quote END -->

    @include('home.components.partner')

    <!-- portfolio START -->
    @include('home.components.portfolio')
    <!-- portfolio END -->

    <!-- blog START -->
    @include('home.components.blog')
    <!-- blog END -->

    <!-- contact START -->
    @include('home.components.contact')
    <!-- contact END -->

@endsection

@section('script')
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
            spaceBetween: 10,
            loop: true, // Döngü modunu etkinleştirir
            loopFillGroupWithBlank: true, // Boş alanları doldur
            autoplay: {
                delay: 250000,
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
            var mySwiper = new Swiper("#partnerSlider", {
                autoplay: {
                    delay: 5000000000,
                    disableOnInteraction: false,
                },
                pagination: {
                    el: ".swiper-pagination",
                    clickable: true,
                },
            });


            // Partner öğelerine tıklanınca ilgili slayda git
            document.querySelectorAll('.partner').forEach(partner => {
                partner.addEventListener('click', function() {
                    const slideIndex = parseInt(this.getAttribute('data-slide-index')); // Sayıya çevir
                    if (!isNaN(slideIndex) && mySwiper) {
                        mySwiper.slideTo(slideIndex, 1000);
                    }
                });
            });




        });

    </script>

    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <script
        src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
        crossorigin="anonymous"></script>
    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
        crossorigin="anonymous"></script>
@endsection
