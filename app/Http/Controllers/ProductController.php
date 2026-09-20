<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function create()
    {
        return view('products.create');
    }

    public function store(StoreProductRequest $request)
    {
        $user = Auth::user();

        $gambar = $request->file('gambar')->store(
            'products',
            'public'
        );

        $user->products()->create([
            'kode_produk' => $request->kode_produk,
            'nama' => $request->nama,
            'harga' => $request->harga,
            'deskripsi' => $request->deskripsi,
            'gambar' => $gambar,
        ]);

        return redirect('/home')->with(
            'success',
            'Produk berhasil ditambahkan!'
        );
    }

    public function show($id)
    {
        $produk = Product::findOrFail($id);

        $this->authorize('view', $produk);

        return view(
            'products.show',
            compact('produk')
        );
    }

    public function edit($id)
    {
        $produk = Product::findOrFail($id);

        $this->authorize('update', $produk);

        return view(
            'products.edit',
            compact('produk')
        );
    }

    public function update(
        UpdateProductRequest $request,
        $id
    ) {
        $produk = Product::findOrFail($id);

        $this->authorize('update', $produk);

        $data = [
            'kode_produk' => $request->kode_produk,
            'nama' => $request->nama,
            'harga' => $request->harga,
            'deskripsi' => $request->deskripsi,
        ];

        if ($request->hasFile('gambar')) {

            if ($produk->gambar) {
                Storage::disk('public')->delete(
                    $produk->gambar
                );
            }

            $gambar = $request->file('gambar')->store(
                'products',
                'public'
            );

            $data['gambar'] = $gambar;
        }

        $produk->update($data);

        return redirect('/home')->with(
            'success',
            'Produk berhasil diperbarui!'
        );
    }

    public function destroy($id)
    {
        $produk = Product::findOrFail($id);

        $this->authorize('delete', $produk);

        if ($produk->gambar) {
            Storage::disk('public')->delete(
                $produk->gambar
            );
        }

        $produk->delete();

        return redirect('/home')->with(
            'success',
            'Produk berhasil dihapus!'
        );
    }
}