<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\nasabahmodel;
use Illuminate\Support\Facades\Storage;

class Nasabah060Controller extends Controller
{
    public function index()
    {
        $nasabah = nasabahmodel::all();

        return view('desna060', compact('nasabah'));
    }

    public function post060(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama060' => 'required',
            'nomorHp060' => 'required',
            'nomorNik060' => 'required',
            'alamat060' => 'required',
            'pekerjaan060' => 'required',
            'foto060' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ],[
            'nama060.required' => 'nama wajib diisi'
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }
        $nasabah = new nasabahmodel;
        $nasabah->nama060 = $request->nama060;
        $nasabah->nomorhp060 = $request->nomorHp060;
        $nasabah->nomornik060 = $request->nomorNik060;
        $nasabah->alamat060 = $request->alamat060;
        $nasabah->pekerjaan060 = $request->pekerjaan060;

        if ($request->hasFile('foto060')) {
            $file = $request->file('foto060');
            $namaFile = time().'_'.$file->getClientOriginalName();
            $file->storeAs('genap060', $namaFile, 'public');
            $nasabah->foto060 = $namaFile;
        }

        $nasabah->save();

        return redirect('/desna060')->with('success', 'Data Berhasil disimpan');
    }

    public function destroy($id)
    {
        $nasabah = nasabahmodel::find($id);

        if ($nasabah) {
            if ($nasabah->foto060 && Storage::disk('public')->exists('genap060/'.$nasabah->foto060)) {
                Storage::disk('public')->delete('genap060/'.$nasabah->foto060);
            }

            $nasabah->delete();
        }

        return redirect('/desna060')->with('success', 'Data Berhasil dihapus');
    }

    public function edit($id)
    {
        $nasabah = nasabahmodel::find($id);

        return view('edit_nasabah', compact('nasabah'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nama060' => 'required',
            'nomorHp060' => 'required',
            'nomorNik060' => 'required',
            'alamat060' => 'required',
            'pekerjaan060' => 'required',
            'foto060' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ],[
            'nama060.required' => 'nama wajib diisi'
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $nasabah = nasabahmodel::find($id);
        $nasabah->nama060 = $request->nama060;
        $nasabah->nomorhp060 = $request->nomorHp060;
        $nasabah->nomornik060 = $request->nomorNik060;
        $nasabah->alamat060 = $request->alamat060;
        $nasabah->pekerjaan060 = $request->pekerjaan060;

        if ($request->hasFile('foto060')) {
            if ($nasabah->foto060 && Storage::disk('public')->exists('genap060/'.$nasabah->foto060)) {
                Storage::disk('public')->delete('genap060/'.$nasabah->foto060);
            }

            $file = $request->file('foto060');
            $namaFile = time().'_'.$file->getClientOriginalName();
            $file->storeAs('genap060', $namaFile, 'public');
            $nasabah->foto060 = $namaFile;
        }

        $nasabah->save();

        return redirect('/desna060')->with('success', 'Data Berhasil diupdate');
    }
}