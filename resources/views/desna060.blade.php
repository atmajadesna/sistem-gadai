@extends('home15')

@section('head15')
Data Nasabah
@endsection

@section('center15')

<div class="page-head">
    <div>
        <h1>Data nasabah</h1>
        <p>Catat identitas nasabah baru, lalu kelola datanya pada tabel di bawah.</p>
    </div>
</div>

<div class="stack">

    <section class="panel">
        <div class="panel__head">
            <h2 class="panel__title">Nasabah baru</h2>
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

            <form method="POST" action="{{ url('save_data') }}" enctype="multipart/form-data">
                @csrf

                <div class="form-grid">
                    <div class="field">
                        <label for="nama060">Nama</label>
                        <input type="text" id="nama060" name="nama060" value="{{ old('nama060') }}" placeholder="Nama lengkap">
                    </div>

                    <div class="field">
                        <label for="nomorHp060">Nomor HP</label>
                        <input type="text" id="nomorHp060" name="nomorHp060" value="{{ old('nomorHp060') }}" placeholder="08xxxxxxxxxx" inputmode="tel">
                    </div>

                    <div class="field">
                        <label for="nomorNik060">Nomor NIK</label>
                        <input type="text" id="nomorNik060" name="nomorNik060" value="{{ old('nomorNik060') }}" placeholder="16 digit" inputmode="numeric">
                    </div>

                    <div class="field">
                        <label for="pekerjaan060">Pekerjaan</label>
                        <input type="text" id="pekerjaan060" name="pekerjaan060" value="{{ old('pekerjaan060') }}" placeholder="Contoh: pedagang">
                    </div>

                    <div class="field field--wide">
                        <label for="alamat060">Alamat</label>
                        <input type="text" id="alamat060" name="alamat060" value="{{ old('alamat060') }}" placeholder="Jalan, nomor, kelurahan">
                    </div>

                    <div class="field field--wide">
                        <label for="foto060">Foto</label>
                        <input type="file" id="foto060" name="foto060" accept="image/*">
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
            <h2 class="panel__title">Daftar nasabah</h2>
            <span class="panel__meta">{{ $nasabah->count() }} baris</span>
        </div>

        <div class="table-wrap">
            <table class="data">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>No HP</th>
                        <th>No NIK</th>
                        <th>Alamat</th>
                        <th>Pekerjaan</th>
                        <th>Foto</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($nasabah as $n)
                        <tr>
                            <td class="num">{{ $loop->iteration }}</td>
                            <td>{{ $n->nama060 }}</td>
                            <td class="num">{{ $n->nomorhp060 }}</td>
                            <td class="num">{{ $n->nomornik060 }}</td>
                            <td class="wrap">{{ $n->alamat060 }}</td>
                            <td class="wrap">{{ $n->pekerjaan060 }}</td>
                            <td>
                                @if($n->foto060)
                                    <img class="thumb" src="{{ asset('storage/genap060/'.$n->foto060) }}" alt="Foto {{ $n->nama060 }}" width="44" height="44">
                                @else
                                    <span class="panel__meta">—</span>
                                @endif
                            </td>
                            <td>
                                <div class="actions">
                                    <a href="{{ url('edit_data/'.$n->id_nasabah060) }}" class="btn btn--ghost btn--sm">Ubah</a>
                                    <form action="{{ url('delete_data/'.$n->id_nasabah060) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn--danger btn--sm" onclick="return confirm('Hapus data nasabah ini?')">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="empty">Belum ada data nasabah.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>

</div>

@endsection
