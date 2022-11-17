<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('program', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('slug', 70)->unique();
            $table->string('jumlah_sks');
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai');
            $table->string('metode_kegiatan');
            $table->string('kegiatan');
            $table->longText('rincian_kegiatan');
            $table->longText('kriteria_peserta');
            $table->longText('informasi_tambahan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('program');
    }
};
