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
        Schema::create('programs', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 50);
            $table->string('slug', 70)->unique();
            $table->string('jumlah_sks', 30);
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai');
            $table->string('metode_kegiatan', 50);
            $table->string('kegiatan', 100);
            $table->LongText('rincian_kegiatan');
            $table->LongText('kriteria_peserta');
            $table->LongText('informasi_tambahan')->nullable();
            $table->bigInteger('course_categories_id');
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
        Schema::dropIfExists('programs');
    }
};
