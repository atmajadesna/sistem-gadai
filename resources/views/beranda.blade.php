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
<style>
    .hero-section {
        background: var(--gb-green);
        color: #fff;
        padding: 40px 32px;
        border-radius: 14px;
        margin-bottom: 24px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 16px;
    }
    .hero-section h1 {
        font-size: 1.6rem;
        font-weight: 700;
        margin-bottom: 6px;
    }
    .hero-section p {
        font-size: 0.9rem;
        opacity: 0.8;
        margin: 0;
    }
    .hero-icon {
        font-size: 3.5rem;
        opacity: 0.6;
        flex-shrink: 0;
    }

    .menu-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 14px;
        margin-top: 24px;
    }
    .menu-card {
        background: #fff;
        border: 1px solid var(--gb-border);
        border-radius: 10px;
        padding: 20px 16px;
        text-align: center;
        text-decoration: none;
        color: var(--gb-text);
        transition: border-color 0.15s, box-shadow 0.15s;
        position: relative;
    }
    .menu-card:hover {
        border-color: var(--gb-green);
        box-shadow: 0 2px 10px rgba(26,107,58,0.1);
        color: var(--gb-green);
    }
    .menu-card .menu-icon {
        font-size: 1.6rem;
        margin-bottom: 8px;
    }
    .menu-card .menu-label {
        font-size: 0.85rem;
        font-weight: 600;
    }
    .menu-card .menu-lock {
        font-size: 0.68rem;
        color: #9aa0a6;
        margin-top: 4px;
    }

    @media(max-width:576px) {
        .menu-grid { grid-template-columns: 1fr; }
        .hero-icon { display: none; }
    }
</style>

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
    <p style="font-size:0.75rem;font-weight:600;text-transform:uppercase;letter-spacing:0.5px;color:var(--gb-muted);margin:24px 0 10px;">
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