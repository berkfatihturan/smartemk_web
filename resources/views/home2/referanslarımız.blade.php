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

        .swiper-slide{
            width: none;
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
                        <h4 style="text-transform: uppercase;">Referanslarımız</h4>
                        <div class="line-dec"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container" style="margin-top: 50px; width: 90%; margin-bottom: 50px">
        <div class="row">
            <div class="swiper-slide_v3 col-lg-3 col-4">
                <div class="slider_v3-box"
                     style="background-image: url('{{asset('assets')}}/img/logo/793_defacto.jpg'); ">

                </div>
                <p style="margin-top: 7px;">DeFacto</p>
            </div>
            <div class="swiper-slide_v3 col-lg-3 col-4">
                <div class="slider_v3-box"
                     style="background-image: url('{{asset('assets')}}/img/logo/ykk.png');">

                </div>
                <p style="margin-top: 7px;">YKK</p>
            </div>
            <div class="swiper-slide_v3 col-lg-3 col-4">
                <div class="slider_v3-box"
                     style="background-image: url('{{asset('assets')}}/img/logo/panasonic.png');">

                </div>
                <p style="margin-top: 7px;">Panasonic</p>
            </div>
            <div class="swiper-slide_v3 col-lg-3 col-4">
                <div class="slider_v3-box"
                     style="background-image: url('{{asset('assets')}}/img/logo/855_arcelik.jpg');">

                </div>
                <p style="margin-top: 7px;">Arcelik</p>
            </div>
            <div class="swiper-slide_v3 col-lg-3 col-4">
                <div class="slider_v3-box"
                     style="background-image: url('{{asset('assets')}}/img/logo/hayat.png');">

                </div>
                <p style="margin-top: 7px;">Hayat</p>
            </div>
            <div class="swiper-slide_v3 col-lg-3 col-4">
                <div class="slider_v3-box"
                     style="background-image: url('{{asset('assets')}}/img/logo/tofaş.png');">

                </div>
                <p style="margin-top: 7px;">Tofaş</p>
            </div>

            <div class="swiper-slide_v3 col-lg-3 col-4">
                <div class="slider_v3-box"
                     style="background-image:url('{{asset('assets')}}/img/logo/petlas.jpeg');">

                </div>
                <p style="margin-top: 7px;">Petlas</p>
            </div>

            <div class="swiper-slide_v3 col-lg-3 col-4">
                <div class="slider_v3-box"
                     style="background-image:url('{{asset('assets')}}/img/logo/sas.png');">

                </div>
                <p style="margin-top: 7px;">SAS</p>
            </div>

            <div class="swiper-slide_v3 col-lg-3 col-4">
                <div class="slider_v3-box"
                     style="background-image:url('{{asset('assets')}}/img/logo/akgıda.png');">
                </div>
                <p style="margin-top: 7px;">Ak Gıda</p>
            </div>

            <div class="swiper-slide_v3 col-lg-3 col-4">
                <div class="slider_v3-box"
                     style="background-image:url('{{asset('assets')}}/img/logo/magna.webp');">
                </div>
                <p style="margin-top: 7px;">MAGNA</p>
            </div>

            <div class="swiper-slide_v3 col-lg-3 col-4">
                <div class="slider_v3-box"
                     style="background-image:url('{{asset('assets')}}/img/logo/caykur.png');">
                </div>
                <p style="margin-top: 7px;">Caykur</p>
            </div>

            <div class="swiper-slide_v3 col-lg-3 col-4">
                <div class="slider_v3-box"
                     style="background-image:url('{{asset('assets')}}/img/logo/ford.jpeg');">
                </div>
                <p style="margin-top: 7px;">Ford</p>
            </div>

            <div class="swiper-slide_v3 col-lg-3 col-4">
                <div class="slider_v3-box"
                     style="background-image:url('{{asset('assets')}}/img/logo/lila.jpg');">
                </div>
                <p style="margin-top: 7px;">Lila</p>
            </div>

            <div class="swiper-slide_v3 col-lg-3 col-4">
                <div class="slider_v3-box"
                     style="background-image:url('{{asset('assets')}}/img/logo/brisa.png');">
                </div>
                <p style="margin-top: 7px;">BriSA</p>
            </div>

            <div class="swiper-slide_v3 col-lg-3 col-4">
                <div class="slider_v3-box"
                     style="background-image:url('{{asset('assets')}}/img/logo/vestel.png');">
                </div>
                <p style="margin-top: 7px;">Vestel</p>
            </div>

            <div class="swiper-slide_v3 col-lg-3 col-4">
                <div class="slider_v3-box"
                     style="background-image:url('{{asset('assets')}}/img/logo/trendyol.png');">
                </div>
                <p style="margin-top: 7px;">Trendyol</p>
            </div>



            <div class="swiper-slide_v3 col-lg-3 col-4">
                <div class="slider_v3-box"
                     style="background-image:url('{{asset('assets')}}/img/logo/lokman.jpg');">
                </div>
                <p style="margin-top: 7px;">Lokman</p>
            </div>

            <div class="swiper-slide_v3 col-lg-3 col-4">
                <div class="slider_v3-box"
                     style="background-image:url('{{asset('assets')}}/img/logo/sancak.jpeg');">
                </div>
                <p style="margin-top: 7px;">Sancak</p>
            </div>

            <div class="swiper-slide_v3 col-lg-3 col-4">
                <div class="slider_v3-box"
                     style="background-image:url('{{asset('assets')}}/img/logo/ekol.webp');">
                </div>
                <p style="margin-top: 7px;">Ekol</p>
            </div>


            <div class="swiper-slide_v3 col-lg-3 col-4">
                <div class="slider_v3-box"
                     style="background-image:url('{{asset('assets')}}/img/logo/hepsiburada.png');">
                </div>
                <p style="margin-top: 7px;">HepsiBurada</p>
            </div>
        </div>

    </div>

@endsection
