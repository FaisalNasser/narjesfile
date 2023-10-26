@extends('layouts.app')

@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>@lang('site.order_board')</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="index.html">@lang('site.home')</a>
                        </li>

                        <li class="active">
                            <strong>@lang('site.order_board')</strong>
                        </li>
                    </ol>
                </div>
                <div class="col-lg-2">

                </div>
            </div>

        <div class="wrapper wrapper-content  animated fadeInRight">
            <div class="row">
                <div class="col-lg-3">
                    <h3 class="comingOrder">@lang('site.new_orders')</h3>
                    <div class="ibox">
                        <div class="ibox-content">
                            <ul class="sortable-list connectList agile-list" id="incomplete">
                                @foreach($incomplete as $order)
                                        <li class="warning-element" id="{{$order->id}}" data-name="{{$order->name}}" data-phone="{{$order->phone}}" data-table_id="{{$order->table_id}}" data-email="{{$order->email}}" data-address="{{$order->address}}" data-comment="{{$order->comment}}" data-id="{{$order->id}}" data-receive_type= "{{$order->receive_type}}" data-time= "{{$order->time}}">
                                        @foreach($order->items as $item)
                                            @if(!empty($item->translation->name))
                                                <span class="orderPage-list">{{ $item->translation->name }}{{--({{substr($item->size , 0, 1)}})--}}<span class="pull-right"> {{$item->quantity}}</span></span><br>
                                                @elseif(!empty($item->product->name))
                                                <span class="orderPage-list">{{ $item->product->name }}{{--({{substr($item->size , 0, 1)}})--}}<span class="pull-right"> {{$item->quantity}}</span></span><br>

                                            @endif
                                        @endforeach
                                        <hr>
                                            <div class="agile-detail">
                                                <i class="fa fa-clock-o"></i> {{time_elapsed_string($order->created_at)}}
                                                @if ( Config::get('app.locale') == 'ar')
                                                <span style="float:left">@lang('site.invoice_no'): {{str_pad($order->id, 4, '0', STR_PAD_LEFT)}}</span>
                                                @else
                                                <span style="float:right">@lang('site.invoice_no'): {{str_pad($order->id, 4, '0', STR_PAD_LEFT)}}</span>
                                                @endif
                                            </div>




                                        </li>

                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3">
                    <h3 class="comingOrder">@lang('site.inProgress')</h3>
                    <div class="ibox">
                        <div class="ibox-content">
                            <ul class="sortable-list connectList agile-list" id="inprogress">

								@if(!empty($inprogress))
                                    @foreach($inprogress as $order)

                                            <li class="warning-element" id="{{$order->id}}" data-name="{{$order->name}}" data-phone="{{$order->phone}}" data-table_id="{{$order->table_id}}" data-email="{{$order->email}}" data-address="{{$order->address}}" data-comment="{{$order->comment}}" data-id="{{$order->id}}" data-receive_type= "{{$order->receive_type}}" data-time= "{{$order->time}}">
                                            @foreach($order->items as $item)
                                               @if(!empty($item->translation->name))
                                                    <span class="orderPage-list">{{ $item->translation->name }}{{--({{substr($item->size , 0, 1)}})--}}<span class="pull-right"> {{$item->quantity}}</span></span><br>
                                                 @elseif(!empty($item->product->name))
                                                    <span class="orderPage-list">{{ $item->product->name }}{{--({{substr($item->size , 0, 1)}})--}}<span class="pull-right"> {{$item->quantity}}</span></span><br>
                                                @endif
                                            @endforeach
                                            <hr>
                                                <div class="agile-detail">
                                                    <i class="fa fa-clock-o"></i> {{time_elapsed_string($order->created_at)}}
                                                    @if ( Config::get('app.locale') == 'ar')
                                                    <span style="float:left">@lang('site.invoice_no'): {{str_pad($order->id, 4, '0', STR_PAD_LEFT)}}</span>
                                                    @else
                                                    <span style="float:right">@lang('site.invoice_no'): {{str_pad($order->id, 4, '0', STR_PAD_LEFT)}}</span>
                                                    @endif
                                                </div>




                                            </li>

                                    @endforeach
								@endif
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-lg-2">
                    <h3 class="comingOrder">@lang('site.indelivery')</h3>
                    <div class="ibox">
                        <div class="ibox-content">
                            <ul class="sortable-list connectList agile-list" id="indelivery">

								@if(!empty($indelivery))
                                    @foreach($indelivery as $order)

                                            <li class="warning-element" id="{{$order->id}}" data-name="{{$order->name}}" data-phone="{{$order->phone}}" data-table_id="{{$order->table_id}}" data-email="{{$order->email}}" data-address="{{$order->address}}" data-comment="{{$order->comment}}" data-id="{{$order->id}}" data-receive_type= "{{$order->receive_type}}" data-time= "{{$order->time}}">
                                            @foreach($order->items as $item)
                                                @if(!empty($item->translation->name))
                                                    <span class="orderPage-list">{{ $item->translation->name }}{{--({{substr($item->size , 0, 1)}})--}}<span class="pull-right"> {{$item->quantity}}</span></span><br>
                                                    @elseif(!empty($item->product->name))
                                                    <span class="orderPage-list">{{ $item->product->name }}{{--({{substr($item->size , 0, 1)}})--}}<span class="pull-right"> {{$item->quantity}}</span></span><br>
                                                @endif
                                            @endforeach
                                            <hr>
                                                <div class="agile-detail">
                                                    <i class="fa fa-clock-o"></i> {{time_elapsed_string($order->created_at)}}
                                                    @if ( Config::get('app.locale') == 'ar')
                                                    <span style="float:left">@lang('site.invoice_no'): {{str_pad($order->id, 4, '0', STR_PAD_LEFT)}}</span>
                                                    @else
                                                    <span style="float:right">@lang('site.invoice_no'): {{str_pad($order->id, 4, '0', STR_PAD_LEFT)}}</span>
                                                    @endif
                                                </div>




                                            </li>

                                    @endforeach
								@endif
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2">
                    <h3 class="completeOrder">@lang('site.completed')</h3>
                    <div class="ibox">
                        <div class="ibox-content">
                             <ul class="sortable-list connectList agile-list" id="completed">

								@foreach($completed as $order)
                                    @if(true) {{-- !empty($order->name) --}}
                                        <li class="success-element" id="{{$order->id}}" data-name="{{$order->name ?? ''}}" data-phone="{{$order->phone}}" data-table_id="{{$order->table_id}}" data-email="{{$order->email}}" data-address="{{$order->address}}" data-comment="{{$order->comment}}" data-id="{{$order->id}}" data-receive_type="{{$order->receive_type}}" data-time= "{{$order->time}}">
                                        @foreach($order->items as $item)
                                            @if(!empty($item->translation->name))
                                                                <span class="orderPage-list">{{ $item->translation->name }}{{--({{substr($item->size , 0, 1)}})--}}<span class="pull-right"> {{$item->quantity}}</span></span><br>
                                                            @elseif(!empty($item->product->name))
                                            <span class="orderPage-list">{{ $item->product->name }}{{--({{substr($item->size , 0, 1)}})--}}<span class="pull-right"> {{$item->quantity}}</span></span><br>
                                            @endif
                                        @endforeach
                                        <hr>
                                            <div class="agile-detail">
                                                <i class="fa fa-clock-o"></i> {{time_elapsed_string($order->created_at)}}
                                                @if ( Config::get('app.locale') == 'ar')
                                                <span style="float:left">@lang('site.invoice_no'): {{str_pad($order->id, 4, '0', STR_PAD_LEFT)}}</span>
                                                @else
                                                <span style="float:right">@lang('site.invoice_no'): {{str_pad($order->id, 4, '0', STR_PAD_LEFT)}}</span>
                                                @endif
                                            </div>
                                        </li>
                                    @endif
                                @endforeach

                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2">
                    <h3 class="cancelOrder">@lang('site.cancelled')</h3>
                    <div class="ibox">
                        <div class="ibox-content">

                            <ul class="sortable-list connectList agile-list" id="canceled">

                                    @foreach($canceled as $order)

                                            <li class="danger-element" id="{{$order->id}}" data-name="{{$order->name}}" data-phone="{{$order->phone}}" data-table_id="{{$order->table_id}}" data-email="{{$order->email}}" data-address="{{$order->address}}" data-comment="{{$order->comment}}" data-id="{{$order->id}}" data-receive_type="{{$order->receive_type}}" data-time= "{{$order->time}}">
                                            @foreach($order->items as $item)
                                                @if(!empty($item->translation->name))
                                                                    <span class="orderPage-list">{{ $item->translation->name }}{{--({{substr($item->size , 0, 1)}})--}}<span class="pull-right"> {{$item->quantity}}</span></span><br>
                                                                @elseif(!empty($item->product->name))
                                                <span class="orderPage-list">{{ $item->product->name }}{{--({{substr($item->size , 0, 1)}})--}}<span class="pull-right"> {{$item->quantity}}</span></span><br>
                                                @endif
                                            @endforeach
                                            <hr>
                                                <div class="agile-detail">
                                                    <i class="fa fa-clock-o"></i> {{time_elapsed_string($order->created_at)}}
                                                    @if ( Config::get('app.locale') == 'ar')
                                                            <span style="float:left">@lang('site.invoice_no'): {{str_pad($order->id, 4, '0', STR_PAD_LEFT)}}</span>
                                                            @else
                                                            <span style="float:right">@lang('site.invoice_no'): {{str_pad($order->id, 4, '0', STR_PAD_LEFT)}}</span>
                                                            @endif
                                                </div>
                                            </li>

                                    @endforeach

                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h3 id="myModalLabel"> @lang('site.order_detail') </h3>
        </div>
        <div class="modal-body" >
                <div class="col-sm-12" style="direction :rtl;">
                        <div class="col-sm-12 form-group">
                            <label>@lang('site.name'): <span id="name_order">  </span></label>
                        </div>
                        <div class="col-sm-12 form-group">
                            <label>@lang('site.email'): <span id="email_order">  </span></label>
                        </div>
                        <div class="col-sm-12 form-group">
                            <label>@lang('site.phone'): <span id="phone_order">  </span></label>
                        </div>
                        <div class="col-sm-12 form-group">
                            <label>@lang('site.table_id'): <span id="table_id">  </span></label>
                        </div>
                        <div id="address_div" class="col-sm-12 form-group">
                            <label>@lang('site.address'): <span id="address_order">  </span></label>
                        </div>
                        <div class="col-sm-12 form-group">
                            <label>@lang('site.Comment'): <span id="message_order">  </span></label>
                        </div>
                        <div class="col-sm-12 form-group">
                            <label>@lang('site.receipt_type'): <span id="receipt_type">  </span></label>
                        </div>
                        <div id="time_div" class="col-sm-12 form-group">
                            <label>@lang('site.time'): <span id="time">  </span></label>
                        </div>

						<div class="col-sm-12 form-group">
                           <a target="_blank" href="javascript:void(0)" id="href_link" class="btn btn-primary"> @lang('site.order_detail')</a>
                        </div>
                </div>


        <div class="modal-footer">

        </div>
      </div>
    </div>
  </div>
  </div>
        <script src="{{asset('adminpanel/assets/js/jquery-ui-1.10.4.min.js')}}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.3/jquery.ui.touch-punch.min.js" integrity="sha512-0bEtK0USNd96MnO4XhH8jhv3nyRF0eK87pJke6pkYf3cM0uDIhNJy9ltuzqgypoIFXw3JSuiy04tVk4AjpZdZw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
		<script>

		$("body").on("click" , ".danger-element , .warning-element, .success-element " , function() {
			$("#name_order").html($(this).attr("data-name"));
			$("#email_order").html($(this).attr("data-email"));
			$("#phone_order").html($(this).attr("data-phone"));
			$("#table_id").html($(this).attr("data-table_id"));
			$("#address_order").html($(this).attr("data-address"));
			$("#message_order").html($(this).attr("data-comment"));

            if($(this).attr("data-receive_type") == "inHome"){
			    $("#address_div").show();
			    $("#time_div").hide();
                $("#receipt_type").html("@lang('menu.home')");
            }
            if($(this).attr("data-receive_type") == "inRestaurant"){
                var time = $(this).attr("data-time");

			    $("#address_div").hide();
			    $("#time_div").show();
                $("#receipt_type").html("@lang('menu.restaurant')");

                if(time == 'quarter_hour'){
                    $("#time").html("@lang('menu.quarter_hour')");
                }
                if(time == 'half_hour'){
                    $("#time").html("@lang('menu.half_hour')");
                }
                if(time == 'one_hour'){
                    $("#time").html("@lang('menu.one_hour')");
                }
                if(time == 'tow_hour'){
                    $("#time").html("@lang('menu.tow_hour')");
                }
                if(time == 'three_hour'){
                    $("#time").html("@lang('menu.three_hour')");
                }
            }

			$("#href_link").attr("href" , "<?php echo url('reports/sales/') ?>/" + $(this).attr("data-id"));
			$("#myModal").modal("show");
		});

        $(document).ready(function(){

            $("#incomplete, #canceled, #completed,#indelivery,#inprogress").sortable({
                connectWith: ".connectList",
                update: function( event, ui ) {

                    var incomplete = $( "#incomplete" ).sortable( "toArray" );
                    var canceled = $( "#canceled" ).sortable( "toArray" );
                    var completed = $( "#completed" ).sortable( "toArray" );
                    var indelivery = $( "#indelivery" ).sortable( "toArray" );
                    var inprogress = $( "#inprogress" ).sortable( "toArray" );
					$.ajax({
						method: "POST",
						headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
						url: "{{ url('orders/save') }}",
                        data: {
                            incomplete: incomplete,
                            canceled: canceled,
                            inprogress: inprogress,
                            indelivery: indelivery,
                            completed: completed
                        }
                    }).fail(function(jqXHR, textStatus, errorThrown){
                        $("active_msg").html("Unable to save active list order: " + errorThrown);

                    });
                    setTimeout(() => {
                        // location.reload();
                    }, 500);


                    //$('.output').html("ToDo: " + window.JSON.stringify(todo) + "<br/>" + "In Progress: " + window.JSON.stringify(inprogress) + "<br/>" + "Completed: " + window.JSON.stringify(completed));
                }
            }).disableSelection();

        });
    </script>



@endsection
