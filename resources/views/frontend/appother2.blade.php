<!DOCTYPE html>
<html lang="en-US">
@include('frontend.head')

@include('backend.partials._font_style')

<body>

    <!-- Preloader Area Start
    ====================================================== -->
    <div id="mask">
        <div id="loader">
        </div>
    </div>
    <!-- =================================================
    Preloader Area End -->


    <!-- Header Area Start
    ====================================================== -->


    @include('frontend.headerOther')

    @yield('content')
    @include('frontend.footer')

</body>

</html>
