@isset($brand)
    @php $brandList = \App\Models\Brands::where('id',$brand->id)->get(); @endphp
@else
    @php $brandList = \App\Models\Brands::all(); @endphp
@endisset
<div class="our_partners section " style="margin-top:55px; height: auto">
    <div id="partnerSlider" class="swiper mainSlider" style="position:relative;">
        <div class="swiper-wrapper">
            @foreach($brandList as $brand)
                <div class="swiper-slide" style="display: flex; align-items: flex-start; height: 80vh">

                    <div class="swiper-slide-container">
                        <div class="slider-box"
                             style="background: rgba(0, 0, 0, 0.65) url('{{\Illuminate\Support\Facades\Storage::url($brand->background_image)}}') no-repeat center center;background-blend-mode: overlay; background-size: cover;">
                            <!-- <div style="height: 10%; font-size:18px; letter-spacing:.5px; color:white">Distribütörlüklerimiz</div>
                            -->
                            <div class="partner_slider_content"
                                 style="">
                                <h3
                                    style="font-size: 28px; font-weight:800; text-transform: uppercase; margin-bottom:5px; color: white">{{$brand->name}}</h3>
                                <p style="font-size:16px; color:#d8d9dd; margin-bottom:10px">{{$brand->description}}</p>
                            </div>
                        </div>

                    </div>

                </div>
            @endforeach
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
