<?php

namespace App\Http\Controllers;

use App\Exports\KehadiranExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\carbon;
use App\Models\User;
use App\Models\Kelas;
use App\Models\Jadwal;
use App\Models\Pertemuan;
use App\Models\TahunAjaran;
use App\Models\MataPelajaran;
use App\Models\Kehadiran;

class GuruController extends Controller
{
    public function index()
    {
    	$tahunAjarans = TahunAjaran::where('status', 1)->orWhere('status', 0)->get();
    	$kelass = Kelas::all();
    	$mapels = MataPelajaran::all();
        $user = User::where('name', Auth::user()->name)->first();
    	$datas = Jadwal::where('guru_id', $user->id)->get();

    	return view('guru.index', compact('datas', 'tahunAjarans', 'kelass', 'mapels'));
    }

    public function edit($id)
    {
        $data = Pertemuan::find($id);
        $tahunAjarans = TahunAjaran::all();
        $kelass = Kelas::all();
        $mapels = MataPelajaran::all();
        // return$data;
        return view('guru.pertemuan_edit', compact('data', 'tahunAjarans', 'kelass', 'mapels'));
    }

    public function update($id, Request $request)
    {
        $user = User::where('name', Auth::user()->name)->get();
        $datas = Jadwal::where('guru_id', $user[0]->id)->get();

        Pertemuan::where('id', $request->id)->update([
            'mapel' => $request->mapel,
            'pertemuan_ke' => $request->pertemuan_ke,
            'pembahasan' => $request->pembahasan,
        ]);
        return redirect()->route('guru-pertemuan', $datas[0]->id);
    }

    public function pertemuan($id, Request $request)
    {
    	$datas = Jadwal::where('id', $id)->get();
    	$tahunAjarans = TahunAjaran::where('status', 1)->orWhere('status', 0)->get();
    	$kelass = Kelas::all();
    	$mapels = MataPelajaran::where('mapel', Auth::user()->kelas)->first(); //mencari mapel sesuai yang diajarkan oleh guru yang bersangkutan
        $pertemuans = Pertemuan::where('kelas_id', $request->kelas_id)->get();
        $kelas_id = Kelas::where('id', $request->kelas_id)->first();

		return view('guru.pertemuan', compact('datas', 'tahunAjarans', 'kelass', 'mapels', 'pertemuans', 'kelas_id'));
    }

    public function store(Request $request)
    {
        $tahunAjarans = TahunAjaran::where('status', 1)->get();
    	Pertemuan::create([
            'tapel_id' => $tahunAjarans[0]->id,
            'kelas_id' => $request->kelas_id,
            'mapel' => $request->mapel,
            'kelas' => $request->kelas,
            'pertemuan_ke' => $request->pertemuan_ke,
            'pembahasan' => $request->pembahasan,
    	]);
    	return redirect()->back();
    }

    public function delete(Request $request)
    {
        Pertemuan::where('id', $request->id)->delete();
        return redirect()->back();    
    }

    public function publish(Request $request)
    {
        $date = Carbon::now();
        $date->modify('+7 minutes');

        $jadwal = Jadwal::where('guru_id', Auth::user()->id)->first();
        $pertemuans = Pertemuan::where('id', $request->id)->first();
        $kelas = Kelas::where('id', $pertemuans->kelas_id)->first();
        $variable = User::where('kelas', $kelas->kelas)->Where('role', 'siswa')->get();

        Pertemuan::where('id', $request->id)->update([
            'status' => 1,
            'code' => substr(md5(mt_rand()), 0, 8),
            'data_expired' => $date,
        ]);
        
        foreach ($variable as $key => $value) {
            $kelas = Kelas::where('kelas', $value->kelas)->first();
            Kehadiran::create([
                'name_id' => $value->id,
                'kelas_id' => $kelas->id,
                'mapel_id' => $jadwal->mapel_id,
                'pertemuan_id' => $request->id,
                'status' => 0,
            ]);
        }
    }

    public function tapel() 
    {
        $tahunAjarans = TahunAjaran::where('status', 1)->get();
        return view('guru.tapel', compact('tahunAjarans'));
    }

    public function kelas($id) 
    {
        $tahunAjarans = TahunAjaran::find($id);
        $kelass = Kelas::where('tapel', $tahunAjarans->tapel)->get();

        return view('guru.kelas', compact('kelass', 'tahunAjarans'));
    }

    public function perkelas($id)
    {
        $tahunAjarans = TahunAjaran::where('status', 1)->get();
        $kelass = Kelas::where('id', $id)->first();
        $datas = User::where('role', 'siswa')->Where('kelas', $kelass->kelas)->get();
        $kehadirans = Kehadiran::all();
        // $kehadirans = count($kehadiran);
        // $value = 0;
        // return $datas;

        $user = User::where('name', Auth::user()->name)->get();
        $senin = Jadwal::where('guru_id', $user[0]->id)->where('hari', 'senin')->get();
        $selasa = Jadwal::where('guru_id', $user[0]->id)->where('hari', 'selasa')->get();
        $rabu = Jadwal::where('guru_id', $user[0]->id)->where('hari', 'rabu')->get();
        $kamis = Jadwal::where('guru_id', $user[0]->id)->where('hari', 'kamis')->get();
        $jumat = Jadwal::where('guru_id', $user[0]->id)->where('hari', 'jumat')->get();

        // $masuk = Kehadiran::where('name_id', )

        return view('guru.perkelas', compact('kelass', 'datas', 'tahunAjarans', 'senin', 'selasa', 'rabu', 'kamis', 'jumat', 'kehadirans',));
    }

    public function riwayat($id)
    {
        $tahunAjarans = TahunAjaran::where('status', 1)->get();
        $user = User::where('id', $id)->first();
        $kelass = Kelas::where('kelas', $user->kelas)->first();
        $datas = Kehadiran::where('name_id', $id)->get();

        return view('guru.riwayat', compact('kelass', 'datas', 'tahunAjarans', 'user'));
    }

    public function jadwal()
    {
        $tahunAjarans = TahunAjaran::where('status', 1)->orWhere('status', 0)->get();
        $kelass = Kelas::all();
        $mapels = MataPelajaran::where('mapel', Auth::user()->kelas);
        $user = User::where('name', Auth::user()->name)->get();
        $datas = Jadwal::where('guru_id', $user[0]->id)->get();

        $senin = Jadwal::where('guru_id', $user[0]->id)->where('hari', 'senin')->get();
        $selasa = Jadwal::where('guru_id', $user[0]->id)->where('hari', 'selasa')->get();
        $rabu = Jadwal::where('guru_id', $user[0]->id)->where('hari', 'rabu')->get();
        $kamis = Jadwal::where('guru_id', $user[0]->id)->where('hari', 'kamis')->get();
        $jumat = Jadwal::where('guru_id', $user[0]->id)->where('hari', 'jumat')->get();

        $senins = count($senin);
        $selasas = count($selasa);
        $rabus = count($rabu);
        $kamiss = count($kamis);
        $jumats = count($jumat);

        return view('guru.jadwal', compact('datas', 'tahunAjarans', 'kelass', 'mapels', 'senins', 'selasas', 'rabus', 'kamiss', 'jumats'));
    }

    public function kehadiran($id)
    {
        $kehadirans = Kehadiran::where('pertemuan_id', $id)->get();
        // return $kehadirans;
        $tahunAjarans = TahunAjaran::where('status', 1)->get();
        $alfas = Kehadiran::where('pertemuan_id', $id)->where('status', 0)->get();
        $hadirs = Kehadiran::where('pertemuan_id', $id)->where('status', 1)->get();
        $izins = Kehadiran::where('pertemuan_id', $id)->where('status', 2)->get();
        $alfa = count($alfas);
        $hadir = count($hadirs);
        $izin = count($izins);

        return view('guru.kehadiran', compact('kehadirans', 'tahunAjarans', 'hadir', 'izin', 'alfa', 'hadirs', 'izins', 'alfas',));
    }

    public function izinTerima($id)
    {
        Kehadiran::where('id', $id)->update([
            'status' => 2,
        ]);
        return redirect()->back();
    }

    public function izinTolak($id)
    {
        Kehadiran::where('id', $id)->update([
            'status' => 0,
        ]);
        return redirect()->back();
    }

    public function profile()
    {
        $tahunAjarans = TahunAjaran::where('status', 1)->get();

        return view('guru.profile', compact('tahunAjarans'));
    }

    public function kehadiranExport(Request $request)
    {  
        // return $request->id;
        return Excel::download(new KehadiranExport($request->id), 'Kehadiran.xlsx');
    }
}
