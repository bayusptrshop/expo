<?php

namespace App\Http\Controllers;

use App\Models\Absen;
use App\Models\Kontestan;
use App\Models\Penilaian;
use App\Models\Peserta;
use Asikam\QrCode\Facades\QrCode;
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
        } else {
            return back()->with('error', 'Absensi sudah selesai');
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

    public function home()
    {
        $pesertas = Peserta::all();
        return view('home', compact('pesertas'));
    }

    public function scan()
    {
        return view('scan');
    }

    public function generateQRCode($pesertaId)
    {
        $peserta = Peserta::findOrFail($pesertaId);
        $qrHash = hash_hmac('sha256', $peserta->id, env('QR_SECRET'));
        $fileName = $peserta->id . '.png';
        QrCode::format('png')->size(300)->generate($qrHash, public_path('qrcodes/' . $fileName));
        $peserta->qr_hash = $qrHash;
        $peserta->save();

        return response()->download(public_path('qrcodes/' . $fileName));
    }

    public function penilaian($hash)
    {
        $peserta = Peserta::where('qr_hash', $hash)->firstOrFail();
        $kontestans = Kontestan::all();
        $existing = Penilaian::where('peserta_id', $peserta->id)->pluck('skor', 'kontestan_id')->toArray();

        return view('penilaian', compact('peserta', 'kontestans', 'existing'));
    }

    public function submitPenilaian(Request $request)
    {
        $peserta = Peserta::where('qr_hash', $request->input('qr_hash'))->firstOrFail();

        foreach ($request->input('nilai') as $kontestan_id => $skor) {
            Penilaian::updateOrCreate(
                ['peserta_id' => $peserta->id, 'kontestan_id' => $kontestan_id],
                ['skor' => $skor]
            );
        }

        return redirect('/')->with('success', 'Penilaian berhasil disimpan!');
    }
}
