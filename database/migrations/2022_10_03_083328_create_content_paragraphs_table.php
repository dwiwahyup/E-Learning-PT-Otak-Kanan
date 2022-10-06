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
        Schema::create('content_paragraphs', function (Blueprint $table) {
            $table->id();
            $table->string('image_url')->nullable();
            $table->string('vidio_url')->nullable();
            $table->longText('text');
            $table->bigInteger('contents_id');
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
        Schema::dropIfExists('content_paragraphs');
    }
};
