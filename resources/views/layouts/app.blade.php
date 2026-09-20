<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        @yield('title', 'Belajar Laravel')
    </title>

    <style>

        /* ================================
           RESET
        ================================= */

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }


        /* ================================
           BODY
        ================================= */

        body {
            font-family:
                Inter,
                -apple-system,
                BlinkMacSystemFont,
                "Segoe UI",
                Arial,
                sans-serif;

            background:
                linear-gradient(
                    135deg,
                    #f8fafc 0%,
                    #eef2ff 100%
                );

            color: #1e293b;

            min-height: 100vh;

            line-height: 1.6;
        }


        /* ================================
           NAVBAR
        ================================= */

        .navbar {
            position: sticky;
            top: 0;
            z-index: 1000;

            background: rgba(15, 23, 42, 0.95);

            backdrop-filter: blur(14px);

            border-bottom:
                1px solid rgba(255, 255, 255, 0.08);

            box-shadow:
                0 8px 30px rgba(15, 23, 42, 0.12);
        }


        .navbar-container {
            max-width: 1200px;

            margin: auto;

            padding: 16px 24px;

            display: flex;

            align-items: center;

            justify-content: space-between;

            gap: 25px;
        }


        /* ================================
           BRAND
        ================================= */

        .navbar-brand {
            color: white;

            text-decoration: none;

            font-size: 21px;

            font-weight: 800;

            letter-spacing: -0.5px;

            display: flex;

            align-items: center;

            gap: 9px;

            white-space: nowrap;

            transition: 0.25s;
        }


        .navbar-brand:hover {
            transform: translateY(-1px);

            opacity: 0.9;
        }


        .brand-icon {
            width: 38px;
            height: 38px;

            display: flex;

            align-items: center;
            justify-content: center;

            border-radius: 11px;

            background:
                linear-gradient(
                    135deg,
                    #6366f1,
                    #8b5cf6
                );

            box-shadow:
                0 5px 18px rgba(99, 102, 241, 0.4);

            font-size: 19px;
        }


        /* ================================
           MENU
        ================================= */

        .navbar-menu {
            display: flex;

            align-items: center;

            gap: 8px;

            flex-wrap: wrap;
        }


        .navbar-menu a {
            color: #cbd5e1;

            text-decoration: none;

            padding: 9px 13px;

            border-radius: 9px;

            font-size: 14px;

            font-weight: 600;

            transition: all 0.25s ease;
        }


        .navbar-menu a:hover {
            color: white;

            background:
                rgba(255, 255, 255, 0.09);

            transform: translateY(-1px);
        }


        /* ================================
           USER
        ================================= */

        .navbar-user {
            display: flex;

            align-items: center;

            gap: 8px;

            color: white;

            background:
                rgba(255, 255, 255, 0.08);

            border:
                1px solid rgba(255, 255, 255, 0.08);

            padding: 8px 13px;

            border-radius: 10px;

            font-size: 13px;

            font-weight: 600;

            margin-left: 4px;
        }


        .user-avatar {
            width: 27px;
            height: 27px;

            border-radius: 50%;

            display: flex;

            align-items: center;
            justify-content: center;

            background:
                linear-gradient(
                    135deg,
                    #6366f1,
                    #8b5cf6
                );

            font-size: 13px;
        }


        /* ================================
           LOGOUT
        ================================= */

        .logout-button {
            border: none;

            color: #fecaca;

            background:
                rgba(239, 68, 68, 0.12);

            padding: 9px 14px;

            border-radius: 9px;

            cursor: pointer;

            font-size: 13px;

            font-weight: 700;

            transition: 0.25s;
        }


        .logout-button:hover {
            background:
                rgba(239, 68, 68, 0.22);

            color: white;

            transform: translateY(-1px);
        }


        /* ================================
           MAIN CONTAINER
        ================================= */

        .container {
            width: calc(100% - 32px);

            max-width: 1200px;

            margin: 35px auto 60px;

            background: rgba(255, 255, 255, 0.94);

            padding: 38px;

            border-radius: 20px;

            border:
                1px solid rgba(226, 232, 240, 0.9);

            box-shadow:
                0 15px 45px rgba(15, 23, 42, 0.08);
        }


        /* ================================
           HEADING
        ================================= */

        h1 {
            font-size: 32px;

            line-height: 1.2;

            margin-bottom: 12px;

            color: #0f172a;

            letter-spacing: -0.8px;
        }


        h2 {
            font-size: 21px;

            margin-top: 25px;

            margin-bottom: 14px;

            color: #1e293b;
        }


        h3 {
            margin-bottom: 10px;

            color: #334155;
        }


        p {
            margin-bottom: 10px;

            color: #475569;
        }


        hr {
            border: none;

            height: 1px;

            background: #e2e8f0;

            margin: 25px 0;
        }


        /* ================================
           LINK
        ================================= */

        a {
            color: #4f46e5;

            transition: 0.2s;
        }


        a:hover {
            color: #3730a3;
        }


        /* ================================
           BUTTON
        ================================= */

        button {
            border: none;

            padding: 10px 16px;

            border-radius: 9px;

            cursor: pointer;

            background:
                linear-gradient(
                    135deg,
                    #4f46e5,
                    #6366f1
                );

            color: white;

            font-size: 14px;

            font-weight: 700;

            box-shadow:
                0 5px 14px rgba(79, 70, 229, 0.2);

            transition:
                transform 0.2s,
                box-shadow 0.2s,
                opacity 0.2s;
        }


        button:hover {
            transform: translateY(-2px);

            box-shadow:
                0 8px 20px rgba(79, 70, 229, 0.3);
        }


        button:active {
            transform: translateY(0);
        }


        button:disabled {
            opacity: 0.6;

            cursor: not-allowed;

            transform: none;
        }


        /* ================================
           INPUT
        ================================= */

        input,
        textarea,
        select {
            width: 100%;

            max-width: 500px;

            padding: 12px 14px;

            border:
                1px solid #cbd5e1;

            border-radius: 9px;

            background: white;

            color: #1e293b;

            font-family: inherit;

            font-size: 14px;

            outline: none;

            transition:
                border-color 0.2s,
                box-shadow 0.2s;
        }


        input:focus,
        textarea:focus,
        select:focus {
            border-color: #6366f1;

            box-shadow:
                0 0 0 4px rgba(99, 102, 241, 0.12);
        }


        textarea {
            min-height: 120px;

            resize: vertical;
        }


        input[type="file"] {
            padding: 9px;

            cursor: pointer;

            background: #f8fafc;
        }


        /* ================================
           LABEL
        ================================= */

        label {
            display: inline-block;

            margin-bottom: 7px;

            color: #334155;

            font-size: 14px;

            font-weight: 700;
        }


        /* ================================
           TABLE
        ================================= */

        table {
            width: 100%;

            border-collapse: separate;

            border-spacing: 0;

            overflow: hidden;

            border:
                1px solid #e2e8f0;

            border-radius: 12px;

            background: white;

            margin-top: 20px;
        }


        th {
            background: #f8fafc;

            color: #334155;

            font-size: 13px;

            font-weight: 800;

            text-transform: uppercase;

            letter-spacing: 0.4px;

            text-align: left;
        }


        th,
        td {
            padding: 14px;

            border-bottom:
                1px solid #e2e8f0;

            vertical-align: middle;
        }


        tbody tr {
            transition: 0.2s;
        }


        tbody tr:hover {
            background: #f8fafc;
        }


        tbody tr:last-child td {
            border-bottom: none;
        }


        /* ================================
           IMAGE
        ================================= */

        img {
            max-width: 100%;

            border-radius: 10px;
        }


        /* ================================
           PRODUCT IMAGE
        ================================= */

        .product-image {
            width: 90px;

            height: 90px;

            object-fit: cover;

            border-radius: 10px;

            border:
                1px solid #e2e8f0;

            background: #f8fafc;

            transition: 0.25s;
        }


        .product-image:hover {
            transform: scale(1.04);

            box-shadow:
                0 8px 20px rgba(15, 23, 42, 0.12);
        }


        /* ================================
           SUCCESS
        ================================= */

        .success {
            color: #166534;

            background: #f0fdf4;

            border:
                1px solid #bbf7d0;

            padding: 13px 16px;

            border-radius: 10px;

            margin: 18px 0;

            font-weight: 600;
        }


        /* ================================
           ERROR
        ================================= */

        .error {
            color: #dc2626;

            background: #fef2f2;

            border:
                1px solid #fecaca;

            padding: 9px 12px;

            border-radius: 8px;

            margin-top: 7px;

            font-size: 13px;

            font-weight: 600;
        }


        /* ================================
           BADGE
        ================================= */

        .badge {
            display: inline-block;

            padding: 5px 10px;

            border-radius: 999px;

            font-size: 12px;

            font-weight: 800;
        }


        .badge-admin {
            color: #5b21b6;

            background: #f3e8ff;
        }


        .badge-user {
            color: #1d4ed8;

            background: #dbeafe;
        }


        /* ================================
           CARD
        ================================= */

        .card {
            background: white;

            border:
                1px solid #e2e8f0;

            border-radius: 14px;

            padding: 22px;

            box-shadow:
                0 6px 20px rgba(15, 23, 42, 0.05);

            transition: 0.25s;
        }


        .card:hover {
            transform: translateY(-2px);

            box-shadow:
                0 12px 30px rgba(15, 23, 42, 0.08);
        }


        /* ================================
           MOBILE
        ================================= */

        @media (max-width: 768px) {

            .navbar-container {
                padding: 13px 16px;

                flex-direction: column;

                align-items: stretch;

                gap: 12px;
            }


            .navbar-brand {
                justify-content: center;
            }


            .navbar-menu {
                justify-content: center;
            }


            .container {
                width: calc(100% - 20px);

                margin: 20px auto 40px;

                padding: 22px;

                border-radius: 15px;
            }


            h1 {
                font-size: 26px;
            }


            h2 {
                font-size: 19px;
            }


            table {
                display: block;

                overflow-x: auto;

                white-space: nowrap;
            }


            input,
            textarea,
            select {
                max-width: 100%;
            }

        }


        /* ================================
           SMALL MOBILE
        ================================= */

        @media (max-width: 480px) {

            .navbar-menu {
                gap: 4px;
            }


            .navbar-menu a,
            .logout-button {
                padding: 8px 10px;

                font-size: 12px;
            }


            .navbar-user {
                padding: 7px 10px;

                font-size: 12px;
            }


            .container {
                padding: 18px;
            }

        }

    </style>

</head>


<body>


    {{-- ================================
         NAVBAR
    ================================= --}}

    <nav class="navbar">

        <div class="navbar-container">


            {{-- BRAND --}}

            <a
                href="{{ Auth::check() ? '/home' : '/login' }}"
                class="navbar-brand"
            >

                <span class="brand-icon">
                    🚀
                </span>

                <span>
                    Belajar Laravel
                </span>

            </a>


            {{-- MENU --}}

            <div class="navbar-menu">


                @if (Auth::check())


                    <a href="/home">
                        🏠 Home
                    </a>


                    @if (Auth::user()->isAdmin())

                        <a href="/admin">
                            🔐 Admin
                        </a>

                    @endif


                    <span class="navbar-user">

                        <span class="user-avatar">
                            👤
                        </span>

                        {{ Auth::user()->nama }}

                    </span>


                    <form
                        action="/logout"
                        method="POST"
                        style="display: inline;"
                    >

                        @csrf

                        <button
                            type="submit"
                            class="logout-button"
                        >
                            Logout
                        </button>

                    </form>


                @else


                    <a href="/login">
                        🔑 Login
                    </a>


                    <a href="/register">
                        📝 Register
                    </a>


                @endif


            </div>

        </div>

    </nav>


    {{-- ================================
         MAIN CONTENT
    ================================= --}}

    <main class="container">

        @yield('content')

    </main>


</body>

</html>