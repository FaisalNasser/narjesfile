@extends('layouts.app')

@section('content')
    <?php
    $currency = setting_by_key('currency');
    ?>
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>@lang('site.all_orders')</h5>

                    </div>
                    <div class="ibox-content">

                        <table class="table dataTables-example">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>@lang('site.ordernum')</th>
                                    <th>@lang('site.name')</th>
                                    <th>@lang('site.phone')</th>
                                    <th>@lang('site.amount')</th>
                                    <th>@lang('site.status')</th>

                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (!empty($orders))
                                    @forelse ($orders as $key => $sale)
                                        <tr  style="@if($sale->receive_type == 0 && $sale->receive_type != null) background-color: #3a9943a8; @elseif($sale->receive_type == 1 && $sale->receive_type != null)    background-color: #82528773; @endif" >
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $sale->id }}</td>
                                            <td>{{ $sale->name }}</td>
                                            <td>{{ $sale->phone }}</td>

                                            <td>{{ $currency }} {{ $sale->amount }}</td>
                                            @if ($sale->status == 1)
                                                <td>
                                                    <a href="javascript:void(0)"
                                                        class="btn btn-delivery btn-xs ">@lang('site.completed')</a>
                                                </td>
                                            @elseif($sale->status == 2)
                                                <td>
                                                    <a href="javascript:void(0)"
                                                        class="btn btn-warning btn-xs">@lang('site.pending')</a>
                                                </td>
                                            @elseif($sale->status == 3)
                                                <td>
                                                    <a href="javascript:void(0)"
                                                        class="btn btn-info btn-xs">@lang('site.inProgress')</a>
                                                </td>
                                            @elseif($sale->status == 4)
                                                <td>
                                                    <a href="javascript:void(0)"
                                                        class="btn btn-default btn-xs">@lang('site.indelivery')</a>
                                                </td>
                                            @else
                                                <td>
                                                    <a href="javascript:void(0)"
                                                        class="btn btn-danger btn-xs">@lang('site.cancelled')</a>
                                                </td>
                                            @endif

                                            <td>

                                                <a target="_blank" href="{{ url('sales/view/' . $sale->id) }}"
                                                    class="btn btn-primary btn-xs pull-right">@lang('site.show')</a>
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
                        {{-- {!! $orders->render() !!} --}}

                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

@push('js')
    <!-- Data picker -->
    <script src="{{ asset('adminpanel/assets/js/plugins/html2pdf/html2pdf.bundle.min.js') }}"></script>
    <script src="{{ asset('adminpanel/assets/js/plugins/dataTables/datatables.min.js') }}"></script>
    <link href="{{ url('adminpanel/assets/css/plugins/dataTables/datatables.min.css') }}" rel="stylesheet">
    <script>
        $(function() {
            var dynamicVariable = "sales" + new Date("Y-m-d")
            $('.dataTables-example').DataTable({
                // "language": {
                //     search: '<i class="fa fa-filter" aria-hidden="true"></i>',
                //     searchPlaceholder: 'filter records',
                //     "sSearch": "@lang('site.search'):"
                // },
                // dom: '<"html5buttons"B>lTfgitp',
                // buttons: [{
                //         extend: 'copy',
                //         name: 'نسخ'
                //     },
                //     {
                //         extend: 'csv',
                //         action: function(e, dt, button, config) {
                //             config.filename = dynamicVariable;
                //             $.fn.dataTable.ext.buttons.excelHtml5.action(e, dt, button, config);
                //         },
                //         name: 'تحميل csv'
                //     },
                //     {
                //         extend: 'excel',
                //         action: function(e, dt, button, config) {
                //             config.filename = dynamicVariable;
                //             $.fn.dataTable.ext.buttons.excelHtml5.action(e, dt, button, config);
                //         }
                //     },


                //     {
                //         extend: 'print',
                //         name: 'طباعة',
                //         customize: function(win) {
                //             $(win.document.body).addClass('white-bg');
                //             $(win.document.body).css('font-size', '10px');

                //             $(win.document.body).find('table')
                //                 .addClass('compact')
                //                 .css('font-size', 'inherit');
                //         }
                //     }
                // ]

            });


        })
    </script>
@endpush
