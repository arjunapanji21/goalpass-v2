<?php

namespace App\Imports;

use App\Models\Klub;
use App\Models\Kota;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class KlubImport implements ToModel, WithStartRow
{
    /**
     * @return int
     */
    public function startRow(): int
    {
        return 2;
    }
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        if (count(Klub::where('nama', 'like', $row[0])->get()) > 0) {
            // skip jika nama klub sudah ada
        } else {
            $kota_kab = Kota::where('kd_kota', $row[1])->first();
            return new Klub([
                'nama' => $row[0],
                'kd_kota' => $row[1],
                'kota_kab' => $kota_kab->nama,
            ]);
        }
    }
}
