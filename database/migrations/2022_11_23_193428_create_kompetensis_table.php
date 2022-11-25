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
        Schema::create('kompetensis', function (Blueprint $table) {
            $table->id();
            $table->string('slug', 70)->unique();
            $table->bigInteger('programs_id');
            $table->string('nama_kompetensi', 100);
            $table->string('target_pengembangan_keterampilan');
            $table->string('detail_pembelajaran');
            $table->string('metode_asesment');
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
        Schema::dropIfExists('kompetensis');
    }
};
