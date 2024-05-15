<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class verify extends Mailable
{
    use Queueable, SerializesModels;
    public $user;
    public $tieude;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($tieude,$user)
    {
        $this->tieude = $tieude;
        $this->user = $user;
        
     

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject($this->tieude)
                    ->view('emails.verify')
                    ->with([
                        'user' => $this->user
                        
                    ]);
    }
}
