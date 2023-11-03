<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Klub;
use App\Models\Kota;
use Illuminate\Http\Request;

class KlubController extends Controller
{
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
        //
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
