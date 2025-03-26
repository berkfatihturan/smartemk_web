@php $settingDataFromLayout = \App\Models\Settings::getSettingValue();@endphp
<div id="contact" class="contact-us section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.25s">
                <form id="contact" action="{{route('storemessage')}}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="contact-dec">
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div id="map">
                                {!! $settingDataFromLayout->map_link !!}
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="fill-form">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="info-post">
                                            <div class="icon">
                                                <img src="{{asset('assets')}}/images/phone-icon.png" alt="">
                                                <a href="tel:{{$settingDataFromLayout->phone}}">{{$settingDataFromLayout->phone}}</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="info-post">
                                            <div class="icon">
                                                <img src="{{asset('assets')}}/images/email-icon.png" alt="">
                                                <a href="mailto:{{$settingDataFromLayout->email}}">{{$settingDataFromLayout->email}}</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="info-post">
                                            <div class="icon">
                                                <img src="{{asset('assets')}}/images/location-icon.png" alt="">
                                                <a href="https://www.google.com/maps/search/?api=1&query={{ urlencode($settingDataFromLayout->address) }}" target="_blank">{{\Illuminate\Support\Str::limit($settingDataFromLayout->address,20,"") }}</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <fieldset>
                                            <input type="name" name="name" id="name" placeholder="Name" autocomplete="on" required>
                                        </fieldset>
                                        <fieldset>
                                            <input type="text" name="email" id="email" pattern="[^ @]*@[^ @]*" placeholder="Your Email" required="">
                                        </fieldset>
                                        <fieldset>
                                            <input type="subject" name="subject" id="subject" placeholder="Subject" autocomplete="on">
                                        </fieldset>
                                    </div>
                                    <div class="col-lg-6">
                                        <fieldset>
                                            <textarea name="message" type="text" class="form-control" id="message" placeholder="Message" required=""></textarea>
                                        </fieldset>
                                    </div>
                                    <div class="col-lg-12" style="border-color: black !important;">
                                        <fieldset>
                                            <button type="submit" id="form-submit" class="main-button ">Mesajı Gönder</button>
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
    $(document).ready(function() {
        $("#contact").submit(function(e) {
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
                beforeSend: function() {
                    $("#form-submit").text("Sending...").prop("disabled", true); // Butonu devre dışı bırak
                },
                success: function(response) {
                    if (response.success) {
                        $("#form-submit").text("Mesaj Gönderildi ✅")
                            .css({
                                "border" : "1px solid #28a745",
                                "background-color": "#28a745", // Yeşil renk
                                "color": "#fff", // Yazı rengi beyaz
                                "transition": "background-color 0.5s ease-in-out"
                            }).prop("disabled", true); // Butonu tıklanamaz yap

                        form[0].reset(); // Formu sıfırla
                    }
                },
                error: function(xhr, status, error) {
                    $("#form-submit").text("Send Message Now").prop("disabled", false);
                    alert("Message sending failed! Please try again.");
                }
            });
        });
    });
</script>
