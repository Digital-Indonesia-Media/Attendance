<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;
use App\Models\Jadwal;
use App\Models\Pertemuan;
use App\Models\TahunAjaran;
use App\Models\MataPelajaran;

class GuruController extends Controller
{
    public function index()
    {
    	$datas = Jadwal::all();
    	$tahunAjarans = TahunAjaran::where('status', 1)->orWhere('status', 0)->get();
    	$kelass = Kelas::all();
    	$mapels = MataPelajaran::all();
    	return view('guru.index', compact('datas', 'tahunAjarans', 'kelass', 'mapels'));
    }

    public function pertemuan($id)
    {
    	$datas = Jadwal::where('id', $id)->get();
    	$tahunAjarans = TahunAjaran::where('status', 1)->orWhere('status', 0)->get();
    	$kelass = Kelas::where('id', $id)->get();
    	$mapels = MataPelajaran::all();
        $pertemuans = Pertemuan::all();

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
}
