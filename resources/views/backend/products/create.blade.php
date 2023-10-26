@extends('layouts.app')

@section('content')
    @include('backend.products/cropper')
    <!-- Image cropper -->
    <script src="{{ asset('adminpanel/assets/js/plugins/cropper/cropper.js') }}"></script>

    <link href="{{ asset('adminpanel/assets/css/plugins/cropper/cropper.css') }}" rel="stylesheet">

    <script src="https://cdn.tiny.cloud/1/0garagelkzdv3wp9gvsbauyr1lw5s77506fyyiwdu67el6ny/tinymce/6/tinymce.min.js"
        referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: 'textarea'
        });
    </script>
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>@lang('site.add') @lang('site.product')</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{ url('') }}">@lang('site.home')<< /a>
                </li>
                <li>
                    <a href="{{ url('products') }}">@lang('site.products')</a>
                </li>
                <li class="active">
                    <strong>@lang('site.add_new')</strong>
                </li>
            </ol>
        </div>
        <div class="col-lg-2">

        </div>
    </div>
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-8">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>@lang('site.add_new')</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>


                        </div>
                    </div>
                    <div class="ibox-content">
                        <form action="{{ url('products') }}" class="form-horizontal" method="POST"
                            enctype='multipart/form-data'>
                            {{ csrf_field() }}
                            <div class="form-group"><label class="col-sm-2 control-label">@lang('site.name')</label>
                                <div class="col-sm-10"><input type="text" class="form-control" id="name"
                                        name="name" value="{{ old('name') }}"></div>
                            </div>
                            <div class="hr-line-dashed"></div>

                            <div class="form-group"><label class="col-sm-2 control-label">@lang('site.description')</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" id="desc" name="description">{{ old('description') }}</textarea>
                                </div>
                            </div>

                            <div class="form-group"><label class="col-sm-2 control-label">@lang('site.category')</label>
                                <div class="col-sm-10">
                                    <select class="form-control" id="category_id" name="category_id">
                                        @foreach ($categories as $cat)
                                            <option value="{{ $cat->id }}">
                                                @if (!empty($cat->translation->name))
                                                    {{ $cat->translation->name }}@else{{ $cat->name }}
                                                @endif
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group" style="display: flex; align-items: center;">
                                <label class="col-sm-2 control-label">@lang('site.salePercentege')</label>
                                <div class="col-sm-10">
                                    <div>
                                    <div class="form-check" style="display: inline;">
                                        <input class="btn-check " type="radio" value="1" name="sale_percentage_type"
                                           >
                                        <label class="form-check-label " >
                                            @lang('site.percent_discount')
                                        </label>
                                        <div class="form-check" style="display: inline;">
                                        <input class="btn-check " type="radio" value="2" name="sale_percentage_type"">
                                        <label class="form-check-label " >
                                            @lang('site.value_discount')
                                        </label>

                                    </div>
                                    </div>

                                    </div>
                              
                                   
                                    <input type="number" placeholder="@lang('site.salePercentege')" required
                                        min="0" max="100" class="form-control" name="tax_percentage"
                                        value="{{ old('tax_percentage') }}">
                                    
                                    </div>
                            </div>
                            <div class="form-group"><label class="col-sm-2 control-label">@lang('site.pquantity')</label>
                                <div class="col-sm-10"><input type="number" placeholder="@lang('site.pquantity')" required
                                        min="0" max="1000" class="form-control" name="quantity"
                                        value="{{ old('quantity') }}"></div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-4 col-sm-offset-2">
                                    <div class="form-check">
                                        <input class="btn-check " type="checkbox" value="1" name="enable"
                                            id="enable">
                                        <label class="form-check-label " for="enable">
                                            @lang('site.Enable')
                                        </label>

                                    </div>
                                </div>

                            </div>


                            <div class="form-group" id="hairTypeshow">
                                <label class="col-sm-2 control-label">@lang('site.hairType')</label>
                                <div class="col-sm-10">
                                    <select class="form-control" id="hairType" name="hairType">

                                        <option value="0">مصبوغ او طبيعي</option>
                                        <option value="1">مسحوب لونه</option>
                                    </select>
                                </div>
                            </div>



                            <div class="form-group" id="price_div">
                                <label for="input-Default" class="col-sm-2 control-label">@lang('site.Price1')</label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control price_title" id="" name="title[]"
                                        placeholder="@lang('site.title')">
                                </div>

                                <div class="no-padding-l col-sm-2">
                                    <input type="text" class="form-control price_code" id="" name="code[]"
                                        placeholder="@lang('site.code')" required>
                                </div>

                                <div class="col-sm-2">
                                    <input type="text" class="form-control price_amt" id="" name="price[]"
                                        placeholder="@lang('site.price')">
                                </div>

                                <div class="col-sm-2">
                                    <input type="button" name="add_row" id="add_row" class="uibutton"
                                        value="More" />
                                </div>

                            </div>

                            <input type="hidden" name="price_counter" value="1" id="counter">
                            <div id="new_row"> </div>





                            <div class="hr-line-dashed">

                            </div>

                            <input type="file" name="cexpirence[]" multiple />


                            <div class="form-group">
                                <div class="col-sm-4 col-sm-offset-2">

                                    <a class="btn btn-white" href="{{ url('products') }}">@lang('site.cancel')</a>
                                    <button class="btn btn-primary" type="submit">@lang('site.save')</button>
                                </div>
                            </div>


                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <form id="uploadimage" action="" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="cropped_value" id="cropped_value" value="">

                    <label title="Upload image file" for="inputImage" class="">

                        <div class="upload-pic img-circle" style="">
                            <img id="image_source" class="img-circle" src="{{ asset('uploads/product_logo.png') }}"
                                alt="">

                        </div>
                        <div class="upload-pic-new btn btn-primary text-center">
                            <input type="file" name="file" id="cropper" style="display:none" />
                            <label for="cropper">
                                <div class="pic-placeholder">

                                    <span class="upload_button"> <i class="fa fa-picture-o"></i>
                                        @lang('site.Upload_Photo') </span>
                                </div>
                            </label>
                        </div>

                </form>
            </div>
        </div>
    </div>

    <style>
        .cropper-container.cropper-bg {
            background: #fff !important;
            background-image: none !important;
        }

        .cropper-modal {
            opacity: .5;
            background-color: #fff;
        }

        .upload-pic {
            height: 200px;
            width: 200px;
            background: #ccc;
            margin: 10px;
        }

        .upload_button {
            margin-top: 10px;
        }
    </style>

    <script>
        $(document).ready(function() {
            // Confirm Delete.
            $("#new_row").on('click', ".remove_field", function() {
                $(this).parent('div').remove();
            });

            $("body").on("click", "#add_row", function() {
                var counter = $("#counter").val();
                counter = parseInt(counter) + 1;

                var new_field =
                    ' <div class="form-group"> <label for="input-Default" class="col-sm-2 control-label">@lang('site.price') ' +
                    counter + '</label>';
                new_field +=
                    ' <div class="col-sm-3"><input type="text" class="form-control price_title" id="" name="title[]" placeholder="@lang('site.title')"></div>';
                new_field +=
                    ' <div class="no-padding-l col-sm-2"><input type="text" class="form-control price_code" id="" name="code[]" placeholder="@lang('site.code')" required> </div>';
                new_field +=
                    ' <div class="col-sm-2"> <input type="text" class="form-control price_amt" id="" name="price[]" placeholder="@lang('site.price')"> </div>';
                new_field += ' <a href="javascript:void(0)" id="' + counter +
                    '" class="remove_field">Remove</a>  </div>';
                $("#new_row").append(new_field);
                $("#counter").val(counter);
            });
            $("#category_id").change(function(e) {
                console.log(e.val);
            })

            //$('#related_items').multiSelect();
        });
    </script>
@endsection
