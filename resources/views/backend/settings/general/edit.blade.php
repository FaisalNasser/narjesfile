@extends('layouts.app')

@section('content')
    <link href="{{ asset('adminpanel/assets/css/plugins/chosen/chosen.css') }}" rel="stylesheet">
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>@lang('site.General_Settings')</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{ url('') }}">@lang('site.home')</a>
                </li>

                <li class="active">
                    <strong>@lang('site.General_Settings')</strong>
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
                        <h5>@lang('site.General_Settings')</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>


                        </div>
                    </div>
                    <div class="ibox-content">


                        <form action="{{ url('settings/general') }}" class="form-horizontal" method="POST"
                            enctype='multipart/form-data'>
                            {{ csrf_field() }}
                            @forelse($settings as $setting)
                                @if ($setting->key != 'stripe' and $setting->key != 'languages')
                                    <?php
                                    if (app()->getLocale() == 'ar') {
                                        $local = $setting['label_ar'];
                                    } else {
                                        $local = $setting['label_en'];
                                    }
                                    ?>
                                    @if ($setting->key == 'color' || $setting->key == 'color_s')
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">{{ $local }}</label>
                                            <div class="col-sm-10"><input type="color" class="form-control"
                                                    id="{{ $setting->key }}" name="{{ $setting->key }}"
                                                    value="{{ setting_by_key($setting->key) }}">
                                            </div>
                                        </div>
                                        <div class="hr-line-dashed"></div>
                                    @elseif($setting->key == 'closed')
                                        @if (old($setting->key, $setting->value) == 1)
                                            <div class="form-group">
                                                <div class="col-sm-4 col-sm-offset-2">
                                                    <div class="form-check">
                                                        <input hidden name="{{ $setting->key }}" id="closed"
                                                            value="{{ old($setting->key, $setting->value) }}" />
                                                        <input class="btn-check " type="checkbox" value="1" checked
                                                            id="enablep" />
                                                        <label class="form-check-label " for="closed">
                                                            {{ $local }}
                                                        </label>

                                                    </div>
                                                </div>

                                            </div>
                                        @else
                                            <div class="form-group">
                                                <div class="col-sm-4 col-sm-offset-2">
                                                    <div class="form-check">
                                                        <input hidden name="{{ $setting->key }}" id="closed"
                                                            value="{{ old($setting->key, $setting->value) }}" />
                                                        <input class="btn-check " type="checkbox" value="1"
                                                            id="enablep" />
                                                        <label class="form-check-label " for="closed">
                                                            {{ $local }}
                                                        </label>

                                                    </div>
                                                </div>

                                            </div>
                                        @endif
                                        @elseif($setting->key == 'order_whatsapp_state')
                                        @if (old($setting->key, $setting->value) == 1)
                                            <div class="form-group">
                                                <div class="col-sm-4 col-sm-offset-2">
                                                    <div class="form-check">
                                                        <input hidden name="{{ $setting->key }}" id="order_whatsapp_state"
                                                            value="{{ old($setting->key, $setting->value) }}" />
                                                        <input class="btn-check " type="checkbox" value="1" checked
                                                            id="order_whatsapp_state_click" />
                                                        <label class="form-check-label " for="order_whatsapp_state">
                                                            {{ $local }}
                                                        </label>

                                                    </div>
                                                </div>

                                            </div>
                                        @else
                                            <div class="form-group">
                                                <div class="col-sm-4 col-sm-offset-2">
                                                    <div class="form-check">
                                                        <input hidden name="{{ $setting->key }}" id="order_whatsapp_state"
                                                            value="{{ old($setting->key, $setting->value) }}" />
                                                        <input class="btn-check " type="checkbox" value="1"
                                                            id="order_whatsapp_state_click" />
                                                        <label class="form-check-label " for="order_whatsapp_state">
                                                            {{ $local }}
                                                        </label>

                                                    </div>
                                                </div>

                                            </div>
                                        @endif
                                    @elseif($setting->key == 'sa_electronic_invoice')
                                        @if (old($setting->key, $setting->value) == 1)
                                            <div class="form-group">
                                                <div class="col-sm-4 col-sm-offset-2">
                                                    <div class="form-check">
                                                        <input hidden name="{{ $setting->key }}"
                                                            id="sa_electronic_invoice"
                                                            value="{{ old($setting->key, $setting->value) }}" />
                                                        <input class="btn-check " type="checkbox" value="1" checked
                                                            id="enabled" />
                                                        <label class="form-check-label " for="sa_electronic_invoice">
                                                            {{ $local }}
                                                        </label>

                                                    </div>
                                                </div>

                                            </div>
                                        @else
                                            <div class="form-group">
                                                <div class="col-sm-4 col-sm-offset-2">
                                                    <div class="form-check">
                                                        <input hidden name="{{ $setting->key }}"
                                                            id="sa_electronic_invoice"
                                                            value="{{ old($setting->key, $setting->value) }}" />
                                                        <input class="btn-check " type="checkbox" value="1"
                                                            id="enabled" />
                                                        <label class="form-check-label " for="sa_electronic_invoice">
                                                            {{ $local }}
                                                        </label>

                                                    </div>
                                                </div>

                                            </div>
                                        @endif
                                    @elseif ($setting->key == 'Saturday' || $setting->key == 'SaturdayE' || $setting->key == 'Sunday' || $setting->key == 'SundayE' || $setting->key == 'Monday' || $setting->key == 'MondayE' || $setting->key == 'Tuesday' || $setting->key == 'TuesdayE' || $setting->key == 'Wednesday' || $setting->key == 'WednesdayE' || $setting->key == 'Thursday' || $setting->key == 'ThursdayE' || $setting->key == 'Friday' || $setting->key == 'FridayE')
                                        <div class="form-group col-lg-6">
                                            <label class="col-sm-2 control-label"
                                                style="text-align: left;">{{ $local }}</label>
                                            <div class='input-group date col-sm-10 datetimepicker'>
                                                <input type='text' class="form-control" id="{{ $setting->key }}"
                                                    name="{{ $setting->key }}"
                                                    value="{{ old($setting->key, $setting->value) }}" />
                                                <span class="input-group-addon">
                                                    <span class="glyphicon glyphicon-calendar"></span>
                                                </span>
                                            </div>
                                        </div>
                                    @elseif($setting->key == 'tzone')
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">{{ $local }}</label>
                                            <div class="form-group col-sm-10">
                                                <select data-placeholder="Choose a {{ $local }}..."
                                                    class="chosen-select" name="{{ $setting->key }}"
                                                    id="{{ $setting->key }}" style="width:350px; padding:6px 12px ;"
                                                    tabindex="4">
                                                    <option <?php if (old($setting->key, $setting->value) == 'Europe/Istanbul') {
    echo 'selected';
} ?> value="Europe/Istanbul">تركيا</option>
                                                    <option <?php if (old($setting->key, $setting->value) == 'Asia/Riyadh') {
    echo 'selected';
} ?> value="Asia/Riyadh">السعودية</option>
                                                    <option <?php if (old($setting->key, $setting->value) == 'Asia/Qatar') {
    echo 'selected';
} ?> value="Asia/Qatar">قطر</option>
                                                    <option <?php if (old($setting->key, $setting->value) == 'Asia/Aden') {
    echo 'selected';
} ?> value="Asia/Aden">اليمن</option>
                                                    <option <?php if (old($setting->key, $setting->value) == 'Asia/Baghdad') {
    echo 'selected';
} ?> value="Asia/Baghdad">العراق</option>
                                                    <option <?php if (old($setting->key, $setting->value) == 'Asia/Beirut') {
    echo 'selected';
} ?> value="Asia/Beirut">لبنان</option>
                                                    <option <?php if (old($setting->key, $setting->value) == 'Asia/Kuwait') {
    echo 'selected';
} ?> value="Asia/Kuwait">الكويت</option>
                                                    <option <?php if (old($setting->key, $setting->value) == 'Asia/Damascus') {
    echo 'selected';
} ?> value="Asia/Damascus">سورية</option>
                                                    <option <?php if (old($setting->key, $setting->value) == 'Asia/Amman') {
    echo 'selected';
} ?> value="Asia/Amman">الأردن</option>
                                                    <option <?php if (old($setting->key, $setting->value) == 'Asia/Dubai') {
    echo 'selected';
} ?> value="Asia/Dubai">الإمارات العربية المتحدة
                                                    </option>
                                                    <option <?php if (old($setting->key, $setting->value) == 'Asia/Tokyo') {
    echo 'selected';
} ?> value="Asia/Tokyo">اليابان</option>

                                                </select>
                                            </div>
                                        </div>

                                        @elseif($setting->key == 'state')
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">{{ $local }}</label>
                                            <div class="col-sm-10">
                                                {{-- ///////////////////////// --}}
                                                <select value="{{ old($setting->key, $setting->value) }}"  name="{{$setting->key}}" style="padding: 0 30px 0 0;" class="form-control" onchange="changeFlag(this)" id="{{$setting->key}}"></select>
                                            </div>
                                        </div>

                                    @else
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">{{ $local }}</label>
                                            <div class="col-sm-10"><input type="text" class="form-control"
                                                    id="{{ $setting->key }}" name="{{ $setting->key }}"
                                                    value="{{ setting_by_key($setting->key) }}">
                                            </div>
                                        </div>
                                        <div class="hr-line-dashed"></div>
                                    @endif
                                @endif
                                <?php
                                if (app()->getLocale() == 'ar') {
                                    $local = $setting['label_ar'];
                                } else {
                                    $local = $setting['label_en'];
                                }
                                ?>
                                @if ($setting->key == 'stripe')
                                    <?php $stripe_label = $local; ?>
                                    <?php $stripe_value = $setting->value; ?>
                                @endif
                                @if ($setting->key == 'languages')
                                    <?php $language_label = $local; ?>
                                    <?php $lanague_value = json_decode($setting->value, true); ?>
                                @endif

                                @if ($setting->key == 'frontend')
                                    <?php $frontend_label = $local; ?>
                                    <?php $frontend_value = $setting->value; ?>
                                @endif
                            @empty
                            @endforelse


                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ $language_label }}</label>
                                <div class="form-group col-sm-10">
                                    <select data-placeholder="Choose a Language..." class="chosen-select"
                                        name="languages[]" multiple style="width:350px;" tabindex="4">
                                        <option <?php if (in_array('ar', $lanague_value)) {
    echo 'selected';
} ?> value="ar">ar</option>
                                        <option <?php if (in_array('en', $lanague_value)) {
    echo 'selected';
} ?> value="en">en</option>
                                        <option <?php if (in_array('de', $lanague_value)) {
    echo 'selected';
} ?> value="de">de</option>
                                    </select>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>





                            <div class="form-group">
                                <label class="col-sm-2 control-label">@lang('site.Logo')</label>
                                <div class="form-group col-sm-10">
                                    <input type="file" name="logo" class="form-control" />
                                    <img src="{{ url('uploads/logo.png?r=' . rand(0, 999)) }}" width="100px">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>



                            <div class="form-group">
                                <label class="col-sm-2 control-label">@lang('site.order_logo')</label>
                                <div class="form-group col-sm-10">
                                    <input type="file" name="order_logo" class="form-control" />
                                    <img src="{{ url('uploads/order_logo.png?r=' . rand(0, 999)) }}" width="100px">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">@lang('site.product_logo')</label>
                                <div class="form-group col-sm-10">
                                    <input type="file" name="product_logo" class="form-control" />
                                    <img src="{{ url('uploads/product_logo.png?r=' . rand(0, 999)) }}" width="100px">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <div class="col-sm-4 col-sm-offset-2">

                                    <a class="btn btn-white"
                                        href="{{ url('settings/general') }}">@lang('site.cancel')</a>
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
    <script>
        $('#enabled').change(function() {
            if ($(this).prop("checked")) {
                // checked
                $('#sa_electronic_invoice').val(1);
                return;
            } else {
                $('#sa_electronic_invoice').val(0);
                // not checked
            }
        });
        $('#enablep').change(function() {
            if ($(this).prop("checked")) {
                // checked
                $('#closed').val(1);
                return;
            } else {
                $('#closed').val(0);
                // not checked
            }
        });
        $('#order_whatsapp_state_click').change(function() {
            if ($(this).prop("checked")) {
                // checked
                $('#order_whatsapp_state').val(1);
                return;
            } else {
                $('#order_whatsapp_state').val(0);
                // not checked
            }
        });
    </script>
    <script>
// Get State Value
var state = 'af';
@foreach ($settings as $setting)
    @if ($setting->key == "state" && $setting->value != null)
        state = "<?php echo $setting->value ?>";
    @endif
@endforeach

//  Create The intlTelInput
var countryData = window.intlTelInputGlobals.getCountryData(),
    addressDropdown = document.querySelector("#state");

var iti = window.intlTelInput(addressDropdown, {
    // separateDialCode:false,
    // autoHideDialCode:false,
    initialCountry: state,
    allowDropdown:false,
  utilsScript: "https://intl-tel-input.com/node_modules/intl-tel-input/build/js/utils.js?1549804213570" // just for formatting/placeholders etc
});
// populate the country dropdown
for (var i = 0; i < countryData.length; i++) {
    var country = countryData[i];
    var optionNode = document.createElement("option");
    optionNode.value = country.iso2;
    var textNode = document.createTextNode(country.name);
    optionNode.appendChild(textNode);
    if(optionNode.value == state ){
        optionNode.selected = true;
        console.log(state);
    }

    addressDropdown.appendChild(optionNode);
}

// Function To Change The Flag
function changeFlag(e){
    // console.log(e.options[e.selectedIndex].value);
    iti.setCountry(e.options[e.selectedIndex].value);
}
// Style intlTelInput
if('{{app()->getLocale()}}' != 'ar'){
        var flag_container = document.querySelector(".iti__flag-container");
        flag_container.style.right = '20px';
    }


    </script>
@endsection
