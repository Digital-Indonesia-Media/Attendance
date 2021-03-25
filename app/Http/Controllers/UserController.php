<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Role;
use App\User;

class UserController extends Controller
{
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
    	$datas = User::all();
    	return view('user', compact('datas'));
    }

    public function store(Request $request)
    {
    	User::create([
    		'name' => $request->name,
    		'role' => $request->role,
    		'email' => $request->email,
    		'password' => Hash::make($request->password),
    	]);
    	return redirect()->back();
    }

    public function edit($id)
    {
    	$data = User::find($id);
    	return view('user_edit', compact('data'));
    }

    public function update(Request $request)
    {
    	User::where('id', $request->id)->update([
    		'name' => $request->name,
    		'email' => $request->email,
    		'role' => $request->role,
    	]);
    	return redirect()->route('user-index');
    }

    public function delete(Request $request)
    {
    	User::where('id', $request->id)->delete();
    	return redirect()->back();    
    }
}
