
@extends('layouts.app')

@section('content')

<link href="assets/css/plugins/dataTables/datatables.min.css" rel="stylesheet">

 <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>@lang('site.pages') </h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="{{url('')}}">@lang('site.home')</a>
                        </li>
                     
                        <li class="active">
                            <strong>@lang('site.pages')</strong>
                        </li>
                    </ol>
                </div>
                <div class="col-lg-2">

                </div>
            </div>
                                 
                                    <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>@lang('site.Informationen')</h5>
                        <div class="ibox-tools">
						<!-- <a href="{{ url('products/create') }}" class="btn btn-primary btn-xs">Add New</a> -->
						
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
							
                          
                           
                        </div>
                    </div>
                    <div class="ibox-content">

                        <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover dataTables-example" >
					
					 <thead>
                        <tr>
                        <th>@lang('site.slug')</th>
                    <th>@lang('site.title')</th>
                      <th>@lang('site.language_name')</th>
                    <th>@lang('site.description')</th>
                    <th>@lang('site.options')</th>
                    
                </tr>
                    </thead>
                    <tbody id="sortableItems">
                <?php foreach ($pages as $row) { ?>
                    <?php if($row->slug !="AGB" && $row->slug !="Datenschutz" && $row->slug !="Widerrufsrecht" && $row->slug !="AGB für Freunde werben" && $row->slug !="Impressum" ) { ?>
                    <tr class="gradeX" data-id="{{ $row->id }}">
                    <td><?php echo $row->slug; ?></td>
                        <td><?php echo $row->title; ?></td>
                        <td><?php echo $row->language; ?></td>
                        <td> <?php echo substr($row->body, 0, 100) . "..."; ?> </td>
                       

                        <td> 
                            <a data-id="1" href="<?php echo url("pages/edit/" . $row->id); ?>" > <i class="fa fa-edit"> </i> </a>
                            <a target="_blank" href="#" > <i class="fa fa-eye "> </i> </a> 
                           
                        </td>
                    </tr>
                    <?php  } ?>
                <?php } ?>

            </tbody>
        
                    
                    </table>
                        </div>

                    </div>
                </div>
            </div>
            </div>


            <div class="row">
                <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>@lang('site.LegalInformation')</h5>
                        <div class="ibox-tools">
						<!-- <a href="{{ url('products/create') }}" class="btn btn-primary btn-xs">Add New</a> -->
						
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
							
                          
                           
                        </div>
                    </div>
                    <div class="ibox-content">

                        <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover dataTables-example" >
					
					 <thead>
                        <tr>
                        <th>@lang('site.slug')</th>
                    <th>@lang('site.title')</th>
                      <th>@lang('site.language_name')</th>
                    <th>@lang('site.description')</th>
                    <th>@lang('site.options')</th>
                    
                </tr>
                    </thead>
                    <tbody id="sortableItemstow">
                <?php foreach ($pages as $row) { ?>
                    <?php if($row->slug =="AGB" || $row->slug =="Datenschutz" || $row->slug =="Widerrufsrecht" || $row->slug =="AGB für Freunde werben" || $row->slug =="Impressum" ) { ?>
                    <tr  class="gradeX" data-id="{{ $row->id }}">
                    <td><?php echo $row->slug; ?></td>
                        <td><?php echo $row->title; ?></td>
                        <td><?php echo $row->language; ?></td>
                        <td> <?php echo substr($row->body, 0, 100) . "..."; ?> </td>
                       

                        <td> 
                            <a data-id="1" href="<?php echo url("pages/edit/" . $row->id); ?>" > <i class="fa fa-edit"> </i> </a>
                            <a target="_blank" href="#" > <i class="fa fa-eye "> </i> </a> 
                           
                        </td>
                    </tr>
                    <?php  } ?>
                <?php } ?>

            </tbody>
        
                    
                    </table>
                        </div>

                    </div>
                </div>
            </div>
            </div>
           
        </div>



         <!--adding sortableJs script tag by Aliwi-->
         <script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>
    <script>


        var options = {
            group: 'share',
            animation: 100,
             store: {
    /**
     * Get the order of elements. Called once during initialization.
     * @param   {Sortable}  sortable
     * @returns {Array}
     */
    get: function (sortable) {
      var order = localStorage.getItem(sortable.options.group.name);
      return order ? order.split("|") : [];
    },

    /**
     * Save the order of elements. Called onEnd (when the item is dropped).
     * @param {Sortable}  sortable
     */
    set: function (sortable) {
      var order = sortable.toArray();
      var token = $('meta[name="csrf-token"]').attr('content');
      var sort = [];
      $('tr.gradeX').each(function(index,element) {
                        sort.push({
                            id: $(this).attr('data-id'),
                            position: index+1
                        });
                    });

                    $.ajax({
                        type: "POST",
                        dataType: "json",
                        url: "{{ url('post-sortable-page') }}",
                        data: {
                            sort: sort,
                            _token: token
                        },
                        success: function(response) {
                            console.log(response);
                        }
                    });


      localStorage.setItem(sortable.options.group.name, order.join("|"));
    },
  },
 };

        events = [
            'onChoose',
            'onStart',
            'onEnd',
            'onAdd',
            'onUpdate',
            'onSort',
            'onRemove',
            'onChange',
            'onUnchoose'
        ].forEach(function (name) {
            options[name] = function (evt) {

            };
        });
        Sortable.create(sortableItems, options);
    </script>

<script>


var options = {
    group: 'share',
    animation: 100,
     store: {
/**
* Get the order of elements. Called once during initialization.
* @param   {Sortable}  sortable
* @returns {Array}
*/
get: function (sortable) {
var order = localStorage.getItem(sortable.options.group.name);
return order ? order.split("|") : [];
},

/**
* Save the order of elements. Called onEnd (when the item is dropped).
* @param {Sortable}  sortable
*/
set: function (sortable) {
var order = sortable.toArray();
var token = $('meta[name="csrf-token"]').attr('content');
var sort = [];
$('tr.gradeX').each(function(index,element) {
                sort.push({
                    id: $(this).attr('data-id'),
                    position: index+1
                });
            });

            $.ajax({
                type: "POST",
                dataType: "json",
                url: "{{ url('post-sortable-page') }}",
                data: {
                    sort: sort,
                    _token: token
                },
                success: function(response) {
                    console.log(response);
                }
            });


localStorage.setItem(sortable.options.group.name, order.join("|"));
},
},
};

events = [
    'onChoose',
    'onStart',
    'onEnd',
    'onAdd',
    'onUpdate',
    'onSort',
    'onRemove',
    'onChange',
    'onUnchoose'
].forEach(function (name) {
    options[name] = function (evt) {

    };
});
Sortable.create(sortableItemstow, options);
</script>







      


















       
       
        <script src="assets/js/plugins/dataTables/datatables.min.js"></script>

   
    <script>
        $(document).ready(function(){
            $('.dataTables-example').DataTable({
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                    { extend: 'copy'},
                    {extend: 'csv'},
                    {extend: 'excel', title: 'Products'},
                    {extend: 'pdf', title: 'Products'},

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
    
        
<?php

function clean($string) 
{
    $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.

    return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
}
?>

@endsection
