@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">@lang('site.user')  @lang('site.edit')</div>

                <div class="panel-body">
                    <form action="{{ url('users/' . $user->id) }}" method="POST">
                        <input type="hidden" name="_method" value="put">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="name">@lang('site.name')</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $user->name) }}">
                        </div>

                        <div class="form-group">
                            <label for="email">@lang('site.email')</label>
                            <input type="text" class="form-control" id="email" name="email" value="{{ old('email', $user->email) }}">
                        </div>

                        <div class="form-group">
                            <label for="role_id">@lang('site.role')</label>
                            <select class="form-control" id="role_id" name="role_id">
                                @foreach($roles as $id => $role)
                                    <option value="{{ $role->id }}" {{ !($role->id == old('role_id', $user->role_id)) ?: 'selected="selected"' }} >{{ $role->display_name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">@lang('site.save')</button>
                            <a class="btn btn-link" href="{{ url('users') }}">@lang('site.cancel')</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection