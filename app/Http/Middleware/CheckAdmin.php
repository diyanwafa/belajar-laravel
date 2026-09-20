<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckAdmin
{
    public function handle(
        Request $request,
        Closure $next
    ): Response {
        // Mengecek apakah user sudah login
        if (!Auth::check()) {
            return redirect('/login');
        }

        // Mengecek apakah user adalah admin
        if (!Auth::user()->isAdmin()) {
            abort(403);
        }

        // Jika user adalah admin
        return $next($request);
    }
}