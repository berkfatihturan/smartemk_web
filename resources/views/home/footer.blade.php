<footer id="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <p>Copyright © 2024 SmartEmk Co., Ltd. All Rights Reserved.
            </div>
        </div>
    </div>
</footer>


<!-- Scripts -->
<script src="{{asset('vendor')}}/jquery/jquery.min.js"></script>
<script src="{{asset('vendor')}}/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="{{asset('assets')}}/js/owl-carousel.js"></script>
<script src="{{asset('assets')}}/js/animation.js"></script>
<script src="{{asset('assets')}}/js/imagesloaded.js"></script>
<script src="{{asset('assets')}}/js/custom.js"></script>

<script>
    document.querySelectorAll('*').forEach(element => {
        if (window.getComputedStyle(element).color === 'rgb(254, 102, 78)') {
            element.style.color = 'red';
        }
    });
</script>

@yield('script')
