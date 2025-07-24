<?php

namespace App\Mail;

use App\Models\Peserta;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PesertaEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $peserta;

    public function __construct(Peserta $peserta)
    {
        $this->peserta = $peserta;
    }

    public function build()
    {
        return $this->subject('QR Code dan ID Code untuk ExpoTechnoVision 2025')
                    ->view('emails.peserta')
                    ->attach(public_path('qr_codes/'.$this->peserta->qr_hash.'.png'), [
                        'as' => 'QRCode-'.$this->peserta->nama.'.png',
                        'mime' => 'image/png',
                    ]);
    }
}
