<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class thongtindatve_email extends Mailable
{
    use Queueable, SerializesModels;
    public $subject;
    public $mahoadon;
    public $tenphim;
    public $diachi;
    public $thoigian;
    public $soluongve;
    public $ghedachon;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($subject, $mahoadon,$tenphim,$diachi,$thoigian,$soluongve,$ghedachon )
    {
        $this->subject = $subject;
        $this->mahoadon = $mahoadon;
        $this->tenphim = $tenphim;
        $this->diachi = $diachi;
        $this->thoigian = $thoigian;
        $this->soluongve = $soluongve;
        $this->ghedachon = $ghedachon;
     

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject($this->subject)
                    ->view('emails.thongtindatve_email')
                    ->with([
                        'mahoadon' => $this->mahoadon,
                        'tenphim' => $this->tenphim,
                        'diachi' => $this->diachi,
                        'thoigian' => $this->thoigian,
                        'soluongve' => $this->soluongve,
                        'ghedachon' => $this->ghedachon,
                    ]);
    }
}
