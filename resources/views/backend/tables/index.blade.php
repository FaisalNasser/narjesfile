@extends('layouts.app')

@section('content')
<?php $currency =  setting_by_key("currency");  
    if(request()->get("svg")) { 
        $data = $_POST["post_data"];

        print_r($data); exit;
        $file = "diagram.svg";

        header('Content-type: image/svg+xml');
        header("Content-Disposition: attachment; filename=$file");

        echo('<?xml version="1.0" encoding="iso-8859-1"?>' . "\n"); 
        echo('<!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 20000303 Stylable//EN" "http://www.w3.org/TR/2000/03/WD-SVG-20000303/DTD/svg-20000303-stylable.dtd">' . "\n");  
        echo $data;
    }
?>  
 <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>@lang('site.tables')</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="{{url('/')}}">@lang('site.home')</a>
                        </li>
                     
                        <li class="active">
                            <strong>@lang('site.tables')</strong>
                            {{-- <strong>@lang('site.expenses')</strong> --}}
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
                        <a class="add_new btn btn-primary pull-right" href="javascript:void(0)" data-toggle="modal" data-target="#myModal" style="margin-bottom:15px"><i class="fa fa-plus"> </i> @lang('site.add')</a>
                        </div>
                    </div>
                    

<div class="ibox-content">
           
            <div class="table-responsive">
            <table class="table table-striped">
            <thead>
                <tr>

                    <th>@lang('site.id')</th>
                    <th>@lang('site.barcode')</th>
                    <th>@lang('site.options')</th>
                </tr>
            </thead>
            <tbody>
                <?php if(!empty($tables)) { foreach ($tables as $row) { ?>
                    @if($row->id != 0)
                    <tr id="{{$row->id}}">
                         <td>{{$row->table_name}}</td>
                        
                        <td>
                        
 <?php if(is_numeric($row->table_name)) { ?>     
 
   <span width="100px" class="live_svg"> {!! QrCode::format('svg')
                            ->size(100)->errorCorrection('H')
                            ->generate(url('our-menu').'/'.$row->table_name) !!} </span>
 <?php } ?>
              
                           </td>
                         <td> 
                            <form  action="{{ url('tables/download/' . $row->id) }}" method="POST" class="form-inline">
                                    {{ csrf_field() }}
                                  
                                    <input type="submit" value="download" class="btn btn-danger btn-xs pull-right "/>
                                </form>
                            <a data-id="{{$row->id}}" class="edit" href="javascript:void(0)" data-toggle="modal" data-target="#myModal"> 
                            <i class="fa fa-edit"> </i> </a>
                            <a data-id="{{$row->id}}" class="delete" href="javascript:void(0)" > <i class="fa fa-trash "> </i> </a> 
                            
                        </td>
                       
                       
                    </tr>
                    @endif
                <?php } 
                } else {  ?>
                <tr>
                    <td rowspan="5">@lang('site.no_record_found') </td>
                </tr>
<?php } ?>

            </tbody>
        </table>
		{!! $tables->render() !!}
    </div>
    <!-- /.table-responsive -->
</div>
</div>
</div>
</div>
</div>

<script>
// Submit the form with post data
function DoSubmit(){
  document.myform.post_data.value = $('.live_svg').html();
  return true;
}
</script>

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
            <form role="form" action="<?php echo url("tables/save"); ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    {!! csrf_field() !!} 

                    <div class="form-group">
                        <label> @lang('site.Table_number') </label>

                        <input class="form-control" required type="text" id="title" name="table_name">
                        <span>@lang('site.please_just_add_table_number')</span>
                        <input class="form-control" type="hidden" id="id" name="id">
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
        $("#title").val("");
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
            url: '<?php echo url("tables/get"); ?>',
            data: form_data,
            success: function (msg) {
                var obj = $.parseJSON(msg);
                $("#title").val(obj['table_name']);
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
            url: '<?php echo url("tables/delete"); ?>',
            data: form_data,
            success: function (msg) {
                $("#" + id).hide(1);
            }
        });
    });
 $("body").on("click", ".download", function () {
        var id = $(this).attr("data-id");
        console.log(id)
        var form_data = {
            id: id
        };
        $.ajax({
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '<?php echo url("tables/download"); ?>',
            data: form_data,
            success: function (msg) {
            console.log(msg)
            }
        });
    });
</script>



@endsection
