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
                             <a href="{{url('products')}}">@lang('site.Products')</a>
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
						<form action="{{ url('suppliers') }}" class="form-horizontal" method="POST" enctype='multipart/form-data'>
                        {{ csrf_field() }}
                               
								<div class="form-group">
                            <label for="company_name" class="col-sm-2 control-label">@lang('site.Company_Name')</label>
                            <input type="text" class="form-control" id="company_name" name="company_name" value="{{ old('company_name') }}">
                        </div>
						<div class="hr-line-dashed"></div>

                        <div class="form-group" >
                            <label for="name" class="col-sm-2 control-label">@lang('site.name')</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                        </div>
						<div class="hr-line-dashed"></div>

                        <div class="form-group">
                            <label for="email" class="col-sm-2 control-label">@lang('site.email')</label>
                            <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}">
                        </div>
						<div class="hr-line-dashed"></div>

                        <div class="form-group">
                            <label for="phone" class="col-sm-2 control-label">@lang('site.phone')</label>
                            <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') }}">
                        </div>
						<div class="hr-line-dashed"></div>

                        <div class="form-group">
                            <label for="address" class="col-sm-2 control-label">@lang('site.address')</label>
                            <textarea class="form-control" id="address" name="address">{{ old('address') }}</textarea>
                        </div>
						<div class="hr-line-dashed"></div>
						
								 <div class="form-group">
                                    <div class="col-sm-4 col-sm-offset-2">
                                        
										 <a class="btn btn-white" href="{{ url('products') }}">@lang('site.cancel')</a>
                                        <button class="btn btn-primary" type="submit">@lang('site.save_changes')</button>
                                    </div>
                                </div>
								
								
                            </form>
                        </div>
                    </div>
                </div>
            </div>
			</div>
			

@endsection