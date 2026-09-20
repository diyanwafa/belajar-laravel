@extends('layouts.app')

@section('title', 'Edit User')

@section('content')

    <style>

        .edit-user-header {
            display: flex;
            align-items: center;
            gap: 18px;
            margin-bottom: 25px;
        }

        .edit-user-icon {
            width: 60px;
            height: 60px;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 16px;

            background:
                linear-gradient(
                    135deg,
                    #f59e0b,
                    #ea580c
                );

            color: white;

            font-size: 28px;

            box-shadow:
                0 10px 25px
                rgba(245, 158, 11, 0.22);
        }

        .edit-user-header h1 {
            margin: 0 0 5px 0;
        }

        .edit-user-header p {
            margin: 0;

            color: #64748b;
        }


        /* ================================
           FORM CARD
        ================================= */

        .edit-user-card {
            background: white;

            border:
                1px solid #e2e8f0;

            border-radius: 16px;

            padding: 25px;

            box-shadow:
                0 6px 20px
                rgba(15, 23, 42, 0.05);
        }


        /* ================================
           SECTION
        ================================= */

        .edit-form-section {
            margin-bottom: 25px;
        }

        .edit-form-title {
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


        /* ================================
           GRID
        ================================= */

        .edit-form-grid {
            display: grid;

            grid-template-columns:
                repeat(2, minmax(0, 1fr));

            gap: 20px;
        }


        /* ================================
           FORM GROUP
        ================================= */

        .edit-form-group {
            margin-bottom: 20px;
        }

        .edit-form-label {
            display: block;

            margin-bottom: 7px;

            color: #334155;

            font-weight: 700;

            font-size: 14px;
        }


        /* ================================
           INPUT
        ================================= */

        .edit-user-card input,
        .edit-user-card select {
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

        .edit-user-card input:focus,
        .edit-user-card select:focus {
            border-color: #6366f1;

            box-shadow:
                0 0 0 3px
                rgba(99, 102, 241, 0.12);
        }


        /* ================================
           HELP TEXT
        ================================= */

        .edit-form-help {
            margin: 6px 0 0 0;

            color: #94a3b8;

            font-size: 12px;
        }


        /* ================================
           ERROR
        ================================= */

        .edit-form-error {
            margin: 7px 0 0 0;

            color: #dc2626;

            font-size: 13px;

            font-weight: 600;
        }


        /* ================================
           SUCCESS / ERROR SUMMARY
        ================================= */

        .edit-error-box {
            margin-bottom: 20px;

            padding: 14px 16px;

            border:
                1px solid #fecaca;

            border-radius: 10px;

            background: #fef2f2;

            color: #991b1b;
        }

        .edit-error-box p {
            margin: 4px 0;
        }


        /* ================================
           USER INFO
        ================================= */

        .current-user-info {
            display: flex;

            align-items: center;

            gap: 12px;

            margin-bottom: 25px;

            padding: 15px;

            border:
                1px solid #e2e8f0;

            border-radius: 12px;

            background: #f8fafc;
        }

        .current-user-avatar {
            width: 45px;
            height: 45px;

            display: flex;

            align-items: center;

            justify-content: center;

            border-radius: 50%;

            background:
                linear-gradient(
                    135deg,
                    #6366f1,
                    #8b5cf6
                );

            color: white;

            font-size: 18px;

            font-weight: 700;
        }

        .current-user-name {
            font-weight: 800;

            color: #0f172a;
        }

        .current-user-id {
            color: #94a3b8;

            font-size: 12px;
        }


        /* ================================
           BUTTON
        ================================= */

        .edit-form-buttons {
            display: flex;

            align-items: center;

            gap: 10px;

            padding-top: 5px;
        }

        .update-user-button {
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

        .update-user-button:hover {
            transform: translateY(-1px);
        }

        .back-user-button {
            display: inline-block;

            background: #f1f5f9;

            color: #334155;

            padding: 11px 18px;

            border-radius: 8px;

            font-weight: 700;

            text-decoration: none;
        }

        .back-user-button:hover {
            background: #e2e8f0;
        }


        /* ================================
           RESPONSIVE
        ================================= */

        @media (max-width: 700px) {

            .edit-form-grid {
                grid-template-columns: 1fr;
            }

            .edit-user-header {
                align-items: flex-start;
            }

            .edit-user-icon {
                width: 52px;
                height: 52px;

                font-size: 24px;
            }

            .edit-user-card {
                padding: 18px;
            }

            .edit-form-buttons {
                flex-direction: column;

                align-items: stretch;
            }

            .update-user-button,
            .back-user-button {
                width: 100%;

                text-align: center;
            }

        }

    </style>


    {{-- HEADER --}}

    <div class="edit-user-header">

        <div class="edit-user-icon">
            ✏️
        </div>

        <div>

            <h1>
                Edit User
            </h1>

            <p>
                Perbarui informasi akun pengguna.
            </p>

        </div>

    </div>


    {{-- USER YANG SEDANG DIEDIT --}}

    <div class="current-user-info">

        <div class="current-user-avatar">

            {{ strtoupper(
                substr(
                    $user->nama,
                    0,
                    1
                )
            ) }}

        </div>

        <div>

            <div class="current-user-name">
                {{ $user->nama }}
            </div>

            <div class="current-user-id">
                ID #{{ $user->id }}
            </div>

        </div>

    </div>


    {{-- ERROR SUMMARY --}}

    @if ($errors->any())

        <div class="edit-error-box">

            <strong>
                ❌ Terdapat kesalahan:
            </strong>

            @foreach ($errors->all() as $error)

                <p>
                    • {{ $error }}
                </p>

            @endforeach

        </div>

    @endif


    {{-- FORM --}}

    <div class="edit-user-card">

        <form
            action="/admin/users/{{ $user->id }}"
            method="POST"
            onsubmit="this.querySelector('button[type=submit]').disabled = true;"
        >

            @csrf

            @method('PUT')


            {{-- INFORMASI USER --}}

            <div class="edit-form-section">

                <h2 class="edit-form-title">
                    👤 Informasi User
                </h2>

                <div class="edit-form-grid">


                    {{-- NAMA --}}

                    <div class="edit-form-group">

                        <label
                            for="nama"
                            class="edit-form-label"
                        >
                            Nama Lengkap
                        </label>

                        <input
                            type="text"
                            id="nama"
                            name="nama"
                            value="{{ old('nama', $user->nama) }}"
                            placeholder="Contoh: Budi Santoso"
                            autocomplete="name"
                        >

                        @error('nama')

                            <p class="edit-form-error">
                                ❌ {{ $message }}
                            </p>

                        @enderror

                    </div>


                    {{-- USERNAME --}}

                    <div class="edit-form-group">

                        <label
                            for="username"
                            class="edit-form-label"
                        >
                            Username
                        </label>

                        <input
                            type="text"
                            id="username"
                            name="username"
                            value="{{ old('username', $user->username) }}"
                            placeholder="Contoh: budi123"
                            autocomplete="username"
                        >

                        @error('username')

                            <p class="edit-form-error">
                                ❌ {{ $message }}
                            </p>

                        @enderror

                    </div>


                    {{-- EMAIL --}}

                    <div class="edit-form-group">

                        <label
                            for="email"
                            class="edit-form-label"
                        >
                            Email
                        </label>

                        <input
                            type="email"
                            id="email"
                            name="email"
                            value="{{ old('email', $user->email) }}"
                            placeholder="Contoh: budi@example.com"
                            autocomplete="email"
                        >

                        @error('email')

                            <p class="edit-form-error">
                                ❌ {{ $message }}
                            </p>

                        @enderror

                    </div>


                    {{-- TANGGAL LAHIR --}}

                    <div class="edit-form-group">

                        <label
                            for="tanggal_lahir"
                            class="edit-form-label"
                        >
                            Tanggal Lahir
                        </label>

                        <input
                            type="date"
                            id="tanggal_lahir"
                            name="tanggal_lahir"
                            value="{{ old('tanggal_lahir', $user->tanggal_lahir) }}"
                        >

                        @error('tanggal_lahir')

                            <p class="edit-form-error">
                                ❌ {{ $message }}
                            </p>

                        @enderror

                    </div>

                </div>

            </div>


            {{-- PASSWORD --}}

            <div class="edit-form-section">

                <h2 class="edit-form-title">
                    🔐 Keamanan Akun
                </h2>

                <div class="edit-form-grid">


                    {{-- PASSWORD BARU --}}

                    <div class="edit-form-group">

                        <label
                            for="password"
                            class="edit-form-label"
                        >
                            Password Baru
                        </label>

                        <input
                            type="password"
                            id="password"
                            name="password"
                            placeholder="Kosongkan jika tidak ingin mengubah"
                            autocomplete="new-password"
                        >

                        <p class="edit-form-help">
                            Kosongkan jika password tidak ingin diubah.
                        </p>

                        @error('password')

                            <p class="edit-form-error">
                                ❌ {{ $message }}
                            </p>

                        @enderror

                    </div>


                    {{-- KONFIRMASI PASSWORD --}}

                    <div class="edit-form-group">

                        <label
                            for="password_confirmation"
                            class="edit-form-label"
                        >
                            Konfirmasi Password
                        </label>

                        <input
                            type="password"
                            id="password_confirmation"
                            name="password_confirmation"
                            placeholder="Ulangi password baru"
                            autocomplete="new-password"
                        >

                    </div>

                </div>

            </div>


            {{-- ROLE --}}

            <div class="edit-form-section">

                <h2 class="edit-form-title">
                    🛡️ Hak Akses
                </h2>

                <div class="edit-form-group">

                    <label
                        for="role"
                        class="edit-form-label"
                    >
                        Role User
                    </label>

                    <select
                        id="role"
                        name="role"
                    >

                        <option
                            value="user"
                            {{ old('role', $user->role) == 'user' ? 'selected' : '' }}
                        >
                            👤 User
                        </option>

                        <option
                            value="admin"
                            {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}
                        >
                            🛡️ Admin
                        </option>

                    </select>

                    <p class="edit-form-help">
                        Admin dapat mengakses dashboard dan mengelola data aplikasi.
                    </p>

                    @error('role')

                        <p class="edit-form-error">
                            ❌ {{ $message }}
                        </p>

                    @enderror

                </div>

            </div>


            {{-- BUTTON --}}

            <div class="edit-form-buttons">

                <button
                    type="submit"
                    class="update-user-button"
                >
                    💾 Update User
                </button>

                <a
                    href="/admin/users"
                    class="back-user-button"
                >
                    ← Kembali
                </a>

            </div>

        </form>

    </div>

@endsection