<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;

class KelasController extends Controller
{
    public function index()
	{
		$datas = Kelas::All();
		return view('kelas.kelas', compact('datas'));
	}

    public function store(Request $request)
    {
    	Kelas::create([
    		'kelas' => $request->kelas,
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
