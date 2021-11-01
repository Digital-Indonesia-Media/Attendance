<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // return view('home');
        return redirect('login');
    }

    public function login()
    {
        $user = Auth::User();
        if ($user->role == 'admin') {
            return redirect('admin');
        }

        if ($user->role == 'guru') {
            return redirect('guru');
        }

        if ($user->role == 'siswa') {
            return redirect('siswa');
        }
        return redirect('login');
    }

}
