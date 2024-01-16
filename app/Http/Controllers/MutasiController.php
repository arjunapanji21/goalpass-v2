<?php

namespace App\Http\Controllers;

use App\Models\ActivityLog;
use App\Models\Anggota;
use App\Models\Klub;
use App\Models\Kota;
use App\Models\Mutasi;
use Illuminate\Http\Request;

class MutasiController extends Controller
{
    public function index()
    {
        if (auth()->user()->role == 'Super Admin' || auth()->user()->role == 'Admin Asprov') {
            $master = [
                'title' => 'Anggota',
                'mutasi' => Mutasi::orderBy('updated_at', 'desc')->get(),
            ];
        } else {
            $master = [
                'title' => 'Anggota',
                'mutasi' => Mutasi::where('submit_by', auth()->user()->nama)->orderBy('updated_at', 'desc')->get(),
            ];
        }
        return inertia()->render('mutasi/index', compact('master'));
    }
    public function create($anggota_id)
    {
        $anggota = Anggota::find($anggota_id);
        $kota = Kota::orderBy('nama', 'asc')->get();
        $master = [
            'title' => 'Mutasi Baru',
            'anggota' => $anggota,
            'kota' => $kota,
            'klub' => [],
        ];
        return inertia()->render('mutasi/create', compact('master'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $anggota = Anggota::find($data['anggota_id']);
        $kota_tujuan = Kota::find($data['kota_tujuan']);
        $query = [
            'anggota_id' => $anggota->id,
            'nama' => $anggota->nama,
            'klub_asal' => $data['klub_asal'],
            'klub_tujuan' => $data['klub_tujuan'],
            'kota_asal' => $data['kota_asal'],
            'kota_tujuan' => $kota_tujuan->nama,
            'submit_by' => auth()->user()->nama,
        ];
        Mutasi::create($query);
        ActivityLog::create([
            'ip_add' => $request->ip(),
            'user' => auth()->user()->nama,
            'role' => auth()->user()->role,
            'activity' => "Submit a mutation request for '" . $anggota->nama . "'.",
        ]);
        return redirect(route('mutasi.index'))->with('alert', 'Permintaan Mutasi Anggota Berhasil Dibuat.');
    }
}
