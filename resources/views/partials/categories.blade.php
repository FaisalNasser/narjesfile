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
                            "autoplaySpeed": 2000,
                            "speed": 2000
                        }' data-slick-responsive='[
                            {"breakpoint":1501, "settings": {"slidesToShow": 7} },
                            {"breakpoint":1199, "settings": {"slidesToShow": 7} },
                            {"breakpoint":991, "settings": {"slidesToShow": 3} },
                            {"breakpoint":767, "settings": {"slidesToShow": 2, "arrows": false} },
                            {"breakpoint":575, "settings": {"slidesToShow": 2, "arrows": false} },
                            {"breakpoint":479, "settings": {"slidesToShow": 1, "arrows": false} }
                        ]'>
                            @foreach ($categories as $cat)
                           

                            <div id="categoryhover" style="width: 90%;display: inline-block;" class="single-category-Headeritem single-category-item 
                            item_active_category @if ($loop->last) {{ 'categoryactive' }} @endif " data-rel="{{ $cat->id }}" data-name="@if (!empty($cat->translation->name))
                                                                                {{ $cat->translation->name }}@else{{ $cat->name }}
                                                                                @endif"  data-header="">
                                <div class="single-category-item__image module-title-305">
                                    <a>
                                        <div class="ml-sm-65 widthresponsev">
                                            @php
                                            echo trim($cat->icon, '"');
                                            @endphp
                                        </div>

                                        <h5 class="category-title" style="margin-right: 20px;">
                                        
                                            <a>
                                                <p id="categorytitlehover" @if(app()->getLocale() == 'ar')  style="padding-bottom: 4px;"  @endif class="quntity categorytitle-activ catmtitle-{{$cat->id}}   @if ($loop->last) {{ 'categoryactive' }} {{ 'categorytitleactiv'}} @endif"> @if (!empty($cat->translation->name))
                                                    {{ $cat->translation->name }}@else{{ $cat->name }}
                                                    @endif
                                                </p>
                                            </a>
                                           
                                            <!-- <a>-->
                                            <!--    <p id="categorytitlehover" class="quntity categorytitle-activ catmtitle-{{$cat->id}}   @if ($loop->last) {{ 'categoryactive' }} {{ 'categorytitleactiv'}} @endif"> @if (!empty($cat->translation->name))-->
                                            <!--        {{ $cat->translation->name }}@else{{ $cat->name }}-->
                                            <!--        @endif-->
                                            <!--    </p>-->
                                            <!--</a> -->
                                         
                                        </h5>

                                        <!-- <div class="lineundercategoryhover" style="background: #1e6f2f; max-width: 146px;  margin-top: -17px;  display: block; height: 2px; margin-bottom: 15px; margin-left: auto; margin-right: 26px;"></div> -->
                                    </a>
                                    <a>
                                        <img id="categoryimaghover" class=" categoryImageactiv catmImg-{{$cat->id}}   @if ($loop->last) {{ 'categoryimag-activ' }}  @endif" width="262" height="340" data-src="{{ url('uploads/category/' . $cat->id . '.jpg') }}"  alt="">
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







