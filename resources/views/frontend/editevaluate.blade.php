    @extends('frontend.appother')

    @section('content')
    <div class="page-section">
        <div class="container">
            <div class="row" style="    display: flex;
        flex-direction: column;
        align-content: center; ">
            
            <div class="col-sm-12 col-md-12  col-xs-12">
                                            <div class="py-2 h4" style="margin-bottom: 20px; text-align: right; ">

                                                <div class=" pt-10 divtitlemodal">
                                                    <b style="font-family: 'Tajawal'; margin-right: 8px; font-size: 19px; color: #ffffff;">

                                                        @lang('site.confirm_with_change_answers')
                                                    </b>
                                                </div>
                                            </div>
                                            <div class="col-md-12">



                                                <div style=" display: flex; flex-direction: row-reverse;  justify-content: space-between;">
                                                    <div style="    display: flex; flex-direction:column;">
                                                        <span>
                                                            <font style="vertical-align: inherit; display: flex;vertical-align: inherit;flex-direction: row-reverse; align-items: center;">
                                                                <div class="numberCircle">1</div>
                                                                <font style="margin-right: 8px;font-size: 18px; font-weight: bold; color: #646b77; vertical-align: inherit;">@lang('site.your_hair_type') </font>
                                                            </font>
                                                        </span>
                                                        <span style="margin: auto; text-align:right;">
                                                            <font style="vertical-align: inherit;">

                                                                <font class="anserstep1" id="anserstep1" style="font-size: 17px; font-weight: bold; color: #3a9943; vertical-align: inherit;">{{$evaluate_result["answer1"]}}</font>
                                                                <input hidden id="Numanserstep1" value="{{$evaluate_resultNum["answer1"]}}" type="text">

                                                            </font>
                                                        </span>

                                                    </div>

                                                    <div>
                                                        <span>
                                                            <a id="showselectchangestep1">
                                                                <font style="vertical-align: inherit;">
                                                                    <img src="/assets/img/svg/pen.svg" style="width: 18px;" />
                                                                    <font style="  font-size: 17px; vertical-align: inherit;"> @lang('site.change_selection')</font>
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
                                                    <div style="display: flex; flex-direction: column;">
                                                        <span>
                                                            <font style="vertical-align: inherit; display: flex;vertical-align: inherit;flex-direction: row-reverse; align-items: center;">
                                                                <div class="numberCircle">2</div>
                                                                <font style="margin-right: 8px; font-size: 18px; font-weight: bold; color: #646b77; vertical-align: inherit;"> @lang('site.use_hanaa') </font>
                                                            </font>
                                                        </span>
                                                        <span style="margin: auto; text-align:right;">
                                                            <font style="vertical-align: inherit;">

                                                                <font id="anserstep2" style="font-size: 17px; font-weight: bold; color: #3a9943; vertical-align: inherit;">{{$evaluate_result["answer2"]}}</font>
                                                                <input hidden id="Numanserstep2" value="{{$evaluate_resultNum["answer2"]}}" type="text">

                                                            </font>
                                                        </span>
                                                    </div>

                                                    <div>
                                                        <span>
                                                            <a id="showselectchangestep2">
                                                                <font style="vertical-align: inherit;">
                                                                    <img src="/assets/img/svg/pen.svg" style="width: 18px;" />
                                                                    <font style="  font-size: 17px; vertical-align: inherit;">@lang('site.change_selection')</font>
                                                                </font>
                                                            </a>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div id="expandselectchangestep2" style="margin-top: 7px;">
                                                    <select class="ml-sm-0 " id="selectchangestep2" onchange="copyTextValuestep2()" style=" font-size: 18px; text-align: center; width: 164px; border: 2px solid #3a9943; height: auto;">
                                                        <option value="0"> @lang('site.not_used') </option>
                                                        <option value="1"> @lang('site.less6month') </option>
                                                        <option value="2"> @lang('site.more6month') </option>
                                                        
                                                    </select>
                                                </div>
                                                <hr style="margin-top: 15px;  margin-bottom: 15px;">
                                                <div style=" display: flex; flex-direction: row-reverse;  justify-content: space-between;">
                                                    <div style="display: flex; flex-direction:column;">
                                                        <span>
                                                            <font style="vertical-align: inherit; display: flex;vertical-align: inherit;flex-direction: row-reverse; align-items: center;">
                                                                <div class="numberCircle">3</div>
                                                                <font style="margin-right: 8px; font-size: 18px; font-weight: bold; color: #646b77; vertical-align: inherit;"> @lang('site.remove_hair_color') </font>
                                                            </font>
                                                        </span>
                                                        <span style="margin: auto; text-align:right;">
                                                            <font style="vertical-align: inherit;">

                                                                <font id="anserstep3" style="font-size: 17px; font-weight: bold; color: #3a9943; vertical-align: inherit;">{{$evaluate_result["answer3"]}}</font>
                                                                <input hidden id="Numanserstep3" value="{{$evaluate_resultNum["answer3"]}}" type="text">

                                                            </font>
                                                        </span>
                                                    </div>

                                                    <div>
                                                        <span>
                                                            <a id="showselectchangestep3">
                                                                <font style="vertical-align: inherit;">
                                                                    <img src="/assets/img/svg/pen.svg" style="width: 18px;" />
                                                                    <font style="  font-size: 17px; vertical-align: inherit;">@lang('site.change_selection')</font>
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
                                                    <div style="display: flex; flex-direction: column;">
                                                        <span>
                                                            <font style="vertical-align: inherit; display: flex;vertical-align: inherit;flex-direction: row-reverse; align-items: center;">
                                                                <div class="numberCircle">4</div>
                                                                <font style="margin-right: 8px; font-size: 18px; font-weight: bold; color: #646b77; vertical-align: inherit;"> @lang('site.your_hair_demaged') </font>
                                                            </font>
                                                        </span>
                                                        <span style="margin: auto; text-align:right;">
                                                            <font style="vertical-align: inherit;">

                                                                <font id="anserstep4" style="font-size: 17px; font-weight: bold; color: #3a9943; vertical-align: inherit;">{{$evaluate_result["answer4"]}}</font>
                                                                <input hidden id="Numanserstep4" value="{{$evaluate_resultNum["answer4"]}}" type="text">

                                                            </font>
                                                        </span>
                                                    </div>

                                                    <div>
                                                        <span>
                                                            <a id="showselectchangestep4">
                                                                <font style="vertical-align: inherit;">
                                                                    <img src="/assets/img/svg/pen.svg" style="width: 18px;" />
                                                                    <font style="  font-size: 17px; vertical-align: inherit;">@lang('site.change_selection')</font>
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
                                                    <div style="display: flex; flex-direction: column;">
                                                        <span>
                                                            <font style="vertical-align: inherit; display: flex;vertical-align: inherit;flex-direction: row-reverse; align-items: center;">
                                                                <div class="numberCircle">5</div>
                                                                <font style="margin-right: 8px; font-size: 18px; font-weight: bold; color: #646b77; vertical-align: inherit;"> @lang('site.your_hair_length') </font>
                                                            </font>
                                                        </span>
                                                        <span style="margin: auto; text-align:right;">
                                                            <font style="vertical-align: inherit;">

                                                                <font id="anserstep5" style="font-size: 17px; font-weight: bold; color: #3a9943; vertical-align: inherit;">{{$evaluate_result["answer5"]}}</font>
                                                            </font>
                                                        </span>
                                                    </div>

                                                    <div>
                                                        <span>
                                                            <a id="showselectchangestep5">
                                                                <font style="vertical-align: inherit;">
                                                                    <img src="/assets/img/svg/pen.svg" style="width: 18px;" />
                                                                    <font style="  font-size: 17px; vertical-align: inherit;">@lang('site.change_selection')</font>
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
                                
                </div>
                <div class="col-12" style="display: flex;padding: 29px;flex-direction: row;flex-wrap: nowrap;justify-content: space-evenly;">

                 <a onclick="gitResultForEditeEvaluate()" class="register-button mt-0 " style="color: #ffffff; text-align: center;padding: 6px 0px; width: 13%;">@lang('site.confirm')</a>
                  <a class="register-button mt-0 "  href="<?php echo url("shoppingcart/" . $Idsale); ?>" style="color: #ffffff; text-align: center;padding: 6px 0px; width: 13%;">@lang('site.back')</a>
                  




       
    </div>
    <div class="col-12 col-md-12 col-xs-12" id="resultDynamic">
        
        </div>
            </div>
            
        </div>
        
    </div>
                    <input id="saleId" name="" type="hidden" value="{{$Idsale}}">
                    <input id="oldEvaluate" type="hidden" name="" value="{{$evaluate_resultNumOrginal}}" >
                    <input id="Idproduct" type="hidden" name="" value="{{$productId}}" >
                    <input hidden id="saleIdinHome"  type="text" value="{{$Idsale}}"> 
                    <input hidden id="countOfSale" type="text" value="{{$count}}">
                    <input hidden id="Items" type="text" value="{{$Items}}">
    <script>
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
        val = "@lang('site.hair_type1')";
        return val;
    }
    if (val == 1) {
        val = "@lang('site.hair_type2')";
        return val;
    }
    if (val == 2) {
        val = "@lang('site.hair_type3')";
        return val;
    }
    if (val == 3) {
        val = "@lang('site.hair_type4')";
        return val;
    }
    }

    function returnvalueforstep2(val) {
    if (val == 0) {
        val = "@lang('site.not_used')";
        return val;
    }
    if (val == 1) {
        val = "@lang('site.less6month')";
        return val;
    }
    if (val == 2) {
        val = "@lang('site.more6month')";
        return val;
    }
    }

    function returnvalueforstep3(val) {
    if (val == 0) {
        val = "@lang('site.month_before')";
        return val;
    }
    if (val == 1) {
        val = "@lang('site.month_6before')";
        return val;
    }
    if (val == 2) {
        val = "@lang('site.year_before')";
        return val;
    }
    if (val == 3) {
        val = "@lang('site.year_2before')";
        return val;
    }
    if (val == 4) {
        val = "@lang('site.year_3before')";
        return val;
    }
    if (val == 5) {
        val = "@lang('site.year_3more')";
        return val;
    }
    if (val == 6) {
        val = "@lang('site.not_use_color_remove')";
        return val;
    }
    }

    function returnvalueforstep4(val) {
    if (val == 0) {
        val = "@lang('site.Yes')";
        return val;
    }
    if (val == 1) {
        val = "@lang('site.No')";
        return val;
    }
    }


    function gitResultForEditeEvaluate() {
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
    }
    function getDataBasedEvaluate(evaluateval) {
                var saleId = document.getElementById("saleId").value;
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
                        console.log("msg for product",msg)
                        //
                        console.log(msg)
                        if (msg.status != false) {
                            var product = `         
                            <div class="py-2 h4" style="margin-bottom: 0px; padding-bottom: 0px; text-align: right; ">
                                <div class=" pt-10 divtitlemodal" style="text-align: center;">
                                    <b style="font-family: 'Tajawal'; margin-right: 8px; font-size: 19px; color: #ffffff;">
                                    @lang('site.This_is_the_right_amount_and_quality_for_your_hair')                                  </b>
                                </div>
                            </div>
                            <div class="col-md-12" >
                                <div class="grid-rows">
                                    <div class="grid-row grid-row-top-2" style=" background-color: #ffffff;">
                                        <div class="grid-cols">
                                            <div class="grid-col grid-col-top-2-1" >
                                                <div class="grid-items">
                                                    <div class="grid-item grid-item-top-2-1-1">
                                                        <div class="module-products module-products-27 module-products-grid">
                                                            <div class="" style="padding:0px ;">
                                                                <div class="module-item module-item-2">
                                                                    <div class="product-grid row" style="margin-bottom: -49px;">
                                                                        <!-- product start  -->
                                                                        <div class=" product-layout  has-extra-button" style=" margin: auto;width: 33%; height: 152%;">
                                                                            <div class="product-thumb" >
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
                                                                                    <a  target="_blank" href=" {{ url('singleproduct/${msg.value.id}' )}}">
                                                                                        <div>
                                                                                        
                                                                                            <img src="{{url('uploads/products/thumb/${msg.value.id}.jpg')}}" width="500" height="500" alt="" title="" class="img-responsive img-first lazyload lazyloaded" data-ll-status="loaded">
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
                                                                                        <a  target="_blank" href=" {{ url('singleproduct/${msg.value.id}' )}}">
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
                                                                                    <li class="liclasstable" style="color: #b21019; font-weight: bold;">${msg.value.quantity}</li>
                                                                                    <li class="liclasstable">@lang('site.number')</li>
                                                                                </ul>
                                                                                <ul class="ulclasstable" style="margin-bottom: 17px; border-bottom: 1px solid #8d8d8d;">
                                                                                    <li class="liclasstable" style="color: #b21019;font-weight: bold; ">${msg.value.OldpricesForOne}  €</li>
                                                                                    <li class="liclasstable">@lang('site.price')</li>
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
                                                                                <ul class="ulclasstable" style="width: 50%;margin: auto;margin-top: 20px;height: 25px;">
                                                                                ${msg.value.prices != msg.value.Oldprices ? `
                                                                                            <li class="liclasstable" style="border-left: 1px solid #8d8d8d;  border-right: none;border-bottom: 1px solid #8d8d8d; color: #b21019; font-weight: bold;   text-decoration: line-through;">${msg.value.Oldprices.toFixed(2)} €</li>
                                                                                            ` : ''}
                                                                                    <li class="liclasstable" style="color: #b21019;  border-left: 1px solid #8d8d8d;  border-bottom: 1px solid #8d8d8d; font-weight: bold;">${msg.value.prices}  €</li>
                                                                                </ul>
                                                                                    </div>
                                                                                <div  class="col-6">

                                                                            

                                                                                <a  class="btn   addToCartEditEvaluate" data-link="" data-catId="${msg.value.category_id}" 
                                                                                data-image=""
                                                                                data-price="${msg.value.prices}" data-id="${msg.value.id}"
                                                                                data-key="0" data-size="${msg.value.titles}"
                                                                                data-Allprices="${msg.value.Allprices}"
                                                                                data-quantityForOffers="${msg.value.quantityForOffers}"
                                                                                data-name="${msg.value.name}" data-quantity="${msg.value.quantity}"  
                                                                                style="width: 77%; margin: auto; margin-top: 12px; height: 38px;padding: 0px 0px 0px 0px; font-size: 15px;  background: #339933;  content: '' !important;" 

                                            

                                                                            
                                                                                            <span>

                                                                                            <svg version="1.1" id="Layer_4" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 500 500" style=" width: 13%; margin-bottom: 5px; margin-right: 5px; enable-background:new 0 0 500 500;" xml:space="preserve">
                                                <style type="text/css">
                                                    .stcard0 {
                                                        fill: #ffffff;
                                                    }

                                                    .stcard1 {
                                                        fill: #ffffff;
                                                    }

                                                    .stcard2 {
                                                        fill: #ffffff;
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
                                                                                            @lang('site.add_to_cart')   
                                                                                            </span>
                                                                                            
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
                        
                        `;
                            $("#resultDynamic").html(product);
                        }  else {
                        if (msg.button == 1) {
                            var errormessage = `  
                        <div class="py-2 h4 headerForEachSteph4" >
                            <div class=" pt-10 divtitlemodal" style="text-align: center;">
                                <b class="headerForEachStep" >
                             @lang('site.result')
                                </b>
                            </div>
                         </div>
                        <div class="row heightformodal resutErrorCustom">
                                <div class="col-md-6 ml-md-3 ml-sm-3  pt-sm-0 pt-3">
                                    <img  class="img-fluid imgResulterror" style="margin-top: 0px;" src="{{ url('/uploads/images/girl.png') }}" alt="">
                                </div>
                                <div class="col-md-6">
                                    <label class="ml-sm-30 " style="text-align: center;  margin-top: 160px;   font-size: 32px;  margin-left: -67px;">
                                        <p class="textResulterror">
                                        ${msg.value}   
                                        </p></span>
                                    </label>
                                </div>
                        </div>
                        <div class="row modal-header" style="margin-top: 4px;">
                        <a type="button" class="btn register-button register-buttonCustum" style="margin-right: 0;"    href="<?php echo url('shoppingcart/') ?>/${saleId}" >
                                  <span>@lang('site.Close')</span>
                        </a>
                                                               
                                                                    
                                                                   
                        </div>
    `;
                        $("#resultDynamic").html(errormessage);
                        
                     } 
                       //  <button type="button" class="btn register-button tonewPage register-buttonCustum" data-rel="34" data-name="${ msg.category.name}" style="width: auto; margin-right: -305px;" id="restformquestionnaireforerrormassge" data-bs-dismiss="modal" aria-label="Close" >
                        //                                             <span>  @lang('site.hair_care_page') </span></button>
                           // <button type="button" class="btn register-button register-buttonCustum"  id="restformquestionnaireforerrormassge" data-bs-dismiss="modal" aria-label="Close" >
                                //   <span>@lang('site.Close')</span></button>
                        else{
                            console.log("error",true)
                            var errormessage = `  
                        <div class="py-2 h4 headerForEachSteph4" >
                            <div class=" pt-10 divtitlemodal" style="text-align: center;">
                                <b class="headerForEachStep">
                             @lang('site.result')
                                </b>
                            </div>
                         </div>
                        <div class="row heightformodal resutErrorCustom" >
                                <div class="col-md-6 ml-md-3 ml-sm-3  pt-sm-0 pt-3">
                                    <img class="img-fluid imgResulterror" style="margin-top: 0px;" src="{{ url('/uploads/images/girl.png') }}" alt="">
                                </div>
                                <div class="col-md-6">
                                    <label class="ml-sm-30" style="text-align: center;  margin-top: 160px;   font-size: 32px;  margin-left: -67px;">
                                        <p class="textResulterror">
                                        ${msg.value}   
                                        </p></span>
                                      
                                    </label>
                                </div>
                        </div>
                        <div class="row modal-header" style="margin-top: 4px;">
                            
                                <a type="button" class="btn register-button  register-buttonCustum" data-rel="34"  href="<?php echo url('home/') ?>/${saleId}" data-name="${ msg.category.name}" style="width: auto; style="margin-right: 0; color: #fff;">
                                                                    <span>  @lang('site.hair_care_page') </span></a>
          
                        </div>
    `;
                        $("#resultDynamic").html(errormessage);
console.log("errormessage",errormessage)
                        }
                        ///////////////////////////error message for  الشعر الذي عليه حناء///////////////////////////////
                        
                      
                    }
                        //

                    }
                });
            }
    var cart = new Array();
            $("body").on("click", ".addToCartEditEvaluate", function() {
                
        var item = {
            product_id: $(this).attr("data-id"),
            price: $(this).attr("data-price"),
            size: $(this).attr("data-size"),
            quantity: $(this).attr("data-quantity"),
            catId: $(this).attr("data-catId"),
            statusEvaluate: 0,
            evaluate: JSON.stringify(evalaute),    
            Allprices:$(this).attr("data-Allprices"),
            quantityForOffers:$(this).attr("data-quantityForOffers"),      
        };
        console.log("item",item);

        var saleId =  $("#saleId").val();
        var oldEvaluate =  $("#oldEvaluate").val();
        var Idproduct =  $("#Idproduct").val();

        
        var form_dataa = {
            saleId: saleId,
            items: item, 
            oldEvaluate : oldEvaluate,
            Idproduct : Idproduct
        };
        $.ajax({
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '<?php echo url("sales/addeditevaluateToCart"); ?>',
            data: form_dataa,
            success: function(msg) {
                console.log("msg",msg)
                var idForm = {
                    id: msg
                };
                var saleIdNew = msg;
                url = '/shoppingcart/' + saleIdNew;
                console.log(url)
                $(location).attr('href', url);

            }
          
        });

    });
    </script>


    @endsection