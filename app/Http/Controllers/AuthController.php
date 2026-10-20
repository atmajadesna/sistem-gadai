<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\Kelompok15Model;

class AuthController extends Controller
{
    // Menampilkan halaman login
    public function index()
    {
        return view('login');
    }

    // Memproses login
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nim'      => 'required',
            'password' => 'required',
        ], [
            'nim.required'      => 'NIM wajib diisi',
            'password.required' => 'Password wajib diisi',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $user = Kelompok15Model::where('nim', $request->nim)->first();

        if (!$user) {
            return redirect()
                ->back()
                ->withErrors(['nim' => 'NIM tidak terdaftar'])
                ->withInput();
        }

        if (!Hash::check($request->password, $user->password)) {
            return redirect()
                ->back()
                ->withErrors(['password' => 'Password salah'])
                ->withInput();
        }

        session([
            'login'       => true,
            'nim'         => $user->nim,
            'nama'        => $user->nama,
            'form_tujuan' => $user->form_tujuan,
        ]);

        if ($user->form_tujuan == 'nasabah') {
            return redirect('/nasabah')->with('success', 'Login berhasil, selamat datang ' . $user->nim);
        }

        if ($user->form_tujuan == 'gadai') {
            return redirect('/gadai')->with('success', 'Login berhasil, selamat datang ' . $user->nim);
        }

        return redirect('/')->with('success', 'Login berhasil');
    }

    // Logout
    public function logout(Request $request)
    {
        $request->session()->flush();

        return redirect('/login')->with('success', 'Anda berhasil logout');
    }
}