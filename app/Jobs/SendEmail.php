<?php

namespace App\Jobs;
use App\Mail\MethodStatementNaturalEmail;
use DB,
Auth;

use App\Mail\NewslettersEmail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class SendEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $email;
    public $emailContent;


   public function __construct($email, $emailContent)
    {
        $this->email = $email;
        $this->emailContent = $emailContent;
    }

    public function handle()
    {
    

    try {
     
        Mail::to($this->email)->queue(new MethodStatementNaturalEmail($this->emailContent));

        // Mail::to("faisalnaser587@gmail.com")->queue(new NewslettersEmail());
     
        Log::info('Email sent successfully to faisalnaser587@gmail.com');
    } catch (\Exception $e) {
        Log::error('Email sending failed: ' . $e->getMessage());
    }

    Log::info('SendNaturalEmailJob completed');
        
      
    }
}

