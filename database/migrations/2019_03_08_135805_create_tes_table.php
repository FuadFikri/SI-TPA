<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('santri_id')->unsigned();
            $table->integer('materi_id')->unsigned()->nullable();
            $table->integer('ujian_id')->unsigned();
            $table->integer('nilai');
            $table->text('deskripsi');
            $table->string('penguji');
            $table->timestamps();
            // foreign
            $table->foreign('santri_id')->references('id')->on('santris')->onDelete('cascade');
            $table->foreign('materi_id')->references('id')->on('materis')->onDelete('set null');
            $table->foreign('ujian_id')->references('id')->on('ujians')->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tes');
    }
}
