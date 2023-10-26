@extends('layouts.app')

@section('content')
    <link href="{{ asset('adminpanel/assets/css/plugins/chosen/chosen.css') }}" rel="stylesheet">
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>@lang('site.HomePage_Settings')</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{ url('') }}">@lang('site.home')</a>
                </li>

                <li class="active">
                    <strong>@lang('site.HomePage_Settings')</strong>
                </li>
            </ol>
        </div>
        <div class="col-lg-2">

        </div>
    </div>

    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>@lang('site.HomePage_Settings')</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>


                        </div>
                    </div>
                    <div class="ibox-content">


                        <form action="{{ url('settings/homepage') }}" class="form-horizontal" method="POST"
                            enctype='multipart/form-data'>
                            {{ csrf_field() }}
                            @forelse($homepage as $home)
                                @if ($home->type == 'text')
                                    <?php
                                    if (Session::get('locale') == 'ar') {
                                        $local = $home->label_ar;
                                    } else {
                                        $local = $home->label_en;
                                    }
                                    ?>

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">{{ $local ?? '' }}</label>
                                        <div class="col-sm-10"><input type="text" class="form-control"
                                                id="{{ $home->key }}" name="{{ $home->key }}"
                                                value="{{ old($home->key, $home->value) }}"></div>
                                    </div>
                                @endif

                                <!--@if ($home->type == 'textarea')
    -->

                                <!--    <div class="form-group">-->
                                <!--        <label class="col-sm-2 control-label">{{ $local ?? '' }}</label>-->
                                <!--        <div class="col-sm-10">-->
                                <!--            <textarea class="form-control" id="{{ $home->key }}"-->
                                <!--                      name="{{ $home->key }}">{{ $home->value }}</textarea>-->
                                <!--        </div>-->
                                <!--    </div>-->
                                <!--
    @endif-->

                                <!--<div class="hr-line-dashed"></div>-->



                            @empty
                            @endforelse
                            <?php $cat_array = [];
                            $pros = homepage_by_key('pro');
                            if (!empty($pros)) {
                                foreach (explode(',', $pros) as $c) {
                                    $cat_array[] = $c;
                                }
                                $pro = explode(',', $pros);
                            }
                            ?>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">@lang('site.Home_Categories')</label>
                                <div class="col-sm-10">
                                    <select data-placeholder="Choose a Category..." class="chosen-select" name="category[]"
                                        style="width:350px;" tabindex="4">
                                        @foreach ($products as $pro)
                                            <option <?php if (in_array($pro->id, $cat_array)) {
                                                echo 'selected';
                                            } ?> value="{{ $pro->id }}">
                                                @if (!empty($pro->translation->name))
                                                    {{ $pro->translation->name }}@else{{ $pro->name }}
                                                @endif
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">@lang('site.image1')</label>
                                <div class="form-group col-sm-10">
                                    <input type="file" name="homePageImage1" class="form-control" />
                                    <img src="{{ url('uploads/homepage/homePageImage1.webp?r=' . rand(0, 999)) }}"
                                        width="100px">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">@lang('site.image2')</label>
                                <div class="form-group col-sm-10">
                                    <input type="file" name="homePageImage2" class="form-control" />
                                    <img src="{{ asset('uploads/homepage/homePageImage2.webp?r=' . rand(0, 999)) }}"
                                        width="100px">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">@lang('site.image3')</label>
                                <div class="form-group col-sm-10">
                                    <input type="file" name="homePageImage3" class="form-control" />
                                    <img src="{{ asset('uploads/homepage/homePageImage3.webp?r=' . rand(0, 999)) }}"
                                        width="100px">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">@lang('site.image4')</label>
                                <div class="form-group col-sm-10">
                                    <input type="file" name="homePageImage4" class="form-control" />
                                    <img src="{{ asset('uploads/homepage/homePageImage4.webp?r=' . rand(0, 999)) }}"
                                        width="100px">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-4 col-sm-offset-2">
                                    <a class="btn btn-white" href="{{ url('settings/general') }}">@lang('site.cancel')</a>
                                    <button class="btn btn-primary" type="submit">@lang('site.Save_changes')</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('adminpanel/assets/js/plugins/chosen/chosen.jquery.js') }}"></script>
    <script>
        var config = {
            '.chosen-select': {},
            '.chosen-select-deselect': {
                allow_single_deselect: true
            },
            '.chosen-select-no-single': {
                disable_search_threshold: 10
            },
            '.chosen-select-no-results': {
                no_results_text: 'Oops, nothing found!'
            },
            '.chosen-select-width': {
                width: "95%"
            }
        }
        for (var selector in config) {
            $(selector).chosen(config[selector]);
        }
    </script>
@endsection
