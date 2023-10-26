@extends('layouts.app')

@section('content')
    <?php $currency = setting_by_key('currency'); ?>
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>@lang('site.SaleInvoice') </h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{ url('') }}">@lang('site.home')</a>
                </li>

                <li class="active">
                    <strong>@lang('site.Invoice') </strong>
                </li>
            </ol>
        </div>
        <div class="col-lg-2">

        </div>
    </div>

    <form>

        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="ibox-content p-xl">
                <div class="row">
                    <div class="col-sm-6">

                        <div class="panel panel-default height">
                            <div class="panel-heading">@lang('site.CustomerDetails')</div>
                            <div class="panel-body">
                                <strong>@lang('site.From'): {{ $sale->name }}</strong><br>
                                @lang('site.address') : {{ $sale->address }}<br>
                                @lang('site.phone') : {{ $sale->phone }}<br>




                            </div>
                            <hr>
                            <div class="panel-body">
                                <strong>@lang('site.userinvoice'): </strong><br>
                                @if ($sale->useraddress)
                                    <?php $useraddress = json_decode($sale->useraddress, true);
                                    
                                    ?>

                                    @lang('site.firstName') : {{ $useraddress['firstName'] }}<br>
                                    @lang('site.lastName') : {{ $useraddress['lastName'] }}<br>
                                    @lang('site.street') : {{ $useraddress['street'] }}<br>
                                    @lang('site.zipCode') : {{ $useraddress['zipCode'] }}<br>
                                    @lang('site.city') : {{ $useraddress['city'] }}<br>
                                    @lang('site.country') : {{ $useraddress['country'] }}<br>
                                @endif




                            </div>

                        </div>

                    </div>

                    <div class="col-sm-6 text-right">
                        <div class="panel panel-default height">
                            <div class="panel-heading">@lang('site.InvoiceDetails')</div>
                            <div class="panel-body">
                                <strong>@lang('site.invoice_no').</strong><br>
                                <h5 class="text-navy"><a href="{{ url('sales/bill/' . $sale->id) }}">
                                        {{ $sale->invoice_no }}</a></h5>
                                <p><strong>@lang('site.card_number'): {{ $sale->card_number }}</strong></p>
                                <strong>@lang('site.date'):</strong> <?php echo date('d M, Y', strtotime($sale->created_at)); ?>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="table-responsive m-t">
                    <table class="table invoice-table  table-condensed">
                        <thead>
                            <tr>
                                <th>@lang('site.product_name')</th>
                                <th>@lang('site.quantity')</th>
                                <th>@lang('site.price')</th>
                                <th>@lang('site.total_price')</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $item)
                                <tr>
                                    <td style="text-align: right;">
                                        @if (!empty($item->translation->name))
                                            {{ $item->translation->name }}
                                            @else{{ $item->name }}
                                        @endif {{ $item->size }}
                                    </td>
                                    <td style="text-align: right;"> {{ $item->quantity }}</td>
                                    <td style="text-align: right;">{{ $currency }}{{ $item->price }}</td>
                                    <td style="text-align: right;">{{ $currency }}{{ $item->quantity * $item->price }}
                                    </td>

                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div><!-- /table-responsive -->
                {{-- <button type="button" class="btn btn-primary" id="btn" ><i class="fa fa-plus"></i> Add new Item --}}
                <a href="{{ url('sales/edit/' . $sale->id) }}"
                    class="btn btn-primary btn-xs pull-right">@lang('site.Edit')</a>


                </button>
                <table class="table invoice-total">
                    <tbody>
                        @if ($sale->vat || $sale->delivery_cost || $sale->discount)
                            <tr>
                                <td><strong>@lang('site.Sub_Total') :</strong></td>
                                <td>{{ $currency }}{{ $sale->subtotal }}</td>
                            </tr>
                        @endif
                        @if ($sale->vat)
                            <tr>
                                <td><strong>@lang('site.Vat') :</strong></td>
                                <td>{{ $currency }}{{ $sale->vat }}</td>
                            </tr>
                        @endif
                        @if ($sale->delivery_cost)
                            <tr>
                                <td><strong>@lang('site.Delivery_Cost') :</strong></td>
                                <td>{{ $currency }}{{ $sale->delivery_cost }}</td>
                            </tr>
                        @endif
                        @if ($sale->discount)
                            <tr>
                                <td><strong>@lang('site.DISCOUNT') :</strong></td>
                                <td>{{ $currency }}{{ $sale->discount }}</td>
                            </tr>
                        @endif
                        <tr>
                            <td><strong>@lang('site.TOTAL') :</strong></td>
                            <td>{{ $currency }}{{ $sale->subtotal + $sale->vat + $sale->delivery_cost - $sale->discount }}
                            </td>
                        </tr>
                    </tbody>
                </table>

                <div class="well m-t"><strong>@lang('site.Comments')</strong>
                    {{ $sale->comment }}
                </div>
            </div>
        </div>
    </form>

    <!---->
    <div hidden id="cardp" class="bodys">

        <?php $currency = setting_by_key('currency'); ?>
        <div class="page">
            <br>
            <br>
            <table width="80%" cellpadding="10" class="tableS" cellspacing="10"
                style="font-family: Times New Roman; font-size: 11.5px !important;margin-left:20px">
                <tr>
                    <td colspan="2" style="text-align:center" class="noborder"><img
                            src="{{ url('uploads/order_logo.jpg?r=' . rand(0, 999)) }}" width="220" alt="PRA"></td>

                </tr>

            </table>

            <table width="90%" cellpadding="10" class="tableS" cellspacing="10"
                style="font-family: Times New Roman; font-size: 11.5px !important;margin-left:20px;">
                <thead>

                    <tr>
                        <td colspan="3" class="noborder"><strong>@lang('site.date')</strong> <?php echo date('d M, Y'); ?>

                        </td>
                        <td colspan="3" class="noborder" align="right">
                            <strong>@lang('site.time')</strong> <?php echo date('h:i A'); ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="noborder" colspan="3"><strong>@lang('site.invoice_no')</strong> {{ $sale->invoice_no }}
                        </td>
                        @if (!empty($sale->table_id))
                            <td colspan="3" class="noborder" align="right">
                                <strong>@lang('site.Table_number')</strong> {{ $sale->table_id }}
                            </td>
                        @endif
                    </tr>
                    <tr>
                        <td colspan="5" class="noborder">&nbsp;</td>
                    </tr>
                    <tr>
                        <td width="15"><strong>@lang('site.s_no')</strong></td>
                        <td width="150"><strong>@lang('site.menu')</strong></td>
                        <td id="kitchenph" width="100"><strong>@lang('site.unit_price')</strong></td>
                        <td width="15"><strong>@lang('site.qty')</strong></td>
                        <td id="kitchentotalh" width="60"><strong>@lang('site.total')</strong></td>
                    </tr>
                </thead>


                <?php $i = 1; ?>
                @foreach ($sale->items as $item)
                    <?php
                if($i % 35 == 0) {
                //$page_break = "page-break-after: always;";
                ?>

                    <tr height colspan="5" class="tableStyle">

                        <td>
                            <table width="90%" cellpadding="10" class="tableS" cellspacing="10" style="margin-left:20px">
                                <tr>


                                </tr>

                            </table>

                        </td>
                    </tr>

                    <!-- $page_break = "page-break-after: always;"; -->
                    <?php
                }

                ?>
                    <tr>
                        <td width="15"><strong>0<?php echo $i; ?></strong></td>
                        <td width="100"><strong>{{ $item->product->name }}({{ $item->size }})</strong></td>
                        <td class="kitchen" width="50"><strong><?php echo $currency; ?>{{ $item->price }}</strong></td>
                        <td width="15"><strong>{{ $item->quantity }}</strong></td>

                        <td class="kitchen" width="50">
                            <strong><?php echo $currency; ?>{{ number_format($item->quantity * $item->price, 2) }}</strong>
                        </td>
                    </tr>
                    <?php $i++; ?>
                @endforeach


            </table>

            <table
                style="page-break-inside:avoid;font-family: Times New Roman; font-size: 11.5px !important;margin-left:20px"
                width="90%" cellpadding="5" class="tableS kitchen" cellspacing="5" id="kitchen">


                <?php /*<tr>
                                                                                                                                                                                                                                                                                                                                                                                    <td></td>
                                                                                                                                                                                                                                                                                                                                                                                    <td></td>
                                                                                                                                                                                                                                                                                                                                                                                    <td><strong>SERVICE CHARGRES</strong></td>
                                                                                                                                                                                                                                                                                                                                                                                    <td><strong><?php echo $invoince->service_charge_per; ?>
                ?>
                ?>
                ?>
                ?>
                ?>
                ?>
                ?>
                ?>
                ?>
                ?>
                ?>
                ?>
                ?>
                ?>
                ?>
                ?>
                ?>
                ?>
                ?>
                ?>
                ?>
                ?>
                ?> %</strong></td>
                <td><strong><?php echo trim(str_replace(' ', '', $invoince->service_charge_amt)); ?></strong></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td><strong>PST</strong></td>
                    <td><strong>16 %</strong></td>
                    <td><strong><?php echo trim(str_replace(' ', '', $invoince->inv_invoice_tax_amount)); ?></strong></td>
                </tr> */ ?>
                <hr>



                <tr>
                    <td colspan="3"><strong>@lang('site.tax'):</strong></td>
                    <td><strong></strong></td>
                    <td class="grandtotalFont"><strong><?php echo $currency; ?>{{ number_format($sale->vat, 2) }}</strong></td>
                </tr>

                @if ($sale->discount > 0 and !empty($sale->discount))
                    <tr>
                        <td colspan="3"><strong>@lang('site.discount'):</strong></td>
                        <td><strong></strong></td>
                        <td class="grandtotalFont">
                            <strong><?php echo $currency; ?>{{ number_format($sale->discount, 2) }}</strong>
                        </td>
                    </tr>
                @endif


                <tr>
                    <td colspan="3"><strong>@lang('site.total_given'):</strong></td>
                    <td><strong></strong></td>
                    <td class="grandtotalFont">
                        <strong><?php echo $currency; ?>{{ number_format($sale->total_given, 2) }}</strong>
                    </td>
                </tr>
                <tr>
                    <td colspan="3"><strong>@lang('site.change'):</strong></td>
                    <td><strong></strong></td>
                    <td class="grandtotalFont">
                        <strong><?php echo $currency; ?>{{ number_format($sale->change, 2) }}</strong>
                    </td>
                </tr>
                <tr>
                    <td colspan="3"><strong>@lang('site.payment_with'):</strong></td>
                    <td><strong></strong></td>
                    <td class="grandtotalFont"><strong><?php if ($sale->payment_with == "cash") { ?>
                            @lang('slip.cash')
                            <?php } else { ?>
                            @lang('slip.card')
                            <?php } ?></strong></td>
                </tr>

                <tr>
                    <td colspan="3"><strong>@lang('site.grand_total'):</strong></td>
                    <td><strong></strong></td>
                    <td class="grandtotalFont">
                        <strong><?php echo $currency; ?>{{ number_format($sale->subtotal - $sale->discount + $sale->vat, 2) }}</strong>
                    </td>
                </tr>

                <tr>
                    <td class="removeborder"></td>
                    <td class="removeborder">&nbsp;</td>
                    <td class="removeborder"></td>
                    <td class="removeborder"></td>
                    <td class="removeborder"></td>
                </tr>
                <tr>
                    <td class="removeborder"></td>
                    <td class="removeborder">&nbsp;</td>
                    <td class="removeborder"></td>
                    <td class="removeborder"></td>
                    <td class="removeborder"></td>
                </tr>


                <tr>
                    <td colspan="5" align="center">
                        <strong>@lang('site.thanks_visting') {{ setting_by_key('title') }}, {{ setting_by_key('address') }}
                            , {{ setting_by_key('phone') }}</strong>
                    </td>

                </tr>



            </table>


        </div>

    </div>
    <script type="text/javascript"
        src="{{ asset('adminpanel/assets/js/plugins/JSPrintManager-master/scripts/JSPrintManager.js') }}"></script>
    <script type="text/javascript" src="{{ asset('adminpanel/assets/js/plugins/zip.js-master/zip-full.min.js') }}">
    </script>
@endsection
