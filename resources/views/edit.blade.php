@extends('layouts.app')

@section('title', 'Edit Produk')

@section('content')

    <h1>Edit Produk</h1>

    <form action="/products/{{ $produk->id }}" method="POST">

        @csrf

        @method('PUT')

        <div>
            <label>Nama Produk</label>
            <br>

            <input
                type="text"
                name="nama"
                value="{{ old('nama', $produk->nama) }}"
            >

            @error('nama')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <br>

        <div>
            <label>Harga</label>
            <br>

            <input
                type="text"
                name="harga"
                value="{{ old('harga', $produk->harga) }}"
            >

            @error('harga')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <br>

        <button type="submit">
            Update Produk
        </button>

    </form>

    <br>

    <a href="/home">Kembali ke Home</a>

@endsection