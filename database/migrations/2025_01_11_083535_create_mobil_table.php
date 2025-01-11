<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('mobil', function (Blueprint $table) {
            $table->id()->primary();
            $table->string('kode_wilayah', 2);
            $table->unsignedInteger('nomor_polisi');
            $table->string('kode_belakang', 3);
            $table->string('merk');
            $table->string('jenis');
            $table->string('tahun');
            $table->string('warna');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mobil');
    }
};
