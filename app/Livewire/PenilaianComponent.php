<?php

namespace App\Livewire;

use App\Models\Kontestan;
use App\Models\Penilaian;
use Livewire\Component;

class PenilaianComponent extends Component
{
    // Menggunakan array untuk menyimpan skor setiap kontestan
    // Kunci array adalah kontestan_id, nilainya adalah skor yang dipilih
    public array $penilaians = [];

    // Properti publik untuk menyimpan koleksi kontestan
    public $kelompok; // Koleksi kontestan yang sedang tampil

    // ID audiens (peserta yang sedang menilai)
    public $audiens_id;

    // Aturan validasi
    // 'penilaians.*' akan memvalidasi setiap item dalam array $penilaians
    protected $rules = [
        'penilaians.*' => 'required|integer|in:100,75,40', // Sesuaikan dengan nilai opsi Anda
    ];

    public function mount()
    {
        $this->audiens_id = session('peserta_id');

        // Ambil semua kontestan yang sedang tampil
        $this->kelompok = Kontestan::where('status_tampil', true)->get();

        // Inisialisasi array $penilaians dengan skor yang sudah ada
        // agar select box menampilkan nilai yang sudah tersimpan
        foreach ($this->kelompok as $kontestan) {
            $existingPenilaian = Penilaian::where('peserta_id', $this->audiens_id)
                                         ->where('kontestan_id', $kontestan->id)
                                         ->first();
            $this->penilaians[$kontestan->id] = $existingPenilaian ? $existingPenilaian->skor : '';
        }

        if ($this->kelompok->isEmpty()) {
            $this->dispatch('showToast', ['type' => 'info', 'message' => 'Saat ini tidak ada kontestan yang sedang tampil untuk dinilai.']);
        }
    }

    public function submitPenilaian(int $kontestanId)
    {
        $kontestanToRate = $this->kelompok->firstWhere('id', $kontestanId);
        if (!$kontestanToRate) {
            $this->dispatch('showToast', ['type' => 'error', 'message' => 'Kontestan tidak ditemukan.']);
            return;
        }

        // Validasi hanya skor untuk kontestan yang sedang disubmit
        $this->validate([
            'penilaians.' . $kontestanId => 'required|integer|in:100,75,40',
        ], [
            'penilaians.' . $kontestanId . '.required' => 'Skor harus dipilih.',
            'penilaians.' . $kontestanId . '.integer' => 'Skor harus berupa angka.',
            'penilaians.' . $kontestanId . '.in' => 'Skor yang dipilih tidak valid.'
        ]);
        $existingPenilaian = Penilaian::where('peserta_id', $this->audiens_id)
                                      ->where('kontestan_id', $kontestanId)
                                      ->first();

        if ($existingPenilaian) {
            $existingPenilaian->update([
                'skor' => $this->penilaians[$kontestanId]
            ]);
            // Livewire 3:
            $this->dispatch('showAlertInCard', [
                'type' => 'success',
                'message' => 'Penilaian untuk ' . $kontestanToRate->nama_kontestan . ' berhasil diperbarui!',
                'kontestanId' => $kontestanId
            ]);
            // Livewire 2:
            // $this->emit('showAlertInCard', 'success', 'Penilaian untuk ' . $kontestanToRate->nama_kontestan . ' berhasil diperbarui!', $kontestanId);

        } else {
            // Jika belum ada, buat penilaian baru
            Penilaian::create([
                'peserta_id' => $this->audiens_id,
                'kontestan_id' => $kontestanId,
                'skor' => $this->penilaians[$kontestanId]
            ]);
            // Livewire 3:
            $this->dispatch('showAlertInCard', [
                'type' => 'success',
                'message' => 'Penilaian untuk ' . $kontestanToRate->nama_kontestan . ' berhasil disimpan!',
                'kontestanId' => $kontestanId
            ]);
            // Livewire 2:
            // $this->emit('showAlertInCard', 'success', 'Penilaian untuk ' . $kontestanToRate->nama_kontestan . ' berhasil disimpan!', $kontestanId);
        }
    }

    public function render()
    {
        // $kelompok sudah dimuat di mount, tidak perlu query ulang di sini
        // Tapi jika Anda perlu eager load relasi di render, bisa tambahkan di sini
        // $kelompok = Kontestan::with(['penilaians' => function ($query) {
        //     $query->where('peserta_id', $this->audiens_id);
        // }])->where('status_tampil', true)->get();
        return view('livewire.penilaian-component')->layout('livewire.layouts.app'); // Variabel $kelompok sudah tersedia dari properti public
    }
}
