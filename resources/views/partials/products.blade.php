
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

                                                                <a class="text-buttonforprotincategory" data-bs-toggle="modal" data-bs-target="#quick-view-modal-container" href="javascript:void(0)"> @lang('site.click_here_to_now') </a>

                                                            </h3>
                                                        </div>

                                                        <div class="product-grid" id="portfolio">
                                                            @foreach ($categories as $cat)
                                                            @foreach ($cat->products as $pro)
                                                            <!-- product start  -->

                                                            <div class="{{ $pro->category_id }} product-layout  has-extra-button" data-custom-attribute="{{ ($pro->tax_percentage > 0 && $pro->sale_percentage_type != 0) ? 1 : 0 }}">
                                                                <div class="product-thumb">
                                                                    <div class="product-labels">
                                                                        <span class="product-label product-label-default1 product-label-311">
                                                                        @if( $pro->tax_percentage > 0 && $pro->sale_percentage_type != 0)
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
                                                                            @if( $pro->tax_percentage > 0 && $pro->sale_percentage_type != 0)
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
                                                                      @if($saleId == 0)
                                                                        <a href="<?php echo url("singleproduct/" . $pro->id); ?>">
                                                                            <div>
                                                                                <img src="<?php echo url("uploads/products/thumb/" . $pro->id . ".jpg?rand=" . rand(0, 100)); ?>" width="500" height="500" alt="@if (!empty($pro->translation->name)) {{ $pro->translation->name }}@else{{ $pro->name }} @endif" title="@if (!empty($pro->translation->name)) {{ $pro->translation->name }}@else{{ $pro->name }} @endif" class="img-responsive img-first lazyload lazyloaded" data-ll-status="loaded">


                                                                            </div>
                                                                        </a>
                                                                        @else
                                                                        <a href="<?php echo url("singleproduct/" . $pro->id . '/' . $saleId); ?>">
                                                                            <div>
                                                                                <img src="<?php echo url("uploads/products/thumb/" . $pro->id . ".jpg?rand=" . rand(0, 100)); ?>" width="500" height="500" alt="@if (!empty($pro->translation->name)) {{ $pro->translation->name }}@else{{ $pro->name }} @endif" title="@if (!empty($pro->translation->name)) {{ $pro->translation->name }}@else{{ $pro->name }} @endif" class="img-responsive img-first lazyload lazyloaded" data-ll-status="loaded">


                                                                            </div>
                                                                        </a>


                                                                        @endif
                                                                        <div class="product-labels">

                                                                            <div id="product-labelshover" class="product-label product-label-146 product-label-default">
                                                                                <div class="wish-group AddToWishlist" data-link="<?php echo url("singleproduct/" . $pro->id); ?>" data-catId="{{$pro->category_id}}" data-image="<?php echo url("uploads/products/thumb/" . $pro->id . ".jpg?rand=" . rand(0, 100)); ?>" data-price="3" data-id="{{ $pro->id }}" data-key="2" data-size="120" data-name=" @if (!empty($pro->translation->name))
                                                                                {{ $pro->translation->name }}@else{{ $pro->name }}
                                                                                @endif">
                                                                                    <a data-toggle="tooltip" data-tooltip-class="module-products-27 module-products-grid wishlist-tooltip" data-placement="top" title="" data-original-title="Add to Wish List"><span class="btn-text">Add to
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
                                                                         @if($saleId == 0)
                                                                        <div class="name">
                                                                          
                                                                              <a href="<?php echo url("singleproduct/" . $pro->id); ?>">
                                                                            
                                                                            
                                                                           
                                                                                @if (!empty($pro->translation->name))
                                                                                {{ $pro->translation->name }}@else{{ $pro->name }}
                                                                                @endif
                                                                            </a></div>
                                                                            
                                                                             @else
                                                                             <div class="name">
                                                                          
                                                                              <a href="<?php echo url("singleproduct/" . $pro->id . '/' . $saleId); ?>">
                                                    
                                                                                @if (!empty($pro->translation->name))
                                                                                {{ $pro->translation->name }}@else{{ $pro->name }}
                                                                                @endif
                                                                            </a></div>
                                                                                 
                                                                              @endif
                                                                        <?php
                                                                        if (!empty($pro->translation->prices)) {
                                                                            $prices = json_decode($pro->translation->prices);
                                                                            $titles = json_decode($pro->translation->titles);
                                                                            $prices2 = $pro->translation->prices; 
                                                                        } else {
                                                                            $prices = json_decode($pro->prices);
                                                                            $prices2 = $pro->prices; 
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

                                                                           <div class="price">
                                                                            <div  style=" display: flex;  justify-content: space-evenly;  align-items: center;   flex-direction: column;">
                                                                                @if($pro->sale_percentage_type == 2 && $pro->tax_percentage > 0)
                                                                                
                                                                                <del class="price-normal" style="text-decoration: line-through; color: #900;" >{{ $prices[0] }}  <?php echo $currency; ?>
                                                                                </del>
                                                                                <span class="price-normal">{{ $prices[0] - $pro->tax_percentage  }}  <?php echo $currency; ?>
                                                                                </span>
                                                                                @elseif($pro->sale_percentage_type == 1 && $pro->tax_percentage > 0)
                                                                                @php
                                                                                    $discountedPrice = $prices[0] - (($pro->tax_percentage / 100) * $prices[0]);
                                                                                @endphp
                                                                                <del class="price-normal" style="text-decoration: line-through; color: #900;" >{{ $prices[0] }}  <?php echo $currency; ?>
                                                                                </del>
                                                                                <span class="price-normal">{{ $discountedPrice  }}  <?php echo $currency; ?>
                                                                                </span>
                                                                                @else
                                                                                <span class="price-normal">{{ $prices[0] }}  <?php echo $currency; ?>
                                                                                </span>
                                                                                @endif

                                                                            </div>

                                                                        </div>
                                                                        @foreach ($titles as $key => $t)
                                              
                                                                        @endforeach
                                                                        <div class="buttons-wrapper">
                                                                            <div class="button-group">
                                                                                <div class="cart-group">
                                                                                    <div class="stepper">

                                                                                        <input id="qty{{ $pro->id }}" type="text" value="1"  class="form-control qty">
                                                                                       
                                                                                        <span>
                                                                                            <i id="add1" class="fa fa-angle-up add">

                                                                                            </i>
                                                                                            <i id="minus1" class=" fa fa-angle-down minus">

                                                                                            </i>
                                                                                        </span>
                                                                                    </div>
                                                                                    @if($cat->id == 15)
                                                                                    <a class="btn btn-cart showev" data-link="<?php echo url("singleproduct/" . $pro->id); ?>" data-catId="{{$pro->category_id}}" data-image="<?php echo url("uploads/products/thumb/" . $pro->id . ".jpg?rand=" . rand(0, 100)); ?>" data-price="{{$prices2}}" data-id="{{ $pro->id }}" data-key="{{ $key }}" data-size="{{ $t }}" data-name=" @if (!empty($pro->translation->name))
                                                                                {{ $pro->translation->name }}@else{{ $pro->name }}
                                                                                @endif" data-loading-text="<span class='btn-text'>Add to Cart</span>"><span class="btn-text"> @lang('site.add_to_cart') </span></a>
                                                                                    @else
                                                                                    <a class="btn btn-cart AddToCart "  data-link="<?php echo url("singleproduct/" . $pro->id); ?>" data-catId="{{$pro->category_id}}" data-image="<?php echo url("uploads/products/thumb/" . $pro->id . ".jpg?rand=" . rand(0, 100)); ?>" data-price="
                                                                                    
                                                                                    @if($pro->sale_percentage_type == 2 && $pro->tax_percentage > 0)  {{  $prices[$key]  - $pro->tax_percentage }}  
                                                                                        @elseif ($pro->sale_percentage_type == 1 && $pro->tax_percentage > 0)  
                                                                                        @php
                                                                                      $discountedPrice = $prices[$key] - (($pro->tax_percentage / 100) * $prices[$key]);
                                                                                       @endphp
                                                                                       {{ $discountedPrice }}
                                                                                     @else  
                                                                                     {{ empty($prices[$key])? '': $prices[$key] }} 
                                                                                     @endif
                                                                                    
                                                                                    " data-id="{{ $pro->id }}" data-key="{{ $key }}" data-size="{{ $t }}" data-name=" @if (!empty($pro->translation->name))
                                                                                {{ $pro->translation->name }}@else{{ $pro->name }}
                                                                                @endif" data-loading-text="<span class='btn-text'>Add to Cart</span>"><span class="btn-text"> @lang('site.add_to_cart') </span></a>
                                                                             
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

