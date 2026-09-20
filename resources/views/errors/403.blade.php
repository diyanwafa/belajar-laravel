@extends('layouts.app')

@section('title', 'Akses Ditolak')

@section('content')

    <h1>🚫 Akses Ditolak</h1>

    <hr>

    <h2>403 - Forbidden</h2>

    <p>
        Maaf, kamu tidak memiliki izin untuk mengakses halaman ini.
    </p>

    <p>
        Data tersebut bukan milik akun kamu.
    </p>

    <br>

    <a href="/home">
        <button>Kembali ke Home</button>
    </a>

@endsection