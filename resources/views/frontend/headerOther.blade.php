@php
$isAuth = \Auth::guard('customer')->check() ? 1 : 0;
$authCustomer = \Auth::guard('customer')->user();
@endphp
<?php $categories = getCategories(); ?>
<?php $currency = setting_by_key('currency'); ?>

<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
    integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous"> -->

<!--====================  Header area ====================-->
<div class="header-area header-sticky">
    <!--====================  Navigation top ====================-->

    <div class="navigation-top">
        <!--====================  navigation section ====================-->

        <div class="navigation-top-topbar pt-10 pb-10">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-4 col-md-6">
                        <!--=======  header top dropdown container  =======-->

                        <div class="headertop-dropdown-container justify-content-center justify-content-md-center">
                            <div class="header-top-single-dropdown">
                                <a href="javascript:void(0)" class="active-dropdown-trigger" id="language-options"> <img width="16" height="11" src="/assets/img/icons/en-gb.webp" alt="">

                                    @if(app()->getLocale() == "en")
                                    <span>@lang('site.en')</span>
                                    @elseif(app()->getLocale() == "ar")
                                    <span>@lang('site.ar')</span>
                                    @else
                                    <span>@lang('site.de')</span>
                                    @endif

                                </a>
                                <!--=======  dropdown menu items  =======-->

                                <div class="header-top-single-dropdown__dropdown-menu-items deactive-dropdown-menu">
                                    <ul>
                                        <?php $languages  = json_decode(setting_by_key("languages"), true); ?>
                                        @if(in_array("en" , $languages ) and app()->getLocale() != 'en')
                                        <li><a href="<?php echo url("localization/en"); ?>">@lang('site.en')</a> </li>
                                        @endif
                                        @if(in_array("ar" , $languages ) and app()->getLocale() != 'ar')
                                        <li><a href="<?php echo url("localization/ar"); ?>">@lang('site.ar')</a> </li>
                                        @endif
                                        @if(in_array("de" , $languages ) and app()->getLocale() != 'de')
                                        <li><a href="<?php echo url("localization/de"); ?>">@lang('site.de')</a> </li>
                                        @endif
                                    </ul>
                                </div>

                                <!--=======  End of dropdown menu items  =======-->
                            </div>
                            <span class="separator">|</span>
                            <div class="header-top-single-dropdown">
                                <a href="{{route('contactfrontend')}}" class="active-dropdown-trigger"> @lang('site.contact') </a>
                            </div>
                            <span class="separator">|</span>
                            <div class="header-top-single-dropdown">
                                <a href="#" class="active-dropdown-trigger"> @lang('site.about')</a>


                            </div>
                        </div>

                        <!--=======  End of header top dropdown container  =======-->
                    </div>
                    <div class="col-lg-4  offset-lg-4  col-md-6 text-center text-md-start">
                        <!--=======  header top social links  =======-->

                        <div class="header-top-social-links ml-xl-200">
                            <span class="follow-text mr-15"> @lang('site.follow_us'):</span>
                            <!--=======  social link small  =======-->

                            <ul class="social-link-small">
                                <li><a target="_blank" href="https://www.youtube.com/channel/UC6fvt2145MKXXvfTiEkY_vQ/playlists"><i class="ion-social-youtube"></i></a></li>
                                <li><a target="_blank" href="https://www.tiktok.com/@q.narjesalsham"><iconify-icon style="margin-bottom: -3px;" icon="ic:twotone-tiktok"></iconify-icon> </a></li>
                                <li><a target="_blank" href="https://www.instagram.com/q.narjesalsham/"><i class="ion-social-instagram-outline"></i></a></li>
                                <li><a target="_blank" href="https://www.facebook.com/q.narjesalsham/"><i class="ion-social-facebook"></i></a></li>
                            </ul>

                            <!--=======  End of social link small  =======-->
                        </div>


                        <!--=======  End of header top social links  =======-->
                    </div>

                </div>
            </div>
        </div>

        <!--====================  End of navigation section  ====================-->
        <div class="container-fluid" style="background:#e1f8cf ">
            <div class="row">

                <div class="col-lg-12 col-sm-12">
                    <!--====================  navigation top search ====================-->


                    <div class="navigation-top-search-area pt-10 pb-10" style="@if(app()->getLocale()=='ar') {{'direction:rtl;'}}  @endif">
                        <div class="row align-items-center">



                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 CuntainariconHeaderCustum" style="display: flex; flex-direction: row; flex-wrap: nowrap;justify-content: center;">


                                <div class="col-lg-2 col-md-2 col-sm-2      @if(app()->getLocale()=='de') iconHeaderCustum @else  iconHeaderCustumAr  @endif         " >
                                    @if (!$isAuth)
                                    <a href="{{route('ulogin')}}" class="text-center  stlogin-Hover">
                                        <svg version="1.1" id="Layer_4" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 500 500" style="width: 40%;enable-background:new 0 0 500 500;" xml:space="preserve">
                                            <style type="text/css">
                                                .stlogin0 {
                                                    fill: url(#SVGID_1_);
                                                }

                                                .stlogin1 {
                                                    fill: url(#SVGID_00000078753190771989843130000005965865990191243407_);
                                                }

                                                .stlogin2 {
                                                    fill: url(#SVGID_00000119100962677858640960000012204788545476012178_);
                                                }

                                                .stlogin3 {
                                                    fill: url(#SVGID_00000111174700799421035070000003869501450890265502_);
                                                }

                                                .stlogin4 {
                                                    fill: url(#SVGID_00000130648589606615472980000013851731261884655009_);
                                                }
                                            </style>
                                            <g>
                                                <linearGradient id="SVGID_1_" gradientUnits="userSpaceOnUse" x1="151.9204" y1="125.7158" x2="346.7987" y2="125.7158">
                                                    <stop offset="0" style="stop-color:#1E7030" />
                                                    <stop offset="0.6385" style="stop-color:#398E34" />
                                                    <stop offset="1" style="stop-color:#439A35" />
                                                </linearGradient>
                                                <path class="stlogin0 stloginhover" d="M167.03,176.2c7.24,19.8,18.98,36.58,35.66,49.74c25.79,20.37,57.04,22.68,85.2,5.77
                            c19.63-11.78,32.7-29.26,41.62-50.04c2.01-4.69,2.9-10.04,5.63-14.22c4.14-6.33,6.91-13.19,9.62-20.08
                            c2.92-7.44,3.13-15.08-2.14-21.67c-2.04-2.55-2.74-4.97-2.76-8.01c-0.04-18.07-0.97-36.06-5.93-53.58
                            c-7.59-26.78-24.21-44.53-51.53-51.79c-6.08-1.62-12.48-1.53-18.39-3.85h-20.55h-9.33c-0.05,0.26-0.07,0.51-0.09,0.77
                            c-2.77,0.39-5.55,0.71-8.31,1.16c-13.36,2.14-25.92,6.28-36.85,14.56c-15.49,11.76-22.85,28.17-26.72,46.61
                            c-3.32,15.77-3.76,31.77-3.81,47.8c0,1.66,0.43,3.43-0.92,4.89c-7.37,7.99-6.29,16.71-2.86,26.06
                            C157.88,159.38,163.7,167.12,167.03,176.2z M273.78,120.42c8.27,0.23,16.51-0.16,24.55-2.07c2.86-0.68,3.88,0.16,4.74,2.58
                            c1.14,3.21,2.64,6.29,3.83,9.49c1.09,2.9,2.95,3.74,5.85,2.85c3.41-1.04,6.86-1.95,10.29-2.93c7.13-2.03,12.75,2.92,10.78,10.16
                            c-1.83,6.69-4.21,13.36-8.71,18.87c-1.75,2.16-2.35,4.68-3.16,7.16c-7.67,23.12-20.3,42.51-41.59,55.37
                            c-9.49,5.73-20.73,8.81-33.65,8.72c-17.87-0.63-34.15-10.02-47.69-24.77c-10.23-11.14-17.48-24.07-22.08-38.47
                            c-2.37-7.45-8.27-13.06-10.39-20.62c-0.68-2.38-1.84-4.67-2.18-7.08c-0.81-5.69,3.48-9.75,9.15-9.01
                            c13.46,1.77,13.4,1.74,18.94-10.78c1.55-3.5,1.97-8.65,5.11-9.99c2.8-1.2,7.09,1.09,10.72,1.81
                            C229.93,116,251.65,119.77,273.78,120.42z" />

                                                <linearGradient id="SVGID_00000078753190771989843130000005965865990191243407_" gradientUnits="userSpaceOnUse" x1="258.6657" y1="338.52" x2="431.1268" y2="338.52">
                                                    <stop offset="0" style="stop-color:#1E7030" />
                                                    <stop offset="0.6385" style="stop-color:#398E34" />
                                                    <stop offset="1" style="stop-color:#439A35" />
                                                </linearGradient>
                                                <path class="stlogin1 stloginhover" d="M428.75,412.42
                            c-4.51-14.84-9.04-29.68-13.59-44.51c-11.78-38.4-23.57-76.79-35.35-115.2c-3.78-12.34-12.17-19.5-24.72-21.89
                            c-12.2-2.34-24.45-4.41-36.6-6.95c-3.04-0.63-4.33,0.02-5.76,2.62c-17.5,31.81-35.12,63.57-52.68,95.35
                            c-0.64,1.14-1.89,2.16-1.17,3.91c27.95,0,55.95,0.32,83.92-0.2c8.11-0.14,14.14,1.67,19.35,8.03c2.64,3.22,4.09,6,4.06,10.2
                            c-0.16,35-0.05,69.99-0.15,104.99c-0.01,3.26,0.5,4.69,4.25,4.59c9.63-0.29,19.29-0.16,28.93-0.08
                            c9.88,0.08,18.19-3.27,24.77-10.75c3.78-4.28,4.95-9.78,7.11-14.83v-6.54C430.33,418.26,429.62,415.32,428.75,412.42z" />

                                                <linearGradient id="SVGID_00000119100962677858640960000012204788545476012178_" gradientUnits="userSpaceOnUse" x1="116.259" y1="475.4021" x2="383.8829" y2="475.4021">
                                                    <stop offset="0" style="stop-color:#F2AA35" />
                                                    <stop offset="0.4002" style="stop-color:#D19230" />
                                                    <stop offset="1" style="stop-color:#996A28" />
                                                </linearGradient>
                                                <path class="stlogin2 stloginhover" d="M378.15,464.27
                            c-85.43,0.13-170.84,0.09-256.26,0.09c-0.78,0-1.56,0.08-2.34-0.01c-2.34-0.27-3.36,0.5-3.29,3.06c0.21,6.37,0.18,12.75,0.23,19.12
                            h267.02c0.07-5.59-0.2-11.22,0.3-16.78C384.25,465.04,382.49,464.26,378.15,464.27z" />

                                                <linearGradient id="SVGID_00000111174700799421035070000003869501450890265502_" gradientUnits="userSpaceOnUse" x1="164.9356" y1="401.7848" x2="341.7896" y2="401.7848">
                                                    <stop offset="0" style="stop-color:#F2AA35" />
                                                    <stop offset="0.4002" style="stop-color:#D19230" />
                                                    <stop offset="1" style="stop-color:#996A28" />
                                                </linearGradient>
                                                <path class="stlogin3 stloginhover" d="M336.82,350.11
                            c-27.69,0.14-55.39,0.07-83.08,0.07c-28.15,0-56.31,0.01-84.47,0c-2.3,0-4.35-0.6-4.33,3.32c0.19,32.21,0.14,64.41,0.05,96.62
                            c-0.01,2.73,0.89,3.34,3.44,3.34c56.31-0.08,112.63-0.12,168.94-0.03c3.4,0,4.42-0.82,4.4-4.39c-0.15-31.43-0.18-62.86,0.02-94.28
                            C341.81,350.6,340.43,350.09,336.82,350.11z" />

                                                <linearGradient id="SVGID_00000130648589606615472980000013851731261884655009_" gradientUnits="userSpaceOnUse" x1="68.8732" y1="338.2239" x2="241.4179" y2="338.2239">
                                                    <stop offset="0" style="stop-color:#1E7030" />
                                                    <stop offset="0.6385" style="stop-color:#398E34" />
                                                    <stop offset="1" style="stop-color:#439A35" />
                                                </linearGradient>
                                                <path class="stlogin4 stloginhover" d="M136.22,453.38
                            c3.86,0.08,4.53-1.24,4.52-4.74c-0.12-32.98,0.26-65.96-0.29-98.92c-0.14-8.66,1.84-15.11,8.62-20.51c2.69-2.15,4.97-3.51,8.53-3.5
                            c26.43,0.15,52.88,0.09,79.32,0.06c1.46,0,3.02,0.44,4.34-0.32c0.47-1.03-0.19-1.65-0.54-2.28c-18.01-32.6-36.09-65.16-53.99-97.83
                            c-1.62-2.95-3.57-2.35-5.79-1.89c-11.41,2.34-22.74,5.06-34.22,6.99c-14.68,2.48-23.22,10.83-27.46,24.95
                            C106.5,297.87,93.25,340.2,80.4,382.66c-3.68,12.15-8.09,24.11-10.68,36.59c-0.28,0.03-0.56,0.06-0.84,0.06v9.34l0.41,0.07h0.4
                            c3.79,15.77,14.28,24.28,30.61,24.52C112.27,453.41,124.25,453.11,136.22,453.38z" />
                                            </g>
                                        </svg>

                                        <p style="white-space: nowrap; padding-top: 0px;" class="text-center loginResponssiv stlogintitle">@lang('login.login')</p>

                                    </a>



                                    @else

                                    <li class="nav-item dropdown d-none d-md-inline-block d-lg-inline-block d-xl-inline-block">
                                        <a class=" dropdown-toggle stlogin-Hover" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="text-align: center;">
                                            <svg version="1.1" id="Layer_4" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 500 500" style="width: 40%;enable-background:new 0 0 500 500;" xml:space="preserve">
                                                <style type="text/css">
                                                    .stlogin0 {
                                                        fill: url(#SVGID_1_);
                                                    }

                                                    .stlogin1 {
                                                        fill: url(#SVGID_00000078753190771989843130000005965865990191243407_);
                                                    }

                                                    .stlogin2 {
                                                        fill: url(#SVGID_00000119100962677858640960000012204788545476012178_);
                                                    }

                                                    .stlogin3 {
                                                        fill: url(#SVGID_00000111174700799421035070000003869501450890265502_);
                                                    }

                                                    .stlogin4 {
                                                        fill: url(#SVGID_00000130648589606615472980000013851731261884655009_);
                                                    }
                                                </style>
                                                <g>
                                                    <linearGradient id="SVGID_1_" gradientUnits="userSpaceOnUse" x1="151.9204" y1="125.7158" x2="346.7987" y2="125.7158">
                                                        <stop offset="0" style="stop-color:#1E7030" />
                                                        <stop offset="0.6385" style="stop-color:#398E34" />
                                                        <stop offset="1" style="stop-color:#439A35" />
                                                    </linearGradient>
                                                    <path class="stlogin0 stloginhover" d="M167.03,176.2c7.24,19.8,18.98,36.58,35.66,49.74c25.79,20.37,57.04,22.68,85.2,5.77
                            c19.63-11.78,32.7-29.26,41.62-50.04c2.01-4.69,2.9-10.04,5.63-14.22c4.14-6.33,6.91-13.19,9.62-20.08
                            c2.92-7.44,3.13-15.08-2.14-21.67c-2.04-2.55-2.74-4.97-2.76-8.01c-0.04-18.07-0.97-36.06-5.93-53.58
                            c-7.59-26.78-24.21-44.53-51.53-51.79c-6.08-1.62-12.48-1.53-18.39-3.85h-20.55h-9.33c-0.05,0.26-0.07,0.51-0.09,0.77
                            c-2.77,0.39-5.55,0.71-8.31,1.16c-13.36,2.14-25.92,6.28-36.85,14.56c-15.49,11.76-22.85,28.17-26.72,46.61
                            c-3.32,15.77-3.76,31.77-3.81,47.8c0,1.66,0.43,3.43-0.92,4.89c-7.37,7.99-6.29,16.71-2.86,26.06
                            C157.88,159.38,163.7,167.12,167.03,176.2z M273.78,120.42c8.27,0.23,16.51-0.16,24.55-2.07c2.86-0.68,3.88,0.16,4.74,2.58
                            c1.14,3.21,2.64,6.29,3.83,9.49c1.09,2.9,2.95,3.74,5.85,2.85c3.41-1.04,6.86-1.95,10.29-2.93c7.13-2.03,12.75,2.92,10.78,10.16
                            c-1.83,6.69-4.21,13.36-8.71,18.87c-1.75,2.16-2.35,4.68-3.16,7.16c-7.67,23.12-20.3,42.51-41.59,55.37
                            c-9.49,5.73-20.73,8.81-33.65,8.72c-17.87-0.63-34.15-10.02-47.69-24.77c-10.23-11.14-17.48-24.07-22.08-38.47
                            c-2.37-7.45-8.27-13.06-10.39-20.62c-0.68-2.38-1.84-4.67-2.18-7.08c-0.81-5.69,3.48-9.75,9.15-9.01
                            c13.46,1.77,13.4,1.74,18.94-10.78c1.55-3.5,1.97-8.65,5.11-9.99c2.8-1.2,7.09,1.09,10.72,1.81
                            C229.93,116,251.65,119.77,273.78,120.42z" />

                                                    <linearGradient id="SVGID_00000078753190771989843130000005965865990191243407_" gradientUnits="userSpaceOnUse" x1="258.6657" y1="338.52" x2="431.1268" y2="338.52">
                                                        <stop offset="0" style="stop-color:#1E7030" />
                                                        <stop offset="0.6385" style="stop-color:#398E34" />
                                                        <stop offset="1" style="stop-color:#439A35" />
                                                    </linearGradient>
                                                    <path class="stlogin1 stloginhover" d="M428.75,412.42
                            c-4.51-14.84-9.04-29.68-13.59-44.51c-11.78-38.4-23.57-76.79-35.35-115.2c-3.78-12.34-12.17-19.5-24.72-21.89
                            c-12.2-2.34-24.45-4.41-36.6-6.95c-3.04-0.63-4.33,0.02-5.76,2.62c-17.5,31.81-35.12,63.57-52.68,95.35
                            c-0.64,1.14-1.89,2.16-1.17,3.91c27.95,0,55.95,0.32,83.92-0.2c8.11-0.14,14.14,1.67,19.35,8.03c2.64,3.22,4.09,6,4.06,10.2
                            c-0.16,35-0.05,69.99-0.15,104.99c-0.01,3.26,0.5,4.69,4.25,4.59c9.63-0.29,19.29-0.16,28.93-0.08
                            c9.88,0.08,18.19-3.27,24.77-10.75c3.78-4.28,4.95-9.78,7.11-14.83v-6.54C430.33,418.26,429.62,415.32,428.75,412.42z" />

                                                    <linearGradient id="SVGID_00000119100962677858640960000012204788545476012178_" gradientUnits="userSpaceOnUse" x1="116.259" y1="475.4021" x2="383.8829" y2="475.4021">
                                                        <stop offset="0" style="stop-color:#F2AA35" />
                                                        <stop offset="0.4002" style="stop-color:#D19230" />
                                                        <stop offset="1" style="stop-color:#996A28" />
                                                    </linearGradient>
                                                    <path class="stlogin2 stloginhover" d="M378.15,464.27
                            c-85.43,0.13-170.84,0.09-256.26,0.09c-0.78,0-1.56,0.08-2.34-0.01c-2.34-0.27-3.36,0.5-3.29,3.06c0.21,6.37,0.18,12.75,0.23,19.12
                            h267.02c0.07-5.59-0.2-11.22,0.3-16.78C384.25,465.04,382.49,464.26,378.15,464.27z" />

                                                    <linearGradient id="SVGID_00000111174700799421035070000003869501450890265502_" gradientUnits="userSpaceOnUse" x1="164.9356" y1="401.7848" x2="341.7896" y2="401.7848">
                                                        <stop offset="0" style="stop-color:#F2AA35" />
                                                        <stop offset="0.4002" style="stop-color:#D19230" />
                                                        <stop offset="1" style="stop-color:#996A28" />
                                                    </linearGradient>
                                                    <path class="stlogin3 stloginhover" d="M336.82,350.11
                            c-27.69,0.14-55.39,0.07-83.08,0.07c-28.15,0-56.31,0.01-84.47,0c-2.3,0-4.35-0.6-4.33,3.32c0.19,32.21,0.14,64.41,0.05,96.62
                            c-0.01,2.73,0.89,3.34,3.44,3.34c56.31-0.08,112.63-0.12,168.94-0.03c3.4,0,4.42-0.82,4.4-4.39c-0.15-31.43-0.18-62.86,0.02-94.28
                            C341.81,350.6,340.43,350.09,336.82,350.11z" />

                                                    <linearGradient id="SVGID_00000130648589606615472980000013851731261884655009_" gradientUnits="userSpaceOnUse" x1="68.8732" y1="338.2239" x2="241.4179" y2="338.2239">
                                                        <stop offset="0" style="stop-color:#1E7030" />
                                                        <stop offset="0.6385" style="stop-color:#398E34" />
                                                        <stop offset="1" style="stop-color:#439A35" />
                                                    </linearGradient>
                                                    <path class="stlogin4 stloginhover" d="M136.22,453.38
                            c3.86,0.08,4.53-1.24,4.52-4.74c-0.12-32.98,0.26-65.96-0.29-98.92c-0.14-8.66,1.84-15.11,8.62-20.51c2.69-2.15,4.97-3.51,8.53-3.5
                            c26.43,0.15,52.88,0.09,79.32,0.06c1.46,0,3.02,0.44,4.34-0.32c0.47-1.03-0.19-1.65-0.54-2.28c-18.01-32.6-36.09-65.16-53.99-97.83
                            c-1.62-2.95-3.57-2.35-5.79-1.89c-11.41,2.34-22.74,5.06-34.22,6.99c-14.68,2.48-23.22,10.83-27.46,24.95
                            C106.5,297.87,93.25,340.2,80.4,382.66c-3.68,12.15-8.09,24.11-10.68,36.59c-0.28,0.03-0.56,0.06-0.84,0.06v9.34l0.41,0.07h0.4
                            c3.79,15.77,14.28,24.28,30.61,24.52C112.27,453.41,124.25,453.11,136.22,453.38z" />
                                                </g>
                                            </svg>
                                            <p style="white-space: nowrap;  padding-top: 0px;" class="text-center loginResponssiv stlogintitle">
                                                {{$authCustomer["name"]}}
                                            </p>

                                            <input type="hidden" id="cId" value="{{$authCustomer['id']}}">


                                        </a>
                                        <div class="dropdown-menu dropdown-menuheader" aria-labelledby="navbarDropdown">
                                            <a class="stlogintitle" style="color: black !important; display: flex; align-items: center; justify-content: flex-end; flex-direction: row-reverse; padding: 5px; font-size: 15px;" id="myAccount" class="dropdown-item" href="#">@lang("login.my_account")
                                            <svg version="1.1" id="Layer_4" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 500 500" style="padding: 5px; width: 26%;enable-background:new 0 0 500 500;" xml:space="preserve">
                                                <style type="text/css">
                                                    .stlogin0 {
                                                        fill: url(#SVGID_1_);
                                                    }

                                                    .stlogin1 {
                                                        fill: url(#SVGID_00000078753190771989843130000005965865990191243407_);
                                                    }

                                                    .stlogin2 {
                                                        fill: url(#SVGID_00000119100962677858640960000012204788545476012178_);
                                                    }

                                                    .stlogin3 {
                                                        fill: url(#SVGID_00000111174700799421035070000003869501450890265502_);
                                                    }

                                                    .stlogin4 {
                                                        fill: url(#SVGID_00000130648589606615472980000013851731261884655009_);
                                                    }
                                                </style>
                                                <g>
                                                    <linearGradient id="SVGID_1_" gradientUnits="userSpaceOnUse" x1="151.9204" y1="125.7158" x2="346.7987" y2="125.7158">
                                                        <stop offset="0" style="stop-color:#1E7030" />
                                                        <stop offset="0.6385" style="stop-color:#398E34" />
                                                        <stop offset="1" style="stop-color:#439A35" />
                                                    </linearGradient>
                                                    <path class="stlogin0 stloginhover" d="M167.03,176.2c7.24,19.8,18.98,36.58,35.66,49.74c25.79,20.37,57.04,22.68,85.2,5.77
                            c19.63-11.78,32.7-29.26,41.62-50.04c2.01-4.69,2.9-10.04,5.63-14.22c4.14-6.33,6.91-13.19,9.62-20.08
                            c2.92-7.44,3.13-15.08-2.14-21.67c-2.04-2.55-2.74-4.97-2.76-8.01c-0.04-18.07-0.97-36.06-5.93-53.58
                            c-7.59-26.78-24.21-44.53-51.53-51.79c-6.08-1.62-12.48-1.53-18.39-3.85h-20.55h-9.33c-0.05,0.26-0.07,0.51-0.09,0.77
                            c-2.77,0.39-5.55,0.71-8.31,1.16c-13.36,2.14-25.92,6.28-36.85,14.56c-15.49,11.76-22.85,28.17-26.72,46.61
                            c-3.32,15.77-3.76,31.77-3.81,47.8c0,1.66,0.43,3.43-0.92,4.89c-7.37,7.99-6.29,16.71-2.86,26.06
                            C157.88,159.38,163.7,167.12,167.03,176.2z M273.78,120.42c8.27,0.23,16.51-0.16,24.55-2.07c2.86-0.68,3.88,0.16,4.74,2.58
                            c1.14,3.21,2.64,6.29,3.83,9.49c1.09,2.9,2.95,3.74,5.85,2.85c3.41-1.04,6.86-1.95,10.29-2.93c7.13-2.03,12.75,2.92,10.78,10.16
                            c-1.83,6.69-4.21,13.36-8.71,18.87c-1.75,2.16-2.35,4.68-3.16,7.16c-7.67,23.12-20.3,42.51-41.59,55.37
                            c-9.49,5.73-20.73,8.81-33.65,8.72c-17.87-0.63-34.15-10.02-47.69-24.77c-10.23-11.14-17.48-24.07-22.08-38.47
                            c-2.37-7.45-8.27-13.06-10.39-20.62c-0.68-2.38-1.84-4.67-2.18-7.08c-0.81-5.69,3.48-9.75,9.15-9.01
                            c13.46,1.77,13.4,1.74,18.94-10.78c1.55-3.5,1.97-8.65,5.11-9.99c2.8-1.2,7.09,1.09,10.72,1.81
                            C229.93,116,251.65,119.77,273.78,120.42z" />

                                                    <linearGradient id="SVGID_00000078753190771989843130000005965865990191243407_" gradientUnits="userSpaceOnUse" x1="258.6657" y1="338.52" x2="431.1268" y2="338.52">
                                                        <stop offset="0" style="stop-color:#1E7030" />
                                                        <stop offset="0.6385" style="stop-color:#398E34" />
                                                        <stop offset="1" style="stop-color:#439A35" />
                                                    </linearGradient>
                                                    <path class="stlogin1 stloginhover" d="M428.75,412.42
                            c-4.51-14.84-9.04-29.68-13.59-44.51c-11.78-38.4-23.57-76.79-35.35-115.2c-3.78-12.34-12.17-19.5-24.72-21.89
                            c-12.2-2.34-24.45-4.41-36.6-6.95c-3.04-0.63-4.33,0.02-5.76,2.62c-17.5,31.81-35.12,63.57-52.68,95.35
                            c-0.64,1.14-1.89,2.16-1.17,3.91c27.95,0,55.95,0.32,83.92-0.2c8.11-0.14,14.14,1.67,19.35,8.03c2.64,3.22,4.09,6,4.06,10.2
                            c-0.16,35-0.05,69.99-0.15,104.99c-0.01,3.26,0.5,4.69,4.25,4.59c9.63-0.29,19.29-0.16,28.93-0.08
                            c9.88,0.08,18.19-3.27,24.77-10.75c3.78-4.28,4.95-9.78,7.11-14.83v-6.54C430.33,418.26,429.62,415.32,428.75,412.42z" />

                                                    <linearGradient id="SVGID_00000119100962677858640960000012204788545476012178_" gradientUnits="userSpaceOnUse" x1="116.259" y1="475.4021" x2="383.8829" y2="475.4021">
                                                        <stop offset="0" style="stop-color:#F2AA35" />
                                                        <stop offset="0.4002" style="stop-color:#D19230" />
                                                        <stop offset="1" style="stop-color:#996A28" />
                                                    </linearGradient>
                                                    <path class="stlogin2 stloginhover" d="M378.15,464.27
                            c-85.43,0.13-170.84,0.09-256.26,0.09c-0.78,0-1.56,0.08-2.34-0.01c-2.34-0.27-3.36,0.5-3.29,3.06c0.21,6.37,0.18,12.75,0.23,19.12
                            h267.02c0.07-5.59-0.2-11.22,0.3-16.78C384.25,465.04,382.49,464.26,378.15,464.27z" />

                                                    <linearGradient id="SVGID_00000111174700799421035070000003869501450890265502_" gradientUnits="userSpaceOnUse" x1="164.9356" y1="401.7848" x2="341.7896" y2="401.7848">
                                                        <stop offset="0" style="stop-color:#F2AA35" />
                                                        <stop offset="0.4002" style="stop-color:#D19230" />
                                                        <stop offset="1" style="stop-color:#996A28" />
                                                    </linearGradient>
                                                    <path class="stlogin3 stloginhover" d="M336.82,350.11
                            c-27.69,0.14-55.39,0.07-83.08,0.07c-28.15,0-56.31,0.01-84.47,0c-2.3,0-4.35-0.6-4.33,3.32c0.19,32.21,0.14,64.41,0.05,96.62
                            c-0.01,2.73,0.89,3.34,3.44,3.34c56.31-0.08,112.63-0.12,168.94-0.03c3.4,0,4.42-0.82,4.4-4.39c-0.15-31.43-0.18-62.86,0.02-94.28
                            C341.81,350.6,340.43,350.09,336.82,350.11z" />

                                                    <linearGradient id="SVGID_00000130648589606615472980000013851731261884655009_" gradientUnits="userSpaceOnUse" x1="68.8732" y1="338.2239" x2="241.4179" y2="338.2239">
                                                        <stop offset="0" style="stop-color:#1E7030" />
                                                        <stop offset="0.6385" style="stop-color:#398E34" />
                                                        <stop offset="1" style="stop-color:#439A35" />
                                                    </linearGradient>
                                                    <path class="stlogin4 stloginhover" d="M136.22,453.38
                            c3.86,0.08,4.53-1.24,4.52-4.74c-0.12-32.98,0.26-65.96-0.29-98.92c-0.14-8.66,1.84-15.11,8.62-20.51c2.69-2.15,4.97-3.51,8.53-3.5
                            c26.43,0.15,52.88,0.09,79.32,0.06c1.46,0,3.02,0.44,4.34-0.32c0.47-1.03-0.19-1.65-0.54-2.28c-18.01-32.6-36.09-65.16-53.99-97.83
                            c-1.62-2.95-3.57-2.35-5.79-1.89c-11.41,2.34-22.74,5.06-34.22,6.99c-14.68,2.48-23.22,10.83-27.46,24.95
                            C106.5,297.87,93.25,340.2,80.4,382.66c-3.68,12.15-8.09,24.11-10.68,36.59c-0.28,0.03-0.56,0.06-0.84,0.06v9.34l0.41,0.07h0.4
                            c3.79,15.77,14.28,24.28,30.61,24.52C112.27,453.41,124.25,453.11,136.22,453.38z" />
                                                </g>
                                            </svg>
                                              
                                        
                                        
                                        </a>
                                            {{-- <a class="dropdown-item stlogintitle" href="#">@lang("login.my_information")</a> --}}
                                            <div class="dropdown-divider"></div>
                                            <a class="stcard-Hover" style="color: black !important; display: flex; align-items: center; justify-content: flex-end; flex-direction: row-reverse; padding: 5px; font-size: 15px;" id="orderBook" class="dropdown-item" href="#">@lang("login.order_book")
                                            <svg version="1.1" id="Layer_4" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 500 500" style=" padding: 5px; width: 26%;   enable-background:new 0 0 500 500;" xml:space="preserve">
                                            <style type="text/css">
                                                .stcard0 {
                                                    fill: url(#SVGID_1_);
                                                }

                                                .stcard1 {
                                                    fill: url(#SVGID_00000029734770312655367650000005196745397210690476_);
                                                }

                                                .stcard2 {
                                                    fill: url(#SVGID_00000009582834817561062340000015554216244909175700_);
                                                }
                                            </style>
                                            <linearGradient id="" gradientUnits="userSpaceOnUse" x1="275.8624" y1="51.0691" x2="415.8126" y2="51.0691">
                                                <stop offset="0" style="stop-color:#F2AA35" />
                                                <stop offset="0.4002" style="stop-color:#D19230" />
                                                <stop offset="1" style="stop-color:#996A28" />
                                            </linearGradient>
                                            <path class="stcard0 stcardhover" d="M337.56,97.31c5.41-7.9,12.21-14.41,20.21-19.65c4.49-2.94,9.23-5.42,14.4-7.64
                                                c-9.13-5.77-18.96-9.65-28.38-14.38c2.57,0.35,5.07,0.88,7.6,1.33c9.49,1.72,18.73,4.12,26.72,9.89c0.92,0.66,1.73,0.34,2.62,0.06
                                                c7.73-2.4,15.6-4.22,23.61-5.37c3.78-0.54,7.56-1.11,11.47-1.69c-0.26-0.45-0.38-0.71-0.54-0.94c-5.32-8.16-12.26-14.75-20.07-20.43
                                                c-11.13-8.1-23.18-14.35-36.6-17.82c-13.88-3.59-28.12-4.56-42.29-5.87c-13.23-1.22-25.61-4.99-37.28-11.27h-1.72
                                                c-1.44,1.09-1.72,2.49-1.21,4.16c2.62,8.7,4.63,17.56,6.85,26.36c4.7,18.6,12.96,35.27,26.5,49.05
                                                c7.02,7.15,15.12,12.66,24.94,15.34C335.86,98.84,336.69,98.58,337.56,97.31z" />
                                            <linearGradient id="" gradientUnits="userSpaceOnUse" x1="318.207" y1="136.5103" x2="493.0706" y2="136.5103">
                                                <stop offset="0" style="stop-color:#F2AA35" />
                                                <stop offset="0.4002" style="stop-color:#D19230" />
                                                <stop offset="1" style="stop-color:#996A28" />
                                            </linearGradient>
                                            <path class="stcard1 stcardhover" d="M491.84,49.84
                                                        c-1.41-1.08-2.8-0.76-4.2,0.05c-0.74,0.43-1.53,0.78-2.29,1.16c-7.35,3.62-15.09,6.14-23.04,8.01c-16.09,3.78-32.58,4.78-48.91,6.88
                                                        c-11.09,1.42-22.05,3.39-32.7,6.92c-22.05,7.31-37.7,21.6-47.19,42.78c-10.43,23.29-15.48,47.69-15.28,73.19
                                                        c0,1.08-0.03,2.15,0.01,3.23c0.24,9.25,0.52,18.49,3,27.49c0.31,1.11,0.69,2.19,1.42,3.09c0.84,1.04,1.86,1.59,3.2,0.98
                                                        c1.35-0.61,1.93-1.64,1.6-3.13c-0.14-0.63-0.26-1.26-0.42-1.89c-1.17-4.53-1.8-9.12-2.02-13.79c-0.54-11.75,1.45-23.11,5.16-34.21
                                                        c3.5-10.46,8.68-19.87,16.65-27.68c13.17-12.89,29.8-18.84,46.95-23.81c0.85-0.25,1.45-0.09,1.75,0.7c0.3,0.8-0.4,1.13-0.95,1.45
                                                        c-0.37,0.21-0.77,0.36-1.16,0.55c-5.42,2.59-10.9,5.05-16.24,7.78c-15.81,8.09-27.36,20.32-34.69,36.48
                                                        c-1.68,3.72-2.93,7.64-2.72,11.83c0.2,4.01,2.38,5.51,6.19,4.32c0.75-0.23,1.5-0.48,2.23-0.75c4.56-1.72,9.22-3.07,13.98-4.09
                                                        c13.33-2.87,26.96-3.72,40.38-5.98c12.64-2.13,24.53-6.14,35.31-13.18c20.6-13.44,33.6-32.62,41.7-55.44
                                                        c4.65-13.1,7.26-26.77,10.83-40.17c0.75-2.83,1.67-5.62,2.42-8.45C493.19,52.61,493.37,51.01,491.84,49.84z" />
                                            <linearGradient id="" gradientUnits="userSpaceOnUse" x1="6.9294" y1="298.28" x2="462.3065" y2="298.28">
                                                <stop offset="0" style="stop-color:#1E7030" />
                                                <stop offset="0.6385" style="stop-color:#398E34" />
                                                <stop offset="1" style="stop-color:#439A35" />
                                            </linearGradient>
                                            <path class="stcard2 stcardhover" d="M459.75,158.25
                                                    c-0.45-0.64-1.18-1.57-2.27-2.55c-4.36,4.01-9.07,7.65-14.13,10.96c-8.08,5.27-16.98,9.24-26.96,11.98h14.19
                                                    c-6.9,24.27-13.76,48.37-20.64,72.45c-0.14,0.48-0.27,0.96-0.41,1.44h-44.3c0-23.62,0-47.25,0-70.87c-2.12,0.03-4.98,0.3-8.21,1.28
                                                    c-2.42,0.73-4.42,1.68-5.97,2.55c0,22.35,0,44.7,0,67.05h-65.5v-73.89h26.77c0.41-9.08,1.48-18.05,3.2-26.88
                                                    c-61.41,0-126.81,0.01-188.23,0.1c-3.7,0.01-4.99-1.01-5.7-4.56c-2.49-12.29-5.3-24.52-8.06-36.77c-1.74-7.7-6.33-11.95-13.75-11.99
                                                    c-26.65-0.14-53.28-0.13-79.92,0.01c-5.67,0.03-9.8,3.16-11.94,8.43c-3.61,8.93,2.99,18.06,13.14,18.1
                                                    c21.61,0.09,43.23,0.08,64.83-0.02c2.6-0.02,3.86,0.59,4.45,3.3c15.38,69.63,30.82,139.25,46.36,208.83
                                                    c0.72,3.2,0.39,4.77-2.79,6.44c-14.99,7.91-22.63,24.88-19.54,42.5c2.78,15.97,17.02,29.2,33.62,31.47
                                                    c8.33,1.15,16.72,0.09,25.44,0.79c-28.55,7.72-35.85,30.72-32.34,48.12c3.69,18.34,21.79,32.51,40.19,31.54
                                                    c21.24-1.14,37.1-16.33,38.56-37.82c0.06-0.8,0.08-1.58,0.08-2.38c0-0.09,0.01-0.18,0.01-0.26c0-0.06-0.01-0.12-0.01-0.18
                                                    c0-0.94-0.04-1.86-0.11-2.8c-0.01-0.13-0.02-0.27-0.03-0.41c-0.09-0.93-0.2-1.85-0.35-2.78c-0.02-0.13-0.04-0.27-0.07-0.41
                                                    c-0.16-0.92-0.35-1.84-0.57-2.76c-0.03-0.13-0.07-0.25-0.1-0.38c-0.24-0.93-0.51-1.84-0.83-2.75c-0.03-0.11-0.08-0.22-0.11-0.33
                                                    c-0.33-0.93-0.69-1.84-1.09-2.75c-0.03-0.07-0.06-0.15-0.1-0.22c-0.4-0.92-0.85-1.81-1.33-2.7c-0.03-0.04-0.05-0.09-0.07-0.13
                                                    c-0.49-0.89-1.03-1.75-1.59-2.61c-0.05-0.09-0.11-0.18-0.16-0.26c-0.55-0.83-1.16-1.64-1.78-2.43c-0.06-0.07-0.1-0.15-0.16-0.22
                                                    c-0.05-0.06-0.1-0.11-0.14-0.17c-0.15-0.18-0.3-0.35-0.44-0.52c-0.22-0.27-0.44-0.53-0.68-0.79c-0.19-0.22-0.39-0.43-0.59-0.65
                                                    c-0.13-0.15-0.27-0.3-0.41-0.45c-0.05-0.05-0.11-0.1-0.16-0.16c-0.27-0.28-0.55-0.55-0.84-0.83c-0.17-0.17-0.34-0.34-0.52-0.5
                                                    c-0.36-0.34-0.75-0.68-1.12-1.01c-0.08-0.06-0.14-0.12-0.22-0.19c-0.02-0.02-0.05-0.04-0.08-0.06c-0.12-0.11-0.24-0.21-0.37-0.31
                                                    c-0.14-0.12-0.27-0.24-0.42-0.36c-0.14-0.11-0.29-0.23-0.44-0.34c-0.04-0.03-0.09-0.06-0.13-0.1c-0.16-0.12-0.31-0.24-0.48-0.36
                                                    c-0.07-0.06-0.15-0.12-0.22-0.18c-0.17-0.13-0.35-0.26-0.53-0.38c-0.13-0.1-0.26-0.18-0.39-0.27c-0.13-0.09-0.26-0.18-0.39-0.27
                                                    c-0.13-0.09-0.25-0.18-0.38-0.27c-0.05-0.04-0.12-0.08-0.18-0.13c-0.21-0.13-0.43-0.26-0.66-0.4c-0.16-0.1-0.33-0.21-0.5-0.31
                                                    c-0.08-0.05-0.15-0.1-0.23-0.14c-0.07-0.05-0.15-0.08-0.22-0.13c-0.58-0.34-1.18-0.69-1.79-1.01c-0.22-0.12-0.44-0.24-0.68-0.36
                                                    c-0.74-0.37-1.49-0.74-2.27-1.09c-0.03-0.01-0.04-0.02-0.07-0.03c-0.35-0.15-0.72-0.3-1.08-0.46c-0.14-0.06-0.29-0.11-0.43-0.18
                                                    c-0.06-0.02-0.11-0.04-0.16-0.06c-0.09-0.03-0.18-0.06-0.27-0.1c-0.3-0.11-0.59-0.23-0.9-0.34c-0.17-0.06-0.35-0.12-0.53-0.19
                                                    c-0.04-0.01-0.09-0.03-0.14-0.05c-0.21-0.07-0.41-0.14-0.62-0.2c-0.07-0.03-0.15-0.06-0.22-0.08c-0.34-0.13-0.71-0.24-1.07-0.34
                                                    c-0.09-0.03-0.18-0.06-0.27-0.08c-0.08-0.03-0.17-0.05-0.25-0.08c-0.12-0.03-0.23-0.07-0.35-0.1c-0.28-0.08-0.58-0.15-0.87-0.23
                                                    c-0.32-0.09-0.63-0.17-0.96-0.25c-0.68-0.17-1.36-0.33-2.07-0.48h176.46c-0.03,0.01-0.07,0.01-0.09,0.03
                                                    c-26.52,6.67-36.14,28.38-32.85,47.34c3.12,17.98,20.87,32.7,39.61,32.34c20.37-0.4,36.42-15,39.13-35.8
                                                    c2.09-16.04-6.82-37.66-33.89-43.97c-0.22-0.05-0.42-0.11-0.65-0.16h0.69c7.58,0.02,14.31,0.14,21.03-0.03
                                                    c7.55-0.18,13.24-6.08,13.22-13.32c-0.04-7.26-5.76-12.95-13.33-13.26c-1.33-0.05-2.67-0.01-3.99-0.01h-234
                                                    c-1.47,0-2.96,0.07-4.43-0.06c-7.01-0.58-12.41-6.37-12.41-13.24c0-6.89,5.36-12.68,12.37-13.27c1.47-0.13,2.95-0.06,4.43-0.06
                                                    h234.43c10.64,0,14.51-2.89,17.45-13.21c14.35-50.2,28.62-100.44,43.05-150.62c3.13-10.85,5.59-21.9,9.73-32.44
                                                    c0.2-0.49,0.5-1.37,0.62-2.49C462.64,162.38,460.55,159.4,459.75,158.25z M381.7,458.1c0.03,7.19-5.94,13.25-13.13,13.34
                                                    c-7.36,0.1-13.56-6.1-13.46-13.46c0.09-7.2,6.16-13.16,13.35-13.12C375.66,444.88,381.67,450.9,381.7,458.1z M193.43,458
                                                    c0.09,7.18-5.84,13.3-13.03,13.44c-7.36,0.15-13.61-5.99-13.57-13.35c0.04-7.2,6.06-13.21,13.24-13.23
                                                    C187.27,444.82,193.35,450.8,193.43,458z M351.06,266.71c0,23.87,0,47.75,0,71.62c-21.83-0.02-43.66-0.05-65.5-0.05v-71.57H351.06z
                                                    M271.39,338.27c-20.26,0-40.52,0.01-60.78,0.03v-71.59h60.78V338.27z M271.39,252.54H210.6v-73.89h60.78V252.54z M128.91,178.64
                                                    h67.52v73.89H145.1c-5.41-24.41-10.82-48.81-16.23-73.22C128.83,179.18,128.88,179.01,128.91,178.64z M163.3,334.93
                                                    c-5.01-22.75-10.04-45.48-15.07-68.22h48.2v71.59c-9.43,0.01-18.87,0-28.3,0.01C165.45,338.31,163.97,337.99,163.3,334.93z
                                                    M386.18,334.47c-0.8,2.82-1.81,3.88-5,3.88c-5.32-0.01-10.63-0.01-15.95-0.01c0-23.88,0-47.75,0-71.63h40.25
                                                    C399.03,289.3,392.55,311.87,386.18,334.47z" />
                                        </svg>
                                        
                                           </a>
                                            <div class="dropdown-divider"></div>
                                            <a class="stwishlist-Hover" style="color: black !important; display: flex; align-items: center; justify-content: flex-end; flex-direction: row-reverse; padding: 5px; font-size: 15px;"  class="dropdown-item" href="#">@lang('site.wishlist')
                                            <svg version="1.1" id="Layer_4" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 500 500" style="padding: 5px; width: 26%;enable-background:new 0 0 500 500;" xml:space="preserve">
                                            <style type="text/css">
                                                .stwishlist0 {
                                                    fill: #D88D21;
                                                }

                                                .stwishlist1 {
                                                    fill: #BA761C;
                                                }
                                            </style>
                                            <path class="stwishlist0 stwishlisthover" d="M250,121.55v357.93c-3.61-0.04-7.21-1.32-10.22-3.87c-16.04-13.56-31.92-27.29-47.82-41.02
                                            c-16.49-14.24-33.22-28.22-49.59-42.59c-14.22-12.51-28.54-24.91-42.38-37.86c-10.74-10.05-21.08-20.43-31.09-31.19
                                            c-20.27-21.74-38.21-45.13-50.03-72.6c-6.71-15.57-11.12-31.79-11.56-49.04c-0.44-17.1-0.76-34.11,3.67-50.78
                                            c10.32-38.77,31.51-69.17,67.74-88.12c20.15-10.53,41.65-14.98,64.07-13.76c27.89,1.52,52.31,12.06,73.18,30.9
                                            c12.69,11.45,23.1,24.58,31.82,39.18C248.8,120.42,249.41,121.37,250,121.55z" />
                                            <path class="stwishlist1 stwishlisthover" d="M492.92,174.84v30.34c-0.17,0.01-0.33,0.02-0.49,0.05c-0.12,16.18-4.93,31.3-11.32,45.88
                                            c-12.39,28.3-31.29,52.05-52.23,74.5c-26.56,28.5-56.32,53.44-85.58,78.94c-25.96,22.62-52.3,44.76-78.18,67.46
                                            c-1.66,1.46-3.42,2.83-5.19,4.15c-2.99,2.25-6.47,3.35-9.93,3.31V121.55c0.71,0.26,1.34-0.69,2.58-2.86
                                            c6.61-11.61,14.57-22.28,23.87-31.74c20.29-20.65,44.36-34.2,73.62-37.6c22.54-2.61,44.19,0.74,64.82,9.73
                                            c25.39,11.07,44.81,29.11,58.9,52.97c8.11,13.76,13.37,28.56,16.91,44.05c1.39,6.11,1.52,12.31,1.71,18.51l0.18-0.07L492.92,174.84z
                                            " />
                                        </svg>
                                        
                                           </a>
                                            <div class="dropdown-divider"></div>
                                            <a class="paypersaleHover" style="color: black !important; display: flex; align-items: center; justify-content: flex-end; flex-direction: row-reverse; padding: 5px; font-size: 15px;"  class="dropdown-item" href="#">@lang('site.paypersale')
                                            <svg version="1.1" id="Layer_4" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 500 500" style="padding: 5px; width: 26%; enable-background:new 0 0 500 500;" xml:space="preserve">
                                            <style type="text/css">
                                                .stpaypersale0 {
                                                    fill: #FEFEFE;
                                                }

                                                .stpaypersale1 {
                                                    fill: #F2AA35;
                                                }

                                                .stpaypersale2 {
                                                    fill: url(#SVGID_1_);
                                                }

                                                .stpaypersale3 {
                                                    fill: url(#SVGID_00000033363936087066273400000013978253593533097902_);
                                                }

                                                .stpaypersale4 {
                                                    fill: #4E8E1E;
                                                }

                                                .stpaypersale5 {
                                                    fill: #5EAA24;
                                                }

                                                .stpaypersale6 {
                                                    fill: #4E8F1E;
                                                }

                                                .stpaypersale7 {
                                                    fill: #030303;
                                                }

                                                .stpaypersale8 {
                                                    fill: #020202;
                                                }

                                                .stpaypersale9 {
                                                    fill: #7DD43E;
                                                }

                                                .stpaypersale10 {
                                                    fill: #7BD33D;
                                                }

                                                .stpaypersale11 {
                                                    fill: #99DC69;
                                                }

                                                .stpaypersale12 {
                                                    fill: #8FDA5A;
                                                }

                                                .stpaypersale13 {
                                                    fill: #D0E9BF;
                                                }

                                                .stpaypersale14 {
                                                    fill: #4F9020;
                                                }

                                                .stpaypersale15 {
                                                    fill: #EFF0F0;
                                                }

                                                .stpaypersale16 {
                                                    fill: #EEF0EF;
                                                }

                                                .stpaypersale17 {
                                                    fill: #EFF0EF;
                                                }
                                            </style>
                                            <path class="stpaypersale0 stpaypersalehover" d="M120.93,254.8c-12.16-0.86-24.33-1.69-36.48-2.66c-1.8-0.14-5.02,0.99-4.82-2.21c0.2-3.19,3.3-1.21,4.68-1.63
                                        c12.56,0.88,24.72,1.7,36.89,2.59c1.55,0.11,3.86-0.21,3.49,2.42C124.39,255.54,122.42,254.9,120.93,254.8z" />
                                            <path class="stpaypersale0 stpaypersalehover" d="M97.67,288.38c-1.53-1.53-0.05-2.76,1.16-3.83c7.96-7.07,15.91-14.14,23.84-21.23c0.91-0.81,1.81-1.55,3.1-1.1
                                        c0.81,0.28,1.17,0.96,1.21,1.8c-0.14,1.15-1.02,1.73-1.8,2.42c-7.86,6.96-15.71,13.95-23.54,20.94
                                        C100.46,288.44,99.12,289.83,97.67,288.38z" />
                                            <path class="stpaypersale0 stpaypersalehover" d="M127.43,246.42c-5.21-7.12-10.39-14.25-15.57-21.38c-0.92-1.28-2.09-2.71-0.15-3.94
                                        c1.68-1.07,2.58,0.43,3.42,1.57c5.19,7.13,10.36,14.27,15.53,21.42c0.52,0.72,1.26,1.34,1.12,2.84c-0.21,1.25-1.31,1.71-2.74,1.12
                                        C128.38,247.79,127.88,247.03,127.43,246.42z" />
                                            <path class="stpaypersale0 stpaypersalehover" d="M157.88,223.17c-5.02,8.47-10.03,16.94-15.06,25.41c-0.4,0.68-0.92,1.27-1.83,1.24
                                        c-0.69,0.04-1.29-0.13-1.72-0.7c-0.9-1.23-0.06-2.22,0.51-3.2c3.89-6.58,7.78-13.15,11.68-19.73c0.99-1.67,1.97-3.34,3.02-4.99
                                        c0.71-1.14,1.76-1.64,2.95-0.78C158.38,221.1,158.52,222.09,157.88,223.17z" />
                                            <path class="stpaypersale0 stpaypersalehover" d="M151.39,252.19c11.51-4.36,23.04-8.68,34.56-13.03c1.68-0.63,3.05-0.71,3.6,1.3c-0.07,1.34-0.86,1.88-1.91,2.28
                                        c-11.64,4.4-23.27,8.83-34.91,13.21c-1.38,0.52-2.98,0.86-3.53-1.08C148.71,253.16,150.2,252.63,151.39,252.19z" />
                                            <path class="st1" d="M199.61,210.34c0.77,2.06,0.38,4.07-1.37,5.69c-1.15,1.07-2.5,1.25-3.96,1.25c-37.1,0-74.2,0.01-111.28-0.02
                                        c-3.6-0.01-5.52-1.92-5.5-5.12c0.02-3.18,1.95-5.02,5.59-5.02c18.61-0.04,37.22-0.02,55.84-0.02c18.35,0,36.71,0.03,55.06-0.03
                                        C196.61,207.07,198.68,207.87,199.61,210.34z" />
                                            <path class="stpaypersale1 stpaypersalehover" d="M77.65,187.84c-1.05-3.79,1.39-6.5,5.89-6.5c17.84-0.03,35.66-0.02,53.5-0.02h1.95
                                        c18.23,0,36.45,0.03,54.67-0.02c3.27-0.01,5.68,0.93,6.21,4.46c0.45,2.98-1.49,5.35-4.49,5.71c-0.78,0.09-1.56,0.04-2.34,0.04
                                        c-36.31,0-72.63-0.02-108.95,0.02C81.12,191.54,78.56,191.14,77.65,187.84z" />
                                            <path class="stpaypersale0 stpaypersalehover" d="M188.09,315.82c5.77,8.01,11.32,16.18,17.18,24.13c2.16,2.94,1.72,4.73-1.2,6.6c-3.39,2.18-6.78,4.41-9.85,6.99
                                        c-3.1,2.59-4.9,1.56-6.87-1.32c-5.6-8.13-11.35-16.16-17.06-24.22c-0.8-1.14-1.36-2.51-2.83-3.3c-4.32,5.72-8.65,11.39-12.9,17.11
                                        c-1.14,1.54-2.3,2.85-4.44,2.48c-2.44-0.41-2.87-2.4-3.27-4.32c-5.89-27.55-11.73-55.11-17.65-82.65c-0.42-1.93-0.53-3.66,1.19-4.91
                                        c1.72-1.26,3.42-0.71,5.06,0.35c24.64,15.96,49.28,31.9,73.92,47.85c1.62,1.04,2.81,2.32,2.37,4.46c-0.45,2.18-2.2,2.74-4.02,3.14
                                        c-6.09,1.32-12.16,2.84-18.31,3.82C185.85,312.61,186.53,313.65,188.09,315.82z" />
                                            <path class="stpaypersale0 stpaypersalehover" d="M429.73,280.64v-4.38c-5.96,2.94-11.45,5.8-17.1,8.33c-2.31,1.03-2.89,2.37-2.89,4.74
                                        c0,24.6-0.13,49.22-0.2,73.82c-0.02,6.78,0,6.78-6.65,6.78H76.08c-1.56,0-3.13-0.05-4.69,0.03c-3,0.16-4.75-0.99-4.69-4.21
                                        c0.05-2.59,0.11-5.19,0.11-7.79c0.01-63.29,0-126.58,0.02-189.87c0-2.85-0.45-5.68-0.09-8.56c0.34-2.61,1.65-3.71,4.1-3.68
                                        c2.34,0.02,4.68,0.23,7.03,0.23c35.83-0.03,71.66-0.07,107.49-0.13c18.37-0.03,36.74-0.08,55.11-0.14c1.36-0.01,2.85,0.47,3.88-1.07
                                        c4.03-6.03,8.09-12.02,12.14-18.02c-1.22-1.1-2.45-0.67-3.56-0.67c-63.06-0.02-126.14-0.02-189.2-0.02c-1.04,0-2.08,0.04-3.12,0.13
                                        c-10.52,0.91-14.12,4.85-14.12,15.52c-0.01,73.98-0.01,147.94-0.01,221.91c0,11.88,4.23,16.16,16.18,16.4c0.65,0.02,1.3,0,1.95,0
                                        c115.71,0,231.42,0,347.13-0.02c2.33,0,4.7-0.11,7-0.45c5.65-0.83,9.06-4.16,10.36-9.69c0.57-2.44,0.63-4.9,0.63-7.37
                                        C429.73,341.85,429.73,311.24,429.73,280.64z M237.96,141.94c2.56-0.14,4.14,1.17,4.27,3.89c0.08,2.54-1.2,3.94-3.67,4.07
                                        c-2.59,0.13-4.22-1.1-4.28-3.84C234.22,143.6,235.54,142.06,237.96,141.94z" />
                                            <path class="stpaypersale0 stpaypersalehover" d="M468.53,397.19c-59.92,0.12-119.85,0.09-179.76,0.09c-1.05,0-2.09,0.01-3.13,0.01c-2.15,0-3.24,1.1-2.86,3.19
                                        c0.74,4.07-1.28,4.83-4.83,4.8c-18.24-0.12-36.47-0.05-54.71-0.05c-8.46,0-16.93-0.03-25.4,0.02c-2.82,0.02-4.67-0.81-4.14-4.05
                                        c0.53-3.29-1.14-3.95-4.03-3.95c-60.83,0.05-121.66,0.05-182.5-0.01c-3.38-0.01-4.28,1.36-4.02,4.49
                                        c0.98,11.49,8.79,18.47,20.98,18.47c70.74,0.02,141.47,0.01,212.21,0.01v0.27h76.97c44.94,0,89.88,0.01,134.82-0.02
                                        c2.33-0.01,4.68-0.13,7-0.42c10.29-1.28,17.55-9.06,17.84-18.45C473.07,397.97,472.03,397.18,468.53,397.19z M64.23,410.27
                                        c-5.32,0.08-10.65,0.09-15.96,0.04c-0.7,0-1.67-0.15-1.51-1.27c0.12-0.86,0.96-0.8,1.54-0.81c2.72-0.05,5.44-0.02,8.17-0.02v-0.03
                                        c2.6,0,5.19-0.03,7.79,0.02c0.72,0.02,1.75-0.02,1.75,1.03C66,410.28,64.88,410.25,64.23,410.27z" />
                                            <path class="stpaypersale0 stpaypersalehover" d="M492.75,233.56c-39.93,20.62-79.82,41.31-119.71,62.01c-21.21,11.01-42.41,22.05-63.6,33.08
                                        c-4.5,2.35-4.51,2.37-6.84-2.12c-5.14-9.92-10.31-19.82-15.36-29.77c-1.04-2.06-2.42-3.55-4.32-4.83
                                        c-9.9-6.71-19.73-13.51-29.59-20.28c-17.69-11.9-35.37-23.82-53.12-35.65c-2.87-1.91-1.54-3.55-0.24-5.45
                                        c10.54-15.49,21.05-30.97,31.57-46.47c27.97-41.21,55.94-82.42,83.9-123.63c3.26-4.8,3.22-4.8,8.22-1.41
                                        c15.71,10.68,31.43,21.32,47.14,32c1.06,0.72,2.01,1.58,3.02,2.38c14.23,9.18,28.25,18.7,42.11,28.42
                                        c5.61-1.79,10.48-5.08,15.69-7.69c2.24-1.12,3.44-0.78,4.6,1.48c9.52,18.49,19.12,36.93,28.68,55.39c0.24,0.45,0.28,0.99,0.42,1.48
                                        c5.95,11.22,11.94,22.44,17.87,33.68c3.82,7.23,7.43,14.59,11.41,21.72C496.23,230.82,495.55,232.11,492.75,233.56z" />
                                            <linearGradient id="" gradientUnits="userSpaceOnUse" x1="46.4785" y1="262.9674" x2="429.736" y2="262.9674">
                                                <stop offset="0" style="stop-color:#F2AA35" />
                                                <stop offset="0.4002" style="stop-color:#D19230" />
                                                <stop offset="1" style="stop-color:#996A28" />
                                            </linearGradient>
                                            <path class="stpaypersale2 stpaypersalehover" d="M429.73,280.64v-4.38c-5.96,2.94-11.45,5.8-17.1,8.33c-2.31,1.03-2.89,2.37-2.89,4.74
                                        c0,24.6-0.13,49.22-0.2,73.82c-0.02,6.78,0,6.78-6.65,6.78H76.08c-1.56,0-3.13-0.05-4.69,0.03c-3,0.16-4.75-0.99-4.69-4.21
                                        c0.05-2.59,0.11-5.19,0.11-7.79c0.01-63.29,0-126.58,0.02-189.87c0-2.85-0.45-5.68-0.09-8.56c0.34-2.61,1.65-3.71,4.1-3.68
                                        c2.34,0.02,4.68,0.23,7.03,0.23c35.83-0.03,71.66-0.07,107.49-0.13c18.37-0.03,36.74-0.08,55.11-0.14c1.36-0.01,2.85,0.47,3.88-1.07
                                        c4.03-6.03,8.09-12.02,12.14-18.02c-1.22-1.1-2.45-0.67-3.56-0.67c-63.06-0.02-126.14-0.02-189.2-0.02c-1.04,0-2.08,0.04-3.12,0.13
                                        c-10.52,0.91-14.12,4.85-14.12,15.52c-0.01,73.98-0.01,147.94-0.01,221.91c0,11.88,4.23,16.16,16.18,16.4c0.65,0.02,1.3,0,1.95,0
                                        c115.71,0,231.42,0,347.13-0.02c2.33,0,4.7-0.11,7-0.45c5.65-0.83,9.06-4.16,10.36-9.69c0.57-2.44,0.63-4.9,0.63-7.37
                                        C429.73,341.85,429.73,311.24,429.73,280.64z M237.96,141.94c2.56-0.14,4.14,1.17,4.27,3.89c0.08,2.54-1.2,3.94-3.67,4.07
                                        c-2.59,0.13-4.22-1.1-4.28-3.84C234.22,143.6,235.54,142.06,237.96,141.94z" />
                                            <linearGradient id="" gradientUnits="userSpaceOnUse" x1="3.0945" y1="408.8231" x2="472.9667" y2="408.8231">
                                                <stop offset="0" style="stop-color:#F2AA35" />
                                                <stop offset="0.4002" style="stop-color:#D19230" />
                                                <stop offset="1" style="stop-color:#996A28" />
                                            </linearGradient>
                                            <path class="stpaypersale3 stpaypersalehover" d="M468.53,397.19
                                        c-59.92,0.12-119.85,0.09-179.76,0.09c-1.05,0-2.09,0.01-3.13,0.01c-2.15,0-3.24,1.1-2.86,3.19c0.74,4.07-1.28,4.83-4.83,4.8
                                        c-18.24-0.12-36.47-0.05-54.71-0.05c-8.46,0-16.93-0.03-25.4,0.02c-2.82,0.02-4.67-0.81-4.14-4.05c0.53-3.29-1.14-3.95-4.03-3.95
                                        c-60.83,0.05-121.66,0.05-182.5-0.01c-3.38-0.01-4.28,1.36-4.02,4.49c0.98,11.49,8.79,18.47,20.98,18.47
                                        c70.74,0.02,141.47,0.01,212.21,0.01v0.27h76.97c44.94,0,89.88,0.01,134.82-0.02c2.33-0.01,4.68-0.13,7-0.42
                                        c10.29-1.28,17.55-9.06,17.84-18.45C473.07,397.97,472.03,397.18,468.53,397.19z M64.23,410.27c-5.32,0.08-10.65,0.09-15.96,0.04
                                        c-0.7,0-1.67-0.15-1.51-1.27c0.12-0.86,0.96-0.8,1.54-0.81c2.72-0.05,5.44-0.02,8.17-0.02v-0.03c2.6,0,5.19-0.03,7.79,0.02
                                        c0.72,0.02,1.75-0.02,1.75,1.03C66,410.28,64.88,410.25,64.23,410.27z" />
                                            <path class="stpaypersale4 stpaypersalehover" d="M492.75,233.56c-39.93,20.62-79.82,41.31-119.71,62.01c-21.21,11.01-42.41,22.05-63.6,33.08
                                        c-4.5,2.35-4.51,2.37-6.84-2.12c-5.14-9.92-10.31-19.82-15.36-29.77c-1.04-2.06-2.42-3.55-4.32-4.83
                                        c-9.9-6.71-19.73-13.51-29.59-20.28c0.02-4.31,3.39-6.85,5.38-10.11c0.6-0.98,1.39-1.9,2.64-2.06c0.13-0.02,0.27-0.03,0.41-0.03
                                        c0.07,0.02,0.15,0.04,0.22,0.06c2.75,0.73,4.95,2.36,7.12,4.05c0.33,0.26,0.66,0.52,0.99,0.78c0.28,0.23,0.57,0.45,0.86,0.67
                                        c4.18,4.67,4.15,4.63,9.84,1.84c1.98-0.97,3.78-2.49,6.16-2.49c0.09,0,0.19,0,0.29,0.01c1.5,0.59,1.94,2.03,2.62,3.27
                                        c4.21,7.78,8.28,15.63,12.21,23.56c2.29,4.62,2.58,4.74,7.51,4.07c4.54-0.63,8.47,0.51,11.84,3.71c3.87,3.68,4.39,3.66,9.13,0.94
                                        c7.34-4.21,14.98-7.86,22.5-11.73c23.96-12.33,47.76-24.96,71.76-37.22c11.12-5.69,22.1-11.65,33.26-17.28
                                        c2.82-1.42,3.78-3.21,2.98-6.24c-1.28-4.85,0.2-9.06,3.73-12.42c2.61-2.49,2.73-4.83,1.07-7.97c-4.01-7.59-8.17-15.11-11.92-22.83
                                        c-0.69-1.43-1.62-2.8-1.72-4.46c-0.01-0.06-0.02-0.13-0.02-0.2v-0.07c3.27-4.39,7.62-6.78,13.13-7
                                        c5.95,11.22,11.94,22.44,17.87,33.68c3.82,7.23,7.43,14.59,11.41,21.72C496.23,230.82,495.55,232.11,492.75,233.56z" />
                                            <path class="stpaypersale5 stpaypersalehover" d="M373.82,93.41c-1.12,4.94-4.34,8.56-7.65,12.13c-0.02,0.02-0.03,0.04-0.05,0.05c-0.08,0.02-0.16,0.05-0.23,0.06
                                        c-0.16,0.04-0.31,0.06-0.48,0.07c-0.14,0-0.28-0.01-0.42-0.02h-0.01c-7.46-4.03-14.2-9.16-21.25-13.83
                                        c-0.65-0.43-1.29-0.89-1.88-1.39c-3.6-3.09-6.96-4.39-11.24-0.6c-3.29,2.91-7.77,3.16-11.89,1.8c-3.35-1.11-5.26-0.24-7.14,2.61
                                        c-10.17,15.45-20.71,30.64-31.07,45.96c-16.27,24.06-32.57,48.09-48.98,72.05c-2.24,3.27-3.19,5.87-0.24,9.29
                                        c3.34,3.87,3.31,8.68,2.02,13.36c-0.71,2.58,0,4.06,2.09,5.59c8.21,5.99,17.03,11.09,25.13,17.25c0.09,0.09,0.19,0.16,0.28,0.24
                                        c0.16,0.13,0.31,0.24,0.45,0.38c0.35,0.3,0.64,0.63,0.7,1.11c0.02,0.16,0.02,0.33-0.02,0.52c-4.38,2.76-5.93,7.61-8.63,11.62
                                        c-17.69-11.9-35.37-23.82-53.12-35.65c-2.87-1.91-1.54-3.55-0.24-5.45c10.54-15.49,21.05-30.97,31.57-46.47
                                        c27.97-41.21,55.94-82.42,83.9-123.63c3.26-4.8,3.22-4.8,8.22-1.41c15.71,10.68,31.43,21.32,47.14,32
                                        C371.85,91.75,372.81,92.61,373.82,93.41z" />
                                            <path class="stpaypersale5 stpaypersalehover" d="M465.32,172.49c-4.6,1.68-8.99,3.73-12.63,7.1c-0.16,0.11-0.32,0.16-0.48,0.16c-0.14,0-0.28-0.04-0.42-0.13
                                        c-0.03-0.02-0.06-0.03-0.09-0.06c-0.02-0.02-0.05-0.03-0.08-0.05c-5.29-9.26-9.74-18.96-14.91-28.29c-1.41-2.54-2.89-3.62-5.88-2.97
                                        c-5.56,1.21-10.32-0.7-14.13-4.74c-1.9-2.01-3.61-1.95-5.87-0.76c-23.37,12.32-46.84,24.45-70.31,36.59
                                        c-19.54,10.1-39,20.34-58.58,30.38c-2.43,1.25-4.21,2.59-3.31,5.69c1.75,5.98-0.57,10.78-4.79,14.73c-1.97,1.85-1.79,3.23-0.63,5.37
                                        c4.59,8.46,8.74,17.15,13.37,25.61c0.44,0.8,0.81,1.63,0.85,2.57v0.02c-0.01,0.06-0.02,0.13-0.03,0.19
                                        c-0.02,0.16-0.08,0.31-0.16,0.45c-0.07,0.14-0.16,0.27-0.28,0.38c-3.23,1.62-6.6,3.01-9.63,4.93c-2.44,1.54-3.84,1.82-4.77-1.36
                                        c-0.31-1.03-1.33-1.86-2.03-2.78c-0.52-0.63-0.99-1.3-1.43-1.97c-1.77-2.74-3.02-5.77-4.63-8.61c-0.03-0.07-0.08-0.15-0.12-0.22
                                        c-0.01-0.01-0.01-0.02-0.02-0.02c-7.02-12.78-13.42-25.86-20.33-38.69c-1.72-3.2-0.95-4.81,2.65-6.85
                                        c8.99-5.1,18.4-9.41,27.51-14.28c0.19-0.1,0.38-0.2,0.57-0.31c0.1-0.05,0.21-0.11,0.31-0.16c6.17-3.34,12.56-6.25,18.64-9.78
                                        c0.02-0.02,0.05-0.03,0.08-0.05c0.09-0.02,0.16-0.05,0.25-0.09c2.3-0.78,4.36-2.02,6.43-3.27c0.39-0.24,0.78-0.47,1.17-0.7
                                        c0.05-0.02,0.1-0.05,0.16-0.08c0.03-0.02,0.06-0.04,0.1-0.05c0.17-0.09,0.34-0.18,0.52-0.27c3.42-1.72,7.03-3.09,10.07-5.51
                                        c0.05-0.04,0.11-0.08,0.16-0.13c0.03-0.02,0.06-0.05,0.09-0.07c10.8-4.77,20.87-10.99,31.54-16.01c1.25-0.59,2.48-1.22,3.78-1.72
                                        c0.04-0.02,0.08-0.03,0.12-0.05c0.06-0.04,0.13-0.07,0.2-0.1c13.55-7.39,27.34-14.33,41.08-21.38c1.88-0.96,3.37-2.35,5.03-3.56
                                        c0.12,0,0.23-0.01,0.34-0.02h0.07c1.97-0.16,3.64-1.08,5.37-2.04c5.1-2.84,10.19-5.7,15.68-7.73c5.61-1.79,10.48-5.08,15.69-7.69
                                        c2.24-1.12,3.44-0.78,4.6,1.48c9.52,18.49,19.12,36.93,28.68,55.39C465.13,171.45,465.18,171.99,465.32,172.49z" />
                                            <path d="M211.74,305.08c-0.45,2.18-2.2,2.74-4.02,3.14c-6.09,1.32-12.16,2.84-18.31,3.82c-3.56,0.56-2.88,1.61-1.32,3.77
                                        c5.77,8.01,11.32,16.18,17.18,24.13c2.16,2.94,1.72,4.73-1.2,6.6c-3.39,2.18-6.78,4.41-9.85,6.99c-3.1,2.59-4.9,1.56-6.87-1.32
                                        c-5.6-8.13-11.35-16.16-17.06-24.22c-0.8-1.14-1.36-2.51-2.83-3.3c-4.32,5.72-8.65,11.39-12.9,17.11c-1.14,1.54-2.3,2.85-4.44,2.48
                                        c-2.44-0.41-2.87-2.4-3.27-4.32c-5.89-27.55-11.73-55.11-17.65-82.65c-0.42-1.93-0.53-3.66,1.19-4.91c1.72-1.26,3.42-0.71,5.06,0.35
                                        c24.64,15.96,49.28,31.9,73.92,47.85C210.99,301.66,212.18,302.94,211.74,305.08z" />
                                            <path class="stpaypersale1 stpaypersalehover" d="M195.38,191.47c-0.78,0.09-1.56,0.04-2.34,0.04c-36.31,0-72.63-0.02-108.95,0.02
                                        c-2.96,0.01-5.53-0.38-6.44-3.69c-1.05-3.79,1.39-6.5,5.89-6.5c17.84-0.03,35.66-0.02,53.5-0.02h1.95c18.23,0,36.45,0.03,54.67-0.02
                                        c3.27-0.01,5.68,0.93,6.21,4.46C200.31,188.73,198.38,191.11,195.38,191.47z" />
                                            <path class="stpaypersale1 stpaypersalehover" d="M198.24,216.04c-1.15,1.07-2.5,1.25-3.96,1.25c-37.1,0-74.2,0.01-111.28-0.02c-3.6-0.01-5.52-1.92-5.5-5.12
                                        c0.02-3.18,1.95-5.02,5.59-5.02c18.61-0.04,37.22-0.02,55.84-0.02c18.35,0,36.71,0.03,55.06-0.03c2.62-0.01,4.69,0.79,5.62,3.27
                                        C200.38,212.4,199.99,214.42,198.24,216.04z" />
                                            <path class="stpaypersale6 stpaypersalehover" d="M415.93,121.83c-1.93,2.47-5.03,2.98-7.54,4.46c-2.99,1.76-6.06,3.42-9.18,4.92c-1.33,0.63-2.66,2.46-4.43,0.65
                                        l-0.01-0.01c0.02-0.09,0.03-0.17,0.04-0.26c0.86-6.12-4.09-8.02-7.99-10.63c-6.16-4.14-12.38-8.19-18.37-12.56
                                        c-1-0.74-2.55-1.14-2.57-2.76c0-0.09,0.01-0.2,0.02-0.3c2.64-3.99,5.28-7.97,7.92-11.95C388.05,102.59,402.06,112.11,415.93,121.83z
                                        " />
                                            <path class="stpaypersale7 stpaypersalehover" d="M124.7,253.32c-0.31,2.22-2.28,1.58-3.77,1.48c-12.16-0.86-24.33-1.69-36.48-2.66
                                        c-1.8-0.14-5.02,0.99-4.82-2.21c0.2-3.19,3.3-1.21,4.68-1.63c12.56,0.88,24.72,1.7,36.89,2.59
                                        C122.76,251.01,125.07,250.68,124.7,253.32z" />
                                            <path class="stpaypersale7 stpaypersalehover" d="M189.56,240.46c-0.07,1.34-0.86,1.88-1.91,2.28c-11.64,4.4-23.27,8.83-34.91,13.21
                                        c-1.38,0.52-2.98,0.86-3.53-1.08c-0.49-1.72,1-2.24,2.19-2.69c11.51-4.36,23.04-8.68,34.56-13.03
                                        C187.63,238.53,189,238.46,189.56,240.46z" />
                                            <path class="stpaypersale8 stpaypersalehover" d="M126.99,264.02c-0.14,1.15-1.02,1.73-1.8,2.42c-7.86,6.96-15.71,13.95-23.54,20.94
                                        c-1.18,1.06-2.53,2.45-3.98,0.99c-1.53-1.53-0.05-2.76,1.16-3.83c7.96-7.07,15.91-14.14,23.84-21.23c0.91-0.81,1.81-1.55,3.1-1.1
                                        C126.58,262.5,126.94,263.19,126.99,264.02z" />
                                            <path class="stpaypersale7 stpaypersalehover" d="M157.88,223.17c-5.02,8.47-10.03,16.94-15.06,25.41c-0.4,0.68-0.92,1.27-1.83,1.24
                                        c-0.69,0.04-1.29-0.13-1.72-0.7c-0.9-1.23-0.06-2.22,0.51-3.2c3.89-6.58,7.78-13.15,11.68-19.73c0.99-1.67,1.97-3.34,3.02-4.99
                                        c0.71-1.14,1.76-1.64,2.95-0.78C158.38,221.1,158.52,222.09,157.88,223.17z" />
                                            <path class="stpaypersale7 stpaypersalehover" d="M131.77,246.92c-0.21,1.25-1.31,1.71-2.74,1.12c-0.65-0.26-1.15-1.01-1.6-1.62
                                        c-5.21-7.12-10.39-14.25-15.57-21.38c-0.92-1.28-2.09-2.71-0.15-3.94c1.68-1.07,2.58,0.43,3.42,1.57
                                        c5.19,7.13,10.36,14.27,15.53,21.42C131.17,244.81,131.91,245.43,131.77,246.92z" />
                                            <path class="stpaypersale9 stpaypersalehover" d="M451.96,179.56c0.24-0.01,0.48,0,0.72,0.02c4.91,9.45,9.78,18.93,14.77,28.34c1.35,2.54,1.42,4.65-0.89,6.57
                                        c-4.58,3.81-6.1,8.7-4.3,14.27c0.95,2.94-0.35,4.02-2.51,5.14c-15.83,8.16-31.67,16.3-47.47,24.53
                                        c-27.57,14.35-55.13,28.72-82.64,43.18c-3.21,1.69-5.64,1.94-8.18-1.11c-3.38-4.06-7.83-5.41-12.98-3.96
                                        c-3.21,0.9-5.06-0.29-6.51-3.22c-4.78-9.65-9.45-19.36-15.03-28.59c-0.01-0.26-0.01-0.52,0-0.78c4.34-2.31,8.32-5.33,13.17-6.63
                                        c2.89,1.71,5.62,1.26,8.36-0.48c1.53-0.97,3.18-1.81,4.87-2.43c3.79-1.39,6.41-3.72,7.01-7.9c3.08-1.79,5.91-4.14,9.74-4.17
                                        c3.01,1.94,4.63,5.19,7.12,7.65c3.73,3.68,8,6.28,12.94,7.7c25.8,7.45,50.81-6.41,60.02-30.45c2.63-6.87,2.25-14.04,0.13-21.09
                                        c-0.51-1.72-1.5-3.36-1.02-5.28c2.87-2.41,6.01-4.32,9.68-5.23c2.41,1.72,4.74,1.5,7.24,0.03c2.46-1.44,5.04-2.75,7.69-3.82
                                        c2.96-1.2,4.65-3.17,4.94-6.35C442.76,182.49,446.66,179.48,451.96,179.56z" />
                                            <path class="stpaypersale10 stpaypersalehover" d="M264.99,254.59c2.41,3.36,4.2,7.03,5.53,10.93c-2.85-1.83-5.71-3.67-8.56-5.5c-0.55-0.49-1.09-0.99-1.64-1.48
                                        C261.81,257.14,262.44,254.73,264.99,254.59z" />
                                            <path class="stpaypersale11 stpaypersalehover" d="M264.99,254.59c-1.9,0.91-2.02,3.93-4.67,3.95c-9.03-6.1-18.06-12.21-27.1-18.31
                                        c-1.65-1.11-1.92-2.4-1.19-4.34c2.13-5.67,1.45-11.1-2.72-15.6c-2.08-2.24-1.72-3.82-0.18-6.07c23.68-34.75,47.29-69.54,70.9-104.33
                                        c4.01-5.91,8.01-11.82,11.91-17.81c1.34-2.06,2.77-2.79,5.2-1.84c5.9,2.32,11.26,1.19,15.8-3.18c1.82-1.75,3.48-1.43,5.23-0.22
                                        c8.99,6.15,17.97,12.32,26.95,18.49c0.63,0.7,0.52,1.51,0.08,2.16c-2.46,3.63-4.3,7.72-7.7,10.67c-3.02-0.02-5.02,1.44-6.49,4.05
                                        c-1.33,2.37-2.85,4.66-4.53,6.8c-1.84,2.35-2.38,4.79-1.36,7.58c-1.51,3.52-3.66,6.63-6.04,9.6c-5.11-1.77-9.88-4.34-15.48-4.91
                                        c-5.33-0.54-10.44-0.03-15.32,1.73c-21.07,7.57-31.74,24.06-33.61,46.21c-0.18,2.08,0.04,4.15,0.61,6.18
                                        c-9.43,4.88-18.79,9.89-28.32,14.56c-3.41,1.67-3.41,3.36-1.81,6.38C251.88,229.04,258.4,241.84,264.99,254.59z" />
                                            <path class="stpaypersale9 stpaypersalehover" d="M357.35,117.71c2.53-4.17,5.87-7.82,7.78-12.38c0.25,0,0.51,0.01,0.76,0.02c8.34,5.73,16.52,11.71,25.08,17.09
                                        c3.94,2.47,5.66,5,3.79,9.41c-0.79,1.9-2.36,2.85-4.13,3.76c-14.02,7.28-28,14.64-42,21.98c-2.66-4.25-6.76-7.36-9.27-11.74
                                        c0.47-3.78,3.46-6.14,5.18-9.21c3.12-0.21,5.24-1.86,6.8-4.51c1.24-2.12,2.59-4.2,4.09-6.14
                                        C357.38,123.49,358.36,120.85,357.35,117.71z" />
                                            <path class="stpaypersale12 stpaypersalehover" d="M300.18,257.73c-4.48,1.92-8.14,5.59-13.22,6.23c-5.2-9.88-10.37-19.77-15.61-29.63
                                        c-0.96-1.8-0.7-2.83,0.98-4.23c4.58-3.79,7.23-8.54,5.23-14.72c-1-3.07,0.09-4.63,2.87-6.05c24.98-12.77,49.93-25.62,74.83-38.56
                                        c18.67-9.7,37.25-19.58,55.88-29.37c2.31-1.21,4.05-1.27,6.04,1.14c3.66,4.44,8.63,6.06,14.36,4.61c2.02-0.51,3.76-0.83,4.97,1.51
                                        c4.9,9.45,9.89,18.85,14.8,28.3c0.4,0.77,0.45,1.73,0.66,2.61c-4.46,1.59-8.7,3.64-12.6,6.34c-3.25-1.42-6.17-0.6-9.02,1.19
                                        c-1.31,0.82-2.71,1.54-4.16,2.08c-3.42,1.26-5.94,3.4-7.27,6.85c-3.09,1.63-5.82,3.99-9.37,4.68c-1.42,0.03-1.97-1.12-2.65-2.03
                                        c-9.05-12.02-21.4-15.58-35.84-14.37c-17.48,1.47-29.71,10.89-38.64,25.18c-5.39,8.63-5.95,18.08-3.17,27.8
                                        c0.51,1.8,1.88,3.53,0.76,5.57c-3.51,0.65-6.14,3.42-9.69,3.98C311.98,247.46,304.77,250.17,300.18,257.73z" />
                                            <path class="stpaypersale13 stpaypersalehover" d="M339.38,145.86c3.7,3.43,8,6.39,9.27,11.74c-10.95,4.78-21.16,11.02-31.92,16.17c-1.25,0.6-2.41,1.57-3.96,1.1
                                        c-3.42-2.83-4.69-2.64-7.36,1c-1.2,1.64-1.99,3.59-3.67,4.87c-2.1,1.36-2.83-0.31-3.46-1.7c-2.2-4.85,0.41-11.2,5.37-13.2
                                        c1.64-0.66,3.3-1.4,2.88-3.54c-0.4-2.01-2.2-2.42-3.93-2.56c-2.21-0.17-4.13,0.67-5.5,2.4c-4.71,5.97-6.98,12.43-3.83,19.93
                                        c0.4,0.95,0.89,1.89,0.72,2.99c-4.52,3.9-10.22,5.73-15.31,8.62c-1.1,0.63-2.26,1.15-3.39,1.72c-1.83-0.31-1.64-1.75-1.63-3.03
                                        c0.02-23.75,13.15-45.25,38.36-51.52C321.67,138.46,330.98,140.27,339.38,145.86z" />
                                            <path class="stpaypersale6 stpaypersalehover" d="M293.99,185.06c-6.26-8.48-2.44-19.25,3.8-24.98c2.63-2.41,5.95-1.87,8.91-0.13c1.41,0.83,1.65,2.36,1.25,3.81
                                        c-0.54,1.97-2.29,2.74-4.04,3.18c-4.83,1.21-7.43,9.56-4.15,13.43c0.78,0.92,1.34,0.24,2-0.06c0.2,0.18,0.27,0.36,0.21,0.55
                                        c-0.06,0.19-0.13,0.28-0.19,0.28C299.51,183.08,297.15,184.86,293.99,185.06z" />
                                            <path class="stpaypersale14 stpaypersalehover" d="M301.79,181.14c-0.01-0.28-0.01-0.55-0.02-0.83c1.15-2.72,2.68-5.21,4.8-7.26c2.51-2.43,5.02-1.64,6.19,1.82
                                        C309.99,178.51,305.67,179.43,301.79,181.14z" />
                                            <path class="stpaypersale15 stpaypersalehover" d="M330.01,242.84c-3.73-9.46-5.35-19.16-0.94-28.71c8.06-17.45,21.3-28.3,40.85-30.84
                                        c6.46-0.84,12.67-0.09,18.86,1.45c9.22,2.29,15.67,8.27,20.76,15.96c13.96,29.5-16.18,57.86-38.75,59.56
                                        c-5.77,0.43-11.42,0.34-17.06-0.61C343.16,257.85,335.69,251.59,330.01,242.84z" />
                                            <path class="stpaypersale16 stpaypersalehover" d="M418.92,196.02c-0.35-2.97,0.93-4.82,3.66-6.05c3.29-1.48,6.51-3.17,9.63-4.98c2.72-1.57,5.06-1.7,7.15,0.91
                                        c0.5,2.85-0.69,4.62-3.29,5.85c-3.64,1.71-7.18,3.62-10.71,5.54C422.8,198.68,420.66,198.5,418.92,196.02z" />
                                            <path class="st16" d="M300.18,257.73c-0.45-2.96,0.82-4.79,3.54-6.02c3.49-1.6,6.92-3.37,10.25-5.29c2.32-1.34,4.33-1.26,6.36,0.4
                                        c1.09,3.33-0.24,5.37-3.31,6.78c-3.4,1.56-6.76,3.26-9.99,5.15C304.34,260.32,302.17,260.05,300.18,257.73z" />
                                            <path class="stpaypersale17 stpaypersalehover" d="M357.35,117.71c2.08,1.9,2.14,4,0.63,6.25c-2.39,3.55-4.73,7.14-7.2,10.64c-1.52,2.15-3.45,3.46-6.22,2.06
                                        c-1.7-2.44-1.49-4.65,0.35-7.05c2.28-2.97,4.33-6.14,6.31-9.33C352.72,117.89,354.53,116.72,357.35,117.71z" />
                                            <path class="stpaypersale16 stpaypersalehover" d="M358.92,214.65c3.11-1.55,5.62-2.91,8.22-4.08c2.29-1.03,4.64-1.4,5.96,1.46c1.23,2.67-0.53,4.15-2.54,5.31
                                        c-2.14,1.23-4.37,2.3-6.56,3.45c-1.12,0.59-2.64,0.97-1.55,2.8c1.02,1.71,2.17,0.76,3.3,0.17c2.31-1.19,4.6-2.42,6.93-3.56
                                        c2.14-1.04,4.17-0.93,5.36,1.37c1.25,2.41,0.23,4.27-2.02,5.5c-2.6,1.42-5.23,2.78-7.95,4.22c4.05,3.67,10.08,3.91,13.75,0.87
                                        c0.94-0.78,1.01-1.71,1.1-2.76c0.18-1.96,1.27-3.12,3.25-3.23c1.88-0.1,3.22,0.78,4.02,2.5c1.35,2.92,0.39,6.66-2.29,8.76
                                        c-8.06,6.33-17.99,6.23-25.73-0.42c-1.58-1.36-2.83-1.45-4.5-0.43c-1.44,0.87-2.95,1.7-4.54,2.23c-2.06,0.69-3.97,0.2-4.91-1.95
                                        c-0.84-1.92-0.17-3.62,1.55-4.74c1.41-0.92,2.93-1.7,4.46-2.4c1.21-0.56,2.06-1.17,1.41-2.64c-0.7-1.6-1.78-1.06-2.88-0.51
                                        c-1.62,0.81-3.2,1.78-4.92,2.33c-1.85,0.59-3.75,0.32-4.6-1.77c-0.83-2.04-0.36-3.87,1.64-5.05c0.89-0.52,1.88-0.89,2.83-1.3
                                        c2.77-1.2,4.01-2.74,3.57-6.28c-1.26-10.05,6.45-17.72,15.53-19.97c3.01-0.75,5.68,0.68,7.35,3.34c0.94,1.5,1,3.2-0.21,4.75
                                        c-1.03,1.31-2.39,1.51-3.87,1.16c-5.24-1.23-10.34,2.25-11.15,7.69C358.81,212.36,358.92,213.28,358.92,214.65z" />
                                        </svg>
                                        
                                           </a>
                                            <div class="dropdown-divider"></div>
                                            <a class="stlogintitle" style="color: black !important; display: flex; align-items: center; justify-content: flex-end; flex-direction: row-reverse; padding: 5px; font-size: 15px;" href="{{url('customer/logout')}}" class="dropdown-item">  @lang("login.logout") <i class="fa fa-sign-out" style="font-size: 25px; padding: 5px;"></i>  </a>
                                        </div>
                                    </li>

                                    @endif
                                </div>
                                <div class="col-lg-2 col-md-2 col-sm-2   @if(app()->getLocale()=='de') iconwishlistCustom @else  iconwishlistCustomAr @endif"  >
                                    <a id="wishlist" class="text-center stwishlist-Hover">
                                        <span style="color: #fff; position:absolute;text-align:center; border-radius:50%; width:15px; top: -7px; right: 44px;  height:15px;background:#990000;">
                                       <p  class="wishlistCount">0</p> 
                                    </span>
                                        <svg version="1.1" id="Layer_4" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 500 500" style=" width: 40%;enable-background:new 0 0 500 500;" xml:space="preserve">
                                            <style type="text/css">
                                                .stwishlist0 {
                                                    fill: #D88D21;
                                                }

                                                .stwishlist1 {
                                                    fill: #BA761C;
                                                }
                                            </style>
                                            <path class="stwishlist0 stwishlisthover" d="M250,121.55v357.93c-3.61-0.04-7.21-1.32-10.22-3.87c-16.04-13.56-31.92-27.29-47.82-41.02
                                            c-16.49-14.24-33.22-28.22-49.59-42.59c-14.22-12.51-28.54-24.91-42.38-37.86c-10.74-10.05-21.08-20.43-31.09-31.19
                                            c-20.27-21.74-38.21-45.13-50.03-72.6c-6.71-15.57-11.12-31.79-11.56-49.04c-0.44-17.1-0.76-34.11,3.67-50.78
                                            c10.32-38.77,31.51-69.17,67.74-88.12c20.15-10.53,41.65-14.98,64.07-13.76c27.89,1.52,52.31,12.06,73.18,30.9
                                            c12.69,11.45,23.1,24.58,31.82,39.18C248.8,120.42,249.41,121.37,250,121.55z" />
                                            <path class="stwishlist1 stwishlisthover" d="M492.92,174.84v30.34c-0.17,0.01-0.33,0.02-0.49,0.05c-0.12,16.18-4.93,31.3-11.32,45.88
                                            c-12.39,28.3-31.29,52.05-52.23,74.5c-26.56,28.5-56.32,53.44-85.58,78.94c-25.96,22.62-52.3,44.76-78.18,67.46
                                            c-1.66,1.46-3.42,2.83-5.19,4.15c-2.99,2.25-6.47,3.35-9.93,3.31V121.55c0.71,0.26,1.34-0.69,2.58-2.86
                                            c6.61-11.61,14.57-22.28,23.87-31.74c20.29-20.65,44.36-34.2,73.62-37.6c22.54-2.61,44.19,0.74,64.82,9.73
                                            c25.39,11.07,44.81,29.11,58.9,52.97c8.11,13.76,13.37,28.56,16.91,44.05c1.39,6.11,1.52,12.31,1.71,18.51l0.18-0.07L492.92,174.84z
                                            " />
                                        </svg>
                                        <p class="text-center wishlistResponsiv stwishlisttitle">@lang('site.wishlist')</p>
                                </div>


                                <div class="col-lg-2 col-md-2 col-sm-2   @if(app()->getLocale()=='de') iconcartCustom @else  iconcartCustomAr  @endif">
                                    <a class="addOrder text-center stcard-Hover">
                                        <span  style="color: #fff; position: absolute; text-align: center; border-radius: 50%; width: 15px; top: -7px; height: 15px;background: #990000; margin-right: 17px;  right: 23px;">
                                            <p class="CartCount">
                                          0
                                            </p>
                                        </span>
                                        <svg version="1.1" id="Layer_4" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 500 500" style=" width: 40%;   enable-background:new 0 0 500 500;" xml:space="preserve">
                                            <style type="text/css">
                                                .stcard0 {
                                                    fill: url(#SVGID_1_);
                                                }

                                                .stcard1 {
                                                    fill: url(#SVGID_00000029734770312655367650000005196745397210690476_);
                                                }

                                                .stcard2 {
                                                    fill: url(#SVGID_00000009582834817561062340000015554216244909175700_);
                                                }
                                            </style>
                                            <linearGradient id="SVGID_1_" gradientUnits="userSpaceOnUse" x1="275.8624" y1="51.0691" x2="415.8126" y2="51.0691">
                                                <stop offset="0" style="stop-color:#F2AA35" />
                                                <stop offset="0.4002" style="stop-color:#D19230" />
                                                <stop offset="1" style="stop-color:#996A28" />
                                            </linearGradient>
                                            <path class="stcard0 stcardhover" d="M337.56,97.31c5.41-7.9,12.21-14.41,20.21-19.65c4.49-2.94,9.23-5.42,14.4-7.64
                                                c-9.13-5.77-18.96-9.65-28.38-14.38c2.57,0.35,5.07,0.88,7.6,1.33c9.49,1.72,18.73,4.12,26.72,9.89c0.92,0.66,1.73,0.34,2.62,0.06
                                                c7.73-2.4,15.6-4.22,23.61-5.37c3.78-0.54,7.56-1.11,11.47-1.69c-0.26-0.45-0.38-0.71-0.54-0.94c-5.32-8.16-12.26-14.75-20.07-20.43
                                                c-11.13-8.1-23.18-14.35-36.6-17.82c-13.88-3.59-28.12-4.56-42.29-5.87c-13.23-1.22-25.61-4.99-37.28-11.27h-1.72
                                                c-1.44,1.09-1.72,2.49-1.21,4.16c2.62,8.7,4.63,17.56,6.85,26.36c4.7,18.6,12.96,35.27,26.5,49.05
                                                c7.02,7.15,15.12,12.66,24.94,15.34C335.86,98.84,336.69,98.58,337.56,97.31z" />
                                            <linearGradient id="SVGID_00000029734770312655367650000005196745397210690476_" gradientUnits="userSpaceOnUse" x1="318.207" y1="136.5103" x2="493.0706" y2="136.5103">
                                                <stop offset="0" style="stop-color:#F2AA35" />
                                                <stop offset="0.4002" style="stop-color:#D19230" />
                                                <stop offset="1" style="stop-color:#996A28" />
                                            </linearGradient>
                                            <path class="stcard1 stcardhover" d="M491.84,49.84
                                                        c-1.41-1.08-2.8-0.76-4.2,0.05c-0.74,0.43-1.53,0.78-2.29,1.16c-7.35,3.62-15.09,6.14-23.04,8.01c-16.09,3.78-32.58,4.78-48.91,6.88
                                                        c-11.09,1.42-22.05,3.39-32.7,6.92c-22.05,7.31-37.7,21.6-47.19,42.78c-10.43,23.29-15.48,47.69-15.28,73.19
                                                        c0,1.08-0.03,2.15,0.01,3.23c0.24,9.25,0.52,18.49,3,27.49c0.31,1.11,0.69,2.19,1.42,3.09c0.84,1.04,1.86,1.59,3.2,0.98
                                                        c1.35-0.61,1.93-1.64,1.6-3.13c-0.14-0.63-0.26-1.26-0.42-1.89c-1.17-4.53-1.8-9.12-2.02-13.79c-0.54-11.75,1.45-23.11,5.16-34.21
                                                        c3.5-10.46,8.68-19.87,16.65-27.68c13.17-12.89,29.8-18.84,46.95-23.81c0.85-0.25,1.45-0.09,1.75,0.7c0.3,0.8-0.4,1.13-0.95,1.45
                                                        c-0.37,0.21-0.77,0.36-1.16,0.55c-5.42,2.59-10.9,5.05-16.24,7.78c-15.81,8.09-27.36,20.32-34.69,36.48
                                                        c-1.68,3.72-2.93,7.64-2.72,11.83c0.2,4.01,2.38,5.51,6.19,4.32c0.75-0.23,1.5-0.48,2.23-0.75c4.56-1.72,9.22-3.07,13.98-4.09
                                                        c13.33-2.87,26.96-3.72,40.38-5.98c12.64-2.13,24.53-6.14,35.31-13.18c20.6-13.44,33.6-32.62,41.7-55.44
                                                        c4.65-13.1,7.26-26.77,10.83-40.17c0.75-2.83,1.67-5.62,2.42-8.45C493.19,52.61,493.37,51.01,491.84,49.84z" />
                                            <linearGradient id="SVGID_00000009582834817561062340000015554216244909175700_" gradientUnits="userSpaceOnUse" x1="6.9294" y1="298.28" x2="462.3065" y2="298.28">
                                                <stop offset="0" style="stop-color:#1E7030" />
                                                <stop offset="0.6385" style="stop-color:#398E34" />
                                                <stop offset="1" style="stop-color:#439A35" />
                                            </linearGradient>
                                            <path class="stcard2 stcardhover" d="M459.75,158.25
                                                    c-0.45-0.64-1.18-1.57-2.27-2.55c-4.36,4.01-9.07,7.65-14.13,10.96c-8.08,5.27-16.98,9.24-26.96,11.98h14.19
                                                    c-6.9,24.27-13.76,48.37-20.64,72.45c-0.14,0.48-0.27,0.96-0.41,1.44h-44.3c0-23.62,0-47.25,0-70.87c-2.12,0.03-4.98,0.3-8.21,1.28
                                                    c-2.42,0.73-4.42,1.68-5.97,2.55c0,22.35,0,44.7,0,67.05h-65.5v-73.89h26.77c0.41-9.08,1.48-18.05,3.2-26.88
                                                    c-61.41,0-126.81,0.01-188.23,0.1c-3.7,0.01-4.99-1.01-5.7-4.56c-2.49-12.29-5.3-24.52-8.06-36.77c-1.74-7.7-6.33-11.95-13.75-11.99
                                                    c-26.65-0.14-53.28-0.13-79.92,0.01c-5.67,0.03-9.8,3.16-11.94,8.43c-3.61,8.93,2.99,18.06,13.14,18.1
                                                    c21.61,0.09,43.23,0.08,64.83-0.02c2.6-0.02,3.86,0.59,4.45,3.3c15.38,69.63,30.82,139.25,46.36,208.83
                                                    c0.72,3.2,0.39,4.77-2.79,6.44c-14.99,7.91-22.63,24.88-19.54,42.5c2.78,15.97,17.02,29.2,33.62,31.47
                                                    c8.33,1.15,16.72,0.09,25.44,0.79c-28.55,7.72-35.85,30.72-32.34,48.12c3.69,18.34,21.79,32.51,40.19,31.54
                                                    c21.24-1.14,37.1-16.33,38.56-37.82c0.06-0.8,0.08-1.58,0.08-2.38c0-0.09,0.01-0.18,0.01-0.26c0-0.06-0.01-0.12-0.01-0.18
                                                    c0-0.94-0.04-1.86-0.11-2.8c-0.01-0.13-0.02-0.27-0.03-0.41c-0.09-0.93-0.2-1.85-0.35-2.78c-0.02-0.13-0.04-0.27-0.07-0.41
                                                    c-0.16-0.92-0.35-1.84-0.57-2.76c-0.03-0.13-0.07-0.25-0.1-0.38c-0.24-0.93-0.51-1.84-0.83-2.75c-0.03-0.11-0.08-0.22-0.11-0.33
                                                    c-0.33-0.93-0.69-1.84-1.09-2.75c-0.03-0.07-0.06-0.15-0.1-0.22c-0.4-0.92-0.85-1.81-1.33-2.7c-0.03-0.04-0.05-0.09-0.07-0.13
                                                    c-0.49-0.89-1.03-1.75-1.59-2.61c-0.05-0.09-0.11-0.18-0.16-0.26c-0.55-0.83-1.16-1.64-1.78-2.43c-0.06-0.07-0.1-0.15-0.16-0.22
                                                    c-0.05-0.06-0.1-0.11-0.14-0.17c-0.15-0.18-0.3-0.35-0.44-0.52c-0.22-0.27-0.44-0.53-0.68-0.79c-0.19-0.22-0.39-0.43-0.59-0.65
                                                    c-0.13-0.15-0.27-0.3-0.41-0.45c-0.05-0.05-0.11-0.1-0.16-0.16c-0.27-0.28-0.55-0.55-0.84-0.83c-0.17-0.17-0.34-0.34-0.52-0.5
                                                    c-0.36-0.34-0.75-0.68-1.12-1.01c-0.08-0.06-0.14-0.12-0.22-0.19c-0.02-0.02-0.05-0.04-0.08-0.06c-0.12-0.11-0.24-0.21-0.37-0.31
                                                    c-0.14-0.12-0.27-0.24-0.42-0.36c-0.14-0.11-0.29-0.23-0.44-0.34c-0.04-0.03-0.09-0.06-0.13-0.1c-0.16-0.12-0.31-0.24-0.48-0.36
                                                    c-0.07-0.06-0.15-0.12-0.22-0.18c-0.17-0.13-0.35-0.26-0.53-0.38c-0.13-0.1-0.26-0.18-0.39-0.27c-0.13-0.09-0.26-0.18-0.39-0.27
                                                    c-0.13-0.09-0.25-0.18-0.38-0.27c-0.05-0.04-0.12-0.08-0.18-0.13c-0.21-0.13-0.43-0.26-0.66-0.4c-0.16-0.1-0.33-0.21-0.5-0.31
                                                    c-0.08-0.05-0.15-0.1-0.23-0.14c-0.07-0.05-0.15-0.08-0.22-0.13c-0.58-0.34-1.18-0.69-1.79-1.01c-0.22-0.12-0.44-0.24-0.68-0.36
                                                    c-0.74-0.37-1.49-0.74-2.27-1.09c-0.03-0.01-0.04-0.02-0.07-0.03c-0.35-0.15-0.72-0.3-1.08-0.46c-0.14-0.06-0.29-0.11-0.43-0.18
                                                    c-0.06-0.02-0.11-0.04-0.16-0.06c-0.09-0.03-0.18-0.06-0.27-0.1c-0.3-0.11-0.59-0.23-0.9-0.34c-0.17-0.06-0.35-0.12-0.53-0.19
                                                    c-0.04-0.01-0.09-0.03-0.14-0.05c-0.21-0.07-0.41-0.14-0.62-0.2c-0.07-0.03-0.15-0.06-0.22-0.08c-0.34-0.13-0.71-0.24-1.07-0.34
                                                    c-0.09-0.03-0.18-0.06-0.27-0.08c-0.08-0.03-0.17-0.05-0.25-0.08c-0.12-0.03-0.23-0.07-0.35-0.1c-0.28-0.08-0.58-0.15-0.87-0.23
                                                    c-0.32-0.09-0.63-0.17-0.96-0.25c-0.68-0.17-1.36-0.33-2.07-0.48h176.46c-0.03,0.01-0.07,0.01-0.09,0.03
                                                    c-26.52,6.67-36.14,28.38-32.85,47.34c3.12,17.98,20.87,32.7,39.61,32.34c20.37-0.4,36.42-15,39.13-35.8
                                                    c2.09-16.04-6.82-37.66-33.89-43.97c-0.22-0.05-0.42-0.11-0.65-0.16h0.69c7.58,0.02,14.31,0.14,21.03-0.03
                                                    c7.55-0.18,13.24-6.08,13.22-13.32c-0.04-7.26-5.76-12.95-13.33-13.26c-1.33-0.05-2.67-0.01-3.99-0.01h-234
                                                    c-1.47,0-2.96,0.07-4.43-0.06c-7.01-0.58-12.41-6.37-12.41-13.24c0-6.89,5.36-12.68,12.37-13.27c1.47-0.13,2.95-0.06,4.43-0.06
                                                    h234.43c10.64,0,14.51-2.89,17.45-13.21c14.35-50.2,28.62-100.44,43.05-150.62c3.13-10.85,5.59-21.9,9.73-32.44
                                                    c0.2-0.49,0.5-1.37,0.62-2.49C462.64,162.38,460.55,159.4,459.75,158.25z M381.7,458.1c0.03,7.19-5.94,13.25-13.13,13.34
                                                    c-7.36,0.1-13.56-6.1-13.46-13.46c0.09-7.2,6.16-13.16,13.35-13.12C375.66,444.88,381.67,450.9,381.7,458.1z M193.43,458
                                                    c0.09,7.18-5.84,13.3-13.03,13.44c-7.36,0.15-13.61-5.99-13.57-13.35c0.04-7.2,6.06-13.21,13.24-13.23
                                                    C187.27,444.82,193.35,450.8,193.43,458z M351.06,266.71c0,23.87,0,47.75,0,71.62c-21.83-0.02-43.66-0.05-65.5-0.05v-71.57H351.06z
                                                    M271.39,338.27c-20.26,0-40.52,0.01-60.78,0.03v-71.59h60.78V338.27z M271.39,252.54H210.6v-73.89h60.78V252.54z M128.91,178.64
                                                    h67.52v73.89H145.1c-5.41-24.41-10.82-48.81-16.23-73.22C128.83,179.18,128.88,179.01,128.91,178.64z M163.3,334.93
                                                    c-5.01-22.75-10.04-45.48-15.07-68.22h48.2v71.59c-9.43,0.01-18.87,0-28.3,0.01C165.45,338.31,163.97,337.99,163.3,334.93z
                                                    M386.18,334.47c-0.8,2.82-1.81,3.88-5,3.88c-5.32-0.01-10.63-0.01-15.95-0.01c0-23.88,0-47.75,0-71.63h40.25
                                                    C399.03,289.3,392.55,311.87,386.18,334.47z" />
                                        </svg>

                                        <p class="text-center wishlistResponsiv stcardtitle">@lang('site.CARD')</p>

                                    </a>



                                </div>


                                <div class="col-lg-2 col-md-2 col-sm-2  @if(app()->getLocale()=='de') iconpaypersaleCustom @else  iconpaypersaleCustomAr  @endif" >
                                    <!-- <img style="width: 50%" src="assets/img/svg/5.svg" class="d-block mx-auto rounded" alt=""> -->
                                    <a class="text-center paypersaleHover">
                                        <svg version="1.1" id="Layer_4" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 500 500" style="  width: 40%; enable-background:new 0 0 500 500;" xml:space="preserve">
                                            <style type="text/css">
                                                .stpaypersale0 {
                                                    fill: #FEFEFE;
                                                }

                                                .stpaypersale1 {
                                                    fill: #F2AA35;
                                                }

                                                .stpaypersale2 {
                                                    fill: url(#SVGID_1_);
                                                }

                                                .stpaypersale3 {
                                                    fill: url(#SVGID_00000033363936087066273400000013978253593533097902_);
                                                }

                                                .stpaypersale4 {
                                                    fill: #4E8E1E;
                                                }

                                                .stpaypersale5 {
                                                    fill: #5EAA24;
                                                }

                                                .stpaypersale6 {
                                                    fill: #4E8F1E;
                                                }

                                                .stpaypersale7 {
                                                    fill: #030303;
                                                }

                                                .stpaypersale8 {
                                                    fill: #020202;
                                                }

                                                .stpaypersale9 {
                                                    fill: #7DD43E;
                                                }

                                                .stpaypersale10 {
                                                    fill: #7BD33D;
                                                }

                                                .stpaypersale11 {
                                                    fill: #99DC69;
                                                }

                                                .stpaypersale12 {
                                                    fill: #8FDA5A;
                                                }

                                                .stpaypersale13 {
                                                    fill: #D0E9BF;
                                                }

                                                .stpaypersale14 {
                                                    fill: #4F9020;
                                                }

                                                .stpaypersale15 {
                                                    fill: #EFF0F0;
                                                }

                                                .stpaypersale16 {
                                                    fill: #EEF0EF;
                                                }

                                                .stpaypersale17 {
                                                    fill: #EFF0EF;
                                                }
                                            </style>
                                            <path class="stpaypersale0 stpaypersalehover" d="M120.93,254.8c-12.16-0.86-24.33-1.69-36.48-2.66c-1.8-0.14-5.02,0.99-4.82-2.21c0.2-3.19,3.3-1.21,4.68-1.63
                                        c12.56,0.88,24.72,1.7,36.89,2.59c1.55,0.11,3.86-0.21,3.49,2.42C124.39,255.54,122.42,254.9,120.93,254.8z" />
                                            <path class="stpaypersale0 stpaypersalehover" d="M97.67,288.38c-1.53-1.53-0.05-2.76,1.16-3.83c7.96-7.07,15.91-14.14,23.84-21.23c0.91-0.81,1.81-1.55,3.1-1.1
                                        c0.81,0.28,1.17,0.96,1.21,1.8c-0.14,1.15-1.02,1.73-1.8,2.42c-7.86,6.96-15.71,13.95-23.54,20.94
                                        C100.46,288.44,99.12,289.83,97.67,288.38z" />
                                            <path class="stpaypersale0 stpaypersalehover" d="M127.43,246.42c-5.21-7.12-10.39-14.25-15.57-21.38c-0.92-1.28-2.09-2.71-0.15-3.94
                                        c1.68-1.07,2.58,0.43,3.42,1.57c5.19,7.13,10.36,14.27,15.53,21.42c0.52,0.72,1.26,1.34,1.12,2.84c-0.21,1.25-1.31,1.71-2.74,1.12
                                        C128.38,247.79,127.88,247.03,127.43,246.42z" />
                                            <path class="stpaypersale0 stpaypersalehover" d="M157.88,223.17c-5.02,8.47-10.03,16.94-15.06,25.41c-0.4,0.68-0.92,1.27-1.83,1.24
                                        c-0.69,0.04-1.29-0.13-1.72-0.7c-0.9-1.23-0.06-2.22,0.51-3.2c3.89-6.58,7.78-13.15,11.68-19.73c0.99-1.67,1.97-3.34,3.02-4.99
                                        c0.71-1.14,1.76-1.64,2.95-0.78C158.38,221.1,158.52,222.09,157.88,223.17z" />
                                            <path class="stpaypersale0 stpaypersalehover" d="M151.39,252.19c11.51-4.36,23.04-8.68,34.56-13.03c1.68-0.63,3.05-0.71,3.6,1.3c-0.07,1.34-0.86,1.88-1.91,2.28
                                        c-11.64,4.4-23.27,8.83-34.91,13.21c-1.38,0.52-2.98,0.86-3.53-1.08C148.71,253.16,150.2,252.63,151.39,252.19z" />
                                            <path class="st1" d="M199.61,210.34c0.77,2.06,0.38,4.07-1.37,5.69c-1.15,1.07-2.5,1.25-3.96,1.25c-37.1,0-74.2,0.01-111.28-0.02
                                        c-3.6-0.01-5.52-1.92-5.5-5.12c0.02-3.18,1.95-5.02,5.59-5.02c18.61-0.04,37.22-0.02,55.84-0.02c18.35,0,36.71,0.03,55.06-0.03
                                        C196.61,207.07,198.68,207.87,199.61,210.34z" />
                                            <path class="stpaypersale1 stpaypersalehover" d="M77.65,187.84c-1.05-3.79,1.39-6.5,5.89-6.5c17.84-0.03,35.66-0.02,53.5-0.02h1.95
                                        c18.23,0,36.45,0.03,54.67-0.02c3.27-0.01,5.68,0.93,6.21,4.46c0.45,2.98-1.49,5.35-4.49,5.71c-0.78,0.09-1.56,0.04-2.34,0.04
                                        c-36.31,0-72.63-0.02-108.95,0.02C81.12,191.54,78.56,191.14,77.65,187.84z" />
                                            <path class="stpaypersale0 stpaypersalehover" d="M188.09,315.82c5.77,8.01,11.32,16.18,17.18,24.13c2.16,2.94,1.72,4.73-1.2,6.6c-3.39,2.18-6.78,4.41-9.85,6.99
                                        c-3.1,2.59-4.9,1.56-6.87-1.32c-5.6-8.13-11.35-16.16-17.06-24.22c-0.8-1.14-1.36-2.51-2.83-3.3c-4.32,5.72-8.65,11.39-12.9,17.11
                                        c-1.14,1.54-2.3,2.85-4.44,2.48c-2.44-0.41-2.87-2.4-3.27-4.32c-5.89-27.55-11.73-55.11-17.65-82.65c-0.42-1.93-0.53-3.66,1.19-4.91
                                        c1.72-1.26,3.42-0.71,5.06,0.35c24.64,15.96,49.28,31.9,73.92,47.85c1.62,1.04,2.81,2.32,2.37,4.46c-0.45,2.18-2.2,2.74-4.02,3.14
                                        c-6.09,1.32-12.16,2.84-18.31,3.82C185.85,312.61,186.53,313.65,188.09,315.82z" />
                                            <path class="stpaypersale0 stpaypersalehover" d="M429.73,280.64v-4.38c-5.96,2.94-11.45,5.8-17.1,8.33c-2.31,1.03-2.89,2.37-2.89,4.74
                                        c0,24.6-0.13,49.22-0.2,73.82c-0.02,6.78,0,6.78-6.65,6.78H76.08c-1.56,0-3.13-0.05-4.69,0.03c-3,0.16-4.75-0.99-4.69-4.21
                                        c0.05-2.59,0.11-5.19,0.11-7.79c0.01-63.29,0-126.58,0.02-189.87c0-2.85-0.45-5.68-0.09-8.56c0.34-2.61,1.65-3.71,4.1-3.68
                                        c2.34,0.02,4.68,0.23,7.03,0.23c35.83-0.03,71.66-0.07,107.49-0.13c18.37-0.03,36.74-0.08,55.11-0.14c1.36-0.01,2.85,0.47,3.88-1.07
                                        c4.03-6.03,8.09-12.02,12.14-18.02c-1.22-1.1-2.45-0.67-3.56-0.67c-63.06-0.02-126.14-0.02-189.2-0.02c-1.04,0-2.08,0.04-3.12,0.13
                                        c-10.52,0.91-14.12,4.85-14.12,15.52c-0.01,73.98-0.01,147.94-0.01,221.91c0,11.88,4.23,16.16,16.18,16.4c0.65,0.02,1.3,0,1.95,0
                                        c115.71,0,231.42,0,347.13-0.02c2.33,0,4.7-0.11,7-0.45c5.65-0.83,9.06-4.16,10.36-9.69c0.57-2.44,0.63-4.9,0.63-7.37
                                        C429.73,341.85,429.73,311.24,429.73,280.64z M237.96,141.94c2.56-0.14,4.14,1.17,4.27,3.89c0.08,2.54-1.2,3.94-3.67,4.07
                                        c-2.59,0.13-4.22-1.1-4.28-3.84C234.22,143.6,235.54,142.06,237.96,141.94z" />
                                            <path class="stpaypersale0 stpaypersalehover" d="M468.53,397.19c-59.92,0.12-119.85,0.09-179.76,0.09c-1.05,0-2.09,0.01-3.13,0.01c-2.15,0-3.24,1.1-2.86,3.19
                                        c0.74,4.07-1.28,4.83-4.83,4.8c-18.24-0.12-36.47-0.05-54.71-0.05c-8.46,0-16.93-0.03-25.4,0.02c-2.82,0.02-4.67-0.81-4.14-4.05
                                        c0.53-3.29-1.14-3.95-4.03-3.95c-60.83,0.05-121.66,0.05-182.5-0.01c-3.38-0.01-4.28,1.36-4.02,4.49
                                        c0.98,11.49,8.79,18.47,20.98,18.47c70.74,0.02,141.47,0.01,212.21,0.01v0.27h76.97c44.94,0,89.88,0.01,134.82-0.02
                                        c2.33-0.01,4.68-0.13,7-0.42c10.29-1.28,17.55-9.06,17.84-18.45C473.07,397.97,472.03,397.18,468.53,397.19z M64.23,410.27
                                        c-5.32,0.08-10.65,0.09-15.96,0.04c-0.7,0-1.67-0.15-1.51-1.27c0.12-0.86,0.96-0.8,1.54-0.81c2.72-0.05,5.44-0.02,8.17-0.02v-0.03
                                        c2.6,0,5.19-0.03,7.79,0.02c0.72,0.02,1.75-0.02,1.75,1.03C66,410.28,64.88,410.25,64.23,410.27z" />
                                            <path class="stpaypersale0 stpaypersalehover" d="M492.75,233.56c-39.93,20.62-79.82,41.31-119.71,62.01c-21.21,11.01-42.41,22.05-63.6,33.08
                                        c-4.5,2.35-4.51,2.37-6.84-2.12c-5.14-9.92-10.31-19.82-15.36-29.77c-1.04-2.06-2.42-3.55-4.32-4.83
                                        c-9.9-6.71-19.73-13.51-29.59-20.28c-17.69-11.9-35.37-23.82-53.12-35.65c-2.87-1.91-1.54-3.55-0.24-5.45
                                        c10.54-15.49,21.05-30.97,31.57-46.47c27.97-41.21,55.94-82.42,83.9-123.63c3.26-4.8,3.22-4.8,8.22-1.41
                                        c15.71,10.68,31.43,21.32,47.14,32c1.06,0.72,2.01,1.58,3.02,2.38c14.23,9.18,28.25,18.7,42.11,28.42
                                        c5.61-1.79,10.48-5.08,15.69-7.69c2.24-1.12,3.44-0.78,4.6,1.48c9.52,18.49,19.12,36.93,28.68,55.39c0.24,0.45,0.28,0.99,0.42,1.48
                                        c5.95,11.22,11.94,22.44,17.87,33.68c3.82,7.23,7.43,14.59,11.41,21.72C496.23,230.82,495.55,232.11,492.75,233.56z" />
                                            <linearGradient id="SVGID_1_" gradientUnits="userSpaceOnUse" x1="46.4785" y1="262.9674" x2="429.736" y2="262.9674">
                                                <stop offset="0" style="stop-color:#F2AA35" />
                                                <stop offset="0.4002" style="stop-color:#D19230" />
                                                <stop offset="1" style="stop-color:#996A28" />
                                            </linearGradient>
                                            <path class="stpaypersale2 stpaypersalehover" d="M429.73,280.64v-4.38c-5.96,2.94-11.45,5.8-17.1,8.33c-2.31,1.03-2.89,2.37-2.89,4.74
                                        c0,24.6-0.13,49.22-0.2,73.82c-0.02,6.78,0,6.78-6.65,6.78H76.08c-1.56,0-3.13-0.05-4.69,0.03c-3,0.16-4.75-0.99-4.69-4.21
                                        c0.05-2.59,0.11-5.19,0.11-7.79c0.01-63.29,0-126.58,0.02-189.87c0-2.85-0.45-5.68-0.09-8.56c0.34-2.61,1.65-3.71,4.1-3.68
                                        c2.34,0.02,4.68,0.23,7.03,0.23c35.83-0.03,71.66-0.07,107.49-0.13c18.37-0.03,36.74-0.08,55.11-0.14c1.36-0.01,2.85,0.47,3.88-1.07
                                        c4.03-6.03,8.09-12.02,12.14-18.02c-1.22-1.1-2.45-0.67-3.56-0.67c-63.06-0.02-126.14-0.02-189.2-0.02c-1.04,0-2.08,0.04-3.12,0.13
                                        c-10.52,0.91-14.12,4.85-14.12,15.52c-0.01,73.98-0.01,147.94-0.01,221.91c0,11.88,4.23,16.16,16.18,16.4c0.65,0.02,1.3,0,1.95,0
                                        c115.71,0,231.42,0,347.13-0.02c2.33,0,4.7-0.11,7-0.45c5.65-0.83,9.06-4.16,10.36-9.69c0.57-2.44,0.63-4.9,0.63-7.37
                                        C429.73,341.85,429.73,311.24,429.73,280.64z M237.96,141.94c2.56-0.14,4.14,1.17,4.27,3.89c0.08,2.54-1.2,3.94-3.67,4.07
                                        c-2.59,0.13-4.22-1.1-4.28-3.84C234.22,143.6,235.54,142.06,237.96,141.94z" />
                                            <linearGradient id="SVGID_00000033363936087066273400000013978253593533097902_" gradientUnits="userSpaceOnUse" x1="3.0945" y1="408.8231" x2="472.9667" y2="408.8231">
                                                <stop offset="0" style="stop-color:#F2AA35" />
                                                <stop offset="0.4002" style="stop-color:#D19230" />
                                                <stop offset="1" style="stop-color:#996A28" />
                                            </linearGradient>
                                            <path class="stpaypersale3 stpaypersalehover" d="M468.53,397.19
                                        c-59.92,0.12-119.85,0.09-179.76,0.09c-1.05,0-2.09,0.01-3.13,0.01c-2.15,0-3.24,1.1-2.86,3.19c0.74,4.07-1.28,4.83-4.83,4.8
                                        c-18.24-0.12-36.47-0.05-54.71-0.05c-8.46,0-16.93-0.03-25.4,0.02c-2.82,0.02-4.67-0.81-4.14-4.05c0.53-3.29-1.14-3.95-4.03-3.95
                                        c-60.83,0.05-121.66,0.05-182.5-0.01c-3.38-0.01-4.28,1.36-4.02,4.49c0.98,11.49,8.79,18.47,20.98,18.47
                                        c70.74,0.02,141.47,0.01,212.21,0.01v0.27h76.97c44.94,0,89.88,0.01,134.82-0.02c2.33-0.01,4.68-0.13,7-0.42
                                        c10.29-1.28,17.55-9.06,17.84-18.45C473.07,397.97,472.03,397.18,468.53,397.19z M64.23,410.27c-5.32,0.08-10.65,0.09-15.96,0.04
                                        c-0.7,0-1.67-0.15-1.51-1.27c0.12-0.86,0.96-0.8,1.54-0.81c2.72-0.05,5.44-0.02,8.17-0.02v-0.03c2.6,0,5.19-0.03,7.79,0.02
                                        c0.72,0.02,1.75-0.02,1.75,1.03C66,410.28,64.88,410.25,64.23,410.27z" />
                                            <path class="stpaypersale4 stpaypersalehover" d="M492.75,233.56c-39.93,20.62-79.82,41.31-119.71,62.01c-21.21,11.01-42.41,22.05-63.6,33.08
                                        c-4.5,2.35-4.51,2.37-6.84-2.12c-5.14-9.92-10.31-19.82-15.36-29.77c-1.04-2.06-2.42-3.55-4.32-4.83
                                        c-9.9-6.71-19.73-13.51-29.59-20.28c0.02-4.31,3.39-6.85,5.38-10.11c0.6-0.98,1.39-1.9,2.64-2.06c0.13-0.02,0.27-0.03,0.41-0.03
                                        c0.07,0.02,0.15,0.04,0.22,0.06c2.75,0.73,4.95,2.36,7.12,4.05c0.33,0.26,0.66,0.52,0.99,0.78c0.28,0.23,0.57,0.45,0.86,0.67
                                        c4.18,4.67,4.15,4.63,9.84,1.84c1.98-0.97,3.78-2.49,6.16-2.49c0.09,0,0.19,0,0.29,0.01c1.5,0.59,1.94,2.03,2.62,3.27
                                        c4.21,7.78,8.28,15.63,12.21,23.56c2.29,4.62,2.58,4.74,7.51,4.07c4.54-0.63,8.47,0.51,11.84,3.71c3.87,3.68,4.39,3.66,9.13,0.94
                                        c7.34-4.21,14.98-7.86,22.5-11.73c23.96-12.33,47.76-24.96,71.76-37.22c11.12-5.69,22.1-11.65,33.26-17.28
                                        c2.82-1.42,3.78-3.21,2.98-6.24c-1.28-4.85,0.2-9.06,3.73-12.42c2.61-2.49,2.73-4.83,1.07-7.97c-4.01-7.59-8.17-15.11-11.92-22.83
                                        c-0.69-1.43-1.62-2.8-1.72-4.46c-0.01-0.06-0.02-0.13-0.02-0.2v-0.07c3.27-4.39,7.62-6.78,13.13-7
                                        c5.95,11.22,11.94,22.44,17.87,33.68c3.82,7.23,7.43,14.59,11.41,21.72C496.23,230.82,495.55,232.11,492.75,233.56z" />
                                            <path class="stpaypersale5 stpaypersalehover" d="M373.82,93.41c-1.12,4.94-4.34,8.56-7.65,12.13c-0.02,0.02-0.03,0.04-0.05,0.05c-0.08,0.02-0.16,0.05-0.23,0.06
                                        c-0.16,0.04-0.31,0.06-0.48,0.07c-0.14,0-0.28-0.01-0.42-0.02h-0.01c-7.46-4.03-14.2-9.16-21.25-13.83
                                        c-0.65-0.43-1.29-0.89-1.88-1.39c-3.6-3.09-6.96-4.39-11.24-0.6c-3.29,2.91-7.77,3.16-11.89,1.8c-3.35-1.11-5.26-0.24-7.14,2.61
                                        c-10.17,15.45-20.71,30.64-31.07,45.96c-16.27,24.06-32.57,48.09-48.98,72.05c-2.24,3.27-3.19,5.87-0.24,9.29
                                        c3.34,3.87,3.31,8.68,2.02,13.36c-0.71,2.58,0,4.06,2.09,5.59c8.21,5.99,17.03,11.09,25.13,17.25c0.09,0.09,0.19,0.16,0.28,0.24
                                        c0.16,0.13,0.31,0.24,0.45,0.38c0.35,0.3,0.64,0.63,0.7,1.11c0.02,0.16,0.02,0.33-0.02,0.52c-4.38,2.76-5.93,7.61-8.63,11.62
                                        c-17.69-11.9-35.37-23.82-53.12-35.65c-2.87-1.91-1.54-3.55-0.24-5.45c10.54-15.49,21.05-30.97,31.57-46.47
                                        c27.97-41.21,55.94-82.42,83.9-123.63c3.26-4.8,3.22-4.8,8.22-1.41c15.71,10.68,31.43,21.32,47.14,32
                                        C371.85,91.75,372.81,92.61,373.82,93.41z" />
                                            <path class="stpaypersale5 stpaypersalehover" d="M465.32,172.49c-4.6,1.68-8.99,3.73-12.63,7.1c-0.16,0.11-0.32,0.16-0.48,0.16c-0.14,0-0.28-0.04-0.42-0.13
                                        c-0.03-0.02-0.06-0.03-0.09-0.06c-0.02-0.02-0.05-0.03-0.08-0.05c-5.29-9.26-9.74-18.96-14.91-28.29c-1.41-2.54-2.89-3.62-5.88-2.97
                                        c-5.56,1.21-10.32-0.7-14.13-4.74c-1.9-2.01-3.61-1.95-5.87-0.76c-23.37,12.32-46.84,24.45-70.31,36.59
                                        c-19.54,10.1-39,20.34-58.58,30.38c-2.43,1.25-4.21,2.59-3.31,5.69c1.75,5.98-0.57,10.78-4.79,14.73c-1.97,1.85-1.79,3.23-0.63,5.37
                                        c4.59,8.46,8.74,17.15,13.37,25.61c0.44,0.8,0.81,1.63,0.85,2.57v0.02c-0.01,0.06-0.02,0.13-0.03,0.19
                                        c-0.02,0.16-0.08,0.31-0.16,0.45c-0.07,0.14-0.16,0.27-0.28,0.38c-3.23,1.62-6.6,3.01-9.63,4.93c-2.44,1.54-3.84,1.82-4.77-1.36
                                        c-0.31-1.03-1.33-1.86-2.03-2.78c-0.52-0.63-0.99-1.3-1.43-1.97c-1.77-2.74-3.02-5.77-4.63-8.61c-0.03-0.07-0.08-0.15-0.12-0.22
                                        c-0.01-0.01-0.01-0.02-0.02-0.02c-7.02-12.78-13.42-25.86-20.33-38.69c-1.72-3.2-0.95-4.81,2.65-6.85
                                        c8.99-5.1,18.4-9.41,27.51-14.28c0.19-0.1,0.38-0.2,0.57-0.31c0.1-0.05,0.21-0.11,0.31-0.16c6.17-3.34,12.56-6.25,18.64-9.78
                                        c0.02-0.02,0.05-0.03,0.08-0.05c0.09-0.02,0.16-0.05,0.25-0.09c2.3-0.78,4.36-2.02,6.43-3.27c0.39-0.24,0.78-0.47,1.17-0.7
                                        c0.05-0.02,0.1-0.05,0.16-0.08c0.03-0.02,0.06-0.04,0.1-0.05c0.17-0.09,0.34-0.18,0.52-0.27c3.42-1.72,7.03-3.09,10.07-5.51
                                        c0.05-0.04,0.11-0.08,0.16-0.13c0.03-0.02,0.06-0.05,0.09-0.07c10.8-4.77,20.87-10.99,31.54-16.01c1.25-0.59,2.48-1.22,3.78-1.72
                                        c0.04-0.02,0.08-0.03,0.12-0.05c0.06-0.04,0.13-0.07,0.2-0.1c13.55-7.39,27.34-14.33,41.08-21.38c1.88-0.96,3.37-2.35,5.03-3.56
                                        c0.12,0,0.23-0.01,0.34-0.02h0.07c1.97-0.16,3.64-1.08,5.37-2.04c5.1-2.84,10.19-5.7,15.68-7.73c5.61-1.79,10.48-5.08,15.69-7.69
                                        c2.24-1.12,3.44-0.78,4.6,1.48c9.52,18.49,19.12,36.93,28.68,55.39C465.13,171.45,465.18,171.99,465.32,172.49z" />
                                            <path d="M211.74,305.08c-0.45,2.18-2.2,2.74-4.02,3.14c-6.09,1.32-12.16,2.84-18.31,3.82c-3.56,0.56-2.88,1.61-1.32,3.77
                                        c5.77,8.01,11.32,16.18,17.18,24.13c2.16,2.94,1.72,4.73-1.2,6.6c-3.39,2.18-6.78,4.41-9.85,6.99c-3.1,2.59-4.9,1.56-6.87-1.32
                                        c-5.6-8.13-11.35-16.16-17.06-24.22c-0.8-1.14-1.36-2.51-2.83-3.3c-4.32,5.72-8.65,11.39-12.9,17.11c-1.14,1.54-2.3,2.85-4.44,2.48
                                        c-2.44-0.41-2.87-2.4-3.27-4.32c-5.89-27.55-11.73-55.11-17.65-82.65c-0.42-1.93-0.53-3.66,1.19-4.91c1.72-1.26,3.42-0.71,5.06,0.35
                                        c24.64,15.96,49.28,31.9,73.92,47.85C210.99,301.66,212.18,302.94,211.74,305.08z" />
                                            <path class="stpaypersale1 stpaypersalehover" d="M195.38,191.47c-0.78,0.09-1.56,0.04-2.34,0.04c-36.31,0-72.63-0.02-108.95,0.02
                                        c-2.96,0.01-5.53-0.38-6.44-3.69c-1.05-3.79,1.39-6.5,5.89-6.5c17.84-0.03,35.66-0.02,53.5-0.02h1.95c18.23,0,36.45,0.03,54.67-0.02
                                        c3.27-0.01,5.68,0.93,6.21,4.46C200.31,188.73,198.38,191.11,195.38,191.47z" />
                                            <path class="stpaypersale1 stpaypersalehover" d="M198.24,216.04c-1.15,1.07-2.5,1.25-3.96,1.25c-37.1,0-74.2,0.01-111.28-0.02c-3.6-0.01-5.52-1.92-5.5-5.12
                                        c0.02-3.18,1.95-5.02,5.59-5.02c18.61-0.04,37.22-0.02,55.84-0.02c18.35,0,36.71,0.03,55.06-0.03c2.62-0.01,4.69,0.79,5.62,3.27
                                        C200.38,212.4,199.99,214.42,198.24,216.04z" />
                                            <path class="stpaypersale6 stpaypersalehover" d="M415.93,121.83c-1.93,2.47-5.03,2.98-7.54,4.46c-2.99,1.76-6.06,3.42-9.18,4.92c-1.33,0.63-2.66,2.46-4.43,0.65
                                        l-0.01-0.01c0.02-0.09,0.03-0.17,0.04-0.26c0.86-6.12-4.09-8.02-7.99-10.63c-6.16-4.14-12.38-8.19-18.37-12.56
                                        c-1-0.74-2.55-1.14-2.57-2.76c0-0.09,0.01-0.2,0.02-0.3c2.64-3.99,5.28-7.97,7.92-11.95C388.05,102.59,402.06,112.11,415.93,121.83z
                                        " />
                                            <path class="stpaypersale7 stpaypersalehover" d="M124.7,253.32c-0.31,2.22-2.28,1.58-3.77,1.48c-12.16-0.86-24.33-1.69-36.48-2.66
                                        c-1.8-0.14-5.02,0.99-4.82-2.21c0.2-3.19,3.3-1.21,4.68-1.63c12.56,0.88,24.72,1.7,36.89,2.59
                                        C122.76,251.01,125.07,250.68,124.7,253.32z" />
                                            <path class="stpaypersale7 stpaypersalehover" d="M189.56,240.46c-0.07,1.34-0.86,1.88-1.91,2.28c-11.64,4.4-23.27,8.83-34.91,13.21
                                        c-1.38,0.52-2.98,0.86-3.53-1.08c-0.49-1.72,1-2.24,2.19-2.69c11.51-4.36,23.04-8.68,34.56-13.03
                                        C187.63,238.53,189,238.46,189.56,240.46z" />
                                            <path class="stpaypersale8 stpaypersalehover" d="M126.99,264.02c-0.14,1.15-1.02,1.73-1.8,2.42c-7.86,6.96-15.71,13.95-23.54,20.94
                                        c-1.18,1.06-2.53,2.45-3.98,0.99c-1.53-1.53-0.05-2.76,1.16-3.83c7.96-7.07,15.91-14.14,23.84-21.23c0.91-0.81,1.81-1.55,3.1-1.1
                                        C126.58,262.5,126.94,263.19,126.99,264.02z" />
                                            <path class="stpaypersale7 stpaypersalehover" d="M157.88,223.17c-5.02,8.47-10.03,16.94-15.06,25.41c-0.4,0.68-0.92,1.27-1.83,1.24
                                        c-0.69,0.04-1.29-0.13-1.72-0.7c-0.9-1.23-0.06-2.22,0.51-3.2c3.89-6.58,7.78-13.15,11.68-19.73c0.99-1.67,1.97-3.34,3.02-4.99
                                        c0.71-1.14,1.76-1.64,2.95-0.78C158.38,221.1,158.52,222.09,157.88,223.17z" />
                                            <path class="stpaypersale7 stpaypersalehover" d="M131.77,246.92c-0.21,1.25-1.31,1.71-2.74,1.12c-0.65-0.26-1.15-1.01-1.6-1.62
                                        c-5.21-7.12-10.39-14.25-15.57-21.38c-0.92-1.28-2.09-2.71-0.15-3.94c1.68-1.07,2.58,0.43,3.42,1.57
                                        c5.19,7.13,10.36,14.27,15.53,21.42C131.17,244.81,131.91,245.43,131.77,246.92z" />
                                            <path class="stpaypersale9 stpaypersalehover" d="M451.96,179.56c0.24-0.01,0.48,0,0.72,0.02c4.91,9.45,9.78,18.93,14.77,28.34c1.35,2.54,1.42,4.65-0.89,6.57
                                        c-4.58,3.81-6.1,8.7-4.3,14.27c0.95,2.94-0.35,4.02-2.51,5.14c-15.83,8.16-31.67,16.3-47.47,24.53
                                        c-27.57,14.35-55.13,28.72-82.64,43.18c-3.21,1.69-5.64,1.94-8.18-1.11c-3.38-4.06-7.83-5.41-12.98-3.96
                                        c-3.21,0.9-5.06-0.29-6.51-3.22c-4.78-9.65-9.45-19.36-15.03-28.59c-0.01-0.26-0.01-0.52,0-0.78c4.34-2.31,8.32-5.33,13.17-6.63
                                        c2.89,1.71,5.62,1.26,8.36-0.48c1.53-0.97,3.18-1.81,4.87-2.43c3.79-1.39,6.41-3.72,7.01-7.9c3.08-1.79,5.91-4.14,9.74-4.17
                                        c3.01,1.94,4.63,5.19,7.12,7.65c3.73,3.68,8,6.28,12.94,7.7c25.8,7.45,50.81-6.41,60.02-30.45c2.63-6.87,2.25-14.04,0.13-21.09
                                        c-0.51-1.72-1.5-3.36-1.02-5.28c2.87-2.41,6.01-4.32,9.68-5.23c2.41,1.72,4.74,1.5,7.24,0.03c2.46-1.44,5.04-2.75,7.69-3.82
                                        c2.96-1.2,4.65-3.17,4.94-6.35C442.76,182.49,446.66,179.48,451.96,179.56z" />
                                            <path class="stpaypersale10 stpaypersalehover" d="M264.99,254.59c2.41,3.36,4.2,7.03,5.53,10.93c-2.85-1.83-5.71-3.67-8.56-5.5c-0.55-0.49-1.09-0.99-1.64-1.48
                                        C261.81,257.14,262.44,254.73,264.99,254.59z" />
                                            <path class="stpaypersale11 stpaypersalehover" d="M264.99,254.59c-1.9,0.91-2.02,3.93-4.67,3.95c-9.03-6.1-18.06-12.21-27.1-18.31
                                        c-1.65-1.11-1.92-2.4-1.19-4.34c2.13-5.67,1.45-11.1-2.72-15.6c-2.08-2.24-1.72-3.82-0.18-6.07c23.68-34.75,47.29-69.54,70.9-104.33
                                        c4.01-5.91,8.01-11.82,11.91-17.81c1.34-2.06,2.77-2.79,5.2-1.84c5.9,2.32,11.26,1.19,15.8-3.18c1.82-1.75,3.48-1.43,5.23-0.22
                                        c8.99,6.15,17.97,12.32,26.95,18.49c0.63,0.7,0.52,1.51,0.08,2.16c-2.46,3.63-4.3,7.72-7.7,10.67c-3.02-0.02-5.02,1.44-6.49,4.05
                                        c-1.33,2.37-2.85,4.66-4.53,6.8c-1.84,2.35-2.38,4.79-1.36,7.58c-1.51,3.52-3.66,6.63-6.04,9.6c-5.11-1.77-9.88-4.34-15.48-4.91
                                        c-5.33-0.54-10.44-0.03-15.32,1.73c-21.07,7.57-31.74,24.06-33.61,46.21c-0.18,2.08,0.04,4.15,0.61,6.18
                                        c-9.43,4.88-18.79,9.89-28.32,14.56c-3.41,1.67-3.41,3.36-1.81,6.38C251.88,229.04,258.4,241.84,264.99,254.59z" />
                                            <path class="stpaypersale9 stpaypersalehover" d="M357.35,117.71c2.53-4.17,5.87-7.82,7.78-12.38c0.25,0,0.51,0.01,0.76,0.02c8.34,5.73,16.52,11.71,25.08,17.09
                                        c3.94,2.47,5.66,5,3.79,9.41c-0.79,1.9-2.36,2.85-4.13,3.76c-14.02,7.28-28,14.64-42,21.98c-2.66-4.25-6.76-7.36-9.27-11.74
                                        c0.47-3.78,3.46-6.14,5.18-9.21c3.12-0.21,5.24-1.86,6.8-4.51c1.24-2.12,2.59-4.2,4.09-6.14
                                        C357.38,123.49,358.36,120.85,357.35,117.71z" />
                                            <path class="stpaypersale12 stpaypersalehover" d="M300.18,257.73c-4.48,1.92-8.14,5.59-13.22,6.23c-5.2-9.88-10.37-19.77-15.61-29.63
                                        c-0.96-1.8-0.7-2.83,0.98-4.23c4.58-3.79,7.23-8.54,5.23-14.72c-1-3.07,0.09-4.63,2.87-6.05c24.98-12.77,49.93-25.62,74.83-38.56
                                        c18.67-9.7,37.25-19.58,55.88-29.37c2.31-1.21,4.05-1.27,6.04,1.14c3.66,4.44,8.63,6.06,14.36,4.61c2.02-0.51,3.76-0.83,4.97,1.51
                                        c4.9,9.45,9.89,18.85,14.8,28.3c0.4,0.77,0.45,1.73,0.66,2.61c-4.46,1.59-8.7,3.64-12.6,6.34c-3.25-1.42-6.17-0.6-9.02,1.19
                                        c-1.31,0.82-2.71,1.54-4.16,2.08c-3.42,1.26-5.94,3.4-7.27,6.85c-3.09,1.63-5.82,3.99-9.37,4.68c-1.42,0.03-1.97-1.12-2.65-2.03
                                        c-9.05-12.02-21.4-15.58-35.84-14.37c-17.48,1.47-29.71,10.89-38.64,25.18c-5.39,8.63-5.95,18.08-3.17,27.8
                                        c0.51,1.8,1.88,3.53,0.76,5.57c-3.51,0.65-6.14,3.42-9.69,3.98C311.98,247.46,304.77,250.17,300.18,257.73z" />
                                            <path class="stpaypersale13 stpaypersalehover" d="M339.38,145.86c3.7,3.43,8,6.39,9.27,11.74c-10.95,4.78-21.16,11.02-31.92,16.17c-1.25,0.6-2.41,1.57-3.96,1.1
                                        c-3.42-2.83-4.69-2.64-7.36,1c-1.2,1.64-1.99,3.59-3.67,4.87c-2.1,1.36-2.83-0.31-3.46-1.7c-2.2-4.85,0.41-11.2,5.37-13.2
                                        c1.64-0.66,3.3-1.4,2.88-3.54c-0.4-2.01-2.2-2.42-3.93-2.56c-2.21-0.17-4.13,0.67-5.5,2.4c-4.71,5.97-6.98,12.43-3.83,19.93
                                        c0.4,0.95,0.89,1.89,0.72,2.99c-4.52,3.9-10.22,5.73-15.31,8.62c-1.1,0.63-2.26,1.15-3.39,1.72c-1.83-0.31-1.64-1.75-1.63-3.03
                                        c0.02-23.75,13.15-45.25,38.36-51.52C321.67,138.46,330.98,140.27,339.38,145.86z" />
                                            <path class="stpaypersale6 stpaypersalehover" d="M293.99,185.06c-6.26-8.48-2.44-19.25,3.8-24.98c2.63-2.41,5.95-1.87,8.91-0.13c1.41,0.83,1.65,2.36,1.25,3.81
                                        c-0.54,1.97-2.29,2.74-4.04,3.18c-4.83,1.21-7.43,9.56-4.15,13.43c0.78,0.92,1.34,0.24,2-0.06c0.2,0.18,0.27,0.36,0.21,0.55
                                        c-0.06,0.19-0.13,0.28-0.19,0.28C299.51,183.08,297.15,184.86,293.99,185.06z" />
                                            <path class="stpaypersale14 stpaypersalehover" d="M301.79,181.14c-0.01-0.28-0.01-0.55-0.02-0.83c1.15-2.72,2.68-5.21,4.8-7.26c2.51-2.43,5.02-1.64,6.19,1.82
                                        C309.99,178.51,305.67,179.43,301.79,181.14z" />
                                            <path class="stpaypersale15 stpaypersalehover" d="M330.01,242.84c-3.73-9.46-5.35-19.16-0.94-28.71c8.06-17.45,21.3-28.3,40.85-30.84
                                        c6.46-0.84,12.67-0.09,18.86,1.45c9.22,2.29,15.67,8.27,20.76,15.96c13.96,29.5-16.18,57.86-38.75,59.56
                                        c-5.77,0.43-11.42,0.34-17.06-0.61C343.16,257.85,335.69,251.59,330.01,242.84z" />
                                            <path class="stpaypersale16 stpaypersalehover" d="M418.92,196.02c-0.35-2.97,0.93-4.82,3.66-6.05c3.29-1.48,6.51-3.17,9.63-4.98c2.72-1.57,5.06-1.7,7.15,0.91
                                        c0.5,2.85-0.69,4.62-3.29,5.85c-3.64,1.71-7.18,3.62-10.71,5.54C422.8,198.68,420.66,198.5,418.92,196.02z" />
                                            <path class="st16" d="M300.18,257.73c-0.45-2.96,0.82-4.79,3.54-6.02c3.49-1.6,6.92-3.37,10.25-5.29c2.32-1.34,4.33-1.26,6.36,0.4
                                        c1.09,3.33-0.24,5.37-3.31,6.78c-3.4,1.56-6.76,3.26-9.99,5.15C304.34,260.32,302.17,260.05,300.18,257.73z" />
                                            <path class="stpaypersale17 stpaypersalehover" d="M357.35,117.71c2.08,1.9,2.14,4,0.63,6.25c-2.39,3.55-4.73,7.14-7.2,10.64c-1.52,2.15-3.45,3.46-6.22,2.06
                                        c-1.7-2.44-1.49-4.65,0.35-7.05c2.28-2.97,4.33-6.14,6.31-9.33C352.72,117.89,354.53,116.72,357.35,117.71z" />
                                            <path class="stpaypersale16 stpaypersalehover" d="M358.92,214.65c3.11-1.55,5.62-2.91,8.22-4.08c2.29-1.03,4.64-1.4,5.96,1.46c1.23,2.67-0.53,4.15-2.54,5.31
                                        c-2.14,1.23-4.37,2.3-6.56,3.45c-1.12,0.59-2.64,0.97-1.55,2.8c1.02,1.71,2.17,0.76,3.3,0.17c2.31-1.19,4.6-2.42,6.93-3.56
                                        c2.14-1.04,4.17-0.93,5.36,1.37c1.25,2.41,0.23,4.27-2.02,5.5c-2.6,1.42-5.23,2.78-7.95,4.22c4.05,3.67,10.08,3.91,13.75,0.87
                                        c0.94-0.78,1.01-1.71,1.1-2.76c0.18-1.96,1.27-3.12,3.25-3.23c1.88-0.1,3.22,0.78,4.02,2.5c1.35,2.92,0.39,6.66-2.29,8.76
                                        c-8.06,6.33-17.99,6.23-25.73-0.42c-1.58-1.36-2.83-1.45-4.5-0.43c-1.44,0.87-2.95,1.7-4.54,2.23c-2.06,0.69-3.97,0.2-4.91-1.95
                                        c-0.84-1.92-0.17-3.62,1.55-4.74c1.41-0.92,2.93-1.7,4.46-2.4c1.21-0.56,2.06-1.17,1.41-2.64c-0.7-1.6-1.78-1.06-2.88-0.51
                                        c-1.62,0.81-3.2,1.78-4.92,2.33c-1.85,0.59-3.75,0.32-4.6-1.77c-0.83-2.04-0.36-3.87,1.64-5.05c0.89-0.52,1.88-0.89,2.83-1.3
                                        c2.77-1.2,4.01-2.74,3.57-6.28c-1.26-10.05,6.45-17.72,15.53-19.97c3.01-0.75,5.68,0.68,7.35,3.34c0.94,1.5,1,3.2-0.21,4.75
                                        c-1.03,1.31-2.39,1.51-3.87,1.16c-5.24-1.23-10.34,2.25-11.15,7.69C358.81,212.36,358.92,213.28,358.92,214.65z" />
                                        </svg>
                                        @if(app()->getLocale() == "de")
                                        <p style="white-space: pre;  margin-top: -3px;" class="text-center paypersaleResponsiv paypersaletitle">@lang('site.paypersale')</p>

                                        @else
                                        <p class="text-center paypersaleResponsiv paypersaletitle">@lang('site.paypersale')</p>

                                        @endif


                                    </a>

                                </div>




                            </div>



                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12  mt-md-25 mb-sm-10  pr-sm-100 pl-sm-50  pl-50 pr-50">
                                <!--=======  search bar  =======-->

                                <div class="search-bar">
                                    <form action="#">
                                        <input type="search" placeholder="">
                                        <button type="submit"> <i class="icon-search"></i></button>
                                    </form>
                                </div>

                                <!--=======  End of search bar  =======-->
                            </div>

                            <div class=" col-xl-4  col-lg-4   col-md-4 col-sm-12">
                                <!--=======  logo  =======-->

                                <div class="logo text-center">
                                    <a href="{{ url('/') }}">

                                        @if(app()->getLocale() == "en")
                                        <img width="200" height="100" src="{{ url('uploads/logo1.png') }}" class="img-fluid" alt="" style="    height: 87px; width: 290px;">

                                        @elseif(app()->getLocale() == "ar")
                                        <img width="200" height="100" src="{{ url('uploads/logo-ar.png') }}" class="img-fluid" alt="" style="    height: auto; width: 290px;">

                                        @else
                                        <img width="200" height="100" src="{{ url('uploads/logo1.png') }}" class="img-fluid" alt="" style="    height: 87px; width: 290px;">

                                        @endif
                                    </a>
                                </div>

                                <!--=======  End of logo  =======-->
                            </div>

                        </div>
                    </div>

                    <!--====================  End of navigation top search  ====================-->
                </div>

            </div>
        </div>
    </div>

    <!--====================  End of Navigation top  ====================-->

    <!--====================  navigation menu ====================-->

    <div class="navigation-menu-area" style="    padding-right: 0px;  padding-left: 0px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- navigation section -->
                    <div class="main-menu d-none d-lg-block headertop-dropdown-container ">
                        <nav style="text-align: center; direction: rtl;">
                            <ul style="margin: 0px">
                                @foreach($categories as $category)
                                <li><a href="{{ url('/') }}" class="single-category-Headeritem cath-{{$category->id}} single-category-item  item_active_header @if ($loop->first) {{ 'headeractive' }} @endif " data-header="true" data-rel="{{ $category->id }}" data-name="@if (!empty($category->translation->name))
                                                                                {{ $category->translation->name }}@else{{ $category->name }}
                                                                                @endif"> @if (!empty($category->translation->name))
                                        {{ $category->translation->name }}@else{{ $category->name }}
                                        @endif</a>

                                </li>
                                <span class="separator">|</span>
                                @endforeach


                                <li><a href="{{ url('/') }}">
                                        @lang('site.client_expirence')
                                    </a>
                                </li>





                            </ul>
                        </nav>

                    </div>
                    <!-- end of navigation section -->

                    <!-- Mobile Menu -->
                    <div class="mobile-menu-wrapper d-block d-lg-none pt-15">
                        <div class="mobile-menu"></div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!--====================  End of navigation menu  ====================-->
</div>

<!--====================  End of Header area  ====================-->
<!--====================  Start of Wishlist Form area  ====================-->
@if (isset($authCustomer['id']))

<form id="wishlist-form" method="POST" action="{{ url('wishlist') }}" style="display: none;">
    {{ csrf_field() }}
    <input type="text" value="{{$authCustomer['id']}}" type="hidden" name="customer_id">
</form>

@endif
<!--====================  Start of Wishlist Form area  ====================-->

<div class="modal modalfadeIn quick-view-modal-containerCart " tabindex="-1" role="dialog" aria-hidden="true" style=" 
     width: 100%;
    height: 100%;">
    <div class="modal-dialog modal-dialog-centered widthmobailcart modal-dialogcart" role="document">
        <div class="modal-content modal-content-slideIn" style="overflow-y: auto; border-radius: 0px;  height: auto; min-height: 100%; border-radius: 0;
     position: relative;
    background-color: #fff;
    -webkit-background-clip: padding-box;
    background-clip: padding-box;
    outline: 0;
    -webkit-box-shadow: 0 3px 9px rgb(0 0 0 / 50%);
    box-shadow: -9px 0px 14px 0px #d0923069;
        ">
            <div class="modal-header" style="margin-bottom: 11px;">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="  height: 80vh; overflow-y: auto;">
                <div>
                    <!--=======  small cart  =======-->

                    <div>
                        <div class="small-cart-item-wrapper" id="CartHTML">
                            @lang('site.no_product')
                        </div>

                        <div class="cart-calculation-table">
                            <table class="table mb-25">
                                <tbody>
                                    <!-- <tr>
                                        <td class="text-start">Sub-Total :</td>
                                        <td class="text-end">$129.00</td>
                                    </tr>
                                    <tr>
                                        <td class="text-start">Eco Tax (-2.00) :</td>
                                        <td class="text-end">$4.00</td>
                                    </tr>
                                    <tr>
                                        <td class="text-start">VAT (20%) :</td>
                                        <td class="text-end">$25.80</td>
                                    </tr> -->
                                    <tr>
                                        <td class="text-start">@lang('site.total'):</td>
                                        <td class="text-end">
                                            <span id="total_cost" style="color: #990000;">0.0</span><span style="color: #990000;">€</span>
                                            <span style="color: black; font-size: 15px; font-weight: bold; display: block;"> @lang('site.includeVat') </span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                            <div class="cart-buttons">
                                <a class="theme-button checkoutcart">@lang('site.checkout')</a>
                                <a class="theme-button addOrder">@lang('site.view_cart')</a>
                                <a class="theme-button continueShopping">@lang('site.continue_shopping')</a>
                            </div>
                        </div>

                    </div>

                    <!--=======  End of small cart  =======-->

                </div>
            </div>
        </div>
    </div>

</div>

<div class="modal quick-view-modal-containergift " tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered  modal-dialoggift" role="document">

        <div class="modal-content" style="     background-color: #900;    height: 400px;
    width: 325px;  overflow-y: auto; border-radius: 0px;  border-radius: 0;">
            <div class="modal-header" style=" margin-bottom: -14px;  border: 0;">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="  height: 50vh; overflow-y: hidden;">
                <div>
                    <!--=======  small cart  =======-->

                    <div>
                        <div class="small-cart-item-wrapper" style="padding: 5px;">
                            <div class="row">
                                <div class="image" style=" margin-bottom: 12px;display: flex; flex-direction: row-reverse; justify-content: space-between;">

                                    <svg version="1.1" id="Layer_4" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 500 500" style=" width: 60px; enable-background:new 0 0 500 500;" xml:space="preserve">
                                        <style type="text/css">
                                            .st0 {
                                                fill: #FFFFFF;
                                            }
                                        </style>
                                        <g>
                                            <path class="st0" d="M482.45,128.28c-3.99-12.57-15.07-20.98-28.32-21.2c-11.25-0.17-22.51-0.04-34.35-0.04h-0.23
		c0.04-0.07,0.07-0.15,0.11-0.22c0.72-1.45,1.15-2.33,1.6-3.2c9.43-18.09,9.07-36.43,0.09-54.32
		c-18.01-35.82-64.45-43.96-94.94-16.9c-13.31,11.83-26.46,23.85-39.58,35.9c-2.1,1.93-3.21,2.56-5.73,0.21
		c-17.73-16.67-44.62-16.62-62.32,0.1c-2.28,2.16-3.37,1.82-5.4-0.04c-13.02-11.94-26.16-23.73-39.2-35.63
		c-11.08-10.09-23.92-16.2-38.99-16.55c-22.49-0.53-40.79,8.29-53.17,27.11c-12.43,18.93-13.74,39.16-3.63,59.79
		c0.56,1.12,1.92,2.06,1.18,3.74c-10.95,0-21.91-0.1-32.87,0.02c-13.79,0.13-24.41,7.89-29.09,20.83c-0.37,1.03-0.06,2.54-1.54,3.05
		v55.73c3.03,7.38,7.97,11.85,16.46,11.85c144.95-0.05,289.89-0.02,434.83-0.04c10.2-0.01,16.51-6.31,16.53-16.49
		c0.04-14.62-0.01-29.22,0.02-43.84C483.94,134.78,483.47,131.49,482.45,128.28z M297.23,99.85c5.64-4.86,11.09-9.94,16.61-14.95
		c10.7-9.7,21.32-19.48,32.12-29.06c12.24-10.87,26.94-11.99,39.19-3.24c9.59,6.84,14.25,19.04,11.71,30.58
		c-2.58,11.65-12.68,21.31-24.86,23.08c-12.24,1.77-24.59,0.39-36.89,0.76c-0.76,0.02-1.53,0-2.28,0c-10.94,0-21.9,0.05-32.84-0.06
		c-1.42-0.01-3.74,1.21-4.15-1.27C295.51,103.74,295.21,101.61,297.23,99.85z M126.87,47.38c9.02-1.9,17.45,0.06,24.33,6.14
		c17.33,15.34,34.36,31.01,51.59,46.45c1.99,1.8,1.75,3.93,1.32,5.85c-0.5,2.28-2.8,1.12-4.25,1.14
		c-11.27,0.11-22.54,0.06-33.8,0.06c0-0.01,0-0.02,0-0.02c-11.27,0-22.55,0.26-33.81-0.06c-16.01-0.46-28.34-12.08-29.59-27.37
		C101.36,63.9,111.19,50.7,126.87,47.38z" />
                                            <path class="st0" d="M215.18,228.54c-54.82,0.07-109.64,0.05-164.44,0.05c-0.61,0-1.22,0.05-1.83,0c-1.89-0.13-2.78,0.61-2.75,2.61
		c0.26,14.45-0.46,28.89,0.38,43.34c-0.01,31.16-0.01,62.33-0.01,93.49c-0.01,27.67-0.06,55.33,0.02,83
		c0.05,17.25,10.84,29.92,26.95,31.88c-0.05,0.26,0,0.5,0.13,0.73h146.2c0.02-0.92,0.06-1.83,0.06-2.74
		c0-82.68-0.04-165.36,0.09-248.04C220,228.92,218.45,228.54,215.18,228.54z" />
                                            <path class="st0" d="M453.84,231.19c0.05-2.88-1.83-2.6-3.68-2.6c-55.43,0-110.84,0.02-166.27-0.05c-3.03-0.01-3.85,0.93-3.85,3.88
		c0.09,83.75,0.09,167.48,0.11,251.23h146.2c0.13-0.23,0.17-0.48,0.13-0.74c16.25-1.98,26.95-14.7,26.96-32.34
		c0.04-58.68,0.01-117.35,0-176.04C454.29,260.09,453.55,245.63,453.84,231.19z" />
                                        </g>
                                    </svg>

                                    <span style="color: #ffffff;  font-size: 20px;text-align: center;    padding: 0px;  margin-top: 24px; font-size: 40px;">
                                        5% Rabatt
                                    </span>

                                    <svg version="1.1" id="Layer_4" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 500 500" style=" width: 60px; enable-background:new 0 0 500 500;" xml:space="preserve">
                                        <style type="text/css">
                                            .st0 {
                                                fill: #FFFFFF;
                                            }
                                        </style>
                                        <g>
                                            <path class="st0" d="M482.45,128.28c-3.99-12.57-15.07-20.98-28.32-21.2c-11.25-0.17-22.51-0.04-34.35-0.04h-0.23
		c0.04-0.07,0.07-0.15,0.11-0.22c0.72-1.45,1.15-2.33,1.6-3.2c9.43-18.09,9.07-36.43,0.09-54.32
		c-18.01-35.82-64.45-43.96-94.94-16.9c-13.31,11.83-26.46,23.85-39.58,35.9c-2.1,1.93-3.21,2.56-5.73,0.21
		c-17.73-16.67-44.62-16.62-62.32,0.1c-2.28,2.16-3.37,1.82-5.4-0.04c-13.02-11.94-26.16-23.73-39.2-35.63
		c-11.08-10.09-23.92-16.2-38.99-16.55c-22.49-0.53-40.79,8.29-53.17,27.11c-12.43,18.93-13.74,39.16-3.63,59.79
		c0.56,1.12,1.92,2.06,1.18,3.74c-10.95,0-21.91-0.1-32.87,0.02c-13.79,0.13-24.41,7.89-29.09,20.83c-0.37,1.03-0.06,2.54-1.54,3.05
		v55.73c3.03,7.38,7.97,11.85,16.46,11.85c144.95-0.05,289.89-0.02,434.83-0.04c10.2-0.01,16.51-6.31,16.53-16.49
		c0.04-14.62-0.01-29.22,0.02-43.84C483.94,134.78,483.47,131.49,482.45,128.28z M297.23,99.85c5.64-4.86,11.09-9.94,16.61-14.95
		c10.7-9.7,21.32-19.48,32.12-29.06c12.24-10.87,26.94-11.99,39.19-3.24c9.59,6.84,14.25,19.04,11.71,30.58
		c-2.58,11.65-12.68,21.31-24.86,23.08c-12.24,1.77-24.59,0.39-36.89,0.76c-0.76,0.02-1.53,0-2.28,0c-10.94,0-21.9,0.05-32.84-0.06
		c-1.42-0.01-3.74,1.21-4.15-1.27C295.51,103.74,295.21,101.61,297.23,99.85z M126.87,47.38c9.02-1.9,17.45,0.06,24.33,6.14
		c17.33,15.34,34.36,31.01,51.59,46.45c1.99,1.8,1.75,3.93,1.32,5.85c-0.5,2.28-2.8,1.12-4.25,1.14
		c-11.27,0.11-22.54,0.06-33.8,0.06c0-0.01,0-0.02,0-0.02c-11.27,0-22.55,0.26-33.81-0.06c-16.01-0.46-28.34-12.08-29.59-27.37
		C101.36,63.9,111.19,50.7,126.87,47.38z" />
                                            <path class="st0" d="M215.18,228.54c-54.82,0.07-109.64,0.05-164.44,0.05c-0.61,0-1.22,0.05-1.83,0c-1.89-0.13-2.78,0.61-2.75,2.61
		c0.26,14.45-0.46,28.89,0.38,43.34c-0.01,31.16-0.01,62.33-0.01,93.49c-0.01,27.67-0.06,55.33,0.02,83
		c0.05,17.25,10.84,29.92,26.95,31.88c-0.05,0.26,0,0.5,0.13,0.73h146.2c0.02-0.92,0.06-1.83,0.06-2.74
		c0-82.68-0.04-165.36,0.09-248.04C220,228.92,218.45,228.54,215.18,228.54z" />
                                            <path class="st0" d="M453.84,231.19c0.05-2.88-1.83-2.6-3.68-2.6c-55.43,0-110.84,0.02-166.27-0.05c-3.03-0.01-3.85,0.93-3.85,3.88
		c0.09,83.75,0.09,167.48,0.11,251.23h146.2c0.13-0.23,0.17-0.48,0.13-0.74c16.25-1.98,26.95-14.7,26.96-32.34
		c0.04-58.68,0.01-117.35,0-176.04C454.29,260.09,453.55,245.63,453.84,231.19z" />
                                        </g>
                                    </svg>

                                </div>
                                <span style="color: #ffffff; margin-top: 21px; font-size: 20px;text-align: center;    padding: 0px;     margin-bottom: 39px;">
                                    Ales Neukunde erhalten Sie 5% Rabatt auf alle Produkte in unserem Shop
                                </span>
                            </div>

                        </div>
                        <input class="theme-button" disabled id="textforcopy" type="text" value="QJNM2022" placeholder="Kupon" style="background-color: white;color : #555;">

                        <div class="cart-buttons" style="margin-top:30px;">
                            <a class="theme-button copy">Kupon Kopieren</a>

                        </div>

                    </div>

                    <!--=======  End of small cart  =======-->

                </div>
            </div>
        </div>
    </div>

</div>













<!-- <div class="modal fade  come-from-modal right" id="quick-view-modal-containerCart" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Modal title</h4>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div> -->