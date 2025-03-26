@extends('layouts.homeLayout')

@section('style')
    <style>
        .free-quote {
            padding: 50px 0px;
            margin-top: 100px !important;
            background-image: linear-gradient(90deg, rgba(0, 0, 0, 0.3912158613445378) 0%, rgba(0, 0, 0, 0.38001137955182074) 50%, rgba(0, 0, 0, 0.42482930672268904) 100%), url("{{asset('assets')}}/img/itohdenki.jpg");
        }

        .section-heading {
            margin-bottom: 0 !important;
        }

        footer {
            position: absolute;
            bottom: 0;
            left: 0;
            z-index: 999;
            width: 100%;
            margin-top: 212px;
        }
    </style>
@endsection

@section('content')
    <div class="content">

        <div id="page-header" class="free-quote">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 offset-lg-4">
                        <div class="section-heading  wow fadeIn" data-wow-duration="1s" data-wow-delay="0.3s">
                            <!--<h6>Get Your Free Quote</h6> -->
                            <h4>Haberler ve Projeler</h4>
                            <div class="line-dec"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div>
            @foreach($blogList->chunk(4) as $index => $blogChunk)
                @if($loop->first)
                    <div id="blog-{{$index}}" class="blog ">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-6 show-up wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s">

                                    <div class="blog-post">
                                        <div class="thumb">
                                            <a href="#"><img
                                                    src="{{\Illuminate\Support\Facades\Storage::url($blogChunk->first()->image)}}"
                                                    alt=""></a>
                                        </div>
                                        <div class="down-content">
                                            <span class="category">{{$blogChunk->first()->subject}}</span>
                                            <span class="date">{{$blogChunk->first()->created_at}}</span>
                                            <a href="{{route('home_blogs_show',['id' => $blogChunk->first()->id])}}">
                                                <h4>{{$blogChunk->first()->title}}</h4></a>
                                            <p>{{\Illuminate\Support\Str::limit($blogChunk->first()->description,120,"...")}}</p>
                                            <div style="float: none;" class="border-first-button"><a
                                                    href="{{route('home_blogs_show',['id' => $blogChunk->first()->id])}}">Daha
                                                    Fazla</a></div>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-lg-6 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s">
                                    <div class="blog-posts">
                                        <div class="row">
                                            @foreach($blogChunk as $blog)
                                                @if($loop->first)
                                                    @continue
                                                @endif
                                                <div class="col-lg-12 mb-3" style="max-height: 250px;">
                                                    <div class="post-item">
                                                        <div class="thumb">
                                                            <a href="{{route('home_blogs_show',['id' => $blog->id])}}"><img
                                                                    class="blog-mini-img"
                                                                    src="{{\Illuminate\Support\Facades\Storage::url($blog->image)}}"
                                                                    alt=""></a>
                                                        </div>
                                                        <div class="right-content">
                                                            <span class="category">{{$blog->subject}}</span>
                                                            <span class="date">{{$blog->created_at}}</span>
                                                            <a href="{{route('home_blogs_show',['id' => $blog->id])}}">
                                                                <h4>{{$blog->title}}</h4></a>
                                                            <p>{{\Illuminate\Support\Str::limit($blog->description,80,"...")}}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @elseif($index%3 == -1)
                    <div id="blog-{{$index}}" class="blog">
                        <div class="container">
                            <div class="row">
                                @foreach($blogChunk as $blog)
                                    <div class="col-lg-6 show-up wow fadeInUp" data-wow-duration="1s"
                                         data-wow-delay="0.3s">
                                        <div class="blog-post">
                                            <div class="thumb">
                                                <a href="#"><img
                                                        src="{{\Illuminate\Support\Facades\Storage::url($blog->image)}}"
                                                        alt=""></a>
                                            </div>
                                            <div class="down-content">
                                                <span class="category">{{$blog->subject}}</span>
                                                <span class="date">{{$blog->created_at}}</span>
                                                <a href="#"><h4>{{$blog->title}}</h4></a>
                                                <p>{{\Illuminate\Support\Str::limit($blog->description,120,"...")}}</p>
                                                <div style="float: none;" class="border-first-button"><a
                                                        href="{{route('home_blogs_show',['id' => $blog->id])}}">Daha
                                                        Fazla</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @else
                    <div id="blog-{{$index}}" class="blog @if($index == 1) pt-5 @else pt-0 @endif">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s">
                                    <div class="blog-posts">
                                        <div class="row">
                                            @foreach($blogChunk as $blog)
                                                <div class="col-lg-12 mb-3" style="max-height: 250px;">
                                                    <div class="post-item">
                                                        <div class="thumb">
                                                            <a href="{{route('home_blogs_show',['id' => $blog->id])}}"><img
                                                                    class="blog-mini-img"
                                                                    src="{{\Illuminate\Support\Facades\Storage::url($blog->image)}}"
                                                                    alt=""></a>
                                                        </div>
                                                        <div class="right-content">
                                                            <span class="category">{{$blog->subject}}</span>
                                                            <span class="date">{{$blog->created_at}}</span>
                                                            <a href="{{route('home_blogs_show',['id' => $blog->id])}}">
                                                                <h4>{{$blog->title}}</h4></a>
                                                            <p>{{\Illuminate\Support\Str::limit($blog->description,300,"...")}}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

            @endforeach
        </div>
    </div>



@endsection

@section('script')
    <script>
        // Footer'ı yalnızca kaydırıldığında güncelle
        function adjustFooterOnScroll() {
            const footer = document.getElementById("footer");
            const pageHeight = document.documentElement.scrollHeight; // Sayfa yüksekliği
            const windowHeight = window.innerHeight; // Görünür ekran yüksekliği

            if (pageHeight <= windowHeight) {
                footer.style.position = "absolute";
                footer.style.bottom = "0";
            } else {
                footer.style.position = "relative";
            }
        }

        // Sayfa kaydırıldığında footer'ı güncelle
        window.onscroll = adjustFooterOnScroll;

        // İlk yükleme sırasında kontrol et
        window.onload = adjustFooterOnScroll;


    </script>
@endsection
