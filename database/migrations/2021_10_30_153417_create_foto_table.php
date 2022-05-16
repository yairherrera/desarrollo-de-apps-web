<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFotoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('foto', function (Blueprint $table) {
            $table->id('foto_id');
            $table->string('foto_nombre');
            $table->string('foto_descripcion');
            $table->string('foto_ruta');
            $table->unsignedBigInteger('album_id')->unsigned();
            $table->foreign('album_id')->references('album_id')->on('album');
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
        Schema::dropIfExists('foto');
    }
}
