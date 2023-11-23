@extends('layouts.app')

@section('content')
 <script src="{{url('assets/js/plugins/nestable/jquery.nestable.js')}}"></script>
 <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>@lang('site.Menu_list')</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="{{route('/')}}">@lang('site.home')</a>
                        </li>
                        
                        <li class="active">
                            <strong>@lang('site.Menu_list')</strong>
                        </li>
                    </ol>
                </div>
                <div class="col-lg-2">

                </div>
            </div>
        <div class="wrapper wrapper-content  animated fadeInRight">
            <div class="row">
                <div class="col-md-4">
                    <div id="nestable-menu">
                        <button type="button" data-action="expand-all" class="btn btn-white btn-sm">@lang('site.Expand_All')</button>
                        <button type="button" data-action="collapse-all" class="btn btn-white btn-sm">@lang('site.Collapse All')</button>
                    </div>
                    </div>
                </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="ibox ">
                        <div class="ibox-title">
                            <h5>@lang('site.Active_Menu')</h5>
                        </div>
                        <div class="ibox-content">

                            <p  class="m-b-lg">
                                <strong>@lang('site.Nestable')</strong>@lang('site.is_an_interactive')
                            </p>

                            <div class="dd" id="nestable">
			<div style="color:red" id="active_msg"> </div>
            <ol class="dd-list">
				<?php foreach($menus as $key=>$menu) { ?>
				
                <li class="dd-item" data-id="{{$menu->menu_id}}">
                    <div class="dd-handle">{{$menu->title}}</div>
					<?php if(!empty($menu->child)) foreach($menu->child as $child) { ?>
					<ol class="dd-list">
                        <li class="dd-item" data-id="{{$child->menu_id}}"><div class="dd-handle">{{$child->title}}</div></li>
                    </ol>
					<?php } ?>
                </li>
				
				<?php } ?>
            </ol>
        </div>
                          
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="ibox ">
                        <div class="ibox-title">
                            <h5>@lang('site.Inactive_Menu')</h5>
                        </div>
                        <div class="ibox-content">

                            <p class="m-b-lg">
                                @lang('site.Each_list_you_can_customize')
                            </p>

                           <div class="dd" id="nestable2">
		
			<div style="color:red" id="inactive_msg"> </div>
				
				
            <ol class="dd-list">
			<li class="dd-item" data-id="0">
                    <div class="dd-handle">@lang('site.Dont_Move')</div>
                </li>
				<?php foreach($pages as $page) {  ?>
                <li class="dd-item" data-id="{{$page->menu_id}}">
                    <div class="dd-handle">{{$page->title}}</div>
                </li>
                <?php } ?>
            </ol>
        </div>
                          
                        </div>

                    </div>
                </div>
            </div>
        </div>

<script>
$(document).ready(function()
{
    var updateOutput = function (e) {
        var list = e.length ? e : $(e.target), output = list.data('output');

        $.ajax({
            method: "POST",
			headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			},
            url: "<?php echo url('settings/menu/save'); ?>",
            data: {
                list: list.nestable('serialize')
            }
        }).fail(function(jqXHR, textStatus, errorThrown){
            $("active_msg").html("Unable to save active list order: " + errorThrown);
			
        });
		
		$("active_msg").html("Save Successfully");

    };
	
	
	var updateOutput1 = function (e) {
        var list = e.length ? e : $(e.target), output = list.data('output');

        $.ajax({
            method: "POST",
			headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			},
            url: "<?php echo url('settings/menu/save_removed'); ?>",
            data: {
                list: list.nestable('serialize')
            }
        }).fail(function(jqXHR, textStatus, errorThrown){
            $("inactive_msg").html("Unable to save inactive list order: " + errorThrown);
        });
		$("inactive_msg").html("Save Successfully");
    };
	
    // activate Nestable for list 1
    $('#nestable').nestable({
        group: 1,
		maxDepth:2
    })
    .on('change', updateOutput);
    // activate Nestable for list 2
    $('#nestable2').nestable({
        group: 1,
		maxDepth:1
    })
    .on('change', updateOutput1);
    // output initial serialised data
    updateOutput($('#nestable').data('output', $('#nestable-output')));
    updateOutput1($('#nestable2').data('output', $('#nestable2-output')));
    $('#nestable-menu').on('click', function(e)
    {
        var target = $(e.target),
            action = target.data('action');
        if (action === 'expand-all') {
            $('.dd').nestable('expandAll');
        }
        if (action === 'collapse-all') {
            $('.dd').nestable('collapseAll');
        }
    });
    $('#nestable3').nestable();
});
</script>

		
@endsection