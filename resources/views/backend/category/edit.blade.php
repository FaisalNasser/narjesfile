@extends('layouts.app')

@section('content')
@include("backend.category/cropper")
<div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>@lang('site.edit') @lang('site.category')</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="{{url('')}}">>@lang('site.home')<</a>
                        </li>
                        <li>
                             <a href="{{url('categories')}}">@lang('site.categories')</a>
                        </li>
                        <li class="active">
                            <strong>@lang('site.edit') @lang('site.category')</strong>
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
                            <h5>@lang('site.edit') @lang('site.category')</h5>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                                
                                
                            </div>
                        </div>
						<div class="ibox-content">
						<form action="{{ url('categories/'  . $category->id) }}" class="form-horizontal" method="POST" enctype='multipart/form-data'>
                        <input type="hidden" name="_method" value="put">
                        {{ csrf_field() }}
								 <div class="form-group"><label class="col-sm-2 control-label">@lang('site.name')</label>
                                    <div class="col-sm-10"><input type="text" class="form-control" id="name" name="name" value="@if(!empty($category->translation->name)){{ $category->translation->name }}@else{{ $category->name }}@endif"></div>
                                </div>

                                <div class="form-group"><label class="col-sm-2 control-label">@lang('Icon')</label>
                                    <div class="col-sm-10">
                                      
                                    <textarea class="form-control" id="icon" name="icon"  id="" cols="30" rows="10">
                                        {{ $category->icon }}
                                    </textarea>
                                    </div>
                                </div>
                                  @if ($category->enable == 1)
                               <div class="form-group">
                                <div  class="col-sm-4 col-sm-offset-2">
                                    <div class="form-check">
                                        <input hidden  name="enable" id="enable" value="{{$category->enable}}"/>
                                        <input class="btn-check " type="checkbox" value="1" checked  id="enablep"  />
                                        <label class="form-check-label " for="enable">
                                          @lang('site.Enable')
                                        </label>
                                       
                                      </div>
                                </div>
                               
                            </div>
                               @else
                               <div class="form-group">
                                <div  class="col-sm-4 col-sm-offset-2">
                                    <div class="form-check">
                                             <input hidden  name="enable" id="enable" value="{{$category->enable}}"/>

                                        <input class="btn-check " type="checkbox" value="1"   id="enablep">
                                        <label class="form-check-label " for="enable">
                                          @lang('site.Enable')
                                        </label>
                                       
                                      </div>
                                </div>
                               
                            </div>
                               @endif
						<div class="hr-line-dashed"></div>
								 <div class="form-group">
                                    <div class="col-sm-4 col-sm-offset-2">
                                        
										 <a class="btn btn-white" href="{{ url('categories') }}">@lang('site.cancel')</a>
                                        <button class="btn btn-primary" type="submit"> @lang('site.save')</button>
                                    </div>
                                </div>
								
								
                            </form>
                        </div>
                    </div>
                </div>
				<div class="col-lg-4">
                    <form id="uploadimage" action="" method="post" enctype="multipart/form-data">
                <input type="hidden" name="cropped_value" id="cropped_value" value="">
                <input type="hidden" name="image_edit" id="image_edit" value="{{$category->id}}">
                    
                <label title="Upload image file" for="inputImage" class="">
                
                     <div class="upload-pic " style="">
                        <img id="image_source"  src="<?php echo url("uploads/category/thumb/" . $category->id . ".jpg?rand=".rand(0, 100)); ?>">
                    </div>
                   <div class="upload-pic-new btn btn-primary text-center">
                        <input type="file"  name="file" id="cropper" style="display:none" />
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
  background-image:none !important;
}

.cropper-modal {
    opacity: .5;
    background-color: #fff;
}

.upload-pic { 
    height:200px;
    width:200px; 
    background:#ccc;
    margin:10px;
}

.upload_button { 
    margin-top:10px;
}
</style>
<script>
    $('#enablep').change(function () {
    if ($(this).prop("checked")) {
        // checked
        $('#enable').val(1);
        return;
    }
     $('#enable').val(0);
    // not checked
});
</script>

@endsection
