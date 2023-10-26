@extends('layouts.app')

@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>@lang('site.Add_Product')</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="{{url('')}}">@lang('site.home')</a>
                        </li>
                        <li>
                             <a href="{{url('products')}}">@lang('site.products')</a>
                        </li>
                        <li class="active">
                            <strong>@lang('site.add_new')</strong>
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
                            <h5>@lang('site.Add_Product')</h5>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>


                            </div>
                        </div>
						<div class="ibox-content">
						<form action="{{ url('customers') }}" class="form-horizontal" method="POST" enctype='multipart/form-data'>
                        {{ csrf_field() }}


								<div class="form-group">
                            <label class="col-sm-2 control-label" for="name">@lang('site.name')</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                        </div>
						<div class="hr-line-dashed"></div>

                        {{-- <div class="form-group">
                            <label for="email" class="col-sm-2 control-label">@lang('site.email')</label>
                            <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}">
                        </div> --}}
						<div class="hr-line-dashed"></div>

                        <div class="form-group">
                            <label for="phone" class="col-sm-2 control-label">@lang('site.phone')</label>
                            <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') }}">
                        </div>
						<div class="hr-line-dashed"></div>

                        <div class="form-group">
                            <label for="address" class="col-sm-2 control-label">@lang('site.address')</label>
                            <input class="form-control" id="address" name="address[]" value="{{ old('address[]') }}" />
                        </div>
						<div class="hr-line-dashed"></div>

								 <div class="form-group">
                                    <div class="col-sm-4 col-sm-offset-2">

										 <a class="btn btn-white" href="{{ url('products') }}">@lang('site.cancel')</a>
                                        <button class="btn btn-primary" type="submit">@lang('site.Save_changes')</button>
                                    </div>
                                </div>


                            </form>
                        </div>
                    </div>
                </div>
            </div>
			</div>

@endsection
