@extends('layouts.app')

@section('title', 'Tambah User')

@section('content')

    <style>

        .create-user-header {
            display: flex;
            align-items: center;
            gap: 18px;
            margin-bottom: 25px;
        }

        .create-user-icon {
            width: 60px;
            height: 60px;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 16px;

            background: linear-gradient(
                135deg,
                #4f46e5,
                #7c3aed
            );

            color: white;
            font-size: 28px;

            box-shadow:
                0 10px 25px
                rgba(79, 70, 229, 0.22);
        }

        .create-user-header h1 {
            margin: 0 0 5px 0;
        }

        .create-user-header p {
            margin: 0;
            color: #64748b;
        }

        .user-form-card {
            background: white;

            border: 1px solid #e2e8f0;

            border-radius: 16px;

            padding: 25px;

            box-shadow:
                0 6px 20px
                rgba(15, 23, 42, 0.05);
        }

        .form-section {
            margin-bottom: 25px;
        }

        .form-section-title {
            display: flex;
            align-items: center;
            gap: 8px;

            margin: 0 0 18px 0;

            padding-bottom: 10px;

            border-bottom:
                1px solid #e2e8f0;

            color: #0f172a;

            font-size: 17px;
        }

        .form-grid {
            display: grid;

            grid-template-columns:
                repeat(2, minmax(0, 1fr));

            gap: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            display: block;

            margin-bottom: 7px;

            color: #334155;

            font-weight: 700;

            font-size: 14px;
        }

        .user-form-card input,
        .user-form-card select {
            width: 100%;

            max-width: none;

            padding: 12px 14px;

            border:
                1px solid #cbd5e1;

            border-radius: 9px;

            background: white;

            color: #0f172a;

            font-size: 14px;

            outline: none;

            transition: 0.2s;
        }

        .user-form-card input:focus,
        .user-form-card select:focus {
            border-color: #6366f1;

            box-shadow:
                0 0 0 3px
                rgba(99, 102, 241, 0.12);
        }

        .form-help {
            margin: 6px 0 0 0;

            color: #94a3b8;

            font-size: 12px;
        }

        .form-error {
            margin: 7px 0 0 0;

            color: #dc2626;

            font-size: 13px;

            font-weight: 600;
        }

        .form-buttons {
            display: flex;

            align-items: center;

            gap: 10px;

            padding-top: 5px;
        }

        .save-user-button {
            background:
                linear-gradient(
                    135deg,
                    #4f46e5,
                    #7c3aed
                );

            color: white;

            border: none;

            padding: 11px 18px;

            border-radius: 8px;

            font-weight: 700;

            box-shadow:
                0 6px 15px
                rgba(79, 70, 229, 0.20);
        }

        .save-user-button:hover {
            transform: translateY(-1px);
        }

        .cancel-user-button {
            display: inline-block;

            background: #f1f5f9;

            color: #334155;

            padding: 11px 18px;

            border-radius: 8px;

            font-weight: 700;

            text-decoration: none;
        }

        .cancel-user-button:hover {
            background: #e2e8f0;
        }

        @media (max-width: 700px) {

            .form-grid {
                grid-template-columns: 1fr;
            }

            .create-user-header {
                align-items: flex-start;
            }

            .create-user-icon {
                width: 52px;
                height: 52px;

                font-size: 24px;
            }

            .user-form-card {
                padding: 18px;
            }

            .form-buttons {
                flex-direction: column;

                align-items: stretch;
            }

            .save-user-button,
            .cancel-user-button {
                width: 100%;

                text-align: center;
            }

        }

    </style>


    {{-- HEADER --}}

    <div class="create-user-header">

        <div class="create-user-icon">
            👤
        </div>

        <div>

            <h1>
                Tambah User
            </h1>

            <p>
                Buat akun pengguna baru untuk aplikasi.
            </p>

        </div>

    </div>


    {{-- FORM CARD --}}

    <div class="user-form-card">

        <form
            action="/admin/users"
            method="POST"
            onsubmit="this.querySelector('button[type=submit]').disabled = true;"
        >

            @csrf


            {{-- INFORMASI USER --}}

            <div class="form-section">

                <h2 class="form-section-title">
                    👤 Informasi User
                </h2>

                <div class="form-grid">


                    {{-- NAMA --}}

                    <div class="form-group">

                        <label
                            for="nama"
                            class="form-label"
                        >
                            Nama Lengkap
                        </label>

                        <input
                            type="text"
                            id="nama"
                            name="nama"
                            value="{{ old('nama') }}"
                            placeholder="Contoh: Budi Santoso"
                            autocomplete="name"
                        >

                        @error('nama')

                            <p class="form-error">
                                ❌ {{ $message }}
                            </p>

                        @enderror

                    </div>


                    {{-- USERNAME --}}

                    <div class="form-group">

                        <label
                            for="username"
                            class="form-label"
                        >
                            Username
                        </label>

                        <input
                            type="text"
                            id="username"
                            name="username"
                            value="{{ old('username') }}"
                            placeholder="Contoh: budi123"
                            autocomplete="username"
                        >

                        @error('username')

                            <p class="form-error">
                                ❌ {{ $message }}
                            </p>

                        @enderror

                    </div>


                    {{-- EMAIL --}}

                    <div class="form-group">

                        <label
                            for="email"
                            class="form-label"
                        >
                            Email
                        </label>

                        <input
                            type="email"
                            id="email"
                            name="email"
                            value="{{ old('email') }}"
                            placeholder="Contoh: budi@example.com"
                            autocomplete="email"
                        >

                        @error('email')

                            <p class="form-error">
                                ❌ {{ $message }}
                            </p>

                        @enderror

                    </div>


                    {{-- TANGGAL LAHIR --}}

                    <div class="form-group">

                        <label
                            for="tanggal_lahir"
                            class="form-label"
                        >
                            Tanggal Lahir
                        </label>

                        <input
                            type="date"
                            id="tanggal_lahir"
                            name="tanggal_lahir"
                            value="{{ old('tanggal_lahir') }}"
                        >

                        @error('tanggal_lahir')

                            <p class="form-error">
                                ❌ {{ $message }}
                            </p>

                        @enderror

                    </div>

                </div>

            </div>


            {{-- KEAMANAN --}}

            <div class="form-section">

                <h2 class="form-section-title">
                    🔐 Keamanan Akun
                </h2>

                <div class="form-grid">


                    {{-- PASSWORD --}}

                    <div class="form-group">

                        <label
                            for="password"
                            class="form-label"
                        >
                            Password
                        </label>

                        <input
                            type="password"
                            id="password"
                            name="password"
                            placeholder="Minimal 6 karakter"
                            autocomplete="new-password"
                        >

                        <p class="form-help">
                            Password minimal 6 karakter.
                        </p>

                        @error('password')

                            <p class="form-error">
                                ❌ {{ $message }}
                            </p>

                        @enderror

                    </div>


                    {{-- KONFIRMASI PASSWORD --}}

                    <div class="form-group">

                        <label
                            for="password_confirmation"
                            class="form-label"
                        >
                            Konfirmasi Password
                        </label>

                        <input
                            type="password"
                            id="password_confirmation"
                            name="password_confirmation"
                            placeholder="Ulangi password"
                            autocomplete="new-password"
                        >

                    </div>

                </div>

            </div>


            {{-- ROLE --}}

            <div class="form-section">

                <h2 class="form-section-title">
                    🛡️ Hak Akses
                </h2>

                <div class="form-group">

                    <label
                        for="role"
                        class="form-label"
                    >
                        Role User
                    </label>

                    <select
                        id="role"
                        name="role"
                    >

                        <option value="">
                            -- Pilih Role --
                        </option>

                        <option
                            value="user"
                            {{ old('role') == 'user' ? 'selected' : '' }}
                        >
                            👤 User
                        </option>

                        <option
                            value="admin"
                            {{ old('role') == 'admin' ? 'selected' : '' }}
                        >
                            🛡️ Admin
                        </option>

                    </select>

                    <p class="form-help">
                        Admin dapat mengakses dashboard dan mengelola data aplikasi.
                    </p>

                    @error('role')

                        <p class="form-error">
                            ❌ {{ $message }}
                        </p>

                    @enderror

                </div>

            </div>


            {{-- BUTTON --}}

            <div class="form-buttons">

                <button
                    type="submit"
                    class="save-user-button"
                >
                    💾 Simpan User
                </button>

                <a
                    href="/admin/users"
                    class="cancel-user-button"
                >
                    ← Kembali
                </a>

            </div>

        </form>

    </div>

@endsection