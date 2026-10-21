@extends('home15')

@section('head15')
Laporan
@endsection

@section('center15')

<div class="page-head">
    <div>
        <h1>Laporan</h1>
        <p>Rekap seluruh nasabah dan barang gadai yang tercatat di sistem.</p>
    </div>
</div>

<div class="stack">

    <div class="ledger">
        <div class="ledger__cell">
            <div class="ledger__label">Nasabah terdaftar</div>
            <div class="ledger__value">{{ $totalNasabah }}</div>
        </div>
        <div class="ledger__cell">
            <div class="ledger__label">Barang gadai tercatat</div>
            <div class="ledger__value ledger__value--accent">{{ $totalBarang }}</div>
        </div>
    </div>

    <section class="panel">
        <div class="panel__head">
            <h2 class="panel__title">Data nasabah</h2>
            <span class="panel__meta">{{ $nasabah->count() }} baris</span>
        </div>

        <div class="table-wrap">
            <table class="data">
                <thead>
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
                            <td class="num">{{ $loop->iteration }}</td>
                            <td>{{ $n->nama060 }}</td>
                            <td class="num">{{ $n->nomorhp060 }}</td>
                            <td class="num">{{ $n->nomornik060 }}</td>
                            <td class="wrap">{{ $n->alamat060 }}</td>
                            <td class="wrap">{{ $n->pekerjaan060 }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="empty">Belum ada data nasabah.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>

    <section class="panel">
        <div class="panel__head">
            <h2 class="panel__title">Data barang gadai</h2>
            <span class="panel__meta">{{ $barang->count() }} baris</span>
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
                    </tr>
                </thead>
                <tbody>
                    @forelse($barang as $b)
                        <tr>
                            <td class="num">{{ $loop->iteration }}</td>
                            <td>{{ $b->jenis_barang046 }}</td>
                            <td>{{ $b->merk046 }}</td>
                            <td>{{ $b->warna046 }}</td>
                            <td class="num">{{ $b->nomor_seri046 }}</td>
                            <td class="wrap">{{ $b->kondisi_fisik046 }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="empty">Belum ada data barang.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>

</div>

@endsection
