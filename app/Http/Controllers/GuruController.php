<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Kelas;
use App\Models\Jadwal;
use App\Models\Pertemuan;
use App\Models\TahunAjaran;
use App\Models\MataPelajaran;
use App\Models\Kehadiran;
use Illuminate\Support\Facades\Auth;

class GuruController extends Controller
{
    public function index()
    {
    	$tahunAjarans = TahunAjaran::where('status', 1)->orWhere('status', 0)->get();
    	$kelass = Kelas::all();
    	$mapels = MataPelajaran::all();
        $user = User::where('name', Auth::user()->name)->get();
    	$datas = Jadwal::where('guru_id', $user[0]->id)->get();
    	return view('guru.index', compact('datas', 'tahunAjarans', 'kelass', 'mapels'));
    }

    public function pertemuan($id)
    {
    	$datas = Jadwal::where('id', $id)->get();
    	$tahunAjarans = TahunAjaran::where('status', 1)->orWhere('status', 0)->get();
    	$kelass = Kelas::all();
    	$mapels = MataPelajaran::where('id', $id)->get();
        $pertemuans = Pertemuan::where('mapel', $mapels[0]->mapel)->get();

		return view('guru.pertemuan', compact('datas', 'tahunAjarans', 'kelass', 'mapels', 'pertemuans'));
    }

    public function store(Request $request)
    {
    	Pertemuan::create([
            'mapel' => $request->mapel,
            'kelas' => $request->kelas,
            'pertemuan_ke' => $request->pertemuan_ke,
            'pembahasan' => $request->pembahasan,
    	]);
    	return redirect()->back();
    }

    public function delete(Request $request)
    {
        Pertemuan::where('id', $request->id)->delete();
        return redirect()->back();    
    }
}
