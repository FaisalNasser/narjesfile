@extends('frontend.appother')

@section('content')
    <!--====================  breadcrumb area ====================-->
    <?php $currency = setting_by_key('currency'); ?>

    <div class="breadcrumb-area pt-10 pb-10 border-bottom mb-40">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!--=======  breadcrumb content  =======-->

                    <div class="breadcrumb-content">
                        <ul>
                            <li class="has-child"><a href="{{ url('/') }}">Home</a></li>
                            <li>Product Details</li>
                        </ul>
                    </div>

                    <!--=======  End of breadcrumb content  =======-->
                </div>
            </div>
        </div>
    </div>

    <!--====================  End of breadcrumb area  ====================-->

    <!--====================  product details area ====================-->

    <div class="product-details-area mb-40">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mb-md-30 mb-sm-25">
                    <!--=======  product details slider  =======-->

                    <!--=======  big image slider  =======-->

                    <div class="big-image-slider-wrapper big-image-slider-wrapper--change-cursor">
                        <div class="ht-slick-slider big-image-slider99"
                            data-slick-setting='{
                                "slidesToShow": 1,
                                "slidesToScroll": 1,
                                "dots": false,
                                "autoplay": false,
                                "autoplaySpeed": 5000,
                                "speed": 1000
                            }'
                            data-slick-responsive='[
                                {"breakpoint":1501, "settings": {"slidesToShow": 1} },
                                {"breakpoint":1199, "settings": {"slidesToShow": 1} },
                                {"breakpoint":991, "settings": {"slidesToShow": 1} },
                                {"breakpoint":767, "settings": {"slidesToShow": 1} },
                                {"breakpoint":575, "settings": {"slidesToShow": 1} },
                                {"breakpoint":479, "settings": {"slidesToShow": 1} }
                            ]'>

                         
                            <!--=======  big image slider single item  =======-->

                            <div class="big-image-slider-single-item">
                                @if (file_exists('uploads/products/' . $product->id . '.jpg'))
                                    <img width="700" height="700" src="<?php echo url('uploads/products/thumb/' . $product->id . '.jpg?rand=' . rand(0, 100)); ?>" class="img-fluid"
                                        alt="">
                                @else
                                    <img width="700" height="700" class="img-fluid"
                                        src="{{ asset('uploads/product_logo.png') }}">
                                @endif
                            </div>

                            <!--=======  End of big image slider single item  =======-->

                            <!--=======  big image slider single item  =======-->

                            <div class="big-image-slider-single-item">
                                @if (file_exists('uploads/products/' . $product->id . '.jpg'))
                                    <img width="700" height="700" src="<?php echo url('uploads/products/thumb/' . $product->id . '.jpg?rand=' . rand(0, 100)); ?>" class="img-fluid"
                                        alt="">
                                @else
                                    <img width="700" height="700" class="img-fluid"
                                        src="{{ asset('uploads/product_logo.png') }}">
                                @endif
                            </div>

                            <!--=======  End of big image slider single item  =======-->

                            <!--=======  big image slider single item  =======-->

                            <div class="big-image-slider-single-item">
                                @if (file_exists('uploads/products/' . $product->id . '.jpg'))
                                    <img width="700" height="700" src="<?php echo url('uploads/products/thumb/' . $product->id . '.jpg?rand=' . rand(0, 100)); ?>" class="img-fluid"
                                        alt="">
                                @else
                                    <img width="700" height="700" class="img-fluid"
                                        src="{{ asset('uploads/product_logo.png') }}">
                                @endif
                            </div>

                            <!--=======  End of big image slider single item  =======-->

                            <!--=======  big image slider single item  =======-->

                            <div class="big-image-slider-single-item">
                                @if (file_exists('uploads/products/' . $product->id . '.jpg'))
                                    <img width="700" height="700" src="<?php echo url('uploads/products/thumb/' . $product->id . '.jpg?rand=' . rand(0, 100)); ?>" class="img-fluid"
                                        alt="">
                                @else
                                    <img width="700" height="700" class="img-fluid"
                                        src="{{ asset('uploads/product_logo.png') }}">
                                @endif
                            </div>

                            <!--=======  End of big image slider single item  =======-->

                            <!--=======  big image slider single item  =======-->

                            <div class="big-image-slider-single-item">
                                @if (file_exists('uploads/products/' . $product->id . '.jpg'))
                                    <img width="700" height="700" src="<?php echo url('uploads/products/thumb/' . $product->id . '.jpg?rand=' . rand(0, 100)); ?>" class="img-fluid"
                                        alt="">
                                @else
                                    <img width="700" height="700" class="img-fluid"
                                        src="{{ asset('uploads/product_logo.png') }}">
                                @endif
                            </div>

                            <!--=======  End of big image slider single item  =======-->

                        </div>
                    </div>

                    <!--=======  End of big image slider  =======-->

                    <!--=======  small image slider  =======-->

                    <div class="small-image-slider-wrapper small-image-slider-wrapper--quickview">
                        <div class="ht-slick-slider small-image-slider"
                            data-slick-setting='{
                                "slidesToShow": 3,
                                "slidesToScroll": 1,
                                "dots": false,
                                "autoplay": false,
                                "autoplaySpeed": 5000,
                                "speed": 1000,
                                "asNavFor": ".big-image-slider99",
                                "focusOnSelect": true,
                                "arrows": true,
                                "prevArrow": {"buttonClass": "slick-prev", "iconClass": "ion-ios-arrow-left" },
                                "nextArrow": {"buttonClass": "slick-next", "iconClass": "ion-ios-arrow-right" }
                            }'
                            data-slick-responsive='[
                                {"breakpoint":1501, "settings": {"slidesToShow": 4} },
                                {"breakpoint":1199, "settings": {"slidesToShow": 4} },
                                {"breakpoint":991, "settings": {"slidesToShow": 4} },
                                {"breakpoint":767, "settings": {"slidesToShow": 4} },
                                {"breakpoint":575, "settings": {"slidesToShow": 3} },
                                {"breakpoint":479, "settings": {"slidesToShow": 2} }
                            ]'>

                            <!--=======  small image slider single item  =======-->

                            <div class="small-image-slider-single-item">
                                @if (file_exists('uploads/products/' . $product->id . '.jpg'))
                                    <img width="600" height="600" src="<?php echo url('uploads/products/thumb/' . $product->id . '.jpg?rand=' . rand(0, 100)); ?>" class="img-fluid"
                                        alt="">
                                @else
                                    <img width="600" height="600" class="img-fluid"
                                        src="{{ asset('uploads/product_logo.png') }}">
                                @endif
                            </div>

                            <!--=======  End of small image slider single item  =======-->

                            <!--=======  small image slider single item  =======-->

                            <div class="small-image-slider-single-item">
                                @if (file_exists('uploads/products/' . $product->id . '.jpg'))
                                    <img width="600" height="600" src="<?php echo url('uploads/products/thumb/' . $product->id . '.jpg?rand=' . rand(0, 100)); ?>" class="img-fluid"
                                        alt="">
                                @else
                                    <img width="600" height="600" class="img-fluid"
                                        src="{{ asset('uploads/product_logo.png') }}">
                                @endif
                            </div>

                            <!--=======  End of small image slider single item  =======-->
                            <!--=======  small image slider single item  =======-->

                            <div class="small-image-slider-single-item">
                                @if (file_exists('uploads/products/' . $product->id . '.jpg'))
                                    <img width="600" height="600" src="<?php echo url('uploads/products/thumb/' . $product->id . '.jpg?rand=' . rand(0, 100)); ?>" class="img-fluid"
                                        alt="">
                                @else
                                    <img width="600" height="600" class="img-fluid"
                                        src="{{ asset('uploads/product_logo.png') }}">
                                @endif
                            </div>

                            <!--=======  End of small image slider single item  =======-->

                        </div>
                    </div>

                    <!--=======  End of small image slider  =======-->

                    <!--=======  End of product details slider  =======-->
                </div>

                <div class="col-lg-6">
                    <!--=======  product details content  =======-->

                    <div class="product-detail-content">
                        {{-- <div class="tags mb-5">
                            <span class="tag-title">Tags:</span>
                            <ul class="tag-list">
                                <li><a href="#">Plant</a>,</li>
                                <li><a href="#">Garden</a></li>
                            </ul>
                        </div> --}}

                        <h3 class="product-details-title mb-15">
                            @if (!empty($product->translation->name))
                                {{ $product->translation->name }}@else{{ $product->name }}
                            @endif
                        </h3>
                        <div class="rating d-inline-block mr-15">
                            <i class="ion-android-star active"></i>
                            <i class="ion-android-star active"></i>
                            <i class="ion-android-star active"></i>
                            <i class="ion-android-star active"></i>
                            <i class="ion-android-star"></i>
                        </div>
                        <div class="review-links d-inline-block">
                            <a href="#">(1 Review)</a> <span class="separator">|</span> <a href="#">Write A
                                Review</a>
                        </div>
                        <?php
                        if (!empty($product->translation->prices)) {
                            $prices = json_decode($product->translation->prices);
                            $titles = json_decode($product->translation->titles);
                            // $codes = json_decode($pro->translation->codes);
                        } else {
                            $prices = json_decode($product->prices);
                            $titles = json_decode($product->titles);
                            // $codes = json_decode($pro->codes);
                        }
                        ?>

                        <p class="product-price product-price--big mb-10"><span
                                class="discounted-price"><?php echo $currency; ?>{{ empty($prices[0]) ? '' : $prices[0] }}</span>
                            {{-- <span class="main-price discounted">$120.00</span> --}}
                        </p>

                        <div class="product-info-block mb-30">
                            {{-- <div class="single-info">
                                <span class="title">Ex Tax:</span>
                                <span class="value">$95.00</span>
                            </div>
                            <div class="single-info">
                                <span class="title">Brand:</span>
                                <span class="value"><a href="#">Brac</a></span>
                            </div> --}}
                            <div class="single-info">
                                <span class="title">Product Code:</span>
                                <span class="value">{{ $product->codes[0] }}</span>
                            </div>
                            {{-- <div class="single-info">
                                <span class="title">Availability:</span>
                                <span class="value stock-red">In stock</span>
                            </div> --}}
                        </div>

                        <div class="product-short-desc mb-25">
                            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptas consectetur inventore
                                voluptatem dignissimos nemo repellendus est, harum maiores veritatis quidem.</p>
                        </div>

                        <div class="quantity mb-20">
                            <span class="quantity-title mr-20">Qty</span>
                            <div class="pro-qty mr-15 mb-lg-20 mb-md-20 mb-sm-20">
                                <input type="text" value="1">
                            </div>
                            <button class="theme-button product-cart-button AddToCart" data-price="{{ empty($prices[0])? '': $prices[0] }}" data-codes="{{empty($product->codes)? '':$product->codes[0] }}" data-id="{{$product->id}}" data-key="0"
                                data-size="" data-name="@if(!empty($product->translation->name)){{ $product->translation->name }}@else{{ $product->name }}@endif" data-image="<?php echo url('uploads/products/thumb/' . $product->id . '.jpg?rand=' . rand(0, 100)); ?>">+ Add to Cart</button>
                        </div>

                        {{-- <div class="compare-button d-inline-block mr-40">
                            <a href="#"><i class="icon-sliders"></i> Compare This Product</a>
                        </div> --}}

                        {{-- <div class="wishlist-button d-inline-block">
                            <a href="#"><i class="icon-heart"></i> Add to Wishlist</a>
                        </div> --}}

                        <div class="product-details-feature-wrapper d-flex justify-content-start mt-20">
                            <!--=======  single icon feature  =======-->

                            <div class="single-icon-feature single-icon-feature--product-details">
                                <div class="single-icon-feature__icon">
                                    <img width="38" height="32" src="<?php echo url( '/assets/img/icons/free-shipping.webp') ?>"
                                        class="img-fluid" alt="">
                                </div>
                                <div class="single-icon-feature__content">
                                    <p class="feature-text">Free Shipping</p>
                                    <p class="feature-text">Ships Today</p>
                                </div>
                            </div>

                            <!--=======  End of single icon feature  =======-->

                            <!--=======  single icon feature  =======-->

                            <div class="single-icon-feature single-icon-feature--product-details ml-30 ml-xs-0 ml-xxs-0">
                                <div class="single-icon-feature__icon">
                                    <img width="38" height="30" src="<?php echo url( '/assets/img/icons/return.webp') ?>"
                                        class="img-fluid" alt="">
                                </div>
                                <div class="single-icon-feature__content">
                                    <p class="feature-text">Easy</p>
                                    <p class="feature-text">Returns</p>
                                </div>
                            </div>

                            <!--=======  End of single icon feature  =======-->

                            <!--=======  single icon feature  =======-->

                            <div class="single-icon-feature single-icon-feature--product-details ml-30 ml-xs-0 ml-xxs-0">
                                <div class="single-icon-feature__icon">
                                    <img width="33" height="30" src="<?php echo url( '/assets/img/icons/guarantee.webp') ?>"
                                        class="img-fluid" alt="">
                                </div>
                                <div class="single-icon-feature__content">
                                    <p class="feature-text">Lowest Price</p>
                                    <p class="feature-text">Guarantee</p>
                                </div>
                            </div>

                            <!--=======  End of single icon feature  =======-->
                        </div>

                        {{-- <div class="social-share-buttons mt-20">
                            <h3>share this product</h3>
                            <ul>
                                <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a class="google-plus" href="#"><i class="fa fa-google-plus"></i></a></li>
                                <li><a class="pinterest" href="#"><i class="fa fa-pinterest"></i></a></li>
                            </ul>
                        </div> --}}

                    </div>

                    <!--=======  End of product details content  =======-->
                </div>
            </div>
        </div>
    </div>

    <!--====================  End of product details area  ====================-->


    <!--=======  product description review   =======-->

    <div class="product-description-review-area mb-20">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!--=======  product description review container  =======-->

                    <div class="tab-slider-wrapper product-description-review-container">
                        <nav>
                            <div class="nav nav-tabs justify-content-center" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link active" id="description-tab" data-bs-toggle="tab"
                                    href="#product-description" role="tab" aria-selected="true">Description</a>
                                <a class="nav-item nav-link" id="review-tab" data-bs-toggle="tab" href="#review"
                                    role="tab" aria-selected="false">Review</a>
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="product-description" role="tabpanel"
                                aria-labelledby="description-tab">
                                <!--=======  product description  =======-->

                                <div class="product-description">
                                    <p>{{ $product->description }}</p>

                                    
                                </div>

                                <!--=======  End of product description  =======-->
                            </div>
                            <div class="tab-pane fade" id="review" role="tabpanel" aria-labelledby="review-tab">
                                <!--=======  review content  =======-->

                                <div class="product-ratting-wrap">
                                    <div class="pro-avg-ratting">
                                        <h4>4.5 <span>(Overall)</span></h4>
                                        <span>Based on 9 Comments</span>
                                    </div>
                                    <div class="ratting-list">
                                        <div class="sin-list float-start">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <span>(5)</span>
                                        </div>
                                        <div class="sin-list float-start">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-o"></i>
                                            <span>(3)</span>
                                        </div>
                                        <div class="sin-list float-start">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <span>(1)</span>
                                        </div>
                                        <div class="sin-list float-start">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <span>(0)</span>
                                        </div>
                                        <div class="sin-list float-start">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <span>(0)</span>
                                        </div>
                                    </div>
                                    <div class="rattings-wrapper">

                                        <div class="sin-rattings">
                                            <div class="ratting-author">
                                                <h3>Cristopher Lee</h3>
                                                <div class="ratting-star">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <span>(5)</span>
                                                </div>
                                            </div>
                                            <p>enim ipsam voluptatem quia voluptas sit
                                                aspernatur aut odit aut fugit, sed quia res eos
                                                qui ratione voluptatem sequi Neque porro
                                                quisquam est, qui dolorem ipsum quia dolor sit
                                                amet, consectetur, adipisci veli</p>
                                        </div>

                                        <div class="sin-rattings">
                                            <div class="ratting-author">
                                                <h3>Rashed Mahmud</h3>
                                                <div class="ratting-star">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <span>(5)</span>
                                                </div>
                                            </div>
                                            <p>enim ipsam voluptatem quia voluptas sit
                                                aspernatur aut odit aut fugit, sed quia res eos
                                                qui ratione voluptatem sequi Neque porro
                                                quisquam est, qui dolorem ipsum quia dolor sit
                                                amet, consectetur, adipisci veli</p>
                                        </div>

                                        <div class="sin-rattings">
                                            <div class="ratting-author">
                                                <h3>Hasan Mubarak</h3>
                                                <div class="ratting-star">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <span>(5)</span>
                                                </div>
                                            </div>
                                            <p>enim ipsam voluptatem quia voluptas sit
                                                aspernatur aut odit aut fugit, sed quia res eos
                                                qui ratione voluptatem sequi Neque porro
                                                quisquam est, qui dolorem ipsum quia dolor sit
                                                amet, consectetur, adipisci veli</p>
                                        </div>

                                    </div>
                                    <div class="ratting-form-wrapper fix">
                                        <h3>Add your Comments</h3>
                                        <form action="#">
                                            <div class="ratting-form row">
                                                <div class="col-12 mb-15">
                                                    <h5>Rating:</h5>
                                                    <div class="ratting-star fix">
                                                        <i class="fa fa-star-o"></i>
                                                        <i class="fa fa-star-o"></i>
                                                        <i class="fa fa-star-o"></i>
                                                        <i class="fa fa-star-o"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12 mb-15">
                                                    <label for="name">Name:</label>
                                                    <input id="name" placeholder="Name" type="text">
                                                </div>
                                                <div class="col-md-6 col-12 mb-15">
                                                    <label for="email">Email:</label>
                                                    <input id="email" placeholder="Email" type="text">
                                                </div>
                                                <div class="col-12 mb-15">
                                                    <label for="your-review">Your Review:</label>
                                                    <textarea name="review" id="your-review" placeholder="Write a review"></textarea>
                                                </div>
                                                <div class="col-12">
                                                    <input value="add review" type="submit">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                <!--=======  End of review content  =======-->
                            </div>
                        </div>
                    </div>

                    <!--=======  End of product description review container  =======-->
                </div>
            </div>
        </div>
    </div>

    <!--=======  End of product description review   =======-->
    <!--====================  product single row slider area ====================-->

    <div class="product-single-row-slider-area mb-40">
        <div class="container">

            <div class="row">
                <div class="col-lg-12">
                    <!--=======  section title  =======-->

                    <div class="section-title mb-20">
                        <h2>Related Products</h2>
                    </div>

                    <!--=======  End of section title  =======-->
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <!--=======  product single row slider wrapper  =======-->

                    <div class="product-single-row-slider-wrapper">
                        <div class="ht-slick-slider"
                            data-slick-setting='{
                            "slidesToShow": 4,
                            "slidesToScroll": 1,
                            "dots": false,
                            "autoplay": false,
                            "autoplaySpeed": 5000,
                            "speed": 1000,
                            "arrows": true,
                            "infinite": false,
                            "prevArrow": {"buttonClass": "slick-prev", "iconClass": "ion-ios-arrow-left" },
                            "nextArrow": {"buttonClass": "slick-next", "iconClass": "ion-ios-arrow-right" }
                        }'
                            data-slick-responsive='[
                            {"breakpoint":1501, "settings": {"slidesToShow": 4} },
                            {"breakpoint":1199, "settings": {"slidesToShow": 4} },
                            {"breakpoint":991, "settings": {"slidesToShow": 3} },
                            {"breakpoint":767, "settings": {"slidesToShow": 2, "arrows": false} },
                            {"breakpoint":575, "settings": {"slidesToShow": 2, "arrows": false} },
                            {"breakpoint":479, "settings": {"slidesToShow": 1, "arrows": false} }
                        ]'>
                        @foreach ($RelatedProducts as $pro)
                            <!--=======  single slider product  =======-->

                            <div class="single-slider-product-wrapper">
                                <div class="single-slider-product">
                                    <div class="single-slider-product__image">
                                        <a href="{{ url('productDetails/' . $pro->id) }}">
                                            @if (file_exists('uploads/products/' . $pro->id . '.jpg'))
                                            <img width="600" height="600"
                                                class="img-fluid"src="<?php echo url('uploads/products/thumb/' . $pro->id . '.jpg?rand=' . rand(0, 100)); ?>">
                                        @else
                                            <img width="600" height="600" class="img-fluid"
                                                src="{{ asset('uploads/product_logo.png') }}">
                                        @endif
                                        <img width="600" height="600"
                                            src="{{ asset('uploads/product_logo.png') }}" class="img-fluid"
                                            alt="">
                                        </a>

                                        <span class="discount-label discount-label--green">-10%</span>

                                        {{-- <div class="hover-icons">
                                            <ul>
                                                <li><a data-bs-toggle="modal" data-bs-target="#quick-view-modal-container"
                                                        href="javascript:void(0)"><i class="icon-eye"></i></a></li>
                                                <li><a href="javascript:void(0)"><i class="icon-heart"></i></a></li>
                                                <li><a href="javascript:void(0)"><i class="icon-sliders"></i></a></li>
                                            </ul>
                                        </div> --}}
                                    </div>

                                    <div class="single-slider-product__content">
                                        <p class="product-title"><a href="{{ url('productDetails/' . $pro->id) }}"> @if (!empty($pro->translation->name))
                                            {{ $pro->translation->name }}@else{{ $pro->name }}
                                        @endif
                                                tools</a></p>
                                        <div class="rating">
                                            <i class="ion-android-star active"></i>
                                            <i class="ion-android-star active"></i>
                                            <i class="ion-android-star active"></i>
                                            <i class="ion-android-star active"></i>
                                            <i class="ion-android-star"></i>
                                        </div>
                                        <?php
                                        if (!empty($pro->translation->prices)) {
                                            $prices = json_decode($pro->translation->prices);
                                            $titles = json_decode($pro->translation->titles);
                                            // $codes = json_decode($pro->translation->codes);
                                        } else {
                                            $prices = json_decode($pro->prices);
                                            $titles = json_decode($pro->titles);
                                            // $codes = json_decode($pro->codes);
                                        }
                                        ?>
                                        @foreach ($titles as $key => $t)
                                        <p class="product-price"><span
                                                class="discounted-price"><?php echo $currency; ?>{{ empty($prices[$key]) ? '' : $prices[$key] }}
                                            </span> 
                                            {{-- <span class="main-price discounted">$120.00</span> --}}
                                        </p>

                                        <span class="cart-icon"><a class="AddToCart"  data-price="{{ empty($prices[$key])? '': $prices[$key] }}" data-codes="{{empty($pro->codes)? '':$pro->codes[$key] }}" data-id="{{$pro->id}}" data-key="{{$key}}"
                                            data-size="{{$t}}" data-name="@if(!empty($pro->translation->name)){{ $pro->translation->name }}@else{{ $pro->name }}@endif" data-image="<?php echo url('uploads/products/thumb/' . $pro->id . '.jpg?rand=' . rand(0, 100)); ?>" href="javascript:void(0)"><i
                                                    class="icon-shopping-cart "></i></a></span>
                                    @endforeach
                                    </div>
                                </div>

                            </div>

                            <!--=======  End of single slider product  =======-->

                            @endforeach

                        </div>
                    </div>

                    <!--=======  End of product single row slider wrapper  =======-->
                </div>
            </div>
        </div>
    </div>

    <!--====================  End of product single row slider area  ====================-->
@endsection
