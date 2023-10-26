<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class EncryptionController extends Controller
{
    public function encrypt(){
        $encrypt = Crypt::encryptString();
        return $encrypt;
    }
    public function decrypt(){

    }
}
