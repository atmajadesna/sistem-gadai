<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('db_nasabah', function (Blueprint $table) {
            $table->id('id_nasabah060');
            $table->string('nama060');
            $table->string('nomorhp060');
            $table->string('nomornik060');
            $table->text('alamat060');
            $table->string('pekerjaan060');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('db_nasabah');
    }
};
