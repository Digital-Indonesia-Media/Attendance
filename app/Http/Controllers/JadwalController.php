<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Models\Kelas;
use App\Models\Jadwal;
use App\Models\TahunAjaran;
use App\Models\MataPelajaran;
use App\Imports\JadwalImport;
use Maatwebsite\Excel\Facades\Excel;

class JadwalController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:admin');
    }
    
    public function index()
    {
    	$datas = Jadwal::all();
    	$tahunAjarans = TahunAjaran::where('status', 1)->orWhere('status', 0)->get();
    	$kelass = Kelas::all();
    	$mapels = MataPelajaran::all();
        $gurus = User::where('role', 'guru')->get();

        // return $datas;
    	return view('jadwal.index', compact('datas', 'tahunAjarans', 'kelass', 'mapels', 'gurus'));
    }

    public function store(Request $request)
    {
    	Jadwal::create([
    		'tapel_id' => $request->tapel_id,
    		'kelas_id' => $request->kelas_id,
    		'mapel_id' => $request->mapel_id,
            'guru_id' => $request->guru_id,
    		'waktu' => $request->waktu,
    		'hari' => $request->hari,
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

    public function tapel($id)
    {
        $tapel = TahunAjaran::where('id', $id)->first();
        $kelass = Kelas::where('tapel', $tapel->tapel)->get();

        // return$kelass;
        return view('jadwal.tapel', compact('kelass', 'tapel'));    
    }

    public function kelas(Request $request, $id)
    {
        $tapel = TahunAjaran::where('id', $request->tapel)->first();
        // $kelas = Kelas::where('id', $id)->first();
        // $datas = Jadwal::where('kelas_id', $kelas->id)->where('tapel_id', $tapel->id)->get();
        // $mapels = MataPelajaran::all();

        $tahunAjarans = TahunAjaran::where('status', 1)->first();
        $kelass = Kelas::where('id', $id)->first();
        $mapels = MataPelajaran::where('tapel', $tahunAjarans->tapel)->get();
        $gurus = User::where('role', 'guru')->get();
        $datas = Jadwal::where('kelas_id', $kelass->id)->where('tapel_id', $tahunAjarans->id)->get();

        // return$datas;

        return view('jadwal.kelas', compact('datas', 'mapels', 'kelass', 'tahunAjarans', 'gurus'));    
    }    

    public function import(Request $request)
    {
        Excel::import(new JadwalImport, $request->file('file'));
        return redirect()->back();
    }
}
