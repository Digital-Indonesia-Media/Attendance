<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\carbon;
use App\Models\MataPelajaran;
use App\Models\TahunAjaran;
use App\Models\Pertemuan;
use App\Models\Jadwal;
use App\Models\Kelas;
use App\User;
use Alert;

class TapelController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:admin');
    }
    
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
            'started_at' => $request->started_at,
    	]);
    	return redirect()->back();
    }

    public function desc($id)
    {
        $tahunAjarans = TahunAjaran::find($id);
        $mapels = MataPelajaran::where('tapel', $tahunAjarans->tapel)->get();
        $kelass = Kelas::where('tapel', $tahunAjarans->tapel)->get();
        $datas = Jadwal::where('tapel_id', $tahunAjarans->id)->get();
        return view('tapel.tapel_desc', compact('tahunAjarans', 'mapels', 'kelass', 'datas'));
    }

    public function edit($id)
    {
        $tahunAjaran = TahunAjaran::All();
    	$data = TahunAjaran::find($id);
    	return view('tapel.tapel_edit', compact('data', 'tahunAjaran'));
    }

    public function update(Request $request)
    {
    	TahunAjaran::where('id', $request->id)->update([
    		'tapel' => $request->tapel,
            'started_at' => $request->started_at,
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

        $date = Carbon::now();
        TahunAjaran::where('id', $request->id)->update([
            'status' => 1,
            'publish_at' => date('Y-m-d H:i:s', time()),
        ]);

        return redirect()->route('dashboard');
    }

    public function nameStudent($kelas)
    {
        $kelass = User::all();

        return view('tapel.tapel_kelas', compact('kelass'));
    }

    public function pertemuan($id, $mapel)
    {
        $datas = Jadwal::all();
        $tahunAjarans = TahunAjaran::where('status', 1)->orWhere('status', 0)->get();
        $kelass = Kelas::all();
        $mapels = MataPelajaran::where('id', $id)->get();
        $pertemuans = Pertemuan::where('mapel', $mapel)->get();

        return view('pertemuan.pertemuan', compact('datas', 'tahunAjarans', 'kelass', 'mapels', 'pertemuans'));
    }
}
