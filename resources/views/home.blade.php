@extends('layouts.app')

@section('title', 'Home')

@section('content')

    <style>

        /* ================================
           HERO
        ================================= */

        .home-hero {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 25px;
            padding: 30px;
            border-radius: 18px;
            background:
                linear-gradient(
                    135deg,
                    #eef2ff,
                    #f5f3ff
                );
            border: 1px solid #e0e7ff;
            margin-bottom: 25px;
        }

        .hero-text h1 {
            margin-bottom: 8px;
        }

        .hero-text p {
            margin-bottom: 0;
        }

        .hero-icon {
            width: 80px;
            height: 80px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 20px;
            background:
                linear-gradient(
                    135deg,
                    #4f46e5,
                    #8b5cf6
                );
            color: white;
            font-size: 38px;
            box-shadow:
                0 12px 25px
                rgba(79, 70, 229, 0.25);
        }


        /* ================================
           INFO CARDS
        ================================= */

        .dashboard-cards {
            display: grid;
            grid-template-columns:
                repeat(3, 1fr);
            gap: 18px;
            margin-bottom: 35px;
        }

        .dashboard-card {
            padding: 22px;
            background: white;
            border: 1px solid #e2e8f0;
            border-radius: 15px;
            box-shadow:
                0 5px 18px
                rgba(15, 23, 42, 0.05);
            transition: 0.25s;
        }

        .dashboard-card:hover {
            transform: translateY(-3px);
            box-shadow:
                0 12px 28px
                rgba(15, 23, 42, 0.09);
        }

        .dashboard-card-icon {
            font-size: 25px;
            margin-bottom: 8px;
        }

        .dashboard-card-title {
            font-size: 13px;
            color: #64748b;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .dashboard-card-value {
            font-size: 27px;
            font-weight: 800;
            color: #0f172a;
            margin-top: 3px;
        }


        /* ================================
           SECTION HEADER
        ================================= */

        .section-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 15px;
            margin-bottom: 20px;
        }

        .section-header h2 {
            margin: 0;
        }


        /* ================================
           PRODUCT GRID
        ================================= */

        .product-grid {
            display: grid;
            grid-template-columns:
                repeat(3, 1fr);
            gap: 22px;
        }


        /* ================================
           PRODUCT CARD
        ================================= */

        .product-card {
            overflow: hidden;
            background: white;
            border:
                1px solid #e2e8f0;
            border-radius: 16px;
            box-shadow:
                0 6px 20px
                rgba(15, 23, 42, 0.06);
            transition:
                transform 0.25s,
                box-shadow 0.25s;
        }

        .product-card:hover {
            transform: translateY(-5px);
            box-shadow:
                0 15px 35px
                rgba(15, 23, 42, 0.12);
        }


        /* ================================
           PRODUCT IMAGE
        ================================= */

        .product-image-wrapper {
            width: 100%;
            height: 210px;
            background: #f8fafc;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        .product-image-wrapper img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 0;
            transition: transform 0.3s;
        }

        .product-card:hover
        .product-image-wrapper img {
            transform: scale(1.04);
        }

        .no-image {
            color: #94a3b8;
            font-size: 14px;
            text-align: center;
        }


        /* ================================
           PRODUCT CONTENT
        ================================= */

        .product-content {
            padding: 18px;
        }

        .product-code {
            display: inline-block;
            padding: 4px 8px;
            border-radius: 6px;
            background: #eef2ff;
            color: #4f46e5;
            font-size: 11px;
            font-weight: 800;
            margin-bottom: 9px;
        }

        .product-name {
            font-size: 18px;
            font-weight: 800;
            color: #0f172a;
            margin-bottom: 5px;
        }

        .product-price {
            font-size: 17px;
            font-weight: 800;
            color: #4f46e5;
            margin-bottom: 10px;
        }

        .product-description {
            color: #64748b;
            font-size: 13px;
            min-height: 42px;
            margin-bottom: 15px;
        }


        /* ================================
           PRODUCT ACTION
        ================================= */

        .product-actions {
            display: flex;
            gap: 7px;
            flex-wrap: wrap;
            padding-top: 14px;
            border-top:
                1px solid #e2e8f0;
        }

        .product-actions a {
            text-decoration: none;
        }

        .product-actions button {
            padding: 8px 11px;
            font-size: 12px;
        }

        .button-secondary {
            background: #f1f5f9;
            color: #334155;
            box-shadow: none;
        }

        .button-secondary:hover {
            background: #e2e8f0;
            color: #0f172a;
            box-shadow: none;
        }

        .button-danger {
            background:
                linear-gradient(
                    135deg,
                    #ef4444,
                    #dc2626
                );
            box-shadow:
                0 5px 14px
                rgba(239, 68, 68, 0.18);
        }

        .button-danger:hover {
            box-shadow:
                0 8px 20px
                rgba(239, 68, 68, 0.25);
        }


        /* ================================
           PAGINATION
        ================================= */

        .pagination-wrapper {
            margin-top: 30px;
            display: flex;
            justify-content: center;
        }

        .pagination-wrapper nav {
            display: flex;
            justify-content: center;
        }

        .pagination-wrapper svg {
            width: 18px;
            height: 18px;
        }


        /* ================================
           SEARCH / SORTING / FILTER
        ================================= */

        .search-form {
            display: flex;
            gap: 10px;
            margin-bottom: 25px;
            flex-wrap: wrap;
        }

        .search-form input {
            flex: 1;
            min-width: 220px;
            width: auto;
            border: 1px solid #cbd5e1;
            border-radius: 8px;
        }

        .search-form select {
            width: auto;
            min-width: 220px;
            border: 1px solid #cbd5e1;
            border-radius: 8px;
            background: white;
        }

        .search-form button {
            border: none;
            border-radius: 8px;
            background: #4f46e5;
            color: white;
            font-weight: 700;
        }

        .search-form button:hover {
            background: #4338ca;
        }

        .search-reset {
            display: inline-flex;
            align-items: center;
            padding: 8px 15px;
            border-radius: 8px;
            background: #f1f5f9;
            color: #334155;
            text-decoration: none;
        }

        .search-reset:hover {
            background: #e2e8f0;
        }


        /* ================================
           EMPTY STATE
        ================================= */

        .empty-state {
            text-align: center;
            padding: 60px 20px;
            background: #f8fafc;
            border:
                1px dashed #cbd5e1;
            border-radius: 15px;
        }

        .empty-icon {
            font-size: 45px;
            margin-bottom: 10px;
        }

        .empty-state h3 {
            margin-bottom: 7px;
        }

        .empty-state p {
            margin-bottom: 18px;
        }


        /* ================================
           ADMIN MENU
        ================================= */

        .admin-panel {
            margin-bottom: 30px;
            padding: 22px;
            border-radius: 15px;
            background:
                linear-gradient(
                    135deg,
                    #faf5ff,
                    #f5f3ff
                );
            border:
                1px solid #e9d5ff;
        }

        .admin-panel h2 {
            margin-top: 0;
            color: #581c87;
        }

        .admin-buttons {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }


        /* ================================
           RESPONSIVE
        ================================= */

        @media (max-width: 900px) {

            .product-grid {
                grid-template-columns:
                    repeat(2, 1fr);
            }

            .dashboard-cards {
                grid-template-columns:
                    repeat(2, 1fr);
            }

        }


        @media (max-width: 650px) {

            .home-hero {
                padding: 22px;
            }

            .hero-icon {
                width: 60px;
                height: 60px;
                font-size: 28px;
            }

            .dashboard-cards {
                grid-template-columns: 1fr;
            }

            .product-grid {
                grid-template-columns: 1fr;
            }

            .section-header {
                align-items: flex-start;
                flex-direction: column;
            }

            .search-form {
                flex-direction: column;
            }

            .search-form input,
            .search-form select,
            .search-form button,
            .search-reset {
                width: 100%;
            }

        }

    </style>


    {{-- ================================
         HERO
    ================================= --}}

    <div class="home-hero">

        <div class="hero-text">

            <h1>
                Selamat datang, {{ $nama }}! 👋
            </h1>

            <p>
                Kelola produk kamu dengan mudah melalui dashboard Laravel.
            </p>

        </div>

        <div class="hero-icon">
            🚀
        </div>

    </div>


    {{-- ================================
         INFO USER
    ================================= --}}

    <div class="dashboard-cards">

        {{-- TOTAL PRODUK --}}

        <div class="dashboard-card">

            <div class="dashboard-card-icon">
                📦
            </div>

            <div class="dashboard-card-title">
                Produk Saya
            </div>

            <div class="dashboard-card-value">
                {{ $produk->total() }}
            </div>

        </div>


        {{-- USERNAME --}}

        <div class="dashboard-card">

            <div class="dashboard-card-icon">
                👤
            </div>

            <div class="dashboard-card-title">
                Username
            </div>

            <div class="dashboard-card-value">
                {{ $username }}
            </div>

        </div>


        {{-- ROLE --}}

        <div class="dashboard-card">

            <div class="dashboard-card-icon">
                🔐
            </div>

            <div class="dashboard-card-title">
                Role
            </div>

            <div class="dashboard-card-value">

                @if (Auth::user()->isAdmin())

                    Admin

                @else

                    User

                @endif

            </div>

        </div>

    </div>


    {{-- ================================
         ADMIN MENU
    ================================= --}}

    @if (Auth::user()->isAdmin())

        <div class="admin-panel">

            <h2>
                🔐 Panel Administrator
            </h2>

            <p>
                Kelola user dan seluruh produk melalui halaman administrator.
            </p>

            <div class="admin-buttons">

                <a href="/admin">

                    <button>
                        Dashboard Admin
                    </button>

                </a>

                <a href="/admin/users">

                    <button>
                        👥 Kelola User
                    </button>

                </a>

                <a href="/admin/products">

                    <button>
                        📦 Kelola Produk
                    </button>

                </a>

            </div>

        </div>

    @endif


    {{-- ================================
         SUCCESS MESSAGE
    ================================= --}}

    @if (session('success'))

        <div class="success">

            ✅ {{ session('success') }}

        </div>

    @endif


    {{-- ================================
         PRODUCT SECTION
    ================================= --}}

    <div class="section-header">

        <div>

            <h2>
                📦 Produk Saya
            </h2>

            <p>
                Daftar produk yang kamu miliki.
            </p>

        </div>

        <a href="/products/create">

            <button>
                + Tambah Produk
            </button>

        </a>

    </div>


    {{-- ================================
         SEARCH / SORTING / FILTER
    ================================= --}}

    <form
        action="/home"
        method="GET"
        class="search-form"
    >

        {{-- SEARCH --}}

        <input
            type="text"
            name="search"
            value="{{ request('search') }}"
            placeholder="🔎 Cari produk berdasarkan nama..."
        >


        {{-- SORTING --}}

        <select name="sort">

            <option
                value="harga_desc"
                {{ request('sort', 'harga_desc') === 'harga_desc' ? 'selected' : '' }}
            >
                💰 Harga Termahal
            </option>

            <option
                value="harga_asc"
                {{ request('sort') === 'harga_asc' ? 'selected' : '' }}
            >
                💰 Harga Termurah
            </option>

            <option
                value="nama_asc"
                {{ request('sort') === 'nama_asc' ? 'selected' : '' }}
            >
                🔤 Nama A-Z
            </option>

            <option
                value="nama_desc"
                {{ request('sort') === 'nama_desc' ? 'selected' : '' }}
            >
                🔤 Nama Z-A
            </option>

        </select>


        {{-- FILTER HARGA --}}

        <select name="harga">

            <option
                value=""
                {{ request('harga') === null || request('harga') === '' ? 'selected' : '' }}
            >
                💰 Semua Harga
            </option>

            <option
                value="dibawah_100"
                {{ request('harga') === 'dibawah_100' ? 'selected' : '' }}
            >
                💵 Rp100.000 dan di bawahnya
            </option>

            <option
                value="100_500"
                {{ request('harga') === '100_500' ? 'selected' : '' }}
            >
                💵 Rp100.000 - Rp500.000
            </option>

            <option
                value="diatas_500"
                {{ request('harga') === 'diatas_500' ? 'selected' : '' }}
            >
                💵 Di atas Rp500.000
            </option>

        </select>


        {{-- BUTTON --}}

        <button type="submit">
            🔍 Terapkan
        </button>


        {{-- RESET --}}

        @if (
            request('search') ||
            request('sort') ||
            request('harga')
        )

            <a
                href="/home"
                class="search-reset"
            >
                ✕ Reset
            </a>

        @endif

    </form>


    {{-- ================================
         PRODUCT LIST
    ================================= --}}

    @if ($produk->count() > 0)

        <div class="product-grid">

            @foreach ($produk as $item)

                <div class="product-card">

                    {{-- GAMBAR --}}

                    <div class="product-image-wrapper">

                        @if ($item->gambar)

                            <img
                                src="{{ asset('storage/' . $item->gambar) }}"
                                alt="{{ $item->nama }}"
                            >

                        @else

                            <div class="no-image">

                                🖼️

                                <br>

                                Tidak ada gambar

                            </div>

                        @endif

                    </div>


                    {{-- CONTENT --}}

                    <div class="product-content">

                        {{-- KODE --}}

                        @if ($item->kode_produk)

                            <span class="product-code">

                                {{ $item->kode_produk }}

                            </span>

                        @endif


                        {{-- NAMA --}}

                        <div class="product-name">

                            {{ $item->nama }}

                        </div>


                        {{-- HARGA --}}

                        <div class="product-price">

                            Rp {{ number_format(
                                $item->harga,
                                0,
                                ',',
                                '.'
                            ) }}

                        </div>


                        {{-- DESKRIPSI --}}

                        <div class="product-description">

                            @if ($item->deskripsi)

                                {{ \Illuminate\Support\Str::limit(
                                    $item->deskripsi,
                                    80
                                ) }}

                            @else

                                Tidak ada deskripsi.

                            @endif

                        </div>


                        {{-- ACTION --}}

                        <div class="product-actions">

                            <a
                                href="/products/{{ $item->id }}"
                            >

                                <button
                                    class="button-secondary"
                                >
                                    🔎 Detail
                                </button>

                            </a>


                            <a
                                href="/products/{{ $item->id }}/edit"
                            >

                                <button>
                                    ✏️ Edit
                                </button>

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
                                    class="button-danger"
                                    onclick="return confirm('Yakin ingin menghapus produk ini?')"
                                >
                                    🗑️ Hapus
                                </button>

                            </form>

                        </div>

                    </div>

                </div>

            @endforeach

        </div>


        {{-- ================================
             PAGINATION
        ================================= --}}

        <div class="pagination-wrapper">

            {{ $produk->withQueryString()->links() }}

        </div>


    @else

        {{-- EMPTY --}}

        <div class="empty-state">

            <div class="empty-icon">
                📦
            </div>

            <h3>

                @if (request('search') || request('harga'))

                    Produk tidak ditemukan

                @else

                    Belum ada produk

                @endif

            </h3>

            <p>

                @if (request('search') && request('harga'))

                    Tidak ada produk dengan nama
                    "{{ request('search') }}"
                    pada filter harga yang dipilih.

                @elseif (request('search'))

                    Tidak ada produk dengan nama
                    "{{ request('search') }}".

                @elseif (request('harga'))

                    Tidak ada produk pada rentang harga yang dipilih.

                @else

                    Kamu belum memiliki produk.
                    Yuk tambahkan produk pertamamu!

                @endif

            </p>


            @if (
                request('search') ||
                request('harga')
            )

                <a href="/home">

                    <button>
                        ✕ Reset Filter
                    </button>

                </a>

            @else

                <a href="/products/create">

                    <button>
                        + Tambah Produk
                    </button>

                </a>

            @endif

        </div>

    @endif

@endsection