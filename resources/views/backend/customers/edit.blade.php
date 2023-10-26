@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">Customers - Edit</div>

                <div class="panel-body">
                    <form action="{{ url('customers/' . $customer->id) }}" method="POST">
                        <input type="hidden" name="_method" value="put">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="name">@lang('site.name')</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $customer->name) }}">
                        </div>

                        {{-- <div class="form-group">
                            <label for="email">@lang('site.email')</label>
                            <input type="text" class="form-control" id="email" name="email" value="{{ old('email', $customer->email) }}">
                        </div> --}}

                        <div class="form-group">
                            <label for="phone">@lang('site.phone')</label>
                            <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone', $customer->phone) }}">
                        </div>

                        @if (!empty($customer->address))
                        <div class="form-group">
                            <label for="address">@lang('site.titles')</label>
                                @foreach ($customer->address as $address)
                                <div class="form-group">
                                    <input class="form-control" id="address" name="address[]" value="{{ old('address[]', $address) }}" />
                                </div>
                                @endforeach
                        </div>
                        @else
                        <div class="form-group">
                            <label for="address">@lang('site.titles')</label>
                            <input class="form-control" id="address" name="address[]" value="{{ old('address[]', $customer->address) }}" />
                        </div>
                        @endif



                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">@lang('site.Update')</button>
                            <a class="btn btn-link" href="{{ url('customers') }}">@lang('site.cancel')</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
