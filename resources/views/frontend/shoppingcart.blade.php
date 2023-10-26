@extends('frontend.appother2')

@section('content')

<!--==================== page content ====================-->
<input hidden type="text" id="valOfSale" value="{{$shoppingCart->preSale}}">
<input hidden type="text" id="idOfSale" value="{{$id}}">
<div class="page-section pb-40 page-sectionCoustom" >
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form action="#">
                    <!--=======  cart table  =======-->

                    <div class="cart-table table-responsive mb-10">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="pro-thumbnail">@lang('site.Image')</th>
                                    <th class="pro-title">@lang('site.products')</th>
                                    <th class="pro-price">@lang('site.price')</th>
                                    <th class="pro-quantity">@lang('site.quantity')</th>
                                    <th class="pro-subtotal">@lang('site.total')</th>
                                    <th class="pro-remove">@lang('site.Remove')</th>
                                </tr>
                            </thead>
                            <tbody id="containerOfshoppingCartItems">
                                @forelse ($shoppingCartItems as $key => $item)
                                <tr id="tr{{$item->product_id}}">
                                    <td class="pro-thumbnail">

                                        <a href="<?php echo url("singleproduct/" . $item->product_id . "/" . $id); ?>">
                                          <img width="600" height="600" src="<?php echo url("uploads/products/" . $item->product_id . ".jpg?rand=" . rand(0, 100)); ?>" class="img-fluid" alt="Product">
                                        </a>


                                        @if(!empty($item->evaluate) && $item->productinfo["category_id"]==15 && $item->statusEvaluate == "0" )
                                       
                                        @if(isset($item->evaluate->answer1) && !empty($item->evaluate->answer1) )
                                        <div class="text-left" style=" width: 200%;margin-top: 10px; margin-bottom: 7px; vertical-align: inherit; display: flex;vertical-align: inherit;flex-direction: row; align-items: center;">
                                            <div class="numberCircle">1</div>
                                            <font style="font-size: 15px;  font-weight: bold; color: #646b77;  vertical-align: inherit; white-space: nowrap; margin-left: 5px;">
                                                @lang('site.hair_type_heading') : {{$item->evaluate->answer1}}
                                            </font>
                                        </div>
                                        @endif
                                        @if(isset($item->evaluate->answer2) && !empty($item->evaluate->answer2) )
                                        <div class="text-left" style=" width: 200%;margin-top: 10px; margin-bottom: 7px; vertical-align: inherit; display: flex;vertical-align: inherit;flex-direction: row; align-items: center;">
                                            <div class="numberCircle">2</div>
                                            <font style="font-size: 15px;  font-weight: bold; color: #646b77;  vertical-align: inherit; white-space: nowrap; margin-left: 5px;">
                                                @lang('site.hanaa_heading') : {{$item->evaluate->answer2}}
                                            </font>
                                        </div>
                                        @endif
                                        @if(isset($item->evaluate->answer3)  && !empty($item->evaluate->answer3) )
                                        <div class="text-left" style=" width: 200%;margin-top: 10px; margin-bottom: 7px; vertical-align: inherit; display: flex;vertical-align: inherit;flex-direction: row; align-items: center;">
                                            <div class="numberCircle">3</div>
                                            <font style="font-size: 15px;  font-weight: bold; color: #646b77;  vertical-align: inherit; white-space: nowrap;  margin-left: 5px;">
                                                @lang('site.remove_hair_colo_step') :{{$item->evaluate->answer3}}
                                            </font>
                                        </div>
                                        @endif
                                        @if(isset($item->evaluate->answer4)  && !empty($item->evaluate->answer4) )
                                        <div class="text-left" style=" width: 200%;margin-top: 10px; margin-bottom: 7px; vertical-align: inherit; display: flex;vertical-align: inherit;flex-direction: row; align-items: center;">
                                            <div class="numberCircle">4</div>
                                            <font style="font-size: 15px;  font-weight: bold; color: #646b77;  vertical-align: inherit; white-space: nowrap; margin-left: 5px;">
                                                @lang('site.hair_status_heading'): {{$item->evaluate->answer4}}
                                            </font>
                                        </div>
                                        @endif
                                        @if(isset($item->evaluate->answer5)  && !empty($item->evaluate->answer5) )
                                        <div class="text-left" style=" width: 200%;margin-top: 10px; margin-bottom: 7px; vertical-align: inherit; display: flex;vertical-align: inherit;flex-direction: row; align-items: center;">
                                            <div class="numberCircle">5</div>
                                            <font style="font-size: 15px;  font-weight: bold; color: #646b77;  vertical-align: inherit; white-space: nowrap; margin-left: 5px;">
                                                @lang('site.hair_length_heading') : {{$item->evaluate->answer5}}
                                            </font>
                                        </div>
                                        @endif
                                        @endif
                                    </td>
                                    <td class="pro-title"><a href="<?php echo url("singleproduct/" . $item->product_id . "/" . $id); ?>">
                                            {{$item->translation->name}}
                                            <p style="font-size:13px;">
                                                {{$item->size}}
                                            </p>
                                        </a>


                                    </td>
                                    @php
                                            $prices = json_decode($item->productinfo['prices'], true); // Convert prices JSON to an array
                                            $firstPrice = isset($prices[0]) ? $prices[0] : '';
                                        @endphp
                                    @if( $item->statusEvaluate == "0" || $item->statusEvaluate == "1" || $item->statusEvaluate == "2")
                                      
                                        <td class="pro-price"><span style="color:#b21019" id="item_price"> {{$firstPrice}} €</span></td>
                                    @else
                                        <td class="pro-price"><span style="color:#b21019" id="item_price"> {{$item->price}} €</span></td>
                                    @endif
                                 
                                    <td class="pro-quantity">
                                        <div class="pro-qty" data-price="{{$item->price}}" data-product_id="{{$item->product_id}}">
                                            <input type="text" style="color:#b21019" id="quantity-inputId{{$item->product_id}}" name="quantity" value="{{$item->quantity}}">
                                            <label type="text" id="valuequntity" hidden>{{$item->quantity}}</label>

                                            <label type="text" id="catId" hidden>{{$item->productinfo['category_id']}}</label>
                                            <label type="text" id="statusEv" hidden>{{$item->statusEvaluate}}</label>
                                            @if( $item->statusEvaluate == "0" ||  $item->statusEvaluate == "1" ||  $item->statusEvaluate == "2" )
                                            @php
                                                $prices = json_decode($item->productinfo['prices'], true); // Convert prices JSON to an array
                                                $firstPrice = isset($prices[0]) ? $prices[0] : '';
                                            @endphp
                                            <label class="priceitem" hidden>{{$firstPrice}}</label>
                                            <label class="priceitemOfer" hidden>{{$item->price}}</label>
                                        @else
                                        <label class="priceitem" hidden>{{$item->price}}</label>
                                        @endif

                                   

                                           <label class="iditem" id="iditem{{$item->product_id}}" hidden>{{$item->product_id}}</label>
                                            <label class="idsale" hidden>{{$id}}</label>
                                        </div>
                                    </td>
                                    <td class="pro-subtotal">
                                        <div style="display: inline-flex;align-items: center;">
                                        @php
                                            $prices = json_decode($item->productinfo['prices'], true); // Convert prices JSON to an array
                                            $firstPrice = isset($prices[0]) ? $prices[0] : '';
                                        @endphp
                                        @if($item->productinfo["category_id"] == 15 && $item->statusEvaluate == "0" && $item->statusEvaluate != "1" && $item->statusEvaluate != "2" )
                                       
                                        <del class="margin-right: 10px; " id="orginalPriceDel_{{$item->product_id}}{{$item->statusEvaluate}}" style="color:#b21019; margin-right: 8px; " >{{ $firstPrice * $item->quantity}} €</del>
                                        <span id="item_subTotal_{{$item->product_id}}" class="psub item_subTotal_{{$item->product_id}}{{$item->statusEvaluate}}" style="color:#b21019">   {{$item->price }} </span>
                                            <p style="margin-left: 3px; margin-bottom: 3px;font-size: 15px; color:#b21019">€</p>
                                            
                                       @elseif($item->statusEvaluate == "1" )
                                     
                                            <del class="margin-right: 10px; " id="orginalPriceDel_{{$item->product_id}}{{$item->statusEvaluate}}" style="color:#b21019; margin-right: 8px; " >{{ $firstPrice * $item->quantity}} €</del>
                                            <span id="item_subTotal_{{$item->product_id}}" class="psub item_subTotal_{{$item->product_id}}{{$item->statusEvaluate}}" style="color:#b21019">   {{$item->price }} </span>
                                            <p style="margin-left: 3px; margin-bottom: 3px;font-size: 15px; color:#b21019">€</p>
                                       @elseif($item->statusEvaluate == "2")
                                            <del class="margin-right: 10px;" id="orginalPriceDel_{{$item->product_id}}{{$item->statusEvaluate}}" style="color:#b21019; margin-right: 8px; " >{{ $firstPrice * $item->quantity}} €</del>
                                            <span id="item_subTotal_{{$item->product_id}}" class="psub item_subTotal_{{$item->product_id}}{{$item->statusEvaluate}}" style="color:#b21019">   {{$item->price }} </span>
                                            <p style="margin-left: 3px; margin-bottom: 3px;font-size: 15px; color:#b21019">€</p>
                                            @elseif($item->statusEvaluate != "2" && $item->statusEvaluate != "1" && $item->statusEvaluate != "0") 

                                            <span id="item_subTotal_{{$item->product_id}}" class="psub item_subTotal_{{$item->product_id}}{{$item->statusEvaluate}}" style="color:#b21019">   {{$item->price * $item->quantity}}</span>
                                            <p style="margin-left: 3px; margin-bottom: 3px;font-size: 15px; color:#b21019">€</p>
                                     @endif
                                   
                                       
                                        </div>
                                    </td>
                                    <td class="pro-remove">
                                        <div style="display: inline-flex;align-items: center;">
                                            <a  class="DeleteItemFromShoppingcart" data-id="{{$item->product_id}}"  data-price="{{$item->price}}" >
                                                <i class="fa fa-trash-o" style="margin-left: 20px;"> </i>
                                            </a>
                                            @if($item->productinfo["category_id"]==15 && $item->statusEvaluate == "0")
                                            <a class="goToeditevaluate" data-idsale="{{$id}}" data-idproduct="{{$item->product_id}}" data-evaluateOrginalValue="{{json_encode($item->evaluateOrginalValue)}}" data-evaluate="{{json_encode($item->evaluate)}}">
                                                <i class="fa fa-pencil" aria-disabled="false" aria-hidden="true" style=" margin-left: 15px;"></i>
                                            </a>
                                            @endif
                                            <a>
                                                <label class="iditem" hidden>{{$item->product_id}}</label>
                                                <label class="statusEv" hidden>{{$item->statusEvaluate}}</label>
                                                <button type="button" class=" mt-0 duplicate-btn btn-duplication-style"> @lang('site.duplicate') </button>
                                            </a>
                                        </div>

                                    </td>
                                </tr>
                                @empty
                                <h1 style="text-align: center;">@lang('site.empty')</h1>
                                @endforelse

                            </tbody>
                        </table>
                    </div>
                    <div>
                        <label for="">@lang('site.add_your_comments')</label>
                        <textarea class="form-control" name="" id="" style="max-width: 100%; min-height: calc(3.5em + 3.75rem + 2px);"></textarea>
                    </div>
                    <!--=======  End of cart table  =======-->


                </form>

                <div class="row containardiscount_coupon">
                    <div class="col-lg-6 col-12" style="display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: stretch;
    flex-wrap: nowrap;">
                        <!--=======  Discount Coupon  =======-->
                        <div class="discount-coupon">
                            <!-- <h4> @lang('site.discount_coupon_code')</h4> -->
                            <form action="#">
                                <div class="row">
                                    <div class="col-md-12 col-12 apply_codeContainar">
                                    <input type="text" id="coupon-input" placeholder="@lang('site.coupon_code')">
                                    <a type="button"  class="checkout-btn  apply_code">@lang('site.apply_code')</a>
                                    </div>
                                 
                                 
                                </div>
                               
                            </form>
                            
                        </div>

                        <!--=======  End of Discount Coupon  =======-->

                    </div>
                    <div style="    margin-top: 22px;">
                        <span for="" style="color: #ffffff;  word-spacing: 2px; letter-spacing: 1px;">Ab einem Warenwert von 30,00 Euro versenden wir versandkostenfrei innerhalb Deutschland*</span>

                    </div>
                    <!-- @lang('site.cart_summary')
                        @lang('site.shipping_cost')
                        @lang('site.sub_total')
                        @lang('site.grand_total')
                        @lang('site.empty_cart')
                        @lang('site.continue_shopping')
                        @lang('site.checkout') -->


                </div>
                <div class="row  containarEndshoppingCart" >
                    <div class="col-lg-6 col-12 d-flex">
                        <!--=======  Cart summery  =======-->

                        <div class="cart-summary">
                            <div class="cart-summary-wrap">
                                <!-- <h4>@lang('site.cart_summary')</h4> -->
                                <p style="border-bottom: 1px solid #ffffff;"> @lang('site.Sub_Total'):<span style="color: #b21019;"> €</span><span style="color: #b21019;font-weight: bold;" id="subTot">{{ number_format($subtotal, 2) }}</span></p>
                                <p style=" display: flex;  flex-direction: row; justify-content: space-between;">
                                    @lang('site.Shipping_to'):
                                    <select class="form-control countryvalidate" id="country-shipping" required onchange="chooseValueForCountryShipping()" style="width: 40%; text-align: center; height: auto;">
                                        <option value="100">
                                            <font style="vertical-align: inherit;">
                                                <font style="vertical-align: inherit;">---- @lang('site.country') ----</font>
                                            </font>
                                        </option>

                                        <option value="1">
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
                                </p>
                                <p style="margin-top: -10px;"> @lang('site.Less_discount'):  
                                    <span style="color: #b21019;font-weight: bold;">€</span> <span id="ValueOfDiscount" style="color: #b21019;font-weight: bold;"> 00.00</span>
                                </p>
                                <p style="margin-top: -10px;">DHL Paket National DE (Germany): <img data-src="{{ url('uploads/homepage/dhl-logo.png') }}" width="60" height=""  class="info-block-img" />
                                    <span style="color: #b21019;font-weight: bold;">€</span> <span id="ValueCountryShipping" style="color: #b21019;font-weight: bold;"> 00.00</span>
                                </p>
                                <p style="border-bottom: 1px solid #ffffff; margin-top: -19px;">@lang('site.delivery_time_working_days') 
                                </p>
                                <p>@lang('site.grand_total'):<span style="color: #b21019;font-weight: bold;">€ </span><span id="AllTot" style="color: #b21019;font-weight: bold;">{{ number_format($subtotal, 2) }}</span></p>
                                <p style="margin-left: 1px; margin-top: -23px; font-size: 15px;"> @lang('site.VAT_included')</p>
                            </div>

                            <div class="cart-summary-button" style="margin-top: -29px;">
                                <a type="button" class="checkout-btn  register-button checkout checkout-btn-Coustom">@lang('site.checkout')</a>
                                <a type="button" class="checkout-btn register-button DeleteAllItemFromShoppingcart checkout-btn-empty_cart"> @lang('site.empty_cart')</a>
                                <a type="button" href="<?php echo url("home/" . $id); ?>" class="checkout-btn  register-button checkout-btn-continue_shopping">@lang('site.continue_shopping')</a>
                              
                            </div>
                           
                            <div class="NotForFreeShipping displayForNotForFreeShipping" style="width: 65%; text-align: center; margin-top: 14px;  margin-left: 83px;  border: 1px solid;">
                                <p style="color: #900;">@lang('site.shop_for_just')  <span id="valueOfFreeShipping" ></span> € @lang('site.and_get_free_shipping')  </p>
                          </div>
                        

                    </div>

                    <!--=======  End of Cart summery  =======-->

                </div>
            </div>
        </div>
    </div>
</div>
    <input hidden id="saleIdinHome"  type="text" value="{{$saleId}}"> 
    <input hidden id="countOfSale"  type="text" value="{{$count}}">
    <input hidden id="Items"  type="text" value="{{$Items}}">
    <form  id="editForm" method="POST" role="form" action="{{ url('editevaluateForm') }}" style="display: none;" >
        {{ csrf_field() }}
        <input id="productIdForEdit" name="productIdForEdit" type="text" value="">
        <input id="productEvaluateForEdit" name="productEvaluateForEdit" type="text" value="">
        <input name="saleId"  type="text" value="{{$saleId}}">
        <button type="submit">Submit</button>
    </form>
</div>
<script>
            $("body").on("click", ".goToeditevaluate", function() {
                var idsale= $(this).attr("data-idsale"); 
                var idproduct = $(this).attr("data-idproduct");
                var evaluate = $(this).attr("data-evaluate");
                var evaluateOrginalValue = $(this).attr("data-evaluateOrginalValue");

            var form_dataa = {    
                Idsale: idsale,
                Idproduct: idproduct,
                Evaluate: evaluate,
                EvaluateOrginalValue: evaluateOrginalValue,
            };
            console.log(form_dataa) 
                    $.ajax({
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '<?php echo url("/editevaluate"); ?>',
                data: form_dataa,
                success: function(msg) {
                    console.log(msg)
                    var product = JSON.parse(msg);

                    console.log(product.product_id);
                    console.log(product.evaluate);

                     $("#productIdForEdit").val(product.product_id);
                     $("#productEvaluateForEdit").val(product.evaluate);
                     $("#editForm").submit(); // Submit the form

                    // var idForm = {
                    //     id: msg.id
                    // };
                    // var saleIdNew = msg.id;
                    // url = '/shoppingcart/' + saleIdNew;
                    // console.log(url)
                    // $(location).attr('href', url);

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
    $("body").on("click", ".apply_code", function() {
        const couponInput = document.getElementById("coupon-input");
        const value = couponInput.value;
        if (value == "QJNM2022") 
        {
            console.log("value" ,value)
            var subtotal = document.getElementById("subTot").innerHTML;
            console.log("subtotal" ,subtotal); // output the value of the subtotal to the console
            if(Number(subtotal)  >= "30"){
                console.log("subtotal" ,subtotal)

                // get the subtotal value from the HTML element
             // set the percentage value to 5
               var result = parseFloat(subtotal) * 5 / 100;
               result = result.toFixed(2);
               $("#ValueOfDiscount").text(result);
                Newsubtotal = Number(subtotal) - result ;
                console.log("Newsubtotal",Newsubtotal)
                Newsubtotal = Newsubtotal.toFixed(2);
                // $("#subTot").text(Newsubtotal);
              var  ValueCountryShipping =  $("#ValueCountryShipping").text();
                $("#AllTot").text(  Number(Newsubtotal) + Number(ValueCountryShipping) );
            }
           
        }
        couponInput.value = "";
        const textforcopy = document.getElementById("textforcopy");
        textforcopy.value = "";
        couponInput.disabled = true;

    });

       


         $("body").on("click", ".DeleteAllItemFromShoppingcart", function() {
          var idOfSale =  document.getElementById("idOfSale");
        console.log(idOfSale);       
     var DeleteAllItemInfo = {
      saleId: idOfSale.value,
    };
    DeleteAllItemSale(DeleteAllItemInfo);
    });

    function DeleteAllItemSale(DeleteAllItemInfo) {    
        $.ajax({
            type: "POST",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            url: '<?php echo url("sales/deleteAllItemFromOrder"); ?>',
            data: DeleteAllItemInfo,
            success: function(msg) {
                console.log("msg:",msg);
                var containerOfshoppingCartItems = document.getElementById("containerOfshoppingCartItems"); 
                containerOfshoppingCartItems.remove();
                $("#subTot").text(0);
                $("#AllTot").text(0);
                
            },
        });
    }
     $("body").on("click", ".DeleteItemFromShoppingcart", function() {
          var id= $(this).attr("data-id"); 
          var price = $(this).attr("data-price");
          var idOfSale =  document.getElementById("idOfSale");
        console.log(id);       
     var DeleteItemInfo = {
      id: id,
      saleId: idOfSale.value,
    };
    DeleteItemSale(DeleteItemInfo,price);
    });

    function DeleteItemSale(DeleteItemInfo ,price) {
        console.log("update sale", DeleteItemInfo);
        $.ajax({
            type: "POST",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            url: '<?php echo url("sales/deleteItemFromOrder"); ?>',
            data: DeleteItemInfo,
            success: function(msg) {
                console.log("msg:",msg);
                var tr = document.getElementById("tr" + DeleteItemInfo.id);
                console.log("DeleteItemInfo.id",DeleteItemInfo.id);
                  tr.remove();
                  var subTot = $("#subTot").text();
                  var subTotnew = Number(subTot) - price ;
                  subTotnew = subTotnew.toFixed(2);
                  $("#subTot").text(subTotnew);
                  var AllTot = $("#AllTot").text();
                  var AllTotnew = Number(AllTot) - price ;
                  AllTotnew = AllTotnew.toFixed(2);
                  $("#AllTot").text(AllTotnew);
                
            },
        });
    }
</script>
<!--====================  End of page content  ====================-->








@endsection