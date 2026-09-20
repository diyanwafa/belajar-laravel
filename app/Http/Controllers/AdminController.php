<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;

class AdminController extends Controller
{
    // =====================================================
    // DASHBOARD ADMIN
    // =====================================================

    public function index()
    {
        // Mengambil semua produk
        $produk = Product::with('user')->get();

        // Mengambil semua user
        $users = User::all();

        return view('admin', compact(
            'produk',
            'users'
        ));
    }


    // =====================================================
    // KELOLA PRODUK
    // =====================================================

    public function products()
    {
        // Mengambil semua produk
        // sekaligus mengambil data pemiliknya
        $produk = Product::with('user')->get();

        return view('admin.products', compact('produk'));
    }
}