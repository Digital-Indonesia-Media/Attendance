<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
	public function __construct()
    {
        $this->middleware('role:admin');
    }

    public function index()
    {
    	return view('admin.index');
    }

    public function profile()
    {
    	return view('admin.profile');
    }

    public function update(Request $request)
    {
        User::where('name', Auth::user()->name)->update([
            'email' => $request->email,
        ]);

        return redirect()->route('admin-profile');
    }

    public function user($id)
    {
        $tahunAjarans = TahunAjaran::find($id);
        $kelass = Kelas::where('tapel', $tahunAjarans->tapel)->get();

        return view('admin.user', compact('kelass', 'tahunAjarans'));
    }
}
