@extends('layouts.homeLayout2')

@section('style')
    <script src="https://cdn.tailwindcss.com">
    </script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <style>
        body {
            background: white;
        }

        .SingleProductsIcons img {
            width: 50px;
            height: 50px;
        }


    </style>
@endsection

@section('content')

    <div class="container mx-auto p-4" style="margin-top: 10vh">
        <nav class="text-sm text-gray-500 mb-4" style="">
            <a class="hover:underline" href="{{route('home_brands_index',['id' => 1])}}">
                Ürünler
            </a>
            •
            <a class="hover:underline" href="{{route('home_brands_sorters')}}">
                Transfer Üniteleri
            </a>
        </nav>
        <div class="flex flex-wrap">
            <div class="w-full lg:w-3/3">
                <div class="row">
                    <div class="col-12 col-lg-8">
                        <h1 class="text-4xl font-bold mb-2">
                            Transfer Üniteleri
                        </h1>
                        <h2 class="text-xl font-semibold mb-4">
                            Kusursuz ve Hizli Sorter Sistemleri için Yüksek Performansli Modül
                        </h2>
                        <p class="mb-4" style="color: black; text-align: justify; font-weight: 500  ">
                            Itoh Denki transfer modülleri serisi, konveyör hatlarınızda sınıflandırma ve yönlendirme
                            için esnek ve uygun maliyetli çözümler sunar. Özel olarak 24V DC motorlu tahrik makaraları
                            (MDR) ve akıllı sürücülerle desteklenen yön değiştiricilerimiz, minimum enerji tüketimiyle
                            maksimum performans sağlar. Kompakt kaset tasarımı sayesinde yeni veya mevcut konveyör
                            hattınıza kolay entegrasyon imkânı sunar. Çeşitli ürünleri sorunsuz ve hızlı bir şekilde
                            yönlendirme kapasitesiyle, birçok uygulama ve sektörde (dağıtım merkezleri, paket ve posta,
                            imalat vb.) kullanılabilir.
                        </p>
                    </div>
                    <div class="col-12 col-lg-4" style=" display: flex;align-items: center;justify-content: center;">
                        <img alt="Image of PM500VE motor driven roller with external controller"
                             class="product_img w-full md:w-2/3 lg:w-full"
                             src="{{asset('assets')}}/img/mabs-frat.png"/>
                    </div>
                </div>
                <div class="flex flex-wrap justify-center md:justify-start space-x-4">
                    <a href="{{route('home_contactus')}}"
                       class="bg-yellow-500 text-white font-bold py-2 px-4 rounded-full hover:bg-yellow-600">
                        Detaylı Bilgi İçin İletişime Gecin
                    </a>
                    <!--
                    <button
                        class="bg-gray-900 text-white font-bold py-2 px-4 rounded-full hover:bg-gray-800 flex items-center">
                        <i class="fas fa-file-alt mr-2">
                        </i>
                        Technical doc.
                    </button>
                    <button
                        class="bg-gray-900 text-white font-bold py-2 px-4 rounded-full hover:bg-gray-800 flex items-center">
                        <i class="fas fa-download mr-2">
                        </i>
                        Drawings
                    </button>
                    -->
                </div>
                <!--
                <hr class="my-6"/>
                <div class="flex flex-wrap items-center mb-6">
                    <div class="w-full md:w-1/3 text-center mb-4 md:mb-0">
                        <i class="fas fa-circle text-2xl text-gray-500">
                        </i>
                        <p class="text-lg font-bold mt-2">
                            Diameter
                        </p>
                        <p class="text-2xl font-bold">
                            50mm
                        </p>
                    </div>
                    <div class="w-full md:w-1/3 text-center mb-4 md:mb-0">
                        <i class="fas fa-weight-hanging text-2xl text-gray-500">
                        </i>
                        <p class="text-lg font-bold mt-2">
                            Recommended for
                        </p>
                        <p class="text-2xl font-bold">
                            Light to medium loads
                        </p>
                    </div>
                    <div class="w-full md:w-1/3 text-center">
                        <i class="fas fa-shield-alt text-2xl text-gray-500">
                        </i>
                        <p class="text-lg font-bold mt-2">
                            Available versions
                        </p>
                        <p class="text-2xl font-bold">
                            IP54 . IP65
                        </p>
                    </div>
                </div>
                -->
            </div>
        </div>


        <div>
            <div class="container mx-auto py-8" style="margin-top: 50px">
                <div
                    class="SingleProductsIcons grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8 text-center">
                    <div>
                        <img alt="24V lightning bolt icon" class="mx-auto mb-4"
                             src="https://www.itoh-denki.com/wp-content/uploads/2021/07/Plan-de-travail-7-80x80.png"/>
                        <p class="text-lg font-semibold text-gray-900">
                            24Vdc Güç ile Çalışır - Pnömatik yok
                        </p>
                    </div>
                    <div>
                        <img alt="Pencil and ruler icon" class="mx-auto mb-4"
                             src="https://www.itoh-denki.com/wp-content/uploads/2021/07/picto-9-80x80-80x80.png"/>
                        <p class="text-lg font-semibold text-gray-900">
                            Kompakt tasarım
                        </p>
                    </div>
                    <div>
                        <img alt="Smooth lateral transfers icon" class="mx-auto mb-4"
                             src="https://www.itoh-denki.com/wp-content/uploads/2021/07/Efficient-flawless-transport-80x80.png"/>
                        <p class="text-lg font-semibold text-gray-900">
                            Kusursuz Transfer
                        </p>
                    </div>
                    <div>
                        <img alt="Wrench and gear icon" class="mx-auto mb-4"
                             src="https://www.itoh-denki.com/wp-content/uploads/2021/04/picto.11-80x80.png"/>
                        <p class="text-lg font-semibold text-gray-900">
                            Kolay kurulum &amp;
                            Bakim
                        </p>
                    </div>
                    <div>
                        <img alt="Safety helmet and shield icon" class="mx-auto mb-4"
                             src="https://www.itoh-denki.com/wp-content/uploads/2021/07/picto-10-80x80-80x80.png"/>
                        <p class="text-lg font-semibold text-gray-900">
                            İş Güvenliğine Uygun: Yaralanma Riski Yoktur
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div style="width: 100%">
        <div class="container mb-5">
            <div style="display: flex;
    flex-direction: column;
    align-items: center; margin-bottom: 20px">
                <h3 style="    text-align: center;
    font-size: 25px; margin-bottom:10px; padding-bottom: 10px">TRANSFER MODÜLLERİMİZ</h3>
                <span
                    style="border-radius: 15px; text-align: center; width: 7%; opacity: 1;border-bottom: 7px solid #edc905;"> </span>
            </div>


            <div class="row" style="display: flex;justify-content: center">
                @php
                    $productList = \App\Models\Products::where('type_id','3')->get();
                @endphp
                @foreach($productList as $product)
                    <div class="col-lg-3 col-md-4 col-sm-4 col-12">
                        <div class="item">
                            <a href="{{route('home_products_show',['id'=>$product->id])}}">
                                <div class="portfolio-item">
                                    <div class="thumb">
                                        <img src="{{\Illuminate\Support\Facades\Storage::url($product->image)}}" alt="">
                                    </div>
                                    <div class="down-content">
                                        <h4>{{$product->name}}</h4>
                                        <span>@if($product->type_id == 1)
                                                MDR
                                            @elseif($product->type_id == 2)
                                                Kontrol Kartı
                                            @elseif($product->type_id == 3)
                                                Transfer Modülü
                                            @endif</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection
