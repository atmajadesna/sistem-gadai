<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kelompok15Model extends Model
{
    protected $table = 'kelompok15';

    protected $fillable = [
        'nim',
        'nama',
        'password',
        'form_tujuan',
    ];

    protected $hidden = [
        'password',
    ];
}