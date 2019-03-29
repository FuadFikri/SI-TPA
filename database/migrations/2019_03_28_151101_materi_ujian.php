<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MateriUjian extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materi-ujian', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ujian_id')->unsigned();
            $table->integer('materi_id')->unsigned();

            $table->foreign('ujian_id')->references('id')->on('ujians');
            $table->foreign('materi_id')->references('id')->on('materis');
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
        //
    }
}
