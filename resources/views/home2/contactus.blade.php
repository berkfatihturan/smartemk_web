@extends('layouts.homeLayout2')

@section('style')
    <style>
        body {
            background-color: white;
        }

        .free-quote {
            padding: 50px 0px;
            margin-top: 59px !important;
            background-image: linear-gradient(90deg, rgba(0, 0, 0, 0.3912158613445378) 0%, rgba(0, 0, 0, 0.38001137955182074) 50%, rgba(0, 0, 0, 0.42482930672268904) 100%), url("{{asset('assets')}}/img/itohdenki.jpg");
        }

        .section-heading {
            margin-bottom: 0 !important;
        }

        .icon{

            display: flex;
            flex-direction: column;
            align-items: center;

        }

        .icon svg{

            fill: white;
            width: 45px;
            height: 45px;
            padding: 9px;
            border-radius: 50%;
            background: #ab212a;

        }
    </style>
@endsection

@section('content')

    <div id="free-quote" class="free-quote">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 offset-lg-4">
                    <div class="section-heading  wow fadeIn" data-wow-duration="1s" data-wow-delay="0.3s">
                        <!--<h6>Get Your Free Quote</h6> -->
                        <h4>BİZE ULAŞIN</h4>
                        <div class="line-dec"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @php $settingDataFromLayout = \App\Models\Settings::getSettingValue();@endphp
    <div id="contact" class="contact-us section" style="margin-bottom: 70px">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.25s">
                    <form id="contact" action="{{route('storemessage')}}" method="post">
                        @csrf
                        <div class="contact-container row">
                            <div class="col-lg-12">
                                <div class="contact-dec">
                                </div>
                            </div>
                            <div class="col-lg-5 col-12">
                                <div id="map">
                                    {!! $settingDataFromLayout->map_link !!}
                                </div>
                            </div>
                            <div class="col-lg-7 col-12">
                                <div class="fill-form" style="padding: 60px 60px 80px 30px;">
                                    <div class="row">
                                        <div class="col-lg-12" style="    font-size: 22px;
    padding-bottom: 20px;
    text-align: left;}">
                                            SMART EMK OTOMASYON SİST. DAN. TİC. LTD. ŞTİ.
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4 col-12">
                                            <div class="info-post">
                                                <div class="icon" style="">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                        <!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                                                        <path
                                                            d="M164.9 24.6c-7.7-18.6-28-28.5-47.4-23.2l-88 24C12.1 30.2 0 46 0 64C0 311.4 200.6 512 448 512c18 0 33.8-12.1 38.6-29.5l24-88c5.3-19.4-4.6-39.7-23.2-47.4l-96-40c-16.3-6.8-35.2-2.1-46.3 11.6L304.7 368C234.3 334.7 177.3 277.7 144 207.3L193.3 167c13.7-11.2 18.4-30 11.6-46.3l-40-96z"/>
                                                    </svg>
                                                    <a href="tel:{{$settingDataFromLayout->phone}}">{{$settingDataFromLayout->phone}}</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-12">
                                            <div class="info-post">
                                                <div class="icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M48 64C21.5 64 0 85.5 0 112c0 15.1 7.1 29.3 19.2 38.4L236.8 313.6c11.4 8.5 27 8.5 38.4 0L492.8 150.4c12.1-9.1 19.2-23.3 19.2-38.4c0-26.5-21.5-48-48-48L48 64zM0 176L0 384c0 35.3 28.7 64 64 64l384 0c35.3 0 64-28.7 64-64l0-208L294.4 339.2c-22.8 17.1-54 17.1-76.8 0L0 176z"/></svg>
                                                    <a href="mailto:{{$settingDataFromLayout->email}}">{{$settingDataFromLayout->email}}</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-12">
                                            <div class="info-post">
                                                <div class="icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M215.7 499.2C267 435 384 279.4 384 192C384 86 298 0 192 0S0 86 0 192c0 87.4 117 243 168.3 307.2c12.3 15.3 35.1 15.3 47.4 0zM192 128a64 64 0 1 1 0 128 64 64 0 1 1 0-128z"/></svg>
                                                    <a href="https://www.google.com/maps/search/?api=1&query={{ urlencode($settingDataFromLayout->address) }}"
                                                       target="_blank">{{\Illuminate\Support\Str::limit($settingDataFromLayout->address,20,"") }}</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-12">
                                            <fieldset>
                                                <input type="name" name="name" id="name" placeholder="Name"
                                                       autocomplete="on" required>
                                            </fieldset>
                                            <fieldset>
                                                <input type="text" name="email" id="email" pattern="[^ @]*@[^ @]*"
                                                       placeholder="Your Email" required="">
                                            </fieldset>
                                            <fieldset>
                                                <input type="subject" name="subject" id="subject" placeholder="Subject"
                                                       autocomplete="on">
                                            </fieldset>
                                        </div>
                                        <div class="col-lg-6 col-12">
                                            <fieldset>
                                                <textarea name="message" type="text" class="form-control" id="message"
                                                          placeholder="Message" required=""></textarea>
                                            </fieldset>
                                        </div>
                                        <div class="col-lg-12">
                                            <fieldset>
                                                <button type="submit" id="form-submit" class="main-button ">Mesajı
                                                    Gönder
                                                </button>
                                            </fieldset>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- AJAX Kodu -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            $("#contact").submit(function (e) {
                e.preventDefault(); // Formun normal şekilde gönderilmesini engelle

                var form = $(this);

                var formData = {
                    _token: "{{ csrf_token() }}", // CSRF token
                    name: document.getElementById('name').value,
                    email: document.getElementById('email').value,
                    subject: document.getElementById('subject').value,
                    message: document.getElementById('message').value,
                };

                console.log(formData)


                $.ajax({
                    type: "POST",
                    url: "{{route('storemessage')}}", // Laravel route ile tanımlanan URL'yi al
                    data: formData,
                    beforeSend: function () {
                        $("#form-submit").text("Sending...").prop("disabled", true); // Butonu devre dışı bırak
                    },
                    success: function (response) {
                        if (response.success) {
                            $("#form-submit").text("Mesaj Gönderildi ✅")
                                .css({
                                    "border": "1px solid #28a745",
                                    "background-color": "#28a745", // Yeşil renk
                                    "color": "#fff", // Yazı rengi beyaz
                                    "transition": "background-color 0.5s ease-in-out"
                                }).prop("disabled", true); // Butonu tıklanamaz yap

                            form[0].reset(); // Formu sıfırla
                        }
                    },
                    error: function (xhr, status, error) {
                        $("#form-submit").text("Send Message Now").prop("disabled", false);
                        alert("Message sending failed! Please try again.");
                    }
                });
            });
        });
    </script>

@endsection
