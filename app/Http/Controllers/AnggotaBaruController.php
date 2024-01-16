<?php

namespace App\Http\Controllers;

use App\Models\ActivityLog;
use App\Models\Anggota;
use App\Models\AnggotaBaru;
use App\Models\Klub;
use App\Models\Kota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

use function PHPSTORM_META\type;

class AnggotaBaruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (auth()->user()->role == 'Super Admin' || auth()->user()->role == 'Admin Asprov') {
            $master = [
                'title' => 'Anggota',
                'submission_pending' => AnggotaBaru::where('status', 'Pending')->orderBy('updated_at', 'desc')->get(),
                'submission_accept' => AnggotaBaru::where('status', 'Accepted')->orderBy('updated_at', 'desc')->get(),
                'submission_reject' => AnggotaBaru::where('status', 'Rejected')->orderBy('updated_at', 'desc')->get(),
            ];
        } else {
            $master = [
                'title' => 'Anggota',
                'submission_pending' => AnggotaBaru::where('status', 'Pending')->where('submit_by', auth()->user()->nama)->orderBy('updated_at', 'desc')->get(),
                'submission_accept' => AnggotaBaru::where('status', 'Accepted')->where('submit_by', auth()->user()->nama)->orderBy('updated_at', 'desc')->get(),
                'submission_reject' => AnggotaBaru::where('status', 'Rejected')->where('submit_by', auth()->user()->nama)->orderBy('updated_at', 'desc')->get(),
            ];
        }
        return inertia()->render('anggota-baru/index', compact('master'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $master = [
            'title' => 'Pengajuan Anggota Baru',
            // 'kota' => Kota::orderBy('nama', 'asc')->get(),
            'klub' => Klub::where('kota_kab', auth()->user()->kota_kab)->orderBy('nama', 'asc')->get(),
        ];
        return inertia()->render('anggota-baru/create', compact('master'));
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
            'klub' => 'required',
            'umur' => 'required',
            'foto' => 'required',
            'nik' => 'required|unique:anggotas',
        ]);

        $data = $request->all();
        // dd($data);

        try {
            $kota = Kota::where('nama', auth()->user()->kota_kab)->get()->first();
            $data['kd_kota'] = $kota->kd_kota;
            $data['kota_kab'] = $kota->nama;
            mkdir(public_path('uploads/anggota_baru/' . $data['nama']));
            if ($request->has('foto')) {
                $file = $request->file('foto');
                $filename = preg_replace('/\s+/', '', str_replace("'", '', $data['nama'])) . '_foto_profil.jpg';
                $file->move(public_path('uploads/anggota_baru/' . $data['nama']), $filename);
                $data['foto'] = $filename;
            }
            if ($request->has('akta_lahir')) {
                $file = $request->file('akta_lahir');
                $filename = preg_replace('/\s+/', '', str_replace("'", '', $data['nama'])) . '_akta_lahir.pdf';
                $file->move(public_path('uploads/anggota_baru/' . $data['nama']), $filename);
                $data['akta_lahir'] = $filename;
            }
            if ($request->has('KTP')) {
                $file = $request->file('KTP');
                $filename = preg_replace('/\s+/', '', str_replace("'", '', $data['nama'])) . '_KTP.pdf';
                $file->move(public_path('uploads/anggota_baru/' . $data['nama']), $filename);
                $data['KTP'] = $filename;
            }
            if ($request->has('pasfoto')) {
                $file = $request->file('pasfoto');
                $filename = preg_replace('/\s+/', '', str_replace("'", '', $data['nama'])) . '_pasfoto.jpg';
                $file->move(public_path('uploads/anggota_baru/' . $data['nama']), $filename);
                $data['pasfoto'] = $filename;
            }
            if ($request->has('KK')) {
                $file = $request->file('KK');
                $filename = preg_replace('/\s+/', '', str_replace("'", '', $data['nama'])) . '_KK.pdf';
                $file->move(public_path('uploads/anggota_baru/' . $data['nama']), $filename);
                $data['KK'] = $filename;
            }
            if ($request->has('KTM')) {
                $file = $request->file('KTM');
                $filename = preg_replace('/\s+/', '', str_replace("'", '', $data['nama'])) . '_idcard.pdf';
                $file->move(public_path('uploads/anggota_baru/' . $data['nama']), $filename);
                $data['KTM'] = $filename;
            }
            if ($request->has('ijazah')) {
                $file = $request->file('ijazah');
                $filename = preg_replace('/\s+/', '', str_replace("'", '', $data['nama'])) . '_ijazah.pdf';
                $file->move(public_path('uploads/anggota_baru/' . $data['nama']), $filename);
                $data['ijazah'] = $filename;
            }
            $data['submit_by'] = auth()->user()->nama;
            AnggotaBaru::create($data);
            ActivityLog::create([
                'ip_add' => $request->ip(),
                'user' => auth()->user()->nama,
                'role' => auth()->user()->role,
                'activity' => "Submited request for a new member '" . $data['nama'] . "', waiting for approval.",
            ]);
            return redirect(route('anggota-baru.index'))->with('alert', 'Berhasil Menambahkan Anggota Baru!');
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AnggotaBaru  $submission
     * @return \Illuminate\Http\Response
     */
    public function show(AnggotaBaru $submission, $id)
    {
        $master = [
            'title' => 'Anggota',
            'data' => AnggotaBaru::find($id),
        ];
        return inertia()->render('anggota-baru/show', compact('master'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AnggotaBaru  $submission
     * @return \Illuminate\Http\Response
     */
    public function edit(AnggotaBaru $submission, $id)
    {
        $master = [
            'title' => 'Anggota',
            'data' => AnggotaBaru::find($id),
            'klub' => Klub::where('kota_kab', auth()->user()->kota_kab)->orderBy('nama', 'asc')->get(),
        ];
        return inertia()->render('anggota-baru/edit', compact('master'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AnggotaBaru  $submission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (auth()->user()->role == 'Super Admin' || auth()->user()->role == 'Admin Asprov') {
            if ($request['status'] == 'Accepted') {
                $newMember = AnggotaBaru::find($id);
                $newMember->update([
                    'status' => $request['status'],
                    'accept_by' => auth()->user()->nama,
                ]);
                $data['klub'] = $newMember->klub;
                $data['foto'] = $newMember->foto;
                $data['umur'] = $newMember->umur;
                $data['nik'] = $newMember->nik;
                $data['nama'] = $newMember->nama;
                $data['kd_kota'] = $newMember->kd_kota;
                $data['kota_kab'] = $newMember->kota_kab;
                $data['kd_gender'] = $newMember->kd_gender;
                $data['tgl_lahir'] = $newMember->tgl_lahir;
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
                File::copy(public_path('uploads/anggota_baru/' . $data['nama'] . '/' . $data['foto']), public_path('foto_anggota' . '/' . $data['foto']));
                Anggota::create($data);
                ActivityLog::create([
                    'ip_add' => $request->ip(),
                    'user' => auth()->user()->nama,
                    'role' => auth()->user()->role,
                    'activity' => "Approved a request for '" . $data['nama'] . "'.",
                ]);
                return redirect(route('anggota-baru.index'))->with('alert', 'Pengajuan diterima, data anggota baru telah ditambahkan kedalam database.');
            } else if ($request['status'] == 'Rejected') {
                $anggotabaru = AnggotaBaru::find($id);
                $anggotabaru->update([
                    'status' => $request['status'],
                    'reject_msg' => $request['reject_msg'],
                    'reject_by' => auth()->user()->nama,
                ]);
                ActivityLog::create([
                    'ip_add' => $request->ip(),
                    'user' => auth()->user()->nama,
                    'role' => auth()->user()->role,
                    'activity' => "Reject a request for '" . $anggotabaru->nama . "', waiting for approval.",
                ]);
                return redirect(route('anggota-baru.index'))->with('alert', 'Pengajuan ditolak, data anggota telah dikembalikan ke Admin Askot/Askab.');
            } else {
                AnggotaBaru::find($id)->update([
                    'status' => $request['status'],
                    'reject_by' => auth()->user()->nama,
                ]);
                return redirect(route('anggota-baru.index'))->with('alert', 'Pengajuan di Pending.');
            }
        } else {
            return abort(403);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AnggotaBaru  $submission
     * @return \Illuminate\Http\Response
     */
    public function destroy(AnggotaBaru $submission)
    {
        //
    }
}
