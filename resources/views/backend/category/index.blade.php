@extends('layouts.app')

@section('content')

<link href="assets/css/plugins/dataTables/datatables.min.css" rel="stylesheet">
 <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>@lang('site.categories') </h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="{{url('')}}">@lang('site.home')</a>
                        </li>
                     
                        <li class="active">
                            <strong>@lang('site.categories')</strong>
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
                        <h5>@lang('site.categories')  </h5>
                        <div class="ibox-tools">
                   <input id="search-categories"  style="display:inline; width:25%" class="form-control" placeholder="search"/>

						<a href="{{ url('categories/create') }}" class="btn btn-primary btn-xs">@lang('site.add_new')</a>
						
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
							
                          
                           
                        </div>
                    </div>
                    <div class="ibox-content">

                        <div class="table-responsive">
                    <table id="table" class="table table-striped table-bordered table-hover" >
					
					 <thead>
                        <tr>
                             <th>#</th>
                            <th>@lang('site.Image')</th>
                            <th>@lang('site.name')</th>
                            <th></th>
                        </tr>
                    </thead>
                    <!--adding sortableItems id by Aliwi-->
                    <tbody id="sortableItems"  class="dynamic_row">
                    @forelse ($categories as $key => $category)

                        <tr class="gradeX" data-id="{{ $category->id }}">
                             <td>{{ $categories->firstItem() + $key }}</td>
                             <td><img width="70" id="image_source"  src="<?php echo url("uploads/category/thumb/" . $category->id . ".jpg?rand=".rand(0, 100)); ?>"></td>
                            <td>@if(!empty($category->translation->name)) {{ $category->translation->name }} @else {{ $category->name }} @endif</td>
                           
                            <td>
                                <form id="delete-customer" action="{{ url('categories/' . $category->id) }}" method="POST" class="form-inline">
                                    <input type="hidden" name="_method" value="delete">
                                    {{ csrf_field() }}
                                    <input type="submit" value="@lang('site.delete')" class="btn btn-danger btn-xs pull-right btn-delete">
                                </form>
                                <a href="{{ url('categories/' . $category->id . '/edit') }}" class="btn btn-primary btn-xs pull-right">@lang('site.Edit')</a>
                            </td>
                        </tr>
                    @empty
                       <tr> 
						  <td colspan="5">@lang('site.no_record_found') </td></tr>
                    @endforelse
						<tr> 
						  <td colspan="5">
						{!! $categories->render() !!}
						</td>
								</tr>
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
        store:
            {
                get: function (sortable) {
                  var order = localStorage.getItem(sortable.options.group.name);

                  return order ? order.split("|") : [];
                },


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
                        url: "{{ url('post-sortable') }}",
                        data: {
                            sort: sort,
                            _token: token
                        },
                        success: function(response) {
                            if (response.status == "success") {
                                console.log(response);
                            } else {
                                console.log(response);
                            }
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
        $('body').on('keyup','#search-categories',function(){
            var searchQuery = $(this).val();
            $.ajax({
                method:'Post',
                url:'<?php echo url("category/search"); ?>' ,
                dataType : 'json' ,
                data : {
                    '_token' : '{{ csrf_token() }}',
                    searchQuery :searchQuery
                } ,
                success :function(res){
                    console.log(res);
                    var tableRow ='';
                    $('.dynamic_row').html('');
                    $.each(res, function(index,value){
                        var imgsrc = 'uploads/category/thumb/'+value.category_id+'.jpg';
                        tableRow ='<tr class="gradeX" ><td>'+value.id+'</td><td><img width="70" id="image_source"  src='+imgsrc+'></td><td>'+value.name+'</td><td><form id="delete-customer" action="{{ url('categories/') }} '+ value.category_id +'" method="POST" class="form-inline"><input type="hidden" name="_method" value="delete">{{ csrf_field() }}<input type="submit" value="@lang('site.delete')" class="btn btn-danger btn-xs pull-right btn-delete"></form><a href="{{ url('categories') }}/'+ value.category_id + '/edit' +'" class="btn btn-primary btn-xs pull-right">@lang('site.Edit')</a></td></tr>';
                       $('.dynamic_row').append(tableRow);
                    });
                    
                }
            });
        });
    </script>

    {{--<script>
        $(function () {
            $("#table").DataTable();

            $( "#sortableItems" ).sortable({
                items: "tr",
                cursor: 'move',
                opacity: 0.6,
                update: function() {
                    sendOrderToServer();
                }
            });

            function sendOrderToServer() {
                var order = [];
                var token = $('meta[name="csrf-token"]').attr('content');
                $('tr.gradeX').each(function(index,element) {
                    order.push({
                        id: $(this).attr('data-id'),
                        position: index+1
                    });
                });

                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: "{{ url('post-sortable') }}",
                    data: {
                        order: order,
                        _token: token
                    },
                    success: function(response) {
                        if (response.status == "success") {
                            console.log(response);
                        } else {
                            console.log(response);
                        }
                    }
                });
            }
        });
    </script>--}}
@endsection
