<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MethodStatementMamishEmail extends Mailable
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

        return $this->markdown('emails.methodstatementmamish')
        ->subject("Anwendung des Brazilian Proteins von narjes-alsham.com")
        ->with('content', $this->content)
                ->attach(public_path('/uploads/pdf/Anwendung.pdf'))
               ->attach(public_path('/uploads/pdf/طريقة الاستخدام.pdf'));
    }
}