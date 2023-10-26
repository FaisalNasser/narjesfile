@extends('layouts.app')

@section('content')
<?php 
$currency =  setting_by_key("currency");
?>
 <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>@lang('site.DebitOrders')</h5>
                        
                    </div>
                    <div class="ibox-content">

                        <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>@lang('site.name')</th>
                            <th>@lang('site.phone')</th>
                            <th>@lang('site.Comment')</th>
                            <th>@lang('site.cart_items')</th>
                             <th>@lang('site.amount')</th>
                              <th>@lang('site.total_given')</th>
                              <th>@lang('site.total_card')</th>
                               <th>@lang('site.change')</th>
                               <th>@lang('site.discount')</th>
                                   <th>@lang('site.type')</th>
                            <th>@lang('site.status')</th>
							
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @if (!empty($orders))
                        @forelse ($orders as $key => $sale)
                            <tr class="holdt">
                               <td>{{ $key + 1 }}</td>
                               <td>@if(!empty($sale->client->name)) {{ $sale->client->name}}@endif</td>
                               <td>@if(!empty($sale->client->phone)) {{ $sale->client->phone}}@endif</td>
                               <td>{{ $sale->comment }}</td>
                               <?php $cart = json_decode($sale->cart); ?>
                               <td> @if (!empty($cart)) @foreach($cart as $row) {{$currency}} {{$row->name . ": " . $row->price}} <br> @endforeach  @endif </td>
                               <td>{{ $sale->amount }}</td>
                               <td>{{ number_format($sale->total_given, 2) }}</td>
                               <td>{{ number_format($sale->total_card, 2) }}</td>
                               <td>{{ $sale->changing }}</td>
                               <th>{{ $sale->discount }}</th>

                                 <td>
                                     @if( $sale->type == "pos") @lang('site.order_store') @endif
                                     @if( $sale->type == "order") @lang('site.order_home') @endif
                                     </td>
                                <td>
								
                                    <a href="{{url('sales/create?debit_id=' . $sale->id)}}" class="btn btn-warning btn-xs pull-right">@lang('site.Edit')</a>
                                     
                                   <a data-id="{{$sale->id}}" class="deleteDebitOrder btn btn-danger btn-xs pull-right">@lang('site.delete')</a>
                                   <a  href="{{url('sales/debit/' . $sale->id)}}" class=" btn btn-warning btn-xs pull-right">@lang('site.show')</a>

                                </td>
                            </tr>
                        @empty
                           <tr> 
						  <td colspan="5">
								 @lang('site.no_record_found')
									
                                </td>
								</tr>
                        @endforelse
                    @endif
                    </tbody>
                </table>
				{!! $orders->render() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
<script>
    $("body").on("click",".deleteDebitOrder", function() {
				// $(this).parent(".holdt").remove();
				
				var form_dataa = {
					id:$(this).attr("data-id"),
				
				}
				console.log(form_dataa)
			
				$.ajax( {
					type: 'POST',
					headers: {
						'X-CSRF-TOKEN': $( 'meta[name="csrf-token"]' ).attr( 'content' )
					},
					url: '<?php echo url("sale/debit_order_remove"); ?>',
					data: form_dataa,
					success: function ( msg ) {
						location.reload();
					}
				});
				
});
 
</script>

@endsection