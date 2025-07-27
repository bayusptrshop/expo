<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CertificateEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $participant;
    public $pdfPath;

    public function __construct($participant, $pdfPath)
    {
        $this->participant = $participant;
        $this->pdfPath = $pdfPath;
    }

    public function build()
    {
        $namaFile = 'Sertifikat_TechnoVision2025_'.$this->participant->nim.'.pdf';

        return $this->subject('[SERTIFIKAT] TechnoVision 2025 - '.$this->participant->nama)
            ->view('emails.certificate_notification') // Template email notifikasi
            ->attach($this->pdfPath, [
                'as' => $namaFile,
                'mime' => 'application/pdf',
            ]);
    }
}
