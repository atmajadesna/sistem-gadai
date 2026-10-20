<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Kelompok15Model;

/**
 * Akun demo untuk mencoba aplikasi.
 *
 * Ganti nilai di bawah dengan NIM/username masing-masing kalau dipakai
 * untuk demo di lingkungan kampus. Sebaiknya jangan di-commit ke repo publik.
 */
class Kelompok15Seeder extends Seeder
{
    public function run(): void
    {
        Kelompok15Model::create([
            'nim'         => 'admin',
            'nama'        => 'Admin Nasabah',
            'password'    => Hash::make('admin123'),
            'form_tujuan' => 'nasabah',
        ]);

        Kelompok15Model::create([
            'nim'         => 'petugas',
            'nama'        => 'Petugas Gadai',
            'password'    => Hash::make('petugas123'),
            'form_tujuan' => 'gadai',
        ]);
    }
}
