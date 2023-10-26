<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class MethodStatementMamishNaturalEmail extends Mailable   
{
    use Queueable, SerializesModels;

    protected $content;

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

        return $this->markdown('emails.methodstatementmamishnatural')
        ->subject("Anwendung des Brazilian Proteins von narjes-alsham.com")
        ->with('content', $this->content)
        ->attach(public_path('/uploads/pdf/natural/Anwendung.pdf'))
        ->attach(public_path('/uploads/pdf/natural/طريقة الاستخدام.pdf'))
          ->attach(public_path('/uploads/pdf/Anwendung.pdf'))
           ->attach(public_path('/uploads/pdf/طريقة الاستخدام.pdf'));
    }
}
