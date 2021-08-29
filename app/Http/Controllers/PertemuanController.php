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

    public function import(Request $request)
    {
        Excel::import(new PertemuanImport, $request->file('file'));
        return redirect()->back();
    }
}
