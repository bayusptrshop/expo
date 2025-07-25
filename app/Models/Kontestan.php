<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kontestan extends Model
{
    protected $fillable = ['nama_kontestan', 'kategori', 'status_tampil'];

    public function penilaians()
    {
        return $this->hasMany(Penilaian::class);
    }
}
