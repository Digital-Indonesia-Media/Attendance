<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MataPelajaran;

class MapelController extends Controller
{
    public function index()
    {
    	$datas = MataPelajaran::all();
    	return view('mapel.mapel', compact('datas'));
    }

    public function store(Request $request)
    {
    	MataPelajaran::create([
    		'mapel' => $request->mapel,
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
}
