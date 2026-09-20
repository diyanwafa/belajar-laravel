@extends('layouts.app')

@section('title', 'Kelola User')

@section('content')

    <style>

        .users-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
            margin-bottom: 25px;
        }

        .users-header h1 {
            margin-bottom: 5px;
        }

        .users-header p {
            margin: 0;
            color: #64748b;
        }

        .users-header-icon {
            width: 65px;
            height: 65px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 16px;
            background:
                linear-gradient(
                    135deg,
                    #4f46e5,
                    #7c3aed
                );
            color: white;
            font-size: 30px;
            box-shadow:
                0 10px 25px
                rgba(79, 70, 229, 0.22);
        }

        .user-success {
            color: #166534;
            background: #f0fdf4;
            border: 1px solid #bbf7d0;
            padding: 13px 16px;
            border-radius: 10px;
            margin-bottom: 20px;
            font-weight: 600;
        }

        .user-error {
            color: #991b1b;
            background: #fef2f2;
            border: 1px solid #fecaca;
            padding: 13px 16px;
            border-radius: 10px;
            margin-bottom: 20px;
            font-weight: 600;
        }

        .users-toolbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 15px;
            margin-bottom: 18px;
            padding: 18px;
            background: white;
            border: 1px solid #e2e8f0;
            border-radius: 14px;
            box-shadow:
                0 5px 18px
                rgba(15, 23, 42, 0.04);
        }

        .users-total {
            color: #64748b;
            font-size: 14px;
        }

        .users-total strong {
            color: #0f172a;
            font-size: 18px;
        }

        .users-table-wrapper {
            overflow-x: auto;
            background: white;
            border: 1px solid #e2e8f0;
            border-radius: 14px;
            box-shadow:
                0 6px 20px
                rgba(15, 23, 42, 0.05);
        }

        .users-table {
            width: 100%;
            min-width: 900px;
            border: none;
            border-radius: 0;
            margin: 0;
        }

        .users-table th {
            background: #f8fafc;
            padding: 14px 16px;
            color: #334155;
            border-bottom: 1px solid #e2e8f0;
            text-align: left;
        }

        .users-table td {
            padding: 15px 16px;
            border-bottom: 1px solid #f1f5f9;
        }

        .users-table tbody tr {
            transition: 0.2s;
        }

        .users-table tbody tr:hover {
            background: #f8fafc;
        }

        .users-table tbody tr:last-child td {
            border-bottom: none;
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .user-avatar-table {
            width: 40px;
            height: 40px;
            flex-shrink: 0;
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
            font-size: 17px;
            font-weight: 700;
        }

        .user-name {
            font-weight: 800;
            color: #0f172a;
        }

        .user-id {
            color: #94a3b8;
            font-size: 12px;
        }

        .username-text {
            font-weight: 600;
            color: #475569;
        }

        .email-text {
            color: #475569;
            font-size: 13px;
        }

        .email-empty {
            color: #94a3b8;
            font-size: 13px;
            font-style: italic;
        }

        .date-text {
            color: #475569;
            font-size: 13px;
        }

        .date-empty {
            color: #94a3b8;
            font-size: 13px;
            font-style: italic;
        }

        .role-badge {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            padding: 6px 10px;
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

        .user-actions {
            display: flex;
            align-items: center;
            gap: 6px;
            flex-wrap: wrap;
        }

        .user-actions a {
            text-decoration: none;
        }

        .user-actions button {
            padding: 8px 11px;
            font-size: 12px;
        }

        .edit-button {
            background:
                linear-gradient(
                    135deg,
                    #4f46e5,
                    #6366f1
                );
        }

        .delete-button {
            background:
                linear-gradient(
                    135deg,
                    #ef4444,
                    #dc2626
                );

            box-shadow:
                0 5px 14px
                rgba(239, 68, 68, 0.16);
        }

        .delete-button:hover {
            box-shadow:
                0 8px 20px
                rgba(239, 68, 68, 0.25);
        }

        .users-empty {
            text-align: center;
            padding: 60px 20px;
            background: white;
            border: 1px dashed #cbd5e1;
            border-radius: 14px;
        }

        .users-empty-icon {
            font-size: 45px;
            margin-bottom: 10px;
        }

        .users-empty h3 {
            margin-bottom: 7px;
        }

        .users-empty p {
            margin-bottom: 18px;
        }

        .users-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            margin-top: 22px;
        }

        .back-button {
            background: #f1f5f9;
            color: #334155;
            box-shadow: none;
        }

        .back-button:hover {
            background: #e2e8f0;
            color: #0f172a;
            box-shadow: none;
        }

        @media (max-width: 700px) {

            .users-header {
                align-items: flex-start;
            }

            .users-header-icon {
                width: 55px;
                height: 55px;
                font-size: 25px;
            }

            .users-toolbar {
                align-items: flex-start;
                flex-direction: column;
            }

            .users-footer {
                align-items: stretch;
                flex-direction: column;
            }

        }

    </style>


    {{-- HEADER --}}

    <div class="users-header">

        <div>

            <h1>
                👥 Kelola User
            </h1>

            <p>
                Kelola seluruh akun pengguna aplikasi.
            </p>

        </div>

        <div class="users-header-icon">
            👥
        </div>

    </div>


    {{-- PESAN SUCCESS --}}

    @if (session('success'))

        <div class="user-success">

            ✅ {{ session('success') }}

        </div>

    @endif


    {{-- PESAN ERROR --}}

    @if (session('error'))

        <div class="user-error">

            ❌ {{ session('error') }}

        </div>

    @endif


    {{-- TOOLBAR --}}

    <div class="users-toolbar">

        <div class="users-total">

            Total pengguna:

            <strong>
                {{ $users->count() }}
            </strong>

        </div>

        <a href="/admin/users/create">

            <button type="button">
                + Tambah User
            </button>

        </a>

    </div>


    {{-- DAFTAR USER --}}

    @if ($users->count() > 0)

        <div class="users-table-wrapper">

            <table class="users-table">

                <thead>

                    <tr>

                        <th>
                            No
                        </th>

                        <th>
                            User
                        </th>

                        <th>
                            Username
                        </th>

                        <th>
                            Email
                        </th>

                        <th>
                            Tanggal Lahir
                        </th>

                        <th>
                            Role
                        </th>

                        <th>
                            Aksi
                        </th>

                    </tr>

                </thead>

                <tbody>

                    @foreach ($users as $user)

                        <tr>

                            {{-- NOMOR --}}

                            <td>
                                {{ $loop->iteration }}
                            </td>


                            {{-- USER --}}

                            <td>

                                <div class="user-info">

                                    <div class="user-avatar-table">

                                        {{ strtoupper(
                                            substr(
                                                $user->nama,
                                                0,
                                                1
                                            )
                                        ) }}

                                    </div>

                                    <div>

                                        <div class="user-name">
                                            {{ $user->nama }}
                                        </div>

                                        <div class="user-id">
                                            ID #{{ $user->id }}
                                        </div>

                                    </div>

                                </div>

                            </td>


                            {{-- USERNAME --}}

                            <td>

                                <span class="username-text">
                                    {{ $user->username }}
                                </span>

                            </td>


                            {{-- EMAIL --}}

                            <td>

                                @if ($user->email)

                                    <span class="email-text">
                                        {{ $user->email }}
                                    </span>

                                @else

                                    <span class="email-empty">
                                        Belum diisi
                                    </span>

                                @endif

                            </td>


                            {{-- TANGGAL LAHIR --}}

                            <td>

                                @if ($user->tanggal_lahir)

                                    <span class="date-text">

                                        {{ date(
                                            'd M Y',
                                            strtotime(
                                                $user->tanggal_lahir
                                            )
                                        ) }}

                                    </span>

                                @else

                                    <span class="date-empty">
                                        Belum diisi
                                    </span>

                                @endif

                            </td>


                            {{-- ROLE --}}

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


                            {{-- AKSI --}}

                            <td>

                                <div class="user-actions">

                                    <a
                                        href="/admin/users/{{ $user->id }}/edit"
                                    >

                                        <button
                                            type="button"
                                            class="edit-button"
                                        >
                                            ✏️ Edit
                                        </button>

                                    </a>


                                    <form
                                        action="/admin/users/{{ $user->id }}"
                                        method="POST"
                                        style="display: inline;"
                                    >

                                        @csrf

                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="delete-button"
                                            onclick="return confirm('Yakin ingin menghapus user {{ $user->nama }}?')"
                                        >
                                            🗑️ Hapus
                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                    @endforeach

                </tbody>

            </table>

        </div>

    @else

        {{-- EMPTY STATE --}}

        <div class="users-empty">

            <div class="users-empty-icon">
                👥
            </div>

            <h3>
                Belum ada user
            </h3>

            <p>
                Belum ada pengguna yang terdaftar.
            </p>

            <a href="/admin/users/create">

                <button type="button">
                    + Tambah User
                </button>

            </a>

        </div>

    @endif


    {{-- FOOTER --}}

    <div class="users-footer">

        <a href="/admin">

            <button
                type="button"
                class="back-button"
            >
                ← Kembali ke Dashboard
            </button>

        </a>

        <a href="/admin/users/create">

            <button type="button">
                + Tambah User
            </button>

        </a>

    </div>

@endsection