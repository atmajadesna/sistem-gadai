@extends('home15')

@section('head15')
Input Gadai
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
            Form Input Gadai
        </div>

        <div class="card-body">

            <form method="POST" action="{{url('simpan_data')}}" enctype="multipart/form-data">

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
                    <label>Jenis Barang</label>
                    <input type="text"
                           class="form-control"
                           name="jenisBarang046">
                </div>

                <div class="mb-3">
                    <label>Merk</label>
                    <input type="text"
                           class="form-control"
                           name="merk046">
                </div>

                <div class="mb-3">
                    <label>Warna</label>
                    <input type="text"
                           class="form-control"
                           name="warna046">
                </div>

                <div class="mb-3">
                    <label>Nomor Seri</label>
                    <input type="text"
                           class="form-control"
                           name="nomorSeri046">
                </div>

                <div class="mb-3">
                    <label>Kondisi Fisik</label>
                    <input type="text"
                           class="form-control"
                           name="kondisiFisik046">
                </div>

                <div class="mb-3">
        <label>Foto Barang</label>
        <input type="file" class="form-control" name="foto046" accept="image/*">
    </div>

                <button class="btn btn-success">
                    Simpan
                </button>

            </form>

            <h2>Data Barang Gadai</h2>

            <div class="table-responsive">
            <table class="table table-bordered mt-3">

        <tr class="table-success">
            <th>No</th>
            <th>Jenis Barang</th>
            <th>Merk</th>
            <th>Warna</th>
            <th>Nomor Seri</th>
            <th>Kondisi Fisik</th>
            <th>Foto</th>
            <th>Aksi</th>
        </tr>

        @foreach($data as $n)
<tr>
    <td>{{ $loop->iteration }}</td>
    <td>{{ $n->jenis_barang046 }}</td>
    <td>{{ $n->merk046 }}</td>
    <td>{{ $n->warna046 }}</td>
    <td>{{ $n->nomor_seri046 }}</td>
    <td>{{ $n->kondisi_fisik046 }}</td>
    <td>
            @if($n->foto046)
                <img src="{{ asset('storage/foto_barang/'.$n->foto046) }}"
                     width="60" height="60"
                     style="object-fit:cover; border-radius:5px;">
            @else
                -
            @endif
        </td>
    <td>
            <a href="{{ url('edit_gadai/'.$n->id_barang046) }}" class="btn btn-warning btn-sm">Update</a>

            <form action="{{ url('delete_gadai/'.$n->id_barang046) }}" method="POST" style="display:inline-block">
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

</div>
@endsection


@section('footer15')
Kelompok 15 © {{ date('Y') }}
@endsection