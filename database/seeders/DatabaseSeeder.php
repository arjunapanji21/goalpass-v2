<?php

namespace Database\Seeders;

use App\Models\Anggota;
use App\Models\Klub;
use App\Models\Kota;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        User::create([
            'nama' => 'Super Admin',
            'username' => 'superadmin',
            'email' => 'arjuna.panji97@gmail.com',
            'role' => 'Super Admin',
            'kd_kota' => '',
            'kota_kab' => 'ASPROV',
            'password' => bcrypt('rahasia'),
        ]);

        Kota::create([
            'kd_kota' => '01',
            'nama' => 'KABUPATEN BOGOR',
        ]);
        Kota::create([
            'kd_kota' => '02',
            'nama' => 'KABUPATEN SUKABUMI',
        ]);
        Kota::create([
            'kd_kota' => '03',
            'nama' => 'KABUPATEN CIANJUR',
        ]);
        Kota::create([
            'kd_kota' => '04',
            'nama' => 'KOTA BANDUNG',
        ]);
        Kota::create([
            'kd_kota' => '05',
            'nama' => 'GARUT',
        ]);
        Kota::create([
            'kd_kota' => '06',
            'nama' => 'KABUPATEN TASIKMALAYA',
        ]);
        Kota::create([
            'kd_kota' => '07',
            'nama' => 'CIAMIS',
        ]);
        Kota::create([
            'kd_kota' => '08',
            'nama' => 'KUNINGAN',
        ]);
        Kota::create([
            'kd_kota' => '09',
            'nama' => 'KABUPATEN CIREBON',
        ]);
        Kota::create([
            'kd_kota' => '10',
            'nama' => 'MAJALENGKA',
        ]);
        Kota::create([
            'kd_kota' => '11',
            'nama' => 'SUMEDANG',
        ]);
        Kota::create([
            'kd_kota' => '12',
            'nama' => 'INDRAMAYU',
        ]);
        Kota::create([
            'kd_kota' => '13',
            'nama' => 'SUBANG',
        ]);
        Kota::create([
            'kd_kota' => '14',
            'nama' => 'PURWAKARTA',
        ]);
        Kota::create([
            'kd_kota' => '15',
            'nama' => 'KARAWANG',
        ]);
        Kota::create([
            'kd_kota' => '16',
            'nama' => 'BEKASI',
        ]);
        Kota::create([
            'kd_kota' => '17',
            'nama' => 'BANDUNG BARAT',
        ]);
        Kota::create([
            'kd_kota' => '18',
            'nama' => 'PANGANDARAN',
        ]);
        Kota::create([
            'kd_kota' => '19',
            'nama' => 'KOTA BOGOR',
        ]);
        Kota::create([
            'kd_kota' => '20',
            'nama' => 'KOTA SUKABUMI',
        ]);
        Kota::create([
            'kd_kota' => '21',
            'nama' => 'KABUPATEN BANDUNG',
        ]);
        Kota::create([
            'kd_kota' => '22',
            'nama' => 'KOTA CIREBON',
        ]);
        Kota::create([
            'kd_kota' => '23',
            'nama' => 'KOTA BEKASI',
        ]);
        Kota::create([
            'kd_kota' => '24',
            'nama' => 'KOTA DEPOK',
        ]);
        Kota::create([
            'kd_kota' => '25',
            'nama' => 'KOTA CIMAHI',
        ]);
        Kota::create([
            'kd_kota' => '26',
            'nama' => 'KOTA TASIKMALAYA',
        ]);
        Kota::create([
            'kd_kota' => '27',
            'nama' => 'KOTA BANJAR',
        ]);
    }
}
