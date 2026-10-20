<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\nasabahmodel;
use App\Models\BarangModel;

class Newskelompok15 extends Controller
{
    public function beranda()
    {
        $totalNasabah = nasabahmodel::count();
        $totalGadai   = BarangModel::count();

        return view('beranda', compact('totalNasabah', 'totalGadai'));
    }

    public function data_nasabah()
    {
        return view('desna060');
    }

    public function gadai()
    {
        return view('fauzi046');
    }

    public function laporan()
    {
        $nasabah      = nasabahmodel::all();
        $barang       = BarangModel::all();
        $totalNasabah = nasabahmodel::count();
        $totalBarang  = BarangModel::count();

        return view('laporan', compact('nasabah', 'barang', 'totalNasabah', 'totalBarang'));
    }

    public function datadiri(Request $request)
    {
        $data = (object)[
            'nama'      => $request->nama060,
            'nomorHp'   => $request->nomorHp060,
            'nomorNik'  => $request->nomorNik060,
            'alamat'    => $request->alamat060,
            'pekerjaan' => $request->pekerjaan060
        ];

        return view('desna060', compact('data'));
    }

    public function detailbarang(Request $request)
    {
        $data = (object)[
            'jenisBarang' => $request->jenisBarang046,
            'merk'        => $request->merk046,
            'warna'       => $request->warna046,
            'nomorSeri'   => $request->nomorSeri046,
            'kondisiFisik'=> $request->kondisiFisik046
        ];

        return view('fauzi046', compact('data'));
    }
}