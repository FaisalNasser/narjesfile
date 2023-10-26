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
                        <h5>@lang('site.sales')</h5>
                    </div>
                    <div class="ibox-content">
                        <table class="table   ">
                            <thead>
                                <tr>
                                    <th>@lang('site.sales_by')</th>
                                    <th>@lang('site.total_amount')</th>
                                </tr>
                            </thead>
                            <tbody>
                                    <?php $total_discount=0;$total_amount = 0; ?>
                                    @if (!empty($sales))
                                        <tr>
                                            <td>-- @lang('site.Online_Orders') --</td>
                                            <td>{{$currency}} {{ $sales->where('type', 'order')->sum('amount') }}</td>
                                        </tr>
                                        <tr>
                                            <td>-- {{ __('site.Free_Order') }} --</td>
                                            <td>{{$currency}} {{ $free_sales }}</td>
                                        </tr>
                                        @forelse ($cashiers as $name => $sale)
                                            <tr>
                                                <td>{{ $name }}</td>
                                                <td>{{$currency}} {{ $sale->sum('amount') }}</td>

                                            </tr>

                                        @empty
                                            {{-- @include('backend.partials.table-blank-slate', ['colspan' => 5]) --}}
                                        @endforelse
                                    @endif
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="1"> @lang('site.total_sales') </td>
                                    <td>{{$currency}} {{ $sales->sum('amount') + $free_sales }}</td>
                                </tr>
                            </tfoot>
                        </table>

						<div class="text-right">
                          	<!--<a href="javascript:void(0);"  class="btn btn-sm btn-info export">@lang('site.download_csv')</a>-->
                        	<!--<a target="_blank" href="{{url('email/staff_sold?pdf=yes')}}" class="btn btn-sm btn-warning" id="DownloadPDF"> @lang('site.download_pdf') </a>-->
                          </div>

                     </div>
                     <div  style="margin-top: 20px"  class="ibox-content">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>@lang('site.payment_with')</th>
                                    <th>@lang('site.total_amount')</th>
                                </tr>
                            </thead>
                            <tbody>
                                    @if (true)
                                        <tr>
                                            <td>{{ __('site.Free_Order') }}</td>
                                            <td>{{$currency}} {{ $free_sales }}</td>
                                        </tr>
                                        @php $total_payment_group = 0; @endphp
                                        @forelse ($payment_group as $name => $payment)
                                            <tr>
                                                <td>{{ $name }}</td>
                                                <td>{{$currency}} {{ $payment->sum('amount') }}</td>
                                            </tr>
                                            @php $total_payment_group += $payment->sum('amount');   @endphp
                                        @empty
                                            {{-- @include('backend.partials.table-blank-slate', ['colspan' => 5]) --}}
                                        @endforelse
                                    @endif
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="1"> @lang('site.total_payments') </td>
                                    <td>{{$currency}} {{ $total_payment_group + $free_sales }}</td>
                                </tr>
                            </tfoot>
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
                        <form action="{{ url('reports/staff_sold') }}" method="GET">
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
                                <div class="form-group">
                                    <label>{{ __('site.From') }}</label>
                                    <input type="date" class="input-sm form-control" name="from" value="{{ $from->format('Y-m-d') }}"/>
                                </div>
					         <div class="form-group" id="data_5">
                                <label>{{ __('site.To') }}</label>
                                    <input type="date" class="input-sm form-control" name="to" value="{{ $to->format('Y-m-d')  }}" />
                             </div>

                             <div class="form-group">
                              <button type="submit" class="btn btn-primary">@lang('site.search')</button>

                              </div>
                         </form>
                </div>
            </div>
        </div>

    </div>


    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="headingTwo">
                <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"
                        aria-expanded="false" aria-controls="collapseTwo">
                        @lang('site.cacher_sales')  <i class="fa fa-arrow-down pull-left"></i>
                    </a>
                </h4>
            </div>
            <div id="collapseTwo" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingTwo">
                <div class="panel-body">
                    <div class="col-lg-12">
                        <div class="ibox float-e-margins">
                            <div class="">
                            <h5>
                                {{-- <a  class="btn btn-primary pull-left" id="DownloadExpenses"> @lang('site.download_pdf') </a> --}}
                            </h5>

                            </div>
                            <div class="ibox-content">

                                <table class="table myTable table-responsive dataTables-report" id="reportEx">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>@lang('site.sales_date')</th>
                                            <th>@lang('site.total_amount')</th>
                                            <th>@lang('site.total_given')</th>
                                            <th>@lang('site.total_card')</th>
                                            <th>@lang('site.change')</th>
                                            <th>@lang('site.discount')</th>
                                            <th>@lang('site.Payment')</th>
                                            <th>@lang('site.card_number')</th>
                                            <th>@lang('site.invoice_no')</th>
                                            <th>@lang('site.status')</th>

                                        </tr>
                                    </thead>

                                    <tbody>

                                @if (true)
                                @forelse ($sales->where('type', 'pos') as $key => $sale)


                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $sale->created_at->format('Y-m-d H:i') }}</td>
                                    <td>{{$currency}} {{ $sale->amount}}</td>
                                    <td>{{$currency}}  {{number_format($sale->total_given,2)}}</td>
                                    <td>{{$currency}}  {{number_format($sale->total_card,2)}}</td>
                                    <td>{{$currency}}  {{number_format($sale->change,2)}}</td>
                                    <td>{{$currency}}  {{number_format($sale->discount,2)}}</td>
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

                                    <td>{{ $sale->card_number ?? '-' }}</td>
                                    <td><a href="{{url('sales/receipt/' . $sale->id)}}"> {{  str_pad($sale->id, 6, 0, STR_PAD_LEFT) }}</a></td>

                                        @if($sale->status == 1)
                                            <td>
                                                <a href="javascript:void(0)" class="btn btn-primary btn-xs ">@lang('site.completed')</a>
                                            </td>
                                        @elseif($sale->status == 0)
                                            <td>
                                                <a href="javascript:void(0)" class="btn btn-danger btn-xs">@lang('site.cancelled')</a>
                                            </td>
                                        @else
                                        <td>
                                            <a href="javascript:void(0)" class="btn btn-success btn-xs">@lang('site.inProgress')</a>
                                        </td>
                                        @endif


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
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="headingOne">
                <h4 class="panel-title">
                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne"
                        aria-expanded="true" aria-controls="collapseOne">
                        @lang('site.Online_Orders') <i class="fa fa-arrow-down pull-left"></i>
                    </a>
                </h4>
            </div>
            <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                <div class="panel-body">
                    <div class="col-lg-12">
                        <div class="ibox float-e-margins">
                            <div class="">
                                <h5>
                                    @lang('site.Online_Orders')
                                    {{-- <a  class="btn btn-primary pull-left" id="DownloadSales"> @lang('site.download_pdf') </a> --}}
                                </h5>
                            </div>
                            <div class="ibox-content">

                                <table class="table dataTables-example " id="reportS">
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
                                    <th>@lang('site.status')</th>

                                </tr>
                                    </thead>
                                    <tbody>
                                @if (true)
                                @forelse ($sales->where('type', 'order') as $key => $sale)
                                        <tr> <td>{{ $key + 1 }}</td>
                                        <td>{{ date('H:i  d F Y ' , strtotime($sale->created_at)) }}</td>
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
                                            @if($sale->status == 1)
                                        <td>
                                            <a href="javascript:void(0)" class="btn btn-primary btn-xs ">@lang('site.completed')</a>
                                        </td>
                                            @else
                                        <td>
                                            <a href="javascript:void(0)" class="btn btn-danger btn-xs">@lang('site.cancelled')</a>
                                        </td>
                                            @endif


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
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>



    </div>




    </div>


<!-- Data picker -->
    {{-- <script src="{{url('assets/js/plugins/datapicker/bootstrap-datepicker.js')}}"></script>
	<script src="{{url('assets/js/plugins/dataTables/datatables.min.js')}}"></script>
    <script src="{{url('assets/js/plugins/fullcalendar/moment.min.js')}}"></script>
    <script src="{{url('assets/js/plugins/daterangepicker/daterangepicker.js')}}"></script>
    <script src="{{asset('adminpanel/assets/js/plugins/html2pdf/html2pdf.bundle.min.js')}}"></script> --}}

  <script>
//         $(document).ready(function(){
//                         var dynamicVariable = $('#time').val();

//             $('.dataTables-example').DataTable({
//                 "language": {
//     search: '<i class="fa fa-filter" aria-hidden="true"></i>',
//     searchPlaceholder: 'filter records',
//     "sSearch": "بحث: "
// },
//                 dom: '<"html5buttons"B>lTfgitp',
//                 buttons: [
//                     { extend: 'copy' ,name: 'نسخ'},
//                     {extend: 'csv' ,action: function(e, dt, button, config) {
//         config.filename = dynamicVariable;
//         $.fn.dataTable.ext.buttons.excelHtml5.action(e, dt, button, config);
//       },name: 'تحميل csv'},
//                     {extend: 'excel',action: function(e, dt, button, config) {
//         config.filename = dynamicVariable;
//         $.fn.dataTable.ext.buttons.excelHtml5.action(e, dt, button, config);
//       }},


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

        $(document).ready(function(){
                        // var dynamicVariable = $('#time').val();

            // $('#reportE').DataTable({
            //     "language": {
            //         search: '<i class="fa fa-filter" aria-hidden="true"></i>',
            //         searchPlaceholder: 'filter records',
            //         "sSearch": "بحث: "
            //     },
            //     dom: '<"html5buttons"B>lTfgitp',
            //     buttons: [
            //         { extend: 'copy' ,name: 'نسخ'},
            //         {extend: 'csv',action: function(e, dt, button, config) {
            //             config.filename = dynamicVariable;
            //             $.fn.dataTable.ext.buttons.excelHtml5.action(e, dt, button, config);
            //         },
            //         name: 'download csv'},
            //                     {extend: 'excel', action: function(e, dt, button, config) {
            //         config.filename = dynamicVariable;
            //         $.fn.dataTable.ext.buttons.excelHtml5.action(e, dt, button, config);
            //     }},


            //         {extend: 'print', name: 'print'  ,
            //          customize: function (win){
            //                 $(win.document.body).addClass('white-bg');
            //                 $(win.document.body).css('font-size', '10px');

            //                 $(win.document.body).find('table')
            //                         .addClass('compact')
            //                         .css('font-size', 'inherit');
            //         }
            //         }
            //     ]

            // });

            // var table = $('#reportE').DataTable({
            //     responsive: true,
            //     dom: 'Bfrtip',
            // });

            // new $.fn.dataTable.Buttons( table, {
            //     buttons: [
            //         'copy', 'excel', 'pdf'
            //     ]
            // } );




        });
    //     $("body").on("click" , "#DownloadSales" , generatePDFS);
	//     function generatePDFS() {
    //     // Choose the element that our invoice is rendered in.
    //     const element = document.getElementById("reportS");

    //     // Choose the element and save the PDF for our user.

    //     const pdfName = 'report_sales' ;

    //     html2pdf()
    //         .set({ html2canvas: { scale: 4 } })
    //         .from(element)
    //         .save(pdfName);
    // }
    //  $("body").on("click" , "#DownloadExpenses" , generatePDFE);
	//     function generatePDFE() {
    //     // Choose the element that our invoice is rendered in.
    //     const element = document.getElementById("reportE");

    //     // Choose the element and save the PDF for our user.

    //     const pdfName = 'report_expenses' ;

    //     html2pdf()
    //         .set({ html2canvas: { scale: 4 } })
    //         .from(element)
    //         .save(pdfName);
    // }


    </script>

{{-- <script>
//  $('.input-daterange').datetimepicker({ format: 'LT'});
		$('#data_5 .input-daterange').datepicker({
                keyboardNavigation: false,
                forceParse: false,
                autoclose: true
            });
</script> --}}

@endsection


@push('js')
    <!-- Data picker -->
    <script src="{{ asset('adminpanel/assets/js/plugins/html2pdf/html2pdf.bundle.min.js') }}"></script>
    <script src="{{ asset('adminpanel/assets/js/plugins/dataTables/datatables.min.js') }}"></script>
    <link href="{{ url('assets/css/plugins/dataTables/datatables.min.css') }}" rel="stylesheet">
    <script>
        $(function() {
            var dynamicVariable = "daily"
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
