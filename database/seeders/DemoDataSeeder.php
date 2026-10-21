<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\nasabahmodel;
use App\Models\BarangModel;

/**
 * Data contoh supaya halaman tidak kosong saat pertama dibuka.
 * Aman dijalankan berulang: kalau tabel sudah ada isinya, seeder dilewati.
 */
class DemoDataSeeder extends Seeder
{
    public function run(): void
    {
        if (nasabahmodel::count() === 0) {
            $daftarNasabah = [
                ['Naufal Fauzan',  '081234567801', '3312010101900001', 'Solo',     'Karyawan Swasta'],
                ['Samudra Bayu',   '081234567802', '3312010202910002', 'Solo',     'Pedagang'],
                ['Rendi Ardiona',  '081234567803', '3312010303920003', 'Pacitan',  'Wiraswasta'],
                ['Ubay Aldisar',   '081234567804', '3312010404930004', 'Wonogiri', 'Guru'],
                ['Aby Januarta',   '081234567805', '3312010505940005', 'Wonogiri', 'Buruh'],
            ];

            foreach ($daftarNasabah as [$nama, $hp, $nik, $alamat, $kerja]) {
                nasabahmodel::create([
                    'nama060'      => $nama,
                    'nomorhp060'   => $hp,
                    'nomornik060'  => $nik,
                    'alamat060'    => $alamat,
                    'pekerjaan060' => $kerja,
                ]);
            }
        }

        if (BarangModel::count() === 0) {
            $daftarBarang = [
                ['Motor',  'Honda Vario 125', 'Hitam',  'AD1234XYZ', 'Baik'],
                ['Motor',  'Yamaha NMAX',     'Putih',  'AD5678ABC', 'Baik'],
                ['Elektronik', 'Laptop Asus X441', 'Silver', 'SN-ASUS-0091', 'Baik'],
                ['Elektronik', 'TV LG 32 inci', 'Hitam', 'SN-LG-4472', 'Cukup Baik'],
                ['Perhiasan', 'Cincin Emas 22 Karat', 'Emas', 'EM-22K-771', 'Sangat Baik'],
            ];

            foreach ($daftarBarang as [$jenis, $merk, $warna, $seri, $kondisi]) {
                BarangModel::create([
                    'jenis_barang046'  => $jenis,
                    'merk046'          => $merk,
                    'warna046'         => $warna,
                    'nomor_seri046'    => $seri,
                    'kondisi_fisik046' => $kondisi,
                ]);
            }
        }
    }
}
