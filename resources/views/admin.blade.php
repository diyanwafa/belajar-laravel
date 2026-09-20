@extends('layouts.app')

@section('title', 'Dashboard Admin')

@section('content')

    <style>

        /* ================================
           ADMIN HEADER
        ================================= */

        .admin-header {
            display: flex;

            align-items: center;

            justify-content: space-between;

            gap: 20px;

            padding: 30px;

            border-radius: 18px;

            background:
                linear-gradient(
                    135deg,
                    #eef2ff,
                    #f5f3ff
                );

            border:
                1px solid #e0e7ff;

            margin-bottom: 25px;
        }

        .admin-header h1 {
            margin-bottom: 8px;
        }

        .admin-header p {
            margin: 0;
        }

        .admin-header-icon {
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
                    #7c3aed
                );

            color: white;

            font-size: 38px;

            box-shadow:
                0 12px 25px
                rgba(79, 70, 229, 0.25);
        }


        /* ================================
           STATISTICS
        ================================= */

        .admin-stats {
            display: grid;

            grid-template-columns:
                repeat(3, 1fr);

            gap: 18px;

            margin-bottom: 35px;
        }

        .stat-card {
            display: flex;

            align-items: center;

            gap: 16px;

            padding: 22px;

            background: white;

            border:
                1px solid #e2e8f0;

            border-radius: 15px;

            box-shadow:
                0 6px 20px
                rgba(15, 23, 42, 0.05);

            transition: 0.25s;
        }

        .stat-card:hover {
            transform: translateY(-3px);

            box-shadow:
                0 12px 28px
                rgba(15, 23, 42, 0.09);
        }

        .stat-icon {
            width: 52px;
            height: 52px;

            flex-shrink: 0;

            display: flex;

            align-items: center;

            justify-content: center;

            border-radius: 13px;

            font-size: 25px;

            background: #eef2ff;
        }

        .stat-label {
            color: #64748b;

            font-size: 13px;

            font-weight: 700;

            text-transform: uppercase;

            letter-spacing: 0.4px;
        }

        .stat-value {
            color: #0f172a;

            font-size: 27px;

            font-weight: 800;

            line-height: 1.2;
        }


        /* ================================
           ADMIN MENU
        ================================= */

        .admin-menu {
            display: grid;

            grid-template-columns:
                repeat(2, 1fr);

            gap: 18px;

            margin-bottom: 35px;
        }

        .admin-menu-card {
            display: flex;

            align-items: center;

            justify-content: space-between;

            gap: 15px;

            padding: 22px;

            background: white;

            border:
                1px solid #e2e8f0;

            border-radius: 15px;

            text-decoration: none;

            box-shadow:
                0 5px 18px
                rgba(15, 23, 42, 0.05);

            transition: 0.25s;
        }

        .admin-menu-card:hover {
            transform: translateY(-3px);

            border-color: #c7d2fe;

            box-shadow:
                0 12px 28px
                rgba(15, 23, 42, 0.09);
        }

        .admin-menu-left {
            display: flex;

            align-items: center;

            gap: 15px;
        }

        .admin-menu-icon {
            width: 48px;
            height: 48px;

            display: flex;

            align-items: center;

            justify-content: center;

            border-radius: 12px;

            background: #eef2ff;

            font-size: 22px;
        }

        .admin-menu-title {
            color: #0f172a;

            font-weight: 800;

            margin-bottom: 2px;
        }

        .admin-menu-description {
            color: #64748b;

            font-size: 13px;
        }

        .admin-menu-arrow {
            color: #6366f1;

            font-size: 20px;

            font-weight: bold;
        }


        /* ================================
           SECTION
        ================================= */

        .admin-section {
            margin-bottom: 35px;
        }

        .admin-section-header {
            display: flex;

            align-items: center;

            justify-content: space-between;

            gap: 15px;

            margin-bottom: 15px;
        }

        .admin-section-header h2 {
            margin: 0;
        }

        .admin-section-header p {
            margin: 4px 0 0;
        }


        /* ================================
           TABLE
        ================================= */

        .admin-table-wrapper {
            overflow-x: auto;

            border:
                1px solid #e2e8f0;

            border-radius: 14px;

            background: white;

            box-shadow:
                0 5px 18px
                rgba(15, 23, 42, 0.04);
        }

        .admin-table {
            width: 100%;

            min-width: 600px;

            border: none;

            border-radius: 0;

            margin: 0;
        }

        .admin-table th {
            background: #f8fafc;

            padding: 14px 16px;

            border-bottom:
                1px solid #e2e8f0;
        }

        .admin-table td {
            padding: 14px 16px;

            border-bottom:
                1px solid #f1f5f9;
        }

        .admin-table tbody tr:last-child td {
            border-bottom: none;
        }


        /* ================================
           BADGE
        ================================= */

        .role-badge {
            display: inline-block;

            padding: 5px 10px;

            border-radius: 999px;

            font-size: 12px;

            font-weight: 800;
        }

        .role-admin {
            color: #6b21a8;

            background: #f3e8ff;
        }

        .role-user {
            color: #1d4ed8;

            background: #dbeafe;
        }


        /* ================================
           PRODUCT NAME
        ================================= */

        .product-name-admin {
            font-weight: 700;

            color: #1e293b;
        }

        .product-price-admin {
            color: #4f46e5;

            font-weight: 800;
        }


        /* ================================
           EMPTY
        ================================= */

        .admin-empty {
            padding: 35px;

            text-align: center;

            color: #64748b;
        }


        /* ================================
           FOOTER BUTTON
        ================================= */

        .admin-footer {
            display: flex;

            justify-content: center;

            padding-top: 10px;
        }

        .home-button {
            background: #f1f5f9;

            color: #334155;

            box-shadow: none;
        }

        .home-button:hover {
            background: #e2e8f0;

            color: #0f172a;

            box-shadow: none;
        }


        /* ================================
           RESPONSIVE
        ================================= */

        @media (max-width: 850px) {

            .admin-stats {
                grid-template-columns:
                    repeat(2, 1fr);
            }

        }


        @media (max-width: 650px) {

            .admin-header {
                padding: 22px;
            }

            .admin-header-icon {
                width: 60px;
                height: 60px;

                font-size: 28px;
            }

            .admin-stats {
                grid-template-columns: 1fr;
            }

            .admin-menu {
                grid-template-columns: 1fr;
            }

        }

    </style>


    {{-- ================================
         HEADER
    ================================= --}}

    <div class="admin-header">

        <div>

            <h1>
                🔐 Dashboard Admin
            </h1>

            <p>
                Selamat datang di pusat kontrol aplikasi.
            </p>

        </div>

        <div class="admin-header-icon">
            🔐
        </div>

    </div>


    {{-- ================================
         STATISTICS
    ================================= --}}

    <div class="admin-stats">


        {{-- TOTAL USER --}}

        <div class="stat-card">

            <div class="stat-icon">
                👥
            </div>

            <div>

                <div class="stat-label">
                    Total User
                </div>

                <div class="stat-value">
                    {{ $users->count() }}
                </div>

            </div>

        </div>


        {{-- TOTAL PRODUK --}}

        <div class="stat-card">

            <div class="stat-icon">
                📦
            </div>

            <div>

                <div class="stat-label">
                    Total Produk
                </div>

                <div class="stat-value">
                    {{ $produk->count() }}
                </div>

            </div>

        </div>


        {{-- ADMIN --}}

        <div class="stat-card">

            <div class="stat-icon">
                🛡️
            </div>

            <div>

                <div class="stat-label">
                    Total Admin
                </div>

                <div class="stat-value">
                    {{ $users->where('role', 'admin')->count() }}
                </div>

            </div>

        </div>


    </div>


    {{-- ================================
         MENU ADMIN
    ================================= --}}

    <div class="admin-menu">


        {{-- USER --}}

        <a
            href="/admin/users"
            class="admin-menu-card"
        >

            <div class="admin-menu-left">

                <div class="admin-menu-icon">
                    👥
                </div>

                <div>

                    <div class="admin-menu-title">
                        Kelola User
                    </div>

                    <div class="admin-menu-description">
                        Tambah, edit, dan hapus akun user.
                    </div>

                </div>

            </div>

            <div class="admin-menu-arrow">
                →
            </div>

        </a>


        {{-- PRODUK --}}

        <a
            href="/admin/products"
            class="admin-menu-card"
        >

            <div class="admin-menu-left">

                <div class="admin-menu-icon">
                    📦
                </div>

                <div>

                    <div class="admin-menu-title">
                        Kelola Produk
                    </div>

                    <div class="admin-menu-description">
                        Lihat dan kelola seluruh produk.
                    </div>

                </div>

            </div>

            <div class="admin-menu-arrow">
                →
            </div>

        </a>


    </div>


    {{-- ================================
         USER SECTION
    ================================= --}}

    <div class="admin-section">

        <div class="admin-section-header">

            <div>

                <h2>
                    👥 Semua User
                </h2>

                <p>
                    Daftar seluruh pengguna aplikasi.
                </p>

            </div>

            <a href="/admin/users">

                <button>
                    Kelola User →
                </button>

            </a>

        </div>


        @if ($users->count() > 0)

            <div class="admin-table-wrapper">

                <table class="admin-table">

                    <thead>

                        <tr>

                            <th>
                                No
                            </th>

                            <th>
                                ID
                            </th>

                            <th>
                                Nama
                            </th>

                            <th>
                                Username
                            </th>

                            <th>
                                Role
                            </th>

                        </tr>

                    </thead>

                    <tbody>

                        @foreach ($users as $user)

                            <tr>

                                <td>
                                    {{ $loop->iteration }}
                                </td>

                                <td>
                                    #{{ $user->id }}
                                </td>

                                <td>
                                    <strong>
                                        {{ $user->nama }}
                                    </strong>
                                </td>

                                <td>
                                    {{ $user->username }}
                                </td>

                                <td>

                                    @if ($user->role === 'admin')

                                        <span
                                            class="role-badge role-admin"
                                        >
                                            🛡️ Admin
                                        </span>

                                    @else

                                        <span
                                            class="role-badge role-user"
                                        >
                                            👤 User
                                        </span>

                                    @endif

                                </td>

                            </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>

        @else

            <div class="admin-empty">
                Belum ada user.
            </div>

        @endif

    </div>


    {{-- ================================
         PRODUCT SECTION
    ================================= --}}

    <div class="admin-section">

        <div class="admin-section-header">

            <div>

                <h2>
                    📦 Semua Produk
                </h2>

                <p>
                    Produk dari seluruh pengguna aplikasi.
                </p>

            </div>

            <a href="/admin/products">

                <button>
                    Kelola Produk →
                </button>

            </a>

        </div>


        @if ($produk->count() > 0)

            <div class="admin-table-wrapper">

                <table class="admin-table">

                    <thead>

                        <tr>

                            <th>
                                No
                            </th>

                            <th>
                                Produk
                            </th>

                            <th>
                                Harga
                            </th>

                            <th>
                                Pemilik
                            </th>

                            <th>
                                Username
                            </th>

                        </tr>

                    </thead>

                    <tbody>

                        @foreach ($produk as $item)

                            <tr>

                                <td>
                                    {{ $loop->iteration }}
                                </td>

                                <td>

                                    <div class="product-name-admin">
                                        {{ $item->nama }}
                                    </div>

                                    @if ($item->kode_produk)

                                        <small>
                                            {{ $item->kode_produk }}
                                        </small>

                                    @endif

                                </td>

                                <td>

                                    <span
                                        class="product-price-admin"
                                    >

                                        Rp
                                        {{ number_format(
                                            $item->harga,
                                            0,
                                            ',',
                                            '.'
                                        ) }}

                                    </span>

                                </td>

                                <td>
                                    {{ $item->user->nama ?? 'Tidak diketahui' }}
                                </td>

                                <td>
                                    {{ $item->user->username ?? 'Tidak diketahui' }}
                                </td>

                            </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>

        @else

            <div class="admin-empty">
                Belum ada produk.
            </div>

        @endif

    </div>


    {{-- ================================
         BACK HOME
    ================================= --}}

    <div class="admin-footer">

        <a href="/home">

            <button class="home-button">
                🏠 Kembali ke Home
            </button>

        </a>

    </div>


@endsection