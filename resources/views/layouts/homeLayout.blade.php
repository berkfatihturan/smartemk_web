<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    @php $settingDataFromLayout = \App\Models\Settings::getSettingValue();@endphp
    <link rel="icon" href="{{\Illuminate\Support\Facades\Storage::url($settingDataFromLayout->icon)}}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
          rel="stylesheet">
    <title>{{$settingDataFromLayout->company_name}} - Creative SEO HTML5 Template</title>

    <!-- Bootstrap core CSS -->
    <link href="{{asset('vendor')}}/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="{{asset('assets')}}/css/fontawesome.css">
    <link rel="stylesheet" href="{{asset('assets')}}/css/templatemo-digimedia-v2.css">
    <link rel="stylesheet" href="{{asset('assets')}}/css/animated.css">
    <link rel="stylesheet" href="{{asset('assets')}}/css/owl.css">
    <link rel="stylesheet" href="{{asset('assets')}}/css/bft.css">
    @yield('style')
</head>

<body>

<!-- Preloader START -->
@include('home.components.preloader')
<!-- Preloader END-->

<!-- HEADER START -->
@include('home.header')
<!-- HEADER END-->


@yield('content')


<!-- FOOTER START -->
@include('home.footer')
<!-- FOOTER END -->
</body>
</html>
