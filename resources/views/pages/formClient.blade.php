@extends('frontend.appother2')

@section('content')
<?php $pages = getPages(); ?>
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

                    <form id="client-form" class="validatorServerSideformClient" novalidate action="{{ url('/formClientSave') }}"
                        style="padding: 17px;" method="POST">
                        {{ csrf_field() }}
                        <div class="login-form">
                            <div class="section-titlelogin pb-2">
                                <h2 style="padding-bottom: 5px; color: #1e6f2f; text-align: center;">@lang('site.shipping_details')</h2>
                                <p class="text-center">
                                    @lang('site.shipping_notes')

                                </p>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-12 mb-2">
                                    <input class="mb-1 form-control" id="first_name_lgin" name="first_name_lgin"
                                        type="text" placeholder="@lang('site.first_name_shipping')" required>
                                </div>
                                <div class="col-md-12 col-12 mb-2">
                                    <input class="mb-1 form-control" type="text" id="last_name" name="last_name"
                                        placeholder="@lang('site.last_name_shipping')"required>
                                </div>
                                <div class="col-md-12 col-12 mb-2">
                                    <input class="mb-1 form-control" type="text" id="street_name" name="street_name"
                                        placeholder="@lang('site.street_shipping')"required>
                                </div>
                                <div class="col-md-12 col-12 mb-2">
                                    <input class="mb-1 form-control" type="text" id="binaa_name" name="binaa_name"
                                        placeholder="@lang('site.binaa_shipping')"required>
                                </div>
                                <div class="col-md-12 col-12 mb-2">
                                    <input class="mb-1 form-control" type="text" id="city_name" name="city_name"
                                        placeholder="@lang('site.city_shipping')"required>
                                </div>
                                <div class="col-md-12 col-12 mb-2">
                                    <input class="mb-1 form-control" type="text" id="postcode_name" name="postcode_name"
                                        placeholder="@lang('site.postcode_shipping')"required>
                                </div>
                                <div class="col-md-12 col-12 mb-2">
                                    <input class="mb-1 form-control" type="text" id="country_name" name="country_name"
                                        placeholder="@lang('site.country_shipping')"required>
                                </div>
                                <div class="col-md-12 col-12 mb-2">
                                    <input class="mb-1 form-control" type="text"id="phone_name" name="phone_name"
                                        placeholder="@lang('site.Phone_Number_shipping')" required>
                                </div>
                                <div class="col-md-12 mb-2">
                                    <input class="mb-1 form-control" type="email" id="email" name="email"
                                        placeholder="@lang('site.email_shipping')" required>
                                </div>
                                <div class="col-md-12 mb-2">
                                    <input class="mb-1 form-control" type="number" id="amount" name="amount"
                                        placeholder="@lang('site.amount_shipping')" required>
                                </div>
                                <div class="col-md-12 mb-2">
                                    <input class="mb-1 form-control" type="text" id="bank_account" name="bank_account"
                                        placeholder="@lang('site.bank_account_shipping')" required>
                                </div>
                                <div class="col-md-12 mb-2" style="display: none">
                                    <input class="mb-1 form-control" type="text" id="recive_type" name="recive_type"
                                        placeholder="@lang('site.bank_account_shipping')" value="{{ $recive_type }}">
                                </div>
                                <div class="col-md-12">


                                    <!-- <div class="form-check" style="margin-left: -27px;">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"
                                            style=" margin: 0px 6px; padding: 10px 5px 10px 14px;">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            @lang('site.you_agree_that_the_personal_data_provided')
                                            <a href="https://www.narjes-alsham.com/pages/Datenschutz">@lang('site.privacy_policy')
                                            </a>
                                        </label>
                                    </div> -->
                                    <div class="product-details-feature-wrapper justify-content-start mt-20" style="border-bottom: 0px;">
                                        <div class="form-check" style="margin-left: -27px;">
                                            <input class="form-check-input" type="checkbox" value=""
                                                name="termsandconditions"
                                                style=" margin: 0px 6px; padding: 10px 5px 10px 14px;" required>
                                            <label class="form-check-label labeltermsandconditions">
                                                @lang('site.i_accept_the_terms_and') <a
                                                    href="https://www.narjes-alsham.com/pages/Widerrufsrecht">@lang('site.step_conditions')</a>
                                                @lang('site.and_take_note_of_the_right_of_return')
                                            </label>
                                        </div>
                                        <div class="form-check" style="margin-left: -27px;">
                                            <input class="form-check-input" type="checkbox" value=""
                                                name="termsandprivacy"
                                                style=" margin: 0px 6px; padding: 10px 5px 10px 14px;" required>
                                            <label class="form-check-label labeltermsandconditions">
                                                @lang('site.i_accept_the') 
                                                @foreach ($pages as $page)
                                                 @if ($page->slug == 'Datenschutz')
                                         
                                                <a href="<?php echo url('pages/' . $page->slug); ?>">
                                                    <span class="links-text">{{ $page->title }}
                                                    </span>
                                                   
                                                </a> @lang('site.of_narjes_alsham').
                                            
                                                    @endif
                                                @endforeach
                                            </label>
                                        </div>
                                        <div class="form-check" style="margin-left: -27px;">
                                            <input class="form-check-input" type="checkbox" value=""
                                                style=" margin: 0px 6px; padding: 10px 5px 10px 14px;" >
                                            <label class="form-check-label ">
                                                @lang('site.i_would_like_to_receive')
                                            </label>
                                        </div>
                                        <div style="margin-top: 20px;">
                                            <label> @lang('site.comment_on_your_order')</label>
                                            <textarea class="form-control" cols="200" rows="7" name="comment"
                                                style="     height: 100%; box-sizing: border-box;max-width: 100%;"></textarea>

                                        </div>

                                        </div>

                                </div>

                                <div class="col-12 text-center">

                                    <button type="submit" class="register-button "
                                        style="margin: auto; float:none; padding:6px;">@lang('site.send')</button>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        var receiveType = {{ $recive_type }};
        $(document).ready(function() {
            if (receiveType === 1) {
                $('Body').css('background-color', '#bfadc1');
                $('.navigation-menu-area').css('background-color', '#825287');
                $('.container-fluid').css('background-color', '#bfadc1');

                $('.navigation-top-topbar').css('background-color', '#825287');
                $('footer>div').css('background-color', '#825287');
                $('.register-button').css('background-color', '#825287');



            }
        });


        $(function () {
  let validatorServerSideformClient = $('form.validatorServerSideformClient').jbvalidator({
    successClass: true,
    errorMessage: false
  });

  $("form.validatorServerSideformClient").submit(function (event) {
    event.preventDefault(); // Prevent the default form submission

    // Add your custom validation logic here
   

    // Perform your validation checks
    var isValid = true; // Add your validation logic here

    if (isValid) {

        var errorCount = $(".validatorServerSideformClient").find('.is-invalid').length;
                             console.log("errorCount"+errorCount);
                           // If there are errors, scroll to the first error
                            if (errorCount > 0) 
                            {
                            var firstError = $(".validatorServerSideformClient").find('.is-invalid:first');
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


                           

        //                       $("form.validatorServerSideformClient").submit(function (event) {
        //                         event.preventDefault(); // Prevent the default form submission

        //                         var statusconditions = document.getElementsByName("termsandconditions");
        //                         var termsandprivacy = document.getElementsByName("termsandprivacy");
        //                         var validradioTermsandprivacy = false;
        //                         var i = 0;
        //                         while (!validradioTermsandprivacy && i < termsandprivacy.length) {
        //                             if (termsandprivacy[i].checked) {
        //                                 validradioTermsandprivacy = true;
        //                             }

        //                             i++;
        //                         }

        //                         var validradioconditions = false;
        //                         var i = 0;
        //                         while (!validradioconditions && i < statusconditions.length) {
        //                             if (statusconditions[i].checked) {
        //                                 validradioconditions = true;
        //                             }

        //                             i++;
        //                         }
        //                         if (!validradioconditions || !validradioTermsandprivacy) {
        //                             var list = document.getElementsByClassName('labeltermsandconditions');
        //                             for (var n = 0; n < list.length; ++n) {
        //                                 list[n].className += ' errorvalidatepaymenttype  requirederror';
        //                             }
                                   
        //                             }


                               

        //                     var errorCount = $(".validatorServerSideformClient").find('.is-invalid').length;
        //                                         console.log("errorCount"+errorCount);
        //                                     // If there are errors, scroll to the first error
        //                                         if (errorCount > 0) 
        //                                         {
        //                                         var firstError = $(".validatorServerSideformClient").find('.is-invalid:first');
        //                                         var errorPosition = firstError.offset().top - $(window).height()/2;
        //                                         $('html, body').animate({scrollTop: errorPosition}, 500);
        //                                         firstError.focus();
        //                                         } else{
        //                                             this.submit();
        //                                         }

        //                     // If the form is valid, you can submit it programmatically
        //                     //   this.submit();
                           
        // });
    </script>
@endsection