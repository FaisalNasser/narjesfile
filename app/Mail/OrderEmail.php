<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderEmail extends Mailable
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

        return $this->markdown('emails.order')->subject("Ihre Bestelleingangsbestätigung bei Narjes Alsham")->with('content', $this->content)
         ->attach(public_path('/uploads/pdf/Widerrufsrecht.pdf'))
         ->attach(public_path('/uploads/pdf/AllgemeineGeschäftsbedingungen.pdf'))
         ->attach(public_path('/uploads/pdf/Datenschutz&Cookies.pdf'))
         ;
    }
}