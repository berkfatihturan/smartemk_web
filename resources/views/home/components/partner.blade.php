@php
    $brandList = \App\Models\Brands::all();
@endphp
<div class="our_partners section " style="margin-top:80px">
    <div id="partnerSlider" class="swiper mainSlider" style="position:relative;">
        <div class="swiper-wrapper">
            @foreach($brandList as $brand)
            <div class="swiper-slide" style="background: linear-gradient(110deg, {{$brand->second_color}} 60%, {{$brand->main_color}} 50%);">

                <div class="swiper-slide-container">
                    <div class="slider-box"
                         style="background: rgba(0, 0, 0, 0.65) url('{{\Illuminate\Support\Facades\Storage::url($brand->background_image)}}') no-repeat center center;background-blend-mode: overlay; background-size: cover;">
                        <!-- <div style="height: 10%; font-size:18px; letter-spacing:.5px; color:white">Distribütörlüklerimiz</div>
                        -->
                        <div style="height: 10%; font-size:18px; letter-spacing:.5px; color:white">Distribütörlüklerimiz</div>

                        <div class="partner_slider_content"
                             style="">
                            <h3
                                style="font-size: 28px; font-weight:800; text-transform: uppercase; margin-bottom:5px; color: white">{{$brand->name}}</h3>
                            <p style="font-size:16px; color:#d8d9dd; margin-bottom:10px">{{$brand->description}}</p>
                            <a href="{{route('home_brands_index',['id'=>$brand->id])}}"
                                class="btn-more_white btn-itohdenki" style="background-color: {{$brand->main_color}}">Daha
                                Fazla Bilgi</a>
                        </div>
                    </div>

                </div>

            </div>
            @endforeach
        </div>
        <div class="slider-bottom">
            <div class="partner-list">
                @foreach($brandList as $index => $brand)
                <div class="partner" data-slide-index="{{$index}}"
                     style="background-color: {{$brand->main_color}};">
                            <span
                                style="background: url('{{\Illuminate\Support\Facades\Storage::url($brand->image)}}') no-repeat center center;"></span>
                </div>
                @endforeach
            </div>
        </div>
    </div>

</div>



<script>
    document.addEventListener("DOMContentLoaded", function () {
        document.querySelectorAll(".partner_slider_content .btn-more_white").forEach(btn => {
            let bgColor = window.getComputedStyle(btn).backgroundColor;

            // RGB formatını kontrol et
            let rgb = bgColor.match(/\d+/g);
            if (rgb) {
                let brightness = (parseInt(rgb[0]) * 0.299) + (parseInt(rgb[1]) * 0.587) + (parseInt(rgb[2]) * 0.114);

                if (brightness < 128) {
                    btn.style.color = "white"; // Koyu renkli arka plan için beyaz yazı
                } else {
                    btn.style.color = "black"; // Açık renkli arka plan için siyah yazı
                }
            }
        });
    });
</script>
