@extends('layouts.app')

@section('content')
<?php $input['date_range'] = !empty($input['date_range']) ? $input['date_range'] : null;
$currency =  setting_by_key("currency");
?>
<link href="{{url('assets/css/plugins/datapicker/datepicker3.css')}}" rel="stylesheet">
<link href="{{url('assets/css/plugins/dataTables/datatables.min.css')}}" rel="stylesheet">

 <link href="{{url('assets/css/plugins/daterangepicker/daterangepicker-bs3.css')}}" rel="stylesheet">

<div class="wrapper wrapper-content animated fadeInRight">
   <div class="row">
        <div class="col-lg-8">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>@lang('reports.expense_sales')</h5>

                    </div>
                    <div class="ibox-content">
                        @php
                            $total_sales = $sales->sum('amount');
                            $total_expences = $expences->sum('price');
                        @endphp
                        <table class="table">

                            <tbody>

                            <tr>
                                <td>@lang('reports.sales')</td>
                               <td>{{$currency}}{{ $total_sales }}</td>
                            </tr>
                            <tr>
                                <td>@lang('reports.expense')</td>
                               <td>{{$currency}}{{ $total_expences }}</td>
                            </tr>


                    </tbody>

						<tr>

                                <td>@lang('reports.total_difference')</th>
                                <td> {{$currency}}{{$total_sales - $total_expences}} </th>

                            </tr>


                        </table>

                    </div>
                </div>
            </div>

        <div class="col-md-4">
            <div class="panel panel-default">
                 <div class="ibox-title">
                        <h5>@lang('site.date_range')</h5>

                    </div>
                 <div class="ibox-content">
                    <form action="{{ url('reports/expensesales') }}" method="GET">

						<div class="form-group">
                            {{-- <label for="price">@lang('site.date_range')</label> --}}
                             {{-- <select class="form-control" id="date-range" name="date_range">
                             <option>@lang('site.select_date_range')</option>
                             <option value="today" {{ ($input['date_range'] == 'today') ? 'selected="selected"' : '' }}>@lang('site.today')</option>
                             <option value="current_week" {{ ($input['date_range'] == 'current_week') ? 'selected="selected"' : '' }}>@lang('site.this_week')</option>
                             <option value="current_month" {{ ($input['date_range'] == 'current_month') ? 'selected="selected"' : '' }}>@lang('site.this_month')</option>
                             <option value="custom_date" {{ ($input['date_range'] == 'custom_date') ? 'selected="selected"' : '' }}>@lang('site.custom_date')</option>
                              </select> --}}
                         </div>
                     {{-- {{ dd($to->format('Y-m-d'), $from->format('Y-m-d')) }} --}}
                             <div class="form-group">
                                 <label>{{ __('site.From') }}</label>
                                 <input type="date" class="input-sm form-control" name="from" value="{{ $from->format('Y-m-d') }}"/>
                             </div>
                          <div class="form-group" id="data_5">
                             <label>{{ __('site.To') }}</label>
                                 <input type="date" class="input-sm form-control" name="to" value="{{ $to->format('Y-m-d') }}" />
                          </div>

                          <div class="form-group">
                           <button type="submit" class="btn btn-primary">@lang('site.search')</button>

                           </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
     <div class="row">
              <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>@lang('site.expenses')</h5>
                	{{-- <a  class="btn btn-primary" id="DownloadExpenses"> @lang('site.download_pdf') </a> --}}

                    </div>
                    <div class="ibox-content">

                        <table class="table myTable dataTables-example" id="reportE">
                            <thead>
                            <tr>
                            <th>#</th>
                            <th>@lang('site.date')</th>
							<th>@lang('site.title')</th>
                            <th>@lang('site.price')</th>
                            </tr>
                            </thead>

                            <tbody>

                    @if (true)
                        @forelse ($expences as $key => $expense)
                            <tr>
                               <td>{{ $key + 1 }}</td>
                               <td>{{ date('d F Y' , strtotime($expense->created_at)) }}</td>
							   <td>{{ $expense->title}}</td>
							   <td>{{$currency}} {{ $expense->price}}</td>
                            </tr>
                        @empty
                            {{-- @include('backend.partials.table-blank-slate', ['colspan' => 5]) --}}
                        @endforelse
                    @endif


                    </tbody>




                        </table>

                    </div>
                </div>
            </div>
             <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>@lang('reports.sales')</h5>
                    	{{-- <a  class="btn btn-primary" id="DownloadSales"> @lang('site.download_pdf') </a> --}}

                    </div>
                    <div class="ibox-content">

                        <table class="table dataTables-report " id="reportS">
                            <thead>
                           <tr>
                            <th>#</th>
                            <th>@lang('site.sales_date')</th>
                            <th>@lang('site.invoice_no')</th>
					    	<th>@lang('site.total_amount')</th>
                            <th>@lang('site.total_given')</th>
                            <th>@lang('site.total_card')</th>
                            <th>@lang('site.change')</th>
                             <th>@lang('site.Payment')</th>
                             <th>@lang('site.number_of_credit_card')</th>
                            <th>@lang('site.status')</th>
                            <!--<th></th>-->
                        </tr>
                            </thead>
                            <tbody>
							<?php $total_discount=0;$total_amount = 0; ?>
                    @if (true)
                        @forelse ($sales as $key => $sale)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                               <td>{{ date('d F Y' , strtotime($sale->created_at)) }}</td>
                               <td><a href="{{url('sales/receipt/' . $sale->id)}}"> {{  str_pad($sale->id, 6, 0, STR_PAD_LEFT) }}</a></td>

							   <td>{{$currency}} {{ $sale->amount}}</td>
                               	<td>{{$currency}}  {{number_format($sale->total_given,2)}}</td>
                               	<td>{{$currency}}  {{number_format($sale->total_card,2)}}</td>
                                <td>{{$currency}}  {{number_format($sale->change,2)}}</td>
                                <td class="grandtotalFont">
                                    <strong>
                                        @if($sale->total_card > 0 && $sale->total_given > 0)
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
                                <td>{{ $sale->card_number ? $sale->card_number : "_" }}</td>
									@if($sale->status == 1)
								<td>
                                    <a href="javascript:void(0)" class="btn btn-primary btn-xs ">@lang('site.completed')</a>
                                </td>
									@else
								<td>
                                    <a href="javascript:void(0)" class="btn btn-danger btn-xs">@lang('site.cancelled')</a>
                                </td>
									@endif


                                <!--<td>-->
                                <!--    <a href="{{ url('reports/sales/' . $sale->id) }}" class="btn btn-primary btn-xs pull-right">@lang('site.show')</a>-->
                                <!--</td>-->
                            </tr>

                        @empty
                            {{-- @include('backend.partials.table-blank-slate', ['colspan' => 5]) --}}
                        @endforelse
                    @endif
                    </tbody>



                        </table>

                    </div>
                </div>
            </div>

                    {{-- <input hidden id="time" value ="{{$time}}"> --}}

    </div>
</div>
	<!-- @lang('site.date_range') use moment.js same as full calendar plugin -->

	 <!-- Data picker -->
    {{-- <script src="{{url('assets/js/plugins/datapicker/bootstrap-datepicker.js')}}"></script>
	<script src="{{url('assets/js/plugins/dataTables/datatables.min.js')}}"></script>
    <script src="{{url('assets/js/plugins/fullcalendar/moment.min.js')}}"></script>
    <script src="{{url('assets/js/plugins/daterangepicker/daterangepicker.js')}}"></script>
    <script src="{{asset('adminpanel/assets/js/plugins/html2pdf/html2pdf.bundle.min.js')}}"></script> --}}

     <script>
//         $(document).ready(function(){
//             var dynamicVariable = $('#time').val();

//             $('.dataTables-example').DataTable({
//                 "language": {
//     search: '<i class="fa fa-filter" aria-hidden="true"></i>',
//     searchPlaceholder: 'filter records',
//     "sSearch": "بحث: "
// },
//                 dom: '<"html5buttons"B>lTfgitp',
//                 buttons: [
//                     { extend: 'copy' ,name: 'نسخ'},
//                     {extend: 'csv',name: 'تحميل csv'},
//                     {extend: 'excel',  action: function(e, dt, button, config) {
//                 config.filename = dynamicVariable;
//                     $.fn.dataTable.ext.buttons.excelHtml5.action(e, dt, button, config);
//                        },},


//                     {extend: 'print',name: 'طباعة'  ,
//                      customize: function (win){
//                             $(win.document.body).addClass('white-bg');
//                             $(win.document.body).css('font-size', '10px');

//                             $(win.document.body).find('table')
//                                     .addClass('compact')
//                                     .css('font-size', 'inherit');
//                     }
//                     }
//                 ]

//             });




//         });

//         $(document).ready(function(){
//          var dynamicVariable = $('#time').val();

//             $('.myTable').DataTable({
//                 dom: '<"html5buttons"B>lTfgitp',
//                 buttons: [
//                     { extend: 'copy' ,name: 'نسخ'},
//                     {extend: 'csv',name: 'تحميل csv'},
//                     {extend: 'excel',  action: function(e, dt, button, config) {
//                 config.filename = dynamicVariable;
//                     $.fn.dataTable.ext.buttons.excelHtml5.action(e, dt, button, config);
//                        } },


//                     {extend: 'print',name: 'طباعة'  ,
//                      customize: function (win){
//                             $(win.document.body).addClass('white-bg');
//                             $(win.document.body).css('font-size', '10px');

//                             $(win.document.body).find('table')
//                                     .addClass('compact')
//                                     .css('font-size', 'inherit');
//                     }
//                     }
//                 ]

//             });




//         });
//         $("body").on("click" , "#DownloadSales" , generatePDFS);
// 	    function generatePDFS() {
//         // Choose the element that our invoice is rendered in.
//         const element = document.getElementById("reportS");

//         // Choose the element and save the PDF for our user.

//         const pdfName = 'report_sales' ;

//         html2pdf()
//             .set({ html2canvas: { scale: 4 } })
//             .from(element)
//             .save(pdfName);
//     }
//      $("body").on("click" , "#DownloadExpenses" , generatePDFE);
// 	    function generatePDFE() {
//         // Choose the element that our invoice is rendered in.
//         const element = document.getElementById("reportE");

//         // Choose the element and save the PDF for our user.

//         const pdfName = 'report_expenses' ;

//         html2pdf()
//             .set({ html2canvas: { scale: 4 } })
//             .from(element)
//             .save(pdfName);
//     }


    </script>

    <script>
	// 		$('#data_5 .input-daterange').datepicker({
    //             keyboardNavigation: false,
    //             forceParse: false,
    //             autoclose: true
    //         });
	// 		</script>

@endsection


@push('js')
    <!-- Data picker -->
    <script src="{{ asset('adminpanel/assets/js/plugins/html2pdf/html2pdf.bundle.min.js') }}"></script>
    <script src="{{ asset('adminpanel/assets/js/plugins/dataTables/datatables.min.js') }}"></script>
    <link href="{{ url('assets/css/plugins/dataTables/datatables.min.css') }}" rel="stylesheet">
    <script>
        $(function() {
            var dynamicVariable = "sales" + new Date("Y-m-d")
            $('.dataTables-example').DataTable({
                "language": {
                    search: '<i class="fa fa-filter" aria-hidden="true"></i>',
                    searchPlaceholder: 'filter records',
                    "sSearch": "@lang('site.search'):"
                },
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [{
                        extend: 'copy',
                        name: 'نسخ'
                    },
                    {
                        extend: 'csv',
                        action: function(e, dt, button, config) {
                            config.filename = dynamicVariable;
                            $.fn.dataTable.ext.buttons.excelHtml5.action(e, dt, button, config);
                        },
                        name: 'تحميل csv'
                    },
                    {
                        extend: 'excel',
                        action: function(e, dt, button, config) {
                            config.filename = dynamicVariable;
                            $.fn.dataTable.ext.buttons.excelHtml5.action(e, dt, button, config);
                        }
                    },


                    {
                        extend: 'print',
                        name: 'طباعة',
                        customize: function(win) {
                            $(win.document.body).addClass('white-bg');
                            $(win.document.body).css('font-size', '10px');

                            $(win.document.body).find('table')
                                .addClass('compact')
                                .css('font-size', 'inherit');
                        }
                    }
                ]

            });

            $('.dataTables-report').DataTable({
                "language": {
                    search: '<i class="fa fa-filter" aria-hidden="true"></i>',
                    searchPlaceholder: 'filter records',
                    "sSearch": "@lang('site.search'):"
                },
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [{
                        extend: 'copy',
                        name: 'نسخ'
                    },
                    {
                        extend: 'csv',
                        action: function(e, dt, button, config) {
                            config.filename = dynamicVariable;
                            $.fn.dataTable.ext.buttons.excelHtml5.action(e, dt, button, config);
                        },
                        name: 'تحميل csv'
                    },
                    {
                        extend: 'excel',
                        action: function(e, dt, button, config) {
                            config.filename = dynamicVariable;
                            $.fn.dataTable.ext.buttons.excelHtml5.action(e, dt, button, config);
                        }
                    },


                    {
                        extend: 'print',
                        name: 'طباعة',
                        customize: function(win) {
                            $(win.document.body).addClass('white-bg');
                            $(win.document.body).css('font-size', '10px');

                            $(win.document.body).find('table')
                                .addClass('compact')
                                .css('font-size', 'inherit');
                        }
                    }
                ]

            });
        })
    </script>
@endpush
