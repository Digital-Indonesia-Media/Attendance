<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Role;
  
use App\Models\Kelas;
use App\User;
use App\Models\TahunAjaran;
use App\Imports\userImport;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:admin');
    }
    
	protected function validator(Request $request)
    {
        return Validator::make($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    public function index()
    {
        $tahunAjarans = TahunAjaran::where('status', 1)->first();
        $tapels = TahunAjaran::all();
        $datas = User::where('role', 'guru')->orWhere('role', 'ortu')->get();
        $kelass = Kelas::where('tapel', $tahunAjarans->tapel)->get();

        return view('user.index', compact('tahunAjarans', 'datas', 'kelass', 'tapels'));
    }

    public function user($id)
    {
        $tahunAjarans = TahunAjaran::find($id)->first();
    	$datas = User::where('role', 'siswa')->get();
        $kelass = Kelas::where('tapel', $tahunAjarans->tapel)->get();
        // return $kelass;

    	return view('user.user', compact('datas', 'kelass', 'tahunAjarans',));
    }

    public function siswa($id)
    {
        $kelass = Kelas::where('id', $id)->get();
        $datas = User::where('role', 'siswa')->where('kelas', $kelass[0]->kelas)->get();

        return view('user.siswa', compact('datas', 'kelass',));
    }

    public function store(Request $request)
    {
        // return $request;
        // $nama_siswa = strtolower($request->name);
        // $coba = strtok($nama_siswa, " ");
        // $nama = 'ortu_' . $request->email;
        // return$nama;

        if($request->role == 'siswa') {
            User::create([
                'name' => 'Ortu ' . $request->name,
                'kelas' => $request->kelas,
                'tapel' => $request->tapel,
                'role' => 'ortu',
                'email' => 'ortu.' . $request->email,
                'password' => Hash::make($request->password),
            ]);
        };

    	User::create([
    		'name' => $request->name,
            'kelas' => $request->kelas,
    		'role' => $request->role,
    		'email' => $request->email,
    		'password' => Hash::make($request->password),
    	]);
    	return redirect()->back();
    }

    public function edit($id)
    {
    	$data = User::find($id);
    	return view('user.user_edit', compact('data'));
    }

    public function update(Request $request)
    {
    	User::where('id', $request->id)->update([
    		'name' => $request->name,
    		'email' => $request->email,
    		'role' => $request->role,
    	]);
    	return redirect()->back();
    }

    public function delete(Request $request)
    {
    	User::where('id', $request->id)->delete();
    	return redirect()->back();    
    }

    public function import(Request $request)
    {
        Excel::import(new userImport, $request->file('file'));
        return redirect()->back();
    }
}
