@extends('frontend.appother2')

@section('content')
<div class="page-section">
     <div class="container">
         <div class="row" style="    display: flex;
    flex-direction: column;
    align-content: center; ">
          
         <div class="col-sm-12 col-md-12 col-lg-6 col-xs-12">
         @if(Session::has('message'))
            <div class="alert alert-warning " style="text-align: center;">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                {{ Session::get('message') }}
            </div>
            @endif
                <form id="contact-form" class="validatorServerSide" method="post" novalidate action="{{ url('contact/save') }}" style="padding: 17px;">
                {{ csrf_field() }}

                    <div class="login-form" >

                        <div class="section-titlelogin ">
                            <h2 style="padding-bottom: 5px; color: #1e6f2f;">@lang('site.contact')</h2>
                        </div>
                        <div class="row">

                            <div class="col-md-12 col-12 mb-2" style="margin-top: 15px;">   
                                <select class="form-control select_your_option_gender" id="select_your_option" name="gender"   required>
                                    <option value="" disabled selected>@lang('site.select_your_option')</option>
                                    <option value="0">@lang('site.male')</option>
                                    <option value="1">@lang('site.female')</option>
                                </select>
                            </div>
                            <div class="col-md-6 col-12 mb-2">
                                
                                <input class="mb-0 form-control"  id="first_name_lgin" name="first_name"  type="text" placeholder="@lang('site.first_name')" required>
                            </div>
                            <div class="col-md-6 col-12 mb-2">                            
                                <input class="mb-0 form-control" type="text" id="last_name" name="last_name"  placeholder="@lang('site.last_name')"required>
                            </div>
                            <div class="col-md-6 mb-2"> 
                                <input class="mb-0 form-control" type="email" placeholder="@lang('site.email')" name="email" style="width: 90%;" required>
                            </div>               
                            <div class="col-md-6 col-12 mb-2">
                                <input class="mb-0 form-control" type="number" name="phone" placeholder="@lang('site.Phone_Number')" required>
                            </div>                     
                            <div class="col-md-12 col-12 mb-20" style="margin-top: 0px;">
                                <select class="form-control select_your_option_gender" name="option"  required> 
                                    <option value="" disabled selected>@lang('site.select_your_option')</option>
                                    <option value="0">@lang('site.question_about_a_product')</option>
                                    <option value="1">@lang('site.complaint')</option>
                                    <option value="2">@lang('site.i_received_the_wrong_product')</option>
                                    
                                    <option value="@lang('site.another_order')">@lang('site.another_order')</option>
                                </select>
                            </div>
                            <div class="col-md-12 col-12 mb-20" style="margin-top: -20px;">

                                    <textarea class="form-control" name="message" id="contactMessage" style="width: 90%; height: 180px;" placeholder="@lang('site.Your_Message')" required></textarea>
                            </div>
                            @if (app()->getLocale() == 'ar')
                            <div class="col-md-12">
                                <div class="form-check" style="margin-left: -27px; margin-bottom: 15px;">
                                    <input class="form-check-input" type="checkbox" name="checkbox"  id="flexCheckDefault" style=" margin: 0px 6px; padding: 10px 5px 10px 14px;" required>
                                    <label class="form-check-label" for="flexCheckDefault">
                                    
                                    <a href="https://www.narjes-alsham.com/pages/Datenschutz">@lang('site.privacy_policy') </a> 
                                    @lang('site.you_agree_that_the_personal_data_provided')      
                                    </label>
                                </div>
                                </div>
                                @else
                                <div class="col-md-12">
                                <div class="form-check" style="margin-left: -27px; margin-bottom: 15px;">
                                    <input class="form-check-input" type="checkbox" name="checkbox"  id="flexCheckDefault" style=" margin: 0px 6px; padding: 10px 5px 10px 14px;" required>
                                    <label class="form-check-label" for="flexCheckDefault">
                                    @lang('site.you_agree_that_the_personal_data_provided')  
                                    <a href="https://www.narjes-alsham.com/pages/Datenschutz">@lang('site.privacy_policy') </a>     
                                    </label>
                                </div>
                                </div>
                                @endif
                            <div class="col-12" style="display: flex;  justify-content: center;">
    
                                <button type="submit" class="register-button mt-0">@lang('site.send')</button>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
         </div>
     </div>
 </div>


@endsection