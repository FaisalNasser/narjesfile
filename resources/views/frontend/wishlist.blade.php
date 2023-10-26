@extends('frontend.appother2')
@section('content')
<!--=======  shop page content  =======-->
<div class="row shop-product-wrap list mb-10" style="padding:0px 15px;">
    @foreach ($wishlistarray->chunk(2) as $chunk)
    <div class="col-12 col-lg-4 col-md-6 col-sm-6 mb-20">

        @foreach ($chunk as $wishlistitem)
        <!--=======  grid view product  =======-->

        <div class="single-slider-product single-slider-product--list-view list-view-product" style="    padding: 37px 48px 21px 105px;">
            <div class="single-slider-product__image single-slider-product--list-view__image">
                <a href="<?php echo url("singleproduct/" . $wishlistitem->product->id); ?>" style="    width: 65%;">
                    <img width="400" height="400" src="<?php echo url("uploads/products/thumb/" . $wishlistitem->product->id . ".jpg?rand=" . rand(0, 100)); ?>" class="img-fluid" alt="">
                </a>

                <!-- <span class="discount-label discount-label--green">-10%</span> -->
            </div>

            <div class="single-slider-product__content  single-slider-product--list-view__content">
                <div class="single-slider-product--list-view__content__details">
                    <p class="product-title" style="margin-top: 0; margin-bottom: 0;"><a href="<?php echo url("singleproduct/" . $wishlistitem->product->id); ?>">
                            @if (!empty($wishlistitem->translation->name))
                            {{ $wishlistitem->translation->name }}@else{{ $wishlistitem->product->name }}
                            @endif</a></p>

                    <?php
                    if (!empty($wishlistitem->translation->prices)) {
                        $prices = json_decode($wishlistitem->translation->prices);
                        $titles = json_decode($wishlistitem->translation->titles);
                    } else {
                        $prices = json_decode($wishlistitem->product->prices);
                        $titles = json_decode($wishlistitem->product->titles);
                    }
                    ?>
                    <p class="short-desc" style="margin-top: -13px; margin-bottom: -5px;">{{ $titles[0] }} </p>
                    <p class="product-price"><span class="discounted-price" style="font-size: 20px;">{{ $prices[0] }} € </span> <span> @lang('site.includeVat')</span> </p>
                    <div class="stepper" style="width:25%;">

                        <input type="text" value="1" class="form-control">

                        <span>
                            <i class="fa fa-angle-up IncreaseToCart" data-id="{{ $wishlistitem->product->id}}">

                            </i>
                            <i class=" fa fa-angle-down DecreaseToCart" data-id="{{ $wishlistitem->product->id}}">

                            </i>
                        </span>
                    </div>
                    
                </div>

                <div class="single-slider-product--list-view__content__actions">
                    <a data-link="<?php echo url("singleproduct/" . $wishlistitem->product->id); ?>" data-catId="{{$wishlistitem->product->category_id}}" data-image="<?php echo url("uploads/products/thumb/" . $wishlistitem->product->id . ".jpg?rand=" . rand(0, 100)); ?>" data-price="{{ $prices[0] }}" data-id="{{ $wishlistitem->product->id }}" data-key="0" data-size="{{$titles[0]}}" data-name=" @if (!empty($wishlistitem->translation->name))
                                                                                {{ $wishlistitem->translation->name }}
                                                                                @else{{ $wishlistitem->product->name }}
                                                                                @endif" class="theme-button AddToCart list-cart-button mb-10 "> @lang('site.add_to_cart')</a>


                </div>

            </div>

        </div>

        <!--=======  End of grid view product  =======-->
        @endforeach

    </div>
    @endforeach

</div>

<!--=======  End of shop page content  =======-->
@endsection