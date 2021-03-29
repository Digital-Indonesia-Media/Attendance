<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jadwal;
use App\Models\TahunAjaran;
use App\Models\Kelas;
use App\Models\MataPelajaran;

class JadwalController extends Controller
{
    public function index()
    {
    	$datas = Jadwal::all();
    	$tahunAjarans = TahunAjaran::all();
    	$kelass = Kelas::all();
    	$mapels = MataPelajaran::all();
    	return view('jadwal.index', compact('datas', 'tahunAjarans', 'kelass', 'mapels'));
    }

    public function store(Request $request)
    {
    	Jadwal::create([
    		'tapel_id' => $request->tapel_id,
    		'kelas_id' => $request->kelas_id,
    		'mapel_id' => $request->mapel_id,
    		'waktu' => $request->waktu,
    		'hari' => $request->hari,
    		'minggu' => $request->minggu,
    	]);
    	return redirect()->back();
    }

    public function edit($id)
    {
    	$data = Jadwal::find($id);
    	$tahunAjarans = TahunAjaran::all();
    	$kelass = Kelas::all();
    	$mapels = MataPelajaran::all();
    	return view('jadwal.jadwal_edit', compact('data', 'tahunAjarans', 'kelass', 'mapels'));
    }

    public function update(Request $request)
    {
    	// dd($request);
    	Jadwal::where('id', $request->id)->update([
    		'tapel_id' => $request->tapel_id,
    		'kelas_id' => $request->kelas_id,
    		'mapel_id' => $request->mapel_id,
    		'hari' => $request->hari,
    		'waktu' => $request->waktu,
    		'minggu' => $request->minggu,
    	]);
    	return redirect()->route('jadwal-index');
    }

    public function delete(Request $request)
    {
    	Jadwal::where('id', $request->id)->delete();
    	return redirect()->back();    
    }
}
