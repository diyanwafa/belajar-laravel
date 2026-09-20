@extends('layouts.app')

@section('title', 'Detail Produk')

@section('content')

    <h1>Detail Produk</h1>

    <hr>

    {{-- GAMBAR PRODUK --}}
    <div>

        <strong>Gambar Produk:</strong>

        <br><br>

        @if ($produk->gambar)

            <img
                src="{{ asset('storage/' . $produk->gambar) }}"
                alt="{{ $produk->nama }}"
                width="250"
            >

        @else

            <p>
                Tidak ada gambar.
            </p>

        @endif

    </div>

    <hr>

    {{-- KODE PRODUK --}}
    <p>

        <strong>Kode Produk:</strong>

        @if ($produk->kode_produk)

            {{ $produk->kode_produk }}

        @else

            Tidak ada kode.

        @endif

    </p>

    {{-- NAMA PRODUK --}}
    <p>

        <strong>Nama Produk:</strong>

        {{ $produk->nama }}

    </p>

    {{-- HARGA --}}
    <p>

        <strong>Harga:</strong>

        Rp {{ number_format($produk->harga, 0, ',', '.') }}

    </p>

    {{-- DESKRIPSI --}}
    <p>

        <strong>Deskripsi:</strong>

    </p>

    @if ($produk->deskripsi)

        <p>
            {{ $produk->deskripsi }}
        </p>

    @else

        <p>
            Tidak ada deskripsi.
        </p>

    @endif

    <hr>

    {{-- PEMILIK --}}
    <p>

        <strong>Pemilik:</strong>

        {{ $produk->user->nama }}

    </p>

    <p>

        <strong>Username:</strong>

        {{ $produk->user->username }}

    </p>

    <hr>

    {{-- WAKTU --}}
    <p>

        <strong>Dibuat:</strong>

        {{ $produk->created_at }}

    </p>

    <p>

        <strong>Terakhir diubah:</strong>

        {{ $produk->updated_at }}

    </p>

    <hr>

    {{-- TOMBOL --}}
    <a href="/home">

        <button>
            Kembali
        </button>

    </a>

    <a href="/products/{{ $produk->id }}/edit">

        <button>
            Edit
        </button>

    </a>

@endsection