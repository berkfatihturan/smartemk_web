@extends('layouts.homeLayout2')

@section('style')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>

    <style>

        body{
            background: white;
        }

        .free-quote {
            padding: 50px 0px;
            margin-top: 100px !important;
            background-image: linear-gradient(90deg, rgba(0, 0, 0, 0.6) 0%, rgba(0, 0, 0, 0.6) 50%, rgba(0, 0, 0, 0.6) 100%), url("{{\Illuminate\Support\Facades\Storage::url($brand->background_image)}}");
            box-shadow: rgba(0, 0, 0, 0.25) 0px 25px 50px -12px;
        }

        #content img {
            width: auto !important;
        }

        #herosection .section-heading {
            margin-bottom: 0 !important;
        }

        #content {
            margin-top: 50px;
        }

        .blog-main_img {
            position: relative;
            background-color: {{$brand->main_color}};
            box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;
        }

        .blog-main_img img {


        }

        .section-heading {
            padding-left: 15px
        }

        .section-heading h6 {
            text-transform: none;
            font-size: 16px;
            font-weight: 500;
            line-height: normal;
        }

        .swiper-slide-container {
            width: 100%;

        }

        .slider-box {
            border-radius: 0;
        }

        .collapse {
            visibility: visible;
        }

        .SingleProductsIcons img{
            width: 50px;
            height: 50px;
        }


    </style>
@endsection

@section('content')

    <div class="content">


        <div id="herosection" class="free-quote" style="margin-top: 55px !important; padding-bottom: 100px">
            <div class="container">
                <div class="row" style="align-items: center;">

                    <div class="col-lg-1 "></div>
                    <!--
                    <div class="col-lg-3">
                        <div class="blog-main_img">
                            <img src="{{\Illuminate\Support\Facades\Storage::url($brand->logo)}}" alt="">
                        </div>
                    </div>
                    -->
                    <div class="col-lg-9" style="text-align: left; ">
                        <div class="section-heading  wow fadeIn" data-wow-duration="1s" data-wow-delay="0.3s">
                            <!--<h6>Get Your Free Quote</h6> -->
                            <h4 style="font-size: 48px; margin-bottom: 5px">{{$brand->name}}</h4>
                            <h6 style="">{{$brand->description}}</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div style="width: 100%;display: flex; align-items: center;flex-direction: column;  z-index: 99;
    position: relative; top:-65px; ">
            <div id="sliderContent1" style="width: 100%">
                <div class="slide" style="display: block;">
                    @include('home2.brands.productSlider_mabs')
                </div>
                <div class="slide" style="display: none;">
                    @include('home2.brands.productSlider_frat')
                </div>
                <div class="slide" style="display: none;">
                    @include('home2.brands.productSlider_mdr')
                </div>
            </div>

            <br>
            <div>
                <button onclick="prevSlide()"> <</button>
                <button onclick="nextSlide()"> ></button>
            </div>
        </div>


        <div class="container mt-5 mb-5">
            <div style="display: flex;
    flex-direction: column;
    align-items: center; margin-bottom: 20px">
                <h3 style="    text-align: center;
    font-size: 25px; margin-bottom:10px; padding-bottom: 10px">Motorised Drive Rollers (MDR)</h3>
                <span
                    style="border-radius: 15px; text-align: center; width: 7%; opacity: 1;border-bottom: 7px solid #edc905;"> </span>
            </div>

            <div class="row" style="display: flex;justify-content: center">
                @for($i=0; $i<4; $i++)
                    <div class="col-lg-2 col-md-4 col-sm-4 col-12" >
                        <div class="item">
                            <a href="#">
                                <div class="portfolio-item">
                                    <div class="thumb">
                                        <img src="{{asset('assets')}}/images/portfolio-01.jpg" alt="">
                                    </div>
                                    <div class="down-content">
                                        <h4>Website Builder</h4>
                                        <span>Marketing</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                @endfor
            </div>

            <div class="">
                <div class="max-w-7xl mx-auto py-16 px-4 sm:px-6 lg:px-8">
                    <div class="SingleProductsIcons grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8 text-center">
                        <div>
                            <img alt="Lego block icon" class="mx-auto mb-4" src="https://www.itoh-denki.com/wp-content/uploads/2021/04/png_advantages-lego2x-80x80.png"/>
                            <h3 class="text-lg font-semibold">
                                Esnek ve Modüler
                            </h3>
                            <ul class="mt-2 text-gray-500">
                                <li class="flex items-center justify-center">
       <span class="text-yellow-500 mr-2">
        ▶
       </span>
                                    Konveyör içerisine kolay entegrasyon
                                </li>
                                <li class="flex items-center justify-center">
       <span class="text-yellow-500 mr-2">
        ▶
       </span>
                                    Özelleştirilmiş boyutlar
                                </li>
                            </ul>
                        </div>
                        <div>
                            <img alt="Dollar sign icon" class="mx-auto mb-4" src="https://www.itoh-denki.com/wp-content/uploads/2021/04/png_advantages-money2x-80x80.png"/>
                            <h3 class="text-lg font-semibold">
                                Ekonomik
                            </h3>
                            <ul class="mt-2 text-gray-500">
                                <li class="flex items-center justify-center">
       <span class="text-yellow-500 mr-2">
        ▶
       </span>
                                    Alan optimizasyonu
                                </li>
                                <li class="flex items-center justify-center">
       <span class="text-yellow-500 mr-2">
        ▶
       </span>
                                    Neredeyse bakım gerektirmez
                                </li>
                                <li class="flex items-center justify-center">
       <span class="text-yellow-500 mr-2">
        ▶
       </span>
                                    Uzatılmış ürün ömrü
                                </li>
                                <li class="flex items-center justify-center">
       <span class="text-yellow-500 mr-2">
        ▶
       </span>
                                    Düşük güç tüketimi
                                </li>
                            </ul>
                        </div>
                        <div>
                            <img alt="Shield icon" class="mx-auto mb-4" src="https://www.itoh-denki.com/wp-content/uploads/2021/04/icon_1-80x80.png"/>
                            <h3 class="text-lg font-semibold">
                                Güvenlik ve Konfor
                            </h3>
                            <ul class="mt-2 text-gray-500">
                                <li class="flex items-center justify-center">
       <span class="text-yellow-500 mr-2">
        ▶
       </span>
                                    Düşük voltaj
                                </li>
                                <li class="flex items-center justify-center">
       <span class="text-yellow-500 mr-2">
        ▶
       </span>
                                    El ile durdurulabilir
                                </li>
                                <li class="flex items-center justify-center">
       <span class="text-yellow-500 mr-2">
        ▶
       </span>
                                    Sessiz çalışma
                                </li>
                            </ul>
                        </div>
                        <div>
                            <img alt="Light bulb icon" class="mx-auto mb-4" src="https://www.itoh-denki.com/wp-content/uploads/2021/04/icon_2-80x80.png"/>
                            <h3 class="text-lg font-semibold">
                                Akıllı Fabrika
                            </h3>
                            <ul class="mt-2 text-gray-500">
                                <li class="flex items-center justify-center">
       <span class="text-yellow-500 mr-2">
        ▶
       </span>
                                    Integral Kontrol
                                </li>
                                <li class="flex items-center justify-center">
       <span class="text-yellow-500 mr-2">
        ▶
       </span>
                                    Ayarlanabilir hız, yön...
                                </li>
                                <li class="flex items-center justify-center">
       <span class="text-yellow-500 mr-2">
        ▶
       </span>
                                    Ağ İletişimi (IoT)
                                </li>
                                <li class="flex items-center justify-center">
       <span class="text-yellow-500 mr-2">
        ▶
       </span>
                                    Kestirimci Bakım
                                </li>
                            </ul>
                        </div>
                        <div>
                            <img alt="Leaf icon" class="mx-auto mb-4" src="https://www.itoh-denki.com/wp-content/uploads/2021/04/png_advantages-leaf2x-80x80.png"/>
                            <h3 class="text-lg font-semibold">
                                Çevre Dostu
                            </h3>
                            <ul class="mt-2 text-gray-500">
                                <li class="flex items-center justify-center">
       <span class="text-yellow-500 mr-2">
        ▶
       </span>
                                    Sınırlı enerji tüketimi
                                </li>
                                <li class="flex items-center justify-center">
       <span class="text-yellow-500 mr-2">
        ▶
       </span>
                                    Temiz ve geri dönüştürülebilir
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <div style="width: 100%">
        <div class="container mt-5 mb-5">
            <div style="display: flex;
    flex-direction: column;
    align-items: center; margin-bottom: 20px">
                <h3 style="    text-align: center;
    font-size: 25px; margin-bottom:10px; padding-bottom: 10px">Controllers</h3>
                <span
                    style="border-radius: 15px; text-align: center; width: 7%; opacity: 1;border-bottom: 7px solid #edc905;"> </span>
            </div>


            <div class="row" style="display: flex;justify-content: center">
                @for($i=0; $i<4; $i++)
                    <div class="col-lg-2 col-md-4 col-sm-4 col-12" >
                        <div class="item">
                            <a href="#">
                                <div class="portfolio-item">
                                    <div class="thumb">
                                        <img src="{{asset('assets')}}/images/portfolio-01.jpg" alt="">
                                    </div>
                                    <div class="down-content">
                                        <h4>Website Builder</h4>
                                        <span>Marketing</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                @endfor
            </div>
        </div>
    </div>

        <div class="container mt-5 mb-5">
            <div style="display: flex;
    flex-direction: column;
    align-items: center; margin-bottom: 20px">
                <h3 style="    text-align: center;
    font-size: 25px; margin-bottom:10px; padding-bottom: 10px">Diverters and sortation modules</h3>
                <span
                    style="border-radius: 15px; text-align: center; width: 7%; opacity: 1;border-bottom: 7px solid #edc905;"> </span>
            </div>




            <div class="row" style="display: flex;justify-content: center">
                @for($i=0; $i<4; $i++)
                    <div class="col-lg-2 col-md-4 col-sm-4 col-12" >
                        <div class="item">
                            <a href="#">
                                <div class="portfolio-item">
                                    <div class="thumb">
                                        <img src="{{asset('assets')}}/images/portfolio-01.jpg" alt="">
                                    </div>
                                    <div class="down-content">
                                        <h4>Website Builder</h4>
                                        <span>Diverters and sortation modules</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                @endfor
            </div>
            <div>
                <div class="container mx-auto py-8">
                    <div class="SingleProductsIcons grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8 text-center">
                        <div>
                            <img alt="24V lightning bolt icon" class="mx-auto mb-4" src="https://www.itoh-denki.com/wp-content/uploads/2021/07/Plan-de-travail-7-80x80.png"/>
                            <p class="text-lg font-semibold text-gray-900">
                                24Vdc Güç ile Çalışır - Pnömatik yok
                            </p>
                        </div>
                        <div>
                            <img alt="Pencil and ruler icon" class="mx-auto mb-4" src="https://www.itoh-denki.com/wp-content/uploads/2021/07/picto-9-80x80-80x80.png"/>
                            <p class="text-lg font-semibold text-gray-900">
                                Kompakt tasarım
                            </p>
                        </div>
                        <div>
                            <img alt="Smooth lateral transfers icon" class="mx-auto mb-4" src="https://www.itoh-denki.com/wp-content/uploads/2021/07/Efficient-flawless-transport-80x80.png"/>
                            <p class="text-lg font-semibold text-gray-900">
                                Kusursuz Transfer
                            </p>
                        </div>
                        <div>
                            <img alt="Wrench and gear icon" class="mx-auto mb-4" src="https://www.itoh-denki.com/wp-content/uploads/2021/04/picto.11-80x80.png"/>
                            <p class="text-lg font-semibold text-gray-900">
                                Kolay kurulum &amp;
                                Bakim
                            </p>
                        </div>
                        <div>
                            <img alt="Safety helmet and shield icon" class="mx-auto mb-4" src="https://www.itoh-denki.com/wp-content/uploads/2021/07/picto-10-80x80-80x80.png"/>
                            <p class="text-lg font-semibold text-gray-900">
                                İs Güvenligine Uygun:
                                Yaralanma Riski Yok
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--
        <div id="content" style="display: flex">
            <div class="container mt-10" style="display: inline-block">
                <iframe id="myIframe" style="width: 100%;"
                        src="{{route('home_ckeditor',['type' => 'brand','id' => $brand->id])}}" title="{{$brand->name}}"
                        frameborder="0"></iframe>
            </div>
        </div>


        <div class="contact-us section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 offset-lg-3">
                        <div class="section-heading wow fadeIn" data-wow-duration="1s" data-wow-delay="0.5s">
                            <h4>Ürünlerimiz <em></em></h4>
                            <div class="line-dec"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    @for($i=0; $i<10; $i++)
            <div class="col-lg-3">
                <div class="item">
                    <a href="#">
                        <div class="portfolio-item">
                            <div class="thumb">
                                <img src="{{asset('assets')}}/images/portfolio-01.jpg" alt="">
                                        </div>
                                        <div class="down-content">
                                            <h4>Website Builder</h4>
                                            <span>Marketing</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>

        @endfor
        </div>
    </div>
</div>
<div id="portfolio" class="our-portfolio section">
    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                <div class="section-heading wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.3s">
                    <h6>Our Portofolio</h6>
                    <h4>See Our Recent <em>Projects</em></h4>
                    <div class="line-dec"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid wow fadeIn" data-wow-duration="1s" data-wow-delay="0.7s">
        <div class="row">
            <div class="col-lg-12">
                <div class="loop owl-carousel">
                    <div class="item">
                        <a href="#">
                            <div class="portfolio-item">
                                <div class="thumb">
                                    <img src="{{asset('assets')}}/images/portfolio-01.jpg" alt="">
                                        </div>
                                        <div class="down-content">
                                            <h4>Website Builder</h4>
                                            <span>Marketing</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="item">
                                <a href="#">
                                    <div class="portfolio-item">
                                        <div class="thumb">
                                            <img src="{{asset('assets')}}/images/portfolio-01.jpg" alt="">
                                        </div>
                                        <div class="down-content">
                                            <h4>Website Builder</h4>
                                            <span>Marketing</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="item">
                                <a href="#">
                                    <div class="portfolio-item">
                                        <div class="thumb">
                                            <img src="{{asset('assets')}}/images/portfolio-02.jpg" alt="">
                                        </div>
                                        <div class="down-content">
                                            <h4>Website Builder</h4>
                                            <span>Marketing</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="item">
                                <a href="#">
                                    <div class="portfolio-item">
                                        <div class="thumb">
                                            <img src="{{asset('assets')}}/images/portfolio-03.jpg" alt="">
                                        </div>
                                        <div class="down-content">
                                            <h4>Website Builder</h4>
                                            <span>Marketing</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="item">
                                <a href="#">
                                    <div class="portfolio-item">
                                        <div class="thumb">
                                            <img src="{{asset('assets')}}/images/portfolio-04.jpg" alt="">
                                        </div>
                                        <div class="down-content">
                                            <h4>Website Builder</h4>
                                            <span>Marketing</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        -->
    </div>

@endsection

@section('script')

    <script>
        var slideIndex = 0;
        const slides = document.querySelectorAll(".slide");

        function showSlide(i) {
            slides.forEach((slide, idx) => {
                slide.style.display = idx === i ? "block" : "none";
            });
        }

        function nextSlide() {
            slideIndex = (slideIndex + 1) % slides.length;
            showSlide(slideIndex);
            console.log(slides)
        }

        function prevSlide() {
            slideIndex = (slideIndex - 1 + slides.length) % slides.length;
            showSlide(slideIndex);
            console.log(slides)
        }
    </script>

    <script>
        function sendWidthToChild() {
            let iframe = document.getElementById("myIframe");
            let iframeWidth = iframe.clientWidth; // iframe genişliği alınıyor

            // Eğer `iframe` yüklenmişse, child sayfaya genişliği gönder
            if (iframe.contentWindow) {
                iframe.contentWindow.postMessage({width: iframeWidth}, "*");
            }
        }

        function adjustIframeHeight(event) {
            if (event.data.height) {
                let iframe = document.getElementById("myIframe");
                iframe.style.height = event.data.height + "px"; // Child `.content` yüksekliğini uygula
            }
        }

        // Sayfa yüklendiğinde ve pencere boyutu değiştiğinde işlemi gerçekleştir
        window.addEventListener("load", sendWidthToChild);
        window.addEventListener("resize", sendWidthToChild);
        window.addEventListener("message", adjustIframeHeight); // Child sayfadan gelen yükseklik bilgisini al
    </script>

    <script>
        /*
        // Footer'ı yalnızca kaydırıldığında güncelle
        function adjustFooterOnScroll() {
            const footer = document.getElementById("footer");
            const pageHeight = document.documentElement.scrollHeight; // Sayfa yüksekliği
            const windowHeight = window.innerHeight; // Görünür ekran yüksekliği

            if (pageHeight <= windowHeight) {
                footer.style.position = "absolute";
                footer.style.bottom = "0";
            } else {
                footer.style.position = "relative";
            }
        }

        // Sayfa kaydırıldığında footer'ı güncelle
        window.onscroll = adjustFooterOnScroll;

        // İlk yükleme sırasında kontrol et
        window.onload = adjustFooterOnScroll;

        */
    </script>

    <script src="https://cdn.tailwindcss.com">
    </script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
@endsection
