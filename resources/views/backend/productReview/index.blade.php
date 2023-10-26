@extends('layouts.app')

@section('content')

 <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>@lang('site.title') </h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="{{url('/')}}">@lang('site.home')</a>
                        </li>
                     
                        <li class="active">
                            <strong>@lang('site.title')</strong>
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
                        <h5>@lang('site.title') </h5>
                        <div class="ibox-tools">
                        <a class="add_new btn btn-primary pull-right" href="javascript:void(0)" data-toggle="modal" data-target="#myModal" style="margin-bottom:5px"><i class="fa fa-plus"> </i> @lang('site.add')</a>
                        
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            
                          
                           
                        </div>
                    </div>
                    

<div class="ibox-content">
           
            <div class="table-responsive">
            <table class="table table-striped">
            <thead>
                <tr>

                    <th>@lang('site.Name')</th>
                    <th>@lang('site.Email')</th>
                    <th>@lang('site.Message')</th>
                    <th>@lang('site.options')</th>
                </tr>
            </thead>
            <tbody>
               @forelse ($reviews as $row)
                    <tr id="{{$row->id}}">

                        <td> {{$row->name}}</td>
                        <td>{{$row->email}}</td>
                        <td>{{$row->message}}</td>
                         <td> 
                            <a data-id="{{$row->id}}" class="edit" href="javascript:void(0)" data-toggle="modal" data-target="#myModal"> <i class="fa fa-edit"> </i> </a>
                            <a data-id="{{$row->id}}" class="delete" href="javascript:void(0)" > <i class="fa fa-trash "> </i> </a> 
                        </td>
                    </tr>
            
               @empty 
                <tr>
                    <td rowspan=4> @lang('site.No_Data') </td>
                </tr>

                @endforelse


            </tbody>
        </table>
    </div>
    <!-- /.table-responsive -->
</div>
</div>
</div>
</div>
</div>

<?php

function clean($string) 
{
    $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
    return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
}
?>




<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">@lang('site.add_new')</h4>
            </div>
            <form role="form" action="<?php echo url("reviews/addReview"); ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    {!! csrf_field() !!} 

                    <div class="form-group">
                        <label> Name</label>
                        <input class="form-control"  type="text" id="name" name="name">
                    </div>
                    <div class="form-group">
                        <label> Email</label>
                        <input class="form-control"  type="text" id="email" name="email">
                    </div>
                    <div class="form-group">
                        <label> Massege</label>
                        <input class="form-control" required type="text" id="message" name="message">
                    </div>
                    <div class="form-group">
                        <label> product</label>
                        <select class="form-control" id="productId" name="productId">
											@foreach($products as $cat)
											<option value="{{$cat->id}}">@if(!empty($cat->translation->name)){{ $cat->translation->name }}@else{{ $cat->name }}@endif</option>
											@endforeach
										</select>
                    </div>
                    
                    <div class="form-group">
                        <label> @lang('site.Image') </label>
                        <input type="file"  name="file" />
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">@lang('site.close')</button>
                    <button type="submit" class="btn btn-primary">@lang('site.Save_changes')</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<script type="text/javascript">
    $("body").on("click", ".add_new", function () {
        $("#name").val("");
        $("#name").val("");
        $("#id").val("");
    });
    $("body").on("click", ".edit", function () {
        var id = $(this).attr("data-id");
        var form_data = {
            id: id
        };
        $.ajax({
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '<?php echo url("slider/get"); ?>',
            data: form_data,
            success: function (msg) {
                var obj = $.parseJSON(msg);
                $("#title").val(obj['title']);
                $("#product_id").val(obj['product_id']);
                $("#id").val(obj['id']);
            }
        });

    });


    $("body").on("click", ".delete", function () {
        var id = $(this).attr("data-id");
        var form_data = {
            id: id
        };
        $.ajax({
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '<?php echo url("review/delete"); ?>',
            data: form_data,
            success: function (msg) {
                $("#" + id).hide(1);
            }
        });
    });

</script>



@endsection
