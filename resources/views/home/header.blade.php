<!-- Pre-header Starts -->
<div class="pre-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-sm-8 col-7">
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
<!-- Pre-header End -->

<!-- ***** Header Area Start ***** -->
<header class="header-area header-sticky wow slideInDown" data-wow-duration="0.75s" data-wow-delay="0s">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <a href="/" class="logo">
                        <img style="width: 150px;" src="{{\Illuminate\Support\Facades\Storage::url($settingDataFromLayout->logo)}}" alt="">
                    </a>
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                        <li class="scroll-to-section"><a href="{{route('home_index')}}" class="active">Ana Sayfa</a></li>
                        <li class="scroll-to-section"><a href="#about">Hakkımızda</a></li>
                        <li class="scroll-to-section"><a href="#services">Hizmetlerimiz</a></li>
                        <li class="scroll-to-section"><a href="#portfolio">Ürünlerimiz</a></li>
                        <li class="scroll-to-section"><a href="#blog">Haberler</a></li>
                        <li class="scroll-to-section"><div class="border-first-button"><a href="#contact">Bize Ulaşın</a></div></li>
                    </ul>
                    <a class='menu-trigger'>
                        <span>Menu</span>
                    </a>
                    <!-- ***** Menu End ***** -->
                </nav>
            </div>
        </div>
    </div>
</header>
<!-- ***** Header Area End ***** -->
