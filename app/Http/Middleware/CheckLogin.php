<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckLogin
{
    public function handle(
        Request $request,
        Closure $next
    ): Response {
        // Mengecek apakah user sudah login
        if (!Auth::check()) {
            return redirect('/login');
        }

        // Jika sudah login, lanjutkan ke halaman berikutnya
        return $next($request);
    }
}