<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\BarangModel;
use Illuminate\Support\Facades\Storage;

class Barang046Controller extends Controller
{
    public function index()
    {
        $data = BarangModel::all();
        return view('fauzi046', compact('data'));
    }
    public function edit($id)
{
    $data = BarangModel::find($id);

    return view('edit_gadai', compact('data'));
}


    public function post(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'jenisBarang046'  => 'required',
            'merk046'         => 'required',
            'warna046'        => 'required',
            'nomorSeri046'    => 'required',
            'kondisiFisik046' => 'required',
            'foto046'         => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ], [
            'jenisBarang046.required'  => 'Jenis barang wajib diisi',
            'merk046.required'         => 'Merk wajib diisi',
            'warna046.required'        => 'Warna wajib diisi',
            'nomorSeri046.required'    => 'Nomor seri wajib diisi',
            'kondisiFisik046.required' => 'Kondisi fisik wajib diisi',
        ]);


        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }


        $barang = new BarangModel;
        $barang->jenis_barang046  = $request->jenisBarang046;
        $barang->merk046          = $request->merk046;
        $barang->warna046         = $request->warna046;
        $barang->nomor_seri046    = $request->nomorSeri046;
        $barang->kondisi_fisik046 = $request->kondisiFisik046;
         if ($request->hasFile('foto046')) {
        $file = $request->file('foto046');
        $namaFile = time().'_'.$file->getClientOriginalName();
        $file->storeAs('foto_barang', $namaFile, 'public');
        $barang->foto046 = $namaFile;
    }
        $barang->save();

        return redirect('/gadai')->with('success', 'Data barang berhasil disimpan');
    }
    public function destroy($id)
{
    $barang = BarangModel::find($id);

    if ($barang) {
        if ($barang->foto046 && Storage::disk('public')->exists('foto_barang/'.$barang->foto046)) {
            Storage::disk('public')->delete('foto_barang/'.$barang->foto046);
        }

        $barang->delete();
    }

    return redirect('/gadai')->with('success', 'Data Berhasil dihapus');
}
public function update(Request $request, $id)
{
    $validator = Validator::make($request->all(), [
        'jenisBarang046' => 'required',
        'merk046' => 'required',
        'warna046' => 'required',
        'nomorSeri046' => 'required',
        'kondisiFisik046' => 'required',
        'foto046' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
    ],[
        'jenisBarang046.required' => 'jenis barang wajib diisi'
    ]);

    if ($validator->fails()) {
        return redirect()
            ->back()
            ->withErrors($validator)
            ->withInput();
    }

    $gadai = BarangModel::find($id);
    $gadai->jenis_barang046 = $request->jenisBarang046;
    $gadai->merk046 = $request->merk046;
    $gadai->warna046 = $request->warna046;
    $gadai->nomor_seri046 = $request->nomorSeri046;
    $gadai->kondisi_fisik046 = $request->kondisiFisik046;

    if ($request->hasFile('foto046')) {
        // hapus foto lama kalau ada
        if ($gadai->foto046 && Storage::disk('public')->exists('foto_barang/'.$gadai->foto046)) {
            Storage::disk('public')->delete('foto_barang/'.$gadai->foto046);
        }

        $file = $request->file('foto046');
        $namaFile = time().'_'.$file->getClientOriginalName();
        $file->storeAs('foto_barang', $namaFile, 'public');
        $gadai->foto046 = $namaFile;
    }

    $gadai->save();

    return redirect('/gadai')->with('success', 'Data Berhasil diupdate');
}
}