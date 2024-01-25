<?php

namespace App\Http\Controllers;

use App\Models\Klub;
use App\Models\Kota;
use App\Models\Wasit;
use Illuminate\Http\Request;

class WasitController extends Controller
{
    public function index()
    {
        $wasit = Wasit::orderBy('nama', 'asc');
        $master = [
            'title' => 'Wasit',
            'wasit' => $wasit->paginate(30),
        ];
        return inertia()->render('wasit/index', compact('master'));
    }
    public function create()
    {
        $master = [
            'title' => 'Input Data Wasit',
            'kota' => Kota::orderBy('nama', 'asc')->get(),
            'klub' => Klub::orderBy('nama', 'asc')->get(),
        ];
        return inertia()->render('wasit/create', compact('master'));
    }
    public function show()
    {
        $wasit = Wasit::orderBy('nama', 'asc');
        $master = [
            'title' => 'Wasit',
            'wasit' => $wasit->paginate(30),
        ];
        return inertia()->render('wasit/index', compact('master'));
    }
    public function update()
    {
        $wasit = Wasit::orderBy('nama', 'asc');
        $master = [
            'title' => 'Wasit',
            'wasit' => $wasit->paginate(30),
        ];
        return inertia()->render('wasit/index', compact('master'));
    }
    public function destroy()
    {
        $wasit = Wasit::orderBy('nama', 'asc');
        $master = [
            'title' => 'Wasit',
            'wasit' => $wasit->paginate(30),
        ];
        return inertia()->render('wasit/index', compact('master'));
    }
}
