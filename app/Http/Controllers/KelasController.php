<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;
use App\Models\TahunAjaran;
use App\Imports\KelasImport;
use Maatwebsite\Excel\Facades\Excel;

class KelasController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:admin');
    }
    
    public function index()
	{
		$datas = Kelas::all();
        $tahunAjarans = TahunAjaran::where('status', 1)->orWhere('status', 0)->get();
		return view('kelas.index', compact('datas', 'tahunAjarans'));
	}

    public function kelas($id)
    {
        $tahunAjarans = TahunAjaran::where('id', $id)->first();
        $datas = Kelas::where('tapel', $tahunAjarans->tapel)->get();
        // return$datas;

        return view('kelas.kelas', compact('tahunAjarans', 'datas', 'tahunAjarans'));
    }

    public function store(Request $request)
    {
    	Kelas::create([
    		'kelas' => $request->kelas,
            'tapel' => $request->tapel,
    	]);
    	return redirect()->back();
    }

    public function edit($id)
    {
    	$data = Kelas::find($id);
    	return view('kelas.kelas_edit', compact('data'));
    }

    public function update(Request $request)
    {
    	Kelas::where('id', $request->id)->update([
    		'kelas' => $request->kelas,
    	]);
    	return redirect()->route('kelas-index');
    }

    public function delete(Request $request)
    {
    	Kelas::where('id', $request->id)->delete();
    	return redirect()->back();    
    }

    public function import(Request $request)
    {
        Excel::import(new KelasImport, $request->file('file'));
        return redirect()->back();
    }
}
