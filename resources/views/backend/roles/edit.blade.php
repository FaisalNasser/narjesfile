@extends('layouts.app')

@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>@lang('site.Update_Role')</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="{{url('')}}">@lang('site.home')</a>
                        </li>
                        <li>
                             <a href="{{url('roles')}}">@lang('site.Roles')</a>
                        </li>
                        <li class="active">
                            <strong>@lang('site.Update')</strong>
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
                            <h5>@lang('site.Update_Role')</h5>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                            </div>
                        </div>
						
						<div class="ibox-content">
						<form class="form-horizontal" method="POST" action="{{ url('/roles/update') }}" enctype="multipart/form-data">
						{{ csrf_field() }}
                               
						<div class="form-group">
                            <label for="company_name" class="col-sm-2 control-label">@lang('site.Display_Name')</label>
							<div class="col-sm-10">
                            <input type="text" class="form-control" id="display_name" name="display_name" value="{{ $role->display_name }}">
							</div>
                        </div>
						<div class="hr-line-dashed"></div>

                        <div class="form-group" >
                            <label for="name" class="col-sm-2 control-label">@lang('site.description')</label>
							<div class="col-sm-10">
                            <input type="text" class="form-control" id="name" name="description" value="{{ $role->description }}">
							</div>
                        </div>
						<div class="hr-line-dashed"></div>
                        <?php $p_roles = array();
							if(count($permissions_role) > 0) { 
								foreach($permissions_role as $r) { 
									$p_roles[] = $r->permission_id;
								}
							}

							?>
						<div class="form-group row">
								<label class="col-sm-12 form-control-label">@lang('site.Permissions')</label>
								@foreach($permissions as $permission)
                                <?php

                                $local = $permission->display_name;
                                // if (app()->getLocale() == 'ar'){

                                   
                                // }
                                // else{
                                //     $local = $permission['display_name_en'];
                                // }
                                ?>
								<div class="col-sm-3">
									<input type="checkbox" <?php if(count($p_roles) > 0 and in_array($permission->id , $p_roles)){ echo "checked"; } ?>  name="permissions[]" value="{{$permission->id}}" > {{$local}}
								</div>
								@endforeach
							</div>
							<div class="hr-line-dashed"></div>
							
						<input id="file" type="hidden" class="form-control" name="id" value="{{$role->id}}">
							
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