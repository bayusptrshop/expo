<?php

namespace App\Http\Controllers;

use App\Models\Absen;
use App\Models\Kontestan;
use App\Models\Penilaian;
use App\Models\Peserta;
use Asikam\QrCode\Facades\QrCode;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Carbon\Carbon;

class ExpoController extends Controller
{
    public function absen(Request $request)
    {
        $hash = $request->input('qr_hash');
        $peserta = Peserta::where('qr_hash', $hash)->first();

        if (!$peserta) return redirect()->back()->with('error', 'QR tidak valid');

        $absen = Absen::firstOrCreate(['peserta_id' => $peserta->id]);
        $date_time_start = Carbon::parse('2025-07-26 08:00:00');
        $date_time_end = Carbon::parse('2025-07-26 16:00:00');
        $date_time_now = Carbon::now();

        Carbon::setLocale('id');

        if ($date_time_now < $date_time_start && !$absen->masuk) {
            return redirect()->back()->with('error', 'Absensi masuk belum dibuka, dimulai pada ' . $date_time_start->isoFormat('dddd, D MMMM YYYY [Jam] HH:mm'));
        } elseif ($date_time_now < $date_time_end && $absen->masuk && !$absen->pulang) {
            return redirect()->back()->with('error', 'Absensi pulang belum dibuka, dimulai pada ' . $date_time_end->isoFormat('dddd, D MMMM YYYY [Jam] HH:mm'));
        } elseif ($absen->masuk && $absen->pulang) {
            return redirect()->back()->with('error', 'Anda sudah absen masuk dan pulang');
        } elseif (!$absen->masuk) {
            $absen->masuk = now();
        } elseif (!$absen->pulang) {
            $absen->pulang = now();
        }

        $absen->save();

        return redirect()->back()->with('success', 'Absensi berhasil');
    }

    public function sertifikat(Request $request, $hash = null)
    {
        if ($hash) {
            $peserta = Peserta::where('qr_hash', $hash)->first();
            if (!$peserta) return redirect()->back()->with('error', 'QR tidak valid');
        } else {
            $peserta = Peserta::where('nim', $request->input('nim'))->first();
            if (!$peserta) return redirect()->back()->with('error', 'NIM tidak valid');
        }
        $absen = Absen::where('peserta_id', $peserta->id)->first();

        $jumlahKontestan = Kontestan::count();
        $jumlahNilaiPeserta = Penilaian::where('peserta_id', $peserta->id)->count();

        if ($jumlahKontestan == $jumlahNilaiPeserta && $absen && $absen->masuk && $absen->pulang) {
            // $pdf = PDF::loadView('sertifikat', compact('peserta'));
            return view('sertifikat', compact('peserta'));
        } else {
            return redirect()->back()->with('error', 'Belum memenuhi syarat untuk mengunduh sertifikat.');
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
        $qrHash = hash_hmac('sha256', $peserta->nim, env('QR_SECRET'));
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

    public function admin()
    {
        $pesertas = Peserta::with(['absen', 'penilaians'])->get();

        $kontestans = Kontestan::all();
        $totalKontestan = $kontestans->count();
        $totalPeserta = $pesertas->count();
        $pesertaSudahAbsenMasuk = 0;
        $pesertaSudahAbsenPulang = 0;
        $pesertaSudahMenilaiSemua = 0;
        $pesertaSiapCetakSertifikat = 0;

        foreach ($pesertas as $peserta) {
            if ($peserta->absen && $peserta->absen->masuk) {
                $pesertaSudahAbsenMasuk++;
            }

            if ($peserta->absen && $peserta->absen->pulang) {
                $pesertaSudahAbsenPulang++;
            }
            if ($totalKontestan > 0 && $peserta->penilaians->count() === $totalKontestan) {
                $pesertaSudahMenilaiSemua++;
            }
            if (
                $peserta->absen && $peserta->absen->masuk && $peserta->absen->pulang &&
                $totalKontestan > 0 && $peserta->penilaians->count() === $totalKontestan
            ) {
                $pesertaSiapCetakSertifikat++;
            }
        }

        $pesertaSudahAbsen = ($pesertaSudahAbsenMasuk + $pesertaSudahAbsenPulang) / $totalPeserta;

        // Kirim variabel ke view
        return view('admin', compact(
            'pesertas',
            'kontestans',
            'totalPeserta',
            'pesertaSudahAbsen',
            'pesertaSudahMenilaiSemua',
            'pesertaSiapCetakSertifikat'
        ));
    }

    public function sertifikatView()
    {
        return view('sertifikat-view');
    }

    public function tampilkanKelompok($id)
    {

        $kelompok = Kontestan::find($id);
        if (!$kelompok) {
            return redirect()->back()->with('error', 'Kelompok tidak ditemukan.');
        }
        Kontestan::where('status_tampil', true)->update(['status_tampil' => false]);
        $kelompok->status_tampil = true;
        $kelompok->save();

        return redirect()->back()->with('success', 'Kelompok berhasil ditampilkan!');
    }

    public function listKontestan()
    {
        $kontestans = Kontestan::with('penilaians')->get();
        $total_kontestan = Kontestan::count();
        $kontestan_selesai = 0;
        foreach ($kontestans as $kontestan) {
            if ($kontestan->penilaians->isNotEmpty()) {
                $kontestan_selesai++;
            }
        }
        $kontestan_belum_selesai = Kontestan::where('status_tampil', false)->count();
        $total_audiens = Peserta::count();
        return view('list-kontestan', compact('kontestans', 'total_kontestan', 'kontestan_selesai', 'kontestan_belum_selesai', 'total_audiens'));
    }

    public function absenApi(Request $request)
    {
        $hash = $request->input('qr_hash');
        $peserta = Peserta::where('qr_hash', $hash)->first();

        if (!$peserta) return response()->json([
            'status' => 'error',
            'message' => 'QR tidak valid'
        ], 400);

        $absen = Absen::firstOrCreate(['peserta_id' => $peserta->id]);
        $date_time_start = Carbon::parse('2025-07-26 08:00:00');
        $date_time_end = Carbon::parse('2025-07-26 16:00:00');
        $date_time_now = Carbon::now();

        Carbon::setLocale('id');

        if ($date_time_now < $date_time_start && !$absen->masuk) {
            return response()->json([
                'status' => 'error',
                'message' => 'Absensi masuk belum dibuka, dimulai pada ' . $date_time_start->isoFormat('dddd, D MMMM YYYY [Jam] HH:mm')
            ], 400);
        } elseif ($date_time_now < $date_time_end && $absen->masuk && !$absen->pulang) {
            return response()->json([
                'status' => 'error',
                'message' => 'Absensi pulang belum dibuka, dimulai pada ' . $date_time_end->isoFormat('dddd, D MMMM YYYY [Jam] HH:mm')
            ], 400);
        } elseif ($absen->masuk && $absen->pulang) {
            return response()->json([
                'status' => 'error',
                'message' => 'Anda sudah absen masuk dan pulang'
            ], 400);
        } elseif (!$absen->masuk) {
            $absen->masuk = now();
        } elseif (!$absen->pulang) {
            $absen->pulang = now();
        }

        $absen->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Absensi berhasil'
        ], 200);
    }
}
