<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use App\Customer;
class CustomerLoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/menu';
    protected $guard = 'customer';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('guest')->except('logout');
    }

    public function username()
    {
        return 'email';
    }

    function guard()
    {
        return Auth::guard($this->guard);
    }

	 public function loginuser(Request $customer)
    {
        // dd($customer);
        $customer = Customer::where('email', $customer->input('email'))->first();

        if($customer){
            Auth::guard($this->guard)->login($customer);

            return redirect()->to("home");
        }
        // dd("no Its Not Work");
        return redirect()->to('/');
    }

	 public function logout()
    {
        Auth::guard($this->guard)->logout();
        return redirect('/');
    }


}
