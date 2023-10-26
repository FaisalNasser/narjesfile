<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{setting_by_key('title')}} | Login</title>

    <link href="{{asset('adminpanel/assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('adminpanel/assets/font-awesome/css/font-awesome.css')}}" rel="stylesheet">

    <link href="{{asset('adminpanel/assets/css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('adminpanel/assets/css/style.css')}}" rel="stylesheet">

</head>

<body class="login-bg">

    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <img src="{{asset('uploads/logo.png')}}" width="170px">
            <form class="m-t" role="form" method="POST" action="{{ url('/login') }}">
                {{ csrf_field() }}
                @if($errors->any())
                    {!! implode('', $errors->all('<div style="color:red;" >:message</div>')) !!}
                @endif
                <div class="form-group">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  autocomplete="email" autofocus>
					  @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                </span>
                        @endif

                </div>
                <div class="form-group">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  autocomplete="current-password">
					@if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                </div>
                <button type="submit" style="background-color: #499844; border-color:#499844" class="btn btn-primary block full-width m-b">Login</button>




            </form>
            <p class="m-t"> <small>{{setting_by_key('title')}}  &copy; {{date("Y")}}</small> </p>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="{{asset('adminpanel/js/jquery-2.1.1.js')}}"></script>
    <script src="{{asset('adminpanel/js/bootstrap.min.js')}}"></script>

</body>

</html>
