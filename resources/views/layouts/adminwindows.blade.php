@php $settingDataFromLayout=\App\Models\Settings::getSettingValue() @endphp
        <!doctype html>
<html lang="en"
      xmlns:th="http://www.thymeleaf.org"
      xmlns:layout="http://www.ultraq.net.nz/thymeleaf/layout">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{\Illuminate\Support\Facades\Storage::url($settingDataFromLayout->icon)}}">
    <title>@isset($settingDataFromLayout)
            {{$settingDataFromLayout->company_name}}
        @endisset</title>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sockjs-client/1.6.1/sockjs.min.js"
            integrity="sha512-1QvjE7BtotQjkq8PxLeF6P46gEpBRXuskzIVgjFpekzFVF4yjRgrQvTG1MTOJ3yQgvTteKAcO7DSZI92+u/yZw=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/stomp.js/2.3.3/stomp.min.js"></script>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('assets')}}/admin/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
          href="{{asset('assets')}}/admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{asset('assets')}}/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{asset('assets')}}/admin/plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('assets')}}/admin/dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{asset('assets')}}/admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{asset('assets')}}/admin/plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="{{asset('assets')}}/admin/plugins/summernote/summernote-bs4.min.css">
    <link rel="stylesheet" href="{{asset('assets')}}/css/warning-box.css">
    <link rel="stylesheet" href="{{asset('assets')}}/css/adminWindows.css">


    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('assets')}}/admin/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
          href="{{asset('assets')}}/admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{asset('assets')}}/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{asset('assets')}}/admin/plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('assets')}}/admin/dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{asset('assets')}}/admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{asset('assets')}}/admin/plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="{{asset('assets')}}/admin/plugins/summernote/summernote-bs4.min.css">
    <link rel="stylesheet" href="{{asset('assets')}}/css/warning-box.css">
    <link rel="stylesheet" href="{{asset('assets')}}/css/main.css">

    @yield('head_extra')
    <style>
        .main-sidebar {
            width: 71px;
        }

        .content-wrapper {
            margin-left: 71px !important;
            height: 118vh !important
        }

        @media (max-width: 768px) {
            .content-wrapper {
                margin-left: 0 !important;
                height: 100% !important;
            }
        }
    </style>
    @yield('head_extra')
</head>
<body>

<div>


    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="index3.html" class="brand-link" style="display: flex; align-items: center">
            <img src="{{\Illuminate\Support\Facades\Storage::url($settingDataFromLayout->icon)}}"
                 class="brand-image img-circle elevation-3"
                 style="background: #EEEDEB;border-radius: 50%; padding: 0 3px">
        </a>


    </aside>
</div>


<!-- content-wrapper -->
<div class="content-wrapper">
    @include('admin.content_header')
    <section class="content" style="padding: 10px">
        @yield('content')
    </section>
</div>
<!-- /.content-wrapper -->
@include('admin.components.external-page')
@include("admin.footer")

</body>
</html>
