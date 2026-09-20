<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckGuest
{
    public function handle(
        Request $request,
        Closure $next
    ): Response {
        // Jika user sudah login,
        // jangan izinkan membuka halaman login
        if (Auth::check()) {
            return redirect('/home');
        }

        // Jika belum login, lanjutkan
        return $next($request);
    }
}