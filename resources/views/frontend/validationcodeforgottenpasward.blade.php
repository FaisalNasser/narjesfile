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
                @if(Session::has('message'))
            <div class="alert alert-warning">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                {{ Session::get('message') }}
            </div>
            @endif
                <form id="login-form" class="validatorServerSidevalidationcodeForgottenPasward"  method="POST" action="{{ url('/resetpasswordForm') }}" style="padding: 17px;" novalidate>
                  
                    {{ csrf_field() }}
                    <div class="login-form">

                        <div class="section-titlelogin ">
                            <h2 style="padding-bottom: 5px; color: #1e6f2f; text-align: center;">@lang('site.Please_enter_the_code_to_reset_the_password')</h2>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-12 mb-5 " style="margin-top: 27px; display: flex; justify-content: center;">
                                <input  class="form-control mb-0" name="email" type="email" value="{{$email}}" placeholder="@lang('site.email') " required>
                            </div>
                            <div class="col-12 mb-50" style="display: flex; justify-content: center;">
                                <input class="form-control mb-0" name="code" type="text" placeholder="Code" required>
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
  let validatorServerSidevalidationcodeForgottenPasward = $('form.validatorServerSidevalidationcodeForgottenPasward').jbvalidator({
    successClass: true,
    errorMessage: false
  });

  $("form.validatorServerSidevalidationcodeForgottenPasward").submit(function (event) {
    event.preventDefault(); // Prevent the default form submission



    // Perform your validation checks
    var isValid = true; // Add your validation logic here

    if (isValid) {

        var errorCount = $(".validatorServerSidevalidationcodeForgottenPasward").find('.is-invalid').length;
                             console.log("errorCount"+errorCount);
                           // If there are errors, scroll to the first error
                            if (errorCount > 0) 
                            {
                            var firstError = $(".validatorServerSidevalidationcodeForgottenPasward").find('.is-invalid:first');
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