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

        .SingleProductsIcons img {
            width: 50px;
            height: 50px;
        }

        .SingleProductsIcons .flex{
            justify-content: space-between !important;
            width: fit-content;
        }

        .SingleProductsIcons div{
            display: flex;
            align-items: center;
            flex-direction: column;
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
            <a class="hover:underline" href="{{route('home_brands_controller')}}">
                Kontrol Kartları
            </a>
        </nav>
        <div class="flex flex-wrap">
            <div class="w-full lg:w-3/3">
                <div class="row">
                    <div class="col-12 col-lg-8">
                        <h1 class="text-4xl font-bold mb-2">
                            Kontrol Kartları
                        </h1>
                        <h2 class="text-xl font-semibold mb-4">
                            Dinamik Taşıma Sistemleri için Kompakt ve Akıllı Kontrol Kartları
                        </h2>

                        <ul class="mb-4">
                            <li>▪ Hız, yön ayarı</li>
                            <li>▪ Hata sinyali</li>
                            <li>▪ ZPA mantığı (sıfır basınç birikimi)</li>
                            <li>▪ 2 MDR’yi, 2 sensörü kontrol eder</li>
                            <li>▪ Programlanabilir kontrol mantığı</li>
                            <li>▪ Ağ bağlantılı iletişim</li>
                            <li>▪ Ayrı güç kaynakları motor/kontrol</li>
                            <li>▪ Uzaktan kumanda ve teşhis</li>

                        </ul>

                    </div>
                    <div class="col-12 col-lg-4" style=" display: flex;align-items: center;justify-content: center;">
                        <img alt="Image of PM500VE motor driven roller with external controller"
                             class="w-full md:w-2/3 lg:w-full"
                             src="{{asset('assets')}}/img/controller_img.jpg" style="    object-fit: cover;
    height: 100%;
    width: 100%;"/>
                    </div>
                </div>
                <div class="flex flex-wrap justify-center md:justify-start space-x-4">
                    <a href="{{route('home_contactus')}}"
                       class="bg-yellow-500 text-white font-bold py-2 px-4 rounded-full hover:bg-yellow-600">
                        Detaylı Bilgi İçin İletişime Gecin
                    </a>

                </div>
            </div>
        </div>

        <div class="">
            <div class="max-w-7xl mx-auto py-16 px-4 sm:px-6 lg:px-8">
                <div
                    class="SingleProductsIcons grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8 text-center">
                    <div >
                        <img alt="Lego block icon" class="mx-auto mb-4"
                             src="https://www.itoh-denki.com/wp-content/uploads/2021/04/png_advantages-lego2x-80x80.png"/>
                        <h3 class="text-lg font-semibold">
                            Esnek ve Modüler
                        </h3>
                        <ul class="mt-2 text-gray-500">
                            <li class="flex items-center justify-center">
       <span class="text-yellow-500 mr-2">
        ▶
       </span>
                                Konveyör hatlarınıza kolay entegrasyon
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
                        <img alt="Dollar sign icon" class="mx-auto mb-4"
                             src="https://www.itoh-denki.com/wp-content/uploads/2021/04/png_advantages-money2x-80x80.png"/>
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
                                Kolay bakım
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
                        <img alt="Shield icon" class="mx-auto mb-4"
                             src="https://www.itoh-denki.com/wp-content/uploads/2021/04/icon_1-80x80.png"/>
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
                        <img alt="Light bulb icon" class="mx-auto mb-4"
                             src="https://www.itoh-denki.com/wp-content/uploads/2021/04/icon_2-80x80.png"/>
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
                        <img alt="Leaf icon" class="mx-auto mb-4"
                             src="https://www.itoh-denki.com/wp-content/uploads/2021/04/png_advantages-leaf2x-80x80.png"/>
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
        <div class="container mb-5">
            <div style="display: flex;
    flex-direction: column;
    align-items: center; margin-bottom: 20px">
                <h3 style="    text-align: center;
    font-size: 25px; margin-bottom:10px; padding-bottom: 10px">KONTROL KARTLARIMIZ</h3>
                <span
                    style="border-radius: 15px; text-align: center; width: 7%; opacity: 1;border-bottom: 7px solid #edc905;"> </span>
            </div>


            <div class="row" style="display: flex;justify-content: center">
                @php
                    $productList = \App\Models\Products::where('type_id','2')->get();
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
