@extends('layouts.app')

@section('content')
<?php
$currency =  setting_by_key("currency");
// dd($currency)
?>
 <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>@lang('site.All_Sales')</h5>

                    </div>

                    <div class="ibox-content">
                        <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>@lang('site.Customers')</th>
                            <th>@lang('site.sales_date')</th>
                            <th>@lang('site.total_amount')</th>
                            <th>@lang('site.total_given')</th>
                            <th>@lang('site.total_card')</th>
                            <th>@lang('site.change')</th>
                            <th>@lang('site.discount')</th>
                            <th>@lang('site.Payment')</th>
                            <th>@lang('site.status')</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @if (!empty($sales))
                        @forelse ($sales as $key => $sale)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>@if(!empty($sale->customer['name'])) {{ $sale->customer['name'] }}@endif</td>
                                <td>{{ $sale->created_at->format('H:i d F Y') }}</td>
                                 <td>{{$currency}} {{ ($sale->amount )}}</td>
								<td>{{$currency}}  {{number_format($sale->total_given,2)}}</td>
								<td>{{$currency}}  {{number_format($sale->total_card,2)}}</td>
                                <td>{{$currency}}  {{number_format($sale->change,2)}}</td>
                                <td>{{$currency}}  {{number_format($sale->discount,2)}}</td>
                                <td class="grandtotalFont">
                                    <strong>
                                        @if ($sale->total_card > 0 && $sale->total_given > 0)
                                            @lang('slip.cash') - @lang('slip.card')
                                        @else
                                        <?php if ($sale->payment_with == "cash") { ?>
                                            @lang('slip.cash')
                                                <?php } else { ?>
                                                    @lang('slip.card')
                                                <?php } ?>
                                        @endif
                                    </strong>
                                </td>
                                @if($sale->status == 1)
                                    <td>
                                        <a href="javascript:void(0)" class="btn btn-info btn-xs ">@lang('site.completed')</a>
                                    </td>
                                @elseif ($sale->status == 3)
                                    <td>
                                        <a href="javascript:void(0)" class="btn btn-primary btn-xs ">@lang('site.inProgress')</a>
                                    </td>
                                @elseif ($sale->status == 4)
                                <td>
                                    <a href="javascript:void(0)" class="btn btn-primary btn-xs ">@lang('site.indelivery')</a>
                                </td>
                                @else
                                    <td>
                                        <a href="javascript:void(0)" class="btn btn-danger btn-xs">@lang('site.cancelled')</a>
                                    </td>
								@endif
                                <td>
                                @if ($sale->status == 3)
                                    <a href="{{ url('sales/completed/' . $sale->id) }}" class="btn btn-info btn-xs pull-right">@lang('site.completed')</a>
                                @endif
								<a href="{{ url('sales/cancel/' . $sale->id) }}" class="btn btn-danger btn-xs pull-right">@lang('site.cancel')</a> <!--make it like  expenses المصاريف-->
                                    <a  href="{{ url('reports/sales/' . $sale->id) }}" class="btn btn-primary btn-xs pull-right">@lang('site.show')</a>
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
				{!! $sales->render() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
