@extends('layouts.app')

@section('title', 'Kelola Produk')

@section('content')

    <h1>📦 Kelola Produk</h1>

    <p>
        Halaman ini hanya dapat diakses oleh Admin.
    </p>

    <hr>

    <h2>Semua Produk</h2>

    @if ($produk->count() > 0)

        <table border="1" cellpadding="10" cellspacing="0">

            <thead>
                <tr>
                    <th>No</th>
                    <th>ID</th>
                    <th>Nama Produk</th>
                    <th>Harga</th>
                    <th>Pemilik</th>
                    <th>Username</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>

                @foreach ($produk as $item)

                    <tr>

                        <td>
                            {{ $loop->iteration }}
                        </td>

                        <td>
                            {{ $item->id }}
                        </td>

                        <td>
                            {{ $item->nama }}
                        </td>

                        <td>
                            Rp {{ number_format($item->harga, 0, ',', '.') }}
                        </td>

                        <td>
                            {{ $item->user->nama ?? 'Tidak diketahui' }}
                        </td>

                        <td>
                            {{ $item->user->username ?? 'Tidak diketahui' }}
                        </td>

                        <td>

                            <a href="/products/{{ $item->id }}">
                                <button>Detail</button>
                            </a>

                            <a href="/products/{{ $item->id }}/edit">
                                <button>Edit</button>
                            </a>

                            <form
                                action="/products/{{ $item->id }}"
                                method="POST"
                                style="display: inline;"
                            >

                                @csrf

                                @method('DELETE')

                                <button
                                    type="submit"
                                    onclick="return confirm('Yakin ingin menghapus produk ini?')"
                                >
                                    Hapus
                                </button>

                            </form>

                        </td>

                    </tr>

                @endforeach

            </tbody>

        </table>

    @else

        <p>
            Belum ada produk.
        </p>

    @endif

    <br>

    <a href="/admin">
        <button>
            🔐 Kembali ke Admin
        </button>
    </a>

    <a href="/home">
        <button>
            🏠 Home
        </button>
    </a>

@endsection