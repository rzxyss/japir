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
        Schema::create('jadwal', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal_jalan');
            $table->time('jam_jalan');
            $table->string('lokasi_jemput');
            $table->string('lokasi_tujuan');
            $table->unsignedBigInteger('id_supir');
            $table->unsignedBigInteger('id_mobil');
            $table->foreign('id_supir')->references('id')->on('users')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('id_mobil')->references('id')->on('mobil')->onUpdate('cascade')->onDelete('restrict');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwal');
    }
};
