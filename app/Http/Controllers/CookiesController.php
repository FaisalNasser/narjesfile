<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Http\Requests;

class CookiesController extends Controller
{
    public function setCookies(Request $request){
        // dd($request->all());
        $key = $request->input("key");
        $value = $request->input("value");
        $time = $request->input("time");
        $cookie = cookie($key, $value, $time);
        // dd($cookie);

        return response(true)->withCookie($cookie);
    }

}
