@extends('home15')

@section('head15')
Ringkasan
@endsection

@section('center15')

<div class="page-head">
    <div>
        <h1>Ringkasan</h1>
        <p>Selamat datang di Sistem Informasi Pegadaian Gadai Berkah.</p>
    </div>
    <a class="btn btn--ghost btn--sm" href="{{ url('laporan') }}">Lihat laporan</a>
</div>

<div class="ledger">
    <div class="ledger__cell">
        <div class="ledger__label">Nasabah terdaftar</div>
        <div class="ledger__value">{{ $totalNasabah }}</div>
    </div>
    <div class="ledger__cell">
        <div class="ledger__label">Barang gadai tercatat</div>
        <div class="ledger__value ledger__value--accent">{{ $totalGadai }}</div>
    </div>
</div>

<h2 class="section-head">Menu</h2>

<div class="menu-list">
    <a class="menu-item" href="{{ session('login') ? url('nasabah') : url('login') }}">
        <span class="menu-item__label">Data nasabah</span>
        <span class="menu-item__meta">{{ session('login') ? 'Buka' : 'Perlu masuk' }}</span>
    </a>
    <a class="menu-item" href="{{ session('login') ? url('gadai') : url('login') }}">
        <span class="menu-item__label">Input gadai</span>
        <span class="menu-item__meta">{{ session('login') ? 'Buka' : 'Perlu masuk' }}</span>
    </a>
    <a class="menu-item" href="{{ url('laporan') }}">
        <span class="menu-item__label">Laporan</span>
        <span class="menu-item__meta">Buka</span>
    </a>
</div>

@endsection
