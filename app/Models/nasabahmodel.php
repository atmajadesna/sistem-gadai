<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class nasabahmodel extends Model

{

    protected $table = 'db_nasabah';
    protected $primaryKey = 'id_nasabah060';
    public $timestamps = false;

    protected $fillable = [
        'id_nasabah060',
        'nama060',
        'nomorhp060',
        'nomornik060',
        'alamat060',
        'pekerjaan060',
        'foto060',
    ];
    
}
