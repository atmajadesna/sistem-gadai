<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @php $pageTitle = trim($__env->yieldContent('head15')); @endphp
    <title>{{ $pageTitle !== '' ? $pageTitle . ' — ' : '' }}Gadai Berkah</title>
    <meta name="description" content="Sistem informasi pegadaian Gadai Berkah — pencatatan nasabah dan barang gadai.">

    <link rel="icon" href="{{ asset('favicon.svg') }}?v={{ filemtime(public_path('favicon.svg')) }}" type="image/svg+xml">
    <link rel="alternate icon" href="{{ asset('favicon.ico') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=IBM+Plex+Mono:wght@400;500&family=IBM+Plex+Sans:wght@400;500;600&family=Instrument+Serif&display=swap">

    <link rel="stylesheet" href="{{ asset('css/tokens.css') }}?v={{ filemtime(public_path('css/tokens.css')) }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}?v={{ filemtime(public_path('css/style.css')) }}">
</head>
<body>
    <nav class="app-navbar">
        <div class="app-navbar__inner">
            <a class="wordmark" href="{{ url('/') }}">
                @include('partials.mark')
                <span class="wordmark__text">
                    <span class="wordmark__name">Gadai Berkah</span>
                    <span class="wordmark__tag">Kelompok 15</span>
                </span>
            </a>

            <ul class="app-nav">
                <li><a class="app-nav__link {{ request()->is('/') ? 'is-active' : '' }}" href="{{ url('/') }}">Beranda</a></li>
                <li><a class="app-nav__link {{ request()->is('nasabah*') || request()->is('edit_data*') ? 'is-active' : '' }}" href="{{ url('nasabah') }}">Data nasabah</a></li>
                <li><a class="app-nav__link {{ request()->is('gadai*') || request()->is('edit_gadai*') ? 'is-active' : '' }}" href="{{ url('gadai') }}">Input gadai</a></li>
                <li><a class="app-nav__link {{ request()->is('laporan*') ? 'is-active' : '' }}" href="{{ url('laporan') }}">Laporan</a></li>
            </ul>

            <div class="session">
                @if(session('login'))
                    <span class="session__who">{{ session('nim') }}</span>
                    <a class="session__link" href="{{ url('logout') }}">Keluar</a>
                @else
                    <a class="session__link" href="{{ url('login') }}">Masuk</a>
                @endif
            </div>
        </div>
    </nav>

    <main class="page-main">
        <div class="shell">
            @yield('center15')
        </div>
    </main>

    <footer class="app-footer">
        <div class="app-footer__inner">
            <span>Gadai Berkah — Sistem Informasi Pegadaian</span>
            <span class="colophon">Kelompok 15 · {{ date('Y') }}</span>
        </div>
    </footer>
</body>
</html>
