<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class OrtuMiddleware
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
            return redirect()->route('siswa');
        }
        if (Auth::user()->role == 'ortu') {
            return $next($request);
        }
        if (Auth::user()->role == 'guru') {
            return redirect()->route('guru');
        }
        if (Auth::user()->role == 'admin') {
            return redirect()->route('admin');
        }
    }
}
