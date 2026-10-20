<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class BarangModel extends Model
{
    protected $table      = 'db_barang';
    protected $primaryKey = 'id_barang046';
    public $timestamps    = false;

    protected $fillable = [
        'jenis_barang046',
        'merk046',
        'warna046',
        'nomor_seri046',
        'kondisi_fisik046',
        'foto046',
    ];
}