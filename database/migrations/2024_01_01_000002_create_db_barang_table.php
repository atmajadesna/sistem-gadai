<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('db_barang', function (Blueprint $table) {
            $table->id('id_barang046');
            $table->string('jenis_barang046');
            $table->string('merk046');
            $table->string('warna046');
            $table->string('nomor_seri046');
            $table->string('kondisi_fisik046');
            $table->string('foto046')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('db_barang');
    }
};
