<footer class="main-footer" style="display: none">
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">SmartEmk</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 0.1.1
    </div>
</footer>



<!-- jQuery -->
<script src="{{asset('assets')}}/admin/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('assets')}}/admin/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{asset('assets')}}/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="{{asset('assets')}}/admin/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="{{asset('assets')}}/admin/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="{{asset('assets')}}/admin/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="{{asset('assets')}}/admin/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('assets')}}/admin/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="{{asset('assets')}}/admin/plugins/moment/moment.min.js"></script>
<script src="{{asset('assets')}}/admin/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('assets')}}/admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="{{asset('assets')}}/admin/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="{{asset('assets')}}/admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="{{asset('assets')}}/admin/dist/js/adminlte.js"></script>
@yield('script_extra')
