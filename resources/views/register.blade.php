@extends('layouts.app')

@section('title', 'Register')

@section('content')

    <h1>📝 Daftar Akun</h1>

    <p>
        Silakan buat akun baru.
    </p>

    <hr>

    <form action="/register" method="POST">

        @csrf

        {{-- NAMA --}}
        <div>

            <label>Nama</label>

            <br>

            <input
                type="text"
                name="nama"
                value="{{ old('nama') }}"
            >

            @error('nama')
                <p class="error">
                    ❌ {{ $message }}
                </p>
            @enderror

        </div>

        <br>

        {{-- USERNAME --}}
        <div>

            <label>Username</label>

            <br>

            <input
                type="text"
                name="username"
                value="{{ old('username') }}"
            >

            @error('username')
                <p class="error">
                    ❌ {{ $message }}
                </p>
            @enderror

        </div>

        <br>

        {{-- EMAIL --}}
        <div>

            <label>Email</label>

            <br>

            <input
                type="email"
                name="email"
                value="{{ old('email') }}"
                placeholder="contoh@email.com"
            >

            @error('email')
                <p class="error">
                    ❌ {{ $message }}
                </p>
            @enderror

        </div>

        <br>

        {{-- TANGGAL LAHIR --}}
        <div>

            <label>Tanggal Lahir</label>

            <br>

            <input
                type="date"
                name="tanggal_lahir"
                value="{{ old('tanggal_lahir') }}"
            >

            @error('tanggal_lahir')
                <p class="error">
                    ❌ {{ $message }}
                </p>
            @enderror

        </div>

        <br>

        {{-- PASSWORD --}}
        <div>

            <label>Password</label>

            <br>

            <input
                type="password"
                name="password"
            >

            @error('password')
                <p class="error">
                    ❌ {{ $message }}
                </p>
            @enderror

        </div>

        <br>

        {{-- KONFIRMASI PASSWORD --}}
        <div>

            <label>Konfirmasi Password</label>

            <br>

            <input
                type="password"
                name="password_confirmation"
            >

        </div>

        <br>

        <button type="submit">
            Daftar
        </button>

    </form>

    <br>

    <p>
        Sudah punya akun?
    </p>

    <a href="/login">
        <button>
            Login
        </button>
    </a>

@endsection