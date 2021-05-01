<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;
use App\Models\TahunAjaran;

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
		return view('kelas.kelas', compact('datas', 'tahunAjarans'));
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
}
