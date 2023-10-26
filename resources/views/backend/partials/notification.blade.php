<div class="container">
    <div class="row">
        <div class="col-lg-12">
            @if(Session::has('message'))
            <div class="alert alert-warning">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                {{ Session::get('message') }}
            </div>
            @endif

            @if(Session::has('message-danger'))
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                {{ Session::get('message-danger') }}
            </div>
            @endif

            @if(Session::has('message-success'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                {{ Session::get('message-success') }}
            </div>
            @endif

            @if($errors->all())
            <div class="alert alert-warning">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4>@lang('site.Warning')</h4>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            {{-- Errors Of Import Excel File --}}
            @if(Session::has('excelFailuers'))
                <div class="alert alert-warning">
                    <table class=" col-3 table table-danger">
                        <thead>
                            <tr>
                                <th>Row</th>
                                <th>Attribute</th>
                                <th>Errors</th>
                                <th>Value</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach (Session::get('excelFailuers') as $validation)
                                <tr>
                                    {{-- {{dd($validation)}} --}}
                                    <td>{{$validation->row()}}</td>
                                    <td>{{$validation->attribute()}}</td>
                                    <td>
                                        @foreach ($validation->errors() as $error){
                                            {{$error}}
                                        }
                                    </td>
                                    @endforeach
                                    <td>
                                        {{$validation->values()[$validation->attribute()]}}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>

            @endif
        </div>
    </div>
</div>
