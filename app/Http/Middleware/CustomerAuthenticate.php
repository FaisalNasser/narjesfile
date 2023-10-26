<?php

namespace App\Http\Middleware;

use App\Http\Controllers\Auth\CustomerLoginController;
use Closure;
// use App\Customer;
use Illuminate\Http\Request;
use Auth;

class CustomerAuthenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        if(Auth::guard("customer")->check()){
            return $next($request);
        }
        return redirect()->to('/')->with("error", __("login.need_login"));
    }
}
