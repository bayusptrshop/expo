<?php

namespace App\Imports;

use App\Models\Kontestan;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class KontestanImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new Kontestan([
            'nama_kontestan' => $row['nama_kontestan'],
            'tema' => $row['tema'] ?? null,
            'status_tampil' => false
        ]);
    }
}
