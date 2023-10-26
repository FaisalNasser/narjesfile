    <!--=====  Start of Evaluate modal  ======-->

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

                                        <div class="py-2  headerForEachSteph4">

                                            <div class=" pt-10 pt-ms-0 divtitlemodal">
                                                <b class="headerForEachStep"> @lang('site.your_hair_type') </b>
                                            </div>
                                        </div>
                                        <div class="heightformodal">

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

                                        <div class="py-2  headerForEachSteph4">

                                            <div class=" pt-10 divtitlemodal">
                                                <b class="headerForEachStep">
                                                    @lang('site.use_hanaa')
                                                </b>
                                            </div>
                                        </div>

                                        <div class=" heightformodal">
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
                                                <div style="display: flex;   justify-content: center;   margin-top: 233px;">
                                                <label id="errorstep2" style=" color:red; font-size: 17px; "> </label>
                                                </div>

                                            </div>
                                        </div>

                                    </section>

                                    <h4 style="display:none ;"></h4>
                                    <section>

                                        <div class="py-2  headerForEachSteph4" >

                                            <div class="pt-sm-0 pt-10 divtitlemodal">
                                                <b class="headerForEachStep">
                                                    @lang('site.remove_hair_color')
                                                </b>
                                            </div>
                                        </div>

                                        <div class=" heightformodal">
                                            <div class="ml-md-3 ml-sm-3  pt-sm-0 pt-3" id="options">
                                                <label class="containerCustom" style="     display: flex; flex-direction: row-reverse; align-items: flex-end;">
                                                    <input type="radio" name="step3" value="0">
                                                    <span class="checkmarkCustom">


                                                    </span>
                                                    <span style="margin-right: 10px;">

                                                        @lang('site.month_before')

                                                    </span>
                                                </label>

                                                <label class="containerCustom" style="display: flex; flex-direction: row-reverse; align-items: flex-end;">
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
                                                <label class="containerCustom" style="display: flex; flex-direction: row-reverse; align-items: flex-end;">
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
                                                <div style="display: flex;   justify-content: center;     margin-top: 100px;">
                                                <label id="errorstep3" style=" color:red; font-size: 17px;"> </label>
                                                </div>
                                            </div>
                                        </div>

                                    </section>

                                    <h4 style="display:none ;"></h4>
                                    <section>

                                        <div class="py-2  headerForEachSteph4" >

                                            <div class="pt-10 divtitlemodal">
                                                <b class="headerForEachStep">
                                                    @lang('site.your_hair_demaged')
                                                </b>
                                            </div>
                                        </div>

                                        <div class=" heightformodal">
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
                                                <div style="display: flex;   justify-content: center;      margin-top: 265px;">
                                                <label id="errorstep4" style=" color:red; font-size: 17px; "> </label>
                                                </div>
                                            </div>
                                        </div>

                                    </section>
                                    <h4 style="display:none ;"></h4>
                                    <section>
                                        <div class="py-2  headerForEachSteph4">

                                            <div class=" pt-10 divtitlemodal">
                                                <b class="headerForEachStep">
                                                    @lang('site.your_hair_length')
                                                </b>
                                            </div>
                                        </div>

                                        <div class=" heightformodal" style=" display: flex; flex-wrap: wrap; flex-direction: row;justify-content: space-between;">
                                            <div class="ml-md-3 ml-sm-3  pt-sm-0 pt-3" id="options">
                                                <img  class="img-fluid hairlengthStyle" src="{{ url('uploads/homepage/hairlength.png') }}" alt="">

                                            </div>
                                            <div style="flex:1;">
                                                <label class="ml-sm-10" style=" display: flex;flex-wrap: nowrap; flex-direction: column; 
                                                ">
                                                    <p class="hair_lengthStyle">

                                                        @lang('site.must_choose_your_hair_length')
                                                    </p>
                                                    <select class="ml-sm-0 selecthair" id="selectstep5" >
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
                                                <div style="display: flex;   justify-content: center; ">
                                                <label id="errorstep5" style="color:red; text-align: center;  font-size: 17px;"> </label>
                                                </div>

                                            </div>

                                        </div>

                                    </section>
                                    <h4 style="display:none ;"></h4>
                                    <section>
                                        <div class="py-2  divtitleforstep">

                                            <div class=" pt-10 divtitlemodal">
                                                <b class="headerForEachStep">

                                                    @lang('site.confirm_with_change_answers')
                                                </b>
                                            </div>
                                        </div>
                                        <div class=" heightformodal">




                                            <div style=" display: flex; flex-direction: row-reverse;  justify-content: space-between;">
                                                <div style="    display: flex; flex-direction:column;">
                                                    <span>
                                                        <font style="vertical-align: inherit; display: flex;vertical-align: inherit;flex-direction: row-reverse; align-items: center;">
                                                            <div class="numberCircle">1</div>
                                                            <font class="quStep6" >@lang('site.your_hair_type') </font>
                                                        </font>
                                                    </span>
                                                    <span style="margin: auto; text-align:right;">
                                                        <font style="vertical-align: inherit;">

                                                            <font class="anserstep1 anserstepAll6" id="anserstep1" ></font>
                                                            <input hidden id="Numanserstep1" value="" type="text">

                                                        </font>
                                                    </span>

                                                </div>

                                                <div>
                                                    <span>
                                                        <a id="showselectchangestep1">
                                                            <font style="vertical-align: inherit;">
                                                                <img class="ImgchangeStep6" src="/assets/img/svg/pen.svg" />
                                                                <font class="changeStep6" > @lang('site.change_selection')</font>
                                                            </font>
                                                        </a>

                                                    </span>
                                                </div>



                                            </div>
                                            <div id="expandselectchangestep1" style="margin-top: 7px;">
                                                <select class="ml-sm-0 selectchangestep1 styleSelectStep" id="selectchangestep1" onchange="copyTextValuestep1()" >
                                                    <option value="0"> @lang('site.hair_type1') </option>
                                                    <option value="1"> @lang('site.hair_type2') </option>
                                                    <option value="2"> @lang('site.hair_type3') </option>
                                                    <option value="3"> @lang('site.hair_type4') </option>
                                                </select>
                                            </div>
                                            <hr class="spreaterStep6" >
                                            <div style=" display: flex; flex-direction: row-reverse;  justify-content: space-between;">
                                                <div style="display: flex; flex-direction: column;">
                                                    <span>
                                                        <font style="vertical-align: inherit; display: flex;vertical-align: inherit;flex-direction: row-reverse; align-items: center;">
                                                            <div class="numberCircle">2</div>
                                                            <font class="quStep6"> @lang('site.use_hanaa') </font>
                                                        </font>
                                                    </span>
                                                    <span style="margin: auto; text-align:right;">
                                                        <font style="vertical-align: inherit;">

                                                            <font id="anserstep2" class="anserstepAll6" ></font>
                                                            <input hidden id="Numanserstep2" value="" type="text">

                                                        </font>
                                                    </span>
                                                </div>

                                                <div>
                                                    <span>
                                                        <a id="showselectchangestep2">
                                                            <font style="vertical-align: inherit;">
                                                            <img class="ImgchangeStep6" src="/assets/img/svg/pen.svg" />
                                                                <font class="changeStep6" > @lang('site.change_selection')</font>
                                                            </font>
                                                        </a>
                                                    </span>
                                                </div>
                                            </div>
                                            <div id="expandselectchangestep2" style="margin-top: 7px;">
                                                <select class="ml-sm-0 styleSelectStep" id="selectchangestep2" onchange="copyTextValuestep2()">
                                                    <option value="0"> @lang('site.not_used') </option>
                                                    <option value="1"> @lang('site.more6month') </option>
                                                    <option value="2"> @lang('site.less6month') </option>
                                                </select>
                                            </div>
                                            <hr class="spreaterStep6">
                                            <div style=" display: flex; flex-direction: row-reverse;  justify-content: space-between;">
                                                <div class="quStep6qu3">
                                                    <span>
                                                        <font style="vertical-align: inherit; display: flex;vertical-align: inherit;flex-direction: row-reverse; align-items: center;">
                                                            <div class="numberCircle">3</div>
                                                            <font class="quStep6"> @lang('site.remove_hair_color') </font>
                                                        </font>
                                                    </span>
                                                    <span style="margin: auto; text-align:right;">
                                                        <font style="vertical-align: inherit;">

                                                            <font id="anserstep3" class="anserstepAll6"></font>
                                                            <input hidden id="Numanserstep3" value="" type="text">

                                                        </font>
                                                    </span>
                                                </div>

                                                <div>
                                                    <span>
                                                        <a id="showselectchangestep3">
                                                            <font style="vertical-align: inherit;">
                                                            <img class="ImgchangeStep6" src="/assets/img/svg/pen.svg" />
                                                                <font class="changeStep6" > @lang('site.change_selection')</font>
                                                            </font>
                                                        </a>
                                                    </span>
                                                </div>
                                            </div>
                                            <div id="expandselectchangestep3" style="margin-top: 7px;">
                                                <select class="ml-sm-0 styleSelectStep" id="selectchangestep3" onchange="copyTextValuestep3()">
                                                    <option value="0"> @lang('site.month_before') </option>
                                                    <option value="1"> @lang('site.month_6before') </option>
                                                    <option value="2"> @lang('site.year_before') </option>
                                                    <option value="3"> @lang('site.year_2before') </option>
                                                    <option value="4"> @lang('site.year_3before') </option>
                                                    <option value="5"> @lang('site.year_3more') </option>
                                                    <option value="6"> @lang('site.not_use_color_remove') </option>
                                                </select>
                                            </div>
                                            <hr class="spreaterStep6">
                                            <div style=" display: flex; flex-direction: row-reverse;  justify-content: space-between;">
                                                <div style="display: flex; flex-direction: column;">
                                                    <span>
                                                        <font style="vertical-align: inherit; display: flex;vertical-align: inherit;flex-direction: row-reverse; align-items: center;">
                                                            <div class="numberCircle">4</div>
                                                            <font class="quStep6"> @lang('site.your_hair_demaged') </font>
                                                        </font>
                                                    </span>
                                                    <span style="margin: auto; text-align:right;">
                                                        <font style="vertical-align: inherit;">

                                                            <font id="anserstep4" class="anserstepAll6"></font>
                                                            <input hidden id="Numanserstep4" value="" type="text">

                                                        </font>
                                                    </span>
                                                </div>

                                                <div>
                                                    <span>
                                                        <a id="showselectchangestep4">
                                                            <font style="vertical-align: inherit;">
                                                            <img class="ImgchangeStep6" src="/assets/img/svg/pen.svg" />
                                                                <font class="changeStep6" > @lang('site.change_selection')</font>
                                                            </font>
                                                        </a>
                                                    </span>
                                                </div>
                                            </div>
                                            <div id="expandselectchangestep4" style="margin-top: 7px;">
                                                <select class="ml-sm-0 styleSelectStep" id="selectchangestep4" onchange="copyTextValuestep4()">
                                                    <option value="0">@lang('site.Yes')</option>
                                                    <option value="1">@lang('site.No')</option>
                                                </select>
                                            </div>
                                            <hr class="spreaterStep6">
                                            <div style=" display: flex; flex-direction: row-reverse;  justify-content: space-between;">
                                                <div class="quStep6qu3">
                                                    <span>
                                                        <font style="vertical-align: inherit; display: flex;vertical-align: inherit;flex-direction: row-reverse; align-items: center;">
                                                            <div class="numberCircle">5</div>
                                                            <font class="quStep6"> @lang('site.your_hair_length') </font>
                                                        </font>
                                                    </span>
                                                    <span style="margin: auto; text-align:right;">
                                                        <font style="vertical-align: inherit;">

                                                            <font id="anserstep5" class="anserstepAll6"></font>


                                                        </font>
                                                    </span>
                                                </div>

                                                <div>
                                                    <span>
                                                        <a id="showselectchangestep5">
                                                            <font style="vertical-align: inherit;">
                                                            <img class="ImgchangeStep6" src="/assets/img/svg/pen.svg" />
                                                            <font class="changeStep6" > @lang('site.change_selection')</font>
                                                            </font>
                                                        </a>
                                                    </span>
                                                </div>
                                            </div>
                                            <div id="expandselectchangestep5" style="margin-top: 7px;">
                                                <select class="ml-sm-0 styleSelectStep" id="selectchangestep5" onchange="copyTextValuestep5()">
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
                                            <hr class="spreaterStep6">
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

    <!--=====  End of Evaluate modal  ======-->
