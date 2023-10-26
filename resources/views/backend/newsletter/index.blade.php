@extends('layouts.app')

@section('content')
<link href="assets/css/plugins/dataTables/datatables.min.css" rel="stylesheet">
 <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>@lang('site.subscribers') </h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="{{url('')}}">@lang('site.home')</a>
                        </li>
                     
                        <li class="active">
                            <strong>@lang('site.subscribers')</strong>
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
                        <h5>@lang('site.subscribers')  </h5>
                        <div class="ibox-tools">

						<a href="{{ url('newsletter/sendEmail') }}" class="btn btn-primary btn-xs">@lang('site.send_email')</a>
						
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
							
                          
                           
                        </div>
                    </div>
                    <div class="ibox-content">

                        <div class="table-responsive">
                        <table id="table" class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                <th>#</th>
                                <th>@lang('site.email')</th>
                                </tr>
                            </thead>
                            <tbody id="sortableItems" class="dynamic_row">
                                @forelse ($subscribers as $key => $subscriber)
                                <tr class="gradeX" data-id="{{ $subscriber->id }}">
                                <td>{{ $subscribers->firstItem() + $key }}</td>
                                <td>{{ $subscriber->email }}</td>
                                </tr>
                                @empty
                                <tr>
                                <td colspan="5">@lang('site.no_record_found')</td>
                                </tr>
                                @endforelse
                            </tbody>
                            <tfoot>
                                <tr>
                                <td colspan="5">
                                    <div style="float: right;">
                                    <span class="text-muted">@lang('site.page'):</span>
                                    <span class="mx-1">{{ $subscribers->currentPage() }}</span>
                                    <span class="text-muted">@lang('site.of')</span>
                                    <span class="mx-1">{{ $subscribers->lastPage() }}</span>
                                    </div>
                                    {!! $subscribers->render() !!}
                                </td>
                                </tr>
                            </tfoot>
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


@endsection
