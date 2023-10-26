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
                        <div class="col-sm-12">
                            @php
                                $invoiceAddress = json_decode($sale->invoiceAddress);
                            @endphp

                            <h3> @lang('site.From'): <strong>{{ $sale->name }} </strong> </h3>
                            <address @if (app()->getLocale() == 'ar') style="text-align: end; direction: ltr;" @endif>
                                <br>
                                @if (isset($invoiceAddress->street))
                                    <span>Address: {{ $invoiceAddress->street }}, {{ $invoiceAddress->zipCode }}
                                        {{ $invoiceAddress->city }} {{ $invoiceAddress->country }}</span><br>
                                @endif

                                @if (isset($invoiceAddress->phone))
                                    <abbr title="Phone">Phone:</abbr> {{ $invoiceAddress->phone }}<br>
                                @endif
                                @if (isset($invoiceAddress->email))
                                    <abbr title="Email">Email:</abbr> {{ $invoiceAddress->email }}
                                @endif
                                <input hidden name="phone" type="text" value="{{ $invoiceAddress->phone }}">
                                <input hidden name="email" type="text" value="{{$invoiceAddress->email}}">
                                <input hidden name="firstName" type="text" value="{{ $invoiceAddress->firstName }}">
                                <input hidden name="lastName" type="text" value="{{$invoiceAddress->lastName}}">

                                <div style="margin-top: 20px;  display: flex; flex-direction: column;  align-items: flex-end;">
                                <label for="">@lang('site.street_and_number')</label>
                                <input name="street" type="text" value="{{ $invoiceAddress->street }}">
                                </div>
                              <div style="margin-top: 10px;     display: flex; flex-direction: column;  align-items: flex-end;">
                                  <label for="">@lang('site.zip_codes')</label>
                                <input  name="zipCode" type="text" value="{{ $invoiceAddress->zipCode }}">
                              </div>
                               <div style="margin-top: 10px;  display: flex; flex-direction: column;  align-items: flex-end;">
                               <label for="">@lang('site.city')</label>
                                <input name="city" type="text" value="{{ $invoiceAddress->city }}">
                               </div>
                               <div style="margin-top: 10px;  display: flex; flex-direction: column;  align-items: flex-end;">
                               <label for="">@lang('site.country')</label>
                                <input name="country" type="text" value="{{ $invoiceAddress->country }}">
                               </div>
                           
                            </address>
                        </div>

                    </div>

                    <div class="col-sm-6 text-right">
                        <h4>@lang('site.invoice_no').</h4>
                        <h4 class="text-navy"><a href="{{ url('sales/receipt/' . $sale->id) }}">
                                {{ $sale->invoice_no }}</a>
                        </h4>

                        <p>
                            <span><strong>@lang('site.date'):</strong> <?php echo date('d M, Y', strtotime($sale->created_at)); ?></span><br />
                        </p>
                    </div>
                </div>

                <form>
                    <div class="table-responsive m-t">
                        <table class="table invoice-table" id="add_items">
                            <thead>
                                <tr>
                                    <th>@lang('site.product_name')</th>
                                    <th>@lang('site.quantity')</th>
                                    <th>@lang('site.price')</th>
                                    <th>@lang('site.total_price')</th>
                                    <th>@lang('site.action')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (!empty($products))
                                    @foreach ($products as $pro)
                                        <tr class="holdt">
                                            <td>{{ $pro['translation']->name }}({{ $pro['size'] }})</td>
                                            <td> <input type="text"
                                                    class="form-control item_name"name="qtys[{{ $pro['product_id'] }}]"
                                                    value="{{ $pro['quantity'] }}"> </td>
                                            <td>{{ $currency }}{{ $pro['price'] }}</td>
                                            <td>{{ $currency }}{{ $pro['quantity'] * $pro['price'] }}</td>
                                            <td><a class="deleteHoldOrder" data-sid="{{ $sale->id }}"
                                                    data-pr="{{ $pro['product_id'] }}" href=""><i
                                                        class="fa fa-trash "></i></a></td>
                                        </tr>
                                        <input hidden value="{{ $pro['product_id'] }}" name="id[]">
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
                    <input class="btn btn-primary" type="submit" value="@lang('site.save')">
                </form>
                <button type="button" class="btn btn-primary" id="btn"><i class="fa fa-plus"></i> @lang('site.add-new-item')
                </button>
                <table class="table invoice-total">
                    <tbody>
                        <tr>
                            <td><strong>@lang('site.Sub_Total') :</strong></td>
                            <td>{{ $currency }}{{ $sale->subtotal }}</td>
                        </tr>
                        <tr>
                            <td><strong>@lang('site.TAX') :</strong></td>
                            <td>{{ $currency }}{{ $sale->vat }}</td>
                        </tr>

                        <tr>
                            <td><strong>@lang('site.Delivery_Cost') :</strong></td>
                            <td>{{ $currency }}{{ $sale->delivery_cost }}</td>
                        </tr>


                        <tr>
                            <td><strong>@lang('site.DISCOUNT') :</strong></td>
                            <td>{{ $currency }}{{ $sale->discount }}</td>
                        </tr>
                        <tr>
                            <td><strong>@lang('site.TOTAL') :</strong></td>
                            <td>{{ $currency }}{{ $sale->subtotal + $sale->vat + $sale->delivery_cost }}</td>
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
    <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                        <input id="dataprice" required type="number" class="form-control">
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
         var sid = $("#sid").val();
        $(document).ready(function() {
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
                url: '<?php echo url('sales/saveitem/'); ?>',
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

        $("body").on("click", ".deleteHoldOrder", function(e) {
            e.preventDefault();
            var sid = $(this).attr("data-sid");
            var pr = $(this).attr("data-pr");

            var form_data = {
                _token: $('meta[name="csrf-token"]').attr('content'),
                sid: sid,
                pr: pr
            };

            $.ajax({
                type: 'POST',
                url: '{{ url('sales/deleteitem') }}',
                data: form_data,
                success: function(msg) {
                    console.log(msg);
                    // Add code here to update the UI or perform any other actions
                },
                error: function(xhr, status, error) {
                    console.log(xhr.responseText);
                }
            });
        });
    </script>



@endsection
