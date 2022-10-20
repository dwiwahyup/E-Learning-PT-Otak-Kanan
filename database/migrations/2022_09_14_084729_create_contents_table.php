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
        Schema::create('contents', function (Blueprint $table) {
            $table->id();
            $table->string('title', 50);
            $table->longText('text');
            $table->string('thumbnaile_url', 200)->nullable();
            $table->string('thumbnaile_id', 100)->unique();
            $table->string('vidio', 50)->nullable();
            $table->string('slug', 70)->unique();
            $table->bigInteger('chapters_id');
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
        Schema::dropIfExists('contents');
    }
};
