<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jadwal;
use App\Models\TahunAjaran;
use App\Models\Kelas;
use App\Models\MataPelajaran;
use App\Models\Pertemuan;
use App\Imports\PertemuanImport;
use Maatwebsite\Excel\Facades\Excel;

class PertemuanController extends Controller
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
        $pertemuans = Pertemuan::all();

		return view('pertemuan.pertemuan', compact('datas', 'tahunAjarans', 'kelass', 'mapels', 'pertemuans'));
	}

    public function store(Request $request)
    {
    	Pertemuan::create([
            'tapel_id' => $request->tapel,
            'kelas_id' => $request->kelas,
            'mapel' => $request->mapel,
            'pertemuan_ke' => $request->pertemuan_ke,
            'pembahasan' => $request->pembahasan,
    	]);
    	return redirect()->back();
    }

    public function edit($id)
    {
    	$data = Pertemuan::find($id);
    	$tahunAjarans = TahunAjaran::all();
    	$kelass = Kelas::all();
    	$mapels = MataPelajaran::all();
        // return$data;
    	return view('pertemuan.pertemuan_edit', compact('data', 'tahunAjarans', 'kelass', 'mapels'));
    }

    public function update(Request $request)
    {
    	// dd($request);
    	Pertemuan::where('id', $request->id)->update([
    		'mapel' => $request->mapel,
            'pertemuan_ke' => $request->pertemuan_ke,
            'pembahasan' => $request->pembahasan,
    	]);
    	return redirect()->route('pertemuan-index');
    }

    public function delete(Request $request)
    {
    	Pertemuan::where('id', $request->id)->delete();
    	return redirect()->back();    
    }

    public function tapel($id)
    {
        $tapel = TahunAjaran::where('id', $id)->first();
        $kelass = Kelas::where('tapel', $tapel->tapel)->get();

        // return$kelass;
        return view('pertemuan.tapel', compact('kelass', 'tapel'));    
    }

    public function kelas(Request $request, $id)
    {
        $tapel = TahunAjaran::where('id', $request->tapel)->first();
        $kelas = Kelas::where('id', $id)->first();
        $mapels = MataPelajaran::where('tapel', $tapel->tapel)->get();

        return view('pertemuan.kelas', compact('mapels', 'tapel', 'kelas'));    
    }

    public function mapel(Request $request, $id)
    {
        $tapel = TahunAjaran::where('id', $request->tapel)->first();
        $mapel = MataPelajaran::where('id', $id)->first();
        $kelas = Kelas::where('id', $request->kelas)->first();
        $pertemuans = Pertemuan::where('tapel_id', $tapel->id)->where('kelas_id', $kelas->id)->get();

        // return$pertemuans;
        return view('pertemuan.mapel', compact('pertemuans', 'kelas', 'mapel', 'tapel'));
    }

    public function import(Request $request)
    {
        Excel::import(new PertemuanImport, $request->file('file'));
        return redirect()->back();
    }
}
