<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CertificateEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $participant;
    public $certificateUrl;

    public function __construct($participant, $certificateUrl)
    {
        $this->participant = $participant;
        $this->certificateUrl = $certificateUrl;
    }

    public function build()
    {
        return $this->subject('[SERTIFIKAT] TechnoVision 2025 - '.$this->participant->nama)
            ->view('emails.certificate_notification'); // Template email notifikasi
    }
}
