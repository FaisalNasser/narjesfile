<div class="body">

    <?php $currency = setting_by_key("currency"); ?>
    <div class="page">
        <br>
        <br>
        <table width="80%" cellpadding="10" class="tableS" cellspacing="10"
               style="font-family: Times New Roman; font-size: 11.5px !important;margin-left:20px">
            <tr>
                <td colspan="2" style="text-align:center" class="noborder"><img src="{{url('uploads/order_logo.jpg?r=' . rand(0,999))}}"
                                                                                width="220" alt="PRA"></td>

            </tr>

        </table>

        <table width="90%" cellpadding="10" class="tableS" cellspacing="10"
               style="font-family: Times New Roman; font-size: 11.5px !important;margin-left:20px;">
            <thead>

            <tr>
                <td colspan="3" class="noborder"><strong>@lang('site.date')</strong> <?php echo date('d M, Y'); ?>

                </td>
                <td colspan="3" class="noborder" align="right">
                    <p><strong>@lang('site.time')</strong> <?php echo date('h:i A'); ?></p>
                </td>
            </tr>
            <tr>
                <td colspan="1"></td>
                <td colspan="5" dir="rtl">
                    @if ($sale->card_number)
                    <p ><strong>@lang('site.card_number')</strong> {{ $sale->card_number }} <br/></p> 
                @endif
                </td>
            </tr>
            <tr>
              <td class="noborder" colspan="3"><strong>@lang('site.invoice_no')</strong> {{ $sale->id }}</td>
                 @if(!empty($sale->type))
                   <td colspan="3" class="noborder" align="right">
                    <strong>@lang('site.type')</strong>
                    @if( $sale->type == "pos") @lang('site.order_store') @endif
                    @if( $sale->type == "order") @lang('site.order_home') @endif </td>
                    @endif         
                    
                    </tr>
                    @if(!empty($client))
                    <tr>
<td colspan="3" class="noborder"><strong>@lang('site.name')</strong>{{$client->name}} 

                </td>
                <td colspan="4" class="noborder" align="right">
                    <strong>@lang('site.phone')</strong>{{$client->phone}} </td>    @endif     
                    </tr>
            <tr>
                <td colspan="5" class="noborder">&nbsp;</td>
            </tr>
            <tr>
                <td width="15"><strong>@lang('site.s_no')</strong></td>
                <td width="150"><strong>@lang('site.menu')</strong></td>
                <td id="kitchenph" width="100"><strong>@lang('site.unit_price')</strong></td>
                <td width="15"><strong>@lang('site.qty')</strong></td>
                <td id="kitchentotalh" width="60"><strong>@lang('site.TOTAL')</strong></td>
            </tr>
            </thead>

             <?php $cart = json_decode($sale->cart); ?>
             <?php $i = 1; ?>
             @if(!empty($cart))
           @foreach($cart as $row)

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
                    <td width="100"><strong>{{$row->name}}({{$row->size}})</strong></td>
                    <td class="kitchen" width="50"><strong><?php echo $currency; ?>{{$row->price}}</strong></td>
                    <td width="15"><strong>{{$row->quantity}}</strong></td>

                    <td class="kitchen" width="50">
                        <strong><?php echo $currency; ?>{{ number_format($row->quantity * $row->price,2) }}</strong>
                    </td>
                </tr>
                <?php $i++;  ?>
            @endforeach
@endif

        </table>

        <table style="page-break-inside:avoid;font-family: Times New Roman; font-size: 11.5px !important;margin-left:20px"
               width="90%" cellpadding="5" class="tableS kitchen" cellspacing="5" id="kitchen">


            <?php /*<tr>
    <td></td>
    <td></td>
    <td><strong>SERVICE CHARGRES</strong></td>
    <td><strong><?php echo $invoince->service_charge_per; ?> %</strong></td>
    <td><strong><?php echo trim(str_replace(" ","",$invoince->service_charge_amt)); ?></strong></td>
    </tr>  
    <tr>
    <td></td>
    <td></td>
    <td><strong>PST</strong></td>
    <td><strong>16 %</strong></td>
    <td><strong><?php echo trim(str_replace(" ","",$invoince->inv_invoice_tax_amount)); ?></strong></td>
    </tr> */ ?>
            <hr>



            


            <tr>
                <td colspan="3"><strong>@lang('site.total_given'):</strong></td>
                <td><strong></strong></td>
                <td class="grandtotalFont">
                    <strong><?php echo $currency; ?>{{number_format($sale->total_given,2)}}</strong></td>
            </tr>
 <tr>
                <td colspan="3"><strong>@lang('site.change'):</strong></td>
                <td><strong></strong></td>
                <td class="grandtotalFont">
                    <strong><?php echo $currency; ?> {{ $sale->changing}} </strong></td>
            </tr>
            

            <tr>
                <td colspan="3"><strong>@lang('site.grand_total'):</strong></td>
                <td><strong></strong></td>
                <td class="grandtotalFont">
                    <strong><?php echo $currency; ?>{{number_format($sale->amount,2)}}</strong>
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
                    <strong>@lang('site.thanks_visting') {{setting_by_key('title')}}, {{setting_by_key('address')}}
                        , {{setting_by_key('phone')}}</strong></td>

            </tr>


        </table>


    </div>

</div>
<p align="center"><input type="button" id="pr" value="Print" onclick="printpage()" class="btn btn-success"/></p>
<p align="center"><a style="text-align:center" href="{{url('sales/create')}}"> @lang('site.back') </a></p>


</center>


<script type="text/javascript">
    function printpage() {
        //Get the print button and put it into a variable
        var printButton = document.getElementById("pr");
        // var printButtonk = document.getElementById("prK");
        //Set the print button visibility to 'hidden' 
        // printButton.style.visibility = 'hidden';
        // printButtonk.style.visibility = 'hidden';
        document.title = "";
        document.URL = "";

        //Print the page content
        window.print()
        //Set the print button to 'visible' again 
        //[Delete this line if you want it to stay hidden after printing]
        printButton.style.visibility = 'visible';
        // printButtonk.style.visibility = 'visible';


    }
</script>

<script type="text/javascript">
    function printpageK() {
        //Get the print button and put it into a variable
        var printButton = document.getElementById("pr");
        //var printButtonk = document.getElementById("prK");
        var kitchen = document.getElementsByClassName("kitchen");
        //Set the print button visibility to 'hidden' 
        for (var i = 0; i < kitchen.length; i++) {
            kitchen[i].style.visibility = "hidden";
        }
        //printButton.style.visibility = 'hidden';
        //printButtonk.style.visibility = 'hidden';

        document.title = "";
        document.URL = "";

        //Print the page content
        window.print()
        //Set the print button to 'visible' again 
        //[Delete this line if you want it to stay hidden after printing]
        printButton.style.visibility = 'visible';
        // printButtonk.style.visibility = 'visible';
        for (var i = 0; i < kitchen.length; i++) {
            kitchen[i].style.visibility = "visible";
        }

    }
</script>


<style>
    .tableS {
        margin-left: 20px;
        margin-top: 10px;
        font-family: Verdana, Geneva, sans-serif;
    }

    .tableS tr td {
        padding: 2px;
        font-family: Verdana, Geneva, sans-serif;
    }

    .tableS tr td.noborder {
        border: none;
    }

    .removeborder {
        border: none !important;
    }

    body {
        width: 100%;
        height: 100%;
        margin: 0;
        padding: 0;
        background-color: #FAFAFA;
        font: 12pt "Tahoma";
        font-family: Verdana, Geneva, sans-serif;

    }

    * {
        box-sizing: border-box;
        -moz-box-sizing: border-box;
        font-family: Verdana, Geneva, sans-serif;
    }

    .page {

        width: 12cm;
        height: auto;

        margin: 10mm auto;


        background: white;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);

        font-weight: normal;
        font-size: 9px !important;
        font-family: Verdana, Geneva, sans-serif;

    }

    .font_size {
        font-size: 8em "tahoma";
        font-family: Verdana, Geneva, sans-serif;
    }

    .subpage {
        padding: 1cm;
        width: 15cm;
        height: 15.8cm;
        font-family: Verdana, Geneva, sans-serif;

    }

    .grandtotalFont {
        font-size: 10em "tahoma";
    }

    @page {
        size: auto;
        margin: 0;
        margin-top: 0;
        font-family: Verdana, Geneva, sans-serif;
    }


    @media print {
        html, body {
            width: 10cm;
            height: auto;
            font-size: 8px;
            margin: 0 auto;
            font-family: Verdana, Geneva, sans-serif;

        }


        table {
            -fs-table-paginate: paginate;
            font-family: Verdana, Geneva, sans-serif;
        }


        .page {
            margin: 0;
            border: initial;
            border-radius: initial;
            width: initial;
            min-height: initial;
            box-shadow: initial;
            background: initial;
            font-family: Verdana, Geneva, sans-serif;
        }

        .removeborder {
            border: none;
        }


        .form-horizontal, label {
            font-weight: normal;
            font-size: 9px !important;
            font-family: Verdana, Geneva, sans-serif;

        }

        .testing {
            display: block;
            font-family: Verdana, Geneva, sans-serif;
            /* page-break-after: always !important;*/
        }

        .tableStyle {

            page-break-after: always !important;
            font-family: Verdana, Geneva, sans-serif;

        }

        .tableStyle:last-child {
            page-break-after: none;
            font-family: Verdana, Geneva, sans-serif;
        }

        .page table tr td {
            padding: 2px;
            font-family: Verdana, Geneva, sans-serif;
        }

        .form-horizontal, label {
            font-weight: normal;
            font-size: 9px !important;
            font-family: Verdana, Geneva, sans-serif;

        }

        .grandtotalFont {
            font-size: 10em "tahoma";
        }

    }
</style>
