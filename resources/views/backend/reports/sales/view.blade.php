@extends('layouts.app')

@section('content')
    <?php $currency = setting_by_key('currency'); ?>
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Sale Invoice </h2>
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

    <form action="{{ url('sales/update') }}" enctype='multipart/form-data' method="POST">
        {{ csrf_field() }}
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="ibox-content p-xl">
                <div class="row">
                    <div class="col-sm-6">
                        @php
                            $invoiceAddress = json_decode($sale->invoiceAddress);
                        @endphp

                        <div class="col-sm-12">
                            <h3> @lang('site.From'): <strong>{{ $sale->name }}</strong> </h3>
                            <address @if (app()->getLocale() == 'ar') style="text-align: end; direction: ltr;" @endif>
                                <br>
                                @if (isset($invoiceAddress->street))
                                    <span>Address: {{ $invoiceAddress->street }}, {{ $invoiceAddress->zipCode }}
                                        {{ $invoiceAddress->city }} {{ $invoiceAddress->country }}</span><br>
                                    <br>
                                @endif

                                @if (isset($invoiceAddress->phone))
                                    <abbr title="Phone">Phone:</abbr> {{ $invoiceAddress->phone }}<br>
                                    <br>
                                @endif
                                @if (isset($invoiceAddress->email))
                                    <abbr title="Email">Email:</abbr> {{ $invoiceAddress->email }}
                                    <input hidden type="text" id="emailUser" value=" {{ $invoiceAddress->email }}">
                                    <input hidden  type="text" id="firstName" value=" {{ $invoiceAddress->firstName }}">
                                    <input hidden  type="text" id="lastName" value=" {{ $invoiceAddress->lastName }}">
                                    <br>
                                @endif
                            </address>
                        </div>

                    </div>

                    <div class="col-sm-6 text-right">
                        <h4>
                            @lang('site.ordernum') : {{ $sale->id }}
                        </h4>
                        <h4>@lang('site.invoice_no').</h4>
                        <h4 class="text-navy"><a href="{{ url('sales/bill/' . $sale->id) }}"> {{ $sale->invoice_no }}</a>
                        </h4>

                        <p>
                            <span><strong>@lang('site.date'):</strong> <?php echo date('d M, Y', strtotime($sale->created_at)); ?></span><br />
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-8">
                        <div class="col-sm-5">
                            <label>
                                تغيير حالة الطلبية الى
                            </label>
                            <select id="orderStatus">
                              
                                <option value="2" @if ($sale->status == 2) {{ 'selected' }} @endif>
                                    @lang('site.pending')
                                </option>
                                <option value="3" @if ($sale->status == 3) {{ 'selected' }} @endif>
                                    @lang('site.inProgress')
                                </option>
                                <option value="4" @if ($sale->status == 4) {{ 'selected' }} @endif>
                                    @lang('site.indelivery')
                                </option>
                                  <option value="1" @if ($sale->status == 1) {{ 'selected' }} @endif>
                                    @lang('site.completed')
                                </option>
                                <option value="5" @if ($sale->status == 5) {{ 'selected' }} @endif>
                                    @lang('site.cancelled')
                                </option>

                            </select>

                        </div>
                        <div class="col-sm-3">
                            <input class="btn btn-primary" id="changeOrderStatus" type="button" value="@lang('site.save')">

                        </div>


                    </div>

                </div>

                <form>
                    <div class="table-responsive m-t">
                        <table class="table invoice-table" id="add_items">
                            <thead>
                                <tr>
                                    <th>@lang('site.product_name')</th>
                                    <th style="text-align: center;">الاستبيان</th>
                                    <th style="text-align: center;">@lang('site.quantity')</th>
                                    <th style="text-align: center;">@lang('site.price')</th>
                                    <th style="text-align: center;">@lang('site.total_price')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (!empty($products))
                                    @foreach ($products as $pro)
                                        @if ($pro['statusEvaluate'] == 0)
                                            @if ($pro['quantityForOffers'] == $pro['quantity'])
                                                <tr class="holdt">
                                                    <td style="width: 22%;">
                                                        {{ $pro['translation']->name }}({{ $pro['size'] }})</td>
                                                    <td style="text-align: right;">
                                                        @lang('site.your_hair_type'): {{ $pro['evaluate']['answer1'] ?? 'N/A' }}<br>
                                                        @lang('site.use_hanaa'): {{ $pro['evaluate']['answer2'] ?? 'N/A' }}<br>
                                                        @lang('site.remove_hair_color'): {{ $pro['evaluate']['answer3'] ?? 'N/A' }}<br>
                                                        @lang('site.your_hair_demaged'): {{ $pro['evaluate']['answer4'] ?? 'N/A' }}<br>
                                                        @lang('site.your_hair_length'): {{ $pro['evaluate']['answer5'] ?? 'N/A' }}
                                                    </td>
                                                    <td style="text-align: center;">{{ $pro['quantity'] }}</td>
                                                    <td style="text-align: center;">
                                                        {{ $currency }}{{ number_format( (($pro['price'] / $pro['quantityForOffers'])), 2) }}
                                                    </td>
                                                    <td style="text-align: center;">
                                                        {{ $currency }}{{ number_format($pro['quantity'] * ($pro['price'] / $pro['quantityForOffers']), 2) }}
                                                    </td>
                                                </tr>
                                                <input hidden value="{{ $pro['product_id'] }}" name="id[]">
                                            @elseif($pro['quantityForOffers'] != $pro['quantity'])
                                                <tr class="holdt">
                                                    <td style="width: 22%;">
                                                        {{ $pro['translation']->name }}({{ $pro['size'] }})</td>
                                                    <td style="text-align: right;">
                                                        @lang('site.your_hair_type'): {{ $pro['evaluate']['answer1'] ?? 'N/A' }}<br>
                                                        @lang('site.use_hanaa'): {{ $pro['evaluate']['answer2'] ?? 'N/A' }}<br>
                                                        @lang('site.remove_hair_color'): {{ $pro['evaluate']['answer3'] ?? 'N/A' }}<br>
                                                        @lang('site.your_hair_demaged'): {{ $pro['evaluate']['answer4'] ?? 'N/A' }}<br>
                                                        @lang('site.your_hair_length'): {{ $pro['evaluate']['answer5'] ?? 'N/A' }}
                                                    </td>
                                                    <td style="text-align: center;">{{ $pro['quantity'] }}</td>
                                                    <td style="text-align: center;">
                                                        {{ $currency }}{{ number_format(($pro['Allprices'][0]) ,2)  }}</td>
                                                    <td style="text-align: center;">
                                                        {{ $currency }}{{ number_format(($pro['quantity'] * $pro['Allprices'][0]), 2)   }}
                                                    </td>
                                                </tr>
                                                <input hidden value="{{ $pro['product_id'] }}" name="id[]">
                                            @endif
                                        @elseif($pro['statusEvaluate'] == 1)
                                            <tr class="holdt">
                                                <td style="width: 22%;">
                                                    {{ $pro['translation']->name }}({{ $pro['size'] }})
                                                </td>
                                                <td style="text-align: right;">
                                                    @lang('site.no_i_d_want')
                                                </td>
                                                <td style="text-align: center;">{{ $pro['quantity'] }}</td>
                                                <td style="text-align: center;">{{ $currency }}{{ number_format($pro['price'] / $pro['quantity'], 2) }}
                                                </td>
                                                <td style="text-align: center;">
                                                    {{ $currency }}{{ number_format($pro['quantity'] * ($pro['price'] / $pro['quantity']), 2) }}</td>
                                            </tr>
                                            <input hidden value="{{ $pro['product_id'] }}" name="id[]">
                                        @elseif($pro['statusEvaluate'] == 2)
                                            <tr class="holdt">
                                                <td style="width: 22%;">
                                                    {{ $pro['translation']->name }}({{ $pro['size'] }})
                                                </td>
                                                <td style="text-align: right;">
                                                    @lang('site.i_have_info')
                                                </td>
                                                <td style="text-align: center;">{{ $pro['quantity'] }}</td>
                                                <td style="text-align: center;">{{ $currency }}{{ number_format($pro['price'] / $pro['quantity'], 2) }}
                                                </td>
                                                <td style="text-align: center;">
                                                    {{ $currency }}{{ number_format($pro['quantity'] * ($pro['price'] / $pro['quantity']), 2) }}</td>
                                            </tr>
                                            <input hidden value="{{ $pro['product_id'] }}" name="id[]">
                                        @elseif($pro['statusEvaluate'] == 3)
                                            <tr class="holdt">
                                                <td style="width: 22%;">
                                                    {{ $pro['translation']->name }}({{ $pro['size'] }})
                                                </td>
                                                <td style="text-align: right;">
                                                    @lang('site.inactive')
                                                </td>
                                                <td style="text-align: center;">{{ $pro['quantity'] }}</td>
                                                <td style="text-align: center;">{{ $currency }}{{ number_format(($pro['price']), 2) }}
                                                </td>
                                                <td style="text-align: center;">
                                                    {{ $currency }}{{ number_format(($pro['quantity'] * $pro['price']),2)  }}</td>
                                            </tr>
                                            <input hidden value="{{ $pro['product_id'] }}" name="id[]">
                                            @elseif($pro['statusEvaluate'] == 4)
                                            <tr class="holdt">
                                                <td style="width: 22%;">
                                                    {{ $pro['translation']->name }}({{ $pro['size'] }})
                                                </td>
                                                <td style="text-align: right;">
                                                    @lang('site.inactive')
                                                </td>
                                                <td style="text-align: center;">{{ $pro['quantity'] }}</td>
                                                <td style="text-align: center;">{{ $currency }}{{ number_format(($pro['price']), 2)  }}
                                                </td>
                                                <td style="text-align: center;">
                                                    {{ $currency }}{{ number_format(($pro['quantity'] * $pro['price']),2)  }}</td>
                                            </tr>
                                            <input hidden value="{{ $pro['product_id'] }}" name="id[]">
                                        @endif
                                    @endforeach
                                @else
                                    <tr>
                                        لايوجد منتجات
                                    </tr>
                                @endif



                            </tbody>
                        </table>
                        <input name="sid" hidden id="sid" value="{{ $sale->id }}">
                    </div><!-- /table-responsive -->
                    <!-- <input class="btn btn-primary" type="submit" value="@lang('site.save')"> -->
                </form>
                <!-- <button type="button" class="btn btn-primary" id="btn"><i class="fa fa-plus"></i> @lang('site.add-new-item')
                                                                                                                                                                                                                                                                                                                </button> -->
                <table class="table invoice-total">
                    <tbody>
                        <tr>
                            <td><strong>@lang('site.Sub_Total') :</strong></td>
                            <td>{{ $currency }}{{number_format( ($sale->amount), 2) }}</td>
                        </tr>
                        <tr>
                            <td><strong>@lang('site.TAX') :</strong></td>
                            <td>{{ $currency }}{{number_format(($sale->vat ),2) }}</td>
                        </tr>

                        <tr>
                            <td><strong>@lang('site.Delivery_Cost') :</strong></td>
                            <td>{{ $currency }}{{number_format(($sale->delivery_cost), 2)  }}</td>
                        </tr>


                        <tr>
                            <td><strong>@lang('site.DISCOUNT') :</strong></td>
                            <td>{{ $currency }}{{ number_format(($sale->discount), 2)  }}</td>
                        </tr>
                        <tr>
                            <td><strong>@lang('site.TOTAL') :</strong></td>
                            <td>{{ $currency }}{{ number_format(($sale->amount - $sale->discount + $sale->delivery_cost),2)  }}</td>
                        </tr>
                    </tbody>
                </table>

                <div class="well m-t"><strong>@lang('site.Comments')</strong>
                    {{ $sale->comment }}
                </div>
            </div>
        </div>
    </form>
    <input hidden id="datatitle" class="form-control " style="display:none;">
    <input hidden id="dataproduct" class="form-control" style="display:none;">
    <input hidden id="dataSale" value="{{ $sale->id }}" class="form-control " style="display:none;">
    <input hidden id="dataStatus" value="{{ $sale->status }}" class="form-control " style="display:none;">

    <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h3 id="myModalLabel"> @lang('site.add-new-item') </h3>
                </div>
                <div class="modal-body" style="direction:rtl;">
                    <div class="form-group">
                        <label>@lang('site.selectProduct')</label>
                        <select id="dataProduct" class="form-control">
                            <option>@lang('site.selectProduct')</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>@lang('site.selectOption')</label>
                        <select id="dataoption" class="form-control">
                            <option>@lang('site.selectOption')</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>@lang('site.price')</label>
                        <input id="dataprice" readonly type="number" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>@lang('site.quantity')</label>
                        <input required id="qty" type="number" class="form-control">
                    </div>



                    <div class="col-sm-12 form-group">
                        <input type="submit" id="SaveItem" class="btn btn-primary" value="@lang('site.save')"
                            style="float:left;">
                    </div>
                </div>

                <div class="modal-footer">

                </div>
            </div>
        </div>
    </div>
    <link href="{{ asset('adminpanel/assets/css/plugins/sweetalert/sweetalert.css') }}" rel="stylesheet">
    <script src="{{ asset('adminpanel/assets/js/plugins/sweetalert/sweetalert.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            var dataStatus = $("#dataStatus").val();
            $("#orderStatus").bind('change', function() {
                var value = $("#orderStatus").children("option:selected").val();
                $("#orderStatus").val(value);
                console.log(value);
                $("#dataStatus").val(value)
                dataStatus = value;
            });


            $("#btn").click(function() {
                $.ajax({
                    type: 'GET', //THIS NEEDS TO BE GET
                    url: "/product/get_products",

                    success: function(data) {
                        console.log(data);
                        //     $("#dataProduct").html('');
                        for (var i = 0; i < data.length; i++) {
                            var product = data[i];

                            $("#dataProduct").append(
                                '<option value =' + product.id + '>' + product.name +
                                '  </option>'
                            );
                        }

                    }

                });
                $("#myModal").modal('show');
            });
            $("#changeOrderStatus").click(function() {
                var dataSaleId = $("#dataSale").val();
                var emailUser = $("#emailUser").val();
                 var firstName = $("#firstName").val();
                 var lastName = $("#lastName").val();
                var form_data_status = {
                    id: dataSaleId,
                    status: dataStatus,
                    emailUser : emailUser,
                    firstName : firstName,
                    lastName : lastName

                };
                // console.log(form_data_status)

                $.ajax({
                    type: 'POST', //THIS NEEDS TO BE GET

                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: '<?php echo url('sales/changeOrderStatus'); ?>',
                    data: form_data_status,

                    success: function(data) {
                        console.log("dataFromController",data);
                        location.href = "/orders";
                            $("#dataProduct").html('');


                    }

                });

            });


        });


        $(document).ready(function() {
            $("#dataProduct").bind('change', onProductChange);
            onProductChange($("#dataProduct"));
        });

        function onProductChange(e) {
            var value = $("#dataProduct").children("option:selected").val();
            $("#dataproduct").val(value);
            console.log(value);

            $.ajax({
                type: 'GET', //THIS NEEDS TO BE GET
                url: "{{ url('product/get_options') }}/" + value + "",

                success: function(data) {
                    console.log(data);
                    $('#dataoption')
                        .find('option')
                        .remove();
                    $("#dataoption").append(
                        '<option >  Select </option>'
                    );
                    for (var i = 0; i < data.titles.length; i++) {
                        var product = data.titles[i];

                        $("#dataoption").append(
                            '<option value =' + data.prices[i] + '>  ' + data.titles[i] + '   </option>'
                        );
                    }

                }

            });
        }
        $(document).ready(function() {
            $("#dataoption").bind('change', onOptionChange);
            onOptionChange($("#dataoption"));
        });

        function onOptionChange(e) {
            var text = $("#dataoption").children("option:selected").text();
            $("#datatitle").val(text);
            var value = $("#dataoption").children("option:selected").val();
            $("#dataprice").val(value);



        }

        $("body").on("click", "#SaveItem", function() {
            console.log("click");

            var dataSale = $("#dataSale").val();
            var datatitle = $("#datatitle").val();
            var dataprice = $("#dataprice").val();
            var dataproduct = $("#dataproduct").val();
            var qty = $("#qty").val();
            var msg = "";
            if (qty == 0) {
                msg += "الكمية مطلوب<br>";
            }
            if (msg) {
                $("#myModal").modal('hide');

                swal("", msg, "error");
                return false;
            }
            var form_data = {
                dataSale: dataSale,

                datatitle: datatitle,
                dataprice: dataprice,
                dataproduct: dataproduct,
                qty: qty,

            };

            $("#SaveItem").html('<i class="fa fa-spinner fa-spin" style="font-size:18px"></i>');
            $.ajax({
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '<?php echo url('sales/saveitem'); ?>',
                data: form_data,
                success: function(msg) {

                    $("#myModal").modal('hide');
                    location.reload();

                    swal({
                        title: '',
                        type: 'success',
                        text: 'Successfuly Add Product'
                    });

                }
            });




        });

        $("body").on("click", ".deleteHoldOrder", function() {
            $(this).parent(".holdt").remove();

            var form_dataa = {
                sid: $(this).attr("data-sid"),
                pr: $(this).attr("data-pr")
            }
            $.ajax({
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '<?php echo url('sales/deleteitem'); ?>',
                data: form_dataa,
                success: function(msg) {
                    console.log(msg);
                }
            });

        });
    </script>
@endsection
