@section('head-extra')
    <style>
        @media (max-width: 576px) {

        }
    </style>

@endsection

<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{route('admin_index')}}" class="nav-link">Home</a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->
        <li class="nav-item" onclick="openIframe('{{route('admin_searchPage_mini')}}', 100, 100, 500, 800,'Search')">
            <a class="nav-link" style="cursor: pointer">
                <i class="fas fa-search"></i>
            </a>
            <div class="navbar-search-block">
                <form class="form-inline" style="position: relative">
                    <div class="input-group input-group-sm">
                        <input onkeyup="deneme(this)" class="form-control form-control-navbar" type="search"
                               placeholder="Search"
                               aria-label="Search" >
                        <div class="input-group-append">
                            <button class="btn btn-navbar" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                            <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="input-group input-group-sm" style="position: absolute ; z-index: 99;top: 55px;">
                        <ul id="search_element_container" style="padding: 0; list-style: none; width: 100%">
                        </ul>
                    </div>
                </form>

            </div>
        </li>

        <script>
            function deneme(form_input) {
                document.getElementById("search_element_container").innerHTML = "";

                var url = '{{route('admin_search',['key'=>":key"])}}'
                url = url.replace(':key', form_input.value)
                $.ajax({
                    type: 'GET',
                    url: url,
                    success: function (data) {

                        data.forEach(function (item) {

                            console.log(item)
                            var liElement = document.createElement("li");
                            liElement.style.marginBottom = "12px";

                            // Bir a etiketi oluştur ve içeriğini ayarla
                            var aElement = document.createElement("a");
                            var search_key=form_input.value.substr(1).split(/[_:]+/)[0]
                            if (search_key === "barcode"){
                                aElement.href = "/admin/stocks/showBarcode/" +  item.curr_stk_id;
                                aElement.onclick = function () {
                                    return !window.open(this.href, '', 'width=500,height=800');
                                };

                                var bElement = document.createElement("b");
                                bElement.textContent = "[#" + item.id + "] " + item.barcode;

                            }if (search_key === "code"){
                                aElement.href = "/admin/orders/show_putaway/" +  item.order_id +"/"+item.putaway_pin;
                                aElement.onclick = function () {
                                    return window.href = this.href;
                                };
                                var bElement = document.createElement("b");
                                bElement.textContent = "[#" + item.id + "] " + item.barcode;

                            }
                            else{
                                aElement.href = "/admin/" + search_key + "/show/" + item.id;
                                aElement.onclick = function () {
                                    return !window.open(this.href, '', 'width=1000,height=800');
                                };

                                var bElement = document.createElement("b");
                                bElement.textContent = "[#" + item.id + "] " + item.name;
                            }

                            aElement.style.color = "black";
                            aElement.style.background = "rgba(211,211,211,.9)";
                            aElement.style.padding = "10px";
                            aElement.style.borderRadius = "5px";
                            aElement.style.display = "inline-block";
                            aElement.style.width = "100%";

                            var divElement = document.createElement("div");

                            Object.keys(item).forEach(function (key) {
                                if (key !== "name") {
                                    var codeSpan = document.createElement("span");
                                    codeSpan.style.color = "darkblue";
                                    codeSpan.textContent = key + " : ";
                                    divElement.appendChild(codeSpan);
                                    divElement.appendChild(document.createTextNode(item[key]));
                                    divElement.appendChild(document.createTextNode(" "));
                                }
                            });


                            aElement.appendChild(bElement);
                            aElement.appendChild(divElement);
                            liElement.appendChild(aElement);

                            document.getElementById("search_element_container").appendChild(liElement);
                        });
                    }
                });
            }
        </script>

        <!-- Messages Dropdown Menu -->
        @php
            $newMsgList = [];
            $msgNewNum = 0;
            if(\App\Models\Message::isAllowed()){
                $newMsgList = \App\Models\Message::where('status','=','New')->orderBy('created_at', 'desc')->get()->take(10);
                $msgNewNum = \App\Models\Message::countMessage();
            }
        @endphp
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-comments"></i>
                @if($msgNewNum > 0)
                    <span class="badge badge-danger navbar-badge">{{$msgNewNum}}</span>
                @endif
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                @foreach($newMsgList as $msg)
                    <a href="{{route('admin_message_show',['id'=>$msg->id])}}"
                       onclick="return !window.open(this.href,'','width=1000,height=800')" class="dropdown-item">
                        <!-- Message Start -->
                        <div class="media">
                            <div class="media-body">
                                <h3 class="dropdown-item-title">
                                    {{$msg->name}}
                                    <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                                </h3>
                                <p class="text-sm">{{Str::of($msg->subject)->limit(30)}}</p>
                                <p class="text-sm text-muted"><i
                                        class="far fa-clock mr-1"></i> {{ $msg->created_at->diffForHumans() }}</p>
                            </div>
                        </div>
                        <!-- Message End -->
                    </a>
                    <div class="dropdown-divider"></div>
                @endforeach
                @if($msgNewNum > 10)
                    <a href="#" class="dropdown-item">
                        <div class="media">
                            <div class="media-body text-justify">
                                + {{$msgNewNum - 10}} More
                            </div>
                        </div>
                    </a>
                    <div class="dropdown-divider"></div>
                @endif
                @if($msgNewNum <= 0)
                    <a href="#" class="dropdown-item">
                        <div class="media">
                            <div class="media-body">
                                Noting to See
                            </div>
                        </div>
                    </a>
                    <div class="dropdown-divider"></div>
                @endif
                <a href="{{route("admin_message_index")}}" class="dropdown-item dropdown-footer">See All Messages</a>
            </div>
        </li>
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown user-menu">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false"
               style="display: flex;align-items: center; padding-right: 0">

                <div class="user-image img-circle elevation-2"
                     style="background: green;display: flex;align-items: center;justify-content: center; position: relative; top: 2px;right: 2px">
                    <span
                        style="color: white; font-size: 22px; position: relative; left: 1px; bottom: 1px">{{\Illuminate\Support\Facades\Auth::user()->name[0]}}</span>
                </div>
                <p style="margin: 0; display: flex; flex-direction: column; align-items: flex-start; justify-content: center">
                    <span style="">{{\Illuminate\Support\Facades\Auth::user()->name}}</span>
                    <span style="font-size: 10px; position: relative; bottom: 4px;left: 1px; color: #6c757d;">

                            <span>Admin</span>

                    </span>
                </p>

            </a>
            <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right"
                style="right: 10px !important; min-width: 160px!important; width: 160px">
                <!-- User image -->
                @if(\App\Models\User::is_allow_to_access(null,'admin_profile_index'))
                <li class="user-header navbar-user-menu" style="height: auto; border-bottom: 1px solid #dee2e6; text-align: left; padding: 0">
                    <a href="{{route('admin_profile_index')}}" style="color: black; display:inline-block; padding: 10px; width: 100%;">
                    <svg class="nav-icon fas fa" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                         style=" position: relative; bottom: 2px; padding: 2px 3px; width: 19px; border: 1px solid black; border-radius: 50%;">
                        <!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                        <path
                            d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z"></path>
                    </svg>
                    <span style="">Profile</span>
                    </a>
                </li>
                @endif
                @if(\App\Models\User::is_allow_to_access(null,'admin_settings_index'))
                <li class="user-header navbar-user-menu" style="height: auto; border-bottom: 1px solid #dee2e6; text-align: left; padding: 0">
                    <a href="{{route('admin_settings_index')}}" style="color: black; display:inline-block; padding: 10px; width: 100%;">
                        <svg class="nav-icon fas fa" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                             style=" position: relative; bottom: 2px; padding: 2px 2px; width: 19px; border: 1px solid black; border-radius: 50%;">
                            <!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                            <path
                                d="M495.9 166.6c3.2 8.7 .5 18.4-6.4 24.6l-43.3 39.4c1.1 8.3 1.7 16.8 1.7 25.4s-.6 17.1-1.7 25.4l43.3 39.4c6.9 6.2 9.6 15.9 6.4 24.6c-4.4 11.9-9.7 23.3-15.8 34.3l-4.7 8.1c-6.6 11-14 21.4-22.1 31.2c-5.9 7.2-15.7 9.6-24.5 6.8l-55.7-17.7c-13.4 10.3-28.2 18.9-44 25.4l-12.5 57.1c-2 9.1-9 16.3-18.2 17.8c-13.8 2.3-28 3.5-42.5 3.5s-28.7-1.2-42.5-3.5c-9.2-1.5-16.2-8.7-18.2-17.8l-12.5-57.1c-15.8-6.5-30.6-15.1-44-25.4L83.1 425.9c-8.8 2.8-18.6 .3-24.5-6.8c-8.1-9.8-15.5-20.2-22.1-31.2l-4.7-8.1c-6.1-11-11.4-22.4-15.8-34.3c-3.2-8.7-.5-18.4 6.4-24.6l43.3-39.4C64.6 273.1 64 264.6 64 256s.6-17.1 1.7-25.4L22.4 191.2c-6.9-6.2-9.6-15.9-6.4-24.6c4.4-11.9 9.7-23.3 15.8-34.3l4.7-8.1c6.6-11 14-21.4 22.1-31.2c5.9-7.2 15.7-9.6 24.5-6.8l55.7 17.7c13.4-10.3 28.2-18.9 44-25.4l12.5-57.1c2-9.1 9-16.3 18.2-17.8C227.3 1.2 241.5 0 256 0s28.7 1.2 42.5 3.5c9.2 1.5 16.2 8.7 18.2 17.8l12.5 57.1c15.8 6.5 30.6 15.1 44 25.4l55.7-17.7c8.8-2.8 18.6-.3 24.5 6.8c8.1 9.8 15.5 20.2 22.1 31.2l4.7 8.1c6.1 11 11.4 22.4 15.8 34.3zM256 336a80 80 0 1 0 0-160 80 80 0 1 0 0 160z"></path>
                        </svg>
                        <span style="">Settings</span>
                    </a>
                </li>
                @endif
                <li class="user-header navbar-user-menu" style="height: auto; border-bottom: 1px solid #dee2e6; text-align: left; ">
                    <form role="form" action="{{ route('logout') }}" method="POST">
                        @csrf
                        <svg class="nav-icon fas fa" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                             style=" position: relative; bottom: 2px; padding: 1px 1px; width: 19px; border: 1px solid black; border-radius: 50%;">
                            <!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                            <path
                                d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z"/>
                        </svg>

                        <button type="submit" style="border: none; background: none; padding-left: 0">Logout</button>

                    </form>
                </li>

            </ul>
        </li>
        <li class="nav-item">
            <a class="nav-link" style="padding-right: 0" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>

        <li class="nav-item">


        </li>
    </ul>
</nav>
<!-- /.navbar -->
