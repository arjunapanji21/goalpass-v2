<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Imports\AnggotaImport;
use App\Models\ActivityLog;
use App\Models\Klub;
use App\Models\Kota;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class AnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (auth()->user()->role == 'Admin Askot/Askab') {
            $anggota = Anggota::where('kd_kota', auth()->user()->kd_kota)->orderBy('id', 'asc');
        } else {
            $anggota = Anggota::orderBy('id', 'asc');
        }

        // Update kd_kartu
        // $anggota = Anggota::where('klub', 'BEKASI UNITED FC')->where('kd_kota', '16')->get();
        // // dd($anggota);
        // foreach ($anggota as $key => $row) {
        //     $kd_new = '16' . substr($row->kd_kartu, 2);
        //     $row->update([
        //         'kd_kartu' => $kd_new,
        //     ]);
        // }

        // remove duplikat entry
        // $dupe = [];
        // foreach ($anggota->get()->groupby('nama') as $row) {
        //     if (count($row) > 1) {
        //         // $row[0]->delete();
        //         foreach ($row as $r) {
        //             array_push($dupe, $r->nama);
        //         }
        //         // array_push($dupe, $row[0]->nama);
        //     }
        // }
        // dd($dupe);

        if ($request['filter'] == "nama") {
            $anggota->where('nama', 'like', "%{$request['search']}%");
        } else if ($request['filter'] == "kd_kartu") {
            $anggota->where('kd_kartu', 'like', "%{$request['search']}%");
        } else if ($request['filter'] == "klub") {
            $anggota->where('klub', 'like', "%{$request['search']}%");
        }
        if ($request['umur'] != "all") {
            $anggota->where('umur', 'like', "%{$request['umur']}%");
        }
        $master = [
            'title' => 'Anggota',
            'anggota' => $anggota->paginate(30),
            'filter' => $request['filter'] != "nama" ? $request['filter'] : "nama",
            'umur' => $request['umur'] != "all" ? $request['umur'] : "all",
            'search' => $request['search'] != null ? $request['search'] : null,
        ];
        return inertia()->render('superadmin/anggota', compact('master'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $master = [
            'title' => 'Tambah Anggota Baru',
            'kota' => Kota::orderBy('nama', 'asc')->get(),
            'klub' => Klub::orderBy('nama', 'asc')->get(),
        ];
        return inertia()->render('superadmin/anggota_tambah', compact('master'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required',
            'tgl_lahir' => 'required',
            'kd_gender' => 'required',
            'kota_id' => 'required',
            'klub' => 'required',
            'umur' => 'required',
            'nik' => 'required|unique:anggotas',
        ]);

        try {
            $kota = Kota::find($data['kota_id']);
            $data['kd_kota'] = $kota->kd_kota;
            $data['kota_kab'] = $kota->nama;
            $data['kd_urutkota'] = Anggota::where('kd_kota', $data['kd_kota'])->orderBy('kd_urutkota', 'desc')->first()->kd_urutkota + 1;
            if ($data['kd_urutkota'] < 10) {
                $data['kd_kartu'] = $data['kd_kota'] . $data['kd_gender'] . "000" . $data['kd_urutkota'] . date('dmY', strtotime($data['tgl_lahir']));
            } else if ($data['kd_urutkota'] < 100) {
                $data['kd_kartu'] = $data['kd_kota'] . $data['kd_gender'] . "00" . $data['kd_urutkota'] . date('dmY', strtotime($data['tgl_lahir']));
            } else if ($data['kd_urutkota'] < 1000) {
                $data['kd_kartu'] = $data['kd_kota'] . $data['kd_gender'] . "0" . $data['kd_urutkota'] . date('dmY', strtotime($data['tgl_lahir']));
            } else {
                $data['kd_kartu'] = $data['kd_kota'] . $data['kd_gender'] . $data['kd_urutkota'] . date('dmY', strtotime($data['tgl_lahir']));
            }
            if ($request->hasFile('foto')) {
                $file = $request->file('foto');
                $filename = $data['kd_kartu'] . '.jpg';
                $file->move(public_path('foto_anggota'), $filename);
                $data['foto'] = $filename;
            }
            Anggota::create($data);
            ActivityLog::create([
                'ip_add' => $request->ip(),
                'user' => auth()->user()->nama,
                'role' => auth()->user()->role,
                'activity' => "Added '" . $data['nama'] . "' to Data Anggota.",
            ]);
            return redirect(route('anggota.index'))->with('alert', 'Berhasil Menambahkan Anggota Baru!');
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Anggota  $anggota
     * @return \Illuminate\Http\Response
     */
    public function show(Anggota $anggota, $kd_kartu)
    {
        $anggota = Anggota::where('kd_kartu', $kd_kartu)->get()->first();
        if ($anggota->umur == "U-9") {
            $templateKartu = public_path('template_kartu/u-9.pdf');
        } else if ($anggota->umur == "U-11") {
            $templateKartu = public_path('template_kartu/u-11.pdf');
        } else if ($anggota->umur == "U-13") {
            $templateKartu = public_path('template_kartu/u-13.pdf');
        } else if ($anggota->umur == "U-15") {
            $templateKartu = public_path('template_kartu/u-15.pdf');
        } else if ($anggota->umur == "U-17") {
            $templateKartu = public_path('template_kartu/u-17.pdf');
        } else if ($anggota->umur == "SENIOR") {
            $templateKartu = public_path('template_kartu/senior.pdf');
        }

        $master = [
            'title' => 'Profil Anggota',
            'anggota' => $anggota,
            'template_kartu' => $templateKartu,
        ];

        return inertia()->render('superadmin/anggota_profile', compact('master'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Anggota  $anggota
     * @return \Illuminate\Http\Response
     */
    public function edit(Anggota $anggota, $id)
    {
        $master = [
            'title' => 'Ubah Data Anggota',
            'kota' => Kota::orderBy('nama', 'asc')->get(),
            'klub' => Klub::orderBy('nama', 'asc')->get(),
            'data' => Anggota::find($id),
        ];
        return inertia()->render('superadmin/anggota_edit', compact('master'));
    }

    public function update_anggota(Request $request, $id)
    {
        $data = $request->all();
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = $data['kd_kartu'] . '.jpg';
            $file->move(public_path('foto_anggota'), $filename);
            $data['foto'] = $filename;
        }
        $anggota = Anggota::find($id);
        $anggota->update($data);
        ActivityLog::create([
            'ip_add' => $request->ip(),
            'user' => auth()->user()->nama,
            'role' => auth()->user()->role,
            'activity' => "Updated '" . $anggota->nama . "' from Data Anggota.",
        ]);
        return redirect(route('anggota.index'))->with('alert', 'Data Anggota Berhasil di Update!');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Anggota  $anggota
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Anggota  $anggota
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        try {
            $anggota = Anggota::find($id);
            ActivityLog::create([
                'ip_add' => $request->ip(),
                'user' => auth()->user()->nama,
                'role' => auth()->user()->role,
                'activity' => "Removed '" . $anggota->nama . "' from Data Anggota.",
            ]);
            $anggota->delete();
            return response()->json([
                'msg' => 'Data Anggota Berhasil Dihapus!'
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'msg' => $th,
            ]);
        }
    }

    public function import(Request $request)
    {
        // validasi
        $this->validate($request, [
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);

        // menangkap file excel
        $file = $request->file('file');

        // // membuat nama file unik
        // $nama_file = rand() . $file->getClientOriginalName();

        // // upload ke folder file_siswa di dalam folder public
        // $file->move('file_siswa', $nama_file);

        // import data
        Excel::import(new AnggotaImport, $file);

        // // notifikasi dengan session
        // Session::flash('sukses', 'Data Siswa Berhasil Diimport!');

        // alihkan halaman kembali
        return redirect(route('anggota.index'));
    }
}
