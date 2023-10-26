@extends('layouts.app')

@section('content')
<style>
    .disabled-link {
        pointer-events: none; /* Disable pointer events */
        opacity: 0.6; /* Reduce opacity to indicate disabled state */
    }
</style>
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
                                    <!-- <th>@lang('site.ordernum')</th> -->
                                    <th style="text-align: center;">@lang('site.name')</th>
                                    <th style="text-align: center;">@lang('site.phone')</th>
                                    <th style="text-align: center;"> @lang('site.email')</th>
                                    <th style="text-align: center;">@lang('site.total')</th>

                                    <th style="text-align: center;">@lang('site.bank_account_shipping')</th>
                                    <th style="text-align: center;">@lang('site.comment')</th>
                                    <th style="text-align: center;">@lang('site.address')</th>
                                    <th style="text-align: center;">@lang('site.status')</th>

                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (!empty($Alldebit_orders))
                                    @forelse ($Alldebit_orders as $key => $debit_order)
                                    @php
                                $invoiceAddress = json_decode($debit_order->cart);
                                 @endphp
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            
                                            <td>{{ $debit_order->name }}</td>
                                            <td>{{ $debit_order->mobile_number }}</td>
                                            <td> {{ $debit_order->email }}</td>
                                            <td>{{ $currency }} {{ $debit_order->amount }}</td>
                                            <td> {{ $debit_order->card_number }}</td>
                                            <td> {{ $debit_order->comment }}</td>
                                            <td>  @if (isset($invoiceAddress->street))
                                            <span> {{ $invoiceAddress->street }}, {{ $invoiceAddress->zipCode }}
                                                {{ $invoiceAddress->city }} {{ $invoiceAddress->country }}</span><br>
                                            @endif</td>
                                            <td>

                                                <a target="_blank" href="{{ url('sales/deleteDebitOrder/' . $debit_order->id) }}"
                                                    class="btn btn-primary btn-xs pull-right">@lang('site.delete')</a>
                                                    <a target="_blank"  href="{{ url('sales/confirmdebitorder/' . $debit_order->id) }}"
                                                    class="btn btn-primary btn-xs pull-right @if($debit_order->confirmdepitorder == 1) disabled-link @endif"  >@lang('site.confirm')</a>
                                                <a target="_blank"  href="{{ url('sales/editordersExcel/' . $debit_order->sale_id) }}"
                                                    class="btn btn-primary btn-xs pull-right @if($debit_order->confirmdepitorder == 0) disabled-link @endif"  >@lang('site.Edit')</a>
                                                  

                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6">
                                                @lang('site.no_record_found')

                                            </td>
                                        </tr>
                                    @endforelse
                                @endif
                            </tbody>
                        </table>

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
    <!-- <script>
    $(function() {
        var dynamicVariable = "sales" + new Date("Y-m-d")
        $('.dataTables-example').DataTable({
            "language": {
                search: '<i class="fa fa-filter" aria-hidden="true"></i>',
                searchPlaceholder: 'filter records',
                "sSearch": "@lang('site.search'):"
            },
            dom: '<"html5buttons"B>lTfgitp',
            buttons: [
                {
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
    });
</script> -->

@endpush
