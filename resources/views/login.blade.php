@extends('layouts.app')

@section('title', 'Login')

@section('content')

    <h1>Login</h1>

    <p>
        Silakan login untuk masuk ke website.
    </p>

    {{-- PESAN BERHASIL --}}
    @if (session('success'))

        <p class="success">
            ✅ {{ session('success') }}
        </p>

    @endif

    {{-- PESAN ERROR --}}
    @if ($errors->any())

        <div class="error">

            @foreach ($errors->all() as $error)

                <p>
                    ❌ {{ $error }}
                </p>

            @endforeach

        </div>

    @endif

    {{-- FORM LOGIN --}}
    <form action="/login" method="POST">

        @csrf

        {{-- USERNAME --}}
        <div>

            <label>Username</label>

            <br>

            <input
                type="text"
                name="username"
                value="{{ old('username') }}"
            >

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

        </div>

        <br>

        <button type="submit">
            Login
        </button>

    </form>

    <br>

    <p>
        Belum punya akun?
    </p>

    <a href="/register">
        <button>
            Daftar
        </button>
    </a>

@endsection