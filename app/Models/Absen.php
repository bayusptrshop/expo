<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Absen extends Model
{
    protected $fillable = [
        'peserta_id',
        'masuk',
        'pulang',
    ];

    public function peserta()
    {
        return $this->belongsTo(Peserta::class, 'peserta_id');
    }
}
