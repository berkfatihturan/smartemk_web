@extends('layouts.homeLayout2')

@section('style')
    <style>
        body{
           background-color: white;
        }

        .free-quote{
            padding: 50px 0px;
            margin-top: 59px !important;
            background-image : linear-gradient(90deg, rgba(0,0,0,0.3912158613445378) 0%, rgba(0,0,0,0.38001137955182074) 50%, rgba(0,0,0,0.42482930672268904) 100%),url("{{asset('assets')}}/img/itohdenki.jpg");
        }

        .section-heading{
            margin-bottom: 0 !important;
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
                        <h4>HAKKIMIZDA</h4>
                        <div class="line-dec"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container" style="margin-top: 50px">
    <div id="content" style="display: inline-block">
       @php $page = \App\Models\Pages::find(1); @endphp
        {!! $page->content !!}
    </div>
    </div>

@endsection
