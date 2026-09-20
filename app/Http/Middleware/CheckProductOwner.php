<?php

namespace App\Http\Middleware;

use App\Models\Product;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckProductOwner
{
    public function handle(
        Request $request,
        Closure $next
    ): Response {
        // Mengambil ID user yang sedang login
        $userId = Auth::id();

        // Mengambil ID produk dari URL
        $productId = $request->route('id');

        // Mencari produk
        $produk = Product::find($productId);

        // Jika produk tidak ditemukan
        if (!$produk) {
            abort(404);
        }

        // Jika produk bukan milik user yang login
        if ($produk->user_id !== $userId) {
            abort(403);
        }

        // Jika pemiliknya benar
        return $next($request);
    }
}