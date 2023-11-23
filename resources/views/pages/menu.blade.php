@extends('frontend.appother')
@php
    $isAuth = auth::guard("customer")->check()? 1:0;
    $authCustomer = auth::guard("customer")->user();
@endphp
@section('content')
<?php $currency =  setting_by_key("currency"); ?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
{{--
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
    integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous"> --}}
     <style>
        .fa {
  transition: transform .2s;
}

.fa.active {
  transform: rotateZ(180deg);
}
    </style>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous">
</script>
<!-- Header Area Start

    ====================================================== -->
<section class="banner-sec internal-banner" style="background-image:url(assets/frontend/img/menu-page.jpg)">

    <!-- Start: slider-overview -->
    <div class="balck-solid">

        <!-- Start: slider -->
        <div class="container">
            <div class="banner-mid-text internal-header">

                <!-- Start: flexslider -->
                <div class="flexslider">
                    <ul>
                        <!-- Start: flexslider-one -->
                        <li>
                            <h2>@lang('site.Our_menu')</h2>
                            <div class="hr-outtr-line">
                                <hr><i class="fa fa-heart" aria-hidden="true"></i>
                                <hr>
                            </div>
                        </li>
                        <!-- End: flexslider-one -->
                    </ul>
                </div>
                <!-- End: flexslider -->

            </div>
        </div>
        <!-- End: slider -->

    </div>
    <!-- End: slider-overview -->
</section>
<!-- =================================================
    Header Area End -->


<!-- Reservation  Area Start
    ====================================================== -->
<section class="resrvation-top-area my-p-t " id="Welcome">

    <div class="container text-center">
        <div class="">
            <h2 class="my-title"><span>@lang('site.real_taste')</span>@lang('site.categories')</h2>
            <div class="hr-outtr-line">
                <hr><i class="fa fa-heart" aria-hidden="true"></i>
                <hr>
            </div>
        </div>
    </div>
</section>
<!-- =================================================
    AReservation Area End -->

<!--menu cat by Aliwi-->
<div class="cat__fixed__menu" style="" dir="auto">
    <div class="container  arrow__container">

        <!--<h5 style=" border-radius: 15px;">@lang('site.categories')</h5>-->
        <span class="leftArrow animationTrans">
            <i class="fas fa-arrow-left"></i>
        </span>
        <span class="rightArrow d-none ">
            <i class="fas fa-arrow-right"></i>
        </span>
        <div class="cat__conatiner">
            <!-- cat item -->
            <div class="cat__item active fil-cat" data-rel="all" >
                <div class="cat__icon">
                    <i class="fas fa-utensils"></i>
                </div>
                <div class="cat__name">
                    <span>
                        @lang('site.all')
                    </span>
                </div>
            </div>
            <!-- endding cat item -->
            @foreach($categories as $cat)

            <div class="cat__item  fil-cat" data-rel="{{$cat->id}}" data-cid="$id">
                <div class="cat__icon">
                    @if(!empty($cat->icon))

                     <i class="fa <?php echo $cat->icon; ?>"></i>

                    @else

                     <i class="fas fa-utensils"></i>
                    @endif

                </div>
                <div class="cat__name">
                    <span>
                    @if(!empty($cat->translation->name)){{ $cat->translation->name }}@else{{ $cat->name }}@endif
                    </span>
                </div>
            </div>

               {{-- <div class="cat__item  fil-cat" data-rel="{{$cat->id}}">
                <div class="cat__icon">
                    <i class="fa <?php echo $cat->icon; ?>"></i>
                </div>
                <div class="cat__name">
                    <span>
                    @if(!empty($cat->translation->name)){{ $cat->translation->name }}@else{{ $cat->name }}@endif
                    </span>
                </div>
            </div> --}}

            @endforeach
            <!-- endding cat item -->
            <!-- cat item -->


        </div>
    </div>
</div>
<!--ending cat menu by Aliwi-->
<!--  Amenities  Area Start
    ====================================================== -->

<section class="our-menu-bg">
    <div class="container">
        <div class="our-menu-details" style="">
            <div class="row" style=" justify-content: center;">
<div class="col-12"  >
    <div class="col-4"></div>
    <input  id="search-productsmenu"  placeholder="@lang('site.order_search')" class="form-control col-4" style="text-align:right; margin:0 auto;">
        <div class="col-4"></div>

</div>
                <!-- Start: Our-menu-Mains************************Section-one -->
                <!--display:flex; justify-content: center;-->


                <!-- Start: Our-menu-one -->
                <div class="col-xs-12 col-sm-12 col-lg-9 my-2 dynamic_row" id="portfolio">
                    <div class="row">
                        @foreach($categories as $cat)
                            @foreach($cat->products as $pro)
                            {{-- {{dd($pro)}} --}}
                            <div class="{{$pro->category_id}} menu-item-block col-6 col-sm-6 col-md-4 col-lg-4">
    	                   @if(file_exists('uploads/products/' . $pro->id . '.jpg'))
                            <img class="image"src="<?php echo url("uploads/products/thumb/" . $pro->id . ".jpg?rand=".rand(0,100)); ?>">
                            @else
                            <img class="image" src="{{ asset('uploads/product_logo.png') }}">
                            @endif
                                <!--<img src="{{url('uploads/products/thumb/' . $pro->id . '.jpg')}}" alt="" class="image">-->
                                <h5><span class="foodName">@if(!empty($pro->translation->name)){{ $pro->translation->name }}@else{{ $pro->name }}@endif</span></h5>
                                <p class="hidden-xs sub__title" style="margin-bottom : 0;">@if(!empty($pro->translation->description)){{ $pro->translation->description }}@else{{ $pro->description}}@endif</p>
                                <!-- Start: Our-menu-rgt -->
                                <?php
                                 if(!empty($pro->translation->prices)) {

                                    $prices = json_decode($pro->translation->prices);
                                    $titles = json_decode($pro->translation->titles);
                                    // $codes = json_decode($pro->translation->codes);
                                } else {
                                    $prices = json_decode($pro->prices);
                                    $titles = json_decode($pro->titles);
                                    // $codes = json_decode($pro->codes);
                                }
                                        ?>
                                @foreach($titles as $key=>$t)
                                <div class="price-controler">
                                    <div class="my-add-to-cart AddToCart" style="cursor:pointer;"
                                        data-price="{{ empty($prices[$key])? '': $prices[$key] }}" data-codes="{{empty($pro->codes)? '':$pro->codes[$key] }}" data-id="{{$pro->id}}" data-key="{{$key}}"
                                        data-size="{{$t}}" data-name="@if(!empty($pro->translation->name)){{ $pro->translation->name }}@else{{ $pro->name }}@endif">
                                        <h1><span>{{$t }}</span>: <?php echo $currency; ?>{{empty($prices[$key])? '':$prices[$key]}} </h1>
                                        <h2 class="adding-icon"><span class="f-30"><i class="fa  fa-plus"></i></span>
                                        </h2>
                                    </div>

                                </div>
                                @endforeach
                                <!-- End: Our-menu-rgt -->
                            </div>
                            <!-- End:  -->
                            @endforeach

                            {{-- @endif
                        @endif --}}

                        @endforeach
                    </div>
                </div>
            </div>
            <div class="" style="margin-bottom : 10px display:flex; justify-content: center;">

                <div class="bg-grey menu-list no-pad d-none" style="direction:rtl ; ">
                    <h5 style=" border-radius: 15px;">@lang('site.categories')</h5>
                    <ul class="">
                        <li style="cursor:pointer;" class="fil-cat" data-rel="all">@lang('site.all')</li>
                        @foreach($categories as $cat)
                        <li style="cursor:pointer;" class="fil-cat" data-rel="{{$cat->id}}"><i
                                class="fa <?php echo $cat->icon; ?>"></i>{{$cat->name}}</li>
                        @endforeach

                    </ul>
                </div>

                <br><br>

                <div class="bg-grey menu-list no-pad order-summary-widget">

                    <h5 class="orange">@lang('site.Your_Order') <i class="fa fa-shopping-cart white pull-right"></i>
                        <i id="show" class="fa fa-arrow-down white pull-left "></i>
                    </h5>
                    <div data-simplebar style="" class=" menu" data-simplebar-auto-hide="false">
                        <ul id="CartHTML" class="black-color">

                             @if(setting_by_key("vat")!=0)
                             <li class=" orange pt-3" style="text-align: right;">
                                @lang('site.Vat') &ensp;<span class="pull-left"> (<?php echo setting_by_key("vat"); ?>%)</span>
                            </li>
                           @endif
                               @if(setting_by_key("discount")!=0)
                             <li class=" orange pt-3" style="text-align: right;">
                                @lang('site.DISCOUNT') &ensp;<span class="pull-left">(<?php echo setting_by_key("discount"); ?> <?php echo $currency; ?> )</span>
                            </li>
                           @endif
                               @if(setting_by_key("delivary")!=0)
                             <li class=" orange pt-3" style="text-align: right;">
                                @lang('site.Delivery_Cost') &ensp;<span class="pull-left"> (<?php echo setting_by_key("delivary"); ?> <?php echo $currency; ?> )</span>
                            </li>
                           @endif





                        </ul>
                    </div>
                    {{-- @if (Auth::guard("customer")->check())
                    <button type="submit" onclick="orderStep4()"
                    class="w-100 px-4 py-2  text-center btn-checkout orangeHover orange"
                    value="">@lang('site.checkout')</button>
                    @else --}}
                    {{-- {{dd(setting_by_key('order_whatsapp_state'))}} --}}
                    <button  type="submit" data-toggle="modal" data-target="#myModal"
                    class="w-100 px-4 py-2  text-center btn-checkout orangeHover orange"
                    value="">@lang('site.checkout')</button>
                    {{-- @endif --}}

                </div>


            </div>
            <!-- End: Our-menu-Mains -->

            <!--bootstrap 4 -->
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
                integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l"
                crossorigin="anonymous">
            <!--simple bar-->
            <link rel="stylesheet" href="https://unpkg.com/simplebar@latest/dist/simplebar.css" />
            <script src="https://unpkg.com/simplebar@latest/dist/simplebar.min.js"></script>

        </div>
    </div>
</section>
<!-- =================================================
    Amenities  Area End -->
{{-- ================================================ --}}
{{-- Start Dialog --}}

<div id="myModal" class="modal fade cusModal" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header txt_dir">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="text-center sub-heading1">@lang('site.Ready_to_get_started')</h4>
            </div>
            <div class="modal-body col-sm-12">
                <div class="col-sm-12 form-group">
                    <div style="color:red" id="errors"> </div>
                </div>




                <!--adding col-sm-12 , row and rtl-inputs by aliwi !!! -->
                <div class="col-sm-12">
                    <div class="row rtl-inputs">
                        <div class="col-sm-6 col-lg-6 form-group txt_dir">
                            <label class="d-block text-right">@lang('site.full_name')</label>
                            <input type="text" class="form-control" id="name" name="name"
                                placeholder="@lang('site.name')" autocomplete="off" data-field_type="input">
                        </div>
                        @if ($isAuth)
                        <div class="col-sm-6 col-lg-6 form-group">
                            <label class="d-block text-right">@lang('site.phone')</label>
                            <input disabled  type="tel" dir="ltr" class="form-control" id="phone" name="phone"
                            value="{{$authCustomer->phone}}">
                        </div>
                        @else
                        <div class="col-sm-6 col-lg-6 form-group">
                            <label class="d-block text-right">@lang('site.phone')</label>
                            <input type="tel" dir="ltr" class="form-control" id="phone" name="phone"
                            value="">
                        </div>
                        @endif
                    </div>
                </div>
                <div id = "customerAddress" class="col-sm-12 col-lg-12 form-group txt_dir">

                </div>



                <?php $stripe_payment = setting_by_key("stripe");
                        if($stripe_payment == "yes") {
                    ?>
                <div class="col-sm-6 col-lg-6 form-group">
                    <div class="radio">
                        <label class="d-block text-right"><input type="radio" class="payment_option" checked
                                value="cash" name="payment">@lang('site.Cash_On_Delivery')</label>
                    </div>
                    <!-- <label>Cash On Delivery</label>
                        <input type="radio" class="form-control payment_option" checked  value="cash" name="payment" > -->
                </div>
                <div class="col-sm-6 col-lg-6 form-group">
                    <div class="radio">
                        <label class="d-block text-right"><input type="radio" class="payment_option" value="card"
                                name="payment">@lang('site.Pay_with_Credit_Card')</label>
                    </div>
                    <!-- <label>Pay with Debit/Credit Card</label>
                        <input type="radio" class="form-control payment_option"  value="card" name="payment" > -->
                </div>
                <input type="hidden" value="" id="payment_type" />
                <input type="hidden" value="" id="total_cost" />
                <span id="card_form">
                    <div class="col-sm-12 col-lg-12 form-group">
                        <label class="d-block text-right">@lang('site.Card_Number')</label>
                        <input type="text" class="form-control" id="cc_number" name="company"
                            placeholder="@lang('site.Expiry_Month')">
                    </div>

                    <div class="col-sm-3 col-lg-4 form-group">
                        <label>@lang('site.Expiry_Month')</label>
                        <select class="form-control" id="cc_month">
                            @for($i = 1; $i<=12; $i++) <option value="{{$i}}"> {{$i}} </option>
                                @endfor
                        </select>
                    </div>
                    <div class="col-sm-3 col-lg-4 form-group">
                        <label class="d-block text-right">@lang('site.Expiry_Year')</label>
                        <select class="form-control" id="cc_year">
                            @for($i = date('Y'); $i<= date('Y') + 6; $i++) <option value="{{$i}}"> {{$i}} </option>
                                @endfor
                        </select>
                    </div>

                    <div class="col-sm-4 col-lg-4 form-group">
                        <label class="d-block text-right">@lang('site.CC_Code')</label>
                        <input type="text" class="form-control" id="cc_code" name="company" placeholder="Card Number">
                    </div>
                </span>
                <?php } ?>


                <div class="col-sm-12 col-lg-12 form-group txt_dir">
                    <label class="d-block text-right">@lang('site.Comment')</label>
                    <textarea class="form-control" rows="2" placeholder="@lang('site.Message')" id="comment"
                        name="message"></textarea>
                </div>
              <input type="hidden" id="vat" class="form-control" value="0.00">
                <input type="hidden" id="delivery_cost" class="form-control"
                    value="<?php echo setting_by_key("delivery"); ?>">
                     <input type="hidden" id="discount" class="form-control"
                    value="<?php echo setting_by_key("discount"); ?>">

                <div class="col-sm-6">
                    <div class="col-xs-12 col-sm-12">
                        <!--adding w-100 to button by Aliwi-->
                        <button type="cancel" class="btn submit-btn col-sm-12 w-100"
                            data-dismiss="modal">@lang('site.cancel')</button>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="col-xs-12 col-sm-12">
                        {{-- This Is The Send Button --}}
                        <button type="submit" class="btn submit-btn col-sm-12 w-100 orderStep1"> @lang('site.completed_form')</button>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<div aria-modal="true" id="myModal2" class="modal fade cusModal" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header txt_dir">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="text-center sub-heading1">@lang('menu.complete_order')</h4>
            </div>
            <div class="modal-body col-sm-12">
                <div class="col-sm-12 form-group">
                    <div style="color:red" id="errors"> </div>
                </div>



                <!-- Chosing The Delivery Type -->
                <div class="col-sm-12">
                    <div class="row rtl-inputs">
                        <div class="col-sm-6 col-lg-6 form-group txt_dir">
                            <label class="d-block text-right">@lang('menu.delivery_in_home')</label>
                            <input type="radio" class="form-control" id="toHome" name="deliveryType"
                            autocomplete="off" data-field_type="input" value="Home">
                        </div>
                        <div class="col-sm-6 col-lg-6 form-group txt_dir">
                            <label class="d-block text-right">@lang('menu.delivery_in_table')</label>
                            <input @selected(true) type="radio" dir="ltr" class="form-control" id="toTable" name="deliveryType" value="Restaurant"/>
                        </div>
                    </div>
                </div>
                <hr/>
                <div class="col-sm-12 col-lg-12 form-group txt_dir">
                    <label class="d-block text-right">@lang('menu.quarter_hour')</label>
                    <input @selected(true) type="radio" class="form-control" rows="2" id="time" name="time"/>
                </div>
                <div class="col-sm-12 col-lg-12 form-group txt_dir">
                    <label class="d-block text-right">@lang('menu.half_hour')</label>
                    <input type="radio" class="form-control" rows="2" id="time" name="time"/>
                </div>
                <div class="col-sm-12 col-lg-12 form-group txt_dir">
                    <label class="d-block text-right">@lang('menu.one_hour')</label>
                    <input type="radio" class="form-control" rows="2" id="time" name="time"/>
                </div>
                <div class="col-sm-12 col-lg-12 form-group txt_dir">
                    <label class="d-block text-right">@lang('menu.tow_hour')</label>
                    <input type="radio" class="form-control" rows="2" id="time" name="time"/>
                </div>
                <div class="col-sm-12 col-lg-12 form-group txt_dir">
                    <label class="d-block text-right">@lang('menu.three_hour')</label>
                    <input type="radio" class="form-control" rows="2" id="time" name="time"/>
                </div>
                {{--  --}}

            </div>

        </div>
    </div>
</div>
{{-- End Dialog --}}
<script type="text/javascript">
$("#card_form").hide(100);
$("body").on("click", ".payment_option", function() {
    if ($(this).val() == "card") {
        $("#card_form").show(100);
        $("#payment_type").val("card");
    } else {
        $("#card_form").hide(100);
        $("#payment_type").val("cash");
    }
});
</script>
<link href="{{asset('adminpanel/assets/css/plugins/sweetalert/sweetalert.css')}}" rel="stylesheet">
<script src="{{asset('adminpanel/assets/js/plugins/sweetalert/sweetalert.min.js')}}"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="{{asset('adminpanel/assets/js/lodash.min.js')}}"></script>
<script>
  $('#show').click(function() {
      $('.menu').toggle("slide");
       $(this).toggleClass('active');
    });

</script>
<script>
// checking if the menu subtitle has text or not
// and upon that adding fixed height
// const sub__title = [...document.querySelectorAll('.sub__title')];
// sub__title.forEach(el => {
//     //  el.parentElement.classList.add('flex-column');
//     if(el.innerHTML !== ""){

//         if(el.innerHTML.length >= 50){
//             el.parentElement.classList.add('long_h');

//         }else{
//             el.parentElement.classList.add('normal_h');
//         }
//     }else{
//         el.parentElement.classList.add('normal_h');


//     }
// });
// const menuItemBlock = [...document.querySelectorAll('.menu-item-block')];
// menuItemBlock.forEach(el => {
//     if(el.classList.contains('18')){
//         el.classList.remove('normal_h');
//         el.classList.add('long_h');
//     }
// })
// menu cat functionality by Aliwi

let scrollPosition = window.scrollY;
const cat__conatiner = document.querySelector('.cat__conatiner');
const cat__fixed__menu = document.querySelector('.cat__fixed__menu');
const ourMenuSec = document.querySelector('.our-menu-bg');
window.addEventListener('scroll', function() {

    scrollPosition = window.scrollY;


    // if(scrollPosition >= 341){

    //   cat__fixed__menu.classList.add('catFixed');
    //     ourMenuSec.classList.add('mt-190');
    // }else{
    //     cat__fixed__menu.classList.remove('catFixed');
    //         ourMenuSec.classList.remove('mt-190');
    // }

    if (scrollPosition >= 400) {

        cat__conatiner.style.height = '96px';
    } else {
        cat__conatiner.style.height = '162px';
    }



});
// const changePos = document.querySelector('.changePos');
// changePos.addEventListener('click', e => {
//     cat__conatiner.scrollLeft += 100;
// })
const cat__item = [...document.querySelectorAll('.cat__item')]
cat__item.forEach(el => {
    el.addEventListener('click', e => {
        // window.scrollTo(0, 341);
        cat__item.forEach(el => el.classList.remove('active'))
        el.classList.add('active');
    })
})


let pos = 0;
let scrollPos = false;
// adding navigation functionality
const leftArrow = document.querySelector('.leftArrow');
const rightArrow = document.querySelector('.rightArrow');
// adding on click scroll functionality
leftArrow.addEventListener('click', e => {
    // checking if there was a scroll or not
    if (cat__conatiner.clientWidth < cat__conatiner.scrollWidth) {
        cat__conatiner.scrollLeft -= cat__item[0].offsetWidth + 30;
    }



})
cat__conatiner.addEventListener('scroll', e => {
    pos = Math.abs(Math.floor(cat__conatiner.scrollLeft));

    if (pos <= 20) {
        rightArrow.classList.add('d-none');

    } else {
        rightArrow.classList.remove('d-none');

    }
    Math.abs(Math.floor(cat__conatiner.scrollLeft)) === cat__conatiner.scrollWidth - cat__conatiner
        .clientWidth ? scrollPos = true : scrollPos = false;
    if (scrollPos) {
        leftArrow.classList.add('d-none');
    } else {
        leftArrow.classList.remove('d-none');

    }

})
rightArrow.addEventListener('click', e => {

    if (cat__conatiner.clientWidth < cat__conatiner.scrollWidth) {
        cat__conatiner.scrollLeft += cat__item[0].offsetWidth + 30;
    }
})


const isOverflown = ({
    clientWidth,
    clientHeight,
    scrollWidth,
    scrollHeight
}) => {
    return scrollHeight > clientHeight || scrollWidth > clientWidth;
}
window.addEventListener('DOMContentLoaded', e => {
    // checking if there is an overflow to hide arrows
    if (!isOverflown(cat__conatiner)) {
        leftArrow.classList.add('d-none');
        rightArrow.classList.add('d-none');
    } else {
        leftArrow.classList.remove('d-none');
        // rightArrow.classList.remove('d-none');
        cat__conatiner.classList.add('justify-content-start');
    }
    // deleting the arrow animation
    setInterval(() => {
        leftArrow.classList.remove('animationTrans');
        rightArrow.classList.remove('animationTrans');
    }, 2000);
})



//  Attribute Send
var allAddress = {{$isAuth}} && customerAddress != null ? customerAddress : [];
var delivery_cost = <?php echo setting_by_key("delivary") ? setting_by_key("delivary") : 0; ?>;
var discount = <?php echo setting_by_key("discount") ? setting_by_key("discount") : 0; ?>;
var vat = <?php echo setting_by_key("vat") ? setting_by_key("vat") : 0; ?>;
var invoice_vat = 0;
var customer = {};
var form_data = {
        name: "",
        // email: email,
        phone: "",
        table_id: "",
        comment: "",
        carnumber:"",
        carcolur:"",
        appointment:"",
        type: "order",
        status: 2,
        delivery_cost: delivery_cost,
        discount: discount,
        vat: vat,
        payment_with: $("#payment_type").val(),
        cc_number: $("#cc_number").val(),
        cc_month: $("#cc_month").val(),
        cc_year: $("#cc_year").val(),
        cc_code: $("#cc_code").val(),
        total_cost: $("#total_cost").val(),
        items: [],
        time:'',
        address: '',
        deliveryTo:''


    };

//  End Attribute

$("body").on("click", ".orderStep1", function() {
    console.log(customerAddress);
    allAddress = ({{$isAuth}} && customerAddress != null) ? customerAddress : allAddress;

    customer = {};
    var msg = "";

    customer["name"] = $("#name").val();
    //  customer["email"] = $("#email").val();
     customer["phone"] = {{$isAuth}}? $("#phone").attr('value') : $("#phone").val();
     customer["address"] = allAddress;

     form_data["name"] = $("#name").val();
    //  form_data["email"] = $("#email").val();
     form_data["phone"] = {{$isAuth}}? $("#phone").attr('value') : $("#phone").val();
     form_data["carnumber"] = $("#carnumber").val();
     form_data["carcolur"] = $("#carcolur").val();
     form_data["table_id"] = $("#table_id").val();
     form_data["appointment"] = $("#appointment").val();
     form_data["comment"] = $("#comment").val();

    form_data["items"] = _.map(cart, function(cart) {
            return {
                product_id: cart.product_id,
                size: cart.size,
                quantity: cart.quantity,
                price: cart.price,
                codes: cart.codes
            }
        });

    if (cart.length < 1) {
        swal("", "@lang('menu.product_required')", "error");
        return false;
    }

    if (customer["name"] == "") {
        msg += "@lang('menu.name_required')"+"<br>";
    }

    /*if(email == "") {
        msg+= "Email is Required<br>";
    }*/


    if (customer["phone"] == "") {
        msg += "@lang('menu.phone_required')"+"<br>";
    }
    // if (allAddress.length < 1) {
    //     msg += "@lang('menu.address_required')"+"<br>";
    // }
    if (msg) {
        swal("", msg, "error");
        return false;
    }


    if(!{{$isAuth}}){
        $(".orderStep1").html('<i class="fa fa-spinner fa-spin" style="font-size:18px"></i>');
        $.ajax({
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '<?php echo url("customer/customerOrderSMS"); ?>',
            data: customer,
            success: function(msg) {
                console.log(msg);
                if(msg == 1){
                    orderStep3();
                }
                else{
                    swal("", '@lang("menu.worng_number")', "error");
                    $(".orderStep1").html('@lang("site.completed_form")');
                    return false;
                }


            },
            error: function(e) {

            var errors = e.responseJSON.errors;
                msg += (errors.name == null)? '': errors.name + "<br>";
                msg += (errors.phone == null)? '':errors.phone + "<br>";
                msg += (errors.address == null)? '':errors.address + "<br>";
                swal("", msg, "error");
            $(".orderStep1").html('@lang("site.completed_form")');
                return false;

            }
        });
    }
    else{
        orderStep4();
    }





});

var products = new Array();
var cart = new Array();
// $("body").on("click", ".AddToCart", function() {
//     var ids = _.map(cart, 'id');
//     var item = {
//         id: $(this).attr("data-id") + $(this).attr("data-key"),
//         product_id: $(this).attr("data-id"),
//         price: $(this).attr("data-price"),
//         size: $(this).attr("data-size"),
//         name: $(this).attr("data-name"),
//         codes: $(this).attr("data-codes")
//     };
//     console.log(item);

//     if (!_.includes(ids, item.id)) {
//         item.quantity = 1;
//         item.p_qty = 1;
//         cart.push(item);
//     } else {
//         var index = _.findIndex(cart, item);
//         cart[index].quantity = cart[index].quantity + 1
//     }
//     toastr.success('Successfully Added to Cart')
//     show_cart();


// });


$("body").on("click", "#ClearCart", function() {

    var cart = [];
    $(".TotalAmount").html(0);
    $("#CartHTML").html("");
});
$("body").on("click", ".DecreaseToCart", function() {
    var item = {
        id: $(this).attr("data-id")
    };
    var index = _.findIndex(cart, item);

    if (cart[index].quantity == 1) {
        deleteItemFromCart(item);
    } else {
        cart[index].quantity = cart[index].quantity - 1;
    }

    show_cart();

});

$("body").on("click", ".IncreaseToCart", function() {
    var item = {
        id: $(this).attr("data-id")
    };
    var index = _.findIndex(cart, item);
    console.log(cart[index]);
    cart[index].quantity = cart[index].quantity + 1;
    show_cart();

});

$("body").on("click", ".DeleteItem", function() {
    var item = {
        id: $(this).attr("data-id")
    };

    deleteItemFromCart(item);
});

$("body").on("click", ".DiscountItem", function() {

});

// $("body").on("click", ".IncreaseAddress", function(){
//     var countAddress = $(".customerAddress").length;
//     if(countAddress == 4){
//         return false;
//     }
//     var customerAddress = $(".customerAddress").last();
//     customerAddress.after('<div class="col-sm-12 col-lg-12 form-group txt_dir customerAddress"><label class="d-block text-right">@lang('site.address')'+ (countAddress+1) +'</label><input type="text" class="form-control allAddress" rows="2" id="address" name="company"placeholder="@lang('site.address')" /></div>');
// });

// $("body").on("click", ".DecreaseAddress", function(){
//     var countAddress = $(".customerAddress").length;
//     if(countAddress == 1){
//         return false;
//     }
//     var customerAddress = $(".customerAddress").last();
//     customerAddress.remove();
//     $('.allAddress').each(function(index){
//         allAddress.push($(this).val());
//     });

// });

function deleteItemFromCart(item) {
    var index = _.findIndex(cart, item);
    cart.splice(index, 1);
    show_cart();
}

function orderStep2(){
    $.ajax({
        method: "GET",
        url: "<?php echo url('customer/RegisterSMS'); ?>",
        dataType: 'json',
        data: customer,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(msg){
            if(msg){
                $(".orderStep1").html('@lang("site.completed_form")');
                orderStep3();
            }
        },
        error: function (a){
            $(".orderStep1").html('@lang("site.completed_form")');
            console.log("Wrong NUmber");
                var msg = "@lang('menu.worng_number')";
                swal("", msg, "error");
                orderStep1();
        }

    });

}


$("body").on("click", "#buttonConfirmCode", function() {
    $("#buttonConfirmCode").html('<i class="fa fa-spinner fa-spin" style="font-size:18px"></i>');
    // swal.clickConfirm();
});


function orderStep3(){
    console.log("The Dialog Of Confirm Phone Numper");
     swal({
        html:
        "<h4 class='swal2-orderStep3-h4'>@lang('menu.activation')</h4>"+
        "<p class='swal2-orderStep3-p'>@lang('menu.activation_message') </p>"+
        "<label class='swal2-orderStep3-label'>"+form_data["phone"]+"</label>"+
        "<br/>"+
        "<input type='text' id='phoneCode' class='swal2-input swal2-inputerror swal2-orderStep3-input' />"+
        "<button type='button' id='buttonConfirmCode' class='form-control swal2-orderStep3-button' >@lang('site.confirm')</button>"+
        "<a href='#' onclick='resendCode(\""+form_data["phone"]+"\")' class='swal2-footer swal2-orderStep3-a'>@lang('menu.resend_code')</a>",

        allowOutsideClick: false,
        showConfirmButton: false,
        showCloseButton: true,

        preConfirm: function(value){
            var activationCode = $("#phoneCode").val();
            if (activationCode == "") {
                $("#buttonConfirmCode").html("@lang('site.confirm')");
                swal.showValidationError('@lang("menu.code_activation_empty")');
                return;
            }
            console.log("Activation Youe code");
            $.ajax({

                method: "GET",
                url: "<?php echo url('verfiAccount'); ?>",
                dataType: 'json',
                data: {activationCode: activationCode, phonenumber: $("#phone").val()},
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(msg){
                    if(msg){
                        console.log("Success");
                        orderStep4();
                    }
                },
                error: function(e){
                    console.log("Error");
                        $("#buttonConfirmCode").html("@lang('site.confirm')");
                        swal.showValidationError('@lang("menu.code_activation_error")');
                }
            });
        }
    });
}

$("body").on("click", "#deliveryToHome", function() {
    $(".hideAndShowAddress").show();
    $("#time_item").hide();
});
$("body").on("click", "#deliveryToTable", function() {
    $(".hideAndShowAddress").hide();
    $("#time_item").show();
});

function orderStep4(){

    // If User Is Signin
    if({{$isAuth}}){
        // allAddress = customerAddress;
        // form_data["name"] = customerName;
        form_data["phone"] = customerPhone;
        form_data["status"] = 2;
        // form_data["comment"] = authCustomer["comments"];

        if(cart.length < 1) {
        swal("", "@lang('menu.product_required')", "error");
        return false;
        }
        form_data["items"] = _.map(cart, function(cart) {
            return {
                product_id: cart.product_id,
                size: cart.size,
                quantity: cart.quantity,
                price: cart.price,
                codes: cart.codes
            }
        });
    }

    if(allAddress){
        console.log(allAddress.length);
        console.log(allAddress[0] == null);

        console.log(allAddress);
        console.log("RadioButton");
        addressOption = '<div class ="hideAndShowAddress  swal2-orderStep4-headingDiv"><h4 class="swal2-orderStep4-heading" >@lang("menu.address_to_deliver")</h4></div>';
        allAddress.forEach(el => {
        addressOption+= "<div class='swal2-orderStep4-headingDiv'><input class='orderAddress hideAndShowAddress swal2-orderStep4-styleOption' name='orderAdress' value='"+el+"' type='radio'/><label class='hideAndShowAddress' fore='toHome'>"+el+"</label></div> </br>";
    });
    }
    if(!{{$isAuth}} || allAddress.length < 1){
        console.log(allAddress);
        console.log("Input");
        addressOption=
            "<div style='display: block;text-align: start; margin-bottom: 100px' class='address-align swal2-orderStep4-headingDiv'>"+
                "<label class='hideAndShowAddress text-right'>@lang('site.address')</label>"+
                "<input type='text' class='hideAndShowAddress form-control allAddress' rows='2' id='address' name='company' placeholder='@lang('site.address')' />"+
            "</div>"
                ;
    }
    var whatsapp_icon = {{setting_by_key("order_whatsapp_state")}} ? '<span style="margin: 5px; font-size: 15px" class="fab fa-whatsapp"></span>' : '';
    swal({

        title: '<div style="justify-content: center;" class= "swal-orderStep4 modal-header"><h4 class= "text-center sub-heading1">@lang("menu.complete_order")</h4></div>',
        html:
        "<div style='padding-top: 30px;' class='swal2-orderStep4-headingDiv'><h4 class='swal2-orderStep4-heading' >@lang('menu.where_to_delivery')</h4></div>"+
        "<div>"+
        "<div class='swal2-orderStep4-headingDiv'><input class='receive_type swal2-orderStep4-styleOption swal2-orderStep4-heading swal2-inputerror deliveryPlace'  name='delivery' value='inRestaurant' type='radio' id='deliveryToTable'/><label fore='toTable'>@lang('menu.delivery_in_table')</label></div> </br>"+
        "<div class='swal2-orderStep4-headingDiv'><input class='receive_type swal2-orderStep4-styleOption swal2-inputerror deliveryPlace' checked name='delivery' value='inHome' type='radio' id='deliveryToHome'/><label fore='toHome'>@lang('menu.delivery_in_home')</label></div> </br>"+
        "<br/>"+
        "<div style='display: none;' id='time_item'>"+
        "<div class='swal2-orderStep4-headingDiv'><h4 class='swal2-orderStep4-heading' >@lang('menu.time_to_delivery')</h4></div>"+
        "<div class='swal2-orderStep4-headingDiv'><input class='time swal2-orderStep4-styleOption' checked name='time' value='quarter_hour' type='radio' id='quarter_hour'/><label fore='toHome'>@lang('menu.quarter_hour')</label></div> </br>"+
        "<div class='swal2-orderStep4-headingDiv'><input class='time swal2-orderStep4-styleOption' name='time' value='half_hour' type='radio' id='half_hour'/><label fore='toHome'>@lang('menu.half_hour')</label></div> </br>"+
        "<div class='swal2-orderStep4-headingDiv'><input class='time swal2-orderStep4-styleOption' name='time' value='one_hour' type='radio' id='one_hour'/><label fore='toHome'>@lang('menu.one_hour')</label></div> </br>"+
        "<div class='swal2-orderStep4-headingDiv'><input class='time swal2-orderStep4-styleOption' name='time' value='tow_hour' type='radio' id='tow_hour'/><label fore='toHome'>@lang('menu.tow_hour')</label></div> </br>"+
        "<div class='swal2-orderStep4-headingDiv'><input class='time swal2-orderStep4-styleOption' name='time' value='three_hour' type='radio' id='three_hour'/><label fore='toHome'>@lang('menu.three_hour')</label></div> </br>"+
        "</div>"+
        "<br/>"+
        addressOption+
        "</div>",
        confirmButtonText: '@lang("menu.ok")'+whatsapp_icon,
        showConfirmButton: true,
        confirmButtonColor: "var(--primary)",
        preConfirm: function(value){

            form_data["time"] = $(".time:checked").val();

            if(allAddress.length < 1){
                form_data["address"] = $("#address").val();
            }
            else{
                form_data["address"] =  $(".orderAddress:checked").val();
            }

            form_data["receive_type"] = $(".receive_type:checked").val();

            if(form_data["receive_type"] == "inHome" && (form_data["address"] == '' || form_data["address"] == null)){
                swal.showValidationError('@lang("menu.address_empity")');
                return;
            }

            form_data["vat"] = invoice_vat? invoice_vat : vat;
            $(".swal2-confirm").html('<i class="fa fa-spinner fa-spin" style="font-size:18px"></i>');
            $(".swal2-confirm").prop('disabled', true);
            if({{setting_by_key("order_whatsapp_state")}}){
                orderViaWahtsapp();
            }
            else{
                $.ajax({
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '<?php echo url("sales/online_order"); ?>',
                data: form_data,
                success: function(msg) {
                    var obj = $.parseJSON(msg);
                    if (obj['error'] == 1) {
                        swal(
                            'Oops...', obj['message'], 'error'
                        )
                        $("#payment_message").html(obj['message']);
                        return false;
                    }

                    $(".orderStep1").html('@lang("site.completed_form")');

                        cart = [];
                    $("#comments").val("");
                    $("#name").val("");
                    $("#email").val("");
                    $("#phone").val("");
                    $("#table_id").val("");
                    $("#address").val("");
                    $("#comment").val("");
                    $("#appointment").val("");
                    show_cart();
                    swal({
                            type: 'success',
                            title: '@lang("menu.requiest_processed")',
                            showConfirmButton: false,
                            timer: 2500
                        })
                        window.location.reload(true);
                        return ;

                }
            });
            }


        }
    });
}
function resendCode(phone){
    $.ajax({
        method:'POST',
        url:'<?php echo url("customer/resendCodeSMS"); ?>',
        dataType : 'json' ,
        headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
        data:{
            phone:phone
        },
        success :function(res){
            if(res){
                orderStep3();
            }

        },
        error: function(e){

        }
    });
}


function show_cart() {
    if (cart.length > 0) {
        var qty = 0;
        var total = 0;
        var cart_html = "";
        var obj = cart;

        $.each(obj, function(key, value) {


            cart_html +=
                '<li style="text-align: right;"><span style="cursor:pointer;" class="pull-left"><i data-id=' +
                value.id +
                ' class="fa my-icons fa-minus-circle DecreaseToCart" aria-hidden="true"></i>&ensp;<i data-id=' +
                value.id +
                ' class="fa my-icons fa-plus-circle IncreaseToCart" aria-hidden="true"></i></span>&ensp;<span class="">' +
                value.quantity + 'x</span> ' + value.name +'-'+  value.size + " / " +
                '<span class="pull-right" style="cursor:pointer;">' + value.price +  " "+'<?php echo $currency; ?> '+
                ' <i class="fa my-icons fa-times-circle fa-lg DeleteItem" data-id=' + value.id +
                '></i></span></li>';

            qty = Number(value.quantity);
            total = Number(total) + Number(value.price * qty);

        });

          if( vat  || delivery_cost || discount)
        {

             cart_html += '<li class="list-pad flex-col">@lang('site.Sub_Total') &ensp;<span class="pull-right TotalAmount">' + total + '</li>';
             if(vat)
             {

                 invoice_vat = (Number(total) * vat) / 100;
                 cart_html +=
                 '<li class="flex-col ">+ @lang('site.Vat') (<?php echo setting_by_key("vat"); ?>%) &ensp;<span class="pull-right bigTotal"><?php echo $currency; ?>' +
                    invoice_vat + '</li>';
             }
              if(delivery_cost)
             {
               cart_html +=
              '<li>@lang('site.Delivery_Cost')  &ensp;<span class="pull-right"><?php echo $currency; ?><?php echo setting_by_key("delivary"); ?></li>';
             }
              if(discount)
             {
                   cart_html +=
              '<li>@lang('site.DISCOUNT') &ensp;<span class="pull-right"><?php echo $currency; ?><?php echo setting_by_key("discount"); ?></li>';
             }
           var total_cost = Number(total) + delivery_cost - discount + invoice_vat;
           cart_html +=
            '<li class="list-pad flex-col">@lang('site.TOTAL') &ensp;<span class="pull-right bigTotal"><?php echo $currency; ?>' +
            " " + total_cost + '</li>';
            $("#vat").val(vat);

        }
        else
        {
        var total_cost = Number(total) ;
        cart_html +=
            '<li class="list-pad flex-col">@lang('site.TOTAL') &ensp;<span class="pull-right bigTotal"><?php echo $currency; ?>' +
            " " + total_cost + '</li>';
        }

        // cart_html += '<li class="list-pad">Subtotal &ensp;<span class="pull-right TotalAmount">' + total + '</li>';

        //     cart_html +=
        //     '<li>Delivery Fee &ensp;<span class="pull-right"><php echo $currency; ?><php echo setting_by_key("delivery_cost"); ?></li>';
        // var vat = (Number(total) * <php echo setting_by_key("vat"); ?>) / 100;
        // cart_html +=
        //     '<li class="flex-col ">+ VAT (<php echo setting_by_key("vat"); ?>%) &ensp;<span class="pull-right bigTotal"><?php echo $currency; ?>' +
        //     vat + '</li>';
        // var total_cost = Number(total) + <php echo setting_by_key("delivery_cost"); ?> + vat;
        // cart_html +=
        //     '<li class="list-pad flex-col">Total &ensp;<span class="pull-right bigTotal"><php echo $currency; ?>' +
        //     " " + total_cost + '</li>';


        // $("#vat").val(vat);

        // cart_html += '<div class="panel-footer"> Total Items' ;
        // cart_html += '<span class="pull-right"> ' + qty ;
        // cart_html += '</span></div>' ;


        $("#CartHTML").html("");
        $("#total_cost").val(total_cost);
        $("#CartHTML").html(cart_html);
    } else {
        $(".TotalAmount").html(0);
        $("#CartHTML").html("");
    }

}
$(function() {
    var selectedClass = "";
    $(".fil-cat").click(
        function()
        {
        selectedClass = $(this).attr("data-rel");
        console.log(selectedClass)

        $.ajax({
               method:'Get',
                url:'<?php echo url("/menuCategory/"); ?>',
                dataType : 'json' ,
                data:{
                    id:selectedClass
                },
                success :function(res)
                {
                    console.log(res);
                    var tableRow ='';
                    var ctableRow ='';
                    var xtableRow ='';
                    $('.dynamic_row').html('<div class="row"></div>');

// /////////////////////////////////////////////////////////
                    $.each(res, function(ind,val){
                    var k = 0;
                    var  titles2 = [];
                    var name ="";
                    var description ="";

                    $.each(val.products, function(index,value){

                   if(value.enable)
                    {
                         if(value.translation!=null)
                    {
                        name = value.translation.name;
                         if(value.translation.description!=null)
                         {
                             description = value.translation.description;
                         }

                    }
                    else
                    {
                         name = value.name;
                       if(value.description!=null)
                         {
                             description = value.description;
                         }
                    }

                      $.each(value.titles, function(indexx,valuex){
                          console.log(value.codes);
                        if(value.codes == null){
                            value.codes = "";
                        }
                          titles2[valuex] = value.prices[indexx]
                          //    console.log(valuex)
                        //    console.log(titles2[valuex])
                        //    console.log(value.codes[indexx])

                       ctableRow +='<div class="price-controler"><div class="my-add-to-cart AddToCart" style="cursor:pointer;" data-codes="'+value.codes[indexx]+'"  data-price="'+titles2[valuex]+'" data-key="'+k+'" data-id="'+value.id+'" data-size="'+valuex+'" data-name="'+name+'"><h1><span>'+valuex+'</span>: <?php echo $currency; ?>'+titles2[valuex]+' </h1><h2 class="adding-icon"><span class="f-30"><i class="fa  fa-plus"></i></span></h2></div></div>'
                        k++;
                      });


                    var imgsrc = 'uploads/products/thumb/'+value.id+'.jpg';
                    // console.log(imgsrc)
                    if(imgsrc==null)
                    {
                        imgsrc = 'uploads/product_logo.png';
                    }
                    tableRow ='<div class=" menu-item-block col-6 col-sm-6 col-md-4 col-lg-4"><img src='+imgsrc+' alt="" class="image"><h5><span class="foodName">'+name+'</span></h5><p class="hidden-xs sub__title" style="margin-bottom : 0;">'+description+'</p>'
                    //   $.each(titles2, function(indexx,valuex){
                    //   console.log(indexx);
                    //   console.log(valuex)
                    //     k++;
                    //   });
                      xtableRow = tableRow + ctableRow +'</div>';
                      ctableRow='';

                      k=0;
                      titles2.length = 0;

                      $('.dynamic_row .row').append(xtableRow);

                //     }


                //   }


                //     });








                //   var  titles1 = [];
                //       for(var i=0 ; i<res.products.length;i++)
                //       {
                //           console.log(res.products[i])

                //              $.each(res.products[i].titles, function(index,value){
                //                  titles1[value] = res.products[i].prices[index]
                //                  console.log(titles1)
                //              } );

                //end if

                    }
                    }  );
                    }  );

//end success
                      }


            //end ajax

        });
        // $("#portfolio").fadeTo(100, 0.1);
        // //  added another direct div and all class to the element  by Aliwi

        // $("#portfolio > div > div").addClass(
        //     'all') //  added display none to show the elements  by Aliwi
        // $("#portfolio > div > div").not("." + selectedClass).fadeOut().css("display", "none");
        // setTimeout(function()
        //  {
        //     //  added display block to show the elements  by Aliwi
        //     $("." + selectedClass).fadeIn().css("display", "block");
        //     $("#portfolio").fadeTo(300, 1);
        // }
        // , 300);



    });
});
</script>

<script>
        $('body').on('keyup','#search-productsmenu',function(){
            var searchQuery = $(this).val();
            console.log(searchQuery);
            // if(searchQuery=='')
            // {
            //       location.reload();

            // }
            $.ajax({
                method:'Post',
                url:'<?php echo url("product/search_menu"); ?>' ,
                dataType : 'json' ,
                data : {
                    '_token' : '{{ csrf_token() }}',
                    searchQuery :searchQuery
                } ,
                success :function(res){
                    console.log(res);
                    var tableRow ='';
                    var ctableRow ='';
                    var xtableRow ='';
                    $('.dynamic_row').html('<div class="row"></div>');
                    var k = 0;
                    $.each(res, function(index,value){
                     if(value.enable)
                     {
                          console.log(value)
                          var imgsrc = 'uploads/products/thumb/'+value.product_id+'.jpg';
                           console.log(imgsrc)
                          tableRow ='<div class=" menu-item-block col-6 col-sm-6 col-md-4 col-lg-4"><img src='+imgsrc+' alt="" class="image"><h5><span class="foodName">'+value.name+'</span></h5><p class="hidden-xs sub__title" style="margin-bottom : 0;">'+value.description +'</p>'
                      $.each(value.titles2, function(indexx,valuex){
                      console.log(indexx);
                      console.log(valuex)
                      console.log(valuex.code)
                        ctableRow +='<div class="price-controler"><div class="my-add-to-cart AddToCart" style="cursor:pointer;"data-price="'+valuex.price+'" data-key="'+k+'" data-codes="'+valuex.code+'"  data-id="'+value.product_id+'" data-size="'+indexx+'" data-name="'+value.name+'"><h1><span>'+indexx+'</span>: <?php echo $currency; ?>'+valuex.price+' </h1><h2 class="adding-icon"><span class="f-30"><i class="fa  fa-plus"></i></span></h2></div></div>'
                        k++;
                      })
                       xtableRow = tableRow + ctableRow +'</div>';
                      ctableRow='';

                       k=0;
                      $('.dynamic_row .row').append(xtableRow);

                     }





                    });
                }
            });
        });

          function orderViaWahtsapp(){

            $.ajax({
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '<?php echo url("sales/online_order_whatsapp"); ?>',
                data: form_data,
                success: function(res) {

                    if (res['error'] == 1) {
                        swal(
                            'Oops...', res['message'], 'error'
                        )
                        $("#payment_message").html(res['message']);
                        return false;
                    }
                var total_cost = delivery_cost - discount + invoice_vat;
                var phone = <?php echo setting_by_key("phone") ?>;
                var resturent_name = res["resturant_title"];
                var text = '🍽'+ resturent_name +'🍽'+'%0a';
                // text+="---------------------------------%0a";
                text+="%0a";
                text += "@lang('site.invoice_no'): " + res["invoice_no"] + '🧾' + "%0a";
                text+="---------------------------------%0a";
                text+='@lang("site.Your_Order")🛒%0a';
                    cart.forEach(item =>{
                        total_cost += Number(item["price"] * item["quantity"]);
                        text+= item["name"]+" "+ item["size"]+ "[{{$currency}} " + item["price"] + "] x" + item["quantity"] + "%0a";
                    });
                    text+="---------------------------------%0a";
                    // text+='💵%0a';
                    text+="@lang('site.Vat')  {{$currency}}"+ invoice_vat+"💰%0a";
                    text+="@lang('site.Delivery_Cost')  {{$currency}}"+ delivery_cost+"🛵%0a";
                    text+="@lang('site.DISCOUNT')  {{$currency}}"+ discount+"💸%0a";
                    text+="@lang('site.total_amount') {{$currency}}"+ total_cost+"💵%0a";

                    var a = document.createElement('a');
                    a.target="_blank";
                    a.href="https://api.whatsapp.com/send?phone="+ phone +"&text="+ text +"";
                    a.click();


                    $(".orderStep1").html('@lang("site.completed_form")');
                    swal({
                            type: 'success',
                            title: '@lang("menu.requiest_processed")',
                            showConfirmButton: false,
                            timer: 2500
                        })
                        cart = [];
                    $("#comments").val("");
                    $("#name").val("");
                    $("#email").val("");
                    $("#phone").val("");
                    $("#table_id").val("");
                    $("#address").val("");
                    $("#comment").val("");
                    $("#appointment").val("");
                    show_cart();

                        window.location.reload(true);
                        return ;
                }
            });


        }

    </script>
@endsection
