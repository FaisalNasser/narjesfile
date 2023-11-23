<?php

namespace App\Jobs;
use DB,
Auth,
Mail;
use View;
use Session;
use Artisan;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Queue;
use Carbon\Carbon;
use Illuminate\Mail\Mailable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Mail\MethodStatementNaturalEmail;
use Illuminate\Support\Facades\Log;
use App\Mail\NewslettersEmail;

use JetBrains\PhpStorm\Language;
use stdClass;
use App\Mail\TestEmail;
use App\Mail\OrderEmail;
use App\Mail\MethodStatementMamishEmail;
use App\Mail\OrderExelEmail;
use Illuminate\Support\Facades\Hash;


class SendNaturalEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct()
    {
        //
    }

 public function handle()
{
  

    try {
 
        Mail::to($email)->send(new NewslettersEmail());
        
        Log::info('Email sent successfully to faisalnaser587@gmail.com');
    } catch (\Exception $e) {
        Log::error('Email sending failed: ' . $e->getMessage());
    }

    Log::info('SendNaturalEmailJob completed');
}
}

