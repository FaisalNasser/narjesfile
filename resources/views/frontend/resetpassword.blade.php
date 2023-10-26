@extends('frontend.appother2')

@section('content')
<!--==================== page content ====================-->

<div class="page-section pb-40">
    <div class="container">
        
        <div class="row">
        <div class="col-sm-3 col-md-3 col-xs-3 col-lg-3 mb-30">
            
            </div>
            <div class="col-sm-12 col-md-12 col-xs-12 col-lg-6 mb-30">
                <!-- Login Form s-->
                <!-- @if(Session::has('message'))
            <div class="alert alert-warning">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                {{ Session::get('message') }}
            </div>
            @endif -->
                <form id="login-form" class="validatorServerSideresetpassword"  method="POST" action="{{ url('/changepassword') }}" style="padding: 17px;" novalidate>
                  
                    {{ csrf_field() }}
                    <div class="login-form">
                    <input type="email" hidden value="{{$email}}" name="email">
                        <div class="section-titlelogin ">
                            <h2 style="padding-bottom: 5px; color: #1e6f2f; text-align: center;"> @lang('site.Please_enter_the_new_password') </h2>
                        </div>
                        <div class="row">
                         
                            <div class="col-md-12 col-12 mb-5 mt-20" style="display: flex; justify-content: center;">
                                <div class="password-input-container" style="display: flex; justify-content: center;  width: 100%;">
                                    <input name="password" class="form-control mb-0" type="password" placeholder="@lang('site.password')" required>
                                    <span class="password-toggle-icon" style="top: 47%; right: 78px;">
                                    <i class="fa fa-eye"></i>
                                    </span>
                                </div>
   
                            </div>
                            <div class="col-md-12 mt-0 " style="font-size: 11px;     margin-left: 56px;">
                                    @lang('site.your_password_must_contain')

                                </div>
  
                            <div class="col-12 mb-50" style="display: flex; justify-content: center;">

                                <input class="form-control mb-0 " name="confirm_password" type="password" placeholder="@lang('site.confirm_password')" required>
                            </div>
                            

                            <div class="col-md-12" style=" margin-bottom: 10px; display: flex; justify-content: center;">
                                <button type="submit" class="register-button mt-0 " style="color: #ffffff; text-align: center;">@lang('site.confirm')</button>
                            </div>
                        </div>



                    </div>

                 
                </form>
            </div>
         
        </div>
    </div>
</div>

<script>
   $(function () {
  let validatorServerSideresetpassword = $('form.validatorServerSideresetpassword').jbvalidator({
    successClass: true,
    errorMessage: false
  });
  $('.password-toggle-icon').on('click', function () {
    var passwordInput = $(this).siblings('input[name="password"]');
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
  $("form.validatorServerSideresetpassword").submit(function (event) {
    event.preventDefault(); // Prevent the default form submission

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

    // Perform your validation checks
    var isValid = true; // Add your validation logic here

    if (isValid) {

        var errorCount = $(".validatorServerSideresetpassword").find('.is-invalid').length;
                             console.log("errorCount"+errorCount);
                           // If there are errors, scroll to the first error
                            if (errorCount > 0) 
                            {
                            var firstError = $(".validatorServerSideresetpassword").find('.is-invalid:first');
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
</script>
<!--====================  End of page content  ====================-->
@endsection