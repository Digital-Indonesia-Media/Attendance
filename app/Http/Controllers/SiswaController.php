<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Models\Kelas;
use App\Models\Jadwal;
use App\Models\Pertemuan;
use App\Models\TahunAjaran;
use App\Models\MataPelajaran;
use Illuminate\Support\Facades\Auth;

class SiswaController extends Controller
{
	// public function __construct()
 //    {
 //        $this->middleware('role:siswa');
 //    }

    public function index()
    {
        $user = User::where('name', Auth::user()->name)->get();
        $kelas = Kelas::where('kelas', $user[0]->kelas)->get();
        // return $user[0]->kelas;
        $datas = Jadwal::where('kelas_id', $kelas[0]->id)->get();
        $tahunAjarans = TahunAjaran::where('status', 1)->orWhere('status', 0)->get();
        $kelass = Kelas::all();
        $mapels = MataPelajaran::all();
        return view('siswa.index', compact('datas', 'tahunAjarans', 'kelass', 'mapels'));
    }

    public function jadwal()
    {
    	$jadwals = Jadwal::all();
    	return view('siswa.jadwal', compact('jadwals'));
    }

    public function pertemuan($id)
    {
        $user = User::where('name', Auth::user()->name)->get();
        $kelas = Kelas::where('kelas', $user[0]->kelas)->get();
        $data = Jadwal::where('kelas_id', $kelas[0]->id)->get();
    	$pertemuans = Pertemuan::where('mapel', $data[$id-1]->mapel->mapel)->get();
    	return view('siswa.pertemuan', compact('pertemuans'));
    }

    public function hadir()
    {
        
        return redirect()->back();
    }
}
