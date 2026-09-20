@extends('layouts.app')

@section('title', 'Edit Produk')

@section('content')

    <h1>Edit Produk</h1>

    <hr>

    <form
        action="/products/{{ $produk->id }}"
        method="POST"
        enctype="multipart/form-data"
        onsubmit="this.querySelector('button[type=submit]').disabled = true;"
    >

        @csrf

        @method('PUT')

        {{-- KODE PRODUK --}}
        <div>

            <label>Kode Produk</label>

            <br>

            <input
                type="text"
                name="kode_produk"
                value="{{ old('kode_produk', $produk->kode_produk) }}"
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
                value="{{ old('nama', $produk->nama) }}"
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
                value="{{ old('harga', $produk->harga) }}"
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
            >{{ old('deskripsi', $produk->deskripsi) }}</textarea>

            @error('deskripsi')
                <p class="error">
                    ❌ {{ $message }}
                </p>
            @enderror

        </div>

        <br>

        {{-- GAMBAR LAMA --}}
        <div>

            <label>Gambar Saat Ini</label>

            <br>

            @if ($produk->gambar)

                <img
                    src="{{ asset('storage/' . $produk->gambar) }}"
                    alt="{{ $produk->nama }}"
                    width="150"
                >

            @else

                <p>
                    Tidak ada gambar.
                </p>

            @endif

        </div>

        <br>

        {{-- GAMBAR BARU --}}
        <div>

            <label>Ganti Gambar</label>

            <br>

            <input
                type="file"
                name="gambar"
                id="gambar"
                accept=".jpg,.jpeg,.png"
            >

            <p>
                Kosongkan jika tidak ingin mengganti gambar.
            </p>

            @error('gambar')
                <p class="error">
                    ❌ {{ $message }}
                </p>
            @enderror

        </div>

        <br>

        {{-- PREVIEW GAMBAR BARU --}}
        <div>

            <p>
                <strong>Preview Gambar Baru:</strong>
            </p>

            <img
                id="preview"
                src=""
                alt="Preview gambar baru"
                width="200"
                style="display: none;"
            >

        </div>

        <br>

        <button type="submit">
            Update Produk
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