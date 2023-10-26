@extends('layouts.app')

@section('content')

<link href="assets/css/plugins/dataTables/datatables.min.css" rel="stylesheet">

 <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>@lang('site.Customers') </h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="{{url('')}}">@lang('site.home')</a>
                        </li>

                        <li class="active">
                            <strong>@lang('site.Customers')</strong>
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
                        <h5>@lang('site.Customers')  </h5>
                        <div class="ibox-tools">
						<a href="{{ url('customers/create') }}" class="btn btn-primary btn-xs">@lang('site.add_new')</a>

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
                             <th>#</th>
                            <th>@lang('site.name')</th>
                            <th>@lang('site.phone')</th>
                            <th>@lang('site.titles')</th>
                            <th>@lang('site.activation_state')</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @forelse ($customers as $key => $customer)
                        <tr class="gradeX">
                            {{-- {{dd($customer)}} --}}
                             <td>{{ $customers->firstItem() + $key }}</td>
                            <td>{{ $customer->name }}</td>
                            <td>{{ $customer->phone }}</td>
                            <td>
                                @if (!empty($customer->address) && is_array(json_decode($customer->address)))
                                    @foreach (json_decode($customer->address) as $address)
                                        {{$address}} <br/>
                                    @endforeach
                                @else
                                    <strong>_</strong>
                                @endif

                            </td>
                            <td>@lang( ($customer->activation)?'site.active':'site.inactive' )  </td>
                            <td>
                                <form id="delete-customer" action="{{ url('customers/' . $customer->id) }}" method="POST" class="form-inline">
                                    <input type="hidden" name="_method" value="delete">
                                    {{ csrf_field() }}
                                    <input type="submit" value="@lang('site.delete')" class="btn btn-danger btn-xs pull-right btn-delete">
                                </form>
                                <a href="{{ url('customers/' . $customer->id . '/edit') }}" class="btn btn-primary btn-xs pull-right">@lang('site.Edit')</a>
                            </td>
                        </tr>
                    @empty
                        @include('backend.partials.table-blank-slate', ['colspan' => 5])
                    @endforelse
                    </tbody>


                    </table>
                        </div>

                    </div>
                </div>
            </div>
            </div>

        </div>


	    <script src="assets/js/plugins/dataTables/datatables.min.js"></script>


    <script>
        $(document).ready(function(){
            $('.dataTables-example').DataTable({
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                    { extend: 'copy'},
                    {extend: 'csv'},
                    {extend: 'excel', title: 'ExampleFile'},
                    {extend: 'pdf', title: 'ExampleFile'},

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


@endsection
