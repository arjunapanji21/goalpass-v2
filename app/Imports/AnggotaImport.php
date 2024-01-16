<?php

namespace App\Imports;

use App\Models\Anggota;
use App\Models\Klub;
use App\Models\Kota;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class AnggotaImport implements ToModel, WithStartRow
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
        if (str_contains($row[2], '/')) {
            $tgl = explode('/', $row[2]);
            $tgl_lahir = $tgl[2] . '-' . $tgl[1] . '-' . $tgl[0];
        } else {
            $tgl_lahir = date('Y-m-d', strtotime(Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[2]))));
        }

        $kd_urutkota = $row[11];
        if ($kd_urutkota < 10) {
            $kd_urutkota = "000" . $kd_urutkota;
        } else if ($kd_urutkota < 100) {
            $kd_urutkota = "00" . $kd_urutkota;
        } else if ($kd_urutkota < 1000) {
            $kd_urutkota = "0" . $kd_urutkota;
        }

        $kd_kartu = $row[9] . $row[10] . $kd_urutkota . date('dmY', strtotime($tgl_lahir));
        $getAnggota = Anggota::where('nama', $row[1])->where('tgl_lahir', $tgl_lahir)->get();
        $duplicate = count($getAnggota);
        if ($duplicate > 0) {
            // skip jika kode kartu sudah ada
            if($duplicate == 1){
                $kota_kab = Kota::where('kd_kota', $row[9])->first();
                if ($kota_kab != null) {
                    $kota_kab = $kota_kab->nama;
                } else {
                    $kota_kab = $row[13];
                }
                $anggota = $getAnggota->first();
                $anggota->update([
                        'klub' => $row[4],
                        'umur' => $row[5],
                        'kd_kota' => $row[9],
                        'kd_gender' => $row[10],
                        'kd_urutkota' => $row[11],
                        'kd_kartu' => $kd_kartu,
                        'kota_kab' => $kota_kab,
                        'no_xls' => $row[0],
                    ]);
            }else{
                dd($getAnggota);
            }
        } else {
            // try {
                $kota_kab = Kota::where('kd_kota', $row[9])->first();
                if ($kota_kab != null) {
                    $kota_kab = $kota_kab->nama;
                } else {
                    $kota_kab = $row[13];
                }
    
                $result = [
                    'nama' => $row[1],
                    'tgl_lahir' => $tgl_lahir,
                    'nik' => trim($row[3], '`'),
                    'klub' => $row[4],
                    'umur' => $row[5],
                    'tgl_rilis' => '06/23',
                    'expired' => '10 / 25',
                    'kd_kota' => $row[9],
                    'kd_gender' => $row[10],
                    'kd_urutkota' => $row[11],
                    'kd_kartu' => $kd_kartu,
                    'kota_kab' => $kota_kab,
                    'no_xls' => $row[0],
                    'foto' => explode('-', $row[5])[1] . '-' . $row[0] . '-' . $kd_kartu . '.jpg',
                ];
                return new Anggota($result);
            // } catch (\Throwable $th) {
            //     dd($row);
            // }
        }
    }
}
