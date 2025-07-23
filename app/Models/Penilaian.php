<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penilaian extends Model
{
    protected $fillable = [
        'peserta_id',
        'kontestan_id',
        'skor',
    ];
}
