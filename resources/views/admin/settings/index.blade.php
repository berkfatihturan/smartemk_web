@extends('layouts.adminbase')
@section('content-title', 'Settings')
@section('head_extra')
    @php $settingDataFromLayout=\App\Models\Settings::getSettingValue(); @endphp
    <link rel="stylesheet" href="{{asset('assets')}}/css/nice_form.css">
    <script src="{{asset('assets')}}/js/main.js"></script>
    <style>
        .form_box {
            padding: 1.3rem;
        }

        h1 {
            margin-bottom: 0 !important;
        }

        .form_box p {
            margin-top: 5px;
            margin-left: 2px;
        }

        .table th {
            border-top: none;
            padding-block: 6px;
        }

        .role .btn {
            font-size: .7rem;
            letter-spacing: .7px;
            padding: 2px 5px;
        }
        body{
            position: absolute;
            top: 0;
            left: 0;
        }
    </style>
@endsection

@section('content')

    <div class="form-page">
        <div class="form-page-navigation">
            <nav>
                <ul>
                    <li onclick="scrollToElement('company')">
                        <a >
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                                <path
                                    d="M64 48c-8.8 0-16 7.2-16 16V448c0 8.8 7.2 16 16 16h80V400c0-26.5 21.5-48 48-48s48 21.5 48 48v64h80c8.8 0 16-7.2 16-16V64c0-8.8-7.2-16-16-16H64zM0 64C0 28.7 28.7 0 64 0H320c35.3 0 64 28.7 64 64V448c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V64zm88 40c0-8.8 7.2-16 16-16h48c8.8 0 16 7.2 16 16v48c0 8.8-7.2 16-16 16H104c-8.8 0-16-7.2-16-16V104zM232 88h48c8.8 0 16 7.2 16 16v48c0 8.8-7.2 16-16 16H232c-8.8 0-16-7.2-16-16V104c0-8.8 7.2-16 16-16zM88 232c0-8.8 7.2-16 16-16h48c8.8 0 16 7.2 16 16v48c0 8.8-7.2 16-16 16H104c-8.8 0-16-7.2-16-16V232zm144-16h48c8.8 0 16 7.2 16 16v48c0 8.8-7.2 16-16 16H232c-8.8 0-16-7.2-16-16V232c0-8.8 7.2-16 16-16z"/>
                            </svg>
                            Company</a>
                    </li>
                    <li onclick="scrollToElement('contact')">
                        <a>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                <!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                <path
                                    d="M384 48c8.8 0 16 7.2 16 16V448c0 8.8-7.2 16-16 16H96c-8.8 0-16-7.2-16-16V64c0-8.8 7.2-16 16-16H384zM96 0C60.7 0 32 28.7 32 64V448c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V64c0-35.3-28.7-64-64-64H96zM240 256a64 64 0 1 0 0-128 64 64 0 1 0 0 128zm-32 32c-44.2 0-80 35.8-80 80c0 8.8 7.2 16 16 16H336c8.8 0 16-7.2 16-16c0-44.2-35.8-80-80-80H208zM512 80c0-8.8-7.2-16-16-16s-16 7.2-16 16v64c0 8.8 7.2 16 16 16s16-7.2 16-16V80zM496 192c-8.8 0-16 7.2-16 16v64c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm16 144c0-8.8-7.2-16-16-16s-16 7.2-16 16v64c0 8.8 7.2 16 16 16s16-7.2 16-16V336z"/>
                            </svg>

                            Contact</a>
                    </li>

                    <li onclick="scrollToElement('mail')">
                        <a>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                <!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                <path
                                    d="M48 64C21.5 64 0 85.5 0 112c0 15.1 7.1 29.3 19.2 38.4L236.8 313.6c11.4 8.5 27 8.5 38.4 0L492.8 150.4c12.1-9.1 19.2-23.3 19.2-38.4c0-26.5-21.5-48-48-48L48 64zM0 176L0 384c0 35.3 28.7 64 64 64l384 0c35.3 0 64-28.7 64-64l0-208L294.4 339.2c-22.8 17.1-54 17.1-76.8 0L0 176z"/>
                            </svg>

                            Mail</a>
                    </li>



                    <li onclick="scrollToElement('devs')">
                        <a>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512">
                                <path
                                    d="M392.8 1.2c-17-4.9-34.7 5-39.6 22l-128 448c-4.9 17 5 34.7 22 39.6s34.7-5 39.6-22l128-448c4.9-17-5-34.7-22-39.6zm80.6 120.1c-12.5 12.5-12.5 32.8 0 45.3L562.7 256l-89.4 89.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l112-112c12.5-12.5 12.5-32.8 0-45.3l-112-112c-12.5-12.5-32.8-12.5-45.3 0zm-306.7 0c-12.5-12.5-32.8-12.5-45.3 0l-112 112c-12.5 12.5-12.5 32.8 0 45.3l112 112c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L77.3 256l89.4-89.4c12.5-12.5 12.5-32.8 0-45.3z"/>
                            </svg>
                            Devs</a>
                    </li>


                    <hr style="margin-top: 0px; margin-bottom: 10px"/>

                    <li>
                        <a class="btn btn-info btn-sm btn-save"
                           style="color: white; padding: 0.45em .7em; display: flex; opacity: .8;" type="submit"
                           onclick="submitForm_withoutWarning('settings_form')">

                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" fill="white"
                                 style="height: 1.6em !important; width: auto; margin-right: .6em; margin-left: .5em">
                                <!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                <path
                                    d="M48 96V416c0 8.8 7.2 16 16 16H384c8.8 0 16-7.2 16-16V170.5c0-4.2-1.7-8.3-4.7-11.3l33.9-33.9c12 12 18.7 28.3 18.7 45.3V416c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V96C0 60.7 28.7 32 64 32H309.5c17 0 33.3 6.7 45.3 18.7l74.5 74.5-33.9 33.9L320.8 84.7c-.3-.3-.5-.5-.8-.8V184c0 13.3-10.7 24-24 24H104c-13.3 0-24-10.7-24-24V80H64c-8.8 0-16 7.2-16 16zm80-16v80H272V80H128zm32 240a64 64 0 1 1 128 0 64 64 0 1 1 -128 0z"/>
                            </svg>
                            <span
                                style="font-size: 1.4em; font-weight: 500;position: relative; top: 2px">SAVE</span>
                        </a>
                    </li>
                </ul>
            </nav>

            <script>
                function scrollToElement(elementId) {
                    const element = document.getElementById(elementId);
                    if (element) {
                        element.scrollIntoView({ behavior: "smooth" });
                    }
                }
            </script>

        </div>
        <main class="form-page-content">
            <form id="settings_form" role="form" action="{{route('admin_settings_update')}}" method="post"
                  enctype="multipart/form-data">
                @csrf



                <div class="form_box">
                    <div class="href-target" id="company"></div>
                    <h1>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                            <path
                                d="M64 48c-8.8 0-16 7.2-16 16V448c0 8.8 7.2 16 16 16h80V400c0-26.5 21.5-48 48-48s48 21.5 48 48v64h80c8.8 0 16-7.2 16-16V64c0-8.8-7.2-16-16-16H64zM0 64C0 28.7 28.7 0 64 0H320c35.3 0 64 28.7 64 64V448c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V64zm88 40c0-8.8 7.2-16 16-16h48c8.8 0 16 7.2 16 16v48c0 8.8-7.2 16-16 16H104c-8.8 0-16-7.2-16-16V104zM232 88h48c8.8 0 16 7.2 16 16v48c0 8.8-7.2 16-16 16H232c-8.8 0-16-7.2-16-16V104c0-8.8 7.2-16 16-16zM88 232c0-8.8 7.2-16 16-16h48c8.8 0 16 7.2 16 16v48c0 8.8-7.2 16-16 16H104c-8.8 0-16-7.2-16-16V232zm144-16h48c8.8 0 16 7.2 16 16v48c0 8.8-7.2 16-16 16H232c-8.8 0-16-7.2-16-16V232c0-8.8 7.2-16 16-16z"/>
                        </svg>
                        Company
                    </h1>
                    <p>
                        In this section, you can manage all essential company-related information. Update details like
                        your company name, address, logo, and icon to ensure that your system reflects the most accurate
                        and up-to-date information.
                    </p>

                    <div class="nice-form-group">
                        <label>Company Name</label>
                        <input type="text" placeholder="Company Name" name="company_name"
                               value="@if(!empty($settingData->company_name)){{$settingData->company_name}}@endif"/>
                    </div>

                    <div class="nice-form-group">
                        <label>Address</label>
                        @if(!empty($settingData->address))
                            <textarea rows="5" placeholder="Your Address" name="address">{!! $settingData->address !!}
                            </textarea>
                        @else
                            <textarea rows="5" placeholder="Your Address" name="address">
                            </textarea>
                        @endif
                    </div>

                    <div class="nice-form-group">
                        <label>Logo</label>
                        <input type="file" name="logo"/>
                    </div>

                    <div class="nice-form-group">
                        <label>Icon</label>
                        <input type="file" name="icon"/>
                    </div>
                </div>


                <div class="form_box">
                    <div class="href-target" id="contact"></div>
                    <h1>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                            <!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                            <path
                                d="M384 48c8.8 0 16 7.2 16 16V448c0 8.8-7.2 16-16 16H96c-8.8 0-16-7.2-16-16V64c0-8.8 7.2-16 16-16H384zM96 0C60.7 0 32 28.7 32 64V448c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V64c0-35.3-28.7-64-64-64H96zM240 256a64 64 0 1 0 0-128 64 64 0 1 0 0 128zm-32 32c-44.2 0-80 35.8-80 80c0 8.8 7.2 16 16 16H336c8.8 0 16-7.2 16-16c0-44.2-35.8-80-80-80H208zM512 80c0-8.8-7.2-16-16-16s-16 7.2-16 16v64c0 8.8 7.2 16 16 16s16-7.2 16-16V80zM496 192c-8.8 0-16 7.2-16 16v64c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm16 144c0-8.8-7.2-16-16-16s-16 7.2-16 16v64c0 8.8 7.2 16 16 16s16-7.2 16-16V336z"/>
                        </svg>
                        Contact
                    </h1>
                    <p>You can input vital contact information for your company, including phone numbers, email
                        addresses, and website URLs. Providing this information ensures easy access for communication
                        and support purposes.
                    </p>
                    <div class="nice-form-group">
                        <label>Phone number</label>
                        <input type="tel" placeholder="Phone number" class="icon-left" name="phone"
                               value="@if(!empty($settingData->phone)){{$settingData->phone}}@endif"/>
                    </div>

                    <div class="nice-form-group">
                        <label>Email</label>
                        <input type="email" placeholder="Email" class="icon-left" name="email"
                               value="@if(!empty($settingData->email)){{$settingData->email}}@endif"/>
                    </div>

                    <div class="nice-form-group">
                        <label>Facebook Address</label>
                        <input type="url" placeholder="link" class="icon-left" name="facebook_url"
                               value="@if(!empty($settingData->facebook_url)){{$settingData->facebook_url}}@endif"/>
                    </div>

                    <div class="nice-form-group">
                        <label>Twitter Address</label>
                        <input type="url" placeholder="link" class="icon-left" name="twitter_url"
                               value="@if(!empty($settingData->twitter_url)){{$settingData->twitter_url}}@endif"/>
                    </div>

                    <div class="nice-form-group">
                        <label>Youtube Address</label>
                        <input type="url" placeholder="link" class="icon-left" name="youtube_url"
                               value="@if(!empty($settingData->youtube_url)){{$settingData->youtube_url}}@endif"/>
                    </div>

                    <div class="nice-form-group">
                        <label>Linkedin Address</label>
                        <input type="url" placeholder="link" class="icon-left" name="linkedin_url"
                               value="@if(!empty($settingData->linkedin_url)){{$settingData->linkedin_url}}@endif"/>
                    </div>

                    <div class="nice-form-group">
                        <label>Url</label>
                        <input type="url" placeholder="www.google.com" class="icon-left" name="url"
                               value="@if(!empty($settingData->url)){{$settingData->url}}@endif"/>
                    </div>

                    <div class="nice-form-group">
                        <label>Map Link</label>
                        <textarea name="map_link" rows="5" spellcheck="false">{!! $settingData->map_link !!}</textarea>
                    </div>
                </div>

                <div class="form_box">
                    <div class="href-target" id="mail"></div>
                    <h1>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                            <!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                            <path
                                d="M48 64C21.5 64 0 85.5 0 112c0 15.1 7.1 29.3 19.2 38.4L236.8 313.6c11.4 8.5 27 8.5 38.4 0L492.8 150.4c12.1-9.1 19.2-23.3 19.2-38.4c0-26.5-21.5-48-48-48L48 64zM0 176L0 384c0 35.3 28.7 64 64 64l384 0c35.3 0 64-28.7 64-64l0-208L294.4 339.2c-22.8 17.1-54 17.1-76.8 0L0 176z"/>
                        </svg>
                        Mail
                    </h1>
                    <p>This form will be used for password reset and important notifications. Please provide a valid email address and your application key (app key). Your email address will be used for password reset procedures and alerts, ensuring your security and the timely delivery of in-app notifications. (only Google Account)
                    </p>

                    <div class="nice-form-group">
                        <label>Email Address</label>
                        <input type="email" placeholder="Email" class="icon-left" name="mail_address"
                               value="@if(!empty($settingData->mail_address)){{$settingData->mail_address}}@endif"/>
                    </div>

                    <div class="nice-form-group">
                        <label>App Key</label>
                        <input type="password" placeholder="App Key" name="mail_app_key"
                               value="@if(!empty($settingData->mail_app_key)){{$settingData->mail_app_key}}@endif"/>
                    </div>
                </div>

                <div class="form_box">
                    <div class="href-target" id="devs"></div>
                    <h1>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512">
                            <path
                                d="M392.8 1.2c-17-4.9-34.7 5-39.6 22l-128 448c-4.9 17 5 34.7 22 39.6s34.7-5 39.6-22l128-448c4.9-17-5-34.7-22-39.6zm80.6 120.1c-12.5 12.5-12.5 32.8 0 45.3L562.7 256l-89.4 89.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l112-112c12.5-12.5 12.5-32.8 0-45.3l-112-112c-12.5-12.5-32.8-12.5-45.3 0zm-306.7 0c-12.5-12.5-32.8-12.5-45.3 0l-112 112c-12.5 12.5-12.5 32.8 0 45.3l112 112c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L77.3 256l89.4-89.4c12.5-12.5 12.5-32.8 0-45.3z"></path>
                        </svg>
                        Devs
                    </h1>
                    <p>
                        Configure settings such as API Server-1 Address and API Server-1 Port to facilitate seamless
                        integration with other systems or applications, enhancing the functionality of your Warehouse
                        Management System.
                    </p>

                    <div class="nice-form-group @if(\Illuminate\Support\Facades\Auth::user()->id != 0) not-allowed @endif">
                        <label>Api Server-1 Address</label>
                        <input type="text" placeholder="Api Server Address" name="api_server_address"
                               value="@if(!empty($settingData->api_server_address)){{$settingData->api_server_address}}@endif"/>
                    </div>

                    <div class="nice-form-group @if(\Illuminate\Support\Facades\Auth::user()->id != 0) not-allowed @endif">
                        <label>Api Server-1 Port</label>
                        <input type="number" placeholder="8080" name="api_server_port"
                               value="@if(!empty($settingData->api_server_port)){{$settingData->api_server_port}}@endif">
                    </div>

                    <div class="nice-form-group @if(\Illuminate\Support\Facades\Auth::user()->id != 0) not-allowed @endif">
                        <label>Main Server-1 Address</label>
                        <input type="text" name="main_server_address" placeholder="Main Server Address"
                               value="@if(!empty($settingData->main_server_address)){{$settingData->main_server_address}}@endif"/>
                    </div>

                    <div class="nice-form-group @if(\Illuminate\Support\Facades\Auth::user()->id != 0) not-allowed @endif">
                        <label>Server Customer Id</label>
                        <input type="text" name="service_id" placeholder="0"
                               value="@if(!empty($settingData->service_id)){{$settingData->service_id}}@endif">
                    </div>
                </div>
            </form>

            <a class="btn btn-info btn-sm btn-save_sm_screen"
               style="color: white; padding: 0.45em .7em; opacity: .8; display: none" type="submit"
               onclick="submitForm_withoutWarning('settings_form')">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" fill="white"
                     style="height: 1.6em !important; width: auto; vertical-align:sub;">
                    <!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                    <path
                        d="M48 96V416c0 8.8 7.2 16 16 16H384c8.8 0 16-7.2 16-16V170.5c0-4.2-1.7-8.3-4.7-11.3l33.9-33.9c12 12 18.7 28.3 18.7 45.3V416c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V96C0 60.7 28.7 32 64 32H309.5c17 0 33.3 6.7 45.3 18.7l74.5 74.5-33.9 33.9L320.8 84.7c-.3-.3-.5-.5-.8-.8V184c0 13.3-10.7 24-24 24H104c-13.3 0-24-10.7-24-24V80H64c-8.8 0-16 7.2-16 16zm80-16v80H272V80H128zm32 240a64 64 0 1 1 128 0 64 64 0 1 1 -128 0z"/>
                </svg>
                <span style="font-size: 1.4em; font-weight: 500;position: relative; margin-left: 3px">SAVE</span>
            </a>


            <div style="height: 612px"></div>

        </main>
    </div>


    <script>
        function submitForm_withoutWarning(id) {
            document.getElementById(id).submit();
        }
    </script>
    <script src="{{asset('assets')}}/js/main.js"></script>
    <script src="{{asset('assets')}}/js/socket.js"></script>

    <script>
        function sendRequestPOST(url,) {
            $.ajax({
                type: "POST",
                url: url,
                data: {
                    _token: "{{csrf_token()}}",
                    route_name: document.getElementById('add_route').value,
                },
                success: function (data) {
                    console.log("request_sending_post")
                }
            });
        }
    </script>

    <script>
        function sendRequest_role_POST(url, route_id_input, role_id_input) {
            $.ajax({
                type: "POST",
                url: url,
                data: {
                    _token: "{{csrf_token()}}",
                    route_id: document.getElementById(route_id_input).value,
                    role_id: document.getElementById(role_id_input).value
                },
                success: function (data) {
                    console.log("request_sending")
                }
            });
        }
    </script>

@endsection
