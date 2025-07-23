<?php

namespace App\Http\Controllers;

use App\Models\Absen;
use App\Models\Kontestan;
use App\Models\Penilaian;
use App\Models\Peserta;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf as PDF;

class ExpoController extends Controller
{
    public function absen(Request $request)
    {
        $hash = $request->input('qr_hash');
        $peserta = Peserta::where('qr_hash', $hash)->first();

        if (!$peserta) return back()->with('error', 'QR tidak valid');

        $absen = Absen::firstOrCreate(['peserta_id' => $peserta->id]);

        if (!$absen->masuk) {
            $absen->masuk = now();
        } elseif (!$absen->pulang) {
            $absen->pulang = now();
        }

        $absen->save();

        return view('scan', ['status' => 'Absensi berhasil']);
    }

    public function sertifikat($hash)
    {
        $peserta = Peserta::where('qr_hash', $hash)->firstOrFail();
        $absen = Absen::where('peserta_id', $peserta->id)->first();

        $jumlahKontestan = Kontestan::count();
        $jumlahNilaiPeserta = Penilaian::where('peserta_id', $peserta->id)->count();

        if ($jumlahKontestan == $jumlahNilaiPeserta && $absen && $absen->masuk && $absen->pulang) {
            $pdf = PDF::loadView('sertifikat', compact('peserta'));
            return $pdf->download('sertifikat-' . $peserta->nama . '.pdf');
        } else {
            return back()->with('error', 'Belum memenuhi syarat untuk mengunduh sertifikat.');
        }
    }
}
