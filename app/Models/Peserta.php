<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Peserta extends Model
{
    protected $fillable = [
        'nim',
        'nama',
        'email',
        'wa',
        'qr_hash'
    ];

    public function absen()
    {
        return $this->hasOne(Absen::class, 'peserta_id');
    }

    public function penilaians()
    {
        return $this->hasMany(Penilaian::class, 'peserta_id');
    }
}
