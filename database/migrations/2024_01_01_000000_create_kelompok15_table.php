<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('kelompok15', function (Blueprint $table) {
            $table->id();
            $table->string('nim')->unique();   // dipakai sebagai username
            $table->string('nama')->nullable();
            $table->string('password');        // disimpan dalam bentuk hash
            $table->string('form_tujuan');      // menentukan form mana yang dibuka setelah login
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kelompok15');
    }
};