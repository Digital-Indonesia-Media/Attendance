<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class SiswaMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::user()->role == 'siswa') {
            return $next($request);
        }
        if (Auth::user()->role == 'ortu') {
            return redirect()->route('ortu');
        }
        if (Auth::user()->role == 'guru') {
            return redirect()->route('guru');
        }
        if (Auth::user()->role == 'admin') {
            return redirect()->route('admin');
        }
        else {
            return redirect()->route('/login');
        }
    }
}
