@extends('home15')

@section('head15')
Edit Data Gadai
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
                <a class="nav-link active" href="/gadai">Input Gadai</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/laporan">Laporan</a>
            </li>
        </ul>
    </div>
</div>

@endsection


@section('center15')

<div class="container">

<div class="card">

    <div class="card-header">
        Form Edit Data Gadai
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

        <form method="POST" action="{{ url('update_gadai/'.$data->id_barang046) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label>Jenis Barang</label>
                <input type="text"
                       class="form-control"
                       name="jenisBarang046"
                       value="{{ old('jenisBarang046', $data->jenis_barang046) }}">
            </div>

            <div class="mb-3">
                <label>Merk</label>
                <input type="text"
                       class="form-control"
                       name="merk046"
                       value="{{ old('merk046', $data->merk046) }}">
            </div>

            <div class="mb-3">
                <label>Warna</label>
                <input type="text"
                       class="form-control"
                       name="warna046"
                       value="{{ old('warna046', $data->warna046) }}">
            </div>

            <div class="mb-3">
                <label>Nomor Seri</label>
                <input type="text"
                       class="form-control"
                       name="nomorSeri046"
                       value="{{ old('nomorSeri046', $data->nomor_seri046) }}">
            </div>

            <div class="mb-3">
                <label>Kondisi Fisik</label>
                <input type="text"
                       class="form-control"
                       name="kondisiFisik046"
                       value="{{ old('kondisiFisik046', $data->kondisi_fisik046) }}">
            </div>
            <div class="mb-3">
        <label>Foto Saat Ini</label><br>
        @if($data->foto046)
            <img src="{{ asset('storage/genap046/'.$data->foto046) }}"
                 width="100" style="border-radius:5px; margin-bottom:10px;"><br>
        @else
            <span>Belum ada foto</span><br>
        @endif

        <label>Ganti Foto (kosongkan jika tidak ingin mengubah)</label>
        <input type="file" class="form-control" name="foto046" accept="image/*">
    </div>

            <button type="submit" class="btn btn-warning">Update</button>
            <a href="{{ url('/gadai') }}" class="btn btn-secondary">Batal</a>

        </form>

    </div>
</div>
</div>

@endsection


@section('footer15')
Kelompok 15 © {{ date('Y') }}
@endsection