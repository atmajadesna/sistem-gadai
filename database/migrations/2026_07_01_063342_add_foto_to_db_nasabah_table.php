<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('db_nasabah', function (Blueprint $table) {
            $table->string('foto060')->nullable()->after('pekerjaan060');
        });
    }

    public function down(): void
    {
        Schema::table('db_nasabah', function (Blueprint $table) {
            $table->dropColumn('foto060');
        });
    }
};