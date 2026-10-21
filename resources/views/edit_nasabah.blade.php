@extends('home15')

@section('head15')
Edit Data Nasabah
@endsection

@section('center15')

<div class="page-head">
    <div>
        <h1>Ubah data nasabah</h1>
        <p>Perbarui identitas nasabah. Kosongkan kolom foto bila tidak ingin menggantinya.</p>
    </div>
    <a class="btn btn--ghost btn--sm" href="{{ url('nasabah') }}">Kembali</a>
</div>

<section class="panel">
    <div class="panel__head">
        <h2 class="panel__title">{{ $nasabah->nama060 }}</h2>
        <span class="panel__meta">ID {{ $nasabah->id_nasabah060 }}</span>
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

        <form method="POST" action="{{ url('update_data/'.$nasabah->id_nasabah060) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-grid">
                <div class="field">
                    <label for="nama060">Nama</label>
                    <input type="text" id="nama060" name="nama060" value="{{ old('nama060', $nasabah->nama060) }}">
                </div>

                <div class="field">
                    <label for="nomorHp060">Nomor HP</label>
                    <input type="text" id="nomorHp060" name="nomorHp060" value="{{ old('nomorHp060', $nasabah->nomorhp060) }}" inputmode="tel">
                </div>

                <div class="field">
                    <label for="nomorNik060">Nomor NIK</label>
                    <input type="text" id="nomorNik060" name="nomorNik060" value="{{ old('nomorNik060', $nasabah->nomornik060) }}" inputmode="numeric">
                </div>

                <div class="field">
                    <label for="pekerjaan060">Pekerjaan</label>
                    <input type="text" id="pekerjaan060" name="pekerjaan060" value="{{ old('pekerjaan060', $nasabah->pekerjaan060) }}">
                </div>

                <div class="field field--wide">
                    <label for="alamat060">Alamat</label>
                    <input type="text" id="alamat060" name="alamat060" value="{{ old('alamat060', $nasabah->alamat060) }}">
                </div>

                <div class="field field--wide">
                    <label>Foto saat ini</label>
                    @if($nasabah->foto060)
                        <img class="thumb" src="{{ asset('storage/genap060/'.$nasabah->foto060) }}" alt="Foto {{ $nasabah->nama060 }}" width="88" height="88">
                    @else
                        <span class="photo-empty">Belum ada foto</span>
                    @endif
                </div>

                <div class="field field--wide">
                    <label for="foto060">Ganti foto</label>
                    <input type="file" id="foto060" name="foto060" accept="image/*">
                    <span class="field__hint">Kosongkan bila foto tidak diubah.</span>
                </div>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn--primary">Simpan perubahan</button>
                <a href="{{ url('nasabah') }}" class="btn btn--ghost">Batal</a>
            </div>
        </form>

    </div>
</section>

@endsection
