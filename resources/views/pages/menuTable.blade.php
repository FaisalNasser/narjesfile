@extends('frontend.app')

@section('content')
<script>
    window['Journal'] = {
        "isPopup": false,
        "isPhone": false,
        "isTablet": false,
        "isDesktop": true,
        "filterScrollTop": false,
        "filterUrlValuesSeparator": ",",
        "countdownDay": "Day",
        "countdownHour": "Hour",
        "countdownMin": "Min",
        "countdownSec": "Sec",
        "globalPageColumnLeftTabletStatus": false,
        "globalPageColumnRightTabletStatus": false,
        "scrollTop": true,
        "scrollToTop": false,
        "notificationHideAfter": "2000",
        "quickviewPageStyleCloudZoomStatus": true,
        "quickviewPageStyleAdditionalImagesCarousel": true,
        "quickviewPageStyleAdditionalImagesCarouselStyleSpeed": "1000",
        "quickviewPageStyleAdditionalImagesCarouselStyleAutoPlay": true,
        "quickviewPageStyleAdditionalImagesCarouselStylePauseOnHover": true,
        "quickviewPageStyleAdditionalImagesCarouselStyleDelay": "6000",
        "quickviewPageStyleAdditionalImagesCarouselStyleLoop": true,
        "quickviewPageStyleAdditionalImagesHeightAdjustment": "5",
        "quickviewPageStyleProductStockUpdate": false,
        "quickviewPageStylePriceUpdate": false,
        "quickviewPageStyleOptionsSelect": "none",
        "quickviewText": "Quickview",
        "mobileHeaderOn": "tablet",
        "subcategoriesCarouselStyleSpeed": "1000",
        "subcategoriesCarouselStyleAutoPlay": true,
        "subcategoriesCarouselStylePauseOnHover": true,
        "subcategoriesCarouselStyleDelay": "6000",
        "subcategoriesCarouselStyleLoop": true,
        "productPageStyleImageCarouselStyleSpeed": "500",
        "productPageStyleImageCarouselStyleAutoPlay": false,
        "productPageStyleImageCarouselStylePauseOnHover": true,
        "productPageStyleImageCarouselStyleDelay": "3000",
        "productPageStyleImageCarouselStyleLoop": false,
        "productPageStyleCloudZoomStatus": true,
        "productPageStyleCloudZoomPosition": "inner",
        "productPageStyleAdditionalImagesCarousel": false,
        "productPageStyleAdditionalImagesCarouselStyleSpeed": "500",
        "productPageStyleAdditionalImagesCarouselStyleAutoPlay": true,
        "productPageStyleAdditionalImagesCarouselStylePauseOnHover": true,
        "productPageStyleAdditionalImagesCarouselStyleDelay": "3000",
        "productPageStyleAdditionalImagesCarouselStyleLoop": false,
        "productPageStyleAdditionalImagesHeightAdjustment": "5",
        "productPageStyleProductStockUpdate": true,
        "productPageStylePriceUpdate": true,
        "productPageStyleOptionsSelect": "none",
        "infiniteScrollStatus": true,
        "infiniteScrollOffset": "4",
        "infiniteScrollLoadPrev": "Load Previous Products",
        "infiniteScrollLoadNext": "Load Next Products",
        "infiniteScrollLoading": "Loading...",
        "infiniteScrollNoneLeft": "You have reached the end of the list.",
        "headerHeight": "",
        "headerCompactHeight": "70",
        "mobileMenuOn": "",
        "searchStyleSearchAutoSuggestStatus": true,
        "searchStyleSearchAutoSuggestDescription": true,
        "searchStyleSearchAutoSuggestSubCategories": true,
        "headerMiniSearchDisplay": "page",
        "stickyStatus": true,
        "stickyFullHomePadding": false,
        "stickyFullwidth": true,
        "stickyAt": "",
        "stickyHeight": "40",
        "headerTopBarHeight": "30",
        "topBarStatus": true,
        "headerType": "compact",
        "headerMobileHeight": "65",
        "headerMobileStickyStatus": true,
        "headerMobileTopBarVisibility": true,
        "headerMobileTopBarHeight": "40",
        "notification": [{
            "m": 137,
            "c": "c58ab8a3"
        }],
        "columnsCount": 0
    };
</script>
<script>
    if (window.NodeList && !NodeList.prototype.forEach) {
        NodeList.prototype.forEach = Array.prototype.forEach;
    }
    (function() {
        if (Journal['isPhone']) {
            return;
        }
        var wrappers = ['search', 'cart', 'cart-content', 'logo', 'language', 'currency'];
        var documentClassList = document.documentElement.classList;

        function extractClassList() {
            return ['desktop', 'tablet', 'phone', 'desktop-header-active', 'mobile-header-active',
                'mobile-menu-active'
            ].filter(function(cls) {
                return documentClassList.contains(cls);
            });
        }

        function mqr(mqls, listener) {
            Object.keys(mqls).forEach(function(k) {
                mqls[k].addListener(listener);
            });
            listener();
        }

        function mobileMenu() {
            console.warn('mobile menu!');
            var element = document.querySelector('#main-menu');
            var wrapper = document.querySelector('.mobile-main-menu-wrapper');
            if (element && wrapper) {
                wrapper.appendChild(element);
            }
            var main_menu = document.querySelector('.main-menu');
            if (main_menu) {
                main_menu.classList.add('accordion-menu');
            }
            document.querySelectorAll('.main-menu .dropdown-toggle').forEach(function(element) {
                element.classList.remove('dropdown-toggle');
                element.classList.add('collapse-toggle');
                element.removeAttribute('data-toggle');
            });
            document.querySelectorAll('.main-menu .dropdown-menu').forEach(function(element) {
                element.classList.remove('dropdown-menu');
                element.classList.remove('j-dropdown');
                element.classList.add('collapse');
            });
        }

        function desktopMenu() {
            console.warn('desktop menu!');
            var element = document.querySelector('#main-menu');
            var wrapper = document.querySelector('.desktop-main-menu-wrapper');
            if (element && wrapper) {
                wrapper.insertBefore(element, document.querySelector('#main-menu-2'));
            }
            var main_menu = document.querySelector('.main-menu');
            if (main_menu) {
                main_menu.classList.remove('accordion-menu');
            }
            document.querySelectorAll('.main-menu .collapse-toggle').forEach(function(element) {
                element.classList.add('dropdown-toggle');
                element.classList.remove('collapse-toggle');
                element.setAttribute('data-toggle', 'dropdown');
            });
            document.querySelectorAll('.main-menu .collapse').forEach(function(element) {
                element.classList.add('dropdown-menu');
                element.classList.add('j-dropdown');
                element.classList.remove('collapse');
            });
            document.body.classList.remove('mobile-wrapper-open');
        }

        function mobileHeader() {
            console.warn('mobile header!');
            Object.keys(wrappers).forEach(function(k) {
                var element = document.querySelector('#' + wrappers[k]);
                var wrapper = document.querySelector('.mobile-' + wrappers[k] + '-wrapper');
                if (element && wrapper) {
                    wrapper.appendChild(element);
                }
                if (wrappers[k] === 'cart-content') {
                    if (element) {
                        element.classList.remove('j-dropdown');
                        element.classList.remove('dropdown-menu');
                    }
                }
            });
            var search = document.querySelector('#search');
            var cart = document.querySelector('#cart');
            if (search && (Journal['searchStyle'] === 'full')) {
                search.classList.remove('full-search');
                search.classList.add('mini-search');
            }
            if (cart && (Journal['cartStyle'] === 'full')) {
                cart.classList.remove('full-cart');
                cart.classList.add('mini-cart')
            }
        }

        function desktopHeader() {
            console.warn('desktop header!');
            Object.keys(wrappers).forEach(function(k) {
                var element = document.querySelector('#' + wrappers[k]);
                var wrapper = document.querySelector('.desktop-' + wrappers[k] + '-wrapper');
                if (wrappers[k] === 'cart-content') {
                    if (element) {
                        element.classList.add('j-dropdown');
                        element.classList.add('dropdown-menu');
                        document.querySelector('#cart').appendChild(element);
                    }
                } else {
                    if (element && wrapper) {
                        wrapper.appendChild(element);
                    }
                }
            });
            var search = document.querySelector('#search');
            var cart = document.querySelector('#cart');
            if (search && (Journal['searchStyle'] === 'full')) {
                search.classList.remove('mini-search');
                search.classList.add('full-search');
            }
            if (cart && (Journal['cartStyle'] === 'full')) {
                cart.classList.remove('mini-cart');
                cart.classList.add('full-cart');
            }
            documentClassList.remove('mobile-cart-content-container-open');
            documentClassList.remove('mobile-main-menu-container-open');
            documentClassList.remove('mobile-overlay');
        }

        function moveElements(classList) {
            if (classList.includes('mobile-header-active')) {
                mobileHeader();
                mobileMenu();
            } else if (classList.includes('mobile-menu-active')) {
                desktopHeader();
                mobileMenu();
            } else {
                desktopHeader();
                desktopMenu();
            }
        }
        var mqls = {
            phone: window.matchMedia('(max-width: 768px)'),
            tablet: window.matchMedia('(max-width: 1024px)'),
            menu: window.matchMedia('(max-width: ' + Journal['mobileMenuOn'] + 'px)')
        };
        mqr(mqls, function() {
            var oldClassList = extractClassList();
            if (Journal['isDesktop']) {
                if (mqls.phone.matches) {
                    documentClassList.remove('desktop');
                    documentClassList.remove('tablet');
                    documentClassList.add('mobile');
                    documentClassList.add('phone');
                } else if (mqls.tablet.matches) {
                    documentClassList.remove('desktop');
                    documentClassList.remove('phone');
                    documentClassList.add('mobile');
                    documentClassList.add('tablet');
                } else {
                    documentClassList.remove('mobile');
                    documentClassList.remove('phone');
                    documentClassList.remove('tablet');
                    documentClassList.add('desktop');
                }
                if (documentClassList.contains('phone') || (documentClassList.contains('tablet') && Journal[
                        'mobileHeaderOn'] === 'tablet')) {
                    documentClassList.remove('desktop-header-active');
                    documentClassList.add('mobile-header-active');
                } else {
                    documentClassList.remove('mobile-header-active');
                    documentClassList.add('desktop-header-active');
                }
            }
            if (documentClassList.contains('desktop-header-active') && mqls.menu.matches) {
                documentClassList.add('mobile-menu-active');
            } else {
                documentClassList.remove('mobile-menu-active');
            }
            var newClassList = extractClassList();
            if (oldClassList.join(' ') !== newClassList.join(' ')) {
                if (documentClassList.contains('safari') && !documentClassList.contains('ipad') && navigator
                    .maxTouchPoints && navigator.maxTouchPoints > 2) {
                    window.fetch('index.php?route=journal3/journal3/device_detect', {
                        method: 'POST',
                        body: 'device=ipad',
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded'
                        }
                    }).then(function(data) {
                        return data.json();
                    }).then(function(data) {
                        if (data.response.reload) {
                            window.location.reload();
                        }
                    });
                }
                if (document.readyState === 'loading') {
                    document.addEventListener('DOMContentLoaded', function() {
                        moveElements(newClassList);
                    });
                } else {
                    moveElements(newClassList);
                }
            }
        });
    })();
    (function() {
        var cookies = {};
        var style = document.createElement('style');
        var documentClassList = document.documentElement.classList;
        document.head.appendChild(style);
        document.cookie.split('; ').forEach(function(c) {
            var cc = c.split('=');
            cookies[cc[0]] = cc[1];
        });
        if (Journal['popup']) {
            for (var i in Journal['popup']) {
                if (!cookies['p-' + Journal['popup'][i]['c']]) {
                    documentClassList.add('popup-open');
                    documentClassList.add('popup-center');
                    break;
                }
            }
        }
        if (Journal['notification']) {
            for (var i in Journal['notification']) {
                if (cookies['n-' + Journal['notification'][i]['c']]) {
                    style.sheet.insertRule('.module-notification-' + Journal['notification'][i]['m'] +
                        '{ display:none }');
                }
            }
        }
        if (Journal['headerNotice']) {
            for (var i in Journal['headerNotice']) {
                if (cookies['hn-' + Journal['headerNotice'][i]['c']]) {
                    style.sheet.insertRule('.module-header_notice-' + Journal['headerNotice'][i]['m'] +
                        '{ display:none }');
                }
            }
        }
        if (Journal['layoutNotice']) {
            for (var i in Journal['layoutNotice']) {
                if (cookies['ln-' + Journal['layoutNotice'][i]['c']]) {
                    style.sheet.insertRule('.module-layout_notice-' + Journal['layoutNotice'][i]['m'] +
                        '{ display:none }');
                }
            }
        }
    })();
</script>
<script>
    WebFontConfig = {
        google: {
            families: ["Tajawal:400,700:arabic"]
        }
    };
</script>
<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js" async></script>

<?php $currency = setting_by_key('currency'); ?>

<!--====================  category area ====================-->
<div class="category-area mb-40">
    <div class="container">
        <div class="row" style="margin-bottom: 10px;">
            <div class="col-lg-12">
                <div class="category-slider-wrapper-one">
                    <div class="ht-slick-slider" data-slick-setting='{
                        "slidesToShow": 7,
                        "slidesToScroll": 1,
                        "dots": false,
                        "autoplay": true,
                        "autoplaySpeed": 1000,
                        "speed": 1000
                    }' data-slick-responsive='[
                        {"breakpoint":1501, "settings": {"slidesToShow": 7} },
                        {"breakpoint":1199, "settings": {"slidesToShow": 7} },
                        {"breakpoint":991, "settings": {"slidesToShow": 3} },
                        {"breakpoint":767, "settings": {"slidesToShow": 2, "arrows": false} },
                        {"breakpoint":575, "settings": {"slidesToShow": 2, "arrows": false} },
                        {"breakpoint":479, "settings": {"slidesToShow": 1, "arrows": false} }
                    ]'>
                        @foreach ($categories as $cat)
                        <div id="categoryhover" class="single-category-item  @if ($loop->last) {{ 'active' }} @endif " data-rel="{{ $cat->id }}" data-name="@if (!empty($cat->translation->name))
                                                                            {{ $cat->translation->name }}@else{{ $cat->name }}
                                                                            @endif" data-header="">
                            <div class="single-category-item__image module-title-305" style="    margin: 20px; text-align: center;">
                                <a>
                                    <div class="ml-sm-100 widthresponsev">
                                        @php
                                        echo trim($cat->icon, '"');
                                        @endphp
                                    </div>

                                    <h5 class="category-title" style="margin-right: 20px;">
                                        <a>
                                            <p id="categorytitlehover" class="quntity"> @if (!empty($cat->translation->name))
                                                {{ $cat->translation->name }}@else{{ $cat->name }}
                                                @endif
                                            </p>
                                        </a>

                                    </h5>

                                    <!-- <div class="lineundercategoryhover" style="background: #1e6f2f; max-width: 146px;  margin-top: -17px;  display: block; height: 2px; margin-bottom: 15px; margin-left: auto; margin-right: 26px;"></div> -->
                                </a>
                                <a>
                                    <img id="categoryimaghover" width="262" height="340" data-src="{{ url('uploads/category/' . $cat->id . '.jpg') }}" class="img-fluid" alt="">
                                </a>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!--====================  End of category area  ====================-->

<!--====================  banner with double row slider ====================-->

<div class="">
    <div class="container-xl">
        <div class="row row-2 pr-sm-2 ml-sm-5 " style="    display: flex;

                            margin-bottom: 5px;
                            flex-direction: row;
                            flex-wrap: nowrap;
                            width: initial;
                            margin-left: -4px;">


            <div class="col-lg-11 col-sm-10 haedofcategory">

                <p class="paragraph_text textofhaedofcategory">
                    
                </p>


            </div>
            <div class="col-lg-1 col-sm-2 ">


                <img id="imageid" style="     margin-left: -56px;   width: 57px;  height: 58px;" src="uploads/homepage/s1.svg" alt="">




            </div>
            <!--=======  section title  =======-->


            <!--=======  End of section title  =======-->

        </div>

        <div class="row row-2">
            <div class="col-custom-9 col-lg-9 col-sm-12">

                <!--=======  product double row slider wrapper  =======-->

                <div class="grid-rows">
                    <div class="grid-row grid-row-top-2">
                        <div class="grid-cols">
                            <div class="grid-col grid-col-top-2-1">
                                <div class="grid-items">
                                    <div class="grid-item grid-item-top-2-1-1">
                                        <div class="module module-products module-products-27 module-products-grid">
                                            <div class="module-body">
                                                <div class="module-item module-item-2">
                                                    <div style="display: flex; flex-direction: row-reverse;">
                                                        <div class="divofhandgif">
                                                            <img class="handgif" src="/assets/img/gif/gif.gif" alt="">
                                                        </div>

                                                        <h3 class="theme-buttonforprotincategory protin_evaluate">

                                                            <a style="    letter-spacing: 0px; color:white ;  display: flex;  justify-content: center;   white-space: nowrap;" data-bs-toggle="modal" data-bs-target="#quick-view-modal-container" href="javascript:void(0)"> @lang('site.click_here_to_now') </a>

                                                        </h3>
                                                    </div>

                                                    <div class="product-grid" id="portfolio">
                                                        @foreach ($categories as $cat)
                                                        @foreach ($cat->products as $pro)
                                                        <!-- product start  -->
                                                        <div class="{{ $pro->category_id }} product-layout  has-extra-button">
                                                            <div class="product-thumb">
                                                                <div class="product-labels">
                                                                    <span class="product-label product-label-default1 product-label-311">
                                                                        @if( $pro->tax_percentage > 0)
                                                                        <svg version="1.1" id="Layer_4" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 500 500" style="width: 44px; enable-background:new 0 0 500 500;" xml:space="preserve">
                                                                            <style type="text/css">
                                                                                .st11 {
                                                                                    fill: #720000;
                                                                                }

                                                                                .st12 {
                                                                                    fill: #990000;
                                                                                }
                                                                            </style>
                                                                            <g>
                                                                                <g>
                                                                                    <path class="st11" d="M432.37,10.38c7.66-0.44,16.96,25.16,23.58,60.8c-13.34,0-26.68,0-40.03,0c0.04-7.6,0.71-18.98,4.01-32.34
                                                                                                            C422.88,26.95,426.87,10.7,432.37,10.38z" />
                                                                                    <path class="st11" d="M67.63,10.38c-7.66-0.44-16.96,25.16-23.58,60.8c13.34,0,26.68,0,40.03,0c-0.04-7.6-0.71-18.98-4.01-32.34
                                                                                                            C77.12,26.95,73.13,10.7,67.63,10.38z" />
                                                                                    <path class="st12" d="M432.13,10.4c-0.65-0.03-1.32-0.04-2.01-0.04c-0.67,0-1.31,0.01-1.93,0.03H252.84h-5.69H71.81
                                                                                                            c-0.62-0.02-1.27-0.03-1.93-0.03c-0.69,0-1.36,0.02-2.01,0.04c2.7,5.26,4.58,9.68,5.77,12.65c8.62,21.52,10.48,39.92,10.45,48.7
                                                                                                            c-0.01,3.77-0.02,7.53-0.04,11.3h0.04v246.54h-0.02v148.99c0,10.73,13.8,15.19,19.99,6.41c34.94-49.52,88.44-93.34,144.78-94.15
                                                                                                            c58.09-0.84,111.7,43.17,147.06,93.87c6.15,8.82,20.01,4.37,20.01-6.38v-114.1v-34.63V83.05h0.04c-0.01-3.77-0.02-7.54-0.04-11.3
                                                                                                            c-0.03-8.78,1.83-27.18,10.45-48.7C427.55,20.08,429.44,15.65,432.13,10.4z" />
                                                                                </g>
                                                                            </g>
                                                                        </svg>

                                                                        @endif

                                                                    </span>
                                                                </div>

                                                                <div class="product-labels">
                                                                    <span class="product-label product-label-31 product-label-default">
                                                                        @if( $pro->tax_percentage > 0)
                                                                        <svg version="1.1" id="Layer_4" xmlns="http://www.w3.org/2000/svg" 
                                                                        xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                                         viewBox="0 0 500 500"
                                                                         style=" width: 70px; enable-background:new 0 0 500 500;" xml:space="preserve">
                                                                            <style type="text/css">
                                                                                .st5 {
                                                                                    fill: #720000;
                                                                                }

                                                                                .st6 {
                                                                                    fill: #990000;
                                                                                }

                                                                                .st7 {
                                                                                    fill: #FFFFFF;
                                                                                }
                                                                            </style>
                                                                            <g>
                                                                                <g>
                                                                                    <g>
                                                                                        <path class="st5" d="M7.97,73.95V9.32h173.62L72.82,74.51C51.2,74.32,29.59,74.14,7.97,73.95z" />
                                                                                        <path class="st5" d="M490.95,318.68V492.3h-65.27c0-21.57,0-43.14,0-64.71C447.44,391.29,469.2,354.98,490.95,318.68z" />
                                                                                        <polygon class="st6" points="490.95,318.12 182.15,9.32 7.64,9.32 490.95,492.64 			" />
                                                                                    </g>
                                                                                    <g>
                                                                                        <path class="st7" d="M252.74,128.53c-1.98-5.94-4.98-10.91-8.99-14.93c-2.85-2.85-5.83-4.53-8.95-5.02
                                                                                            c-3.11-0.5-5.69,0.28-7.72,2.31c-3.67,3.67-3.99,8.82-0.96,15.45c4.54,9.89,6.85,17.82,6.94,23.79
                                                                                            c0.09,5.96-2.02,11.1-6.33,15.41c-5.24,5.24-11.35,7.33-18.33,6.28c-5.7-0.82-10.97-3.64-15.8-8.47
                                                                                            c-5.76-5.76-9.78-13.73-12.05-23.92l8.47-1.48c1.51,6.28,4.86,12.02,10.04,17.2c7.1,7.1,13.65,7.65,19.64,1.66
                                                                                            c4.66-4.66,5-11,1.05-19.03c-4.13-8.44-6.3-15.38-6.5-20.82c-0.21-5.44,1.56-10.02,5.28-13.75c4.42-4.42,9.69-6.26,15.8-5.5
                                                                                            c5.59,0.7,10.94,3.61,16.06,8.73c5.76,5.76,9.37,12.63,10.82,20.6L252.74,128.53z" />
                                                                                        <path class="st7" d="M293.94,152.1l7.68,7.68l-35.26,75.24l-8.29-8.29l8.29-16.67l-22.61-22.61l-16.76,8.21l-8.29-8.29
                                                                                            L293.94,152.1z M288,165.71L252.74,183l17.98,17.98L288,165.71z" />
                                                                                        <path class="st7" d="M275.52,244.19l55.25-55.25l8.12,8.12l-48.53,48.53l21.38,21.38l-6.72,6.72L275.52,244.19z" />
                                                                                        <path class="st7" d="M371.36,229.52l33.69,33.69l-6.72,6.72l-25.58-25.58l-16.5,16.5l21.47,21.47l-6.72,6.72l-21.47-21.47
                                                                                          l-18.59,18.59l26.71,26.71l-6.72,6.72l-34.83-34.83L371.36,229.52z" />
                                                                                    </g>
                                                                                </g>
                                                                            </g>
                                                                        </svg>

                                                                        @endif



                                                                    </span>
                                                                </div>
                                                                <div class="image">
                                                                  
                                                                    <a href="<?php echo url("singleproduct/" . $pro->id); ?>">
                                                                        <div>
                                                                            <img src="<?php echo url("uploads/products/thumb/" . $pro->id . ".jpg?rand=" . rand(0, 100)); ?>" width="500" height="500" alt="@if (!empty($pro->translation->name)) {{ $pro->translation->name }}@else{{ $pro->name }} @endif" title="@if (!empty($pro->translation->name)) {{ $pro->translation->name }}@else{{ $pro->name }} @endif" class="img-responsive img-first lazyload lazyloaded" data-ll-status="loaded">


                                                                        </div>
                                                                    </a>

                                                                    <div class="product-labels">

                                                                        <div id="product-labelshover" class="product-label product-label-146 product-label-default">
                                                                            <div class="wish-group">
                                                                                <a data-toggle="tooltip" data-tooltip-class="module-products-27 module-products-grid wishlist-tooltip" data-placement="top" title="" onclick="wishlist.add('424')" data-original-title="Add to Wish List"><span class="btn-text">Add to
                                                                                        @lang('site.add_to_wishlist')</span>
                                                                                    <svg version="1.1" id="Layer_4" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 500 500" style=" width: 41px;margin-bottom: 10px;    enable-background:new 0 0 500 500;" xml:space="preserve">
                                                                                        <style type="text/css">
                                                                                            .stWish0 {
                                                                                                fill: #339933;
                                                                                            }

                                                                                            .stWish1 {
                                                                                                fill: #339933;
                                                                                            }
                                                                                        </style>
                                                                                        <path class="stWish0" d="M250,121.55v357.93c-3.61-0.04-7.21-1.32-10.22-3.87c-16.04-13.56-31.92-27.29-47.82-41.02
                                                                                        c-16.49-14.24-33.22-28.22-49.59-42.59c-14.22-12.51-28.54-24.91-42.38-37.86c-10.74-10.05-21.08-20.43-31.09-31.19
                                                                                        c-20.27-21.74-38.21-45.13-50.03-72.6c-6.71-15.57-11.12-31.79-11.56-49.04c-0.44-17.1-0.76-34.11,3.67-50.78
                                                                                        c10.32-38.77,31.51-69.17,67.74-88.12c20.15-10.53,41.65-14.98,64.07-13.76c27.89,1.52,52.31,12.06,73.18,30.9
                                                                                        c12.69,11.45,23.1,24.58,31.82,39.18C248.8,120.42,249.41,121.37,250,121.55z" />
                                                                                        <path class="stWish1" d="M492.92,174.84v30.34c-0.17,0.01-0.33,0.02-0.49,0.05c-0.12,16.18-4.93,31.3-11.32,45.88
                                                                                        c-12.39,28.3-31.29,52.05-52.23,74.5c-26.56,28.5-56.32,53.44-85.58,78.94c-25.96,22.62-52.3,44.76-78.18,67.46
                                                                                        c-1.66,1.46-3.42,2.83-5.19,4.15c-2.99,2.25-6.47,3.35-9.93,3.31V121.55c0.71,0.26,1.34-0.69,2.58-2.86
                                                                                        c6.61-11.61,14.57-22.28,23.87-31.74c20.29-20.65,44.36-34.2,73.62-37.6c22.54-2.61,44.19,0.74,64.82,9.73
                                                                                        c25.39,11.07,44.81,29.11,58.9,52.97c8.11,13.76,13.37,28.56,16.91,44.05c1.39,6.11,1.52,12.31,1.71,18.51l0.18-0.07L492.92,174.84z
                                                                                        " />
                                                                                    </svg>
                                                                                </a>

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="caption">

                                                                    <div class="name"><a href="<?php echo url("singleproduct/" . $pro->id); ?>">
                                                                            @if (!empty($pro->translation->name))
                                                                            {{ $pro->translation->name }}@else{{ $pro->name }}
                                                                            @endif
                                                                        </a></div>
                                                                    <?php
                                                                    if (!empty($pro->translation->prices)) {
                                                                        $prices = json_decode($pro->translation->prices);
                                                                        $titles = json_decode($pro->translation->titles);
                                                                    } else {
                                                                        $prices = json_decode($pro->prices);
                                                                        $titles = json_decode($pro->titles);
                                                                    }
                                                                    ?>
                                                                    <div class="name"><a>
                                                                            {{ $titles[0] }}
                                                                        </a></div>
                                                                    <div class="description">
                                                                        @if (!empty($pro->translation->description))
                                                                        {{ $pro->translation->description }}@else{{ $pro->description }}
                                                                        @endif
                                                                    </div>


                                                                    @foreach ($titles as $key => $t)
                                                                    <div class="price">
                                                                        <div>
                                                                            <span class="price-normal">{{ $prices[$key] }}  <?php echo $currency; ?>
                                                                            </span>
                                                                        </div>

                                                                    </div>
                                                                    @endforeach
                                                                    <div class="buttons-wrapper">
                                                                        <div class="button-group">
                                                                            <div class="cart-group">
                                                                                <div class="stepper">

                                                                                    <input id="qty1" type="text" value="1" class="qty" class="form-control">
                                                                                   
                                                                                    <span>
                                                                                        <i id="add1" class="fa fa-angle-up add">

                                                                                        </i>
                                                                                        <i id="minus1" class=" fa fa-angle-down minus">

                                                                                        </i>
                                                                                    </span>
                                                                                </div>
                                                                                @if($cat->id == 15)
                                                                                <a class="btn btn-cart showev" data-catId="{{$pro->category_id}}" data-image="{{url('uploads/products/thumb/' . $pro->id . '.jpg')}}" data-price="{{ $prices[$key] }}" data-id="{{ $pro->id }}" data-key="{{ $key }}" data-size="{{ $t }}" data-name="{{ $pro->name }}" data-loading-text="<span class='btn-text'>Add to Cart</span>"><span class="btn-text"> @lang('site.add_to_cart') </span></a>
                                                                                @else
                                                                                <a class="btn btn-cart AddToCart" data-catId="{{$pro->category_id}}" data-image="{{url('uploads/products/thumb/' . $pro->id . '.jpg')}}" data-price="{{ $prices[$key] }}" data-id="{{ $pro->id }}" data-key="{{ $key }}" data-size="{{ $t }}" data-name="{{ $pro->name }}" data-loading-text="<span class='btn-text'>Add to Cart</span>"><span class="btn-text"> @lang('site.add_to_cart') </span></a>
                                                                                @endif
                                                                            </div>
                                                                        </div>
                                                                    </div>


                                                                </div>
                                                            </div>
                                                        </div>
                                                        @endforeach
                                                        @endforeach




                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>







                <!--=======  End of product double row slider wrapper  =======-->
            </div>
            <div class="col-custom-3 mb-sm-30 col-lg-3 col-sm-12">
                <!--=======  slider banner area  =======-->

                <div class="slider-banner">
                    <div class="brand-logo-slider-wrapper brand-logo-slider-wrapper--double-border" style="padding:0px ;">
                        <div class="ht-slick-slider" data-slick-setting='{
                        "slidesToShow": 1,
                        "slidesToScroll": 1,
                        "dots": false,
                        "autoplay": true,
                        "autoplaySpeed": 5000,
                        "speed": 1000,
                        "arrows": true,
                        "prevArrow": {"buttonClass": "slick-prev", "iconClass": "ion-ios-arrow-left" },
                        "nextArrow": {"buttonClass": "slick-next", "iconClass": "ion-ios-arrow-right" }
                    }' data-slick-responsive='[
                        {"breakpoint":1501, "settings": {"slidesToShow": 1} },
                        {"breakpoint":1199, "settings": {"slidesToShow": 1} },
                        {"breakpoint":991, "settings": {"slidesToShow": 3} },
                        {"breakpoint":767, "settings": {"slidesToShow": 2, "arrows": false} },
                        {"breakpoint":575, "settings": {"slidesToShow": 2, "arrows": false} },
                        {"breakpoint":479, "settings": {"slidesToShow": 1, "arrows": false} }
                    ]'>

                         
                            <!--=======  single brand logo  =======-->

                            <div class="single-brand-logo">
                                <a href="#">
                                    <img width="432" height="694" src="{{ url('uploads/homepage/homePageImage1.jpg') }}" class="img-fluid" alt="">
                                </a>
                            </div>
                            <div class="single-brand-logo">
                                <a href="#">
                                    <img width="432" height="694" src="{{ url('uploads/homepage/homePageImage2.jpg') }}" class="img-fluid" alt="">
                                </a>
                            </div>
                            <div class="single-brand-logo">
                                <a href="#">
                                    <img width="432" height="694" src="{{ url('uploads/homepage/homePageImage3.jpg') }}" class="img-fluid" alt="">
                                </a>
                            </div>

                            <!--=======  End of single brand logo  =======-->

                            <!--=======  single brand logo  =======-->


                            <!--=======  End of single brand logo  =======-->

                        </div>
                    </div>


                </div>

                <!--=======  End of slider banner area  =======-->
            </div>

        </div>
    </div>
</div>

<!--====================  End of banner with double row slider  ====================-->
<!--====================  full banner area ====================-->
<div class=" grid-rows">
    <div class="grid-row grid-row-top-4">
        <div class="grid-cols">
            <div class="grid-col grid-col-top-4-1">
                <div class="grid-items">
                    <div class="grid-item grid-item-top-4-1-1">

                    </div>
                </div>
            </div>
            <div class="grid-col grid-col-top-4-2">
                <div class="grid-items">
                    <div class="grid-item grid-item-top-4-2-1">
                        <div class="module title-module module-title-304">
                            <div class="title-wrapper">
                                <h3>Protein restores hair's beauty, vitality and softness in just one session</h3>
                                <div style="background: rgb(208 146 48);" class="title-divider"></div>
                                <div class="subtitle"></div>
                            </div>
                        </div>

                    </div>
                    <div class="grid-item grid-item-top-4-2-2">
                        <div class="module module-products module-products-303 module-products-list">
                            <div class="module-body">
                                <div class="module-item module-item-1">
                                    <div class="product-list">
                                        <div class="product-layout  has-extra-button">
                                            <div class="product-thumb">
                                                <div class="image">
                                                    <div class="quickview-button">
                                                        <a class="btn btn-quickview" data-toggle="tooltip" data-tooltip-class="module-products-303 module-products-grid quickview-tooltip" data-placement="top" title="" onclick="quickview('44')" data-original-title="Quickview"><span class="btn-text">Quickview</span></a>
                                                    </div>

                                                    <a href="#" class="product-img ">
                                                        <div>
                                                            <img src="{{ url('uploads/products/thumb/57.jpg') }}" width="300" height="300" alt="Organic hair protein" title="Organic hair protein" class="img-responsive img-first lazyload lazyloaded" data-ll-status="loaded">


                                                        </div>
                                                    </a>

                                                    <div class="product-labels">
                                                        <span class="product-label product-label-31 product-label-default"><b>Hot</b></span>
                                                        <span class="product-label product-label-146 product-label-default"><b style="background: rgb(208 146 48);">high
                                                                rating</b></span>
                                                    </div>

                                                </div>

                                                <div class="caption">

                                                    <div class="name"><a href="#">Organic hair protein</a>
                                                    </div>

                                                    <div class="description">Offering your customers the best hair
                                                        protein experience ever, Benton Protein restores hair's beauty,
                                                        vitality and softness in just one session.With formula of 12
                                                        natural Brazilian oils: avocado, amla, argan, calamus, coconut,
                                                        sunflower, macadamia, myrrh, monoi, olive, american palm, semi
                                                        de linoThe unique and special tannic acid technology in hair
                                                        treatment...</div>

                                                    <div class="price">
                                                        <div>
                                                            <span class="price-normal">1,700.00 TL</span>
                                                        </div>
                                                        <span class="price-tax">Ex Tax:1,700.00 TL</span>
                                                    </div>

                                                    <div class="rating ">
                                                        <div class="rating-stars">
                                                            <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                            <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                            <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                            <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                            <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                        </div>
                                                    </div>

                                                    <div class="buttons-wrapper">
                                                        <div class="button-group">
                                                            <div class="cart-group">
                                                                <div class="stepper">
                                                                    <input type="text" name="quantity" value="1" data-minimum="1" class="form-control">
                                                                    <input type="hidden" name="product_id" value="44">
                                                                    <span>
                                                                        <i class="fa fa-angle-up"></i>
                                                                        <i class="fa fa-angle-down"></i>
                                                                    </span>
                                                                </div>
                                                                <a class="btn btn-cart" style="background: #d09230;" onclick="cart.add('44', $(this).closest('.product-thumb').find('.button-group input[name=\'quantity\']').val());" data-loading-text="<span class='btn-text'>Add to Cart</span>"><span class="btn-text">Add to Cart</span></a>
                                                            </div>

                                                            <div class="wish-group">
                                                                <a class="btn btn-wishlist" data-toggle="tooltip" data-tooltip-class="module-products-303 module-products-grid wishlist-tooltip" data-placement="top" title="" onclick="wishlist.add('44')" data-original-title="Add to Wish List"><span class="btn-text">Add to Wish List</span></a>

                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="extra-group">
                                                        <div>
                                                            <a class="btn btn-extra btn-extra-46" onclick="cart.add('44', $(this).closest('.product-thumb').find('.button-group input[name=\'quantity\']').val(), true);" data-loading-text="<span class='btn-text'>Buy Now</span>">
                                                                <span class="btn-text">Buy Now</span>
                                                            </a>
                                                            <a class="btn btn-extra btn-extra-93" href="javascript:open_popup(22)" data-product_id="44" data-product_url="" data-loading-text="<span class='btn-text'>Question</span>">
                                                                <span class="btn-text">Question</span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--====================  End of full banner area  ====================-->


<!--====================  blog post slider area ====================-->


<div class=" grid-rows">
    <!--=======  section title  =======-->

    <div class="grid-row grid-row-bottom-1">
        <div class="grid-cols">
            <div class="grid-col grid-col-bottom-1-1">
                <div class="grid-items">
                    <div class="grid-item grid-item-bottom-1-1-1">
                        <div class="module title-module module-title-305">
                            <div class="title-wrapper">
                                <h3> @lang('site.customer_review')</h3>
                                <div style="background: rgb(208 146 48);" class="title-divider"></div>
                                <div class="subtitle"></div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="grid-col grid-col-bottom-1-2">
                <div class="grid-items">
                    <div class="grid-item grid-item-bottom-1-2-1">
                        <div class="module module-testimonials module-testimonials-256 blocks-grid carousel-mode">
                            <div class="module-body">
                                <div class="swiper swiper-has-pages" data-items-per-row="{&quot;c0&quot;:{&quot;0&quot;:{&quot;items&quot;:3,&quot;spacing&quot;:25},&quot;760&quot;:{&quot;items&quot;:2,&quot;spacing&quot;:25},&quot;470&quot;:{&quot;items&quot;:1,&quot;spacing&quot;:25}},&quot;c1&quot;:{&quot;0&quot;:{&quot;items&quot;:1,&quot;spacing&quot;:20}},&quot;c2&quot;:{&quot;0&quot;:{&quot;items&quot;:1,&quot;spacing&quot;:20}},&quot;sc&quot;:{&quot;0&quot;:{&quot;items&quot;:1,&quot;spacing&quot;:20}}}" data-options="{&quot;speed&quot;:1000,&quot;autoplay&quot;:{&quot;delay&quot;:6000},&quot;pauseOnHover&quot;:true,&quot;loop&quot;:true}">
                                    <div class="swiper-container swiper-container-initialized swiper-container-horizontal">
                                        <div class="swiper-wrapper" style="transition-duration: 0ms; transform: translate3d(-2510px, 0px, 0px);">
                                           


                                        </div>
                                        <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                                    </div>
                                    <div class="swiper-buttons">
                                        <div class="swiper-button-prev" tabindex="0" role="button" aria-label="Previous slide"></div>
                                        <div class="swiper-button-next" tabindex="0" role="button" aria-label="Next slide"></div>
                                    </div>
                                    <div class="swiper-pagination swiper-pagination-clickable swiper-pagination-bullets">
                                        <span class="swiper-pagination-bullet swiper-pagination-bullet-active" tabindex="0" role="button" aria-label="Go to slide 1"></span>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>
<!--====================  End of blog post slider area  ====================-->
<!--====================  brand logo slider area ====================-->

<div class="brand-logo-slider-area mb-40">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12">
                <!--=======  brand logo slider wrapper  =======-->

                <div class="brand-logo-slider-wrapper brand-logo-slider-wrapper--double-border">
                    <div class="ht-slick-slider" data-slick-setting='{
                        "slidesToShow": 4,
                        "slidesToScroll": 1,
                        "dots": false,
                        "autoplay": false,
                        "autoplaySpeed": 5000,
                        "speed": 1000,
                        "arrows": false,
                        "prevArrow": {"buttonClass": "slick-prev", "iconClass": "ion-ios-arrow-left" },
                        "nextArrow": {"buttonClass": "slick-next", "iconClass": "ion-ios-arrow-right" }
                    }' data-slick-responsive='[
                        {"breakpoint":1501, "settings": {"slidesToShow": 4} },
                        {"breakpoint":1199, "settings": {"slidesToShow": 4} },
                        {"breakpoint":991, "settings": {"slidesToShow": 3} },
                        {"breakpoint":767, "settings": {"slidesToShow": 2, "arrows": false} },
                        {"breakpoint":575, "settings": {"slidesToShow": 2, "arrows": false} },
                        {"breakpoint":479, "settings": {"slidesToShow": 1, "arrows": false} }
                    ]'>

                        <!--=======  single brand logo  =======-->

                        <div class="single-brand-logo">
                            <a>
                                <img style="filter: drop-shadow(0px 0px 4px #d19130);   width: 300px;  border: 3px solid#d19130;" width="200" height="40" data-src="/assets/img/gif/gif1.gif" class="img-fluid" alt="">
                            </a>
                        </div>

                        <!--=======  End of single brand logo  =======-->

                        <!--=======  single brand logo  =======-->

                        <div class="single-brand-logo">
                            <a href="#">
                                <img style="filter: drop-shadow(0px 0px 4px #d19130); width: 300px;  border: 3px solid#d19130;" width="200" height="40" data-src="/assets/img/gif/gif2.gif" class="img-fluid" alt="">
                            </a>
                        </div>

                        <!--=======  End of single brand logo  =======-->

                        <!--=======  single brand logo  =======-->

                        <div class="single-brand-logo">
                            <a>
                                <img style="filter: drop-shadow(0px 0px 4px #d19130);width: 300px;  border: 3px solid#d19130;" width="200" height="40" data-src="/assets/img/gif/gif3.gif" class="img-fluid" alt="">
                            </a>
                        </div>

                        <!--=======  End of single brand logo  =======-->

                        <!--=======  single brand logo  =======-->

                        <div class="single-brand-logo">
                            <a>
                                <img style="filter: drop-shadow(0px 0px 4px #d19130); width: 300px;  border: 3px solid#d19130;" width="200" height="40" data-src="/assets/img/gif/gif4.gif" class="img-fluid" alt="">
                            </a>
                        </div>

                        <!--=======  End of single brand logo  =======-->

                    </div>
                </div>

                <!--=======  End of brand logo slider wrapper  =======-->

            </div>
        </div>
    </div>
</div>

<!--====================  End of brand logo slider area  ====================-->
<!--==============================================   Quick view modal     =============================================-->









<div class="modal  quick-view-modal-container" id="quick-view-modal-container" tabindex="-1" role="dialog" aria-hidden="true" style="overflow: hidden;">
    <div class="modal-dialog modal-dialog-centered modalfolmalar" role="document">
        <div class="modal-content modal-contentResponsiv">
            <div class="modal-header" style="margin-bottom: 11px;">
                <button type="button" id="restformquestionnaire" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="col-xl-12 col-lg-12">
                    <div class="row">

                        <div class="wrapper" style="margin: 0px; width: 100%; padding: 0px; height: auto;">
                            <form action="" id="wizard">

                                <h4 style="display:none ;"></h4>
                                <section>

                                    <div class="py-2 h4" style="margin-bottom: 20px; text-align: right;">

                                        <div class=" pt-10 divtitlemodal">
                                            <b style="font-family: 'Tajawal'; margin-right: 8px; font-size: 19px; color: #ffffff;"> @lang('site.your_hair_type') </b>
                                        </div>
                                    </div>
                                    <div class="col-md-12 heightformodal">

                                        <div style=" display: flex; flex-direction: row-reverse;  justify-content: space-between;">




                                            <div class="ml-md-3 ml-sm-3  pt-sm-0 pt-3" id="options">
                                                <label class="containerCustom" style="display: flex; flex-direction: row-reverse; align-items: flex-end;">
                                                    <input type="radio" name="step1" value="0">
                                                    <span class="checkmarkCustom">


                                                    </span>
                                                    <span style="margin-right: 10px;"> @lang('site.hair_type1')
                                                    </span>
                                                </label>

                                                <label class="containerCustom" style="     display: flex; flex-direction: row-reverse; align-items: flex-end;">
                                                    <input type="radio" name="step1" value="1">
                                                    <span class="checkmarkCustom">


                                                    </span>
                                                    <span style="margin-right: 10px;"> @lang('site.hair_type2')
                                                    </span>
                                                </label>
                                                <label class="containerCustom" style="     display: flex; flex-direction: row-reverse; align-items: flex-end;">
                                                    <input type="radio" name="step1" value="2">
                                                    <span class="checkmarkCustom">


                                                    </span>
                                                    <span style="margin-right: 10px;"> @lang('site.hair_type3')
                                                    </span>
                                                </label>
                                                <label class="containerCustom" style="     display: flex; flex-direction: row-reverse; align-items: flex-end;">
                                                    <input type="radio" name="step1" value="3">
                                                    <span class="checkmarkCustom">


                                                    </span>
                                                    <span style="margin-right: 10px;"> @lang('site.hair_type4')

                                                    </span>
                                                </label>

                                                <label id="errorstep1" style="margin-right: 196px; color:red; font-size: 17px; margin-top: 171px;"> </label>

                                            </div>
                                        </div>
                                </section>

                                <h4></h4>
                                <section>

                                    <div class="py-2 h4" style="margin-bottom: 20px; text-align: right;">

                                        <div class=" pt-10 divtitlemodal">
                                            <b style="font-family: 'Tajawal'; margin-right: 8px; font-size: 19px; color: #ffffff;">
                                                @lang('site.use_hanaa')
                                            </b>
                                        </div>
                                    </div>

                                    <div class="col-md-12 heightformodal">
                                        <div class="ml-md-3 ml-sm-3  pt-sm-0 pt-3" id="options">
                                            <label class=" containerCustom" style="     display: flex; flex-direction: row-reverse; align-items: flex-end;">
                                                <input type="radio" name="step2" value="0">
                                                <span class="checkmarkCustom">

                                                </span>
                                                <span style="margin-right: 10px;">

                                                    @lang('site.not_used')
                                                </span>

                                            </label>

                                            <label class="containerCustom" style="     display: flex; flex-direction: row-reverse; align-items: flex-end;">
                                                <input type="radio" name="step2" value="1">
                                                <span class="checkmarkCustom">

                                                </span>
                                                <span style="margin-right: 10px;">
                                                    @lang('site.less6month')
                                                </span>

                                            </label>
                                            <label class="containerCustom" style="     display: flex; flex-direction: row-reverse; align-items: flex-end;">
                                                <input type="radio" name="step2" value="2">
                                                <span class="checkmarkCustom">

                                                </span>
                                                <span style="margin-right: 10px;">
                                                    @lang('site.more6month')

                                                </span>

                                            </label>
                                            <label id="errorstep2" style="margin-left: 151px; color:red; font-size: 17px; margin-top: 160px;"> </label>

                                        </div>
                                    </div>

                                </section>

                                <h4 style="display:none ;"></h4>
                                <section>

                                    <div class="py-2 h4" style="margin-bottom: 20px; text-align: right; ">

                                        <div class="pt-sm-0 pt-10 divtitlemodal">
                                            <b style="font-family: 'Tajawal'; margin-right: 8px; font-size: 19px; color: #ffffff;">
                                                @lang('site.remove_hair_color')
                                            </b>
                                        </div>
                                    </div>

                                    <div class="col-md-12 heightformodal">
                                        <div class="ml-md-3 ml-sm-3  pt-sm-0 pt-3" id="options">
                                            <label class="containerCustom" style="     display: flex; flex-direction: row-reverse; align-items: flex-end;">
                                                <input type="radio" name="step3" value="0">
                                                <span class="checkmarkCustom">


                                                </span>
                                                <span style="margin-right: 10px;">

                                                    @lang('site.month_before')

                                                </span>
                                            </label>

                                            <label class="containerCustom" style="     display: flex; flex-direction: row-reverse; align-items: flex-end;">
                                                <input type="radio" name="step3" value="1">
                                                <span class="checkmarkCustom">

                                                </span>
                                                <span style="margin-right: 10px;">

                                                    @lang('site.month_6before')
                                                </span>
                                            </label>
                                            <label class="containerCustom" style="     display: flex; flex-direction: row-reverse; align-items: flex-end;">
                                                <input type="radio" name="step3" value="2">
                                                <span class="checkmarkCustom">

                                                </span>
                                                <span style="margin-right: 10px;">

                                                    @lang('site.year_before')
                                                </span>
                                            </label>
                                            <label class="containerCustom" style="     display: flex; flex-direction: row-reverse; align-items: flex-end;">
                                                <input type="radio" name="step3" value="3">
                                                <span class="checkmarkCustom">
                                                    <p style="margin-left: -105px;">

                                                    </p>

                                                </span>
                                                <span style="margin-right: 10px;">
                                                    @lang('site.year_2before')

                                                </span>
                                            </label>
                                            <label class="containerCustom" style="     display: flex; flex-direction: row-reverse; align-items: flex-end;">
                                                <input type="radio" name="step3" value="4">
                                                <span class="checkmarkCustom">
                                                    <p style="margin-left: -126px;">

                                                    </p>

                                                </span>
                                                <span style="margin-right: 10px;">
                                                    @lang('site.year_3before')


                                                </span>
                                            </label>
                                            <label class="containerCustom" style="     display: flex; flex-direction: row-reverse; align-items: flex-end;">
                                                <input type="radio" name="step3" value="5">
                                                <span class="checkmarkCustom">
                                                </span>
                                                <span style="margin-right: 10px;">
                                                    @lang('site.year_3more')



                                                </span>
                                            </label>
                                            <label class="containerCustom" style="     display: flex; flex-direction: row-reverse; align-items: flex-end;">
                                                <input type="radio" name="step3" value="6">
                                                <span class="checkmarkCustom">
                                                    <p class="styleforstep3incheckmarkcustom">

                                                    </p>

                                                </span>
                                                <span class="fontstyleforstep3">
                                                    @lang('site.not_use_color_remove')


                                                </span>
                                            </label>
                                            <label id="errorstep3" style="margin-left: 151px; color:red; font-size: 17px;     margin-top: 78px;"> </label>
                                        </div>
                                    </div>

                                </section>

                                <h4 style="display:none ;"></h4>
                                <section>

                                    <div class="py-2 h4" style="margin-bottom: 20px; text-align: right;">

                                        <div class="pt-10 divtitlemodal">
                                            <b style="font-family: 'Tajawal'; margin-right: 8px; font-size: 19px; color: #ffffff;">
                                                @lang('site.your_hair_demaged')
                                            </b>
                                        </div>
                                    </div>

                                    <div class="col-md-12 heightformodal">
                                        <div class="ml-md-3 ml-sm-3  pt-sm-0 pt-3" id="options">
                                            <label class="containerCustom" style="     display: flex; flex-direction: row-reverse; align-items: flex-end;">
                                                <input type="radio" name="step4" value="0">
                                                <span class="checkmarkCustom">
                                                </span>
                                                <span style="margin-right: 10px;"> @lang('site.Yes')
                                                </span>
                                            </label>

                                            <label class="containerCustom" style="     display: flex; flex-direction: row-reverse; align-items: flex-end;">
                                                <input type="radio" name="step4" value="1">
                                                <span class="checkmarkCustom">
                                                </span>
                                                <span style="margin-right: 10px;"> @lang('site.No')
                                                </span>
                                            </label>
                                            <label id="errorstep4" style="margin-left: 151px; color:red; font-size: 17px; margin-top: 247px;"> </label>
                                        </div>
                                    </div>

                                </section>
                                <h4 style="display:none ;"></h4>
                                <section>
                                    <div class="py-2 h4" style="margin-bottom: 20px; text-align: right; ">

                                        <div class=" pt-10 divtitlemodal">
                                            <b style="font-family: 'Tajawal'; margin-right: 8px; font-size: 19px; color: #ffffff;">
                                                @lang('site.your_hair_length')
                                            </b>
                                        </div>
                                    </div>

                                    <div class="col-md-12 heightformodal" style=" display: flex; flex-wrap: wrap; flex-direction: row;justify-content: space-between;">
                                        <div class="ml-md-3 ml-sm-3  pt-sm-0 pt-3" id="options">
                                            <img style="height: 338px; border: 5px solid #d19130;width: 228px;" class="img-fluid" src="{{ url('uploads/homepage/hairlength.png') }}" alt="">

                                        </div>
                                        <div>
                                            <label class="ml-sm-30" style=" display: flex;flex-wrap: nowrap; flex-direction: column;     margin-left: 169px;">
                                                <p style="font-family: 'Tajawal';  margin-right: 2px; font-size: 18px; font-weight: 600;  color: #000000; padding-bottom: 5px;">

                                                    @lang('site.must_choose_your_hair_length')
                                                </p>
                                                <select class="ml-sm-0 selecthair" id="selectstep5" style="    width: auto; height: 50px;margin-left: -136px;">
                                                    <option value="0">0</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                    <option value="6">6</option>
                                                    <option value="7">7</option>
                                                    <option value="8">8</option>
                                                    <option value="9">9</option>
                                                    <option value="10">10</option>
                                                    <option value="11">11</option>
                                                    <option value="12">12</option>
                                                    <option value="13"> 13</option>
                                                    <option value="14">14</option>
                                                    <option value="15">15</option>
                                                    <option value="16">16</option>
                                                    <option value="17">17</option>
                                                    <option value="18">18</option>
                                                </select>


                                                </span>
                                            </label>

                                            <label id="errorstep5" style="margin-left: 0px; color:red; text-align: center;  font-size: 17px;"> </label>

                                        </div>

                                    </div>

                                </section>
                                <h4 style="display:none ;"></h4>
                                <section>
                                    <div class="py-2 h4" style="margin-bottom: 20px; text-align: right; ">

                                        <div class=" pt-10 divtitlemodal">
                                            <b style="font-family: 'Tajawal'; margin-right: 8px; font-size: 19px; color: #ffffff;">

                                                @lang('site.confirm_with_change_answers')
                                            </b>
                                        </div>
                                    </div>
                                    <div class="col-md-12 heightformodal">




                                        <div style=" display: flex; flex-direction: row-reverse;  justify-content: space-between;">
                                            <div style="    display: flex; flex-direction: row-reverse;">
                                                <span>
                                                    <font style="vertical-align: inherit; display: flex;vertical-align: inherit;flex-direction: row-reverse; align-items: center;">
                                                        <div class="numberCircle">1</div>
                                                        <font style="margin-right: 8px;font-size: 18px; font-weight: bold; color: #646b77; vertical-align: inherit;">@lang('site.your_hair_type') </font>
                                                    </font>
                                                </span>
                                                <span style="margin-right: 14px;">
                                                    <font style="vertical-align: inherit;">

                                                        <font class="anserstep1" id="anserstep1" style="font-size: 17px; font-weight: bold; color: #3a9943; vertical-align: inherit;"></font>
                                                        <input hidden id="Numanserstep1" value="" type="text">

                                                    </font>
                                                </span>

                                            </div>

                                            <div>
                                                <span>
                                                    <a id="showselectchangestep1">
                                                        <font style="vertical-align: inherit;">
                                                            <img src="/assets/img/svg/pen.svg" style="width: 18px;" />
                                                            <font style="  font-size: 17px; vertical-align: inherit;"> @lang('site.change')</font>
                                                        </font>
                                                    </a>

                                                </span>
                                            </div>



                                        </div>
                                        <div id="expandselectchangestep1" style="margin-top: 7px;">
                                            <select class="ml-sm-0 selectchangestep1" id="selectchangestep1" onchange="copyTextValuestep1()" style=" font-size: 18px; text-align: center; width: 164px; border: 2px solid #3a9943; height: auto;">
                                                <option value="0"> @lang('site.hair_type1') </option>
                                                <option value="1"> @lang('site.hair_type2') </option>
                                                <option value="2"> @lang('site.hair_type3') </option>
                                                <option value="3"> @lang('site.hair_type4') </option>
                                            </select>
                                        </div>
                                        <hr style="margin-top: 15px;  margin-bottom: 15px;">
                                        <div style=" display: flex; flex-direction: row-reverse;  justify-content: space-between;">
                                            <div style="display: flex; flex-direction: row-reverse;">
                                                <span>
                                                    <font style="vertical-align: inherit; display: flex;vertical-align: inherit;flex-direction: row-reverse; align-items: center;">
                                                        <div class="numberCircle">2</div>
                                                        <font style="margin-right: 8px; font-size: 18px; font-weight: bold; color: #646b77; vertical-align: inherit;"> @lang('site.use_hanaa') </font>
                                                    </font>
                                                </span>
                                                <span style="margin-right: 14px;">
                                                    <font style="vertical-align: inherit;">

                                                        <font id="anserstep2" style="font-size: 17px; font-weight: bold; color: #3a9943; vertical-align: inherit;"></font>
                                                        <input hidden id="Numanserstep2" value="" type="text">

                                                    </font>
                                                </span>
                                            </div>

                                            <div>
                                                <span>
                                                    <a id="showselectchangestep2">
                                                        <font style="vertical-align: inherit;">
                                                            <img src="/assets/img/svg/pen.svg" style="width: 18px;" />
                                                            <font style="  font-size: 17px; vertical-align: inherit;">@lang('site.change')</font>
                                                        </font>
                                                    </a>
                                                </span>
                                            </div>
                                        </div>
                                        <div id="expandselectchangestep2" style="margin-top: 7px;">
                                            <select class="ml-sm-0 " id="selectchangestep2" onchange="copyTextValuestep2()" style=" font-size: 18px; text-align: center; width: 164px; border: 2px solid #3a9943; height: auto;">
                                                <option value="0"> @lang('site.not_used') </option>
                                                <option value="1"> @lang('site.more6month') </option>
                                                <option value="2"> @lang('site.less6month') </option>
                                            </select>
                                        </div>
                                        <hr style="margin-top: 15px;  margin-bottom: 15px;">
                                        <div style=" display: flex; flex-direction: row-reverse;  justify-content: space-between;">
                                            <div style="display: flex; flex-direction: row-reverse;">
                                                <span>
                                                    <font style="vertical-align: inherit; display: flex;vertical-align: inherit;flex-direction: row-reverse; align-items: center;">
                                                        <div class="numberCircle">3</div>
                                                        <font style="margin-right: 8px; font-size: 18px; font-weight: bold; color: #646b77; vertical-align: inherit;"> @lang('site.remove_hair_color') </font>
                                                    </font>
                                                </span>
                                                <span style="margin-right: 14px;">
                                                    <font style="vertical-align: inherit;">

                                                        <font id="anserstep3" style="font-size: 17px; font-weight: bold; color: #3a9943; vertical-align: inherit;"></font>
                                                        <input hidden id="Numanserstep3" value="" type="text">

                                                    </font>
                                                </span>
                                            </div>

                                            <div>
                                                <span>
                                                    <a id="showselectchangestep3">
                                                        <font style="vertical-align: inherit;">
                                                            <img src="/assets/img/svg/pen.svg" style="width: 18px;" />
                                                            <font style="  font-size: 17px; vertical-align: inherit;">@lang('site.change')</font>
                                                        </font>
                                                    </a>
                                                </span>
                                            </div>
                                        </div>
                                        <div id="expandselectchangestep3" style="margin-top: 7px;">
                                            <select class="ml-sm-0 " id="selectchangestep3" onchange="copyTextValuestep3()" style=" font-size: 18px; text-align: center; width: 164px; border: 2px solid #3a9943; height: auto;">
                                                <option value="0"> @lang('site.month_before') </option>
                                                <option value="1"> @lang('site.month_6before') </option>
                                                <option value="2"> @lang('site.year_before') </option>
                                                <option value="3"> @lang('site.year_2before') </option>
                                                <option value="4"> @lang('site.year_3before') </option>
                                                <option value="5"> @lang('site.year_3more') </option>
                                                <option value="6"> @lang('site.not_use_color_remove') </option>
                                            </select>
                                        </div>
                                        <hr style="margin-top: 15px;  margin-bottom: 15px;">
                                        <div style=" display: flex; flex-direction: row-reverse;  justify-content: space-between;">
                                            <div style="display: flex; flex-direction: row-reverse;">
                                                <span>
                                                    <font style="vertical-align: inherit; display: flex;vertical-align: inherit;flex-direction: row-reverse; align-items: center;">
                                                        <div class="numberCircle">4</div>
                                                        <font style="margin-right: 8px; font-size: 18px; font-weight: bold; color: #646b77; vertical-align: inherit;"> @lang('site.your_hair_demaged') </font>
                                                    </font>
                                                </span>
                                                <span style="margin-right: 14px;">
                                                    <font style="vertical-align: inherit;">

                                                        <font id="anserstep4" style="font-size: 17px; font-weight: bold; color: #3a9943; vertical-align: inherit;"></font>
                                                        <input hidden id="Numanserstep4" value="" type="text">

                                                    </font>
                                                </span>
                                            </div>

                                            <div>
                                                <span>
                                                    <a id="showselectchangestep4">
                                                        <font style="vertical-align: inherit;">
                                                            <img src="/assets/img/svg/pen.svg" style="width: 18px;" />
                                                            <font style="  font-size: 17px; vertical-align: inherit;">@lang('site.change')</font>
                                                        </font>
                                                    </a>
                                                </span>
                                            </div>
                                        </div>
                                        <div id="expandselectchangestep4" style="margin-top: 7px;">
                                            <select class="ml-sm-0 " id="selectchangestep4" onchange="copyTextValuestep4()" style=" font-size: 18px; text-align: center; width: 164px; border: 2px solid #3a9943; height: auto;">
                                                <option value="0">@lang('site.Yes')</option>
                                                <option value="1">@lang('site.No')</option>
                                            </select>
                                        </div>
                                        <hr style="margin-top: 15px;  margin-bottom: 15px;">
                                        <div style=" display: flex; flex-direction: row-reverse;  justify-content: space-between;">
                                            <div style="display: flex; flex-direction: row-reverse;">
                                                <span>
                                                    <font style="vertical-align: inherit; display: flex;vertical-align: inherit;flex-direction: row-reverse; align-items: center;">
                                                        <div class="numberCircle">5</div>
                                                        <font style="margin-right: 8px; font-size: 18px; font-weight: bold; color: #646b77; vertical-align: inherit;"> @lang('site.your_hair_length') </font>
                                                    </font>
                                                </span>
                                                <span style="margin-right: 14px;">
                                                    <font style="vertical-align: inherit;">

                                                        <font id="anserstep5" style="font-size: 17px; font-weight: bold; color: #3a9943; vertical-align: inherit;"></font>


                                                    </font>
                                                </span>
                                            </div>

                                            <div>
                                                <span>
                                                    <a id="showselectchangestep5">
                                                        <font style="vertical-align: inherit;">
                                                            <img src="/assets/img/svg/pen.svg" style="width: 18px;" />
                                                            <font style="  font-size: 17px; vertical-align: inherit;">@lang('site.change')</font>
                                                        </font>
                                                    </a>
                                                </span>
                                            </div>
                                        </div>
                                        <div id="expandselectchangestep5" style="margin-top: 7px;">
                                            <select class="ml-sm-0 " id="selectchangestep5" onchange="copyTextValuestep5()" style="font-size: 18px; text-align: center; width: 164px; border: 2px solid #3a9943; height: auto;">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                                <option value="10">10</option>
                                                <option value="11">11</option>
                                                <option value="12">12</option>
                                                <option value="13"> 13</option>
                                                <option value="14">14</option>
                                                <option value="15">15</option>
                                                <option value="16">16</option>
                                                <option value="17">17</option>
                                                <option value="18">18</option>


                                            </select>
                                        </div>
                                        <hr style="margin-top: 15px;  margin-bottom: 15px;">




                                    </div>


                                </section>
                                <h4 style="display:none ;"></h4>
                                <section>
                                    <div id="resultDynamic">




                                    </div>
                                </section>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>



<!--=====  End of Quick view modal  ======-->

<div class="modal quick-view-modal-containeralert " tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog modal-dialog-centered modal-dialogalert" role="document" style="width:auto; left:0%;">

        <div class="modal-content" style="background-color: #fff;  height: 283px;   width: 462px;  overflow-y: auto; border-radius: 0px;  border-radius: 0;">
            <div class="modal-header" style=" margin-bottom: -74px;  border: 0;">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="  height: 80vh; overflow-y: hidden;  overflow-x: hidden; padding-left: 0px;">
                <div>


                    <div class="py-2 h4" style="margin-bottom: 4px; text-align: right;">

                        <div class=" divtitlemodalalert">

                            <b style="font-family: 'Tajawal';  font-size: 19px; color: #ffffff;">
                                @lang('site.must_know_type_of_protin')
                            </b>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="ml-md-3 ml-sm-3  pt-sm-0 pt-3" id="options">
                            <label class="containerCustomalert" style="margin-top: 20px; display: flex; flex-direction: row-reverse; align-items: flex-end;">
                                <input type="radio" name="alert" value="0">
                                <span class="checkmarkCustom">
                                </span>
                                <span style="margin-right: 10px;">
                                    @lang('site.yes_i_want')
                                </span>
                            </label>

                            <label class="containerCustomalert" style="margin-top: 20px; display: flex; flex-direction: row-reverse; align-items: flex-end;">
                                <input type="radio" name="alert" value="1">
                                <span class="checkmarkCustom">
                                </span>
                                <span style="margin-right: 10px;">
                                    @lang('site.no_i_d_want')
                                </span>
                            </label>
                            <label class="containerCustomalert" style="margin-top: 20px; display: flex; flex-direction: row-reverse; align-items: flex-end;">
                                <input type="radio" name="alert" value="2">
                                <span class="checkmarkCustom">
                                </span>
                                <span style="margin-right: 10px;">
                                    @lang('site.i_have_info')
                                </span>
                            </label>
                        </div>

                        <div class="cart-buttons" style=" display: flex; margin-top: 17px; justify-content: center;">
                            <a id="btnmodalalert" style=" color: #fff;" class="theme-buttonforalrt"> @lang('site.Next') </a>

                        </div>
                    </div>
                    <input hidden id="data-id" type="text">
                    <input hidden id="data-key" type="text">
                    <input hidden id="data-price" type="text">
                    <input hidden id="data-size" type="text">
                    <input hidden id="data-name" type="text">
                    <input hidden id="data-codes" type="text">
                    <input hidden id="data-image" type="text">
                    <input hidden id="data-catId" type="text">

                </div>
            </div>
        </div>
    </div>

</div>
<!--====================  icon feature area ====================-->

<div class="icon-feature-area mb-40 iconfeaturearea">
    <div class="container">
        <div class="row rowoficonfeaturewrapper">
            <div class="col-lg-12">
                <!--=======  icon feature wrapper  =======-->

                <div class="icon-feature-wrapper">
                    <div class="row row-5">
                        <div class="col-6 col-lg-3 col-sm-6">
                            <!--=======  single icon feature  =======-->

                            <div class="single-icon-feature">
                                <div class="single-icon-feature__icon">
                                    <svg version="1.1" id="Layer_4" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 500 500" style="enable-background:new 0 0 500 500; width:100px; height:70px; " xml:space="preserve">
                                        <style type="text/css">
                                            .st0i {
                                                fill: #D09230;
                                            }

                                            .st1i {
                                                fill: #FFFFFF;
                                            }
                                        </style>
                                        <circle class="st0i" cx="339.55" cy="194.09" r="149.67" />
                                        <g>
                                            <path class="st1i" d="M138.72,296.19c1.7,0,3.4-0.02,5.08-0.19c8.41-0.92,13.82-9.14,11.38-17.24c-1.95-6.49-7-9.89-14.94-9.89
                                                        c-36.68-0.02-73.36,0.14-110.04-0.13c-8.44-0.06-14.7,2.3-18.29,10.22v6.78c3.11,7.79,8.86,10.6,17.19,10.56
                                                        C65.64,296.05,102.18,296.19,138.72,296.19z" />
                                            <path class="st1i" d="M441.22,306.5c-5.51-6.97-10.78-14.14-16.4-21.02c-5.3-6.48-9.54-13.51-13.24-21
                                                        c-11.22-22.71-22.76-45.25-34.01-67.93c-3.44-6.97-8.49-10.25-16.41-10.09c-15.24,0.3-30.49,0.1-45.73,0.1
                                                        c-9.68,0-9.68,0-9.68-9.89c-0.02-12.81-4.71-17.48-17.67-17.48H178.42c-36.7,0-73.39,0-110.09,0.02c-1.84,0-3.68,0-5.49,0.19
                                                        c-6.62,0.7-11.57,5.76-12.02,12.13c-0.49,7.09,3.57,12.78,10.27,14.51c2.22,0.59,4.48,0.52,6.73,0.52h204.09
                                                        c6.52,0,6.52,0,6.52,6.75c0,28.65-0.02,57.3,0,85.95c0,11.7,4.97,16.6,16.81,16.6c32.89,0,65.78,0.06,98.65-0.08
                                                        c3.35-0.02,5.36,1.05,7.3,3.65c4.94,6.7,10.14,13.19,15.25,19.75c1.05,1.35,1.86,2.65,1.86,4.54c-0.08,21.73-0.1,43.47,0.02,65.2
                                                        c0.02,2.6-1,3-3.22,2.95c-6.35-0.11-12.71-0.19-19.06,0.03c-2.68,0.1-3.83-0.67-4.68-3.3c-7.52-23-28.11-38.05-51.87-38.14
                                                        c-23.55-0.1-44.6,15.14-52.03,37.95c-0.86,2.65-1.83,3.51-4.57,3.49c-24.57-0.11-49.13-0.11-73.68,0c-2.73,0-3.71-0.81-4.59-3.46
                                                        c-7.57-23.13-29.68-38.9-52.86-37.95c-24.44,1-43.35,15.13-51.19,38.49c-0.78,2.33-1.79,2.94-4.1,2.9
                                                        c-9.75-0.13-19.48-0.06-29.22-0.03c-1.68,0-3.4,0.08-5.05,0.37c-7.16,1.22-11.67,6.78-11.43,13.97
                                                        c0.24,7.63,6.11,12.97,14.75,13.09c10.16,0.13,20.32,0.13,30.48-0.03c2.79-0.05,4.06,0.63,5.06,3.48
                                                        c7.86,22.46,28,36.82,51.41,36.97c23.43,0.14,43.71-14.27,51.78-37c0.97-2.76,2.27-3.46,5.08-3.46
                                                        c24.55,0.13,49.11,0.13,73.66,0.02c2.65-0.02,3.84,0.65,4.78,3.29c8,22.78,28.14,37.16,51.67,37.16
                                                        c23.49-0.02,43.74-14.48,51.67-37.21c0.97-2.76,2.27-3.25,4.83-3.22c11.29,0.11,22.59,0.1,33.87,0.03
                                                        c10.32-0.06,15.71-5.44,15.71-15.63c0.03-28.22-0.02-56.46,0.05-84.68C445.57,314.24,444.15,310.18,441.22,306.5z M354.63,268.51
                                                        c-14.95,0-29.92-0.11-44.86,0.1c-3.44,0.05-4.14-1.02-4.11-4.24c0.16-15.79,0.14-31.59,0.02-47.4c-0.03-2.6,0.63-3.29,3.25-3.25
                                                        c14.67,0.14,29.35,0.1,44.01,0.03c1.7,0,2.81,0.29,3.65,2c8.51,17.11,17.11,34.19,25.68,51.28c0.16,0.33,0.16,0.76,0.32,1.48
                                                        H354.63z M153,432.33c-15.14,0.17-27.52-11.98-27.6-27.09c-0.1-14.94,11.92-27.13,26.92-27.33c15.13-0.19,27.46,11.9,27.57,27.08
                                                        C180,419.87,167.92,432.16,153,432.33z M339.33,432.33c-14.87-0.02-27.08-12.14-27.25-27.08c-0.17-14.92,12.3-27.38,27.36-27.35
                                                        c14.94,0.05,27.16,12.16,27.27,27.05C366.84,419.9,354.38,432.36,339.33,432.33z" />
                                            <path class="st1i" d="M49.21,242.51c30.46,0.05,60.9,0.02,91.36,0.02c7.89,0,15.79,0.11,23.68-0.03c8.65-0.17,14.49-6.79,13.7-15.24
                                                        c-0.67-7.06-6.36-11.94-14.35-11.97c-19.03-0.08-38.06-0.03-57.09-0.03h-8.05c-16.63,0-33.27-0.05-49.9,0.03
                                                        c-7.14,0.03-12.3,3.97-13.81,10.13C32.48,234.69,39.01,242.5,49.21,242.51z" />
                                            <path class="st1i" d="M110.72,349.99c6.16-0.05,11.09-3.84,12.9-9.19c2.95-8.73-2.89-17.6-12.27-17.9
                                                        c-10.7-0.37-21.41-0.1-32.13-0.1v-0.05c-10.43,0-20.86-0.17-31.28,0.05c-8.03,0.17-13.81,6.16-13.71,13.65
                                                        c0.1,7.46,6,13.49,13.92,13.54C69.01,350.13,89.86,350.11,110.72,349.99z" />
                                        </g>
                                    </svg>

                                </div>
                                <div class="single-icon-feature__content">
                                    <p class="feature-title"> @lang('site.free_shipping') </p>
                                    <p class="feature-text"> @lang('site.free_shipping_text')</p>
                                </div>
                            </div>

                            <!--=======  End of single icon feature  =======-->
                        </div>
                        <div class="col-6 col-lg-3 col-sm-6">
                            <!--=======  single icon feature  =======-->

                            <div class="single-icon-feature">
                                <div class="single-icon-feature__icon">
                                    <svg version="1.1" id="Layer_4" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 500 500" style="enable-background:new 0 0 500 500; width:100px; height:70px;" xml:space="preserve">
                                        <style type="text/css">
                                            .st0i {
                                                fill: #D09230;
                                            }

                                            .st1i {
                                                fill: #FFFFFF;
                                            }
                                        </style>
                                        <circle class="st0i" cx="339.55" cy="194.09" r="149.67" />
                                        <g>
                                            <path class="st1i" d="M440.02,310.45c-12.01-8.2-27.01-6.82-36.75,3.7c-2.18,2.35-3.26,1.83-5.39,0.24
                                                c-11.52-8.69-28.68-10.24-40.51,3.67c-13.53,15.9-27.59,31.34-40.97,47.36c-1.96,2.34-3.37,2.29-5.94,1.19
                                                c-31.87-13.7-64.25-26.14-97.51-36.12c-16.78-5.03-33.63-10.3-51.14-11.32c-35.92-2.07-69.68,5.24-99.68,26.03
                                                c-6.88,4.77-13.84,9.63-18.2,17.14v1.61c3.06,6.11,6.84,6.93,11.48,2.63c32.27-29.91,70.98-39.18,113.56-34.24
                                                c21.01,2.45,41.02,9.64,61.04,16.32c25.46,8.48,50.44,18.23,75.13,28.71c8.37,3.56,12.7,10.71,12.17,19.71
                                                c-0.47,7.75-6.05,14.72-13.62,17.15c-5.1,1.65-10.03,0.64-14.97-0.72c-20.07-5.55-40.14-11.1-60.22-16.62
                                                c-5.55-1.52-8.98-0.34-10.07,3.36c-1.1,3.83,1.16,6.62,6.65,8.18c3.98,1.13,7.96,2.23,11.96,3.32
                                                c17.76,4.86,35.45,10.1,53.32,14.49c18.63,4.56,36.47-7.98,38.8-26.75c0.27-2.09,0.91-2.67,2.85-2.81
                                                c3.87-0.3,7.71-1.13,11.57-1.22c4.25-0.11,7.17-1.88,9.86-5.11c18.99-22.69,37.96-45.39,57.93-67.23c5.77-6.3,11.7-7.56,19.44-4.05
                                                c7.98,3.62,12.76,11.08,12.07,18.56c-0.66,7.06-4.39,12.53-8.94,17.53c-17.45,19.24-34.12,39.17-50.75,59.11
                                                c-1.33,1.58-2.87,2.68-4.7,3.59c-39.75,19.85-79.51,39.68-119.19,59.66c-2.46,1.22-4.31,1.1-6.68,0.08
                                                c-19.65-8.36-39.32-16.62-59.01-24.88c-4.63-1.94-8.22-1.05-9.69,2.29c-1.58,3.59,0.22,6.76,5.11,8.84
                                                c5.52,2.37,11.07,4.66,16.59,7.01c16.29,6.95,32.58,13.91,48.87,20.87h4.03c0.2-1,1.21-0.92,1.85-1.25
                                                c40.45-20.26,80.9-40.51,121.43-60.64c4.89-2.43,8.94-5.5,12.4-9.78c16.85-20.79,34.84-40.64,52.13-61.05
                                                C460.4,342.39,457.5,322.38,440.02,310.45z M390.96,327.78c-14.08,16.32-28.6,32.3-41.83,49.29c-5.75,7.4-12.87,6.68-20.15,7.76
                                                c-1.46,0.22-1.69-0.94-2.18-1.87c-3.64-7.02-3.67-7.06,1.68-13.22c12.92-14.83,25.89-29.63,38.8-44.48
                                                c3.04-3.5,6.59-5.86,9.78-5.64c6.08,0.2,9.94,1.87,13.59,4.25C392.67,325.19,392.41,326.1,390.96,327.78z" />
                                            <path class="st1i" d="M160.6,438.8c-7.12-3.03-14.3-5.93-21.39-9.02c-2.63-1.14-5.28-1.65-8.15-1.65
                                                c-25.84,0.05-51.66,0.09-77.5-0.05c-4.01-0.02-7.32,0.69-9.64,4.17v4.01c2.57,3.46,6.08,4.08,10.19,4.03
                                                c17.81-0.16,35.64,0.58,53.4-0.25c16.92-0.77,32.93,1.24,47.8,9.67c0.24,0.13,0.5,0.17,0.75,0.28c4.37,1.68,7.82,0.64,9.17-2.78
                                                C166.59,443.8,164.91,440.65,160.6,438.8z" />
                                            <path class="st1i" d="M214.89,319.03c4.09,1.38,7.32-0.14,8.44-3.62c1.07-3.37-0.53-6.21-4.52-7.7c-3.25-1.22-6.62-2.13-9.8-3.48
                                                c-47.62-20.02-74.36-66.13-67.78-117.29c3.17-24.58,13.81-45.88,31.7-62.87c30.56-29.02,66.98-39.04,107.4-27.05
                                                c43.52,12.93,69.79,43.08,77.83,88.02c5,27.94-1.21,53.93-16.56,77.73c-4.06,6.32-8.78,12.17-14.8,17.64
                                                c0-10.29,0.03-19.91,0-29.54c-0.02-5.03-2.21-7.89-6-7.9c-3.83-0.03-6.04,2.79-6.04,7.84c-0.02,13.66-0.02,27.31,0,40.98
                                                c0,6.58,2.27,8.73,8.91,7.85c13.92-1.83,27.81-3.87,41.74-5.83c0.25-0.03,0.52-0.09,0.78-0.16c3.86-0.93,5.96-3.42,5.61-6.66
                                                c-0.38-3.42-3.2-5.66-7.27-5.17c-8.11,0.96-16.16,2.18-25.1,3.4c1.54-1.87,2.63-3.18,3.72-4.5c24.19-29.3,33.13-62.84,26.65-100.11
                                                C361.05,130.4,321.45,91,271.18,82.3c-36.89-6.38-70.48,2.21-99.03,26.31c-34.62,29.21-49.62,67.4-42.54,112.07
                                                C137.5,270.36,167.23,302.94,214.89,319.03z" />
                                        </g>
                                        <path class="st1i" d="M282.92,239.26c-2.47-0.61-4.7,0.12-6.78,1.45c-4.49,2.88-9.31,4.84-14.61,5.61
                                            c-17.47,2.53-32.93-8.97-39.79-24.1c8.92,0,17.6,0.02,26.27-0.01c3.82-0.01,6.82-1.98,8.06-5.15c2.12-5.41-1.75-11.11-7.76-11.16
                                            c-9.7-0.09-19.4-0.07-29.1,0.01c-1.99,0.02-2.96-0.19-3.09-2.61c-0.2-3.74-0.2-7.44,0-11.19c0.13-2.41,1.08-2.63,3.08-2.62
                                            c12.16,0.08,24.33,0.05,36.5,0.03c5.4-0.01,9.11-3.37,9.11-8.18c-0.01-4.81-3.72-8.15-9.13-8.15c-8.51-0.02-17.02-0.01-25.53-0.01
                                            h-8.55c2.51-5.26,5.61-9.69,9.54-13.48c8.26-7.95,17.98-11.97,29.61-10.7c5.89,0.63,11.05,3.03,16.06,6.02
                                            c4.18,2.49,8.95,1.28,11.33-2.64c2.32-3.8,1.28-8.63-2.71-11.15c-17.87-11.31-36.24-12.17-54.68-1.68
                                            c-12.59,7.17-20.94,18.16-26.18,31.55c-0.63,1.6-1.34,2.21-3.1,2.12c-3.31-0.17-6.64-0.1-9.95-0.04c-4.8,0.08-8.37,3.57-8.4,8.11
                                            c-0.03,4.54,3.54,8.09,8.31,8.2c2.38,0.06,4.77,0.08,7.15-0.02c1.29-0.05,1.61,0.35,1.42,1.59c-0.68,4.4-0.68,8.82,0,13.22
                                            c0.19,1.2-0.08,1.66-1.41,1.6c-2.29-0.11-4.59-0.06-6.89-0.03c-4.97,0.08-8.59,3.56-8.57,8.19c0.01,4.64,3.64,8.08,8.63,8.14
                                            c3.4,0.04,6.81,0.07,10.21-0.03c1.31-0.03,1.95,0.36,2.39,1.63c1.23,3.53,2.83,6.92,4.81,10.08c12.56,20.07,29.88,31.22,54.34,28.64
                                            c8.17-0.86,15.59-4,22.32-8.66c2.83-1.96,4.01-4.86,3.31-8.25C288.46,242.25,286.28,240.09,282.92,239.26z" />
                                    </svg>

                                </div>
                                <div class="single-icon-feature__content">
                                    <p class="feature-title"> @lang('site.Support')</p>
                                    <p class="feature-text"> @lang('site.contact_text') </p>
                                </div>
                            </div>

                            <!--=======  End of single icon feature  =======-->
                        </div>
                        <div class="col-6 col-lg-3 col-sm-6">
                            <!--=======  single icon feature  =======-->

                            <div class="single-icon-feature">
                                <div class="single-icon-feature__icon">
                                    <svg version="1.1" id="Layer_4" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 500 500" style="enable-background:new 0 0 500 500; width:100px; height:70px;" xml:space="preserve">
                                        <style type="text/css">
                                            .st0i {
                                                fill: #D09230;
                                            }

                                            .st1i {
                                                fill: #FFFFFF;
                                            }
                                        </style>
                                        <circle class="st0i" cx="339.55" cy="194.09" r="149.67" />
                                        <g>
                                            <path class="st1i" d="M389.37,264.43c-5.56-33.34-18.89-63.26-41.82-88.12c-47.65-51.63-106.42-70.52-174.73-53.98
                                            c-53.25,12.89-91.59,45.85-115.73,95.12c-4.55,9.29-7.97,19.02-10.67,28.99c-1.25,4.6,1.15,8.72,5.51,9.95
                                            c4.19,1.18,8.19-0.98,9.77-5.31c0.33-0.94,0.56-1.91,0.83-2.87c6.46-22.75,17.58-42.96,33.03-60.84c1.52-1.75,2.37-2.18,4.18-0.25
                                            c4.51,4.83,9.25,9.44,13.97,14.06c3.81,3.73,8.69,3.93,11.95,0.65c3.27-3.29,3.04-8.12-0.7-11.96c-4.35-4.46-8.64-9.01-13.27-13.17
                                            c-2.72-2.43-2.35-3.82,0.36-5.69c2.35-1.62,4.42-3.65,6.7-5.38c25.44-19.35,54.12-30.15,85.96-32.75c2.67-0.22,3.38,0.41,3.29,3.09
                                            c-0.22,5.98-0.08,11.97-0.07,17.95c0.01,6.78,2.77,10.39,7.95,10.44c5.21,0.05,8.12-3.6,8.13-10.26c0.01-4.11-0.1-8.23,0.04-12.34
                                            c0.1-2.93-1.37-6.78,0.65-8.55c1.81-1.58,5.47,0.01,8.3,0.32c33.42,3.64,62.72,16.67,88.12,38.64c1.88,1.62,1.29,2.34-0.06,3.66
                                            c-4.55,4.44-9.03,8.96-13.51,13.47c-4.23,4.27-4.71,9.01-1.32,12.49c3.41,3.49,8.25,3.09,12.48-1.07c2.58-2.53,5.1-5.13,7.68-7.66
                                            c2.58-2.52,5.34-7.11,7.78-6.95c3.23,0.21,5.26,5.01,7.59,8.01c19.88,25.57,30.9,54.56,33.51,86.81c0.22,2.7-0.47,3.35-3.11,3.27
                                            c-6.48-0.2-12.97-0.07-19.45-0.06c-3.32,0-6.15,1.04-7.92,4.03c-3.21,5.44,0.61,11.81,7.38,12.01c6.73,0.19,13.47,0.16,20.2-0.02
                                            c2.5-0.06,3.09,0.65,2.89,3.1c-2.92,35.63-15.89,67.03-39.23,94.15c-1.6,1.85-2.3,1.32-3.63-0.05c-4.61-4.73-9.29-9.4-14.01-14.03
                                            c-3.98-3.91-8.91-4.14-12.21-0.69c-3.2,3.33-2.89,8.08,0.91,11.94c4.54,4.63,9.06,9.29,13.79,13.72c2,1.87,1.75,2.73-0.23,4.43
                                            c-18.29,15.79-39.08,26.85-62.29,33.47c-5.56,1.58-7.99,5.47-6.57,10.2c1.4,4.67,5.55,6.52,11.12,4.97
                                            c76.11-21.23,128.51-90.2,128.69-169.38C391.52,282.75,390.88,273.54,389.37,264.43z" />
                                            <path class="st1i" d="M209.1,387.81c-11.47-1.18-22.53-3.76-33.08-8.54c-5.05-2.29-9.04-0.73-11.45,4.26
                                            c-2.92,6.04-5.7,12.15-8.48,18.26c-0.75,1.66-1.25,2.6-3.43,1.33c-20.08-11.64-35.9-27.46-47.56-47.52
                                            c-1.15-1.97-0.72-2.67,1.15-3.5c6.12-2.74,12.22-5.56,18.26-8.47c5.05-2.43,6.68-6.38,4.42-11.39c-4.71-10.43-7.33-21.35-8.54-32.7
                                            c-1.05-9.95-7.25-15.35-17.22-15.4c-8.73-0.04-17.46,0-26.19,0c-8.98,0-17.96-0.04-26.93,0.01c-6.75,0.03-9.79,3.13-9.68,9.93
                                            c0.15,8.74,0.72,17.45,2.23,26.06c8.04,46.06,30.45,83.59,67.6,111.98c30.76,23.51,65.83,35.02,104.49,35.68
                                            c5.9,0.1,9.26-3.03,9.29-8.81c0.09-18.46,0.16-36.92-0.03-55.37C223.86,394.85,217.96,388.73,209.1,387.81z M204.85,451.48
                                            c-34.96-2.81-65.99-15.28-92.6-38.17c-28.06-24.12-45.67-54.49-52.98-90.8c-1.3-6.48-1.97-13.05-2.61-19.62
                                            c-0.21-2.14,0.39-2.73,2.55-2.71c14.21,0.09,28.42,0.08,42.64,0c2.04-0.02,2.72,0.53,2.91,2.61c0.84,9.2,2.73,18.22,5.99,26.88
                                            c0.82,2.18,0.07,2.81-1.62,3.58c-6.11,2.77-12.2,5.58-18.26,8.46c-5.84,2.77-7.26,6.72-4.46,12.46
                                            c14.75,30.31,37.32,52.83,67.61,67.6c5.59,2.72,9.63,1.36,12.28-4.18c2.95-6.17,5.77-12.39,8.63-18.6
                                            c0.66-1.43,1.13-2.52,3.26-1.71c8.76,3.35,17.89,5.26,27.23,6.09c2.14,0.19,2.58,1.01,2.55,2.98c-0.11,7.11-0.04,14.22-0.04,21.33
                                            c0,6.98-0.12,13.97,0.06,20.94C208.06,451.2,207.24,451.68,204.85,451.48z" />
                                            <path class="st1i" d="M194.8,283.63c-1.14,0.4-2.44,0.44-3.67,0.48c-2.37,0.08-4.74-0.03-7.11,0.05
                                            c-12.7,0.44-22.53,8.94-23.62,21.53c-0.78,8.91-0.44,17.94-0.2,26.91c0.12,4.56,3.57,7.38,8.24,7.44
                                            c6.6,0.09,13.21,0.03,19.82,0.03h11.59c2.62,0,5.24,0.07,7.86-0.02c4.77-0.15,8.21-3.49,8.25-7.9c0.05-4.42-3.33-7.89-8.13-7.94
                                            c-9.6-0.11-19.2-0.04-28.79-0.04c-1.5,0-3.02,0.31-2.94-2.11c0.14-4.86-0.07-9.73,0.14-14.58c0.18-4.08,3.12-6.9,7.21-7.16
                                            c2.86-0.18,5.74-0.02,8.6-0.12c12.36-0.44,22.04-8.76,23.65-20.81c0.59-4.41,0.49-8.98,0.13-13.43
                                            c-0.95-11.57-10.61-21.08-22.1-21.56c-8.59-0.35-17.2-0.17-25.8-0.06c-3.57,0.04-6.13,1.94-7.33,5.36
                                            c-1.84,5.29,1.8,10.33,7.7,10.44c7.73,0.15,15.46-0.04,23.19,0.09c4.83,0.08,7.8,2.8,8.48,7.31
                                            C201.29,276.29,199.51,281.99,194.8,283.63z" />
                                            <path class="st1i" d="M268.65,300.16c2.61-0.04,3.36,0.69,3.31,3.32c-0.15,9.22-0.01,18.45-0.08,27.68
                                            c-0.03,3.41,1.09,6.14,4.07,7.86c5.44,3.16,11.78-0.86,11.83-7.58c0.08-13.1,0.02-26.19,0.02-39.29c0-12.97-0.03-25.94,0.02-38.91
                                            c0.01-3.39-1.1-6.13-4.08-7.86c-5.34-3.12-11.69,0.62-11.79,7.1c-0.15,9.48-0.15,18.96,0.02,28.43c0.04,2.68-0.8,3.36-3.36,3.28
                                            c-5.86-0.18-11.72-0.16-17.58,0c-2.37,0.06-3.18-0.5-3.13-3.03c0.16-9.11,0.04-18.21,0.06-27.32c0.01-3.27-0.7-6.19-3.61-8.14
                                            c-2.62-1.74-5.39-1.93-8.14-0.46c-3.2,1.71-4.34,4.62-4.34,8.11c0.01,12.35-0.02,24.69,0.01,37.04c0.02,6.78,3.05,9.79,9.83,9.82
                                            C250.69,300.25,259.67,300.32,268.65,300.16z" />
                                        </g>
                                    </svg>

                                </div>
                                <div class="single-icon-feature__content">
                                    <p class="feature-title"> @lang('site.money_back') </p>
                                    <p class="feature-text"> @lang('site.days_to_return') </p>
                                </div>
                            </div>

                            <!--=======  End of single icon feature  =======-->
                        </div>
                        <div class="col-6 col-lg-3 col-sm-6">
                            <!--=======  single icon feature  =======-->

                            <div class="single-icon-feature">
                                <div class="single-icon-feature__icon">

                                    <svg version="1.1" id="Layer_4" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 500 500" style="enable-background:new 0 0 500 500; width:100px; height:70px;" xml:space="preserve">
                                        <style type="text/css">
                                            .st0i {
                                                fill: #D09230;
                                            }

                                            .st1i {
                                                fill: #FFFFFF;
                                            }
                                        </style>
                                        <circle class="st0i" cx="339.55" cy="194.09" r="149.67" />
                                        <g>
                                            <path class="st1i" d="M422.24,313.73c-9-4.42-18.87,1.89-18.9,12.36c-0.07,28.82-0.08,57.65,0.05,86.48
                                        c0.01,3.21-0.49,4.28-4.06,4.27c-119.24-0.11-238.48-0.1-357.72-0.01c-3.32,0.01-3.87-1-3.87-4.03c0.09-49.63,0.1-99.27-0.02-148.9
                                        c0-3.31,0.98-3.88,4.03-3.88c45.41,0.1,90.82,0.07,136.23,0.06c1.5,0,3.01,0.07,4.49-0.07c9.02-0.88,14.57-10.14,10.81-18.25
                                        c-2.64-5.69-7.4-7.82-13.56-7.82c-45.96,0.06-91.91-0.01-137.87,0.13c-3.48,0.01-4.17-0.91-4.13-4.22
                                        c0.2-14.69,0.22-29.37-0.01-44.06c-0.05-3.49,0.93-4.12,4.23-4.11c45.41,0.11,90.82,0.08,136.23,0.07c1.49,0,3.01,0.07,4.49-0.09
                                        c9.01-1,14.39-10.33,10.53-18.4c-2.72-5.67-7.54-7.66-13.67-7.65c-46.1,0.07-92.18,0.03-138.28,0.03
                                        C22.2,155.65,11.7,166.1,11.7,185.06V413.1c0,19.32,10.39,29.76,29.62,29.76h358.53c1.77,0,3.55,0.04,5.3-0.14
                                        c10.12-1.06,17.43-6.13,21.96-15.3c0.81-1.64,0.48-3.81,2.32-4.95V322.1C427.56,318.86,425.9,315.53,422.24,313.73z" />
                                            <path class="st1i" d="M429.42,185.84c0,0,0,0.01,0,0.01C429.42,185.85,429.42,185.84,429.42,185.84l0-59.57
                                        c-2.05-3.98-4.57-7.35-8.98-9.22c-29.92-12.73-59.78-25.57-89.67-38.41c-3.68-1.58-7.37-1.81-11.06-0.24
                                        c-30.26,12.95-60.53,25.92-90.76,38.93c-5.36,2.31-8.43,6.58-8.33,12.43c0.49,28.65-1.78,57.38,2.37,85.93
                                        c4.13,28.3,15.35,53.27,34.68,74.47c17.31,18.99,38.22,33.3,60.25,46.15c4.94,2.87,9.76,2.58,14.65-0.29
                                        c15.25-8.92,29.96-18.63,43.49-30.08c28.51-24.14,46.21-54.27,51.13-91.62c0.67-5.15,0.61-10.43,2.23-15.45v-3.27c0,0,0,0,0-0.01
                                        c0,0,0,0.01,0,0.01C429.42,192.36,429.42,189.1,429.42,185.84z M360.59,284.94c-10.36,8.83-21.47,16.58-33.05,23.7
                                        c-1.39,0.86-2.49,1.68-4.36,0.51c-19.45-12.11-37.94-25.32-52.21-43.66c-13.02-16.75-19.88-35.87-22.65-56.7
                                        c-1.85-13.92-1.72-27.92-1.66-37.73c0-12.74,0.07-21.3-0.04-29.86c-0.03-2.17,0.48-3.33,2.63-4.24
                                        c24.32-10.3,48.59-20.71,72.84-31.17c2.03-0.88,3.69-0.91,5.76-0.02c24.25,10.47,48.52,20.87,72.83,31.17
                                        c2.1,0.89,2.74,1.98,2.69,4.2c-0.39,19.7,0.55,39.4-0.81,59.1C400.22,234.28,386.71,262.69,360.59,284.94z" />
                                            <path class="st1i" d="M78.39,312.32c-8.6,0.01-14.53,5.45-14.47,13.15c0.06,7.54,5.92,12.9,14.27,12.94
                                        c8.3,0.04,16.59,0.01,24.88,0.01c8.16,0,16.32,0.02,24.47-0.01c8.7-0.02,14.61-5.28,14.66-12.95c0.06-7.7-5.88-13.13-14.48-13.14
                                        C111.29,312.29,94.84,312.29,78.39,312.32z" />
                                            <path class="st1i" d="M372.45,158.62c-5.98-4.9-13.87-3.71-19.34,3.01c-4.79,5.91-9.5,11.89-14.24,17.83
                                        c-8.55,10.68-17.1,21.36-25.94,32.4c-5.26-7.87-10.27-15.42-15.35-22.92c-4.92-7.28-12.46-9.22-18.89-4.97
                                        c-6.47,4.29-7.69,12-2.88,19.29c8.08,12.23,16.19,24.43,24.38,36.58c6.24,9.27,15.98,9.71,22.95,1.04
                                        c16.83-20.98,33.62-41.99,50.38-63.01C378.83,171.18,378.34,163.45,372.45,158.62z" />
                                        </g>
                                    </svg>
                                </div>
                                <div class="single-icon-feature__content">
                                    <p class="feature-title"> @lang('site.payment_secure') </p>
                                    <p class="feature-text"> @lang('site.pement_text')</p>
                                </div>
                            </div>

                            <!--=======  End of single icon feature  =======-->
                        </div>
                    </div>
                </div>

                <!--=======  End of icon feature wrapper  =======-->
            </div>
        </div>
    </div>
</div>

<!--====================  End of icon feature area  ====================-->
<!--====================  newsletter area ====================-->
<div class="full-banner-two__image">

    <img style="border: 5px solid #d19130;" class="img-fluid" data-src="{{ url('uploads/homepage/homePageImage4.jpg') }}" alt="">

</div>

<!--====================  End of newsletter area  ====================-->
<!-- Start of HubSpot Embed Code -->
<script>
    $(function() {
        $('.add').on('click', function() {
            var $qty = $(this).closest('div').find('.qty');
            var currentVal = parseInt($qty.val());
            if (!isNaN(currentVal)) {
                $qty.val(currentVal + 1);
            }
        });
        $('.minus').on('click', function() {
            var $qty = $(this).closest('div').find('.qty');
            var currentVal = parseInt($qty.val());
            if (!isNaN(currentVal) && currentVal > 1) {
                $qty.val(currentVal - 1);
            }
        });
    });

    function fixStepIndicator(n) {
        // This function removes the "active" class of all steps...
        var i, x = document.getElementsByClassName("stepIndicator");
        for (i = 0; i < x.length; i++) {
            x[i].className = x[i].className.replace(" active", "");
        }
        //... and adds the "active" class on the current step:
        x[n].className += " active";
    }
</script>
<!-- End of HubSpot Embed Code -->
<script>
    $(document).ready(function() {
        var selectedClass = "";
        var $id = $(".active").attr("data-rel");
        console.log($id);
        if ($id != 0) {
            selectedClass = $id;
            $(".paragraph_text").text($(".active").attr("data-name"));
            if ($id == 15) {
                $(".protin_evaluate").css('display', 'block');
            } else {
                $(".protin_evaluate").css('display', 'none');

            }
            $("#portfolio").fadeTo(100, 0.1);
            //  added another direct div and all class to the element  by Aliwi
            $("#portfolio > div").addClass(
                'all') //  added display none to show the elements  by Aliwi 
            $("#portfolio > div").not("." + selectedClass).fadeOut().css("display", "none");
            setTimeout(function() {
                //  added display block to show the elements  by Aliwi 
                $("." + selectedClass).fadeIn().css("display", "block");
                $("#portfolio").fadeTo(300, 1);
            }, 300);
        }
    });
    $(function() {
        var selectedClass = "";
        var isHeader = "";
        $(".single-category-item").click(function() {
            isHeader = $(this).attr("data-header");
            selectedClass = $(this).attr("data-rel");
        if(isHeader!="")
        {
            $(".item_active_header").removeClass("headeractive");
            $(this).addClass("headeractive");
        }
            $(".paragraph_text").text($(this).attr("data-name"));
            if (selectedClass == 15) {
                $(".protin_evaluate").css('display', 'block');
                $(".handgif").css('display', 'block');
                document.getElementById("imageid").src = "uploads/homepage/s1.svg";
            }

            if (selectedClass == 30) {
                $(".handgif").css('display', 'none');
                $(".protin_evaluate").css('display', 'none');
                document.getElementById("imageid").src = "uploads/homepage/s4.svg";

            }
            if (selectedClass == 29) {
                $(".handgif").css('display', 'none');
                $(".protin_evaluate").css('display', 'none');
                document.getElementById("imageid").src = "uploads/homepage/s3.svg";

            }
            if (selectedClass == 31) {
                $(".handgif").css('display', 'none');
                $(".protin_evaluate").css('display', 'none');
                document.getElementById("imageid").src = "uploads/homepage/s5.svg";

            }
            if (selectedClass == 32) {
                $(".handgif").css('display', 'none');
                $(".protin_evaluate").css('display', 'none');
                document.getElementById("imageid").src = "uploads/homepage/s6.svg";

            }
            if (selectedClass == 33) {
                $(".handgif").css('display', 'none');
                $(".protin_evaluate").css('display', 'none');
                document.getElementById("imageid").src = "uploads/homepage/s7.svg";

            }
            if (selectedClass == 34) {
                $(".handgif").css('display', 'none');
                $(".protin_evaluate").css('display', 'none');
                document.getElementById("imageid").src = "uploads/homepage/s2.svg";

            }
            $("#portfolio").fadeTo(100, 0.1);
            //  added another direct div and all class to the element  by Aliwi
            $("#portfolio > div").addClass(
                'all') //  added display none to show the elements  by Aliwi 
            $("#portfolio > div").not("." + selectedClass).fadeOut().css("display", "none");
            setTimeout(function() {
                //  added display block to show the elements  by Aliwi 
                $("." + selectedClass).fadeIn().css("display", "block");
                $("#portfolio").fadeTo(300, 1);
            }, 300);
        });
    });
</script>
<script>
    $("body").on("click", ".addOrder", function() {
        // $(this).parent(".holdt").remove();
        var msg = "";
        if (cart.length < 1) {
            alert("لم تقم بطلب أي منتج");
            return false;
        }
        var name = "";
        var email = "";
        var phone = "";
        var table_id = "";
        var address = "";
        var comment = "";
        var form_dataa = {
            name: name,
            email: email,
            phone: phone,
            table_id: table_id,
            address: address,
            comment: comment,
            type: "preOrder",
            status: -2,
            delivery_cost: 0,
            discount: 0,
            vat: 0,
            evaluate: JSON.stringify(evalaute),
            total_cost: $("#total_cost").val(),
            items: _.map(cart, function(cart) {
                return {
                    product_id: cart.product_id,
                    size: cart.size,
                    quantity: cart.quantity,
                    price: cart.price
                }
            })
        };
        console.log(form_dataa)

        $.ajax({
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '<?php echo url("sales/addOrder"); ?>',
            data: form_dataa,
            success: function(msg) {
                console.log(msg.id)
                var idForm = {
                    id: msg.id
                };
                var saleIdNew = msg.id;
                url = '/shoppingcart/' + saleIdNew;
                console.log(url)
                $(location).attr('href', url);

                // $.ajax({
                //     type: 'Post',
                //     headers: {
                //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                //     },
                //     url: '<?php echo url("/shoppingcart"); ?>',
                //     data: idForm,

                // });

            }
        });

    });
    $("body").on("click", ".checkoutcart", function() {
        // $(this).parent(".holdt").remove();
        var msg = "";
        if (cart.length < 1) {
            alert("لم تقم بطلب أي منتج");
            return false;
        }
        var name = "";
        var email = "";
        var phone = "";
        var table_id = "";
        var address = "";
        var comment = "";
        var form_dataa = {
            name: name,
            email: email,
            phone: phone,
            table_id: table_id,
            address: address,
            comment: comment,
            type: "preOrder",
            status: -2,
            delivery_cost: 0,
            discount: 0,
            vat: 0,
            evaluate: JSON.stringify(evalaute),
            total_cost: $("#total_cost").val(),
            items: _.map(cart, function(cart) {
                return {
                    product_id: cart.product_id,
                    size: cart.size,
                    quantity: cart.quantity,
                    price: cart.price
                }
            })
        };
        console.log(form_dataa)

        $.ajax({
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '<?php echo url("sales/addOrder"); ?>',
            data: form_dataa,
            success: function(msg) {
                ///////
                console.log(msg.id)

                var saleIdNew = msg.id;
                var form_data_checkout = {
                    type: "preOrder",
                    status: -2,
                    delivery_cost: 0,
                    discount: 0,
                    vat: 0,
                    total_cost: msg.amount,
                    items: msg.preSale,
                    id: saleIdNew

                };
                console.log(form_data_checkout)
                console.log("checkout sale");
                $.ajax({
                    type: "POST",
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                    },
                    url: '<?php echo url("sales/checkoutOrder"); ?>',
                    data: form_data_checkout,
                    success: function(msg) {
                        console.log(msg);
                        url = '/checkout/' + saleIdNew;
                        console.log(url)
                        $(location).attr('href', url);

                    },
                });

            }
        });

    });
</script>
<script>
    $(function() {
        $("#wizard").steps({
            headerTag: "h4",
            bodyTag: "section",
            transitionEffect: "fade",
            enableAllSteps: false,
            forceMoveForward: false,
            transitionEffectSpeed: 300,
            enableFinishButton: false,
            loadingTemplate: "<span class=\"loader\"></span> #text#",
            labels: {
                next: ' التالي',
                previous: "السابق",
                finish: 'أغلاق'
            },
            onInit: function(event, current) {
                // $('.actions > ul > li:first-child').attr('style', 'display:none');
            },
            onStepChanging: function(event, currentIndex, newIndex) {
                if (newIndex >= 1) {
                    $('.actions > ul > li:first-child').attr('style', 'display:block');
                    /////validations for radio step1 //////////
                    var status = document.getElementsByName("step1");
                    var validradio = false;
                    var i = 0;
                    while (!validradio && i < status.length) {
                        if (status[i].checked) validradio = true;
                        i++;
                    }
                    if (!validradio) {
                        document.getElementById("errorstep1").innerHTML = "يرجى اختيار نوع الشعر قبل الانتقال للخطوة التالية";
                        return false;
                    }
                    $('.steps ul li:first-child a img').attr('src', 'uploads/images/step1.svg');
                    var sample = document.getElementById("figcaptionid1"); // using VAR
                    // change css style
                    sample.style.color = '#3a9943'; // Changes color, adds style property.
                } else {
                    $('.steps ul li:first-child a img').attr('src', 'uploads/images/step-active.svg');
                    var sample = document.getElementById("figcaptionid1"); // using VAR
                    // change css style
                    sample.style.color = '#ffffff'; // Changes color, adds style property.
                }
                if (newIndex === 1) {
                    $('.actions > ul > li:first-child').attr('style', 'display:block');
                    $('.steps ul li:first-child a img').attr('src', '/uploads/images/step-active.svg');
                    var sample = document.getElementById("figcaptionid1"); // using VAR
                    // change css style
                    sample.style.color = '#ffffff'; // Changes color, adds style property.
                    $('.steps ul li:nth-child(2) a img').attr('src', '/uploads/images/step-active.svg');
                    var sample = document.getElementById("figcaptionid2"); // using VAR
                    // change css style
                    sample.style.color = '#ffffff'; // Changes color, adds style property.
                } else {
                    $('.steps ul li:nth-child(2) a img').attr('src', 'uploads/images/step2.svg');
                    var sample = document.getElementById("figcaptionid2"); // using VAR
                    // change css style
                    sample.style.color = '#3a9943'; // Changes color, adds style property.
                    /////validations for radio step2 //////////
                    var status = document.getElementsByName("step2");
                    var validradio = false;
                    var i = 0;
                    while (!validradio && i < status.length) {
                        if (status[i].checked) validradio = true;
                        i++;
                    }
                    if (!validradio) {
                        document.getElementById("errorstep2").innerHTML = "يرجى اختيار متى استخدمت الحناء قبل الانتقال للخطوة التالية";
                        $('.steps ul li:first-child a img').attr('src', 'uploads/images/step-active.svg');
                        var sample = document.getElementById("figcaptionid1"); // using VAR
                        // change css style
                        sample.style.color = '#ffffff'; // Changes color, adds style property.
                        $('.steps ul li:nth-child(2) a img').attr('src', 'uploads/images/step-active.svg');
                        var sample = document.getElementById("figcaptionid2"); // using VAR
                        // change css style
                        sample.style.color = '#ffffff'; // Changes color, adds style property.
                        return false;

                    }
                }
                if (newIndex === 2) {
                    $('.actions > ul > li:first-child').attr('style', 'display:block');

                    $('.steps ul li:nth-child(3) a img').attr('src', '/uploads/images/step-active.svg');
                    var sample = document.getElementById("figcaptionid3"); // using VAR
                    // change css style
                    sample.style.color = '#ffffff'; // Changes color, adds style property.
                    $('.steps ul li:nth-child(2) a img').attr('src', '/uploads/images/step-active.svg');
                    var sample = document.getElementById("figcaptionid2"); // using VAR
                    // change css style
                    sample.style.color = '#ffffff'; // Changes color, adds style property.
                    $('.steps ul li:first-child a img').attr('src', '/uploads/images/step-active.svg');
                    var sample = document.getElementById("figcaptionid1"); // using VAR
                    // change css style
                    sample.style.color = '#ffffff'; // Changes color, adds style property.
                } else {
                    $('.steps ul li:nth-child(3) a img').attr('src', '/uploads/images/step3.svg');
                    var sample = document.getElementById("figcaptionid3"); // using VAR
                    // change css style
                    sample.style.color = '#3a9943'; // Changes color, adds style property.
                }
                if (newIndex === 3) {
                    $('.actions > ul > li:first-child').attr('style', 'display:block');
                    /////validations for radio step3 //////////
                    var status = document.getElementsByName("step3");
                    var validradio = false;
                    var i = 0;
                    while (!validradio && i < status.length) {
                        if (status[i].checked) validradio = true;
                        i++;
                    }
                    if (!validradio) {
                        document.getElementById("errorstep3").innerHTML = "يرجى اختيار متى استخدمت الحناء قبل الانتقال للخطوة التالية";
                        $('.steps ul li:nth-child(3) a img').attr('src', 'uploads/images/step-active.svg');
                        var sample = document.getElementById("figcaptionid3"); // using VAR
                        // change css style
                        sample.style.color = '#ffffff'; // Changes color, adds style property.
                        $('.steps ul li:nth-child(2) a img').attr('src', 'uploads/images/step-active.svg');
                        var sample = document.getElementById("figcaptionid2"); // using VAR
                        // change css style
                        sample.style.color = '#ffffff'; // Changes color, adds style property.
                        $('.steps ul li:nth-child(2) a img').attr('src', '/uploads/images/step-active.svg');
                        var sample = document.getElementById("figcaptionid2"); // using VAR
                        // change css style
                        sample.style.color = '#ffffff'; // Changes color, adds style property.
                        $('.steps ul li:first-child a img').attr('src', 'uploads/images/step-active.svg');
                        var sample = document.getElementById("figcaptionid1"); // using VAR
                        // change css style
                        sample.style.color = '#ffffff'; // Changes color, adds style property.
                        return false;
                    }
                    $('.steps ul li:nth-child(4) a img').attr('src', '/uploads/images/step-active.svg');
                    var sample = document.getElementById("figcaptionid4"); // using VAR
                    // change css style
                    sample.style.color = '#ffffff'; // Changes color, adds style property.
                    $('.steps ul li:nth-child(3) a img').attr('src', '/uploads/images/step-active.svg');
                    var sample = document.getElementById("figcaptionid3"); // using VAR
                    // change css style
                    sample.style.color = '#ffffff'; // Changes color, adds style property.
                    $('.steps ul li:nth-child(2) a img').attr('src', '/uploads/images/step-active.svg');
                    var sample = document.getElementById("figcaptionid2"); // using VAR
                    // change css style
                    sample.style.color = '#ffffff'; // Changes color, adds style property.
                    $('.steps ul li:first-child a img').attr('src', '/uploads/images/step-active.svg');
                    var sample = document.getElementById("figcaptionid1"); // using VAR
                    // change css style
                    sample.style.color = '#ffffff'; // Changes color, adds style property.
                } else {
                    $('.steps ul li:nth-child(4) a img').attr('src', 'uploads/images/step4.svg');
                    var sample = document.getElementById("figcaptionid4"); // using VAR
                    // change css style
                    sample.style.color = '#3a9943'; // Changes color, adds style property.
                }
                if (newIndex === 4) {
                    $('.actions > ul > li:first-child').attr('style', 'display:block');
                    /////validations for radio step4 //////////
                    var status = document.getElementsByName("step4");
                    var validradio = false;
                    var i = 0;
                    while (!validradio && i < status.length) {
                        if (status[i].checked) validradio = true;
                        i++;
                    }
                    if (!validradio) {
                        document.getElementById("errorstep4").innerHTML = "يرجى اختيار متى استخدمت الحناء قبل الانتقال للخطوة التالية";
                        $('.steps ul li:nth-child(4) a img').attr('src', '/uploads/images/step-active.svg');
                        var sample = document.getElementById("figcaptionid4"); // using VAR
                        // change css style
                        sample.style.color = '#ffffff'; // Changes color, adds style property.
                        $('.steps ul li:nth-child(3) a img').attr('src', 'uploads/images/step-active.svg');
                        var sample = document.getElementById("figcaptionid3"); // using VAR
                        // change css style
                        sample.style.color = '#ffffff'; // Changes color, adds style property.
                        $('.steps ul li:nth-child(2) a img').attr('src', '/uploads/images/step-active.svg');
                        var sample = document.getElementById("figcaptionid2"); // using VAR
                        // change css style
                        sample.style.color = '#ffffff'; // Changes color, adds style property.
                        $('.steps ul li:first-child a img').attr('src', 'uploads/images/step-active.svg');
                        var sample = document.getElementById("figcaptionid1"); // using VAR
                        // change css style
                        sample.style.color = '#ffffff'; // Changes color, adds style property.
                        return false;
                    }
                    $('.steps ul li:nth-child(5) a img').attr('src', '/uploads/images/step-active.svg');
                    var sample = document.getElementById("figcaptionid5"); // using VAR
                    // change css style
                    sample.style.color = '#ffffff'; // Changes color, adds style property.
                    $('.steps ul li:nth-child(4) a img').attr('src', '/uploads/images/step-active.svg');
                    var sample = document.getElementById("figcaptionid4"); // using VAR
                    // change css style
                    sample.style.color = '#ffffff'; // Changes color, adds style property.
                    $('.steps ul li:nth-child(3) a img').attr('src', '/uploads/images/step-active.svg');
                    var sample = document.getElementById("figcaptionid3"); // using VAR
                    // change css style
                    sample.style.color = '#ffffff'; // Changes color, adds style property.
                    $('.steps ul li:nth-child(2) a img').attr('src', '/uploads/images/step-active.svg');
                    var sample = document.getElementById("figcaptionid2"); // using VAR
                    // change css style
                    sample.style.color = '#ffffff'; // Changes color, adds style property.
                    $('.steps ul li:first-child a img').attr('src', '/uploads/images/step-active.svg');
                    var sample = document.getElementById("figcaptionid1"); // using VAR
                    // change css style
                    sample.style.color = '#ffffff'; // Changes color, adds style property.
                } else {
                    $('.steps ul li:nth-child(5) a img').attr('src', 'uploads/images/step5.svg');
                    var sample = document.getElementById("figcaptionid5"); // using VAR
                    // change css style
                    sample.style.color = '#3a9943'; // Changes color, adds style property.
                }
                if (newIndex === 5) {
                    $('.actions > ul > li:first-child').attr('style', 'display:block');
                    var inputElements = document.getElementsByName("step1");
                    for (var a = 0; a < inputElements.length; a++) {
                        if (inputElements[a].checked) {
                            var valueforstep1 = returnvalueforstep1(inputElements[a].value);
                            document.getElementById("Numanserstep1").value = inputElements[a].value;
                            document.getElementById("anserstep1").innerHTML = valueforstep1;
                        }
                    }
                    var inputElements = document.getElementsByName("step2");
                    for (var a = 0; a < inputElements.length; a++) {
                        if (inputElements[a].checked) {
                            var valueforstep2 = returnvalueforstep2(inputElements[a].value);
                            document.getElementById("Numanserstep2").value = inputElements[a].value;
                            document.getElementById("anserstep2").innerHTML = valueforstep2;
                        }
                    }
                    var inputElements = document.getElementsByName("step3");
                    for (var a = 0; a < inputElements.length; a++) {
                        if (inputElements[a].checked) {
                            var valueforstep3 = returnvalueforstep3(inputElements[a].value);
                            document.getElementById("Numanserstep3").value = inputElements[a].value;
                            document.getElementById("anserstep3").innerHTML = valueforstep3
                        }
                    }
                    var inputElements = document.getElementsByName("step4");
                    for (var a = 0; a < inputElements.length; a++) {
                        if (inputElements[a].checked) {
                            var valueforstep4 = returnvalueforstep4(inputElements[a].value);
                            document.getElementById("Numanserstep4").value = inputElements[a].value;
                            document.getElementById("anserstep4").innerHTML = valueforstep4
                        }
                    }
                    /////validations for radio step5 //////////
                    var status = document.getElementById("selectstep5");
                    if (status.value == 0) {
                        document.getElementById("errorstep5").innerHTML = "يرجى اختيار متى استخدمت الحناء قبل الانتقال للخطوة التالية";
                        $('.steps ul li:nth-child(5) a img').attr('src', '/uploads/images/step-active.svg');
                        var sample = document.getElementById("figcaptionid5"); // using VAR
                        // change css style
                        sample.style.color = '#ffffff'; // Changes color, adds style property.
                        $('.steps ul li:nth-child(4) a img').attr('src', '/uploads/images/step-active.svg');
                        var sample = document.getElementById("figcaptionid4"); // using VAR
                        // change css style
                        sample.style.color = '#ffffff'; // Changes color, adds style property.
                        $('.steps ul li:nth-child(3) a img').attr('src', '/uploads/images/step-active.svg');
                        var sample = document.getElementById("figcaptionid3"); // using VAR
                        // change css style
                        sample.style.color = '#ffffff'; // Changes color, adds style property.
                        $('.steps ul li:nth-child(2) a img').attr('src', '/uploads/images/step-active.svg');
                        var sample = document.getElementById("figcaptionid2"); // using VAR
                        // change css style
                        sample.style.color = '#ffffff'; // Changes color, adds style property.
                        $('.steps ul li:first-child a img').attr('src', '/uploads/images/step-active.svg');
                        var sample = document.getElementById("figcaptionid1"); // using VAR
                        // change css style
                        sample.style.color = '#ffffff'; // Changes color, adds style property. 
                        return false;
                    }
                    document.getElementById("anserstep5").innerHTML = status.value;
                    $('.steps ul li:nth-child(6) img').attr('src', '/uploads/images/step-active.svg');
                    var sample = document.getElementById("figcaptionid6"); // using VAR
                    // change css style
                    sample.style.color = '#ffffff'; // Changes color, adds style property.
                    $('.steps ul li:nth-child(5) a img').attr('src', '/uploads/images/step-active.svg');
                    var sample = document.getElementById("figcaptionid5"); // using VAR
                    // change css style
                    sample.style.color = '#ffffff'; // Changes color, adds style property.
                    $('.steps ul li:nth-child(4) a img').attr('src', 'uploads/images/step-active.svg');
                    var sample = document.getElementById("figcaptionid4"); // using VAR
                    // change css style
                    sample.style.color = '#ffffff'; // Changes color, adds style property.
                    $('.steps ul li:nth-child(3) a img').attr('src', 'uploads/images/step-active.svg');
                    var sample = document.getElementById("figcaptionid3"); // using VAR
                    // change css style
                    sample.style.color = '#ffffff'; // Changes color, adds style property.
                    $('.steps ul li:nth-child(2) a img').attr('src', '/uploads/images/step-active.svg');
                    var sample = document.getElementById("figcaptionid2"); // using VAR
                    // change css style
                    sample.style.color = '#ffffff'; // Changes color, adds style property.
                    $('.steps ul li:first-child a img').attr('src', '/uploads/images/step-active.svg');
                    var sample = document.getElementById("figcaptionid1"); // using VAR
                    // change css style
                    sample.style.color = '#ffffff'; // Changes color, adds style property.
                } else {
                    $('.steps ul li:nth-child(6) a img').attr('src', '/uploads/images/step6.svg');
                    var sample = document.getElementById("figcaptionid6"); // using VAR
                    // change css style
                    sample.style.color = '#3a9943'; // Changes color, adds style property.
                }
                ///////////
                if (newIndex === 6) {
                    //////// من اجل اخفاء زر السابق في اخر خطوة ////////////////
                    $('.actions > ul > li:first-child').attr('style', 'display:none');
                    $('.steps ul li:last-child a img').attr('src', '/uploads/images/step-active7.svg');
                    $('.actions ul').addClass('step-6');
                    var sample = document.getElementById("figcaptionid7"); // using VAR
                    // change css style
                    sample.style.color = '#ffffff'; // Changes color, adds style property.
                    $('.steps ul li:nth-child(6) img').attr('src', '/uploads/images/step-active.svg');
                    var sample = document.getElementById("figcaptionid6"); // using VAR
                    // change css style
                    sample.style.color = '#ffffff'; // Changes color, adds style property.
                    $('.steps ul li:nth-child(5) a img').attr('src', '/uploads/images/step-active.svg');
                    var sample = document.getElementById("figcaptionid5"); // using VAR
                    // change css style
                    sample.style.color = '#ffffff'; // Changes color, adds style property.
                    $('.steps ul li:nth-child(4) a img').attr('src', '/uploads/images/step-active.svg');
                    var sample = document.getElementById("figcaptionid4"); // using VAR
                    // change css style
                    sample.style.color = '#ffffff'; // Changes color, adds style property.
                    $('.steps ul li:nth-child(3) a img').attr('src', '/uploads/images/step-active.svg');
                    var sample = document.getElementById("figcaptionid3"); // using VAR
                    // change css style
                    sample.style.color = '#ffffff'; // Changes color, adds style property.
                    $('.steps ul li:nth-child(2) a img').attr('src', '/uploads/images/step-active.svg');
                    var sample = document.getElementById("figcaptionid2"); // using VAR
                    // change css style
                    sample.style.color = '#ffffff'; // Changes color, adds style property.
                    $('.steps ul li:first-child a img').attr('src', '/uploads/images/step-active.svg');
                    var sample = document.getElementById("figcaptionid1"); // using VAR
                    // change css style
                    sample.style.color = '#ffffff'; // Changes color, adds style property.
                    var answer1 = document.getElementById("Numanserstep1").value;
                    var answer2 = document.getElementById("Numanserstep2").value;
                    var answer3 = document.getElementById("Numanserstep3").value;
                    var answer4 = document.getElementById("Numanserstep4").value;
                    var answer5 = document.getElementById("anserstep5").innerHTML;
                    evalaute = {
                        "answer1": answer1,
                        "answer2": answer2,
                        "answer3": answer3,
                        "answer4": answer4,
                        "answer5": answer5
                    };
                    console.log(evalaute);
                    getDataBasedEvaluate(evalaute);
                } else {
                    $('.steps ul li:last-child a img').attr('src', 'uploads/images/step7.svg');
                    $('.actions ul').removeClass('step-6');
                    var sample = document.getElementById("figcaptionid7"); // using VAR
                    // change css style
                    sample.style.color = '#3a9943'; // Changes color, adds style property.
                }
                return true;
            }
        });
        $('.forward').click(function() {
            $("#wizard").steps('next');
        })
        $('.backward').click(function() {
            $("#wizard").steps('previous');
        })
        $('.password i').click(function() {
            if ($('.password input').attr('type') === 'password') {
                $(this).next().attr('type', 'text');
            } else {
                $('.password input').attr('type', 'password');
            }
        })
        $('.steps ul li:first-child').find('a').append('<img class="imgResponsiv1" src="uploads/images/step-active.svg" alt=" ">   <figcaption class="figcaptionResponsiv1" id="figcaptionid1">@lang("site.hair_type_heading")</figcaption> ');
        $('.steps ul li:nth-child(2)').find('a').append('<img class="imgResponsiv1" src="uploads/images/step2.svg" alt="">  <figcaption class="figcaptionResponsiv2" id="figcaptionid2">@lang("site.hanaa_heading")</figcaption>');
        $('.steps ul li:nth-child(3)').find('a').append('<img class="imgResponsiv1" src="uploads/images/step3.svg" alt="">  <figcaption class="figcaptionResponsiv3" id="figcaptionid3" > @lang("site.remove_hair_colo_step")</figcaption>');
        $('.steps ul li:nth-child(4)').find('a').append('<img class="imgResponsiv1" src="uploads/images/step4.svg" alt="">  <figcaption  class="figcaptionResponsiv4" id="figcaptionid4">@lang("site.hair_status_heading")</figcaption>');
        $('.steps ul li:nth-child(5)').find('a').append('<img class="imgResponsiv1" src="uploads/images/step5.svg" alt="">  <figcaption  class="figcaptionResponsiv5" id="figcaptionid5">@lang("site.hair_length_heading")</figcaption>');
        $('.steps ul li:nth-child(6)').find('a').append('<img class="imgResponsiv1" src="uploads/images/step6.svg" alt=""> <figcaption  class="figcaptionResponsiv6"id="figcaptionid6">@lang("site.confirm")</figcaption>');
        $('.steps ul li:last-child a').append('<img class="imgResponsiv1" src="/uploads/images/step7.svg" alt=""> <figcaption  class="figcaptionResponsiv7" id="figcaptionid7">@lang("site.result")</figcaption>');
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
    $(document).ready(function() {
        $("#expandselectchangestep1").hide();
        $("#showselectchangestep1").click(function() {
            $("#expandselectchangestep1").slideToggle();
        });

        $("#expandselectchangestep2").hide();
        $("#showselectchangestep2").click(function() {
            $("#expandselectchangestep2").slideToggle();
        });

        $("#expandselectchangestep3").hide();
        $("#showselectchangestep3").click(function() {
            $("#expandselectchangestep3").slideToggle();
        });

        $("#expandselectchangestep4").hide();
        $("#showselectchangestep4").click(function() {
            $("#expandselectchangestep4").slideToggle();
        });

        $("#expandselectchangestep5").hide();
        $("#showselectchangestep5").click(function() {
            $("#expandselectchangestep5").slideToggle();
        });
    });
    $("#restformquestionnaire").on("click", function() {

        console.error("test rest" + "resetJSteps");
        resetJQuerySteps('#wizard', 7);
    });
    $("body").on("click", "#restformquestionnaireforerrormassge", function() {

        console.error("test rest" + "restformquestionnaireforerrormassge");
        resetJQuerySteps('#wizard', 7);
    });

    function resetJQuerySteps(elementTarget, noOfSteps) {
        var noOfSteps = noOfSteps - 1;
        console.error("test rest from error massge");
        var currentIndex = $(elementTarget).steps("getCurrentIndex");
        console.error("test currentIndex" + currentIndex);
        if (currentIndex >= 1) {
            for (var x = 0; x < currentIndex; x++) {
                $(elementTarget).steps("previous");
                console.error("test currentIndex" + currentIndex);
            }
        }
        setTimeout(function resetHeaderCall() {
            var y, steps;
            for (y = 0, steps = 1; y < noOfSteps; y++) {
                console.error("steps" + steps)
                //console.log(steps);
                try {
                    $(`.steps > ul > li:nth-child(${steps})`).find('a').removeClass("done");
                    $(`.steps > ul > li:nth-child(${steps})`).find('a').removeClass("current");
                    $(`.steps > ul > li:nth-child(${steps})`).find('a').addClass("disabled");
                } catch (err) {
                    console.error("err")
                }
                steps++;
            }
        }, 50);
    }
</script>
<script>
    function copyTextValuestep1() {
        var e = document.getElementById("selectchangestep1");
        var val = e.value;
        var valueforstep1 = returnvalueforstep1(val);
        document.getElementById("Numanserstep1").value = val;
        document.getElementById("anserstep1").innerHTML = valueforstep1;
    }

    function copyTextValuestep2() {
        var e = document.getElementById("selectchangestep2");
        var val = e.value;
        var valueforstep2 = returnvalueforstep2(val);
        document.getElementById("Numanserstep2").value = val;
        document.getElementById("anserstep2").innerHTML = valueforstep2;
    }

    function copyTextValuestep3() {
        var e = document.getElementById("selectchangestep3");
        var val = e.value;
        var valueforstep3 = returnvalueforstep3(val);
        document.getElementById("Numanserstep3").value = val;
        document.getElementById("anserstep3").innerHTML = valueforstep3;
    }

    function copyTextValuestep4() {
        var e = document.getElementById("selectchangestep4");
        var val = e.value;
        var valueforstep4 = returnvalueforstep4(val);
        document.getElementById("Numanserstep4").value = val;
        document.getElementById("anserstep4").innerHTML = valueforstep4;
    }

    function copyTextValuestep5() {
        var e = document.getElementById("selectchangestep5");
        var val = e.value;
        document.getElementById("anserstep5").innerHTML = e.value;
    }

    function returnvalueforstep1(val) {
        if (val == 0) {
            val = "طبيعي";
            return val;
        }
        if (val == 1) {
            val = "مصبوغ";
            return val;
        }
        if (val == 2) {
            val = "مميش";
            return val;
        }
        if (val == 3) {
            val = "مسحوب لونه";
            return val;
        }
    }

    function returnvalueforstep2(val) {
        if (val == 0) {
            val = "لم استخدمه ابدا";
            return val;
        }
        if (val == 1) {
            val = "اقل من 6 اشهر";
            return val;
        }
        if (val == 2) {
            val = "اكثر من 6 اشهر";
            return val;
        }
    }

    function returnvalueforstep3(val) {
        if (val == 0) {
            val = "قبل شهر";
            return val;
        }
        if (val == 1) {
            val = "قبل 6 اشهر";
            return val;
        }
        if (val == 2) {
            val = "قبل سنة";
            return val;
        }
        if (val == 3) {
            val = "قبل سنتين";
            return val;
        }
        if (val == 4) {
            val = "قبل 3 سنوات";
            return val;
        }
        if (val == 5) {
            val = "اكثر من 3 سنوات";
            return val;
        }
        if (val == 6) {
            val = "لم اقم بعمل ميش أو سحب لون ";
            return val;
        }
    }

    function returnvalueforstep4(val) {
        if (val == 0) {
            val = "نعم";
            return val;
        }
        if (val == 1) {
            val = "لا";
            return val;
        }
    }

    function getDataBasedEvaluate(evaluateval) {
        console.log('evaluateval from function', evaluateval);
        var form_evaluate_val = {
            value: evaluateval
        }
        $.ajax({
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '<?php echo url("sales/evaluateProducts"); ?>',
            data: form_evaluate_val,
            success: function(result) {
                var msg = result;
                console.log(msg)
                //
                console.log(msg)
                if (msg.status != false) {
                    var product = `         
                    <div class="py-2 h4" style="margin-bottom: 0px; padding-bottom: 0px; text-align: right; ">
                        <div class=" pt-10 divtitlemodal" style="text-align: center;">
                            <b style="font-family: 'Tajawal'; margin-right: 8px; font-size: 19px; color: #ffffff;">
                                هذه هي الكمية والنوعية المناسبة لشعرك
                            </b>
                        </div>
                    </div>
                    <div class="col-md-12" style=" height: 229px;">
                        <div class="grid-rows">
                            <div class="grid-row grid-row-top-2" style=" background-color: #ffffff;">
                                <div class="grid-cols">
                                    <div class="grid-col grid-col-top-2-1" style=" height: 422px;">
                                        <div class="grid-items">
                                            <div class="grid-item grid-item-top-2-1-1">
                                                <div class="module-products module-products-27 module-products-grid">
                                                    <div class="" style="padding:0px ;">
                                                        <div class="module-item module-item-2">
                                                            <div class="product-grid row" style="margin-bottom: -49px;">
                                                                <!-- product start  -->
                                                                <div class=" product-layout  has-extra-button" style=" margin: auto;width: 33%; height: 152%;">
                                                                    <div class="product-thumb" style="height: 351px;">
                                                                        <div class="product-labels">
                                                                            <span class="product-label product-label-default1 product-label-311">
                                                                                <svg version="1.1" id="Layer_4" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 500 500" style="width: 44px; enable-background:new 0 0 500 500;" xml:space="preserve">
                                                                                    <style type="text/css">
                                                                                        .st11 {
                                                                                            fill: #720000;
                                                                                        }
                                                                                        .st12 {
                                                                                            fill: #990000;
                                                                                        }
                                                                                    </style>
                                                                                    <g>
                                                                                        <g>
                                                                                            //
                                                                                            <path class="st11" d="M432.37,10.38c7.66-0.44,16.96,25.16,23.58,60.8c-13.34,0-26.68,0-40.03,0c0.04-7.6,0.71-18.98,4.01-32.34
                                                                                                    C422.88,26.95,426.87,10.7,432.37,10.38z" />
                                                                                                                                                                    <path class="st11" d="M67.63,10.38c-7.66-0.44-16.96,25.16-23.58,60.8c13.34,0,26.68,0,40.03,0c-0.04-7.6-0.71-18.98-4.01-32.34
                                                                                                        C77.12,26.95,73.13,10.7,67.63,10.38z" />
                                                                                                                                                                    <path class="st12" d="M432.13,10.4c-0.65-0.03-1.32-0.04-2.01-0.04c-0.67,0-1.31,0.01-1.93,0.03H252.84h-5.69H71.81
                                                                                                    c-0.62-0.02-1.27-0.03-1.93-0.03c-0.69,0-1.36,0.02-2.01,0.04c2.7,5.26,4.58,9.68,5.77,12.65c8.62,21.52,10.48,39.92,10.45,48.7
                                                                                                    c-0.01,3.77-0.02,7.53-0.04,11.3h0.04v246.54h-0.02v148.99c0,10.73,13.8,15.19,19.99,6.41c34.94-49.52,88.44-93.34,144.78-94.15
                                                                                                        c58.09-0.84,111.7,43.17,147.06,93.87c6.15,8.82,20.01,4.37,20.01-6.38v-114.1v-34.63V83.05h0.04c-0.01-3.77-0.02-7.54-0.04-11.3
                                                                                                        c-0.03-8.78,1.83-27.18,10.45-48.7C427.55,20.08,429.44,15.65,432.13,10.4z" />
                                                                                                                                                                </g>
                                                                                                                                                            </g>
                                                                                </svg>
                                                                            </span>
                                                                        </div>
                                                                        <div class="product-labels">
                                                                            <span class="product-label product-label-31 product-label-default">
                                                                                <svg version="1.1" id="Layer_4" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 500 500" style=" width: 70px; enable-background:new 0 0 500 500;" xml:space="preserve">
                                                                                    <style type="text/css">
                                                                                        .st5 {
                                                                                            fill: #720000;
                                                                                        }
                                                                                        .st6 {
                                                                                            fill: #990000;
                                                                                        }
                                                                                        .st7 {
                                                                                            fill: #FFFFFF;
                                                                                        }
                                                                                    </style>
                                                                                    <g>
                                                                                        <g>
                                                                                            <g>
                                                                                                <path class="st5" d="M7.97,73.95V9.32h173.62L72.82,74.51C51.2,74.32,29.59,74.14,7.97,73.95z" />
                                                                                                <path class="st5" d="M490.95,318.68V492.3h-65.27c0-21.57,0-43.14,0-64.71C447.44,391.29,469.2,354.98,490.95,318.68z" />
                                                                                                <polygon class="st6" points="490.95,318.12 182.15,9.32 7.64,9.32 490.95,492.64 			" />
                                                                                            </g>
                                                                                            <g>
                                                                                                <path class="st7" d="M252.74,128.53c-1.98-5.94-4.98-10.91-8.99-14.93c-2.85-2.85-5.83-4.53-8.95-5.02
                                                                                                c-3.11-0.5-5.69,0.28-7.72,2.31c-3.67,3.67-3.99,8.82-0.96,15.45c4.54,9.89,6.85,17.82,6.94,23.79
                                                                                                c0.09,5.96-2.02,11.1-6.33,15.41c-5.24,5.24-11.35,7.33-18.33,6.28c-5.7-0.82-10.97-3.64-15.8-8.47
                                                                                                c-5.76-5.76-9.78-13.73-12.05-23.92l8.47-1.48c1.51,6.28,4.86,12.02,10.04,17.2c7.1,7.1,13.65,7.65,19.64,1.66
                                                                                                c4.66-4.66,5-11,1.05-19.03c-4.13-8.44-6.3-15.38-6.5-20.82c-0.21-5.44,1.56-10.02,5.28-13.75c4.42-4.42,9.69-6.26,15.8-5.5
                                                                                                c5.59,0.7,10.94,3.61,16.06,8.73c5.76,5.76,9.37,12.63,10.82,20.6L252.74,128.53z" />
                                                                                                                                                                    <path class="st7" d="M293.94,152.1l7.68,7.68l-35.26,75.24l-8.29-8.29l8.29-16.67l-22.61-22.61l-16.76,8.21l-8.29-8.29
                                                                                                L293.94,152.1z M288,165.71L252.74,183l17.98,17.98L288,165.71z" />
                                                                                                                                                                    <path class="st7" d="M275.52,244.19l55.25-55.25l8.12,8.12l-48.53,48.53l21.38,21.38l-6.72,6.72L275.52,244.19z" />
                                                                                                                                                                    <path class="st7" d="M371.36,229.52l33.69,33.69l-6.72,6.72l-25.58-25.58l-16.5,16.5l21.47,21.47l-6.72,6.72l-21.47-21.47
                                                                                                l-18.59,18.59l26.71,26.71l-6.72,6.72l-34.83-34.83L371.36,229.52z" />
                                                                                                                                                                </g>
                                                                                    </g>
                                                                                    </g>
                                                                                </svg>
                                                                            </span>
                                                                        </div>
                                                                        <div class="image">
                                                                            <div class="quickview-button">
                                                                                <a class="btn btn-quickview" onclick="quickview('424')"><span class="btn-text">Quickview</span></a>
                                                                            </div>
                                                                            <a>
                                                                                <div>
                                                                                    <img src="{{url('uploads/products/thumb/68.jpg')}}" width="500" height="500" alt="" title="" class="img-responsive img-first lazyload lazyloaded" data-ll-status="loaded">
                                                                                </div>
                                                                            </a>
                                                                            <div class="product-labels">
                                                                                <div id="product-labelshover" class="product-label product-label-146 product-label-default">
                                                                                    <div class="wish-group">
                                                                                        <a data-toggle="tooltip" data-tooltip-class="module-products-27 module-products-grid wishlist-tooltip" data-placement="top" title="" onclick="" data-original-title="Add to Wish List"><span class="btn-text">Add to
                                                                                                Wish
                                                                                                List</span>
                                                                                            <svg version="1.1" id="Layer_4" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 500 500" style=" width: 41px;margin-bottom: 10px;    enable-background:new 0 0 500 500;" xml:space="preserve">
                                                                                                <style type="text/css">
                                                                                                    .stWish0 {
                                                                                                        fill: #339933;
                                                                                                    }
                                                                                                    .stWish1 {
                                                                                                        fill: #339933;
                                                                                                    }
                                                                                                </style>
                                                                                                <path class="stWish0" d="M250,121.55v357.93c-3.61-0.04-7.21-1.32-10.22-3.87c-16.04-13.56-31.92-27.29-47.82-41.02
                                                                                                        c-16.49-14.24-33.22-28.22-49.59-42.59c-14.22-12.51-28.54-24.91-42.38-37.86c-10.74-10.05-21.08-20.43-31.09-31.19
                                                                                                        c-20.27-21.74-38.21-45.13-50.03-72.6c-6.71-15.57-11.12-31.79-11.56-49.04c-0.44-17.1-0.76-34.11,3.67-50.78
                                                                                                        c10.32-38.77,31.51-69.17,67.74-88.12c20.15-10.53,41.65-14.98,64.07-13.76c27.89,1.52,52.31,12.06,73.18,30.9
                                                                                                        c12.69,11.45,23.1,24.58,31.82,39.18C248.8,120.42,249.41,121.37,250,121.55z" />
                                                                                                                                                                            <path class="stWish1" d="M492.92,174.84v30.34c-0.17,0.01-0.33,0.02-0.49,0.05c-0.12,16.18-4.93,31.3-11.32,45.88
                                                                                                            c-12.39,28.3-31.29,52.05-52.23,74.5c-26.56,28.5-56.32,53.44-85.58,78.94c-25.96,22.62-52.3,44.76-78.18,67.46
                                                                                                            c-1.66,1.46-3.42,2.83-5.19,4.15c-2.99,2.25-6.47,3.35-9.93,3.31V121.55c0.71,0.26,1.34-0.69,2.58-2.86
                                                                                                            c6.61-11.61,14.57-22.28,23.87-31.74c20.29-20.65,44.36-34.2,73.62-37.6c22.54-2.61,44.19,0.74,64.82,9.73
                                                                                                            c25.39,11.07,44.81,29.11,58.9,52.97c8.11,13.76,13.37,28.56,16.91,44.05c1.39,6.11,1.52,12.31,1.71,18.51l0.18-0.07L492.92,174.84z
                                                                                                                " />
                                                                                            </svg>
                                                                                        </a>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="caption" style="align-items: center;  margin-top: 5px;">
                                                                            <div class="name">
                                                                                <a style="line-height: 0.2;">
                                                                                ${msg.value.name}
                                                                                </a>
                                                                            </div>
                                                                            <div class="name"><a>
                                                                            ${msg.value.titles}
                                                                                </a></div>
                                                                            <div class="description">
                                                                            ${msg.value.description}
                                                                            </div>
                                                                            <ul class="ulclasstable">
                                                                                <li class="liclasstable">${msg.value.quantity}</li>
                                                                                <li class="liclasstable">العدد</li>
                                                                            </ul>
                                                                            <ul class="ulclasstable" style="margin-bottom: 17px; border-bottom: 1px solid #8d8d8d;">
                                                                                <li class="liclasstable" style="color: red;">${msg.value.prices}</li>
                                                                                <li class="liclasstable">السعر</li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="product-grid row" style="text-align: center;    margin-top: 48px; ">
                                                                <div class="buttons-wrapper" style="margin: auto;  display: flex;  flex-direction: row; justify-content: space-around;">
                                                                    <div class="button-group">
                                                                        <div class="row" style=" border: 1px solid;  height: 67px;  width: 720px;  border-color: #e2e2e2; padding: 0px; filter: drop-shadow(2px 1px 1px #e2e2e2);  box-shadow: 1px 2px #e2e2e2;">
                                                                        <div  class="col-6">
                                                                            <ul class="ulclasstable" style="width: 62%;  margin-top: 13px;  margin-left: 107px; height: 36px;">
                                                                                <li class="liclasstable" style="border-left: 1px solid #8d8d8d;  border-right: none;border-bottom: 1px solid #8d8d8d;     text-decoration: line-through;">100.00</li>
                                                                                <li class="liclasstable" style="color: red;  border-left: none;  border-bottom: 1px solid #8d8d8d;">$</li>
                                                                            </ul>
                                                                            </div>
                                                                        <div  class="col-6">
                                                                        <a class="btn btn-cart AddToCart" data-catId="" data-image="{{url('uploads/products/thumb/68.jpg')}}" data-price="" data-id="" data-key="0" data-size="" data-name="" style=" margin-left: -139px;width:243px; margin-top: 12px;  height: 38px;  padding: 5px;  font-size: 15px; background: #339933;">
                                                                                    <span class="btn-text">إضافة الى السلة</span></a>
                                                                        </div>    
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                  
                `;
                    $("#resultDynamic").html(product);
                } else {
                    ///////////////////////////error message for  الشعر الذي عليه حناء///////////////////////////////
                    var errormessage = `  
                    <div class="py-2 h4" style="margin-bottom: 0px; text-align: right; ">
                        <div class=" pt-10 divtitlemodal" style="text-align: center;">
                            <b style="font-family: 'Tajawal'; margin-right: 8px; font-size: 19px; color: #ffffff;">
                                النتيجة
                            </b>
                        </div>
                     </div>
                    <div class="row heightformodal" style=" display: flex; flex-wrap: wrap; flex-direction: row;justify-content: space-between;">
                            <div class="col-md-6 ml-md-3 ml-sm-3  pt-sm-0 pt-3">
                                <img style="height: 424px;     margin-top: 20px;    margin-left: 13px;" class="img-fluid" src="{{ url('uploads/images/girl.png') }}" alt="">
                            </div>
                            <div class="col-md-6">
                                <label class="ml-sm-30" style="text-align: center;  margin-top: 42px;   font-size: 32px;  margin-left: -22px;">
                                    <p style="font-family: 'Tajawal';      margin-right: -19px; font-size: 25px;     color: red; font-weight: 600; ">
                                    ${msg.value}   
                                    </p></span>
                                </label>
                            </div>
                    </div>
                    <div class="row modal-header" style="margin-top: 4px;">
                            <button type="button" class="btn register-button"  id="restformquestionnaireforerrormassge" data-bs-dismiss="modal" aria-label="Close" style=" margin-left: 58px; width: 200px; margin-top: 7px; height: 38px;  padding: 5px;  font-size: 15px; background: #339933;">
                                <span class="btn-text">إغلاق</span></button>
                    </div>
`;
                    $("#resultDynamic").html(errormessage);
                }
                //

            }
        });
    }
</script>
@endsection