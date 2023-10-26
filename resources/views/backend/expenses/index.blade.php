@extends('layouts.app')

@section('content')
<?php $currency =  setting_by_key("currency"); ?>

 <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>@lang('site.expenses')</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="{{url('/')}}">@lang('site.home')</a>
                        </li>
                     
                        <li class="active">
                            <strong>@lang('site.expenses')</strong>
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
                        <h5>@lang('site.expenses')	</h5>
                        <div class="ibox-tools">
                        <a class="add_new btn btn-primary pull-right" href="javascript:void(0)" data-toggle="modal" data-target="#myModal" style="margin-bottom:5px"><i class="fa fa-plus"> </i> @lang('site.add')</a>
                        
                         
                          
                           
                        </div>
                    </div>
                    

<div class="ibox-content">
           
            <div class="table-responsive">
            <table class="table table-striped">
            <thead>
                <tr>

                    <th>@lang('site.title')</th>
                    <th>@lang('site.price')</th>
                    <th>@lang('site.description')</th>
                    <th>@lang('site.paym_methode')</th>

                    <th>@lang('site.options')</th>
                </tr>
            </thead>
            <tbody>
                <?php if(!empty($expenses)) { foreach ($expenses as $row) { ?>
                    <tr id="{{$row->id}}">

                         <td>{{$row->title}}</td>
                         <td>{{$currency}}{{$row->price}}</td>
                         <td>{{$row->description}}</td>
                                                  <td>{{$row->paym_methode}}</td>
                         <td> 
                            <a data-id="{{$row->id}}" class="edit" href="javascript:void(0)" data-toggle="modal" data-target="#myModal"> <i class="fa fa-edit"> </i> </a>
                            <a data-id="{{$row->id}}" class="delete" href="javascript:void(0)" > <i class="fa fa-trash"> </i> </a> 
                        </td>
                    </tr>
                <?php } 
                } else {  ?>
                <tr>
                    <td rowspan="5">@lang('site.no_record_found') </td>
                </tr>
<?php } ?>

            </tbody>
        </table>
		{!! $expenses->render() !!}
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
                <h4 class="modal-title" id="myModalLabel">Add New</h4>
            </div>
            <form role="form" action="<?php echo url("expenses/save"); ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    {!! csrf_field() !!} 

                    <div class="form-group">
                        <label> @lang('site.name') </label>
                        <input class="form-control" required type="text" id="title" name="title">
                        <input class="form-control" type="hidden" id="id" name="id">
                    </div>
                    
					
					<div class="form-group">
                        <label> @lang('site.description') </label>
                        <textarea class="form-control" id="description" name="description"></textarea>
                    </div>
                    
					<div class="form-group">
                        <label> @lang('site.Expense_Amount') </label>
                        <input class="form-control" type="number" id="price" name="price">
                    </div>
                   <div class="form-group">
                        <label> @lang('site.paym_methode') </label>
                        <select class="form-control" id="paym_methode" name="paym_methode">
                            <option value="Cash" >Cash</option>
                            <option value="Bank" >Bank</option>

                        </select>
                        <!--<input class="form-control" id="paym_methode" name="paym_methode">-->
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">@lang('site.Close')</button>
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
        $("#description").val("");
        $("#price").val("");
        $("#id").val("");
        $("#paym_methode").val("");

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
            url: '<?php echo url("expenses/get"); ?>',
            data: form_data,
            success: function (msg) {
                var obj = $.parseJSON(msg);
                $("#title").val(obj['title']);
                $("#description").val(obj['description']);
                $("#price").val(obj['price']);
                $("#id").val(obj['id']);
                $("#paym_methode").val(obj['paym_methode']);

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
            url: '<?php echo url("expenses/delete"); ?>',
            data: form_data,
            success: function (msg) {
                $("#" + id).hide(1);
            }
        });
    });

</script>



@endsection
