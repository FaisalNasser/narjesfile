@extends('layouts.app')

@section('content')


<!-- Image cropper -->

<!-- include summernote css/js -->
<!-- <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script> -->
	
    <!-- <script>
        $(document).ready(function(){

            $('.summernote').summernote();

       });
        var edit = function() {
            $('.click2edit').summernote({focus: true});
        };
        var save = function() {
            var aHTML = $('.click2edit').code(); //save HTML If you need(aHTML: array).
            $('.click2edit').destroy();
        };
    </script> -->
	<script src="https://cdn.tiny.cloud/1/0garagelkzdv3wp9gvsbauyr1lw5s77506fyyiwdu67el6ny/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    tinymce.init({
        selector: 'textarea'
    });
</script>

			<div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>@lang('site.Add_Page')</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="{{url('/')}}">@lang('site.home')</a>
                        </li>
                        <li>
                             <a href="{{url('pages')}}">@lang('site.pages')</a>
                        </li>
                        <li class="active">
                            <strong><?php echo $title; ?></strong>
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
                            <h5>@lang('site.Add_Product')</h5>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                                
                                
                            </div>
                        </div>
                        <div class="ibox-content">
                        <form action="{{ url('pages/save') }}" class="form-horizontal" method="POST" enctype='multipart/form-data'>
                        {{ csrf_field() }}
                                <div class="form-group"><label class="col-sm-2 control-label">Title</label>
                                    <div class="col-sm-10"><input placeholder="@lang('site.title')" type="text" required name="title" value="{{$page->title}}" class="form-control">
                        <input type="hidden" value="<?php echo $page->id; ?>" name="id" >
                        </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                
                               <div class="form-group"><label class="col-sm-2 control-label">@lang('site.description')</label>
                                    <div class="col-sm-10"><textarea name="body" class="form-control summernote" placeholder="@lang('site.description_here')" rows="10"><?php echo $page->body; ?></textarea></div>
                                </div>
                                
                                <div class="hr-line-dashed"></div>
                                
                               <div class="form-group"><label class="col-sm-2 control-label">@lang('site.Image')</label>
                                    <div class="col-sm-10"><input type="file" name="file" accept=".png, .jpg, .jpeg"  ></div>
                                </div>
                                <div class="hr-line-dashed"></div>

                                
                                <div class="form-group">
                                    <div class="col-sm-4 col-sm-offset-2">
                                        
                                         <a class="btn btn-white" href="{{ url('pages') }}">@lang('site.cancel')</a>
                                        <button class="btn btn-primary" type="submit">@lang('site.Save_changes')</button>
                                    </div>
                                </div>
                                
                                
                            </form>
                        </div>
                    </div>
                </div>
        </div>
    </div>

@endsection

