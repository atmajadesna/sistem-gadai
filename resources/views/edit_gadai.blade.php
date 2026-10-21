@extends('home15')

@section('head15')
Edit Data Gadai
@endsection

@section('center15')

<div class="page-head">
    <div>
        <h1>Ubah data gadai</h1>
        <p>Perbarui keterangan barang. Kosongkan kolom foto bila tidak ingin menggantinya.</p>
    </div>
    <a class="btn btn--ghost btn--sm" href="{{ url('gadai') }}">Kembali</a>
</div>

<section class="panel">
    <div class="panel__head">
        <h2 class="panel__title">{{ $data->merk046 }}</h2>
        <span class="panel__meta">ID {{ $data->id_barang046 }}</span>
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

        <form method="POST" action="{{ url('update_gadai/'.$data->id_barang046) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-grid">
                <div class="field">
                    <label for="jenisBarang046">Jenis barang</label>
                    <input type="text" id="jenisBarang046" name="jenisBarang046" value="{{ old('jenisBarang046', $data->jenis_barang046) }}">
                </div>

                <div class="field">
                    <label for="merk046">Merk</label>
                    <input type="text" id="merk046" name="merk046" value="{{ old('merk046', $data->merk046) }}">
                </div>

                <div class="field">
                    <label for="warna046">Warna</label>
                    <input type="text" id="warna046" name="warna046" value="{{ old('warna046', $data->warna046) }}">
                </div>

                <div class="field">
                    <label for="nomorSeri046">Nomor seri</label>
                    <input type="text" id="nomorSeri046" name="nomorSeri046" value="{{ old('nomorSeri046', $data->nomor_seri046) }}">
                </div>

                <div class="field field--wide">
                    <label for="kondisiFisik046">Kondisi fisik</label>
                    <input type="text" id="kondisiFisik046" name="kondisiFisik046" value="{{ old('kondisiFisik046', $data->kondisi_fisik046) }}">
                </div>

                <div class="field field--wide">
                    <label>Foto saat ini</label>
                    @if($data->foto046)
                        <img class="thumb" src="{{ asset('storage/foto_barang/'.$data->foto046) }}" alt="Foto {{ $data->merk046 }}" width="88" height="88">
                    @else
                        <span class="photo-empty">Belum ada foto</span>
                    @endif
                </div>

                <div class="field field--wide">
                    <label for="foto046">Ganti foto</label>
                    <input type="file" id="foto046" name="foto046" accept="image/*">
                    <span class="field__hint">Kosongkan bila foto tidak diubah.</span>
                </div>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn--primary">Simpan perubahan</button>
                <a href="{{ url('gadai') }}" class="btn btn--ghost">Batal</a>
            </div>
        </form>

    </div>
</section>

@endsection
