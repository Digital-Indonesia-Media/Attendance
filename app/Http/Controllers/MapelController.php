<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MataPelajaran;
use App\Models\TahunAjaran;
use App\Imports\MapelImport;
use Maatwebsite\Excel\Facades\Excel;

class MapelController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:admin');
    }
    
    public function index()
    {
    	$datas = MataPelajaran::all();
        $tahunAjarans = TahunAjaran::where('status', 1)->orWhere('status', 0)->get();
    	return view('mapel.mapel', compact('datas', 'tahunAjarans'));
    }

    public function tapel($id)
    {
        $tahunAjarans = TahunAjaran::where('id', $id)->first();
        $mapels = MataPelajaran::where('tapel', $tahunAjarans->tapel)->get();
        $datas = count($mapels);
        return view('mapel.tapel', compact('mapels', 'tahunAjarans', 'datas'));
    }

    public function store(Request $request)
    {
    	MataPelajaran::create([
    		'mapel' => $request->mapel,
            'tapel' => $request->tapel,
    	]);
    	return redirect()->back();
    }

    public function edit($id)
    {
    	$data = MataPelajaran::find($id);
    	return view('mapel.mapel_edit', compact('data'));
    }

    public function update(Request $request)
    {
    	MataPelajaran::where('id', $request->id)->update([
    		'mapel' => $request->mapel,
    	]);
    	return redirect()->route('mapel-index');
    }

    public function delete(Request $request)
    {
    	MataPelajaran::where('id', $request->id)->delete();
    	return redirect()->back();    
    }

    public function active(Request $request)
    {
        MataPelajaran::where('id', $request->id)->update([
            'status' => 1,
        ]);
        return redirect()->back(); 
    }

    public function nonActive(Request $request)
    {
        MataPelajaran::where('id', $request->id)->update([
            'status' => 0,
        ]);
        return redirect()->back(); 
    }

    public function import(Request $request)
    {
        Excel::import(new MapelImport, $request->file('file'));
        return redirect()->back();
    }
}
