<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>{{ config('app.name', 'Laravel Music') }}</title>

    <style>
        * {
            box-sizing: border-box;
        }

        *:before,
        *:after {
            box-sizing: inherit;
        }

        html,
        body,
        div,
        span,
        applet,
        object,
        iframe,
        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        p,
        blockquote,
        pre,
        a,
        abbr,
        acronym,
        address,
        big,
        cite,
        code,
        del,
        dfn,
        em,
        img,
        ins,
        kbd,
        q,
        s,
        samp,
        small,
        strike,
        strong,
        sub,
        sup,
        tt,
        var,
        b,
        u,
        i,
        center,
        dl,
        dt,
        dd,
        ol,
        ul,
        li,
        fieldset,
        form,
        label,
        legend,
        table,
        caption,
        tbody,
        tfoot,
        thead,
        tr,
        th,
        td,
        article,
        aside,
        canvas,
        details,
        embed,
        figure,
        figcaption,
        footer,
        header,
        hgroup,
        menu,
        nav,
        output,
        ruby,
        section,
        summary,
        time,
        mark,
        audio,
        video {
            margin: 0;
            padding: 0;
            border: 0;
            vertical-align: baseline;
        }

        html,
        body {
            height: 100%;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        body {
            font-family: Inter, "Helvetica Neue", Arial, sans-serif;
            line-height: 1.5;
            background: #f7f7fb;
            color: #162029;
            -webkit-text-size-adjust: 100%;
            -moz-text-size-adjust: 100%;
            -ms-text-size-adjust: 100%;
        }

        img {
            max-width: 100%;
            display: block;
            height: auto;
        }

        a {
            color: inherit;
            text-decoration: none;
        }

        ul {
            list-style: none;
        }

        :root {
            --bg: #f7f7fb;
            --card: #ffffff;
            --muted: #6b7280;
            --accent: #1a73e8;
            --accent-2: #ff4c3b;
            --success: #16a34a;
            --danger: #ef4444;
            --glass: rgba(255, 255, 255, 0.6);
            --shadow-1: 0 6px 18px rgba(16, 24, 40, 0.06);
            --shadow-2: 0 10px 40px rgba(16, 24, 40, 0.10);
            --radius-sm: 8px;
            --radius-md: 12px;
            --radius-lg: 18px;
            --max-width: 1180px;
        }

        header {
            background: var(--card);
            box-shadow: var(--shadow-1);
            position: sticky;
            top: 0;
            z-index: 40;
        }

        header .nav-wrap {
            max-width: var(--max-width);
            margin: 0 auto;
            padding: 18px 24px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
        }

        header .brand {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        header .brand .logo {
            width: 44px;
            height: 44px;
            border-radius: 8px;
            background: linear-gradient(135deg, var(--accent), #0f62fe);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-weight: 700;
            font-size: 18px;
            box-shadow: var(--shadow-1);
        }

        header .brand .title {
            font-weight: 700;
            color: #0b1320;
            font-size: 18px;
        }

        header nav {
            display: flex;
            gap: 18px;
            align-items: center;
        }

        header nav a {
            color: #162029;
            padding: 8px 12px;
            border-radius: 8px;
            font-weight: 600;
            font-size: 15px;
        }

        header nav a:hover {
            background: rgba(26, 115, 232, 0.06);
            color: var(--accent);
            transform: translateY(-1px);
            transition: all 150ms ease;
        }

        .nav-actions {
            display: flex;
            gap: 12px;
            align-items: center;
        }

        .nav-actions .search {
            position: relative;
        }

        .nav-actions input[type="search"] {
            padding: 8px 12px;
            border-radius: 10px;
            border: 1px solid #e6e9ee;
            width: 220px;
            transition: box-shadow .15s ease, border-color .15s ease;
        }

        .nav-actions input[type="search"]:focus {
            outline: none;
            box-shadow: 0 6px 18px rgba(26, 115, 232, 0.08);
            border-color: var(--accent);
        }

        footer {
            margin-top: 40px;
            padding: 28px 20px;
            background: transparent;
            text-align: center;
            color: var(--muted);
        }

        .container {
            max-width: var(--max-width);
            margin: 0 auto;
            padding: 28px 20px;
        }

        h1,
        .h1 {
            font-size: 28px;
            line-height: 1.15;
            color: #0b1320;
            font-weight: 700;
            margin-bottom: 12px;
        }

        h2,
        .h2 {
            font-size: 20px;
            color: #0b1320;
            font-weight: 700;
            margin-bottom: 10px;
        }

        p.lead {
            color: var(--muted);
            font-size: 16px;
            margin-bottom: 18px;
        }

        .muted {
            color: var(--muted);
            font-size: 14px;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            justify-content: center;
            padding: 10px 14px;
            border-radius: 10px;
            border: none;
            cursor: pointer;
            font-weight: 600;
        }

        .btn-primary {
            background: var(--accent);
            color: #fff;
            box-shadow: 0 8px 30px rgba(26, 115, 232, 0.12);
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: var(--shadow-2);
        }

        .btn-ghost {
            background: transparent;
            border: 1px solid rgba(16, 24, 40, 0.06);
            color: #0b1320;
        }

        .btn-danger {
            background: var(--danger);
            color: #fff;
        }

        .btn-edit {
            background: #f9c74f;
            color: #162029;
        }

        .btn-info {
            background: #43aa8b;
            color: #fff;
        }

        .btn-small {
            padding: 6px 10px;
            font-size: 13px;
            border-radius: 8px;
        }

        .btn-link {
            background: none;
            color: var(--accent);
            padding: 6px;
            font-weight: 600;
        }

        .btn:active {
            transform: translateY(0);
        }

        .card {
            background: var(--card);
            border-radius: var(--radius-md);
            padding: 18px;
            box-shadow: var(--shadow-1);
        }

        .card-hero {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 18px;
            padding: 28px;
            border-radius: var(--radius-lg);
        }

        .card-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 18px;
        }

        .card .title {
            font-size: 16px;
            font-weight: 700;
            color: #0b1320;
        }

        .card p {
            color: var(--muted);
            font-size: 14px;
        }

        .badge {
            display: inline-block;
            padding: 6px 10px;
            border-radius: 999px;
            background: rgba(16, 24, 40, 0.06);
            color: #0b1320;
            font-weight: 600;
            font-size: 13px;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            background: var(--card);
            border-radius: 12px;
            overflow: hidden;
            box-shadow: var(--shadow-1);
        }

        .table thead {
            background: linear-gradient(90deg, rgba(26, 115, 232, 0.06), rgba(26, 115, 232, 0.03));
        }

        .table th,
        .table td {
            padding: 14px 18px;
            text-align: left;
            font-size: 14px;
            border-bottom: 1px solid rgba(16, 24, 40, 0.04);
        }

        .table th {
            font-weight: 700;
            color: #0b1320;
        }

        .table tr:hover td {
            background: rgba(16, 24, 40, 0.02);
        }

        .table .actions {
            display: flex;
            gap: 8px;
            align-items: center;
        }

        .table .avatar {
            width: 44px;
            height: 44px;
            border-radius: 8px;
            overflow: hidden;
            display: inline-block;
            background: linear-gradient(135deg, #f59e0b, #ef4444);
            color: #fff;
            text-align: center;
            line-height: 44px;
            font-weight: 700;
        }

        label {
            display: block;
            font-weight: 600;
            color: #0b1320;
            margin-bottom: 6px;
            font-size: 14px;
        }

        .field {
            margin-bottom: 14px;
        }

        input[type="text"],
        input[type="number"],
        input[type="search"],
        input[type="email"],
        input[type="password"],
        select,
        textarea {
            width: 100%;
            padding: 12px 14px;
            border-radius: 10px;
            border: 1px solid rgba(16, 24, 40, 0.06);
            font-size: 14px;
            background: #fff;
        }

        textarea {
            min-height: 110px;
            resize: vertical;
        }

        input:focus,
        select:focus,
        textarea:focus {
            outline: none;
            box-shadow: 0 8px 30px rgba(26, 115, 232, 0.06);
            border-color: var(--accent);
        }

        @media (max-width: 980px) {
            .card-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .nav-actions input[type="search"] {
                width: 140px;
            }
        }

        @media (max-width: 680px) {
            .card-grid {
                grid-template-columns: 1fr;
            }

            header .nav-wrap {
                padding: 14px;
            }

            header nav {
                display: none;
            }
        }

        .welcome {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: calc(100vh - 160px);
            padding: 48px 20px;
        }

        .welcome .hero {
            max-width: 920px;
            display: grid;
            grid-template-columns: 1fr 420px;
            gap: 28px;
            align-items: center;
        }

        .welcome h1 {
            font-size: 42px;
            line-height: 1.05;
            margin-bottom: 12px;
            color: #0b1320;
        }

        .welcome p {
            color: var(--muted);
            font-size: 18px;
            margin-bottom: 18px;
        }

        .welcome .hero-cta {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
        }

        .welcome .panel {
            background: linear-gradient(180deg, rgba(255, 255, 255, 0.9), rgba(250, 250, 255, 0.95));
            padding: 22px;
            border-radius: 16px;
            box-shadow: var(--shadow-2);
        }

        .welcome .mini-list {
            display: grid;
            gap: 12px;
        }

        .albums-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            margin-bottom: 14px;
        }

        .albums-header .actions {
            display: flex;
            gap: 8px;
            align-items: center;
        }

        .albums-list {
            margin-top: 20px;
        }

        .albums-list .table {
            width: 100%;
        }

        .songs-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            margin-bottom: 14px;
        }

        .songs-list .table {
            width: 100%;
        }

        .bands-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 18px;
        }

        .band-card {
            padding: 18px;
            border-radius: 12px;
            background: var(--card);
            box-shadow: var(--shadow-1);
            display: flex;
            gap: 12px;
            align-items: center;
        }

        .band-card .meta {
            flex: 1;
        }

        .band-card .meta h3 {
            font-size: 15px;
            margin-bottom: 6px;
        }

        .muted-sm {
            color: var(--muted);
            font-size: 13px;
        }

        .small {
            font-size: 13px;
        }

        .flex {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .grid-2 {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 12px;
        }

        .actions {
            display: flex;
            gap: 8px;
        }

        .fade {
            opacity: 0;
            transform: translateY(6px);
            animation: fadeIn 420ms ease forwards;
        }

        @keyframes fadeIn {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .float-up {
            transition: transform .28s ease, box-shadow .28s ease;
        }

        .float-up:hover {
            transform: translateY(-6px);
            box-shadow: var(--shadow-2);
        }

        .empty {
            text-align: center;
            padding: 40px 20px;
            background: linear-gradient(180deg, #fff, #fbfbff);
            border-radius: 12px;
            box-shadow: var(--shadow-1);
        }

        .empty h3 {
            font-size: 18px;
            margin-bottom: 8px;
            color: #0b1320;
        }

        .empty p {
            color: var(--muted);
        }

        .form-row {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 12px;
        }

        @media (max-width:900px) {
            .form-row {
                grid-template-columns: 1fr;
            }
        }

        .form-actions {
            display: flex;
            gap: 12px;
            margin-top: 10px;
        }

        .detail {
            display: grid;
            grid-template-columns: 360px 1fr;
            gap: 22px;
            align-items: start;
        }

        @media (max-width: 980px) {
            .detail {
                grid-template-columns: 1fr;
            }
        }

        .detail .cover {
            background: linear-gradient(135deg, #f3f4f6, #ffffff);
            border-radius: 14px;
            padding: 18px;
            height: 380px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .detail .meta {
            padding: 18px;
            background: var(--card);
            border-radius: 12px;
            box-shadow: var(--shadow-1);
        }

        .text-right {
            text-align: right;
        }

        .text-center {
            text-align: center;
        }

        .chip {
            display: inline-block;
            padding: 6px 12px;
            border-radius: 999px;
            background: rgba(16, 24, 40, 0.04);
            font-weight: 600;
        }

        .tooltip {
            position: relative;
            cursor: help;
        }

        .sr-only {
            position: absolute;
            width: 1px;
            height: 1px;
            padding: 0;
            margin: -1px;
            overflow: hidden;
            clip: rect(0, 0, 0, 0);
            border: 0;
        }

        a:focus,
        button:focus,
        input:focus,
        select:focus {
            outline: 3px solid rgba(26, 115, 232, 0.12);
            outline-offset: 2px;
        }

        .mt-8 {
            margin-top: 32px;
        }

        .mt-6 {
            margin-top: 24px;
        }

        .mt-4 {
            margin-top: 16px;
        }

        .mb-4 {
            margin-bottom: 16px;
        }

        .hide {
            display: none !important;
        }

        .show {
            display: block !important;
        }

        .mobile-nav {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, 0.45);
            z-index: 60;
            align-items: flex-end;
        }

        .mobile-panel {
            background: #fff;
            padding: 18px;
            border-radius: 12px 12px 0 0;
        }

        @media (max-width: 680px) {
            header .nav-wrap {
                padding: 12px;
            }

            header .brand .title {
                display: none;
            }

            .mobile-nav {
                display: flex;
            }

            header nav {
                display: none;
            }
        }

        @media (max-width: 480px) {
            .container {
                padding: 20px 12px;
            }

            h1 {
                font-size: 22px;
            }

            .card-grid {
                grid-template-columns: 1fr;
            }
        }

        .artists-list {
            display: grid;
            gap: 10px;
            grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
        }

        .artist-item {
            background: var(--card);
            padding: 14px;
            border-radius: 12px;
            box-shadow: var(--shadow-1);
            display: flex;
            gap: 12px;
            align-items: center;
        }

        .artist-item .info {
            display: flex;
            flex-direction: column;
        }

        .artist-item .info h4 {
            font-size: 15px;
            margin-bottom: 4px;
        }

        @media print {

            header,
            footer,
            .btn,
            .actions {
                display: none !important;
            }

            body {
                background: #fff;
                color: #000;
            }
        }

        .row {
            display: flex;
            gap: 12px;
            align-items: center;
        }

        .col {
            flex: 1;
        }

        .center {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .vstack {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .modal-backdrop {
            position: fixed;
            inset: 0;
            display: none;
            align-items: center;
            justify-content: center;
            background: rgba(2, 6, 23, 0.45);
            z-index: 120;
        }

        .modal {
            background: var(--card);
            width: 720px;
            max-width: 95%;
            border-radius: 12px;
            padding: 18px;
            box-shadow: var(--shadow-2);
        }

        .toast {
            position: fixed;
            right: 20px;
            bottom: 20px;
            background: #0b1320;
            color: #fff;
            padding: 12px 16px;
            border-radius: 8px;
            box-shadow: var(--shadow-2);
        }

        .smooth {
            transition: all .2s cubic-bezier(.2, .9, .3, 1);
        }

        .no-select {
            user-select: none;
            -webkit-user-select: none;
            -ms-user-select: none;
        }

        .role-nav {
            display: flex;
            gap: 12px;
            margin-bottom: 6px;
            border-bottom: 1px solid rgba(16, 24, 40, 0.06);
            padding-bottom: 6px;
        }


        .role-nav {
            position: sticky;
            top: 78px;
            background: var(--card);
            box-shadow: var(--shadow-1);
            display: flex;
            justify-content: center;
            gap: 12px;
            padding: 6px 16px;
            z-index: 50;
            height: 40px;
            align-items: center;
        }

        .role-nav a {
            font-size: 14px;
            font-weight: 600;
            color: #162029;
        }

        .role-nav a:hover {
            color: var(--accent);
        }



        @media (max-width: 680px) {
            .role-nav .container {
                flex-direction: column;
                gap: 4px;
                height: auto;
                line-height: normal;
            }
        }

        main.py-6 {
            padding: 32px 20px;
        }

        .admin-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .admin-section {
            margin-bottom: 50px;
        }

        .admin-section-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .admin-btn {
            background: #0066cc;
            padding: 8px 14px;
            color: #fff;
            text-decoration: none;
            border-radius: 6px;
            font-weight: bold;
        }

        .admin-btn:hover {
            background: #004a99;
        }

        .card-row {
            display: flex;
            gap: 15px;
            margin-top: 20px;
        }

        .admin-card {
            background: white;
            border-radius: 12px;
            padding: 15px;
            width: 20%;
            min-height: 120px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        }

        .admin-card h3 {
            margin-bottom: 5px;
        }

        .admin-card .date {
            font-size: 12px;
            color: #888;
        }

        .admin-tiles {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 25px;
            margin-bottom: 35px;
        }

        .admin-tile {
            background: #146af3;
            padding: 25px;
            border-radius: 12px;
            color: white;
            text-decoration: none;
            box-shadow: 0 0 10px #0005;
            transition: 0.2s ease;
        }

        .admin-tile:hover {
            background: var(--accent);
            transform: translateY(-5px);
        }

        .admin-tile h2 {
            color: white;
            margin: 0 0 8px 0;
        }

        .admin-tile p {
            margin: 0;
            opacity: 0.75;
        }

        /* ----- ACCORDEON SONGS ----- */
        .song-accordion {
            display: none;
            background: #f8f8f8;
        }

        .song-accordion.open {
            display: table-row;
        }

        .song-list {
            padding: 15px 20px;
            background: #ffffff;
            border: 1px solid #ddd;
            border-radius: 6px;
        }

        .song-list ul {
            margin: 0;
            padding-left: 20px;
        }

        .song-preview {
            cursor: pointer;
        }

        .album-row {
            cursor: pointer;
        }

        .album-row:hover {
            background: #f2f2f2;
        }

        .more-indicator {
            font-size: 0.85rem;
            color: #777;
            margin-left: 6px;
        }

        .search-result {
            margin: 15px 0;
            padding: 15px;
            border-radius: 8px;
            border: 1px solid #ddd;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 15px;
        }

        .btn {
            padding: 0.5rem 1rem;
            border-radius: 0.375rem;
            font-weight: 500;
            cursor: pointer;
        }

        .btn-primary {
            background-color: #6366f1;
            color: #fff;
        }

        .btn-secondary {
            background-color: #e5e7eb;
            color: #1f2937;
        }

        .btn-success {
            background-color: #28a745;
            color: #fff;
        }

        .btn-info {
            background-color: #0d6efd;
            color: #fff;
        }

        .toast {
            position: fixed;
            top: 25px;
            right: 25px;
            padding: 12px 18px;
            background: #333;
            color: #fff;
            border-radius: 8px;
            opacity: 0;
            pointer-events: none;
            transition: opacity 0.3s ease-out;
            z-index: 2000;
        }

        .toast.show {
            opacity: 1;
            pointer-events: auto;
        }
    </style>

</head>

<body>

    <header>
        <div class="nav-wrap">
            <div class="brand">
                <div onclick="window.location.href=`{{ route('welcome') }}`" class="logo">M</div>
                <div onclick="window.location.href=`{{ route('welcome') }}`" class="title">Music</div>
            </div>

            <nav>
                <a href="{{ route('welcome') }}">Home</a>
                <a href="{{ route('albums.index') }}">Albums</a>
                <a href="{{ route('songs.index') }}">Songs</a>
                <a href="{{ route('bands.index') }}">Artists</a>

                @auth
                <a href="{{ route('profile.edit') }}">Mijn Profiel</a>
                <form method="POST" action="/logout" style="display:inline;">
                    @csrf
                    <button class="btn btn-ghost" type="submit">Log out</button>
                </form>
                @endauth

                @guest
                <a href="{{ route('login') }}">Login</a>
                <a href="{{ route('register') }}">Registreer</a>
                @endguest
            </nav>

            <div class="nav-actions">
                <form action="{{ route('search.index') }}" method="GET">
                    <input type="search" name="q" placeholder="Zoeken..." />
                </form>
            </div>

        </div>
    </header>

    @auth
    <div class="role-nav">
        @if(auth()->user()->role === 'admin')
        <a href="{{ route('admin.dashboard') }}">Admin Dashboard</a>
        <a href="{{ route('admin.users.index') }}">Users</a>
        @endif

        @if(auth()->user()->role === 'member')
        <a href="{{ route('member.music.index') }}">Mijn Muziek</a>
        <a href="{{ route('member.albums.index') }}">Mijn Albums</a>
        @endif
    </div>

    @endauth




    <!-- MAIN CONTENT -->
    <main class="py-6">
        @yield('content')
    </main>

    <!-- FOOTER -->
    <footer>
        © {{ date('Y') }} Laravel Music · Alle rechten voorbehouden 🎶
    </footer>

</body>

</html>