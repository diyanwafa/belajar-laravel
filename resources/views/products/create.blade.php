@extends('layouts.app')

@section('title', 'Tambah Produk')

@section('content')

    <h1>Tambah Produk</h1>

    <form
        action="/products"
        method="POST"
        enctype="multipart/form-data"
        onsubmit="this.querySelector('button[type=submit]').disabled = true;"
    >

        @csrf

        {{-- KODE PRODUK --}}
        <div>

            <label>Kode Produk</label>

            <br>

            <input
                type="text"
                name="kode_produk"
                value="{{ old('kode_produk') }}"
                placeholder="Contoh: LAPTOP001"
            >

            @error('kode_produk')
                <p class="error">
                    ❌ {{ $message }}
                </p>
            @enderror

        </div>

        <br>

        {{-- NAMA PRODUK --}}
        <div>

            <label>Nama Produk</label>

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

        {{-- HARGA --}}
        <div>

            <label>Harga</label>

            <br>

            <input
                type="text"
                name="harga"
                value="{{ old('harga') }}"
            >

            @error('harga')
                <p class="error">
                    ❌ {{ $message }}
                </p>
            @enderror

        </div>

        <br>

        {{-- DESKRIPSI --}}
        <div>

            <label>Deskripsi</label>

            <br>

            <textarea
                name="deskripsi"
                rows="5"
                cols="40"
                placeholder="Masukkan deskripsi produk..."
            >{{ old('deskripsi') }}</textarea>

            @error('deskripsi')
                <p class="error">
                    ❌ {{ $message }}
                </p>
            @enderror

        </div>

        <br>

        {{-- GAMBAR --}}
        <div>

            <label>Gambar Produk</label>

            <br>

            <input
                type="file"
                name="gambar"
                id="gambar"
                accept=".jpg,.jpeg,.png"
            >

            @error('gambar')
                <p class="error">
                    ❌ {{ $message }}
                </p>
            @enderror

        </div>

        <br>

        {{-- PREVIEW GAMBAR --}}
        <div>

            <p>
                <strong>Preview Gambar:</strong>
            </p>

            <img
                id="preview"
                src=""
                alt="Preview gambar"
                width="200"
                style="display: none;"
            >

        </div>

        <br>

        <button type="submit">
            Simpan Produk
        </button>

    </form>

    <br>

    <a href="/home">
        Kembali ke Home
    </a>

    {{-- JAVASCRIPT PREVIEW --}}
    <script>

        const gambarInput = document.getElementById('gambar');

        const preview = document.getElementById('preview');

        gambarInput.addEventListener('change', function () {

            const file = this.files[0];

            if (file) {

                const url = URL.createObjectURL(file);

                preview.src = url;

                preview.style.display = 'block';

            } else {

                preview.src = '';

                preview.style.display = 'none';

            }

        });

    </script>

@endsection