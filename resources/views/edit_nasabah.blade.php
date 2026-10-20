@extends('home15')

@section('head15')
Edit Data Nasabah
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
                <a class="nav-link" href="/laporan">Laporan</a>
            </li>
        </ul>
    </div>
</div>
@endsection

@section('center15')
<div class="container" style="margin-top:100px">
    <div class="card shadow">
        <div class="card-header bg-success text-white">
            Form Edit Data Nasabah
        </div>

        <div class="card-body">

            @if ($errors->any())
            <div style="color:red; margin-bottom:20px;">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            {{-- Menambahkan spasi antara url dan enctype --}}
            <form method="POST" action="{{ url('update_data/'.$nasabah->id_nasabah060) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label>Nama</label>
                    <input type="text" class="form-control" name="nama060" value="{{ old('nama060', $nasabah->nama060) }}">
                </div>

                <div class="mb-3">
                    <label>Nomor HP</label>
                    <input type="text" class="form-control" name="nomorHp060" value="{{ old('nomorHp060', $nasabah->nomorhp060) }}">
                </div>

                <div class="mb-3">
                    <label>Nomor NIK</label>
                    <input type="text" class="form-control" name="nomorNik060" value="{{ old('nomorNik060', $nasabah->nomornik060) }}">
                </div>

                <div class="mb-3">
                    <label>Alamat</label>
                    <input type="text" class="form-control" name="alamat060" value="{{ old('alamat060', $nasabah->alamat060) }}">
                </div>

                <div class="mb-3">
                    <label>Pekerjaan</label>
                    <input type="text" class="form-control" name="pekerjaan060" value="{{ old('pekerjaan060', $nasabah->pekerjaan060) }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Foto Saat Ini</label><br>
                    {{-- Perbaikan: Variabel $n diganti menjadi $nasabah --}}
                    @if($nasabah->foto060)
                        <img src="{{ asset('storage/genap060/'.$nasabah->foto060) }}" width="100" class="img-thumbnail mb-2"><br>
                    @else
                        <span class="text-muted d-block mb-2">Belum ada foto</span>
                    @endif

                    <label class="form-label">Ganti Foto (kosongkan jika tidak ingin mengubah)</label>
                    {{-- Perbaikan: name disesuaikan menjadi foto060 --}}
                    <input type="file" class="form-control" name="foto060" accept="image/*">
                </div>

                <button type="submit" class="btn btn-warning">Update</button>
                <a href="{{ url('nasabah') }}" class="btn btn-secondary">Batal</a>

            </form>

        </div>
    </div>
</div>
@endsection

@section('footer15')
Kelompok 15 © {{ date('Y') }}
@endsection