<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CekAkses
{
    public function handle(Request $request, Closure $next, string $formTujuan): Response
    {
        if (!session('login')) {
            return redirect('/login')->with('error', 'Silakan login terlebih dahulu');
        }

        if (session('form_tujuan') !== $formTujuan) {
            return redirect('/')->with('error', 'Anda tidak memiliki akses ke halaman tersebut');
        }

        return $next($request);
    }
}