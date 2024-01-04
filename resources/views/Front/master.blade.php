<!doctype html>
<html class="no-js" lang="en">
@include('Front.Inc.header')

<body>
    <!-- Site top Start -->
    @include('Front.Inc.nav')
    <!-- Site top End -->
    <!-- Content Area Start -->
    @yield('main_content')
    <!-- Content Area End -->
    <!-- Footer Area Start -->
    @include('Front.Inc.footer')
    <!-- Footer Area End -->
    <!-- Copyright Area Start -->
    <footer id="tl-copyright" class="tl-copyright">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <p class="copyright-text">IJHAB &copy; - 2021 </p>
                </div> <!-- Col End -->
                <div class="col-lg-3 ml-lg-auto text-lg-right">
                    <div class="copyright-menu">
                    </div> <!-- Copyright menu end -->
                </div> <!-- Col End -->
            </div> <!-- Row End -->
        </div> <!-- Container end -->
    </footer>
    <!-- Copyright Area End -->
    <div class="back-to-top" id="back-to-top" data-offset-top="10">
        <button class="btn btn-primary" title="Back to Top">
            <i class="fa fa-angle-double-up"></i><!-- icon end-->
        </button><!-- button end-->
    </div>
    <!-- Javascripts File
      =============================================================================-->
    <!-- initialize jQuery Library -->
    <script src="{{ asset('asset_front/js/jquery.js') }}"></script>
    <!-- Popper JS -->
    <script src="{{ asset('asset_front/js/popper.min.js') }}"></script>
    <!-- Bootstrap jQuery -->
    <script src="{{ asset('asset_front/js/bootstrap.min.js') }}"></script>
    <!-- Owl Carousel -->
    <script src="{{ asset('asset_front/js/owl.carousel.min.js') }}"></script>
    <!-- Waypoint -->
    <script src="{{ asset('asset_front/js/waypoint.js') }}"></script>
    <!-- Counter Up -->
    <script src="{{ asset('asset_front/js/jquery.counterup.js') }}"></script>
    <!-- Magnific Popup -->
    <script src="{{ asset('asset_front/js/jquery.magnific-popup.min.js') }}"></script>
    <!-- Isotope -->
    <script src="{{ asset('asset_front/js/isotope.pkgd.min.js') }}"></script>
    <!-- Smooth Scroll -->
    <script src="{{ asset('asset_front/js/smoothscroll.js') }}"></script>
    <!-- Select 2 Js -->
    <script src="{{ asset('asset_front/js/select2.min.js') }}"></script>
    <!-- Parallax Js -->
    <script src="{{ asset('asset_front/js/parallax.min.js') }}"></script>
    <!-- CountDown Js -->
    <script src="{{ asset('asset_front/js/countdown.js') }}"></script>
    <!-- wow Js -->
    <script src="{{ asset('asset_front/js/wow.min.js') }}"></script>
    <!-- Template Custom -->
    <script src="{{ asset('asset_front/js/main.js') }}"></script>
</body>

</html>
