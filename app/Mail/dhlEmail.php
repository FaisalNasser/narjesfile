<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class dhlEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($content)
    {
        $this->content = $content;
    }

    /**
     * Build the message.
     *
     * @return $this
     */

    public function build()
    {
        // $content = [
        //     'name' => 'Test Email From AllPHPTricks.com'
        // ];

        return $this->markdown('emails.dhl')
        ->subject("Ihre Bestellung von narjes-alsham.com ist auf dem Weg")
        ->with('content', $this->content);
    }
}