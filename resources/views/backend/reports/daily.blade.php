@extends('layouts.app')

@section('content')
    <div  style="margin-bottom:20px" class="m-4">
        <div class="">
            <div class="panel panel-default">
                <div class="ibox-title">
                    <h5>@lang('site.date_range')</h5>
                </div>
                <div dir="ltr" class="ibox-content">
                    <form  action="#" method="GET">
                        <div class="form-group" id="data_5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group" style="line-height:5">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fa fa-search"></i>
                                            @lang('site.search')
                                        </button>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <label for="from">{{ __('site.To') }}</label>
                                    <input type="date" class="input-sm form-control" name="to" value="{{ $to->format('Y-m-d') }}" />
                                </div>
                                <div class="col-md-4">
                                    <label for="from">{{ __('site.From') }}</label>
                                    <input type="date" class="input-sm form-control" name="from" value="{{ $from->format('Y-m-d') }}" />
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="panel-group active" id="accordion" role="tablist" aria-multiselectable="true">
        <div class="panel panel-default active">
            <div class="panel-heading" role="tab" id="headingTwo">
                <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion"
                        href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        @lang('site.daily') <i class="fa fa-arrow-down pull-left"></i>
                    </a>
                </h4>
            </div>
            <div id="collapseTwo" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingTwo">
                <div class="panel-body">
                    <div class="col-lg-12">
                        <div class="ibox float-e-margins">
                            <div class="">
                                <h5>
                                    {{-- <a class="btn btn-primary pull-left" id="DownloadExpenses"> @lang('site.download_pdf')
                                </a> --}}
                                </h5>
                            </div>
                            <div class="ibox-content">
                                <table class="table dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>@lang('site.code')</th>
                                            <th>@lang('site.product_name')</th>
                                            <th>@lang('site.invoice_no')</th>
                                            <th>@lang('site.quantity')</th>
                                            <th>@lang('site.price')</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($sales as $invoice_no => $sale)
                                            @foreach ($sale as $item)
                                                <tr>
                                                    <td>{{ $invoice_no }}</td>
                                                    <td>{{ $item->codes }}</td>
                                                    <td>{{ $item->product->name }}</td>
                                                    <td>{{ $invoice_no }}</td>
                                                    <td>{{ $item->quantity }}</td>
                                                    <td>{{ $item->price }}</td>
                                                </tr>
                                            @endforeach
                                        @endforeach
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
                "dom": '<"top"i>rt<"bottom"><"clear">'
                "oLanguage": {
                    search: '<i class="fa fa-filter" aria-hidden="true"></i>',
                    searchPlaceholder: 'filter records',
                    "sSearch": "@lang('site.search): "
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
