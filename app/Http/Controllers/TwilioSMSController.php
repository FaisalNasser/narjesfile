<?php

namespace App\Http\Controllers;

use App\Setting;
use App\Customer;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Requests\CreateCustomerOrder;
use Exception;
use Twilio\Rest\Client;
use App\Http\Controllers\Twilio;
use Auth;
use App\Mail\SendMail;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestEmail;
use Illuminate\Support\Facades\Hash;


class TwilioSMSController extends Controller
{
    private $code;

    public function customerLoginSMS(Request $customer)
    {
        $dbCustomer = Customer::where("email", $customer["email"])->first();
    
        if (!$dbCustomer || !Hash::check($customer["passwordlogin"], $dbCustomer->password) || $dbCustomer->activation == 0) {
            if( $dbCustomer->activation == 0)
            {
                return back()->with("messageForLogin",__('site.Please_activate_the_code'));

            }else{
                return back()->with("messageForLogin", __('site.The_email_or_password_is_incorrect'));
            }
        }
    
        $this->code = rand(99999, 10000);
        
        auth::guard("customer")->login($dbCustomer,true);
    
        return redirect('/')->with('message-success', __('site.SuccessfullyUpdated'));
    }


    public function customerOrderSMS(Requests\CreateCustomerOrder $customer)
    {
        // dd($customer->all());
        $this->code = rand(99999, 10000);
        try {
            $account_sid = getenv("TWILIO_SID");
            $auth_token = getenv("TWILIO_TOKEN");
            $twilio_number = getenv("TWILIO_FROM");

            $client = new Client($account_sid, $auth_token);
            $client->messages->create($customer["phone"], [
                'from' => $twilio_number,
                'body' => "Your Code is : " . $this->code

            ]);
        } catch (Exception $e) {
            // dd("Error: ". $e->getMessage());
            return 0;
        }
        $dbCustomer = Customer::where("phone", $customer["phone"])->first();
        if ($dbCustomer) {
            $dbCustomer["code"] = $this->code;
            $dbCustomer->update();
            return 1;
        }
        $customer["address"] = json_encode($customer["address"], JSON_UNESCAPED_UNICODE);
        $customer["code"] = $this->code;
        // dd($customer->all());
        Customer::create($customer->all());
        return 1;

    }

    public function verfiAccount(Request $request)
    {
        $customer = Customer::where('email', $request->email)->first();
        // dd($customer);
        if ($request->activationCode == $customer["code"]) {
            $customer["activation"] = 1;
            $customer->update();
            auth::guard("customer")->login($customer);
            return 1;
        }

        return false;

    }
    public function resendCodeSMS(Request $phone)
    {
        $this->code = rand(99999, 10000);

        $dbCustomer = Customer::where("email", $phone["email"])->first();
        if (!$dbCustomer) {
            return false;
        }
        $dbCustomer['code'] = $this->code;
        $dbCustomer->update();
        return true;
    }
}