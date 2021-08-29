<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\carbon;
use App\User;
use App\Models\Kelas;
use App\Models\Jadwal;
use App\Models\Pertemuan;
use App\Models\Kehadiran;
use App\Models\TahunAjaran;
use App\Models\MataPelajaran;

class SiswaController extends Controller
{
	// public function __construct()
 //    {
 //        $this->middleware('role:siswa');
 //    }

    public function index()
    {
        $user = User::where('name', Auth::user()->name)->get();
        $kelas = Kelas::where('kelas', $user[0]->kelas)->get();
        $datas = Jadwal::where('kelas_id', $kelas[0]->id)->get();
        $tahunAjarans = TahunAjaran::where('status', 1)->orWhere('status', 0)->get();
        $kelass = Kelas::all();
        $mapels = MataPelajaran::all();
        $alfas = Kehadiran::where('name_id', $user[0]->id)->where('status', 0)->get();
        $hadirs = Kehadiran::where('name_id', $user[0]->id)->where('status', 1)->get();
        $izins = Kehadiran::where('name_id', $user[0]->id)->where('status', 2)->get();
        $alfa = count($alfas);
        $hadir = count($hadirs);
        $izin = count($izins);

        return view('siswa.index', compact('datas', 'tahunAjarans', 'kelass', 'mapels', 'alfa', 'hadir', 'izin'));
    }

    public function jadwal()
    {
    	$user = User::where('name', Auth::user()->name)->get();
        $kelas = Kelas::where('kelas', $user[0]->kelas)->get();
        $datas = Jadwal::where('kelas_id', $kelas[0]->id)->get();
        $tahunAjarans = TahunAjaran::where('status', 1)->orWhere('status', 0)->get();
        $kelass = Kelas::all();
        $mapels = MataPelajaran::all();
        return view('siswa.jadwal', compact('datas', 'tahunAjarans', 'kelass', 'mapels',));
    }

    public function pertemuan($id)
    {
        $now = date('Y-m-d H:i:s', time());
        $user = User::where('name', Auth::user()->name)->get();
        $kelas = Kelas::where('kelas', $user[0]->kelas)->get();
        $data = Jadwal::where('kelas_id', $kelas[0]->id)->get();
    	$pertemuans = Pertemuan::where('mapel', $data[0]->mapel->mapel)->get();
        $kehadiran = Kehadiran::all();
    	return view('siswa.pertemuan', compact('pertemuans', 'kehadiran', 'now'));
    }

    public function hadir($id, Request $request)
    {
        $now = date('Y-m-d H:i:s', time());
        $kelas = Kelas::where('kelas', Auth::user()->kelas)->get();
        $data = Jadwal::where('kelas_id', $kelas[0]->id)->get();
        $pertemuans = Pertemuan::where('id', $id)->get();

        if ($request->kode == $pertemuans[0]->code || $now < $pertemuans[0]->data_expired) {
            Kehadiran::where('name_id', Auth::user()->id)->where('pertemuan_id', $id)->update([
                'name_id' => Auth::user()->id,
                'kelas_id' => $kelas[0]->id,
                'mapel_id' => $data[0]->mapel->id,
                'pertemuan_id' => $id,
                'status' => 1,
                'date_present' => $now,
            ]);
        }
        return redirect()->back();
    }

    public function izin($id, Request $request)
    {
        Kehadiran::where('name_id', Auth::user()->id)->where('pertemuan_id', $id)->update([
            'izin' => $request->keterangan,
            'status' => 3,
        ]);
        return redirect()->back();
    }

    public function profile()
    {
        return view('siswa.profile');
    }
}
