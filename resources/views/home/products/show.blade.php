@extends('layouts.homeLayout')

@section('style')
    <style>
        .free-quote {
            padding: 50px 0px;
            margin-top: 100px !important;
            background-image: linear-gradient(90deg, rgba(0, 0, 0, 0.6) 0%, rgba(0, 0, 0, 0.6) 50%, rgba(0, 0, 0, 0.6) 100%), url("{{asset('assets')}}/img/itohdenki.jpg");
            box-shadow: rgba(0, 0, 0, 0.25) 0px 25px 50px -12px;
        }

        .section-heading {
            margin-bottom: 0 !important;
        }

        #content{
            margin-top: 50px;
        }

        .blog-main_img{
            position: relative;
            box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;
        }

        .blog-main_img img{
            border-radius: 15px;
            max-height: 400px;
        }
        .section-heading {
            padding-left: 15px
        }
        .section-heading h6{
            text-transform: none; font-size: 16px; font-weight: 500; line-height: normal;
        }
    </style>
@endsection

@section('content')

    <div id="free-quote" class="free-quote">
        <div class="container">
            <div class="row" style="align-items: center;">

                <div class="col-lg-6">
                    <div class="blog-main_img">
                        <img src="{{\Illuminate\Support\Facades\Storage::url($productData->image)}}" alt="">
                    </div>
                </div>

                <div class="col-lg-6" style="text-align: left; ">
                    <div class="section-heading  wow fadeIn" data-wow-duration="1s" data-wow-delay="0.3s">
                        <!--<h6>Get Your Free Quote</h6> -->
                        <h4 style="font-size: 40px;">{{$productData->name}}</h4>
                        <h6 style="">{{$productData->description}}</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="content" style="display: flex">
        <div class="container mt-10" style="display: inline-block">
            {!! $productData->content !!}
        </div>
    </div>



@endsection
