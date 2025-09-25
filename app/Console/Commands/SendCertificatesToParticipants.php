<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Peserta;
use Illuminate\Support\Facades\Mail;
use App\Mail\CertificateEmail;

class SendCertificatesToParticipants extends Command
{
    protected $signature = 'certificates:send';
    protected $description = 'Send certificates to all participants with Google Drive links';

    // Base Google Drive folder URL
    private $driveBaseUrl = 'https://drive.google.com/drive/folders/1nsGyxsykRQrvX0H_daa_s0sCgatBJEbB?usp=sharing';

    public function handle()
    {
        $participants = Peserta::all();
        $sentCount = 0;
        $failedCount = 0;
        $failedEmails = [];

        foreach ($participants as $participant) {
            try {
                // Generate the Google Drive link (assuming files are named consistently)
                $certificateUrl = $this->generateCertificateUrl($participant);

                Mail::to($participant->email)
                    ->send(new CertificateEmail($participant, $certificateUrl));

                $this->info("Certificate sent successfully to: {$participant->email}");
                $sentCount++;

            } catch (\Exception $e) {
                $this->error("Failed to send to {$participant->email}: " . $e->getMessage());
                $failedCount++;
                $failedEmails[] = $participant->email;
            }
        }

        // Display summary
        $this->line("\n=== Email Sending Summary ===");
        $this->info("Successfully sent: {$sentCount} emails");
        $this->error("Failed to send: {$failedCount} emails");

        if ($failedCount > 0) {
            $this->line("\nFailed emails:");
            foreach ($failedEmails as $email) {
                $this->line("- {$email}");
            }
        }
    }

    /**
     * Generate Google Drive URL for participant's certificate
     */
    private function generateCertificateUrl($participant)
    {
        return $this->driveBaseUrl;
    }
}
