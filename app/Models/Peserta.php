<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Peserta extends Model
{
    protected $fillable = [
        'name',
        'email',
        'wa',
        'qr_hash'
    ];
}
