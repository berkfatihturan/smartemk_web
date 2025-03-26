
<div class="header">
    <div class="header-container">
        <a href="{{route('home_index')}}"><img id="logo" style="width: 90px" src="{{\Illuminate\Support\Facades\Storage::url($settingDataFromLayout->logo)}}"></a>
        <nav class="navbar navbar-expand-lg navbar-light bg-light" style="width: 100%; padding:0; background:white">
            <div class="container-fluid" style="background:white">

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mb-2 mb-lg-0" style="margin-left: auto;">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{route('home_index')}}">Ana Sayfa</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{route('home_aboutus')}}">Hakkımızda</a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                               data-bs-toggle="dropdown" aria-expanded="false">
                                Ürünlerimiz
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="{{route('home_brands_index',['id' => 1])}}">Itoh Denki</a></li>
                                <li><a class="dropdown-item" href="{{route('home_brands_index',['id' => 4])}}">Techman Robots</a></li>

                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{route('home_referanslar')}}">Referanslarımız</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{route('home_contactus')}}">Bize Ulaşın</a>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>
    </div>

</div>

