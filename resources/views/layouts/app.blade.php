<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>{{ setting_by_key('title') }} | @lang('site.dashboard') </title>

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('company/company/nar-germany.png') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/css/bootstrap-datetimepicker.min.css">
    <link href="{{ asset('adminpanel/assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('adminpanel/assets/font-awesome/css/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('adminpanel/assets/css/animate.css') }}" rel="stylesheet">
    @if (app()->getLocale() == 'ar')
        <link href="{{ asset('adminpanel/assets/css/style-rtl.css') }}" rel="stylesheet">
    @else
        <link href="{{ asset('adminpanel/assets/css/style.css') }}" rel="stylesheet">
    @endif
    <link href="{{ asset('adminpanel/assets/css/custom.css') }}" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400&display=swap" rel="stylesheet">


    <script src="{{ asset('adminpanel/assets/jquery-1.11.1.min.js') }}"></script>
    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>


    <script type="text/javascript">
        window.Laravel = @php
            echo json_encode([
                'csrfToken' => csrf_token(),
                'siteUrlApi' => url('api'),
                'tokenApi',
            ]);
        @endphp
    </script>

    <style>
        * {
            font-family: 'Cairo', sans-serif;

        }

        #wrapper:-webkit-full-screen {
            cursor: zoom-out;
        }

        #wrapper:-moz-full-screen {
            cursor: zoom-out;
        }

        #wrapper:-ms-fullscreen {
            cursor: zoom-out;
        }

        #wrapper:fullscreen {
            cursor: zoom-out;
        }
    </style>

</head>


<body class="{{ Cookie::get('mini-navbar-class') }}" id="body_dashboard">
    {{-- {{dd(Cookie::get('mini-navbar-class'))}} --}}


    <input id="fscreen" type="hidden" value="<?php echo homepage_by_key('fullscreen'); ?>">
    <div id="wrapper">

        @include('backend.partials.navbar')
        <div id="page-wrapper" class="gray-bg">
            @include('backend.partials.topbar')
            <br>
            @include('backend.partials.notification')

            @yield('content')

            <div class="footer">
                <div class="pull-right">

                </div>
                <div>
                    <strong>@lang('site.Copyright')</strong> &copy; {{ date('Y') }}
                </div>
            </div>
        </div>
    </div>


    <!-- Scripts -->
    <!-- Mainly scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.1/moment.min.js"></script>

    <script src="{{ asset('adminpanel/assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('adminpanel/assets/js/plugins/metisMenu/jquery.metisMenu.js') }}"></script>
    <script src="{{ asset('adminpanel/assets/js/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ asset('adminpanel/assets/js/plugins/sweetalert/sweetalert.min.js') }}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="{{ asset('adminpanel/assets/js/inspinia.js') }}"></script>
    <script src="{{ asset('adminpanel/assets/js/plugins/pace/pace.min.js') }}"></script>



    <!-- Peity -->
    <script src="{{ asset('adminpanel/assets/js/plugins/peity/jquery.peity.min.js') }}"></script>
    <!-- Peity demo -->
    <script src="{{ asset('adminpanel/assets/js/demo/peity-demo.js') }}"></script>
    <!--data picker-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/js/bootstrap-datetimepicker.min.js">
    </script>

    <script type="text/javascript">
        $(function() {
            $('.datetimepicker').datetimepicker({
                format: 'LT'
            });
            $('#datetimepicker2').datetimepicker({
                format: 'LT'
            });
        });

        $('.navbar-minimalize').click(function() {
            $("body").toggleClass("mini-navbar");
            SmoothlyMenu();
            if ($("#body_dashboard").hasClass("mini-navbar")) {
                var data = {
                    // 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    "key": "mini-navbar-class",
                    "value": "mini-navbar",
                    "time": 200
                }
                $.get("{{ url('dashboard/setCookies') }}", data);
            } else {
                var data = {
                    // 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    "key": "mini-navbar-class",
                    "value": "",
                    "time": 200
                }
                $.get("{{ url('dashboard/setCookies') }}", data);
            }

        });
    </script>

    <script>
        function loadDoc() {

            setInterval(function() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                    }
                });
                var feedback = $.ajax({
                    type: "GET",
                    url: "{{ route('notifications_orders') }}",
                    async: false
                }).success(function(data) {

                    $('.noti_number').html(data);
                    //console.log(data)
                }).responseText;

            }, 3000);

        }

        loadDoc();
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/js/bootstrap-datetimepicker.min.js">
    </script>

    <script type="text/javascript">
        $(function() {
            $('#datetimepicker').datetimepicker({
                format: 'LT'
            });
            $('#datetimepicker2').datetimepicker({
                format: 'LT'
            });

        });
    </script>

    <script>
        function toggleFullscreen(elem) {
            elem = elem || document.documentElement;
            console.log(elem)
            if (!document.fullscreenElement && !document.mozFullScreenElement &&
                !document.webkitFullscreenElement && !document.msFullscreenElement) {
                if (elem.requestFullscreen) {
                    elem.requestFullscreen();
                } else if (elem.msRequestFullscreen) {
                    elem.msRequestFullscreen();
                } else if (elem.mozRequestFullScreen) {
                    elem.mozRequestFullScreen();
                } else if (elem.webkitRequestFullscreen) {
                    elem.webkitRequestFullscreen(Element.ALLOW_KEYBOARD_INPUT);
                }
            } else {
                if (document.exitFullscreen) {
                    document.exitFullscreen();
                } else if (document.msExitFullscreen) {
                    document.msExitFullscreen();
                } else if (document.mozCancelFullScreen) {
                    document.mozCancelFullScreen();
                } else if (document.webkitExitFullscreen) {
                    document.webkitExitFullscreen();
                }
            }
        }

        document.getElementById('btnFullscreen').addEventListener('click', function() {
            toggleFullscreen();
        });




        function requestFullScreen(element) {
            // Supports most browsers and their versions.
            var requestMethod = element.requestFullScreen || element.webkitRequestFullScreen || element
                .mozRequestFullScreen || element.msRequestFullScreen;

            if (requestMethod) { // Native full screen.
                requestMethod.call(element);
            } else if (typeof window.ActiveXObject !== "undefined") { // Older IE.
                var wscript = new ActiveXObject("WScript.Shell");
                if (wscript !== null) {
                    wscript.SendKeys("{F11}");
                }
            }
        }
    </script>



    @stack('js')
</body>

</html>
