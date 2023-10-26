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
                <form id="login-form"  method="POST" action="{{ url('/confirmcode') }}" style="padding: 17px;">
                  
                    {{ csrf_field() }}
                    <div class="login-form">

                        <div class="section-titlelogin ">
                            <h2 style="padding-bottom: 5px; color: #1e6f2f;">@lang('login.login')</h2>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-12 mb-5 " style="margin-top: 27px;">
                                <input  class=" mb-0 emailaddressvalidateLogin" name="email" type="email" value="{{$email}}" placeholder="@lang('site.email') ">
                            </div>
                            <div class="col-12 mb-50">
                                <input class=" mb-0 passwordvalidateLogin" name="code" type="text" placeholder="Code">

                            </div>
             

                            

                            <div class="col-md-12" style=" margin-bottom: 10px; display: flex; justify-content: center;">
                                <button type="button" class="register-button mt-0 BtnFormloginValidate" style="color: #ffffff; text-align: center;">@lang('login.login')</button>
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

    $('.BtnFormloginValidate').click(function() {

        var emailaddressvalidateLogin = ValidateField('emailaddressvalidateLogin');
        var passwordvalidateLogin = ValidateField('passwordvalidateLogin');

        if (!emailaddressvalidateLogin) {
            AddErrorValidate('emailaddressvalidateLogin');
        }
        if (!passwordvalidateLogin) {
            AddErrorValidate('passwordvalidateLogin');
        }
        if (passwordvalidateLogin && emailaddressvalidateLogin) {
           
            
            $('#login-form').submit();
        }
        
    });
    $('.BtnFormRegisterValidate').click(function() {
        var firstnamevalidateRegister = ValidateField('firstnamevalidateRegister');
        var lastnamevalidateRegister = ValidateField('lastnamevalidateRegister');
        var emailvalidateRegister = ValidateField('emailvalidateRegister');
        var passwordvalidateRegister = ValidateField('passwordvalidateRegister');
        var passwordConfirmvalidateRegister = ValidateField('passwordConfirmvalidateRegister');
        var street_numbervalidateRegister = ValidateField('street_numbervalidateRegister');
        var zipcodevalidateRegister = ValidateField('zipcodevalidateRegister');
        var cityvalidateRegister = ValidateField('cityvalidateRegister');
        var genderSelectvalidate = selectvalidateField('genderSelectvalidate');

        if (!firstnamevalidateRegister) {
            AddErrorValidate('firstnamevalidateRegister');
        }
        if (!lastnamevalidateRegister) {
            AddErrorValidate('lastnamevalidateRegister');
        }
        if (!emailvalidateRegister) {
            AddErrorValidate('emailvalidateRegister');
        }
        if (!passwordvalidateRegister) {
            AddErrorValidate('passwordvalidateRegister');
        }
        if (!passwordConfirmvalidateRegister) {
            AddErrorValidate('passwordConfirmvalidateRegister');
        }
        if (!street_numbervalidateRegister) {
            AddErrorValidate('street_numbervalidateRegister');
        }
        if (!zipcodevalidateRegister) {
            AddErrorValidate('zipcodevalidateRegister');
        }
        if (!cityvalidateRegister) {
            AddErrorValidate('cityvalidateRegister');
        }
        if (!genderSelectvalidate) {
            AddErrorValidate('genderSelectvalidate');
        }
        var status = document.getElementsByName("checkboxValidate");
        var validradio = false;
        var i = 0;
        while (!validradio && i < status.length) {
            if (status[i].checked) {
                validradio = true;
            }

            i++;
        }

        if (!validradio) {
            var list = document.getElementsByClassName('labelcheckboxValidate');
            for (var n = 0; n < list.length; ++n) {
                list[n].className += ' errorvalidatepaymenttype  requirederror';
            }
        }
        if (firstnamevalidateRegister && lastnamevalidateRegister && emailvalidateRegister && passwordConfirmvalidateRegister && passwordvalidateRegister && zipcodevalidateRegister && cityvalidateRegister && genderSelectvalidate && validradio) {
            $('#Register-form').submit();
        }
      
      
    });

    function AddErrorValidate(classNameOfField) {
        var allFields = document.querySelector(`.${classNameOfField}`);
        allFields.classList.add("errorvalidate");
    }

    function ValidateField(classNameOfField) {
        var allFields = document.querySelector(`.${classNameOfField}`);
        if (allFields.value == "") {
            return false;
        } else {
            return true;
        }

    }

    function selectvalidateField(classNameOfselect) {
        var allFields = document.getElementById(classNameOfselect);
        if (allFields.value == 100) {
            return false;
        } else {
            //alert('Max 3 digits are allowed!'); // you can write your own logic to warn users 
            return true;
        }

    }
</script>
<!--====================  End of page content  ====================-->
@endsection