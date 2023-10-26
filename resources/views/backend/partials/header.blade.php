<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <title>{{setting_by_key('title')}} | @lang('site.dashboard') </title>

    <link href="{{asset('adminpanel/assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('adminpanel/assets/font-awesome/css/font-awesome.css')}}" rel="stylesheet">
    <link href="{{asset('adminpanel/assets/css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('adminpanel/assets/css/style-rtl.css')}}" rel="stylesheet">
    <link href="{{asset('adminpanel/assets/css/custom.css')}}" rel="stylesheet">
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<script>
        window.Laravel = <?php echo json_encode(
            [
            'csrfToken'  => csrf_token(),
            'siteUrlApi' => url('api'),
            'tokenApi'
            ]
        ); ?>
    </script>
    <script src="{{asset('adminpanel/assets/jquery-1.11.1.min.js')}}"></script>


</head>
