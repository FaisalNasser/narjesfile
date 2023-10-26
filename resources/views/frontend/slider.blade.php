<?php $sliders = getSlider(); ?>

<!--====================  hero slider area ====================-->



<div class="hero-slider-area " style="text-align:center ;">
<div class="section-title ">
    <h2 style="padding-bottom: 5px;"></h2>
        </div>
    <!--=======  hero slider wrapper  =======-->

    <div class="hero-slider-wrapper">
        <div class="ht-slick-slider"
            data-slick-setting='{
                "slidesToShow": 1,
                "slidesToScroll": 1,
                "arrows": false,
                "dots": true,
                "autoplay": true,
                "autoplaySpeed": 3000,
                "speed": 1000,
                "fade": true
            }'
            data-slick-responsive='[
                {"breakpoint":1501, "settings": {"slidesToShow": 1} },
                {"breakpoint":1199, "settings": {"slidesToShow": 1} },
                {"breakpoint":991, "settings": {"slidesToShow": 1} },
                {"breakpoint":767, "settings": {"slidesToShow": 1} },
                {"breakpoint":575, "settings": {"slidesToShow": 1} },
                {"breakpoint":479, "settings": {"slidesToShow": 1} }
            ]'>
            @foreach ($sliders as $slider)
                <!--=======  single slider item  =======-->

                <div class="single-slider-item" >
                    <div class="hero-slider-item-wrapper hero-slider-item-wrapper--fullwidth hero-slider-item-wrapper--fullwidth--maxheight "
                        style=" background-image: url({{ url('/uploads/slider/' . $slider->image) }});">
                        <div class="container">

                            <div class="row row mt-325 mt-sm-135" style="display: flex; flex-direction: column; align-items: center; flex-wrap: nowrap;">
                                <div class="col-lg-8">
                                    <div class="hero-slider-content" style="margin-bottom: 6px;">
                                        {{-- <p class="slider-title slider-title--small">Marble Pendant Lamp</p> --}}
                                        <div style="background-color: rgb(18 17 17 / 35%); margin-top:0px;">
                                        <p class="slider-title slider-title--big-bold"> <?php echo $slider->title; ?></p>

                                        </div>
                                             @foreach($categories as $category)
                                        @if($slider->link == 1 &&  $category->id == 15)
                                                <a type="button" class="theme-button hero-slider-button tonewPage" data-rel="{{$category->id}}" data-name="{{$category->translation->name}}" >
                                                    @lang('site.shopping_now')
                                                </a>
                                            @else
                                                @if($slider->link == 2 && $category->id ==  29)
                                                    <a type="button" class="theme-button hero-slider-button tonewPage" data-rel="{{$category->id}}" data-name="{{$category->translation->name}}" >
                                                        @lang('site.shopping_now')
                                                    </a>
                                                @else
                                                    @if($slider->link == 3 && $category->id ==  30)
                                                        <a type="button" class="theme-button hero-slider-button tonewPage" data-rel="{{$category->id}}" data-name="{{$category->translation->name}}" >
                                                            @lang('site.shopping_now')
                                                        </a>
                                                    @endif
                                                @endif
                                            @endif
                                            @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--=======  End of single slider item  =======-->
            @endforeach
       

        </div>
    </div>
    <div class="section-title line22  mb-20">
    <h2 style="padding-bottom: 5px;"></h2>
        </div>
    <!--=======  End of hero slider wrapper  =======-->
</div>





<!--====================  End of hero slider area  ====================-->
