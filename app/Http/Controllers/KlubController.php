<?php

namespace App\Http\Controllers;

use App\Imports\KlubImport;
use App\Models\ActivityLog;
use App\Models\Anggota;
use App\Models\Klub;
use App\Models\Kota;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class KlubController extends Controller
{
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
        Excel::import(new KlubImport, $file);

        // // notifikasi dengan session
        // Session::flash('sukses', 'Data Siswa Berhasil Diimport!');

        // alihkan halaman kembali
        return redirect(route('klub.index'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $master = [
            'title' => 'Master',
            'klub' => Klub::orderBy('nama', 'asc')->get(),
        ];
        return inertia()->render('superadmin/master_klub', compact('master'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $master = [
            'title' => 'Master',
            'kota' => Kota::orderBy('nama', 'asc')->get(),
        ];
        return inertia()->render('superadmin/master_klub_tambah', compact('master'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $kota = Kota::find($data['kota_id']);
        $data['kd_kota'] = $kota->kd_kota;
        $data['kota_kab'] = $kota->nama;
        Klub::create($data);
        ActivityLog::create([
            'ip_add' => $request->ip(),
            'user' => auth()->user()->nama,
            'role' => auth()->user()->role,
            'activity' => "Added '" . $data['nama'] . "' to Data Master Klub",
        ]);
        return redirect(route('klub.index'))->with('alert', 'Berhasil Menambahkan Klub Kedalam Database.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Klub  $klub
     * @return \Illuminate\Http\Response
     */
    public function show(Klub $klub)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Klub  $klub
     * @return \Illuminate\Http\Response
     */
    public function edit(Klub $klub)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Klub  $klub
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Klub $klub)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Klub  $klub
     * @return \Illuminate\Http\Response
     */
    public function destroy(Klub $klub)
    {
        //
    }
}
