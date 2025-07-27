<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Peserta;
use Illuminate\Support\Facades\Mail;
use App\Mail\CertificateEmail;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\PDF as DomPDF; // Gunakan class langsung

class SendCertificatesToParticipants extends Command
{
    protected $signature = 'certificates:send';
    protected $description = 'Send certificates to all participants';

    public function handle()
    {
        Storage::makeDirectory('temp/certificates');

        $participants = Peserta::all();

        foreach ($participants as $participant) {
            try {
                // Gunakan app() untuk resolve DomPDF
                $pdf = app(DomPDF::class);
                $pdf->loadView('sertifikat', ['peserta' => $participant])
    ->setPaper('A4', 'landscape');


                $filename = 'sertifikat_'.$participant->nim.'.pdf';
                $path = storage_path('app/temp/certificates/'.$filename);
                $pdf->save($path);

                Mail::to($participant->email)
                    ->send(new CertificateEmail($participant, $path));

                unlink($path);

            } catch (\Exception $e) {
                $this->error("Gagal mengirim ke {$participant->email}: ".$e->getMessage());
            }
        }
    }
}
