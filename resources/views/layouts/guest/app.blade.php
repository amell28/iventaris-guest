<!DOCTYPE html>
<html class="no-js" lang="">

<head>
    <!-- CSS Start-->
    @include('layouts.guest.css')
    {{-- CSS End --}}
</head>

<body>
    <!-- ========================= preloader start ========================= -->
    <div class="preloader">
        <div class="loader">
            <div class="spinner">
                <div class="spinner-container">
                    <div class="spinner-rotator">
                        <div class="spinner-left">
                            <div class="spinner-circle"></div>
                        </div>
                        <div class="spinner-right">
                            <div class="spinner-circle"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- preloader end -->

    <!-- ========================= header start ========================= -->
    @include('layouts.guest.haeder')
    <!-- ========================= header end ========================= -->

    <!-- Start Main Content -->
    @yield('content')
    {{-- end main content --}}

    <!-- ========================= footer start ========================= -->
    @include('layouts.guest.footer')
    <!-- ========================= footer end ========================= -->

    <!-- ========================= scroll-top ========================= -->
    <a href="#" class="scroll-top btn-hover">
        <i class="lni lni-chevron-up"></i>
    </a>

    {{-- JSS start --}}
    @include('layouts.guest.js')
    {{-- JSS End --}}
</body>

</html>
