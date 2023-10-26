<style type="text/css">
	/*@import url("https://fonts.googleapis.com/css?family=Roboto");*/
	body {
		/*font-family: 'Roboto', sans-serif;*/
		font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
		font-size: 15px;
		line-height: 1.5;
	}
	.report-title-bg {
		padding: 5px;
		background-color: #18A689;
		color: #fff;
		font-size: 15px;
	}
	.pdf-footer p {
		margin: 0px;
		padding: 10px 0;
		border-top: #000 1px solid;
		font-size: 9px;
	}
	.m-tb0 {
		margin-top: 0px !important;
		margin-bottom: 0px !important;
	}
	.m-b0 {
		margin-bottom: 0px !important;
	}
</style>

<style>
	
	.table-stats {
		margin-top: 5px;
		font-size:10px;
	}
	.table-stats, .table-stats th, .table-stats td {
		border: #000 1px solid;
	}
	.table-stats thead {
		background-color: #d81921;
		text-align: left;
		color: #FFF;
	}
	.table-stats th, .table-stats td {
		padding: 3px 5px;
	}
	.table-stats tbody tr:nth-child(even) {
		background-color: #EEE;
	}
	
	.pdf-footer {
		position: fixed;
		left: 0px;
		bottom: 0px;
		width: 100%;
	}
	
</style>
<style>
	
	
		@page {
			size: portrait;
			/*margin-left: 1%;
			margin-right: 1%;*/
		}
	
	
	.table-stats tfoot th {
		background-color: #afb0d8;
		text-align: center;
	}
	.table-stats tfoot tr th:first-child {
		background-color: #21409a;
		color: #FFF;
		text-align: right;
	}
	
</style>




<table width="100%" border="0" cellspacing="0" cellpadding="0" class="table-stats" >
                            <thead>
                           <tr>
                            <th>#</th>
                            <th>@lang('site.sales_date')</th>
							<th>@lang('site.amount')</th>
                            <th>@lang('site.Discount')</th>
                            <th>@lang('site.total_amount')</th>
                           
                        </tr>
                            </thead>
                            <tbody>
							<?php $total_discount=0;$total_amount = 0; ?>
                    @if (!empty($sales))
                        @forelse ($sales as $key => $sale)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                               <td>{{ date('d F Y' , strtotime($sale->created_at)) }}</td>
                                
							   <td>${{ $sale->amount}}</td>
                                <td>${{ $sale->discount }}</td>
                                <td>${{ $sale->amount }}</td>
                            </tr>
							<?php $total_amount += $sale->amount; ?>
							<?php $total_discount += $sale->discount; ?>
                        @empty
                            @include('backend.partials.table-blank-slate', ['colspan' => 5])
                        @endforelse
                    @endif
                    </tbody>
					
						<tr>
                                <th>@lang('site.total'): {{count($sales)}}</th>
                                <th></th>
                                
							    <th>${{ $total_amount }}</th>
                                <th>${{ $total_discount }}</th>
                                <th>${{ $total_amount - $total_discount }}</th>
                                
                            </tr>
							
</table>

<br><br>

<div class="pdf-footer">
	<p>@lang('site.Created_by') {{Auth::user()->name}} on {{date("m/d/Y")}}.</p>
</div>
