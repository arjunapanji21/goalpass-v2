<?php

namespace App\Http\Controllers;

use App\Models\ActivityLog;
use App\Models\Kota;
use App\Models\User;
use Illuminate\Http\Request;

class AdminAskotController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $master = [
            'title' => 'Admin',
            'kota' => Kota::orderBy('nama', 'asc')->get(),
        ];
        return inertia()->render('superadmin/admin_askot_tambah', compact('master'));
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
            'kota_id' => 'required',
            'nama' => 'required',
            'email' => 'required|email|unique:users',
            'username' => 'required|unique:users',
            'password' => 'required|confirmed',
        ]);

        $kota = Kota::find($data['kota_id']);

        try {
            $data['password'] = bcrypt($data['password']);
            $data['kd_kota'] = $kota->kd_kota;
            $data['kota_kab'] = $kota->nama;
            $data['role'] = "Admin Askot/Askab";
            User::create($data);
            ActivityLog::create([
                'ip_add' => $request->ip(),
                'user' => auth()->user()->nama,
                'role' => auth()->user()->role,
                'activity' => "Added '" . $data['nama'] . "' to Data Admin.",
            ]);
            return redirect(route('admin'));
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        try {
            $admin = User::find($id);
            ActivityLog::create([
                'ip_add' => $request->ip(),
                'user' => auth()->user()->nama,
                'role' => auth()->user()->role,
                'activity' => "Removed '" . $admin->nama . "' from Data Admin.",
            ]);
            $admin->delete();
            return response()->json([
                'msg' => 'Admin Askot/Askab Berhasil Dihapus.'
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'msg' => $th,
            ]);
        }
    }
}
