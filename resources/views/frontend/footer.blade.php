<!--====================  footer area ====================-->
@php
    $isAuth = auth::guard('customer')->check() ? 1 : 0;
    $authCustomer = auth::guard('customer')->user();
@endphp
<?php $pages = getPages(); ?>
<?php $categories = getCategories(); ?>

<link rel="stylesheet" href="{{ asset('adminpanel/assets/new_frontend/css/footer.css') }}">
<style>

.swal2-styled{
    background-color: #1e7030 !important;
}
.swal2-modal .swal2-spacer{
    height: 0px !important;
}
</style>

<footer style="@if (app()->getLocale() == 'ar') {{ 'direction:rtl;' }} @endif">
    <div class="grid-rows">
        <div class="grid-row grid-row-3" style="margin-top: 38px">
            <div class="grid-cols">
                <div class="grid-col grid-col-2 footerCustomResponsive footerCustomResponsive1">
                    <div class="grid-items">
                        <div class="grid-item grid-item-1">
                            <div class="links-menu links-menu-306" style="font-size: 18px;">
                                <a class="titlefooterhover" href="#">
                                    <h3 class="title module-title"
                                        style="  text-transform: capitalize;  text-align: -webkit-center;">
                                        @lang('site.aboutnarjes')</h3>
                                </a>
                                <ul class="module-body"
                                    style="     display: flex; flex-direction: column; align-content: center;">
                                    <li class="menu-item links-menu-item links-menu-item-1">
                                        <a href="">
                                            @if (app()->getLocale() == 'ar')
                                                <span class="links-text"
                                                    style="    text-align: justify;
                                            margin-left: 62px;">{!! homepage_by_key('story_desc') !!}</span>
                                            @else
                                                <span class="links-text">{!! homepage_by_key('story_desc') !!}</span>
                                            @endif

                                        </a>
                                    </li>
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="grid-col grid-col-2 footerCustomResponsive footerCustomResponsive2">
                    <div class="grid-items">
                        <div class="grid-item grid-item-1">
                            <div class="links-menu links-menu-75" style="font-size: 18px;">
                                <a class="titlefooterhover titlefooterhoverforInformationenpart" href="#">
                                    <h3 class="title module-title"
                                        style=" text-transform: capitalize; text-align: -webkit-center;">
                                        @lang('site.Informationen') </h3>
                                </a>
                                <ul class="module-body"
                                    style="display: flex; flex-direction: column-reverse; align-items: flex-start; margin-left: 29px;">
                                    @foreach ($pages as $page)
                                        @if (
                                            $page->slug != 'AGB' &&
                                                $page->slug != 'Datenschutz' &&
                                                $page->slug != 'Widerrufsrecht' &&
                                                $page->slug != 'AGB für Freunde werben' &&
                                                $page->slug != 'Impressum')
                                            @if ($page->id == 19 || $page->id == 20 || $page->id == 21)
                                                <li class="menu-item links-menu-item links-menu-item-1">
                                                    <a href="{{ route('contactfrontend') }}">
                                                        <span class="links-text">{{ $page->title }}
                                                        </span>
                                                    </a>
                                                </li>
                                            @else
                                                <li class="menu-item links-menu-item links-menu-item-1">
                                                    <a href="<?php echo url('pages/' . $page->slug); ?>">
                                                        <span class="links-text">{{ $page->title }}
                                                        </span>
                                                    </a>
                                                </li>
                                            @endif
                                        @endif
                                    @endforeach

                                </ul>
                            </div>

                        </div>

                    </div>
                </div>
                <div class="grid-col grid-col-2 footerCustomResponsive footerCustomResponsive3">
                    <div class="grid-items">
                        <div class="grid-item grid-item-1">
                            <div class="links-menu links-menu-75" style="font-size: 18px;">
                                <a class="titlefooterhover" href="#">
                                    <h3 class="title module-title"
                                        style="  text-transform: capitalize;  text-align: -webkit-center;">
                                        @lang('site.LegalInformation') </h3>
                                </a>
                                <ul class="module-body"
                                    style="display: flex; flex-direction: column; align-items: flex-start; margin-left: 29px;">
                                    @foreach ($pages as $page)
                                        @if (
                                            $page->slug == 'AGB' ||
                                                $page->slug == 'Datenschutz' ||
                                                $page->slug == 'Widerrufsrecht' ||
                                                $page->slug == 'AGB für Freunde werben' ||
                                                $page->slug == 'Impressum')
                                            <li class="menu-item links-menu-item links-menu-item-1">
                                                <a href="<?php echo url('pages/' . $page->slug); ?>">
                                                    <span class="links-text">{{ $page->title }}
                                                    </span>
                                                </a>
                                            </li>
                                        @endif
                                    @endforeach

                                    <!-- <li class="menu-item links-menu-item links-menu-item-3">
                                        <a href="">
                                            <span class="links-text">Datenschutz</span>
                                        </a>
                                    </li>

                                    <li class="menu-item links-menu-item links-menu-item-4">
                                        <a href="">
                                            <span class="links-text">Widerrufsrecht</span>
                                        </a>
                                    </li> -->
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="grid-col grid-col-2 footerCustomResponsive footerCustomResponsive4">
                    <div class="grid-items">
                        <div class="grid-item grid-item-1">
                            <div class="links-menu links-menu-75"
                                style="@if (app()->getLocale() == 'ar') {{ 'font-size: 18px;' }} {{ 'margin-right: 70px; ' }} @else {{ 'font-size: 18px;' }} {{ 'margin-left: 50px;' }} @endif ">
                                <a class="titlefooterhover titlefooterhoverforProduktepart" href="#">
                                    <h3 class="title module-title"
                                        style=" text-transform: capitalize;  text-align: -webkit-center;">
                                        @lang('site.products')</h3>
                                </a>
                                <ul class="module-body module-bodyforProduktepart">
                                    @foreach ($categories as $category)
                                        <li class="menu-item links-menu-item links-menu-item-1">
                                            <a href="#imageid" style="color: #ffffff;  font-weight: 300;"
                                                class="single-category-Headeritem single-category-Footeritem  catf-{{ $category->id }}   @if ($loop->first) {{ 'CategoryFooteractive' }} @endif "
                                                data-header="" data-rel="{{ $category->id }}"
                                                data-name="@if (!empty($category->translation->name)) {{ $category->translation->name }}@else{{ $category->name }} @endif">
                                                @if (!empty($category->translation->name))
                                                    {{ $category->translation->name }}@else{{ $category->name }}
                                                @endif


                                            </a>
                                            <!-- <a>
                                            <span class="links-text"> @if (!empty($category->translation->name))
{{ $category->translation->name }}@else{{ $category->name }}
@endif
</span>
                                        </a> -->
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="grid-col grid-col-2 footerCustomResponsive footerCustomResponsive5">
                    <div class="grid-items">
                        <div class="grid-item grid-item-1">
                            <div class="links-menu links-menu-306">
                                <a class="titlefooterhover titlefooterhoverforFollowus"
                                    style="@if (app()->getLocale() == 'ar') {{ 'margin-right: 72px;' }} @endif"
                                    href="#">
                                    <h3 class="title module-title"
                                        style="text-transform: capitalize; text-align: -webkit-center; white-space: nowrap;">
                                        @lang('site.follow_us')</h3>
                                </a>
                                <ul class="module-body module-bodyforFollowus">

                                    <li class="menu-item links-menu-item links-menu-item-1">
                                        <a class="st-btn st-first" target="_blank"
                                            href="https://www.youtube.com/channel/UC6fvt2145MKXXvfTiEkY_vQ/playlists"
                                            style="width: 35px;display: inline-block;">
                                            <img alt="sharing button" data-src="{{ url('uploads/homepage/1.png') }}">
                                        </a>
                                    </li>
                                    <li class="menu-item links-menu-item links-menu-item-4">
                                        <a class="st-btn" href="https://www.tiktok.com/@q.narjesalsham" target="_blank"
                                            data-network="youtube" style="width: 35px;display: inline-block;">
                                            <img alt="youtube sharing button"
                                                data-src="{{ url('uploads/homepage/5.png') }}">
                                        </a>
                                    </li>
                                    <li class="menu-item links-menu-item links-menu-item-3">
                                        <a class="st-btn" href="https://www.instagram.com/q.narjesalsham/"
                                            target="_blank" data-network="instagram"
                                            style="width: 35px;display: inline-block;">
                                            <img alt="instagram sharing button"
                                                data-src="{{ url('uploads/homepage/3.png') }}">
                                        </a>
                                    </li>
                                    <li class="menu-item links-menu-item links-menu-item-2">
                                        <a class="st-btn" data-network="facebook" target="_blank"
                                            href="https://www.facebook.com/q.narjesalsham/"
                                            style="width: 35px;display: inline-block;">
                                            <img alt="facebook sharing button"
                                                data-src="{{ url('uploads/homepage/4.png') }}">
                                        </a>
                                    </li>
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="nl-box" class="grid-rows boxSubscribe">
            <div class="inside   dfplex-wrap">
                <span class="img-ct icon icon-xl op1" style="width: 13.7rem; ">
                    <img src="{{ url('uploads/homepage/icon-newsletter.png') }}" alt="">
                </span>
                <div class="text" style="     color: #ffffff;   margin: 24px 1.5rem 0;">
                    <span class="h3 ">@lang('site.Subscribe_to_our_newsletter') </span>
                    <br>
                    <span class=""> @lang('site.Current_offers_novelties_and_promotions') </span>
                </div>
                <form id="subscribeForm"   class="form col-xs-12 col-sm-6" style="margin: 24px 0.5rem 0;">
                    {{ csrf_field() }}
                    <input type="hidden" class="jtl_token" name="jtl_token" value="62835208fa9b65a1f4f9157066b1b15e">
                    <input type="hidden" name="abonnieren" value="2">
                    <div class="form-group">
                        <div class="input-group">
                        <input type="email" size="20" name="email" id="newsletter_email" style=" width: 425px;" class="form-control" placeholder="@lang('site.email')" fdprocessedid="11he0q">
                        <span class="input-group-btn">
                            <button type="submit" class="theme-button-Subscribe" fdprocessedid="5q5k7">
                            <span>@lang('site.subscribe_to')</span>
                            </button>
                        </span>
                        </div>
                    </div>
                    </form>
            </div>
        </div>
    <!-- Modal -->
                <div id="subscribeModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Subscription Status</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p id="subscribeMessage"></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
                    </div>
                    </div>
                </div>
                </div>
        <div class="grid-row grid-row-2">
            <div class="grid-cols">
                <div class="grid-col grid-col-1">
                    <div class="grid-items">
                        <div class="grid-item grid-item-1">
                            <div class="links-menu links-menu-77">
                                <ul class="module-body">
                                    <li class="menu-item links-menu-item links-menu-item-1">
                                        <a>
                                            <span class="links-text">Copyright © 2022, Narjes Alsham, All Rights
                                                Reserved</span>
                                        </a>
                                    </li>

                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="grid-col grid-col-2">
                    <div class="grid-items">
                        <div class="grid-item grid-item-1">
                            <div class="icons-menu icons-menu-228">
                                <ul>
                                    <li class="menu-item icons-menu-item icons-menu-item-1 icon-menu-image">
                                        <a>
                                            <img data-src="{{ url('uploads/homepage/klarna.png') }}" width="70"
                                                height="" alt="Visa - mastercard" class="info-block-img" />
                                            <span class="links-text"> Klarna</span>
                                        </a>
                                    </li>
                                    <li class="menu-item icons-menu-item icons-menu-item-1 icon-menu-image">
                                        <a>
                                            <img data-src="{{ url('uploads/homepage/mastercard.png') }}"
                                                style="padding-top: 13px;" width="50" height=""
                                                alt="Visa - mastercard" class="info-block-img" />
                                            <span class="links-text">mastercard</span>
                                        </a>
                                    </li>
                                    <li class="menu-item icons-menu-item icons-menu-item-2 icon-menu-image">
                                        <a>
                                            <img data-src="{{ url('uploads/homepage/paypal-color-115x30fill.webp') }}"
                                                width="115" height="" alt="PayPal"
                                                class="info-block-img" />
                                            <span class="links-text">PayPal</span>
                                        </a>
                                    </li>
                                    <!-- <li class="menu-item icons-menu-item icons-menu-item-4 icon-menu-image">
                                        <a>
                                            <img src="{{ url('uploads/homepage/logo_band_colored2-115x26fill.webp') }}" width="115" height="" alt="troy - american express" class="info-block-img" />
                                            <span class="links-text">troy - american express</span>
                                        </a>
                                    </li> -->
                                    <li class="menu-item icons-menu-item icons-menu-item-5 icon-menu-image">
                                        <a>
                                            <img data-src="{{ url('uploads/homepage/ssl-Checkout-115x37fill.webp') }}"
                                                width="115" height="" alt="ssl"
                                                class="info-block-img" />
                                            <span class="links-text">ssl</span>
                                        </a>
                                    </li>
                                    <li class="menu-item icons-menu-item icons-menu-item-6 icon-menu-image">
                                        <a>
                                            <img data-src="{{ url('uploads/homepage/money-back-trust-badges-115x22fill.webp') }}"
                                                width="115" height="" alt="money back"
                                                class="info-block-img" />
                                            <span class="links-text">money back</span>
                                        </a>
                                    </li>
                                    <li class="menu-item icons-menu-item icons-menu-item-7 icon-menu-image">
                                        <a>
                                            <img data-src="{{ url('uploads/homepage/satisisfaction1-115x23fill.webp') }}"
                                                width="115" height="" alt="100% satisfaction guaranteed"
                                                class="info-block-img" />
                                            <span class="links-text">100% satisfaction guaranteed</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</footer>
<!-- .site-wrapper --

 <!-- scroll to top   -->
<button class="scroll-top"></button>

<a class="shoppingcart " data-bs-toggle="modal" data-bs-target=".quick-view-modal-containerCart"
    href="javascript:void(0)">
    <span class="CartCount"
        style="color: #fff; position: absolute; text-align: center; border-radius: 50%; width: 15px; top: 0px; height: 15px;background: #990000; margin-right: 17px;">
        <p class="SideCartCount">
            0
        </p>
    </span>
    <svg version="1.1" id="Layer_4" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
        x="0px" y="0px" viewBox="0 0 500 500" style=" width: 53px; enable-background:new 0 0 500 500;"
        xml:space="preserve">
        <style type="text/css">
            .st0shoppingcart {
                fill: #339933;
            }

            .st1shoppingcart {
                fill: #FFFFFF;
            }
        </style>
        <linearGradient id="SVGID_1_" gradientUnits="userSpaceOnUse" x1="47.8694" y1="470.593" x2="489.0555"
            y2="29.407">
            <stop offset="0" style="stop-color:#1E7030" />
            <stop offset="0.9925" style="stop-color:#439A35" />
            <stop offset="1" style="stop-color:#439A35" />
        </linearGradient>
        <path class="st0shoppingcart"
            d="M489.52,470.13H59.56c-16.21,0-29.48-13.26-29.48-29.48V59.35c0-16.21,13.26-29.48,29.48-29.48h429.96V470.13z" />
        <g>
            <path class="st1shoppingcart"
                d="M317.54,131.59c4.18-6.09,9.42-11.11,15.59-15.16c3.46-2.27,7.12-4.18,11.11-5.89
		c-7.04-4.45-14.63-7.45-21.89-11.09c1.98,0.27,3.91,0.68,5.86,1.03c7.32,1.33,14.45,3.18,20.61,7.63c0.71,0.51,1.33,0.26,2.02,0.04
		c5.96-1.85,12.03-3.26,18.21-4.14c2.92-0.42,5.83-0.86,8.85-1.3c-0.2-0.35-0.29-0.55-0.41-0.73c-4.1-6.29-9.46-11.38-15.48-15.76
		c-8.59-6.24-17.88-11.07-28.23-13.75c-10.71-2.77-21.69-3.52-32.62-4.53c-10.21-0.94-19.75-3.85-28.75-8.69h-1.33
		c-1.11,0.84-1.33,1.92-0.94,3.21c2.02,6.71,3.57,13.54,5.28,20.33c3.62,14.35,10,27.2,20.44,37.83
		c5.42,5.51,11.66,9.77,19.24,11.83C316.23,132.77,316.87,132.57,317.54,131.59z" />
            <path class="st1shoppingcart"
                d="M436.55,94.97c-1.09-0.83-2.16-0.58-3.24,0.04c-0.57,0.33-1.18,0.6-1.77,0.89
		c-5.67,2.79-11.64,4.73-17.77,6.18c-12.41,2.92-25.13,3.69-37.73,5.31c-8.56,1.1-17.01,2.62-25.23,5.34
		c-17.01,5.64-29.08,16.66-36.4,33c-8.05,17.97-11.94,36.79-11.79,56.46c0,0.83-0.02,1.66,0,2.49c0.19,7.13,0.4,14.26,2.31,21.21
		c0.24,0.86,0.53,1.69,1.1,2.39c0.65,0.8,1.43,1.23,2.47,0.76c1.04-0.47,1.49-1.27,1.23-2.41c-0.11-0.48-0.2-0.98-0.33-1.46
		c-0.9-3.49-1.39-7.04-1.56-10.64c-0.42-9.06,1.12-17.82,3.98-26.39c2.7-8.07,6.69-15.33,12.85-21.35
		c10.16-9.94,22.98-14.53,36.21-18.37c0.66-0.19,1.12-0.07,1.35,0.54c0.23,0.62-0.31,0.87-0.73,1.12c-0.28,0.17-0.6,0.28-0.9,0.42
		c-4.18,2-8.41,3.89-12.53,6c-12.2,6.24-21.1,15.67-26.76,28.14c-1.3,2.87-2.26,5.89-2.1,9.12c0.15,3.1,1.83,4.25,4.77,3.33
		c0.58-0.18,1.16-0.37,1.72-0.58c3.51-1.33,7.11-2.37,10.79-3.16c10.28-2.21,20.79-2.87,31.14-4.61
		c9.75-1.64,18.92-4.74,27.24-10.16c15.89-10.37,25.92-25.17,32.16-42.76c3.59-10.1,5.6-20.65,8.35-30.98
		c0.58-2.19,1.29-4.34,1.86-6.52C437.59,97.11,437.73,95.87,436.55,94.97z" />
            <path class="st1shoppingcart"
                d="M411.79,178.6c-0.34-0.49-0.91-1.21-1.75-1.97c-3.37,3.09-7,5.9-10.9,8.45c-6.23,4.07-13.1,7.13-20.8,9.24
		h10.95c-5.33,18.72-10.61,37.31-15.92,55.89c-0.11,0.37-0.21,0.74-0.32,1.11h-34.17c0-18.22,0-36.45,0-54.67
		c-1.64,0.02-3.84,0.23-6.33,0.98c-1.87,0.57-3.41,1.3-4.6,1.97c0,17.24,0,34.48,0,51.72h-50.52v-57h20.65
		c0.32-7,1.14-13.92,2.47-20.73c-47.37,0-97.82,0.01-145.19,0.08c-2.85,0.01-3.85-0.78-4.4-3.51c-1.92-9.48-4.09-18.91-6.22-28.36
		c-1.34-5.94-4.88-9.22-10.6-9.25c-20.55-0.11-41.1-0.1-61.65,0.01c-4.38,0.02-7.56,2.44-9.21,6.5
		c-2.78,6.89,2.31,13.93,10.14,13.96c16.67,0.07,33.34,0.06,50.01-0.02c2.01-0.02,2.98,0.46,3.44,2.54
		c11.86,53.71,23.77,107.41,35.76,161.08c0.55,2.47,0.3,3.68-2.15,4.97c-11.56,6.1-17.45,19.19-15.07,32.78
		c2.15,12.32,13.13,22.52,25.93,24.28c6.43,0.89,12.9,0.07,19.62,0.61c-22.02,5.95-27.65,23.7-24.95,37.12
		c2.85,14.15,16.81,25.08,31,24.32c16.38-0.88,28.62-12.59,29.74-29.18c0.05-0.61,0.06-1.22,0.06-1.83c0-0.07,0.01-0.14,0.01-0.2
		c0-0.05-0.01-0.09-0.01-0.14c0-0.72-0.03-1.44-0.09-2.16c-0.01-0.1-0.02-0.21-0.02-0.32c-0.07-0.72-0.16-1.43-0.27-2.15
		c-0.02-0.1-0.03-0.21-0.05-0.32c-0.12-0.71-0.27-1.42-0.44-2.13c-0.02-0.1-0.05-0.19-0.08-0.3c-0.19-0.72-0.4-1.42-0.64-2.12
		c-0.02-0.09-0.06-0.17-0.09-0.26c-0.26-0.72-0.53-1.42-0.84-2.12c-0.02-0.05-0.05-0.12-0.08-0.17c-0.31-0.71-0.65-1.4-1.03-2.08
		c-0.02-0.03-0.04-0.07-0.05-0.1c-0.38-0.68-0.79-1.35-1.23-2.01c-0.04-0.07-0.09-0.14-0.12-0.2c-0.43-0.64-0.89-1.27-1.38-1.87
		c-0.05-0.05-0.08-0.12-0.12-0.17c-0.04-0.05-0.08-0.09-0.11-0.13c-0.12-0.14-0.23-0.27-0.34-0.4c-0.17-0.21-0.34-0.41-0.52-0.61
		c-0.15-0.17-0.3-0.33-0.46-0.5c-0.1-0.12-0.21-0.23-0.32-0.35c-0.04-0.04-0.09-0.08-0.12-0.12c-0.21-0.22-0.43-0.43-0.65-0.64
		c-0.13-0.13-0.26-0.26-0.4-0.39c-0.28-0.26-0.58-0.52-0.86-0.78c-0.06-0.05-0.11-0.09-0.17-0.15c-0.02-0.02-0.04-0.03-0.06-0.05
		c-0.09-0.09-0.19-0.16-0.29-0.24c-0.11-0.09-0.21-0.19-0.33-0.28c-0.11-0.09-0.23-0.18-0.34-0.26c-0.03-0.02-0.07-0.05-0.1-0.08
		c-0.12-0.09-0.24-0.19-0.37-0.28c-0.05-0.05-0.12-0.09-0.17-0.14c-0.13-0.1-0.27-0.2-0.41-0.3c-0.1-0.08-0.2-0.14-0.3-0.21
		c-0.1-0.07-0.2-0.14-0.3-0.21c-0.1-0.07-0.19-0.14-0.3-0.21c-0.04-0.03-0.09-0.06-0.14-0.1c-0.16-0.1-0.33-0.2-0.51-0.31
		c-0.12-0.08-0.26-0.16-0.39-0.24c-0.06-0.04-0.12-0.08-0.18-0.11c-0.05-0.04-0.12-0.06-0.17-0.1c-0.45-0.26-0.91-0.53-1.38-0.78
		c-0.17-0.09-0.34-0.19-0.52-0.28c-0.57-0.29-1.15-0.57-1.75-0.84c-0.02-0.01-0.03-0.02-0.05-0.02c-0.27-0.12-0.55-0.23-0.83-0.36
		c-0.11-0.05-0.23-0.09-0.33-0.14c-0.05-0.02-0.09-0.03-0.12-0.05c-0.07-0.02-0.14-0.05-0.21-0.08c-0.23-0.09-0.46-0.18-0.69-0.26
		c-0.13-0.05-0.27-0.09-0.41-0.15c-0.03-0.01-0.07-0.02-0.11-0.04c-0.16-0.05-0.32-0.11-0.48-0.16c-0.05-0.02-0.12-0.05-0.17-0.06
		c-0.26-0.1-0.54-0.19-0.82-0.26c-0.07-0.02-0.14-0.05-0.21-0.06c-0.06-0.02-0.13-0.04-0.19-0.06c-0.09-0.02-0.18-0.05-0.27-0.08
		c-0.22-0.06-0.45-0.12-0.67-0.18c-0.25-0.07-0.49-0.13-0.74-0.19c-0.52-0.13-1.05-0.26-1.59-0.37H336.5
		c-0.02,0.01-0.05,0.01-0.07,0.02c-20.45,5.15-27.88,21.89-25.34,36.51c2.41,13.87,16.1,25.23,30.55,24.95
		c15.71-0.31,28.1-11.57,30.19-27.61c1.61-12.38-5.26-29.05-26.14-33.92c-0.17-0.04-0.33-0.09-0.5-0.12h0.53
		c5.85,0.02,11.04,0.11,16.22-0.02c5.82-0.14,10.22-4.69,10.2-10.28c-0.03-5.6-4.45-9.99-10.28-10.23
		c-1.03-0.04-2.06-0.01-3.08-0.01h-180.5c-1.13,0-2.29,0.05-3.42-0.05c-5.41-0.45-9.57-4.91-9.57-10.21c0-5.32,4.14-9.78,9.54-10.24
		c1.14-0.1,2.28-0.05,3.42-0.05h180.83c8.21,0,11.19-2.23,13.46-10.19c11.07-38.72,22.08-77.48,33.21-116.18
		c2.42-8.37,4.31-16.89,7.5-25.02c0.15-0.38,0.39-1.06,0.48-1.92C414.02,181.78,412.41,179.48,411.79,178.6z M351.59,409.89
		c0.02,5.54-4.58,10.22-10.13,10.29c-5.68,0.08-10.46-4.7-10.39-10.39c0.07-5.55,4.75-10.15,10.3-10.12
		C346.92,399.69,351.57,404.33,351.59,409.89z M206.36,409.81c0.07,5.54-4.5,10.26-10.05,10.37c-5.68,0.12-10.49-4.62-10.46-10.3
		c0.03-5.55,4.67-10.19,10.22-10.21C201.61,399.64,206.3,404.25,206.36,409.81z M327.95,262.26c0,18.42,0,36.83,0,55.25
		c-16.84-0.02-33.68-0.04-50.52-0.04v-55.21H327.95z M266.5,317.46c-15.63,0-31.26,0.01-46.89,0.02v-55.22h46.89V317.46z
		 M266.5,251.32h-46.89v-57h46.89V251.32z M156.59,194.33h52.08v57h-39.6c-4.17-18.83-8.35-37.65-12.52-56.48
		C156.53,194.74,156.57,194.61,156.59,194.33z M183.13,314.88c-3.86-17.55-7.74-35.08-11.63-52.62h37.18v55.22
		c-7.28,0-14.55,0-21.83,0.01C184.78,317.49,183.64,317.24,183.13,314.88z M355.04,314.53c-0.61,2.18-1.4,2.99-3.86,2.99
		c-4.1-0.01-8.2,0-12.3-0.01c0-18.42,0-36.84,0-55.25h31.05C364.95,279.68,359.96,297.09,355.04,314.53z" />
        </g>
    </svg>
</a>
<a class="chatbtn">
    <svg version="1.1" id="Layer_4" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
        x="0px" y="0px" viewBox="0 0 500 500" style="width: 53px; enable-background:new 0 0 500 500;"
        xml:space="preserve">
        <style type="text/css">
            .st0chat {
                fill: #339933;
            }

            .st1chat {
                fill: url(#SVGID_00000036939609246060658720000005699468334080826298_);
            }

            .st2chat {
                fill: url(#SVGID_00000062168923888826617350000014258631081335134104_);
            }

            .st3chat {
                fill: #FFFFFF;
            }

            .st4chat {
                fill: url(#SVGID_00000180344727284684563690000011100204107475656105_);
            }

            .st5chat {
                fill: url(#SVGID_00000036963031926409586190000014837296162339287463_);
            }

            .st6chat {
                fill: url(#SVGID_00000091008277234325458480000004740476947099197866_);
            }
        </style>
        <path d="M38.26,355.36c-3.83,0.48-13.12,0.02-15.36,0H38.26z" />
        <linearGradient id="SVGID_1_" gradientUnits="userSpaceOnUse" x1="28.4253" y1="330.825" x2="28.4253"
            y2="355.3632">
            <stop offset="0" style="stop-color:#F2AA35" />
            <stop offset="0.4002" style="stop-color:#D19230" />
            <stop offset="1" style="stop-color:#996A28" />
        </linearGradient>
        <path class="st0chat"
            d="M35.01,343.09c0.13,3.6-1.86,6.49-1.86,6.49s-0.34,0.53-0.72,1.02c-0.79,0.99,8.78,3.52,7.29,4.4
	c-0.27,0.16-0.77,0.27-1.47,0.36H22.74c-6.77,0-12.27-5.5-12.27-12.27v-0.13c0.08-6.73,5.54-12.13,12.27-12.13
	c2.05,0,21.3,0,22.88,0.85C49.85,333.95,34.87,339.14,35.01,343.09z" />
        <linearGradient id="SVGID_00000134928023180131869540000004174621954057112468_" gradientUnits="userSpaceOnUse"
            x1="47.8694" y1="470.593" x2="489.0555" y2="29.407">
            <stop offset="0" style="stop-color:#1E7030" />
            <stop offset="0.9925" style="stop-color:#439A35" />
            <stop offset="1" style="stop-color:#439A35" />
        </linearGradient>
        <path class="st0chat"
            d="M489.52,470.13H59.56
	c-16.21,0-29.48-13.26-29.48-29.48V59.35c0-16.21,13.26-29.48,29.48-29.48h429.96V470.13z" />
        <linearGradient id="SVGID_00000091008130340189719820000005515908545185345716_" gradientUnits="userSpaceOnUse"
            x1="250" y1="343.0941" x2="250" y2="432.7838">
            <stop offset="0" style="stop-color:#F2AA35" />
            <stop offset="0.4002" style="stop-color:#D19230" />
            <stop offset="1" style="stop-color:#996A28" />
        </linearGradient>
        <path style="fill:url(#SVGID_00000091008130340189719820000005515908545185345716_);"
            d="M489.52,355.36v77.42H27.27
	c-9.27,0-16.79-7.51-16.79-16.79v-72.9c0,6.77,5.5,12.27,12.27,12.27H489.52z" />
        <path class="st3chat"
            d="M385.97,287.53c19.24-19.49,31.13-46.26,31.13-75.81c0-59.59-48.3-107.89-107.89-107.89
	s-107.89,48.3-107.89,107.89c0,59.59,48.3,107.89,107.89,107.89c19.01,0,36.87-4.92,52.38-13.55l40.17,24.77L385.97,287.53z" />
        <linearGradient id="SVGID_00000033356238846177324160000017038954718714277006_" gradientUnits="userSpaceOnUse"
            x1="298.2069" y1="208.4409" x2="324.0157" y2="208.4409">
            <stop offset="0" style="stop-color:#F2AA35" />
            <stop offset="0.5319" style="stop-color:#D19230" />
            <stop offset="1" style="stop-color:#B17B2B" />
        </linearGradient>
        <circle style="fill:url(#SVGID_00000033356238846177324160000017038954718714277006_);" cx="311.11"
            cy="208.44" r="12.9" />
        <linearGradient id="SVGID_00000114066792067221107280000016384455601302909854_" gradientUnits="userSpaceOnUse"
            x1="96.5484" y1="291.5264" x2="277.6071" y2="110.4677">
            <stop offset="0" style="stop-color:#F2AA35" />
            <stop offset="0.5319" style="stop-color:#D19230" />
            <stop offset="1" style="stop-color:#B17B2B" />
        </linearGradient>
        <path style="fill:url(#SVGID_00000114066792067221107280000016384455601302909854_);"
            d="M201.32,78.87
	c-59.59,0-107.89,48.3-107.89,107.89c0,29.2,11.61,55.69,30.45,75.11l-14.27,42.72l37.27-24.67c15.98,9.36,34.58,14.73,54.43,14.73
	c59.59,0,107.89-48.3,107.89-107.89S260.9,78.87,201.32,78.87z" />
        <g>
            <path class="st3chat" d="M102.42,416.38v-48.8h6.8v42.85h20.75v5.95H102.42z" />
            <path class="st3chat"
                d="M140.17,373.73v-6.87h6.59v6.87H140.17z M140.17,416.38v-35.49h6.59v35.49H140.17z" />
            <path class="st3chat"
                d="M167.16,416.38l-9.49-35.49h7.08l7.51,29.82h2.48l7.72-29.82h6.73l-9.49,35.49H167.16z" />
            <path class="st3chat"
                d="M212.56,417.08c-3.64,0-6.51-0.67-8.61-2.02c-2.1-1.35-3.62-3.36-4.57-6.06c-0.94-2.69-1.42-6.07-1.42-10.13
		c0-4.44,0.63-8.03,1.88-10.77c1.25-2.74,3.01-4.75,5.28-6.02c2.27-1.27,4.98-1.91,8.15-1.91c4.86,0,8.54,1.31,11.01,3.93
		c2.48,2.62,3.72,6.84,3.72,12.64l-0.35,4.46H204.7c0.05,3.4,0.68,5.96,1.91,7.69c1.23,1.72,3.45,2.58,6.66,2.58
		c1.37,0,2.87-0.04,4.5-0.11c1.63-0.07,3.25-0.15,4.85-0.25c1.6-0.09,2.97-0.19,4.11-0.28l0.14,4.96c-1.18,0.19-2.6,0.39-4.25,0.6
		c-1.65,0.21-3.36,0.38-5.14,0.5C215.71,417.02,214.07,417.08,212.56,417.08z M204.7,396.33h16.72c0-4.01-0.65-6.82-1.95-8.43
		c-1.3-1.6-3.36-2.41-6.2-2.41c-2.79,0-4.91,0.83-6.38,2.48C205.43,389.62,204.7,392.41,204.7,396.33z" />
            <path class="st3chat"
                d="M277.66,417.08c-3.68,0-6.72-0.52-9.1-1.56c-2.38-1.04-4.24-2.61-5.56-4.71c-1.32-2.1-2.24-4.72-2.76-7.86
		c-0.52-3.14-0.78-6.76-0.78-10.87c0-4.2,0.26-7.89,0.78-11.05c0.52-3.16,1.45-5.8,2.8-7.9c1.35-2.1,3.2-3.68,5.56-4.75
		s5.41-1.59,9.14-1.59c1.65,0,3.33,0.08,5.03,0.25c1.7,0.17,3.29,0.38,4.78,0.64c1.49,0.26,2.77,0.51,3.86,0.74l-0.28,5.6
		c-0.99-0.19-2.23-0.37-3.72-0.53c-1.49-0.16-3-0.32-4.53-0.46c-1.54-0.14-2.94-0.21-4.21-0.21c-2.55,0-4.63,0.38-6.23,1.13
		c-1.61,0.76-2.85,1.91-3.72,3.47c-0.87,1.56-1.46,3.54-1.77,5.95c-0.31,2.41-0.46,5.31-0.46,8.71c0,3.31,0.15,6.16,0.46,8.57
		c0.31,2.41,0.89,4.38,1.74,5.91c0.85,1.54,2.09,2.67,3.72,3.4c1.63,0.73,3.74,1.1,6.34,1.1c1.98,0,4.14-0.12,6.48-0.35
		c2.34-0.24,4.33-0.5,5.99-0.78l0.21,5.67c-1.13,0.24-2.47,0.47-4,0.71c-1.54,0.24-3.14,0.43-4.82,0.57
		C280.9,417.01,279.26,417.08,277.66,417.08z" />
            <path class="st3chat"
                d="M303.44,416.38V365.8h6.59v16.86c1.23-0.52,2.83-1.06,4.82-1.63c1.98-0.57,3.87-0.85,5.67-0.85
		c3.26,0,5.77,0.58,7.54,1.74c1.77,1.16,2.99,3.02,3.65,5.6c0.66,2.57,0.99,5.94,0.99,10.09v18.77h-6.66v-18.35
		c0-2.93-0.17-5.26-0.5-7.01c-0.33-1.75-0.98-3.01-1.95-3.79s-2.44-1.17-4.43-1.17c-1.65,0-3.34,0.21-5.06,0.64
		c-1.72,0.42-3.08,0.85-4.07,1.27v28.4H303.44z" />
            <path class="st3chat"
                d="M354.58,417.08c-3.35,0-5.9-0.92-7.65-2.76c-1.75-1.84-2.62-4.56-2.62-8.15c0-2.41,0.42-4.36,1.27-5.84
		c0.85-1.49,2.11-2.61,3.79-3.36c1.68-0.75,3.76-1.2,6.27-1.35l10.27-0.99v-2.76c0-2.22-0.5-3.79-1.49-4.71s-2.48-1.38-4.46-1.38
		c-1.23,0-2.67,0.05-4.32,0.14c-1.65,0.09-3.28,0.21-4.89,0.35s-3.05,0.28-4.32,0.42l-0.28-4.82c1.18-0.28,2.58-0.54,4.21-0.78
		c1.63-0.24,3.34-0.45,5.14-0.64c1.79-0.19,3.45-0.28,4.96-0.28c2.79,0,5.08,0.4,6.87,1.2c1.79,0.8,3.12,2.05,3.97,3.75
		c0.85,1.7,1.27,3.9,1.27,6.59v17.42c0.09,0.95,0.48,1.64,1.17,2.09c0.68,0.45,1.55,0.74,2.58,0.89l-0.21,4.89
		c-1.04,0-2.02-0.04-2.94-0.11s-1.76-0.22-2.51-0.46c-0.76-0.19-1.43-0.46-2.02-0.82c-0.59-0.35-1.15-0.77-1.67-1.24
		c-0.85,0.38-1.96,0.78-3.33,1.2c-1.37,0.42-2.83,0.78-4.39,1.06S356.14,417.08,354.58,417.08z M355.93,411.84
		c1.18,0,2.4-0.12,3.65-0.35c1.25-0.24,2.44-0.51,3.58-0.81c1.13-0.31,2.05-0.58,2.76-0.81v-10.62l-9.42,0.92
		c-1.98,0.14-3.4,0.7-4.25,1.67c-0.85,0.97-1.27,2.35-1.27,4.14c0,1.84,0.41,3.28,1.24,4.32
		C353.03,411.32,354.27,411.84,355.93,411.84z" />
            <path class="st3chat"
                d="M398.5,417.15c-2.5,0-4.5-0.38-5.99-1.13s-2.55-2.06-3.19-3.93c-0.64-1.87-0.96-4.5-0.96-7.9v-17.71h-4.82
		v-5.6h4.82v-10.41h6.52v10.41h10.55v5.6h-10.55v15.87c0,2.31,0.11,4.12,0.32,5.42c0.21,1.3,0.65,2.21,1.31,2.73s1.7,0.78,3.12,0.78
		c0.47,0,1.06-0.01,1.77-0.04c0.71-0.02,1.44-0.07,2.2-0.14c0.75-0.07,1.42-0.13,1.98-0.18l0.35,5.38
		c-1.09,0.19-2.36,0.38-3.83,0.57C400.64,417.06,399.44,417.15,398.5,417.15z" />
        </g>
        <circle class="st3chat" cx="201.32" cy="188.13" r="12.9" />
        <circle class="st3chat" cx="248.86" cy="188.13" r="12.9" />
        <linearGradient id="SVGID_00000124150290765686037810000004772938964501001145_" gradientUnits="userSpaceOnUse"
            x1="345.7469" y1="208.4409" x2="371.5558" y2="208.4409">
            <stop offset="0" style="stop-color:#F2AA35" />
            <stop offset="0.5319" style="stop-color:#D19230" />
            <stop offset="1" style="stop-color:#B17B2B" />
        </linearGradient>
        <circle style="fill:url(#SVGID_00000124150290765686037810000004772938964501001145_);" cx="358.65"
            cy="208.44" r="12.9" />
        <circle class="st3chat" cx="154.93" cy="188.13" r="12.9" />
    </svg>
</a>


<div class="giftbtn" data-bs-toggle="modal" data-bs-target=".quick-view-modal-containergift"
    href="javascript:void(0)">

    <svg version="1.1" id="Layer_4" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
        x="0px" y="0px" viewBox="0 0 500 500" style=" width: 30; enable-background:new 0 0 500 500;"
        xml:space="preserve">
        <style type="text/css">
            .st0 {
                fill: #FFFFFF;
            }
        </style>
        <g>
            <path class="st0"
                d="M482.45,128.28c-3.99-12.57-15.07-20.98-28.32-21.2c-11.25-0.17-22.51-0.04-34.35-0.04h-0.23
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
            <path class="st0"
                d="M215.18,228.54c-54.82,0.07-109.64,0.05-164.44,0.05c-0.61,0-1.22,0.05-1.83,0c-1.89-0.13-2.78,0.61-2.75,2.61
		c0.26,14.45-0.46,28.89,0.38,43.34c-0.01,31.16-0.01,62.33-0.01,93.49c-0.01,27.67-0.06,55.33,0.02,83
		c0.05,17.25,10.84,29.92,26.95,31.88c-0.05,0.26,0,0.5,0.13,0.73h146.2c0.02-0.92,0.06-1.83,0.06-2.74
		c0-82.68-0.04-165.36,0.09-248.04C220,228.92,218.45,228.54,215.18,228.54z" />
            <path class="st0"
                d="M453.84,231.19c0.05-2.88-1.83-2.6-3.68-2.6c-55.43,0-110.84,0.02-166.27-0.05c-3.03-0.01-3.85,0.93-3.85,3.88
		c0.09,83.75,0.09,167.48,0.11,251.23h146.2c0.13-0.23,0.17-0.48,0.13-0.74c16.25-1.98,26.95-14.7,26.96-32.34
		c0.04-58.68,0.01-117.35,0-176.04C454.29,260.09,453.55,245.63,453.84,231.19z" />
        </g>
    </svg>
    <span style="color: #ffffff;">
        dein Rabatt Code

    </span>
    <!-- <div class="content">
    I would like to have a div go from collapsed to expanded (and vice versa), but do so from right to left. Most everything I see out there is always left to right.
  </div> -->
</div>


<!-- end of scroll to top -->
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> -->

<!--=============================================
    =            JS files        =
    =============================================-->

<!-- Vendor JS -->
<script src="{{ asset('adminpanel/assets/new_frontend/js/vendors.js') }}"></script>

<!-- Active JS -->
<script src="{{ asset('adminpanel/assets/new_frontend/js/active.js') }}"></script>
<script src="{{ asset('adminpanel/assets/js/lodash.min.js') }}"></script>

<script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI="
    crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-1.9.1.js"></script>
<script src="
https://cdn.jsdelivr.net/npm/magnific-popup@1.1.0/dist/jquery.magnific-popup.min.js
"></script>
<link href="{{ asset('adminpanel/assets/css/plugins/sweetalert/sweetalert.css') }}" rel="stylesheet">
<script src="{{ asset('adminpanel/assets/js/plugins/sweetalert/sweetalert.min.js') }}"></script>
<!-- <script src="https://code.iconify.design/iconify-icon/1.0.3/iconify-icon.min.js"></script> -->

<script>
    /*!
     * jQuery Steps v1.1.0 - 09/04/2014
     * Copyright (c) 2014 Rafael Staib (http://www.jquery-steps.com)
     * Licensed under MIT http://www.opensource.org/licenses/MIT
     */
    ;
    (function($, undefined) {
        $.fn.extend({
            _aria: function(name, value) {
                return this.attr("aria-" + name, value);
            },
            _removeAria: function(name) {
                return this.removeAttr("aria-" + name);
            },
            _enableAria: function(enable) {
                return (enable == null || enable) ? this.removeClass("disabled")._aria("disabled",
                    "false") : this.addClass("disabled")._aria("disabled", "true");
            },
            _showAria: function(show) {
                return (show == null || show) ? this.show()._aria("hidden", "false") : this.hide()
                    ._aria("hidden", "true");
            },
            _selectAria: function(select) {
                return (select == null || select) ? this.addClass("current")._aria("selected", "true") :
                    this.removeClass("current")._aria("selected", "false");
            },
            _id: function(id) {
                return (id) ? this.attr("id", id) : this.attr("id");
            }
        });
        if (!String.prototype.format) {
            String.prototype.format = function() {
                var args = (arguments.length === 1 && $.isArray(arguments[0])) ? arguments[0] : arguments;
                var formattedString = this;
                for (var i = 0; i < args.length; i++) {
                    var pattern = new RegExp("\\{" + i + "\\}", "gm");
                    formattedString = formattedString.replace(pattern, args[i]);
                }
                return formattedString;
            };
        }
        var _uniqueId = 0;
        var _cookiePrefix = "jQu3ry_5teps_St@te_";
        var _tabSuffix = "-t-";
        var _tabpanelSuffix = "-p-";
        var _titleSuffix = "-h-";
        var _indexOutOfRangeErrorMessage = "Index out of range.";
        var _missingCorrespondingElementErrorMessage = "One or more corresponding step {0} are missing.";

        function addStepToCache(wizard, step) {
            getSteps(wizard).push(step);
        }

        function analyzeData(wizard, options, state) {
            var stepTitles = wizard.children(options.headerTag),
                stepContents = wizard.children(options.bodyTag);
            if (stepTitles.length > stepContents.length) {
                throwError(_missingCorrespondingElementErrorMessage, "contents");
            } else if (stepTitles.length < stepContents.length) {
                throwError(_missingCorrespondingElementErrorMessage, "titles");
            }
            var startIndex = options.startIndex;
            state.stepCount = stepTitles.length;
            if (options.saveState && $.cookie) {
                var savedState = $.cookie(_cookiePrefix + getUniqueId(wizard));
                var savedIndex = parseInt(savedState, 0);
                if (!isNaN(savedIndex) && savedIndex < state.stepCount) {
                    startIndex = savedIndex;
                }
            }
            state.currentIndex = startIndex;
            stepTitles.each(function(index) {
                var item = $(this),
                    content = stepContents.eq(index),
                    modeData = content.data("mode"),
                    mode = (modeData == null) ? contentMode.html : getValidEnumValue(contentMode, (/^\s*$/
                        .test(modeData) || isNaN(modeData)) ? modeData : parseInt(modeData, 0)),
                    contentUrl = (mode === contentMode.html || content.data("url") === undefined) ? "" :
                    content.data("url"),
                    contentLoaded = (mode !== contentMode.html && content.data("loaded") === "1"),
                    step = $.extend({}, stepModel, {
                        title: item.html(),
                        content: (mode === contentMode.html) ? content.html() : "",
                        contentUrl: contentUrl,
                        contentMode: mode,
                        contentLoaded: contentLoaded
                    });
                addStepToCache(wizard, step);
            });
        }

        function cancel(wizard) {
            wizard.triggerHandler("canceled");
        }

        function decreaseCurrentIndexBy(state, decreaseBy) {
            return state.currentIndex - decreaseBy;
        }

        function destroy(wizard, options) {
            var eventNamespace = getEventNamespace(wizard);
            wizard.unbind(eventNamespace).removeData("uid").removeData("options").removeData("state").removeData(
                "steps").removeData("eventNamespace").find(".actions a").unbind(eventNamespace);
            wizard.removeClass(options.clearFixCssClass + " vertical");
            var contents = wizard.find(".content > *");
            contents.removeData("loaded").removeData("mode").removeData("url");
            contents.removeAttr("id").removeAttr("role").removeAttr("tabindex").removeAttr("class").removeAttr(
                "style")._removeAria("labelledby")._removeAria("hidden");
            wizard.find(".content > [data-mode='async'],.content > [data-mode='iframe']").empty();
            var wizardSubstitute = $("<{0} class=\"{1}\"></{0}>".format(wizard.get(0).tagName, wizard.attr(
                "class")));
            var wizardId = wizard._id();
            if (wizardId != null && wizardId !== "") {
                wizardSubstitute._id(wizardId);
            }
            wizardSubstitute.html(wizard.find(".content").html());
            wizard.after(wizardSubstitute);
            wizard.remove();
            return wizardSubstitute;
        }

        function finishStep(wizard, state) {
            var currentStep = wizard.find(".steps li").eq(state.currentIndex);
            if (wizard.triggerHandler("finishing", [state.currentIndex])) {
                currentStep.addClass("done").removeClass("error");
                wizard.triggerHandler("finished", [state.currentIndex]);
            } else {
                currentStep.addClass("error");
            }
        }

        function getEventNamespace(wizard) {
            var eventNamespace = wizard.data("eventNamespace");
            if (eventNamespace == null) {
                eventNamespace = "." + getUniqueId(wizard);
                wizard.data("eventNamespace", eventNamespace);
            }
            return eventNamespace;
        }

        function getStepAnchor(wizard, index) {
            var uniqueId = getUniqueId(wizard);
            return wizard.find("#" + uniqueId + _tabSuffix + index);
        }

        function getStepPanel(wizard, index) {
            var uniqueId = getUniqueId(wizard);
            return wizard.find("#" + uniqueId + _tabpanelSuffix + index);
        }

        function getStepTitle(wizard, index) {
            var uniqueId = getUniqueId(wizard);
            return wizard.find("#" + uniqueId + _titleSuffix + index);
        }

        function getOptions(wizard) {
            return wizard.data("options");
        }

        function getState(wizard) {
            return wizard.data("state");
        }

        function getSteps(wizard) {
            return wizard.data("steps");
        }

        function getStep(wizard, index) {
            var steps = getSteps(wizard);
            if (index < 0 || index >= steps.length) {
                throwError(_indexOutOfRangeErrorMessage);
            }
            return steps[index];
        }

        function getUniqueId(wizard) {
            var uniqueId = wizard.data("uid");
            if (uniqueId == null) {
                uniqueId = wizard._id();
                if (uniqueId == null) {
                    uniqueId = "steps-uid-".concat(_uniqueId);
                    wizard._id(uniqueId);
                }
                _uniqueId++;
                wizard.data("uid", uniqueId);
            }
            return uniqueId;
        }

        function getValidEnumValue(enumType, keyOrValue) {
            validateArgument("enumType", enumType);
            validateArgument("keyOrValue", keyOrValue);
            if (typeof keyOrValue === "string") {
                var value = enumType[keyOrValue];
                if (value === undefined) {
                    throwError("The enum key '{0}' does not exist.", keyOrValue);
                }
                return value;
            } else if (typeof keyOrValue === "number") {
                for (var key in enumType) {
                    if (enumType[key] === keyOrValue) {
                        return keyOrValue;
                    }
                }
                throwError("Invalid enum value '{0}'.", keyOrValue);
            } else {
                throwError("Invalid key or value type.");
            }
        }

        function goToNextStep(wizard, options, state) {
            return paginationClick(wizard, options, state, increaseCurrentIndexBy(state, 1));
        }

        function goToPreviousStep(wizard, options, state) {
            return paginationClick(wizard, options, state, decreaseCurrentIndexBy(state, 1));
        }

        function goToStep(wizard, options, state, index) {
            if (index < 0 || index >= state.stepCount) {
                throwError(_indexOutOfRangeErrorMessage);
            }
            if (options.forceMoveForward && index < state.currentIndex) {
                return;
            }
            var oldIndex = state.currentIndex;
            if (wizard.triggerHandler("stepChanging", [state.currentIndex, index])) {
                state.currentIndex = index;
                saveCurrentStateToCookie(wizard, options, state);
                refreshStepNavigation(wizard, options, state, oldIndex);
                refreshPagination(wizard, options, state);
                loadAsyncContent(wizard, options, state);
                startTransitionEffect(wizard, options, state, index, oldIndex, function() {
                    wizard.triggerHandler("stepChanged", [index, oldIndex]);
                });
            } else {
                wizard.find(".steps li").eq(oldIndex).addClass("error");
            }
            return true;
        }

        function increaseCurrentIndexBy(state, increaseBy) {
            return state.currentIndex + increaseBy;
        }

        function initialize(options) {
            var opts = $.extend(true, {}, defaults, options);
            return this.each(function() {
                var wizard = $(this);
                var state = {
                    currentIndex: opts.startIndex,
                    currentStep: null,
                    stepCount: 0,
                    transitionElement: null
                };
                wizard.data("options", opts);
                wizard.data("state", state);
                wizard.data("steps", []);
                analyzeData(wizard, opts, state);
                render(wizard, opts, state);
                registerEvents(wizard, opts);
                if (opts.autoFocus && _uniqueId === 0) {
                    getStepAnchor(wizard, opts.startIndex).focus();
                }
                wizard.triggerHandler("init", [opts.startIndex]);
            });
        }

        function insertStep(wizard, options, state, index, step) {
            if (index < 0 || index > state.stepCount) {
                throwError(_indexOutOfRangeErrorMessage);
            }
            step = $.extend({}, stepModel, step);
            insertStepToCache(wizard, index, step);
            if (state.currentIndex !== state.stepCount && state.currentIndex >= index) {
                state.currentIndex++;
                saveCurrentStateToCookie(wizard, options, state);
            }
            state.stepCount++;
            var contentContainer = wizard.find(".content"),
                header = $("<{0}>{1}</{0}>".format(options.headerTag, step.title)),
                body = $("<{0}></{0}>".format(options.bodyTag));
            if (step.contentMode == null || step.contentMode === contentMode.html) {
                body.html(step.content);
            }
            if (index === 0) {
                contentContainer.prepend(body).prepend(header);
            } else {
                getStepPanel(wizard, (index - 1)).after(body).after(header);
            }
            renderBody(wizard, state, body, index);
            renderTitle(wizard, options, state, header, index);
            refreshSteps(wizard, options, state, index);
            if (index === state.currentIndex) {
                refreshStepNavigation(wizard, options, state);
            }
            refreshPagination(wizard, options, state);
            return wizard;
        }

        function insertStepToCache(wizard, index, step) {
            getSteps(wizard).splice(index, 0, step);
        }

        function keyUpHandler(event) {
            var wizard = $(this),
                options = getOptions(wizard),
                state = getState(wizard);
            if (options.suppressPaginationOnFocus && wizard.find(":focus").is(":input")) {
                event.preventDefault();
                return false;
            }
            var keyCodes = {
                left: 37,
                right: 39
            };
            if (event.keyCode === keyCodes.left) {
                event.preventDefault();
                goToPreviousStep(wizard, options, state);
            } else if (event.keyCode === keyCodes.right) {
                event.preventDefault();
                goToNextStep(wizard, options, state);
            }
        }

        function loadAsyncContent(wizard, options, state) {
            if (state.stepCount > 0) {
                var currentIndex = state.currentIndex,
                    currentStep = getStep(wizard, currentIndex);
                if (!options.enableContentCache || !currentStep.contentLoaded) {
                    switch (getValidEnumValue(contentMode, currentStep.contentMode)) {
                        case contentMode.iframe:
                            wizard.find(".content > .body").eq(state.currentIndex).empty().html("<iframe src=\"" +
                                currentStep.contentUrl + "\" frameborder=\"0\" scrolling=\"no\" />").data(
                                "loaded", "1");
                            break;
                        case contentMode.async:
                            var currentStepContent = getStepPanel(wizard, currentIndex)._aria("busy", "true")
                                .empty().append(renderTemplate(options.loadingTemplate, {
                                    text: options.labels.loading
                                }));
                            $.ajax({
                                url: currentStep.contentUrl,
                                cache: false
                            }).done(function(data) {
                                currentStepContent.empty().html(data)._aria("busy", "false").data("loaded",
                                    "1");
                                wizard.triggerHandler("contentLoaded", [currentIndex]);
                            });
                            break;
                    }
                }
            }
        }

        function paginationClick(wizard, options, state, index) {
            var oldIndex = state.currentIndex;
            if (index >= 0 && index < state.stepCount && !(options.forceMoveForward && index < state
                    .currentIndex)) {
                var anchor = getStepAnchor(wizard, index),
                    parent = anchor.parent(),
                    isDisabled = parent.hasClass("disabled");
                parent._enableAria();
                anchor.click();
                if (oldIndex === state.currentIndex && isDisabled) {
                    parent._enableAria(false);
                    return false;
                }
                return true;
            }
            return false;
        }

        function paginationClickHandler(event) {
            event.preventDefault();
            var anchor = $(this),
                wizard = anchor.parent().parent().parent().parent(),
                options = getOptions(wizard),
                state = getState(wizard),
                href = anchor.attr("href");
            switch (href.substring(href.lastIndexOf("#") + 1)) {
                case "cancel":
                    cancel(wizard);
                    break;
                case "finish":
                    finishStep(wizard, state);
                    break;
                case "next":
                    goToNextStep(wizard, options, state);
                    break;
                case "previous":
                    goToPreviousStep(wizard, options, state);
                    break;
            }
        }

        function refreshPagination(wizard, options, state) {
            if (options.enablePagination) {
                var finish = wizard.find(".actions a[href$='#finish']").parent(),
                    next = wizard.find(".actions  a[href$='#next']").parent();
                if (!options.forceMoveForward) {
                    var previous = wizard.find(".actions a[href$='#previous']").parent();
                    previous._enableAria(state.currentIndex > 0);
                }
                if (options.enableFinishButton && options.showFinishButtonAlways) {
                    finish._enableAria(state.stepCount > 0);
                    next._enableAria(state.stepCount > 1 && state.stepCount > (state.currentIndex + 1));
                } else {
                    finish._showAria(options.enableFinishButton && state.stepCount === (state.currentIndex + 1));
                    next._showAria(state.stepCount === 0 || state.stepCount > (state.currentIndex + 1))._enableAria(
                        state.stepCount > (state.currentIndex + 1) || !options.enableFinishButton);
                }
            }
        }

        function refreshStepNavigation(wizard, options, state, oldIndex) {
            var currentOrNewStepAnchor = getStepAnchor(wizard, state.currentIndex),
                currentInfo = $("<span class=\"current-info audible\">" + options.labels.current + " </span>"),
                stepTitles = wizard.find(".content > .title");
            if (oldIndex != null) {
                var oldStepAnchor = getStepAnchor(wizard, oldIndex);
                oldStepAnchor.parent().addClass("done").removeClass("error")._selectAria(false);
                stepTitles.eq(oldIndex).removeClass("current").next(".body").removeClass("current");
                currentInfo = oldStepAnchor.find(".current-info");
                currentOrNewStepAnchor.focus();
            }
            currentOrNewStepAnchor.prepend(currentInfo).parent()._selectAria().removeClass("done")._enableAria();
            stepTitles.eq(state.currentIndex).addClass("current").next(".body").addClass("current");
        }

        function refreshSteps(wizard, options, state, index) {
            var uniqueId = getUniqueId(wizard);
            for (var i = index; i < state.stepCount; i++) {
                var uniqueStepId = uniqueId + _tabSuffix + i,
                    uniqueBodyId = uniqueId + _tabpanelSuffix + i,
                    uniqueHeaderId = uniqueId + _titleSuffix + i,
                    title = wizard.find(".title").eq(i)._id(uniqueHeaderId);
                wizard.find(".steps a").eq(i)._id(uniqueStepId)._aria("controls", uniqueBodyId).attr("href", "#" +
                    uniqueHeaderId).html(renderTemplate(options.titleTemplate, {
                    index: i + 1,
                    title: title.html()
                }));
                wizard.find(".body").eq(i)._id(uniqueBodyId)._aria("labelledby", uniqueHeaderId);
            }
        }

        function registerEvents(wizard, options) {
            var eventNamespace = getEventNamespace(wizard);
            wizard.bind("canceled" + eventNamespace, options.onCanceled);
            wizard.bind("contentLoaded" + eventNamespace, options.onContentLoaded);
            wizard.bind("finishing" + eventNamespace, options.onFinishing);
            wizard.bind("finished" + eventNamespace, options.onFinished);
            wizard.bind("init" + eventNamespace, options.onInit);
            wizard.bind("stepChanging" + eventNamespace, options.onStepChanging);
            wizard.bind("stepChanged" + eventNamespace, options.onStepChanged);
            if (options.enableKeyNavigation) {
                wizard.bind("keyup" + eventNamespace, keyUpHandler);
            }
            wizard.find(".actions a").bind("click" + eventNamespace, paginationClickHandler);
        }

        function removeStep(wizard, options, state, index) {
            if (index < 0 || index >= state.stepCount || state.currentIndex === index) {
                return false;
            }
            removeStepFromCache(wizard, index);
            if (state.currentIndex > index) {
                state.currentIndex--;
                saveCurrentStateToCookie(wizard, options, state);
            }
            state.stepCount--;
            getStepTitle(wizard, index).remove();
            getStepPanel(wizard, index).remove();
            getStepAnchor(wizard, index).parent().remove();
            if (index === 0) {
                wizard.find(".steps li").first().addClass("first");
            }
            if (index === state.stepCount) {
                wizard.find(".steps li").eq(index).addClass("last");
            }
            refreshSteps(wizard, options, state, index);
            refreshPagination(wizard, options, state);
            return true;
        }

        function removeStepFromCache(wizard, index) {
            getSteps(wizard).splice(index, 1);
        }

        function render(wizard, options, state) {
            var wrapperTemplate = "<{0} class=\"{1}\">{2}</{0}>",
                orientation = getValidEnumValue(stepsOrientation, options.stepsOrientation),
                verticalCssClass = (orientation === stepsOrientation.vertical) ? " vertical" : "",
                contentWrapper = $(wrapperTemplate.format(options.contentContainerTag, "content " + options
                    .clearFixCssClass, wizard.html())),
                stepsWrapper = $(wrapperTemplate.format(options.stepsContainerTag, "steps " + options
                    .clearFixCssClass, "<ul role=\"tablist\"></ul>")),
                stepTitles = contentWrapper.children(options.headerTag),
                stepContents = contentWrapper.children(options.bodyTag);
            wizard.attr("role", "application").empty().append(stepsWrapper).append(contentWrapper).addClass(options
                .cssClass + " " + options.clearFixCssClass + verticalCssClass);
            stepContents.each(function(index) {
                renderBody(wizard, state, $(this), index);
            });
            stepTitles.each(function(index) {
                renderTitle(wizard, options, state, $(this), index);
            });
            refreshStepNavigation(wizard, options, state);
            renderPagination(wizard, options, state);
        }

        function renderBody(wizard, state, body, index) {
            var uniqueId = getUniqueId(wizard),
                uniqueBodyId = uniqueId + _tabpanelSuffix + index,
                uniqueHeaderId = uniqueId + _titleSuffix + index;
            body._id(uniqueBodyId).attr("role", "tabpanel")._aria("labelledby", uniqueHeaderId).addClass("body")
                ._showAria(state.currentIndex === index);
        }

        function renderPagination(wizard, options, state) {
            if (options.enablePagination) {
                var pagination = "<{0} class=\"actions {1}\"><ul role=\"menu\" aria-label=\"{2}\">{3}</ul></{0}>",
                    buttonTemplate = "<li><a  href=\"#{0}\" role=\"menuitem\">{1}</a></li>",
                    buttons = "";
                if (!options.forceMoveForward) {
                    buttons += buttonTemplate.format("previous", options.labels.previous);
                }
                buttons += buttonTemplate.format("next", options.labels.next);
                if (options.enableFinishButton) {
                    buttons += buttonTemplate.format("finish", options.labels.finish);
                }
                if (options.enableCancelButton) {
                    buttons += buttonTemplate.format("cancel", options.labels.cancel);
                }
                wizard.append(pagination.format(options.actionContainerTag, options.clearFixCssClass, options.labels
                    .pagination, buttons));
                refreshPagination(wizard, options, state);
                loadAsyncContent(wizard, options, state);
            }
        }

        function renderTemplate(template, substitutes) {
            var matches = template.match(/#([a-z]*)#/gi);
            for (var i = 0; i < matches.length; i++) {
                var match = matches[i],
                    key = match.substring(1, match.length - 1);
                if (substitutes[key] === undefined) {
                    throwError("The key '{0}' does not exist in the substitute collection!", key);
                }
                template = template.replace(match, substitutes[key]);
            }
            return template;
        }

        function renderTitle(wizard, options, state, header, index) {
            var uniqueId = getUniqueId(wizard),
                uniqueStepId = uniqueId + _tabSuffix + index,
                uniqueBodyId = uniqueId + _tabpanelSuffix + index,
                uniqueHeaderId = uniqueId + _titleSuffix + index,
                stepCollection = wizard.find(".steps > ul"),
                title = renderTemplate(options.titleTemplate, {
                    index: index + 1,
                    title: header.html()
                }),
                stepItem = $("<li role=\"tab\"><a id=\"" + uniqueStepId + "\" href=\"#" + uniqueHeaderId +
                    "\" aria-controls=\"" + uniqueBodyId + "\">" + title + "</a></li>");
            stepItem._enableAria(options.enableAllSteps || state.currentIndex > index);
            if (state.currentIndex > index) {
                stepItem.addClass("done");
            }
            header._id(uniqueHeaderId).attr("tabindex", "-1").addClass("title");
            if (index === 0) {
                stepCollection.prepend(stepItem);
            } else {
                stepCollection.find("li").eq(index - 1).after(stepItem);
            }
            if (index === 0) {
                stepCollection.find("li").removeClass("first").eq(index).addClass("first");
            }
            if (index === (state.stepCount - 1)) {
                stepCollection.find("li").removeClass("last").eq(index).addClass("last");
            }
            stepItem.children("a").bind("click" + getEventNamespace(wizard), stepClickHandler);
        }

        function saveCurrentStateToCookie(wizard, options, state) {
            if (options.saveState && $.cookie) {
                $.cookie(_cookiePrefix + getUniqueId(wizard), state.currentIndex);
            }
        }

        function startTransitionEffect(wizard, options, state, index, oldIndex, doneCallback) {
            var stepContents = wizard.find(".content > .body"),
                effect = getValidEnumValue(transitionEffect, options.transitionEffect),
                effectSpeed = options.transitionEffectSpeed,
                newStep = stepContents.eq(index),
                currentStep = stepContents.eq(oldIndex);
            switch (effect) {
                case transitionEffect.fade:
                case transitionEffect.slide:
                    var hide = (effect === transitionEffect.fade) ? "fadeOut" : "slideUp",
                        show = (effect === transitionEffect.fade) ? "fadeIn" : "slideDown";
                    state.transitionElement = newStep;
                    currentStep[hide](effectSpeed, function() {
                        var wizard = $(this)._showAria(false).parent().parent(),
                            state = getState(wizard);
                        if (state.transitionElement) {
                            state.transitionElement[show](effectSpeed, function() {
                                $(this)._showAria();
                            }).promise().done(doneCallback);
                            state.transitionElement = null;
                        }
                    });
                    break;
                case transitionEffect.slideLeft:
                    var outerWidth = currentStep.outerWidth(true),
                        posFadeOut = (index > oldIndex) ? -(outerWidth) : outerWidth,
                        posFadeIn = (index > oldIndex) ? outerWidth : -(outerWidth);
                    $.when(currentStep.animate({
                        left: posFadeOut
                    }, effectSpeed, function() {
                        $(this)._showAria(false);
                    }), newStep.css("left", posFadeIn + "px")._showAria().animate({
                        left: 0
                    }, effectSpeed)).done(doneCallback);
                    break;
                default:
                    $.when(currentStep._showAria(false), newStep._showAria()).done(doneCallback);
                    break;
            }
        }

        function stepClickHandler(event) {
            event.preventDefault();
            var anchor = $(this),
                wizard = anchor.parent().parent().parent().parent(),
                options = getOptions(wizard),
                state = getState(wizard),
                oldIndex = state.currentIndex;
            if (anchor.parent().is(":not(.disabled):not(.current)")) {
                var href = anchor.attr("href"),
                    position = parseInt(href.substring(href.lastIndexOf("-") + 1), 0);
                goToStep(wizard, options, state, position);
            }
            if (oldIndex === state.currentIndex) {
                getStepAnchor(wizard, oldIndex).focus();
                return false;
            }
        }

        function throwError(message) {
            if (arguments.length > 1) {
                message = message.format(Array.prototype.slice.call(arguments, 1));
            }
            throw new Error(message);
        }

        function validateArgument(argumentName, argumentValue) {
            if (argumentValue == null) {
                throwError("The argument '{0}' is null or undefined.", argumentName);
            }
        }
        $.fn.steps = function(method) {
            if ($.fn.steps[method]) {
                return $.fn.steps[method].apply(this, Array.prototype.slice.call(arguments, 1));
            } else if (typeof method === "object" || !method) {
                return initialize.apply(this, arguments);
            } else {
                $.error("Method " + method + " does not exist on jQuery.steps");
            }
        };
        $.fn.steps.reset = function() {
            var wizard = this,
                options = getOptions(this),
                state = getState(this);
            console.error("test rest currentIndex" + state.currentIndex);

            if (state.currentIndex > 0) {
                goToStep(wizard, options, state, 0);
                console.error("test rest if" + state.currentIndex);
                for (i = 0; i < state.stepCount; i++) {
                    console.error("test rest for" + state.stepCount);
                    var stepAnchor = getStepAnchor(wizard, i);
                    stepAnchor.parent().removeClass("done")._enableAria(false);

                }
            }
        };
        $.fn.steps.add = function(step) {
            var state = getState(this);
            return insertStep(this, getOptions(this), state, state.stepCount, step);
        };
        $.fn.steps.destroy = function() {
            return destroy(this, getOptions(this));
        };
        $.fn.steps.finish = function() {
            finishStep(this, getState(this));
        };
        $.fn.steps.getCurrentIndex = function() {
            return getState(this).currentIndex;
        };
        $.fn.steps.getCurrentStep = function() {
            return getStep(this, getState(this).currentIndex);
        };
        $.fn.steps.getStep = function(index) {
            return getStep(this, index);
        };
        $.fn.steps.insert = function(index, step) {
            return insertStep(this, getOptions(this), getState(this), index, step);
        };
        $.fn.steps.next = function() {
            return goToNextStep(this, getOptions(this), getState(this));
        };
        $.fn.steps.previous = function() {
            return goToPreviousStep(this, getOptions(this), getState(this));
        };
        $.fn.steps.remove = function(index) {
            return removeStep(this, getOptions(this), getState(this), index);
        };
        $.fn.steps.setStep = function(index, step) {
            throw new Error("Not yet implemented!");
        };
        $.fn.steps.skip = function(count) {
            throw new Error("Not yet implemented!");
        };
        var contentMode = $.fn.steps.contentMode = {
            html: 0,
            iframe: 1,
            async: 2
        };
        var stepsOrientation = $.fn.steps.stepsOrientation = {
            horizontal: 0,
            vertical: 1
        };
        var transitionEffect = $.fn.steps.transitionEffect = {
            none: 0,
            fade: 1,
            slide: 2,
            slideLeft: 3
        };
        var stepModel = $.fn.steps.stepModel = {
            title: "",
            content: "",
            contentUrl: "",
            contentMode: contentMode.html,
            contentLoaded: false
        };
        var defaults = $.fn.steps.defaults = {
            headerTag: "h1",
            bodyTag: "div",
            contentContainerTag: "div",
            actionContainerTag: "div",
            stepsContainerTag: "div",
            cssClass: "wizard",
            clearFixCssClass: "clearfix",
            stepsOrientation: stepsOrientation.horizontal,
            titleTemplate: "<span class=\"number\">#index#.</span> #title#",
            loadingTemplate: "<span class=\"spinner\"></span> #text#",
            autoFocus: false,
            enableAllSteps: false,
            enableKeyNavigation: true,
            enablePagination: true,
            suppressPaginationOnFocus: true,
            enableContentCache: true,
            enableCancelButton: false,
            enableFinishButton: true,
            preloadContent: false,
            showFinishButtonAlways: false,
            forceMoveForward: false,
            saveState: false,
            startIndex: 0,
            transitionEffect: transitionEffect.none,
            transitionEffectSpeed: 200,
            onStepChanging: function(event, currentIndex, newIndex) {
                return true;
            },
            onStepChanged: function(event, currentIndex, priorIndex) {},
            onCanceled: function(event) {},
            onFinishing: function(event, currentIndex) {
                return true;
            },
            onFinished: function(event, currentIndex) {},
            onContentLoaded: function(event, currentIndex) {},
            onInit: function(event, currentIndex) {},
            labels: {
                cancel: "Cancel",
                current: "current step:",
                pagination: "Pagination",
                finish: "Finish",
                next: "Next",
                previous: "Previous",
                loading: "Loading ..."
            }
        };
    })(jQuery);
</script>



{{-- cart --}}
<script>
    var cartleng = 0;
    var products = new Array();
    var wishlist = new Array();
    var wishlistcollection = new Array();
    var cart = new Array();
    let evalaute = {};
    const saleId = document.getElementById('saleIdinHome');
    console.log("saleIdFooter", saleId);

    if ($('#saleIdinHome').val() != 0 && $('#saleIdinHome').val() != undefined) {
        var CartCount = parseInt($(".CartCount").text());
        var countOfSale = $('#countOfSale').val();
        var sum = Number(CartCount) + Number(countOfSale);
        $(".CartCount").text(sum);
        $('#countOfSale').val(sum);
        var Items = $('#Items').val();
        console.log("sumFooter", sum);
        console.log("ItemsFooter", Items);



        var total = 0;
        cart = JSON.parse(Items);
        console.log("cartold", cart);
        var cart_htmlfirst = "";
        $.each(cart, function(key, value) {
            value["id"] = value.product_id;
            value["name"] = value.translation.name;
            value["image"] = `/uploads/products/${value.product_id}.jpg`;
            console.log("value", value)
            console.log("value", value.translation.name)
            cart_htmlfirst += `   <div class="single-item">
                                                <div class="image">
                                                ${ saleId.value === 0 ?
                                                        `
                                                        <a href="{{ url('singleproduct/${value.product_id}') }}">
                                                        <img width="90" height="90"
                                                        src="/uploads/products/${value.product_id}.jpg"
                                                            class="img-fluid" alt="">
                                                    </a>
                                                        `
                                                    : 
                                                    `
                                                    <a href="{{ url('singleproduct/${value.product_id}/${saleId.value}') }}">
                                                        <img width="90" height="90"
                                                        src="/uploads/products/${value.product_id}.jpg"
                                                            class="img-fluid" alt="">
                                                    </a>
                                                        `
                                                } 
                                                  
                                                </div>
                                                <div class="content">
                                                    <p class="cart-name"><a href="">${value.translation.name}</a></p>
                                                    <p class="cart-name"><a href="">${ value.size}</a></p>

                                                    ${ value.statusEvaluate === 0  || value.statusEvaluate === 1 || value.statusEvaluate === 2  ? 
                                                        `<p class="cart-quantity" style="line-height: 0;     margin-bottom: -13px;">
                                                        <span class="quantity-mes">${value.quantity} x </span>
                                                        <span class="quantity-mes" style="font-size: 16px; color: #970b0b; font-weight: 700;">${(value.price / value.quantity).toFixed(2)} €</span>
                                                       
                                                        </p>
                                                        
                                                       
                                                        <span style="color: black; font-size: 15px; font-weight: bold; display: block;"> @lang('site.includeVat') </span>
                                                       
                                                       
                                                        
                                                        ` : 
                                                                `<p class="cart-quantity" style="line-height: 0;     margin-bottom: -13px;">
                                                                <span class="quantity-mes">${value.quantity} x </span>
                                                                <span class="quantity-mes" style="font-size: 16px; color: #970b0b; font-weight: 700;">${value.price } €</span>
                                                                </p>
                                                                
                                                       
                                                                    <span style="font-size: 15px; color: black; display: block;  font-weight: bold;" > @lang('site.includeVat') </span>
                                                                    
                                                                 
                                                                `} 
                                                </div>
                                                <a class="remove-icon DeleteItem" data-id="${value.product_id}"><i
                                                        class="ion-close-round"></i></a>
                                                        <div class="stepper" style ="position: absolute;
                                                    bottom: 2px;
                                                    right: 0px;">

                                                <input  type="text"  value="${value.quantity}"  class="form-control">

                                                <span>
                                                <i  class="fa fa-angle-up IncreaseToCart" data-id="${value.id}" data-quantity="${value.quantity}" data-statusEvaluate="${value.statusEvaluate}">


                                                    </i>
                                                    <i class=" fa fa-angle-down DecreaseToCart" data-id="${value.product_id}"  data-quantity="${value.quantity}"  data-statusEvaluate="${value.statusEvaluate}">

                                                    </i>
                                                </span>
                                                </div>
                                            </div>`;

            $("#CartHTML").html(cart_htmlfirst);
            qty = Number(value.quantity);
            cartleng = Number(cartleng) + Number(qty);
            // cartleng = Number(cartleng) + Number(qty);
            if (value.statusEvaluate == 0 || value.statusEvaluate === 1 || value.statusEvaluate === 2 && qty != 1) {
                total = Number(total) + Number(value.price);
            } else {
                total = Number(total) + Number(value.price * qty);
            }
            // total = Number(total) + Number(value.price * qty);
            total = total.toFixed(2);
            console.log("total", total);
        });
        var sum = Number(cartleng);
            console.log("sumsoninFirst", sum)
          $(".CartCount").text(sum);
        $("#total_cost").html(total);

        // show_cartForFirstOrder();
    }

    function show_cartForFirstOrder() {
        $(".quick-view-modal-containerCart").show();
        //   $("body").addClass("overlay");
        // Add event listener to detect clicks outside the modal
    }
    var continueShoppingButton = document.querySelector('.theme-button.continueShopping');
    continueShoppingButton.addEventListener('click', continueShopping);

    function continueShopping() {

        url = '/home/' + saleId.value;
        console.log(url)
        $(location).attr('href', url);
    }
    $(document).on("click", function(event) {
        var target = $(event.target);
        if (target.hasClass("quick-view-modal-containerCart")) {
            $(".quick-view-modal-containerCart").hide();
        }
    });
    $("body").on("click", ".AddToCart", function() {
        const saleId = document.getElementById('saleIdinHome');
        console.log("saleId", saleId.value)

        if (saleId.value == 0) {
            var idProduct = $(this).attr("data-id");
            var quantityInput = document.getElementById("qty" + idProduct);
            console.log("quantityInput" + quantityInput.value);
            var ids = _.map(cart, 'id');
            var item = {
                id: $(this).attr("data-id") + $(this).attr("data-key"),
                product_id: $(this).attr("data-id"),
                price: $(this).attr("data-price"),
                size: $(this).attr("data-size"),
                name: $(this).attr("data-name"),
                codes: $(this).attr("data-codes"),
                image: $(this).attr("data-image"),
                catId: $(this).attr("data-catId"),
                link: $(this).attr("data-link"),
                link: $(this).attr("data-link"),
                Allprices : $(this).attr("data-price"),
            };
            console.log(item);
            if (!_.includes(ids, item.id)) {
                item.quantity = Number(quantityInput.value);
                console.log(" item.quantity" + item.quantity);
                item.p_qty = 1;
                cart.push(item);
            } else {
                var index = _.findIndex(cart, item);
                cart[index].quantity = cart[index].quantity + Number(quantityInput.value)
                console.log("cart.length" + cart.length);
            }




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
                        price: cart.price,
                        catId: cart.catId,
                        statusEvaluate: 3,
                        evaluate: JSON.stringify(evalaute),
                        Allprices: cart.Allprices,
                    }
                })
            };
            console.log(form_dataa)
            $.ajax({
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '<?php echo url('sales/addOrder'); ?>',
                data: form_dataa,
                success: function(msg) {
                    console.log(msg)
                    var idForm = {
                        id: msg.id
                    };
                    var saleIdNew = msg.id;
                    url = '/home/' + saleIdNew;
                    console.log(url)
                    $(location).attr('href', url);

                    // $.ajax({
                    //     type: 'Post',
                    //     headers: {
                    //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    //     },
                    //     url: '<?php echo url('/shoppingcart'); ?>',
                    //     data: idForm,

                    // });

                }
            });



        } else {

            var idProduct = $(this).attr("data-id");
            var quantityInput = document.getElementById("qty" + idProduct);
            console.log("quantityInput" + quantityInput.value);
            var ids = _.map(cart, 'id');
           var product_id1 = $(this).attr("data-id");
           var  size1 = $(this).attr("data-size");
           var  quantity1 = quantityInput.value;
           var  price1 = $(this).attr("data-price");
           var   catId1 = $(this).attr("data-catId");
           var   statusEvaluate1 = 3;
           var   evaluate1 = JSON.stringify(evalaute);
           var   Allprices1 = $(this).attr("data-price");

            var name = "";
            var email = "";
            var phone = "";
            var table_id = "";
            var address = "";
            var comment = "";
            var form_dataa = {
                saleId: saleId.value,
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
                product_id: product_id1,
                size: size1,
                quantity: quantityInput.value,
                price:  price1,
                catId: catId1,
                statusEvaluate: 3,
                evaluate: evaluate1,
                Allprices : Allprices1,
                    }
                })
            };




            $.ajax({
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '<?php echo url('sales/addMoreItemToshoppinCart'); ?>',
                data: form_dataa,
                success: function(msg) {
                    console.log("From addMoreItemToshoppinCart", msg)
                    var idForm = {
                        id: msg.id
                    };
                    var saleIdNew = msg.id;
                //    var url = '/shoppingcart/' + saleIdNew;
                //     console.log(url)
                //     $(location).attr('href', url);

                    // $.ajax({
                    //     type: 'Post',
                    //     headers: {
                    //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    //     },
                    //     url: '<?php echo url('/shoppingcart'); ?>',
                    //     data: idForm,

                    // });

                }
            });
            
            var item = {
                id: $(this).attr("data-id") + $(this).attr("data-key"),
                product_id: $(this).attr("data-id"),
                price: $(this).attr("data-price"),
                size: $(this).attr("data-size"),
                name: $(this).attr("data-name"),
                codes: $(this).attr("data-codes"),
                image: $(this).attr("data-image"),
                catId: $(this).attr("data-catId"),
                link: $(this).attr("data-link"),
                statusEvaluate: 3,
                evaluate: JSON.stringify(evalaute),
                Allprices : $(this).attr("data-price"),
            };
            console.log(item);
            if (!_.includes(ids, item.id)) {
                item.quantity = Number(quantityInput.value);
                console.log(" item.quantity" + item.quantity);
                item.p_qty = 1;
                cart.push(item);
            } else {
                var index = _.findIndex(cart, item);
                cart[index].quantity = cart[index].quantity + Number(quantityInput.value)
                console.log("cart.length" + cart.length);
            }

            show_cart();
        }

        //alert('Successfully Added to Cart')

        $('.quick-view-modal-container').modal('hide');


    });

    // wishlist

    @if (!$isAuth)
        $("body").on("click", ".AddToWishlist", function() {
            window.location.href = "/ulogin";


        });
    @else
        $("body").on("click", ".AddToWishlist", function() {
            var idsw = _.map(wishlistcollection, 'product_id');
            var item = {
                // id: $(this).attr("data-id") + $(this).attr("data-key"),
                product_id: $(this).attr("data-id"),
                // price: $(this).attr("data-price"),
                // size: $(this).attr("data-size"),
                // name: $(this).attr("data-name"),
                // codes: $(this).attr("data-codes"),
                // image: $(this).attr("data-image"),
                // catId: $(this).attr("data-catId"),
                // link :$(this).attr("data-link"),
            };
            var c_id = $("#cId").val();
            console.log(item);
            if (!_.includes(idsw, item.product_id)) {
                item.quantity = 1;
                item.p_qty = 1;
                wishlistcollection.push(item);
            }

            // else {
            //     var index = _.findIndex(wishlistcollection, item);
            //     wishlistcollection[index].quantity = wishlistcollection[index].quantity + 1
            // }
            var form_data_wishlist = {
                customerId: c_id,
                productId: item.product_id,
            };
            $.ajax({
                type: "POST",
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
                url: '<?php echo url('wishlist/addToWishlist'); ?>',
                data: form_data_wishlist,
                success: function(msg) {
                    console.log(msg);
                    if (msg) {
                        $(".wishlistCount").text(wishlistcollection.length);
                    }
                    // $("#valOfSale").val(msg)
                },
            });

        });
    @endif
    $("body").on("click", ".addToCartFromModel", function() {
        const saleId = document.getElementById('saleIdinHome');
        const statusEvaluate = document.getElementById('statusEvaluate');
        console.log("saleIdinHome", saleId.value)
        if (saleId.value == 0) {
            var ids = _.map(cart, 'id');
            var item = {
                id: $(this).attr("data-id") + $(this).attr("data-key"),
                product_id: $(this).attr("data-id"),
                price: $(this).attr("data-price"),
                size: $(this).attr("data-size"),
                name: $(this).attr("data-name"),
                codes: $(this).attr("data-codes"),
                image: $(this).attr("data-image"),
                catId: $(this).attr("data-catId"),
                link: $(this).attr("data-link"),
                quantity: $(this).attr("data-quantity"),
                statusEvaluate: statusEvaluate.value,
                Allprices: $(this).attr("data-Allprices"),
                quantityForOffers: $(this).attr("data-quantity"),
            };
            console.log(item);
            if (!_.includes(ids, item.id)) {
                item.quantity = Number(item.quantity);
                item.p_qty = 1;
                cart.push(item);
            } else {
                console.log("Number(item.quantity)" + Number(item.quantity))
                var index = _.findIndex(cart, item);
                cart[index].quantity = cart[index].quantity + 1
            }

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
                        price: cart.price,
                        catId: cart.catId,
                        statusEvaluate: cart.statusEvaluate,
                        evaluate: JSON.stringify(evalaute),
                        Allprices: cart.Allprices,
                        quantityForOffers: cart.quantityForOffers,
                    }
                })
            };
            console.log(form_dataa)
            // Input is empty
            $.ajax({
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '<?php echo url('sales/addOrder'); ?>',
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
                    //     url: '<?php echo url('/shoppingcart'); ?>',
                    //     data: idForm,

                    // });

                }
            });
        } else {
            var ids = _.map(cart, 'id');
            var item = {
                id: $(this).attr("data-id") + $(this).attr("data-key"),
                product_id: $(this).attr("data-id"),
                price: $(this).attr("data-price"),
                size: $(this).attr("data-size"),
                name: $(this).attr("data-name"),
                codes: $(this).attr("data-codes"),
                image: $(this).attr("data-image"),
                catId: $(this).attr("data-catId"),
                link: $(this).attr("data-link"),
                quantity: $(this).attr("data-quantity"),
                statusEvaluate: statusEvaluate.value,
                Allprices: $(this).attr("data-Allprices"),
                quantityForOffers: $(this).attr("data-quantity"),
            };
            console.log(item);
            if (!_.includes(ids, item.id)) {
                item.quantity = Number(item.quantity);
                item.p_qty = 1;
                cart.push(item);
            } else {
                console.log("Number(item.quantity)" + Number(item.quantity))
                var index = _.findIndex(cart, item);
                cart[index].quantity = cart[index].quantity + 1
            }

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
                saleId: saleId.value,
                evaluate: JSON.stringify(evalaute),
                items: _.map(cart, function(cart) {
                    return {
                        product_id: cart.product_id,
                        size: cart.size,
                        quantity: cart.quantity,
                        price: cart.price,
                        catId: cart.catId,
                        statusEvaluate: cart.statusEvaluate,
                        evaluate: JSON.stringify(evalaute),
                        Allprices: cart.Allprices,
                        quantityForOffers: cart.quantityForOffers,
                    }
                })
            };
            console.log(form_dataa)
            // Input is empty
            $.ajax({
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '<?php echo url('sales/addMoreItemToshoppinCart'); ?>',
                data: form_dataa,
                success: function(msg) {
                    console.log("msg addMoreItemToshoppinCartForEvaluate", msg)
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
                    //     url: '<?php echo url('/shoppingcart'); ?>',
                    //     data: idForm,

                    // });

                }
            });

        }




    });

    $("body").on("click", ".showev", function() {
        var ids = _.map(cart, 'id');
        document.getElementById("data-idQuantityProduct").value = $(this).attr("data-id");
        document.getElementById("data-keyQuantityProduct").value = $(this).attr("data-key");
        document.getElementById("data-priceQuantityProduct").value = $(this).attr("data-price");
        document.getElementById("data-sizeQuantityProduct").value = $(this).attr("data-size");
        document.getElementById("data-nameQuantityProduct").value = $(this).attr("data-name");
        document.getElementById("data-codesQuantityProduct").value = $(this).attr("data-codes");
        document.getElementById("data-imageQuantityProduct").value = $(this).attr("data-image");
        document.getElementById("data-catIdQuantityProduct").value = $(this).attr("data-catId");
        document.getElementById("data-linkQuantityProduct").value = $(this).attr("data-link");
        $('.quick-view-modal-containeralert').modal('show');
        // var item = {
        //     id: $(this).attr("data-id") + $(this).attr("data-key"),
        //     product_id: $(this).attr("data-id"),
        //     price: $(this).attr("data-price"),
        //     size: $(this).attr("data-size"),
        //     name: $(this).attr("data-name"),
        //     codes: $(this).attr("data-codes"),
        //     image: $(this).attr("data-image"),
        //     catId: $(this).attr("data-catId")
        // };
        // console.log(item);
        // if (!_.includes(ids, item.id)) {
        //     item.quantity = 1;
        //     item.p_qty = 1;
        //     cart.push(item);
        // } else {
        //     var index = _.findIndex(cart, item);
        //     cart[index].quantity = cart[index].quantity + 1
        // }
        //alert('Successfully Added to Cart')
        // show_cart();
    });



    $('#btnmodalalert').click(function() {

        var rates = document.getElementsByName('alert');
        const saleId = document.getElementById('saleIdinHome');
        for (var i = 0; i < rates.length; i++) {
            if (rates[i].checked && rates[i].value == 0) {
                $('.quick-view-modal-container').modal('show');
                $('.quick-view-modal-containeralert').modal('hide')
            }

            if (rates[i].checked && rates[i].value == 1) {
                 var statusav = rates[i].value ;
                 console.log("statusav",statusav);
                $('.quick-view-modal-containeralert').modal('hide');
                $('.quick-view-modal-containerQuantityProduct').modal('show');
                //  var quantityInput = document.getElementById("qty" + idProduct).value;
                 var allprices =   document.getElementById("data-priceQuantityProduct").value;
                 console.log("data-price",allprices);
                    // Retrieve the prices from the data attribute
                    var allPrices = JSON.parse(document.getElementById("data-priceQuantityProduct").value);

                    // Get the options container element
                    var optionsContainer = document.getElementById("optionsQuantityProduct");

                    // Create variables to store the selected price and quantity
                    var selectedPrice = null;
                    var selectedQuantity = null;

                    // Iterate over the prices array
                    for (var i = 0; i < allPrices.length; i++) {
                    var price = allPrices[i];

                    // Create the price label element
                    var priceLabel = document.createElement("label");
                    priceLabel.classList.add("containerCustomalert");
                    priceLabel.style.marginTop = "20px";
                    priceLabel.style.display = "flex";
                    priceLabel.style.flexDirection = "row-reverse";
                    priceLabel.style.alignItems = "flex-end";

                    // Create the radio button for the price
                    var radioButton = document.createElement("input");
                    radioButton.type = "radio";
                    radioButton.name = "price";
                    radioButton.value = price;

                    // Create the checkmark span for the price
                    var checkmark = document.createElement("span");
                    checkmark.classList.add("checkmarkCustom");

                    // Create the price text span
                    var priceText = document.createElement("span");
                    priceText.classList.add("beforEvaluateText");
                    @if (app()->getLocale() == 'ar')
                    priceText.textContent =price +  "€" +  ": @lang('site.price') " ;
                    @else
                    priceText.textContent ="@lang('site.price'): " +  price + "€";
                    @endif
                    // Create the quantity span
                    var quantitySpan = document.createElement("span");
                    quantitySpan.classList.add("beforEvaluateText", "quantity");
                    quantitySpan.textContent = "@lang('site.pquantity'): " + (i + 1);
                    quantitySpan.dataset.quantity = i + 1;

                    // Append the elements to the price label
                    priceLabel.appendChild(radioButton);
                    priceLabel.appendChild(checkmark);
                    priceLabel.appendChild(priceText);
                    priceLabel.appendChild(quantitySpan);

                    // Append the price label to the options container
                    optionsContainer.appendChild(priceLabel);

                    // Add event listener to the radio button
                    radioButton.addEventListener("change", function(e) {
                        if (e.target.checked) {
                        selectedPrice = e.target.value;
                        var quantitySpan = e.target.parentElement.querySelector(".beforEvaluateText.quantity");
                        selectedQuantity = parseInt(quantitySpan.dataset.quantity);
                        }
                    });
                    }

                    // Get the "Next" button element
                    var nextButton = document.getElementById("btnmodalQuantityProduct");

                    // Add event listener to the "Next" button
                    nextButton.addEventListener("click", function() {
                    if (selectedPrice !== null && selectedQuantity !== null) {
                        console.log("Selected Price:", selectedPrice);
                        console.log("Selected Quantity:", selectedQuantity);
                         
                // var idProduct = document.getElementById("data-id").value;
                // var quantityInput = document.getElementById("qty" + idProduct);
                // console.log("quantityInputFirst", quantityInput);
                // var quantityInputValue;
                // if (quantityInput == null) {
                //     quantityInputValue = 1;
                // } else {
                //     quantityInputValue = quantityInput.value;
                // }
                var ids = _.map(cart, 'id');
                var item = {
                    id: document.getElementById("data-idQuantityProduct").value,
                    product_id: document.getElementById("data-idQuantityProduct").value,
                    price: selectedPrice,
                    size: document.getElementById("data-sizeQuantityProduct").value,
                    name: document.getElementById("data-nameQuantityProduct").value,
                    codes: document.getElementById("data-codesQuantityProduct").value,
                    image: document.getElementById("data-imageQuantityProduct").value,
                    catId: document.getElementById("data-catIdQuantityProduct").value,
                    statusEvaluate: statusav,
                    evaluate: JSON.stringify(evalaute),
                    Allprices: document.getElementById("data-priceQuantityProduct").value,
                    quantityForOffers: selectedQuantity,
                };
                console.log("item Allprices", item);
                var index = cart.findIndex(function(cartItem) {
                    return cartItem.id === item.id && Number(cartItem.statusEvaluate) === Number(item.statusEvaluate);
                });
                if (index = -1) {
                    // Number(quantityInputValue)
                    item.quantity = selectedQuantity;
                    item.p_qty = 1;
                    cart.push(item);
                } else {
                    // var index = cart.findIndex(function(cartItem) {
                    // return cartItem.id === item.id && Number(cartItem.statusEvaluate)  === Number(item.statusEvaluate);
                    // }); 
                    // var index = _.findIndex(cart, item);
                    console.log("cart", cart)
                    cart[index].quantity = cart[index].quantity + selectedQuantity;

                }

                console.log("saleId", saleId.value)
                if (saleId.value == 0) {

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
                                price: cart.price,
                                catId: cart.catId,
                                statusEvaluate: cart.statusEvaluate,
                                evaluate: JSON.stringify(evalaute),
                                Allprices: cart.Allprices,
                                quantityForOffers: cart.quantityForOffers

                            }
                        })
                    };
                    console.log("form_dataa",form_dataa)
                    $.ajax({
                        type: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: '<?php echo url('sales/addOrder'); ?>',
                        data: form_dataa,
                        success: function(msg) {
                            console.log(msg)
                            var idForm = {
                                id: msg.id
                            };
                            var saleIdNew = msg.id;
                            url = '/home/' + saleIdNew;
                            console.log(url)
                            $(location).attr('href', url);

                            // $.ajax({
                            //     type: 'Post',
                            //     headers: {
                            //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            //     },
                            //     url: '<?php echo url('/shoppingcart'); ?>',
                            //     data: idForm,

                            // });

                        }
                    });

                } else {
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
                        saleId: saleId.value,
                        items: _.map(cart, function(cart) {
                            return {
                                product_id: cart.product_id,
                                size: cart.size,
                                quantity: cart.quantity,
                                price: cart.price,
                                catId: cart.catId,
                                statusEvaluate: cart.statusEvaluate,
                                evaluate: JSON.stringify(evalaute),
                                Allprices: cart.Allprices,
                                quantityForOffers: cart.quantityForOffers
                            }
                        })
                    };
                    console.log("form_dataa",form_dataa)
                    $.ajax({
                        type: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: '<?php echo url('sales/addMoreItemToshoppinCart'); ?>',
                        data: form_dataa,
                        success: function(msg) {
                            console.log(msg)
                            var idForm = {
                                id: msg.id
                            };
                            // var saleIdNew = msg.id;
                            // url = '/home/' + saleIdNew;
                            // console.log(url)
                            // $(location).attr('href', url);

                            // $.ajax({
                            //     type: 'Post',
                            //     headers: {
                            //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            //     },
                            //     url: '<?php echo url('/shoppingcart'); ?>',
                            //     data: idForm,

                            // });

                        }
                    });
                    show_cart();
                }

                $('.quick-view-modal-containerQuantityProduct').modal('hide');
                //alert('Successfully Added to Cart')
                // $('.quick-view-modal-containerCart').modal('show');
                        // Perform further actions with the selected price and quantity
                    } else {
                        console.log("Please select a price and quantity.");
                    }

                    // Reset the selected price and quantity
                    selectedPrice = null;
                    selectedQuantity = null;

                    // Remove all items from the modal
                    optionsContainer.innerHTML = '';
                    });

                    // Get the modal element
                    var modal = document.querySelector(".quick-view-modal-containerQuantityProduct");

                    // Add event listener to the modal close button
                    var closeButton = modal.querySelector(".btn-close");
                    closeButton.addEventListener("click", function() {
                    // Reset the selected price and quantity
                    selectedPrice = null;
                    selectedQuantity = null;

                    // Remove all items from the modal
                    optionsContainer.innerHTML = '';
                    });

                    // Add event listener to the modal background (clicking outside the modal)
                    modal.addEventListener("click", function(e) {
                    if (e.target === modal) {
                        // Reset the selected price and quantity
                        selectedPrice = null;
                        selectedQuantity = null;

                        // Remove all items from the modal
                        optionsContainer.innerHTML = '';
                    }
                    });



               

            }

            if (rates[i].checked && rates[i].value == 2) {

                var statusav = rates[i].value ;
                 console.log("statusav",statusav);
                $('.quick-view-modal-containeralert').modal('hide');
                $('.quick-view-modal-containerQuantityProduct').modal('show');
                //  var quantityInput = document.getElementById("qty" + idProduct).value;
                 var allprices =   document.getElementById("data-priceQuantityProduct").value;
                 console.log("data-price",allprices);
                    // Retrieve the prices from the data attribute
                    var allPrices = JSON.parse(document.getElementById("data-priceQuantityProduct").value);

                    // Get the options container element
                    var optionsContainer = document.getElementById("optionsQuantityProduct");

                    // Create variables to store the selected price and quantity
                    var selectedPrice = null;
                    var selectedQuantity = null;

                    // Iterate over the prices array
                    for (var i = 0; i < allPrices.length; i++) {
                    var price = allPrices[i];

                    // Create the price label element
                    var priceLabel = document.createElement("label");
                    priceLabel.classList.add("containerCustomalert");
                    priceLabel.style.marginTop = "20px";
                    priceLabel.style.display = "flex";
                    priceLabel.style.flexDirection = "row-reverse";
                    priceLabel.style.alignItems = "flex-end";

                    // Create the radio button for the price
                    var radioButton = document.createElement("input");
                    radioButton.type = "radio";
                    radioButton.name = "price";
                    radioButton.value = price;

                    // Create the checkmark span for the price
                    var checkmark = document.createElement("span");
                    checkmark.classList.add("checkmarkCustom");

                    // Create the price text span
                    var priceText = document.createElement("span");
                    priceText.classList.add("beforEvaluateText");
                    priceText.textContent ="@lang('site.price'): " +  price;

                    // Create the quantity span
                    var quantitySpan = document.createElement("span");
                    quantitySpan.classList.add("beforEvaluateText", "quantity");
                    quantitySpan.textContent = "@lang('site.pquantity'): " + (i + 1);
                    quantitySpan.dataset.quantity = i + 1;

                    // Append the elements to the price label
                    priceLabel.appendChild(radioButton);
                    priceLabel.appendChild(checkmark);
                    priceLabel.appendChild(priceText);
                    priceLabel.appendChild(quantitySpan);

                    // Append the price label to the options container
                    optionsContainer.appendChild(priceLabel);

                    // Add event listener to the radio button
                    radioButton.addEventListener("change", function(e) {
                        if (e.target.checked) {
                        selectedPrice = e.target.value;
                        var quantitySpan = e.target.parentElement.querySelector(".beforEvaluateText.quantity");
                        selectedQuantity = parseInt(quantitySpan.dataset.quantity);
                        }
                    });
                    }

                    // Get the "Next" button element
                    var nextButton = document.getElementById("btnmodalQuantityProduct");

                    // Add event listener to the "Next" button
                    nextButton.addEventListener("click", function() {
                    if (selectedPrice !== null && selectedQuantity !== null) {
                        console.log("Selected Price:", selectedPrice);
                        console.log("Selected Quantity:", selectedQuantity);
                         
                // var idProduct = document.getElementById("data-id").value;
                // var quantityInput = document.getElementById("qty" + idProduct);
                // console.log("quantityInputFirst", quantityInput);
                // var quantityInputValue;
                // if (quantityInput == null) {
                //     quantityInputValue = 1;
                // } else {
                //     quantityInputValue = quantityInput.value;
                // }
                var ids = _.map(cart, 'id');
                var item = {
                    id: document.getElementById("data-idQuantityProduct").value,
                    product_id: document.getElementById("data-idQuantityProduct").value,
                    price: selectedPrice,
                    size: document.getElementById("data-sizeQuantityProduct").value,
                    name: document.getElementById("data-nameQuantityProduct").value,
                    codes: document.getElementById("data-codesQuantityProduct").value,
                    image: document.getElementById("data-imageQuantityProduct").value,
                    catId: document.getElementById("data-catIdQuantityProduct").value,
                    statusEvaluate: statusav,
                    evaluate: JSON.stringify(evalaute),
                    Allprices: document.getElementById("data-priceQuantityProduct").value,
                    quantityForOffers: selectedQuantity,
                };
                console.log("item Allprices", item);
                var index = cart.findIndex(function(cartItem) {
                    return cartItem.id === item.id && Number(cartItem.statusEvaluate) === Number(item.statusEvaluate);
                });
                if (index = -1) {
                    // Number(quantityInputValue)
                    item.quantity = selectedQuantity;
                    item.p_qty = 1;
                    cart.push(item);
                } else {
                    // var index = cart.findIndex(function(cartItem) {
                    // return cartItem.id === item.id && Number(cartItem.statusEvaluate)  === Number(item.statusEvaluate);
                    // }); 
                    // var index = _.findIndex(cart, item);
                    console.log("cart", cart)
                    cart[index].quantity = cart[index].quantity + selectedQuantity;

                }

                console.log("saleId", saleId.value)
                if (saleId.value == 0) {

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
                                price: cart.price,
                                catId: cart.catId,
                                statusEvaluate: cart.statusEvaluate,
                                evaluate: JSON.stringify(evalaute),
                                Allprices: cart.Allprices,
                                quantityForOffers: cart.quantityForOffers

                            }
                        })
                    };
                    console.log("form_dataa",form_dataa)
                    $.ajax({
                        type: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: '<?php echo url('sales/addOrder'); ?>',
                        data: form_dataa,
                        success: function(msg) {
                            console.log(msg)
                            var idForm = {
                                id: msg.id
                            };
                            var saleIdNew = msg.id;
                            url = '/home/' + saleIdNew;
                            console.log(url)
                            $(location).attr('href', url);

                            // $.ajax({
                            //     type: 'Post',
                            //     headers: {
                            //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            //     },
                            //     url: '<?php echo url('/shoppingcart'); ?>',
                            //     data: idForm,

                            // });

                        }
                    });

                } else {
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
                        saleId: saleId.value,
                        items: _.map(cart, function(cart) {
                            return {
                                product_id: cart.product_id,
                                size: cart.size,
                                quantity: cart.quantity,
                                price: cart.price,
                                catId: cart.catId,
                                statusEvaluate: cart.statusEvaluate,
                                evaluate: JSON.stringify(evalaute),
                                Allprices: cart.Allprices,
                                quantityForOffers: cart.quantityForOffers
                            }
                        })
                    };
                    console.log("form_dataa",form_dataa)
                    $.ajax({
                        type: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: '<?php echo url('sales/addMoreItemToshoppinCart'); ?>',
                        data: form_dataa,
                        success: function(msg) {
                            console.log(msg)
                            var idForm = {
                                id: msg.id
                            };
                            // var saleIdNew = msg.id;
                            // url = '/home/' + saleIdNew;
                            // console.log(url)
                            // $(location).attr('href', url);

                            // $.ajax({
                            //     type: 'Post',
                            //     headers: {
                            //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            //     },
                            //     url: '<?php echo url('/shoppingcart'); ?>',
                            //     data: idForm,

                            // });

                        }
                    });
                    show_cart();
                }

                $('.quick-view-modal-containerQuantityProduct').modal('hide');
                //alert('Successfully Added to Cart')
                // $('.quick-view-modal-containerCart').modal('show');
                        // Perform further actions with the selected price and quantity
                    } else {
                        console.log("Please select a price and quantity.");
                    }

                    // Reset the selected price and quantity
                    selectedPrice = null;
                    selectedQuantity = null;

                    // Remove all items from the modal
                    optionsContainer.innerHTML = '';
                    });

                    // Get the modal element
                    var modal = document.querySelector(".quick-view-modal-containerQuantityProduct");

                    // Add event listener to the modal close button
                    var closeButton = modal.querySelector(".btn-close");
                    closeButton.addEventListener("click", function() {
                    // Reset the selected price and quantity
                    selectedPrice = null;
                    selectedQuantity = null;

                    // Remove all items from the modal
                    optionsContainer.innerHTML = '';
                    });

                    // Add event listener to the modal background (clicking outside the modal)
                    modal.addEventListener("click", function(e) {
                    if (e.target === modal) {
                        // Reset the selected price and quantity
                        selectedPrice = null;
                        selectedQuantity = null;

                        // Remove all items from the modal
                        optionsContainer.innerHTML = '';
                    }
                    });
                // $('.quick-view-modal-containeralert').modal('hide')
                // var idProduct = document.getElementById("data-id").value;
                // var quantityInput = document.getElementById("qty" + idProduct);

                // var quantityInputValue;
                // if (quantityInput == null) {
                //     quantityInputValue = 1;
                // } else {
                //     quantityInputValue = quantityInput.value;
                // }
                // var ids = _.map(cart, 'id');
                // var item = {
                //     id: document.getElementById("data-id").value,
                //     product_id: document.getElementById("data-id").value,
                //     price: document.getElementById("data-price").value,
                //     size: document.getElementById("data-size").value,
                //     name: document.getElementById("data-name").value,
                //     codes: document.getElementById("data-codes").value,
                //     image: document.getElementById("data-image").value,
                //     catId: document.getElementById("data-catId").value,
                //     link: document.getElementById("data-link").value,
                //     statusEvaluate: rates[i].value,
                //     evaluate: JSON.stringify(evalaute)
                // };
                // console.log(item);
                // var index = cart.findIndex(function(cartItem) {
                //     return cartItem.id === item.id && Number(cartItem.statusEvaluate) === Number(item
                //         .statusEvaluate);
                // });
                // if (index = -1) {
                //     item.quantity = Number(quantityInputValue);;
                //     item.p_qty = 1;
                //     cart.push(item);
                // } else {
                //     console.log("cart", cart);
                //     // var index = _.findIndex(cart, item);
                //     cart[index].quantity = cart[index].quantity + Number(quantityInputValue);;
                // }
                // //alert('Successfully Added to Cart')
                // console.log("saleId", saleId.value)
                // if (saleId.value == 0) {

                //     // $(this).parent(".holdt").remove();    
                //     var msg = "";
                //     if (cart.length < 1) {
                //         alert("لم تقم بطلب أي منتج");
                //         return false;
                //     }
                //     var name = "";
                //     var email = "";
                //     var phone = "";
                //     var table_id = "";
                //     var address = "";
                //     var comment = "";
                //     var form_dataa = {
                //         name: name,
                //         email: email,
                //         phone: phone,
                //         table_id: table_id,
                //         address: address,
                //         comment: comment,
                //         type: "preOrder",
                //         status: -2,
                //         delivery_cost: 0,
                //         discount: 0,
                //         vat: 0,
                //         evaluate: JSON.stringify(evalaute),
                //         total_cost: $("#total_cost").val(),
                //         items: _.map(cart, function(cart) {
                //             return {
                //                 product_id: cart.product_id,
                //                 size: cart.size,
                //                 quantity: cart.quantity,
                //                 price: cart.price,
                //                 catId: cart.catId,
                //                 statusEvaluate: cart.statusEvaluate,
                //                 evaluate: JSON.stringify(evalaute),
                //             }
                //         })
                //     };
                //     console.log(form_dataa)
                //     $.ajax({
                //         type: 'POST',
                //         headers: {
                //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                //         },
                //         url: '<?php echo url('sales/addOrder'); ?>',
                //         data: form_dataa,
                //         success: function(msg) {
                //             console.log(msg)
                //             var idForm = {
                //                 id: msg.id
                //             };
                //             var saleIdNew = msg.id;
                //             url = '/home/' + saleIdNew;
                //             console.log(url)
                //             $(location).attr('href', url);

                //             // $.ajax({
                //             //     type: 'Post',
                //             //     headers: {
                //             //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                //             //     },
                //             //     url: '<?php echo url('/shoppingcart'); ?>',
                //             //     data: idForm,

                //             // });

                //         }
                //     });

                // } else {
                //     // $(this).parent(".holdt").remove();    
                //     var msg = "";
                //     if (cart.length < 1) {
                //         alert("لم تقم بطلب أي منتج");
                //         return false;
                //     }
                //     var name = "";
                //     var email = "";
                //     var phone = "";
                //     var table_id = "";
                //     var address = "";
                //     var comment = "";
                //     var form_dataa = {
                //         name: name,
                //         email: email,
                //         phone: phone,
                //         table_id: table_id,
                //         address: address,
                //         comment: comment,
                //         type: "preOrder",
                //         status: -2,
                //         delivery_cost: 0,
                //         discount: 0,
                //         vat: 0,
                //         evaluate: JSON.stringify(evalaute),
                //         total_cost: $("#total_cost").val(),
                //         saleId: saleId.value,
                //         items: _.map(cart, function(cart) {
                //             return {
                //                 product_id: cart.product_id,
                //                 size: cart.size,
                //                 quantity: cart.quantity,
                //                 price: cart.price,
                //                 catId: cart.catId,
                //                 statusEvaluate: cart.statusEvaluate,
                //                 evaluate: JSON.stringify(evalaute),
                //             }
                //         })
                //     };
                //     console.log(form_dataa)
                //     $.ajax({
                //         type: 'POST',
                //         headers: {
                //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                //         },
                //         url: '<?php echo url('sales/addMoreItemToshoppinCart'); ?>',
                //         data: form_dataa,
                //         success: function(msg) {
                //             console.log(msg)
                //             var idForm = {
                //                 id: msg.id
                //             };
                //             // var saleIdNew = msg.id;
                //             // url = '/home/' + saleIdNew;
                //             // console.log(url)
                //             // $(location).attr('href', url);

                //             // $.ajax({
                //             //     type: 'Post',
                //             //     headers: {
                //             //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                //             //     },
                //             //     url: '<?php echo url('/shoppingcart'); ?>',
                //             //     data: idForm,

                //             // });

                //         }
                //     });
                //     show_cart();

                // }



                // // $('.quick-view-modal-containerCart').modal('show');


            }
        }
    });
    $('#btnmodalQuantityProduct').click(function() {

    });
    function show_cart() {
        var cartleng = 0;
        if (cart.length > 0) {
            console.log("true1")
            var qty = 0;
            var total = 0;
            var cart_html = "";
            var obj = cart;
            console.log("obj", obj);
            $.each(obj, function(key, value) {
                console.log("cartnew", cart);
                console.log("value", value)

                if (value.statusEvaluate == 0) {
                    console.log("value.Allprices", value.Allprices)
                    var Allprices = value.Allprices;                   
                    var pricesArray = Allprices.split(",");                  
                    console.log("pricesArray", pricesArray)
                    var ItemsForstatusEvaluate = $('#Items').val();
                    cartForstatusEvaluate = JSON.parse(ItemsForstatusEvaluate);
                    console.log("cartForstatusEvaluate", cartForstatusEvaluate);

                    var indexForstatusEvaluate = _.findIndex(cartForstatusEvaluate, {
                        product_id: value.product_id
                    });
                    console.log("indexForstatusEvaluate", indexForstatusEvaluate);
                    // var indexForstatusEvaluate = _.findIndex(cart, ItemsForstatusEvaluate);

                    console.log("cartForstatusEvaluate[indexForstatusEvaluate]", cartForstatusEvaluate[
                        indexForstatusEvaluate]);
                    console.log("cartForstatusEvaluate[indexForstatusEvaluate].quantity", cartForstatusEvaluate[
                        indexForstatusEvaluate].quantity);

                    if (value.quantity != cartForstatusEvaluate[indexForstatusEvaluate].quantity) {
                        // cart[index].quantity = cartForstatusEvaluate[indexForstatusEvaluate].quantity;
                        console.log("value.quantity != cartForstatusEvaluate[indexForstatusEvaluate].quantity")
                    }
                }
                if ( Number(value.statusEvaluate)  === 1 ||  Number(value.statusEvaluate)  === 2) 
                {
                    console.log("value.Allprices", value.Allprices)
                    var Allprices = value.Allprices;
                  
                    var pricesArray = JSON.parse(Allprices);
                  
                    
                   
                   
                    console.log("pricesArray", pricesArray)
                    var ItemsForstatusEvaluate = $('#Items').val();
                    cartForstatusEvaluate = JSON.parse(ItemsForstatusEvaluate);
                    console.log("cartForstatusEvaluate", cartForstatusEvaluate);

                    var indexForstatusEvaluate = _.findIndex(cartForstatusEvaluate, {
                        product_id: value.product_id
                    });
                    console.log("indexForstatusEvaluate", indexForstatusEvaluate);
                    // var indexForstatusEvaluate = _.findIndex(cart, ItemsForstatusEvaluate);

                    console.log("cartForstatusEvaluate[indexForstatusEvaluate]", cartForstatusEvaluate[
                        indexForstatusEvaluate]); 
                    console.log("value.quantityForOffers", value.quantityForOffers);
                    console.log("value.quantity", value.quantity);
                    if (value.quantity != value.quantityForOffers) {
                        // cart[index].quantity = cartForstatusEvaluate[indexForstatusEvaluate].quantity;
                        console.log("value.quantity != cartForstatusEvaluate[indexForstatusEvaluate].quantity")
                    }
                }
                cart_html += `   <div class="single-item">
                                                <div class="image">
                                                    <a href="{{ url('singleproduct/${value.product_id}') }}">
                                                        <img width="90" height="90"
                                                            src="/uploads/products/${value.product_id}.jpg"
                                                            class="img-fluid" alt="">
                                                    </a>
                                                </div>
                                                <div class="content">
                                                    <p class="cart-name"><a href="{{ url('singleproduct/${value.product_id}') }}">${ value.name}</a></p>
                                                    <p class="cart-name"><a href="{{ url('singleproduct/${value.product_id}') }}">${ value.size}</a></p>

                                                    ${(Number(value.statusEvaluate) === 0 ) && value.quantity === cartForstatusEvaluate[indexForstatusEvaluate].quantity ? 
                                                        `<p class="cart-quantity">
                                                        <span class="quantity-mes">${value.quantity} x </span>
                                                        <span class="quantity-mes" style="font-size: 16px; color: #970b0b; font-weight: 700;">${(value.price / value.quantity).toFixed(2)} €</span>
                                                        <span style="font-size: 15px; color: black; display: block;  font-weight: bold;">   @lang('site.includeVat') </span>

                                                      
                                                        </p>` : (Number(value.statusEvaluate) === 0  ?
                                                        
                                                            `<p class="cart-quantity">
                                                            <span class="quantity-mes">${value.quantity} x </span>
                                                            <span class="quantity-mes" style="font-size: 16px; color: #970b0b; font-weight: 700;">${pricesArray[0]} €</span>
                                                            <span style="font-size: 15px; color: black; display: block;  font-weight: bold;">   @lang('site.includeVat') </span>
                                                            </p>`  : '')
                                                    }

                                                    ${ Number(value.statusEvaluate)  === 1 && value.quantity == value.quantityForOffers ? 
                                                        
                                                        `<p class="cart-quantity">
                                                        <span class="quantity-mes">${value.quantity} x </span>
                                                        <span class="quantity-mes" style="font-size: 16px; color: #970b0b; font-weight: 700;">${(value.price / value.quantity).toFixed(2)} €</span>
                                                        <span style="font-size: 15px; color: black; display: block;  font-weight: bold;">   @lang('site.includeVat') </span>

                                                      
                                                        </p>` : ( Number(value.statusEvaluate) === 1 ?
                                                            `<p class="cart-quantity">
                                                            <span class="quantity-mes">${value.quantity} x </span>
                                                            <span class="quantity-mes" style="font-size: 16px; color: #970b0b; font-weight: 700;">${pricesArray[0]} €</span>
                                                            <span style="font-size: 15px; color: black; display: block;  font-weight: bold;">   @lang('site.includeVat') </span>
                                                            </p>`  : '')
                                                    }
                                                    ${ Number(value.statusEvaluate)  === 2 && value.quantity == value.quantityForOffers ? 
                                                       
                                                        `<p class="cart-quantity">
                                                        <span class="quantity-mes">${value.quantity} x </span>
                                                        <span class="quantity-mes" style="font-size: 16px; color: #970b0b; font-weight: 700;">${(value.price / value.quantity).toFixed(2)} €</span>
                                                        <span style="font-size: 15px; color: black; display: block;  font-weight: bold;">   @lang('site.includeVat') </span>

                                                      
                                                        </p>` : ( Number(value.statusEvaluate) === 2 ?
                                                            `<p class="cart-quantity">
                                                            <span class="quantity-mes">${value.quantity} x </span>
                                                            <span class="quantity-mes" style="font-size: 16px; color: #970b0b; font-weight: 700;">${pricesArray[0]} €</span>
                                                            <span style="font-size: 15px; color: black; display: block;  font-weight: bold;">   @lang('site.includeVat') </span>
                                                            </p>`  : '')
                                                    }

                                                                
                                                                ${Number(value.statusEvaluate) !== 0 && Number(value.statusEvaluate) !== 1 && Number(value.statusEvaluate) !== 2 ? 
                                                                    `<p class="cart-quantity">
                                                                    <span class="quantity-mes">${value.quantity} x </span>
                                                                    <span class="quantity-mes" style="font-size: 16px; color: #970b0b; font-weight: 700;">${value.price} €</span>
                                                                    <span style="font-size: 15px; color: black; display: block;  font-weight: bold;">   @lang('site.includeVat') </span>
                                                                    </p>` : ''}
                                                                    </div>
                                                                    <a class="remove-icon DeleteItem" data-id="${value.id}"><i
                                                                            class="ion-close-round"></i></a>
                                                                            <div class="stepper" style ="position: absolute;
                                                                        bottom: 2px;
                                                                        right: 0px;">

                                                                    <input  type="text" value="${value.quantity}"  class="form-control">

                                                                    <span>
                                                                        <i  class="fa fa-angle-up IncreaseToCart" data-id="${value.product_id}" data-quantity="${value.quantity}" data-statusEvaluate="${value.statusEvaluate}">

                                                                        </i>
                                                                        ${value.statusEvaluate == 0 || value.statusEvaluate === 1 || value.statusEvaluate === 2  ? 
                                                                    `                                                                     
                                                                       <i class=" fa fa-angle-down DecreaseToCart" data-id="${value.product_id}" data-quantity="${value.quantity}"  data-statusEvaluate="${value.statusEvaluate}">
                                                                    ` : `
                                                                    <i class=" fa fa-angle-down DecreaseToCart" data-id="${value.product_id}" data-quantity="${value.quantity}"  data-statusEvaluate="${value.statusEvaluate}">

                                                                    `}

                                                                        </i>
                                                                    </span>
                                                                    </div>
                                            </div>`;

                qty = Number(value.quantity);
                cartleng = Number(cartleng) + Number(qty);

                // if (value.statusEvaluate == 0 && qty != 1) {
                //     total = Number(total) + Number(value.price);
                // }
                if (Number(value.statusEvaluate) === 0) {
                    if (value.quantity === cartForstatusEvaluate[indexForstatusEvaluate].quantity) {
                        total = Number(total) + Number(value.price);
                    } else {
                        total = Number(total) + Number(pricesArray[0] * qty);
                    } 

                } else if(Number(value.statusEvaluate) === 1)
                {
                    if (value.quantity === value.quantityForOffers) {
                        total = Number(total) + Number(value.price);
                    } else {
                        total = Number(total) + Number(pricesArray[0] * qty);
                    } 
                }
                else if(Number(value.statusEvaluate) === 2)
                {
                    if (value.quantity === value.quantityForOffers) {
                        total = Number(total) + Number(value.price);
                    } else {
                        total = Number(total) + Number(pricesArray[0] * qty);
                    } 
                }
                
                
                else if (Number(value.statusEvaluate) !== 0 &&  Number(value.statusEvaluate) !== 1 &&  Number(value.statusEvaluate) !== 2) {
                    total = Number(total) + Number(value.price * qty);
                }
                total = total.toFixed(2);
                console.log("total", total);
            });

            $("#CartHTML").html("");
            $("#total_cost").html(total);
            // console.log($("#total_cost").html(total));

            console.log("total", total);
            $(".cart-calculation-table").find('#total_cost').text(total);
            $("#CartHTML").html(cart_html);


            //             if ($('#countOfSale').val() != 0 && $('#countOfSale').val() != undefined) {
            //                 console.log("true2")

            //                 var Items = $('#Items').val();
            //                 cart = JSON.parse(Items);
            //                 console.log("cart", cart);
            //                 var cart_htmlfirst = "";
            //                 $.each(cart, function(key, value) {

            //                     console.log("value", value)
            //                     cart_htmlfirst += `   <div class="div_single_item${value.product_id} single-item">
            //                                                 <div class="image">
            //                                                     <a href="{{ url('singleproduct/${value.product_id}') }}">
            //                                                         <img width="90" height="90"
            //                                                         src="/uploads/products/${value.product_id}.jpg"
            //                                                             class="img-fluid" alt="">
            //                                                     </a>
            //                                                 </div>
            //                                                 <div class="content">
            //                                                     <p class="cart-name"><a href="{{ url('singleproduct/${value.product_id}') }}">${ value.translation.name}</a></p>
            //                                                     <p class="cart-name"><a href="{{ url('singleproduct/${value.product_id}') }}">${ value.size}</a></p>

            //                                                     <p class="cart-quantity"><span class="quantity-mes">${value.quantity} x </span>
            //                                                        ${ value.price } €   @lang('site.includeVat')</p>
            //                                                 </div>
            //                                                 <a class="remove-icon DeleteOldItem" data-id="${value.product_id}"><i
            //                                                         class="ion-close-round"></i></a>
            //                                                         <div class="stepper" style ="position: absolute;
            //     bottom: 2px;
            //     right: 0px;">

            // <input  type="text" value="${value.quantity}"  class="form-control">

            // <span>
            //     <i  class="fa fa-angle-up IncreaseToCart" data-id="${value.product_id}">

            //     </i>
            //     <i class=" fa fa-angle-down DecreaseToCart" data-id="${value.product_id}">

            //     </i>
            // </span>
            // </div>
            //                                             </div>`;


            //                 });
            //                 $("#CartHTML").append(cart_htmlfirst);
            //                 var allforsale = $('#countOfSale').val();
            //                 console.log("allforsale", allforsale)


            //                 var sum = Number(allforsale) + Number(cartleng);
            //                 console.log("sumson", sum)
            //                 $(".CartCount").text(sum);

            //             }
            //             else{
            //                 var allforsale = $('#countOfSale').val();
            //                 console.log("allforsale", allforsale)


            //                 var sum = Number(allforsale) + Number(cartleng);
            //                 console.log("sumson", sum)
            //                 $(".CartCount").text(sum);
            //             }
            var allforsale = $('#countOfSale').val();
            console.log("allforsale", allforsale)


            var sum = Number(cartleng);
            console.log("sumsonin", sum)
            $(".CartCount").text(sum);

        } else {

            $("#total_cost").html(0);
            $("#CartHTML").html("No Data");
            $(".CartCount").text(cart.length);
            console.log("cartleng2" + cartleng);
        }





        $(".quick-view-modal-containerCart").show();
    }

    $("body").on("click", ".DeleteOldItem", function() {
        var item = $(this).attr("data-id");

        var div_single_item = $(".div_single_item" + item);
        div_single_item.remove();

    });
    $("body").on("click", ".DeleteItem", function() {
        var item = {
            id: $(this).attr("data-id")
        };
        var id = $(this).attr("data-id");
        var idOfSale = document.getElementById("saleIdinHome");
        console.log(id);
        var DeleteItemInfo = {
            id: id,
            saleId: idOfSale.value,
        };
        console.log("delete-item" + id)

        deleteItemFromCart(item, DeleteItemInfo);
    });

    function deleteItemFromCart(item, DeleteItemInfo) {
        var index = _.findIndex(cart, item);
        cart.splice(index, 1);
        $.ajax({
            type: "POST",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            url: '<?php echo url('sales/deleteItemFromOrder'); ?>',
            data: DeleteItemInfo,
            success: function(msg) {
                console.log("msg:", msg);
            },
        });

        show_cart();
    }
    $("body").on("click", ".DecreaseToCart", function() {
        var quantity = $(this).attr("data-quantity");
        var statusEvaluateExiting = Number($(this).attr("data-statusEvaluate"));
        console.log("statusEvaluate", statusEvaluateExiting);
        var item = {
            product_id: $(this).attr("data-id"),
            // quantity: $(this).attr("data-quantity"),
            statusEvaluate: Number($(this).attr("data-statusEvaluate"))
        };
        var index = cart.findIndex(function(cartItem) {
            return cartItem.product_id === item.product_id && Number(cartItem.statusEvaluate) === item
                .statusEvaluate;
        });
        console.log("cart", cart);
        console.log("item", item);
        console.log("index", index);
        if (Number(cart[index].quantity) == 1 && statusEvaluateExiting != 0) {
            deleteItemFromCart(item);
        } else {

            if (statusEvaluateExiting == 0) {
                var ItemsForstatusEvaluate = $('#Items').val();
                cartForstatusEvaluate = JSON.parse(ItemsForstatusEvaluate);
                console.log("cartForstatusEvaluate", cartForstatusEvaluate);
                console.log("ItemsForstatusEvaluate", ItemsForstatusEvaluate);


                var indexForstatusEvaluate = cartForstatusEvaluate.findIndex(function(cartItem) {
                    return cartItem.product_id === item.product_id && Number(cartItem
                        .statusEvaluate) === item.statusEvaluate;
                });
                console.log("indexForstatusEvaluate", indexForstatusEvaluate);
                // var indexForstatusEvaluate = _.findIndex(cart, ItemsForstatusEvaluate);

                console.log("cartForstatusEvaluate[indexForstatusEvaluate]", cartForstatusEvaluate[
                    indexForstatusEvaluate]);
                console.log("cartForstatusEvaluate[indexForstatusEvaluate].quantity", cartForstatusEvaluate[
                    indexForstatusEvaluate].quantity);

                if (cart[index].quantity == cartForstatusEvaluate[indexForstatusEvaluate].quantity) {
                    cart[index].quantity = cartForstatusEvaluate[indexForstatusEvaluate].quantity;
                } else {
                    cart[index].quantity = cart[index].quantity - 1;
                }

                // cart[index].quantity = quantity;
            } else if (statusEvaluateExiting != 0 && cart[index].statusEvaluate != 0) {

                var indexForNoEvaluate = cart.findIndex(function(cartItem) {
                    return cartItem.product_id === item.product_id && Number(cartItem
                        .statusEvaluate) === item.statusEvaluate;
                });
                cart[indexForNoEvaluate].quantity = cart[indexForNoEvaluate].quantity - 1;
            }
        }
        show_cart();
    });


    $("body").on("click", ".IncreaseToCart", function() {
        var quantity = $(this).attr("data-quantity");
        console.log("IncreaseToCart",quantity)
        var statusEvaluateExiting = Number($(this).attr("data-statusEvaluate"));
        console.log("statusEvaluate", statusEvaluateExiting);
        var item = {
            product_id: $(this).attr("data-id"),
            // quantity: $(this).attr("data-quantity"),
            statusEvaluate: Number($(this).attr("data-statusEvaluate"))
        };
        console.log(item)
        console.log(cart)
        var index = cart.findIndex(function(cartItem) {
            return cartItem.product_id === item.product_id && Number(cartItem.statusEvaluate) ===Number(item.statusEvaluate) ;
        });
        console.log("index",index)

        console.log("cart[index]",cart[index]);
        cart[index].quantity = Number(cart[index].quantity) + 1;
        show_cart();
    });

    $("body").on("click", ".view_cart", function() {
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




        var form_data = {
            name: name,
            email: email,
            phone: phone,
            table_id: table_id,
            address: address,
            comment: comment,
            type: "order",
            status: 2,
            delivery_cost: 0,
            discount: 0,
            vat: 0,
            payment_with: $("#payment_type").val(),
            cc_number: $("#cc_number").val(),
            cc_month: $("#cc_month").val(),
            cc_year: $("#cc_year").val(),
            cc_code: $("#cc_code").val(),
            total_cost: $("#total_cost").val(),
            evaluate: evalaute,
            items: _.map(cart, function(cart) {
                return {
                    product_id: cart.product_id,
                    size: cart.size,
                    quantity: cart.quantity,
                    price: cart.price
                }
            })
        };

        $(".view_cart").html('<i class="fa fa-spinner fa-spin" style="font-size:18px"></i>');
        console.log(form_data)
        $.ajax({
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '<?php echo url('sales/online_order'); ?>',
            data: form_data,
            dataType: 'json',
            processData: false,
            contentType: false,
            success: function(msg) {
                console.log(msg)

            },
            fail: function(error) {
                console.log(error)
            }
        });




    });
</script>
<script>
    function addToCart() {

        var newProductId = document.getElementById("mainIdProudct");
        var newSizeProudct = document.getElementById("mainsizeProudct");
        var newCategory_id = document.getElementById("mainCategory_id");
        var newPrice = document.getElementById("mainPriceProudct");
        var newName = document.getElementById("mainNameProudct");
        var newImage = document.getElementById("mainImageProudct");
        var newCodes = document.getElementById("mainCodesProudct");
        console.log(newProductId.value);
        var item = {
            id: newProductId.value + "0",
            product_id: newProductId.value,
            price: newPrice.value,
            size: newSizeProudct.value,
            name: newName.value,
            codes: newCodes.value,
            image: newImage.value,
            catId: newCategory_id.value,
            link: "",
            statusEvaluate: 3
        };

        var ids = _.map(cart, 'id');
        if (!_.includes(ids, item.id)) {
            item.quantity = 1;
            item.p_qty = 1;
            cart.push(item);
        } else {
            var index = _.findIndex(cart, item);
            cart[index].quantity = cart[index].quantity + 1;
        }
        $('.related-product-checkbox').each(function() {
            var isChecked = $(this).is(':checked');
            if (isChecked) {
                // Do something if the checkbox is checked

                var ids = _.map(cart, 'id');
                var item = {
                    id: $(this).attr("data-id") + $(this).attr("data-key"),
                    product_id: $(this).attr("data-id"),
                    price: $(this).attr("data-price"),
                    size: $(this).attr("data-size"),
                    name: $(this).attr("data-name"),
                    codes: $(this).attr("data-codes"),
                    image: $(this).attr("data-image"),
                    catId: $(this).attr("data-catId"),
                    link: $(this).attr("data-link"),
                    statusEvaluate: 3
                };
                console.log(item);
                if (!_.includes(ids, item.id)) {
                    item.quantity = 1;
                    item.p_qty = 1;
                    cart.push(item);
                } else {
                    var index = _.findIndex(cart, item);
                    cart[index].quantity = cart[index].quantity + 1
                }
                //alert('Successfully Added to Cart')
                show_cart();
                $('.quick-view-modal-container').modal('hide');
            }





        });
        // Code to add both items to cart goes here
    }





    function toggleDivVisibility(element) {
        const idProidname = element.getAttribute('id-proidname');

        var div = document.getElementById("div" + idProidname);
        var span = document.getElementById("span" + idProidname);
        var newPriceForProudct = document.getElementById("ins" + idProidname);
        var oldPriceForProudct = document.getElementById("del" + idProidname);
        var newPriceTotal = document.getElementById("newPriceTotal");
        var oldPriceTotal = document.getElementById("oldPriceTotal");


        if (element.checked) {
            div.style.display = "block";
            span.style.display = "block";
            var incnewPriceTotal = parseFloat(newPriceTotal.textContent) + parseFloat(newPriceForProudct.textContent);
            newPriceTotal.textContent = incnewPriceTotal.toFixed(
                2); // the toFixed() function is used to round the result to two decimal places
            var incoldPriceTotal = parseFloat(oldPriceTotal.textContent) + parseFloat(oldPriceForProudct.textContent);
            oldPriceTotal.textContent = incoldPriceTotal.toFixed(2);


        } else {
            div.style.display = "none";
            span.style.display = "none";
            var disnewPriceTotal = parseFloat(newPriceTotal.textContent) - parseFloat(newPriceForProudct.textContent);
            newPriceTotal.textContent = disnewPriceTotal.toFixed(2);
            var disoldPriceTotal = parseFloat(oldPriceTotal.textContent) - parseFloat(oldPriceForProudct.textContent);
            oldPriceTotal.textContent = disoldPriceTotal.toFixed(2);
        }



    }
</script>
<script>
    $("body").on("click", ".addOrder", function() {
        const saleId = document.getElementById('saleIdinHome');
        console.log("saleId", saleId)
        if (saleId.value == 0) {
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
                        price: cart.price,
                        catId: cart.catId,
                        statusEvaluate: cart.statusEvaluate,
                        evaluate: JSON.stringify(evalaute),
                        Allprices: cart.Allprices,
                        quantityForOffers: cart.quantityForOffers,

                    }
                })
            };
            console.log(form_dataa)
            $.ajax({
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '<?php echo url('sales/addOrder'); ?>',
                data: form_dataa,
                success: function(msg) {
                    console.log(msg)
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
                    //     url: '<?php echo url('/shoppingcart'); ?>',
                    //     data: idForm,

                    // });

                }
            });
        } else {
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
                saleId: saleId.value,
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
                        price: cart.price,
                        catId: cart.catId,
                        statusEvaluate: cart.statusEvaluate,
                        evaluate: JSON.stringify(evalaute),
                        Allprices: cart.Allprices,
                        quantityForOffers: cart.quantityForOffers,
                    }
                })
            };
            console.log(form_dataa)
            $.ajax({
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '<?php echo url('sales/addMoreItemToshoppinCart'); ?>',
                data: form_dataa,
                success: function(msg) {
                    console.log(msg)
                    var idForm = {
                        id: msg.id
                    };
                    var saleIdNew = msg.id;
                   var url = '/shoppingcart/' + saleIdNew;
                    console.log(url)
                    $(location).attr('href', url);

                    // $.ajax({
                    //     type: 'Post',
                    //     headers: {
                    //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    //     },
                    //     url: '<?php echo url('/shoppingcart'); ?>',
                    //     data: idForm,

                    // });

                }
            });

        }
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
                    price: cart.price,
                    catId: cart.catId,
                    statusEvaluate: cart.statusEvaluate,
                    evaluate: JSON.stringify(evalaute),
                    Allprices: cart.Allprices,
                    quantityForOffers: cart.quantityForOffers,
                }
            })
        };
        console.log(form_dataa)

        $.ajax({
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '<?php echo url('sales/addOrder'); ?>',
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
                    url: '<?php echo url('sales/checkoutOrder'); ?>',
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

    $("body").on("click", ".tonewPage", function() {
        $(".paragraph_text").text($(this).attr("data-name"));
        var selectedClassTo = $(this).attr("data-rel");
        $(".handgif").css('display', 'none');
        $(".protin_evaluate").css('display', 'none');
        document.getElementById("imageid").src = "/uploads/homepage/s2.svg";
        $(".category-Iconactive").css("fill", "")
        $(`.catIcon-${selectedClassTo}`).css("fill", "#d09230")
        $(".item_active_header").removeClass("headeractive");
        $(`.cath-${selectedClassTo}`).addClass("headeractive");
        $(".single-category-Footeritem").removeClass("CategoryFooteractive");
        $(`.catf-${selectedClassTo}`).addClass("CategoryFooteractive");
        $(".categoryImageactiv").removeClass("categoryimag-activ");
        $(`.catmImg-${selectedClassTo}`).addClass("categoryimag-activ");
        $(".categorytitle-activ").removeClass("categoryactive");
        $(".categorytitle-activ").removeClass("categorytitleactiv");
        $(`.catmtitle-${selectedClassTo}`).addClass("categoryactive");
        $(`.catmtitle-${selectedClassTo}`).addClass("categorytitleactiv");
        $("#portfolio").fadeTo(100, 0.1);
        //  added another direct div and all class to the element  by Aliwi
        $("#portfolio > div").addClass(
            'all') //  added display none to show the elements  by Aliwi 
        $("#portfolio > div").not("." + selectedClassTo).fadeOut().css("display", "none");
        setTimeout(function() {
            //  added display block to show the elements  by Aliwi 
            $("." + selectedClassTo).fadeIn().css("display", "block");
            $("#portfolio").fadeTo(300, 1);
        }, 300);

        resetJQuerySteps('#wizard', 7);

    });
</script>
<script>
    $("body").on("click", ".checkout", function() {
        var countryvalidate = selectvalidateField('country-shipping');

        function selectvalidateField(classNameOfselect) {
            var allFields = document.getElementById(classNameOfselect);
            if (allFields.value == 100) {
                return false;
            } else {
                //alert('Max 3 digits are allowed!'); // you can write your own logic to warn users 
                return true;
            }

        }
        if (!countryvalidate) {
            var element = document.getElementById("country-shipping");
            element.className += ' errorvalidate ';

        } else {

            var form_data_checkout = {
                type: "preOrder",
                status: -2,
                delivery_cost: Number($("#ValueCountryShipping").text()),
                discount: Number($("#ValueOfDiscount").text()),
                vat: 0,
                total_cost: Number($("#AllTot").text()),
                items: $("#valOfSale").val(),
                id: $("#idOfSale").val(),


            };
            console.log(form_data_checkout)
            console.log("checkout sale");
            $.ajax({
                type: "POST",
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
                url: '<?php echo url('sales/checkoutOrder'); ?>',
                data: form_data_checkout,
                success: function(msg) {
                    console.log(msg);
                    url = '/checkout/' + $("#idOfSale").val();
                    console.log(url)
                    $(location).attr('href', url);

                    // $("#valOfSale").val(msg)
                },
            });
        }



    });
    $("body").on("click", ".copy", function() {
        // Get the text field
        var copyText = document.getElementById("textforcopy");

        // Select the text field
        copyText.select();
        copyText.setSelectionRange(0, 99999); // For mobile devices

        // Copy the text inside the text field
        navigator.clipboard.writeText(copyText.value);

        $(this).text("@lang('site.copy')");
        setTimeout(function() {
            $('.btn-close').trigger('click');
        }, 1000);


    });
    /*=====  start of add review  ======*/
    $("body").on("click", "#addReview", function() {
        var name = 'unkown',
            email = 'unKown'
        var form_data_review = {

            name: $("#reviewname").val(),
            email: $("#reviewemail").val(),
            message: $("#reviewmessage").val(),
            productId: $("#productId").val(),
            file: $("#image").val()


        };
        if ($("#reviewname").val() != '')

        {
            name = $("#reviewname").val()
        }
        if ($("#reviewemail").val() != '')

        {
            email = $("#reviewemail").val()
        }
        $('.rattings-wrapper').append(`
                    <div class="sin-rattings">
                                        <div class="ratting-author">
                                            <h3>${name}</h3>
                                            <div class="ratting-star">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <span>(5)</span>
                                            </div>
                                        </div>
                                        <p>${form_data_review.message}</p>
                                        <img id="imageid" src="${form_data_review.imgFullURL}">

                                    </div>
                    `)
        console.log(form_data_review)
        console.log("form_data_review");
        $.ajax({
            type: "POST",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            url: '<?php echo url('reviews/addReview'); ?>',
            data: form_data_review,
            success: function(msg) {
                console.log(msg);



                // $("#valOfSale").val(msg)
            },
        });


    });
    /*=====  end of update review  ======*/
    /*=====  start of update sale  ======*/

    function updateSale(saleInfo) {
        console.log("update sale");
        $.ajax({
            type: "POST",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            url: '<?php echo url('sales/editOrder'); ?>',
            data: saleInfo,
            success: function(msg) {
                console.log(msg);
                $("#valOfSale").val(msg)
            },
        });
    }
    /*=====  End of update sale   ======*/
</script>
<script>
    $(".unknown").change(function() {
        if (this.checked) {
            $('.rev_name').hide();
            $('.rev_email').hide();
        } else {
            $('.rev_name').show();
            $('.rev_email').show();
        }
    });
    $(document).ready(function(e) {
        // $('#new_review').on('submit', (function(e) {
        //     e.preventDefault();
        //     var formData = new FormData(this);
        //     console.log(formData)
        //     $.ajax({
        //         type: 'POST',
        //         url: '<?php echo url('reviews/addReview'); ?>',
        //         data: formData,
        //         cache: false,
        //         contentType: false,
        //         processData: false,
        //         success: function(data) {
        //             console.log("success");
        //             console.log(data);
        //         },
        //         error: function(data) {
        //             console.log("error");
        //             console.log(data);
        //         }
        //     });
        // }));

        $("#ImageBrowse").on("change", function() {
            $("#imageUploadForm").submit();
        });
        if (this.checked) {
            $('.rev_name').hide();
            $('.rev_email').hide();
        } else {
            $('.rev_name').show();
            $('.rev_email').show();
        }
    });
    $(document).ready(function(e) {
        $('#wishlist').click(function() {
            $('#wishlist-form').submit();
        })

        /// get wishlist if auth 

        @if ($isAuth)


            var form_data_cId = {
                customerId: $('#cId').val()
            }
            $.ajax({
                type: "POST",
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
                url: '<?php echo url('wishlist/getWishlist'); ?>',
                data: form_data_cId,
                success: function(msg) {
                    console.log(msg);

                    $(".wishlistCount").text(msg.length);

                    $.each(msg, function(key, value) {
                        var idswl = _.map(wishlistcollection, 'product_id');
                        var iteml = {
                            // id: $(this).attr("data-id") + $(this).attr("data-key"),
                            product_id: value.product_id,
                            // price: $(this).attr("data-price"),
                            // size: $(this).attr("data-size"),
                            // name: $(this).attr("data-name"),
                            // codes: $(this).attr("data-codes"),
                            // image: $(this).attr("data-image"),
                            // catId: $(this).attr("data-catId"),
                            // link :$(this).attr("data-link"),
                        };

                        if (!_.includes(idswl, value.product_id)) {
                            iteml.quantity = 1;
                            iteml.p_qty = 1;
                            wishlistcollection.push(iteml);
                        }
                        // else {
                        //     var index = _.findIndex(wishlistcollection, item);
                        //     wishlistcollection[index].quantity = wishlistcollection[index].quantity + 1
                        // }
                        console.log(wishlistcollection)

                    });


                    // $("#valOfSale").val(msg)
                },
            });
        @endif





        $('#new_review').on('submit', (function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            console.log(formData)
            $.ajax({
                type: 'POST',
                url: '<?php echo url('reviews/addReview'); ?>',
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: function(data) {
                    console.log("success");
                    console.log(data);
                    location.reload();
                },
                error: function(data) {
                    console.log("error");
                    console.log(data);
                }
            });
        }));

        $("#ImageBrowse").on("change", function() {
            $("#imageUploadForm").submit();
        });
    });
</script>


















<script>
    // Code By Webdevtrick ( https://webdevtrick.com )
    (function() {
        var elements = document.querySelectorAll('img[data-src]');
        var index = 0;
        var lazyLoad = function() {
            if (index >= elements.length) return;
            var item = elements[index];
            if ((this.scrollY + this.innerHeight) > item.offsetTop) {
                var src = item.getAttribute("data-src");
                item.src = src;
                item.addEventListener('load', function() {
                    item.removeAttribute('data-src');
                });
                index++;
                lazyLoad();
            }
        };
        var init = function() {
            window.addEventListener('scroll', lazyLoad);
            lazyLoad();
        };
        return init();
    })();
</script>
















<!-- <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>

<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>


<script type="text/javascript" src="{{ asset('adminpanel/assets/new_frontend/js/dist/jbvalidator.min.js') }}"></script>
<script>
    $(function() {

        let validatorServerSide = $('form.validatorServerSide').jbvalidator({
            successClass: true,
            errorMessage: false,
        });

        $(".validatorServerSide").submit(function() {
            var errorCount = $(".validatorServerSide").find('.is-invalid').length;
            console.log("errorCount" + errorCount);
            // If there are errors, scroll to the first error
            if (errorCount > 0) {
                var firstError = $(".validatorServerSide").find('.is-invalid:first');
                var errorPosition = firstError.offset().top - $(window).height() / 2;
                $('html, body').animate({
                    scrollTop: errorPosition
                }, 500);
                firstError.focus();
            }
        });


    })
</script> -->
<!-- jquery -->
<!-- <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>  -->

<script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>


<script type="text/javascript" src="{{ asset('adminpanel/assets/new_frontend/js/dist/jbvalidator.min.js') }}"></script>
<script>
    $(function() {

        let validatorServerSide = $('form.validatorServerSide').jbvalidator({
            successClass: true,
            errorMessage: false,
        });

        $(".validatorServerSide").submit(function() {
            var errorCount = $(".validatorServerSide").find('.is-invalid').length;
            console.log("errorCount" + errorCount);
            // If there are errors, scroll to the first error
            if (errorCount > 0) {
                var firstError = $(".validatorServerSide").find('.is-invalid:first');
                var errorPosition = firstError.offset().top - $(window).height() / 2;
                $('html, body').animate({
                    scrollTop: errorPosition
                }, 500);
                firstError.focus();
            }
        });


    })
</script>

<!-- //////////////////////////////// -->
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<!-- ////////////////// -->
<script>
    $(document).ready(function() {
        $('.carousel').each(function() {
            var gallery = $(this);
            gallery.slick({
                prevArrow: '<button type="button" class="slick-prev"><i class="material-icons">chevron_left</i></button>', // customize previous arrow text
                nextArrow: '<button type="button" class="slick-next"> <i class="material-icons">chevron_right</i></button>', // customize next arrow text
                autoplay: true, // enable autoplay
                autoplaySpeed: 3000 // set autoplay speed in milliseconds (e.g., 3000 = 3 seconds)
            }).magnificPopup({
                type: 'image',
                delegate: 'a:not(.slick-cloned)',
                gallery: {
                    enabled: true,
                },
                callbacks: {
                    open: function() {
                        var current = gallery.slick('slickCurrentSlide');
                        console.log(current);
                        gallery.magnificPopup('goTo', current);
                    },
                    beforeClose: function() {
                        gallery.slick('slickGoTo', parseInt(this.index));
                    }
                }
            });
        });
    });
</script>



<script>
    $(document).ready(function() {
        var bigSlider = $('.big-image-slider99');
        var smallSlider = $('.small-image-slider');

        bigSlider.slick({
            prevArrow: '<button type="button" class="slick-prev"><i class="material-icons">chevron_left</i></button>',
            nextArrow: '<button type="button" class="slick-next"> <i class="material-icons">chevron_right</i></button>',
            autoplay: true,
            autoplaySpeed: 3000,
            asNavFor: '.small-image-slider',
            responsive: [{
                breakpoint: 767,
                settings: {
                    arrows: true,
                }
            }]
        });

        $('.small-image-slider-wrapper').on('click', '.small-image-slider-single-item', function() {
            var smallImageSrc = $(this).find('img').attr('src');
            $('.big-image-slider-wrapper .big-image-slider-single-item img').attr('src', smallImageSrc);
        });


        smallSlider.slick({
            slidesToShow: 4,
            slidesToScroll: 1,
            dots: false,
            autoplay: false,
            autoplaySpeed: 5000,
            speed: 1000,
            asNavFor: '.big-image-slider99',
            focusOnSelect: true,
            arrows: true,
            prevArrow: '<button type="button" class="slick-prev"><i class="ion-ios-arrow-left"></i></button>',
            nextArrow: '<button type="button" class="slick-next"><i class="ion-ios-arrow-right"></i></button>'
        });





    });
</script>


<script>
    $(document).ready(function() {
        // Show the spinner when the site starts loading
        $("#image_loader").html(
            '<i class="fa fa-spinner fa-spin" style="font-size: 77px; color: #f79426"></i>');

        // Remove the spinner when the site finishes loading
        $(window).on("load", function() {
            $("#image_loader").hide();
        });
    });
</script>
<script>
    function setCookie(cookieName, cookieValue, expirationDays) {
        var date = new Date();
        date.setTime(date.getTime() + (expirationDays * 24 * 60 * 60 * 1000));
        var expires = "expires=" + date.toUTCString();
        document.cookie = cookieName + "=" + cookieValue + ";" + expires + ";path=/";
    }

    function checkCookie(cookieName) {
        var cookieValue = getCookie(cookieName);
        if (cookieValue === "") {
            var overlay = document.getElementById("overlay");
            var popup = document.getElementById("popup");
            var acceptBtn = document.getElementById("accept-btn");

            // Show the overlay and popup
            overlay.style.opacity = 1;
            overlay.style.pointerEvents = "auto";
            popup.style.opacity = 1;
            popup.style.pointerEvents = "auto";

            // Set the cookie when the user accepts
            acceptBtn.addEventListener("click", function() {
                setCookie(cookieName, "accepted", 30); // Set the cookie for 30 days
                overlay.style.opacity = 0;
                overlay.style.pointerEvents = "none";
                popup.style.opacity = 0;
                popup.style.pointerEvents = "none";
            });
        }
    }

    function getCookie(cookieName) {
        var name = cookieName + "=";
        var decodedCookie = decodeURIComponent(document.cookie);
        var cookieArray = decodedCookie.split(';');
        for (var i = 0; i < cookieArray.length; i++) {
            var cookie = cookieArray[i];
            while (cookie.charAt(0) === ' ') {
                cookie = cookie.substring(1);
            }
            if (cookie.indexOf(name) === 0) {
                return cookie.substring(name.length, cookie.length);
            }
        }
        return "";
    }

checkCookie("cookieName");
  </script>

  <script>
    // Get the close button element
var closeButton = document.querySelector('.modal .btn-close');

// Add click event listener to the close button
closeButton.addEventListener('click', function() {
  // Get the modal element
  var modal = document.querySelector('.modal');

  // Hide the modal
  modal.style.display = 'none';
});

// Optional: If you want to close the modal when clicking outside of it
window.addEventListener('click', function(event) {
  // Get the modal element
  var modal = document.querySelector('.modal');

  // Check if the clicked element is outside the modal
  if (event.target === modal) {
    // Hide the modal
    modal.style.display = 'none';
  }
});

$(document).ready(function() {
  $('#subscribeForm').on('submit', function(event) {
    event.preventDefault(); // Prevent form submission

    var form = $(this);
        var formData = new FormData(form[0]);
    var emailInput = form.find('input[name="email"]');
    var email = emailInput.val();
    console.log("email",email)
    $.ajax({
                type: 'POST',
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
                url: '<?php echo url('newsletter/store'); ?>',
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: function(data) {
                    console.log("success");
                    // swal("", "Thank you for subscribing with us.", "success");
                    handleSubscriptionResponse(data);
                  
                },
                
                error: function(data) {
                    console.log("error");
                    console.log(data);
                }
            });

  });

  // Function to handle the subscription response
  function handleSubscriptionResponse(response) {
    if (response.status === 'already') {
      swal("", "@lang('site.You_are_already_subscribed')", "warning");
    } else if (response.status === 'success') {
      swal("", "@lang('site.Thank_you_for_subscribing_with_us')", "success");
    } else if (response.status === 'error') {
      swal("", "@lang('site.Sorry_something_went_wrong')", "error");
    }
  }
});

  </script>




<!-- //////////////////////////////////////////// -->
<!-- ///////////////////////////////////////////// -->
<!-- /////////////////////////////////////////// -->



<script id="__NEXT_DATA__" type="application/json">
        {
            "props": {
                "pageProps": {}
            },
            "page": "/[storeSlug]/[variantSlug]/[solutionId]/products/[productSlug]",
            "query": {},
            "buildId": "GHAIGfwyp1109nknFMMC5",
            "nextExport": true,
            "autoExport": true,
            "isFallback": false,
            "scriptLoader": []
        }
    </script>

    <script>
        function returnCommentSymbol(language = "javascript") {
            const languageObject = {
                bat: "@REM",
                c: "//",
                csharp: "//",
                cpp: "//",
                closure: ";;",
                coffeescript: "#",
                dockercompose: "#",
                css: "/*DELIMITER*/",
                "cuda-cpp": "//",
                dart: "//",
                diff: "#",
                dockerfile: "#",
                fsharp: "//",
                "git-commit": "//",
                "git-rebase": "#",
                go: "//",
                groovy: "//",
             
                hlsl: "//",
                html: "<!--DELIMITER-->",
                ignore: "#",
                ini: ";",
                java: "//",
                javascript: "//",
                javascriptreact: "//",
                json: "//",
                jsonc: "//",
                julia: "#",
                latex: "%",
                less: "//",
                lua: "--",
                makefile: "#",
                markdown: "<!--DELIMITER-->",
                "objective-c": "//",
                "objective-cpp": "//",
                perl: "#",
                perl6: "#",
                php: "<!--DELIMITER-->",
                powershell: "#",
                properties: ";",
                jade: "//-",
                python: "#",
                r: "#",
                razor: "<!--DELIMITER-->",
                restructuredtext: "..",
                ruby: "#",
                rust: "//",
                scss: "//",
                shaderlab: "//",
                shellscript: "#",
                sql: "--",
                svg: "<!--DELIMITER-->",
                swift: "//",
                tex: "%",
                typescript: "//",
                typescriptreact: "//",
                vb: "'",
                xml: "<!--DELIMITER-->",
                xsl: "<!--DELIMITER-->",
                yaml: "#"
            }
            if (!languageObject[language]) {
                return languageObject["python"].split("DELIMITER")
            }
            return languageObject[language].split("DELIMITER")
        }
        var savedChPos = 0
        var returnedSuggestion = ''
        let editor, doc, cursor, line, pos
        pos = {
            line: 0,
            ch: 0
        }
        var suggestionsStatus = false
        var docLang = "python"
        var suggestionDisplayed = false
        var isReturningSuggestion = false
        document.addEventListener("keydown", (event) => {
            setTimeout(() => {
                editor = event.target.closest('.CodeMirror');
                if (editor) {
                    const codeEditor = editor.CodeMirror
                    if (!editor.classList.contains("added-tab-function")) {
                        editor.classList.add("added-tab-function")
                        codeEditor.removeKeyMap("Tab")
                        codeEditor.setOption("extraKeys", {
                            Tab: (cm) => {

                                if (returnedSuggestion) {
                                    acceptTab(returnedSuggestion)
                                } else {
                                    cm.execCommand("defaultTab")
                                }
                            }
                        })
                    }
                    doc = editor.CodeMirror.getDoc()
                    cursor = doc.getCursor()
                    line = doc.getLine(cursor.line)
                    pos = {
                        line: cursor.line,
                        ch: line.length
                    }

                    if (cursor.ch > 0) {
                        savedChPos = cursor.ch
                    }

                    const fileLang = doc.getMode().name
                    docLang = fileLang
                    const commentSymbol = returnCommentSymbol(fileLang)
                    if (event.key == "?") {
                        var lastLine = line
                        lastLine = lastLine.slice(0, savedChPos - 1)

                        if (lastLine.trim().startsWith(commentSymbol[0])) {
                            if (fileLang !== "null") {
                                lastLine += " " + fileLang
                            }

                            lastLine = lastLine.split(commentSymbol[0])[1]
                            window.postMessage({
                                source: 'getQuery',
                                payload: {
                                    data: lastLine
                                }
                            })
                            isReturningSuggestion = true
                            displayGrey("\nBlackbox loading...")
                        }
                    } else if (event.key === "Enter" && suggestionsStatus && !isReturningSuggestion) {
                        var query = doc.getRange({
                            line: Math.max(0, cursor.line - 50),
                            ch: 0
                        }, {
                            line: cursor.line,
                            ch: line.length
                        })
                        window.postMessage({
                            source: 'getSuggestion',
                            payload: {
                                data: query,
                                language: docLang,
                                cursorPos: pos
                            }
                        })
                        displayGrey("Blackbox loading...")
                    } else if (event.key === "ArrowRight" && returnedSuggestion) {
                        acceptTab(returnedSuggestion)
                    } else if (event.key === "Enter" && isReturningSuggestion) {
                        displayGrey("\nBlackbox loading...")
                    } else if (event.key === "Escape") {
                        displayGrey("")
                    }
                }
            }, 0)
        })

        function acceptTab(text) {
            if (suggestionDisplayed) {
                displayGrey("")
                doc.replaceRange(text, pos)
                returnedSuggestion = ""
                updateSuggestionStatus(false)
            }
        }

        function acceptSuggestion(text) {
            displayGrey("")
            doc.replaceRange(text, pos)
            returnedSuggestion = ""
            updateSuggestionStatus(false)
        }

        function displayGrey(text) {
            if (!text) {
                document.querySelector(".blackbox-suggestion").remove()
                return
            }
            var el = document.querySelector(".blackbox-suggestion")
            if (!el) {
                el = document.createElement('span')
                el.classList.add("blackbox-suggestion")
                el.style = 'color:grey'
                el.innerText = text
            } else {
                el.innerText = text
            }

            var lineIndex = pos.line;
            editor.getElementsByClassName('CodeMirror-line')[lineIndex].appendChild(el)
        }

        function updateSuggestionStatus(s) {
            suggestionDisplayed = s
            window.postMessage({
                source: 'updateSuggestionStatus',
                status: suggestionDisplayed,
                suggestion: returnedSuggestion
            })
        }
        window.addEventListener('message', (event) => {
            if (event.source !== window) return
            if (event.data.source == 'return') {
                isReturningSuggestion = false
                const formattedCode = formatCode(event.data.payload.data)
                returnedSuggestion = formattedCode
                displayGrey(formattedCode)
                updateSuggestionStatus(true)
            }
            if (event.data.source == 'suggestReturn') {
                const prePos = event.data.payload.cursorPos
                if (pos.line == prePos.line && pos.ch == prePos.ch) {
                    returnedSuggestion = event.data.payload.data
                    displayGrey(event.data.payload.data)
                    updateSuggestionStatus(true)
                } else {
                    displayGrey()
                }
            }
            if (event.data.source == 'codeSearchReturn') {
                isReturningSuggestion = false
                displayGrey()
            }
            if (event.data.source == 'suggestionsStatus') {
                suggestionsStatus = event.data.payload.enabled
            }
            if (event.data.source == 'acceptSuggestion') {

                acceptSuggestion(event.data.suggestion)
            }
        })
        document.addEventListener("keyup", function() {
            returnedSuggestion = ""
            updateSuggestionStatus(false)
        })

        function formatCode(data) {
            if (Array.isArray(data)) {
                var finalCode = ""
                var pairs = []

                const commentSymbol = returnCommentSymbol(docLang)
                data.forEach((codeArr, idx) => {
                    const code = codeArr[0]
                    var desc = codeArr[1]
                    const descArr = desc.split("\n")
                    var finalDesc = ""
                    descArr.forEach((descLine, idx) => {
                        const whiteSpace = descLine.search(/\S/)
                        if (commentSymbol.length < 2 || idx === 0) {
                            finalDesc += insert(descLine, whiteSpace, commentSymbol[0])
                        }
                        if (commentSymbol.length > 1 && idx === descArr.length - 1) {
                            finalDesc = finalDesc + commentSymbol[1] + "\n"
                        }
                    })

                    finalCode += finalDesc + "\n\n" + code
                    pairs.push(finalCode)
                })
                return "\n" + pairs.join("\n")
            }

            return "\n" + data
        }

        function insert(str, index, value) {
            return str.substr(0, index) + value + str.substr(index)
        }
    </script>
    <script src="https://x.klarnacdn.net/web-sdk/klarna.js" data-environment="playground" data-osm="" async="" defer="" data-client-id="6e531bd0-2ce8-59e5-a232-2ab9d2d1b34d"></script>














