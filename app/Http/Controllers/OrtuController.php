<?php

namespace App\Http\Controllers;

use App\User;
use App\Models\Kelas;
use App\Models\Jadwal;
use App\Models\Pertemuan;
use App\Models\Kehadiran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrtuController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('role:ortu');
    // }

    public function index()
    {
        $users = User::where('name', Auth::user()->name)->first();
        $name = str_replace('Ortu ', '', $users->name);
        $user = User::where('name', $name)->first();

        $alfas = Kehadiran::where('name_id', $user->id)->where('status', 0)->get();
        $hadirs = Kehadiran::where('name_id', $user->id)->where('status', 1)->get();
        $izins = Kehadiran::where('name_id', $user->id)->where('status', 2)->get();
        $alfa = count($alfas);
        $hadir = count($hadirs);
        $izin = count($izins);

        // return$hadir;
        return view('ortu.index', compact('alfa', 'hadir', 'izin', 'alfas', 'hadirs', 'izins', ));
    }

    public function profile()
    {
        return view('ortu.profile');
    }
}
