<?php

namespace App\Http\Middleware;

use App\Models\Peserta;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $auth = session('peserta_id');
        $cek = Peserta::where('id', $auth)->first();
        if ($auth) {
            if ($cek) {
                return $next($request);
            }
        } else {
            return redirect()->route('login');
        }
    }
}
