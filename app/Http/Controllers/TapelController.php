<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MataPelajaran;
use App\Models\TahunAjaran;
use App\Models\Kelas;
use App\User;
use Alert;

class TapelController extends Controller
{
	public function index()
	{
		$tahunAjarans = TahunAjaran::All();
        // dd($tahunAjarans);
		return view('dashboard', compact('tahunAjarans'));
	}

    public function store(Request $request)
    {
        // dd($request);
    	TahunAjaran::create([
    		'tapel' => $request->tapel,
    	]);
    	return redirect()->back();
    }

    public function desc($id)
    {
        $data = TahunAjaran::find($id);
        $mapels = MataPelajaran::all();
        $kelass = Kelas::all();
        return view('tapel.tapel_desc', compact('data', 'mapels', 'kelass'));
    }

    public function edit($id)
    {
    	$data = TahunAjaran::find($id);
        dd($data);
    	return view('tapel.tapel_edit', compact('data'));
    }

    public function update(Request $request)
    {
    	TahunAjaran::where('id', $request->id)->update([
    		'tapel' => $request->tapel,
    	]);
    	return redirect()->route('tapel-index');
    }

    public function delete(Request $request)
    {
    	TahunAjaran::where('id', $request->id)->delete();
    	return redirect()->back();    
    }

    public function publish(Request $request)
    {
        TahunAjaran::where('status', 1)->update([
            'status' => -1,
        ]);

        TahunAjaran::where('id', $request->id)->update([
            'status' => 1,
        ]);
        return redirect()->route('dashboard');
    }

    public function nameStudent($kelas)
    {
        $kelass = User::all();

        return view('tapel.tapel_kelas', compact('kelass'));
    }
}
