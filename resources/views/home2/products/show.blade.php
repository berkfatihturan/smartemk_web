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

        .btn-info {
            background: {{\App\Models\Brands::where('id',$productData->brand_id)->first()->main_color}}





        }

        .btn-info:hover {
            background: {{\App\Models\Brands::where('id',$productData->brand_id)->first()->second_color}}





        }


    </style>
@endsection

@section('content')

    <div class="container mx-auto p-4" style="margin-top: 10vh; margin-bottom: 200px">
        <nav class="text-sm text-gray-500 mb-4" style="">
            <a class="hover:underline" href="{{route('home_brands_index',['id' => $productData->brand_id])}}">
                Products
            </a>
            •
            @if($productData->brand_id == 1)
                @if($productData->type_id == 1)
                    <a class="hover:underline" href="{{route('home_brands_mdr')}}">
                        Rulolu Motorlar</a>
                @elseif($productData->type_id == 2 )
                    <a class="hover:underline" href="{{route('home_brands_controller')}}">
                        Kontrol Kartları</a>
                @elseif($productData->type_id == 3)
                    <a class="hover:underline" href="{{route('home_brands_sorters')}}">
                        Transfer Üniteleri</a>
                @endif
                •
            @endif


            <span>
            {{$productData->name}}
    </span>
        </nav>
        <div class="flex flex-wrap" style="    margin-bottom: 55px;">
            <div class="w-full lg:w-3/3">
                <div class="row">
                    <div class="col-12 col-lg-8">
                        <h1 class="text-4xl font-bold mb-2">
                            {{$productData->name}}
                        </h1>
                        <h2 class="text-xl font-semibold mb-4">
                            {{$productData->keywords}}
                        </h2>
                        <p class="mb-4" style="color: black; text-align: justify;">
                            @if($productData->type_id != 2)
                                {!! $productData->description !!}
                            @else
                                {!! $productData->content !!}
                            @endif
                        </p>
                        <div class="flex flex-wrap justify-center md:justify-start space-x-4">
                            <a href="{{route('home_contactus')}}"
                               class="btn-info text-white font-bold py-2 px-4 rounded-full ">
                                Detaylı Bilgi İçin İletişime Gecin
                            </a>

                        </div>
                    </div>
                    <div class="col-12 col-lg-4" style=" display: flex;align-items: center;justify-content: center;">
                        <img alt="Image of PM500VE motor driven roller with external controller"
                             class="w-full md:w-2/3 lg:w-full"
                             src="{{\Illuminate\Support\Facades\Storage::url($productData->image)}}"/>
                    </div>
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

        @if($productData->brand_id == 1)
            @if($productData->type_id == 1 || $productData->type_id == 2)
                <div class="">
                    <div class="max-w-7xl mx-auto py-16 px-4 sm:px-6 lg:px-8">
                        <div
                            class="SingleProductsIcons grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8 text-center">
                            <div>
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
            @elseif($productData->type_id == 3)
                <div>
                    <div class="container mx-auto py-8">
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
                                    İs Güvenligine Uygun:
                                    Yaralanma Riski Yok
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @endif


        @if($productData->brand_id == 4)
            <div style="margin-top: 50px">
                <div style="display: flex;
    flex-direction: column;
    align-items: center; margin-bottom: 30px">
                    <h3 style="    text-align: center;
    font-size: 25px; margin-bottom:10px; padding-bottom: 10px">Diğer Ürünlerimiz</h3>
                    <span
                        style="border-radius: 15px; text-align: center; width: 7%; opacity: 1;border-bottom: 7px solid {{\App\Models\Brands::where('id',$productData->brand_id)->first()->main_color}};"> </span>
                </div>
                @php  $productList = \App\Models\Products::where('brand_id',4)->get(); @endphp
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
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
        @endif

    </div>

@endsection
