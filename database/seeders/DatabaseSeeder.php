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

        Klub::create([
            "nama" => "ASAD 313",
        ]);
        Klub::create([
            "nama" => "ATEP 7",
        ]);
        Klub::create([
            "nama" => "BANDUNG LEGEND FC",
        ]);
        Klub::create([
            "nama" => "BIMA PUTRA JABAR",
        ]);
        Klub::create([
            "nama" => "BINTANG TIMOER",
        ]);
        Klub::create([
            "nama" => "BRT Putra Atsiri",
        ]);
        Klub::create([
            "nama" => "BULDOZER",
        ]);
        Klub::create([
            "nama" => "Cakra GM",
        ]);
        Klub::create([
            "nama" => "PISA L-PRO",
        ]);
        Klub::create([
            "nama" => "Cirebon United",
        ]);
        Klub::create([
            "nama" => "DK Private",
        ]);
        Klub::create([
            "nama" => "Honest",
        ]);
        Klub::create([
            "nama" => "Japar Sidik Darmaja",
        ]);
        Klub::create([
            "nama" => "KANCIL MAS",
        ]);
        Klub::create([
            "nama" => "MAGMA",
        ]);
        Klub::create([
            "nama" => "Mandala Majalengka FC",
        ]);
        Klub::create([
            "nama" => "MUTIARA 97 FC",
        ]);
        Klub::create([
            "nama" => "NIAS KBB",
        ]);
        Klub::create([
            "nama" => "Padurenan Soccer School",
        ]);
        Klub::create([
            "nama" => "Pamong Praja",
        ]);
        Klub::create([
            "nama" => "PERINTIS FC DEPOK",
        ]);
        Klub::create([
            "nama" => "PERSEKAC",
        ]);
        Klub::create([
            "nama" => "PSPB JABAR",
        ]);
        Klub::create([
            "nama" => "Putera Utama BEKASI",
        ]);
        Klub::create([
            "nama" => "W4 Ciparay FC",
        ]);
        Klub::create([
            "nama" => "AL JABBAR CIREBON",
        ]);
        Klub::create([
            "nama" => "Alexis CIMAHI",
        ]);
        Klub::create([
            "nama" => "AP KUNINGAN",
        ]);
        Klub::create([
            "nama" => "BANDUNG TIMUR FC",
        ]);
        Klub::create([
            "nama" => "BANDUNG UNITED",
        ]);
        Klub::create([
            "nama" => "BEKASI UNITED FC",
        ]);
        Klub::create([
            "nama" => "Bhatara United",
        ]);
        Klub::create([
            "nama" => "BLASTER FC",
        ]);
        Klub::create([
            "nama" => "Bogor City",
        ]);
        Klub::create([
            "nama" => "BUARAN PUTRA FC",
        ]);
        Klub::create([
            "nama" => "BUMI WANGI",
        ]);
        Klub::create([
            "nama" => "CIBINONG PUTRA FC",
        ]);
        Klub::create([
            "nama" => "CIMAHI PUTRA FC",
        ]);
        Klub::create([
            "nama" => "CIMAHI UNITED",
        ]);
        Klub::create([
            "nama" => "Cimbo TASIK",
        ]);
        Klub::create([
            "nama" => "CIREBON BARAT",
        ]);
        Klub::create([
            "nama" => "CITEUREUP RAYA FC",
        ]);
        Klub::create([
            "nama" => "DEJAN FC",
        ]);
        Klub::create([
            "nama" => "DEPOK CITY FC",
        ]);
        Klub::create([
            "nama" => "DEPOK UNITED",
        ]);
        Klub::create([
            "nama" => "EBOD CIMAHI FC",
        ]);
        Klub::create([
            "nama" => "Fanshop Football Academy",
        ]);
        Klub::create([
            "nama" => "Fatto FC",
        ]);
        Klub::create([
            "nama" => "Galaksi Jingga 877 FC",
        ]);
        Klub::create([
            "nama" => "GAPURA FC",
        ]);
        Klub::create([
            "nama" => "INSPIRE INDONESIA",
        ]);
        Klub::create([
            "nama" => "MANDALA MAJALENGKA FC",
        ]);
        Klub::create([
            "nama" => "MAUNG ANOM ",
        ]);
        Klub::create([
            "nama" => "PAKUAN CITY FC",
        ]);
        Klub::create([
            "nama" => "PATRIOT CANDRABHAGA (PCB PERSIPASI)",
        ]);
        Klub::create([
            "nama" => "PERSIB BANDUNG",
        ]);
        Klub::create([
            "nama" => "PERSIGARSEL FC",
        ]);
        Klub::create([
            "nama" => "Persikab KAB BANDUNG ",
        ]);
        Klub::create([
            "nama" => "PERSIKABBAR",
        ]);
        Klub::create([
            "nama" => "PERSIKABUMI",
        ]);
        Klub::create([
            "nama" => "PERSIKAS KAB. SUBANG",
        ]);
        Klub::create([
            "nama" => "PERSIKASI",
        ]);
        Klub::create([
            "nama" => "PERSIKOTAS ",
        ]);
        Klub::create([
            "nama" => "PERSIPO",
        ]);
        Klub::create([
            "nama" => "Perssa SUBANG",
        ]);
        Klub::create([
            "nama" => "PESIK KUNINGAN",
        ]);
        Klub::create([
            "nama" => "PLG PARAHYANGAN",
        ]);
        Klub::create([
            "nama" => "Porciwa SUKABUMI ",
        ]);
        Klub::create([
            "nama" => "PPM",
        ]);
        Klub::create([
            "nama" => "PRO TUNAS RIFO FC",
        ]);
        Klub::create([
            "nama" => "PS BARA SILIWANGI FC",
        ]);
        Klub::create([
            "nama" => "PS BRT SUBANG",
        ]);
        Klub::create([
            "nama" => "PS. GUNUNG JATI",
        ]);
        Klub::create([
            "nama" => "PSB BOGOR",
        ]);
        Klub::create([
            "nama" => "PSGC",
        ]);
        Klub::create([
            "nama" => "R2B LEGEND FC",
        ]);
        Klub::create([
            "nama" => "Roda Putra",
        ]);
        Klub::create([
            "nama" => "ROKSI FC",
        ]);
        Klub::create([
            "nama" => "SAINT PRIMA",
        ]);
        Klub::create([
            "nama" => "SUPER PROGRESIF",
        ]);
        Klub::create([
            "nama" => "TASIK RAYA FC",
        ]);
        Klub::create([
            "nama" => "UNI BANDUNG",
        ]);
        Klub::create([
            "nama" => "YASIGA D'PATRIOT",
        ]);
        Klub::create([
            "nama" => "Young Tiger FC",
        ]);
        Klub::create([
            "nama" => "BARA SILIWANGI FC",
        ]);
        Klub::create([
            "nama" => "BINA PUTRA FC",
        ]);
        Klub::create([
            "nama" => "DEJAN FC",
        ]);
        Klub::create([
            "nama" => "DEPOK RAYA FC",
        ]);
        Klub::create([
            "nama" => "GALUH FC",
        ]);
        Klub::create([
            "nama" => "KARAWANG UNITED",
        ]);
        Klub::create([
            "nama" => "MAUNG ANOM",
        ]);
        Klub::create([
            "nama" => "PARMA FC",
        ]);
        Klub::create([
            "nama" => "PERSES",
        ]);
        Klub::create([
            "nama" => "PERSIGAR",
        ]);
        Klub::create([
            "nama" => "PERSIKAD 1999 FC",
        ]);
        Klub::create([
            "nama" => "PERSIKOTAS",
        ]);
        Klub::create([
            "nama" => "PERSIMA",
        ]);
        Klub::create([
            "nama" => "PERSINDRA",
        ]);
        Klub::create([
            "nama" => "PSGJ",
        ]);
        Klub::create([
            "nama" => "SULTAN MUDA",
        ]);
        Klub::create([
            "nama" => "WAAMANAT BHINTUKA FC (WB FC)",
        ]);
        Klub::create([
            "nama" => "Tajimalela",
        ]);
        Klub::create([
            "nama" => "PADURENAN SS",
        ]);
        Klub::create([
            "nama" => "Candrabhaga",
        ]);
        Klub::create([
            "nama" => "TUNAS PRIMA",
        ]);
        Klub::create([
            "nama" => "GALUH PUTRA",
        ]);
        Klub::create([
            "nama" => "GANDAWIRU",
        ]);
        Klub::create([
            "nama" => "PARAHYANGAN",
        ]);
        Klub::create([
            "nama" => "PUTRA BREY",
        ]);
        Klub::create([
            "nama" => "PUTRA JUNIOR",
        ]);
        Klub::create([
            "nama" => "WIRABUANA",
        ]);
        Klub::create([
            "nama" => "PSI KATANA",
        ]);
        Klub::create([
            "nama" => "SSB BERINGIN PRATAMA",
        ]);
        Klub::create([
            "nama" => "SSB IRPAS PUTRA BEKASI",
        ]);
        Klub::create([
            "nama" => "TUNAS PATRIOT",
        ]);
        Klub::create([
            "nama" => "BINA MUDA SUKATANI",
        ]);
        Klub::create([
            "nama" => "SSB PERWIRA PUTRA",
        ]);
        Klub::create([
            "nama" => "MJS",
        ]);
        Klub::create([
            "nama" => "TUNAS PRIMA BEKASI",
        ]);
        Klub::create([
            "nama" => "CAMPERENIK BT",
        ]);
        Klub::create([
            "nama" => "DIRGAHAYU CAKRA UNITED",
        ]);
        Klub::create([
            "nama" => "GEMPUR FC",
        ]);
        Klub::create([
            "nama" => "Kabomania Muda FC",
        ]);
        Klub::create([
            "nama" => "BEKASI PERMAI UNITED",
        ]);
        Klub::create([
            "nama" => "PUTRA ASGAR",
        ]);
        Klub::create([
            "nama" => "PAMONG PRAJA",
        ]);
        Klub::create([
            "nama" => "D'patriot",
        ]);
        Klub::create([
            "nama" => "SASWCO FC",
        ]);
        Klub::create([
            "nama" => "GRAHA PERMATA",
        ]);
        Klub::create([
            "nama" => "BINTANG KOR",
        ]);
        Klub::create([
            "nama" => "BINA MUDA",
        ]);
        Klub::create([
            "nama" => "BINA PRESTASI",
        ]);
        Klub::create([
            "nama" => "BIONSA FC",
        ]);
        Klub::create([
            "nama" => "PUTRA CILAMPENI",
        ]);
        Klub::create([
            "nama" => "RICK'S SAYATI",
        ]);
        Klub::create([
            "nama" => "BALE BANDUNG",
        ]);
        Klub::create([
            "nama" => "CIBINONG RAYA",
        ]);
        Klub::create([
            "nama" => "H. APUD 24 SENTRA",
        ]);
        Klub::create([
            "nama" => "PSB BIRRUNA",
        ]);
        Klub::create([
            "nama" => "PSPB SUKABUMI",
        ]);
        Klub::create([
            "nama" => "PERSIM",
        ]);
        Klub::create([
            "nama" => "TASELA",
        ]);
        Klub::create([
            "nama" => "FATTO FC",
        ]);
        Klub::create([
            "nama" => "PERSIB",
        ]);
        Klub::create([
            "nama" => "HONEST",
        ]);
        Klub::create([
            "nama" => "BRAVENSIA",
        ]);
        Klub::create([
            "nama" => "PRIMA FC",
        ]);
        Klub::create([
            "nama" => "CIREBON UNITED",
        ]);
        Klub::create([
            "nama" => "RAJAWALI NUSANTARA FC",
        ]);
        Klub::create([
            "nama" => "SUKABUMI FA",
        ]);
        Klub::create([
            "nama" => "LAKEMBA MUDA FC",
        ]);
        Klub::create([
            "nama" => "MANDALA ",
        ]);
        Klub::create([
            "nama" => "R2B GARUDA",
        ]);
        Klub::create([
            "nama" => "NARAGA CIATER UNITED",
        ]);
        Klub::create([
            "nama" => "BHATARA UNITED",
        ]);
        Klub::create([
            "nama" => "TRIO JATINANGOR",
        ]);
        Klub::create([
            "nama" => "SSB MUTIARA 97",
        ]);
        Klub::create([
            "nama" => "PORSAT",
        ]);
        Klub::create([
            "nama" => "WARNA MUDA",
        ]);
        Klub::create([
            "nama" => "METRO CIREBON RAYA",
        ]);


        // Anggota::create([
        //     'nama' => 'Yusuf Abdurrahman',
        //     'tgl_lahir' => "2009-04-09",
        //     'nik' => "3214010904090002",
        //     'klub' => "ASAD 313 ",
        //     'umur' => "U-13",
        //     'tgl_rilis' => "2023-06-23",
        //     'kd_kota' => "00",
        //     'kd_gender' => "01",
        //     'kd_urutkota' => "0",
        //     'kd_kartu' => "0001000009042009",
        // ]);
        // Anggota::create([
        //     'nama' => 'Rifki Fadila Muntafa',
        //     'tgl_lahir' => "2009-09-26",
        //     'nik' => "3217062609090006",
        //     'klub' => "ASAD 313 ",
        //     'umur' => "U-13",
        //     'tgl_rilis' => "2023-06-23",
        //     'kd_kota' => "00",
        //     'kd_gender' => "01",
        //     'kd_urutkota' => "0",
        //     'kd_kartu' => "0001000026092009",
        // ]);
        // Anggota::create([
        //     'nama' => 'Mohamad Rhyehan Fauziansyah',
        //     'tgl_lahir' => "2002-10-20",
        //     'nik' => "32170626748327492",
        //     'klub' => "ASAD 313 ",
        //     'umur' => "U-9",
        //     'tgl_rilis' => "2023-06-23",
        //     'kd_kota' => "00",
        //     'kd_gender' => "01",
        //     'kd_urutkota' => "0",
        //     'kd_kartu' => "0001000026092009",
        // ]);
    }
}
