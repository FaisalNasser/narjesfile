<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;

class NewslettersEmail extends Mailable 
{
    //  implements ShouldQueue
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
         
        
        public function __construct()
        {
            
        }

    /**
     * Build the message.
     *
     * @return $this
     */

  public function build()
    {
        

        return $this->markdown('emails.newsletters')
                    ->subject("Willkommen beim Newsletter-Service von Narjes Alsham Shop!");
                     
    }
}