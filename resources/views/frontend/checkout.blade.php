@extends('frontend.appother2')

@section('content')
<?php $pages = getPages(); ?>
    <input hidden id="saleIdinHome" type="text" value="{{ $id }}">
    <input hidden id="countOfSale" type="text" value="{{ $count }}">
    <input hidden id="Items"  type="text" value="{{ $Items }}">
    <input hidden type="text" id="valOfSale" value="{{ $shoppingCart->preSale }}">
    <input hidden type="text" id="idOfSale" value="{{ $id }}">
    <div class="page-section pb-40 pt-40" style="background-color: #ffffff;">
        <div class="container">
            <div id="myinputs" class="row containerOfCheckOut">


                <div class="wrapper" style="margin: 0px; width: 100%; padding: 0px; height: auto;">
                    <div class="wizardValidaiton" action="" id="wizard">

                        <h4 style="display:none ;"></h4>
                        <section>

                            <div class="page-section  pt-20">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-12 col-xs-12 col-lg-6 mb-30">
                                            <!-- Login Form s-->
                                            <form class="needsvalidationlogin" action="#" style="padding: 17px;"
                                                novalidate>

                                                <div class="login-form">

                                                    <div class="section-titlelogin ">


                                                        <h2
                                                            style="display: flex; align-items: center; padding-bottom: 5px; color: #1e6f2f;">

                                                            <svg version="1.1" id="Layer_4"
                                                                xmlns="http://www.w3.org/2000/svg"
                                                                xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                                                                y="0px" viewBox="0 0 500 500"
                                                                style="width: 8%; margin-left: 14px; enable-background:new 0 0 500 500;"
                                                                xml:space="preserve">
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
                                                                    <linearGradient id="SVGID_1_"
                                                                        gradientUnits="userSpaceOnUse" x1="151.9204"
                                                                        y1="125.7158" x2="346.7987" y2="125.7158">
                                                                        <stop offset="0" style="stop-color:#1E7030" />
                                                                        <stop offset="0.6385" style="stop-color:#398E34" />
                                                                        <stop offset="1" style="stop-color:#439A35" />
                                                                    </linearGradient>
                                                                    <path class="stlogin0 stloginhover"
                                                                        d="M167.03,176.2c7.24,19.8,18.98,36.58,35.66,49.74c25.79,20.37,57.04,22.68,85.2,5.77
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

                                                                    <linearGradient
                                                                        id="SVGID_00000078753190771989843130000005965865990191243407_"
                                                                        gradientUnits="userSpaceOnUse" x1="258.6657"
                                                                        y1="338.52" x2="431.1268" y2="338.52">
                                                                        <stop offset="0" style="stop-color:#1E7030" />
                                                                        <stop offset="0.6385" style="stop-color:#398E34" />
                                                                        <stop offset="1" style="stop-color:#439A35" />
                                                                    </linearGradient>
                                                                    <path class="stlogin1 stloginhover"
                                                                        d="M428.75,412.42
                                                                    c-4.51-14.84-9.04-29.68-13.59-44.51c-11.78-38.4-23.57-76.79-35.35-115.2c-3.78-12.34-12.17-19.5-24.72-21.89
                                                                    c-12.2-2.34-24.45-4.41-36.6-6.95c-3.04-0.63-4.33,0.02-5.76,2.62c-17.5,31.81-35.12,63.57-52.68,95.35
                                                                    c-0.64,1.14-1.89,2.16-1.17,3.91c27.95,0,55.95,0.32,83.92-0.2c8.11-0.14,14.14,1.67,19.35,8.03c2.64,3.22,4.09,6,4.06,10.2
                                                                    c-0.16,35-0.05,69.99-0.15,104.99c-0.01,3.26,0.5,4.69,4.25,4.59c9.63-0.29,19.29-0.16,28.93-0.08
                                                                    c9.88,0.08,18.19-3.27,24.77-10.75c3.78-4.28,4.95-9.78,7.11-14.83v-6.54C430.33,418.26,429.62,415.32,428.75,412.42z" />

                                                                    <linearGradient
                                                                        id="SVGID_00000119100962677858640960000012204788545476012178_"
                                                                        gradientUnits="userSpaceOnUse" x1="116.259"
                                                                        y1="475.4021" x2="383.8829" y2="475.4021">
                                                                        <stop offset="0" style="stop-color:#F2AA35" />
                                                                        <stop offset="0.4002" style="stop-color:#D19230" />
                                                                        <stop offset="1" style="stop-color:#996A28" />
                                                                    </linearGradient>
                                                                    <path class="stlogin2 stloginhover"
                                                                        d="M378.15,464.27
                                                                c-85.43,0.13-170.84,0.09-256.26,0.09c-0.78,0-1.56,0.08-2.34-0.01c-2.34-0.27-3.36,0.5-3.29,3.06c0.21,6.37,0.18,12.75,0.23,19.12
                                                                h267.02c0.07-5.59-0.2-11.22,0.3-16.78C384.25,465.04,382.49,464.26,378.15,464.27z" />

                                                                    <linearGradient
                                                                        id="SVGID_00000111174700799421035070000003869501450890265502_"
                                                                        gradientUnits="userSpaceOnUse" x1="164.9356"
                                                                        y1="401.7848" x2="341.7896" y2="401.7848">
                                                                        <stop offset="0" style="stop-color:#F2AA35" />
                                                                        <stop offset="0.4002" style="stop-color:#D19230" />
                                                                        <stop offset="1" style="stop-color:#996A28" />
                                                                    </linearGradient>
                                                                    <path class="stlogin3 stloginhover"
                                                                        d="M336.82,350.11
                                                                        c-27.69,0.14-55.39,0.07-83.08,0.07c-28.15,0-56.31,0.01-84.47,0c-2.3,0-4.35-0.6-4.33,3.32c0.19,32.21,0.14,64.41,0.05,96.62
                                                                        c-0.01,2.73,0.89,3.34,3.44,3.34c56.31-0.08,112.63-0.12,168.94-0.03c3.4,0,4.42-0.82,4.4-4.39c-0.15-31.43-0.18-62.86,0.02-94.28
                                                                        C341.81,350.6,340.43,350.09,336.82,350.11z" />

                                                                    <linearGradient
                                                                        id="SVGID_00000130648589606615472980000013851731261884655009_"
                                                                        gradientUnits="userSpaceOnUse" x1="68.8732"
                                                                        y1="338.2239" x2="241.4179" y2="338.2239">
                                                                        <stop offset="0" style="stop-color:#1E7030" />
                                                                        <stop offset="0.6385"
                                                                            style="stop-color:#398E34" />
                                                                        <stop offset="1" style="stop-color:#439A35" />
                                                                    </linearGradient>
                                                                    <path class="stlogin4 stloginhover"
                                                                        d="M136.22,453.38
                                                                            c3.86,0.08,4.53-1.24,4.52-4.74c-0.12-32.98,0.26-65.96-0.29-98.92c-0.14-8.66,1.84-15.11,8.62-20.51c2.69-2.15,4.97-3.51,8.53-3.5
                                                                            c26.43,0.15,52.88,0.09,79.32,0.06c1.46,0,3.02,0.44,4.34-0.32c0.47-1.03-0.19-1.65-0.54-2.28c-18.01-32.6-36.09-65.16-53.99-97.83
                                                                            c-1.62-2.95-3.57-2.35-5.79-1.89c-11.41,2.34-22.74,5.06-34.22,6.99c-14.68,2.48-23.22,10.83-27.46,24.95
                                                                            C106.5,297.87,93.25,340.2,80.4,382.66c-3.68,12.15-8.09,24.11-10.68,36.59c-0.28,0.03-0.56,0.06-0.84,0.06v9.34l0.41,0.07h0.4
                                                                            c3.79,15.77,14.28,24.28,30.61,24.52C112.27,453.41,124.25,453.11,136.22,453.38z" />
                                                                </g>
                                                            </svg>

                                                            @lang('login.login')
                                                        </h2>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12 col-12 mb-10 Containralready_haveaccount">
                                                            <span class="already_haveaccount"> @lang('site.already_haveaccount') </span>

                                                            <div class="col-md-12 mb-2">
                                                                <input class="mb-0 form-control  already_haveaccountInput"
                                                                    type="email" placeholder="@lang('site.email')"
                                                                    required>
                                                            </div>


                                                            <div class="col-md-12 mb-2">
                                                                <input class="mb-0 form-control already_haveaccountInput"
                                                                    type="password" placeholder="@lang('site.password')"
                                                                    required>
                                                            </div>


                                                            <div class="col-md-8">

                                                                <div class="check-box d-inline-block ml-0 ml-md-2 mt-10">
                                                                    <input type="checkbox" id="remember_me">
                                                                    <label for="remember_me"> @lang('site.remember_me')</label>
                                                                </div>

                                                            </div>

                                                            <div class="col-md-4 mt-10 mb-20 text-start text-md-end">
                                                                <a href="#"
                                                                    style="margin-left: -4px;">@lang('site.forgotten_pasward')</a>
                                                            </div>

                                                            <div class="col-md-12">
                                                                <button type="submit"
                                                                    class="register-button mt-0">@lang('login.login')</button>
                                                            </div>




                                                        </div>


                                                    </div>



                                                </div>


                                            </form>
                                        </div>
                                        <div class="col-sm-12 col-md-12 col-lg-6 col-xs-12">
                                            <form action="#" style="padding: 17px;">

                                                <div class="login-form">

                                                    <div class="section-titlelogin ">

                                                        <h2
                                                            style="display: flex; align-items: center; padding-bottom: 5px; color: #1e6f2f;">

                                                            <svg version="1.1" id="Layer_4"
                                                                xmlns="http://www.w3.org/2000/svg"
                                                                xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                                                                y="0px" viewBox="0 0 500 500"
                                                                style="width: 8%; margin-left: 14px; enable-background:new 0 0 500 500;"
                                                                xml:space="preserve">
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
                                                                    <linearGradient id="SVGID_1_"
                                                                        gradientUnits="userSpaceOnUse" x1="151.9204"
                                                                        y1="125.7158" x2="346.7987" y2="125.7158">
                                                                        <stop offset="0" style="stop-color:#1E7030" />
                                                                        <stop offset="0.6385"
                                                                            style="stop-color:#398E34" />
                                                                        <stop offset="1" style="stop-color:#439A35" />
                                                                    </linearGradient>
                                                                    <path class="stlogin0 stloginhover"
                                                                        d="M167.03,176.2c7.24,19.8,18.98,36.58,35.66,49.74c25.79,20.37,57.04,22.68,85.2,5.77
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

                                                                    <linearGradient
                                                                        id="SVGID_00000078753190771989843130000005965865990191243407_"
                                                                        gradientUnits="userSpaceOnUse" x1="258.6657"
                                                                        y1="338.52" x2="431.1268" y2="338.52">
                                                                        <stop offset="0" style="stop-color:#1E7030" />
                                                                        <stop offset="0.6385"
                                                                            style="stop-color:#398E34" />
                                                                        <stop offset="1" style="stop-color:#439A35" />
                                                                    </linearGradient>
                                                                    <path class="stlogin1 stloginhover"
                                                                        d="M428.75,412.42
                                                                            c-4.51-14.84-9.04-29.68-13.59-44.51c-11.78-38.4-23.57-76.79-35.35-115.2c-3.78-12.34-12.17-19.5-24.72-21.89
                                                                            c-12.2-2.34-24.45-4.41-36.6-6.95c-3.04-0.63-4.33,0.02-5.76,2.62c-17.5,31.81-35.12,63.57-52.68,95.35
                                                                            c-0.64,1.14-1.89,2.16-1.17,3.91c27.95,0,55.95,0.32,83.92-0.2c8.11-0.14,14.14,1.67,19.35,8.03c2.64,3.22,4.09,6,4.06,10.2
                                                                            c-0.16,35-0.05,69.99-0.15,104.99c-0.01,3.26,0.5,4.69,4.25,4.59c9.63-0.29,19.29-0.16,28.93-0.08
                                                                            c9.88,0.08,18.19-3.27,24.77-10.75c3.78-4.28,4.95-9.78,7.11-14.83v-6.54C430.33,418.26,429.62,415.32,428.75,412.42z" />

                                                                    <linearGradient
                                                                        id="SVGID_00000119100962677858640960000012204788545476012178_"
                                                                        gradientUnits="userSpaceOnUse" x1="116.259"
                                                                        y1="475.4021" x2="383.8829" y2="475.4021">
                                                                        <stop offset="0" style="stop-color:#F2AA35" />
                                                                        <stop offset="0.4002"
                                                                            style="stop-color:#D19230" />
                                                                        <stop offset="1" style="stop-color:#996A28" />
                                                                    </linearGradient>
                                                                    <path class="stlogin2 stloginhover"
                                                                        d="M378.15,464.27
                                                                    c-85.43,0.13-170.84,0.09-256.26,0.09c-0.78,0-1.56,0.08-2.34-0.01c-2.34-0.27-3.36,0.5-3.29,3.06c0.21,6.37,0.18,12.75,0.23,19.12
                                                                    h267.02c0.07-5.59-0.2-11.22,0.3-16.78C384.25,465.04,382.49,464.26,378.15,464.27z" />

                                                                    <linearGradient
                                                                        id="SVGID_00000111174700799421035070000003869501450890265502_"
                                                                        gradientUnits="userSpaceOnUse" x1="164.9356"
                                                                        y1="401.7848" x2="341.7896" y2="401.7848">
                                                                        <stop offset="0" style="stop-color:#F2AA35" />
                                                                        <stop offset="0.4002"
                                                                            style="stop-color:#D19230" />
                                                                        <stop offset="1" style="stop-color:#996A28" />
                                                                    </linearGradient>
                                                                    <path class="stlogin3 stloginhover"
                                                                        d="M336.82,350.11
                                                                            c-27.69,0.14-55.39,0.07-83.08,0.07c-28.15,0-56.31,0.01-84.47,0c-2.3,0-4.35-0.6-4.33,3.32c0.19,32.21,0.14,64.41,0.05,96.62
                                                                            c-0.01,2.73,0.89,3.34,3.44,3.34c56.31-0.08,112.63-0.12,168.94-0.03c3.4,0,4.42-0.82,4.4-4.39c-0.15-31.43-0.18-62.86,0.02-94.28
                                                                            C341.81,350.6,340.43,350.09,336.82,350.11z" />

                                                                    <linearGradient
                                                                        id="SVGID_00000130648589606615472980000013851731261884655009_"
                                                                        gradientUnits="userSpaceOnUse" x1="68.8732"
                                                                        y1="338.2239" x2="241.4179" y2="338.2239">
                                                                        <stop offset="0" style="stop-color:#1E7030" />
                                                                        <stop offset="0.6385"
                                                                            style="stop-color:#398E34" />
                                                                        <stop offset="1" style="stop-color:#439A35" />
                                                                    </linearGradient>
                                                                    <path class="stlogin4 stloginhover"
                                                                        d="M136.22,453.38
                                                            c3.86,0.08,4.53-1.24,4.52-4.74c-0.12-32.98,0.26-65.96-0.29-98.92c-0.14-8.66,1.84-15.11,8.62-20.51c2.69-2.15,4.97-3.51,8.53-3.5
                                                            c26.43,0.15,52.88,0.09,79.32,0.06c1.46,0,3.02,0.44,4.34-0.32c0.47-1.03-0.19-1.65-0.54-2.28c-18.01-32.6-36.09-65.16-53.99-97.83
                                                            c-1.62-2.95-3.57-2.35-5.79-1.89c-11.41,2.34-22.74,5.06-34.22,6.99c-14.68,2.48-23.22,10.83-27.46,24.95
                                                            C106.5,297.87,93.25,340.2,80.4,382.66c-3.68,12.15-8.09,24.11-10.68,36.59c-0.28,0.03-0.56,0.06-0.84,0.06v9.34l0.41,0.07h0.4
                                                            c3.79,15.77,14.28,24.28,30.61,24.52C112.27,453.41,124.25,453.11,136.22,453.38z" />
                                                                </g>
                                                            </svg>
                                                            @lang('site.i_dont_have_an_account')

                                                        </h2>
                                                    </div>
                                                    <div class="row">

                                                        <div class="col-12 mb-10"
                                                            style="margin-top: 4px; display: flex; flex-direction: row; justify-content: center;  flex-wrap: wrap;">
                                                            <span class="already_haveaccount">
                                                                @lang('site.continuedontaccount')
                                                            </span>



                                                            <a onclick="switchVisible()" class="register-button"
                                                                style="text-align: center; margin-top: 12px; width: 100%; padding-top: 9px;height: 27%; color: #ffffff">
                                                                @lang('site.continue_as_guest')</a>
                                                            <a onclick="switchVisible()" class="register-button"
                                                                style="text-align: center; margin-top: 20px; width: 100%; padding-top: 9px;height: 27%; color: #ffffff">
                                                                @lang('site.register_for_free')</a>



                                                        </div>
                                                    </div>
                                                </div>

                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>





                        </section>

                        <h4></h4>
                        <section>

                            <div class="product-details-area mb-40 pt-20 containerForStep2">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <!--=======  product details content  =======-->

                                            <div class="product-detail-content">

                                                <div>
                                                    <h4 style="    font-weight: 600;font-size: 19px;color: #0f1b30;">
                                                        @lang('site.pleaseselectshipping')</h4>
                                                    <!-- <a href="#">
                                                                                                                                                                        <h4 style=" color: #3a9943;font-size: 17px; font-weight: bold;">CHANGE SHIPPING ADDRESS OR BILLING DETAILS</h4>

                                                                                                                                                                    </a> -->
                                                    <!-- <a  href="#wizard-h-1" aria-controls="wizard-p-0"><span class="number">1.</span>  </a> -->
                                                    <a class="prev-btn prev-btnStyle ">Lieferadresse oder Rechnungsdaten
                                                        ändern</a>
                                                    <!-- <button class="prev-btn">Go back</button> -->
                                                    <div class="form-check"
                                                        style="margin-left: -28px; font-size: 13px; font-weight: bold;  color: #111212;">
                                                        <input class="form-check-input" type="radio" name="radiotest"
                                                            checked style="margin:6px 6px; ">

                                                        <label class="form-check-label" for="flexCheckDefault"
                                                            style="font-size: 18px;">

                                                            <span class="Countrydifferentshippingaddress"></span> <span> /
                                                            </span> <span class="CountryBillingdeliveryaddress"> </span>
                                                        </label>
                                                        <img data-src="{{ url('uploads/homepage/dhl-logo.png') }}"
                                                            width="100" 
                                                            class="info-block-img paypalplusImg" />
                                                    </div>

                                                </div>
                                                <div class="product-short-desc mb-25" style="margin-top: 20px;">
                                                    <div>
                                                        <h4 style="font-weight: 600;font-size: 19px;color: #0f1b30;">
                                                            @lang('site.choose_your_payment')</h4>
                                                        <!-- <div hidden class="form-check" style="margin-left: -28px; font-size: 13px; font-weight: bold;  color: #111212;">
                                                                                                                                                                            <input class="form-check-input" type="radio" value="Payment In Advance" name="paymenttype" style=" margin: 0px 6px; ">

                                                                                                                                                                            <label class="form-check-label labelpaymenttype"  style=" font-size: 14px;  font-weight: bold;">
                                                                                                                                                                            @lang('site.payment_in_advance')
                                                                                                                                                                            </label>
                                                                                                                                                                        </div> -->
                                                        <!-- <div hidden class="form-check" style="margin-left: -28px; font-size: 13px; font-weight: bold;  color: #111212;">
                                                                                                                                                                            <input class="form-check-input" type="radio" value="Cash On Delivery" name="paymenttype" style=" margin: 0px 6px; ">

                                                                                                                                                                            <label class="form-check-label labelpaymenttype" style=" font-size: 14px;  font-weight: bold;">
                                                                                                                                                                                @lang('site.cash_on_delivery')
                                                                                                                                                                            </label>
                                                                                                                                                                        </div> -->
                                                        <div class="form-check"
                                                            style="margin-left: -28px; font-size: 13px; font-weight: bold;  color: #111212;">
                                                            <input class="form-check-input" type="radio" value="0"
                                                                name="paymenttype" style=" margin: 3px 6px; ">

                                                            <label class="form-check-label labelpaymenttype"
                                                                style=" font-size: 14px;  font-weight: bold;">
                                                                @lang('site.instant_bank_transfer')
                                                                <img class="info-block-img paypalplusImg" data-src="{{ url('uploads/homepage/klarna.png') }}"
                                                                    width="30"  style="width: 40px;"
                                                                      />
                                                            </label>
                                                        </div>
                                                        <div class="form-check"
                                                            style="margin-left: -28px; font-size: 13px; font-weight: bold;  color: #111212;">
                                                            <input class="form-check-input" type="radio" value="1"
                                                                name="paymenttype" style=" margin: 3px 6px; ">

                                                            <label class="form-check-label labelpaymenttype "
                                                                style=" font-size: 14px;  font-weight: bold;">
                                                                @lang('site.paypal_plus')
                                                                <img class="paypalplusImg info-block-img"
                                                                    data-src="{{ url('uploads/homepage/paypalplus.png') }}"
                                                                    width="60"  />

                                                            </label>
                                                        </div>


                                                    </div>
                                                </div>

                                                <div class="col-12 mb-60">

                                                    <h4 style="    font-weight: 600;font-size: 19px;color: #0f1b30;">
                                                        @lang('site.order_value')</h4>


                                                    <div class="checkout-cart-total"
                                                        style="    background-color: #ffffff; padding: 0;">



                                                        <ul>
                                                            @forelse ($shoppingCartItems as $key => $item)
                                                                @if ($item->statusEvaluate == 0 || $item->statusEvaluate == 1 || $item->statusEvaluate == 2)
                                                                    @if ($item->quantity == $item->quantityForOffers)
                                                                        <li
                                                                            style="margin-bottom: 4px; font-size: 17px; font-weight: bold;">
                                                                            {{ $item->productinfo['name'] }} x
                                                                            {{ $item->quantity }} <span
                                                                                style="color: #990000;">
                                                                                {{ number_format($item->price / $item->quantity, 2, '.', '') }}
                                                                                €</span>
                                                                        </li>
                                                                    @else
                                                                        @php
                                                                            $prices = json_decode($item->productinfo['prices'], true); // Convert prices JSON to an array
                                                                            $firstPrice = isset($prices[0]) ? $prices[0] : '';
                                                                        @endphp
                                                                        <li
                                                                            style="margin-bottom: 4px; font-size: 17px; font-weight: bold;">
                                                                            {{ $item->productinfo['name'] }} x
                                                                            {{ $item->quantity }} <span
                                                                                style="color: #990000;">{{ $firstPrice }}
                                                                                €</span></li>
                                                                    @endif
                                                                @elseif ($item->statusEvaluate != 0 && $item->statusEvaluate != 1 && $item->statusEvaluate != 2)
                                                                    <li
                                                                        style="margin-bottom: 4px; font-size: 17px; font-weight: bold;">
                                                                        {{ $item->productinfo['name'] }} x
                                                                        {{ $item->quantity }} <span
                                                                            style="color: #990000;">{{ $item->price }}
                                                                            €</span></li>
                                                                @endif
                                                            @empty
                                                            @endforelse
                                                            <li
                                                                style="margin-bottom: 4px;  font-size: 17px; font-weight: bold;">
                                                                @lang('site.Less_discount') <span
                                                                    style="color: #990000;">€</span><span id="discount"
                                                                    style="color: #990000;">{{ number_format($discount, 2) }}
                                                                </span></li>
                                                            <li
                                                                style="margin-bottom: 4px;  font-size: 17px; font-weight: bold;">
                                                                @lang('site.delivery') <span
                                                                    style="color: #990000;">€</span><span
                                                                    id="delivery_cost"
                                                                    style="color: #990000;">{{ number_format($delivery_cost, 2) }}
                                                                </span></li>
                                                            <!-- <li style="margin-bottom: 4px;  font-size: 17px; font-weight: bold;">Payment in advance <span>$29.00</span></li> -->
                                                            <li
                                                                style="margin-bottom: 4px;  font-size: 22px; font-weight: bold; ">
                                                                @lang('site.total_price')
                                                               
                                                                <span style="color: #990000; margin-right: 8px;">€</span>
                                                                <span id="AllToInCheckoutSubtotal"
                                                                    style=" color:#990000;  display: flex;">
                                                                    {{ number_format($subtotal, 2) }}
                                                                </span>
                                                                <!-- <span hidden id="AllToInCheckout">{{ $subtotal }}</span> -->
                                                            </li>
                                                            <span
                                                                    style="display: flex; justify-content: flex-end; font-weight: bold; font-size: 17px;">(@lang('site.the_net_price'): <span
                                                                        id="AllToInCheckoutWithVAT"></span> €)*</span>
                                                            <li
                                                                style="margin-bottom: 4px; font-size: 17px; font-weight: bold;">
                                                                @lang('site.VAT_included') 19%
                                                                
                                                                    <span>)</span>
                                                                    <span >€</span>
                                                                    <span  id="IdVAT_included"> </span>
                                                                     <span style="margin-right: 6px;">19% : </span>
                                                                     <span>(</span>
                                                                </li>

                                                            <!-- <li style="margin-bottom: 4px; font-size: 17px; font-weight: bold;">VAT included. 19% <span>$10.00</span></li> -->
                                                        </ul>
                                                        <!-- <span style="    font-size: 14px; font-weight: bold;"> @lang('site.the_net_price')</span> -->

                                                    </div>

                                                </div>

                                                <div class="product-details-feature-wrapper justify-content-start mt-20">

                                                    <div class="form-check" style="margin-left: -27px;">
                                                        <input class="form-check-input" type="checkbox" value=""
                                                            name="termsandconditions"
                                                            style=" margin: 0px 6px; padding: 10px 5px 10px 14px;">
                                                        <label class="form-check-label labeltermsandconditions">
                                                            @lang('site.i_accept_the_terms_and') <a
                                                                href="https://www.narjes-alsham.com/pages/Widerrufsrecht">@lang('site.step_conditions')</a>
                                                            @lang('site.and_take_note_of_the_right_of_return')



                                                        </label>
                                                    </div>
                                                    <div class="form-check" style="margin-left: -27px;">
                                                        <input class="form-check-input" type="checkbox" value=""
                                                            name="termsandprivacy"
                                                            style=" margin: 0px 6px; padding: 10px 5px 10px 14px;">
                                                        <label class="form-check-label labeltermsandconditions">
                                                            @lang('site.i_accept_the')
                                                              @foreach ($pages as $page)
                                                 @if ($page->slug == 'Datenschutz')
                                         
                                                <a href="<?php echo url('pages/' . $page->slug); ?>">
                                                    <span class="links-text">{{ $page->title }}
                                                    </span>
                                                   
                                                </a> @lang('site.of_narjes_alsham').
                                            
                                                    @endif
                                                @endforeach
                                                                
                                                                @lang('site.of_narjes_alsham').
                                                        </label>
                                                    </div>
                                                    <div class="form-check" style="margin-left: -27px;">
                                                        <input class="form-check-input" type="checkbox" value=""
                                                            style=" margin: 0px 6px; padding: 10px 5px 10px 14px;">
                                                        <label class="form-check-label ">
                                                            @lang('site.i_would_like_to_receive')
                                                        </label>
                                                    </div>
                                                    <div style="margin-top: 20px;">
                                                        <label> @lang('site.comment_on_your_order')</label>
                                                        <textarea class="form-control" cols="200" rows="7"
                                                            style="     height: 100%; box-sizing: border-box;max-width: 100%;"></textarea>

                                                    </div>

                                                </div>



                                            </div>

                                            <!--=======  End of product details content  =======-->
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </section>

                        <h4 style="display:none ;"></h4>
                        <section>


                            <div class="product-details-area mb-40  pt-20 containerForStep2">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <!--=======  product details content  =======-->

                                            <div class="product-detail-content">
                                                <div style="margin-top: 45px; margin-bottom: 45px;  text-align: center;">
                                                    <h4 style="font-size: 32px; color: #373737;font-weight: 300;">
                                                        @lang('site.order_confirmation')</h4>
                                                </div>
                                                <div class="row d-flex">
                                                    <div class="col-6 mr-sm-30">
                                                        <h2 style="   font-weight: bold;font-size: 16px; color: #0f1b30;">
                                                            @lang('site.billing_address')</h4>
                                                            <div>
                                                                <span id="firstnamebillingaddress">Faisal</span>
                                                                <span id="lastnamebillingaddress">Nasser</span>
                                                            </div>
                                                            <div><span id="streetandnumberbillingaddress">Yıl Mah. 66 Nolu
                                                                    Sk. N/10 60</span></div>
                                                            <div>
                                                                <span id="zipcodesbillingaddress">27010</span>
                                                                <span id="citybillingaddress"></span>

                                                                <span class="CountryBillingdeliveryaddress"></span>

                                                            </div>

                                                    </div>
                                                    <div class="col-6 ">
                                                        <h2 style="   font-weight: bold;font-size: 16px; color: #0f1b30;">
                                                            @lang('site.shipping_address') </h4>

                                                            <div>
                                                                <span id="firstnameshippingaddress"></span>
                                                                <span id="lastnameshippingaddress"></span>

                                                            </div>
                                                            <div><span id="streetandnumbershippingaddress"></span></div>
                                                            <div>
                                                                <span id="zipcodesshippingaddress"></span>
                                                                <span id="cityshippingaddress"></span>

                                                                <span class="Countrydifferentshippingaddress"></span>
                                                            </div>

                                                    </div>
                                                </div>

                                                <div class="product-short-desc mb-25" style="margin-top: 20px;">
                                                    <div class="row">
                                                        <div class="col-6 ">
                                                            <h2
                                                                style="   font-weight: bold;font-size: 16px; color: #0f1b30;">
                                                                @lang('site.delivery')</h4>

                                                                <span class="Countrydifferentshippingaddress"></span>
                                                                <span> / </span> <span
                                                                    class="CountryBillingdeliveryaddress"> </span>
                                                                <img data-src="{{ url('uploads/homepage/dhl-logo.png') }}"
                                                                    width="100" height=""
                                                                    class="info-block-img paypalplusImg" />


                                                        </div>
                                                    </div>


                                                    <div
                                                        class="product-details-feature-wrapper justify-content-start mt-20">

                                                        <div class="row">
                                                            <div class="col-6 ">
                                                                <h2
                                                                    style="   font-weight: bold;font-size: 16px; color: #0f1b30;">
                                                                    @lang('site.Payment')</h4>

                                                                    <div><span id="paymentstep3"></span></div>


                                                            </div>
                                                        </div>

                                                    </div>
                                                    <h2 style="font-weight: bold;font-size: 16px; color: #0f1b30;">
                                                        @lang('site.products')</h4>

                                                        <div class="row"
                                                            style="border: 2px solid #d4cadd; border-radius: 10px;   padding: 25px 28px;  margin-bottom: 25px;">
                                                            <div class="col-md-12">
                                                                @forelse ($shoppingCartItems as $key => $item)
                                                                    <div>
                                                                        <div
                                                                            style="    font-size: 17px;color: #0f1b30; text-transform: uppercase; margin-bottom: 18px;">
                                                                            <span
                                                                                style="    font-size: 17px; color: #0f1b30; text-transform: uppercase;">
                                                                                <font style="vertical-align: inherit;">
                                                                                    <font style="vertical-align: inherit;">
                                                                                        {{ $item->productinfo['name'] }}
                                                                                    </font>
                                                                                </font>
                                                                            </span>
                                                                        </div>


                                                                    </div>
                                                                @empty
                                                                @endforelse

                                                                @if (empty($evaluate_result))
                                                                    <div style="display: flex;">
                                                                        <div style="    min-width: 275px;">
                                                                            <span>
                                                                                <font style="vertical-align: inherit;">
                                                                                    <font
                                                                                        style="font-size: 14px; font-weight: bold; color: #646b77; vertical-align: inherit;">
                                                                                        @lang('site.your_hair_type')</font>
                                                                                </font>
                                                                            </span>
                                                                        </div>

                                                                        <div>
                                                                            <span>
                                                                                <font style="vertical-align: inherit;">
                                                                                    <font style="vertical-align: inherit;">
                                                                                        {{ $evaluate_result->answer1 }}
                                                                                    </font>
                                                                                </font>
                                                                            </span>
                                                                        </div>
                                                                    </div>

                                                                    <div style="display: flex;">
                                                                        <div style="    min-width: 275px;">
                                                                            <span>
                                                                                <font style="vertical-align: inherit;">
                                                                                    <font
                                                                                        style=" font-size: 14px; font-weight: bold; color: #646b77; vertical-align: inherit;">
                                                                                        @lang('site.use_hanaa')</font>
                                                                                </font>
                                                                            </span>
                                                                        </div>

                                                                        <div>
                                                                            <span>
                                                                                <font style="vertical-align: inherit;">
                                                                                    <font style="vertical-align: inherit;">
                                                                                        {{ $evaluate_result->answer2 }}
                                                                                    </font>
                                                                                </font>
                                                                            </span>
                                                                        </div>
                                                                    </div>

                                                                    <div style="display: flex;">
                                                                        <div style="    min-width: 275px;">
                                                                            <span>
                                                                                <font style="vertical-align: inherit;">
                                                                                    <font
                                                                                        style="font-size: 14px; font-weight: bold; color: #646b77; vertical-align: inherit;">
                                                                                        @lang('site.remove_hair_color')</font>
                                                                                </font>
                                                                            </span>
                                                                        </div>

                                                                        <div>
                                                                            <span>
                                                                                <font style="vertical-align: inherit;">
                                                                                    <font style="vertical-align: inherit;">
                                                                                        {{ $evaluate_result->answer3 }}
                                                                                    </font>
                                                                                </font>
                                                                            </span>
                                                                        </div>
                                                                    </div>


                                                                    <div style="display: flex;">
                                                                        <div style="    min-width: 275px;">
                                                                            <span>
                                                                                <font style="vertical-align: inherit;">
                                                                                    <font
                                                                                        style="font-size: 14px; font-weight: bold; color: #646b77; vertical-align: inherit;">
                                                                                        @lang('site.your_hair_demaged')</font>
                                                                                </font>
                                                                            </span>
                                                                        </div>

                                                                        <div>
                                                                            <span>
                                                                                <font style="vertical-align: inherit;">
                                                                                    <font style="vertical-align: inherit;">
                                                                                        {{ $evaluate_result->answer4 }}
                                                                                    </font>
                                                                                </font>
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                    <div style="display: flex;">
                                                                        <div style="    min-width: 275px;">
                                                                            <span>
                                                                                <font style="vertical-align: inherit;">
                                                                                    <font
                                                                                        style="font-size: 14px; font-weight: bold; color: #646b77; vertical-align: inherit;">
                                                                                        @lang('site.your_hair_length')</font>
                                                                                </font>
                                                                            </span>
                                                                        </div>

                                                                        <div>
                                                                            <span>
                                                                                <font style="vertical-align: inherit;">
                                                                                    <font style="vertical-align: inherit;">
                                                                                        {{ $evaluate_result->answer5 }}
                                                                                    </font>
                                                                                </font>
                                                                            </span>
                                                                        </div>
                                                                    </div>

                                                            </div>
                                                            @endif
                                                            <!-- <div class="col-md-5" style=" padding-right: 15px;   text-align: right;     font-weight: bold;">
                                                                                                                                                                                <div style="display: inline-block;">
                                                                                                                                                                                    <span style="    font-size: 17px; color: #ffc000; font-weight: bold;">
                                                                                                                                                                                        <font style="vertical-align: inherit;">
                                                                                                                                                                                            <font style=" vertical-align: inherit;">32.40 يورو × 1،0000 = 32.40 يورو</font>
                                                                                                                                                                                        </font>
                                                                                                                                                                                    </span>
                                                                                                                                                                                </div>

                                                                                                                                                                            </div> -->









                                                            <div class="row"
                                                                style="margin-top: 12px; border-top: 1px solid #e4e4e4;">
                                                                <div style=" margin-top: 12px;">


                                                                    <div
                                                                        style="display: flex; justify-content: flex-end; @if (app()->getLocale() == 'ar') align-items: flex-end;  @else   align-items: flex-start; @endif   flex-direction: column;">
                                                                        <div
                                                                            style="    font-size: 14px;color: #0f1b30; font-weight: 700; display: flex;">
                                                                            @lang('site.order_value')
                                                                            <div
                                                                                style="     color: #0f1b30; font-size: 14px;   min-width: 200px; text-align: right; @if (app()->getLocale() == 'ar') margin-right: 9px; @elseif(app()->getLocale() == 'de') margin-left: 2px; @endif ">
                                                                                <div
                                                                                    style=" color: #990000; font-weight: 700;display: inline;">
                                                                                    {{ number_format($subtotal, 2) }}
                                                                                    <span>€</span>
                                                                                </div>
                                                                                <span hidden id="subtotalForOrderEmail">
                                                                                    {{ number_format($subtotal, 2) }}</span>
                                                                            </div>
                                                                        </div>
                                                                        <div
                                                                            style="    font-size: 14px;color: #0f1b30; font-weight: 700; display: flex;">
                                                                            @lang('site.Less_discount')
                                                                            <div
                                                                                style="     color: #0f1b30; font-size: 14px;  text-align: right;  @if (app()->getLocale() == 'ar') min-width: 200px; margin-right: 18px;      @elseif(app()->getLocale() == 'de') margin-left: 2px; min-width: 164px;  @else  min-width: 164px;  margin-left: 18px; @endif    ">
                                                                                <div
                                                                                    style=" color: #990000; font-weight: 700;display: inline;">
                                                                                    <span>
                                                                                        {{ number_format($discount, 2) }}</span><span>€</span>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div
                                                                            style="    font-size: 14px;color: #0f1b30; font-weight: 700; display: flex;">
                                                                            @lang('site.delivery')
                                                                            <div
                                                                                style="     color: #0f1b30; font-size: 14px;   min-width: 200px; text-align: right;  @if (app()->getLocale() == 'ar')  margin-right: 19px;  @elseif(app()->getLocale() == 'de') margin-left: 2px;   @else margin-left: 13px;  @endif         ">
                                                                                <div 
                                                                                    style=" color: #990000; font-weight: 700;display: inline;">
                                                                                    <span>
                                                                                        {{ number_format($delivery_cost, 2) }}</span><span>€</span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div
                                                                            style="   font-size: 20px; color: #0f1b30;  font-weight: bold;  display: flex; @if (app()->getLocale() == 'ar') margin-right: -59px;  @endif">
                                                                            @lang('site.total_price')
                                                                            <div
                                                                                style="     color: #0f1b30; font-size: 14px;   min-width: 200px; text-align: right;   margin-left: 45px;  ">
                                                                                <div
                                                                                    style=" color: #990000; font-weight: 700;    margin-right: 78px;  font-size: 20px;@if (app()->getLocale() == 'de')   text-align: left;  margin-left: 40px;  @endif ">
                                                                                    <span
                                                                                        id="AllToInCheckoutSubtotalStep3">{{ number_format($subtotal, 2) }}</span>
                                                                                    <span>€</span>
                                                                                </div>

                                                                                <span
                                                                                    style="font-weight: 700; display: block;  @if (app()->getLocale() == 'de')  text-align: left; margin-left: 16px; @else margin-right: 45px;   @endif ">(@lang('site.the_net_price'):<span
                                                                                        id="AllToInCheckoutWithVAT-InStep3"></span>
                                                                                    €)*</span>
                                                                            </div>
                                                                        </div>
                                                                        <div
                                                                            style="    font-size: 14px;color: #0f1b30; font-weight: 700; display: flex;  @if (app()->getLocale() == 'ar')     margin-right: 22px;  @endif">
                                                                            @lang('site.VAT_included')
                                                                            <div
                                                                                style="     color: #0f1b30; font-size: 14px;   min-width: 200px; text-align: right;       @if (app()->getLocale() == 'de') margin-left: 0px; @else margin-left: -25px; @endif ">
                                                                                <div
                                                                                    style="  font-weight: 700;display: inline;margin-right: -32px;">
                                                                                    <span>(</span>
                                                                                    <span>19% :</span>
                                                                                    <span id="IdVAT_included-InStep3"></span><span>€</span>
                                                                                   
                                                                                    <span>)</span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- @lang('site.note_deliveries_to_noncountries') -->
                                                </div>
                                                <!--=======  End of product details content  =======-->
                                            </div>
                                        </div>
                                    </div>
                                </div>




                        </section>

                        <h4 style="display:none ;"></h4>
                        <section>
                            <div style="margin-top: 45px; margin-bottom: 45px;  text-align: center;">
                                <h4 style="font-size: 32px; color: #373737;font-weight: 300;">
                                    @lang('site.payment_confirmation')
                                </h4>
                            </div>
                            <div id="textpayment_method" class="textpayment_method">
                                @lang('site.please_select_the_payment_method')
                            </div>
                            <div id="paypal-button-container" ></div>

                            <textarea style="display: none" id="KCO">

                                </textarea>

                                <div id="my-checkout-container" >
                                </div>
                                 <div id="klarna-payments-container" >

                                 </div>
                               <script 
                                src="https://x.klarnacdn.net/express-button/v1/lib.js"
                                data-id="6b1cd9af-c7b5-5b84-8926-5c5b1482e7e5"
                                data-environment="production (default) | playground"
                                async
                                >
                            </script>
                            <div id="klarna-express-button">
                            <klarna-express-button 
                                    data-locale="en-US"
                                    data-theme="default (default) | dark | light"
                                />
                            </div>
                               
                            <div id="image_loader" style="display: none;">
                                <i class="fa fa-spinner fa-spin" style="font-size: 77px; color: #f79426;"></i>
                             </div>
                            
                        </section>
                        <h4 style="display:none ;"></h4>
                        <section>
                        <div style="margin-top: 45px; margin-bottom: 45px;  ">
                                <h4 style="font-size: 32px; color: #373737;font-weight: 300; text-align: center; margin: auto;">
                                @lang('site.success_save')
                                </h4>
                                <div class="row"  style="display: flex;flex-direction: column;  align-content: center;">
                                    <div class="col-sm-12 col-md-12 col-lg-6 col-xs-12">
                                        <div class="section-titlelogin pb-2 mt-35" style="@if (app()->getLocale() == 'ar') text-align: right; @endif">
                                           
                                    <h2 style="padding-bottom: 5px; color: #1e6f2f;"> @lang('site.Thank_you_for_shopping_at_Narjes-alsham.com')</h2>
                                           <span style="font-size: 20px; line-height: 1.6;">
                                                @lang('site.Your_order_has_been_successfully_received')
                                                <br>
                                                @lang('site.Your_order_number_is:')

                                                <span style="font-weight: bold; color:#1e6f2f">
                                                {{ $id }}
                                                </span>
                                                <br>
                                               
                                                @lang('site.We_are_processing_your_order_and_will_ship_it_soon_and_you_will')

                                               
                                               
                                                <br>
                                                <span style="text-wrap: nowrap;">
                                                @lang('site.Feel_free_to_contact_us_if_you_have_any questions.')

                                                </span>
                                                <br>
                                                <span style="text-wrap: nowrap;">
                                                @lang('site.Thank_you_for_your_trust_and_we_look_forward')

                                                </span>
                                                <br>
                                                @lang('site.to_be_allowed_to_serve_again')
                                                 </span>
                                            <h2 style="padding-bottom: 5px; color: #1e6f2f; margin-top: 10px;"> @lang('site.Your_Narjes_Alsham_team')</h2>

                                           
                                            <p class="text-center">
                                                <a href="/">

                                                <img style="width: 6%; margin-bottom: 10px;" data-src="{{ url('uploads/homepage/6.png') }}">

                                                    @lang('site.continue_shopping')
                                                </a>
                                            </p>

                                        </div>
                                    </div>


                                </div>
                            </div>
                      
                        </section>

                    </div>
                </div>

            </div>
        </div>
    </div>



    <!-- ///////////////////////////////////for checkout////////////////////////////////////////////// -->

    <!-- Load the required checkout.js script -->
    <script src="https://www.paypalobjects.com/api/checkout.js" data-version-4></script>

    <!-- Load the required Braintree components. -->
    <script src="https://js.braintreegateway.com/web/3.39.0/js/client.min.js"></script>
    <script src="https://js.braintreegateway.com/web/3.39.0/js/paypal-checkout.min.js"></script>
    <script src="https://x.klarnacdn.net/kp/lib/v1/api.js" async></script>


    <script>
        window.klarnaAsyncCallback = function () {

// This is where you start calling Klarna's JS SDK functions
//
window['Klarna']['Payments'].init({
      client_token: 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJmb28iOiJiYXIifQ.dtxWM6MIcgoeMgH87tGvsNDY6cH'
    })
    window['Klarna']['Payments'].load({
      container: '#klarna-payments-container',
      payment_method_category: 'pay_over_time',
      instance_id: "klarna-payments-instance"
    },
      function (res) {
        console.log(res);
      })

// Klarna.Payments.init({
// client_token: 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJmb28iOiJiYXIifQ.dtxWM6MIcgoeMgH87tGvsNDY6cH'
// })

                       
// Klarna.Payments.load({
//   container: '#klarna-payments-container',
//   payment_method_category: 'klarna'
// }, function (res) {
//   console.debug(res);
// })

};

  window.klarnaExpressButtonAsyncCallback = function(){
                    Klarna.ExpressButton.on('user-authenticated', function (callbackData) {
                        console.log("callbackData",callbackData);
                        // ... implement pre-fill logic here
                        // callbackData (see schema below) can be used to map user properties
                        // to already existing fields/forms in your checkout flow
                    })
                    }
                    // document.addEventListener('DOMContentLoaded', function() {
                    //     // Your Klarna code here
                    //     klarna.load({
                    //         client_id: '6b1cd9af-c7b5-5b84-8926-5c5b1482e7e5',
                    //         merchant_id: 'K1313301'
                    //     });
                    //     });
                   

                        // klarna.checkout.create({
                        //     purchase_country: 'US',
                        //     purchase_currency: 'USD',
                        //     locale: 'en-US',
                        //     order_amount: 10000,
                        //     order_tax_amount: 2000,
                        //     order_lines: [
                        //         {
                        //         type: 'physical',
                        //         reference: '123456789',
                        //         name: 'Product 1',
                        //         quantity: 1,
                        //         unit_price: 5000,
                        //         tax_rate: 0,
                        //         total_amount: 5000,
                        //         total_tax_amount: 0
                        //         },
                        //         // Add more order lines if needed
                        //     ],
                        //     merchant_urls: {
                        //         confirmation: 'https://www.example.com/confirmation',
                        //         push: 'https://www.example.com/push'
                        //     }
                        //     }, function (response) {
                        //     // Handle the response from Klarna
                        //     console.log(response);
                        //     });
    </script>

<script>
var orderDetails = {
  // Add your order details here
  orderId: '12345',
  totalPrice: 100.0,
  // ...
};

// Call the renderSnippet function with the order details
renderSnippet(orderDetails);

function renderSnippet(orderDetails) {
  // Generate the HTML snippet using the order details
  var htmlSnippet = generateSnippet(orderDetails);
  
  var checkoutContainer = document.getElementById('my-checkout-container');
  checkoutContainer.innerHTML = htmlSnippet;
  
  // Evaluate the script tags within the snippet
  var scriptsTags = checkoutContainer.getElementsByTagName('script');
  for (var i = 0; i < scriptsTags.length; i++) {
    var parentNode = scriptsTags[i].parentNode;
    var newScriptTag = document.createElement('script');
    newScriptTag.type = 'text/javascript';
    newScriptTag.text = scriptsTags[i].text;
    parentNode.removeChild(scriptsTags[i]);
    parentNode.appendChild(newScriptTag);
  }
}

function generateSnippet(orderDetails) {
  // Generate the HTML snippet using the order details
  // ...
  // Return the generated HTML snippet
  return '<div>Your HTML snippet here</div>';
}
</script>
	<!-- START - Dont edit -->
	<script type="text/javascript">
		var checkoutContainer = document.getElementById('my-checkout-container')
		checkoutContainer.innerHTML = (document.getElementById("KCO").value).replace(/\\"/g, "\"").replace(/\\n/g, "");
		var scriptsTags = checkoutContainer.getElementsByTagName('script')
		for (var i = 0; i < scriptsTags.length; i++) {
			var parentNode = scriptsTags[i].parentNode
			var newScriptTag = document.createElement('script')
			newScriptTag.type = 'text/javascript'
			newScriptTag.text = scriptsTags[i].text
			parentNode.removeChild(scriptsTags[i])
			parentNode.appendChild(newScriptTag)
		}



	</script>
    <script>
        ///// VAT حساب الضريبة

        //   var AllToInCheckout =Number($("#AllToInCheckoutSubtotal").text()) ; 
        var discount = Number($("#discount").text());
        var delivery_cost = Number($("#delivery_cost").text());
        var AllToInCheckoutSubtotalStep3 = Number($("#AllToInCheckoutSubtotalStep3").text());


        //  console.log("AllToInCheckout" + AllToInCheckout);
        var AllToInCheckoutSubtotalwithOutdiscount = Number($("#AllToInCheckoutSubtotal").text()) - Number(discount)


        $("#AllToInCheckoutSubtotal").text(Number(AllToInCheckoutSubtotalwithOutdiscount) + delivery_cost)
        var AllToInCheckout = Number($("#AllToInCheckoutSubtotal").text());
        console.log("AllToInCheckout befor perc" + AllToInCheckout);
        perc = ((AllToInCheckout / 100) * 19);
        var formattedPercentageperc = perc.toFixed(2);
        $("#IdVAT_included").text(formattedPercentageperc);

        console.log("perc" + perc);
        var AllToInCheckoutWithVAT = Number($("#AllToInCheckoutSubtotal").text()) - Number($("#IdVAT_included").text());
        var formattedPercentage = AllToInCheckoutWithVAT.toFixed(2);
        $("#AllToInCheckoutWithVAT").text(formattedPercentage);
        //////////////////////////////////////////////


        /////step3

        $("#AllToInCheckoutWithVAT-InStep3").text(formattedPercentage);
        $("#IdVAT_included-InStep3").text(formattedPercentageperc);
        //  $("#AllToInCheckout").text(AllToInCheckout - discount)

        var AllToInCheckoutSubtotalStep3WithOutdiscount = $("#AllToInCheckoutSubtotalStep3").text() - Number(discount)
        $("#AllToInCheckoutSubtotalStep3").text(Number(AllToInCheckoutSubtotalStep3WithOutdiscount) + delivery_cost)




        $(function() {
            $("#wizard").steps({
                headerTag: "h4",
                bodyTag: "section",
                transitionEffect: "fade",
                enableAllSteps: false,
                transitionEffectSpeed: 300,
                labels: {
                    next: "@lang('site.confirm')",
                    previous: "السابق",
                    finish: "@lang('site.confirm')"
                },
                onInit: function(event, current) {
                    $('.actions > ul > li').next().attr('style', 'display:none');
                    $('.actions > ul > li').attr('style', 'display:none');

                },
                onStepChanging: function(event, currentIndex, newIndex) {
                    if (newIndex >= 1) {
                        $('a[href="#next"]').show();
                        $('#paypal-button-container').empty();
                        // var hidebutton = document.getElementsByClassName("actions");
                        // hidebutton[0].className += ' hidebuttoninonstep1';
                        $('.steps ul li:first-child a img').attr('src', '/uploads/images/g11.svg');

                        var sample = document.getElementById("figcaptionid1"); // using VAR
                        // change css style
                        sample.style.color = '#3a9943'; // Changes color, adds style property.          

                    } else {
                        $('.steps ul li:first-child a img').attr('src', '/uploads/images/g11.svg');
                        var sample = document.getElementById("figcaptionid1"); // using VAR
                        // change css style
                        sample.style.color = '#ffffff'; // Changes color, adds style property.
                    }
                    if (newIndex === 1) {
                        $('a[href="#next"]').show();
                        $('#paypal-button-container').empty();
                        ////////////// validate for billing address //////
                        var firstnamevalidate = ValidateField('firstnamevalidate');
                        var lastnamevalidateForCheckout = ValidateField('lastnamevalidateForCheckout');
                        var streetandnumbervalidate = ValidateField('streetandnumbervalidate');
                        var zipcodesvalidate = ValidateField('zipcodesvalidate');
                        var cityvalidate = ValidateField('cityvalidate');
                        var countryvalidate = selectvalidateField('country');
                        var emailaddressvalidate = ValidateField('emailaddressvalidate');
                        var phonevalidate = ValidateField('phonevalidate');

                        var errorforfirsnamecustoum = document.getElementById(
                            'errorforfirsnamecustoum');
                        var errorforlastnamecustoum = document.getElementById(
                            'errorforlastnamecustoum');
                        var errorforstreetandnumbercustoum = document.getElementById(
                            'errorforstreetandnumbercustoum');
                        var errorforzipcodescustoum = document.getElementById(
                            'errorforzipcodescustoum');
                        var errorforcitycustoum = document.getElementById('errorforcitycustoum');
                        var errorforemailaddresscustoum = document.getElementById(
                            'errorforemailaddresscustoum');
                        var errorphonecustoum = document.getElementById('errorphonecustoum');


                        if (!firstnamevalidate || !lastnamevalidateForCheckout || !
                            streetandnumbervalidate || !zipcodesvalidate || !cityvalidate || !
                            emailaddressvalidate || !phonevalidate || !countryvalidate) {
                            if (!firstnamevalidate) {
                                var element = document.getElementById("firstname");
                                element.className += ' errorvalidate ';
                                errorforfirsnamecustoum.innerHTML =
                                    '<iconify-icon style="color: #f63b3b;" icon="ion:alert-circle-sharp"></iconify-icon>';
                            } else {
                                var element = document.getElementById("firstname");
                                element.classList.remove('errorvalidate');
                                errorforfirsnamecustoum.innerHTML =
                                    '<iconify-icon icon="ion:checkmark-circle"></iconify-icon>';
                            }
                            if (!lastnamevalidateForCheckout) {
                                var element = document.getElementById("lastnameForCheckout");
                                element.className += ' errorvalidate ';
                                errorforlastnamecustoum.innerHTML =
                                    '<iconify-icon style="color: #f63b3b;" icon="ion:alert-circle-sharp"></iconify-icon>';
                            } else {
                                var element = document.getElementById("lastnameForCheckout");
                                element.classList.remove('errorvalidate');
                                errorforlastnamecustoum.innerHTML =
                                    '<iconify-icon icon="ion:checkmark-circle"></iconify-icon>';
                            }
                            if (!streetandnumbervalidate) {
                                var element = document.getElementById("streetandnumber");
                                element.className += ' errorvalidate ';
                                errorforstreetandnumbercustoum.innerHTML =
                                    '<iconify-icon style="color: #f63b3b;" icon="ion:alert-circle-sharp"></iconify-icon>';
                            } else {
                                var element = document.getElementById("streetandnumber");
                                element.classList.remove('errorvalidate');
                                errorforstreetandnumbercustoum.innerHTML =
                                    '<iconify-icon icon="ion:checkmark-circle"></iconify-icon>';
                            }
                            if (!zipcodesvalidate) {
                                var element = document.getElementById("zipcodes");
                                element.className += ' errorvalidate ';
                                errorforzipcodescustoum.innerHTML =
                                    '<iconify-icon style="color: #f63b3b;" icon="ion:alert-circle-sharp"></iconify-icon>';
                            } else {
                                var element = document.getElementById("zipcodes");
                                element.classList.remove('errorvalidate');
                                errorforzipcodescustoum.innerHTML =
                                    '<iconify-icon icon="ion:checkmark-circle"></iconify-icon>';
                            }
                            if (!cityvalidate) {
                                var element = document.getElementById("city");
                                element.className += ' errorvalidate ';
                                errorforcitycustoum.innerHTML =
                                    '<iconify-icon style="color: #f63b3b;" icon="ion:alert-circle-sharp"></iconify-icon>';
                            } else {
                                var element = document.getElementById("city");
                                element.classList.remove('errorvalidate');
                                errorforcitycustoum.innerHTML =
                                    '<iconify-icon icon="ion:checkmark-circle"></iconify-icon>';
                            }
                            if (!emailaddressvalidate) {
                                var element = document.getElementById("emailaddress");
                                element.className += ' errorvalidate ';
                                errorforemailaddresscustoum.innerHTML =
                                    '<iconify-icon style="color: #f63b3b;" icon="ion:alert-circle-sharp"></iconify-icon>';
                            } else {
                                var element = document.getElementById("emailaddress");
                                element.classList.remove('errorvalidate');
                                errorforemailaddresscustoum.innerHTML =
                                    '<iconify-icon icon="ion:checkmark-circle"></iconify-icon>';
                            }
                            if (!phonevalidate) {
                                var element = document.getElementById("phone");
                                element.className += ' errorvalidate ';
                                errorphonecustoum.innerHTML =
                                    '<iconify-icon style="color: #f63b3b;" icon="ion:alert-circle-sharp"></iconify-icon>';
                            } else {
                                var element = document.getElementById("phone");
                                element.classList.remove('errorvalidate');
                                errorphonecustoum.innerHTML =
                                    '<iconify-icon icon="ion:checkmark-circle"></iconify-icon>';
                            }
                            if (!countryvalidate) {
                                var element = document.getElementById("country");
                                element.className += ' errorvalidate ';
                            } else {
                                var element = document.getElementById("country");
                                element.classList.remove('errorvalidate');

                            }

                            $('.steps ul li:first-child a img').attr('src',
                                '/uploads/images/step11-activen.svg');
                            var sample = document.getElementById("figcaptionid1"); // using VAR
                            // change css style
                            sample.style.color = '#ffffff'; // Changes color, adds style property.
                            ///////////////////////
                            var errorCount = $("#wizard").find('.errorvalidate').length;
                            // If there are errors, scroll to the first error
                            if (errorCount > 0) {
                                console.log("errorCount" + errorCount);
                                var firstError = $("#wizard").find('.errorvalidate:first');
                                var errorPosition = firstError.offset().top - $(window).height() / 2;
                                $('html, body').animate({
                                    scrollTop: errorPosition
                                }, 500);
                                firstError.focus();
                            }
                            return false;
                        }
                        //////////////////for remove all calss errorvalidate from allElements /////////////////// 
                        const allElements = document.querySelectorAll('*');
                        for (let i = 0; i < allElements.length; i++) {
                            allElements[i].classList.remove(
                                'errorvalidate'
                            ); // replace 'class-name' with the name of the class you want to remove
                        }
                        ////////////// validate for defrent shopping address //////
                        var firstnamevalidatedifferentaddress = ValidateField(
                            'firstnamevalidatedifferentaddress');
                        var lastnamedifferentaddress = ValidateField('lastnamedifferentaddress');
                        var streetandnumberdifferentaddress = ValidateField(
                            'streetandnumberdifferentaddress');
                        var zipcodesdifferentaddress = ValidateField('zipcodesdifferentaddress');
                        var citydifferentaddress = ValidateField('citydifferentaddress');
                        var emaildifferentaddress = ValidateField('emaildifferentaddress');
                        var phonedifferentaddress = ValidateField('phonedifferentaddress');
                        var countrydifferentaddressvalidate = selectvalidateField(
                            'countrydifferentaddress');


                        var errorfirstnamedifferentaddresscustoum = document.getElementById(
                            'errorfirstnamedifferentaddresscustoum');
                        var errorlastnamedifferentaddresscustoum = document.getElementById(
                            'errorlastnamedifferentaddresscustoum');
                        var errorstreetandnumberdifferentaddresscustoum = document.getElementById(
                            'errorstreetandnumberdifferentaddresscustoum');
                        var errorzipcodesdifferentaddresscustoum = document.getElementById(
                            'errorzipcodesdifferentaddresscustoum');
                        var errorcitydifferentaddresscustoum = document.getElementById(
                            'errorcitydifferentaddresscustoum');
                        var erroremaildifferentaddresscustoum = document.getElementById(
                            'erroremaildifferentaddresscustoum');
                        var errorphonedifferentaddresscustoum = document.getElementById(
                            'errorphonedifferentaddresscustoum');



                        // For Differing Shipping Address
                        var status = document.getElementById("checkboxforenabledefrentaddres");
                        if (status.checked) {

                            if (!firstnamevalidatedifferentaddress || !lastnamedifferentaddress || !
                                streetandnumberdifferentaddress || !zipcodesdifferentaddress || !
                                citydifferentaddress || !emaildifferentaddress || !
                                phonedifferentaddress || !countrydifferentaddressvalidate) {
                                if (!firstnamevalidatedifferentaddress) {
                                    var element = document.getElementById("firstnamedifferentaddress");
                                    element.className += ' errorvalidate ';
                                    errorfirstnamedifferentaddresscustoum.innerHTML =
                                        '<iconify-icon style="color: #f63b3b;" icon="ion:alert-circle-sharp"></iconify-icon>';
                                } else {
                                    errorfirstnamedifferentaddresscustoum.innerHTML =
                                        '<iconify-icon icon="ion:checkmark-circle"></iconify-icon>';
                                }
                                if (!lastnamedifferentaddress) {
                                    var element = document.getElementById("lastnamedifferentaddress");
                                    element.className += ' errorvalidate ';
                                    errorlastnamedifferentaddresscustoum.innerHTML =
                                        '<iconify-icon style="color: #f63b3b;" icon="ion:alert-circle-sharp"></iconify-icon>';
                                } else {
                                    errorlastnamedifferentaddresscustoum.innerHTML =
                                        '<iconify-icon icon="ion:checkmark-circle"></iconify-icon>';
                                }
                                if (!streetandnumberdifferentaddress) {
                                    var element = document.getElementById(
                                        "streetandnumberdifferentaddress");
                                    element.className += ' errorvalidate ';
                                    errorstreetandnumberdifferentaddresscustoum.innerHTML =
                                        '<iconify-icon style="color: #f63b3b;" icon="ion:alert-circle-sharp"></iconify-icon>';
                                } else {
                                    errorstreetandnumberdifferentaddresscustoum.innerHTML =
                                        '<iconify-icon icon="ion:checkmark-circle"></iconify-icon>';
                                }
                                if (!zipcodesdifferentaddress) {
                                    var element = document.getElementById("zipcodesdifferentaddress");
                                    element.className += ' errorvalidate ';
                                    errorzipcodesdifferentaddresscustoum.innerHTML =
                                        '<iconify-icon style="color: #f63b3b;" icon="ion:alert-circle-sharp"></iconify-icon>';
                                } else {
                                    errorzipcodesdifferentaddresscustoum.innerHTML =
                                        '<iconify-icon icon="ion:checkmark-circle"></iconify-icon>';
                                }
                                if (!citydifferentaddress) {
                                    var element = document.getElementById("citydifferentaddress");
                                    element.className += ' errorvalidate ';
                                    errorcitydifferentaddresscustoum.innerHTML =
                                        '<iconify-icon style="color: #f63b3b;" icon="ion:alert-circle-sharp"></iconify-icon>';
                                } else {
                                    errorcitydifferentaddresscustoum.innerHTML =
                                        '<iconify-icon icon="ion:checkmark-circle"></iconify-icon>';
                                }
                                if (!emaildifferentaddress) {
                                    var element = document.getElementById("emaildifferentaddress");
                                    element.className += ' errorvalidate ';
                                    erroremaildifferentaddresscustoum.innerHTML =
                                        '<iconify-icon style="color: #f63b3b;" icon="ion:alert-circle-sharp"></iconify-icon>';
                                } else {
                                    erroremaildifferentaddresscustoum.innerHTML =
                                        '<iconify-icon icon="ion:checkmark-circle"></iconify-icon>';
                                }
                                if (!phonedifferentaddress) {
                                    var element = document.getElementById("phonedifferentaddress");
                                    element.className += ' errorvalidate ';
                                    errorphonedifferentaddresscustoum.innerHTML =
                                        '<iconify-icon style="color: #f63b3b;" icon="ion:alert-circle-sharp"></iconify-icon>';
                                } else {
                                    errorphonedifferentaddresscustoum.innerHTML =
                                        '<iconify-icon icon="ion:checkmark-circle"></iconify-icon>';
                                }
                                if (!countrydifferentaddressvalidate) {
                                    var element = document.getElementById("countrydifferentaddress");
                                    element.className += ' errorvalidate ';
                                }
                                $('.steps ul li:first-child a img').attr('src',
                                    '/uploads/images/step11-activen.svg');
                                var sample = document.getElementById("figcaptionid1"); // using VAR
                                // change css style
                                sample.style.color = '#ffffff'; // Changes color, adds style property.

                                ///////////
                                var errorCount = $("#wizard").find('.errorvalidate').length;
                                console.log("errorCount" + errorCount);
                                // If there are errors, scroll to the first error
                                if (errorCount > 0) {
                                    var firstError = $("#wizard").find('.errorvalidate:first');
                                    var errorPosition = firstError.offset().top - $(window).height() /
                                        2;
                                    $('html, body').animate({
                                        scrollTop: errorPosition
                                    }, 500);
                                    firstError.focus();
                                } else {
                                    console.log("errorerrorforfirsnamecustoum")
                                    errorforfirsnamecustoum.innerHTML =
                                        '<iconify-icon icon="ion:checkmark-circle"></iconify-icon>';
                                    errorforlastnamecustoum.innerHTML =
                                        '<iconify-icon icon="ion:checkmark-circle"></iconify-icon>';
                                    errorforlastnamecustoum.innerHTML =
                                        '<iconify-icon icon="ion:checkmark-circle"></iconify-icon>';
                                    errorforstreetandnumbercustoum.innerHTML =
                                        '<iconify-icon icon="ion:checkmark-circle"></iconify-icon>';
                                    errorforzipcodescustoum.innerHTML =
                                        '<iconify-icon icon="ion:checkmark-circle"></iconify-icon>';
                                    errorforcitycustoum.innerHTML =
                                        '<iconify-icon icon="ion:checkmark-circle"></iconify-icon>';
                                    errorforemailaddresscustoum.innerHTML =
                                        '<iconify-icon icon="ion:checkmark-circle"></iconify-icon>';
                                    errorphonecustoum.innerHTML =
                                        '<iconify-icon icon="ion:checkmark-circle"></iconify-icon>';
                                }
                                return false;
                            }
                        } else {
                            var list = document.getElementsByClassName(
                                'Countrydifferentshippingaddress');
                            var n;
                            for (n = 0; n < list.length; ++n) {
                                list[n].innerHTML = returncountry(document.getElementById("country")
                                    .value);
                            }
                        }
                        $(".prev-btn").click(function() {
                            $("#wizard").steps("previous");
                        });


                        $('.steps ul li:first-child a img').attr('src',
                            '/uploads/images/step11-activen.svg');
                        var sample = document.getElementById("figcaptionid1"); // using VAR
                        // change css style
                        sample.style.color = '#ffffff'; // Changes color, adds style property.

                        $('.steps ul li:nth-child(2) a img').attr('src', '/uploads/images/g22.svg');
                        var sample = document.getElementById("figcaptionid2"); // using VAR
                        // change css style
                        sample.style.color = '#ffffff'; // Changes color, adds style property.

                        var errorCount = $("#wizard").find('.errorvalidate').length;
                        console.log("errorCount" + errorCount);
                        // If there are errors, scroll to the first error
                        if (errorCount > 0) {
                            var firstError = $("#wizard").find('.errorvalidate:first');
                            var errorPosition = firstError.offset().top - $(window).height() / 2;
                            $('html, body').animate({
                                scrollTop: errorPosition
                            }, 500);
                            firstError.focus();
                        } else {
                            console.log("errorerrorforfirsnamecustoum")
                            errorforfirsnamecustoum.innerHTML =
                                '<iconify-icon icon="ion:checkmark-circle"></iconify-icon>';
                            errorforlastnamecustoum.innerHTML =
                                '<iconify-icon icon="ion:checkmark-circle"></iconify-icon>';
                            errorforlastnamecustoum.innerHTML =
                                '<iconify-icon icon="ion:checkmark-circle"></iconify-icon>';
                            errorforstreetandnumbercustoum.innerHTML =
                                '<iconify-icon icon="ion:checkmark-circle"></iconify-icon>';
                            errorforzipcodescustoum.innerHTML =
                                '<iconify-icon icon="ion:checkmark-circle"></iconify-icon>';
                            errorforcitycustoum.innerHTML =
                                '<iconify-icon icon="ion:checkmark-circle"></iconify-icon>';
                            errorforemailaddresscustoum.innerHTML =
                                '<iconify-icon icon="ion:checkmark-circle"></iconify-icon>';
                            errorphonecustoum.innerHTML =
                                '<iconify-icon icon="ion:checkmark-circle"></iconify-icon>';
                        }
                    } else {
                        $('.steps ul li:nth-child(2) a img').attr('src', '/uploads/images/step22.svg');
                        var sample = document.getElementById("figcaptionid2"); // using VAR
                        // change css style
                        sample.style.color = '#3a9943'; // Changes color, adds style property.       
                    }
                    if (newIndex === 2) {
                        $('a[href="#next"]').show();
                        $('#paypal-button-container').empty();
                        var firstnamebillingaddress = document.getElementById("firstname").value;
                        var lastnamebillingaddress = document.getElementById("lastnameForCheckout")
                            .value;
                        var streetandnumberbillingaddress = document.getElementById("streetandnumber")
                            .value;
                        var zipcodesbillingaddress = document.getElementById("zipcodes").value;
                        var citybillingaddress = document.getElementById("city").value;
                        var countrybillingaddress = document.getElementById("country").value;
                        var emailaddressbillingaddress = document.getElementById("emailaddress").value;
                        var phonebillingaddress = document.getElementById("phone").value;



                        document.getElementById("firstnamebillingaddress").innerHTML =
                            firstnamebillingaddress;
                        document.getElementById("lastnamebillingaddress").innerHTML =
                            lastnamebillingaddress;
                        document.getElementById("streetandnumberbillingaddress").innerHTML =
                            streetandnumberbillingaddress;
                        document.getElementById("zipcodesbillingaddress").innerHTML =
                            zipcodesbillingaddress;
                        document.getElementById("citybillingaddress").innerHTML = citybillingaddress;

                        /////////////////

                        var firstnamedifferentaddress = document.getElementById(
                            "firstnamedifferentaddress").value;
                        var lastnamedifferentaddress = document.getElementById(
                            "lastnamedifferentaddress").value;
                        var streetandnumberdifferentaddress = document.getElementById(
                            "streetandnumberdifferentaddress").value;
                        var zipcodesdifferentaddress = document.getElementById(
                            "zipcodesdifferentaddress").value;
                        var citydifferentaddress = document.getElementById("citydifferentaddress")
                            .value;
                        var countrydifferentaddress = document.getElementById("countrydifferentaddress")
                            .value;
                        var emaildifferentaddress = document.getElementById("emaildifferentaddress")
                            .value;
                        var phonedifferentaddress = document.getElementById("phonedifferentaddress")
                            .value;



                        document.getElementById("firstnameshippingaddress").innerHTML =
                            firstnamedifferentaddress;
                        document.getElementById("lastnameshippingaddress").innerHTML =
                            lastnamedifferentaddress;
                        document.getElementById("streetandnumbershippingaddress").innerHTML =
                            streetandnumberdifferentaddress;
                        document.getElementById("zipcodesshippingaddress").innerHTML =
                            zipcodesdifferentaddress;
                        document.getElementById("cityshippingaddress").innerHTML = citydifferentaddress;

                        var status_dif_billing = document.getElementById(
                            "checkboxforenabledefrentaddres");
                        if (!status_dif_billing.checked) {

                            document.getElementById("firstnameshippingaddress").innerHTML =
                                firstnamebillingaddress;
                            document.getElementById("lastnameshippingaddress").innerHTML =
                                lastnamebillingaddress;
                            document.getElementById("streetandnumbershippingaddress").innerHTML =
                                streetandnumberbillingaddress;
                            document.getElementById("zipcodesshippingaddress").innerHTML =
                                zipcodesbillingaddress;
                            document.getElementById("cityshippingaddress").innerHTML =
                                citybillingaddress;
                        }

                        var status = document.getElementsByName("paymenttype");
                        var validradio = false;
                        var i = 0;
                        while (!validradio && i < status.length) {
                            if (status[i].checked) {
                                if (status[i].value == 0) {
                                    document.getElementById("paymentstep3").innerHTML =
                                        "@lang('site.instant_bank_transfer')";
                                        document.getElementById("textpayment_method").style.display = "none";
                                        document.getElementById("paypal-button-container").style.display = "none";
                                        document.getElementById("klarna-express-button").style.display = "block";

                                } else {
                                    document.getElementById("paymentstep3").innerHTML =
                                        "@lang('site.paypal_plus')";
                                        document.getElementById("textpayment_method").style.display = "block";
                                        document.getElementById("paypal-button-container").style.display = "block";
                                      
                                                    
                                      document.getElementById("klarna-express-button").style.display = "none";
                                               
                                       

                                }

                                validradio = true;
                            }

                            i++;
                        }
                        if (!validradio) {
                            var list = document.getElementsByClassName('labelpaymenttype');
                            for (var n = 0; n < list.length; ++n) {
                                list[n].className += ' errorvalidatepaymenttype  requirederror';
                            }
                            // var element = document.getElementById("emaildifferentaddress");
                            // element.className += ' errorvalidate ';
                            // var labelemaildifferentaddress = document.getElementById("labelemaildifferentaddress");
                            // labelemaildifferentaddress.className += ' requirederror';



                            $('.steps ul li:nth-child(2) a img').attr('src', '/uploads/images/g22.svg');
                            var sample = document.getElementById("figcaptionid2"); // using VAR
                            // change css style
                            sample.style.color = '#ffffff'; // Changes color, adds style property.
                            $('.steps ul li:first-child a img').attr('src',
                                '/uploads/images/step11-activen.svg');
                            var sample = document.getElementById("figcaptionid1"); // using VAR
                            // change css style
                            sample.style.color = '#ffffff'; // Changes color, adds style property.


                            ///////////////////////
                            var errorCount = $("#wizard").find('.errorvalidatepaymenttype').length;
                            console.log("errorCount" + errorCount);
                            // If there are errors, scroll to the first error
                            if (errorCount > 0) {
                                var firstError = $("#wizard").find('.errorvalidatepaymenttype:first');
                                var errorPosition = firstError.offset().top - $(window).height() / 2;
                                $('html, body').animate({
                                    scrollTop: errorPosition
                                }, 500);
                                firstError.focus();
                            }


                            return false;
                        }

                        //////////////////for remove all calss errorvalidate from allElements /////////////////// 
                        const allElementspaymenttype = document.querySelectorAll('*');
                        for (let i = 0; i < allElementspaymenttype.length; i++) {
                            allElementspaymenttype[i].classList.remove(
                                'errorvalidatepaymenttype'
                            ); // replace 'class-name' with the name of the class you want to remove
                        }

                        var statusconditions = document.getElementsByName("termsandconditions");
                        var termsandprivacy = document.getElementsByName("termsandprivacy");

                        var validradioTermsandprivacy = false;
                        var i = 0;
                        while (!validradioTermsandprivacy && i < termsandprivacy.length) {
                            if (termsandprivacy[i].checked) {
                                validradioTermsandprivacy = true;
                            }

                            i++;
                        }

                        var validradioconditions = false;
                        var i = 0;
                        while (!validradioconditions && i < statusconditions.length) {
                            if (statusconditions[i].checked) {
                                validradioconditions = true;
                            }

                            i++;
                        }
                        if (!validradioconditions || !validradioTermsandprivacy) {
                            var list = document.getElementsByClassName('labeltermsandconditions');
                            for (var n = 0; n < list.length; ++n) {
                                list[n].className += ' errorvalidatepaymenttype  requirederror';
                            }




                            // var element = document.getElementById("emaildifferentaddress");
                            // element.className += ' errorvalidate ';
                            // var labelemaildifferentaddress = document.getElementById("labelemaildifferentaddress");
                            // labelemaildifferentaddress.className += ' requirederror';



                            $('.steps ul li:nth-child(2) a img').attr('src',
                                '/uploads/images/step-activenew.svg');
                            var sample = document.getElementById("figcaptionid2"); // using VAR
                            // change css style
                            sample.style.color = '#ffffff'; // Changes color, adds style property.
                            $('.steps ul li:first-child a img').attr('src',
                                '/uploads/images/step11-activen.svg');
                            var sample = document.getElementById("figcaptionid1"); // using VAR
                            // change css style
                            sample.style.color = '#ffffff'; // Changes color, adds style property.

                            ///////////////////////
                            var errorCount = $("#wizard").find('.errorvalidatepaymenttype').length;
                            console.log("errorCount" + errorCount);
                            // If there are errors, scroll to the first error
                            if (errorCount > 0) {
                                var firstError = $("#wizard").find('.errorvalidatepaymenttype:first');
                                var errorPosition = firstError.offset().top - $(window).height() / 2;
                                $('html, body').animate({
                                    scrollTop: errorPosition
                                }, 500);
                                firstError.focus();
                            }

                            return false;
                        }

                        //////////////////for remove all calss errorvalidate from allElements /////////////////// 
                        const allElements = document.querySelectorAll('*');
                        for (let i = 0; i < allElements.length; i++) {
                            allElements[i].classList.remove(
                                'errorvalidate'
                            ); // replace 'class-name' with the name of the class you want to remove
                        }



                        var addresspayment = {
                            'firstName': firstnamebillingaddress,
                            'lastName': lastnamebillingaddress,
                            'street': streetandnumberbillingaddress,
                            'zipCode': zipcodesbillingaddress,
                            'country': countrybillingaddress,
                            'email': emailaddressbillingaddress,
                            'phone': phonebillingaddress

                        }
                        console.log(addresspayment);
                        var difAddress = {

                        };
                        var addresssame = 0;
                        if (!status_dif_billing.checked) {
                            difAddress = addresspayment;
                            addresssame = 1;
                        } else {
                            difAddress = {
                                'firstName': firstnamedifferentaddress,
                                'lastName': lastnamedifferentaddress,
                                'street': streetandnumberdifferentaddress,
                                'zipCode': zipcodesdifferentaddress,
                                'country': countrydifferentaddress,
                                'email': emaildifferentaddress,
                                'phone': phonedifferentaddress
                            }
                            addresssame = 0;
                        }
                        console.log(difAddress);

                        var form_dataa = {
                            type: "order",
                            status: 2,
                            delivery_cost: 0,
                            discount: 0,
                            address: addresspayment,
                            addressBill: difAddress,
                            addresssame: addresssame,
                            vat: 0,
                            total_cost: 2,
                            items: $("#valOfSale").val(),
                            saleId: $("#idOfSale").val()
                        };
                        // $.ajax({
                        //     type: 'POST',
                        //     headers: {
                        //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        //     },
                        //     url: '<?php echo url('sales/completeOrderOnline'); ?>',
                        //     data: form_dataa,
                        //     success: function(msg) {
                        //         ///////
                        //         console.log(msg)

                        //     }
                        // });

                        $('.steps ul li:nth-child(3) a img').attr('src', '/uploads/images/g33.svg');
                        var sample = document.getElementById("figcaptionid3"); // using VAR
                        // change css style
                        sample.style.color = '#ffffff'; // Changes color, adds style property.

                        $('.steps ul li:nth-child(2) a img').attr('src',
                            '/uploads/images/step-activenew.svg');
                        var sample = document.getElementById("figcaptionid2"); // using VAR
                        // change css style
                        sample.style.color = '#ffffff'; // Changes color, adds style property.
                        $('.steps ul li:first-child a img').attr('src',
                            '/uploads/images/step11-activen.svg');
                        var sample = document.getElementById("figcaptionid1"); // using VAR
                        // change css style
                        sample.style.color = '#ffffff'; // Changes color, adds style property.

                    } else {

                        $('.steps ul li:nth-child(3) a img').attr('src', '/uploads/images/step33.svg');
                        var sample = document.getElementById("figcaptionid3"); // using VAR
                        // change css style
                        sample.style.color = '#3a9943'; // Changes color, adds style property.
                    }
                    if (newIndex === 3) {
                        $('a[href="#next"]').hide();
                        
            var cartItems = [{
                name: "Product 1",
                description: "Description of product 1",
                quantity: 1,
                price: 50,
                sku: "prod1",
                currency: "USD"
            }, {
                name: "Product 2",
                description: "Description of product 2",
                quantity: 3,
                price: 20,
                sku: "prod2",
                currency: "USD"
            }, {
                name: "Product 3",
                description: "Description of product 3",
                quantity: 4,
                price: 10,
                sku: "prod3",
                currency: "USD"
            }];

            var total = 0;
            for (var a = 0; a < cartItems.length; a++) {
                total += (cartItems[a].price * cartItems[a].quantity);

            }

            // Render the PayPal button
            paypal.Button.render({

                // Set your environment
                env: 'sandbox', // sandbox | production

                // Specify the style of the button
                style: {
                    label: 'checkout',
                    size: 'medium', // small | medium | large | responsive
                    shape: 'pill', // pill | rect
                    color: 'gold', // gold | blue | silver | black
                    layout: 'vertical',

                },

                // PayPal Client IDs - replace with your own
                // Create a PayPal app: https://developer.paypal.com/developer/applications/create

                client: {
                    sandbox: 'Ae7DrFhzoLDM7k4QLVUxahRvvVGbw9V2QVGwVjG0UlOizRZ1__mXLSRRdw7R7jw8HuRPRlvhZGZUj5Vs',
                    production: ''
                },

                funding: {
                    allowed: [
                        paypal.FUNDING.CARD,
                        paypal.FUNDING.ELV
                    ]
                },

                payment: function(data, actions) {
                    return actions.payment.create({
                        payment: {
                            transactions: [{
                                amount: {
                                    total: Number($("#AllToInCheckoutSubtotalStep3")
                                        .text()),
                                    currency: 'EUR'
                                },
                                // item_list: {
                                //     // custom cartItems array created specifically for PayPal
                                //     items: cartItems
                                // }
                            }]
                        }
                    });
                },

                onAuthorize: function(data, actions) {
                    return actions.payment.execute().then(function() {
                        // you can use all the values received from PayPal as you want
                        console.log({
                            "intent": data.intent,
                            "orderID": data.orderID,
                            "payerID": data.payerID,
                            "paymentID": data.paymentID,
                            "paymentToken": data.paymentToken
                        });

                        // [call AJAX here]



                        var firstnamebillingaddress = document.getElementById("firstname")
                            .value;
                        var lastnamebillingaddress = document.getElementById(
                                "lastnameForCheckout")
                            .value;
                        var streetandnumberbillingaddress = document.getElementById(
                                "streetandnumber")
                            .value;
                        var zipcodesbillingaddress = document.getElementById("zipcodes").value;
                        var citybillingaddress = document.getElementById("city").value;
                        var countrybillingaddress = document.getElementById("country").value;
                        var emailaddressbillingaddress = document.getElementById("emailaddress")
                            .value;
                        var phonebillingaddress = document.getElementById("phone").value;



                        document.getElementById("firstnamebillingaddress").innerHTML =
                            firstnamebillingaddress;
                        document.getElementById("lastnamebillingaddress").innerHTML =
                            lastnamebillingaddress;
                        document.getElementById("streetandnumberbillingaddress").innerHTML =
                            streetandnumberbillingaddress;
                        document.getElementById("zipcodesbillingaddress").innerHTML =
                            zipcodesbillingaddress;
                        document.getElementById("citybillingaddress").innerHTML =
                            citybillingaddress;

                        /////////////////

                        var firstnamedifferentaddress = document.getElementById(
                            "firstnamedifferentaddress").value;
                        var lastnamedifferentaddress = document.getElementById(
                            "lastnamedifferentaddress").value;
                        var streetandnumberdifferentaddress = document.getElementById(
                            "streetandnumberdifferentaddress").value;
                        var zipcodesdifferentaddress = document.getElementById(
                            "zipcodesdifferentaddress").value;
                        var citydifferentaddress = document.getElementById(
                                "citydifferentaddress")
                            .value;
                        var countrydifferentaddress = document.getElementById(
                                "countrydifferentaddress")
                            .value;
                        var emaildifferentaddress = document.getElementById(
                                "emaildifferentaddress")
                            .value;
                        var phonedifferentaddress = document.getElementById(
                                "phonedifferentaddress")
                            .value;
                        var paymentType = document.getElementById("paymentstep3").innerHTML;




                        document.getElementById("firstnameshippingaddress").innerHTML =
                            firstnamedifferentaddress;
                        document.getElementById("lastnameshippingaddress").innerHTML =
                            lastnamedifferentaddress;
                        document.getElementById("streetandnumbershippingaddress").innerHTML =
                            streetandnumberdifferentaddress;
                        document.getElementById("zipcodesshippingaddress").innerHTML =
                            zipcodesdifferentaddress;
                        document.getElementById("cityshippingaddress").innerHTML =
                            citydifferentaddress;

                        var status_dif_billing = document.getElementById(
                            "checkboxforenabledefrentaddres");
                        if (!status_dif_billing.checked) {

                            document.getElementById("firstnameshippingaddress").innerHTML =
                                firstnamebillingaddress;
                            document.getElementById("lastnameshippingaddress").innerHTML =
                                lastnamebillingaddress;
                            document.getElementById("streetandnumbershippingaddress")
                                .innerHTML =
                                streetandnumberbillingaddress;
                            document.getElementById("zipcodesshippingaddress").innerHTML =
                                zipcodesbillingaddress;
                            document.getElementById("cityshippingaddress").innerHTML =
                                citybillingaddress;
                        }

                        var addresspayment = {
                            'firstName': firstnamebillingaddress,
                            'lastName': lastnamebillingaddress,
                            'street': streetandnumberbillingaddress,
                            'zipCode': zipcodesbillingaddress,
                            'city': citybillingaddress,
                            'country': returncountry(countrybillingaddress),
                            'email': emailaddressbillingaddress,
                            'phone': phonebillingaddress

                        }
                        console.log(addresspayment);
                        var difAddress = {

                        };
                        var addresssame = 0;
                        if (!status_dif_billing.checked) {
                            difAddress = addresspayment;
                            addresssame = 1;
                        } else {
                            difAddress = {
                                'firstName': firstnamedifferentaddress,
                                'lastName': lastnamedifferentaddress,
                                'street': streetandnumberdifferentaddress,
                                'zipCode': zipcodesdifferentaddress,
                                'city': citydifferentaddress,
                                'country': returncountry(countrydifferentaddress),
                                'email': emaildifferentaddress,
                                'phone': phonedifferentaddress
                            }
                            addresssame = 0;
                        }
                        console.log(difAddress);
                        var dataOrder = {
                            type: "Incomplete",
                            status: 2,
                            delivery_cost: Number($("#delivery_cost").text()),
                            discount: Number($("#discount").text()),
                            address: addresspayment,
                            addressBill: difAddress,
                            addresssame: addresssame,
                            vat: Number($("#IdVAT_included-InStep3").text()),
                            total_cost: Number($("#AllToInCheckoutSubtotalStep3").text()),
                            net_cost: Number($("#AllToInCheckoutWithVAT-InStep3").text()),
                            subtotal: Number($("#subtotalForOrderEmail").text()),
                            items: $("#valOfSale").val(),
                            saleId: $("#idOfSale").val(),
                            paymentType: paymentType
                        };
                      
                        $.ajax({
                            type: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                                    'content')
                            },
                            url: '<?php echo url('sales/online_order'); ?>',
                            data: dataOrder,
                            beforeSend: function() {
                                    // Show the spinner before the AJAX request is sent
                                    $("#image_loader").show();
                                    console.log("2")

                                },
                            success: function(msg) {
                                console.log(msg);
                                $("#image_loader").hide();
                                $.ajax({
                                    type: 'POST',
                                    headers: {
                                        'X-CSRF-TOKEN': $(
                                                'meta[name="csrf-token"]')
                                            .attr(
                                                'content')
                                    },
                                    url: '<?php echo url('email/customerEmailOrder'); ?>',
                                    data: dataOrder,
                                    beforeSend: function() {
                                        // Show the spinner before the AJAX request is sent
                                        $("#image_loader").show();
                                    },
                                    success: function(msg) {
                                        console.log(msg);
                                        $("#image_loader").hide();
                                        // location.href = "/success-save"
                                        $('a[href="#next"]').trigger('click');
                                    }
                                });


                            }
                        });
                    });
                },

                onCancel: function(data, actions) {
                    console.log(data);
                }

            }, '#paypal-button-container');

          


                        $('.steps ul li:nth-child(4) a img').attr('src', '/uploads/images/g44.svg');
                        var sample = document.getElementById("figcaptionid4"); // using VAR
                        // change css style
                        sample.style.color = '#ffffff'; // Changes color, adds style property.

                        $('.steps ul li:nth-child(3) a img').attr('src',
                            '/uploads/images/step-activenew.svg');
                        var sample = document.getElementById("figcaptionid3"); // using VAR
                        // change css style
                        sample.style.color = '#ffffff'; // Changes color, adds style property.

                        $('.steps ul li:nth-child(2) a img').attr('src',
                            '/uploads/images/step-activenew.svg');
                        var sample = document.getElementById("figcaptionid2"); // using VAR
                        // change css style
                        sample.style.color = '#ffffff'; // Changes color, adds style property.


                        $('.steps ul li:first-child a img').attr('src',
                            '/uploads/images/step-activenew.svg');
                        var sample = document.getElementById("figcaptionid1"); // using VAR
                        // change css style
                        sample.style.color = '#ffffff'; // Changes color, adds style property.

                    } else {

                        $('.steps ul li:nth-child(4) a img').attr('src', '/uploads/images/step44.svg');
                        var sample = document.getElementById("figcaptionid4"); // using VAR
                        // change css style
                        sample.style.color = '#3a9943'; // Changes color, adds style property.


                    }
                    ///////////
                    if (newIndex === 4) {
                        $('a[href="#next"]').show();
                        $('#wizard-t-3, #wizard-t-2, #wizard-t-1, #wizard-t-0').off('click');
                       
                        $('.steps ul li:last-child a img').attr('src', '/uploads/images/g55.svg');
                        $('.actions ul').addClass('step-6');
                        var sample = document.getElementById("figcaptionid7"); // using VAR
                        // change css style
                        sample.style.color = '#ffffff'; // Changes color, adds style property.

                        // $('.steps ul li:nth-child(6) img').attr('src', '/uploads/images/step-active.svg');
                        // var sample = document.getElementById("figcaptionid6"); // using VAR
                        // // change css style
                        // sample.style.color = '#ffffff'; // Changes color, adds style property.

                        // $('.steps ul li:nth-child(5) a img').attr('src', '/uploads/images/step-active.svg');
                        // var sample = document.getElementById("figcaptionid5"); // using VAR
                        // // change css style
                        // sample.style.color = '#ffffff'; // Changes color, adds style property.

                        $('.steps ul li:nth-child(4) a img').attr('src',
                            '/uploads/images/step-activenew.svg');
                        var sample = document.getElementById("figcaptionid4"); // using VAR
                        // change css style
                        sample.style.color = '#ffffff'; // Changes color, adds style property.

                        $('.steps ul li:nth-child(3) a img').attr('src',
                            '/uploads/images/step-activenew.svg');
                        var sample = document.getElementById("figcaptionid3"); // using VAR
                        // change css style
                        sample.style.color = '#ffffff'; // Changes color, adds style property.

                        $('.steps ul li:nth-child(2) a img').attr('src',
                            '/uploads/images/step-activenew.svg');
                        var sample = document.getElementById("figcaptionid2"); // using VAR
                        // change css style
                        sample.style.color = '#ffffff'; // Changes color, adds style property.


                        $('.steps ul li:first-child a img').attr('src',
                            '/uploads/images/step11-activen.svg');
                        var sample = document.getElementById("figcaptionid1"); // using VAR
                        // change css style
                        sample.style.color = '#ffffff'; // Changes color, adds style property.

                        // $('a[href="#finish"]').on('click', function(event) {
                        //     event.preventDefault();

                        //     // Redirect to the home page
                        //     window.location.href = '/';
                        // });
                            $('a[href="#finish"]').hide();

                    } else {
                        $('.steps ul li:last-child a img').attr('src', '/uploads/images/step55.svg');
                        $('.actions ul').removeClass('step-6');
                        var sample = document.getElementById("figcaptionid7"); // using VAR
                        // change css style
                        sample.style.color = '#3a9943'; // Changes color, adds style property.
                    }


                    ///////////////////////
                    var errorCount = $("#wizard").find('.errorvalidate').length;
                    console.log("errorCount" + errorCount);
                    // If there are errors, scroll to the first error
                    if (errorCount > 0) {
                        var firstError = $("#wizard").find('.errorvalidate:first');
                        var errorPosition = firstError.offset().top - $(window).height() / 2;
                        $('html, body').animate({
                            scrollTop: errorPosition
                        }, 500);
                        firstError.focus();
                    }

                    return true;
                }
            });
            // var x, y, i, valid = true;
            // x = document.getElementsByClassName("tab");
            // y = x[currentTab].getElementsByTagName("input");
            // // A loop that checks every input field in the current tab:
            // for (i = 0; i < y.length; i++) {
            //     // If a field is empty...
            //     if (y[i].value == "") {
            //         // add an "invalid" class to the field:
            //         y[i].className += " invalid";
            //         // and set the current valid status to false:
            //         valid = false;
            //     }
            // }
            function selectvalidateField(classNameOfselect) {
                var allFields = document.getElementById(classNameOfselect);
                if (allFields.value == 100) {
                    return false;
                } else {
                    //alert('Max 3 digits are allowed!'); // you can write your own logic to warn users 
                    return true;
                }

            }

            function ValidateField(classNameOfField) {
                var allFields = document.getElementsByClassName(classNameOfField);
                for (i = 0; i <= allFields.length; i++) {
                    if (allFields[i].value == "") {
                        return false;
                    } else {
                        //alert('Max 3 digits are allowed!'); // you can write your own logic to warn users 
                        return true;

                    }
                }
            }


            $('.wizard > .steps li a').click(function() {
                $(this).parent().addClass('checked');
                $(this).parent().prevAll().addClass('checked');
                $(this).parent().nextAll().removeClass('checked');
            });
            $('.forward').click(function() {
                $("#wizardcheckout").steps('next');
            })
            $('.backward').click(function() {
                $("#wizardcheckout").steps('previous');
            })
            $('.password i').click(function() {
                if ($('.password input').attr('type') === 'password') {
                    $(this).next().attr('type', 'text');
                } else {
                    $('.password input').attr('type', 'password');
                }
            })
            @if (app()->getLocale() == 'de')
                $('.steps ul li:first-child').find('a').append(
                    '<img class="imgstep1Checkout" src="/uploads/images/g11.svg" alt=" ">   <figcaption id="figcaptionid1" class="figcaptionid1Custom">\@lang('site.contact_details')\</figcaption> '
                );
                $('.steps ul li:nth-child(2)').find('a').append(
                    '<img class="imgstep2Checkout"  src="/uploads/images/step22.svg" alt="">  <figcaption  id="figcaptionid2" class="figcaptionid2Custom">\@lang('site.payment_and_delivery')\  </figcaption>'
                );
                $('.steps ul li:nth-child(3)').find('a').append(
                    '<img class="imgstep3Checkout"  src="/uploads/images/step33.svg" alt="">  <figcaption  id="figcaptionid3" class="figcaptionid3Custom" > \@lang('site.confirmation_of_the_order')\  </figcaption>'
                );
                $('.steps ul li:nth-child(4)').find('a').append(
                    '<img class="imgstep4Checkout"  src="/uploads/images/step44.svg" alt="">  <figcaption  id="figcaptionid4"  class="figcaptionid4Custom">\@lang('site.proceed_to_payment')\</figcaption>'
                );
                $('.steps ul li:last-child a').append(
                    '<img class="imgstep7Checkout"  src="/uploads/images/step55.svg" alt=""> <figcaption  id="figcaptionid7"  class="figcaptionid7Custom" > \@lang('site.payment_process')\  </figcaption>'
                );
            @else
                $('.steps ul li:first-child').find('a').append(
                    '<img style="width: 380px;" src="/uploads/images/g11.svg" alt=" ">   <figcaption id="figcaptionid1"  class="figcaptionid1CustomAr">\@lang('site.contact_details')\</figcaption> '
                );
                $('.steps ul li:nth-child(2)').find('a').append(
                    '<img style="width: 380px;" src="/uploads/images/step22.svg" alt="">  <figcaption  id="figcaptionid2" class="figcaptionid2CustomAr">\@lang('site.payment_and_delivery')\  </figcaption>'
                );
                $('.steps ul li:nth-child(3)').find('a').append(
                    '<img style="width: 380px;" src="/uploads/images/step33.svg" alt="">  <figcaption  id="figcaptionid3" class="figcaptionid3CustomAr"> \@lang('site.confirmation_of_the_order')\  </figcaption>'
                );
                $('.steps ul li:nth-child(4)').find('a').append(
                    '<img style="width: 380px;" src="/uploads/images/step44.svg" alt="">  <figcaption  id="figcaptionid4" class="figcaptionid4CustomAr" >\@lang('site.proceed_to_payment')\</figcaption>'
                );
                $('.steps ul li:last-child a').append(
                    '<img style="width: 380px;" src="/uploads/images/step55.svg" alt=""> <figcaption  id="figcaptionid7" class="figcaptionid7CustomAr"> \@lang('site.payment_process')\  </figcaption>'
                );
            @endif


            $(".quantity span").on("click", function() {
                var $button = $(this);
                var oldValue = $button.parent().find("input").val();
                if ($button.hasClass('plus')) {
                    var newVal = parseFloat(oldValue) + 1;
                } else {
                    if (oldValue > 0) {
                        var newVal = parseFloat(oldValue) - 1;
                    } else {
                        newVal = 0;
                    }
                }
                $button.parent().find("input").val(newVal);
            });

        })


        function switchVisible() {
            // document.getElementById("wizard-p-0").innerHTML = "new content"
            // $("#wizard-p-0").remove();
            // $("#wizard-h-0").remove();

            $('.actions > ul > li:first-child').attr('style', 'display:none');
            $('.actions > ul > li:first-child').next().attr('style', 'display:block');

            document.getElementById("wizard-p-0").innerHTML = '';
            document.getElementById("wizard-p-0").innerHTML = ` 
        
        <div class="page-section" style="margin-bottom: -40px;">
                            <div class="container">
                                <div class="row">
                                    <h4 style="text-transform: capitalize; font-weight: 600; font-family: Tajawal;  font-size: 24px; color: #0f1b30; margin-top: 51px; margin-bottom: 50px;  text-align: center;"> @lang('site.please_enter_your_details')</h4>

                                    <div class="col-sm-12 col-md-12 col-xs-12 col-lg-6 mb-30">
                                        <!-- Login Form s-->
                                        <div style="text-align: center;">
                                        <span style=" font-family: Tajawal; font-size: 21px;   color: #0f1b30;">
                                            <font style="vertical-align: inherit;">
                                                <font style="vertical-align: inherit;">\@lang('site.billing_delivery_address')\ </font>
                                            </font>
                                        </span>
                                        </div>
                                        <form id="needsvalidationlogintest"   action="#" style="padding: 17px;" novalidate>

                                            <div  class="login-form">

                                                <div class="section-titlelogin ">
                                                    <h2 style="display: flex; align-items: center; padding-bottom: 5px; color: #1e6f2f;">

                                                        <svg version="1.1" id="Layer_4" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 500 500" style="width: 8%; margin-left: 14px; enable-background:new 0 0 500 500;" xml:space="preserve">
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
                                                        \@lang('site.private_citizen')\
                                                      
                                                    </h2>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12 col-12 mb-10 inputspangroup" style="margin-top: 27px;">
                                                        <label hidden class="" id="labelfirstname">\@lang('site.first_name')\</label>
                                                        <input id="firstname"   class="form-control mb-0 firstnamevalidate" type="text"  placeholder="\@lang('site.first_name')\" name="firstname" required data-validate="min_length[3]|max_length[20]">
                                                        <span id="errorforfirsnamecustoum"></span>
                                                    </div>
                                                    <div class="col-md-12 col-12 mb-10 inputspangroup">
                                                        <label hidden id="labellastname">\@lang('site.last_name')\</label>
                                                        <input  type="text" class="form-control mb-0 lastnamevalidateForCheckout" id="lastnameForCheckout"  placeholder="\@lang('site.last_name')\" required>
                                                        <span id="errorforlastnamecustoum"></span>
                                                    </div>
                                                    <div class="col-md-12 col-12 mb-10 inputspangroup">
                                                        <label hidden id="labelstreetandnumber">Street and number</label>
                                                        <input id="streetandnumber" class="form-control mb-0 streetandnumbervalidate" type="text" placeholder="\@lang('site.street_and_number')\" style="width: 90%;">
                                                        <span id="errorforstreetandnumbercustoum"></span>
                                                    </div>

                                                    <div class="col-md-12 col-12 mb-10 inputspangroup">
                                                        <label hidden id="labelzipcodes">\@lang('site.zip_codes')\</label>
                                                        <input id="zipcodes" class="form-control mb-0 zipcodesvalidate" type="text" placeholder="\@lang('site.zip_codes')\">
                                                        <span id="errorforzipcodescustoum"></span>
                                                    </div>
                                                    <div class="col-md-12 col-12 mb-10 inputspangroup">
                                                        <label hidden id="labelcity">\@lang('site.city')\</label>
                                                        <input id="city" class="mb-0 form-control  cityvalidate" required type="text" placeholder="\@lang('site.city')\">
                                                        <span id="errorforcitycustoum"></span>
                                                    </div>

                                                    <div class="col-md-12 col-12  mb-10">
                                                        <label hidden class="" id="labelcountry">\@lang('site.country')\</label>

                                                        <select class="form-control countryvalidate" id="country"  onchange="copyTextValuecountry()" style="width: 90%;">
                                                        <option value="100">
                                                                <font style="vertical-align: inherit;">
                                                                    <font style="vertical-align: inherit;">@lang('site.country')</font>
                                                                </font>
                                                            </option>

                                                            <option  value="1">
                                                                <font style="vertical-align: inherit;">
                                                                    <font style="vertical-align: inherit;"> @lang('site.Germany')</font>
                                                                </font> 
                                                            </option>
                                                            <option value="2">
                                                                <font style="vertical-align: inherit;">
                                                                    <font style="vertical-align: inherit;"> @lang('site.Andorra')</font>
                                                                </font>
                                                            </option>
                                                            <option value="3">
                                                                <font style="vertical-align: inherit;">
                                                                    <font style="vertical-align: inherit;"> @lang('site.Belgium')</font>
                                                                </font>
                                                            </option>
                                                            <option value="4">
                                                                <font style="vertical-align: inherit;">
                                                                    <font style="vertical-align: inherit;"> @lang('site.Bulgaria')</font>
                                                                </font> 
                                                            </option>
                                                            <option value="5">
                                                                <font style="vertical-align: inherit;">
                                                                    <font style="vertical-align: inherit;"> @lang('site.Denmark')</font>
                                                                </font>
                                                            </option>
                                                            <option value="6">
                                                                <font style="vertical-align: inherit;">
                                                                    <font style="vertical-align: inherit;"> @lang('site.England')</font>
                                                                </font>
                                                            </option>
                                                            <option value="7">
                                                                <font style="vertical-align: inherit;">
                                                                    <font style="vertical-align: inherit;"> @lang('site.Estonia')</font>
                                                                </font> 
                                                            </option>
                                                            <option value="8">
                                                                <font style="vertical-align: inherit;">
                                                                    <font style="vertical-align: inherit;"> @lang('site.France')</font>
                                                                </font> 
                                                            </option>
                                                            <option value="9">
                                                                <font style="vertical-align: inherit;">
                                                                    <font style="vertical-align: inherit;"> @lang('site.Ireland')</font>
                                                                </font> 
                                                            </option>
                                                            <option value="10">
                                                                <font style="vertical-align: inherit;">
                                                                    <font style="vertical-align: inherit;"> @lang('site.Italy')</font>
                                                                </font> 
                                                            </option> 
                                                            <option value="11">
                                                                <font style="vertical-align: inherit;">
                                                                    <font style="vertical-align: inherit;"> @lang('site.Latvia')</font>
                                                                </font> 
                                                            </option>
                                                            <option value="12">
                                                                <font style="vertical-align: inherit;">
                                                                    <font style="vertical-align: inherit;">@lang('site.Liechtenstein')</font>
                                                                </font> 
                                                            </option>
                                                            <option value="13">
                                                                <font style="vertical-align: inherit;">
                                                                    <font style="vertical-align: inherit;">@lang('site.Lithuania')</font>
                                                                </font>
                                                            </option>
                                                            <option value="14">
                                                                <font style="vertical-align: inherit;">
                                                                    <font style="vertical-align: inherit;">@lang('site.Luxembourg')</font>
                                                                </font>
                                                            </option>
                                                            <option value="15">
                                                                <font style="vertical-align: inherit;">
                                                                    <font style="vertical-align: inherit;">@lang('site.Monaco')</font>
                                                                </font>
                                                            </option>
                                                            <option value="16">
                                                                <font style="vertical-align: inherit;">
                                                                    <font style="vertical-align: inherit;">@lang('site.Holland')</font>
                                                                </font>
                                                            </option>
                                                            <option value="17">
                                                                <font style="vertical-align: inherit;">
                                                                    <font style="vertical-align: inherit;"> @lang('site.Norway')</font>
                                                                </font>
                                                            </option>
                                                            <option value="18">
                                                                <font style="vertical-align: inherit;">
                                                                    <font style="vertical-align: inherit;"> @lang('site.Austria')</font>
                                                                </font>
                                                            </option>
                                                            <option value="19">
                                                                <font style="vertical-align: inherit;">
                                                                    <font style="vertical-align: inherit;"> @lang('site.Poland')</font>
                                                                </font>
                                                            </option>
                                                            <option value="20">
                                                                <font style="vertical-align: inherit;">
                                                                    <font style="vertical-align: inherit;"> @lang('site.Sweden')</font>
                                                                </font>
                                                            </option>
                                                            <option value="21">
                                                                <font style="vertical-align: inherit;">
                                                                    <font style="vertical-align: inherit;"> @lang('site.Switzerland')</font>
                                                                </font>
                                                            </option>
                                                            <option value="22">
                                                                <font style="vertical-align: inherit;">
                                                                    <font style="vertical-align: inherit;"> @lang('site.Slovakia')</font>
                                                                </font>
                                                            </option>
                                                            <option value="23">
                                                                <font style="vertical-align: inherit;">
                                                                    <font style="vertical-align: inherit;"> @lang('site.Spain')</font>
                                                                </font> 
                                                            </option>
                                                            <option value="24">
                                                                <font style="vertical-align: inherit;">
                                                                    <font style="vertical-align: inherit;">@lang('site.Czech')</font>
                                                                </font> 
                                                            </option>
                                                            <option value="25">
                                                                <font style="vertical-align: inherit;">
                                                                    <font style="vertical-align: inherit;"> @lang('site.Hungary')</font>
                                                                </font>
                                                            </option>
                                                        </select>
                                                    </div>

                                                    <div class="col-md-12 col-12  mb-10 inputspangroup">
                                                        <label hidden id="labelemailaddress">\@lang('site.email')\</label>
                                                        <input id="emailaddress" class="form-control mb-0 emailaddressvalidate" type="email" placeholder="\@lang('site.email')\">
                                                        <span id="errorforemailaddresscustoum"></span>
                                                    </div>
                                                    <div class="col-md-12 col-12  mb-10 inputspangroup">
                                                        <label hidden id="labelphone">\@lang('site.phone')\</label>
                                                        <input id="phone" class="form-control mb-0 phonevalidate" type="phone" placeholder="\@lang('site.phone')\">
                                                        <span id="errorphonecustoum"></span>

                                                    </div>
                                                </div>



                                            </div>


                                        </form>
                                    </div>

                                    <div class="col-sm-12 col-md-12 col-lg-6 col-xs-12">
                                        <div class="form-check" style="display: flex; align-items: flex-end; justify-content: center;">
                                            <input class="form-check-input" type="checkbox" value="" name="checkboxforenabledefrentaddres" id="checkboxforenabledefrentaddres" onclick="enabledifferentaddress()"  style=" margin: 0px 6px; padding: 10px 5px 10px 14px;">
                                            <font style=" font-family: Tajawal; font-size: 21px;   color: #0f1b30;">
                                                <font style="vertical-align: inherit;">\@lang('site.differing_shipping_address')\</font>
                                            </font>
                                        </div>

                                        <form action="#" style="padding: 17px;">

                                            <div class="login-form">

                                                <div class="section-titlelogin ">
                                                    <h2 style="display: flex; align-items: center; padding-bottom: 5px; color: #1e6f2f;">
                                                        <svg version="1.1" id="Layer_4" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 500 500" style="width: 8%; margin-left: 14px; enable-background:new 0 0 500 500;" xml:space="preserve">
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
                                                        \@lang('site.private_citizen')\
                                                    </h2>
                                                </div>
                                                <div class="row disable_section" id="detailsdefrentaddres">
                                                    <div class="col-md-12 col-12 mb-10 inputspangroup" style="margin-top: 27px;">
                                                        <label hidden id="labelfirstnamedifferentaddress">\@lang('site.first_name')\</label>
                                                        <input class="form-control mb-0 firstnamevalidatedifferentaddress" type="text"   id="firstnamedifferentaddress" placeholder="\@lang('site.first_name')\">
                                                        <span id="errorfirstnamedifferentaddresscustoum"></span>
                                                    </div>
                                                    <div class="col-md-12 col-12 mb-10 inputspangroup">
                                                        <label hidden id="labellastnamedifferentaddress" >\@lang('site.last_name')\</label>
                                                        <input class="form-control mb-0 lastnamedifferentaddress" type="text"  id="lastnamedifferentaddress" placeholder="\@lang('site.last_name')\">
                                                        <span id="errorlastnamedifferentaddresscustoum"></span>
                                                    </div>
                                                    <div class="col-md-12 col-12  mb-10 inputspangroup" >
                                                        <label hidden id="labelstreetandnumberdifferentaddress">\@lang('site.street_and_number')\</label>
                                                        <input class="form-control mb-0 streetandnumberdifferentaddress" type="text"   name="streetandnumber" id="streetandnumberdifferentaddress" placeholder="\@lang('site.street_and_number')\" style="width: 90%;">
                                                        <span id="errorstreetandnumberdifferentaddresscustoum"></span>
                                                    </div>

                                                    <div class="col-md-12 col-12 mb-10 inputspangroup">
                                                        <label hidden id="labelzipcodesdifferentaddress">\@lang('site.zip_codes')\</label>
                                                        <input class="form-control mb-0 zipcodesdifferentaddress" type="text"   name="zipcodes" id="zipcodesdifferentaddress" placeholder="\@lang('site.zip_codes')\">
                                                        <span id="errorzipcodesdifferentaddresscustoum"></span>

                                                    </div>
                                                    <div class="col-md-12 col-12 mb-10 inputspangroup">
                                                        <label hidden id="labelcitydifferentaddress">\@lang('site.city')\</label>
                                                        <input class="form-control mb-0 citydifferentaddress" type="text"   name="city" id="citydifferentaddress" placeholder="\@lang('site.city')\">
                                                        <span id="errorcitydifferentaddresscustoum"></span>

                                                    </div>

                                                    <div class="col-md-12 col-12 mb-10">
                                                        <label hidden class="" id="labelcountrydifferentaddress">\@lang('site.country')\</label>
                                                        <select class="form-control" name="country" id="countrydifferentaddress" onchange="copyTextValuecountrydifferentaddress()"  style="width: 80%;">
                                                        <option value="100">
                                                                <font style="vertical-align: inherit;">
                                                                    <font style="vertical-align: inherit;">@lang('site.country')</font>
                                                                </font>
                                                            </option>

                                                            <option  value="1">
                                                                <font style="vertical-align: inherit;">
                                                                    <font style="vertical-align: inherit;"> @lang('site.Germany')</font>
                                                                </font> 
                                                            </option>
                                                            <option value="2">
                                                                <font style="vertical-align: inherit;">
                                                                    <font style="vertical-align: inherit;"> @lang('site.Andorra')</font>
                                                                </font>
                                                            </option>
                                                            <option value="3">
                                                                <font style="vertical-align: inherit;">
                                                                    <font style="vertical-align: inherit;"> @lang('site.Belgium')</font>
                                                                </font>
                                                            </option>
                                                            <option value="4">
                                                                <font style="vertical-align: inherit;">
                                                                    <font style="vertical-align: inherit;"> @lang('site.Bulgaria')</font>
                                                                </font> 
                                                            </option>
                                                            <option value="5">
                                                                <font style="vertical-align: inherit;">
                                                                    <font style="vertical-align: inherit;"> @lang('site.Denmark')</font>
                                                                </font>
                                                            </option>
                                                            <option value="6">
                                                                <font style="vertical-align: inherit;">
                                                                    <font style="vertical-align: inherit;"> @lang('site.England')</font>
                                                                </font>
                                                            </option>
                                                            <option value="7">
                                                                <font style="vertical-align: inherit;">
                                                                    <font style="vertical-align: inherit;"> @lang('site.Estonia')</font>
                                                                </font> 
                                                            </option>
                                                            <option value="8">
                                                                <font style="vertical-align: inherit;">
                                                                    <font style="vertical-align: inherit;"> @lang('site.France')</font>
                                                                </font> 
                                                            </option>
                                                            <option value="9">
                                                                <font style="vertical-align: inherit;">
                                                                    <font style="vertical-align: inherit;"> @lang('site.Ireland')</font>
                                                                </font> 
                                                            </option>
                                                            <option value="10">
                                                                <font style="vertical-align: inherit;">
                                                                    <font style="vertical-align: inherit;"> @lang('site.Italy')</font>
                                                                </font> 
                                                            </option> 
                                                            <option value="11">
                                                                <font style="vertical-align: inherit;">
                                                                    <font style="vertical-align: inherit;"> @lang('site.Latvia')</font>
                                                                </font> 
                                                            </option>
                                                            <option value="12">
                                                                <font style="vertical-align: inherit;">
                                                                    <font style="vertical-align: inherit;">@lang('site.Liechtenstein')</font>
                                                                </font> 
                                                            </option>
                                                            <option value="13">
                                                                <font style="vertical-align: inherit;">
                                                                    <font style="vertical-align: inherit;">@lang('site.Lithuania')</font>
                                                                </font>
                                                            </option>
                                                            <option value="14">
                                                                <font style="vertical-align: inherit;">
                                                                    <font style="vertical-align: inherit;">@lang('site.Luxembourg')</font>
                                                                </font>
                                                            </option>
                                                            <option value="15">
                                                                <font style="vertical-align: inherit;">
                                                                    <font style="vertical-align: inherit;">@lang('site.Monaco')</font>
                                                                </font>
                                                            </option>
                                                            <option value="16">
                                                                <font style="vertical-align: inherit;">
                                                                    <font style="vertical-align: inherit;">@lang('site.Holland')</font>
                                                                </font>
                                                            </option>
                                                            <option value="17">
                                                                <font style="vertical-align: inherit;">
                                                                    <font style="vertical-align: inherit;"> @lang('site.Norway')</font>
                                                                </font>
                                                            </option>
                                                            <option value="18">
                                                                <font style="vertical-align: inherit;">
                                                                    <font style="vertical-align: inherit;"> @lang('site.Austria')</font>
                                                                </font>
                                                            </option>
                                                            <option value="19">
                                                                <font style="vertical-align: inherit;">
                                                                    <font style="vertical-align: inherit;"> @lang('site.Poland')</font>
                                                                </font>
                                                            </option>
                                                            <option value="20">
                                                                <font style="vertical-align: inherit;">
                                                                    <font style="vertical-align: inherit;"> @lang('site.Sweden')</font>
                                                                </font>
                                                            </option>
                                                            <option value="21">
                                                                <font style="vertical-align: inherit;">
                                                                    <font style="vertical-align: inherit;"> @lang('site.Switzerland')</font>
                                                                </font>
                                                            </option>
                                                            <option value="22">
                                                                <font style="vertical-align: inherit;">
                                                                    <font style="vertical-align: inherit;"> @lang('site.Slovakia')</font>
                                                                </font>
                                                            </option>
                                                            <option value="23">
                                                                <font style="vertical-align: inherit;">
                                                                    <font style="vertical-align: inherit;"> @lang('site.Spain')</font>
                                                                </font> 
                                                            </option>
                                                            <option value="24">
                                                                <font style="vertical-align: inherit;">
                                                                    <font style="vertical-align: inherit;">@lang('site.Czech')</font>
                                                                </font> 
                                                            </option>
                                                            <option value="25">
                                                                <font style="vertical-align: inherit;">
                                                                    <font style="vertical-align: inherit;"> @lang('site.Hungary')</font>
                                                                </font>
                                                            </option>
                                                        </select>
                                                    </div>

                                                    <div class="col-md-12 col-12 mb-10 inputspangroup">
                                                        <label hidden id="labelemaildifferentaddress">\@lang('site.email')\</label>
                                                        <input class="form-control mb-0 emaildifferentaddress" type="email"   name="email" id="emaildifferentaddress" placeholder="\@lang('site.email')\">
                                                        <span id="erroremaildifferentaddresscustoum"></span>

                                                    </div>
                                                    <div class="col-md-12 col-12 mb-10 inputspangroup">
                                                        <label hidden id="labelphonedifferentaddress">\@lang('site.phone')\</label>
                                                        <input class="form-control mb-0 phonedifferentaddress" type="phone"  name="phone" id="phonedifferentaddress" placeholder="\@lang('site.phone')\">
                                                        <span id="errorphonedifferentaddresscustoum"></span>

                                                    </div>
                                                </div>
                                            </div>

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>


        
       
        
        
        `;


        }
    </script>
    <script>
        document.getElementById("detailsdefrentaddres").classList.add('disable_section')

        function enabledifferentaddress() {
            if (document.getElementById("checkboxforenabledefrentaddres").checked) {
                document.getElementById("detailsdefrentaddres").classList.remove('disable_section')

            } else {
                document.getElementById("detailsdefrentaddres").classList.add('disable_section')
            }
        }


        function copyTextValuecountry() {

            var e = document.getElementById("country");
            var val = e.value;
            if (val == 1) {
                val = "@lang('site.Germany')";
                var list = document.getElementsByClassName('CountryBillingdeliveryaddress');
                var n;
                for (n = 0; n < list.length; ++n) {
                    list[n].innerHTML = val;
                }


            }
            if (val == 2) {
                val = "@lang('site.Andorra')";
                var list = document.getElementsByClassName('CountryBillingdeliveryaddress');
                var n;
                for (n = 0; n < list.length; ++n) {
                    list[n].innerHTML = val;
                }
            }
            if (val == 3) {
                val = "@lang('site.Belgium')";
                var list = document.getElementsByClassName('CountryBillingdeliveryaddress');
                var n;
                for (n = 0; n < list.length; ++n) {
                    list[n].innerHTML = val;
                }
            }
            if (val == 4) {
                val = "@lang('site.Bulgaria')";
                var list = document.getElementsByClassName('CountryBillingdeliveryaddress');
                var n;
                for (n = 0; n < list.length; ++n) {
                    list[n].innerHTML = val;
                }
            }
            if (val == 5) {
                val = " @lang('site.Denmark')";
                var list = document.getElementsByClassName('CountryBillingdeliveryaddress');
                var n;
                for (n = 0; n < list.length; ++n) {
                    list[n].innerHTML = val;
                }
            }
            if (val == 6) {
                val = "@lang('site.England')";
                var list = document.getElementsByClassName('CountryBillingdeliveryaddress');
                var n;
                for (n = 0; n < list.length; ++n) {
                    list[n].innerHTML = val;
                }
            }
            if (val == 7) {
                val = "@lang('site.Estonia')";
                var list = document.getElementsByClassName('CountryBillingdeliveryaddress');
                var n;
                for (n = 0; n < list.length; ++n) {
                    list[n].innerHTML = val;
                }
            }
            if (val == 8) {
                val = "@lang('site.France')";
                var list = document.getElementsByClassName('CountryBillingdeliveryaddress');
                var n;
                for (n = 0; n < list.length; ++n) {
                    list[n].innerHTML = val;
                }
            }
            if (val == 9) {
                val = "@lang('site.Ireland')";
                var list = document.getElementsByClassName('CountryBillingdeliveryaddress');
                var n;
                for (n = 0; n < list.length; ++n) {
                    list[n].innerHTML = val;
                }
            }
            if (val == 10) {
                val = "@lang('site.Italy')";
                var list = document.getElementsByClassName('CountryBillingdeliveryaddress');
                var n;
                for (n = 0; n < list.length; ++n) {
                    list[n].innerHTML = val;
                }
            }
            if (val == 11) {
                val = "@lang('site.Latvia')";
                var list = document.getElementsByClassName('CountryBillingdeliveryaddress');
                var n;
                for (n = 0; n < list.length; ++n) {
                    list[n].innerHTML = val;
                }
            }

            if (val == 12) {
                val = "@lang('site.Liechtenstein')";
                var list = document.getElementsByClassName('CountryBillingdeliveryaddress');
                var n;
                for (n = 0; n < list.length; ++n) {
                    list[n].innerHTML = val;
                }
            }
            if (val == 13) {
                val = "@lang('site.Lithuania')";
                var list = document.getElementsByClassName('CountryBillingdeliveryaddress');
                var n;
                for (n = 0; n < list.length; ++n) {
                    list[n].innerHTML = val;
                }
            }
            if (val == 14) {
                val = "@lang('site.Luxembourg')";
                var list = document.getElementsByClassName('CountryBillingdeliveryaddress');
                var n;
                for (n = 0; n < list.length; ++n) {
                    list[n].innerHTML = val;
                }
            }
            if (val == 15) {
                val = "@lang('site.Monaco')";
                var list = document.getElementsByClassName('CountryBillingdeliveryaddress');
                var n;
                for (n = 0; n < list.length; ++n) {
                    list[n].innerHTML = val;
                }
            }
            if (val == 16) {
                val = "@lang('site.Holland')";
                var list = document.getElementsByClassName('CountryBillingdeliveryaddress');
                var n;
                for (n = 0; n < list.length; ++n) {
                    list[n].innerHTML = val;
                }
            }
            if (val == 17) {
                val = "@lang('site.Norway')";
                var list = document.getElementsByClassName('CountryBillingdeliveryaddress');
                var n;
                for (n = 0; n < list.length; ++n) {
                    list[n].innerHTML = val;
                }
            }
            if (val == 18) {
                val = "@lang('site.Austria')";
                var list = document.getElementsByClassName('CountryBillingdeliveryaddress');
                var n;
                for (n = 0; n < list.length; ++n) {
                    list[n].innerHTML = val;
                }
            }
            if (val == 19) {
                val = "@lang('site.Poland')";
                var list = document.getElementsByClassName('CountryBillingdeliveryaddress');
                var n;
                for (n = 0; n < list.length; ++n) {
                    list[n].innerHTML = val;
                }
            }
            if (val == 20) {
                val = "@lang('site.Sweden')";
                var list = document.getElementsByClassName('CountryBillingdeliveryaddress');
                var n;
                for (n = 0; n < list.length; ++n) {
                    list[n].innerHTML = val;
                }
            }
            if (val == 21) {
                val = "@lang('site.Switzerland')";
                var list = document.getElementsByClassName('CountryBillingdeliveryaddress');
                var n;
                for (n = 0; n < list.length; ++n) {
                    list[n].innerHTML = val;
                }
            }
            if (val == 22) {
                val = "@lang('site.Slovakia')";
                var list = document.getElementsByClassName('CountryBillingdeliveryaddress');
                var n;
                for (n = 0; n < list.length; ++n) {
                    list[n].innerHTML = val;
                }
            }
            if (val == 23) {
                val = "@lang('site.Spain')";
                var list = document.getElementsByClassName('CountryBillingdeliveryaddress');
                var n;
                for (n = 0; n < list.length; ++n) {
                    list[n].innerHTML = val;
                }
            }
            if (val == 24) {
                val = ">@lang('site.Czech')";
                var list = document.getElementsByClassName('CountryBillingdeliveryaddress');
                var n;
                for (n = 0; n < list.length; ++n) {
                    list[n].innerHTML = val;
                }
            }
            if (val == 25) {
                val = "@lang('site.Hungary')";
                var list = document.getElementsByClassName('CountryBillingdeliveryaddress');
                var n;
                for (n = 0; n < list.length; ++n) {
                    list[n].innerHTML = val;
                }
            }


        }

        function copyTextValuecountrydifferentaddress() {

            var e = document.getElementById("countrydifferentaddress");
            var val = e.value;
            if (val == 1) {
                val = "@lang('site.Germany')";

                var list = document.getElementsByClassName('Countrydifferentshippingaddress');
                var n;
                for (n = 0; n < list.length; ++n) {
                    list[n].innerHTML = val;
                }


            }
            if (val == 2) {
                val = "@lang('site.Andorra')";
                var list = document.getElementsByClassName('Countrydifferentshippingaddress');
                var n;
                for (n = 0; n < list.length; ++n) {
                    list[n].innerHTML = val;
                }
            }
            if (val == 3) {
                val = "@lang('site.Belgium')";
                var list = document.getElementsByClassName('Countrydifferentshippingaddress');
                var n;
                for (n = 0; n < list.length; ++n) {
                    list[n].innerHTML = val;
                }
            }
            if (val == 4) {
                val = "@lang('site.Bulgaria')";
                var list = document.getElementsByClassName('Countrydifferentshippingaddress');
                var n;
                for (n = 0; n < list.length; ++n) {
                    list[n].innerHTML = val;
                }
            }
            if (val == 5) {
                val = " @lang('site.Denmark')";
                var list = document.getElementsByClassName('Countrydifferentshippingaddress');
                var n;
                for (n = 0; n < list.length; ++n) {
                    list[n].innerHTML = val;
                }
            }
            if (val == 6) {
                val = "@lang('site.England')";
                var list = document.getElementsByClassName('Countrydifferentshippingaddress');
                var n;
                for (n = 0; n < list.length; ++n) {
                    list[n].innerHTML = val;
                }
            }
            if (val == 7) {
                val = "@lang('site.Estonia')";
                var list = document.getElementsByClassName('Countrydifferentshippingaddress');
                var n;
                for (n = 0; n < list.length; ++n) {
                    list[n].innerHTML = val;
                }
            }
            if (val == 8) {
                val = "@lang('site.France')";
                var list = document.getElementsByClassName('Countrydifferentshippingaddress');
                var n;
                for (n = 0; n < list.length; ++n) {
                    list[n].innerHTML = val;
                }
            }
            if (val == 9) {
                val = "@lang('site.Ireland')";
                var list = document.getElementsByClassName('Countrydifferentshippingaddress');
                var n;
                for (n = 0; n < list.length; ++n) {
                    list[n].innerHTML = val;
                }
            }
            if (val == 10) {
                val = "@lang('site.Italy')";
                var list = document.getElementsByClassName('Countrydifferentshippingaddress');
                var n;
                for (n = 0; n < list.length; ++n) {
                    list[n].innerHTML = val;
                }
            }
            if (val == 11) {
                val = "@lang('site.Latvia')";
                var list = document.getElementsByClassName('Countrydifferentshippingaddress');
                var n;
                for (n = 0; n < list.length; ++n) {
                    list[n].innerHTML = val;
                }
            }

            if (val == 12) {
                val = "@lang('site.Liechtenstein')";
                var list = document.getElementsByClassName('Countrydifferentshippingaddress');
                var n;
                for (n = 0; n < list.length; ++n) {
                    list[n].innerHTML = val;
                }
            }
            if (val == 13) {
                val = "@lang('site.Lithuania')";
                var list = document.getElementsByClassName('Countrydifferentshippingaddress');
                var n;
                for (n = 0; n < list.length; ++n) {
                    list[n].innerHTML = val;
                }
            }
            if (val == 14) {
                val = "@lang('site.Luxembourg')";
                var list = document.getElementsByClassName('Countrydifferentshippingaddress');
                var n;
                for (n = 0; n < list.length; ++n) {
                    list[n].innerHTML = val;
                }
            }
            if (val == 15) {
                val = "@lang('site.Monaco')";
                var list = document.getElementsByClassName('Countrydifferentshippingaddress');
                var n;
                for (n = 0; n < list.length; ++n) {
                    list[n].innerHTML = val;
                }
            }
            if (val == 16) {
                val = "@lang('site.Holland')";
                var list = document.getElementsByClassName('Countrydifferentshippingaddress');
                var n;
                for (n = 0; n < list.length; ++n) {
                    list[n].innerHTML = val;
                }
            }
            if (val == 17) {
                val = "@lang('site.Norway')";
                var list = document.getElementsByClassName('Countrydifferentshippingaddress');
                var n;
                for (n = 0; n < list.length; ++n) {
                    list[n].innerHTML = val;
                }
            }
            if (val == 18) {
                val = "@lang('site.Austria')";
                var list = document.getElementsByClassName('Countrydifferentshippingaddress');
                var n;
                for (n = 0; n < list.length; ++n) {
                    list[n].innerHTML = val;
                }
            }
            if (val == 19) {
                val = "@lang('site.Poland')";
                var list = document.getElementsByClassName('Countrydifferentshippingaddress');
                var n;
                for (n = 0; n < list.length; ++n) {
                    list[n].innerHTML = val;
                }
            }
            if (val == 20) {
                val = "@lang('site.Sweden')";
                var list = document.getElementsByClassName('Countrydifferentshippingaddress');
                var n;
                for (n = 0; n < list.length; ++n) {
                    list[n].innerHTML = val;
                }
            }
            if (val == 21) {
                val = "@lang('site.Switzerland')";
                var list = document.getElementsByClassName('Countrydifferentshippingaddress');
                var n;
                for (n = 0; n < list.length; ++n) {
                    list[n].innerHTML = val;
                }
            }
            if (val == 22) {
                val = "@lang('site.Slovakia')";
                var list = document.getElementsByClassName('Countrydifferentshippingaddress');
                var n;
                for (n = 0; n < list.length; ++n) {
                    list[n].innerHTML = val;
                }
            }
            if (val == 23) {
                val = "@lang('site.Spain')";
                var list = document.getElementsByClassName('Countrydifferentshippingaddress');
                var n;
                for (n = 0; n < list.length; ++n) {
                    list[n].innerHTML = val;
                }
            }
            if (val == 24) {
                val = ">@lang('site.Czech')";
                var list = document.getElementsByClassName('Countrydifferentshippingaddress');
                var n;
                for (n = 0; n < list.length; ++n) {
                    list[n].innerHTML = val;
                }
            }
            if (val == 25) {
                val = "@lang('site.Hungary')";
                var list = document.getElementsByClassName('Countrydifferentshippingaddress');
                var n;
                for (n = 0; n < list.length; ++n) {
                    list[n].innerHTML = val;
                }
            }
        }

        function returncountry(val) {

            if (val == 1) {
                val = "@lang('site.Germany')";
                return val;
            }
            if (val == 2) {
                val = "@lang('site.Andorra')";
                return val;
            }

            if (val == 3) {
                val = "@lang('site.Belgium')";
                return val;
            }

            if (val == 4) {
                val = "@lang('site.Bulgaria')";
                return val;
            }
            if (val == 5) {
                val = " @lang('site.Denmark')";
                return val;
            }
            if (val == 6) {
                val = "@lang('site.England')";
                return val;
            }
            if (val == 7) {
                val = "@lang('site.Estonia')";
                return val;
            }
            if (val == 8) {
                val = "@lang('site.France')";
                return val;
            }
            if (val == 9) {
                val = "@lang('site.Ireland')";
                return val;
            }
            if (val == 10) {
                val = "@lang('site.Italy')";
                return val;
            }
            if (val == 11) {
                val = "@lang('site.Latvia')";
                return val;
            }

            if (val == 12) {
                val = "@lang('site.Liechtenstein')";
                return val;
            }
            if (val == 13) {
                val = "@lang('site.Lithuania')";
                return val;
            }
            if (val == 14) {
                val = "@lang('site.Luxembourg')";
                return val;
            }
            if (val == 15) {
                val = "@lang('site.Monaco')";
                return val;
            }
            if (val == 16) {
                val = "@lang('site.Holland')";
                return val;
            }
            if (val == 17) {
                val = "@lang('site.Norway')";
                return val;
            }
            if (val == 18) {
                val = "@lang('site.Austria')";
                return val;
            }
            if (val == 19) {
                val = "@lang('site.Poland')";
                return val;
            }
            if (val == 20) {
                val = "@lang('site.Sweden')";
                return val;
            }
            if (val == 21) {
                val = "@lang('site.Switzerland')";
                return val;
            }
            if (val == 22) {
                val = "@lang('site.Slovakia')";
                return val;
            }
            if (val == 23) {
                val = "@lang('site.Spain')";
                return val;
            }
            if (val == 24) {
                val = ">@lang('site.Czech')";
                return val;
            }
            if (val == 25) {
                val = "@lang('site.Hungary')";
                return val;

            }
        }
    </script>
    <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>


    <script type="text/javascript" src="{{ asset('adminpanel/assets/new_frontend/js/dist/jbvalidator.min.js') }}"></script>
    <script>
        $(function() {
            $('form.needsvalidationlogin').jbvalidator({
                successClass: true,
                errorMessage: false
            });
            $(".needsvalidationlogintest").submit(function() {
                var errorCount = $(".needsvalidationlogintest").find('.is-invalid').length;
                console.log("errorCount" + errorCount);
                // If there are errors, scroll to the first error
                if (errorCount > 0) {
                    var firstError = $(".needsvalidationlogintest").find('.is-invalid:first');
                    var errorPosition = firstError.offset().top - $(window).height() / 2;
                    $('html, body').animate({
                        scrollTop: errorPosition
                    }, 500);
                    firstError.focus();
                }
            });

        });

    </script>



@endsection
