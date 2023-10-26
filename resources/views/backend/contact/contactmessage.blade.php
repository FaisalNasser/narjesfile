@extends('layouts.app')

@section('content')
<link href="assets/css/plugins/dataTables/datatables.min.css" rel="stylesheet">
 <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>@lang('site.Customers_Messages') </h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="{{url('')}}">@lang('site.home')</a>
                        </li>
                     
                        <li class="active">
                            <strong>@lang('site.Customers_Messages')</strong>
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
                        <h5>@lang('site.Customers_Messages')  </h5>
                        <div class="ibox-tools">

						<!-- <a href="{{ url('newsletter/sendEmail') }}" class="btn btn-primary btn-xs">@lang('site.send_email')</a> -->
						
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
                                <th>@lang('site.name')</th>
                                <th>@lang('site.gender')</th>
                                <th>@lang('site.email')</th>
                                <th>@lang('site.phone')</th>
                                <th>@lang('site.messagetype')</th>
                                <th>@lang('site.Message')</th>
                                </tr>
                            </thead>
                            <tbody id="sortableItems" class="dynamic_row">
                                @forelse ($contact_messages as $key => $contact_message)
                                <tr class="gradeX" data-id="{{ $contact_message->id }}">
                                    <td>{{ $contact_messages->firstItem() + $key }}</td>
                                    <td>{{ $contact_message->firstname . ' ' . $contact_message->lastname }}</td>
                                    <td>{{ $contact_message->gender }}</td>
                                    <td>{{ $contact_message->email }}</td>
                                    <td>{{ $contact_message->phone }}</td>
                                    <td>{{ $contact_message->messagetype }}</td>
                                    <td>{{ $contact_message->message }}</td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5">@lang('site.no_record_found')</td>
                                </tr>
                                @endforelse

                                <!-- Add the new row at the bottom -->
                                <!-- <tr class="gradeX">
                                    <td>{{ $contact_messages->lastItem() + 1 }}</td>
                                    
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr> -->
                            </tbody>
                            <tfoot>
                                <tr>
                                <td colspan="5">
                                    <div style="float: right;">
                                    <span class="text-muted">@lang('site.page'):</span>
                                    <span class="mx-1">{{ $contact_messages->currentPage() }}</span>
                                    <span class="text-muted">@lang('site.of')</span>
                                    <span class="mx-1">{{ $contact_messages->lastPage() }}</span>
                                    </div>
                                    {!! $contact_messages->render() !!}
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

