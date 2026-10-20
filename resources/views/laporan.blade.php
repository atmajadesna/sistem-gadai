@extends('home15')

@section('head15')
Laporan - Gadai Berkah
@endsection

@section('header15')
<div class="container">
    <a class="navbar-brand" href="/">Gadai Berkah</a>

    <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto gap-1">
            <li class="nav-item">
                <a class="nav-link" href="/">Beranda</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/nasabah">Data Nasabah</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/gadai">Input Gadai</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="/laporan">Laporan</a>
            </li>
        </ul>
    </div>
</div>
@endsection

@section('center15')
<div class="container">

    {{-- RINGKASAN --}}
    <div class="row g-3 mb-4">
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
                    <span class="dot" style="background:#2563eb"></span>Total Barang Gadai
                </div>
                <div class="value" style="color:#2563eb">{{ $totalBarang }}</div>
            </div>
        </div>
    </div>

    {{-- TABEL NASABAH --}}
    <div class="card mb-4">
        <div class="card-header">
            <strong>Data Nasabah</strong>
        </div>
        <div class="card-body table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="table-success">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Nomor HP</th>
                        <th>Nomor NIK</th>
                        <th>Alamat</th>
                        <th>Pekerjaan</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($nasabah as $n)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $n->nama060 }}</td>
                        <td>{{ $n->nomorhp060 }}</td>
                        <td>{{ $n->nomornik060 }}</td>
                        <td>{{ $n->alamat060 }}</td>
                        <td>{{ $n->pekerjaan060 }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center text-muted">Belum ada data nasabah</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{-- TABEL BARANG GADAI --}}
    <div class="card mb-4">
        <div class="card-header">
            <strong>Data Barang Gadai</strong>
        </div>
        <div class="card-body table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="table-primary">
                    <tr>
                        <th>No</th>
                        <th>Jenis Barang</th>
                        <th>Merk</th>
                        <th>Warna</th>
                        <th>Nomor Seri</th>
                        <th>Kondisi Fisik</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($barang as $b)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $b->jenis_barang046 }}</td>
                        <td>{{ $b->merk046 }}</td>
                        <td>{{ $b->warna046 }}</td>
                        <td>{{ $b->nomor_seri046 }}</td>
                        <td>{{ $b->kondisi_fisik046 }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center text-muted">Belum ada data barang</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection

@section('footer15')
Kelompok 15 &copy; {{ date('Y') }}
@endsection