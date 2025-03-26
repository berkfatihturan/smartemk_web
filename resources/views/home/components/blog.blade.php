@php
    $blogList = \App\Models\Blogs::orderBy('created_at', 'desc')->take(4)->get();
@endphp
<div id="blog" class="blog">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 offset-lg-4  wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.3s">
                <div class="section-heading">
                    <h6>Yakın Zamanda </h6>
                    <h4>Haberler ve <em>Projeler</em></h4>
                    <div class="line-dec"></div>
                </div>
            </div>

            <div class="col-lg-6 show-up wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s">

                <div class="blog-post">
                    <div class="thumb">
                        <a href="#"><img src="{{\Illuminate\Support\Facades\Storage::url($blogList->first()->image)}}" alt=""></a>
                    </div>
                    <div class="down-content">
                        <span class="category">{{$blogList->first()->subject}}</span>
                        <span class="date">{{$blogList->first()->created_at}}</span>
                        <a href="{{route('home_blogs_show',['id' => $blogList->first()->id])}}"><h4>{{$blogList->first()->title}}</h4></a>
                        <p>{{\Illuminate\Support\Str::limit($blogList->first()->description,120,"...")}}</p>
                        <div style="float: none;" class="border-first-button"><a href="{{route('home_blogs_show',['id' => $blogList->first()->id])}}">Daha Fazla</a></div>
                    </div>
                </div>

            </div>
            <div class="col-lg-6 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s">
                <div class="blog-posts">
                    <div class="row">
                        @foreach($blogList as $blog)
                            @if($loop->first)
                                @continue
                            @endif
                        <div class="col-lg-12 mb-3" style="max-height: 250px;">
                            <div class="post-item">
                                <div class="thumb">
                                    <a href="{{route('home_blogs_show',['id' => $blog->id])}}"><img class="blog-mini-img" src="{{\Illuminate\Support\Facades\Storage::url($blog->image)}}" alt=""></a>
                                </div>
                                <div class="right-content">
                                    <span class="category">{{$blog->subject}}</span>
                                    <span class="date">{{$blog->created_at}}</span>
                                    <a href="{{route('home_blogs_show',['id' => $blog->id])}}"><h4>{{$blog->title}}</h4></a>
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
