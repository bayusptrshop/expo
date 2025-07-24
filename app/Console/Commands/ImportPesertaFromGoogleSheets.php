<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Peserta;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use App\Mail\PesertaEmail;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;

class ImportPesertaFromGoogleSheets extends Command
{
    protected $signature = 'import:peserta';
    protected $description = 'Import peserta data from Google Sheets CSV';

    public function handle()
    {

        $spreadsheetId = env('GOOGLE_SHEET_ID');
        $csvUrl = "https://docs.google.com/spreadsheets/d/{$spreadsheetId}/export?format=csv&gid=0";


        $response = Http::get($csvUrl);

        if (!$response->successful()) {
            $this->error('Gagal mengambil data dari Google Sheets');
            Log::error('Gagal mengambil data CSV', ['status' => $response->status()]);
            return;
        }

        $csvData = $response->body();
        $rows = $this->parseCSV($csvData);

        $count = 0;
        foreach ($rows as $index => $row) {
            // Skip header jika ada
            if ($index === 0 && (stripos($row['nim'] ?? '', 'nim') !== false || stripos($row['timestamp'] ?? '', 'timestamp') !== false)) {
                continue;
            }

            $nim = $row['nim'] ?? null;
            $nama = $row['nama_lengkap'] ?? null;
            $email = $row['email'] ?? null;
            $wa = $row['no_whatsapp'] ?? null;

            // Validasi data penting
            if (empty($nim) || empty($nama) || empty($wa)) {
                $this->warn("Data tidak lengkap pada baris $index: " . json_encode($row));
                continue;
            }

            // Format nomor WhatsApp (hilangkan semua non-digit dan +)
            $wa = preg_replace('/[^0-9]/', '', $wa);

            // Validasi panjang nomor WhatsApp
            if (strlen($wa) < 10) {
                $this->warn("Nomor WA tidak valid pada baris $index: $wa");
                continue;
            }

            try {
                // Simpan peserta dan buat QR hash
                $peserta = Peserta::updateOrCreate(
                    ['nim' => $nim],
                    [
                        'nama' => strtoupper(trim($nama)),
                        'email' => !empty($email) ? trim($email) : null,
                        'wa' => $wa,
                        'qr_hash' => $this->generateQRCodeID($nim),
                    ]
                );

                // Generate QR Code untuk peserta
                $this->generateQRCode($peserta);

                // Kirimkan email hanya untuk data baru yang berhasil disimpan
                if ($peserta->wasRecentlyCreated) {
                    Mail::to($peserta->email)->send(new PesertaEmail($peserta));
                    $this->info("Berhasil mengirimkan email ke: $peserta->email");

                    sleep(5); // delay 5 detik buat hindar rate limit
                }

                $count++;
                $this->info("Berhasil impor: $nim - $nama");
            } catch (\Exception $e) {
                $this->error("Gagal menyimpan data untuk NIM {$nim}: " . $e->getMessage());
                Log::error("Gagal menyimpan peserta", ['nim' => $nim, 'error' => $e->getMessage()]);
            }
        }

        $this->info("Berhasil mengimpor {$count} peserta.");
    }

    private function generateQRCodeID($nim)
    {
        // Buat ID yang lebih singkat (misalnya, berdasarkan NIM atau hash pendek)
        return substr(md5($nim), 0, 8); // Menggunakan hash pendek dari NIM
    }

    private function generateQRCode($peserta)
    {
        try {

            $qrCode = new QrCode($peserta->qr_hash);
            $writer = new PngWriter();

            // Tentukan path untuk menyimpan file QR
            $path = public_path('qr_codes' . DIRECTORY_SEPARATOR . $peserta->qr_hash . '.png');

            // Menyimpan QR Code ke file PNG
            $writer->write($qrCode)->saveToFile($path);

            $this->info("QR Code disimpan di: $path");

        } catch (\Exception $e) {
            // Jika gagal, fallback ke teks ID peserta
            $this->info("Gagal membuat QR Code untuk NIM: {$peserta->nim}, fallback ke ID: {$peserta->qr_hash}");
        }
    }

    private function parseCSV($csvContent)
    {
        $rows = [];
        $lines = explode("\n", trim($csvContent));

        // Handle kemungkinan line breaks dalam cell
        $lines = $this->properlyParseCSVLines($lines);

        // Ambil header dari baris pertama
        $headers = str_getcsv(array_shift($lines));

        // Normalisasi nama header
        $normalizedHeaders = array_map(function ($header) {
            $header = trim($header);
            $header = strtolower($header);
            $header = str_replace(['nama lengkap (huruf kapital)', 'nama lengkap'], 'nama_lengkap', $header);
            $header = str_replace(['no whatsapp', 'nomor whatsapp', 'wa'], 'no_whatsapp', $header);
            return $header;
        }, $headers);

        foreach ($lines as $line) {
            $values = str_getcsv($line);

            // Pastikan jumlah value sesuai dengan header
            if (count($values) !== count($normalizedHeaders)) {
                continue;
            }

            $row = array_combine($normalizedHeaders, $values);
            $rows[] = [
                'timestamp' => $row['timestamp'] ?? null,
                'nim' => $row['nim'] ?? null,
                'nama_lengkap' => $row['nama_lengkap'] ?? null,
                'email' => $row['email'] ?? null,
                'no_whatsapp' => $row['no_whatsapp'] ?? null,
            ];
        }

        return $rows;
    }

    private function properlyParseCSVLines($lines)
    {
        $properLines = [];
        $tempLine = '';

        foreach ($lines as $line) {
            $tempLine .= $line;

            // Jika jumlah kutipan genap, berarti line sudah lengkap
            if (substr_count($tempLine, '"') % 2 === 0) {
                $properLines[] = $tempLine;
                $tempLine = '';
            } else {
                $tempLine .= "\n";
            }
        }

        return $properLines;
    }
}
