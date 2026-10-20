@extends('home15')

@section('head15')
Data Nasabah
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
                <a class="nav-link " href="/">Beranda</a>
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
            Form Input data diri
        </div>

        <div class="card-body">
    <form method="POST" class="mb-4" action="{{url('save_data')}}"enctype="multipart/form-data">>
    
        @csrf
        @if ($errors->any())
    <div style="color:red; margin-bottom:20px;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

        
    
        <div class="mb-3">
            <label>Nama</label>
            <input type="text"
                   class="form-control"
                   name="nama060">
        </div>
    
        <div class="mb-3">
            <label>Nomor HP</label>
            <input type="text"
                   class="form-control"
                   name="nomorHp060">
        </div>
    
        <div class="mb-3">
            <label>Nomor NIK</label>
            <input type="text"
                   class="form-control"
                   name="nomorNik060">
        </div>
    
        <div class="mb-3">
            <label>Alamat</label>
            <input type="text"
                   class="form-control"
                   name="alamat060">
        </div>
    
        <div class="mb-3">
            <label>Pekerjaan</label>
            <input type="text"
                   class="form-control"
                   name="pekerjaan060">
        </div><div class="mb-3">
        <label>Foto</label>
        <input type="file" class="form-control" name="foto060" accept="image/*">
    </div>
    
        <button type="submit" class="btn btn-success">
            Simpan
        </button>
    
    </form>

    <h2>Data Nasabah</h2>

    <table class="table table-bordered mt-3">

        <tr class="table-success">
            <th>No</th>
            <th>Nama</th>
            <th>No HP</th>
            <th>No NIK</th>
            <th>Alamat</th>
            <th>Pekerjaan</th>
             <th>Foto</th>
            <th>Aksi</th>
        </tr>

        @foreach($nasabah as $n)
<tr>
    <td>{{ $loop->iteration }}</td>
    <td>{{ $n->nama060 }}</td>
    <td>{{ $n->nomorhp060 }}</td>
    <td>{{ $n->nomornik060 }}</td>
    <td>{{ $n->alamat060 }}</td>
    <td>{{ $n->pekerjaan060 }}</td>
    <td>
        @if($n->foto060)
            <img src="{{ asset('storage/genap060/'.$n->foto060) }}"
                 width="60" height="60"
                 style="object-fit:cover; border-radius:5px;">
        @else
            -
        @endif
    </td>
    <td>
        <a href="{{ url('edit_data/'.$n->id_nasabah060) }}" class="btn btn-warning btn-sm">Update</a>
        <form action="{{ url('delete_data/'.$n->id_nasabah060) }}" method="POST" style="display:inline-block">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')">
            Delete
        </button>
    </form>
    </td>
</tr>
@endforeach

    </table>

</div>
</div>
</div>

@endsection


@section('footer15')
Kelompok 15 © {{ date('Y') }}
@endsection