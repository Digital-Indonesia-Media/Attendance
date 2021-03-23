<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\TahunAjaran;
use Alert;

class TapelController extends Controller
{
	public function index()
	{
		$datas = TahunAjaran::All();
		return view('home', compact('datas'));
	}

    public function store(Request $request)
    {
    	TahunAjaran::create([
    		'tapel' => $request->tapel,
    	]);
    	return redirect()->back();
    }

    public function edit($id)
    {
    	$data = TahunAjaran::find($id);
    	return view('edit', compact('data'));
    }

    public function update(Request $request)
    {
    	TahunAjaran::where('id', $request->id)->update([
    		'tapel' => $request->tapel,
    	]);
    	return redirect()->route('home');
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
        return redirect()->route('home');
    }
}
