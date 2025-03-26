@extends('layouts.homeLayout')

@section('style')
    <style>
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
    </style>
@endsection

@section('content')
    <div class="content">

        <div id="herosection" class="free-quote">
            <div class="container">
                <div class="row" style="align-items: center;">
                    <!--
                    <div class="col-lg-1 "></div>

                    <div class="col-lg-3">
                        <div class="blog-main_img">
                            <img src="{{\Illuminate\Support\Facades\Storage::url($brand->logo)}}" alt="">
                        </div>
                    </div>
-->
                    <div class="col-lg-9" style="text-align: left; ">
                        <div class="section-heading  wow fadeIn" data-wow-duration="1s" data-wow-delay="0.3s">
                            <!--<h6>Get Your Free Quote</h6> -->
                            <h4 style="font-size: 48px;">{{$brand->name}}</h4>
                            <h6 style="">{{$brand->description}}</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div id="content" style="display: flex">
            <div class="container mt-10" style="display: inline-block">
                <iframe id="myIframe" style="width: 100%;" src="{{route('home_ckeditor',['type' => 'brand','id' => $brand->id])}}" title="{{$brand->name}}"
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
                    @for($i=0; $i<100; $i++)
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

    </div>

@endsection

@section('script')

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
    </script>
@endsection
