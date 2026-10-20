@extends('home15')

@section('head15')
Dashboard - Gadai Berkah
@endsection

@section('header15')
<div class="container">
    <a class="navbar-brand" href="/">Gadai Berkah</a>
    <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto gap-1">
            <li class="nav-item"><a class="nav-link active" href="/">Beranda</a></li>
            <li class="nav-item"><a class="nav-link" href="/laporan">Laporan</a></li>

            @if(session('login'))
                <li class="nav-item"><a class="nav-link" href="/logout">Logout ({{ session('nim') }})</a></li>
            @else
                <li class="nav-item"><a class="nav-link" href="/login">Login</a></li>
            @endif
        </ul>
    </div>
</div>
@endsection

@section('center15')

<div class="dashboard-wrap">

    {{-- Hero --}}
    <div class="hero-section">
        <div>
            <h1>Dashboard</h1>
            <p>Selamat datang di Sistem Informasi Pegadaian Gadai Berkah.</p>
        </div>
        <div class="hero-icon">🏦</div>
    </div>

    {{-- Stat Cards --}}
    <div class="row g-3">
        <div class="col-md-6">
            <div class="stat-card">
                <div class="label">
                    <span class="dot" style="background:#1a6b3a"></span>Total Nasabah
                </div>
                <div class="value">{{ $totalNasabah }}</div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="stat-card">
                <div class="label">
                    <span class="dot" style="background:#2563eb"></span>Total Gadai
                </div>
                <div class="value" style="color:#2563eb">{{ $totalGadai }}</div>
            </div>
        </div>
    </div>

    {{-- Menu Cepat --}}
    <p class="section-label">
        Menu
    </p>
    <div class="menu-grid">

        <a href="{{ session('login') ? '/nasabah' : '/login' }}" class="menu-card">
            <div class="menu-icon">📋</div>
            <div class="menu-label">Data Nasabah</div>
            @if(!session('login'))
                <div class="menu-lock">🔒 Login diperlukan</div>
            @endif
        </a>

        <a href="{{ session('login') ? '/gadai' : '/login' }}" class="menu-card">
            <div class="menu-icon">🏷️</div>
            <div class="menu-label">Input Gadai</div>
            @if(!session('login'))
                <div class="menu-lock">🔒 Login diperlukan</div>
            @endif
        </a>

        <a href="/laporan" class="menu-card">
            <div class="menu-icon">📊</div>
            <div class="menu-label">Laporan</div>
        </a>

    </div>

</div>
@endsection

@section('footer15')
Kelompok 15 &copy; {{ date('Y') }}
@endsection