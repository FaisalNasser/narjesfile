@extends('frontend.appother2')

@section('content')
<!--==================== page content ====================-->

   

    <div class="page-section pb-40">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-xs-12 col-lg-6 mb-30">
                <!-- Login Form s-->
                @if(Session::has('messageForLogin'))
            <div class="alert alert-warning">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                {{ Session::get('messageForLogin') }}
            </div>
            @endif
                <form id="login-form" class="validatorServerSideRegister"  method="POST" action="{{ url('customer/LoginSMS') }}" style="padding: 17px;" novalidate>
                  
                    {{ csrf_field() }}
                    <div class="login-form">

                        <div class="section-titlelogin ">
                            <h2 style="padding-bottom: 5px; color: #1e6f2f;">@lang('login.login')</h2>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-12 mb-5 " style="margin-top: 27px;">
                                <input class=" form-control mb-0 " name="email"  type="email"   placeholder="@lang('site.email') " required>
                            </div>
                            <div class="col-md-12 col-12 mb-5">
                                <div class="password-input-container">
                                <input class="form-control mb-0 " name="passwordlogin"  type="password"  placeholder="@lang('site.password')" required>
                                <span class="passwordLogin-toggle-icon">
                                    <i class="fa fa-eye"></i>
                                    </span>
                                </div>
                              
                            </div>
                            <div class="col-md-8">

                                <div class="check-box d-inline-block ml-0 ml-md-2 mt-10">
                                    <input type="checkbox" id="remember_me">
                                    <label for="remember_me">@lang('site.remember_me') </label>
                                </div>

                            </div>

                            <div class="col-md-4 mt-10 mb-20 text-start text-md-end forgotten_paswardCustom">
                                <a style="color: #d09230;"  href="<?php echo url('forgottenpasward'); ?>">@lang('site.forgotten_pasward')</a>
                            </div>

                            <div class="col-md-12" style=" margin-bottom: 40px;">
                                <button type="submit" class="register-button mt-0 " style="color: #ffffff; text-align: center;padding: 6px 0px;width: 100px;">@lang('login.login')</button>
                            </div>

                            <div class="section-titlelogin " style="margin-top: -32px;">
                                <h2 style="padding-bottom: 5px; color: #1e6f2f;"> @lang('site.advantages') </h2>
                            </div>

                            <div class="col-md-12 mt-2 text-start ">
                                <a style="color: #d09230;" href="#"> ✓ @lang('site.marketing_part') </a>
                            </div>
                            <div class="col-md-12 text-start ">
                                <a style="color: #d09230;" href="#">✓ @lang('site.new_customer5%') </a>
                            </div>
                            <div class="col-md-12  text-start ">
                                <a style="color: #d09230;" href="#">✓ @lang('site.fast_shopping') </a>
                            </div> 
                            <div class="col-md-12   text-start ">
                                <a style="color: #d09230;" href="#">✓ @lang('site.saving_data') </a>
                            </div>
                            <div class="col-md-12   text-start ">
                                <a href="#">✓ @lang('site.insite_y_orders') </a>
                            </div>
                            <div class="col-md-12   text-start ">
                                <a style="color: #d09230;" href="#">✓ @lang('site.extra_discount')</a>
                            </div>
                        </div>



                    </div>


                </form>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-6 col-xs-12">
            @if(Session::has('message'))
            <div class="alert alert-warning">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                {{ Session::get('message') }}
            </div>
            @endif
                <form id="Register-form" class="validatorServerSidelogin" action="{{ url('email/customerEmailConfirmation') }}" style="padding: 17px;" novalidate>

                    <div class="login-form">

                        <div class="section-titlelogin ">
                            <h2 style="padding-bottom: 5px; color: #1e6f2f;">@lang('login.register')</h2>
                        </div>
                        <div class="row">

                            <div class="col-md-12 col-12 mb-5" style="margin-top: 27px;">
                                <select class="form-control" id="genderSelectvalidate" name="gender" style="width: 45%;
    background-color: #fff;
    border: 1px solid #999999;
    border-radius: 0;
    line-height: 23px;
    padding: 10px 20px;
    font-size: 14px;
    color: #333333;" required>
                                    <option value="100" disabled selected>@lang('site.select_your_gender')</option>
                                    <option value="male">@lang('site.male')</option>
                                    <option value="Female">@lang('site.female')</option>
                                </select>
                            </div>
                            <div class="col-md-6 col-12 mb-5">
                                <input class="form-control mb-0 " name="firstname" type="text" placeholder="@lang('site.first_name')" required>
                            </div>
                            <div class="col-md-6 col-12 mb-5">

                                <input class="form-control mb-0 "  type="text" placeholder="@lang('site.last_name')" required>
                            </div>
                            <div class="col-md-12 mb-5">

                                <input class="form-control mb-0 InputCustomStyleWidth" name="email" type="email" placeholder="@lang('site.email')" required>
                            </div>
                            <div class="col-md-6 mb-5">
                                <div class="password-input-container">
                                    <input name="password" class="form-control mb-0" type="password" placeholder="@lang('site.password')" required>
                                    <span class="password-toggle-icon">
                                    <i class="fa fa-eye"></i>
                                    </span>
                                </div>
                                <div class="col-md-12 mt-0 " style="font-size: 11px; margin-left: -13px;">
                                    @lang('site.your_password_must_contain')

                                </div>
                            </div>
                            
        
                           
                            <div class="col-md-6 mb-5">

                                <input class="form-control mb-0 " name="confirm_password" type="password" placeholder="@lang('site.confirm_password')" required>
                            </div>

                            <div class="section-titlelogin ">
                                <h2 style="padding-bottom: 5px; color: #1e6f2f;">@lang('site.address')</h2>
                            </div>

                            <div class="col-md-12 col-12 mb-5" style="    margin-top: 20px;">
                                <input class="form-control mb-0 InputCustomStyleWidth " type="text" name="street_number" placeholder="@lang('site.street_and_number')" required>
                            </div>

                            <div class="col-md-6 col-12 mb-5">
                                <input class="form-control mb-0 " name="zipcode" type="text" placeholder="@lang('site.zip_codes')" required>
                            </div>
                            <div class="col-md-6 col-12 mb-5">
                                <input class="form-control mb-0 " name="city" type="text" placeholder="@lang('site.city')" required>
                            </div>
                            <div class="col-md-6 col-12 mb-5">
                                <select name="country" class="form-control selectpicker form-select-color countrypicker " data-style="select-with-transition btn-success " data-flag="true" data-countries="GR,AU,BE,BU,CR,CY,CZ,DE,ES,FI,FR,HU,SW,IR,IT,LA,LI,LU,MA,NE,PO,RO,SK,SI,ES,SE" aria-required="true" required></select>
                            </div>
                            <div class="col-md-12">
                                <div class="form-check" style="margin-left: -27px; margin-top: 4px; margin-bottom: 9px">
                                    <input class="form-check-input" name="checkboxValidate" type="checkbox" value="" id="flexCheckDefault" style=" margin: 0px 6px; padding: 10px 5px 10px 14px;" required>
                                    <label class="form-check-label labelcheckboxValidate" for="flexCheckDefault">
                                        @lang('site.i_accept_the')
                                        <a href="https://www.narjes-alsham.com/pages/Datenschutz">@lang('site.privacy_policy')</a>
                                    </label>
                                </div>

                            </div>
                            <div class="col-12">

                            <button type="submit" class="register-button mt-0 " style="color: #ffffff; text-align: center;padding: 6px 0px; width: 100px;">@lang('login.register')</button>
                            </div>
                        </div>
                    </div>

                </form>      
            </div>
        </div>
    </div>
</div>
<script>
    $('.countrypicker').countrypicker();
</script>
<script src="https://ajax.aspnetcdn.com/ajax/jquery/jquery-3.6.0.min.js"></script>
    <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.19.3/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
    <script type="text/javascript" src="{{asset('adminpanel/assets/new_frontend/js/dist/jbvalidator.min.js')}}"></script>




   
<!-- <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script> -->


<!-- <script type="text/javascript" src="{{asset('adminpanel/assets/new_frontend/js/dist/jbvalidator.min.js')}}"></script> -->

 
      
<script>
$(function () {
  let validatorServerSidelogin = $('form.validatorServerSidelogin').jbvalidator({
    successClass: true,
    errorMessage: false
  });

  $(".validatorServerSidelogin").submit(function (event) {
    var passwordInput = $(this).find('input[name="password"]');
    var confirmPasswordInput = $(this).find('input[name="confirm_password"]');
    var passwordValue = passwordInput.val();
    var confirmPasswordValue = confirmPasswordInput.val();

    // Check if the password meets the condition
    var isValidPassword = /^(?=.*[a-z])(?=.*[A-Z])\w{4,}$/.test(passwordValue);

    // Check if the password and confirm password match
    var doPasswordsMatch = passwordValue === confirmPasswordValue;

    if (!isValidPassword || !doPasswordsMatch) {
      passwordInput.addClass('is-invalid');
      confirmPasswordInput.addClass('is-invalid');
      event.preventDefault();
    }

    var errorCount = $(".validatorServerSidelogin").find('.is-invalid').length;
                             console.log("errorCount"+errorCount);
                           // If there are errors, scroll to the first error
                            if (errorCount > 0) 
                            {
                            var firstError = $(".validatorServerSidelogin").find('.is-invalid:first');
                            var errorPosition = firstError.offset().top - $(window).height()/2;
                            $('html, body').animate({scrollTop: errorPosition}, 500);
                            firstError.focus();
                            }


  });

  // Toggle password visibility
  $('.password-toggle-icon').on('click', function () {
    var passwordInput = $(this).siblings('input[name="password"], input[name="confirm_password"]');
    var icon = $(this).find('i');

    if (passwordInput.hasClass('visible-password')) {
      passwordInput.removeClass('visible-password');
      passwordInput.attr('type', 'password');
      icon.removeClass('fas fa-eye-slash');
      icon.addClass('fas fa-eye');
    } else {
      passwordInput.addClass('visible-password');
      passwordInput.attr('type', 'text');
      icon.removeClass('fas fa-eye');
      icon.addClass('fas fa-eye-slash');
    }
  });
  $('.passwordLogin-toggle-icon').on('click', function () {
    var passwordInput = $(this).siblings('input[name="passwordlogin"], input[name="confirm_password"]');
    var icon = $(this).find('i');

    if (passwordInput.hasClass('visible-password')) {
      passwordInput.removeClass('visible-password');
      passwordInput.attr('type', 'password');
      icon.removeClass('fas fa-eye-slash');
      icon.addClass('fas fa-eye');
    } else {
      passwordInput.addClass('visible-password');
      passwordInput.attr('type', 'text');
      icon.removeClass('fas fa-eye');
      icon.addClass('fas fa-eye-slash');
    }
  });
});
$(function () {
  let validatorServerSideRegister = $('form.validatorServerSideRegister').jbvalidator({
    successClass: true,
    errorMessage: false
  });

  $("form.validatorServerSideRegister").submit(function (event) {
    event.preventDefault(); // Prevent the default form submission

    // Add your custom validation logic here
    var emailInput = $(this).find('input[name="email"]');
    var passwordInput = $(this).find('input[name="passwordlogin"]');
    var rememberMeCheckbox = $(this).find('#remember_me');

    // Perform your validation checks
    var isValid = true; // Add your validation logic here

    if (isValid) {

        var errorCount = $(".validatorServerSideRegister").find('.is-invalid').length;
                             console.log("errorCount"+errorCount);
                           // If there are errors, scroll to the first error
                            if (errorCount > 0) 
                            {
                            var firstError = $(".validatorServerSideRegister").find('.is-invalid:first');
                            var errorPosition = firstError.offset().top - $(window).height()/2;
                            $('html, body').animate({scrollTop: errorPosition}, 500);
                            firstError.focus();
                            } else{
                                this.submit();
                            }

      // If the form is valid, you can submit it programmatically
    //   this.submit();
    } else {
      // If the form is not valid, display error messages or handle accordingly
    }
  });
});


// $(function () {
//   let validatorServerSideRegister = $('form.validatorServerSideRegister').jbvalidator({
//     successClass: true,
//     errorMessage: false
//   });

//   $(".validatorServerSideRegister").submit(function (event) {


//     var errorCount = $(".validatorServerSideRegister").find('.is-invalid').length;
//                              console.log("errorCount"+errorCount);
//                            // If there are errors, scroll to the first error
//                             if (errorCount > 0) 
//                             {
//                             var firstError = $(".validatorServerSideRegister").find('.is-invalid:first');
//                             var errorPosition = firstError.offset().top - $(window).height()/2;
//                             $('html, body').animate({scrollTop: errorPosition}, 500);
//                             firstError.focus();
//                             }


//   });

//   // Toggle password visibility
//   $('.password-toggle-icon').on('click', function () {
//     var passwordInput = $(this).siblings('input[name="password"], input[name="confirm_password"]');
//     var icon = $(this).find('i');

//     if (passwordInput.hasClass('visible-password')) {
//       passwordInput.removeClass('visible-password');
//       passwordInput.attr('type', 'password');
//       icon.removeClass('fas fa-eye-slash');
//       icon.addClass('fas fa-eye');
//     } else {
//       passwordInput.addClass('visible-password');
//       passwordInput.attr('type', 'text');
//       icon.removeClass('fas fa-eye');
//       icon.addClass('fas fa-eye-slash');
//     }
//   });
//   $('.passwordLogin-toggle-icon').on('click', function () {
//     var passwordInput = $(this).siblings('input[name="passwordlogin"], input[name="confirm_password"]');
//     var icon = $(this).find('i');

//     if (passwordInput.hasClass('visible-password')) {
//       passwordInput.removeClass('visible-password');
//       passwordInput.attr('type', 'password');
//       icon.removeClass('fas fa-eye-slash');
//       icon.addClass('fas fa-eye');
//     } else {
//       passwordInput.addClass('visible-password');
//       passwordInput.attr('type', 'text');
//       icon.removeClass('fas fa-eye');
//       icon.addClass('fas fa-eye-slash');
//     }
//   });
// });
// $(function () {
//   let validatorServerSideRegister = $('form.validatorServerSideRegister').jbvalidator({
//     successClass: true,
//     errorMessage: false
//   });

//   $("form.validatorServerSideRegister").submit(function (event) {
//     event.preventDefault(); // Prevent the default form submission

//     // Add your custom validation logic here
//     var emailInput = $(this).find('input[name="email"]');
//     var passwordInput = $(this).find('input[name="passwordlogin"]');
//     var rememberMeCheckbox = $(this).find('#remember_me');

//     // Perform your validation checks
//     var isValid = true; // Add your validation logic here

//     if (isValid) {

//         var errorCount = $(".validatorServerSideRegister").find('.is-invalid').length;
//                              console.log("errorCount"+errorCount);
//                            // If there are errors, scroll to the first error
//                             if (errorCount > 0) 
//                             {
//                             var firstError = $(".validatorServerSideRegister").find('.is-invalid:first');
//                             var errorPosition = firstError.offset().top - $(window).height()/2;
//                             $('html, body').animate({scrollTop: errorPosition}, 500);
//                             firstError.focus();
//                             } else{
//                                 this.submit();
//                             }

//       // If the form is valid, you can submit it programmatically
//     //   this.submit();
//     } else {
//       // If the form is not valid, display error messages or handle accordingly
//     }
//   });
// });
</script>




<!--====================  End of page content  ====================-->
@endsection