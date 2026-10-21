@extends('home15')

@section('head15')
Input Gadai
@endsection

@section('center15')

<div class="page-head">
    <div>
        <h1>Input gadai</h1>
        <p>Catat barang yang digadaikan beserta kondisi fisiknya.</p>
    </div>
</div>

<div class="stack">

    <section class="panel">
        <div class="panel__head">
            <h2 class="panel__title">Barang gadai baru</h2>
        </div>

        <div class="panel__body">

            @if ($errors->any())
                <div class="notice">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ url('simpan_data') }}" enctype="multipart/form-data">
                @csrf

                <div class="form-grid">
                    <div class="field">
                        <label for="jenisBarang046">Jenis barang</label>
                        <input type="text" id="jenisBarang046" name="jenisBarang046" value="{{ old('jenisBarang046') }}" placeholder="Contoh: handphone">
                    </div>

                    <div class="field">
                        <label for="merk046">Merk</label>
                        <input type="text" id="merk046" name="merk046" value="{{ old('merk046') }}" placeholder="Contoh: Samsung">
                    </div>

                    <div class="field">
                        <label for="warna046">Warna</label>
                        <input type="text" id="warna046" name="warna046" value="{{ old('warna046') }}" placeholder="Contoh: hitam">
                    </div>

                    <div class="field">
                        <label for="nomorSeri046">Nomor seri</label>
                        <input type="text" id="nomorSeri046" name="nomorSeri046" value="{{ old('nomorSeri046') }}" placeholder="Nomor seri atau IMEI">
                    </div>

                    <div class="field field--wide">
                        <label for="kondisiFisik046">Kondisi fisik</label>
                        <input type="text" id="kondisiFisik046" name="kondisiFisik046" value="{{ old('kondisiFisik046') }}" placeholder="Contoh: mulus, layar lecet halus">
                    </div>

                    <div class="field field--wide">
                        <label for="foto046">Foto barang</label>
                        <input type="file" id="foto046" name="foto046" accept="image/*">
                        <span class="field__hint">JPG atau PNG, maksimal 2 MB. Boleh dikosongkan.</span>
                    </div>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn btn--primary">Simpan</button>
                </div>
            </form>

        </div>
    </section>

    <section class="panel">
        <div class="panel__head">
            <h2 class="panel__title">Daftar barang gadai</h2>
            <span class="panel__meta">{{ $data->count() }} baris</span>
        </div>

        <div class="table-wrap">
            <table class="data">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Jenis barang</th>
                        <th>Merk</th>
                        <th>Warna</th>
                        <th>Nomor seri</th>
                        <th>Kondisi fisik</th>
                        <th>Foto</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($data as $n)
                        <tr>
                            <td class="num">{{ $loop->iteration }}</td>
                            <td>{{ $n->jenis_barang046 }}</td>
                            <td>{{ $n->merk046 }}</td>
                            <td>{{ $n->warna046 }}</td>
                            <td class="num">{{ $n->nomor_seri046 }}</td>
                            <td class="wrap">{{ $n->kondisi_fisik046 }}</td>
                            <td>
                                @if($n->foto046)
                                    <img class="thumb" src="{{ asset('storage/foto_barang/'.$n->foto046) }}" alt="Foto {{ $n->merk046 }}" width="44" height="44">
                                @else
                                    <span class="panel__meta">—</span>
                                @endif
                            </td>
                            <td>
                                <div class="actions">
                                    <a href="{{ url('edit_gadai/'.$n->id_barang046) }}" class="btn btn--ghost btn--sm">Ubah</a>
                                    <form action="{{ url('delete_gadai/'.$n->id_barang046) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn--danger btn--sm" onclick="return confirm('Hapus data barang ini?')">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="empty">Belum ada barang gadai.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>

</div>

@endsection
