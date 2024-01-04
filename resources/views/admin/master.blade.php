<!DOCTYPE html>
<html lang="en">

@include('admin.Inc.header')

<body>

    <!-- Preloader -->
    {{-- <div class="preloader-it">
		<div class="la-anim-1"></div>
	</div> --}}
    <!-- /Preloader -->
    @if (Request::is('login'))
        <div class="wrapper pa-0">
        @else
            <div class="wrapper theme-1-active pimary-color-blue">
    @endif
    <!-- Top Menu Items -->
    @if (Request::is('login'))
    @else
        @include('admin.Inc.nav')
    @endif

    @if (Request::is('login'))
    @else
        @include('admin.Inc.sidebar')
    @endif




    <!-- /Top Menu Items -->

    <!-- Left Sidebar Menu -->

    <!-- /Left Sidebar Menu -->

    <!-- Right Sidebar Menu -->

    <!-- Main Content -->
    @if (Request::is('login'))
        <div class="page-wrapper pa-0 ma-0 auth-page">
        @else
            <div class="page-wrapper">
    @endif

    @yield('admin_main_content')
    <!-- Footer -->
    @include('admin.Inc.footer')
    <!-- /Footer -->

    </div>
    <!-- /Main Content -->

    </div>
    <!-- /#wrapper -->

    <!-- JavaScript -->

    <!-- jQuery -->
    <script src="{{ asset('asset_admin/vendors/bower_components/jquery/dist/jquery.min.js') }}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{ asset('asset_admin/vendors/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript"
        src="{{ asset('asset_admin/vendors/bower_components/moment/min/moment-with-locales.min.js') }}"></script>
    <!-- Data table JavaScript -->
    <script src="{{ asset('asset_admin/vendors/bower_components/datatables/media/js/jquery.dataTables.min.js') }}"></script>

    <script src="{{ asset('asset_admin/dist/js/dataTables-data.js') }}"></script>
    <!-- Slimscroll JavaScript -->
    <script src="{{ asset('asset_admin/dist/js/jquery.slimscroll.js') }}"></script>

    <!-- Progressbar Animation JavaScript -->
    <script src="{{ asset('asset_admin/vendors/bower_components/waypoints/lib/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('asset_admin/vendors/bower_components/jquery.counterup/jquery.counterup.min.js') }}"></script>

    <!-- Fancy Dropdown JS -->
    <script src="{{ asset('asset_admin/dist/js/dropdown-bootstrap-extended.js') }}"></script>

    <!-- Sparkline JavaScript -->
    <script src="{{ asset('asset_admin/vendors/jquery.sparkline/dist/jquery.sparkline.min.js') }}"></script>

    <!-- Owl JavaScript -->
    <script src="{{ asset('asset_admin/vendors/bower_components/owl.carousel/dist/owl.carousel.min.js') }}"></script>

    <!-- Switchery JavaScript -->
    <script src="{{ asset('asset_admin/vendors/bower_components/switchery/dist/switchery.min.js') }}"></script>

    <!-- EChartJS JavaScript -->
    <script src="{{ asset('asset_admin/vendors/bower_components/echarts/dist/echarts-en.min.js') }}"></script>
    <script src="{{ asset('asset_admin/vendors/echarts-liquidfill.min.js') }}"></script>

    <!-- Toast JavaScript -->
    <script src="{{ asset('asset_admin/vendors/bower_components/jquery-toast-plugin/dist/jquery.toast.min.js') }}">
    </script>


    <!-- Bootstrap Colorpicker JavaScript -->
    <script
        src="{{ asset('asset_admin/vendors/bower_components/mjolnic-bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js') }}">
    </script>

    <!-- Bootstrap Datetimepicker JavaScript -->
    <script type="text/javascript"
        src="{{ asset('asset_admin/vendors/bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js') }}">
    </script>

    <!-- Bootstrap Daterangepicker JavaScript -->
    <script src="{{ asset('asset_admin/vendors/bower_components/bootstrap-daterangepicker/daterangepicker.js') }}">
    </script>
    <!-- Form Picker Init JavaScript -->
    <script src="{{ asset('asset_admin/dist/js/form-picker-data.js') }}"></script>
    <!-- Init JavaScript -->
    <script src="{{ asset('asset_admin/dist/js/init.js') }}"></script>
    <script src="{{ asset('asset_admin/dist/js/dashboard-data.js') }}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    @yield('extra_js')

</body>

</html>
