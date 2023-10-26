@extends('layouts.app')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">@lang('site.Roles_Create')</div>

    <div class="panel-body">
        <form action="{{ url('settings/roles') }}" method="POST">
            {{ csrf_field() }}

            <div class="form-group">
                <label for="name">@lang('site.name')</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
            </div>

            <div class="form-group">
                <label for="description">@lang('site.description')</label>
                <textarea class="form-control" id="description" name="description">{{ old('description') }}</textarea>
            </div>

            <div class="form-group">
                <label for="permission_ids">@lang('site.Permissions')</label>
                <div class="row">
                @foreach($permissions as $object => $controller)
                    <div class="col-md-3">
                        <h5><strong>{{ $object }}</strong></h5>
                        @foreach($controller as $permission)
                        <div class="checkbox">
                            <label><input type="checkbox" value="{{ $permission->id }}" name="permission_ids[]" {{ !in_array($permission->id, old('permission_ids', [])) ?: 'checked="true"' }}> {{ $permission->action }}</label>
                        </div>
                        @endforeach
                    </div>
                @endforeach
                </div>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">@lang('site.save')</button>
                <a class="btn btn-link" href="{{ url('settings/roles') }}">@lang('site.cancel')</a>
            </div>
        </form>
    </div>
</div>
@endsection