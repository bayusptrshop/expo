<?php

namespace App\Livewire;

use App\Models\Kontestan;
use App\Models\Penilaian;
use Livewire\Component;

class PenilaianComponent extends Component
{
    public $kelompok;
    public $audiens_id;
    public $skor;

    public function mount()
    {
        $this->audiens_id = session('peserta_id');
        $this->kelompok = Kontestan::where('status_tampil', true)->first();
    }

    public function submitPenilaian()
    {
        $check = Penilaian::where('peserta_id', $this->audiens_id)->where('kontestan_id', $this->kelompok->id)->first();
        if ($check) {
            session()->flash('error', 'Anda sudah menyimpan penilaian untuk kelompok ini sebelumnya! Silahkan lakukan penilaian untuk kelompok lain.');
        } else {
            Penilaian::create([
                'peserta_id' => $this->audiens_id,
                'kontestan_id' => $this->kelompok->id,
                'skor' => $this->skor
            ]);

            session()->flash('success', 'Berhasil menyimpan penilaian!');
            $this->skor = null;
        }
    }

    public function render()
    {
        $kelompok = Kontestan::where('status_tampil', true)->first();
        return view('livewire.penilaian-component', compact('kelompok'))
            ->layout('livewire.layouts.app');
    }
}
