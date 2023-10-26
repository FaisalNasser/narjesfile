<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use DB,
Auth,
Mail;
use App\Mail\NewslettersEmail;
use App\Mail\NewslettersEmailToAll;

class NewsletterController extends Controller
{

	public function index()
{
    $subscribers = DB::table("newsletters")->paginate(10); // Adjust the number of items per page as needed

    return view('backend.newsletter.index', ['subscribers' => $subscribers]);
}

	public function store(Request $request) {
		$email = $request->input('email');	
		if (empty($email)) {
        return response()->json(['status' => 'error']);
         } else {
           		$email_already = DB::table("newsletters")->where("email", $email)->first();
	
		if (!is_null($email_already)) {
			return response()->json(['status' => 'already']);
		}
		else{
			DB::table("newsletters")->insert(array("email" => $email));
			Mail::to($email)->send(new NewslettersEmail());
			return response()->json(['status' => 'success']);

		}
         }

	}

	public function sendEmail(Request $customer)
    {
		$subscribers = DB::table("newsletters")->get(); // Adjust the number of items per page as needed
		foreach ($subscribers as $email) {
			Mail::to($email)->send(new NewslettersEmailToAll());
		}

        return back()->with("message", __('site.Successfully_seend_your_e-mail'));

    }



}
