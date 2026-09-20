<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();

        $query = $user->products();

        // SEARCH
        $query->when(
            $request->search,
            function ($query) use ($request) {

                $query->where(
                    'nama',
                    'like',
                    '%' . $request->search . '%'
                );

            }
        );


        // FILTER HARGA
        $query->when(
            $request->harga === 'dibawah_100',
            function ($query) {

                $query->where(
                    'harga',
                    '<=',
                    100000
                );

            }
        );

        $query->when(
            $request->harga === '100_500',
            function ($query) {

                $query->whereBetween(
                    'harga',
                    [100000, 500000]
                );

            }
        );

        $query->when(
            $request->harga === 'diatas_500',
            function ($query) {

                $query->where(
                    'harga',
                    '>',
                    500000
                );

            }
        );


        // SORTING
        $query->when(
            $request->sort === 'harga_asc',
            function ($query) {

                $query->orderBy(
                    'harga',
                    'asc'
                );

            }
        );

        $query->when(
            $request->sort === 'harga_desc',
            function ($query) {

                $query->orderBy(
                    'harga',
                    'desc'
                );

            }
        );

        $query->when(
            $request->sort === 'nama_asc',
            function ($query) {

                $query->orderBy(
                    'nama',
                    'asc'
                );

            }
        );

        $query->when(
            $request->sort === 'nama_desc',
            function ($query) {

                $query->orderBy(
                    'nama',
                    'desc'
                );

            }
        );


        // DEFAULT SORTING
        if (!$request->sort) {

            $query->orderBy(
                'harga',
                'desc'
            );
        }


        // PAGINATION
        $produk = $query->paginate(3);


        $nama = $user->nama;

        $username = $user->username;


        return view(
            'home',
            compact(
                'nama',
                'username',
                'produk'
            )
        );
    }
}