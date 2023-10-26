@extends('frontend.appother2')

@section('content')
    <style>
        input.form-control {
            margin: auto;
            width: 80%;
        }
    </style>
    <div class="page-section">
        <div class="container">
            <div class="row" style="display: flex;flex-direction: column;
                align-content: center;">
                <div class="col-sm-12 col-md-12 col-lg-6 col-xs-12">
                    <div class="section-titlelogin pb-2">
                        <h2 style="padding-bottom: 5px; color: #1e6f2f; text-align: center;"> @lang('site.success_save')</h2>
                        <p class="text-center">
                            @lang('site.success_savetowrow')

                        </p>
                        <p class="text-center">

                            @lang('site.thanks_statement')
                        </p>
                        <p class="text-center">
                            <a href="/">
                                @lang('site.homepage')
                            </a>
                        </p>

                    </div>
                </div>


            </div>
        </div>
    </div>
@endsection
