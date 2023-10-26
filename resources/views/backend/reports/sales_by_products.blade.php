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
                        <h5>@lang('site.product_by_sale')</h5>
                       
                    </div>
                    <div class="ibox-content">

                        <div class="table-responsive">
                   <table class="table table-striped export_table" id="report">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>@lang('site.product_name')</th>
                            <th>@lang('site.sales')</th>
                        </tr>
                    </thead>
                    <tbody>
                    @if (!empty($sales_by_product))
                        @forelse ($sales_by_product as $key => $item)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $item->product_name }}</td>
                                <td>{{ $item->total_sales }}</td>
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
                        </div>
<div class="text-right">
	<!--<a href="javascript:void(0);"  class="btn btn-sm btn-info export">@lang('site.download_csv')</a>-->
	<!--<a target="_blank" href="?pdf=yes"  class="btn btn-sm btn-warning">@lang('site.download_pdf')</a>-->
</div>

<script> 
$(document).ready(function () {

    function exportTableToCSV($table, filename) {

        var $rows = $table.find('tr:has(th,td)').not("#notslect"),

            // Temporary delimiter characters unlikely to be typed by keyboard
            // This is to avoid accidentally splitting the actual contents
            tmpColDelim = String.fromCharCode(11), // vertical tab character
            tmpRowDelim = String.fromCharCode(0), // null character

            // actual delimiter characters for CSV format
            colDelim = '","',
            rowDelim = '"\r\n"',

            // Grab text from table into CSV formatted string
            csv = '"' + $rows.map(function (i, row) {
                var $row = $(row),
                    $cols = $row.find('td,th');

                return $cols.map(function (j, col) {
                    var $col = $(col),
                        text = $col.text();

                    return text.replace(/"/g, '""'); // escape double quotes

                }).get().join(tmpColDelim);

            }).get().join(tmpRowDelim)
                .split(tmpRowDelim).join(rowDelim)
                .split(tmpColDelim).join(colDelim) + '"',

            // Data URI
            csvData = 'data:application/csv;charset=utf-8,' + encodeURIComponent(csv);

        $(this)
            .attr({
            'download': filename,
                'href': csvData,
                'target': '_blank'
        });
    }

    // This must be a hyperlink
    $(".export").on('click', function (event) {
        // CSV
       var name = $(".no-margin-bottom").html();
        exportTableToCSV.apply(this, [$('.export_table'),'sales_by_product.csv']);
        
        // IF CSV, don't do event.preventDefault() or return false
        // We actually need this to be a typical hyperlink
    });
});
		
	</script>
                 </div>
                </div>
            </div>
            
             <div class="col-md-4">
            <div class="panel panel-default">
                 <div class="ibox-title">
                        <h5>@lang('site.date_range')</h5>
                        
                    </div>
                 <div class="ibox-content">    
                    <form action="{{ url('reports/sales_by_products') }}" method="GET">
                        <div class="form-group">
                            <label for="price">@lang('site.date_range')</label>
                            <select class="form-control" id="date-range" name="date_range">
                                <option>@lang('site.select_date_range')</option>
                                <option value="today" {{ ($input['date_range'] == 'today') ? 'selected="selected"' : '' }}>@lang('site.today')</option>
                                <option value="current_week" {{ ($input['date_range'] == 'current_week') ? 'selected="selected"' : '' }}>@lang('site.this_week')</option>
                                <option value="current_month" {{ ($input['date_range'] == 'current_month') ? 'selected="selected"' : '' }}>@lang('site.this_month')</option>
                                <option value="custom_date" {{ ($input['date_range'] == 'custom_date') ? 'selected="selected"' : '' }}>@lang('site.custom_date')</option>
								
								
                            </select>
                        </div>
						
						<div class="form-group" id="data_5">
                                <label class="font-noraml">@lang('site.Range_select')</label>
                                <div class="input-daterange input-group" id="datepicker">
                                    <input type="text" class="input-sm form-control" name="start" value="{{(!empty($input['start']) and $input['start'] !=  '') ? $input['start'] : '' }}"/>
                                    <span class="input-group-addon">to</span>
                                    <input type="text" class="input-sm form-control" name="end" value="{{ (!empty($input['end']) and $input['end'] !=  '') ? $input['end'] : '' }}" />
                                </div>
                            </div>

                        

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">@lang('site.search')</button>
                        	<a  class="btn btn-sm btn-info" id="DownloadPDF"> @lang('site.download_pdf') </a>

                        </div>
                    </form>
                </div>
            </div>
        </div>
            </div>
           
</div>
	 <!-- Data picker -->
   <script src="{{url('assets/js/plugins/datapicker/bootstrap-datepicker.js')}}"></script>
	    <script src="{{url('assets/js/plugins/dataTables/datatables.min.js')}}"></script>
	    <script src="{{asset('adminpanel/assets/js/plugins/html2pdf/html2pdf.bundle.min.js')}}"></script>

    <script src="{{url('assets/js/plugins/fullcalendar/moment.min.js')}}"></script>
    <script src="{{url('assets/js/plugins/daterangepicker/daterangepicker.js')}}"></script>
	    <script>
	    	$("body").on("click" , "#DownloadPDF" , generatePDF);
	    function generatePDF() {
        // Choose the element that our invoice is rendered in.
        const element = document.getElementById("report");

        // Choose the element and save the PDF for our user.

        const pdfName = 'report_salesBy product' ;

        html2pdf()
            .set({ html2canvas: { scale: 4 } })
            .from(element)
            .save(pdfName);
    }

        $(document).ready(function(){
            $('.dataTables-example').DataTable({
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                    { extend: 'copy'},
                    {extend: 'csv'},
                    {extend: 'excel', title: 'ExampleFile'},
                    

                    {extend: 'print',
                     customize: function (win){
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

        
    </script>

			<script> 
			$('#data_5 .input-daterange').datepicker({
                keyboardNavigation: false,
                forceParse: false,
                autoclose: true
            });
			</script>
@endsection
