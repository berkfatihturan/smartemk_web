@extends('layouts.homeLayout2')

@section('style')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    @if($brand->id == 4)

        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    @endif
    <style>
        @if($brand->id != 4)
            body {
            background: white;
        }

        @endif

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

        .SingleProductsIcons img {
            width: 50px;
            height: 50px;
        }

        footer {
            margin-top: 50px !important;
        }


    </style>

@endsection


@section('content')

    @if($brand->id != 4)
        <div id="herosection" class="free-quote" style="margin-top: 55px !important; padding-bottom: 55px">
            <div class="container">
                <div class="row" style="align-items: center;">

                    <div class="col-lg-1"></div>
                    <!--
                    <div class="col-lg-2">
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
    @endif

    @if($brand->id == 1)
        <!--
    <div style="width: 100%;display: flex; align-items: center;flex-direction: column;  margin-top: 50px">
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
-->
        <div class="productSection container mt-5">
            <div class="row product-row">
                <div class="col-12 col-lg-4">
                    <div class="product-box">
                        <video autoplay muted paused loop class="backvideo">
                            <source src="{{asset('assets')}}/video/sort_clear.mp4" type="video/mp4">
                        </video>
                        <div class="background-box">
                        </div>

                        <div class="content">
                            <div class="title">
                                <rt>TRANSFER</rt>
                                MODÜLLERİ
                            </div>
                            <div class="keys">ÇOK YÖNLÜ, PÜRÜZSÜZ TRANSFER
                            </div>
                        </div>

                        <div class="btn-detail">
                            <a href="{{route('home_brands_sorters')}}" class="btn-more btn-more_white btn-itohdenki ">Daha
                                Fazla Bilgi
                            </a>
                        </div>

                    </div>
                </div>
                <div class="col-12 col-lg-4">
                    <div class="product-box">
                        <video autoplay muted paused loop class="backvideo" style="object-position: bottom;">
                            <source src="{{asset('assets')}}/video/mdr_short.mp4" type="video/mp4">
                        </video>
                        <div class="background-box">
                        </div>

                        <div class="content">
                            <div class="title">
                                <rt>KONTROL</rt>
                                KARTLARI
                            </div>
                            <div class="keys">AKILLI KONTROL ve KOLAY ENTEGRASYON
                            </div>
                        </div>

                        <div class="btn-detail">
                            <a href="{{route('home_brands_controller')}}"
                               class="btn-more btn-more_white btn-itohdenki ">Daha
                                Fazla Bilgi
                            </a>
                        </div>

                    </div>
                </div>
                <div class="col-12 col-lg-4">
                    <div class="product-box">
                        <video autoplay muted paused loop class="backvideo" style="object-position: bottom left;">
                            <source src="{{asset('assets')}}/video/itohsortting.mp4" type="video/mp4">
                        </video>
                        <div class="background-box">
                        </div>

                        <div class="content">
                            <div class="title">RULOLU
                                <rt>MOTORLAR</rt>
                            </div>
                            <div class="keys">
                                <rt>24VDC</rt>
                                ile
                                <rt>1000</rt>
                                kg’a KADAR TAŞIMA KAPASİTESİ
                            </div>
                        </div>

                        <div class="btn-detail">
                            <a href="{{route('home_brands_mdr')}}" class="btn-more btn-more_white btn-itohdenki ">Daha
                                Fazla Bilgi
                            </a>
                        </div>

                    </div>
                </div>
            </div>


        </div>

    @endif

    @if($brand->id == 4)

        <script src="https://cdn.tailwindcss.com">
        </script>

        <div style="margin-top: 55px; display: inline-block">
            <img style="width: 100%" src="{{asset('assets')}}/img/tm.png">
        </div>
        <div style="background: #1b202b; width: 100%;position: relative;top: -6px; border-top: 3px solid black">
            <div class="container mx-auto py-12 px-4">
                <h1 class="text-3xl font-bold text-center mb-4" style="color: white">
                    AI Destekli Robotlarımız
                </h1>
                <p class="text-center mb-12" style="color: white">
                    AI (yapay zeka) Cobot, görüntü işleme ve cobot teknolojilerini kusursuz bir şekilde bir araya
                    getiren işbirlikçi robotlardır. Bu entegrasyon,
                    'beyin' , 'el' ve 'kol' işlevlerini etkili bir şekilde
                    birleştirerek cobot'un görsel görevleri yerine getirmesine ve tıpkı bir insan gibi eylemler
                    gerçekleştirmesine olanak tanır. Süreçlerin otomasyonlaştırılması yalnızca kaynak ve zaman
                    tasarrufu sağlamakla kalmaz, aynı zamanda insan-robot iş birliğini teşvik ederek genel üretim
                    verimliliğini artırır.
                </p>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                    @php  $productList = \App\Models\Products::where('brand_id',4)->get(); @endphp
                    @foreach($productList as $product)
                        <a href="{{route('home_products_show',['id' => $product->id])}}"
                           class="bg-gray-800 p-4 rounded-lg text-center">
                            <img alt="TM5S robot arm" class="mx-auto mb-4" height="200"
                                 src="{{\Illuminate\Support\Facades\Storage::url($product->image)}}"
                                 width="200"/>
                            <h2 class="text-2xl font-bold text-green-500">
                                {{$product->name}}
                            </h2>
                            <p>
                                {{$product->keywords}}
                            </p>
                        </a>
                    @endforeach

                </div>
            </div>
            <div class="fixed bottom-4 right-4">
                <button class="bg-green-500 text-white p-3 rounded-full shadow-lg">
                    <i class="fas fa-comments">
                    </i>
                </button>
            </div>
        </div>
    @endif

@endsection
