@extends('frontend.appother')

@section('content')
<?php $currency =  setting_by_key("currency"); ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
    integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
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
                    @endif                </div>
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
    <input  id="search-productsmenu"  placeholder=" ابحث عن طلبك" class="form-control col-4" style="width:800px; text-align:right; margin:0 auto;">
        <div class="col-4"></div>

</div>
                <!-- Start: Our-menu-Mains************************Section-one -->
                <!--display:flex; justify-content: center;-->


                <!-- Start: Our-menu-one -->
                <div class="col-xs-12 col-sm-12 col-lg-9 my-2 dynamic_row" id="portfolio">
                    <div class="row">
                        @foreach($categories as $cat)
                            @foreach($cat->products as $pro)
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
                                } else { 
                                    $prices = json_decode($pro->prices); 
                                    $titles = json_decode($pro->titles); 
                                }
                                        ?>
                                @foreach($titles as $key=>$t)
                                <div class="price-controler">
    
                                    <div class="my-add-to-cart AddToCart" style="cursor:pointer;"
                                        data-price="{{$prices[$key]}}" data-id="{{$pro->id}}" data-key="{{$key}}"
                                        data-size="{{$t}}" data-name="@if(!empty($pro->translation->name)){{ $pro->translation->name }}@else{{ $pro->name }}@endif">
                                        <h1><span>{{$t }}</span>: <?php echo $currency; ?>{{$prices[$key]}} </h1>
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

                    <button type="submit" data-toggle="modal" data-target="#myModal"
                        class="w-100 px-4 py-2  text-center btn-checkout orangeHover orange"
                        value="">@lang('site.checkout')</button>
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
                        <div class="col-sm-6 col-lg-6 form-group txt_dir">
                            <label class="d-block text-right">@lang('site.phone')</label>
                            <input type="text" dir="ltr" class="form-control" id="phone" name="phone"
                                placeholder="@lang('site.phone')">
                        </div>
                       
                       
                    </div>
                </div>
                <div class="col-sm-12 col-lg-12 form-group txt_dir">
                    <label class="d-block text-right">@lang('site.address')</label>
                    <textarea type="text" class="form-control" rows="2" id="address" name="company"
                        placeholder="@lang('site.address')"></textarea>
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
                        <button type="submit"
                            class="btn submit-btn col-sm-12 w-100 ConfirmOrder">@lang('site.completed_form')</button>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
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



var products = new Array();
var cart = new Array();
// $("body").on("click", ".AddToCart", function() {
//    swal({
//                 title: '',
//                 type: 'error',
//                 text: '<?php echo setting_by_key("statement"); ?>'
//             })


// });






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
          if(<?php echo setting_by_key("vat"); ?> || <?php echo setting_by_key("delivary"); ?> || <?php echo setting_by_key("discount"); ?> )
        {
             cart_html += '<li class="list-pad flex-col">@lang('site.Sub_Total') &ensp;<span class="pull-right TotalAmount">' + total + '</li>';
             if(<?php echo setting_by_key("vat"); ?>)
             {
                 var vat = (Number(total) * <?php echo setting_by_key("vat"); ?>) / 100;
                 cart_html +=
                 '<li class="flex-col ">+ @lang('site.Vat') (<?php echo setting_by_key("vat"); ?>%) &ensp;<span class="pull-right bigTotal"><?php echo $currency; ?>' +
                 vat + '</li>';
             }
              if(<?php echo setting_by_key("delivary"); ?>)
             {
               cart_html +=
              '<li>@lang('site.Delivery_Cost')  &ensp;<span class="pull-right"><?php echo $currency; ?><?php echo setting_by_key("delivary"); ?></li>';
             }
              if(<?php echo setting_by_key("discount"); ?>)
             {
                   cart_html +=
              '<li>@lang('site.DISCOUNT') &ensp;<span class="pull-right"><?php echo $currency; ?><?php echo setting_by_key("discount"); ?></li>';
             }
           
       
           var total_cost = Number(total) + <?php echo setting_by_key("delivary"); ?>- <?php echo setting_by_key("discount"); ?> + vat;
           cart_html +=
            '<li class="list-pad flex-col">@lang('site.TOTAL') &ensp;<span class="pull-right bigTotal"><?php echo $currency; ?>' +
            " " + total_cost + '</li>';
            $("#vat").val(vat);
            
        }
        else
        {
        var total_cost = Number(total) ;
        cart_html +=
            '<li class="list-pad flex-col">@lang('site.Total') &ensp;<span class="pull-right bigTotal"><?php echo $currency; ?>' +
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
                url:'<?php echo url("/menu/"); ?>',
                dataType : 'json' ,
                data:{
                    id:selectedClass
                },
                success :function(res)
                {
                  
                    
                    // console.log(res);
                    var tableRow ='';
                    var ctableRow ='';
                    var xtableRow ='';
                    $('.dynamic_row').html('<div class="row"></div>');
                    var k = 0;
                    var  titles2 = [];
                    var name ="";
                    var description ="";
                   
                    $.each(res.products, function(index,value){
                            console.log(value)
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
                          titles2[valuex] = value.prices[indexx]
                           console.log(valuex)
                           console.log(titles2[valuex])
                       ctableRow +='<div class="price-controler"><div class="my-add-to-cart AddToCart" style="cursor:pointer;"data-price="'+titles2[valuex]+'" data-key="'+k+'" data-id="'+value.id+'" data-size="'+valuex+'" data-name="'+name+'"><h1><span>'+valuex+'</span>: <?php echo $currency; ?>'+titles2[valuex]+' </h1><h2 class="adding-icon"><span class="f-30"><i class="fa  fa-plus"></i></span></h2></div></div>'
                        k++;
                      });
                         
                   
                    var imgsrc = 'uploads/products/thumb/'+value.id+'.jpg';
                    console.log(imgsrc)
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
                          tableRow ='<div class=" menu-item-block col-6 col-sm-6 col-md-4 col-lg-4"><img src='+imgsrc+' alt="" class="image"><h5><span class="foodName">'+value.name+'</span></h5><p class="hidden-xs sub__title" style="margin-bottom : 0;">'+value.description+'</p>'
                      $.each(value.titles2, function(indexx,valuex){
                      console.log(indexx);
                      console.log(valuex)
                        ctableRow +='<div class="price-controler"><div class="my-add-to-cart AddToCart" style="cursor:pointer;"data-price="'+valuex+'" data-key="'+k+'" data-id="'+value.product_id+'" data-size="'+indexx+'" data-name="'+value.name+'"><h1><span>'+indexx+'</span>: <?php echo $currency; ?>'+valuex+' </h1><h2 class="adding-icon"><span class="f-30"><i class="fa  fa-plus"></i></span></h2></div></div>'
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
    </script>
@endsection