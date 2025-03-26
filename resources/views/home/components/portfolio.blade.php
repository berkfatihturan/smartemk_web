<div id="portfolio" class="our-portfolio section">
    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                <div class="section-heading wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.3s">
                    <h6>Ürünlerimiz</h6>
                    <h4>Yeni Gelen <em>Ürünlerimiz</em></h4>
                    <div class="line-dec"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid wow fadeIn" data-wow-duration="1s" data-wow-delay="0.7s">
        <div class="row">
            <div class="col-lg-12">
                <div class="loop owl-carousel">
                    @php $products = \App\Models\Products::all() @endphp

                    @foreach($products as $product)
                    <div class="item">
                        <a href="{{route('home_products_show',['id' => $product->id])}}">
                            <div class="portfolio-item">
                                <div class="thumb">
                                    <img style="height: 340px;" src="{{\Illuminate\Support\Facades\Storage::url($product->image)}}" alt="">
                                </div>
                                <div class="down-content">
                                    <h4>{{$product->name}}</h4>
                                    <span>{{$product->keywords}}</span>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                    <div class="item">
                        <a href="#">
                            <div class="portfolio-item">
                                <div class="thumb">
                                    <img src="{{asset('assets')}}/images/portfolio-01.jpg" alt="">
                                </div>
                                <div class="down-content">
                                    <h4>Website Builder</h4>
                                    <span>Marketing</span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="item">
                        <a href="#">
                            <div class="portfolio-item">
                                <div class="thumb">
                                    <img src="{{asset('assets')}}/images/portfolio-02.jpg" alt="">
                                </div>
                                <div class="down-content">
                                    <h4>Website Builder</h4>
                                    <span>Marketing</span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="item">
                        <a href="#">
                            <div class="portfolio-item">
                                <div class="thumb">
                                    <img src="{{asset('assets')}}/images/portfolio-03.jpg" alt="">
                                </div>
                                <div class="down-content">
                                    <h4>Website Builder</h4>
                                    <span>Marketing</span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="item">
                        <a href="#">
                            <div class="portfolio-item">
                                <div class="thumb">
                                    <img src="{{asset('assets')}}/images/portfolio-04.jpg" alt="">
                                </div>
                                <div class="down-content">
                                    <h4>Website Builder</h4>
                                    <span>Marketing</span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
